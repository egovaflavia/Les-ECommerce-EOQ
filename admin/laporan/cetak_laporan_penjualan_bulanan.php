<?php include '../components/koneksi.php'; ?>
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
<html>

<head>
    <title>
        Laporan Penjualan Bulanan
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

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
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