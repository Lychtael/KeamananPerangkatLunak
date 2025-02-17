<?php

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db; // Gunakan koneksi dari parameter
    }

    public function checkEmail($email)
    {
        $sql = "SELECT id FROM users WHERE email = ? LIMIT 1"; // Ambil id saja (lebih efisien)
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->num_rows > 0; // Jika ada baris, berarti email sudah ada
    }
    

    public function register($username, $first_name, $last_name, $email, $password)
    {
        $sql = "INSERT INTO users (username, first_name, last_name, email, password, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssss", $username, $first_name, $last_name, $email, $hashedPassword);
        
        return $stmt->execute();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id, username, first_name, last_name, email, password FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
