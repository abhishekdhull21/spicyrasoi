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
        #restName {
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
                            if (mysqli_num_rows($res) < 1) {
                            ?>
                                <script>
                                    swal("Contact to Administration ", "Your ID is Not Activated", "warning")
                                        .then((res) => {
                                            window.location = "./user/logout.php";
                                        })
                                </script>
                            <?php
                            }
                            ?>
                            <h2 id="restName"><?php echo mysqli_fetch_assoc($res)['name']; ?> </h2>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php include 'activetable.php'; ?>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center m-2">
                            <span>
                                If face any problem, You can contact to us on given Helpline No. 
                            </span>
                        </div>
                    </div>
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
                                        <h5 class="card-title m-0"><?php echo ("Help Desk ") ?></h5>
                                    </div>
                                    <div class="card-body">
                                        HelpLine No.: <br> <b> 70153-93229,98137-61709</b> <br>
                                        <a href="#" target="_blank" class="btn btn-success m-2" >Whatsapp</a>
                                        <a href="mailto:ajaysheokand.as@gmail.com" target="_blank" class="btn btn-info m-2" >Email</a>
                                        <hr>

                                        Technical Support: <br> <b> 85709-96916</b> <br>
                                        <a href="https://wa.me/918570996916" target="_blank" class="btn btn-success m-2" >Whatsapp</a>
                                        <a href="mailto:ajaysheokand.as@gmail.com" target="_blank" class="btn btn-info m-2" >Email</a>

                                    </div>
                                </div>
                            <?php } ?>

                            <!-- /.card -->
                        </div>

                        <div class="col-lg-6">
                            <div class="col-12">
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" id="inputName" class="form-control" autocomplete="off">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="inputEmail">E-Mail</label>
                                    <input type="email" id="inputEmail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mob">Mobile No.</label>
                                    <input type="number" id="mob" class="form-control">
                                </div> -->
                                <div class="form-group">
                                    <label for="inputSubject">Subject</label>
                                    <input type="text" id="inputSubject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Message</label>
                                    <textarea id="inputMessage" class="form-control" rows="4" spellcheck="false"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send message">
                                </div>
                            </div>
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