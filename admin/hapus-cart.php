<?php
include "../koneksi.php";
$id_cart = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM cart WHERE id='$id_cart'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'cart.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'cart.php'</script>";	
}
?>