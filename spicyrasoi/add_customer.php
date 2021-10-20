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
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- /.navbar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Customer</h1>
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

                        <!-- right column -->
                        <div class="col-md-10">



                            <!-- general form elements disabled -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Customer</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mobile No.</label>
                                                    <input type="text" id="c_mob_no" class="form-control" placeholder="Enter Mobile No.">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" id="c_name" class="form-control" placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" id="dropdownSubCategory">
                                                        <option value=0>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select name="state" id="state" class="form-control">
                                                        <option value="Select">Select</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>District</label>
                                                    <input type="text" min="0" id="district" class="form-control" placeholder="Enter District">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City / Village</label>
                                                    <input type="text" min="0" id="city" class="form-control" placeholder="Enter City / Village">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Pin Code</label>
                                                    <input type="number" id="pincode" class="form-control" max="100" min="0" placeholder="Enter Pin Code">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>GST No</label>
                                                    <input type="number" id="gst_no" class="form-control" max="100" min="0" placeholder="Enter GST No.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Check In</label>
                                                    <input type="text" id="productUnitName" class="form-control" placeholder="" value="PCS">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Check Out</label>
                                                    <input type="text" id="hsnCode" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Aadhar Card No.</label>
                                                    <input type="text" id="id_proof" class="form-control" placeholder="ID Proof" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Customer Photo</label>
                                                        <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Where To</label>
                                                    <input type="text" id="productUnitName" class="form-control" placeholder="Where To">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Where From</label>
                                                    <input type="text" id="hsnCode" class="form-control" placeholder="Where From">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-footer">
                                                    <button type="submit" id="addProductSubmit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <!-- <div class="card-footer">
                  <button type="Reset" class="btn btn-primary">Reset</button>
                </div>   -->
                                                <!-- <div class="card-footer">
                  <button type="cancel" class="btn btn-primary">Cancel</button>
                </div>    -->
                                            </div>
                                        </div>


                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (right) -->
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
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="scripts/productpage.js"></script>
</body>

</html>