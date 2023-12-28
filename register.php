<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || BOLT Shop</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="./colorlib-regform-17/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="./colorlib-regform-17/css/style.css">
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
        echo '<li><a href="account.php">My Account</a></li>';
        echo '<li><a href="logout.php">Log Out</a></li>';
      }
      else{
        echo '<li><a href="login.php">Log In</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>


<div class="wrapper" style="background-image: url('./colorlib-regform-17/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="colorlib-regform-17/images/registration-form-1.jpg" alt="">
				</div>
				<form action="insert.php" method="POST" name="registrationForm" onsubmit="return validateForm()">>
					<h3>Registration Form</h3>
          Nama :
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="fname"required>
						<input type="text" placeholder="Last Name" class="form-control" name="lname"required> 
					</div>
					<div class="form-wrapper"> Pin Code :
						<input type="text" placeholder="20119" class="form-control" name="pin"required>
					</div>
					<div class="form-wrapper">Email :
						<input type="email" placeholder="abc@gmail.com" class="form-control" name="email" maxlength="@" required>
					</div>
					<div class="form-wrapper">Address
						<input type="text" placeholder="Address" class="form-control" name="address" required>
					</div>
					<div class="form-wrapper">City
						<input type="text" placeholder="City" class="form-control" name="city" required>
					</div>
          <div class="form-wrapper">Password :
            <input type="password" placeholder="Password" class="form-control" name="pwd" required maxlength="8">
          </div>
          <div class="form-wrapper">
            <input type="hidden" id="hewanFavoritInput" name="hewanfavorit" value="">
            <input type="hidden" id="warnaFavoritInput" name="warnafavorit" value="">
          </div>
					<div class="form-wrapper">Peran :
						<select name="type" id="type" class="form-control" required>
              <option value="" hidden>---Pilih Peran---</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
						<i class="zmdi zmdi-dropdown" style="font-size: 17px"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; BOLT Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script>
function validateForm() {
  var email = document.forms["registrationForm"]["email"].value;
  var password = document.forms["registrationForm"]["pwd"].value;

  if (!email.includes("@")) {
    alert("Email harus berisi tanda @");
    return false;
  }

  if (password.length !== 8) {
    alert("Password harus terdiri dari 8 karakter");
    return false;
  }

  // Tambahkan prompt di sini dan kirimkan data
  var hewanFavorit = prompt("Hewan favorit Anda?");
  var warnaFavorit = prompt("Warna favorit Anda?");

  if (!hewanFavorit || !warnaFavorit || hewanFavorit.trim() === '' || warnaFavorit.trim() === '') {
    alert("Registrasi gagal karena informasi hewan favorit atau warna favorit tidak diisi.");
    return false;
  }

  hewanFavorit = hewanFavorit.toLowerCase();
  warnaFavorit = warnaFavorit.toLowerCase();


  document.getElementById("hewanFavoritInput").value = hewanFavorit;
  document.getElementById("warnaFavoritInput").value = warnaFavorit;



  return true;
}
</script>

<!-- Bagian JavaScript lainnya -->
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
  </body>
</html>
