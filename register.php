<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Enka Jamu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Enka</b>Jamu</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="post" action="proses_register.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-id-card"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <select name="level" class="form-control" required>
            <option value="" disabled selected>Pilih Level</option>
            <option value="superadmin">Super Admin</option>
            <option value="operator">Operator</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user-tag"></span></div>
          </div>
        </div>

        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php">Saya sudah punya akun</a>
      </p>
    </div>
  </div>
</div>

<!-- JS -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app/dist/js/adminlte.min.js"></script>
<script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>

<?php
if (isset($_GET['error'])) {
  $type = $_GET['error'];
  $message = "";

  if ($type == 'duplikat') {
    $message = "Username atau email sudah digunakan!";
  } else if ($type == 'db') {
    $message = "Kesalahan Database: " . urldecode($_GET['msg']);
  }

  echo "
  <script>
    Swal.fire({
      toast: true,
      position: 'top',
      icon: 'error',
      title: '$message',
      showConfirmButton: false,
      timer: 3000
    });
  </script>";
}
?>
</body>
</html>
