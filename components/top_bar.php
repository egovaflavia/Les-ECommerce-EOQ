<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left socialNw">
                    <a target="_blank" href="https://id-id.facebook.com/yudhiyulia.furniture"><span class="icon-facebook"></span></a>
                    <!-- <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a> -->
                </div>
                <a class="" href="index.php"> <span class="icon-home"></span> Home</a>
                <?php
                if (!empty($_SESSION['member'])) {
                ?>
                    <a href="index.php?page=akun"><span class="icon-user"></span> My Account</a>
                <?php } else { ?>
                    <a href="index.php?page=daftar"><span class="icon-edit"></span> Daftar </a>
                <?php } ?>
                <!-- <a href="index.php?page=profil"><span class="icon-envelope"></span> Hubungi Kami</a> -->
                <a href="index.php?page=keranjang"><span class="icon-shopping-cart"></span> Keranjang
                    <!-- <span class="badge badge-warning"> $448.42</span> --></a>
            </div>
        </div>
    </div>
</div>