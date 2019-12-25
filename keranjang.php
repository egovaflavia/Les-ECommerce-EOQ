<?php

// jk kosong keranjang belanja,mk larikan ke index
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php'</script>";
}
?>
<div class="row">
    <div class="span9">
        <div class="well well-small">
            <h1>Keranjang Belanja</h1>
            <hr class="soften" />
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["keranjang"] as $kd_barang => $jumlah) : ?>
                        <!-- Menampilkan barang di session -->
                        <?php
                        $no = 1;
                        $ambil = $koneksi->query("SELECT * FROM barang WHERE kd_barang = $kd_barang");
                        $pecah = $ambil->fetch_assoc();
                        // Mencari subharga
                        $subharga = $pecah['harga'] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pecah['nm_barang'] ?></td>
                            <td><img style="width: 100px" src="admin/assets/images/<?php echo $pecah['gambar'] ?>" alt=""></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $jumlah ?> Unit</td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="index.php?page=hapuskeranjang&id=<?php echo $pecah['kd_barang'] ?>" class="btn btn-danger"><span class="icon-remove"></span></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table><br />

            <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Lanjut Belanja </a>
            <a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

        </div>
    </div>
</div>