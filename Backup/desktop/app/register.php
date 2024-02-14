<!doctype html>
<html lang="en">


<!-- Mirrored from maxartkiller.com/website/MSRTC's E-Pass Portal/bootstrap_dashboard_html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 09:47:00 GMT -->
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


    <title>Sign Up</title>
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
                <div class="background theme-header"><img src="img/shivneri2.jpg" alt=""></div>
                <div class="row mx-0 h-100 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4 my-3 mx-auto text-center align-self-center">
                        <img src="img/logo.png" alt="" class="login-logo">
                        <br>
                        <br>
                        <h5 class="text-white mb-4">Register with us</h5>
                        <br>
                        <form method="POST" action="add-user.php" class="login-input-content ">
                            <div class="form-group">
                                <input type="text" class="form-control rounded text-center" name="fname" placeholder="First Name" Required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control rounded text-center" name="lname" placeholder="Last Name" Required>
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control rounded">
                                    <option class="text-center" value="Male">Male</option>
                                    <option class="text-center" value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control rounded text-center" name="e-mail" placeholder="Email" Required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control rounded text-center" name="c_no" placeholder="Phone number" Required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control rounded text-center" name="dob" placeholder="DOB" Required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded text-center" name="pass" placeholder="Password" Required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded text-center" name="cpass" placeholder="Confirm Password" Required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-block btn-success rounded border-0 z-3">Sign Up</button>
                        </form>
                        <br>
                        <br>
                        <div class="row no-gutters">
                            <div class="col-12 text-center text-white">Already have account?<br>Please <a href="login.php" class="text-white font-weight-bold mt-3">Sign In</a> here.</div>
                        </div>                        
                    </div>
                </div>

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


<!-- Mirrored from maxartkiller.com/website/MSRTC's E-Pass Portal/bootstrap_dashboard_html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 09:47:00 GMT -->
</html>
