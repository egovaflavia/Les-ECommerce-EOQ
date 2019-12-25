<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Ongkir </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Edit Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $id = $_GET['idongkir'];
    $get = $koneksi->query("SELECT * FROM ongkos_kirim WHERE id_ongkir =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_ongkir" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="hidden" value="<?php echo $rows->id_ongkir  ?>" name="id_ongkir" class="form-control">
                    <input value="<?php echo $rows->tujuan  ?>" name="tujuan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tarif</label>
                    <input value="<?php echo $rows->tarif  ?>" name="tarif" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">edit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_ongkir = $_POST['id_ongkir'];
                $tujuan = $_POST['tujuan'];
                $tarif = $_POST['tarif'];

                $edit = $koneksi->query("UPDATE ongkos_kirim SET   `tujuan` = '$tujuan',
                                                                   `tarif` = '$tarif'
                                                              WHERE `id_ongkir` = '$id_ongkir'");

                if ($edit) {
                    echo "<script>
                alert('Data berhasil di edit');
                location='index.php?page=tabel_ongkir';
                </script>";
                } else {
                    echo "<script>
                alert('Data gagal di edit');
                location='index.php?page=tabel_ongkir';
                </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->