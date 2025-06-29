<?php
include('../../conf/config.php'); // naik dua folder dari delete/

$id = intval($_GET['id']); // Pakai intval buat aman

if (empty($id)) {
  die("ID produk tidak valid.");
}

$query = "DELETE FROM produk WHERE id_produk = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
  header('Location: ../index.php?page=data-produk');
  exit;
} else {
  echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
