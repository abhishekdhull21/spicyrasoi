<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "islogin.php";
// print_r($user);
$tableid = 0;
$groupid = 0;
$table = 0;

// print_r($user);
if (isset($_GET['table']) && isset($_GET['group']) && isset($_GET['name'])) {
  $table = $_GET['table'];
  $groupid = $_GET['group'];
  $name = $_GET['name'];
  $tableid = $groupid . $table;
  if (!isset($_SESSION['tables']))
    $_SESSION['tables'] = array();
  $arr = $_SESSION['tables'];

  $activeTables = sizeof($arr);
  if (!in_array($tableid, $arr))
    $_SESSION['tables'][$activeTables] = $tableid;
}
$method = "store_price";
if (isset($_GET['method'])) {

  if ($_GET['method'] == "swiggy")
    $method = "swiggy_price";
  else if ($_GET['method'] == "zomato")
    $method = "zomato_price";
  else if ($_GET['method'] == "gst")
    $method = "gst_price";
  // echo $method;
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


    <!-- /.navbar -->
    <?php require_once('navbar.php');

    if (mysqli_connect_errno()) {
      echo ("Error");
    } else {
      //echo("Successfull");
      $sql = "SELECT p.product_id,p.product_name, c.cat_name, p.store_price, p.swiggy_price, p.zomato_price, p.local_price, p.gst_price, p.gst_type FROM product p, category c WHERE c.cat_id=p.category and c.restaurant = $restaurant and p.status=1";
      $res = $con->query($sql);
      if ($res->num_rows > 0) {
        //echo "Output fetched successfully";

      }
    }
    //die("error");
    date_default_timezone_set("Asia/Calcutta");

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row" style="margin-bottom: 10px;">
            <div class="custom-control custom-switch">
              <!-- <label class="custom-control-label" for="">Category View</label> -->
              <input type="checkbox" class="custom-control-input" onchange="changetToTableView(this);" id="customSwitch" checked>
              <label class="custom-control-label" for="customSwitch">Table View</label>
            </div>
          </div>
          <div class="row" style="margin-top: 10px;">

            <!-- left column -->
            <div class="col-md-8">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Product </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">P.ID.</th> -->
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Name</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"> Price</th>
                              <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Swiggy Price</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Zamoto Price</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Local Price</th> -->
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                              <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >Discount</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >Unite Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"  >HSN Code</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 0;
                            while ($row = $res->fetch_assoc()) {

                              $i++;

                              //echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_email"]. "<br>";
                            ?>

                              <tr class="odd">
                                <!-- <td class="dtr-control"><?php echo $row['product_id']; ?>
                                </td> -->
                                <td class="sorting_1"><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['cat_name']; ?> </td>
                                <td><?php echo $row['store_price']; ?></td>
                                <!-- <td><?php echo $row['swiggy_price']; ?></td>
                                <td><?php echo $row['zomato_price']; ?></td>
                                <td><?php echo $row['local_price']; ?></td> -->
                                <td>
                                  <!-- <a href="#"> <i class="fas fa-plus"> Add</i> </a> -->
                                  <input type="checkbox" data-productid="<?php echo $row['product_id']; ?>" data-productname="<?php echo $row['product_name']; ?>" data-productprice="<?php echo $row[$method]; ?>" id="addProductCart_<?php echo $row['product_id']; ?>" onchange="addToCart(this);">
                                </td>
                                <!--<td  >U</td>
                    <td  >U</td> -->
                              </tr>
                            <?php } ?>

                          </tbody>
                          <!-- <tfoot>
                  <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1"  >Platform(s)</th><th rowspan="1" colspan="1"  >Engine version</th><th rowspan="1" colspan="1"  >CSS grade</th></tr>
                  </tfoot> -->
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card-body -->


            </div>
            <!-- /.card -->

            <div class="col-lg-4 table-responsive">

              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Book
                  </button>
                  <!-- Pop Window Body -->
                  <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Customer</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="card card-success">
                            <div class="card-header">
                              <h3 class="card-title">Add Customer</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="customer_mob_no">Mobile No.</label>
                                  <input type="number" class="form-control" id="customer_mob_no" placeholder="Enter Mobile No."><br>

                                </div>
                                <div class="form-group">
                                  <label for="customer_name">Customer Name</label>
                                  <input type="text" class="form-control" id="customer_name" placeholder="Enter Customer Name">
                                </div>

                              </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" disabled id="btnAddShortCustomer">Add</button>
                            <button type="submit" disabled="true" class="btn btn-primary" id="btnCustomerSelect">Select</button>
                          </div>
                          </form>


                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /popup -->
                  <a href="#" class="btn btn-default" id="#"><i class="fas fa-print"></i> Add Food</a>
                  <a href="#" class="btn btn-default float-right" id="billingprint"><i class="fas fa-print"></i> Billing</a>
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment </button> -->
                  <!-- <a href="#"  target="_blank" class="btn btn-default float-right" ><i class="fas fa-print"></i> COT and Save</a> -->
                  <!-- <button type="button" class="btn btn-primary float-right" id="btnprintbill" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Final Print
                  </button> -->
                </div>
              </div><br>
              <!-- Custormer Details  -->

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <!-- <label>Food Type</label> -->
                    <h3 id="selectCustomerBillName" class="form-control">
                      Cash
                      <!-- <option value="non-veg">Non-Veg</option> -->
                      <!-- <option value="28">28%</option> -->
                    </h3>
                  </div>
                  <!-- <input type="text" class="form-control" id="customer_name" placeholder="Customer Name"><br>
                <input type="text" class="form-control" id="customer_mob_no" placeholder="Customer Mobile No."><br>
                <button type="submit" class="btn btn-primary" id="btnAddCustomer">Add Customer</button> -->
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <!-- <input type="text" class="form-control" id="customer_mob_no" placeholder="Customer Mobile No."> -->
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12">
                  <!-- <button type="submit" class="btn btn-primary" id="btnAddCustomer">Add Customer</button> -->
                </div>
                <!-- /.col -->
              </div>

              <div class="row">
                <div class="col-12">
                  <h4>
                    Food Cart
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div>
                <input type="text" hidden id="tableid" value="<?php echo $tableid; ?>">
                <input type="text" hidden id="tablegroup" value="<?php echo $groupid; ?>">
                <input type="text" hidden id="table" value="<?php echo $table; ?>">
                <input type="text" hidden id="method" value="<?php echo $method; ?>">
                <input type="text" hidden id="admin_id" value="<?php echo $admin_id; ?>">
                <input type="text" hidden id="restaurant" value="<?php echo $restaurant; ?>">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!-- <th>S.No.</th> -->
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody id="cartItems">
                    <!-- <tr>
                    <td></td>
                    <td>Burger</td>
                    <td>2</td>
                    <td>49</td>
                    <td>98</td>
                  </tr> -->

                    <tr>
                      <!-- <td></td> -->
                      <td></td>
                      <td> </td>
                      <td><b>Grand Total</b></td>
                      <td id="grandtotalprice">00</td>
                    </tr>
                    <!-- <tr>                   
                    <td><input type="number" class="form-control" value=0 id="cartRecived"></td>
                    <td><input type="number" class="form-control" value=0 id="cartDiscount"></td>
                    <td><select id="selectCustomerBillName" class="js-example-basic-single form-control">
                        <option value="0,Cash">Cash</option>
                        <option value="1,Bank">Bank</option>
                        <option value="2,Gpay">GPay</option>
                        <option value="3,PhonePe">PhonePe</option>
                        <option value="4,UPI">UPI</option>
                        <option value="5,Other">Other</option>
                      </select></td>
                    <td>Paid:<span id="paid">00</span></td>
                  </tr> -->
                  </tbody>
                </table>
              </div>
              <div class="row no-print">
                <div class="col-12">
                  <div class="row">
                    <div class="col-4">
                      <a href="#" class="btn btn-default" id="btnprintbill" disabled><i class="fas fa-print"></i> Final Print</a>
                    </div>
                    <div class="col-4">
                      <a href="#" class="btn btn-default float-left" id="btnkotprint" disabled><i class="fas fa-print"></i> KOT and Save</a>
                    </div>
                    <!-- <a href="#" class="btn btn-default float-right" id="btnprintbill"><i class="fas fa-print"></i> COT and Save</a> -->
                    <div class="col-4">
                      <a href="#" class="btn btn-danger float-right" id="btnbillclear"><i class="fas fa-broom"></i> Clear Table</a>
                    </div>
                    <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment </button> -->
                    <!-- <a href="#"  target="_blank" class="btn btn-default float-right" ><i class="fas fa-print"></i> COT and Save</a> -->
                    <!-- <button type="button" class="btn btn-primary float-right" id="btnprintbill" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Final Print
                  </button> -->
                  </div>

                </div>
              </div>



            </div><!-- /.col -->

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
  <script>
    var i = 0;
    var grandtotalPrice = 0;
    // $(document).ready(function() {
    const table = {
      tableid: $('#tableid').val() != '' ? $('#tableid').val() : 0,
      tablegroup: $('#tablegroup').val() != '' ? $('#tablegroup').val() : 0,
      table: $('#table').val() != '' ? $('#table').val() : 0,
    }
    var type = $('#method').val() != '' ? $('#method').val() : "store_price";
    var admin_id = $('#admin_id').val() != '' ? $('#admin_id').val() : 0;
    var restaurant = $('#restaurant').val() != '' ? $('#restaurant').val() : 0;
    // product object acc to bill list
    var customer = $("#selectCustomerBillName").val().split(",");
    const products = {
      data: [],
      table: table,
      type: type,
      admin_id: admin_id,
      restaurant: restaurant,
      customerName: "Cash",
      customerID: 0,
      customerType: "Cash",
      kot: 0,
      orderid: 0,
      billNo: 0,
      totalPrice: 0,
      discount: 0,
      recived: 0,
      paid: 0,
      balance: 0

    };
    console.log(products)
    fetchorderid();
    // updateDiscount();
    // on change on add discount
    // $("#cartDiscount, #cartRecived").on("input", () => {
    //   updateDiscount();
    //   // if (products.totalPrice != (products.discount + products.recived + products.balance))
    //   //   alert('something went wrong');
    //   console.log(products);
    //   $("#grandtotalprice").html(products.totalPrice - products.discount);
    // });

    // function updateDiscount() {
    //   var cartDiscount = parseFloat($("#cartDiscount").val() != null ? $("#cartDiscount").val() : 0);
    //   var cartRecived = parseFloat($("#cartRecived").val() != null ? $("#cartRecived").val() : 0);
    //   products.discount = cartDiscount;
    //   products.recived = cartRecived;
    //   products.balance = products.totalPrice - cartRecived - cartDiscount;
    //   products.paid = cartRecived + cartDiscount;
    // }
    // on change idCostmerType
    // $("#selectCustomerBillName").on("change", () => {
    //   customer = $("#selectCustomerBillName").val().split(",");

    //   products.customerName = customer[1];
    //   products.customerID = customer[0];
    //   products.customerType = customer[1];
    // });

    // calculate final bill
    function calGrandTotal(update, price, type) {
      console.log(products);
      const grandtotal = $('#grandtotalprice')[0];
      if (products.table > 0)
        $.ajax({
          url: constant.url + "table/order.php",
          method: "POST",
          data: JSON.stringify({
            data: products,
            admin_id: products.admin_id,
            restaurant: products.restaurant,
            table: products.table
          }),
          contentType: 'application/json',
          error: (data) => {
            // console.log(data);
            swal("Error Occurred", "Something going wrong", "error");
          }
        });
      grandtotal.innerHTML = parseInt(products.totalPrice);

    }
    // cal subtotal
    function calPrice(root, qty, t) {
      // console.log(root.parentNode.querySelectorAll("#subTotal"));
      var tr = root.parentNode;
      var subTotal = tr.querySelectorAll("#subTotal")[0];
      var price = tr.querySelectorAll("#price")[0];
      // var subTotalPrice = subTotal.innerHTML;
      // var finalPrice = (qty * price.innerHTML);
      products.data[t].qty = parseFloat(qty);
      products.totalPrice -= parseInt(products.data[t].subtotal);
      // console.log(); // = tprice;
      var totalPrice = qty * products.data[t].price;
      products.data[t].subtotal = totalPrice;
      subTotal.innerHTML = totalPrice;
      products.totalPrice += parseInt(totalPrice);
      // console.log(products);

      // grandtotalPrice = grandtotalPrice - parseInt(price.innerHTML) + finalPrice;
      calGrandTotal(true);
    }
    // fun to add item into bill list
    function addToCart(e, savedProduct) {
      var price = 0;
      var qty = 1;
      var id, name;
      // console.log(e)
      $(e).attr("data-productid", (i, d) => id = d);
      $(e).attr("data-productname", (i, d) => name = d);
      $(e).attr("data-productprice", (i, d) => price = d);

      var subtotal = price;
      // if item added
      if (e.checked === true) {
        // alert("added");
        if (savedProduct != null) {
          products.data.push(savedProduct);
          price = savedProduct.price;
          subtotal = savedProduct.subtotal; //price;
          qty = savedProduct.qty;
          products.totalPrice += parseFloat(subtotal);
        } else {
          products.data[i] = {
            id: id,
            name: name,
            price: parseFloat(price),
            qty: 1,
            subtotal: price,

          }
          products.totalPrice += products.data[i].price;
        }
        // console.log(products);
        calGrandTotal(false, price, true);

        var itemRow = '<tr id="cartItem' + id + '">';
        // itemRow += '<td>' + (i + 1) + '</td>';
        itemRow += '<td>' + name + '</td>';
        itemRow += '<td><input min="1" style="width:42px" onchange="calPrice(this.parentNode,this.value,' + i + ' );" type="number" value=' + qty + ' / ></td>';
        itemRow += '<td id="price">' + price + '</td>';
        itemRow += '<td id="subTotal">' + subtotal + '</td>';
        itemRow += ' </tr>';
        $("#cartItems").prepend(itemRow)
        // console.log($("#cartItems"));
        i++;
      }
      // if item removed
      if (e.checked === false) {
        i--;
        // alert("removed");
        var product = id;
        // console.log($("#cartItem" + id));
        // if (products.data[i].id == id) {
        products.data.map((v, i) => {
          if (v.id == product) {
            // console.log(v.id);
            products.totalPrice -= v.subtotal;

            calGrandTotal();
            $("#cartItem" + product).remove();
            products.data.splice(i, 1);
          }
        })
        // }
      }
    }

    // fetch customer name
    function fetchCustomerName(id) {
      console.log("pr " + products)
      $.ajax({
        method: "POST",
        url: constant.url + "customer/fetchbyid.php",
        data: JSON.stringify({
          user_id: id != null ? id : 0,
          restaurant: $('#restaurant').val() != null ? $('#restaurant').val() : 0,
        }),
        contentType: "application/json",
        dataType: "json",
        success: (res) => {
          // console.log(res);
          if (res.success) {
            const arr = res.data;
            products.customerID = arr.user_id;
            products.customerName = arr.user_name;
            $('#selectCustomerBillName').html(products.customerName);
          }
        }
      });
    }
    // clear table
    function clearTable(alert) {
      $.ajax({
        url: constant.url + "table/update.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant,
          table: products.table,
          status: 0
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success == true) {
            if (alert === true)
              swal("You done it", "Table successfully cleared", "success")
              .then((res) => {
                if (res)
                  location.reload()
              });
          }
        },
      });
    }

    //kot print bill on click
    $("#btnkotprint").on("click", () => {
      // console.log("clicked");
      if (products.data.length < 1) return;
      $.ajax({
        url: constant.url + "order/orders.php",
        method: "POST",
        data: JSON.stringify(products),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success == true) {
            // clearTable();
            products.orderid = result.data.orderid;

            // alert("redirected to print page")
            localStorage.setItem("kotbill", JSON.stringify(products));
            var print = window.open(`poskotprint.php?table=${products.table.table}&tablegroup=${products.table.tablegroup}`, 'PRINT', "height=400,width=800");
            // print.document.close();
            //print.print();
            // print.close();
            // printDiv("print");
            // location.reload();
          }
        },
      });
    });

    //final print bill on click
    $("#btnprintbill").on("click", () => {
      // console.log("clicked");
      if (products.data.length < 1) return;
      $.ajax({
        url: constant.url + "order/orders.php",
        method: "POST",
        data: JSON.stringify(products),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success == true) {
            clearTable();
            products.orderid = result.data.orderid;
            // alert("redirected to print page")
            localStorage.setItem("bill", JSON.stringify(products));
            window.open("printbill.php?orderid=" + products.orderid, "_blank");
            location.reload();
          }
        },
      });
    });
    //final print bill on click without saving to db
    $("#billingprint").on("click", () => {
      // console.log("clicked");
      window.open("printbill.php?orderid=" + products.orderid, "_blank");
      location.reload();
    });

    // clear bill list
    $("#btnbillclear").on("click", () => {
      console.log("clicked");
      // if (products.data.length < 1) return;
      clearTable(true);
    });
    // });

    //fetchorderid
    function fetchorderid() {
      $.ajax({
        url: constant.url + "table/fetchstatus.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant,
          table: products.table,
          status: 0
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success == true) {
            console.log(result);
            products.orderid = result.data.orderid;
            products.billNo = result.data.bill_no;
            products.kot = result.data.kot;
            console.log(products);
            fetchCustomerName(result.data.user_id);
          } else {
            if (result.data == null)
              $("#billingprint").hide();
            else if (result.data.kot == null)
              $("#billingprint").hide();
            if (alert === true)
              swal("Error", "Something went wrong", "error")
              .then((res) => {
                if (res)
                  location.reload()
              });
          }
        },
      });
    }
    $("#idCustomerType").on("change", () => {
      products.customerType = $("#idCustomerType").val();
      console.log(products)
    });
    // print function

    // change to table view
    function changetToTableView(e) {
      if (e.checked === false)
        location.replace("genbill.php?" + window.location.search.substr(1).split("?")[0])
    }
  </script>



  <!-- Page specific script -->


  <script>
    $(() => {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["pdf", "print"]
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