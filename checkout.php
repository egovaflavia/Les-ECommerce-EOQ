<?php

// jk kosong keranjang belanja,mk larikan ke index
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php'</script>";
}
if (!isset($_SESSION["member"])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>window.location='index.php?page=keranjang'</script>";
}
?>
<div class="row">
    <div class="span9">
        <div class="well well-small">
            <h1>Checkout</h1>
            <hr class="soften" />
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width='10px'>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <!-- <th>Diskon</th> -->
                        <th>Sub Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <!-- Menampilkan produk di session -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM barang JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE barang.kd_barang = $id_produk");
                        $pecah = $ambil->fetch_assoc();

                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                        $subharga = $pecah['harga'] * $jumlah;

                        // if ($jumlah >= $pecah->produk_min) {
                        //     $diskon = $subharga * ($pecah->produk_diskon / 100);
                        //     $ttlsub = $subharga - $diskon;
                        // } else {
                        //     $ttlsub = $subharga;
                        // }

                        $total += $subharga;
                        $no = 1;
                        ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pecah['nm_barang'] ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $jumlah . " $pecah->kategori_sat"  ?></td>
                            <!-- <td>
                            <?php
                            // if ($jumlah >= $pecah->produk_min) {
                            //     echo "Rp. " . number_format($diskon);
                            // } else {
                            //     echo "Rp. 0";
                            // }
                            ?>
                        </td> -->
                            <td>
                                <?php echo "Rp. " . number_format($subharga); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja :</th>
                        <th>Rp. <?php echo number_format($total); ?></th>
                    </tr>
                </tfoot>
            </table><br />
            <form method="post">
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <div class="">
                                    <label>Pembelian Atas Nama : </label>
                                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['member']['username']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <label>No. Hp : </label>
                                    <input type="text" class="form-control" readonly value="<?php echo $_SESSION['member']['no_telp']; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <label>Alamat Tujuan : </label>
                                    <select class="form-control" name="ongkir">
                                        <option selected>Pilih</option>
                                        <?php
                                        $ambil_ongkir = $koneksi->query("SELECT * FROM ongkos_kirim");
                                        while ($pecah_ongkir = $ambil_ongkir->fetch_assoc()) {
                                        ?>
                                            <option class="form-control" value="<?php echo $pecah_ongkir['id_ongkir'] ?>"><?php echo $pecah_ongkir['tujuan'] ?> - Rp. <?php echo number_format($pecah_ongkir['tarif']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="">
                                    <label>Alamat Lengkap Pengiriman</label>
                                    <textarea class="form-control" name="alamat_pengiriman" cols="400" rows="3" placeholder="Masukan alamat lengkap pengiriman (Termasuk kode pos)"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <a href="index.php?page=keranjang" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Keranjang Belanja </a>
                <button name="checkout" class="shopBtn btn-large pull-right">Checkout <span class="icon-arrow-right"></span></button>
            </form>
            <?php
            if (isset($_POST['checkout'])) {

                $id_member            = $_SESSION['member']['id_pelanggan'];
                $id_ongkir            = $_POST['ongkir'];
                $tgl                  = date("Y-m-d");
                $alamat_pengiriman    = $_POST['alamat_pengiriman'];
                $ambil_data_ongkir    = $koneksi->query("SELECT * FROM ongkos_kirim WHERE id_ongkir = '$id_ongkir'");
                $pecah_tarif          = $ambil_data_ongkir->fetch_assoc();
                $tarif                = $pecah_tarif['tarif'];
                $nama_kota            = $pecah_tarif['tujuan'];

                $total_belanja        = $total + $tarif;

                // Menyimpan data ke tb_pembelian
                $koneksi->query("INSERT INTO  `penjualan`(  `id_pelanggan`, 
                                                `id_ongkir`, 
                                                `tgl_penjualan`, 
                                                `total`, 
                                                `kota`, 
                                                `tarif`, 
                                                `alamt`) 
                                                VALUES (
                                                '$id_member',
                                                '$id_ongkir',
                                                '$tgl',
                                                '$total_belanja',
                                                '$nama_kota',
                                                '$tarif',
                                                '$alamat_pengiriman')");


                // mendapatkan id pembelian barusan
                $id_pembelian_barusan = mysqli_insert_id($koneksi);

                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {


                    // Update stok
                    // $ambil_produk = $koneksi->query("SELECT * FROM barang WHERE kd_barang=$id_produk");
                    // while ($pecah_produk = $ambil_produk->fetch_assoc()) {
                    //     $update_stok = $pecah_produk['stok'] - $jumlah;
                    //     $koneksi->query("UPDATE `barang` SET `stok`='$update_stok' WHERE `kd_barang`='$id_produk'");
                    // }

                    $koneksi->query("UPDATE barang SET stok = stok - $jumlah WHERE kd_barang = $id_produk");

                    $koneksi->query("INSERT INTO `detail`(  `id_penjualan`, 
                                                `kd_barang`, 
                                                `jml_beli`) VALUES (
                                                '$id_pembelian_barusan',
                                                '$id_produk',
                                                '$jumlah')");
                }
                //mengkosongkan keranjang belanja 
                unset($_SESSION['keranjang']);
                // tampilan di alihkan ke halaman nota
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>window.location='index.php?page=nota&id=$id_pembelian_barusan';</script>";
            } ?>
        </div>
    </div>
</div>