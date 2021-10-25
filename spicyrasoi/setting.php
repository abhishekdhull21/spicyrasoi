<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Product & Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                  <div id="accordion">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                            Category <i class="fas fa-caret-down float-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <a href="addcategory.php" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-success">300</span> -->
                            <i class="fas fa-plus-circle"></i> Add Category
                          </a>
                          <a href="#" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-success">300</span> -->
                            <i class="fas fa-file"></i> All Category
                          </a>

                        </div>
                      </div>
                    </div>
                    <div class="card card-success">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapsefive" aria-expanded="false">
                            Customer <i class="fas fa-caret-down float-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapsefive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <a href="add_customer.php" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-success">300</span> -->
                            <i class="fas fa-plus-circle"></i> Add Customer
                          </a>
                          <a href="#" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-success">300</span> -->
                            <i class="fas fa-file"></i> All Customer
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapsesix" aria-expanded="false">
                          Structure <i class="fas fa-caret-down float-right"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapsesix" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <a href="add_customer.php" class="btn btn-app bg-success">

                          <i class="fas fa-plus-circle"></i> Table
                        </a>
                        <a href="add_customer.php" class="btn btn-app bg-success">

                          <i class="fas fa-plus-circle"></i> AC Table
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Room
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> AC Room
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Hall
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> AC Hall
                        </a>

                      </div>
                    </div>
                  </div>

                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseseven" aria-expanded="false">
                          Accounts <i class="fas fa-caret-down float-right"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseseven" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <a href="add_customer.php" class="btn btn-app bg-success">

                          <i class="fas fa-plus-circle"></i> Create*
                        </a>
                        <a href="add_customer.php" class="btn btn-app bg-success">

                          <i class="fas fa-plus-circle"></i> View
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Debit
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Credit
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Day Book
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Transaction
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Pay Amount
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Recive Amount
                        </a>
                        <a href="expense.php" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Expense
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Cash
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Bank
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Profit
                        </a>
                        <a href="#" class="btn btn-app bg-success">

                          <i class="fas fa-file"></i> Salary
                        </a>

                      </div>
                    </div>
                  </div>
                  <div class="card card-danger">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                          Product <i class="fas fa-caret-down float-right"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <a href="addproduct.php" class="btn btn-app bg-success">

                          <i class="fas fa-plus-circle"></i> Add Product
                        </a>
                        <a href="allproduct.php" class="btn btn-app bg-success">

                          <i class="fab fa-product-hunt"></i> All Product
                        </a>

                      </div>
                    </div>
                  </div>


                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          


          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User & Reports</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">


                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                          User <i class="fas fa-caret-down float-right"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <a href="./user/createuser.php" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Add Users
                        </a>
                        <a href="alluser.php" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> View Users
                        </a>
                        <a class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Permission
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false">
                          Reports <i class="fas fa-caret-down float-right"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <a href="invoice.php" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Invoice
                        </a>
                        <a href="addrestaurant.php" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Add Restaurant
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> GST Report
                        </a>
                        <a href="user_report" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> User Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Payment / Account
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Table Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Room Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Stock Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Purchase Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Salary Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Expense Report
                        </a>
                        <a href="#" class="btn btn-app bg-success">
                          <!-- <span class="badge bg-purple">891</span> -->
                          <i class="fas fa-users"></i> Visitor Report
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
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


</body>

</html>