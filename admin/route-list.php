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
    $sql = "SELECT * FROM `routes`";
                                 
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
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Service/Route Number</th>
                                            <th>Route Name</th>
                                            <th>Via</th>
                                            <th>Distance</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if($dbresult = mysqli_query($conn, $sql)){
                                                $i=0;
                                                if(mysqli_num_rows($dbresult) > 0){
                                                    while($row = mysqli_fetch_array($dbresult)){
                                                        if($row['status'] == 1){
                                                            $status = 'Active';
                                                        }
                                                        else {
                                                            $status = 'Deactive';
                                                        }
                                                        echo'<tr>
                                                            <td>'.$row['service_number'].'</td>
                                                            <td>'.$row['source'].' '.$row['destination'].'</td>
                                                            <td>'.$row['via'].'</td>
                                                            <td>'.$row['distance'].'</td>
                                                            
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
                                                                <p><strong>Service No. -</strong><span>'.$row['service_number'].'<span></p>
                                                                <p><strong>Name -</strong><span>'.$row['source']."<-->".$row['destination'].'</span></p>
                                                                <p><strong>Via -</strong><span>'.$row['via'].'<span></p>
                                                                <p><strong>Distance -</strong><span>'.$row['distance'].' KMs<span></p>
                                                                <p><strong>Status -</strong><span>'.$status.'<span></p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-secondary" href = "view_routes.php?id='.$row['id'].'">view</a>
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
                                            <th>Service Number</th>
                                            <th>Name</th>
                                            <th>Via</th>
                                            <th>Distance</th>
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