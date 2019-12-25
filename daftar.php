<div class="span9">
    <div class="well well-small">
        <h1> Plaza Yulia Furniture</h1>
        <hr class="soft" />
        <h2>Form Pendaftaran Member</h2>
        <form method="post" class="bs-docs-example form-horizontal">
            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input required autofocus type="text" name="user">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input required type="password" name="pass">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <input required type="email" name="email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telephone</label>
                <div class="controls">
                    <input required type="text" name="no_telp">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                    <textarea name="alamat" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="daftar" class="btn btn-primary" name="daftar">Daftar</button>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['daftar'])) {
            $user         = $_POST['user'];
            $pass         = $_POST['pass'];
            $email         = $_POST['email'];
            $no_telp         = $_POST['no_telp'];
            $alamat         = $_POST['alamat'];

            $daftar = $koneksi->query("INSERT INTO  `pelanggan` (   `username`, 
                                                                    `password`, 
                                                                    `email`, 
                                                                    `no_telp`, 
                                                                    `alamat`) 
                                                                    VALUES(
                                                                    '$user', 
                                                                    '$pass', 
                                                                    '$email', 
                                                                    '$no_telp', 
                                                                    '$alamat') ");

            if ($daftar) {
                echo "
                    <script>alert('Berhasil update, Silahkan login');window.location='index.php'</script>;
                    ";
            } else {
                echo "
                    <script>alert('Gagal update');window.location='index.php?page=daftar'</script>;
                    ";
            }
        }
        ?>
    </div>
</div>