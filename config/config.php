<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use App\Models\User;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\UserController;

// Membuat instance ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Menambahkan definisi dependensi
$containerBuilder->addDefinitions([
    'User' => \DI\autowire(User::class),
    'AuthController' => \DI\autowire(AuthController::class),
    'AdminController' => \DI\autowire(AdminController::class),
    'UserController' => \DI\autowire(UserController::class),
]);

// Membangun container
$container = $containerBuilder->build();

// Fungsi untuk memuat data pengguna dari file config/users.php
function getUserData() {
    return include __DIR__ . '/users.php';
}

// Fungsi untuk menyimpan data pengguna kembali ke file config/users.php
function saveUserData($users) {
    $data = "<?php\n\nreturn " . var_export($users, true) . ";\n";
    file_put_contents(__DIR__ . '/users.php', $data);
}

// Mengembalikan container
return $container;
