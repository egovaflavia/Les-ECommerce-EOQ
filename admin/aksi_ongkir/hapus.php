<?php 
$id = $_GET['idongkir'];
$hapus = $koneksi->query("DELETE FROM ongkos_kirim WHERE id_ongkir= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_ongkir';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_ongkir';
    </script>";
}
 ?>