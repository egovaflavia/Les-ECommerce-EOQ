  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Data Pembayaran </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Pembayaran</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Bank</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = $_GET['idpembayaran'];
              $no = 1;
              $get = $koneksi->query("SELECT * FROM pembayaran WHERE id_penjualan = $id");
              $row = $get->fetch_object();
              ?>
              <tr>
                <td><?php echo $row->nama ?></td>
                <td><?php echo tgl_indo($row->tanggal) ?></td>
                <td><?php echo $row->bank ?></td>
                <td>Rp. <?php echo number_format($row->jumlah) ?></td>
              </tr>

            </tbody>
          </table>

          <form method="post">
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Lunas">Lunas</option>
                <option value="Pesanan Di Kirim">Pesanan Di Kirim</option>
                <option value="Batal">Batal</option>
              </select>
            </div>
            <div class="form-group">
              <button name="proses" class="btn btn-primary">Proses</button>
            </div>
          </form>
          <?php
          if (isset($_POST['proses'])) {
            $status = $_POST['status'];

            $koneksi->query("UPDATE penjualan SET status = '$status' WHERE id_penjualan='$id'");
            echo "<script>alert('Data Telah Update');location='index.php?page=tabel_pemesanan'</script>";
          }
          ?>
        </div>
      </div>
      <div class="col-lg-6">
        <img width="50%" class="pull-right img-responsive" src="assets/images/bukti_bayar/<?php echo $row->bukti ?>" alt="Gagal load gambar">
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->