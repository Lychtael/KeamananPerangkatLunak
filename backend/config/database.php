<?php
class Database {
    private static $host = 'localhost';   // Sesuaikan dengan database server kamu
    private static $db_name = 'beauty_whimsy'; // Nama database
    private static $username = 'root';    // Username database
    private static $password = '';        // Password database (kosong jika default XAMPP)
    private static $conn = null;

    // Koneksi ke database menggunakan PDO
    public static function connect() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi database gagal: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
