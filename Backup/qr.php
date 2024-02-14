<?php 
    $time = $_SERVER['REQUEST_TIME'];
    include "phpqrcode\qrlib.php";
    $path = "image/";
    $file = $path.$time.'.png';
    $text = '20/09/2021';
    Qrcode::png($text,$file);
?>