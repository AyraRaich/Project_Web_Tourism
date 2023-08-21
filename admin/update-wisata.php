<?php
include "../koneksi.php";
$namafolder="gambar/";
$tgl_upload = date("Y-m-d H:i:s");

$id_wisata  	= $_POST['id_wisata'];
$nama_wisata   	= $_POST['nama_wisata'];
$kategori		= $_POST['kategori'];
$lokasi			= $_POST['lokasi'];
$konten_wisata	= $_POST['editor1'];
$jenis_gambar 	= $_FILES['nama_file']['type'];

$gambar = $namafolder . basename($_FILES['nama_file']['name']);
move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar);


$query = mysqli_query($koneksi, "UPDATE wisata SET nama_wisata='$nama_wisata', kategori='$kategori', lokasi='$lokasi', konten_wisata='$konten_wisata', tgl_upload='$tgl_upload', gambar='$gambar' WHERE id_wisata='$id_wisata'");
if ($query){
header('location:wisata.php');	
} else {
	echo "gagal";
    }
?>