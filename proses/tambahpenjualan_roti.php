<?php
include '../config/koneksi.php';

$id_penjualan = $_POST['id_penjualan'];
$id_roti = $_POST['id_roti'];
$jumlah_roti_terjual = $_POST['jumlah_roti_terjual'];
$tanggal_penjualan = $_POST['tanggal_penjualan'];

// Validasi apakah id_roti ada di tabel produk_roti
$query = "SELECT COUNT(*) FROM produk_roti WHERE id_roti = '$id_roti'";
$result = mysqli_query($koneksi, $query);
$count = mysqli_fetch_row($result)[0];

if ($count > 0) {
    // id_roti valid, lakukan operasi INSERT pada tabel penjualan_roti
    $query_insert = "INSERT INTO penjualan_roti (id_penjualan, id_roti, jumlah_roti_terjual, tanggal_penjualan) VALUES ('$id_penjualan', '$id_roti', '$jumlah_roti_terjual', '$tanggal_penjualan')";
    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
        header('location: ../views/penjualan_roti.php');
    } else {
        echo '<script type="text/JavaScript">';
        echo 'alert("Tambah Data Gagal")';
        echo '</script>';
    }
} else {
    // id_roti tidak valid, tampilkan pesan kesalahan atau lakukan tindakan sesuai kebutuhan
    echo '<script type="text/JavaScript">';
    echo 'alert("ID Roti tidak valid")';
    echo '</script>';
}
?>