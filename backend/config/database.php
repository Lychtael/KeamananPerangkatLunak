<?php
class Database {
    private static $host = "localhost";
    private static $db_name = "blog";
    private static $username = "root";
    private static $password = "";
    private static $conn;

    public static function connect() {
        if (self::$conn == null) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$db_name);
            if (self::$conn->connect_error) {
                die("Koneksi error: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
?>
