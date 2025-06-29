<?php
// Mulai session untuk menampilkan pesan
session_start();

// Include file koneksi database
include '../conf/config.php';

// Cek apakah parameter id ada dalam URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitasi input untuk VARCHAR
    $id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

    // Validasi ID tidak kosong setelah sanitasi
    if (empty($id)) {
        $_SESSION['pesan'] = "ID user tidak valid!";
        $_SESSION['tipe_pesan'] = "danger";
    } else {
        // Query untuk menghapus user berdasarkan id (VARCHAR)
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        // Cek apakah query berhasil dieksekusi
        if ($result) {
            // Cek apakah ada baris yang terhapus
            if (mysqli_affected_rows($koneksi) > 0) {
                // Set pesan sukses
                $_SESSION['pesan'] = "User dengan ID '$id' berhasil dihapus!";
                $_SESSION['tipe_pesan'] = "success";
            } else {
                // Set pesan error jika tidak ada data yang dihapus
                $_SESSION['pesan'] = "User dengan ID '$id' tidak ditemukan!";
                $_SESSION['tipe_pesan'] = "warning";
            }
        } else {
            // Set pesan error jika query gagal
            $_SESSION['pesan'] = "Gagal menghapus user: " . mysqli_error($koneksi);
            $_SESSION['tipe_pesan'] = "danger";
        }
    }
} else {
    // Set pesan error jika parameter id tidak ada
    $_SESSION['pesan'] = "ID user tidak ditemukan dalam URL!";
    $_SESSION['tipe_pesan'] = "danger";
}

// Tutup koneksi database
mysqli_close($koneksi);

// Redirect kembali ke halaman data user
// Sesuaikan dengan struktur URL aplikasi Anda
header("Location: index.php?page=data-user");
exit();
