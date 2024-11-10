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
            <article class="penjelasan">
                <div class="text">
                    <h3>Apa itu Dicoding?</h3>
                    <p>
                        Dicoding merupakan sebuah platform bagi developer Indonesia untuk belajar, membuat karya digital, meraih validasi industri atas karya tersebut, serta mencari pekerjaan di perusahaan mitra. <!-- enter agar kode mudah dibaca -->
                        Dicoding menawarkan developer journey yang utuh, dimulai dari Academy. Developer yang ingin belajar pemrograman dapat mengikuti kelas di Academy.
                    </p><br/>
                    <p>
                        Dicoding menyediakan banyak event workshop, seminar, pelatihan, ataupun meetup gratis yang bisa developer ikuti dengan mendaftar di Event.
                        Developer yang ingin unjuk kebolehan dan meraih validasi industri atas karya terbaiknya, dapat pula mengikuti lomba di Challenge Dicoding secara gratis.
                        Hak cipta setiap karya dijamin tetap ada pada developer yang bersangkutan.
                    </p><br/>
                    <p> 
                        Developer juga dapat mendaftar lowongan pekerjaan pilihan yang tersedia di Jobs Dicoding.
                        Tak hanya developer yang dapat memanfaatkan fitur Jobs ini.
                        Perusahaan juga dapat memanfaatkannya untuk mencari talenta digital pilihan.
                    </p><br/>
                </div>
                <img src="assets/circle_g.jpg" alt="Dicoding G Logo" />
            </article>
            <article id="visi_misi">
                <h3>Visi & Misi</h3>
                <img src="assets/visi_misi.png" alt="Visi Misi Dicoding"/>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="scripts/index.js"></script>
</body>
</html>