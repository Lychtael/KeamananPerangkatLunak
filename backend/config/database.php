<?php
// Konfigurasi database
$host = "localhost";
$dbname = "beauty_whimsy";
$username = "root";
$password = "";

// Buat koneksi ke database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
