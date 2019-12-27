<?php
session_start();
include('components/koneksi.php');
$bulan = $_POST['bulan'];
$bln = explode('-', $bulan);
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login');location='login.php';</script>";
} ?>
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
        <h3 class="col-sm-12" align="center"><u>Laporan Data Penjualan Bulan Ke- <?php echo $bln[1]  ?></u></h3>
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
                                <th>Nama Pelanggan</th>
                                <th>No Hp</th>
                                <th>Tanggal</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Total Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $bulan = $_POST['bulan'];
                            $ambil = $koneksi->query("SELECT * FROM `penjualan` LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.status != 'Pending' AND penjualan.tgl_penjualan LIKE '$bulan%' ");
                            while ($pecah = $ambil->fetch_object()) {
                                $ttl += $pecah->total;
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->username ?></td>
                                    <td><?php echo $pecah->no_telp ?></td>
                                    <td><?php echo tgl_indo($pecah->tgl_penjualan) ?></td>
                                    <td><?php echo $pecah->kota ?></td>
                                    <td>Rp. <?php echo number_format($pecah->total) ?></td>
                                </tr>
                            <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td>Rp. <?php echo number_format($ttl) ?></td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>