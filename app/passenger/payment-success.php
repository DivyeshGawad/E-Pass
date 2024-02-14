<?php
    
    session_start();
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    }
    else{
        header("location:login.php");
    }
    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $serv_type = $_POST['serv_type'];
    $duration = $_POST['duration'];
    switch ($duration) {
        case '1':
            $date=date_create(date('m/d/y'));
            date_add($date,date_interval_create_from_date_string("30 days"));
            $expiry = date_format($date,"Ymd");
        break;
        case '2':
            $date=date_create(date('m/d/y'));
            date_add($date,date_interval_create_from_date_string("60 days"));
            $expiry = date_format($date,"Ymd");
        break;
        case '3':
            $date=date_create(date('m/d/y'));
            date_add($date,date_interval_create_from_date_string("90 days"));
            $expiry = date_format($date,"Ymd");
        break;
        case '6':
            $date=date_create(date('m/d/y'));
            date_add($date,date_interval_create_from_date_string("180 days"));
            $expiry = date_format($date,"Ymd");
        break;
    }
    $pass_id = time();


    //--------------------QR generater-------------------------
    
    include "phpqrcode/qrlib.php";
    $path = "upload/qr/";
    $qr_name = $pass_id.'.png';
    $file = $path.$qr_name;
    $text = $pass_id;
    Qrcode::png($text,$file);


    include 'connect.php';
    if (isset($qr_name)) {
        //------------passing data to DB-------------------
        $stmt = $conn->prepare("INSERT INTO `pass_cards` (`permit_id`, `source`, `destination`, `service_type`, `expiry`, `qr`) VALUES(?,?,?,?,?,?)");
        $stmt ->bind_param("ssssds", $pass_id, $src, $dest, $serv_type, $expiry, $qr_name);
        $stmt->execute();

        $stmt1 = $conn->prepare("UPDATE `user` SET `permit_id`=? WHERE `id`=$id");
        $stmt1 ->bind_param("s", $pass_id);
        $stmt1 ->execute();
        header("location:cards.php");
    }
    else{
        header("apply-next.php");
    }

?>