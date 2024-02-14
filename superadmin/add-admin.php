<?php 
    include 'connect.php';
    $sql = "SELECT * FROM `employee` WHERE 1";
                                 
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
                <!--Employee Registration Form Start-->
                <div class=" align-items-center h-100">
                    <div class="container h-100">
                    <h1 class="text-uppercase text-center mb-5">Admin Registration</h1>
                    <div class="row  justify-content-center align-items-center h-100 w-100">
                        <div class="col-12">
                        <div class="card" style="border-radius: 10px; width: 1000px;">
                            <div class=" p-5">
                            <form method="post" action="add-admin-data.php">
                                <div class="form-outline mb-4">
                                <label class="form-label">Admin Name</label>
                                <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" required/>
                                </div>

                                <!--<div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Employee DOB</label>
                                <input type="date" id="form3Example1cg" name="emp_dob" class="form-control form-control-lg" required/>
                                </div>-->

                                <div class="form-outline mb-4">
                                <label class="form-label" >Username</label>
                                <input type="text"  name="username" class="form-control form-control-lg" required/>
                                </div> 

                                <div class="form-outline mb-4">
                                <label class="form-label" >Depot Name</label>
                                <input type="text" id="form3Example3cg" name="depot" class="form-control form-control-lg" required/>
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" >Contact Number</label>
                                <input type="number" id="form3Example3cg" name="contact" class="form-control form-control-lg" required/>
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" >Allot a Password</label>
                                <input type="password" name="pass" class="form-control form-control-lg" required/>
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" >Confirm your password</label>
                                <input type="password" name="cpass" class="form-control form-control-lg" required/>
                                </div>
                                <div class=" justify-content-center">
                                <button type="submit" class="btn btn-success btn-block btn-lg  mx-2" onclick="#!">Register</button>
                                <button type="reset" class="btn btn-danger btn-block btn-lg  mx-2" onclick="#!">Cancel</button>
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