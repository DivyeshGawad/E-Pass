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
        header("location:user_list.php");
    }
    
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "UPDATE `employee` SET `status`=0 WHERE `emp_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else{
        echo "Error";
    }
?>