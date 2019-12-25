<?php include '../components/koneksi.php'; ?>
<html>

<head>
    <title>
        Laporan Barang
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
        }

        th {
            background-color: gray;
        }
    </style>
</head>

<body>
    <h1>Toko Yulia Furniture</h1>
    <h2>Laporan EOQ </h2>
    <h2>Tanggal</h2>

    <table>
    
            <tr>
                <th width="15px">No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Biaya Simpan</th>
                <th>Biaya Pesan</th>
                <th>Kebutuhan Tahunan</th>
                <th>Hasil Eoq</th>
            </tr>
        
    
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
                </tr>
            <?php } ?>
        
    </table>
<br><br>

    <div style="float: right; text-align: center; width: 300px;">
        Pemilik Toko
        <br>
        <br>
        <br>
        (................)
    </div>
</body>

</html>