<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sico");
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  $name = $_SESSION['username'];
  $pass = $_SESSION['password'];
  $query = "SELECT * FROM `sico-log` where `password`='" . $pass . "' and `user_name`='" . $name . "' ";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    header("Location: http://localhost/sico/main.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>LOGIN</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--===============================================================================================-->
  <link rel="icon" type="png" href="images/icons/SICO-Logo.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <!--===============================================================================================-->
</head>

<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" id="log-form">
          <span class="login100-form-title p-b-49">
            SICO - Login
          </span>

          <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" id="username" name="username" placeholder="Type your username" />
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" id="pass" name="pass" placeholder="Type your password" />
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>
          <br />

          <div class="wrap-input100 validate-input" data-validate="Pin is required">
            <span class="label-input100">PIN</span>
            <input class="input100" type="text" name="pin" id="pin" placeholder="Type your PIN" />
            <span class="focus-input100" data-symbol="&#xf194;"></span>
          </div>

          <div class="text-right p-t-8 p-b-31">
            <a href="#"> Forgot password? </a><br />
            <a href="#">
              Forgot PIN?
            </a>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" id="log-btn">
                Login
              </button>
            </div>
          </div>

          <div class="txt1 text-center p-t-54 p-b-20">
            <span>
              Follow us on:
            </span>
          </div>

          <div class="flex-c-m">
            <a href="#" class="login100-social-item bg1">
              <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="login100-social-item bg2">
              <i class="fa fa-instagram"></i>
            </a>

            <a href="#" class="login100-social-item bg3">
              <i class="fa fa-google"></i>
            </a>
          </div>

          <div class="flex-col-c p-t-65">
            <span class="txt1 p-b-17">
              Or Sign Up Using
            </span>

            <a href="signup.html" class="txt2">
              Sign Up
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function() {
      $("#log-form").on("submit", function(e) {
        e.preventDefault();
        var name = $("#username").val();
        var pass = $("#pass").val();
        var pin = $("#pin").val();
        $.ajax({
          url: "add.php",
          method: "post",
          data: {
            name: name,
            pass: pass,
            pin: pin,
            type: "log-in"
          },
          beforeSend: function() {
            $("#log-btn").attr("disabled", true);
          },
          success: function(data) {
            alert(data);

            $("#log-btn").attr("disabled", false);
            if (data == "success") {
              window.location.href = "http://localhost/sico/main.php";
            }
          }
        });
      });
    });
  </script>
</body>

</html>