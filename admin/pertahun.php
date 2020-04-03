<?php
session_start();
include('components/koneksi.php');
$tahun = $_POST['tahun'];
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login');location='login.php';</script>";
} ?>
<?php
$tahun = $_POST['tahun'];
// $tahun = date("Y");

if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
    $tahun = $_GET['tahun'];
}
?>
<!DOCTYPE html>

<head>
    <title>Cetak Laporan Pertahun</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.png">
    <?php include('components/head.php'); ?>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <img width="220px" height="170px" src="../assets/img/logo.png">
            </div>
            <div class="col-sm-9">
                <h1>Plaza Yulia Furniture</h1>
                <h5>Jln. Lubuk Basung-Bukittinggi KM 4, Kabupaten Agam, Sumatera Barat 26452, Indonesia</h5>
                <h5>No Tlp. : 0819 629 431</h5>
                <h5>Facebook : <i>yudhiyulia.furniture</i></h5>
                <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
            </div>
        </div>
        <br>
        <h3 class="col-sm-12" align="center"><u>Laporan Data Produk Tahun <?php echo $tahun  ?></u></h3>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Bulan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_penjualan_tahuan = mysqli_query($koneksi, "select 
                            MONTHNAME(waktu.tanggal) AS bulan,
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
                                $total += $penjualan_tahunan['total'];
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $penjualan_tahunan['bulan']; ?></td>
                                    <td>Rp. <?php echo number_format($penjualan_tahunan['total']); ?></td>

                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>Rp. <?php echo number_format($total) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cetakLaporanTahunan() {
            var tahun = document.getElementsByName("tahun")[0].value;
            window.open("laporan/cetak_laporan_penjualan_tahunan.php?tahun=" + tahun, "_blank");
        }
    </script>
    <script>
        window.print();
    </script>
</body>

</html>