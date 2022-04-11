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
    <title><?php echo $siteName; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto; font-family: 'georgia';">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include("navbar.php") ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1145.31px;">

            <!-- Main content -->
            <div class="content ">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 mt-5">
                            <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                            <grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" id="inputTitle" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <div id="inputMessage" class="form-control" rows="4" spellcheck="false"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="btnAddNotification" class="btn btn-primary" value="Create Notifaction">
                            </div>
                        </div>

                        <div class="col-lg-6 mt-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0"><?php echo ("All Notifaction ") ?></h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $sql  = "SELECT * FROM `notifications` WHERE status =1";
                                    $res = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <ul class="todo-list ">

                                            <li class="m-1">
                                                <a href="#">
                                                    <span class="text"><?php echo $row['title']; ?></span>
                                                    <!-- <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small> -->
                                                </a>
                                            </li>

                                        </ul>
                                    <?php } ?>
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
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>



    <?php include_once('isloginfooter.php'); ?>

    <script>
        $('#btnAddNotification').on('click', function() {
            const post = $('#inputMessage').summernote('code');
            const title = $('#inputTitle').val();
            console.log(title);
            if (post == '<p><br></p>' || title == '') {
                alert('both field required');
                return;

            }
            $.ajax({
                method: "POST",
                url: constant.url + 'notification/index.php',
                datatype: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    request: "add",
                    title,
                    post,
                    restaurant,
                    isPublic: 1
                }),
                success: (res) => {
                    if (res.success) {
                        swal('Success', 'Notification Created Successfully', 'success');
                    } else {
                        swal('Notification Not Created', res.error, 'error');

                    }
                }
            })
            // console.log(message);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inputMessage').summernote();
        });
    </script>
</body>

</html>