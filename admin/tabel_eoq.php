<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1> Admin </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <a href="index.php?page=aksi_eoq/tambah" class="btn btn-primary">Tambah Data</a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                        <tr>
                            <th width="15px">No</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Biaya Simpan</th>
                            <th>Biaya Pesan</th>
                            <th>Kebutuhan Tahunan</th>
                            <th>Hasil Eoq</th>
                            <th width="138px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $get = $koneksi->query("SELECT * FROM eoq LEFT JOIN barang ON eoq.kd_barang=barang.kd_barang");
                        while ($row = $get->fetch_object()) {
                            $R = $row->tahunan;
                            $C = $row->biaya_pesan;
                            $P = $row->harga;
                            $I = $row->biaya_simpan;

                            $eoq = (2 * $R * $C) / ($P * $I);
                            $res = sqrt($eoq);

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nm_barang ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td><?php echo $row->biaya_simpan ?></td>
                                <td><?php echo $row->biaya_pesan ?></td>
                                <td><?php echo $row->tahunan ?></td>
                                <td><?php echo $res ?> Unit</td>
                                <td>
                                    <a href="index.php?page=aksi_eoq/edit&ideoq=<?php echo $row->id_eoq ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?page=aksi_eoq/hapus&ideoq=<?php echo $row->id_eoq ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->