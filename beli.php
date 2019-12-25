<?php
// session_start();
// include('admin/components/koneksi.php');
// mendapatkan id
$kd_barang = $_GET['kd_barang'];

// jk ada produk,mk produk +1
if (isset($_SESSION['keranjang'][$kd_barang])) {
    $_SESSION['keranjang'][$kd_barang] += 1;
    // selain itu, mk produk di anggap di beli 1
} else {
    $_SESSION['keranjang'][$kd_barang] = 1;
}

echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
echo "<script>window.location='index.php?page=keranjang'</script>";
