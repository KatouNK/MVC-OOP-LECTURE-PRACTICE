<?php

namespace App\Controllers;

use App\Models\User;

class AdminController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /login');
            exit;
        }

        $users = $this->userModel->getUsers(); // Mendapatkan semua user yang sudah terdaftar
        require __DIR__ . '/../views/admin_dashboard.php';
    }
}
