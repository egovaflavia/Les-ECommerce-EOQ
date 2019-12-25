<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Barang </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $id = $_GET['kdbarang'];
    $get = $koneksi->query("SELECT * FROM barang WHERE kd_barang =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>

    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_barang" class="btn btn-primary">Kembali</a>
            <br><br>
            <form enctype="multipart/form-data" method="post" role="form">

                <div class="form-group">
                    <label>Kategori</label>
                    <select value="<?php echo $rows->id_kategori  ?>" name="id_kategori" class="form-control">
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
                    <input type="hidden" value="<?php echo $rows->kd_barang  ?>" name="kd_barang" class="form-control">
                    <input value="<?php echo $rows->nm_barang  ?>" name="nm_barang" class="form-control">
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input value="<?php echo $rows->harga  ?>" name="harga" class="form-control">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input value="<?php echo $rows->stok  ?>" name="stok" class="form-control">
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input value="<?php echo $rows->gambar  ?>" type="file" class="form-control" name="gambar">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <input value="<?php echo $rows->deskripsi  ?>" name="deskripsi" class="form-control">
                </div>

                <div class="form-group">
                    <label>Biaya Simpan</label>
                    <input value="<?php echo $rows->biaya_simpan  ?>" name="biaya_simpan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Biaya Pesan</label>
                    <input value="<?php echo $rows->biaya_pesan  ?>" name="biaya_pesan" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">Edit</button>

            </form>
            <?php
            if (isset($_POST['edit'])) {
                $kd_barang      = $_POST['kd_barang'];
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

                $edit = $koneksi->query("UPDATE barang SET  `id_kategori` = '$id_kategori',
                                                            `nm_barang` = '$nm_barang',
                                                            `harga` = '$harga',
                                                            `stok` = '$stok',
                                                            `gambar` = '$nama_gambar',
                                                            `deskripsi` = '$deskripsi',
                                                            `biaya_simpan` = '$biaya_simpan',
                                                            `biaya_pesan` = '$biaya_pesan'
                                                            WHERE `kd_barang` = '$kd_barang'");

                if ($edit) {
                    echo "<script>
                    alert('Data berhasil di edit');
                    location='index.php?page=tabel_barang';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal di edit');
                    location='index.php?page=tabel_barang';
                    </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->