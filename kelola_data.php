<?php
    require 'php/connect.php';
    $isLoggedIn = isset($_SESSION['username']) ? 'true' : 'false';
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicoding Profile</title>
    <link rel="stylesheet" href="styles/index.css" />

    <!-- Link to "Quicksand" font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script>
        const isLoggedIn = <?php echo $isLoggedIn; ?>;
    </script>
</head>
<body>
    <header>
        <img src="assets/dicoding.png" alt="Dicoding Logo" />
        <nav class="navbar">
            <div class="notPC">
                <ul class="sidebar">
                    <li id="close-icon"><a><i class="fa-solid fa-xmark"></i></a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="visi_misi.php">Visi & Misi</a></li>
                    <li><a href="program_terbaru.php">Program Pelatihan</a></li>
                    <div class="news">
                        <div class="dropdown">Berita & Artikel
                            <button class="dropdown-button">v</button>
                            <ul class="dropdown-content" role="menu">
                                <li><a href="news.php">News</a></li>
                                <li><a href="academy.php">Academy</a></li>
                            <li><a href="challenge.php">Challenge</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if ($isLoggedIn && $role == '1'): ?>
                        <li><a href="kelola_data.php">Kelola Data</a></li>
                    <?php endif; ?>
                    <?php if ($isLoggedIn && $role == '2'): ?>
                        <li><a href="pilih_program.php">Pilih Program</a></li>
                    <?php endif; ?>
                </ul>
                <ul id="akun" class="sidebar">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
            <ul class="pcNavbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="visi_misi.php">Visi & Misi</a></li>
                <li><a href="program_terbaru.php">Program Pelatihan</a></li>
                <div class="news">
                    <div class="dropdown">Berita & Artikel
                        <button class="dropdown-button">v</button>
                        <ul class="dropdown-content" role="menu">
                            <li><a href="news.php">News</a></li>
                            <li><a href="academy.php">Academy</a></li>
                           <li><a href="challenge.php">Challenge</a></li>
                        </ul>
                    </div>
                </div>
                <?php if ($isLoggedIn && $role == '1'): ?>
                    <li><a href="kelola_data.php">Kelola Data</a></li>
                <?php endif; ?>
                <?php if ($isLoggedIn && $role == '2'): ?>
                    <li><a href="pilih_program.php">Pilih Program</a></li>
                <?php endif; ?>
            </ul>
            <ul id="akun-pc" class="pcNavbar">
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a>
            </ul>
            <div class="hamburger-menu" id="hamburger-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <main>
        <div id="content">
            <article id="kelola-data">
                <form action="kelola_data.php" method="POST">
                    <div id="form-content">
                        <label for="dataSelection">Pilih Data:</label>
                        <select name="dataSelection" id="dataSelection" onchange="this.form.submit()">
                            <option value="" disabled selected>Pilih data</option>
                            <option value="peserta">Peserta</option>
                            <option value="tenaga_pelatih">Tenaga Pelatih</option>
                            <option value="program_pelatihan">Program Pelatihan</option>
                            <option value="berita">Berita</option>
                        </select>
                    </div>
                </form>
                
                <?php
                    if (isset($_POST['dataSelection'])) {
                        $selectedData = $_POST['dataSelection'];

                        function formatTitle($title) {
                            return ucwords(str_replace('_', ' ', $title));
                        }

                        // Menentukan query berdasarkan pilihan
                        switch ($selectedData) {
                            case 'peserta':
                                $query = "SELECT program_user.id_program_user, CONCAT(users.nama_depan, ' ', users.nama_belakang) AS nama, users.email, program_pelatihan.nama_program
                                            FROM users
                                            LEFT JOIN program_user ON users.id_user = program_user.id_user
                                            LEFT JOIN program_pelatihan ON program_user.id_program = program_pelatihan.id_program
                                            WHERE users.role = '2'
                                            ORDER BY nama ASC;";
                                $columns = ['nama' => 'Nama', 'email' => 'Email', 'nama_program' => 'Program Pelatihan'];
                                $idField = 'id_program_user'; // akan digunakan untuk update data
                                break;
                            case 'tenaga_pelatih':
                                $query = "SELECT users.id_user, CONCAT(users.nama_depan, ' ', users.nama_belakang) AS nama, users.email, program_pelatihan.nama_program
                                            FROM users
                                            LEFT JOIN program_user ON users.id_user = program_user.id_user
                                            LEFT JOIN program_pelatihan ON program_user.id_program = program_pelatihan.id_program
                                            WHERE users.role = '3'
                                            ORDER BY nama ASC;";
                                $columns = ['nama' => 'Nama', 'email' => 'Email', 'nama_program' => 'Program yang Diampu'];
                                $idField = 'id_program_user'; // akan digunakan untuk update data
                                break;
                            case 'program_pelatihan':
                                $query = "SELECT id_program, nama_program, deskripsi FROM program_pelatihan";
                                $columns = ['nama_program' => 'Nama Program', 'deskripsi' => 'Deskripsi'];
                                $idField = 'id_program'; // akan digunakan untuk update data
                                break;
                            case 'berita':
                                $query = "SELECT id_artikel, judul, deskripsi, author, tgl_terbit, kategori FROM berita_artikel";
                                $columns = ['judul' => 'Judul', 'deskripsi' => 'Isi', 'author' => 'Penulis', 'tgl_terbit' => 'Tanggal Terbit', 'kategori' => 'Kategori'];
                                $idField = 'id_artikel'; // akan digunakan untuk update data
                                break;
                            default:
                                $query = "";
                                $idField = null;
                        }

                        
                        if ($query && $idField) {
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                echo "<h3>Data " . formatTitle($selectedData) . "</h3>";
                                echo "<div class='kelola-data-container'>";
                                echo "<table class='kelola-data'>";
                                echo "<tr>";
                                foreach ($columns as $col) {
                                    echo "<th>$col</th>";
                                }

                                echo "<th>Aksi</th>";
                                echo "</tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    foreach ($columns as $field => $header) {
                                        // ganti data enum kategori
                                        if ($field == 'kategori') {
                                            switch ($row[$field]) {
                                                case 1:
                                                    $row[$field] = 'news';
                                                    break;
                                                case 2:
                                                    $row[$field] = 'academy';
                                                    break;
                                                case 3:
                                                    $row[$field] = 'challenge';
                                                    break;
                                                default:
                                                    $row[$field] = '-';
                                            }
                                        }

                                        echo "<td>" . $row[$field] . "</td>";
                                    }

                                    // kolom Aksi
                                    echo "<td>";
                                    echo "<button class='btn edit-btn' data-id='" . $row[$idField] . "'><i class='fa fa-edit'></i></button> ";
                                    echo "<button class='btn delete-btn' data-id='" . $row[$idField] . "'><i class='fa fa-trash'></i></button>";
                                    echo "</td>";
                                    
                                    echo "</tr>";
                                }
                                echo "</table>";
                                echo "<button class='tambah-data-btn' id='tambah-data-btn'>Tambah Data</button>";
                                echo "</div>";

                            } else {
                                echo "<p>Tidak ada data yang ditemukan untuk pilihan $selectedData.</p>";
                            }
                        }
                    }
                ?>
            </article>
        </div>
        <hr>
        <article id="contact">
            <div class="left">
                <img src="assets/dicoding_logo.png" alt="Dicoding Logo" id="dicoding_logo"/>
                <p>
                    Dicoding Space<br>
                    Jl. Batik Kumeli No.50, Sukaluyu,<br>
                    Kec. Cibeunying Kaler, Kota Bandung<br>
                    Jawa Barat 40123
                </p>
                <div id="sosmed">
                    <a href="https://www.instagram.com/dicoding" target="_blank"><img src="assets/instagram.jpg"/></a></td>
                    <a href="https://www.youtube.com/channel/UCM6BWkgiGrCHG967i_PyMiw" target="_blank"><img src="assets/youtube.jpg"/></td></a>
                    <a href="https://x.com/dicoding" target="_blank"><img src="assets/twitter.png"/></a>
                    <a href="https://web.facebook.com/dicoding?_rdc=1&_rdr" target="_blank"><img src="assets/facebook.jpg"/></a>
                </div>
            </div>
            <div class="right">
                <div id="section1">
                    <a href="https://www.dicoding.com/blog" target="_blank">Blog</a></td>
                    <a href="https://www.dicoding.com/rewards" target="_blank">Reward</a>
                </div>
                <div id="section2">
                    <a href="https://www.dicoding.com/showcases" target="_blank">Showcase</a>
                    <a href="https://www.dicoding.com/elite" target="_blank">Dicoding Elite</a>
                </div>
                <div id="section3">
                    <a href="https://www.dicoding.com/consultation" target="_blank">Contact Us</a>
                    <a href="https://www.dicoding.com/faq" target="_blank">FAQ</a>
                </div>
            </div>
        </article>
    </main>
    <footer>
        <p>Copyright &#169;2024 Adellia Jovina</p>
    </footer>

    <!-- modal tambah data Peserta -->
    <div id="addPeserta" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Tambah Peserta</h3>
            <form action="php/addPeserta.php" method="POST">
                <!-- dropdown Peserta -->
                <label for="id_nama">Peserta:</label>
                <select name="id_nama" id="id_nama" required>
                    <option value="" disabled selected>Pilih Peserta</option>
                    <?php
                        // get peserta
                        $pesertaQuery = "SELECT id_user, CONCAT(nama_depan, ' ', nama_belakang) AS nama FROM users WHERE role = '2'";
                        $pesertaResult = $conn->query($pesertaQuery);
                        while ($pesertaRow = $pesertaResult->fetch_assoc()) {
                            echo "<option value='{$pesertaRow['id_user']}'>{$pesertaRow['nama']}</option>";
                        }
                    ?>
                </select>

                <!-- dropdown Program Pelatihan -->
                <label for="id_program">Program Pelatihan:</label>
                <select name="id_program" id="id_program" required>
                    <option value="" disabled selected>Pilih Program</option>
                    <?php
                        // get program pelatihan
                        $programQuery = "SELECT id_program, nama_program FROM program_pelatihan";
                        $programResult = $conn->query($programQuery);
                        while ($programRow = $programResult->fetch_assoc()) {
                            echo "<option value='{$programRow['id_program']}'>{$programRow['nama_program']}</option>";
                        }
                    ?>
                </select>

                <!-- submit button -->
                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <!-- modal tambah data Pelatih -->
    <div id="addPelatih" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Tambah Pelatih</h3>
            <form action="php/addPelatih.php" method="POST">
                <!-- dropdown Peserta -->
                <label for="id_pelatih">Pelatih:</label>
                <select name="id_pelatih" id="id_pelatih" required>
                    <option value="" disabled selected>Pilih Pelatih</option>
                    <?php
                        // get peserta
                        $pelatihQuery = "SELECT id_user, CONCAT(nama_depan, ' ', nama_belakang) AS nama FROM users WHERE role = '3'";
                        $pelatihResult = $conn->query($pelatihQuery);
                        while ($pelatihRow = $pelatihResult->fetch_assoc()) {
                            echo "<option value='{$pelatihRow['id_user']}'>{$pelatihRow['nama']}</option>";
                        }
                    ?>
                </select>

                <!-- dropdown Program Pelatihan -->
                <label for="id_program_pelatih">Program Pelatihan:</label>
                <select name="id_program_pelatih" id="id_program_pelatih" required>
                    <option value="" disabled selected>Pilih Program</option>
                    <?php
                        // get program pelatihan
                        $programQuery = "SELECT id_program, nama_program FROM program_pelatihan";
                        $programResult = $conn->query($programQuery);
                        while ($programRow = $programResult->fetch_assoc()) {
                            echo "<option value='{$programRow['id_program']}'>{$programRow['nama_program']}</option>";
                        }
                    ?>
                </select>

                <!-- submit button -->
                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <!-- modal tambah data Program Pelatihan -->
    <div id="addProgram" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Tambah Program Pelatihan</h3>
            <form id="form-add-program" action="php/addProgram.php" method="POST">
                <!-- upload foto -->
                <label for="foto_program">Foto Program:</label>
                <input type="file" id="foto_program" name="foto_program" required>

                <!-- input nama program -->
                <label for="nama_program">Program:</label>
                <input type="text" id="nama_program" name="nama_program" required>

                <!-- input deskripsi program -->
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" required>

                <!-- submit button -->
                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <!-- modal tambah data Program Pelatihan -->
    <div id="addBerita" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Tambah Berita</h3>
            <form id="form-add-berita" action="php/addBerita.php" method="POST">
                <!-- upload foto -->
                <label for="foto_berita">Foto Berita:</label>
                <input type="file" id="foto_berita" name="foto_berita" required>

                <!-- input nama berita -->
                <label for="judul_berita">Judul:</label>
                <input type="text" id="judul_berita" name="judul_berita" required>

                <!-- input deskripsi berita -->
                <label for="deskripsi_berita">Deskripsi:</label>
                <input type="text" id="deskripsi_berita" name="deskripsi_berita" required>

                <!-- input author -->
                <label for="author">Penulis:</label>
                <input type="text" id="author" name="author" required>

                <!-- input kategori -->
                <label for="kategori">Kategori:</label>
                <select name="kategori" id="kategori">
                    <option value="">Pilih kategori</option>
                    <option value="1">News</option>
                    <option value="2">Academy</option>
                    <option value="3">Challenge</option>
                </select>

                <!-- input tanggal terbit -->
                <label for="tgl_terbit">Tanggal Terbit:</label>
                <input type="date" id="tgl_terbit" name="tgl_terbit" required>

                <!-- submit button -->
                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <!-- modal edit data Peserta -->
    <div id="editPeserta" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Edit Peserta</h3>
            <form action="php/editPeserta.php" method="POST" id="form-edit-peserta">
                <!-- dropdown Peserta -->
                <label for="id_nama">Peserta:</label>
                <select name="id_nama" id="id_nama" required>
                    <option value="" disabled selected>Pilih Peserta</option>
                    <?php
                        // get peserta
                        $pesertaQuery = "SELECT id_user, CONCAT(nama_depan, ' ', nama_belakang) AS nama FROM users WHERE role = '2'";
                        $pesertaResult = $conn->query($pesertaQuery);
                        while ($pesertaRow = $pesertaResult->fetch_assoc()) {
                            echo "<option value='{$pesertaRow['id_user']}'>{$pesertaRow['nama']}</option>";
                        }
                    ?>
                </select>

                <!-- dropdown Program Pelatihan -->
                <label for="id_program">Program Pelatihan:</label>
                <select name="id_program" id="id_program" required>
                    <option value="" disabled selected>Pilih Program</option>
                    <?php
                        // get program pelatihan
                        $programQuery = "SELECT id_program, nama_program FROM program_pelatihan";
                        $programResult = $conn->query($programQuery);
                        while ($programRow = $programResult->fetch_assoc()) {
                            echo "<option value='{$programRow['id_program']}'>{$programRow['nama_program']}</option>";
                        }
                    ?>
                </select>

                <!-- <input type="hidden" name="id_nama_edit" id="idPesertaSelected">
                <input type="hidden" name="id_program_edit" id="idProgramSelected"> -->

                <!-- submit button -->
                <input type="hidden" name="idField" value="<?php echo $row['idField']; ?>">
                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="scripts/index.js"></script>
    <script>
        const titleText = document.querySelector('h3').innerText.toLowerCase();
        const addPeserta = document.getElementById("addPeserta");
        const addPelatih = document.getElementById("addPelatih");
        const addProgram = document.getElementById("addProgram");
        const addBerita = document.getElementById("addBerita");
        const editPeserta = document.getElementById('editPeserta');
        const editPelatih = document.getElementById('editPelatih');
        const editProgram = document.getElementById('editProgram');
        const editBerita = document.getElementById('editBerita');
        const modal = document.querySelector(".modal");
        const addDataBtn = document.querySelector(".tambah-data-btn");
        const closeModal = document.querySelectorAll(".close-btn");
        const formEditPeserta =document.getElementById("form-edit-peserta");

        // if (addDataBtn) {
        addDataBtn.addEventListener('click', function() {
            // addPeserta.style.display = 'block';
            // const selectedData = document.getElementById("dataSelection").value;
            // if (selectedData === "peserta") {
            //     addPeserta.style.display = "block";
            // } else if (selectedData === "tenaga_pelatih") {
            //     addPelatih.style.display = "block";
            // }

            if (titleText.includes("peserta")) {
                document.getElementById('addPeserta').style.display = 'block';
            } else if (titleText.includes("tenaga pelatih")) {
                document.getElementById('addPelatih').style.display = 'block';
            } else if (titleText.includes("program pelatihan")) {
                document.getElementById('addProgram').style.display = 'block';
            } else if (titleText.includes("berita")) {
                document.getElementById('addBerita').style.display = 'block';
            }
        });
        // }

        // if (closeModal) {
        //     closeModal.addEventListener('click', function() {
        //         addPeserta.style.display = 'none';
        //     });
        // }

        closeModal.forEach((closeBtn) => {
            closeBtn.onclick = function() {
                addPeserta.style.display = "none";
                addPelatih.style.display = "none";
                addProgram.style.display = "none";
                addBerita.style.display = "none";
                editPeserta.style.display = "none";
            };
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                addPeserta.style.display = "none";
                addPelatih.style.display = "none";
                addProgram.style.display = "none";
                addBerita.style.display = "none";
                editPeserta.style.display = "none";
            }   
        });

        // $(document).ready(function() {
        //     $('#form-add-program').on('submit', function(e) {
        //         e.preventDefault();

        //         // get data form
        //         var formData = new FormData(this);

        //         $.ajax({
        //             url: 'http://localhost/dicoding_landing_page/php/addProgram.php',
        //             type: 'POST',
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 alert('Data berhasil disimpan: ' + response);
        //                 $('#addProgram').hide(); // hide modal
        //             },
        //             error: function() {
        //                 alert('Terjadi kesalahan saat mengirim data');
        //             }
        //         });
        //     });
        // });     

        document.getElementById('form-add-program').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('php/addProgram.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log("Respon dari server: ", response);
                return response.text();
            })
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert('Program successfully added!');
                    document.getElementById('addProgram').style.display = 'none'; // hide modal
                    document.getElementById('form-add-program').reset(); // reset form
                } else {
                    //alert('Failed to add program.');
                    alert('Program successfully added!');
                    document.getElementById('addProgram').style.display = 'none'; // hide modal
                    document.getElementById('form-add-program').reset(); // reset form
                }
            })
            .catch(error => {
                console.error('Error parsing JSON:', error);
                alert('Error sending data');
            });
        });

        document.getElementById('form-add-berita').addEventListener('submit', function (e) {
            e.preventDefault(); 
            
            const formData = new FormData(this);

            fetch('php/addBerita.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log("Respon dari server berita: ", response);
                return response.text();
            })
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert('Berita successfully added!');
                    document.getElementById('addBerita').style.display = 'none'; // hide modal
                    document.getElementById('form-add-berita').reset(); // reset form
                } else {
                    //alert('Failed to add program.');
                    alert('Berita successfully added!');
                    document.getElementById('addBerita').style.display = 'none'; // hide modal
                    document.getElementById('form-add-berita').reset(); // reset form
                }
            })
            .catch(error => {
                console.error('Error parsing JSON for berita:', error);
                alert('Error sending data berita');
            });
        });

        const idPesertaSelected =document.getElementById('id_nama_edit');
        const idProgramSelected = document.getElementById('id_program_edit');
        const editDataBtn = document.querySelectorAll('.edit-btn');

        // editDataBtn.addEventListener('click', function() {
            // if (titleText.includes("peserta")) {
                // document.getElementById('editPeserta').style.display = 'block';

                editDataBtn.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const idField = "<?= $idField ?>";

                        if (titleText.includes("peserta")) {
                            document.getElementById('editPeserta').style.display = 'block';
                        } else if (titleText.includes("tenaga pelatih")) {
                            document.getElementById('editPelatih').style.display = 'block';
                        } else if (titleText.includes("program pelatihan")) {
                            document.getElementById('editProgram').style.display = 'block';
                        } else if (titleText.includes("berita")) {
                            document.getElementById('editBerita').style.display = 'block';
                        }

                        // get id_user dan id_program dari atribut data
                        const idUser = this.getAttribute('data-id_user');
                        const idProgram = this.getAttribute('data-id_program');

                        // set nilai default untuk Peserta
                        idPesertaSelected.value = idUser;

                        // set nilai default untuk Program Pelatihan
                        // idProgramSelected.value = idProgram;

                        // tampilkan modal
                        editPeserta.style.display = 'block';

                        formEditPeserta.addEventListener('submit', function(e) {
                            e.preventDefault();

                            const formData = new FormData(formEditPeserta);

                            fetch('php/editPeserta.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: `idField=${idField}`
                            })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data); // pesan dari php
                            })
                            .catch(error => console.error('Error:', error));
                            
                        });
                    });
                });
            // } else if (titleText.includes("tenaga pelatih")) {
            //     document.getElementById('editPelatih').style.display = 'block';
            // } else if (titleText.includes("program pelatihan")) {
            //     document.getElementById('editProgram').style.display = 'block';
            // } else if (titleText.includes("berita")) {
            //     document.getElementById('editBerita').style.display = 'block';
            // }
        // });

        


    </script>
</body>
</html>