<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";
session_start();
$tableid = 0;
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

    <!-- Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

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
              <h1 class="m-0">Add Item in Bill</h1>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <?php
                $sql = "SELECT * FROM category  WHERE status = true";
                $n = mysqli_query($con, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($n)) {
                  $cat_id = $row['cat_id'];
                  if ($i++ % 4 == 0) {
                    echo '</div><div class="row">';
                  } ?>
                  <div class="col-md-3">

                    <div class="card card-primary collapsed-card">
                      <div class="card-header">
                        <h3 class="card-title"><?php echo ($row['cat_name']) . $i; ?></h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">

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
                            $res = mysqli_query($con, "SELECT * FROM `product` WHERE category = $cat_id");
                            while ($product = mysqli_fetch_assoc($res)) {
                            ?>
                              <tr>
                                <td><?php echo ($product['product_name']); ?></td>
                                <td><?php echo ($product[$method]); ?></td>
                                <td class="text-right py-0 align-middle">
                                  <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" data-productid="<?php echo $product['product_id']; ?>" data-productname="<?php echo $product['product_name']; ?>" data-productprice="<?php echo $product[$method]; ?>" id="addProductCart_<?php echo $product['product_id']; ?>" onchange="addToCart(this);">
                                    <label class="custom-control-label" for="addProductCart_<?php echo $product['product_id']; ?>"></label>
                                  </div>
                                  <!-- <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-plus"></i></a>
                                  </div> -->
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                <?php } ?>
              </div>
            </div>

            <!-- /.col -->
            <div class="col-md-3 table-responsive">
              <div class="row">
                <div class="col-12">
                  <h4>
                    Spicy Rasoi
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <input type="text" hidden id="tableid" value="<?php echo $tableid; ?>">
              <input type="text" hidden id="method" value="<?php echo $method; ?>">
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
                  <a href="#" class="btn btn-default" id="btnprintbill"><i class="fas fa-print"></i> COT and Save</a>
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment </button> -->
                  <!-- <a href="#"  target="_blank" class="btn btn-default float-right" ><i class="fas fa-print"></i> COT and Save</a> -->
                  <!-- <button type="button" class="btn btn-primary float-right" id="btnprintbill" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Final Print
                  </button> -->
                </div>
              </div>



            </div>
            <!-- /.col -->

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
  <script>
    var i = 0;
    var grandtotalPrice = 0;
    var table = $('#table').val() != '' ? $('#tableid').val() : 0;
    var type = $('#method').val() != '' ? $('#method').val() : "store_price";

    let products = {
      data: [],
      table: table,
      type: type,
      totalPrice: 0
    };

    function calGrandTotal(update, price, type) {
      // console.log($('#grandtotalprice'));
      const grandtotal = $('#grandtotalprice')[0];
      // if (update === true) {
      //   grandtotal.innerHTML = grandtotalPrice;

      //   return;
      // }
      // if (type === true)
      //   grandtotalPrice = (grandtotal.innerHTML * 1) + (price * 1);
      // else
      //   grandtotalPrice = (grandtotal.innerHTML) - (price);
      grandtotal.innerHTML = products.totalPrice;
    }



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

    function addToCart(e, savedProduct) {
      var price = 0;
      var qty = 1;
      var id, name;
      console.log(e)
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
        console.log(products);
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
      const sp = {
        data: [{
            "id": "2",
            "name": "Banana Shake",
            "price": 40,
            "qty": 2,
            "subtotal": "80"
          },
          {
            "id": "3",
            "name": "Mango Shake",
            "price": 90,
            "qty": 1,
            "subtotal": "90"
          },
          {
            "id": "6",
            "name": "Banana",
            "price": 30,
            "qty": 1,
            "subtotal": "30"
          }

        ],
        totalPrice: 200
      }

      sp.data.map((data) => {
        //$("#addProductCart_" + data.id).prop("checked", "checked");
        //addToCart(document.getElementById("addProductCart_" + data.id), data, sp.totalPrice);
        // addToCart($("#addProductCart_" + data.id));
      });
      // print bill on click
      $("#btnprintbill").on("click", () => {
        // console.log("clicked");
        localStorage.setItem("bill", JSON.stringify(products));
        window.open("printbill.php", "_blank");
        location.reload();
      });
    });
  </script>
</body>

</html>