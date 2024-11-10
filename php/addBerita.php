<?php
    header('Content-Type: application/json');
    require 'connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // debug apakah form data diterima
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $judul_berita = $_POST['judul_berita'];
        $deskripsi_berita = $_POST['deskripsi_berita'];
        $author = $_POST['author'];
        $kategori = $_POST['kategori'];
        $tgl_terbit = $_POST['tgl_terbit'];

        $lastId = mysqli_query($conn, 'SELECT MAX(id_artikel) AS max_id FROM berita_artikel');
        $lastUser = mysqli_fetch_assoc($lastId);
        $newId = $lastUser['max_id'] + 1;

        // handle foto
        if  (isset($_FILES['foto_berita'])) {
            $foto = $_FILES['foto_berita'];
            $foto_name = $foto['name'];  // nama file foto
            $foto_tmp_name = $foto['tmp_name']; // file sementara sebelum diupload
            $foto_size = $foto['size'];
            $foto_error = $foto['error'];

            $targetDir = '../assets/berita/';

            // buat folder jika belum ada
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
            }

            if ($foto_error === 0) {
                // buat nama file yang unik
                $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
                $foto_new_name = uniqid('', true) . '.' . $foto_ext;
                $foto_dest = $targetDir . $foto_new_name;

                // pindahkan file ke folder tujuan
                if (move_uploaded_file($foto_tmp_name, $foto_dest)) {
                    $insertQuery = "INSERT INTO berita_artikel (id_artikel, judul, deskripsi, author, foto, kategori, tgl_terbit) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insertQuery);
                    $stmt->bind_param("issssis", $newId, $judul_berita, $deskripsi_berita, $author, $foto_new_name, $kategori, $tgl_terbit);

                    if ($stmt->execute()) {
                        // echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = '../kelola_data.php';</script>";
                        echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan!']);
                    } else {
                        // echo "<script>alert('Gagal menambahkan data.'); window.location.href = '../kelola_data.php';</script>";
                        echo json_encode(['success' => false, 'message' => 'Gagal menambahkan data.']);
                    }
                    $stmt->close();
                    $conn->close();
                } else {
                    // echo "Gagal menunggah file";
                    echo json_encode(['success' => false, 'message' => 'Terjadi kesalahan saat mengunggah file']);
                }
            } else {
                // echo "Terjadi kesalahan saat mengunggah file";
                echo json_encode(['success' => false, 'message' => 'Tidak ada file yang diunggah']);
            }
        }
    }
?>