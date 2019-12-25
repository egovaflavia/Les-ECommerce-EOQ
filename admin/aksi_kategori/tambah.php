  <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Kategori </h1>
            <ol class="breadcrumb">
              <li class=""><a href="index.php"> Home</a></li>
              <li class="active"> Admin</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <a href="index.php?page=tabel_kategori" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

              <div class="form-group">
                <label>Nama Kategori</label>
                <input name="nm_kategori" class="form-control">
              </div>

              <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>  
            </form> 
            <?php 
              if(isset($_POST['simpan'])){
                $nm_kategori = $_POST['nm_kategori'];

                $simpan = $koneksi->query("INSERT INTO kategori (`nm_kategori`) VALUES ('$nm_kategori')");

                if($simpan){
                  echo "<script>
                        alert('Data berhasil di simpan');
                        location='index.php?page=tabel_kategori';
                        </script>";
                }else{
                  echo "<script>
                        alert('Data gagal di simpan');
                        location='index.php?page=tabel_kategori';
                        </script>";
                }
              }
            ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->