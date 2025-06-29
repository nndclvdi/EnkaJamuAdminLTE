<?php include('../conf/config.php'); ?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Produk</h3>
          </div>

          <div class="card-body">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-produk">
              Tambah Produk
            </button>
            <br><br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Produk</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 0;
                  $query = mysqli_query($koneksi, "SELECT * FROM produk");
                  while($prd = mysqli_fetch_array($query)){
                    $no++;
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= htmlspecialchars($prd['nama_produk']) ?></td>
                  <td><?= nl2br(htmlspecialchars($prd['deskripsi'])) ?></td>
                  <td>Rp<?= number_format($prd['harga'], 0, ',', '.') ?></td>
                  <td><?= $prd['kategori'] ?></td>
                  <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $prd['id_produk'] ?>">
                      Edit
                    </button>

                    <a href="delete/delete_produk.php?id=<?= $prd['id_produk'] ?>" 
                       onclick="return confirm('Yakin ingin menghapus produk ini?')" 
                       class="btn btn-danger btn-sm">
                      Hapus
                    </a>
                  </td>
                </tr>

                <!-- Modal Edit Produk -->
                <div class="modal fade" id="editModal<?= $prd['id_produk'] ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form method="post" action="edit/edit_produk.php">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Produk</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                          <input type="hidden" name="id_produk" value="<?= $prd['id_produk'] ?>">
                          <input type="text" name="nama_produk" class="form-control mb-2" value="<?= htmlspecialchars($prd['nama_produk']) ?>" required>
                          <textarea name="deskripsi" class="form-control mb-2" required><?= htmlspecialchars($prd['deskripsi']) ?></textarea>
                          <input type="number" name="harga" class="form-control mb-2" value="<?= $prd['harga'] ?>" required>
                          <select class="form-control mb-2" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Serbuk" <?= $prd['kategori'] == 'Serbuk' ? 'selected' : '' ?>>Serbuk</option>
                            <option value="Sirup Cair" <?= $prd['kategori'] == 'Sirup Cair' ? 'selected' : '' ?>>Sirup Cair</option>
                            <option value="Kapsul" <?= $prd['kategori'] == 'Kapsul' ? 'selected' : '' ?>>Kapsul</option>
                            <option value="Paket" <?= $prd['kategori'] == 'Paket' ? 'selected' : '' ?>>Paket</option>
                          </select>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Produk</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="modal-produk">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" action="add/tambah_produk.php">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Produk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <input type="text" name="nama_produk" class="form-control mb-2" placeholder="Nama Produk" required>
          <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi Produk" required></textarea>
          <input type="number" name="harga" class="form-control mb-2" placeholder="Harga (Rp)" required>
          <select class="form-control mb-2" name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Serbuk">Serbuk</option>
            <option value="Sirup Cair">Sirup Cair</option>
            <option value="Kapsul">Kapsul</option>
            <option value="Paket">Paket</option>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
