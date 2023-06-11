<?php
include("database.php");
// Tüm ayarları yükle ve değişkenlere ata
$sorgu = "SELECT * FROM settings";
$stmt = $pdo->prepare($sorgu);
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

// Değişkenleri atayın
$serverID = $settings['ID'];
$serverName = $settings['serverName'];
$serverWebsite = $settings['serverWebsite'];
$serverIP = $settings['serverIP'];
$serverOwner = $settings['serverOwner'];
$serverMail = $settings['serverMail'];
$serverOwner = $settings['serverOwner'];
$serverStatus = $settings['serverStatus'];

// Websocket
?>