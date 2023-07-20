<?php
// Set header-cache untuk mencegah caching halaman
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa; /* Light gray background color */
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow effect */
        }

        .card-body {
            background-color: #fff; /* White background color */
        }

        .btn-primary {
            background-color: #007bff; /* Blue button background color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue button background color on hover */
        }

        .form-control {
            border-color: #007bff; /* Blue border color for input fields */
            border-radius: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 5px #007bff; /* Light shadow effect on input focus */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4" style="color: #007bff;">LOGIN</h1> <!-- Blue heading color -->

                        <form action="proses/login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <!-- Tampilkan pesan flash jika ada -->
                                <?php
                                session_start();
                                if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])) {
                                    $message = $_SESSION['flash_message'];
                                    $type = $_SESSION['flash_type'];
                                    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
                                    unset($_SESSION['flash_message']);
                                    unset($_SESSION['flash_type']);
                                }
                                ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

