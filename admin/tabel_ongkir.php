  <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Ongkir </h1>
            <ol class="breadcrumb">
             <li class=""><a href="index.php"> Home</a></li>
              <li class="active"> Admin</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <a href="index.php?page=aksi_ongkir/tambah" class="btn btn-primary">Tambah Data</a>
            <br><br>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th width="15px">No</th>
                    <th>Tujuan</th>
                    <th>Tarif</th>
                    <th width="138px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                      $get=$koneksi->query("SELECT * FROM ongkos_kirim");
                      while ($row=$get->fetch_object()) {
                   ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $row->tujuan ?></td>
                          <td>Rp. <?php echo number_format($row->tarif) ?></td>
                          <td>
                            <a href="index.php?page=aksi_ongkir/edit&idongkir=<?php echo $row->id_ongkir ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?page=aksi_ongkir/hapus&idongkir=<?php echo $row->id_ongkir ?>" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->