<?php 
$id = $_GET['idkategori'];
$hapus = $koneksi->query("DELETE FROM kategori WHERE id_kategori= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_kategori';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_kategori';
    </script>";
}
 ?>