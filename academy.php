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
    <link rel="stylesheet" href="styles/academy.css" />

    <!-- Link to "Quicksand" font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        const isLoggedIn = <?php echo $isLoggedIn; ?>;
    </script>
</head>
<body>
    <header>
        <img src="assets/dicoding.png" alt="Dicoding Logo" width="200px"/>
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
        <h1>Academy</h1>
        <div class="search-container">
            <input type="text" id="searchBar" placeholder="Cari berita..." />
        </div>
        <div class="container">
            <div id="daftar_academy">
                <ul class="academy-list">
                    <li class="academy">
                        <a href="https://www.dicoding.com/blog/putra-petani-yang-bercita-cita-punya-perusahaan-konsultan-teknologi-sendiri/" class="academy-link">
                            <img src="assets/academy1.jpg" alt="academy1"/>
                            <div class="academy-desc">
                                <h4>Putra Petani yang Bercita-Cita Punya Perusahaan Konsultan Teknologi Sendiri</h4>
                                <p>Cerita Gio Fandi H. Nainggolan, Lulusan DTS PROA 2024 – Manajemen Proyek, yang Bercita-Cita Punya Perusahaan Konsultan Teknologi Sendiri Punya keterbatasan sumber daya adalah sesuatu yang sudah biasa Gio Fandi H. Nainggolan (28) alami sejak kecil. Semangat Gio—begitu ia dipanggil—untuk mencapai banyak hal sangat tinggi, tetapi ia harus berdamai dengan ...</p>
                            </div>
                        </a>
                    </li>
                    <li class="academy">
                        <a href="https://www.dicoding.com/blog/pentingnya-ram-random-access-memory-di-era-digital/" class="academy-link">
                            <img src="assets/academy2.jpg" alt="academy2"/>
                            <div class="academy-desc">
                                <h4>Rahasia di Balik Komputer Ngebut: Pentingnya RAM di Era Digital</h4>
                                <p>Setelah sukses memberikan pelatihan Google Career Certificates (GCC) pada batch 2 di tahun 2024, Kementerian Komunikasi dan Informatika RI kembali bekerja sama dengan GCC dan Dicoding, membuka kesempatan pelatihan gratis bagi para profesional melalui program Digital Talent Scholarship (DTS) 2024. Pelatihan ini ditujukan bagi para profesional yang ingin meningkatkan kapabilitas ...</p>
                            </div>
                        </a>
                    </li>
                    <li class="academy">
                        <a href="https://www.dicoding.com/blog/kenali-constructive-feedback-definisi-contoh-dan-dampaknya/" class="academy-link">
                            <img src="assets/academy3.jpg" alt="academy3"/>
                            <div class="academy-desc">
                                <h4>Inilah Pembaruan Gemini Paling Mutakhir dalam Google I/O 2024</h4>
                                <p>Google I/O ini merupakan kegiatan tahunan yang diadakan oleh Google, seperti Google I/O 2023, pembaruan yang terdapat di Google I/O dapat dibagi menjadi berbagai bidang, seperti mobile, web, ML/AI, dan cloud. Google I/O 2024 diadakan secara online pada tanggal 14 Mei 2024 dan banyak pembaruan yang diumumkan, salah satunya pembaruan ...</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
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

    <script src="scripts/academy.js"></script>
</body>
</html>