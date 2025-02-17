<?php
class Database
{
    private static $host = "localhost";
    private static $db_name = "blog"; // Ganti dengan nama database Anda
    private static $username = "root"; // Ganti dengan username database Anda
    private static $password = ""; // Ganti dengan password database Anda
    private static $conn = null;

    public static function connect()
    {
        if (self::$conn === null) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$db_name);

            if (self::$conn->connect_error) {
                die("Koneksi error: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }

    public static function disconnect()
    {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>
