<?php
    header('Content-Type: application/json');
    require 'connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    if(!$data) {
        echo json_encode(['error' => 'Data tidak ada']);
        exit();
    }

    // ambil data dari input (forgot_password.js)
    $username = $data['username'];
    $passwordBaru = $data['passwordBaru'];

    if(empty($username) || empty($passwordBaru)) {
        echo json_encode(['error' => 'Semua data harus diisi']);
        exit();
    }

    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
    $stmt->bind_param('ss', $passwordBaru, $username);

    if($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Password berhasil diganti']);
    } else {
        echo json_encode(['error' => 'Error Ganti Password: ' . $conn->error]);
    }
?>