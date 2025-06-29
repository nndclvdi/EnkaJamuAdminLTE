<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data User</h3>
            <a href="?page=tambah-user" class="btn btn-primary btn-sm float-right">Tambah User</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../conf/config.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM users");
                while ($user = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['level'] ?></td>
                    <td>
                      <a href="hapus_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>