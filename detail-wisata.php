<?php 
if(session_id() == '' || !isset($_SESSION)){session_start();}
include "koneksi.php"; 
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <title>Desa Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--Bootshape-->
    <link href="css/bootshape.css" rel="stylesheet">
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
            <li class="active"><a href="destinasi.php">Destination</a></li>
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
          </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->

		<!-- Fungsi Menampilkan Data dari Database -->	
					
    <?php
					$query = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id_wisata='$_GET[kd]'");
					$data  = mysqli_fetch_array($query);
					?>
					
			<!-- End -->
    <!-- Slide gallery -->
    <div class="jumbotron">
    <div class="container">
        <div class="col-xs-12">
        <div id="carousel-example-generic">
          <div class="carousel-inner">
            <div class="item active">
              <center><img src="admin/<?php echo $data['gambar']; ?>" height="350px" width="800px"></center>
              <div class="carousel-caption">
                <h2><?php echo $data['nama_wisata']; ?></h2>
              </div>
            </div> 
          </div>
        </div>
        </div>
      </div><!-- End Slide gallery -->
      <div class="container">
      <center><strong class="label label-danger"><?php echo $data['kategori']; ?></strong></center>
      </div>
      <div class="container">
      <center><strong ><?php echo $data['lokasi']; ?></strong></center>
      </div>
      <div class="container thumbs">
      <div class="row-sm-4 row-md-4">
        <div class="thumbnail">
      <center><?php echo htmlspecialchars_decode($data['konten_wisata']); ?></center>
        </div>
      </div>
      </div>
			  <!-- End -->

        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        
						<div class="text-mid">
						<a href="index.php" class="btn btn-sm btn-primary">Kembali <i class="fa fa-arrow-circle-right"></i></a>
						</div>      
                    </div>
                </div>
                <div class="row">
                <div class="footer text-center">
        <p>&copy; 2021 Desa Wisata. All Rights Reserved. Proudly created by <a href="http://udinus.ac.id">Mahasiswa UDINUS</a></p>
    </div><!-- End Footer -->
                </div>
            </div>
        </footer>

        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/min/plugins.min.js"></script>
        <script src="js/min/main.min.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
                $('#loader').fadeOut(); // will first fade out the loading animation
                    $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
    </body>
</html>