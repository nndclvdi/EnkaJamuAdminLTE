<?php
// Aktifkan debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
include(__DIR__ . '/../../conf/config.php');


// Ambil data dari form POST
$nama_pemesan = $_POST['nama_pemesan'];
$email        = $_POST['email'];
$no_telp      = $_POST['no_telp'];
$alamat       = $_POST['alamat'];
$nama_produk  = $_POST['nama_produk'];
$jumlah       = $_POST['jumlah'];
$tanggal      = $_POST['tanggal'];
$catatan      = $_POST['catatan'];

// Query insert
$query = "INSERT INTO pesanan (nama_pemesan, email, no_telp, alamat, nama_produk, jumlah, tanggal, catatan)
          VALUES ('$nama_pemesan', '$email', '$no_telp', '$alamat', '$nama_produk', '$jumlah', '$tanggal', '$catatan')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: ../pesan.html?status=sukses");
    exit();
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
