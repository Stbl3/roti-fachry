<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "roti-fachry"; // Ganti dengan nama database yang digunakan

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengaktifkan session
session_start();

// Memproses data login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        // Jika login berhasil, simpan username dalam session
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true; // Menandakan bahwa pengguna telah terautentikasi

        // Redirect ke halaman dashboard atau halaman lain yang diinginkan
        header("Location: ../views/home.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error sebagai flash message
        setFlash("Login failed. Invalid username or password.", "danger");
        header("Location: ../index.php");
        exit();
    }
} else {
    // Jika pengguna mencoba mengakses halaman login secara langsung, alihkan mereka ke halaman login
    header("Location: ../index.php");
    exit();
}

// Fungsi untuk menetapkan pesan flash
function setFlash($message, $type) {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
}
?>
