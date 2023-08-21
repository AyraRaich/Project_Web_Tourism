<?php
$namafolder="gambar/";
include "../koneksi.php";
$tgl_upload = date("Y-m-d H:i:s");

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
				$jenis_gambar	= $_FILES['nama_file']['type'];
				$nama_wisata	= $_POST['nama_wisata'];
				$kategori		= $_POST['kategori'];
				$lokasi			= $_POST['lokasi'];
				$konten_wisata	= test_input($_POST['editor']);
				
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO wisata (nama_wisata, kategori, lokasi, konten_wisata, tgl_upload, gambar)
				VALUES('$nama_wisata', '$kategori', '$lokasi', '$konten_wisata', '$tgl_upload', '$gambar')";
			$res=mysqli_query($koneksi, $sql);
			 echo "<script>alert('Data Wisata Berhasil dimasukan!'); window.location = './wisata.php'</script>";	
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