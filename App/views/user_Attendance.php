<?php
if (isset($success)) {
    echo "<p>$success</p>";
}

if (isset($_SESSION['user']['attendance'])) {
    echo "<p>Anda telah absen pada: " . $_SESSION['user']['attendance'] . "</p>";
} else {
    echo '<form method="POST" action="">
        <button type="submit">Absen Kehadiran</button>
    </form>';
}
?>
