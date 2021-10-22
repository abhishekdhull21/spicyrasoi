<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "islogin.php";
// print_r($user);
$tableid = 0;
// print_r($user);
if (isset($_GET['table'])) {
  $tableid = $_GET['table'];
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
  // echo $method;
}
// print_r($_SESSION);
function showProduct($cat_id, $subid)
{
  global $con, $method, $admin_id, $restaurant; ?>
  <table class="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Add</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql =  "SELECT * FROM `product` WHERE `category` = $cat_id and `sub_category` = $subid  and restaurant = $restaurant";
      if ($subid == false)
        $sql =  "SELECT * FROM `product` WHERE `category` = $cat_id  and restaurant = $restaurant";

      $resproduct = mysqli_query($con, $sql);

      while ($product = mysqli_fetch_assoc($resproduct)) {
      ?>
        <tr>
          <td><?php echo ($product['product_name']); ?></td>
          <td><?php echo ($product[$method]); ?></td>
          <td class="text-right py-0 align-middle">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" data-productid="<?php echo $product['product_id']; ?>" data-productname="<?php echo $product['product_name']; ?>" data-productprice="<?php echo $product[$method]; ?>" id="addProductCart_<?php echo $product['product_id']; ?>" onchange="addToCart(this);">
              <label class="custom-control-label" for="addProductCart_<?php echo $product['product_id']; ?>"></label>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } ?>
<!-- end of showProduct -->

<?php
function fetchSubCategory($cat_id)
{
  global $con, $admin_id, $restaurant;

  $sql = "SELECT * FROM subcategory where `cat_id` = $cat_id  and restaurant = $restaurant";
  $res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res) < 1)
    showProduct($cat_id, false);
  // print_r($res);
  else {
    while ($sub = mysqli_fetch_assoc($res)) {
      $subid = $sub['id'];

?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><?php echo ($sub['name']); ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php showProduct($cat_id, $subid);
              ?>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div>
      </div>
<?php }
  }
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
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">

    <!-- Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <?php
                if ($restaurant == "" || $admin_id == "") {
                  if (isset($_SESSION['token'])) {

                    ($user->fetchUser($_SESSION['token']));
                  } else $isLogined = false;
                }
                // print_r($user);
                $sql = "SELECT * FROM category  WHERE restaurant = $user->restaurant AND status = true ";
                $n = mysqli_query($con, $sql);
                $i = 1;
                if (mysqli_num_rows($n) > 0)
                  while ($row = mysqli_fetch_assoc($n)) {
                    $cat_id = $row['cat_id'];
                    if ($i++ % 4 == 0) {
                      echo '</div><div class="row">';
                    } ?>
                  <div class="col-md-3">
                    <div class="card card-primary collapsed-card">
                      <div class="card-header">
                        <h3 class="card-title"><?php echo ($row['cat_name']); ?></h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <?php
                        fetchSubCategory($cat_id);
                        ?>

                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                <?php }
                else echo "No Record found";

                ?>
              </div><!-- /.row -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 table-responsive">
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
                                  <label for="exampleInputEmail1">Mobile No.</label>
                                  <input type="text" class="form-control" id="customer_mob_no" placeholder="Enter Mobile No.">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Customer Name</label>
                                  <input type="text" class="form-control" id="customer_name" placeholder="Enter Customer Name">
                                </div>

                              </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="btnAddCategory">Add</button>
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
                  <a href="#" class="btn btn-default" id="#"><i class="fas fa-print"></i> Add Food</a>
                  <a href="#" class="btn btn-default float-right" id="#"><i class="fas fa-print"></i> Billing</a>
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
                    <select id="idCostmerType" class="form-control">
                      <option value="Cash">Cash</option>
                      <option value="#">Avilable Soon</option>
                      <!-- <option value="non-veg">Non-Veg</option> -->
                      <!-- <option value="28">28%</option> -->
                    </select>
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
                    Product Cart
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <input type="text" hidden id="tableid" value="<?php echo $tableid; ?>">
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
                    <td></td>
                    <td><b>Grand Total</b></td>
                    <td id="grandtotalprice">00</td>
                  </tr>
                </tbody>
              </table>

              <div class="row no-print">
                <div class="col-12">
                  <a href="#" class="btn btn-default" id="btnprintbill"><i class="fas fa-print"></i> Final Print</a>
                  <a href="#" class="btn btn-default float-right" id="btnprintbill"><i class="fas fa-print"></i> KOT and Save</a>
                  <!-- <a href="#" class="btn btn-default float-right" id="btnprintbill"><i class="fas fa-print"></i> COT and Save</a> -->
                  <a href="#" class="btn btn-danger float-right" id="btnbillclear"><i class="fas fa-broom"></i> Clear Table</a>
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment </button> -->
                  <!-- <a href="#"  target="_blank" class="btn btn-default float-right" ><i class="fas fa-print"></i> COT and Save</a> -->
                  <!-- <button type="button" class="btn btn-primary float-right" id="btnprintbill" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Final Print
                  </button> -->
                </div>
              </div>



            </div><!-- /.col -->
          </div><!-- /.row -->
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
  <?php include_once('isloginfooter.php'); ?>


  <script>
    var i = 0;
    var grandtotalPrice = 0;
    var table = $('#table').val() != '' ? $('#tableid').val() : 0;
    var type = $('#method').val() != '' ? $('#method').val() : "store_price";
    var admin_id = $('#admin_id').val() != '' ? $('#admin_id').val() : 0;
    var restaurant = $('#restaurant').val() != '' ? $('#restaurant').val() : 0;
    // product object acc to bill list
    const products = {
      data: [],
      table: table,
      type: type,
      admin_id: admin_id,
      restaurant: restaurant,
      customerType: $("#idCostmerType").val(),
      orderid: 0,
      billNo: 0,
      totalPrice: 0
    };
    // on change idCostmerType
    $("#idCostmerType").on("change", () => {
      products.customerType = $(this).val();
    })

    // calculate final bill
    function calGrandTotal(update, price, type) {
      // console.log($('#grandtotalprice'));
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
      grandtotal.innerHTML = products.totalPrice;
    }
    // cal subtotal
    function calPrice(root, qty, t) {
      // console.log(root.parentNode.querySelectorAll("#subTotal"));
      var tr = root.parentNode;
      var subTotal = tr.querySelectorAll("#subTotal")[0];
      var price = tr.querySelectorAll("#price")[0];
      // var subTotalPrice = subTotal.innerHTML;
      // var finalPrice = (qty * price.innerHTML);
      products.data[t].qty = parseInt(qty);
      products.totalPrice -= parseInt(products.data[t].subtotal);
      // console.log(); // = tprice;
      var totalPrice = qty * products.data[t].price;
      products.data[t].subtotal = totalPrice;
      subTotal.innerHTML = totalPrice;
      products.totalPrice += totalPrice;
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
          products.totalPrice += parseInt(subtotal);
        } else {
          products.data[i] = {
            id: id,
            name: name,
            price: parseInt(price),
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
          }
        })
        // }


      }
    }
    $(document).ready(function() {
      // fetch table item
      $.ajax({
        method: "POST",
        url: constant.url + "table/orderfetch.php",
        data: JSON.stringify({
          table: $('#tableid').val() != null ? $('#tableid').val() : 0,
          restaurant: $('#restaurant').val() != null ? $('#restaurant').val() : 0,
        }),
        contentType: "application/json",
        dataType: "json",
        success: (res) => {
          // console.log(res);
          if (res.success) {
            const arr = res.data;

            arr.data.map((d) => {
              if ($("#addProductCart_" + d.id) != null) {
                $("#addProductCart_" + d.id).prop("checked", "true");
                addToCart(document.getElementById("addProductCart_" + d.id), d, arr.totalPrice);
                addToCart($("#addProductCart_" + d.id));
              }
            });
          }
        }
      });

      // clear table
      function clearTable(alert) {
        $.ajax({
          url: constant.url + "table/update.php",
          method: "POST",
          data: JSON.stringify({
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

      // print bill on click
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
              window.open("printbill.php", "_blank");
              location.reload();
            }
          },
        });
      });

      // clear bill list
      $("#btnbillclear").on("click", () => {
        console.log("clicked");
        if (products.data.length < 1) return;
        clearTable(true);
      });
    });
  </script>
</body>

</html>