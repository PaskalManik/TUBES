<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include '../includes/config.php';
if(empty($_SESSION['username']) || $_SESSION['type'] != 'user')
{
  header("Location: denied.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAM || Bolt Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="../CSS_files/team.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #343a40;
        }

        .wrapper {
            background-color: #fff;
            width: 1250px;
            border-radius: 16px;
            padding: 20px; /* Padding diperbesar untuk konten dalam wrapper */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Efek bayangan pada wrapper */
            margin: 20px auto; /* Margin diperbesar agar tengah secara horizontal */
        }

        h2 {
            text-align: center;
            font-weight: bold;
            font-size: 50px;
        }

        hr {
            width: 200px;
            margin: 10px auto;
        }

        .members {
            display: flex;
            justify-content: center; /* Mengatur posisi horizontal ke tengah */
            gap: 20px; /* Jarak antara team member diperbesar */
        }

        .team-mem {
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            text-align: center; /* Mengatur teks ke tengah */
        }

        .team-mem:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        img {
            width: 150px;
            height: 150px;
            border-radius: 100px;
            border-width: 2px;
            margin-bottom: 15px; /* Mengatur jarak bawah antara gambar dan teks */
        }

        h4 {
            font-size: 25px;
            margin-bottom: 10px; /* Jarak bawah antara judul dan paragraf */
            font-weight: bold;
        }

        p {
            font-size: 15px;
            margin-bottom: 20px; /* Jarak bawah antara paragraf */
        }
    </style>
</head>

<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">BOLT Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">View Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">My Orders</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="about.php">About</a></li>
                            <li><a class="dropdown-item" href="contact.php">Contact</a></li>
                            <li><a class="dropdown-item" href="team.php">Team</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php
                    if(isset($_SESSION['username'])){
                        echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
                    }
                    else{
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="wrapper">
        <h2>Our Team</h2>
        <hr>
        <div class="members">
            <div class="team-mem">
                <img src="../images/gladies.jpg">
                <h4>Gladies Margaret</h4>
                <p>231402034</p>
            </div>
            <div class="team-mem">
                <img src="../images/kiel3.jpg">
                <h4>Yehezkiel Situmorang</h4>
                <p>231402061</p>
            </div>
            <div class="team-mem">
                <img src="../images/jan3.png">
                <h4>Jan Kepri Purba</h4>
                <p>231402086</p>
            </div>
            <div class="team-mem">
                <img src="../images/evan.jpg">
                <h4>Evan Arga Ignatius. H</h4>
                <p>2314020118</p>
            </div>
            <div class="team-mem">
                <img src="../images/paskal.jpg">
                <h4>Paskal Irvaldi M.</h4>
                <p>231402128</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmLogout() {
        var logout = confirm("Are you sure you want to log out?");
        if (logout) {
            window.location.href = "logout.php"; // Redirect ke logout.php jika user menekan OK
        }
    }
</script>
</body>

</html>
