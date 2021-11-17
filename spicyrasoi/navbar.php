<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand">
      <img src="dist/img/AdminLTELogo.png" alt="Spicy Rasoi" class="brand-image elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light"><b>Spicy Rasoi</b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link"><i class="fas fa-home"> Home</i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="fas fa-file-invoice"> Event's</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?table=1&group=<?php echo ($restaurant); ?>101&name=<?php echo ($restaurant);?>1011" class="nav-link"><i class="fas fa-receipt"> New Bill</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?method=swiggy&table=1&group=<?php echo ($restaurant); ?>102&name=<?php echo ($restaurant);?>1021" class="nav-link"><i class="fas fa-hamburger"> Swiggy</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?method=zomato&table=1&group=<?php echo ($restaurant); ?>103&name=<?php echo ($restaurant);?>1031" class="nav-link"><i class="fas fa-hamburger"> Zamato</i></a>
        </li>
        <li class="nav-item">
          <a href="genbill.php?method=gst&table=1&group=<?php echo ($restaurant); ?>104&name=<?php echo ($restaurant);?>1041" class="nav-link"><i class="fas fa-receipt"> GST Bill</i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="fas fa-truck-pickup"> Dilvery</i></a>
        </li>
        <li class="nav-item">
          <a href="process.php" class="nav-link"><i class="fas fa-sync"> Process</i></a>
        </li>
        <li class="nav-item">
          <a href="setting.php" class="nav-link"><b><i class="fas fa-cog"> Settings</i></b></a>
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
      <li class="nav-item">
        <div class="btn-group">
          <button type="button" class="btn btn-success">Profile</button>
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="profile.php">Edit</a>
            <!-- <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="user/logout.php">Log Out</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </div>
</nav>