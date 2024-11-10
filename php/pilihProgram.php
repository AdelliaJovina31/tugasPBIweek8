<?php
require 'connect.php';

if(!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'Pengguna belum login']);
    exit();
}

$username = $_SESSION['username'];
$id_user = $_SESSION['id_user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_program = $_POST['id_program'];

    $lastId = mysqli_query($conn, 'SELECT MAX(id_program_user) AS max_id FROM program_user');
    $lastUser = mysqli_fetch_assoc($lastId);
    $newId = $lastUser['max_id'] + 1;

    $insertQuery = "INSERT INTO program_user (id_program_user, id_user, id_program) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iii", $newId, $id_user, $id_program);

    if ($stmt->execute()) {
        echo "<script>alert('Program berhasil dipilih!'); window.location.href = '../pilih_program.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan program'); window.location.href = '../pilih_program.php';</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
