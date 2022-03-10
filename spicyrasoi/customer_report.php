<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../config.php");
include("class/User.php");

require_once("islogin.php");
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicy Rasoi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<?php

?>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">



    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php
    include("navbar.php");
    // session_start();
    // include("../config.php");
    // include("class/User.php");
    // include("navbar.php");
    // require_once("islogin.php");
    // $host = "sql487.main-hosting.eu";
    // $username = "u709711065_spicyrasoi";
    // $password = "NewPassword@1234";
    // $db = "u709711065_spicyrasoi";
    // $con = mysqli_connect($host, $username, $password, $db);

    if (isset($_GET['customerid'])) {
      $customerid = $_GET['customerid'];
      echo '<script>const cust_id=' . $customerid . '</script>';
    }
    if (mysqli_connect_errno()) {
      echo ("Error");
    } else {
      //echo("Successfull");
      $sql = "SELECT cat_name FROM expense_cat where admin_id = $admin_id and restaurant = $restaurant";
      $res = $con->query($sql);
      if ($res->num_rows > 0) {
        //echo "Output fetched successfully";

      }
    }
    //die("error");
    date_default_timezone_set("Asia/Calcutta");

    ?>
    <!-- /.navbar -->
    <?php require_once('logininfo.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Customer Report </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home </a> / Customer Report</li>
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <?php
              $swl = "SELECT user_name from customer where  user_id = $customerid";
              $res = mysqli_query($con, $swl);
              $row = mysqli_fetch_assoc($res);
              $cust_name = $row['user_name'];
              ?>
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title"><?php echo $cust_name; ?> </h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <!-- <label for="customer_name">Customer Name</label>
                      <div class="form-group">
                        <select class=" form-control" id="addSubExpenseID">
                         
                        </select>
                      </div> -->
                      <!-- <div class="form-group">
                        <label for="addSubCategoryInput">Title</label>
                        <input type="text" class="form-control" id="addSubCategoryInput" placeholder="Enter Title">
                      </div> -->
                      <div class="form-group">
                        <label for="type">Type</label>
                        <select class=" form-control" id="type">

                          <option value="credit" selected>Credit</option>
                          <!-- <option value="debit">Debit</option> -->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="amt">Amount</label>
                        <input type="number" class="form-control" id="amt" value=0>
                      </div>
                      <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" id="remark" placeholder="Remartk">
                      </div>

                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnAddAmt">Add Amount</button>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="col-md-8">
              <!-- general form elements -->
              <div class="row ">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">

                      <h3 class="info-box-text text-center text-muted">TOTAL AMOUNT INCOME</h3>
                      <h4 class="info-box-number text-center text-muted mb-0" id="totalsell">00</h4>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <h3 class="info-box-text text-center text-muted">TOTAL BALANCE</h3>
                      <h4 class="info-box-number text-center text-muted mb-0" id="totalbalance">00</h4>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title"><?php echo $cust_name; ?> Order History</h3>
                  <a href=""> <i class="fas fa-sync float-right"> Refresh</i> </a>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Invoice No.</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Type</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Amount</th>
                               <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Balance</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mode</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Remarks</th>
                             

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = "SELECT id,orderid,order_value,pay_type,paid balance,order_type,date,remarks FROM `orders` WHERE restaurant = $restaurant and user_id = $customerid order by date desc";
                            $res = $con->query($sql);
                            while ($row = $res->fetch_assoc()) {
                              //echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_email"]. "<br>";
                              $orderid =  $row['orderid'];
                            ?>

                              <tr class="odd">
                                <td class="dtr-control"><?php echo $row['date']; ?> </td>
                                <td class="dtr-control"><a href="printbill.php?orderid=<?php echo $orderid;?>" target="_blank">
                                  <?php echo $row['id']; ?> </a></td>
                                <td class="sorting_1"><?php echo $row['pay_type']; ?></td>
                                <td><?php echo $row['order_value']; ?> </td>
                                <td><?php echo $row['balance']; ?> </td>
                                <td class="dtr-control"><?php echo $row['order_type']; // TODO: change this paymode
                                                        ?>
                                </td>

                                <td><?php echo $row['remarks']; ?></td>
                                <!-- <td>
                                    <div class="btn-group">
                                        <button type="button" onclick="href.location='printbill.php?orderid=<?php echo $orderid; ?>'" class="btn btn-info">View</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" target="_blank" href="posprint.php?orderid=<?php echo $orderid; ?>">View</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                        </div>
                                    </div>
                                </td> -->
                              </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- /.card-body -->


              <div class="card card-primary">

                <div class="card-header">
                  <h3 class="card-title"><?php echo $cust_name; ?> Credit History </h3>
                  <a href=""> <i class="fas fa-sync float-right"> Refresh</i> </a>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Amount</th>
                             
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Remarks</th>
                             

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $sql = "SELECT a.amt,a.type,a.date,a.remark FROM `customer_amt` a  WHERE restaurant = $restaurant and a.cust_id = $customerid order by date desc";
                            $res = $con->query($sql);
                            while ($row = $res->fetch_assoc()) {
                              //echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_email"]. "<br>";
                              // $orderid =  $row['orderid'];
                            ?>

                              <tr class="odd">
                                <td class="dtr-control"><?php echo $row['date']; ?> </td>
                                <td class="dtr-control"><?php echo $row['amt']; ?> </td>
                                <td><?php echo $row['remark']; ?></td>
                                
                              </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- /.card-body -->


            </div>

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <!-- <script src="plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap -->
  <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
  <!-- jQuery Knob Chart -->
  <!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script type="module" src="scripts/constant.js"></script>
  <script src="scripts/expense.js"></script>
  <!-- Page specific script -->


  <script>
    $(() => {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- select search -->
  <script>
    $('.js-example-basic-single').select2({
      placeholder: 'Select an option'
    });
  </script>
  <script>
    $(document).ready(function() {
      const urlParams = new URLSearchParams(window.location.search);
      const user_id = urlParams.get('customerid')

      $.ajax({
        url: constant.url + "customer/acc_info.php",
        method: 'POST',
        data: JSON.stringify({
          user_id: user_id,
          restaurant: restaurant,
        }),
        contentType: 'application/json',
        dataType: 'json',
        success: function(res) {
          // console.log(res);
          if (res.success === true) {
            $("#totalbalance").html(res.data.balance);
            $("#totalsell").html(res.data.total_purchase);
          }
        }
      });
    });
  </script>
</body>

</html>