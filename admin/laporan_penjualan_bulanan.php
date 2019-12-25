<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Laporan Penjualan Bulanan </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $bulan = date("m");
    $tahun = date("Y");

    if (isset($_GET['bulan']) && !empty($_GET['bulan'])) {
        $bulan = $_GET['bulan'];
    }

    if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
        $tahun = $_GET['tahun'];
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <form>
                <input type="hidden" name="page" value="laporan_penjualan_bulanan" />
                <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select name="bulan" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <script>
                            document.getElementsByName("bulan")[0].value = "<?php echo $bulan; ?>";
                        </script>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div class="form-group">
                        <input type="number" name="tahun" class="form-control" placeholder="Pilih Tahun" value="<?php echo $tahun; ?>" />
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <button type="button" target="_blank" onclick="cetakLaporanBulanan()" class="btn btn-success">Cetak</button>
                </div>
            </form>

            <br><br>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data_penjualan_bulanan = mysqli_query($koneksi, "select 
                            waktu.tanggal,
                            IFNULL(p.total, 0) AS total  
                            from tb_waktu waktu 
                            LEFT JOIN (SELECT 
                            p.id_penjualan, 
                            p.tgl_penjualan, 
                            SUM(IFNULL(p.total, 0) + IFNULL(p.tarif, 0)) AS total 
                            FROM
                            penjualan p WHERE left(p.tgl_penjualan, 7) = '$tahun-$bulan' GROUP BY p.tgl_penjualan) p ON waktu.tanggal = p.tgl_penjualan 
                            where left(waktu.tanggal, 7) = '$tahun-$bulan' ORDER BY waktu.tanggal; ");
                        while ($penjualan_bulanan = mysqli_fetch_assoc($data_penjualan_bulanan)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $penjualan_bulanan['tanggal']; ?></td>
                                <td><?php echo $penjualan_bulanan['total']; ?></td>
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
    function cetakLaporanBulanan()
    {
        var bulan = document.getElementsByName("bulan")[0].value;
        var tahun = document.getElementsByName("tahun")[0].value;
        window.open("laporan/cetak_laporan_penjualan_bulanan.php?bulan=" + bulan + "&tahun=" + tahun);
    }
</script>