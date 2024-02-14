<?php

    include 'connect.php';
    session_start();
    if(isset($_SESSION["eid"])){
        $id = $_SESSION["eid"];
    }
    else{
        header("location:login.php");
    }
    
    $sql = "SELECT * FROM `employee` WHERE `emp_id` = $id";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row = mysqli_fetch_array($dbresult)){
                if(isset($row['image'])){
                    $img = $row['image'];
                }
                else {
                    $img = "default.jpg";
                }
                
                $name = $row['emp_name'];
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


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <title>E-Pass Portal</title>
    
    <script>
        a=new AudioContext() // browsers limit the number of concurrent audio contexts, so you better re-useem
            function beep(vol, freq, duration){
            v=a.createOscillator()
            u=a.createGain()
            v.connect(u)
            v.frequency.value=freq
            v.type="square"
            u.connect(a.destination)
            u.gain.value=vol*0.01
            v.start(a.currentTime)
            v.stop(a.currentTime+duration*0.001)
            }
    </script>
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
                    <a href="index.html" class="logo">
                        <figure><img src="img/logo.png" alt=""></figure>E-Pass Portal</a>
                </div>
            </header>
            <div class="page-content">
                <div class="content-sticky-footer">
                    <div class="col-12  mt-3 mb-4">
                        <h2 class="text-uppercase font-weight-bold text-primary text-center">Pass Scanner</h2>
                        <h3><b class="text-primary" style="text-transform:uppercase;"><?php //echo $name; ?></b></h3>
                    </div>
                    <hr class="my-4">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <video id="preview" width="100%" height="100%"></video>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <input type="text" hidden name="text" id="text" readonly="" placeholder="Code" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-5">
                                <div id="display">
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
                    Instascan.Camera.getCameras().then(function(cameras){
                        if(cameras.length > 0 ){
                            scanner.start(cameras[0]);
                        } else{
                            alert('No cameras found');
                        }

                    }).catch(function(e) {
                        console.error(e);
                    });

                    scanner.addListener('scan',function(c){
                        document.getElementById('text').value=c;
                            $("#display").load("take_data.php",{perid : c});
                            beep(100, 520, 200);
                    });
                    

                    </script>






                </div>
                <div class="footer-wrapper shadow-15">
                    <div class="footer dark">
                        <div class="footer dark">
                            <div class="row mx-0">
                                <div class="col  text-center">
                                    &copy Copyright 2023, TransCity <figure><img src="img/logo.png" height="60px" width="60px" alt=""></figure>
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
