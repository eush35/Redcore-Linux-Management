<?php 
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
header("Location: /login.php");
exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
?>

            <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="/admin/assets/images/redhope.png" alt="">
                <img class="logo-compact" src="#/admin/assets/images/redhope.png" alt="">
                <img class="brand-title" src="/admin/assets/images/redcore.png" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
                </div>
             </div>

             