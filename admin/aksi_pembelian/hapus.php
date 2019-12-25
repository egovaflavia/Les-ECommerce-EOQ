<?php 
$id = $_GET['idpembelian'];
$hapus = $koneksi->query("DELETE FROM Pembelian WHERE id_pembelian= $id");

if($hapus){
    echo "<script>
    alert('Data berhasil di hapus');
	location='index.php?page=tabel_pembelian';
    </script>";
}else{
	echo "<script>
    alert('Data gagal di hapuss');
    location='index.php?page=tabel_pembelian';
    </script>";
}
 ?>