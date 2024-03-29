<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desa Wisata</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Desa Wisata - Blora</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
              <!--  <li class="nav-item">
                    <a class="nav-link" href="penjualan.php"><i class="fa fa-fw fa-area-chart"></i> Transaksi Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="barang.php"><i class="fa fa-fw fa-table"></i> Data Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="supplier.php"><i class="fa fa-fw fa-edit"></i> Data Supplier</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="akomodasi.php"><i class="fa fa-fw fa-area-chart"></i> Data Akomodasi</a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link" href="wisata.php"><i class="fa fa-fw fa-area-chart"></i> Data Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php"><i class="fa fa-fw fa-area-chart"></i> Data Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa fa-fw fa-area-chart"></i> Data Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php"><i class="fa fa-fw fa-table"></i> Data User</a>
                </li>	
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Selamat Datang, <b><?php echo $_SESSION['username']; ?></b></a>
                    
                </li>
               
                <li class="nav-item">
             <!--       <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                        </div>
                    </form> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>

            <!-- Icon Cards -->
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-plane"></i>
                            </div>
                            <div class="mr-5">
							
							<!-- Fungsi Menampilkan Total Destinasi Wisata dari Database -->
							<?php 
                            $tampil=mysqli_query($koneksi,"SELECT * from wisata order by id_wisata desc");
								$total=mysqli_num_rows($tampil);
								?>
								<?php echo "$total"; ?>
								<!-- End -->Destinasi Wisata
                                
                            </div>
                        </div>
                        <a href="wisata.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-inverse card-danger o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5">
                                <!-- Fungsi Menampilkan Total User dari Database -->
							<?php
                            $tampil=mysqli_query($koneksi, "SELECT * from produk order by id desc");
								$total=mysqli_num_rows($tampil);
								?>
								<?php echo "$total"; ?>
								<!-- End --> Data Produk
                            </div>
                        </div>
                        <a href="produk.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
               
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-user"></i>
                            </div>
                            <div class="mr-5">
                                <!-- Fungsi Menampilkan Total User dari Database -->
							<?php
                            $tampil=mysqli_query($koneksi, "SELECT * from users order by id desc");
								$total=mysqli_num_rows($tampil);
								?>
								<?php echo "$total"; ?>
								<!-- End --> Data User
                            </div>
                        </div>
                        <a href="user.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-inverse card-danger o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-home"></i>
                            </div>
                            <div class="mr-5">
                              
							<?php
                            $tampil=mysqli_query($koneksi, "SELECT * from akomodasi order by id_akomodasi desc");
								$total=mysqli_num_rows($tampil);
								?>
								<?php echo "$total"; ?>
								 Data Akomodasi
                            </div>
                        </div>
                        <a href="akomodasi.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">
							
							<?php 
                            $tampil=mysqli_query($koneksi,"SELECT * from cart order by id desc");
								$total=mysqli_num_rows($tampil);
								?>
								<?php echo "$total"; ?>
								Data Pembelian
                                
                            </div>
                        </div>
                        <a href="cart.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

			
			<!-- Alert Info -->
			    <div class="row">
                  <div class="col-md-12">
                    <div class="bs-component">
					
					<?php
                    $tampil=mysqli_query($koneksi,"SELECT * from wisata order by id_wisata desc limit 1");
                    while($data2=mysqli_fetch_array($tampil)){
                    ?>
					
                      <div class="alert alert-dismissible alert-danger">
                        <button class="close" type="button" data-dismiss="alert">×</button>
						
						<strong><?php echo $data2['nama_wisata'];?></strong>, Merupakan Destinasi <strong><?php echo $data2['kategori'];?></strong> Baru di Data Desa Wisata.
                      </div>
                                <?php } ?>						
                      
                    </div>
                  </div>

                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="bs-component">
					
					<?php
                    $tampil=mysqli_query($koneksi,"SELECT * from produk order by id desc limit 1");
                    while($data2=mysqli_fetch_array($tampil)){
                    ?>
					
                      <div class="alert alert-dismissible alert-danger">
                        <button class="close" type="button" data-dismiss="alert">×</button>
						
						<strong><?php echo $data2['produk_nama'];?></strong>, Merupakan Produk <strong><?php echo $data2['kategori'];?></strong> Baru di Data Desa Wisata.
                      </div>
                                <?php } ?>						
                      
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="bs-component">
					
					<?php
                    $tampil=mysqli_query($koneksi,"SELECT * from users order by id desc limit 1");
                    while($data2=mysqli_fetch_array($tampil)){
                    ?>
					
                      <div class="alert alert-dismissible alert-danger">
                        <button class="close" type="button" data-dismiss="alert">×</button>
						
						<strong><?php echo $data2['username'];?></strong>, Merupakan <strong><?php echo $data2['type'];?></strong> Baru di Data Desa Wisata.
                      </div>
                                <?php } ?>						
                      
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="bs-component">
					
					<?php
                    $tampil=mysqli_query($koneksi,"SELECT * from akomodasi order by id_akomodasi desc limit 1");
                    while($data2=mysqli_fetch_array($tampil)){
                    ?>
					
                      <div class="alert alert-dismissible alert-danger">
                        <button class="close" type="button" data-dismiss="alert">×</button>
						
						<strong><?php echo $data2['nama_akomodasi'];?></strong>, Merupakan Penginapan <strong><?php echo $data2['kategori'];?></strong> Baru di Data Desa Wisata.
                      </div>
                                <?php } ?>						
                      
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>
               
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <a class="scroll-to-top rounded" href="#">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

</body>

</html>