<?php
include('../../conf/config.php'); // Pastikan path ini sesuai

// Ambil data dari form POST
$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

// Query INSERT
$query = "INSERT INTO produk (nama_produk, deskripsi, harga, kategori) 
          VALUES ('$nama', '$deskripsi', '$harga', '$kategori')";

$result = mysqli_query($koneksi, $query);

// Cek berhasil atau gagal
if ($result) {
    header('Location: ../index.php?page=data-produk');
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
