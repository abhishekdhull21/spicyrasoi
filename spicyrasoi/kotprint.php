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
         
          <!-- info row -->
          <div class="row invoice-info">
           
         
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
             
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
                     
                      <td><?php echo $order['qty']; ?></td>
                    

                    </tr>
                  <?php } ?>
                 
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
     

    });
  </script>
</body>

</html>