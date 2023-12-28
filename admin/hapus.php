<?php
include '../includes/config.php';
if(empty($_SESSION['username']) || $_SESSION['type'] != 'admin')
// {
//   header("Location: denied.php");
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Lakukan penghapusan produk dari database berdasarkan ID yang dikirimkan
        $delete_query = "DELETE FROM products WHERE id = $product_id";

        if ($mysqli->query($delete_query)) {
            echo "<script>
            alert('Produk Berhasil Dihapus');
            window.location.href = 'index.php';
          </script>";
            // Tambahkan log atau tindakan lain yang diinginkan setelah penghapusan
        } else {
            echo "<script>
            alert('Gagal Menghapus Produk');
            window.location.href = 'index.php';
          </script>";
        }
    }
}
?>