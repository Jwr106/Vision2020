<?php include 'includes/session.php'; ?>
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
							<h1 class="page-header">YOUR CART</h1>
							<div class="box box-solid">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
											<th></th>
											<th>Photo</th>
											<th>Name</th>
											<th>Price</th>
											<th width="20%">Quantity</th>
											<th>Subtotal</th>
										</thead>
										<tbody id="tbody">
										</tbody>
									</table>
								</div>
							</div>
							<?php
							// <div id='paypal-button'></div>
							if (isset($_SESSION['user'])) {
								echo "
							<button class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#myModal\" id=\"checkout_btn\">Checkout</button>
	        				";
							} else {
								echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
							}
							?>
						</div>
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
					</div>
				</section>

			</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>


		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="cart_checkout.php" method="POST">
						<div class="modal-header">
							<h4 class="modal-title">Shipping details</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<div class="modal-body">
							Name: <input class="form-control" name="user_name">
							Contact number: <input class="form-control" name="contact_number">
							Email: <input class="form-control" name="email">
							Street Address: <input class="form-control" name="street_address">
							Post Code: <input class="form-control" name="post_code">
							City: <input class="form-control" name="city">
							<input class="form-control" name="total_price" id="total_price" style="display: none;">
							<hr>
							Prescription details <br>
							<div class="row">
								<div class="col-md-6">
									Left Eye:<br>
									Sphere: <input class="form-control" type="number" name="l_sphere">
									Cylinder: <input class="form-control" type="number" name="l_cylinder">
									Axis: <input class="form-control" type="number" name="l_axis">
								</div>
								<div class="col-md-6">
									Right Eye:<br>
									Sphere: <input class="form-control" type="number" name="r_sphere">
									Cylinder: <input class="form-control" type="number" name="r_cylinder">
									Axis: <input class="form-control" type="number" name="r_axis">
								</div>

							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-info" type="submit">Pay Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		var total = 0;
		$(function() {
			$(document).on('click', '.cart_delete', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.minus', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				if (qty > 1) {
					qty--;
				}
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.add', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				qty++;
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			getDetails();
			getTotal();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
				}
			});
		}

		function getTotal() {
			$.ajax({
				type: 'POST',
				url: 'cart_total.php',
				dataType: 'json',
				success: function(response) {
					total = response;
					if (total == 0) {
						$("#checkout_btn").attr("disabled", true);
					}
					$("#total_price").val(total);
				}
			});
		}
	</script>
	<!-- Paypal Express -->
	<script>
		paypal.Button.render({
			env: 'sandbox', // change for production if app is live,

			client: {
				sandbox: 'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
				//production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
			},

			commit: true, // Show a 'Pay Now' button

			style: {
				color: 'gold',
				size: 'small'
			},

			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [{
							//total purchase
							amount: {
								total: total,
								currency: 'USD'
							}
						}]
					}
				});
			},

			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function(payment) {
					window.location = 'sales.php?pay=' + payment.id;
				});
			},

		}, '#paypal-button');
	</script>
</body>

</html>