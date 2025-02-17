<?php
// AuthController.php

header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
            return;
        }

        $username = htmlspecialchars(trim($_POST['username'] ?? ''));
        $first_name = htmlspecialchars(trim($_POST['first_name'] ?? ''));
        $last_name = htmlspecialchars(trim($_POST['last_name'] ?? ''));
        $email = htmlspecialchars(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Semua field harus diisi']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid']);
            return;
        }

        if ($this->userModel->checkEmail($email)) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'message' => 'Email sudah terdaftar']);
            return;
        }

        if ($this->userModel->register($username, $first_name, $last_name, $email, $password)) {
            http_response_code(201);
            echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Registrasi gagal']);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Email dan password harus diisi']);
            return;
        }

        $user = $this->userModel->getUserByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Email atau password salah']);
            return;
        }

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo json_encode(['status' => 'success', 'message' => 'Login berhasil']);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        echo json_encode(['status' => 'success', 'message' => 'Logout berhasil']);
    }
}

// Routing berdasarkan parameter 'action'
$database = new Database();
$db = $database->connect();
$auth = new AuthController($db);

$action = $_GET['action'] ?? '';

if (method_exists($auth, $action)) {
    $auth->$action();
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Action tidak valid']);
}
