<?php
include "../koneksi.php";
$id_akomodasi = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM akomodasi WHERE id_akomodasi='$id_akomodasi'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'akomodasi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'akomodasi.php'</script>";	
}
?>