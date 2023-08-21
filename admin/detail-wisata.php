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
                <li class="nav-item">
                    <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
            <!--    <li class="nav-item">
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
				 <li class="nav-item active">
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
                <!--    <form class="form-inline my-2 my-lg-0 mr-lg-2" action='barang.php' method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name='qcari' placeholder="Search for...">
                            <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
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
                <li class="breadcrumb-item active">Data Wisata</li>
				<li class="breadcrumb-item active">Detail Data Wisata</li>
            </ol>

            			
			 <!-- Fungsi Menampilkan Data dari Database -->	
					
					<?php
					$query = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id_wisata='$_GET[kd]'");
					$data  = mysqli_fetch_array($query);
					?>
					
			<!-- End -->
						  
            <!-- Table Responsive -->
					<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="form-panel">
                      <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td><strong>Nama Wisata</strong></td>
                      <td><span class="label label-default"><?php echo $data['nama_wisata']; ?></span></td>
                      <td rowspan="5"><div class="pull-right image">
                       <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="500" width="600" alt="User Image" style="border: 2px solid #000;" />
                        </div></td>
                      </tr>
                      <tr>
                      <td width="250"><strong>Kategori</strong></td>
                      <td width="565" colspan="1"><?php echo $data['kategori']; ?></td>
                      </tr>
                      <tr>
                      <td><strong>Lokasi</strong></td>
                      <td colspan="1"><?php echo $data['lokasi']; ?></td>
                      </tr>
                      </table>
                      <div class="text-right">
                  <a href="wisata.php" class="btn btn-sm btn-primary">Kembali <i class="fa fa-arrow-circle-right"></i></a>
			  
			  <!-- End -->
			  

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
