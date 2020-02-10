<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Zay Bann </title>

  <!-- Favicon -->
  <link rel="icon" href="image/logo.png">

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #673AB7">

  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                              <a href="index"> <h3 class="font-weight-light my-4">Login</h3> </a>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" /></div>
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                      <a class="small" href="password-basic.html">Forgot Password?</a>
                                      <button class="btn btn-secondary" style="background-color: #673AB7; border-color: #673AB7">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="backend/vendor/jquery/jquery.min.js"></script>
  <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="backend/js/sb-admin-2.min.js"></script>
  
  <script type="text/javascript">
    
    $(document).ready(function() 
    {
      $('#inputPassword').change(function ()
      {
        var password=$(this).val();
        console.log(password.length);

          if(password.length > 8)
          {
            $('#error').html(`<span class="text-danger">* Password shouldn't exceed eight digit</span>`);
          }
      });


      $('#inputConfirmPassword').change(function () 
      {
        var cpassword = $(this).val();
        var password = $("#inputPassword").val();


        if(password!=cpassword)
        {
          $('#cerror').html(`<span class="text-danger">* Confirm Password don't match!</span>`);
        }
      });
    
    });

  </script>

</body>

</html>
