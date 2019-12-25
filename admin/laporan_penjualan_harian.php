<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Laporan Penjualan Harian </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $hari = date("Y-m-d");
    $hari = $_GET['hari'];
    ?>

    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" name="page" value="laporan_penjualan_harian" />

                <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                        <input type="date" name="hari" class="form-control" value="" />
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <button type="button" class="btn btn-success">Cetak</button>
                </div>
            </form>

            <br><br>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Pembelian</th>
                            <th>Total Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_penjualan_bulanan = mysqli_query($koneksi, " 
                        SELECT * FROM `penjualan` LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.`tgl_penjualan` = '$hari'");
                        while ($penjualan_bulanan = mysqli_fetch_assoc($data_penjualan_bulanan)) {
                            $total += $penjualan_bulanan['total'];
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $penjualan_bulanan['username']; ?></td>
                                <td><?php echo $penjualan_bulanan['tgl_penjualan']; ?></td>
                                <td><?php echo $penjualan_bulanan['total']; ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total :</td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->