<?php
    session_start();
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
    else {
        header("location: login.php");
    }
    include 'connect.php';
    $sql = "SELECT * FROM `user` WHERE `id` = '$id' ";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row = mysqli_fetch_array($dbresult)){
                //print_r($row);
                
                $img = $row['image'];
                $name = $row['f_name'].' '.$row['l_name'];
                $dob = $row['dob'];
                // $route = $row['sourse'].' - '.$row['destination'];
                // $expiry = $row['expiry'];
                $num = $row['mobile_no'];
                $add = $row['address'];
                // $ser = $row['service'];
                $pass_id = $row['permit_id'];
                if (isset($row['permit_id'])) {
                }
                else {
                    header("location: apply-next.php");
                }
            }
        } 
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $sql = "SELECT * FROM `pass_cards` WHERE `permit_id` = '$pass_id' ";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row = mysqli_fetch_array($dbresult)){
                //print_r($row);
                
                
                $route = $row['source'].' - '.$row['destination'];
                $expiry = $row['expiry'];
                
                $ser = $row['service_type'];
                $qrimg = $row['qr'];
            }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- swiper carousel CSS -->
    <link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">

    <!-- app CSS -->
    <link id="theme" rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
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


        <!-- page main start-->
        <div class="page">
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>
                </div>
                <div class="col center">
                    <a href="index.html" class="logo" style="text-decoration:none">
                        <figure><img src="img/logo.png" alt=""></figure>E-Pass Portal</a>
                </div>
            </header>
            <div class="page-content">
                <div class="content-sticky-footer">
                    <div class="col-12  mt-3 mb-4">
                        <p class="text-sentencecase font-weight-bold text-primary">Thankyou for availing our service, Here's your Card :</p>
                        <!--<h4><b class="text-primary" style="text-transform:uppercase;"> <?php //echo $name; ?> </b></h4>-->
                    </div>
                    <div class="row g-3">
                        <div class="col ">
                        <div class="box-shadow"><!------Box Shadow Start-------->
                        <div class="card"><!------Card Start-------->
                            <div class="title-bg"><!------title Start-------->
                                <div class="logo px-4"><!------Logo Start-------->
                                    <img src="img/logo.png" alt="logo" height="50px" width="auto">
                                </div><!------Logo End-------->
                                <div class="sup-title  mt-3"><!------Super Title Start-------->
                                    <h5 style="color: azure; text-shadow: 0 0 px rgb(0, 0, 0); text-align:center;">TRANSPORT CORPORATION OF MAHARASHTRA</h5>
                                </div><!------Super Title End-------->
                            </div><!------Title End-------->
                            <div class="data-box"> <!------Data Box Start-------->
                                <div class="profile">
                                    <img src="upload/profile/<?php echo $img; ?>" alt="profile">
                                    <strong style="-webkit-text-stroke: 0.7px black; color: #00c700; text-shadow: 0 0 8px black; margin: 10px 10px ; display: inline-block; position: absolute; font-size: 22px; line-height: 20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CITY TRAVEL PERMIT CARD</strong>
                                </div><!------Data End-------->
                                <div class="data mt-2" style="-webkit-text-stroke: 0.5px black;"><!------Data Start-------->
                                    <Strong>NAME :</Strong>
                                    <span class="text-uppercase"><?php echo $name; ?></span>
                                </div><!------Data End-------->
                                <div class="data" style="-webkit-text-stroke: 0.5px black;"><!------Data Start-------->
                                    <Strong>D-O-B :</Strong>
                                    <span><?php echo $dob; ?></span>
                                </div><!------Data End-------->
                                <div class="data" style="-webkit-text-stroke: 0.5px black;"><!------Data Start-------->
                                    <Strong>ROUTE :</Strong>
                                    <span><?php echo $route; ?></span>
                                </div><!------Data End-------->
                                <div class="data" style="-webkit-text-stroke: 0.5px black;"><!------Data Start-------->
                                    <Strong>EXPIRY :</Strong>
                                    <span><?php echo $expiry; ?></span>
                                </div><!------Data End-------->
                                <div class="data" style="-webkit-text-stroke: 0.5px black;"><!------Data Start-------->
                                    <Strong></Strong>
                                    <span></span>
                                </div><!------Data End-------->
                                <div class="data"><!------Data Start-------->
                                    <Strong></Strong>
                                    <span></span>
                                </div><!------Data End-------->
                            </div><!------Box Shadow End-------->
                            <div class="qr"><!------QR Code Start-------->
                                <img src="upload/qr/<?php echo $qrimg; ?>" alt="QR code" height="125px" width="125px" style="float: right; margin-top: 0px;"> 
                            </div><!-----------QR Code End------------>
                            
                        </div><!------Card End-------->
                        </div><!------Box Shadow End-------->
                        </div>
                    </div>
                    
                    <br><br>
                    
                    <div class="box-shadow"><!------Box Shadow Start-------->
                        <div class="card title-bg"><!------Card Start-------->
                            <div class="data databox" style="padding: 20px;"> <!------Data Box Start-------->
                                <strong style="float: right;color: gold; text-decoration: underline; padding-bottom: 10px;">MH-<?php echo $pass_id; ?></strong>
                                <Strong>ADDRESS :</Strong>
                                <span><?php echo $add; ?> </span><br>
                                <Strong>PHONE :</Strong>
                                <span><?php echo $num; ?></span><br>
                                <!-- <Strong>ISSUED DATE :</Strong>
                                <span>19/07/2021</span><br> -->
                                <Strong>VALID FOR :</Strong>
                                <span><?php echo $ser; ?></span><br>
                                <div class="title-bg"><!------title Start-------->
                                    <div class="logo content-center" style="text-align:center; display: block; margin-left: auto; margin-right: auto; width: 50%;">
                                    <!------Logo Start-------->
                                        <img src="img/logo.png" alt="logo" height="60px" width="auto">
                                    </div><!------Logo End-------->
                                </div><!------Title End-------->
                                <h5 style="color: azure; text-shadow: 0 0 px rgb(0, 0, 0); text-align: right; padding: 0px;">TRANSPORT CORPORATION<br>TransCity<span style="float: left; font-size: 10px;">Toll Free No. : 1800-1234-5678</span></h5>
                                
                            </div><!------Card Number End-------->
                        </div><!------Card End-------->
                    </div><!------Box Shadow End-------->
                    <center>
                        <div class="btn">
                            <button class="btn btn-info" onclick="print()">
                                Print Card
                        </div>
                    </center>
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