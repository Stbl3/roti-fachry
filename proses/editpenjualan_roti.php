<?php

include '../config/koneksi.php';

$id = $_POST['id'];
$id_penjualan = $_POST['id_penjualan'];
$id_roti = $_POST['id_roti'];
$jumlah_roti_terjual = $_POST['jumlah_roti_terjual'];
$tanggal_penerimaan = $_POST['tanggal_penerimaan'];

$query = "UPDATE penjualan_roti SET 
            id_penjualan = '$id_penjualan',
            id_roti = '$id_roti',
            jumlah_roti_terjual = '$jumlah_roti_terjual',
            tanggal_penerimaan = '$tanggal_penerimaan'
            WHERE id = $id";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header('location:../views/penjualan_roti.php');
} else {
    echo "Data gagal diubah";
}
?>
