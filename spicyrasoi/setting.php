<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "class/Admin.php";
require_once "islogin.php";
$user = unserialize($_SESSION['user']);
$isSuperadmin = false;
$admin = new Admin($con);
$admintype = $admin->getAdminType($user->userid);
if ($admintype == 2)
  $isSuperadmin = true;
// $sql = "SELECT admin_type from users where user_id = $user->admin_id";
?>

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
    <?php
    include("navbar.php");
    include("logininfo.php");
    ?>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Feature</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                <div class="row ">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                    
                      <h3 class="info-box-text text-center text-muted">TOTAL AMOUNT INCOME</h3>
                      <h4 class="info-box-number text-center text-muted mb-0" id="totalsell">2300</h4>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <h3 class="info-box-text text-center text-muted">TOTAL AMOUNT SPENT</h3>
                      <h4 class="info-box-number text-center text-muted mb-0" id="totalexpense">2000</h4>
                    </div>
                  </div>
                </div>
              </div>
                  <!-- <a href="#" class="btn btn-app bg-success">
                    <span class="badge bg-purple" id="totalsell">0</span>
                    <i class="fas fa-money-check-alt"></i> Income
                  </a>
                  <a href="#" class="btn btn-app bg-danger">
                    <span class="badge bg-purple" id="totalexpense">0</span>
                    <i class="fas fa-money-check-alt"></i> Out
                  </a> -->
                  <a href="invoice.php" class="btn btn-app bg-primary">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-file-invoice"></i> Invoice
                  </a>
                  <a href="add_customer.php" class="btn btn-app bg-success">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-users"></i> Add Customer
                  </a>
                  <a href="all_customer.php" class="btn btn-app bg-secondary">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-users"></i> All Customer
                  </a>
                  


                </div>
              </div>
            </div>
          </div>
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

                            <i class="fas fa-plus-circle"></i> Create
                          </a>
                          <a href="add_customer.php" class="btn btn-app bg-success">

                            <i class="fas fa-plus-circle"></i> View
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

            <div class="col-md-6">
              <?php if ($isSuperadmin) {  ?>

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Admin</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                  <div class="form-group">
                  <label>Select Resturant</label>
                  <select class="form-control " style="width: 100%;"  aria-hidden="true">
                    <option selected="selected" data-select2-id="3">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                  <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ui0b-container"><span class="select2-selection__rendered" id="select2-ui0b-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                </div>
                    <div id="accordion">



                      <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                              Resturant Admin Panel <i class="fas fa-caret-down float-right"></i>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">

                          <div class="card-body">
                            <a href="structure.php" class="btn btn-app bg-primary">

                              <i class="fas fa-plus-circle"></i> Structure
                            </a>
                            <a href="addcategory.php" class="btn btn-app bg-danger">
                              <!-- <span class="badge bg-success">300</span> -->
                              <i class="fas fa-plus-circle"></i> Add Category
                            </a>

                            <a href="addproduct.php" class="btn btn-app bg-secondary">

                              <i class="fas fa-plus-circle"></i> Add Product
                            </a>
                            <a href="allproduct.php" class="btn btn-app bg-secondary">

                              <i class="fab fa-product-hunt"></i> All Product
                            </a>
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

                    </div>
                    <a href="addrestaurant.php" class="btn btn-app bg-primary">
                      <!-- <span class="badge bg-purple">891</span> -->
                      <i class="fas fa-hotel"></i> Add Restaurant
                    </a>
                    <a href="allrestaurant.php" class="btn btn-app bg-primary">
                      <!-- <span class="badge bg-purple">891</span> -->
                      <i class="fas fa-hotel"></i> View Restaurant
                    </a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              <?php } ?>
            </div>
            <!-- /.col -->

          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
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
  <script>
    $(document).ready(function() {

      $.ajax({
        url: constant.url + "expense/totalsell.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          if (result.success === true)
            $('#totalsell').html(parseInt(result.data[0].sum));
        }
      });
      $.ajax({
        url: constant.url + "expense/totalexpense.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success === true) {
            $('#totalexpense').html(parseInt(result.data[0].sum));
          }
        }
      });
    });
  </script>

</body>

</html>