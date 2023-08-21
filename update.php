<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'koneksi.php';


$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$address = $_POST["address"];


if($username!=""){
  $result = mysqli_query($koneksi,"UPDATE users SET username = '$username' WHERE id=".$_SESSION['id']);
  if($result){
  }
}

if($address!=""){
  $result =  mysqli_query($koneksi,"UPDATE users SET address = '$address' WHERE id=".$_SESSION['id']);
  if($result){
  }
}

if($email!=""){
  $result =  mysqli_query($koneksi,"UPDATE users SET email ='$email' WHERE id=".$_SESSION['id']);
  if($result) {
  }
}

if($password!=""){
  $query =  mysqli_query($koneksi,"UPDATE users SET password ='$password' WHERE id=".$_SESSION['id']);
  if($query){
  }
}

else {
  echo 'Wrong Password. Please try again. <a href="account.php">Go Back</a>';
}

?>
