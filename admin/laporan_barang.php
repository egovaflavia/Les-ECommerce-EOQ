  <div id="page-wrapper">

      <div class="row">
          <div class="col-lg-12">
              <h1>Laporan Barang </h1>
              <ol class="breadcrumb">
                  <li class=""><a href="index.php"> Home</a></li>
                  <li class="active"> Admin</li>
              </ol>
          </div>
      </div><!-- /.row -->

      <div class="row">
          <div class="col-lg-12">
              <a href="laporan/cetak_laporan_barang.php" class="btn btn-primary">Cetak Laporan</a>
              <br><br>

              <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                          <tr>
                              <th width="15px">No</th>
                              <th>Kategori</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Gambar</th>
                              <th>Deskripsi</th>
                              <th>Biaya Simpan</th>
                              <th>Biaya Pesan</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            $get = $koneksi->query("SELECT * FROM barang LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori");
                            while ($row = $get->fetch_object()) {
                            ?>
                              <tr>
                                  <td><?php echo $no++ ?></td>
                                  <td><?php echo $row->nm_kategori ?></td>
                                  <td><?php echo $row->nm_barang ?></td>
                                  <td>Rp. <?php echo number_format($row->harga) ?></td>
                                  <td><?php echo $row->stok ?></td>
                                  <td><img style="width: 100px; height:100px" src="assets/images/<?php echo $row->gambar ?>" alt="Tidak Ada Gambar"></td>
                                  <td><?php echo $row->deskripsi ?></td>
                                  <td>Rp. <?php echo number_format($row->biaya_simpan) ?></td>
                                  <td>Rp. <?php echo number_format($row->biaya_pesan) ?></td>

                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div><!-- /.row -->
  </div><!-- /#page-wrapper -->