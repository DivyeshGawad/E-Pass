<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<body>
    <?php
        include 'connect.php';
        
        $uname = $_POST['supername'];
        $pass = $_POST['superpass'];
        

    
        //print_r($row);
        if($uname == "Admin" && md5($pass) == "e6e061838856bf47e1de730719fb2609")
        {
            echo "success";
            header("Location: admin_list.php"); 
        }
        else
        {
            echo "
            
            <div class='container'>
            <p class='text-center my-5'>
            <img src='img\logo.png'><br/>
            <h4 class='text-center'>Invalid Username/Password !</h4> 
            If your credentials are correct then you may not be verified yet. Please contact your admin to activate your profile <br/>
            <a class='btn btn-danger w-100' href='index.php'>Click Hear To Go Back </a>
            
            </p>
            </div>
            
            ";
        }
    ?>
</body>
</html>

