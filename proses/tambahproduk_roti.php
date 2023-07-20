<?php 

    include '../config/koneksi.php';

    $id_roti                = $_POST['id_roti'];
    $nama_roti             = $_POST['nama_roti'];
    $kategori_roti             = $_POST['kategori_roti'];
    $harga_roti             = $_POST['harga_roti'];
    
   if ($id_roti==''){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("ID Roti Tidak Boleh Kosong")';  
    echo '</script>';
  }
        
      else{ 
        $query = "INSERT INTO produk_roti (id_roti, nama_roti, kategori_roti, harga_roti) VALUES ('$id_roti', '$nama_roti', '$kategori_roti', '$harga_roti')";
      }

    $result = mysqli_query($koneksi,$query);

    if ($result) {
        header('location: ../views/produk_roti.php');
    }

    else{
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Tambah Data Gagal")';  
        echo '</script>';   
    }
    
?>