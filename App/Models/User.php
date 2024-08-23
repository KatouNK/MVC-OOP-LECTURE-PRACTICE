<?php

namespace App\Models;

class User {
    private $users;

    public function __construct() {
        $this->users = $this->getUserData();
    }

    // Fungsi untuk memuat data pengguna dari file
    private function getUserData() {
        return include __DIR__ . '/../../config/users.php';
    }

    // Fungsi untuk menyimpan data pengguna ke file
    private function saveUserData($users) {
        $data = "<?php\n\nreturn " . var_export($users, true) . ";\n";
        file_put_contents(__DIR__ . '/../../config/users.php', $data);
    }

    public function register($data) {
        // Implementasi registrasi, misalnya:
        $this->users[] = $data;
        $this->saveUserData($this->users);
    }

    public function login($username, $password) {
        foreach ($this->users as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    public function markAttendance($username) {
        foreach ($this->users as &$user) {
            if ($user['username'] === $username) {
                $user['attendance'] = date('Y-m-d H:i:s');
                $this->saveUserData($this->users); // Simpan perubahan ke file
                break;
            }
        }
    }

    public function getUsers() {
        return $this->users;
    }
}
