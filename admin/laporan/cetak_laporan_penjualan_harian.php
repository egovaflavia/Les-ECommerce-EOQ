<?php include '../components/koneksi.php'; ?>
<?php
$bulan = date("m");
$tahun = date("Y");

$hari = date("Y-m-d");
$hari = $_GET['hari'];
?>

<html>

<head>
    <title>
        Laporan Penjualan Harian
    </title>
    <style>
        h1,
        h2,
        h3 {
            text-align: center;
        }

        table {
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        th {
            background-color: gray;
        }
    </style>
</head>

<body>
    <h1>Toko Yulia Furniture</h1>
    <h2>Laporan Penjualan Bulanan </h2>
    <h2>Periode <?= $bulan . " " . $tahun ?></h2>

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
    <div style="float: right; text-align: center; width: 300px;">
        Pemilik Toko
        <br>
        <br>
        <br>
        (................)
    </div>
</body>

</html>