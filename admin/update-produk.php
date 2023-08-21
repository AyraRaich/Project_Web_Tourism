<?php
include "../koneksi.php";
$namafolder="produk/";

$id_produk  	= $_POST['id'];
$produk_nama  	= $_POST['produk_nama'];
$kategori		= $_POST['kategori'];
$produk_desc	= $_POST['produk_desc'];
$qty	        = $_POST['qty'];
$harga	        = $_POST['harga'];
$produk_gambar  = $_FILES['nama_file']['type'];

$gambar = $namafolder . basename($_FILES['nama_file']['name']);
move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar);

$query = mysqli_query($koneksi, "UPDATE produk SET produk_nama='$produk_nama', produk_desc='$produk_desc', produk_gambar='$gambar', kategori='$kategori', qty='$qty', harga='$harga' WHERE id='$id_produk'");
if ($query){
header('location:produk.php');	
} else {
	echo "gagal";
    }
?>