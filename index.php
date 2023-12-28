<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BOLT Shop</title>
  <link rel="stylesheet" href="./css/foundation.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/index.css">
  <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">BOLT Shop</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="left">
      <li><a href="products.php">Products</a></li>
      <li><a href="cart.php">View Cart</a></li>
      <li><a href="orders.php">My Orders</a></li>
      <li class="has-dropdown">
        <a href="#">More</a>
        <ul class="dropdown">
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="team.php">Team</a></li>
        </ul>
      </li>
    </ul>

    <ul class="right">
      <?php
      if(isset($_SESSION['username'])){
        echo '<li><span>' . $_SESSION['fname'] . '</span></li>';
        echo '<li><a href="account.php"><img src="../images/profile.png" alt="Profile" style="width: 25px; height: 25px; border-radius: 50%;"></a></li>';
        echo '<li><button onclick="confirmLogout()">Log Out</button></li>'; 
      }
      else{
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>
<!-- End Navbar -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <!-- Add more indicators for additional slides -->
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/lari (1).jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/bolt-landscape.jpg" class="d-block w-100" alt="...">
    </div>
    <!-- Add more carousel items here -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <h2 style="text-align: center; margin-top: 20px;">Halo,Welcome To Bolt Shop </h2>
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="./images/products/sports_shoes.jpg" class="card-img-top" alt="Product 1">
        <div class="card-body">
          <h5 class="card-title">Sport Shoes</h5>
          <p class="card-text">With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.</p>
          <a href="products.php" class="btn btn-primary">Buy</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="./images/products/cap.jpg" class="card-img-top" alt="Product 2">
        <div class="card-body">
          <h5 class="card-title">Cap</h5>
          <p class="card-text">A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.</p>
          <a href="products.php" class="btn btn-primary">Buy</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="./images/products/sports_band.jpg" class="card-img-top" alt="Product 3">
        <div class="card-body">
          <h5 class="card-title">Sport Band</h5>
          <p class="card-text">The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands</p>
          <a href="products.php" class="btn btn-primary">Buy</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="text-center mt-4">
    <a href="products.php" class="btn btn-primary" style="margin-bottom: 20px;">See More</a>
  </div>

<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-4 font-weight-bold">BOLT</h5>
        <p>Gedung C Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155</p>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-4 font-weight-bold text-uppercase">Website Kami</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Team</a></li>
          <li><a href="#" class="text-white">Tentang</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5 class="mb-4 font-weight-bold text-uppercase">Hubungi Kami</h5>
        <ul class="list-unstyled">
          <li><img src="images/Gmail.png" alt="Gmail" style="width: 20px;"><a href="#" class="text-white"> BOLT@gmail.com</a></li>
          <li><img src="images/Whatsapp.png" alt="WhatsApp" style="width: 20px;"><a href="#" class="text-white"> 081234567890</a></li>
          <li><img src="images/Facebook.png" alt="Facebook" style="width: 20px;"><a href="#" class="text-white"> BOLT</a></li>
          <li><img src="images/Instagram.png" alt="Instagram" style="width: 20px;"><a href="#" class="text-white"> @BOLT</a></li>
          <li><img src="images/Twitter.png" alt="Twitter" style="width: 20px;"><a href="#" class="text-white"> @BOLT</a></li>
        </ul>
      </div>
    </div>
    <hr class="my-4 bg-light">
    <div class="text-center text-md-start">
      <p class="mb-0">&copy; <strong>BOLT Sport Shop</strong>. All Rights Reserved</p>
    </div>
  </div>
</footer>
<!-- CDN Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
      <script>
      $(document).foundation();
    </script>
  </body>
</html>
