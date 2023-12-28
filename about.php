<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About || BOLT Shop</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: "Arial", sans-serif;
}
.hero{
    background-color: #f8f8f8;
    overflow: hidden;
}
.heading h1{
    color: #ff6347;
    font-size: 55px;
    text-align: center;
    margin-top: 35px;
}
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90%;
    margin: 65px auto;
}
.hero-content{
    flex: 1;
    width: 600px;
    margin: 0px 25px;
    animation: fadeInUp 2s ease;
}
.hero-content h2{
    font-size: 38px;
    margin-bottom: 20px;
    columns: #333;
}
.hero-content p{
    font-size: 24px;
    line-height: 1.5;
    margin-bottom: 40px;
    color: #666;
}
.hero-image{
    flex: 1;
    width: 600px;
    margin: auto;
    animation: fadeInRight 2s ease;
}
img{
    width: 100%;
    height: auto;
    height: auto;
    border-radius: 10px;
}
@media screen and (max-width: 768px){
    .heading h1{
        font-size: 45px;
        margin-top: 30px;
    }
    .hero{
        margin: 0px;
    }
    .container{
        width: 100%;
        flex-direction: column;
        margin: 0px;
        padding: 0px 40px;
    }
    .hero-content{
        width: 100%;
        margin: 35px 0px;
    }
    .hero-content h2{
        font-size: 30px;
    }
    .hero-content h1{
        font-size: 30px;
    }
    .hero-content p{
        font-size: 18px;
        margin-bottom: 20px;
    }
    .hero-image{
        width: 100%;
    }
}
@keyframes fadeInUp {
    0%{
        opacity: 0;
        transform: translateY(50px);
    }
    100%{
        opacity: 1;
        transform: translateY(0px);
    }
}
@keyframes fadeInRight {
    0%{
        opacity: 0;
        transform: translateX(-50px);
    }
    100%{
        opacity: 1;
        transform: translateX(0px);
    }
}
    </style>
    <script src="js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <li><a href="./team.php">Team</a></li>
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

      <section class="hero">
        <div class="heading">
          <h1>ABOUT US</h1>
        </div>
        <div class="container">
          <div class="hero-content">
            <h2>Welcome to Bolt Shop </h2>
            <p>The ultimate destination for sports enthusiasts seeking high-quality gear and modern style. Bolt Sport Shop is not just a store; it's a complete shopping experience dedicated to meeting your sports needs with the best product selection. We offer a comprehensive collection of sports equipment, ranging from running shoes, swimwear, fitness gear, to outdoor equipment.</p>
          </div>
          <div class="hero-image">
            <img src="./images/img1.jpg" >
          </div>
        </div>
      </section>

  
       
    <!--footer-->
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