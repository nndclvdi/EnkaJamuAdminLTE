<?php
// Aktifkan error reporting untuk debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conf/config.php'; // koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level    = $_POST['level'];

    // Cek apakah username/email sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: register.php?error=duplikat");
        exit;
    }

    // Simpan ke database
    $simpan = mysqli_query($koneksi, "INSERT INTO users (nama, email, username, password, level) VALUES ('$nama', '$email', '$username', '$password', '$level')");
    if ($simpan) {
        // Redirect ke login setelah berhasil
        header("Location: index.php?success=1");
        exit;
    } else {
        $msg = urlencode(mysqli_error($koneksi));
        header("Location: register.php?error=db&msg=$msg");
        exit;
    }
}
?>
