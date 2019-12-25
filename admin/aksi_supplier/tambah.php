  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Tambah Supplier </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6">
        <a href="index.php?page=tabel_supplier" class="btn btn-primary">Kembali</a>
        <br><br>
        <form method="post" role="form">

          <div class="form-group">
            <label>Nama Supplier</label>
            <input name="nama_supplier" class="form-control">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" class="form-control">
          </div>

          <div class="form-group">
            <label>Nomor Telpon</label>
            <input name="no_telp" class="form-control">
          </div>

          <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
          $nama_supplier = $_POST['nama_supplier'];
          $alamat = $_POST['alamat'];
          $no_telp = $_POST['no_telp'];

          $simpan = $koneksi->query("INSERT INTO supplier (`nama_supplier`,`alamat`,`no_telp`) VALUES ('$nama_supplier','$alamat','$no_telp')");

          if ($simpan) {
            echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_supplier';
                        </script>";
          } else {
            echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_supplier';
                        </script>";
          }
        }
        ?>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->