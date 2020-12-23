<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EasyAccomod</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="pages component/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="pages component/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="pages component/login/vendor/animate/animate.css">
    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="pages component/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="pages component/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="pages component/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="pages component/login/css/main.css">
    <!--===============================================================================================-->

</head>
<body>
<?php
      $login = new Login();
      if(($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST['login'])) {
        $msg = $login->login($_POST['email'],$_POST['password']);
      }

      if((isset($msg)) && ($msg=='nouser')){
        echo "<p class='alert alert-danger'>Wrong Password or User</p>";
        $msg = null;
      }
      else if((isset($msg)) && ($msg=='empty')){
        echo "<p class='alert alert-danger'>Fill all the Field please!</p>";
        $msg = null;
      }
      else if((isset($msg)) && ($msg=='emailprob')){
        echo "<p class='alert alert-danger'>Email Format is Invalid!</p>";
        $msg = null;
      }
?>
    <div style="padding-top: 0rem; padding-bottom: 0rem; position: relative; z-index: 2">
      <div class="container">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="pages component/login/images/img-01.png" alt="IMG">
        </div>
        <form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <span class="login100-form-title">
            Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" style="background-color: #26baee;" name="login"> 
              Login
            </button>
          </div>
          <div class="text-center p-t-136" style="padding-bottom: 2rem;">
            <a class="txt2" href="user_register.php">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
      </div>
    </div>
	
  <!-- login component script -->
  <!--===============================================================================================-->  
  <script src="pages component/login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="pages component/login/vendor/bootstrap/js/popper.js"></script>
  <script src="pages component/login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="pages component/login/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="pages component/login/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="pages component/login/js/main.js"></script>
  
</body>
</html>