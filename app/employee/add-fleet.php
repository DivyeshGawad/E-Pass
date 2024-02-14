<?php
    include 'connect.php';
    if (isset($_POST['submit'])) {
        $empid = $_POST['emp_id'];
        $busno = $_POST['bus_no'];
        $route = $_POST['route'];
        $serv_type = $_POST['serv_type'];
        $date = date('Ymd');

            $stmt = $conn->prepare("INSERT INTO `trans_traffic`( `emp_id`, `bus`, `route`, `service_type`, `date`) VALUES (?,?,?,?,?)");
            $stmt ->bind_param("isssd", $empid, $busno,$route, $serv_type, $date);

            $stmt->execute();
    }
    else {
        header("location:fleet.php");
    }
    header("location:reader.php");
?>