<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
}
?>
<!-- End -->

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
	
	<!-- Date Picker -->
        <link href="./css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="./css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <script src="js/sample.js"></script>
	<link rel="stylesheet" href="../admin/js/ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="../admin/js/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

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
                <!--    <form class="form-inline my-2 my-lg-0 mr-lg-2">
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
                <li class="breadcrumb-item active">Data Wisata</li>
				<li class="breadcrumb-item active">Input Data Wisata</li>
            </ol>

           
						  
           <div class="row">
   
     <div class="col-md-12 col-sm-12">
                    
                         <div class="form">
                           
                        </div>
						  
						  <!-- Fungsi Form Tambah Data Kasir -->
                            <div class="panel-body">
                              <div class="form">
                                  <form class="form-horizontal style-form" action="insert-wisata.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
								
                                      <div class="form-group ">
                                          <label for="nama_wisata" class="control-label col-lg-2">Nama Wisata </label>
                                          <div class="col-lg-5">
                                              <input class="form-control" id="nama_wisata" type="text" name="nama_wisata" placeholder="Nama Wisata..."/>
                                          </div>
                                      </div>
									  <div class="form-group">
											  <label class="control-label col-lg-2" for="select">Kategori Wisata</label>
												<select name="kategori" style="width:30%" class="form-control" required>
												  <option value=""> -- Pilih Kategori Wisata -- </option>
												  <option value="Wisata Alam">Wisata Alam</option>
												  <option value="Wisata Religi">Wisata Religi</option>
												  <option value="Wisata Kuliner">Wisata Kuliner</option>
												  <option value="Wisata Umum">Wisata Umum</option>
												</select>
										</div>
										<div class="form-group ">
                                          <label for="lokasi" class="control-label col-lg-2">Lokasi Wisata </label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="lokasi" type="text" name="lokasi" placeholder="Lokasi Wisata..." />
                                          </div>
                                      </div>
									   <div class="form-group">
										<label class="control-label col-lg-2">Deskripsi Wisata</label>
                                            <textarea name="editor" id="editor" class="form-control" style="width:70%"  rows="10" cols="80" placeholder="Masukkan Deskripsi Tentang Wisata..."></textarea> 
									  </div>
                                      <div class="form-group">
										<label class="control-label">Foto Destinasi Wisata</label>
										<input class="form-control" style="width:50%" type="file" name="nama_file" id="nama_file">
									  </div>
									
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                              <a class="btn btn-default" type="button" href="wisata.php">Cancel</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
						<!-- End -->
						  
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
	
	<!-- daterangepicker -->
        <script src="./js/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="./js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
		<script>
		//options method for call datepicker
		$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
		</script>


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script type="text/javascript" src="../admin/js/ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: './ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
</script>
</body>

</html>
