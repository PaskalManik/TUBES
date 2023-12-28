<?php
// Pastikan session telah dimulai sebelumnya
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(empty($_SESSION['username']) || $_SESSION['type'] != 'admin')
{
  header("Location: denied.php");
}

require_once '../includes/config.php';

// Validasi form sebelum menyimpan ke database
if (isset($_POST['send'])) {
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
    $message = mysqli_real_escape_string($mysqli, $_POST['message']);

    $sql = "INSERT INTO contact (nama, email, subject, message) VALUES ('$nama', '$email', '$subject', '$message')";
    $query = mysqli_query($mysqli, $sql);

    if ($query) {
        echo "<p class='alert alert-info text-center'><b>Message has been sent!</b></p>";
    } else {
        echo "<p class='alert alert-danger text-center'><b>Failed to send message.</b></p>";
    }
}

// Mengambil data dari basis data untuk ditampilkan dalam tabel
$sqlSelect = "SELECT * FROM contact";
$querySelect = mysqli_query($mysqli, $sqlSelect);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || BOLT Shop</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <style>
  ul.right li:first-child span {
      display: block;
      color: white; /* Mengatur warna teks menjadi putih */
      text-align: center;
      margin-top: 10px; /* Jarak antara gambar profil dan teks */
    }
  </style>
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
      <li><a href="index.php">Products</a></li>
      <li><a href="tambah.php">Add Products</a></li>
      <li><a href="hapus1.php">Delete Products</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="pesanan.php">Order</a></li>
    </ul>

    <ul class="right">
      <?php
      if(isset($_SESSION['username'])){
        echo '<li><span>' . $_SESSION['fname'] . '</span></li>';
        echo '<li><a href="account.php"><img src="../images/profile.png" alt="Profile" style="width: 25px; height: 25px; border-radius: 50%;"></a></li>';
        echo '<li><button onclick="confirmLogout()">Log Out</button></li>';
      }
      else{
        echo '<li><a href="../login.php">Log In</a></li>';
        echo '<li><a href="../register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>

<!-- Tampilan tabel untuk menampilkan data dari database -->
<div class="container">
    <div class="telg">
        <center><h1 style="font-size: 90px; color: #89CBEB"> &#128203; Contact List &#128203; </h1>  </center>
      </div>
<table class="table-bordered" align="center">
    <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Email</th>
        <th style="text-align: center;">Subject</th>
        <th style="text-align: center;">Message</th>
        <th style="text-align: center;">Finish</th>
    </tr>

    <?php
    $i = 1;
    while ($data = mysqli_fetch_assoc($querySelect)) :
    ?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?= $i ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $data['nama'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $data['email'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $data['subject'] ?></td>
            <td style="text-align: center; vertical-align: middle;"><?= $data['message'] ?></td>

            <td style="text-align: center; vertical-align: middle;">
            <?php
            if ($data['status'] != 'Finished') {
                ?>
                <form method='POST'>
                    <input type='hidden' name='id' value=<?= $data['id'] ?>>
                    <button type='submit' class='btn btn-info' name='btnProcess'>Finish</button>
                </form>
                <?php
            } else {
                echo "<span style='color: green;'>Finished</span>";
            }
            ?>
        </td>
    </tr>
    <?php
    $i++;
endwhile;

// ...

// Proses perbaruan status saat tombol "Finish" ditekan
if (isset($_POST['btnProcess'])) {
    $id = $_POST['id'];
    $done = "Finished";

    // Perbarui status menjadi "Finished" di database
    $sqlUpdate = "UPDATE contact SET status = '$done' WHERE id = $id";
    $queryUpdate = mysqli_query($mysqli, $sqlUpdate);

    if ($queryUpdate) {
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=contact.php\">";
        echo "<p class='alert alert-info text-center'><b>Report finished successfully.</b></p>";
        exit; // Pastikan tidak ada output lain yang mengganggu redirect
    } else {
        echo "<p class='alert alert-danger text-center'><b>Failed to update status.</b></p>";
    }
}

    $mysqli->close();
    ?>
</table>

  </div>
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-4 font-weight-bold">BOLT</h5>
        <p>Gedung C Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155</p>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-4 font-weight-bold text-uppercase">Our Website</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Team</a></li>
          <li><a href="#" class="text-white">About</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5 class="mb-4 font-weight-bold text-uppercase">Contact Us</h5>
        <ul class="list-unstyled">
          <li><img src="../images/Gmail.png" alt="Gmail" style="width: 20px;"><a href="#" class="text-white"> Bolt@gmail.com</a></li>
          <li><img src="../images/Whatsapp.png" alt="WhatsApp" style="width: 20px;"><a href="#" class="text-white"> 081234567890</a></li>
          <li><img src="../images/Facebook.png" alt="Facebook" style="width: 20px;"><a href="#" class="text-white"> Bolt</a></li>
          <li><img src="../images/Instagram.png" alt="Instagram" style="width: 20px;"><a href="#" class="text-white"> @Bolt</a></li>
          <li><img src="../images/Twitter.png" alt="Twitter" style="width: 20px;"><a href="#" class="text-white"> @Bolt</a></li>
        </ul>
      </div>
    </div>
    <hr class="my-4 bg-light">
    <div class="text-center text-md-start">
      <p class="mb-0">&copy; <strong>BOLT Sport Shop</strong>. All Rights Reserved</p>
    </div>
  </div>
</footer>
<script>
    function confirmLogout() {
        var logout = confirm("Are you sure you want to log out?");
        if (logout) {
            window.location.href = "../logout.php"; // Redirect ke logout.php jika user menekan OK
        }
    }
</script>
</body>
</html>