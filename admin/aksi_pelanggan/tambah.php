  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Tambah Pelanggan </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6">
        <a href="index.php?page=tabel_pelanggan" class="btn btn-primary">Kembali</a>
        <br><br>
        <form method="post" role="form">

          <div class="form-group">
            <label>Username</label>
            <input name="username" class="form-control">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input name="password" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control">
          </div>

          <div class="form-group">
            <label>Telpon</label>
            <input name="no_telp" class="form-control">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" class="form-control">
          </div>

          <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $email = $_POST['email'];
          $no_telp = $_POST['no_telp'];
          $alamat = $_POST['alamat'];

          $simpan = $koneksi->query("INSERT INTO pelanggan (`username`,`password`,`email`,`no_telp`,`alamat`) VALUES ('$username','$password','$email','$no_telp','$alamat')");

          if ($simpan) {
            echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_pelanggan';
                        </script>";
          } else {
            echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_pelanggan';
                        </script>";
          }
        }
        ?>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->