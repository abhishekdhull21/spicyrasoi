<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("class/User.php");
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
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
    <div class="wrapper">

        <!-- Preloader -->
        <div id="loader" class=" flex-column justify-content-center align-items-center" style="
            display:none;
            height: 100%;
            width: 100%;
            z-index: 10000;
            position: absolute;
            background: #23232396;">
            <img class=" animation__shake" src="dist/img/ripple.svg" alt="loading..." style="margin-top:45vh; margin-left:40vw;">
        </div>

        <!-- Navbar -->
        <?php
        include_once("navbar.php");
        // require_once("../config.php");
        require_once("logininfo.php");
        //  $con = mysqli_connect($host, $username, $password, $db);

        //  if (mysqli_connect_errno()){
        //  echo("Error");
        //  }
        //  else
        //  {
        //    //echo("Successfull");
        //    if ($res->num_rows > 0) {
        //       //echo "Output fetched successfully";

        //       }
        //  }
        //die("error");
        date_default_timezone_set("Asia/Calcutta");

        //  $sql = "SELECT * FROM users ";
        //  $result = $conn->query($sql);

        // if ($result->num_rows > 0) {
        // 	echo "Output fetched successfully";

        //}

        ?>
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">All Resturant </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Resturant </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Address</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Contact No</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Sales</th>
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Bill</th> -->
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Today Sale</th> -->
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >Unite Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >HSN Code</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT a.restaurantid,a.name, a.mobile, a.address, sum(b.order_value) AS order_value FROM restaurant a, orders b where a.restaurantid = b.restaurant GROUP BY a.name;";
                                                        $res = $con->query($sql);
                                                        while ($row = $res->fetch_assoc()) {
                                                            $restaurant_id = $row['restaurantid'];
                                                        ?>

                                                            <tr class="odd">
                                                                <td class="dtr-control"><?php echo $row['name']; ?> </td>
                                                                <td class="dtr-control"><?php echo  $row['Paid (Rs)']; ?> </td>
                                                                <td class="sorting_1"><?php echo $row['mobile']; ?></td>
                                                                <td><?php echo $row['order_value']; ?> </td>
                                                                <!-- <td class="dtr-control"><?php echo $mode;
                                                                                                ?>
                                                                </td> -->

                                                                <!-- <td>
                                                                    <ul>
                                                                        <li><?php echo ("Pending"); ?></li>
                                                                        <li>Table:<?php echo ("Pending"); ?></li>
                                                                    </ul>
                                                                </td> -->
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" target="_blank" href="#" class="btn btn-info">Action</button>
                                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>
                                                                        <div class="dropdown-menu" role="menu">
                                                                            <!-- <a class="dropdown-item" target="_blank" href="posprint.php?orderid=<?php echo $orderid; ?>"><span class="btn btn-warning btn-sm">View </span></a> -->
                                                                            <a class="dropdown-item" href="https://api.whatsapp.com/send/?phone=91<?php echo  $row['mobile']; ?>&text=Hi *<?php echo $row['name']; ?>*. Your Total Sale Value  is Rs *<?php echo $row['order_value']; ?>*. Sales Report From Spicy Rasoi."> <span class="btn btn-success btn-sm">Whatsapp</span></a>
                                                                            <a class="dropdown-item"> </a>

                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default<?php echo $restaurant_id; ?>">
                                                                        Reset ID
                                                                    </button>
                                                                    <!-- Pop Window Body -->
                                                                    <div class="modal fade" id="modal-default<?php echo $restaurant_id; ?>" style="display: none;" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Reset </h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="card card-success">
                                                                                        <div class="card-header">
                                                                                            <h3 class="card-title">Verify</h3>
                                                                                        </div>
                                                                                        <!-- /.card-header -->
                                                                                        <!-- form start -->

                                                                                        <div class="card-body">
                                                                                            <!-- <div class="overlay">
                                                                                                <i class="fas fa-3x fa-sync-alt"></i> 
                                                                                        </div> -->
                                                                                            <div class="form-group">
                                                                                                <label for="customer_mob_no">Enter OTP</label>
                                                                                                <input type="number" class="form-control" id="verify_otp_<?php echo $restaurant_id; ?>" placeholder="Enter OTP"><br>
                                                                                                <input type="hidden" id="restaurant_id_<?php echo $restaurant_id; ?>">

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button id="btn_verify_otp_<?php echo $restaurant_id; ?>" onclick="verifyOtp(<?php echo $restaurant_id; ?>);" class="btn btn-primary">Submit</button>
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                    <!-- /.card-body -->

                                                                                    <!-- <div class="card-footer">
                                                                                                
                                                                                                <button type="submit" disabled="true" class="btn btn-primary" id="btnCustomerSelect">Select</button>
                                                                                            </div> -->


                                                                                </div>
                                                                                <!-- <div class="modal-footer justify-content-between">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                                        </div> -->
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                                                    </div>
                                                                    <!-- /popup -->
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>

                                                </table>
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
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("footer.php"); ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
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
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- <script src="./scripts/request.js"></script> -->

    <?php require_once("isloginfooter.php"); ?>
</body>
<script>
    function verifyOtp(restaurant) {
        // $(e).preventDefault();
        // alert(restaurant)
        const otp = $(`#verify_otp_${restaurant}`).val();
        // const restaurantID = $(`#restaurant_id_${restaurant}`).val();

        swal({
            title: 'Warning',
            text: "Action not reversible it delete all data permanently...",
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((res) => {
            if (res) {
                ajaxRequest('verify.php', {
                    restaurant,
                    otp
                }, (data) => {
                    if (data.success) {
                        $("#loader").css('display', 'none');

                        swal("Deleted", "You deleted restaurant Orders and Expense", "success");
                    } else {
                        swal("Not Deleted!!", "error:" + data.error, 'error');
                    }
                }, {
                    send: () => {
                        $("#loader").css('display', 'block');

                    },
                    complete: () => {
                        $("#loader").css('display', 'none');
                    },
                    error: () => {
                        $("#loader").css('display', 'none');
                    }
                });

            }
        });


    }
</script>

</html>