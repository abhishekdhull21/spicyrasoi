<!DOCTYPE html>
<html lang="en" class="" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicy Rasoi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("navbar.php") ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1145.31px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Settings </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Settings</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Settings</h5>
              </div>
              <div class="card-body">
              <div class="row">
          <div class="col-lg-3" style="padding: 10px;">
              <a href="addproduct.php">  <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-bell"></i> New Product +</button> </a>
                <!-- <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-bell"></i> .btn-block</button>  -->
          </div>
          <div class="col-lg-3" style="padding: 10px;">
               <a href="allproduct.php"> <button type="button" class="btn btn-outline-success btn-block"><i class="fa fa-bell"></i>  View Product</button> </a>
          </div>
          <div class="col-lg-3" style="padding: 10px;">
               <a href="addcategory.php"> <button type="button" class="btn btn-outline-secondary btn-block"><i class="fa fa-bell"></i> Category</button> </a>
          </div>
          <div class="col-lg-3" style="padding: 10px;">
               <a href=""> <button type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-bell"></i> Report</button> </a>
          </div>
              </div>  
              <div class="row">
          <div class="col-lg-3" style="padding: 10px;">
              <a href="add_user.php">  <button type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-bell"></i> New User +</button> </a>
                <!-- <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-bell"></i> .btn-block</button>  -->
          </div>
          <div class="col-lg-3" style="padding: 10px;">
               <a href="alluser.php"> <button type="button" class="btn btn-outline-secondary btn-block"><i class="fa fa-bell"></i>  View User </button> </a>
          </div>
          <div class="col-lg-3" style="padding: 10px;">
               <a href=""> <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-bell"></i> Category</button> </a>
          </div>
          <div class="col-lg-3" style="padding: 10px;">
              <a href="">  <button type="button" class="btn btn-outline-success btn-block"><i class="fa fa-bell"></i> Report</button> </a>
          </div>
              </div>  
            </div>
            </div>
<!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include("footer.php"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


</body></html>