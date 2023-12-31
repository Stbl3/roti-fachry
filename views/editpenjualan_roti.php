<?php 
    include '../config/koneksi.php';
        // Mulai sesi
        session_start();

        // Periksa status login pengguna
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            // Jika pengguna belum login, alihkan ke halaman login
            header("Location: ../index.php");
            exit();
        }
    
        // Set header-cache untuk mencegah caching halaman
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    
        // Konten halaman yang memerlukan autentikasi
        // ...
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php 
    session_start();
    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Roti Fachry</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-secondary bg-danger" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link text-white" href="./home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Tabel</div>
                            <a class="nav-link text-white" href="./produk_roti.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Produk Roti
                            </a>
                            <a class="nav-link text-white" href="./stock_roti.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-field"></i></div>
                                Stock Roti
                            </a>
                            <a class="nav-link active text-black" href="./penjualan_roti.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                                Penjualan Roti
                            </a>
                        </div>
            </div>
            <div class="sb-sidenav-footer">
            <a class="btn btn-danger ms-auto me-2" href="../proses/logout.php">Logout</a>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
        <?php
            include '../config/koneksi.php';
            $id = $_GET['id'];
            $query = "SELECT * FROM penjualan_roti WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
        <div class="container-fluid px-4">
                <h1 class="my-4 text-center">Edit Penjualan Roti</h1>
                <div class="col-md-8 m-auto card p-5 shadow -3 mb-5 bg-body rounded">
                        <form enctype="multipart/form-data" action="../proses/editpenjualan_roti.php" method="post">	
                            <input type="hidden" name="id" value="<?= $id ?>">				
                           <div class="mb-3">
                             <label for="exampleFormControlInput1" class="form-label">ID Penjualan</label>
                               <input name="id_penjualan" type="text" class="form-control id=exampleFormControlInput1" value="<?= $data['id_penjualan'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ID Roti</label>
                                <select name="id_roti" class="form-control" id="exampleFormControlSelect1">
                                    <?php
                                    // Mengambil daftar ID Roti dari tabel produk_roti
                                    $query_roti = "SELECT id_roti FROM produk_roti";
                                    $result_roti = mysqli_query($koneksi, $query_roti);
                                    
                                    // Menampilkan setiap ID Roti sebagai pilihan dropdown
                                    while ($row_roti = mysqli_fetch_assoc($result_roti)) {
                                        $id_roti = $row_roti['id_roti'];
                                        $selected = ($id_roti == $data['id_roti']) ? 'selected' : '';
                                        echo "<option value=\"$id_roti\" $selected>$id_roti</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jumlah Roti Terjual</label>
                                <input name="jumlah_roti_terjual" type="text" class="form-control id=exampleFormControlInput1" value="<?= $data['jumlah_roti_terjual'] ?>">
                            </div>
                            <div class="mb-3">
                             <label for="birthday">Tanggal Penjualan</label>
                                <br>
                                <input type="date" id="tanggal" name="tanggal_penjualan" value="<?= $data['tanggal_penjualan']?>">
                            </div>
                            <div class="d-flex justify-content-around">
                                <button name="submit" class="btn btn-md btn-success px-5 mt-2">edit</button>
                                <a href="./penjualan_roti.php" class="btn btn-md btn-danger px-5 mt-2">Cancel</a>
                            </div>
                    </form>
                </div> 
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Muhammad Fachry 2023</div>
                </div>
            </div>
        </footer>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script src="../js/script.js"></script>
    </body>
</html>
