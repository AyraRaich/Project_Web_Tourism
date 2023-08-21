<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'koneksi.php';

$username = $_POST["username"];
$password = $_POST["password"];

$result = mysqli_query($koneksi,"SELECT * from users where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
if($cek > 0){
 
	$data = mysqli_fetch_assoc($result);
 
	// cek jika user login sebagai admin
	if($data['type']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['type'] = "admin";
		$_SESSION['id'] = $obj->id;
		// alihkan ke halaman dashboard admin
		header("location:./admin/admin.php");
 
	
	}else if($data['type']!="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['type'] = "user";
		$_SESSION['id'] = $obj->id;
		
		header("location:index.php");
	}else{ 
		// alihkan ke halaman login kembali
		header("Refresh: 3; url=index.php");
	}	
}else{
	echo '<h1>Invalid Login! Redirecting...</h1>';
	header("Refresh: 3; url=index.php");
}


?>