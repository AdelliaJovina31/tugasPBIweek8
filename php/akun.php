<?php
    header('Content-Type: application/json');
    require 'connect.php';

    if(!isset($_SESSION['username'])) {
        echo json_encode(['error' => 'Pengguna belum login']);
        exit();
    }

    $username = $_SESSION['username'];

    $stmt = $conn->prepare("SELECT CONCAT(nama_depan, ' ', nama_belakang) AS nama, email, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['success' => true, 'user' => $user]);
    } else {
        echo json_encode(['error' => 'Pengguna tidak ditemukan']);
    }
?>