<!DOCTYPE html>
<html lang="en">
<?php
require_once('../config.php');
if (isset($_GET['table']) && isset($_GET['tablegroup'])) {
    $tablegroup = $_GET['tablegroup'];
    $tableid = $_GET['table'];
    $sql = "SELECT `title` FROM `dashboard` WHERE `id` = $tablegroup limit 1";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) < 1) {
        echo 'something went wrong, close this window and try again...' . mysqli_error($con);
    } else {
        $title = mysqli_fetch_assoc($res)['title'];
?>

        <head>
            <meta charset="UTF-8">
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- <link rel="stylesheet" href="style.css"> -->
            <style type="text/css">
                * {
                    font-size: 12px;
                    font-family: 'Arial Black';
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
            <style>
                @media print {
                    #print {
                        display: none;
                    }
                }
            </style>
        </head>

        <body>
            <div class="ticket">
                <hr>
                Place : <b> <?php echo $title; ?> - <?php echo $tableid; ?> </b>
                <hr>
                Date: <?php echo date('Y-m-d'); ?><br>
                Order No. <span id="billno">::bill_no::</span><br>
                Kot No. <span id="kotno">::kot_no::</span>
                <table>
                    <thead>
                        <tr>
                            <th class="description">Item</th>
                            <th class="quantity">Qty.</th>
                            <!-- <th class="price">Price</th> -->
                        </tr>
                    </thead>
                    <tbody id="cartItems">

                    <tbody>
                </table>

                <div style="margin-top:50px;">
                    <button class="btn btn-default" id="print">Print</button>
                </div>
            </div>
            <!-- <button id="btnPrint" class="hidden-print">Print</button> -->
            <!-- <script src="script.js"></script> -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <script src="./scripts/request.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    console.log(JSON.parse(localStorage.getItem("kotbill")));
                    const products = JSON.parse(localStorage.getItem("kotbill"));
                    $('#orderid').html(products.orderid);
                    $('#customerType').html(products.customerType);
                    $('#billno').html(products.todayOrderNo);

                    ajaxRequest("order/kotInfo.php", {
                        'today_kots': ""
                    }, (res) => {
                        console.log(res);
                        if (res.success == true) {
                            $('#kotno').html(res.data.kot_no);

                        } else {
                            swal("Error", res.error, "error");
                        }
                    });
                    products.data.map((d, index) => {


                        var itemRow = '<tr id="cartItem' + d.id + '">';
                        // itemRow += '<td>' + (products.data.length - index) + '</td>';
                        itemRow += '<td>' + d.name + '</td>';
                        itemRow += '<td class="centered">' + d.qty + '</td>';
                        // itemRow += '<td id="price">' + d.price + '</td>';
                        // itemRow += '<td id="subTotal">' + d.subtotal + '</td>';
                        itemRow += ' </tr>';
                        $("#cartItems").prepend(itemRow)
                    });
                    // $("#grandtotalprice").html(products.totalPrice);
                    $("#print").on('click', () => {
                        window.print()
                    });
                    // window.print();
                });
            </script>
        </body>
<?php }
} else echo 'something went wrong, close this window and try again...'; ?>

</html>