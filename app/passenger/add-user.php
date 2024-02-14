<?php
        include "connect.php";
        
        $fname = $_POST['fname'];
        $Fname = strtoupper($fname);
        $lname = $_POST['lname'];
        $Lname = strtoupper($lname);
        $email = $_POST['e-mail'];
        $contact = $_POST['c_no'];
        $dob = $_POST['dob'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $gender = $_POST['gender'];
        
        if($pass == $cpass){
            $stmt = $conn->prepare("INSERT INTO `user`( `f_name`, `l_name`, `email`,  `mobile_no`,  `dob`, `password`, `gender`) VALUES (?,?,?,?,?,?,?)");
            /* Prepared statement, stage 2: bind and execute */
            $stmt ->bind_param("sssisss", $Fname, $Lname, $email, $contact, $dob, $cpass, $gender);

            $stmt->execute();
            echo "<h1>Success</h1>";
            header("location: login.php");
        }else {
            echo 'password error <a href="'.$_SERVER['HTTP_REFERER'].'">Go Back</a>';
        }
    
?>