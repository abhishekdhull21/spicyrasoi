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
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
  <style>
    #restName{
      font-family: Hack, sans-serif;
      font-weight: bolder;
      text-transform: uppercase;
      font-size: 2rem;
      text-shadow: 1px 1px 1px yellow,
                  2px 2px 1px yellow;
      text-align: center;
      /* border: 1px solid black; */
      border-radius: 3px;
      color: green;
      letter-spacing: 2px;
      word-spacing: 4px;
      /* display: inline-block; */

    }
  </style>
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto; font-family: 'georgia';">
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
              $sql = "SELECT name FROM `restaurant` WHERE restaurantid = $restaurant and status = 1";
              $res = mysqli_query($con, $sql);
              if(mysqli_num_rows($res)<1)
              {
                ?>
                <script>
                  swal("Contact to Administration ","Your ID is Not Activated","warning")
                  .then((res)=>{
                    window.location = "./user/logout.php";
                  })
                </script>
              <?php
              }
              ?>
              <h2 id="restName" ><?php echo mysqli_fetch_assoc($res)['name']; ?> </h2> 
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
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
                    <h5 class="card-title m-0"><?php echo("Notifaction ") ?></h5>
                  </div>
                  <div class="card-body">
                    Text Here ......
                    <ol>
                        <li class="list-item">Hello</li>
                    </ol>
                  </div>
                </div>
              <?php } ?>

              <!-- /.card -->
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title m-0"><?php echo("All Notifaction ") ?></h5>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped">
                    <tbody>
                        
                        <?php for($i=1;$i<=10;$i++) { ?>
                        <tr>
                            <td>Hello</td> 
                        </tr>
                        <?php } ?> 
                        
                    </tbody>
                    </table>
                  </div>
                </div>

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
  <!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>



  <?php include_once('isloginfooter.php'); ?>
  
</body>

</html>