<?php 
    session_start();
    //if(isset($_SESSION['admin'])){
        
    //}
    //else{
    //    header("location:index.php");
    //}
    include 'connect.php';
    $sql = "SELECT * FROM `employee` WHERE 1";
                                 
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
                    <h2>SUPER ADMIN | EMPLOYEE LIST</h2>
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Badge Number</th>
                                            <th>Depot/Bus Station</th>
                                            <th class="no-content"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($dbresult = mysqli_query($conn, $sql)){
                                                $i=0;
                                                if(mysqli_num_rows($dbresult) > 0){
                                                    while($row = mysqli_fetch_array($dbresult)){
                                                        echo'<tr>
                                                            <td>'.$row['emp_name'].'</td>
                                                            <td>'.$row['badge_number'].'</td>
                                                            <td>'.$row['depot'].'</td>
                                                        
                                                        
                                                        <!-- Button trigger modal -->
                                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal'.$i.'">
                                                          View
                                                        </button></td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">More Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p><strong>Name -</strong><span>'.$row['emp_name'].'<span></p>
                                                                <p><strong>Badge Number -</strong><span>'.$row['badge_number'].'<span></p>
                                                                <p><strong>E-mail -</strong><span>'.$row['email'].'<span></p>
                                                                <p><strong>Contact Number -</strong><span>'.$row['emp_contact'].'<span></p>
                                                                <p><strong>Depot/Bus Station Name -</strong><span>'.$row['depot'].'<span></p>
                                                                <p><strong>Status -</strong><span>'.$row['status'].'<span></p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-secondary" href = "view_employee.php?id='.$row['emp_id'].'">Manage</a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>';
                                                        $i++;
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
                                        
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Badge Number</th>
                                            <th>Depot/Bus Station</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
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