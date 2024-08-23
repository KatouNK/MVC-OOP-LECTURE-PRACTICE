<?php

// Autoload file dari Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Debugging: pastikan autoload berhasil
echo "Autoload berhasil<br>";

// Memuat file konfigurasi
$container = require_once __DIR__ . '/../config/config.php';

// Debugging: pastikan konfigurasi berhasil dimuat
if ($container === false) {
    echo "Gagal memuat konfigurasi<br>";
} else {
    echo "Konfigurasi berhasil dimuat<br>";
}

// Memuat rute aplikasi
require_once __DIR__ . '/../routes/web.php';

// Debugging: pastikan rute dimuat
echo "Rute berhasil dimuat<br>";
