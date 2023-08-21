<?php 
if(session_id() == '' || !isset($_SESSION)){session_start();}
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Desa Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--Bootshape-->
    <link href="css/bootshape.css" rel="stylesheet">
    <link rel="stylesheet" href="css/foundation.css">
  </head>
  <body>
    <!-- Navigation bar -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Wisata Desa</a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
          <ul class="navbar-nav nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="destinasi.php">Destinations</a></li>
            <li><a href="akomodasi.php">Accomodation</a></li>
            <li class="active"><a href="produk.php">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="index.php#about">About</a></li>
            <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
          </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->
    <aside class="left-off-canvas">
<p class="bold">Pilih Kategori:</p>
  <div class="off-canvas-list">
    <?php
    echo '<a href=pakaian.php>Pakaian</a>';
    echo "<br>";
    echo '<a href=makanan.php>Makanan</a>';
    echo "<br>";
    echo '<a href=minuman.php>Minuman</a>';
    echo "<br>";
    echo '<a href=kerajinan.php>Kerajinan</a>';
    ?>
  </div>
    </aside>
    <section class="container">
          <div class="row">
            <div class="large-12 columns">
            <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = mysqli_query($koneksi,"SELECT * FROM produk WHERE kategori = 'Pakaian'");
          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->produk_nama.'</h3></p>';
              echo '<img src="./admin/'.$obj->produk_gambar.'"height="50%" width="250px"/>';
              echo '<p><strong>Deskripsi</strong>: '.$obj->produk_desc.'</p>';
              echo '<p><strong>Ketersediaan</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Harga Satuan</strong>: '.$obj->harga.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
      </div>
            </div>
          </div>
    </section>
    <!-- Footer -->
    <div class="footer text-center">
        <p>&copy; 2021 Desa Wisata. All Rights Reserved. Proudly created by <a href="http://udinus.ac.id">Mahasiswa UDINUS</a></p>
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
  </body>
</html>