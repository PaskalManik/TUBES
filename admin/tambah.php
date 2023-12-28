<?php 
    include('../includes/config.php');
    if(empty($_SESSION['username']) || $_SESSION['type'] != 'admin')

    // Mengecek apakah tombol submit sudah di klik (form-nya disubmit)
    if(isset($_POST['submit']))
    {
        $product_code = $_POST['product_code']; 
        $product_name = $_POST['product_name']; 
        $product_desc = $_POST['product_desc'];
        $qty = $_POST['qty']; 
        $price = $_POST['price'];

        $nama_gambar = $_FILES['product_img_name']['name'];
        $tmp_files = $_FILES['product_img_name']['tmp_name']; //penyimpanan sementara
        $dir = '../images/products/';
        $file_location = $dir.$nama_gambar; //gabung
        move_uploaded_file($tmp_files,$file_location);// masukin gambar ke penyimpanan produk

        $query = "INSERT INTO products values('','$product_code','$product_name','$product_desc','$nama_gambar','$qty','$price')";
        $sql = mysqli_query($mysqli,$query);
        if($sql){
            echo"<script>
            alert('Data berhasil ditambahkan');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/foundation.css" />
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
      <li class="has-dropdown">
        <a href="#">More</a>
        <ul class="dropdown">
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Team</a></li>
        </ul>
      </li>
    </ul>

    <ul class="right">
      <?php
      // if(isset($_SESSION['username'])){
      //   echo '<li><span>' . $_SESSION['fname'] . '</span></li>';
      //   echo '<li><a href="account.php"><img src="../images/profile.png" alt="Profile" style="width: 25px; height: 25px; border-radius: 50%;"></a></li>';
      //   echo '<li><button onclick="confirmLogout()">Log Out</button></li>';
      // }
      // else{
      //   echo '<li><a href="login.php">Log In</a></li>';
      //   echo '<li><a href="register.php">Register</a></li>';
      // }
      ?>
    </ul>
  </section>
</nav>
    <div class="container">
        <h3>Tambahkan Produk</h3>
        <br>
        <a href="index.php"> Kembali ke Daftar Produk</a>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nim" class="form-label">Kode Product</label>
            <input type="text" name="product_code" id="nim" class="form-control">
            <label for="nama" class="form-label">Nama Product </label>
            <input type="text" name="product_name" id="nama" class="form-control">
            <label for="email" class="form-label">Deskripsi Produk</label>
            <input type="text" name="product_desc" id="email" class="form-control">

            <label for="prodi" class="form-label">Gambar Produk</label>
            <input type="file" name="product_img_name" id="prodi" class="form-control">

            <label for="prodi" class="form-label">Jumlah</label>
            <input type="text" name="qty" id="prodi" class="form-control">
            <label for="prodi" class="form-label">Harga</label>
            <input type="text" name="price" id="prodi" class="form-control">
            <br>
            <button type="submit" name="submit" class ="btn btn-success">Submit</button>
        </form>
    </div>
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