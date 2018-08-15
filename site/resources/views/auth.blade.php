<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aplikasi Manajemen Arsip - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="libraries/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="libraries/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="libraries/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="libraries/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="libraries/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="libraries/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/pages/auth/util.css">
    <link rel="stylesheet" type="text/css" href="css/pages/auth/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-85 p-b-20">
                <form class="login100-form validate-form animated fadeInRightBig" action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                    <span class="login100-form-title p-b-70">
                        Welcome
                    </span>

                    <div class="wrap-input100 validate-input m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="nip">
                        <span class="focus-input100" data-placeholder="NIP"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="login-more p-t-50">
                        <span class="txt1">
                                Don’t have an account? <a href="#" class="txt2">Sign up here!</a>
                        </span>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="libraries/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="libraries/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="libraries/bootstrap/js/popper.js"></script>
    <script src="libraries/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="libraries/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="libraries/daterangepicker/moment.min.js"></script>
    <script src="libraries/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="libraries/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/pages/auth.js"></script>

</body>
</html>