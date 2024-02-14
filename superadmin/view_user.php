<?php 
    session_start();
    if(isset($_GET['id'])){
        
    }
    else{
        header("location:users_list.php");
    }
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "SELECT * FROM `user` WHERE `id` = '$id' ";
    
                                 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php'; ?>
</head>
<body>
    
    <?php include 'nav.php'; ?>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <?php include 'sidebar.php'; ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                 <?php
                                    if($dbresult = mysqli_query($conn, $sql)){
                                        if(mysqli_num_rows($dbresult) > 0){
                                            while($row = mysqli_fetch_array($dbresult)){
                                                //print_r ($row);
                                                if($row['status'] == 1){
                                                    $act = 'Verified';
                                                }
                                                else{
                                                    $act = 'Not Verified';
                                                }
                                                $img = $row['image'];
                                                echo '<div class="container">
                                                    <div class = "row" >
                                                        <div class = "col-12" >
                                                        <div class="profile">
                                                            <img src="app/passenger/upload/profile/'.$row['image'].'" alt="profile">
                                                        </div>
                                                        <p><strong>Name -</strong><span>'.$row['f_name'].' '.$row['l_name'].'<span></p>
                                                        <p><strong>Gender -</strong><span>'.$row['gender'].'<span></p>
                                                        <p><strong>Date of Birth -</strong><span>'.$row['dob'].'<span></p>
                                                        <p><strong>Contact -</strong><span>'.$row['mobile_no'].'<span></p>
                                                        <p><strong>Aadhar -</strong><span>'.$row['aadhar_no'].'<span></p>
                                                        <p><strong>Email -</strong><span>'.$row['email'].'<span></p>
                                                        <p><strong>Address -</strong><span>'.$row['address'].'<span></p>
                                                        <p><strong>Status -</strong><span>'.$act.'<span></p>
                                                            
                                                        </div>
                                                        <div class = "col-12">
                                                            <a type="button" class = "btn btn-success" href = "activate_user.php?id='.$row['id'].'">Activate</a>
                                                            <a type="button" class = "btn btn-primary" href = "deactivate_user.php?id='.$row['id'].'">De-activate</a>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modala">
                                                              Delete User
                                                            </button>
                                                        
                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modala" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">More Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p>Are You sure want to delete '.$row['f_name'].' '.$row['l_name'].'`s user</p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-secondary" href = "delete_user.php?id='.$row['id'].'">Delete</a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                            // Free result set
                                            //mysqli_free_result($result);
                                        } 
                                        else{
                                            //echo "No records matching your query were found.";
                                        }
                                    } 
                                    else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php include 'footer.php'; ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <?php include 'script.php'; ?>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>