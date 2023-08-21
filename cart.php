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
            <li class="active"><a href="cart.php">Cart</a></li>
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
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php

          echo '<p><h3>Your Shopping Cart</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Picture</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

              $result = mysqli_query($koneksi,"SELECT * FROM produk WHERE id=".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->harga * $quantity;
                $total = $total + $cost;

                echo '<tr>';
                echo '<td> <img src="./admin/'.$obj->produk_gambar.'"height="30%" width="30%"/> </td>';
                echo '<td>'.$obj->produk_nama.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="produk.php" class="button [secondary success alert]">Continue Shopping</a>';
  echo '<select name="payType">';
          if(isset($_SESSION['username'])) {

            $options = array('COD' => 'cod', 'Kredit' => 'kredit', 'Transfer' => 'trans');
            foreach ($options as $type => $val) {
              $selected = @$_POST['payType'] == $type ? ' selected="selected"' : '';
	             echo '<option value="' . $type . '" . ' . $selected . '>' . $type . '</option>';
            }
  echo '</select>';
  echo '<form method="POST" action="orders-update.php"style="margin-top:30px;">
  <div class="row">
  <div class="small-4 columns">
    <label for="right-label" class="right inline">Shipping Address</label>
  </div>
  <div class="small-8 columns">
    <input type="text" id="right-label" placeholder="Address..." name="address" required>
  </div>
</div></form>';
              echo '<a href="orders-update.php"><button style="float:right;">Submit</button></a>';
          }
          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }





          echo '</div>';
          echo '</div>';
          ?>
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
