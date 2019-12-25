<?php 
$id = $_GET['kdbarang'];
$hapus = $koneksi->query("DELETE FROM barang WHERE kd_barang= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_barang';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_barang';
    </script>";
}
 ?>