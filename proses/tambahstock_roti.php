<?php
include '../config/koneksi.php';

$id_stock = $_POST['id_stock'];
$id_roti = $_POST['id_roti'];
$jumlah_stock = $_POST['jumlah_stock'];
$tanggal_penerimaan = $_POST['tanggal_penerimaan'];

// Validasi apakah id_roti ada di tabel stock_roti
$query = "SELECT COUNT(*) FROM stock_roti WHERE id_roti = '$id_roti'";
$result = mysqli_query($koneksi, $query);
$count = mysqli_fetch_row($result)[0];

if ($count > 0) {
    // id_roti valid, lakukan operasi INSERT pada tabel stock_roti
    $query_insert = "INSERT INTO stock_roti (id_stock, id_roti, jumlah_stock, tanggal_penerimaan) VALUES ('$id_stock', '$id_roti', '$jumlah_stock', '$tanggal_penerimaan')";
    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
        header('location: ../views/stock_roti.php');
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