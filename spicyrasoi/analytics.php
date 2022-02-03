<?php session_start();
include_once 'class/User.php';
require_once '../config.php';

?>
<!DOCTYPE html>
<?php require_once('islogin.php');
require_once('logininfo.php');
?>
<html lang="en" class="" style="height: auto;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spicy Rasoi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard Analytics</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v3</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Payment Mode</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <!-- <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                      </span>
                      <span class="text-muted">Since last week</span>
                    </p> -->
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="sale-type-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <!-- <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last Week
                    </span> -->
                  </div>
                </div>
              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Products</h3>
                  <div id="productmaxsalesreportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; float: right; width: 50%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Sales Qty</th>
                        <th>Total</th>
                        <th>More</th>
                      </tr>
                    </thead>
                    <tbody id="productSaleList">


                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">

              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Sales</h3>
                    <div id="salepermonthreportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 45%">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <!-- <a href="javascript:void(0);">View Report</a> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg" id="salesPerDayMonth"> 00 ₹</span>
                      <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <!-- <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 2%
                      </span> -->
                      <!-- <span class="text-muted">Since last month</span> -->
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="sales-chart1" height="200"></canvas>
                  </div>

                  <!-- <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This year
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last year
                    </span>
                  </div> -->
                </div>
              </div>
              <!-- /.card -->


            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <?php include("footer.php"); ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- moment -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
  <script src="scripts/utils.js"></script>
  <script>
    const colorize = {
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }
  </script>
  <script>
    var start = moment().subtract(6, 'days').format('YY-MM-DD');
    var end = moment().format('YY-MM-DD');
    var chartSales;
    var chartSaleType;
    // console.log(start);
    // console.log(start.year());

    function fetchMonthPerDaySales(start, end) {
      ajaxRequest("analytics/monthperdaysales.php", {
        start: start,
        end: end,
        restaurant: restaurant,
      }, (data) => {
        if (data.success) {
          const sales = new Array();
          const label = new Array();
          var total = 0;
          data.data.map(function(d) {
            sales.push(d['day_sale']);
            label.push(d['date']);
            total += parseInt(d['day_sale']);
          });
          // console.log(sales, label);
          $("#salesPerDayMonth").html(total + " ₹");
          drawChart(chartSales, sales, label)
        }
      });

    }

    // fetch product max sales between dates
    function fetchMaxSaleProducts(start, end) {
      ajaxRequest("analytics/maxsaleproducts.php", {
        start: start,
        end: end,
        restaurant: restaurant,
      }, (data) => {
        if (data.success) {
          console.log(data)
          var tr = "";
          data.data.map(function(d) {
            tr += `<tr>
             <td>${d.product_name} </td>
             <td>${d.total_qty} Sold</td>
             <td>${d.total} ₹</td>
             <td></td> </tr>`;
          });
          $("#productSaleList").html(tr);
          // console.log(sales, label);
          // $("#salesPerDayMonth").html(total + " ₹");
          // drawChart(chartSales, sales, label)
        }
      });

    }

    // fetch product max sales between dates
    function fetchSaleType(start, end) {
      ajaxRequest("analytics/salepaymenttype.php", {
        start: start,
        end: end,
        restaurant: restaurant,
      }, (data) => {
        if (data.success) {
          // console.log(data)
          const total = new Array();
          const label = new Array();

          console.log(colorize)
          data.data.map(function(d, i) {
            label.push(d.pay_type);
            total.push(parseInt(d.total));

          });
          const dataset = [{
            label: label,
            data: total,
            backgroundColor: colorize.backgroundColor[0],
            borderColor: colorize.borderColor[0],
            borderWidth: 1
          }];
          // $("#productSaleList").html(tr);
          // console.log(dataset, label);
          // $("#salesPerDayMonth").html(total + " ₹");
          drawBarChart(chartSaleType, dataset, label)
        }
      });

    }

    fetchMonthPerDaySales(start, end);
    fetchMaxSaleProducts(start, end);
    fetchSaleType(start, end);




    function drawChart(chart, data, label) {
      // console.log(chart)
      if (chart != undefined)
        chart.destroy();
      const ctx = document.getElementById('sales-chart1');
      chartSales = new Chart(ctx, {
        type: 'line',
        data: {
          labels: label,
          datasets: [{
            label: 'sale',
            data: data,
            backgroundColor: colorize.backgroundColor,
            borderColor: colorize.borderColor,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

    }
    // bar online cash sales
    function drawBarChart(chart, datasets, label) {
      console.log(datasets)
      if (chart != undefined)
        chart.destroy();
      const ctx = document.getElementById('sale-type-chart');
      chartSaleType = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: label,
          datasets: datasets
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

    }
  </script>
  <script type="text/javascript">
    $(function() {

      var start = moment().subtract(6, 'days');
      var end = moment();

      function cb(start, end) {
        $('#salepermonthreportrange span,#productmaxsalesreportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }

      $('#salepermonthreportrange,#productmaxsalesreportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);

    });



    // $('#salepermonthreportrange').daterangepicker();
    $('#salepermonthreportrange').on('apply.daterangepicker', function(ev, picker) {

      fetchMonthPerDaySales(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'))
    });
    // $('#productmaxsalesreportrange').daterangepicker();
    $('#productmaxsalesreportrange').on('apply.daterangepicker', function(ev, picker) {

      fetchMaxSaleProducts(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'))
    });
  </script>
  <?php include_once('isloginfooter.php'); ?>
</body>

</html>