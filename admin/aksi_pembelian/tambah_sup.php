<?php
if (isset($_POST['simpan'])) {
  $id_supplier    = $_POST['id_supplier'];
  $tgl_beli       = $_POST['tgl_beli'];

  $simpan = $koneksi->query("INSERT INTO pembelian (`id_supplier`,`tgl_beli`) VALUES ('$id_supplier','$tgl_beli')");

  $id_barusan = $koneksi->insert_id;

  if ($simpan) {
    $_SESSION['id_pembelian_barusan'] = $id_barusan;
    echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=aksi_pembelian/tambah&id=$id_barusan ';
                        </script>";
  } else {
    echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=aksi_pembelian/tambah';
                        </script>";
  }
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
              <label>Supplier</label>
              <select name="id_supplier" class="form-control">
                <?php
                $ambil = $koneksi->query("SELECT * FROM supplier");
                while ($row = $ambil->fetch_object()) {
                  ?>
                  <option value="<?php echo $row->id_supplier ?>"><?php echo $row->nama_supplier ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Tanggal Pembelian</label>
              <input name="tgl_beli" class="form-control" type="date">
            </div>
          </div>
        </div>
    </div>
  </div>
  <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
  <button type="reset" class="btn btn-warning">Reset</button>
  </form>

</div>

</div><!-- /.row -->
</div><!-- /#page-wrapper -->