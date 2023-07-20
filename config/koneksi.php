<?php

    $server     = 'localhost';
    $user       = 'root';
    $password   = '';
    $db_name    = 'roti-fachry';
    $koneksi    = mysqli_connect($server,$user,$password,$db_name);

    if ($koneksi) {
        //echo "berhasil";
    } else {
        echo "gagal";
    }