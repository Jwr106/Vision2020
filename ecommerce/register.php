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

    <script type="text/javascript">
      function formValidation()
        {
        var fname = document.registration.firstname;
        var lname = document.registration.lastname;
        var uname = document.registration.username;
        var uadd = document.registration.address;
        var ucountry = document.registration.country;
        var uadd2 = document.registration.address2;
        var uemail = document.registration.email;
        var uzip = document.registration.zip;
        if(userid_validation(uname,5,12))
        {
          if(allLetter(fname,lname,uname))
          {
            if(alphanumeric(uadd))
            { 
              if(countryselect(ucountry))
              {
                if(allnumeric(uzip))
                {
                  if(ValidateEmail(uemail))
                  {
                  } 
                }
              } 
            }
          }
        }
        return false;
        }

      function userid_validation(uname,mx,my)
      {
        var uname_len = uname.value.length;
        if (uname_len == 0 || uname_len >= my || uname_len < mx)
        {
          alert("Username should not be empty / length be between "+mx+" to "+my);
          uname.focus();
          return false;
        }
      return true;
      }

      function allLetter(fname,lname,uname)
      { 
        var letters = /^[A-Za-z]+$/;
          if(uname.value.match(letters))
        {
          return true;
        }
          else
        {
          alert('Username must have alphabet characters only');
          uname.focus();
          return false;
        }
      }

      function alphanumeric(uadd)
      { 
        var letters = /^[0-9a-zA-Z]+$/;
        if(uadd.value.match(letters))
        {
        return true;
        }
        else
        {
        alert('User address must have alphanumeric characters only');
        uadd.focus();
        return false;
        }
      }

      function countryselect(ucountry)
      {
        if(ucountry.value == "Default")
        {
        alert('Select your country from the list');
        ucountry.focus();
        return false;
        }
        else
        {
        return true;
        }
      }

      function allnumeric(uzip)
      { 
        var numbers = /^[0-9]+$/;
        if(uzip.value.match(numbers))
        {
        return true;
        }
        else
        {
        alert('ZIP code must have numeric characters only');
        uzip.focus();
        return false;
        }
      }

      function ValidateEmail(uemail)
      {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(uemail.value.match(mailformat))
        {
        return true;
        }
        else
        {
        alert("You have entered an invalid email address!");
        uemail.focus();
        return false;
        }
      }

    </script>
  </head>
  <body>

  	<?php include 'menu.php';?>

    <div class="container">
      <div class="row text-center">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
          <h1 class="display-4">Sign in or Register</h1>
          <p class="lead">Already have an account sign in. Register for a new account if you don't have one.</p>
        </div>
      </div>

      <div class="row featurette">
        <div class="col-md-5">
          <form class="" >
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="loginEmail">Email Address</label>
                <input type="text" class="form-control" name="loginEmail" placeholder="" value="" required autofocus>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="loginPassword">Password</label>
                <input type="password" class="form-control" name="loginPassword" placeholder="Password" required>
              </div>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <div class="col-md-7">
          <h1 class="h3 mb-3 font-weight-normal">Register New Account</h1>
          <form class="needs-validation" name='registration' onSubmit="return formValidation();">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email Address<span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" required >
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" required>
                  <option value="">Choose...</option>
                  <option>Australia</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Details</button>
          </form>

        </div>
      </div>
      </div>

      <?php include 'footer.php';?>
	</main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>