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
    <link rel="stylesheet" href="styles/challenge.css" />

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
        <h1>Challenge</h1>
        <div class="search-container">
            <input type="text" id="searchBar" placeholder="Cari berita..." />
        </div>
        <div class="container">
            <div id="daftar_challenge">
                <ul class="challenge-list">
                    <li class="challenge">
                        <a href="https://www.dicoding.com/blog/bdt-challenge-baparekraf-digital-talent-2024/" class="challenge-link">
                            <img src="assets/challenge1.jpg" alt="challenge1"/>
                            <div class="challenge-desc">
                                <h4>Terbuka untuk Umum! BDT Challenge – Baparekraf Digital Talent 2024</h4>
                                <p>Awal tahun 2024, Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif (Kemenparekraf/Baparekraf) memberikan fasilitas belajar yang ditujukan kepada para generasi mudah masa depan, yaitu Program Baparekraf Digital Talent (BDT) Web Development Bootcamp 2024. Setelah berjalan selama lebih kurang lima (5) bulan, Program BDT 2024 akhirnya membuka BDT Challenge – ...</p>
                            </div>
                        </a>
                    </li>
                    <li class="challenge">
                        <a href="https://www.dicoding.com/blog/share-your-studentplayback-and-win-our-giveaway/" class="challenge-link">
                            <img src="assets/challenge2.jpg" alt="challenge2"/>
                            <div class="challenge-desc">
                                <h4>Share Your #StudentPlayback and Win Our Prize!</h4>
                                <p>Terima kasih telah melangkah bersama Dicoding!  2023 telah menjadi tahun yang penuh dengan perjuangan. Kabar baiknya, kamu berhasil melewati tahun ini dengan berbagai milestone luar biasa🏆   Untuk menutup tahun penuh pencapaian, saatnya mengapresiasi segala usaha dan kerja keras dengan membagikan playback belajar-mu! Jadilah inspirasi bagi lebih banyak calon talenta digital ...</p>
                            </div>
                        </a>
                    </li>
                    <li class="challenge">
                        <a href="https://www.dicoding.com/blog/pengumuman-pemenang-baparekraf-digital-talent-challenge-2023/" class="challenge-link">
                            <img src="assets/challenge3.jpg" alt="challenge3"/>
                            <div class="challenge-desc">
                                <h4>Pengumuman Pemenang Baparekraf Digital Talent Challenge 2023</h4>
                                <p>Pandemi COVID-19 telah menyebabkan disrupsi di berbagai bidang. Lebih jauh, pandemi menyebabkan 13 juta pekerja di sektor pariwisata terdampak langsung, dan ditambah 34 juta pekerja lainnya yang tidak terdampak langsung oleh pandemi. Pasca terpuruk akibat pandemi COVID-19, ekonomi kreatif di Indonesia terus berjuang menjadi garda terdepan mengambil bagian dalam momentum ...</p>
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

    <script src="scripts/challenge.js"></script>
</body>
</html>