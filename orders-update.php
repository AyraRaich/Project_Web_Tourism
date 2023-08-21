<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'koneksi.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = mysqli_query($koneksi,"SELECT * FROM produk WHERE id=".$product_id);

    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->harga * $quantity;

        $user = $_SESSION["username"];
        $query = "INSERT INTO cart (produk_nama, harga, units, total, username) VALUES ('$obj->produk_nama','$obj->harga','$quantity','$cost','$user')";
        $res=mysqli_query($koneksi, $query);
        if($res){
          $newqty = $obj->qty - $quantity;
          if($query = mysqli_query($koneksi, "UPDATE produk SET qty ='$newqty' WHERE id =".$product_id)){

          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:produk.php");

?>
