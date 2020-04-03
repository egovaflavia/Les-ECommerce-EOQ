<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>tambah eoq</h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_eoq" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">
                <div class="form-group">
                    <label>Barang</label>
                    <select id="barang" name="kd_barang" class="form-control">
                        <?php
                        $data_barang = array();
                        $ambil = $koneksi->query("SELECT * FROM barang");
                        while ($row = $ambil->fetch_object()) {
                            $data_barang[] = $row;
                        ?>
                            <option value="<?php echo $row->kd_barang ?>"><?php echo $row->nm_barang ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>biaya pemesanan (C)</label>
                    <input readonly id="biaya_pesan" name="biaya_pesan" class="form-control">
                </div>

                <div class="form-group">
                    <label>biaya simpan (I)</label>
                    <input readonly id="biaya_simpan" name="biaya_simpan" class="form-control">
                </div>

                <div class="form-group">
                    <label>harga (P)</label>
                    <input readonly id="harga" name="harga" class="form-control">
                </div>

                <div class="form-group">
                    <label>kebutuhan (R)</label>
                    <input onkeyup="eoq()" id="kebutuhan" name="tahunan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Eoq</label>
                    <input readonly id="hasil" name="hasil" class="form-control">
                </div>

                <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $kd_barang = $_POST['kd_barang'];

                $tahunan = $_POST['tahunan'];

                $simpan = $koneksi->query("INSERT INTO eoq (`kd_barang`,
                                                            `tahunan`) VALUES (
                                                                '$kd_barang',
                                                                '$tahunan')");

                if ($simpan) {
                    echo "<script>
                    alert('Data berhasil di simpan');
                    location='index.php?page=tabel_eoq';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal di simpan');
                    location='index.php?page=tabel_eoq';
                    </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    function tampil() {
        var barang_terpilih = document.getElementById("barang").selectedIndex;
        var data_barang = <?php echo json_encode($data_barang); ?>;
        var data_terpilih = data_barang[barang_terpilih];

        document.getElementById("biaya_pesan").value = data_terpilih.biaya_pesan;
        document.getElementById("biaya_simpan").value = data_terpilih.biaya_simpan;
        document.getElementById("harga").value = data_terpilih.harga;

    }

    document.getElementById("barang").addEventListener("change", tampil);

    tampil()

    function eoq() {

        var c = document.getElementById("biaya_pesan").value
        var i = document.getElementById("biaya_simpan").value
        var P = document.getElementById("harga").value
        var R = document.getElementById("kebutuhan").value

        var eoq = (2 * parseFloat(c) * parseFloat(R)) / (parseFloat(P) * parseFloat(i))

        document.getElementById('hasil').value = eoq
    }
</script>