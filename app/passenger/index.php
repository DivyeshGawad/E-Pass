<?php

    include 'connect.php';
    session_start();
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    }
    else{
        header("location:login.php");
    }
    
    $sql = "SELECT * FROM `user` WHERE `id` = $id";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row = mysqli_fetch_array($dbresult)){
                if(isset($row['image'])){
                    $img = $row['image'];
                }
                else {
                    $img = "default.jpg";
                }
                
                $name = $row['f_name']." ".$row['l_name'];
                //print_r($row);
            }
        } 
        else{
            //echo "No records matching your query were found.";
        }
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>
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


    <title>E-Pass Portal</title>
</head>

<body class="color-theme-blue push-content-right theme-light">
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
        <!-- sidebar left start -->
        <?php include "sidebar.php"?>
        <!-- sidebar left ends -->

        <!-- fullscreen menu start -->
        <div class="modal fade popup-fullmenu" id="fullscreenmenu" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content fullscreen-menu">
                    <div class="modal-header">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="#" class="block user-fullmenu popup-close">
                            <figure>
                                <img src="img/user1.png" alt="">
                            </figure>
                            <div class="media-content">
                                <h6 style="text-transform:uppercase;"><?php echo $name; ?><br><small>India</small></h6>
                            </div>
                        </a>
                        <br>
                        <div class="row mx-0">
                            <div class="col">
                                <a href="login.html" class="rounded btn btn-outline-white text-white popup-close">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <div class="page">
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>
                </div>
                <div class="col center">
                    <a href="index.php" class="logo">
                        <figure><img src="img/logo.png" alt=""></figure>E-Pass Portal</a>
                </div>
            </header>
            <div class="page-content">
                <div class="content-sticky-footer">
                    <div class="col-12  mt-3 mb-4">
                        <p class="text-uppercase font-weight-bold text-primary">Welcome to E-Pass Portal,</p>
                        <h3><b class="text-primary" style="text-transform:uppercase;"> <?php echo $name; ?> </b></h3>
                    </div>
                    <h2 class="block-title">Steps to Get Started</h2>
                    <div class="col-12 mb-4 ">
                        <ul class="list-group">
                            <li class="list-group-item py-4">
                                <h5><i class="material-icons text-warning vm mr-2">star</i>Registration</h5>
                                <p class="mb-0">Get Yourself Registered with Epass Portal.</p>
                            </li>
                            <li class="list-group-item py-4 text-right">
                                <h5>Sign In<i class="material-icons text-danger vm ml-2">schedule</i></h5>
                                <p class="mb-0">After Successful Registration, Sign In by entering Your Username & Password.</p>
                            </li>
                            <li class="list-group-item py-4">
                                <h5><i class="material-icons text-success vm mr-2">lock</i>Verification</h5>
                                <p class="mb-0">Go through the Verification Process by entering your Adhaar number. (It will take 1-2 Days to get verified)</p>
                            </li>
                            <li class="list-group-item py-4 text-right">
                                <h5>Apply for Pass<i class="material-icons text-danger vm ml-2">local_atm</i></h5>
                                <p class="mb-0">After Successful Verification, you will be able to get your Digital Pass. All you have to do is just click on "Pass" >> "Apply for Pass" option. Enter the source & Destinations, make successful payment & your Pass Card will be generated.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-wrapper shadow-15">
                    <div class="footer">
                        <div class="row mx-0">
                            <div class="col">
                                E-Pass Portal
                            </div>
                            <div class="col-7 text-right">
                                <a href="#" class="social"><img src="img/facebook.png" alt=""></a>
                                <a href="#" class="social"><img src="img/googleplus.png" alt=""></a>
                                <a href="#" class="social"><img src="img/linkedin.png" alt=""></a>
                                <a href="#" class="social"><img src="img/twitter.png" alt=""></a>
                            </div>
                        </div>
                        </div>
                        <div class="footer dark">
                            <div class="row mx-0">
                                <div class="col  text-center">
                                    &copy Copyright 2023, TransCity
                                </div>
                            </div>
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
    <script>
        $(window).on('load', function() {
            /* sparklines */
            $(".dynamicsparkline").sparkline([5, 6, 7, 2, 0, 4, 2, 5, 6, 7, 2, 0, 4, 2, 4], {
                type: 'bar',
                height: '25',
                barSpacing: 2,
                barColor: '#a9d7fe',
                negBarColor: '#ef4055',
                zeroColor: '#ffffff'
            });

            /* gauge chart circular progress */
            $('.progress_profile1').circleProgress({
                fill: '#169cf1',
                lineCap: 'butt'
            });
            $('.progress_profile2').circleProgress({
                fill: '#f4465e',
                lineCap: 'butt'
            });
            $('.progress_profile4').circleProgress({
                fill: '#ffc000',
                lineCap: 'butt'
            });
            $('.progress_profile3').circleProgress({
                fill: '#00c473',
                lineCap: 'butt'
            });
            $('.progress_profile5').circleProgress({
                fill: '#ffffff',
                lineCap: 'butt'
            });

            /*Swiper carousel */
            var mySwiper = new Swiper('.swiper-container', {
                slidesPerView: 2,
                spaceBetween: 0,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                }
            });
            /* tooltip */
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });

    </script>
</body>
</html>
