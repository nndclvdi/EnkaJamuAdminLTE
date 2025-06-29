<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pemesan</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                  <th>Alamat</th>
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pesanan</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM pesanan");
                  while($psn = mysqli_fetch_array($query)){
                    $no++;
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $psn['nama_pemesan'] ?></td>
                    <td><?= $psn['email'] ?></td>
                    <td><?= $psn['no_telp'] ?></td>
                    <td><?= $psn['alamat'] ?></td>
                    <td><?= $psn['nama_produk'] ?></td>
                    <td><?= $psn['jumlah'] ?></td>
                    <td><?= $psn['tanggal'] ?></td>
                    <td><?= $psn['catatan'] ?></td>
                  </tr>
                  <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Pemesan</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                  <th>Alamat</th>
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pesanan</th>
                  <th>Catatan</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

     <div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" action="add/tambah_data.php">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pemesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="form-row">
            <div class="col mb-2">
              <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" required>
            </div>
            <div class="col mb-2">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="col mb-2">
              <input type="text" class="form-control" placeholder="No. Telepon" name="no_telepon" required>
            </div>
            <div class="col mb-2">
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
            </div>
            <div class="col mb-2">
              <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" required>
            </div>
            <div class="col mb-2">
              <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" required>
            </div>
            <div class="col mb-2">
              <input type="date" class="form-control" name="tanggal_pesanan" required>
            </div>
          <div class="col mb-2">
              <input type="text" class="form-control" placeholder="Catatan" name="catatan">
            </div>


          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
