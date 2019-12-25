<?php
$no = 1;
$id = $_GET['id'];
$get = $koneksi->query("SELECT * FROM detail LEFT JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan
                                            LEFT JOIN barang ON detail.kd_barang=barang.kd_barang
                                            LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori
                                            LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan 
                                            LEFT JOIN ongkos_kirim ON penjualan.id_ongkir=ongkos_kirim.id_ongkir 
                                            WHERE penjualan.id_penjualan = $id");
$pelanggan = $get->fetch_object();

?>
<div class="row">
    <div class="span9">
        <div class="well well-small">
            <h1>Keranjang Belanja</h1>
            <hr class="soften" />
            <h2>Pemesanan Atas Nama <?php echo $pelanggan->username ?> </h2>
            <a target="_blank" href="cetak.php?idpemesanan=<?php echo $id ?>" class="btn btn-success"> <span class="fa fa-print"></span> Cetak</a>
            <br>
            <br>
            <table border="0">
                <tr>
                    <td width="150px">Nama Pemesan</td>
                    <td width="10px">:</td>
                    <td width="250px"><?php echo $pelanggan->username ?></td>
                    <td width="150px">Tujuan Pengiriman</td>
                    <td width="10px">:</td>
                    <td><?php echo $pelanggan->kota ?></td>
                </tr>
                <tr>
                    <td>No Telp.</td>
                    <td>:</td>
                    <td><?php echo $pelanggan->no_telp ?></td>
                    <td>Ongkos Kirim</td>
                    <td>:</td>
                    <td>Rp. <?php echo number_format($pelanggan->tarif) ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pemesanan</td>
                    <td>:</td>
                    <td><?php echo $pelanggan->tgl_penjualan ?></td>
                    <td>Alamat Lengkap</td>
                    <td>:</td>
                    <td><?php echo $pelanggan->alamt ?></td>
                </tr>

            </table>
            <?php
            // proteksi keamanan
            // mendapatkan id yg login
            $idLogin = $_SESSION['member']['id_pelanggan'];

            // mendpatkan id orang yg beli
            $idOrangYgBeli = $pelanggan->id_pelanggan;

            if ($idLogin !== $idOrangYgBeli) {
                echo "
                <script>alert('Jangan Nakal');location='index.php?page=riwayat'</script>
                ";
            }
            ?>

            <br>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="15px">No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $id = $_GET['id'];
                    $get = $koneksi->query("SELECT * FROM detail
                                                LEFT JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan
                                                LEFT JOIN barang ON detail.kd_barang=barang.kd_barang
                                                LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori
                                                LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan 
                                                LEFT JOIN ongkos_kirim ON penjualan.id_ongkir=ongkos_kirim.id_ongkir 
                                                WHERE penjualan.id_penjualan = '$id'");
                    while ($row = $get->fetch_object()) {
                        $subtotal = 0;
                        $subtotal = $row->jml_beli * $row->harga;
                        $total += $subtotal;

                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row->nm_barang ?></td>
                            <td><?php echo $row->nm_kategori ?></td>
                            <td><?php echo $row->jml_beli ?></td>
                            <td><?php echo $row->harga ?></td>
                            <td>Rp. <?php echo number_format($subtotal) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Ongkos Kirim</td>
                        <td>Rp. <?php echo number_format($pelanggan->tarif) ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">Total</td>
                        <td>Rp. <?php echo number_format($total + $pelanggan->tarif) ?></td>
                    </tr>
                </tfoot>
            </table>
            <h4>Total Yang Akan Di Bayarkan Adalah Rp. <?php echo number_format($total + $pelanggan->tarif) ?></h4>
            <br />

            <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Lanjut Belanja </a>
            <a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

        </div>
    </div>
</div>