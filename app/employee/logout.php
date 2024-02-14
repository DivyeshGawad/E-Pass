<?php

session_start();
unset($_SESSION['eid']);
header("Location: login.php");
?>