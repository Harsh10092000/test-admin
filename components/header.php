<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script>document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});</script>
</head>

<body>
<?php 
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
    <!-- End Search Bar -->
    <nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle" href="#">
        <i class="bi bi-search"></i>
      </a>
    </li>
    <li class="nav-item dropdown pe-3">
      <a class="nav-link nav-profile d-flex align-items-center bg-primary rounded text-white p-2" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block dropdown-toggle ps-2">Quality Solutions</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Quality Solutions</h6>
          <span>Admin</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="components/signout.php">
            <i class="bi bi-box-arrow-right"></i>Logout
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">

  </li>
  <!-- <li class="nav-heading">Add Product Forms</li> -->
  <li class="nav-item">
    <a class="nav-link <?= ($activePage == 'orders') ? '':'collapsed'; ?>" href="orders.php">
      <i class="bi bi-grid"></i>
      <span>Orders</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($activePage == 'contact') ? '':'collapsed'; ?>" href="contact.php">
      <i class="bi bi-card-list"></i>
      <span>Contact</span>
    </a>
  </li>
  <!-- <li class="nav-heading">Product List</li> -->
  <!-- <li class="nav-item">
    <a class="nav-link <?= ($activePage == 'productslist') ? '':'collapsed'; ?>" href="productslist.php">
      <i class="bi bi-card-list"></i>
      <span>Security Product List</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($activePage == 'furniturelist') ? '':'collapsed'; ?>" href="furniturelist.php">
      <i class="bi bi-card-list"></i>
      <span>Furniture Product List</span>
    </a>
  </li> -->

</ul>
</aside>