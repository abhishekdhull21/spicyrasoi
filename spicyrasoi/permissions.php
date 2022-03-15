<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "class/Admin.php";
require_once "islogin.php";
$user = unserialize($_SESSION['user']);
$isSuperadmin = false;
$admin = new Admin($con);
$admintype = $admin->getAdminType($user->userid);
if ($admintype == 2)
    $isSuperadmin = true;
// $sql = "SELECT admin_type from users where user_id = $user->admin_id";
$sql = "SELECT a.permission_id,a.admin,b.permission FROM admin_permission a, permissions b where a.permission_id = b.id and a.admin=$admin_id";
$res = mysqli_query($con, $sql);
// print_r($res);
$permissions = array();
if (mysqli_num_rows($res) > 0)

    while ($permission = mysqli_fetch_assoc($res))
        array_push($permissions, $permission['permission']);

// print_r($permissions);
if (isset($_GET['updatePermissions'])) {
    $u_permissions = $_GET['permission'];
    $u_permission_userid = $_GET['user'];
    foreach ($u_permissions as $permission) {
        $sql = "INSERT INTO admin_permission (admin,permission_id) values($u_permission_userid,$permission)";
        if (!mysqli_query($con, $sql))
            echo mysqli_error($con);
    }
}
?>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include("navbar.php");
        include("logininfo.php");
        ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1145.31px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Settings </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Permissions</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <div class="row">



                        <!-- /.col -->

                        <div class="col-md">
                            <?php if (in_array('super_admin', $permissions)) {  ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Admin Permissions Section</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="">
                                            <select class="form-control " name="restaurant" id="select-restaurant">
                                                <option value="">Select Restaurant</option>
                                                <?php $sql = "SELECT restaurantid as id,name FROM restaurant";
                                                $res = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <select class="form-control mt-2" name="user" id="select-user">
                                                <option value="0">Select Admin</option>
                                            </select>
                                            <div class="mt-3">

                                                <?php
                                                // print_r($_GET['permission']);
                                                $sql = "SELECT * FROM `permissions`";
                                                $res = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                                    <input type="checkbox" name="permission[]" value="<?php echo $row['id']; ?>" id="p<?php echo $row['id']; ?>">
                                                    <label for="p<?php echo $row['id']; ?>"><?php echo $row['permission']; ?></label>
                                                    <br>
                                                <?php } ?>
                                                <input class="form-control btn btn-primary" type="submit" value="Update Permissions" name="updatePermissions">

                                            </div>
                                    </div>
                                    </form>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            <?php } ?>
                        </div>
                        <!-- /.col -->

                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script>
        $("#select-restaurant").on("change", function() {
            const restaurant = $("#select-restaurant").val();
            $.ajax({
                url: constant.url + "user/data.php",
                method: "POST",
                data: JSON.stringify({
                    restaurant: restaurant,
                    getwithrestaurant: true
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    if (result.success === true) {
                        var element = "";
                        result.data.map((d) => {
                            element += "<option value=" + d.userid + ">" + d.username + "</option>"
                        });
                        $("#select-user").find('option').remove();
                        $("#select-user").append(element);
                        console.log(element);
                    }
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {

            $.ajax({
                url: constant.url + "expense/totalsell.php",
                method: "POST",
                data: JSON.stringify({
                    restaurant: restaurant
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    if (result.success === true)
                        $('#totalsell').html(parseInt(result.data[0].sum));
                }
            });
            $.ajax({
                url: constant.url + "expense/totalexpense.php",
                method: "POST",
                data: JSON.stringify({
                    restaurant: restaurant
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    // console.log(result);
                    if (result.success === true) {
                        $('#totalexpense').html(parseInt(result.data[0].sum));
                    }
                }
            });
        });
    </script>

</body>

</html>