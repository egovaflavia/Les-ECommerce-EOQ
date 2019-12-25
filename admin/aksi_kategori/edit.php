<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Kategori </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <?php
    $id = $_GET['idkategori'];
    $get = $koneksi->query("SELECT * FROM kategori WHERE id_kategori =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>

    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_kategori" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="hidden" value="<?php echo $rows->id_kategori  ?>" name="id_kategori" class="form-control">
                    <input value="<?php echo $rows->nm_kategori  ?>" name="nm_kategori" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">Edit</button>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_kategori = $_POST['id_kategori'];
                $nm_kategori = $_POST['nm_kategori'];

                $edit = $koneksi->query("UPDATE kategori SET   `nm_kategori` = '$nm_kategori'
                                                            WHERE `id_kategori` = '$id_kategori'");


                if ($edit) {
                    echo "<script>
                alert('Data berhasil di Edit');
                location='index.php?page=tabel_kategori';
                </script>";
                } else {
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