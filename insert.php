<?php
include 'koneksi.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone"];

$query=("INSERT INTO users (username, password, address, email, phone) VALUES('$username', '$password','$address', '$email', '$phone')");
if(mysqli_query($koneksi,$query)){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>