<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'koneksi.php';
?>

<!doctype html>
<html class="no-js" lang="en">
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
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
            <li><a href="destinasi.php">Destination</a></li>
            <li><a href="akomodasi.php">Accomodation</a></li>
            <li><a href="produk.php">Products</a></li></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="index.php#about">About</a></li>
            <?php

          if(isset($_SESSION['username'])){
            echo '<li class="active"><a href="account.php">My Account</a></li>';
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
    </div>
    <br>
    <br>
    <div class = "container">
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><?php echo '<h3>Hi, ' .$_SESSION['username'] .'</h3>'; ?></p>

        <p><h4>Account Details</h4></p>

        <p>Below are your purchase details in the database. If you wish to change anything, then just contact admin for update.</p>
      </div>
    </div>

          <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My Purchases History</h3>
        <hr>

        <?php
          $user = $_SESSION["username"];
          
          $result = mysqli_query($koneksi,"SELECT * FROM cart WHERE username='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
              echo '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
              echo '<p><strong>Product Name</strong>: '.$obj->produk_nama.'</p>';
              echo '<p><strong>Price Per Unit</strong>: '.$obj->harga.'</p>';
              echo '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
              echo '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
              echo '<p><hr></p>';
            }
          }
        ?>
      </div>
    </div>


<!-- Footer -->
<div class="footer text-center">
        <p>&copy; 2021 Desa Wisata. All Rights Reserved. Proudly created by <a href="http://udinus.ac.id">Mahasiswa UDINUS</a></p>
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
  </body>
</html>
