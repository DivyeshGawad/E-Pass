<?php
        // include 'connect.php';
        // session_start();
        // if(isset($_SESSION["id"])){
        //     $id = $_SESSION["id"];
        // }
        // else{
        //     header("location:login.php");
        // }
        // $sql = "SELECT * FROM `user` WHERE `id` = $id";
        // if($dbresult = mysqli_query($conn, $sql)){
        //     if(mysqli_num_rows($dbresult) > 0){
        //         while($row = mysqli_fetch_array($dbresult)){
        //             $password = $row['password'];

        //         }
        //     } 
        //     else{
        //         //echo "No records matching your query were found.";
        //     }
        // } 
        // else{
        //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        // }
        // $pass = $_POST['password'];
        // if ($pass == $password) {
        //     // Every
        // }
?>





<?php
    $src = $_POST['source'];
    $dest = $_POST['destination'];
    $serv_type = $_POST['serv_type'];
    $duration = $_POST['duration'];
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
                    $password = $row['password'];
                }
                else {
                    $img = "default.jpg";
                    $password = $row['password'];
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
    //-------------------passwrd verification-----------------

    $pass = $_POST['pass'];
    if ($pass == $password) {
        //everthing is fine do nothing
    }
    else {
        die("<script> alert('Wrong Password or User not Verified at the momoent. try again'); window.location.href = 'apply-next.php';</script>");
    }

    //--------------------src dst check----------------------
    $sql = "SELECT * FROM `routes` WHERE `source`='$src' AND `destination`= '$dest'";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row0 = mysqli_fetch_array($dbresult)){
                $dist = $row0['distance'];
            }
        } 
        else{
            die("<script> alert('No Data found..!'); window.location.href = 'apply-next.php';</script>");
        }
    } 
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    //--------------algo--------------
    
    $d = $dist;
    if ($serv_type == 'ORDINARY') {
        $b = 180;
        if ($d < 40) {
            $m = 10;
        }elseif (60>=$d && $d>=40) {
            $m=9;
        }elseif (80>=$d && $d>60) {
            $m=8;
        }elseif (100>=$d && $d>80) {
            $m=7;
        }else {
            $m=7;
        }
    }else {
        $b = 250;
        if ($d < 30) {
            $m = 10;
        }elseif (50>$d && $d>=30) {
            $m=9;
        }elseif (70>$d && $d>50) {
            $m=8;
        }elseif (100>$d && $d>=70) {
            $m=7;
        }else {
            $m=7;
        }
    }
    
    $c = ($d/6)*7.2*$m;
    $t = ceil($c+$b)*$duration;
    if ($duration >= 3) {
        $t2 = $t*0.05;
        $total = ceil($t - $t2);
    }else {
        $total = $t;
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
                                <div class="menulist">
                                    <ul>
                                        <li>
                                            <a href="index.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">poll</i> Dashboard
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="projects.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">add_shopping_cart</i> Projects
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="project-detail.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">filter_none</i> Details
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">person</i> Profile
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="aboutus.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">domain</i> About
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="component.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">pages</i> Component
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                        <h5 class="text-uppercase font-weight-bold text-primary">Confirm your details please..! </h5>
                        <form class="form-row" action="payment-success.php" method="POST">
                            <div class="form-group col-6 my-3">
                                <label for="source"><h6>City 1 : </h6></label>
                                <input type="text" class="form-control" name="src" value="<?php echo $src; ?>" readonly>
                            </div>
                            <div class="form-group col-6 my-3">
                                <label for="dest"><h6>City 2 : </h6></label>
                                <input type="text" class="form-control" name="dest" value="<?php echo $dest; ?>" readonly>
                            </div>
                            <div class="form-group col-6 my-3">
                                <label for="serv_type"><h6>Service Type : </h6></label>
                                <input type="text" class="form-control" name="serv_type" value="<?php echo $serv_type; ?>" readonly>
                            </div>
                            <div class="form-group col-6 my-3">
                                <label for="dist"><h6>Distance : </h6></label>
                                <input type="text" class="form-control" name="dist" value="<?php echo $dist.' KMs'; ?>" readonly>
                            </div>
                            <div class="form-group col-6 my-3">
                                <label for="amount"><h6>Fare : </h6></label>
                                <input type="text" class="form-control float-left" name="amount" value="<?php echo $total; ?>" readonly>
                            </div>
                            <div class="form-group col-6 my-3">
                                <label for="duration"><h6>Duration (Month(s)): </h6></label>
                                <input type="text" class="form-control float-right" name="duration" value="<?php echo $duration; ?>" readonly>
                            </div>
                            <div class="mx-auto my-4">
                                <a  href="apply-next.php" class="btn btn-primary mr-2">Go Back</a>
                                <button type=submit class="btn btn-info ml-2">Pay now</button>
                            </div>
                        </form>
                    </div>
                    
                    <br>
                </div>
                <div class="footer-wrapper shadow-15">
                    <div class="footer">
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
