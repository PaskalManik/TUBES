<?php
$currency = '₹';
$db_username = 'root';
$db_password = '';
$db_name = 'bolt';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

// //Periksa koneksi
// if ($mysqli->connect_error) {
//     die("Koneksi gagal: " . $mysqli->connect_error);
// } else {
//     echo "Koneksi berhasil!";
// }
?>
