<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_nama'] ?? null;
    $id_program = $_POST['id_program'] ?? null;
    $idField = key($_POST);
    $id = $_POST[$idField] ?? null;

    if (isset($_POST['id_nama_edit'])) {
        $id_user = $_POST['id_nama_edit'];
        echo "ID Peserta yang dipilih: " . $id_user; // Debugging
    } else {
        echo "Tidak ada peserta yang dipilih.";
    }

    // Debug: Cek nilai yang diterima
    var_dump($_POST); // Menampilkan data yang diterima
    exit(); // Berhenti sejenak untuk melihat hasilnya

    if ($id_user && $id_program && $id) {
        // Query dan operasi lainnya
        $updateQuery = "UPDATE program_user SET id_user = ?, id_program = ? WHERE $idField = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("iii", $id_user, $id_program, $id);

        if ($stmt->execute()) {
            echo "Data berhasil diupdate!"; // Kirimkan pesan yang jelas
        } else {
            echo "Gagal menambahkan data."; // Jika gagal
        }
        $stmt->close();
    }
}
$conn->close();
?>
