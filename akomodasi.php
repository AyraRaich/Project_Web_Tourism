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
            <li><a href="destinasi.php">Destination</a></li>
            <li class="active"><a href="akomodasi.php">Accomodation</a></li>
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
      </div>
    </div>
                        <center>
                        <div class="row">
                        <form action="akomodasi.php" method="post" class="subscribe-form">
                           
                                <input type="text" id="subscribe-email" name='qcari' placeholder="Cari Lokasi Penginapan...">

                                <input type="submit" id="subscribe-submit" class="button white" value="Find Them..!">
                        </form> 
                        </div>
                        </center>
                        <br>
                        <br>
    <div class="main-posts">
            <div class="container">
                <div class="row">
                    <div class="blog-masonry masonry-true">
					
					<!-- Fungsi Menampilkan data dari database -->	
					<?php 
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 9; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = "SELECT * FROM akomodasi LIMIT ".$limit_start.",".$limit;

					// Fungsi Search
					if(isset($_POST['qcari'])){
					$qcari=$_POST['qcari'];
					$sql="SELECT * FROM  akomodasi where nama_akomodasi like '%$qcari%' or kategori like '%$qcari%' or alamat like '%$qcari%' ";
                    }
                    
					$sqli = mysqli_query($koneksi, $sql); // Eksekusi querynya
						
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_assoc($sqli)){ // Ambil semua data dari hasil eksekusi $sql
					?>
				
        
                        <div class="post-masonry col-md-4 col-sm-6">
                            <div class="post-thumb">
                                <img src="admin\<?php echo $data['foto_lokasi'];?>" class="img-rounded" height="300" width="350" style="border: 2px solid #000;" />
                                <div class="title-over">
                                    <center><h4>--<?php echo $data['nama_akomodasi']; ?>--</h4></center>
                                </div>
                                <div class="post-hover text-center">
                                    <div class="inside">
                                    <div class="post">
                                    <?php echo $data['deskripsi_akomodasi']; ?>
                                    </div>
                                        <div class="post"style="border: 2px solid #000;">No. Kontak : <?php echo $data['kontak']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.post-masonry -->
						<?php $no++; } ?>
						
					</div>
                </div>
            </div>
        </div>
        <center>
			<ul class="pagination">
				<!-- LINK FIRST AND PREV -->
				<?php
				if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
				?>
					<li class="disabled"><a href="#">First</a></li>
					<li class="disabled"><a href="#">&laquo;</a></li>
				<?php
				}else{ // Jika page bukan page ke 1
					$link_prev = ($page > 1)? $page - 1 : 1;
				?>
					<li><a href="destinasi.php?page=1">First</a></li>
					<li><a href="destinasi.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
				$sql2 = "SELECT COUNT(*) AS jumlah FROM wisata";
				$sql3 = mysqli_query($koneksi, $sql2); // Eksekusi querynya
				$get_jumlah = mysqli_fetch_array($sql3);
				
				$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
				$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($page == $i)? ' class="active"' : '';
				?>
					<li<?php echo $link_active; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php
				}
				?>
				
				<!-- LINK NEXT AND LAST -->
				<?php
				// Jika page sama dengan jumlah page, maka disable link NEXT nya
				// Artinya page tersebut adalah page terakhir 
				if($page == $jumlah_page){ // Jika page terakhir
				?>
					<li class="disabled"><a href="#">&raquo;</a></li>
					<li class="disabled"><a href="#">Last</a></li>
				<?php
				}else{ // Jika Bukan page terakhir
					$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
				?>
					<li><a href="destinasi.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
					<li><a href="destinasi.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
</center>
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