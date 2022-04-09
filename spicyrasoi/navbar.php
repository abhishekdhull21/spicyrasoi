<!-- Sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand">
      <img src="dist/img/AdminLTELogo.png" alt="<?php echo $siteName; ?> logo" class="brand-image elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light"><b><?php echo $siteName; ?></b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link"><i class="fas fa-home"> Home </i></a>

        </li>
        <!-- <li class="nav-item">
          <a href="genbill1.php?table=1&group=<?php echo ($restaurant); ?>106&name=<?php echo ($restaurant); ?>1041" class="nav-link"><i class="fas fa-file-invoice"> Fast Bill</i></a>
        </li> -->
        <li class="nav-item">
          <a href="genbill.php?table=1&group=<?php echo ($restaurant); ?>101&name=<?php echo ($restaurant); ?>1011" class="nav-link"><i class="fas fa-receipt"> Create Bill</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?method=swiggy&table=1&group=<?php echo ($restaurant); ?>102&name=<?php echo ($restaurant); ?>1021" class="nav-link"><i class="fas fa-hamburger"> Swiggy</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?method=zomato&table=1&group=<?php echo ($restaurant); ?>103&name=<?php echo ($restaurant); ?>1031" class="nav-link"><i class="fas fa-hamburger"> Zomato</i></a>
        </li>
        <!-- <li class="nav-item">
          <a href="genbill.php?method=gst&table=1&group=<?php echo ($restaurant); ?>104&name=<?php echo ($restaurant); ?>1041" class="nav-link"><i class="fas fa-receipt"> GST Bill</i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="fas fa-truck-pickup"> Dilvery</i></a>
        </li> -->
        <li class="nav-item">
          <a href="process.php" class="nav-link">
            <i class="fas fa-sync"> Process </i>
            <span class="badge badge-warning navbar-badge">
              <?php
              // echo $admin_type;
              $sql = "SELECT COUNT(a.orderid) as total FROM orders a, `tables_session` b,`dashboard` c where a.orderid=b.orderid and c.id = b.table_cat and b.status =1 and a.restaurant = $restaurant";
              if ($res = mysqli_query($con, $sql))
                echo mysqli_num_rows($res) > 0 ? mysqli_fetch_assoc($res)['total'] : 0;
              ?>
            </span>
          </a>

        </li>
        <!-- <li class="nav-item">
          <a href="analytics.php" class="nav-link"><b><i class="fas fa-chart-pie"> Analytics</i></b></a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="setting.php" class="nav-link"><b><i class="fas fa-cog"> Settings</i></b></a>
          
        </li> -->
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"> <i class="fas fa-info-circle"> More </i></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="setting.php" class="dropdown-item"><b><i class="fas fa-cog"> Settings</i></b></a></li>
            <!-- <li><a href="#" class="dropdown-item">Media Guide Lines</a></li> -->

            <li class="dropdown-divider"></li>
            <li><a href="contact.php" class="dropdown-item"><i class="fas fa-hands-helping"> Contact Us</i></a></li>
          </ul>
        </li>
        <!-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>
            </ul>
          </li> -->
      </ul>

    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php
          $sql = "SELECT count(a.id) as total FROM `notifications` a WHERE a.id not in (SELECT b.notification_id from notification_show b where b.restaurant = $restaurant)";
          $res = mysqli_query($con, $sql);
          $total = mysqli_fetch_assoc($res)['total'];

          if ($total > 0) {
          ?>
            <span class="badge badge-warning navbar-badge" id="notification-badge"><?php echo $total; ?></span>
          <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> <?php echo $total; ?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="notifaction.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Title
            <!-- TODO To Show time (How old this notifaction) -->
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
          </a>
         
          
          <div class="dropdown-divider"></div>
          <a href="notifaction.php" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item">
        <div class="btn-group">
          <button type="button" class="btn btn-success">Profile</button>
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="profile.php">Edit</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="user/logout.php">Log Out</a>
          </div>
        </div>
      </li>


    </ul>
  </div>
</nav>