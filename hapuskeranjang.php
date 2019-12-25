<?php
$get_id = $_GET['id'];
unset($_SESSION["keranjang"][$get_id]);
echo "<script>alert('Produk Telah Dihapus Dari Keranjang Belanja');</script>";
echo "<script>window.location='index.php?page=keranjang'</script>";
