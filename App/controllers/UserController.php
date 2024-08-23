<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function attendance() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userModel->markAttendance($_SESSION['user']['username']);
            $_SESSION['user']['attendance'] = date('Y-m-d H:i:s');
            $success = "Kehadiran Anda telah dicatat.";
        }

        require __DIR__ . '/../views/user_attendance.php';
    }
}
