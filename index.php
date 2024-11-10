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
    
    <script defer src="scripts/index.js"></script>
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
        <div id="content">
            <article class="welcome">
                <h2>Mau jadi developer handal, <br>tapi bingung bagaimana cara memulainya?</h2>
                <img src="assets/thinking.png" alt="Thinking Ilustration" />
            </article>
            <article class="solution">
                <img src="https://static.vecteezy.com/system/resources/previews/008/826/724/non_2x/programmer-developer-engineer-with-laptop-sitting-at-the-office-desk-holding-a-pen-while-coding-and-developing-concept-illustration-free-vector.jpg" alt="Coding" />
                <div class="text">
                    <h3>Bangun Karirmu Sebagai Developer</h3>
                    <p>dengan mulai belajar terarah melalui learning path</p>
                </div>
            </article>
            <article class="learning-path">
                <h3>Learning Path</h3>
                <p>Learning path akan membantu Anda dalam belajar di Academy dengan kurikulum yang dibangun bersama pelaku industri ternama.</p>
                <div class="learning-path-partner">
                    <table cellpadding="15px">
                        <tr>
                            <td><img src="https://dicoding-web-img.sgp1.cdn.digitaloceanspaces.com/original/academy/dos:simulasi_ujian_associate_android_developer_partner_010422110105.png" height="30px"/></td>
                            <td><img src="https://cdn.prod.website-files.com/637e4cd92c6f22c15a5225fd/654bda7f55747d2628e81451_%5BNOV-2023%5D-Google-Cloud-Partner_website_badge.png" height="60px"/></td>
                            <td><img src="https://edu.datascrip.com/files/GfE-Partner-Badges-Horizontal.png" height="60px"/></td>
                        </tr>
                    </table>
                </div>
                <div class="learning-path-partner">
                    <table cellpadding="15px">
                        <tr>
                            <td><img src="assets/google.jpg" height="30px"/></td>
                            <td><img src="assets/microsoft.jpg" height="60px"/></td>
                            <td><img src="assets/aws.jpg" height="45px"/></td>
                            <td><img src="assets/ibm.png" height="40px"/></td>
                            <td><img src="assets/line.jpg" height="30px"/></td>
                        </tr>
                    </table>
                </div>
            </article>
            <hr>
            <article id="pencapaian">
                <div class="pencapaian_list">
                    <div class="icon">
                        <i class="fa-solid fa-user-group fa-xl"></i>
                        <h4>992.501</h4>
                    </div>
                    <p>Developer aktif yang telah bergabung</p>
                </div>
                <div class="pencapaian_list">
                    <div class="icon">
                        <i class="fa-solid fa-graduation-cap fa-xl"></i>
                        <h4>165</h4>
                    </div>
                    <p>Kelas yang telah tersedia</p>
                </div>
                <div class="pencapaian_list">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-check fa-xl"></i>
                        <h4>2104</h4>
                    </div>
                    <p>Event terselenggara di seluruh Indonesia</p>
                </div>
                <div class="pencapaian_list">
                    <div class="icon">
                        <i class="fa-solid fa-briefcase fa-xl"></i>
                        <h4>2091</h4>
                    </div>
                    <p>Job untuk developer yang telah dibuka</p>
                </div>
                <div class="pencapaian_list">
                    <div class="icon">
                        <i class="fa-solid fa-puzzle-piece fa-xl"></i>
                        <h4>245</h4>
                    </div>
                    <p>Challenge yang telah diselenggarakan</p>
                </div>
            </article>
            <hr>
            <article class="partner">
                <h3>Telah dipercaya oleh:</h3>
                <table class="partner_logo" cellpadding="15px">
                    <tr>
                        <td><img src="assets/google.jpg" height="30px"/></td>
                        <td><img src="assets/microsoft.jpg" height="60px"/></td>
                        <td><img src="assets/aws.jpg" height="45px"/></td>
                        <td><img src="assets/ibm.png" height="40px"/></td>
                        <td><img src="assets/indosat.jpg" height="40px"/></td>
                        <td><img src="assets/kemenparekraf.jpg" height="90px"/></td>
                    </tr>
                    <tr>
                        <td><img src="assets/lintasarta.jpg" height="60px"/></td>
                        <td><img src="assets/line.jpg" height="30px"/></td>
                        <td><img src="assets/alcatel_lucent.jpg" height="120px"/></td>
                        <td><img src="assets/samsung.png" height="50px"/></td>
                        <td><img src="assets/ericsson.png" height="90px"/></td>
                        <td><img src="assets/dbs_foundation.jpg" height="30px"/></td>
                    </tr>
                    <tr>
                        <td><img src="assets/lenovo.jpg" height="20px"/></td>
                        <td><img src="assets/intel.jpg" height="20px"/></td>
                        <td><img src="assets/xl_axiata.png" height="55px"/></td>
                        <td><img src="assets/kemkominfo.jpg" height="55px"/></td>
                        <td><img src="assets/kampus_merdeka.jpg" height="50px"/></td>
                        <td><img src="assets/bangkit.jpg" height="30px"/></td>
                    </tr>
                </table>
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
</body>
</html>