<!-- index.php -->
<?php
// Jangan lupa untuk memulai sesi
session_start();

// Sertakan file konfigurasi
include '../includes/config.php';
if(empty($_SESSION['username']) || $_SESSION['type'] != 'user')
{
  header("Location: denied.php");
}

// Fungsi pencarian
function searchProducts($query, $mysqli, $currency)
{
    // Query ke database (misalnya, tabel 'products' memiliki kolom 'product_name' untuk pencarian)
    $result = $mysqli->query("SELECT * FROM products WHERE product_name LIKE '%$query%'");

    if ($result === FALSE) {
        die(mysql_error());
    }

    // Tampilkan hasil pencarian
    while ($row = $result->fetch_assoc()) {
        echo '<div class="large-4 columns">';
        echo '<p><h3>' . $row['product_name'] . '</h3></p>';
        echo '<img src="../images/products/' . $row['product_img_name'] . '"/>';
        echo '<p><strong>Product Code</strong>: ' . $row['product_code'] . '</p>';
        echo '<p><strong>Description</strong>: ' . $row['product_desc'] . '</p>';
        echo '<p><strong>Units Available</strong>: ' . $row['qty'] . '</p>';
        echo '<p><strong>Price (Per Unit)</strong>: ' . $currency . $row['price'] . '</p>';

        if ($row['qty'] > 0) {
            echo '<p><a href="update-cart.php?action=add&id=' . $row['id'] . '"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
        } else {
            echo 'Out Of Stock!';
        }

        echo '</div>';
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BOLT Sports Shop</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <style>
        form {
            margin-top: 10px;
            text-align: center;
            display: flex;
            width: 400px;
        }
        nav {
            z-index: 2;
        }
         .search-container {
            position: sticky;
            top: 0;
            background-color: #f1f1f1;
            padding: 10px;
            z-index: 1;
        }

        /* Gaya untuk kotak pencarian */
        form input[type="text"] {
            flex: 1;
            padding-right: 5px;
            height: 35px;
        }

        /* Gaya untuk tombol cari */
        form button {
            background: #0078A0;
            border: none;
            color: #fff;
            font-size: 1,5em;
            padding: 8px;
            height: 35px;
        }
    /* Gaya untuk teks nama di bawah gambar profil */
    ul.right li:first-child span {
      display: block;
      color: white; /* Mengatur warna teks menjadi putih */
      text-align: center;
      margin-top: 10px; /* Jarak antara gambar profil dan teks */
    }
    </style>
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


    <center>
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="query" placeholder="Cari produk...">
            <button type="submit">Cari</button>
        </form>
    </div>
    </center>

    <!-- Tampilkan Hasil Pencarian Jika Ada -->
    <div class="row" style="margin-top:10px;">
        <div class="small-12">

            <?php
            if (isset($_GET['query'])) {
                $search_query = $_GET['query'];
                searchProducts($search_query, $mysqli, $currency);
            } else {
                $result = $mysqli->query('SELECT * FROM products');
                if ($result === FALSE) {
                    die(mysql_error());
                }

                while ($obj = $result->fetch_object()) {
                    echo '<div class="large-4 columns">';
                    echo '<p><h3>' . $obj->product_name . '</h3></p>';
                    echo '<img src="../images/products/' . $obj->product_img_name . '"/>';
                    echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
                    echo '<p><strong>Description</strong>: ' . $obj->product_desc . '</p>';
                    echo '<p><strong>Units Available</strong>: ' . $obj->qty . '</p>';
                    echo '<p><strong>Price (Per Unit)</strong>: ' . $currency . $obj->price . '</p>';

                    if ($obj->qty > 0) {
                        echo '<p><a href="update-cart.php?action=add&id=' . $obj->id . '"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
                    } else {
                        echo 'Out Of Stock!';
                    }

                    echo '</div>';
                }
            }
            ?>

        </div>
    </div>

    <!-- ... (bagian footer HTML) ... -->
    <script>
    function confirmLogout() {
        var logout = confirm("Are you sure you want to log out?");
        if (logout) {
            window.location.href = "logout.php"; // Redirect ke logout.php jika user menekan OK
        }
    }
</script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>