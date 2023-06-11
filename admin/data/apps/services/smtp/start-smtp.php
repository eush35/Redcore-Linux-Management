<?php
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
$output = shell_exec('sudo systemctl start postfix 2>&1');
echo $output;
?>