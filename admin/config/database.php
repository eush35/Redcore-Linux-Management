<?php
// Veritabanı bilgileri
$host = "localhost";
$username = "admin";
$password = "yg.nDPDQ7[wcks3Q";
$dbname = "proje";

try {
    // PDO nesnesi oluştur ve veritabanına bağlan
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Hata mesajını yazdır ve errors/db-conn.php sayfasına yönlendir
    if (!isset($_SESSION['db_error'])) {
        $_SESSION['db_error'] = true;
        header("Location: /errors/db-conn.php");
        exit;
    } else {
        echo 'Veritabanı bağlantı hatası: ' . $e->getMessage();
    }
}

try {
    $stmt = $pdo->query("SELECT * FROM users");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Tablo bulunamadığı hatasını yakala ve errors/table-nf.php sayfasına yönlendir
    if ($e->getCode() == "42S02") {
        header("Location: /errors/table-nf.php");
        exit;
    } else {
        echo 'Tablo bağlantı hatası: ' . $e->getMessage();
    }
}
// Diğer işlemler
?>
