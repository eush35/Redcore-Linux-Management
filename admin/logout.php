<?php
include("config/database.php");
@session_start();
    session_destroy();
    setcookie("kullanici", "", time()-1);
    echo "<script> window.location.href = '../login.php'; </script>";
?>