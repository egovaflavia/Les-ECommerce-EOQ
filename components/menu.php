<?php
if (isset($_POST['login'])) {
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username='$_POST[username]' AND password='$_POST[password]'");
    $yangcocok = $ambil->num_rows;
    if ($yangcocok == 1) {
        $_SESSION['member'] = $ambil->fetch_assoc();
        echo "<script>alert('Anda berhasil login')</script>;";
        if (isset($_SESSION['keranjang'])) {
            echo "<script>window.location='index.php?page=checkout'</script>;";
        } else {
            echo "<script>window.location='index.php?page=riwayat'</script>;";
        }
    } else {
        echo "<script>alert('Anda gagal login');window.location='index.php'</script>;";
    }
}
?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class=""><a href="index.php">Home </a></li>
                    <li class=""><a href="index.php?page=profil">Profil </a></li>
                    <li class=""><a href="index.php?page=profil#pembayaran">Rekening Pembayaran </a></li>
                    <li class=""><a href="index.php?page=profil#lokasi">Lokasi </a></li>
                </ul>
                <ul class="nav pull-right">
                    <?php
                    if (empty($_SESSION['member'])) {
                    ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
                            <div class="dropdown-menu">
                                <form method="post" class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" name="username" class="span2" placeholder="Username">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" name="password" class="span2" placeholder="Password">
                                    </div>
                                    <div class="control-group">
                                        <button name="login" type="submit" class="shopBtn btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class=""><a href="index.php?page=profil#lokasi">Selamat datang, <?php echo $_SESSION['member']['username'] ?> </a></li>
                        <li class=""><a href="index.php?page=riwayat"><span class="icon-money"></span> Riwayat Belanja </a></li>
                        <li class=""><a href="index.php?page=logout"><span class="icon-signout"></span>Logout </a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>