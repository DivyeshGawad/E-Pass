<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">

    <link rel="apple-touch-icon" href="img/f7-icon-square.html">
    <link rel="icon" href="img/f7-icon.html">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-4.1.3/css/bootstrap.min.css">

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- swiper carousel CSS -->
    <link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">

    <!-- app CSS -->
    <link id="theme" rel="stylesheet" href="css/style.css" type="text/css">


    <title>E-Pass</title>
</head>

<body class="color-theme-blue">
    <div class="loader justify-content-center ">
        <div class="maxui-roller align-self-center">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper">
        <!-- page main start -->
        <div class="page">
            <div class="page-content h-100">
                <div class="background theme-header"><img src="img/appbg2.jpeg" alt=""></div>
                <div class="row mx-0 h-100 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4 my-3 mx-auto text-center align-self-center">
                        <img src="img/logo.png" alt="" class="login-logo">
                        <h1 class="login-title"><small>Welcome to,</small><br>E-Pass Portal</h1>
                        <br>
                        <h5 class="text-white mb-4">Sign In & Get Started Now</h5>
                        <form method="POST" action="login-proc.php" class="login-input-content ">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control rounded text-center" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control rounded text-center" placeholder="Password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-block btn-success rounded border-0 z-3">Sign in</button>
                        </form>
                        <br>
                        <br>
                        <div class="row no-gutters">
                            <div class="col-6 text-left"><a href="forgot-password.php" class="text-white mt-3">Forget Password?</a></div>
                            <div class="col-6 text-right"><a href="register.php" class="text-white text-center mt-3">Sign up</a></div>
                        </div>                        
                    </div>
                </div>

                <br>

            </div>

        </div>
        <!-- page main ends -->

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <!-- Cookie jquery file -->
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- sparklines chart jquery file -->
    <script src="vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Circular progress gauge jquery file -->
    <script src="vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Swiper carousel jquery file -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- Application main common jquery file -->
    <script src="js/main.js"></script>

    <!-- page specific script -->

</body>
</html>
