<?php 
    if(isset($_GET['id'])){
       
    }
    else{
        header("location:users_list.php");
    }
    
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "DELETE FROM `admin` WHERE `id` = '$id'";
    if($dbresult = mysqli_query($conn, $sql)){
        header("Location: admin_list.php");
    }
    else{
        echo "Error";
    }
?>