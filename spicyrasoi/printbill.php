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


            <!-- /.col -->
            <div class="col-6 table-responsive">
              <div class="row">
                <div class="col-12">
                  <h4>
                    Spicy Rasoi
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

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

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Grand Total</b></td>
                    <td id="grandtotalprice">98</td>
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
  <script>
    $(document).ready(function() {
      console.log(JSON.parse(localStorage.getItem("bill")));
      const products = JSON.parse(localStorage.getItem("bill"));
      products.data.map((d, index) => {

        var itemRow = '<tr id="cartItem' + d.id + '">';
        itemRow += '<td>' + (index + 1) + '</td>';
        itemRow += '<td>' + d.name + '</td>';
        itemRow += '<td>' + d.qty + '</td>';
        itemRow += '<td id="price">' + d.price + '</td>';
        itemRow += '<td id="subTotal">' + d.subtotal + '</td>';
        itemRow += ' </tr>';
        $("#cartItems").prepend(itemRow)
      });
      $("#grandtotalprice").html(products.totalPrice);
      window.addEventListener("load", window.print());

    });
  </script>
</body>

</html>