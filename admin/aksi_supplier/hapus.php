<?php 
$id = $_GET['idsupplier'];
$hapus = $koneksi->query("DELETE FROM supplier WHERE id_supplier= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_supplier';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_supplier';
    </script>";
}
 ?>