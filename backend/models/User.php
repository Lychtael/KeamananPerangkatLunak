<?php

class User
{
    private $db;
    private $conn;

    public function __construct()
    {
        global $db; // Akses koneksi mysqli dari database.php
        $this->db = $db;
    }

    public function checkEmail($email)
    {
        $email = $this->db->real_escape_string($email);  // Escape input
        $sql = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $result = $this->db->query($sql);
        return (bool)$result->fetch_row()[0];
    }

    public function register($username, $first_name, $last_name, $email, $password)
    {
        $username = $this->db->real_escape_string($username); // Escape input
        $first_name = $this->db->real_escape_string($first_name); // Escape input
        $last_name = $this->db->real_escape_string($last_name); // Escape input
        $email = $this->db->real_escape_string($email);   // Escape input
        $password = $this->db->real_escape_string($password); // Escape input
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, first_name, last_name, email, password, created_at) VALUES ('$username', '$first_name', '$last_name', '$email', '$hashedPassword', NOW())";
        return $this->db->query($sql);
    }
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
