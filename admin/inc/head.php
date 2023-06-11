<?php 
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }
        include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
      
        ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Redcore Yönetim Paneli </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/favicon.ico">
    <link rel="stylesheet" href="/admin/assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/admin/assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="/admin/assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="/admin/assets/css/style.css" rel="stylesheet">
    <link href="/admin/assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="/admin/assets/css/simpleGauge.css" rel="stylesheet">

