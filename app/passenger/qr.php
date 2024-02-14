<?php 
    $time = $_SERVER['REQUEST_TIME'];
    include "phpqrcode\qrlib.php";
    $path = "image/";
    $file = $path.$time.'.png';
    $text = '';
    Qrcode::png($text,$file);
?>