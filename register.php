<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'koneksi.php';
?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Desa Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--Bootshape-->
    <link href="./css/bootshape.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/foundation.css" />
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
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li class="active"><a href="register.php">Register</a></li>';
          }
          ?>
          </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->
    <div class="jumbotron">
    <div class="container">
        <div class="col-xs-12">
        <div id="carousel-example-generic">
          <div class="carousel-inner">
            <div class="item active">
              <center><img src="img/123.jpg"></center>
              <div class="carousel-caption">
                <h2 style="color: white;">DESA WISATA</h2>
              </div>
            </div> 
          </div>
        </div>
        </div>
      </div><!-- End Slide gallery -->
    </div>
        <center><h5>REGISTRASI</h5></center>
        <form method="POST" action="insert.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Username</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Username..." name="username" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" placeholder="Password..." name="password" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Address</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Address..." name="address" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="xxx@gmail.com" name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Phone</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="+6292141234" name="phone" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Footer -->
    <div class="footer text-center">
        <p>&copy; 2021 Desa Wisata. All Rights Reserved. Proudly created by <a href="http://udinus.ac.id">Mahasiswa UDINUS</a></p>
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>