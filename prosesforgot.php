<?php
session_start();
require_once ("./includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password | Bolt Shop</title>
  <link rel="stylesheet" href="./CSS_files/bootstrap.min.css">
  <link href="Images/shopping-logo.png" rel="icon" style="width: 100px;">
  <link href="Images/pinterest_icon.png" rel="apple-touch-icon" style="width: 57;">

  <style>
    body {
      background: linear-gradient(to bottom right, #243B55, #141E30);
  font-family: Arial, sans-serif;
    }
    .card {
      border-radius: 25px;
    }
    .card-header {
      color: black;
    }
    .card-body {
      padding: 1.5rem;
    }
    .form-outline input {
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                  <div class="card">
                    <div class="card-header">
                      <b>Ubah Sandi</b>
                    </div>
                    <form class="mx-1 mx-md-4" method="POST" action="prosesforgot2.php">
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="fname">First Name:</label>
                          <div class="form-outline">
                            <input 
                              type="text" 
                              id="fname" 
                              class="form-control"
                              name="fname"
                              value="<?php echo $_SESSION['fname'] ?>" readonly 
                            > 
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-outline">
                            <label for="passwordbaru">Password Baru</label>
                            <input 
                              type="password" 
                              id="passwordbaru" 
                              class="form-control"
                              name="passwordbaru"
                              placeholder="Masukkan Password Baru"
                              required data-eye
                            >
                            <input type="checkbox" onclick="myFunction(this)" class="mx-2 align-self-center">
                            <label for="showPassword">Show Password</label>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-outline">
                            <label for="passwordkonfir">Konfirmasi Password</label>
                            <input 
                              type="password" 
                              id="passwordkonfir" 
                              class="form-control"
                              name="passwordkonfir"
                              placeholder="Konfirmasi Password Baru"
                              required data-eye
                            >
                            <input type="checkbox" onclick="myFunction(this)" class="mx-2 align-self-center">
                            <label for="showPassword">Show Password</label>
                          </div>
                        </div>
                        
                        <div class="justify-content-center mb-4">
                          <div class="card-body d-flex flex-column">
                            <button type="submit" class="btn btn-primary btn" name="btnCari">Ubah</button>
                          </div>
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
  </section>
  
  <script>
    function myFunction(input) {
      var x = input.previousElementSibling;
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>
</html>
