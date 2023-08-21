<?php
$namafolder="gambar/";
include "../koneksi.php";


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
				$jenis_gambar	= $_FILES['nama_file']['type'];
				$nama_akomodasi	= $_POST['nama_akomodasi'];
				$kategori		= $_POST['kategori'];
				$alamat			= $_POST['alamat'];
                $kontak			= $_POST['kontak'];
				$deskripsi_akomodasi	= test_input($_POST['editor']);
				
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO akomodasi (nama_akomodasi, kategori,deskripsi_akomodasi,alamat,kontak, foto_lokasi)
				VALUES('$nama_akomodasi', '$kategori', '$deskripsi_akomodasi', '$alamat', '$kontak', '$gambar')";
			$res=mysqli_query($koneksi, $sql);
			 echo "<script>alert('Data Akomodasi Berhasil dimasukan!'); window.location = './akomodasi.php'</script>";	
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}



?>