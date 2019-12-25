<?php
$id = $_SESSION['member']['id_pelanggan'];
// var_dump($id);
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
$pecah = $ambil->fetch_assoc();
// var_dump($pecah);
?>
<div class="span9">
    <div class="well well-small">
        <h1> Akun Anda</h1>
        <hr class="soft" />
        <h4>Detail Akun</h4>
        <form method="post" class="bs-docs-example form-horizontal">
            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input value="<?php echo $pecah['id_pelanggan'] ?>" type="hidden" name="id">
                    <input value="<?php echo $pecah['username'] ?>" autofocus type="text" name="user">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input value="<?php echo $pecah['password'] ?>" type="password" name="pass">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <input value="<?php echo $pecah['email'] ?>" type="email" name="email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telephone</label>
                <div class="controls">
                    <input value="<?php echo $pecah['no_telp'] ?>" type="text" name="no_telp">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                    <textarea name="alamat" cols="30" rows="5"><?php echo $pecah['alamat'] ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="daftar" class="btn btn-primary" name="daftar">Edit</button>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['daftar'])) {
            $id           = $_POST['id'];
            $user         = $_POST['user'];
            $pass         = $_POST['pass'];
            $email         = $_POST['email'];
            $no_telp         = $_POST['no_telp'];
            $alamat       = $_POST['alamat'];

            $daftar = $koneksi->query("UPDATE `pelanggan` SET   `username`='$user',
                                                                `password`='$pass',
                                                                `email`='$email',
                                                                `no_telp`='$no_telp',
                                                                `alamat`='$alamat' WHERE 
                                                                `id_pelanggan`='$id'
                                                                ");

            if ($daftar) {
                echo "
                    <script>alert('Berhasil di Update');window.location='index.php?page=akun'</script>;
                    ";
            } else {
                echo "
                    <script>alert('Gagal Update');window.location='index.php?page=akun'</script>;
                    ";
            }
        }
        ?>
        <hr class="soft" />
    </div>
</div>