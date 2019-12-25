<?php
$id_pembelian = $_SESSION['id_pembelian_barusan'];


if (isset($_POST['simpan'])) {
  $kd_barang      = $_POST['kd_barang'];
  $jumlah         = $_POST['jumlah'];

  $simpan = $koneksi->query("INSERT INTO detail_pembelian (`id_pembelian`,`kd_barang`,`jml_pembelian`) VALUES ('$id_pembelian','$kd_barang','$jumlah')");

  if ($simpan) {
    echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=aksi_pembelian/tambah';
                        </script>";
  } else {
    echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=aksi_pembelian/tambah';
                        </script>";
  }
}

if (isset($_POST['selesai'])) {

  unset($_SESSION['id_pembelian_barusan']);

  echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_pembelian';
                        </script>";
  echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_pembelian';
                        </script>";
}
?>
<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
      <h1>Tambah Pembelian </h1>
      <ol class="breadcrumb">
        <li class=""><a href="index.php"> Home</a></li>
        <li class="active"> Admin</li>
      </ol>
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
      <a href="index.php?page=tabel_pembelian" class="btn btn-primary">Kembali</a>
      <br><br>
      <form method="post" role="form">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Nama Barang</label>
              <select name="kd_barang" class="form-control">
                <?php
                $ambil = $koneksi->query("SELECT * FROM barang");
                while ($row = $ambil->fetch_object()) {
                  ?>
                  <option value="<?php echo $row->kd_barang ?>"><?php echo $row->nm_barang ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Jumlah</label>
              <input name="jumlah" class="form-control" min="1" type="number">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <hr>
            <h3>Daftar Barang</h3>
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
              </tr>
              <?php
              $no = 1;
              $getBarang = $koneksi->query("SELECT * FROM detail_pembelian LEFT JOIN barang ON detail_pembelian.kd_barang = barang.kd_barang WHERE detail_pembelian.id_pembelian= '$id_pembelian'");
              while ($pecah = $getBarang->fetch_object()) {
                $sub = $pecah->jml_pembelian * $pecah->harga;
                $total += $sub
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $pecah->kd_barang ?></td>
                  <td><?php echo $pecah->nm_barang ?></td>
                  <td><?php echo $pecah->harga ?></td>
                  <td><?php echo $pecah->jml_pembelian ?></td>
                  <td><?php echo $sub ?></td>
                </tr>
              <?php } ?>
              <tr>
                <th colspan="5">Total</th>
                <th>Rp. <?php echo $total ?></th>
              </tr>
            </table>
          </div>
        </div>
    </div>
  </div>
  <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
  <button type="reset" class="btn btn-warning">Reset</button>
  <button type="submit" name="selesai" class="btn btn-primary">Selesai</button>
  </form>

</div>

</div><!-- /.row -->
</div><!-- /#page-wrapper -->