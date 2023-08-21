<?php
include "../koneksi.php";
$user_id       = $_POST['user_id'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$email         = $_POST['email'];
$address       = $_POST['address'];
$phone         = $_POST['phone'];
$type          = $_POST['type'];

$query = mysqli_query($koneksi, "UPDATE users SET username='$username', password='$password', email='$email', address='$address', phone='$phone', type='$type' WHERE id='$user_id'");
if ($query){
header('location:user.php');	
} else {
	echo "gagal";
    }
?>