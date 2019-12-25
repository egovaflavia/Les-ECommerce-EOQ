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
            padding: 5px;
        }

        th {
            background-color: gray;
        }
    </style>
</head>

<body>
    <h1>Toko Yulia Furniture</h1>
    <h2>Laporan Barang </h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama barang</th>
            <th>Harga barang</th>
            <th>Stok barang</th>
        </tr>

        <?php
        $no = 1;
        $data_barang = mysqli_query($koneksi, "SELECT * FROM barang LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori");
        while ($barang = mysqli_fetch_assoc($data_barang)) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $barang['nm_barang']; ?></td>
                <td><?php echo $barang['harga']; ?></td>
                <td><?php echo $barang['stok']; ?></td>
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