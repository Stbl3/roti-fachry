<?php 

include '../config/koneksi.php';

$id = $_POST['id'];

$query      = "DELETE FROM produk_roti WHERE id = '$id'";
$result     = mysqli_query($koneksi, $query);

if ($result) {
    header('location: ../views/produk_roti.php');
} else {
    $error_message = mysqli_error($koneksi);
    echo '<script type="text/JavaScript">';
    echo 'alert("Data gagal dihapus. Error: ' . $error_message . '")';
    echo '</script>';
}
?>
