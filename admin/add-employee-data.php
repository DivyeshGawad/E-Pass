<?php
    include "connect.php";
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
        /*$sql1 = "SELECT * FROM `admin` WHERE `id`= $id";
        if($result = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    print_r($row);
                    $addedby = $row['name'];
                    echo $addedby;
                }
            } 
        } 
        else{
            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
        }*/
    }
   
        $badge_no = $_POST['badge_no'];
        $name = $_POST['emp_name'];
        $Name = strtoupper($name);
        $email = $_POST['emp_email'];
        $contact = $_POST['emp_contact'];
        $depot = $_POST['depot'];
        $pass = $_POST['emp_pass'];
        $cpass = $_POST['emp_cpass'];
        if($pass == $cpass){
            $stmt = $conn->prepare("INSERT INTO `employee`(`badge_number`, `emp_name`, `email`, `depot`,`emp_contact`, `emp_password`) VALUES (?,?,?,?,?,?)");
            /* Prepared statement, stage 2: bind and execute */
            
            $stmt ->bind_param("ssssis", $badge_no, $Name, $email, $depot, $contact, md5($cpass));

            $stmt->execute();
            echo "<h1>Success</h1>";
        }else {
            echo 'password error <a href="'.$_SERVER['HTTP_REFERER'].'">Go Back</a>';
        }
        header("Location: employee_list.php");
    
?>