<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Pembelian </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Edit Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $id = $_GET['idpembelian'];
    $get = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_pembelian" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Supplier</label>
                    <select value="<?php echo $rows->id_supplier  ?>" name="id_supplier" class="form-control">
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM supplier");
                        while ($row = $ambil->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->id_supplier ?>"><?php echo $row->nama_supplier ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Barang</label>
                    <select value="<?php echo $rows->kd_barang  ?>" name="kd_barang" class="form-control">
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM barang");
                        while ($row = $ambil->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->kd_barang ?>"><?php echo $row->nm_barang ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input type="hidden" value="<?php echo $rows->id_pembelian  ?>" name="id_pembelian" class="form-control">
                    <input type="date" value="<?php echo $rows->tgl_beli  ?>" name="tgl_beli" class="form-control">
                </div>

                <div class="form-group">
                    <label>Harga Beli</label>
                    <input value="<?php echo $rows->harga_beli  ?>" name="harga_beli" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">edit</button>

            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_pembelian = $_POST['id_pembelian'];
                $id_supplier = $_POST['id_supplier'];
                $kd_barang = $_POST['kd_barang'];
                $tgl_beli = $_POST['tgl_beli'];
                $harga_beli = $_POST['harga_beli'];

                $edit = $koneksi->query("UPDATE pembelian SET   `id_supplier` = '$id_supplier',
                                                                 `kd_barang` = '$kd_barang',
                                                                 `tgl_beli` = '$tgl_beli',
                                                                 `harga_beli` = '$harga_beli'
                                                            WHERE `id_pembelian` = '$id_pembelian'");

                if ($edit) {
                    echo "<script>
                alert('Data berhasil di edit');
                location='index.php?page=tabel_pembelian';
                </script>";
                } else {
                    echo "<script>
                alert('Data gagal di edit');
                location='index.php?page=tabel_pembelian';
                </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->