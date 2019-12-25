<?php
$no = 1;
$id = $_GET['id'];
$get = $koneksi->query("SELECT * FROM detail LEFT JOIN penjualan ON detail.id_penjualan=penjualan.id_penjualan WHERE penjualan.id_penjualan = $id");
$pelanggan = $get->fetch_object();

// proteksi
// mendpatkan id pelanggan yg beli
$idBeli = $pelanggan->id_pelanggan;
// mendpatkan id pelanggan yg login
$idLogin = $_SESSION['member']['id_pelanggan'];

if ($idBeli !== $idLogin) {
    echo "<script>alert('Jangan Nakal');location='index.php?page=riwayat'</script>";
}
?>


<div class="row">
    <div class="span9">
        <div class="well well-small">
            <h1>Konfirmasi Pembayaran</h1>
            <hr class="soften" />
            <div class="alert alert-info">
                Silahkan Transfer ke salah satu rekening : <br>
                <strong>
                    <table class="table">
                        <tr>
                            <td>BRI : 5521293019203</td>
                            <td>Mandiri : 2231234</td>
                            <td>BCA : 13212341</td>
                        </tr>
                    </table>
                </strong>
                Total Yang Akan Di Bayarkan Adalah Rp.
                <strong><?php echo number_format($pelanggan->total) ?></strong> <br>
            </div>
            <div class="clr"></div>
            <form enctype="multipart/form-data" method="post" class="bs-docs-example form-horizontal">
                <div class="control-group ">
                    <label class="control-label">Nama Penyetor</label>
                    <div class="controls">
                        <input name="nama" required type="text">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">BANK</label>
                    <div class="controls">
                        <input name="bank" required type="text">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Jumlah</label>
                    <div class="controls">
                        <input name="jumlah" required type="number" min="1">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Foto Bukti</label>
                    <div class="controls">
                        <input name="bukti" required type="file">
                        <span class="label label-important">Foto Max: 2MB</span>
                    </div>

                </div>
                <div class="control-group ">
                    <div class="controls">
                        <button name="konfirmasi" class="shopBtn">Konfirmasi</button>
                    </div>
                </div>
            </form>
            <hr>
            <?php
            if (isset($_POST['konfirmasi'])) {
                $namabukti = $_FILES['bukti']['name'];
                $lokasi = $_FILES['bukti']['tmp_name'];
                // proteksi nama foto yang sama
                $namafix = date("Ydmhis") . $namabukti;
                move_uploaded_file($lokasi, "admin/assets/images/bukti_bayar/$namafix");
                $nama = $_POST['nama'];
                $bank = $_POST['bank'];
                $jumlah = $_POST['jumlah'];
                $tanggal = date("Y-m-d");

                $koneksi->query("INSERT INTO `pembayaran`(  `id_penjualan`, 
                                                            `nama`, 
                                                            `bank`, 
                                                            `jumlah`, 
                                                            `tanggal`, 
                                                            `bukti`) VALUES 
                                                            ('$id',
                                                            '$nama',
                                                            '$bank',
                                                            '$jumlah',
                                                            '$tanggal',
                                                            '$namafix'
                                                            )");

                $koneksi->query("UPDATE penjualan SET status = 'Sudah Di Bayar' WHERE id_penjualan = '$id'");

                echo "<script>alert('Terimakasih, telah melakukan pembayaran');location='index.php?page=riwayat'</script>";
            }
            ?>
            <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Lanjut Belanja </a>
        </div>
    </div>
</div>