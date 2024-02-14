<?php 
    session_start();
    if(isset($_SESSION['admin'])){
       
    }
    else{
        header("location:index.php");
    }
    if(isset($_GET['id'])){
       
    }
    else{
        header("location:route_list.php");
    }
    
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "DELETE FROM `routes` WHERE `id` = '$id'";
    if($dbresult = mysqli_query($conn, $sql)){
        header("Location: route-list.php");
    }
    else{
        echo "Error";
    }
?>