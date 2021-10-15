<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";
session_start();
if (isset($_GET['table'])) {
  $tableid = $_GET['table'];
  if (!isset($_SESSION['tables']))
    $_SESSION['tables'] = array();
  $arr = $_SESSION['tables'];

  $activeTables = sizeof($arr);
  if (!in_array($tableid, $arr))
    $_SESSION['tables'][$activeTables] = $tableid;
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
                  <tr>
                    
                    <td>Burger</td>
                    <td>2</td>
                    <td>49</td>
                    <td>98</td>
                  </tr>
                  <tr>
                    <!-- <td></td> -->
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
  <script>
    var i = 0;
    var grandtotalPrice = 0;
    let products = {
      data: [],
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
      console.log(products);

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
        $("#cartItems").append(itemRow)
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
            console.log(v.id);
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

    });
  </script>
</body>

</html>