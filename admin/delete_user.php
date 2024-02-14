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
    $sql = "DELETE FROM `employee` WHERE `emp_id` = '$id'";
    if($dbresult = mysqli_query($conn, $sql)){
        header("Location: employee_list.php");
    }
    else{
        echo "Error";
    }
?>