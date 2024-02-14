<?php
session_start();
if(isset($_SESSION["eid"])){
    $id = $_SESSION["eid"];
}
else{
    header("location:login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name ="msrtcepass";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php

    $perid = $_POST['perid'];
    $sql="SELECT * FROM user WHERE permit_id=$perid";
    if($dbresult = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($dbresult) > 0){
            while($row = mysqli_fetch_array($dbresult)){
                $pid = $row['permit_id'];
                $sql1="SELECT * FROM pass_cards WHERE permit_id=$pid";
                if ($result =mysqli_query($conn,$sql1)) {
                    if(mysqli_num_rows($result) > 0){
                        while ($row1 = mysqli_fetch_array($result)){
                            $exp = $row1['expiry'];
                            $date= date("Y-m-d");
                            if ($exp >= $date) {
                                
                                echo $row['f_name']." ".$row['l_name'];
                                echo '<span style="margin-left:5px;color:#fff; background-color:#5cb85c;border-radius:50%;" class="material-icons">done</span>
                                    <div class="col text-center my-5">
                                    <button type="submit" class="btn btn-success">Add Passenger</button>
                                    </div>
                                    
                                ';
                                

                            }
                            else{
                                echo "No data found OR Card Expired";
                            }
                        }
                    }
                }
                
            }
        } 
        else{
            echo "No records matching your query were found.";
        }
    } 
    else{

    } 
?>