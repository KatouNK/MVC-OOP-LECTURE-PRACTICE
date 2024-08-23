<?php

// Memuat file konfigurasi untuk mendapatkan DI container
$container = require_once __DIR__ . '/../config/config.php';



// Rute untuk halaman login
if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $authController = $container->get('AuthController');
    $authController->login();
    exit;
}

// Rute untuk memproses login
if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = $container->get('AuthController');
    $authController->login();
    exit;
}

// Rute untuk logout
if ($_SERVER['REQUEST_URI'] === '/logout') {
    $authController = $container->get('AuthController');
    $authController->logout();
    exit;
}

// Rute untuk halaman dashboard admin
if ($_SERVER['REQUEST_URI'] === '/admin/dashboard') {
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        $adminController = $container->get('AdminController');
        $adminController->dashboard();
    } else {
        header('Location: /login');
    }
    exit;
}

// Rute untuk halaman absensi pengguna
if ($_SERVER['REQUEST_URI'] === '/user/attendance') {
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user') {
        $userController = $container->get('UserController');
        $userController->attendance();
    } else {
        header('Location: /login');
    }
    exit;
}

// Jika tidak ada rute yang cocok, tampilkan halaman 404
http_response_code(404);
echo "404 - Page Not Found";
