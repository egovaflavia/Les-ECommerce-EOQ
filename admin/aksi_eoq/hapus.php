<?php 
$id = $_GET['ideoq'];
$hapus = $koneksi->query("DELETE FROM eoq WHERE id_eoq= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_eoq';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_eoq';
    </script>";
}
 ?>