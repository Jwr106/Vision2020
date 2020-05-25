<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Order Records
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Order Records</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>

                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Street Address</th>
                    <th>Post Code</th>
                    <th>City</th>
                    <th>Total Price</th>
                    <th>Left Sphere</th>
                    <th>Left Cylinder</th>
                    <th>Left Axis</th>
                    <th>Right Sphere</th>
                    <th>Right Cylinder</th>
                    <th>Right Axis</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();

                    try {
                      $stmt = $conn->prepare("SELECT * FROM order_record");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        echo "
                          <tr>
                            <td>" . $row['user_name'] . "</td>
                            <td>" . $row['contact_number'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['street_address'] . "</td>
                            <td>" . $row['post_code'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>" . $row['total_price'] . "</td>
                            <td>" . $row['l_sphere'] . "</td>
                            <td>" . $row['l_cylinder'] . "</td>
                            <td>" . $row['l_axis'] . "</td>
                            <td>" . $row['r_sphere'] . "</td>
                            <td>" . $row['r_cylinder'] . "</td>
                            <td>" . $row['r_axis'] . "</td>
                          </tr>
                        ";
                      }
                    } catch (PDOException $e) {
                      echo $e->getMessage();
                    }

                    $pdo->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/users_modal.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  
</body>

</html>