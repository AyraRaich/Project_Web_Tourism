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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="destinasi.php">Destination</a></li>
            <li><a href="akomodasi.php">Accomodation</a></li>
            <li><a href="produk.php">Products</a></li></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#about">About</a></li>
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

    <!-- Slide gallery -->
    <div class="jumbotron">
      <div class="container">
        <div class="col-xs-12">
        <div id="carousel-example-generic">
          <div class="carousel-inner">
            <div class="item active">
              <center><img src="img/123.jpg"></center>
              <div class="carousel-caption">
                <h2>DESA WISATA</h2>
              </div>
            </div> 
          </div>
        </div>
        </div>
      </div><!-- End Slide gallery -->
    </div>
    <div class="container">
    <h3 class="">Welcome</h3>
       <h5> <p>Selamat Datang dalam website Desa Wisata. Disini anda dapat melihat-lihat berbagai macam aktivitas wisata yang ada dalam Desa Wisata yang berlokasi di daerah Kabupaten Blora
          yang memiliki berbagai tempat wisata yang menarik dan menyenangkan, Anda dan keluarga dapat menemukan destinasi wisata yang anda inginkan serta penginapan dan produk-produk khas hasil dari tempat-tempat wisata yang tersedia dalam website Desa Wisata. Berikut beberapa tempat destinasi wisata
          yang ada dalam Desa Wisata :
        </p></h5>
    </div>
    <!-- Thumbnails -->
    <div class="container thumbs">
    <div class="row-sm-4 row-md-4">
        <div class="thumbnail">
					<!-- Fungsi Menampilkan data dari database -->	
					<?php 
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 1; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = "SELECT * FROM wisata LIMIT ".$limit_start.",".$limit;

					// Fungsi Search
					if(isset($_POST['qcari'])){
					$qcari=$_POST['qcari'];
					$sql="SELECT * FROM  wisata where nama_wisata like '%$qcari%' or kategori like '%$qcari%' or lokasi like '%$qcari%' ";
                    }
                    
					$sqli = mysqli_query($koneksi, $sql); // Eksekusi querynya
						
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_assoc($sqli)){ // Ambil semua data dari hasil eksekusi $sql
					?>
        <div class="thumbnail">
          <img src="admin\<?php echo $data['gambar'];?>"class="img-responsive"/>
          <div class="caption">
          <h3><?php echo $data['nama_wisata']; ?></h3>
            <div class="btn-toolbar text-center">
              <a href="detail-wisata.php?hal=edit&kd=<?php echo $data['id_wisata'];?>"<?php echo $data['nama_wisata'];?>role="button" class="btn btn-primary pull-right">Details</a>
            </div>
          </div>
        </div>
        </div>
      <?php $no++; } ?>
        </div>
      </div>
      
      <!--
			-- Buat Paginationnya
			-- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
			-->
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
					<li><a href="index.php?page=1">First</a></li>
					<li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
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
					<li><a href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
					<li><a href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
      </center>
    <!-- End Thumbnails -->
    <!-- Content -->
    <div class="container">
      <div class="row">
          <center><h3 id="about">About</h3></center>
         <div class="thumbnail"> <img src="img/desa-wisata-panusupan-purbalingga.jpg" alt="" class="img-responsive"></div>
          <br>
          <p>Desa Wisata tempellemahbang Sejak tahun 2017, pengembangan desa wisata di Kabupaten Blora mulai bermunculan. Hal tersebut dapat dibuktikan dengan beberapa contoh desa wisata yang sudah dikembangkan seperti di Desa Tunjungan, Kecamatan Tunjungan dan Desa Bangoan, Kecamatan Jiken.
              Jika Ada pertanyaan, kritik, dan saran bisa menghubungi <b>no. 0821983123</b> atau melalui <b>email admin@desawisata.com</b> Terima Kasih atas Kunjungan ke website Desa Wisata ini.
          </p>
    </div><!-- End Content -->
    <!-- Footer -->
    <div class="footer text-center">
        <p>&copy; 2021 Desa Wisata. All Rights Reserved. Proudly created by <a href="http://udinus.ac.id">Mahasiswa UDINUS</a></p>
    </div><!-- End Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
  </body>
</html>
