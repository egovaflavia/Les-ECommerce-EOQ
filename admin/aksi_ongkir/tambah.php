  <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Ongkir </h1>
            <ol class="breadcrumb">
              <li class=""><a href="index.php"> Home</a></li>
              <li class="active"> Admin</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <a href="index.php?page=tabel_ongkir" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

              <div class="form-group">
                <label>Tujuan</label>
                <input name="tujuan" class="form-control">
              </div>

              <div class="form-group">
                <label>Tarif</label>
                <input name="tarif" class="form-control">
              </div>

              <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>  
            </form> 
            <?php 
              if(isset($_POST['simpan'])){
                $tujuan = $_POST['tujuan'];
                $tarif = $_POST['tarif'];

                $simpan = $koneksi->query("INSERT INTO ongkos_kirim (`tujuan`,`tarif`) VALUES ('$tujuan','$tarif')");

                if($simpan){
                  echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_ongkir';
                        </script>";
                }else{
                  echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_ongkir';
                        </script>";
                }
              }
            ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->