<?php
    include "connect.php";
        $name = $_POST['name'];
        // $email = $_POST['emp_email'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $depot = $_POST['depot'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($pass == $cpass){
            $stmt = $conn->prepare("INSERT INTO `admin` (`name`, `username`, `depot`, `password`, `contact`) VALUES (?,?,?,?,?)");
            /* Prepared statement, stage 2: bind and execute */
            
            $stmt ->bind_param("ssssi", $name, $username, $depot, md5($cpass), $contact);

            $stmt->execute();
            echo "<h1>Success</h1>";
            header("location:admin_list.php");
        }else {
            echo 'password error <a href="'.$_SERVER['HTTP_REFERER'].'">Go Back</a>';
        }
    
?>