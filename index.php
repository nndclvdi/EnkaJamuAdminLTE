<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['nama'])) {
  header('Location: ../index.php?session=expired');
  exit;
}

// Include header dan konfigurasi database
include('header.php');
include('../conf/config.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include('preloader.php'); ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('logo.php'); ?>
      <!-- Sidebar -->
      <?php include('sidebar.php'); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include('content_header.php'); ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      // Tangani jika $_GET['page'] belum diset
      $page = $_GET['page'] ?? '';

      switch ($page) {
        case 'dashboard':
          include('index_member.html');
          break;
        case 'data-pelanggan':
          include('data_pelanggan.php');
          break;
        case 'data-produk':
          include('data_produk.php');
          break;
        case 'data-user':
          include('data_user.php');
          break;
        default:
          include('index_member.html');
          break;
      }
      ?>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?php include('footer.php'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>
  <!-- ./wrapper -->
</body>

</html>