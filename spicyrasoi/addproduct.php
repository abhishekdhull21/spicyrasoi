<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('../config.php');
require_once('class/User.php');
require_once('islogin.php');
$productid = "";
$editmode = False;
if (isset($_GET['edit']) && $_GET['edit'] == 'true' && isset($_GET['productid'])) {
  $editmode = True;
  $productid = $_GET['productid'];
}
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
    <?php require_once('logininfo.php'); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     <br>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <div class="row">

            <!-- right column -->
            <div class="col-md-10">
              <?php
              if ($editmode == True && $productid != "") {
                $sql = "SELECT * FROM `product` WHERE `product_id` = $productid";
                $res = mysqli_query($con, $sql);
                if (mysqli_num_rows($res) < 1) {
                  $editmode = False;
                } else
                  echo '<input type="hidden" id="productid" value="' . $productid . '" >';

                $product = mysqli_fetch_assoc($res);
              }

              ?>
              <!-- general form elements disabled -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Products</h3> <a href="allproduct.php" class="float-right"><i class="fas fa-eye"> All Product's</i> </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>Select Category </label> <a href="addcategory.php" class="float-right"> <i class="fas fa-plus-circle"> New</i> </a>
                          <select class="form-control" id="dropdownCategory">
                            <option value=1>Select Category</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label> Sub-Category</label>
                          <select class="form-control" id="dropdownSubCategory">
                            <option value=0>Wait</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" id="productName" class="form-control" placeholder="Enter Name" value="<?php if ($editmode == true) echo $product['product_name']; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>Unit Name</label>
                          <input type="text" id="productUnitName" class="form-control" placeholder="Enter Unit Name" value="<?php echo ($editmode == true ? $product['unit_name'] : "PCS"); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>Store Price</label>
                          <input type="number" min="0" id="productStorePrice" class="form-control" placeholder="Enter Store Price" value="<?php if ($editmode == true) echo $product['store_price']; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Swiggy Price</label>
                          <input type="number" min="0" id="productSwiggyPrice" class="form-control" placeholder="Enter Swiggy Price" value="<?php if ($editmode == true) echo $product['swiggy_price']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>Zomato Price</label>
                          <input type="number" min="0" id="productZomatoPrice" class="form-control" placeholder="Enter Zomato Price" value="<?php if ($editmode == true) echo $product['zomato_price']; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Local Price</label>
                          <input type="number" min="0" id="localPrice" class="form-control" placeholder="Enter Local Price" value="<?php if ($editmode == true) echo $product['local_price']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>GST Type</label>
                          <select id="gst_type" class="form-control">
                            <option value="include">Include</option>
                            <option value="exclude">Exclude</option>
                            <!-- <option value="18">18%</option>
                            <option value="28">28%</option> -->
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Food Type</label>
                          <select id="food_type" class="form-control">
                            <option value="not_defined" <?php if ($editmode == true) echo ($product['food_type'] == 'not_defined' ?  "selected" : ""); ?>>Not Defined</option>
                            <option value="veg" <?php if ($editmode == true) echo ($product['food_type'] == 'veg' ?  "selected" : ""); ?>>Veg</option>
                            <option value="non-veg" <?php if ($editmode == true) echo ($product['food_type'] == 'veg' ?  "selected" : ""); ?>>Non-Veg</option>
                            <!-- <option value="28">28%</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>GST</label>
                          <select id="gstProduct" class="form-control">
                            <option value="0">0%</option>
                            <option value="12">12%</option>
                            <option value="18">18%</option>
                            <option value="28">28%</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <!-- <label>Discount (In %)</label> -->
                          <input type="number" id="productDiscount" class="form-control" max="100" min="0" placeholder="Enter Discount (In %)" hidden value=0 value="<?php if ($editmode == true) echo $product['discount']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <p id="gstlabel" hidden>Price after GST <span id="priceAfterGST">00</span></p>
                      </div>
                      <div class="col-sm-6">
                        <p id="discountlabel" hidden>Price after Discount <span id="priceAfterDiscount">00</span></p>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label>GST Price</label>
                          <input type="text" id="product_gst_price" class="form-control" value=0 value="<?php if ($editmode == true) echo $product['gst_price']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>HSN Code</label>
                          <input type="text" id="hsnCode" class="form-control" placeholder="Enter HSN Code" value="<?php if ($editmode == true) echo $product['hsn_code']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-footer">
                          <button type="submit" id="<?php echo ($editmode == true ?  "editProductSubmit" : "addProductSubmit"); ?>" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- <div class="card-footer">
                  <button type="Reset" class="btn btn-primary">Reset</button>
                </div>  
                <div class="card-footer">
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
  <!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="scripts/productpage.js"></script>
  <script>
    $(document).ready(() => {
      $("#productStorePrice,#gst_type,#gstProduct").on('change', (e) => {
        // console.log(e.currentTarget.id);
        var stp = parseFloat($("#productStorePrice").val());
        var typ = $("#gst_type").val();
        var gst = parseInt($("#gstProduct").val());
        var temp = 0;
        if (typ == "include") {
          temp = stp;
        } else {
          temp = stp + (stp * (gst / 100));
        }
        $("#product_gst_price").val(temp);

      })
    })
  </script>
</body>

</html>