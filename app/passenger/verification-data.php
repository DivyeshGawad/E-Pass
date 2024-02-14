<?php
        include 'connect.php';
        session_start();
        if(isset($_SESSION["id"])){
            $id = $_SESSION["id"];
        }
        else{
            header("location:login.php");
        }
        $sql = "SELECT * FROM `user` WHERE `id` = $id";
        if($dbresult = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($dbresult) > 0){
                while($row = mysqli_fetch_array($dbresult)){
                    $password = $row['password'];
                }
            } 
            else{
                //echo "No records matching your query were found.";
            }
        } 
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        //------password confarmation---------------
        $pass = $_POST['pass'];
        if($password == $pass){
            
            if(isset($_FILES['img'])){
                $errors= array();
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_tmp = $_FILES['img']['tmp_name'];
                $file_type = $_FILES['img']['type'];
                $file_ext = strtolower(end(explode('.',$_FILES['img']['name'])));
                $new_name = time();
                $extensions = array("jpeg","jpg","png");
                
                if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 200000) {
                $errors[]='File size must be excately 200 KB';
                }
                
                if(empty($errors)==true) {
                    $name = $new_name.'.'.$file_ext;
                    move_uploaded_file($file_tmp,"upload/profile/".$name);
                    $address = $_POST['address'];
                    $aadhar = $_POST['adhaar_no'];
                    $stmt = $conn->prepare("UPDATE `user` SET `aadhar_no`=?, `address`=?, `image`=? WHERE `id`=$id");
                    /* Prepared statement, stage 2: bind and execute */
                    $stmt ->bind_param("iss", $aadhar, $address, $name);
                    $stmt->execute();
                    echo "<h1>Success</h1>";
                    header("location: index.php");
                }else{
                print_r($errors);
                die();
                }
            }
        }
        else {
            die("<script> alert('Wrong Password ! try again'); window.location.href = 'verify.php';</script>");
        }
        //------password confarmation end---------------
    
?>