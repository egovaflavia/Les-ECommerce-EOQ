<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Laporan Penjualan Tahunan </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $tahun = date("Y");

    if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
        $tahun = $_GET['tahun'];
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" name="page" value="laporan_penjualan_tahunan" />

                <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                        <input type="number" name="tahun" class="form-control" placeholder="Pilih Tahun" value="<?php echo $tahun; ?>" />
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <button type="button" onclick="cetakLaporanTahunan()" class="btn btn-success">Cetak</button>
                </div>
            </form>

            <br><br>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_penjualan_tahuan = mysqli_query($koneksi, "select 
                        MONTH(waktu.tanggal) AS bulan,
                        IFNULL(p.total, 0) AS total  
                        from tb_waktu waktu 
                        LEFT JOIN (SELECT 
                        p.id_penjualan, 
                        p.tgl_penjualan, 
                        SUM(IFNULL(p.total, 0) + IFNULL(p.tarif, 0)) AS total 
                          FROM
                         penjualan p WHERE left(p.tgl_penjualan, 4) = '$tahun' GROUP BY LEFT(p.tgl_penjualan, 7)) p ON waktu.tanggal = p.tgl_penjualan 
                         where left(waktu.tanggal, 4) = '$tahun' GROUP BY LEFT(waktu.tanggal, 7) ORDER BY waktu.tanggal");
                        while ($penjualan_tahunan = mysqli_fetch_assoc($data_penjualan_tahuan)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $penjualan_tahunan['bulan']; ?></td>
                                <td><?php echo $penjualan_tahunan['total']; ?></td>

                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->
<script>
    function cetakLaporanTahunan() {
        var tahun = document.getElementsByName("tahun")[0].value;
        window.open("laporan/cetak_laporan_penjualan_tahunan.php?tahun=" + tahun, "_blank");
    }
</script>