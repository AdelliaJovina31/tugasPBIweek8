<?php
    require 'php/connect.php';

    if (!isset($_SESSION['username'])) {
        header('Location: login.html');
        echo json_encode('User belum login'); // arahkan ke login jika sesi tidak ditemukan
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Page</title>
    <link rel="stylesheet" href="styles/forgot_password.css" />

    <!-- Link to "Quicksand" font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <script defer src="scripts/forgot_password.js"></script>
</head>
<body>
    <header>
        <h1>Forgot Password</h1>
    </header>
    <main>
        <div class="forgot-password-wrapper">
            <form id="forgot-password" action="login.html" method="post">
                <div class="input-field">
                    <input type="text" id="username" />
                    <label>Username</label>
                </div>
                <div id="username-error" class="error"></div>

                <div class="input-field">
                    <input type="password" id="password-baru" />
                    <label>Password Baru</label>
                </div>
                <div id="password-error" class="error"></div>

                <div class="input-field">
                    <input type="password" id="password-baru-confirmation"  />
                    <label>Konfirmasi Password Baru</label>
                </div>
                <div id="confirm-error" class="error"></div>

                <button type="submit">Ganti Password</button>
            </form>
        </div>
    </main>
</body>
</html>