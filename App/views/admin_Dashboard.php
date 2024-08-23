<?php
echo "<h1>Admin Dashboard</h1>";
echo "<h2>Daftar Pengguna dan Status Absensi:</h2>";

foreach ($users as $user) {
    echo "Username: " . $user['username'] . " | Email: " . $user['email'] . " | Status Absensi: ";
    if ($user['attendance']) {
        echo "Hadir pada " . $user['attendance'];
    } else {
        echo "Belum Absen";
    }
    echo "<br>";
}
?>
