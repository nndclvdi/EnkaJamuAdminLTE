<?php
include('../../conf/config.php'); // Pastikan path ini sesuai

// Ambil data dari form POST
$id = $_POST['id_produk']; // INI PENTING! ambil id-nya!
$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

// Validasi id
if (empty($id)) {
    die("ID produk tidak valid.");
}

// Query UPDATE
$query = "UPDATE produk SET 
            nama_produk = '$nama', 
            deskripsi = '$deskripsi', 
            harga = '$harga', 
            kategori = '$kategori'
          WHERE id_produk = '$id'";

$result = mysqli_query($koneksi, $query);

// Cek berhasil atau gagal
if ($result) {
    header('Location: ../index.php?page=data-produk');
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
