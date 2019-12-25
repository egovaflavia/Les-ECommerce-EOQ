<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Supplier </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Edit Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $id = $_GET['idsupplier'];
    $get = $koneksi->query("SELECT * FROM supplier WHERE id_supplier =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_supplier" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Nam Supplier</label>
                    <input type="hidden" value="<?php echo $rows->id_supplier  ?>" name="id_supplier" class="form-control">
                    <input value="<?php echo $rows->nama_supplier  ?>" name="nama_supplier" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input value="<?php echo $rows->alamat  ?>" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nomor Telpon</label>
                    <input value="<?php echo $rows->no_telp  ?>" name="no_telp" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">edit</button>
        
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_supplier = $_POST['id_supplier'];
                $nama_supplier = $_POST['nama_supplier'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];

                $edit = $koneksi->query("UPDATE supplier SET   `nama_supplier` = '$nama_supplier',
                                                            `alamat` = '$alamat',
                                                            `no_telp` = '$no_telp'
                                                            WHERE `id_supplier` = '$id_supplier'");

                if ($edit) {
                    echo "<script>
                alert('Data berhasil di edit');
                location='index.php?page=tabel_supplier';
                </script>";
                } else {
                    echo "<script>
                alert('Data gagal di edit');
                location='index.php?page=tabel_supplier';
                </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->