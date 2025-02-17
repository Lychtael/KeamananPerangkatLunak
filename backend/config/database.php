<?php
class Database
{
    private $host = "localhost";
    private $db_name = "blog"; // Ganti dengan nama database Anda
    private $username = "root"; // Ganti dengan username database Anda
    private $password = ""; // Ganti dengan password database Anda
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Koneksi error: " . $this->conn->connect_error);
            return false; // Penting untuk mengembalikan false jika koneksi gagal
        }
        return $this->conn;
    }
}

$database = new Database();
$db = $database->connect();
