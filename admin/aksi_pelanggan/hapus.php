<?php 
$id = $_GET['idpelanggan'];
$hapus = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_pelanggan';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_pelanggan';
    </script>";
}
 ?>