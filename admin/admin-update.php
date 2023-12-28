<?php
// Pastikan sesi dimulai
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if(empty($_SESSION['username']) || $_SESSION['type'] != 'admin')
{
  header("Location: denied.php");
}

// Pastikan hanya admin yang dapat mengakses halaman ini
if ($_SESSION["type"] != "admin") {
    header("location:index.php");
    exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
}

include '../includes/config.php';

if (isset($_REQUEST['quantity'])) {
    // Simpan nilai kuantitas dari formulir sebelumnya ke dalam sesi
    $_SESSION["products_id"] = $_REQUEST['quantity'];

    // Ambil data produk dari database
    $result = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($result) {
        $i = 0;
        while ($obj = $result->fetch_object()) {
            // Pastikan nilai produk_id ada dan tidak kosong
            if (isset($_SESSION["products_id"][$i]) && !empty($_SESSION["products_id"][$i])) {
                $newqty = $obj->qty + $_SESSION["products_id"][$i];
                
                // Jangan biarkan kuantitas negatif
                if ($newqty < 0) {
                    $newqty = 0;
                }
                
                // Perbarui nilai kuantitas di database
                $update = $mysqli->query("UPDATE products SET qty = $newqty WHERE id = $obj->id");
                if ($update) {
                    echo 'Data Updated';
                }
            }
            $i++;
        }
    }
}

// Redirect ke halaman utama setelah selesai memperbarui database
header("location:index.php");
exit; // Pastikan untuk keluar dari skrip setelah melakukan redirect
?>
