<?php
    include "connect.php";
        $service = $_POST['service_no'];
        $source = $_POST['route_src'];
        $destination = $_POST['route_dest'];
        if(isset($_POST['via'])){
            $via = $_POST['via'];
        }
        else {
            $via = null;
        }
        $distance = $_POST['distance'];
        
        $stmt = $conn->prepare("INSERT INTO `routes`( `source`, `via`, `destination`, `distance`, `service_number`) VALUES (?,?,?,?,?)");
        $stmt ->bind_param("sssis", $source, $via, $destination, $distance, $service);
        $stmt->execute();
        
        $stmt = $conn->prepare("INSERT INTO `routes`( `source`, `via`, `destination`, `distance`, `service_number`) VALUES (?,?,?,?,?)");
        $stmt ->bind_param("sssis",$destination , $via, $source, $distance, $service);
        $stmt->execute();
        echo "<h1>Route is Successfully Added</h1>";
        header("location: route-list.php");
    
?>