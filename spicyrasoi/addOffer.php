<!DOCTYPE html>
<html lang="en">

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

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">



    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php
    session_start();
    include("../config.php");
    include("class/User.php");
    require_once("islogin.php");
    include("navbar.php");
    // $host = "sql487.main-hosting.eu";
    // $username = "u709711065_spicyrasoi";
    // $password = "NewPassword@1234";
    // $db = "u709711065_spicyrasoi";
    // $con = mysqli_connect($host, $username, $password, $db);

    if (mysqli_connect_errno()) {
      echo ("Error");
    } else {
      //echo("Successfull");
      $sql = "SELECT cat_name FROM category where admin_id = $admin_id and restaurant = $restaurant and status = 1";
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
              <h1 class="m-0">Offer Section </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home </a> / Offer</li>
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
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Create Offer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                  <div class="form-group">
                    <label for="offerText">Name of Offer</label>
                    <input type="text" class="form-control" id="offerText" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="offerValue">Amount (In %)</label>
                    <select id="offerValue" class="form-control  ">
                          <option selected value=0>00</option>
                          <option value=5>5%</option>
                          <option value=8>8%</option>
                          <option value=10>10%</option>
                          <option value=12>12%</option>
                          <option value=15>15%</option>
                          <option value=18>18%</option>
                          <option value=20>20%</option>
                          <option value=25>25%</option>
                          <option value=30>30%</option>
                          <option value=40>40%</option>
                          <option value=50>50%</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="offerTime">Valid UpTo</label>
                    <select id="offerTime" class="form-control  ">
                          <option selected value=1>1 Day</option>
                          <option value=2>2 Day</option>
                          <option value=3>3 Day</option>
                          <option value=5>5 Day</option>
                          <option value=7>1 Week</option>
                          <option value=15>15 Days</option>
                          <option value=30>1 Month</option>
                          <option value=100>Always</option>
                        </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary form-control" id="createOffer" onclick="addOffer()">Create Offer</button>
                </div>

              </div>
              <!-- /.card-body -->


            
            </div>
            <!-- /.card -->

            <div class="col-md-8">
              <!-- general form elements -->

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">All Offers </h3>
                  <a href=""> <i class="fas fa-sync float-right"> Refresh</i> </a>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">S.No.</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Name</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Amount (%)</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Created On</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Valid UpTo (Days)</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                             $sql = "SELECT * FROM offers where restaurant = $restaurant and status = 1";
                            $res = mysqli_query($con, $sql);
                            // print_r($res);
                            while ($row = mysqli_fetch_assoc($res)) {
                              $i++;
                            ?>

                              <tr class="odd">
                                <td class="dtr-control"><?php echo ($i); ?>
                                </td>
                                <td class="sorting_1"><?php echo $row['offer_text']; ?></td>
                                <td class="sorting_1"><?php echo $row['offer_value']; ?></td>
                                <td class="sorting_1"><?php echo $row['offer_date']; ?></td>
                                <td class="sorting_1"><?php echo $row['offer_upto']; ?></td>
                                <td class="sorting_1"><a href="#" class="btn btn-danger btn-sm">Stop</a></td>
                                
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
  <script src="plugins/jquery/jquery.min.js"></script>
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
  <script src="plugins/sparklines/sparkline.js"></script>
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
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Page specific script -->

  <script>
    //add new offer
    function addOffer() {
      const offerText = $('#offerText').val();
      const offerValue = $('#offerValue').val();
      const offerTime = $('#offerTime').val();
      $.ajax({
        url: constant.url + "offers/add.php",
        method: "POST",
        data: JSON.stringify({
          admin_id,
          restaurant,
          offerText,
          offerValue,
          offerTime
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(json) {
          // console.log(result.success);

        
          if (json.success) swal("Offer Added", "You  Successfully Created Offer", "success");
          else swal({
            title: "Error Occured",
            text: json.error,
            icon: "error"
          });
          console.info(json.success);
          // $("#btnAddCategory").attr("disabled");
          $(e).html(text);
        },
      });
      $(document).ajaxError((res) => {
        console.error(res);

        $(e).attr("disabled", false);
        $(e).html(text);
      });
      $(document).ajaxComplete((res) => {
        $(e).attr("disabled", false);
        $(e).html(text);
      });
    }

  </script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [ "pdf", "print", "colvis"]
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
</body>

</html>