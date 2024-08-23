<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function login() {
        session_start();

        // Jika pengguna sudah login, arahkan mereka ke halaman yang sesuai
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] === 'admin') {
                header('Location: /admin/dashboard');
            } else {
                header('Location: /user/attendance');
            }
            exit;
        }

        // Jika form login disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);

            if ($user) {
                // Login berhasil, simpan informasi user ke session
                $_SESSION['user'] = $user;

                // Arahkan ke halaman yang sesuai
                if ($user['role'] === 'admin') {
                    header('Location: /admin/dashboard');
                } else {
                    header('Location: /user/attendance');
                }
                exit;
            } else {
                // Login gagal, tampilkan pesan error
                $error = "Username atau password salah.";
            }
        }

        // Tampilkan halaman login
        require __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy(); // Hapus semua data session

        // Redirect ke halaman login setelah logout
        header('Location: /login');
        exit;
    }
}
