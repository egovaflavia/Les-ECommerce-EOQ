  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Pembelian Barang </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12">
        <a href="index.php?page=aksi_pembelian/tambah_sup" class="btn btn-primary">Tambah Data</a>
        <br><br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th width="15px">No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $get = $koneksi->query("SELECT * FROM pembelian
              LEFT JOIN supplier ON pembelian.id_supplier=supplier.id_supplier");
              while ($row = $get->fetch_object()) {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row->nama_supplier ?></td>
                  <td><?php echo $row->alamat ?></td>
                  <td><?php echo $row->tgl_beli ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->