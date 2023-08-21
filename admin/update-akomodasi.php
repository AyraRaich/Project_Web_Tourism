<?php
include "../koneksi.php";
$namafolder="gambar/";

$id_akomodasi  	= $_POST['id_akomodasi'];
$nama_akomodasi   	= $_POST['nama_akomodasi'];
$kategori		= $_POST['kategori'];
$alamat			= $_POST['alamat'];
$kontak			= $_POST['kontak'];
$deskripsi_akomodasi	= $_POST['editor1'];
$jenis_gambar 	= $_FILES['nama_file']['type'];

$gambar = $namafolder . basename($_FILES['nama_file']['name']);
move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar);


$query = mysqli_query($koneksi, "UPDATE akomodasi SET nama_akomodasi='$nama_akomodasi', kategori='$kategori', deskripsi_akomodasi='$deskripsi_akomodasi', alamat='$alamat', kontak='$kontak', foto_lokasi='$gambar' WHERE id_akomodasi='$id_akomodasi'");
if ($query){
header('location:akomodasi.php');	
} else {
	echo "gagal";
    }
?>