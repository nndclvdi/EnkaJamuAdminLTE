<?php
session_start();
include('config.php');

// Ambil input dari form login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi input kosong
if (empty($username) || empty($password)) {
   header('Location: ../index.php?error=2'); // username atau password kosong
   exit;
}

// Cek ke database
$stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek jika user ditemukan
if ($result->num_rows === 1) {
   $user = $result->fetch_assoc();

   // Jika password disimpan dalam bentuk hash:
   // if (password_verify($password, $user['password'])) {

   // Jika password disimpan biasa (TIDAK DISARANKAN):
   if ($password === $user['password']) {

      // Set session
      $_SESSION['nama'] = $user['nama'];
      $_SESSION['level'] = $user['level'];

      // Arahkan sesuai level user
      if ($user['level'] === 'superadmin') {
         header('Location: ../app/index_member.html');
      } elseif ($user['level'] === 'operator') {
         header('Location: ../app');
      }
   } else {
      // Password salah
      header('Location: ../index.php?error=1');
   }
} else {
   // Username tidak ditemukan
   header('Location: ../index.php?error=1');
}

exit;
