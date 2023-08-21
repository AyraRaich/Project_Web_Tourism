<?php
$namafolder="produk/";
include "../koneksi.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
				$jenis_gambar	= $_FILES['nama_file']['type'];
				$produk_nama	= $_POST['produk_nama'];
				$kategori		= $_POST['kategori'];
				$produk_desc	= $_POST['produk_desc'];
				$qty	        = $_POST['qty'];
                $harga	        = $_POST['harga'];
				
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO produk (produk_nama, produk_desc, produk_gambar, kategori, qty, harga)
				VALUES('$produk_nama', '$produk_desc', '$gambar', '$kategori', '$qty', '$harga')";
			$res=mysqli_query($koneksi, $sql);
			 echo "<script>alert('Data Produk Berhasil dimasukan!'); window.location = './produk.php'</script>";	
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