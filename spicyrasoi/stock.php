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
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
     <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">


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
              <h1 class="m-0">Stock Managment </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home </a> / Stock</li>
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
            <div class="col-md-3">
             

              <div class="row">
                <!-- left column -->
                <div class="col-md-12" data-select2-id="29">
                  <!-- general form elements -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Add Stock </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body"> 
                      <div class="form-group">
                     
                  <label>Name of Product</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="product_id">
                    <option selected="selected">Select</option>
                    
                    <?php
                           $sql = "SELECT * from product where  restaurant = $restaurant";
                          $re = mysqli_query($con, $sql);
                          while ($row = mysqli_fetch_array($re)) {
                          ?>
                    <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                      <label for="select">Select</label>
                        <select class=" form-control" id="in_out">
                            <option value="In" selected>Stock In</option>
                            <option value="Out">Stock Out</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="qty">Stock Quantity (In Unit)</label>
                        <input type="number" class="form-control" id="qty" value=0>
                      </div>
                    
                      <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="text" class="form-control" id="balance" value=0 readonly>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btnAddStock" onlclick="stockAdd();">Add Stock</button>
                  </div>
                
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="col-md-9">
              <!-- general form elements -->
           
              <div class="card card-primary">
                  
                <div class="card-header">
                  <h3 class="card-title">Stock Details </h3>
                  <a href=""> <i class="fas fa-sync float-right"> Refresh</i> </a>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                  <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Stock ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Product Name</th>
                                                            <!-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Type</th> -->
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Qty</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Balance</th>
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Invoice Details</th> -->
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th> -->
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >Unite Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >HSN Code</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT b.product_name, a.qty, a.product_id, a.stock_id FROM `stock` a , product b where a.product_id = b.product_id and a.restaurant = $restaurant ";
                                                        $res = $con->query($sql);
                                                        while ($row = $res->fetch_assoc()) {
                                                            // echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_email"]. "<br>";
                                                            // $orderid =  $row['orderid'];
                                                        ?>

                                                            <tr class="odd">
                                                                <td class="dtr-control"><?php echo $row['stock_id']; ?> </td>
                                                                <td class="dtr-control"><?php echo $row['product_name']; ?> </td>
                                                                <td class="sorting_1"><?php echo ("Stock In"); ?></td>
                                                                <td><?php echo $row['qty']; ?> </td>
                                                                
                                                                <!-- <td><?php echo ("View"); ?></td> -->
                                                               
                                                            </tr>
                                                        <?php  } ?>

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
  <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="plugins/sparklines/sparkline.js"></script> -->
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
  <!-- <script src="dist/js/adminlte.js"></script> -->
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
  <!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- <script> 
// function addStock(){alert();};
 $('#btnAddStock').on("click", (e)=>{
    e.preventDefault();
    // alert();
    const product_id = $("#product_id").val();
    const in_out = $("#in_out").val();
    const qty = $("#qty").val();
    // console.log(+product_name);
    // console.log(+in_out);
    // console.log(+qty);
    //if(product_name = null && product_name === "") return;

    $(document).ajaxSend(()=>{
      $("#btnAddStock").attr("disabled",true);
      $("#btnAddStock").html("Processing");
    });
     $.ajax({
       url: constant.url+ "stock/add.php",
       method: "POST",
       data: JSON.stringify({
         product_id: product_id,
         admin_id: admin_id,
         restaurant: restaurant,
         in_out: in_out,
         qty: qty,
       }),
       contentType: "application/json",
       dataType: "json",
       success: function(result){
         const json = result;
         if(json.success) swal("Good Job", "Stock Added Sccessfully","success");
         else swal({title:"Error Occured", text:json.error, icon: "error"});
         console.info(json.success);
         $("#btnAddStock").html("Submit");
       },
     });
     $(document).ajaxComplete((res) => {
      $("#btnAddStock").attr("disabled", false);
      $("#btnAddStock").html("Add Stock");
    });
    //  $(document).ajaxError((res)=>{
    //    console.error(res);
    //    $("#btnAddStock").attr("disabled", false);
    //    $("#btnAddStock").html("Submit");
    //  });
  });
</script> -->
<script>
  // $(function () {
  //   //Initialize Select2 Elements
  //   $('.select2').select2()

  //   //Initialize Select2 Elements
  //   $('.select2bs4').select2({
  //     theme: 'bootstrap4'
  //   })

    //Datemask dd/mm/yyyy
    // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    // $('[data-mask]').inputmask()

    //Date picker
    // $('#reservationdate').datetimepicker({
    //     format: 'L'
    // });

    //Date and time picker
  //   $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

  //   //Date range picker
  //   $('#reservation').daterangepicker()
  //   //Date range picker with time picker
  //   $('#reservationtime').daterangepicker({
  //     timePicker: true,
  //     timePickerIncrement: 30,
  //     locale: {
  //       format: 'MM/DD/YYYY hh:mm A'
  //     }
  //   })
  //   //Date range as a button
  //   $('#daterange-btn').daterangepicker(
  //     {
  //       ranges   : {
  //         'Today'       : [moment(), moment()],
  //         'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //         'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
  //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //         'This Month'  : [moment().startOf('month'), moment().endOf('month')],
  //         'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //       },
  //       startDate: moment().subtract(29, 'days'),
  //       endDate  : moment()
  //     },
  //     function (start, end) {
  //       $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  //     }
  //   )

  //   //Timepicker
  //   $('#timepicker').datetimepicker({
  //     format: 'LT'
  //   })

  //   //Bootstrap Duallistbox
  //   $('.duallistbox').bootstrapDualListbox()

  //   //Colorpicker
  //   $('.my-colorpicker1').colorpicker()
  //   //color picker with addon
  //   $('.my-colorpicker2').colorpicker()

  //   $('.my-colorpicker2').on('colorpickerChange', function(event) {
  //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  //   })

  //   $("input[data-bootstrap-switch]").each(function(){
  //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
  //   })

  // })
  // BS-Stepper Init
  // document.addEventListener('DOMContentLoaded', function () {
  //   window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  // })

  // DropzoneJS Demo Code Start
//   Dropzone.autoDiscover = false

//   // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
//   var previewNode = document.querySelector("#template")
//   previewNode.id = ""
//   var previewTemplate = previewNode.parentNode.innerHTML
//   previewNode.parentNode.removeChild(previewNode)

//   var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
//     url: "/target-url", // Set the url
//     thumbnailWidth: 80,
//     thumbnailHeight: 80,
//     parallelUploads: 20,
//     previewTemplate: previewTemplate,
//     autoQueue: false, // Make sure the files aren't queued until manually added
//     previewsContainer: "#previews", // Define the container to display the previews
//     clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
//   })

//   myDropzone.on("addedfile", function(file) {
//     // Hookup the start button
//     file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
//   })

//   // Update the total progress bar
//   myDropzone.on("totaluploadprogress", function(progress) {
//     document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
//   })

//   myDropzone.on("sending", function(file) {
//     // Show the total progress bar when upload starts
//     document.querySelector("#total-progress").style.opacity = "1"
//     // And disable the start button
//     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
//   })

//   // Hide the total progress bar when nothing's uploading anymore
//   myDropzone.on("queuecomplete", function(progress) {
//     document.querySelector("#total-progress").style.opacity = "0"
//   })

//   // Setup the buttons for all transfers
//   // The "add files" button doesn't need to be setup because the config
//   // `clickable` has already been specified.
//   document.querySelector("#actions .start").onclick = function() {
//     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
//   }
//   document.querySelector("#actions .cancel").onclick = function() {
//     myDropzone.removeAllFiles(true)
//   }
//   // DropzoneJS Demo Code End
// </script>
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
</body>

</html>