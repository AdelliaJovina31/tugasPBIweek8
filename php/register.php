<?php
    header('Content-Type: application/json');
    require 'connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    if(!$data) {
        echo json_encode(['error' => 'Data tidak ada']);
        exit();
    }

    // ambil data dari input (register.js)
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $password = $data['password'];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        echo json_encode(['error' => 'Semua data harus diisi']);
        exit();
    }

    $lastId = mysqli_query($conn, 'SELECT MAX(id_user) AS max_id FROM users');
    $lastUser = mysqli_fetch_assoc($lastId);
    $newId = $lastUser['max_id'] + 1;

    $stmt = $conn->prepare('INSERT INTO users(id_user, nama_depan, nama_belakang, email, password, role) VALUES (?, ?, ?, ?, ?, 2)');
    $stmt->bind_param('issss', $newId, $firstName, $lastName, $email, $password);

    if($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registrasi berhasil']);
    } else {
        echo json_encode(['error' => 'Error: ' . $conn->error]);
    }
?>