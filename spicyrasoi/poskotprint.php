<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";

$orderid = isset($_GET['orderid']) ? $_GET['orderid'] : null;
$sql = "SELECT a.name as restaurant,a.city,a.state,a.country,a.district,a.mobile,
b.name as name,b.bill_no,b.date,b.orderid,b.order_value as total
from restaurant a, orders b where b.restaurant = a.restaurantid and b.orderid  = $orderid";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

?>
    <head>
        <meta charset="UTF-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <style type="text/css">
            * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 150px;
    max-width: 275px;
}

td.quantity,
th.quantity {
    width: 70px;
    max-width: 70px;
    word-break: break-all;
}

td.price,
th.price {
    width: 100px;
    max-width: 100px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
        </style>
        <title>Receipt</title>
    </head>
    <body>
        <div class="ticket">
                <hr>
                Place : <b> ABC </b>
                <hr>
                Date: 29-10-2021 <br>
                Bill No. 002
            <table>
                <thead>
                    <tr>
                        
                        <th class="description">Item</th>
                        <th class="quantity centered">Q.</th>
                        <th class="price">Price</th>
                         
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=1;$i<=3;$i++) { ?>
                    <tr>
                        
                        <td class="description">ARDUINO UNO R3</td>
                        <td class="quantity centered">1</td>
                        <td class="price">25</td>
                        
                    </tr>
                <?php } ?>
                   
                  
                </tbody>
            </table>
           
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <!-- <script src="script.js"></script> -->
        <script type="text/javascript">
            const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
   
});
        </script>
    </body>

</html>