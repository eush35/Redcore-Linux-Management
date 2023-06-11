<?php
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/database.php');
if ($_POST) {
    $kullaniciID = $_POST['kullanici'];
    $suankiParola = $_POST['suankiParola'];
    $yeniParola = $_POST['yeniParola'];
    $yeniParolaTekrar = $_POST['yeniParolaTekrar'];

    // Şifrelerin eşleştiğini ve yeni şifrenin geçerli olduğunu kontrol edelim
    if ($yeniParola != $yeniParolaTekrar) {
        echo '<script>';
        echo 'alert("Yeni parolalar eşleşmiyor.");';
        echo 'window.location.href = "/admin/data/rcsettings.php";';
        echo '</script>';
        exit;
    }

    // Kullanıcının mevcut şifresini kontrol etmek için gerekli sorguyu gerçekleştirelim
    $sorgu = "SELECT userPassword FROM users WHERE ID = :kullaniciID";
    $stmt = $pdo->prepare($sorgu);
    $stmt->bindParam(':kullaniciID', $kullaniciID);
    $stmt->execute();
    $gelenSifre = $stmt->fetchColumn();

    // Gelen veritabanı şifresini doğrulayalım
    if (!password_verify($suankiParola, $gelenSifre)) {
        echo '<script>';
        echo 'alert("Şuanki parola yanlış!");';
        echo 'window.location.href = "/admin/data/rcsettings.php";';
        echo '</script>';
        exit;
    }

    // Yeni parolayı hashleyelim
    $yeniParolaHash = password_hash($yeniParola, PASSWORD_DEFAULT);

    // Kullanıcının şifresini güncellemek için gerekli sorguyu gerçekleştirelim
    $sorgu = "UPDATE users SET userPassword = :yeniParola WHERE ID = :kullaniciID";
    $stmt = $pdo->prepare($sorgu);
    $stmt->bindParam(':yeniParola', $yeniParolaHash);
    $stmt->bindParam(':kullaniciID', $kullaniciID);
    $stmt->execute();

    echo '<script>';
    echo 'alert("Kullanıcı başarıyla güncellendi!");';
    session_destroy();
    setcookie("kullanici", "", time()-1);
    echo 'window.location.href = "/admin/index.php";';
    echo '</script>';
    
}


?>
