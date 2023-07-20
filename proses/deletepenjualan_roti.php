<?php 

    include '../config/koneksi.php';

    $id = $_POST['id'];

    $query      = "DELETE FROM penjualan_roti WHERE id = '$id'";
    $result     = mysqli_query($koneksi,$query);

    if ($result) {
        header('location: ../views/penjualan_roti.php');
    }else{
        echo "Data gagal dihapus";
    }
?>