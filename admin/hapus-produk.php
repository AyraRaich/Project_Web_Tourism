<?php
include "../koneksi.php";
$id_produk = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id_produk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'produk.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'produk.php'</script>";	
}
?>