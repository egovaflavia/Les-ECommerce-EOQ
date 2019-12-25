  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Tambah Barang </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6">
        <a href="index.php?page=tabel_barang" class="btn btn-primary">Kembali</a>
        <br><br>
        <form enctype="multipart/form-data" method="post" role="form">

          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control">
              <?php
              $ambil = $koneksi->query("SELECT * FROM kategori");
              while ($row = $ambil->fetch_object()) {
                ?>
                <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nm_kategori ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input name="nm_barang" class="form-control">
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input name="harga" class="form-control">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input name="stok" class="form-control">
          </div>

          <div class="form-group">
            <label>Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <input name="deskripsi" class="form-control">
          </div>

          <div class="form-group">
            <label>Biaya Simpan</label>
            <input name="biaya_simpan" class="form-control">
          </div>

          <div class="form-group">
            <label>Biaya Pesan</label>
            <input name="biaya_pesan" class="form-control">
          </div>

          <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
          $id_kategori    = $_POST['id_kategori'];
          $nm_barang      = $_POST['nm_barang'];
          $harga          = $_POST['harga'];
          $stok           = $_POST['stok'];
          $deskripsi      = $_POST['deskripsi'];
          $biaya_simpan   = $_POST['biaya_simpan'];
          $biaya_pesan    = $_POST['biaya_pesan'];

          $nama_gambar    = $_FILES['gambar']['name'];
          $file_gambar    = $_FILES['gambar']['tmp_name'];
          move_uploaded_file($file_gambar, "assets/images/" . $nama_gambar);

          $simpan = $koneksi->query("INSERT INTO barang (`id_kategori`,`nm_barang`,`harga`,`stok`,`gambar`,`deskripsi`,`biaya_simpan`,`biaya_pesan`) VALUES ('$id_kategori','$nm_barang','$harga','$stok','$nama_gambar','$deskripsi','$biaya_simpan','$biaya_pesan')");

          if ($simpan) {
            echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_barang';
                        </script>";
          } else {
            echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_barang';
                        </script>";
          }
        }
        ?>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->