<?php
    include 'connect.php';
    if(isset($_POST['submit']))
    {
    $uid = $_POST['id'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM `user` WHERE `email`='$uid' AND `password`='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
     if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        echo "session created session id is".$row['id'];
        header("Location: index.php"); 
    }
    else
    {
        echo "Invalid Contact Number/Password <br/> <a href=".$_SERVER['HTTP_REFERER'].">click hear </a> to go back and login again";
    }
}
?>