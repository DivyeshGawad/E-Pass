<?php
    session_start();
    if(isset($_SESSION['admin'])){
        //$sql1 ="SELECT `depot` FROM `admin` WHERE 1";
        $aid = $_SESSION['admin'];
    }
    else{
        header("location:index.php");
    }
    include 'connect.php';
    $sql1 ="SELECT `depot` FROM `admin` WHERE `id` = $aid ";
    if($result = mysqli_query($conn, $sql1)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                //print_r($row);
                $depot = $row['depot'];
            }
        } 
    } 
    else{
        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="add-employee.css">
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
                <div class="col-12">
                    <!--Employee Registration Form Start-->
                    <div class=" align-items-center h-100">
                        <div class="container h-100">
                        <div class="row  justify-content-center align-items-center h-100">
                            <div class="col">
                            <div class="card" >
                                <div class=" p-5">
                                <h2 class="text-uppercase text-center mb-5">Add Routes</h2>
                                <form method="post" action="add-route-data.php">
                                    <div class="form-outline mb-4">
                                    <span class="text-danger">* Kindly Enter Source & Destinations in Capitals Only...!</span> 
                                    </div>    

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Service/Route Number <span class="text-danger">*</span></label>
                                    <input type="text" id="form3Example1cg" name="service_no" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Source <span class="text-danger">*</span></label>
                                    <input type="text" id="form3Example1cg" name="route_src" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Destination <span class="text-danger">*</span></label>
                                    <input type="text" id="form3Example3cg" name="route_dest" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Via (if any)</label>
                                    <input type="text" id="form3Example3cg" name="via" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Distance <small> (in KMs)</small><span class="text-danger">*</span></label>
                                    <input type="number" maxlength="3" id="form3Example3cg" name="distance" class="form-control form-control-lg" required/>
                                    </div>
                                    <div class=" justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg  mx-2" onclick="#!">Add</button>
                                    <button type="reset" class="btn btn-danger btn-block btn-lg  mx-2" onclick="#!">Reset</button>
                                    </div>

                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--Employee Registration Form End-->

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