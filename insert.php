<?php

include './includes/config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];
$pwd = password_hash($pass, PASSWORD_DEFAULT);
$type= $_POST['type'];
$hewanfavorit = $_POST['hewanfavorit'];
$warnafavorit = $_POST['warnafavorit'];

$sql = "INSERT INTO users (fname, lname, address, city, pin, email, password, type, hewanfavorit , warnafavorit) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd' , '$type' ,'$hewanfavorit','$warnafavorit')";
$cekEmail = mysqli_query($mysqli, "SELECT email FROM users WHERE email='$email'");
$cekUsername = mysqli_query($mysqli, "SELECT fname FROM users WHERE fname='$fname'");

  if ($pass !== $pass2 ) {
	  echo "<script>
			  alert('Konfirmasi password tidak sesuai!');
		  </script>";
		  return false;
  }
  
  if(mysqli_num_rows($cekEmail) > 0){
	  echo"
		  <script>
			  alert('Email Sudah Ada!');
			  document.location.href = 'register.php';
		  </script>
	  ";
  }else if(mysqli_num_rows($cekUsername) > 0){
	  echo"
		  <script>
			  alert('Nama Sudah Ada!');
			  document.location.href = 'register.php';
		  </script>
	  ";
  }else{
	  mysqli_query($mysqli, $sql);
	  echo"
	  <script>
		  alert('Registrasi Berhasil');
		  document.location.href = 'login.php';
	  </script>";
  }
$mysqli->close();   
?>