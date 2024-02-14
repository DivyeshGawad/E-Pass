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
        header("location:expired-cards.php");
    }
    
    $id = $_GET['id'];
    $per = $_GET['permit'];
    //echo "$id";
    include 'connect.php';

    $sql2 = "UPDATE `user` SET `permit_id`=NULL WHERE `permit_id` = $per";
        if($result = mysqli_query($conn, $sql2)){
            
        }
        else{
            echo "Error";
        }
    $sql = "DELETE FROM `pass_cards` WHERE `id` = $id";
    if($dbresult = mysqli_query($conn, $sql)){
        header("Location: expired-cards.php");
    }
    else{
        echo "Error";
    }
?>