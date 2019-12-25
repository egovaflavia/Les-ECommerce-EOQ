<div id="sidebar" class="span3">
    <div class="well well-small">
        <ul class="nav nav-list">
            <?php
            $ambil = $koneksi->query("SELECT * FROM kategori");
            while ($pecah = mysqli_fetch_assoc($ambil)) {
            ?>
                <li><a href="index.php?page=grid&idkategori=<?php echo $pecah['id_kategori'] ?>"><span class="icon-chevron-right"></span><?php echo $pecah['nm_kategori'] ?></a></li>
            <?php } ?>
            <li style="border:0"> &nbsp;</li>
        </ul>
    </div>

    <div class="well well-small"><a href=""><img src="assets/img/rek.jpg" alt="payment method paypal"></a></div>
</div>