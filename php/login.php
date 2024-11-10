<?php
    header('Content-Type: application/json');
    require 'connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    if(!$data) {
        echo json_encode(['error' => 'Data tidak ada']);
        exit();
    }

    // ambil data dari input (login.js)
    $username = $data['username'];
    $password = $data['password'];

    if(empty($username) || empty($password)) {
        echo json_encode(['error' => 'Semua data harus diisi']);
        exit();
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result && $result->num_rows > 0) {
        // ambil data pengguna dari database
        $row = $result->fetch_assoc();

        if($password === $row['password']) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id_user'] = $row['id_user'];
            echo json_encode(['success' => true, 'message' => 'Login berhasil!', 'role' => $row['role']]);
        } else {
            echo json_encode(['error' => 'Login gagal']);
        }
    } else {
        echo json_encode(['error' => 'Pengguna tidak ditemukan']);
    }
?>