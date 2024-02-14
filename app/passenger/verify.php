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
                $status = $row['status'];
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


        <!-- page main start -->
        <div class="page">
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>
                </div>
                <div class="col center">
                    <a href="index.html" class="logo">
                        <figure><img src="img/logo.png" alt=""></figure>User Verification</a>
                </div>
            </header>
            <div class="page-content">
                <div class="background theme-header"><img src="img/shivneri1.jpg" alt=""></div>
                <div class="row mx-0 h-100 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4 my-3 mx-auto text-center align-self-center">
                        <form method="POST" action="verification-data.php" class="login-input-content" enctype="multipart/form-data">
                            <div class="row">
                                    <h6 class="mx-auto" style="color: azure;"> UPLOAD YOUR PASSPORT SIZED PHOTO</h6>
                                
                            </div>
                            <div class="row">
                                    <input type="file" class="form-control rounded text-center my-2" name="img" Required>
                                    <code class="mx-auto"><kbd style="color: azure;">Note : This Photo will appear on your future cards</kbd></code>
                                    <code class="mx-auto text-red"><kbd>Image size must be exactly 200Kb</kbd></code>
                                    <div></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <h6 style="color: azure;">ENTER YOUR AADHAR CARD DETAILS</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control rounded text-center" name="adhaar_no" placeholder="Adhaar Number" Required>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <div class="col">
                                    <input type="text" class="form-control rounded text-center" name="address" placeholder="Address" Required>
                                </div>
                            </div>
                            <!--<div class="row" style="margin-top:10px">
                                <div class="col">
                                    <select name="district" class="form-control rounded" name="district" required>
                                        <option class="text-center" selected>Select District as per Adhaar</option>
                                        <option class="text-center" value="palghar">Palghar </option>
                                        <option class="text-center" value="mumbai">Mumbai</option>
                                        <option class="text-center" value="thane">Thane</option>
                                        <option class="text-center" value="nashik">Nashik</option>
                                        <option class="text-center" value="pune">Pune</option>
                                        <option class="text-center" value="raigad">Raigad</option>
                                        <option class="text-center" value="ratna">Ratnagiri</option>
                                        <option class="text-center" value="sindhu">Sindhudurg</option>
                                        <option class="text-center" value="ahmad">Ahmadnagar</option>
                                        <option class="text-center" value="jalgaon">Jalgaon</option>
                                        <option class="text-center" value="satara">Satara</option>
                                        <option class="text-center" value="sangli">Sangli</option>
                                        <option class="text-center" value="kolha">Kolhapur</option>
                                        <option class="text-center" value="beed">Beed</option>
                                        <option class="text-center" value="latur">Latur</option>
                                        <option class="text-center" value="osman">Osmanabad</option>
                                        <option class="text-center" value="wardha">Wardha</option>
                                        <option class="text-center" value="washim">Washim</option>
                                        <option class="text-center" value="nagpur">Nagpur</option>
                                        <option class="text-center" value="amravati">Amravati</option>
                                        <option class="text-center" value="yavatmal">Yavatmal</option>
                                        <option class="text-center" value="gondia">Gondia</option>
                                        <option class="text-center" value="nanded">Nanded</option>
                                        <option class="text-center" value="aurang">Aurangabad</option>
                                        <option class="text-center" value="akola">Akola</option>
                                        <option class="text-center" value="hingoli">Hingoli</option>
                                        <option class="text-center" value="gadchi">Gadchiroli</option>
                                        <option class="text-center" value="bandara">Bhandara</option>
                                        <option class="text-center" value="dhule">Dhule</option>
                                        <option class="text-center" value="parbhani">Parbhani</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="form-group" style="margin-top:20px">
                                <input type="password" class="form-control rounded text-center" name="pass" placeholder="Enter Password" Required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-block btn-success rounded border-0 z-3 my-3">Get Verified</button>
                            
                            <code class="mx-auto"><kbd>Verification can take upto 2 working days</kbd></code>
                        </form>
                        
                        <!--<div class="row no-gutters">
                            <div class="col-12 text-center text-white">Already verified?<br> To Apply for card <a href="login.html" class="text-white font-weight-bold mt-3">Sign In</a> here.</div>
                        </div>-->                     
                    </div>
                </div>
                
                <div class="footer-wrapper">
                    <!--<div class="footer">
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
                    </div>-->
                    <div class="footer dark">
                        <div class="row mx-0">
                            <div class="col  text-center">
                                &copy Copyright 2023, by TransCity
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
