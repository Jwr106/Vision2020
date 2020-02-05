<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" crossorigin="anonymous" >

    <title>Link Opticians</title>
  </head>
  <body>

	<?php include 'menu.php';?>

	<main role="main">

	    <div class="container">

        <div class="row text-center">
          <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Get in Touch </h1>
            <p class="lead">Visit our Offices or Leave us a mesage</p>
          </div>
        </div>

      <div class="row featurette">
        <div class="col-md-5">
          <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h4>Head Office</h4>
            <p class="lead">Robson Manyika House<br/>
              Corner Angwa/Union Avenue<br/>
              Harare<br/>
              Zimbabwe</p>
              <p class="lead">
                +263-242-757 558<br/>
                admin@linkopticians.co.zw<br/>
                www.linkopticians.co.zw
              </p>
          </div>
        </div>
        <div class="col-md-7">
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Your Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Your Email</label>
                <input type="email" class="form-control" id="email" placeholder="yourname@example.com" value="" required>
                <div class="invalid-feedback">
                  Enter valid email address
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Message</label>
              <textarea rows="10" class="form-control" id="message" name="message"></textarea>
              <div class="invalid-feedback">
                Please enter a message
              </div>
            </div>

            

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>

        </div>
      </div>
	    <hr>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.2216114820026!2d31.045527914882534!3d-17.828243287815805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1931a4e480cf8ed9%3A0xfac04e02f5e077f1!2sAngwa%20St%20%26%20Union%20Ave%2C%20Harare!5e0!3m2!1sen!2szw!4v1579066154289!5m2!1sen!2szw" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

	  </div> <!-- /container -->

	  <?php include 'footer.php';?>

	</main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>