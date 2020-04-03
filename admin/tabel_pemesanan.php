  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Pemesanan </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12">
        <br><br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th width="15px">No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Total</th>
                <th width="190px">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $get = $koneksi->query("SELECT * FROM penjualan LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan");
              while ($row = $get->fetch_object()) {
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row->username ?></td>
                  <td><?php echo tgl_indo($row->tgl_penjualan) ?></td>
                  <td><?php echo $row->status ?></td>
                  <td>Rp. <?php echo number_format($row->total) ?></td>
                  <td><a href="index.php?page=aksi_pemesanan/detail&idpemesanan=<?php echo $row->id_penjualan ?>" class="btn btn-success">Detail</a>
                    <a href="index.php?page=tabel_pembayaran&idpembayaran=<?php echo $row->id_penjualan ?>" class="btn btn-primary">Pembayaran</a>
                  </td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->