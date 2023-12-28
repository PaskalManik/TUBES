<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include '../includes/config.php';
if(empty($_SESSION['username']) || $_SESSION['type'] != 'admin')
{
  header("Location: denied.php");
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BOLT Shop</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <style>
  ul.right li:first-child span {
      display: block;
      color: white; 
      text-align: center;
      margin-top: 10px; 
    }
  </style>
  <body>

  <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="lp.php">BOLT Shop</a></h1>
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
          <li><a href="pesanan.php">Order</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Team</a></li>
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
        echo '<li><a href="../login.php">Log In</a></li>';
        echo '<li><a href="../register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>


    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Hey Admin!</h3>
        <?php
          $result = $mysqli->query("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="../images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<div class="small-4 columns" style="padding-top: 0.5rem; padding-left:0">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '<p><strong>New Qty</strong>:</p>';
              echo '</div>';
              echo '<div class="small-8 columns" style="padding-top: 0.3rem; padding-left:0">';
              echo '<input type="number" name="quantity[]"/>';
              echo '</div>';
              echo '</div>';
            }
          }
        ?>

      </div>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="button" value="Update"></p></center>
        </form>
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; BOLT Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script>
    function confirmLogout() {
        var logout = confirm("Are you sure you want to log out?");
        if (logout) {
            window.location.href = "../logout.php"; // Redirect ke logout.php jika user menekan OK
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
