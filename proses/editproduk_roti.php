<?php

include '../config/koneksi.php';

$id = $_POST['id'];
$id_roti = $_POST['id_roti'];
$nama_roti = $_POST['nama_roti'];
$kategori_roti = $_POST['kategori_roti'];
$harga_roti = $_POST['harga_roti'];

$query = "UPDATE produk_roti SET 
            id_roti = '$id_roti',
            nama_roti = '$nama_roti',
            kategori_roti = '$kategori_roti',
            harga_roti = '$harga_roti'
            WHERE id = $id";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header('location:../views/produk_roti.php');
} else {
    echo "Data gagal diubah";
}
?>
