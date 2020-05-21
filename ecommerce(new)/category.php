<?php include 'includes/session.php'; ?>
<?php
$slug = $_GET['category'];

$conn = $pdo->open();

try {
	$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
	$stmt->execute(['slug' => $slug]);
	$cat = $stmt->fetch();
	$catid = $cat['id'];
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-9">
							<div style="float:right; margin-right:20px" class="form-inline">
								Sort by Price
								<select class="form-control" id="order_type">
									<option value="ASC">Low → High</option>
									<option value="DESC">High → Low</option>
								</select>
							</div>
							<h1 class="page-header"><?php echo $cat['name']; ?></h1>
							<?php

							$conn = $pdo->open();

							try {
								$inc = 3;
								$page_num =  0;
								$page_size =  30;
								$order_type = "ASC";
								if (isset($_GET['page_size']) && isset($_GET['page_num'])) {
									$page_size =  (int) $_GET['page_size'];
									$page_num = (int) $_GET['page_num'] *  $page_size;
								}
								if (isset($_GET['order_type'])) {
									$order_type =  $_GET['order_type'];
								}
								$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid  order by price " . $order_type . " limit " . $page_num . "," . $page_size);
								$stmt->execute(['catid' => $catid]);
								foreach ($stmt as $row) {
									$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
									$inc = ($inc == 3) ? 1 : $inc + 1;
									if ($inc == 1) echo "<div class='row'>";
									echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; " . number_format($row['price'], 2) . "</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
									if ($inc == 3) echo "</div>";
								}

								if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
								if ($inc == 2) echo "<div class='col-sm-4'></div></div>";
							} catch (PDOException $e) {
								echo "There is some problem in connection: " . $e->getMessage();
							}

							$pdo->close();

							?>
						</div>
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
					</div>

					View: <a href="#" id="view_30" onclick="reload_view(30)">30</a>&nbsp;<a href="#" id="view_60" onclick="reload_view(60)">60</a>&nbsp;<a href="#" id="view_120" onclick="reload_view(120)">120</a>
					&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" onclick="previous_view()">Previous</button>&nbsp;&nbsp;
					<button class="btn btn-primary" onclick="next_view()">Next</button>
				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
</body>
<script>
	function reload_view(view_size) {
		window.location.href = replace_url_param_val(window.location.href, "page_size", view_size);
	}

	// function reload_view_order(order_type) {
	// 	window.location.href =replace_url_param_val(window.location.href, "order_type", order_type);
	// }

	function previous_view() {
		var page_num = parseInt(get_query_variable("page_num"));
		window.location.href = replace_url_param_val(window.location.href, "page_num", page_num - 1);
	}

	function next_view() {
		var page_num = parseInt(get_query_variable("page_num"));
		window.location.href = replace_url_param_val(window.location.href, "page_num", page_num + 1);
	}

	function get_query_variable(variable) {
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i = 0; i < vars.length; i++) {
			var pair = vars[i].split("=");
			if (pair[0] == variable) {
				return pair[1];
			}
		}
		return (false);
	}

	function replace_url_param_val(url, param_name, replace_with) {
		var re = eval('/(' + param_name + '=)([^&]*)/gi');
		var new_url = url.replace(re, param_name + '=' + replace_with);
		return new_url;
	}

	if (!get_query_variable("page_num") || !get_query_variable("order_type") || !get_query_variable("page_size")) {
		if (get_query_variable("category")) {
			window.location.href = window.location.href + "&page_num=0&page_size=30&order_type=ASC"
		} else {
			window.location.href = window.location.href + "?page_num=0&page_size=30&order_type=ASC"
		}
	}
	$("#order_type").val(get_query_variable("order_type"));
	$("#order_type").change(function() {
		window.location.href = replace_url_param_val(window.location.href, "order_type", $("#order_type").val());
	})

	if (get_query_variable("page_size") == '30') {
		$("#view_30").html("<b>30</b>")
	}
	if (get_query_variable("page_size") == '60') {
		$("#view_60").html("<b>60</b>")
	}
	if (get_query_variable("page_size") == '120') {
		$("#view_120").html("<b>120</b>")
	}
</script>

</html>