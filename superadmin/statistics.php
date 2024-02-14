<?php 
    
    include 'connect.php';
    $sql = "SELECT * FROM `trans_traffic` WHERE 1";
                                 
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
                        <h2>SUPER ADMIN | STATISTICS</h2>
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Route Name</th>
                                            <th>Bus Number</th>
                                            <th>Bus Type</th>
                                            <th>Date</th>
                                            <th>Traffic</th>
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
                                                            <td>'.$row['route'].'</td>
                                                            <td>'.$row['bus'].'</td>
                                                            <td>'.$row['service_type'].'</td>
                                                            <td>'.$row['date'].'</td>
                                                            <td>'.$row['footfall'].'</td>
                                                        </tr>';
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
                                            <th>Bus Type</th>
                                            <th>Date</th>
                                            <th>Traffic</th>
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