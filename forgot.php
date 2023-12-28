<?php
require_once ("./includes/config.php");
session_start();

// Fungsi untuk memeriksa apakah hewan favorit dan warna favorit cocok
function cekInformasi($user, $email, $hewanfavorit, $warnafavorit, $mysqli) {
  $sql = "SELECT * FROM users WHERE fname = '{$user}' AND email = '{$email}' AND hewanfavorit = '{$hewanfavorit}' AND warnafavorit = '{$warnafavorit}'";
  $query = mysqli_query($mysqli, $sql);

  if ($query && mysqli_num_rows($query) > 0) {
    return true;
  } else {
    return false;
  }
}

if(isset($_POST['btnCari'])) {
  $user_forgot = $_POST['fname'];
  $email_forgot = $_POST['email'];

  $sql = "SELECT * FROM users WHERE fname = '{$user_forgot}'";
  $query = mysqli_query($mysqli, $sql);

  if(!$query) {
    die("Query gagal" . mysqli_error($mysqli));
  }

  while ($row = mysqli_fetch_array($query)) {
    $user = $row['fname'];
    $pass = $row['password'];
    $email = $row['email'];
  }

  if($user == $user_forgot && $email == $email_forgot) {
    // Jika data sesuai, simpan data ke sesi
    $_SESSION['fname'] = $user;
    $_SESSION['email'] = $email; 
    $_SESSION['password'] = $pass;

    // Ambil informasi hewan dan warna favorit dari form
    $hewanfavorit = $_POST['hewanfavorit'];
    $warnafavorit = $_POST['warnafavorit'];

    // Memeriksa apakah informasi sesuai menggunakan fungsi cekInformasi
    if (cekInformasi($user, $email, $hewanfavorit, $warnafavorit, $mysqli)) {
      header("Location: prosesforgot.php");
    } else {
      echo '<script>alert("Hewan favorit atau warna favorit tidak sesuai.\nKata sandi tidak dapat diubah.");</script>';
  }
} else {
  echo '<script>alert("User tidak ditemukan");</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password | Bolt </title>
  <link rel="stylesheet" href="./CSS_files/bootstrap.min.css">
  <link href="asset/img/logo.png" rel="icon" style="width: 100px;">
  <link href="asset/img/logo.png" rel="apple-touch-icon" style="width: 57;">
  
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
  
                  <p class="text-center h1 fw-bold mb-4 underline">Lupa Password</p>
                  <div class="content">
                    <div class="page-inner">
           
                    <!-- <div class="row">
                    <div class="column responsive"> -->
                    <div class="card mt-2">
                        <div class="card-header text-center" style="color:black">
                            <b>Verifikasi Data Diri Anda</b>
                        </div>
                        <form class="mx-1 mx-md-4" method="POST"> 
  <!-- Input First Name -->
  <div class="card-body d-flex align-items-center mb-3 mt-3">
    <i class="fas fa-lock fa-lg fa-fw mt-auto mb-3"></i>
    <div class="form-outline flex-fill mt-4">
      <input 
        type="text" 
        id="fname" 
        class="form-control"
        name="fname"
        placeholder="Masukkan First Name Anda"
        required />
    </div>
  </div>

  <!-- Input Email -->
  <div class="card-body d-flex align-items-center mb-3 mt-3">
    <i class="fas fa-lock fa-lg fa-fw mt-auto mb-3"></i>
    <div class="form-outline flex-fill mt-4">
      <input 
        type="email" 
        id="email" 
        class="form-control"
        name="email"
        placeholder="Masukkan email Anda"
        required />
    </div>
  </div>

  <!-- Input Hewan Favorit -->
  <div class="card-body d-flex align-items-center mb-3 mt-3">
    <i class="fas fa-lock fa-lg fa-fw mt-auto mb-3"></i>
    <div class="form-outline flex-fill mt-4">
      <input 
        type="text" 
        id="hewanfavorit" 
        class="form-control"
        name="hewanfavorit"
        placeholder="Hewan Favorit Anda"
        required />
    </div>
  </div>

  <!-- Input Warna Favorit -->
  <div class="card-body d-flex align-items-center mb-3 mt-3">
    <i class="fas fa-lock fa-lg fa-fw mt-auto mb-3"></i>
    <div class="form-outline flex-fill mt-4">
      <input 
        type="text" 
        id="warnafavorit" 
        class="form-control"
        name="warnafavorit"
        placeholder="Warna Favorit Anda"
        required />
    </div>
  </div>
                        <div class="justify-content-center mb-4">
                            <div class="card-body d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn" name="btnCari">Cari</button>
                            </div>
                        </div>

                        </form>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>