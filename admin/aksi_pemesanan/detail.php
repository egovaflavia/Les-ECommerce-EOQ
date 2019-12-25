<div id="page-wrapper">
    <?php
    $no = 1;
    $id = $_GET['idpemesanan'];
    $get = $koneksi->query("SELECT * FROM detail    LEFT JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan
                                                    LEFT JOIN barang ON detail.kd_barang=barang.kd_barang
                                                    LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori
                                                    LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan 
                                                    LEFT JOIN ongkos_kirim ON penjualan.id_ongkir=ongkos_kirim.id_ongkir 
                                                    WHERE penjualan.id_penjualan = $id");
    $pelanggan = $get->fetch_object();
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pemesanan </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Detail Pemesanan</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <h2>Pemesanan Atas Nama <?php echo $pelanggan->username ?> </h2>
            <a target="_blank" href="cetak.php?idpemesanan=<?php echo $id ?>" class="btn btn-success"> <span class="fa fa-print"></span> Cetak</a>
            <br>
            <br>
            <table class="">
                <tr>
                    <td>Nama Pemesan : <?php echo $pelanggan->username ?></td>
                </tr>
                <tr>
                    <td>No Telp. : <?php echo $pelanggan->no_telp ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pemesanan : <?php echo $pelanggan->tgl_penjualan ?></td>
                </tr>
                <tr>
                    <td>Tujuan Pengiriman : <?php echo $pelanggan->kota ?></td>
                </tr>
                <tr>
                    <td>Ongkos Kirim : <?php echo $pelanggan->tarif ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap : <?php echo $pelanggan->alamt ?></td>
                </tr>
            </table>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
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
                        $id = $_GET['idpemesanan'];
                        $get = $koneksi->query("SELECT * FROM detail    LEFT JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan
                                                LEFT JOIN barang ON detail.kd_barang=barang.kd_barang
                                                LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori
                                                LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan 
                                                LEFT JOIN ongkos_kirim ON penjualan.id_ongkir=ongkos_kirim.id_ongkir 
                                                WHERE penjualan.id_penjualan = $id");
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
                            <td colspan="5">Total</td>
                            <td>Rp. <?php echo number_format($total)  ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <h4>Total Yang Akan Di Bayarkan Adalah Rp. <?php echo number_format($total + $pelanggan->tarif) ?></h4>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->