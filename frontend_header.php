<?php 
  include("db_connect.php");


  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
  $components = explode('/', $path);
  $route = $components[3];

  $sub_components = explode('=', $directoryURI);

  if (isset($sub_components[1])) 
  {
    $sub_route = $sub_components[1];
  }
  else
  {
    $sub_route = '';
  }
  

  $category_sql="SELECT * from categories ORDER BY name ASC LIMIT 12";
  $category_stmt=$pdo->prepare($category_sql);
  $category_stmt->execute();
  $categories= $category_stmt->fetchAll();

  // session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Zay Bann </title>

  <!-- Favicon -->
  <link rel="icon" href="image/logo.png">

  <!-- Fontawesome for this template-->
  <link href="fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="frontend/css/modern-business.css" rel="stylesheet">

  <style type="text/css">

    .dropdown-item.active, .dropdown-item:active, .list-group-item.active
    {
      background-color: #673AB7;
      border-color: #673AB7;
    }
    
    .primary,
    {
      color: #673AB7;
    }

    .secondary
    {
      color: #7C4DFF;
    }

    a:hover

    {
      text-decoration: none;
    }

    .badge-notify
    {
      background: white;
      position: relative;
      top: -15px;
      left: -10px;
      border-radius: 73rem;
    }

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark  fixed-top" style="background-color: #673AB7">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="image/logo.png" height="50" width="50">
        Zay Bann
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item px-3 <?php if ($route=="" || $route=='index') {echo "active"; } else  {echo "";}?>">
            <a class="nav-link" href="index">Home </a>
          </li>

          <li class="nav-item dropdown px-3 <?php if ($route=="category") {echo "active"; } else  {echo "";}?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Category
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              
              <?php
                foreach ($categories as $category):
                  $id = $category['id'];
                  $name = $category['name'];
              ?>
              <a class="dropdown-item <?php if ($sub_route==$id) {echo "active"; } else  {echo "";}?>" href="category?id=<?= $id ?>">
                <?= $name; ?>
              </a>

              <?php endforeach; ?>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="categories"> View More </a>

            </div>
          </li>

          <li class="nav-item px-3">
            <a class="nav-link" href=""> Promotion</a>
          </li>
          
          <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item <?php if ($sub_route=='help_center') {echo "active"; } else  {echo "";}?>" href=""> 
                <i class="fas fa-question pr-3"></i>Help Center 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='order') {echo "active"; } else  {echo "";}?>" href=""> 
                <i class="fas fa-box pr-3"></i>
                Order 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='shipping') {echo "active"; } else  {echo "";}?>" href=""> 
                <i class="fas fa-shipping-fast pr-3"></i>Shipping & Delivery 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='payment') {echo "active"; } else  {echo "";}?>" href=""> 
                <i class="fab fa-cc-visa pr-3"></i>
                Payment 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='refund') {echo "active"; } else  {echo "";}?>" href="">
                <i class="fas fa-exchange-alt pr-3"></i> 
                Returns & Refunds 
              </a>

            </div>
          </li>

          <li class="nav-item px-3 <?php if ($route=='contact') {echo "active"; } else  {echo "";}?>">
            <a class="nav-link" href="">Contact</a>
          </li>

          <li class="nav-item px-3 <?php if ($route=='mycart') {echo "active"; } else  {echo "";}?>">
            <a class="nav-link" href=""> 
              <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-pill badge-light badge-notify"> 3</span>
              My Cart 
            </a>
          </li>

          <?php if(isset($_SESSION['loginuser'])): ?>
          
          <li class="nav-item dropdown <?php if ($route=="account") {echo "active"; } else  {echo "";}?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account 
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item py-2 <?php if ($sub_route=='profile') {echo "active"; } else  {echo "";}?>" href="">
                <i class="far fa-laugh-beam pr-3"></i>
                Manage My Account
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='order') {echo "active"; } else  {echo "";}?>" href="">
                <i class="fas fa-box pr-3"></i>
                My Orders
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='cancel') {echo "active"; } else  {echo "";}?>" href="">
                <i class="far fa-times-circle pr-3"></i>
                My Cancellations
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item <?php if ($sub_route=='changepassword') {echo "active"; } else  {echo "";}?>" href="">
                <i class="fas fa-key pr-3"></i>
                Change Password
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href=""> 
                <i class="fas fa-sign-out-alt pr-3"></i>
                Logout 
              </a>
            </div>
          </li>

          <?php else: ?>

          <li class="nav-item px-3 <?php if ($route=="login") {echo "active"; } else  {echo "";}?>">
            <a class="nav-link" href="">Login </a>
          </li>

          <li class="nav-item px-3 <?php if ($route=="register") {echo "active"; } else  {echo "";}?>">
            <a class="nav-link" href="register">Sign Up</a>
          </li>

          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
  
  <?php if($route == '' || $route == 'index'): ?>
  <header class="py-5 mb-5 bg-light">
    <div class="container" style="height: 100%;">
      <div class="row align-items-center" style="height: 100%">
        <div class="col-lg-7 col-md-12 col-sm-12">
          <h1 class="disply-4 mt-5 mb-2"> Welcome to <span class="primary"> zaybann.com </span> </h1>
          <p class="lead mb-5 text-secondary-50">
            We ship over 45 million products in Myanmar
          </p>
        </div>
        
        <div class="col-lg-5">
          <img src="image/header_banner.png" class="img-fluid">
        </div>

      </div>
    </div>
  </header>
  <?php endif ?>
