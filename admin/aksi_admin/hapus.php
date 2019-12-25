<?php 
$id = $_GET['idadmin'];
$hapus = $koneksi->query("DELETE FROM admin WHERE id_admin= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_admin';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_admin';
    </script>";
}
 ?>