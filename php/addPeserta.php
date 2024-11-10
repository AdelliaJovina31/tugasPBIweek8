<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_nama'];
    $id_program = $_POST['id_program'];

    $lastId = mysqli_query($conn, 'SELECT MAX(id_program_user) AS max_id FROM program_user');
    $lastUser = mysqli_fetch_assoc($lastId);
    $newId = $lastUser['max_id'] + 1;

    $insertQuery = "INSERT INTO program_user (id_program_user, id_user, id_program) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iii", $newId, $id_user, $id_program);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = '../kelola_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data.'); window.location.href = '../kelola_data.php';</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
