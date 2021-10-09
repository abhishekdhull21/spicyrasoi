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
            <h1 class="m-0"> Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
          <div class="col-lg-6">
          <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Table</h5>
              </div>
              <div class="card-body">

              <?php for($i=1; $i<=7; $i++) { ?>
               
              <a class="btn btn-app bg-success">
                 <h3 id="table<?php echo($i) ?>"><?php echo($i) ?></h3> <br> 
                </a>

                <?php } ?>
                
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">AC Room</h5>
              </div>
              <div class="card-body">

              <?php for($i=1; $i<=5; $i++) { ?>
               
              <a class="btn btn-app bg-danger">
                 <h3 id="table<?php echo($i) ?>"><?php echo($i) ?></h3> <br> 
                </a>

                <?php } ?>
                
              </div>
            </div>
<!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Non-AC Room</h5>
              </div>
              <div class="card-body">

              <?php for($i=1; $i<=4; $i++) { ?>
               
              <a class="btn btn-app bg-primary">
                 <h3 id="table<?php echo($i) ?>"><?php echo($i) ?></h3> <br> 
                </a>

                <?php } ?>
                
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Hall</h5>
              </div>
              <div class="card-body">

              <?php for($i=1; $i<=3; $i++) { ?>
               
              <a class="btn btn-app bg-warning">
                 <h3 id="table<?php echo($i) ?>"><?php echo($i) ?></h3> <br> 
                </a>

                <?php } ?>
                
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">AC Hall</h5>
              </div>
              <div class="card-body">

              <?php for($i=1; $i<=2; $i++) { ?>
               
              <a class="btn btn-app bg-warning">
                 <h3 id="table<?php echo($i) ?>"><?php echo($i) ?></h3> <br> 
                </a>

                <?php } ?>
                
              </div>
            </div>

          </div>
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