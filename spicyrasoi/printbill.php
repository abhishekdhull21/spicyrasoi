<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";
// session_start();
// if (isset($_GET['table'])) {
//   $tableid = $_GET['table'];
//   if (!isset($_SESSION['tables']))
//     $_SESSION['tables'] = array();
//   $arr = $_SESSION['tables'];

//   $activeTables = sizeof($arr);
//   if (!in_array($tableid, $arr))
//     $_SESSION['tables'][$activeTables] = $tableid;
// }
// print_r(file_get_contents('php://input'));
$orderid = isset($_GET['orderid']) ? $_GET['orderid'] : null;
$sql = "SELECT a.name as restaurant,a.city,a.state,a.country,a.district,a.mobile,
b.name as name,b.bill_no,b.date,b.orderid,b.order_value as total
from restaurant a, orders b where b.restaurant = a.restaurantid and b.orderid  = $orderid";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicy Rasoi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">


    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <h2 class="page-header">
                <i class="fas fa-hotel"></i>Spicy Rasoi
                <small class="float-right">Date: <?php echo $row['date']; ?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong id="restaurant"><?php echo $row['restaurant']; ?></strong>><br>
                <address id="address">
                  <span id="city"></span><?php echo $row['city']; ?> <span id="district"><?php echo $row['district']; ?></span><br>
                  <span id="state"><?php echo $row['state']; ?></span>
                  <span id="country"><?php echo $row['country']; ?></span><br>
                  Phone: <span id="phone"><?php echo $row['mobile']; ?></span><br>
                </address>

              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><span id="customerName"><?php echo $row['name']; ?></strong><br>
                <!-- 795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com -->
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Bill No. : <span id="bill"><?php echo $row['bill_no']; ?></span></b><br>
              <b>Order No. : <span id="orderid"><?php echo $row['orderid']; ?></span></b><br>
              <br>
              <!-- <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">

            <!-- /.col -->
            <div class="col-12 table-responsive">

              <!-- <div class="col-12">
                  <h4>
                    Bill
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div> -->
              <!-- /.col -->


              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id="cartItems">
                  <?php
                  $sql = "SELECT a.product_name as name, b.price,b.qty,b.subtotal, c.order_value from product a, orders_product b, orders c where a.product_id = b.product_id and b.orderid = c.orderid and b.orderid = $orderid";
                  $rest = mysqli_query($con, $sql);
                  $i = 1;
                  while ($order = mysqli_fetch_assoc($rest)) {
                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $order['name']; ?></td>
                      <td><?php echo $order['price']; ?></td>
                      <td><?php echo $order['qty']; ?></td>
                      <td><?php echo $order['subtotal']; ?></td>

                    </tr>
                  <?php } ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Grand Total</b></td>
                    <td id="grandtotalprice"><?php echo $row['total']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->

          </div>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->

  <!-- <script>
    window.addEventListener("load", window.print());
  </script> -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="scripts/request.js"></script>
  <script>
    $(document).ready(function() {
      // console.log(JSON.parse(localStorage.getItem("bill")));
      const products = JSON.parse(localStorage.getItem("bill"));
      console.log(products);
      // $.ajax({
      //   url: constant.url + "restaurant/fetch.php",
      //   method: "POST",
      //   data: JSON.stringify(products),
      //   contentType: "application/json",
      //   dataType: "json",
      //   success: function(result) {
      //     console.log(result);
      //     if (result.success == true) {
      //       result = result.data[0];
      //       $("#restaurant").html(result.name);
      //       $("#city").html(result.city);
      //       $("#district").html(result.district);
      //       $("#state").html(result.state);
      //       $("#country").html(result.country);
      //       $("#phone").html(result.mobile);
      //       $('#orderid').html(products.orderid);
      //       $('#bill').html(products.billNo);

      //       $('#customerName').html(products.customerName);
      //       products.data.map((d, index) => {


      //         var itemRow = '<tr id="cartItem' + d.id + '">';
      //         itemRow += '<td>' + (products.data.length - index) + '</td>';
      //         itemRow += '<td>' + d.name + '</td>';
      //         itemRow += '<td>' + d.qty + '</td>';
      //         itemRow += '<td id="price">' + d.price + '</td>';
      //         itemRow += '<td id="subTotal">' + d.subtotal + '</td>';
      //         itemRow += ' </tr>';
      //         $("#cartItems").prepend(itemRow)
      //       });
      //       $("#grandtotalprice").html(products.totalPrice);
      //       window.addEventListener("load", window.print());
      //     }
      //   },
      // });

    });
  </script>
</body>

</html>