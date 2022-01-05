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
    <div class="content-wrapper" style="min-height: 1145.31px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-12">
              <?php
              $sql = "SELECT name FROM `restaurant` WHERE restaurantid = $restaurant";
              $res = mysqli_query($con, $sql);

              ?>
              <marquee behavior="alternate"; direction="right"; class="font-effect-fire">
              <h1 class="m-0" style="color: green; font-family: cursive;" ><?php echo mysqli_fetch_assoc($res)['name']; ?> </h1>
              </marquee>
            </div><!-- /.col -->
            <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              </ol>
            </div> -->
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php include 'activetable.php'; ?>
      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php
              $sql = "SELECT * FROM dashboard where  restaurant  = $restaurant and status =  1";
              $res = mysqli_query($con, $sql);
              if (mysqli_num_rows($res) < 1)
                echo "Nothing to see here";
              else
                while ($row = mysqli_fetch_assoc($res)) {
                  $cat_id = $row['id'];
              ?>
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title m-0"><?php echo $row['title']; ?></h5>
                  </div>
                  <div class="card-body">

                    <?php for ($i = 1; $i <= $row['tables']; $i++) {
                      // if (isset($_SESSION['tables']))
                      $cat_name = $cat_id . $i;
                      if (in_array($cat_name, $_SESSION['tables'])) {
                    ?>
                        <a class="btn btn-app bg-success" href="<?php echo "genbill.php?table=" .  $i . "&group=" . $cat_id . "&name=" . $cat_name; ?>">
                          <?php
                          $nsql = "SELECT a.user_name FROM customer a,`orders` b,tables_session c WHERE a.user_id = b.user_id and b.orderid = c.orderid and c.table_id = $i and c.table_cat = $cat_id";
                          $nres = mysqli_query($con, $nsql);
                          $customer_name = "";
                          if (mysqli_num_rows($nres) > 0)
                            $customer_name = mysqli_fetch_assoc($nres)['user_name'];
                          ?>
                          <span class="badge bg-purple"><?php echo $customer_name; ?></span>
                          <h3 id="table<?php echo $row['id'] . ($i) ?>"><?php echo ($i) ?></h3> <br>
                        </a>
                      <?php } else { ?>
                        <a class="btn btn-app bg-skin-red-light" href="<?php echo "genbill.php?table=" . $i . "&group=" . $cat_id . "&name=" . $cat_name; ?>">
                          <h3 id="table<?php echo  $row['id'] . ($i) ?>"><?php echo ($i) ?></h3> <br>
                        </a>

                    <?php }
                    } ?>

                  </div>
                </div>
              <?php } ?>

              <!-- /.card -->
            </div>

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
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
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <?php include_once('isloginfooter.php'); ?>
</body>

</html>