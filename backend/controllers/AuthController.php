<?php
// AuthController.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php';
require_once '../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
            return;
        }

        $first_name = htmlspecialchars(trim($_POST['first_name']));
        $last_name = htmlspecialchars(trim($_POST['last_name']));
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];

        // Validasi input
        if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password)) {
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

        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($this->userModel->register($username, $first_name, $last_name, $email, $hashedPassword)) {
            http_response_code(201);
            echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Registrasi gagal']);
        }
    }

    public function login()
    {
        global $db;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan']);
            return;
        }

        $email = htmlspecialchars(trim($_POST['email']));
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Email dan password harus diisi']);
            return;
        }

        error_log("Mencoba login dengan email: " . $email);

        $user = $this->userModel->getUserByEmail($email);

        if (!$user) {
            error_log("User tidak ditemukan dengan email: " . $email);
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Email atau password salah']);
            return;
        }

        error_log("Data User dari Database: " . print_r($user, true));

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            echo json_encode(['status' => 'success', 'message' => 'Login berhasil']);
        } else {
            error_log("Verifikasi password gagal untuk email: " . $email);
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Email atau password salah']);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ../../login.html");
        exit();
    }
}

// Routing sederhana berdasarkan parameter 'action'
if (isset($_GET['action'])) {
    $auth = new AuthController();
    $action = $_GET['action'];

    if (method_exists($auth, $action)) {
        $auth->$action();
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Action tidak valid']);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Action tidak didefinisikan']);
}
