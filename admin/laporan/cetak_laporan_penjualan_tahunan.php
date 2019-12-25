<?php include '../components/koneksi.php' ?>
<?php
$tahun = date("Y");

if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
    $tahun = $_GET['tahun'];
}
?>
<html>

<head>
    <title>
        Laporan Penjualan Tahunan
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
    <h2>Laporan Penjualan Tahunan </h2>
    <h2>Periode <?= $tahun ?></h2>

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
                    <td><?php echo $no;
                        ?></td>
                    <td><?php echo $penjualan_tahunan['bulan'];
                        ?></td>
                    <td><?php echo $penjualan_tahunan['total'];
                        ?></td>

                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
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