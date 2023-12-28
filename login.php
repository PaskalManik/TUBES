<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(isset($_SESSION["username"])){
    header("location:./user/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="./Login_v1/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="./Login_v1//vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1//fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1//vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="./Login_v1/css/main.css">
	<link rel="stylesheet" href="./css/foundation.css"/>
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

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="./Login_v1/images/img-01.png" alt="IMG">
			</div>

			<form method="POST" action="verify.php" class="login100-form validate-form">
				<span class="login100-form-title">
					Login
				</span>

				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="username" placeholder="Email" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="pwd" id="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="" aria-hidden="true"></i>
					</span>
					<div class="wrap-checkbox100">
						<input class="checkbox100" id="showPassword" type="checkbox" onclick="togglePasswordVisibility()">
						<label class="label-checkbox100" for="showPassword">
							Show Password
						</label>
					</div>
				</div>
				
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<div class="text-center p-t-12">
					<span class="txt1">
						Forgot
					</span>
					<a class="txt2" href="forgot.php">
						Username / Password?
					</a>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="register.php">
						Create your Account
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Your script links -->

<script>
	function togglePasswordVisibility() {
		var passwordField = document.getElementById("password");
		if (passwordField.type === "password") {
			passwordField.type = "text";
		} else {
			passwordField.type = "password";
		}
	}
</script>
</body>
</html>
