<?php
require_once ("./includes/config.php") ;

$pass = $_POST['passwordbaru'];
$pass2 = $_POST['passwordkonfir'];
$fname = $_POST['fname'];

if ($pass != $pass2)
{
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                window.location='prosesforgot.php';
            </script>";
        return false;
}

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$password' WHERE fname = '$fname'";
    $query = mysqli_query($mysqli, $sql);

    if($query){
            echo" <script>
                    alert('Berhasil diubah');
                    window.location='login.php';
                </script>
            ";
    }else{
        echo"
            <script>
                alert('Gagal Diubah');
            </script>
        ";
    }
    $mysqli->close();   
?>