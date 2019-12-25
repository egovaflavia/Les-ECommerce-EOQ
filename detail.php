<?php
$kd_barang = $_GET['idbarang'];
$ambil = $koneksi->query("SELECT * FROM barang LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE kd_barang = $kd_barang");
$pecah = $ambil->fetch_assoc();
// var_dump($pecah);
?>
<div class="span9">
    <div class="well well-small">
        <div class="row-fluid">
            <div class="span5">
                <div id="myCarousel" class="carousel slide cntr">
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="#">
                                <img style="width:100%;height: 300px" src="admin/assets/images/<?php echo $pecah['gambar'] ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span7">
                <h3><?php echo $pecah['nm_barang'] ?></h3>
                <hr class="soft" />

                <form method="post" class="form-horizontal qtyFrm">
                    <div class="control-group">
                        <label class="control-label"><span>Rp. <?php echo $pecah['harga'] ?></span></label>
                        <div class="controls">
                            <input name="jumlah" type="number" min="1" class="span6" placeholder="Qty.">
                        </div>
                    </div>

                    <h4>Stok : <?php echo $pecah['stok'] ?> Unit</h4>
                    <p><?php echo $pecah['deskripsi'] ?><p>
                            <?php
                            if ($pecah['stok'] == 0) {
                            ?>
                                <a disabled type="submit" class="defaultBtn"><span class="icon-ban-circle"></span>
                                    Maaf Stok Tidak Tersedia</a>
                            <?php } else { ?>
                                <button name="beli" type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span>
                                    Tambah Ke Keranjang</button>
                            <?php } ?>
                </form>
                <?php
                if (isset($_POST['beli'])) {
                    // mendpatkan jumlah yang di inputkan
                    $jumlah = $_POST['jumlah'];
                    $_SESSION['keranjang'][$kd_barang] += $jumlah;
                    echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
                    echo "<script>window.location='index.php?page=keranjang'</script>";
                }
                ?>
            </div>
        </div>
        <hr class="softn clr" />


        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
        </ul>
        <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
                <h4>Product Information</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Nama Barang:</td>
                            <td class="techSpecTD2"><?php echo $pecah['nm_barang'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Harga:</td>
                            <td class="techSpecTD2">Rp. <?php echo number_format($pecah['harga']) ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Kategori:</td>
                            <td class="techSpecTD2"><?php echo $pecah['nm_kategori'] ?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Stok:</td>
                            <td class="techSpecTD2"><?php echo $pecah['stok'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="profile">
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft">
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cat1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                    etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl
                    craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                <br>
                <br>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/b.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/a.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
            </div>
            <div class="tab-pane fade" id="cat2">

                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften" />

            </div>
        </div>

    </div>
</div>