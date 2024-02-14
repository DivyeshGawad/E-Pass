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
                $status = $row['status'];
                $per = $row['permit_id'];
                $aadhar = $row['aadhar_no'];
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
<!-- sidebar left start -->
<div class="sidebar sidebar-left">
    <div class="profile-link">
        <a href="#" class="media" style="text-decoration:none;">
            <div class="w-auto h-100">
                <figure class="avatar avatar-40"><img src="upload/profile/<?php echo $img; ?>" alt=""> </figure>
            </div>
            <div class="media-body">
                <h5 class=" mb-0" style="text-transform: uppercase;"> <?php echo $name; ?> <!--<span class="status-online bg-success">--></span></h5>
                <p>
                    <?php
                        if ($status==1) {
                            echo '<span style="color:green; text-align:right;"><i>Verified</i></span>';
                        }
                        else{
                            echo '<span style="color:red;text-align:right;"><i><b>Not Verified</i></b></span>';
                        }
                    ?>
                </p>
            </div>
        </a>
    </div>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a style="text-decoration:none;" href="index.php" class="sidebar-close">
                    <div class="item-title" style="text-decoration:none;">
                        <i class="material-icons">home</i> Dashboard
                    </div>
                </a>
            </li>
            <?php
                if ($status==1) {
                    
                }
                elseif (isset($aadhar)) {
                    echo '<li class="nav-item">
                            <a href="#" class="sidebar-close" style="text-decoration:none;">
                                <div class="item-title">
                                    <i class="material-icons">pages</i>Verification in process...
                                </div>
                            </a>
                        </li>';
                }
                else{
                    echo '<li class="nav-item">
                            <a href="verify.php" class="sidebar-close">
                                <div class="item-title">
                                    <i class="material-icons">pages</i>Verify Profile
                                </div>
                            </a>
                        </li>';
                }
            ?>
            <?php 
                if ($status==1) {
                    echo '
                    <li class="nav-item dropdown">
                    <a style="text-decoration:none;" href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="item-title">
                            <i class="material-icons">portrait</i> Pass
                        </div>
                    </a>
                    <div class="dropdown-menu">';
                        
                            if(isset($per)){
                                echo '<a style="text-decoration:none;" href="cards.php" class="sidebar-close dropdown-item popup-open">
                                        View My Pass
                                    </a>';
                            }
                            else{
                                echo '<a style="text-decoration:none;" href="apply-next.php" class="sidebar-close  dropdown-item">Apply for New Pass</a>';
                            }
                        
                    echo '</div>
                </li>
                    ';
                }else{
                    //show nothing
                }
            ?>
            
            <li class="nav-item">
                <a style="text-decoration:none;" href="aboutus.php" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">domain</i> About Us
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a style="text-decoration:none;" href="contactus.html" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">phone</i> Contact Us
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="profile-link text-center">
        <a style="text-decoration:none;" href="logout.php" class="btn btn-link text-white btn-block">Logout</a>
    </div>
</div>
<!-- sidebar left ends -->
       