<?php
if (empty($_SESSION['member'])) {
    echo "
    <script>alert('Silahkan login');location='index.php';</script>;
    ";
    exit;
}
?>

<div class="span9">
    <div class="well well-small">
        <h1> Plaza Yulia Furniture</h1>
        <hr class="soft" />
        <h3>Riwayat Belanja <?php echo $_SESSION['member']['username'] ?></h3>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th width="75px">Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th width="172px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // mendapatkan id pelanggan login dari session
                $id = $_SESSION['member']['id_pelanggan'];
                $ambil = $koneksi->query("SELECT * FROM `penjualan` WHERE id_pelanggan ='$id'");
                while ($pecah = $ambil->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pecah['tgl_penjualan'] ?></td>
                        <td>
                            <?php if ($pecah['status'] == "Pending") { ?>
                                <span class="label label-warning"><?php echo $pecah['status'] ?></span>
                            <?php } ?>

                        </td>
                        <td>Rp. <?php echo number_format($pecah['total']) ?></td>
                        <td>
                            <a target="_blank" href="cetak.php?idpemesanan=<?php echo $pecah['id_penjualan'] ?>" class="btn btn-success"> <span class="fa fa-print"></span> Cetak</a>
                            <a href="index.php?page=pembayaran&id=<?php echo $pecah['id_penjualan'] ?>" class="btn btn-primary"> <span class="fa fa-print"></span> Pembayaran</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>