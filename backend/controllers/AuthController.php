<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php'; // Pastikan ini didefinisikan sebelum digunakan
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

    // public function login()
    // {
    //     global $db; // Pastikan $db diakses secara global

    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         http_response_code(405);
    //         echo "Metode tidak diizinkan"; // PESAN ERROR TEXT BIASA
    //         return;
    //     }

    //     $email = htmlspecialchars(trim($_POST['email'])); // Gunakan email untuk login
    //     $password = $_POST['password'];

    //     if (empty($email) || empty($password)) {
    //         http_response_code(400);
    //         echo "Email dan password harus diisi"; // PESAN ERROR TEXT BIASA
    //         return;
    //     }

    //     // Tambahkan logging di sini!  Penting untuk debugging
    //     error_log("Mencoba login dengan email: " . $email);

    //     $user = $this->userModel->getUserByEmail($email); // Dapatkan user berdasarkan email

    //     if (!$user) {
    //         error_log("User tidak ditemukan dengan email: " . $email);
    //         http_response_code(401);
    //         echo "Email atau password salah"; // PESAN ERROR TEXT BIASA
    //         return;
    //     }

    //     // Tambahkan logging di sini untuk memeriksa data user
    //     error_log("Data User dari Database: " . print_r($user, true));

    //     // Verifikasi password
    //     if (password_verify($password, $user['password'])) {
    //         // Login berhasil
    //         session_start();
    //         $_SESSION['user_id'] = $user['id'];
    //         $_SESSION['username'] = $user['username'];

    //         // Redirect ke index.php setelah login berhasil
    //         header("Location: ../../index.php");
    //         exit();  // Penting untuk menghentikan eksekusi skrip setelah redirect
    //     } else {
    //         // Password salah
    //         error_log("Verifikasi password gagal untuk email: " . $email);
    //         http_response_code(401);
    //         echo "Email atau password salah"; // PESAN ERROR TEXT BIASA
    //     }
    // }

    public function logout()
    {
        // (Kode logout Anda - tidak berubah)
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
        echo "Action tidak valid"; // PESAN ERROR TEXT BIASA
    }
} else {
    http_response_code(400);
    echo "Action tidak didefinisikan"; // PESAN ERROR TEXT BIASA
}
