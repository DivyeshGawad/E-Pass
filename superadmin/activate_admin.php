<?php 
    if(isset($_GET['id'])){
       
    }
    else{
        header("location:users_list.php");
    }
    
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "UPDATE `admin` SET `status`=1 WHERE `id` = '$id'";
    if(mysqli_query($conn, $sql)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else{
        echo "Error";
    }
?>