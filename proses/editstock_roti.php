<?php

include '../config/koneksi.php';

$id = $_POST['id'];
$id_stock = $_POST['id_stock'];
$id_roti = $_POST['id_roti'];
$jumlah_stock = $_POST['jumlah_stock'];
$tanggal_penerimaan = $_POST['tanggal_penerimaan'];

$query = "UPDATE stock_roti SET 
            id_stock = '$id_stock',
            id_roti = '$id_roti',
            jumlah_stock = '$jumlah_stock',
            tanggal_penerimaan = '$tanggal_penerimaan'
            WHERE id = $id";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header('location:../views/stock_roti.php');
} else {
    echo "Data gagal diubah";
}
?>
