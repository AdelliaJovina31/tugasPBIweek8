-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 01:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dicoding_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_artikel`
--

CREATE TABLE `berita_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` enum('1','2','3') NOT NULL,
  `tgl_terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita_artikel`
--

INSERT INTO `berita_artikel` (`id_artikel`, `judul`, `deskripsi`, `author`, `foto`, `kategori`, `tgl_terbit`) VALUES
(1, 'Bertemunya Internet of Things dan AI', 'Apa yang terjadi ketika semua hal yang terhubung dengan internet memiliki kecerdasan buatan? Perkembangan internet of things (IoT) telah membawa kita ke era ketika segala sesuatu terhubung ke internet. Semua objek monitoring saling terkoneksi dalam satu jaringan sehingga kita dapat melihat datanya secara remote.  Namun, apa yang akan terjadi jika ...', 'Achmad Ilham', 'news1.jpg', '1', '2024-07-31'),
(2, 'DIBUKA! Digital Talent Scholarship Professional Academy (DTS PROA) Alur Cybersecurity', 'Setelah sukses memberikan pelatihan Google Career Certificates (GCC) pada batch 2 di tahun 2024, Kementerian Komunikasi dan Informatika RI kembali bekerja sama dengan GCC dan Dicoding, membuka kesempatan pelatihan gratis bagi para profesional melalui program Digital Talent Scholarship (DTS) 2024. Pelatihan ini ditujukan bagi para profesional yang ingin meningkatkan kapabilitas ...', 'Dicoding Indonesia', 'news2.jpg', '1', '2024-08-15'),
(3, 'Inilah Pembaruan Gemini Paling Mutakhir dalam Google I/O 2024', 'Google I/O ini merupakan kegiatan tahunan yang diadakan oleh Google, seperti Google I/O 2023, pembaruan yang terdapat di Google I/O dapat dibagi menjadi berbagai bidang, seperti mobile, web, ML/AI, dan cloud. Google I/O 2024 diadakan secara online pada tanggal 14 Mei 2024 dan banyak pembaruan yang diumumkan, salah satunya pembaruan ...', 'Bervianto Leo Pratama', 'news3.jpg', '1', '2024-08-21'),
(4, 'Putra Petani yang Bercita-Cita Punya Perusahaan Konsultan Teknologi Sendiri', 'Cerita Gio Fandi H. Nainggolan, Lulusan DTS PROA 2024 – Manajemen Proyek, yang Bercita-Cita Punya Perusahaan Konsultan Teknologi Sendiri Punya keterbatasan sumber daya adalah sesuatu yang sudah biasa Gio Fandi H. Nainggolan (28) alami sejak kecil. Semangat Gio—begitu ia dipanggil—untuk mencapai banyak hal sangat tinggi, tetapi ia harus berdamai dengan ...', 'Audrey Diwantri Alodia', 'academy1.jpg', '2', '2024-09-30'),
(5, 'Rahasia di Balik Komputer Ngebut: Pentingnya RAM di Era Digital', 'Dalam dunia komputasi modern, kita semua mendambakan perangkat yang cepat dan responsif. Entah itu untuk multitasking, gaming, atau sekadar browsing, memiliki komputer yang ngebut jadi prioritas. Namun, apa sih sebenarnya rahasia di balik performa komputer yang cepat? Salah satu jawabannya terletak pada komponen kecil, tetapi sangat penting—RAM (random access memory). ...', 'Nanang Sutisna', 'academy2.jpg', '2', '2024-09-28'),
(6, 'Kenali Constructive Feedback: Definisi, Contoh, dan Dampaknya', 'Apa itu Feedback? Pernah mengomentari tindakan atau hasil pekerjaan yang dilakukan orang lain? Atau alih-alih mengomentari seseorang, kamulah yang dikomentari?  Respons atau komentar yang diberikan tersebut adalah feedback. Dalam Bahasa Indonesia, feedback berarti umpan balik. Umpan balik ini bisa berisi testimoni, komentar, penilaian, atau ulasan atas tindakan atau hasil kerja ...', 'Ahmad Arif Faizin', 'academy3.jpg', '2', '2024-09-26'),
(7, 'Terbuka untuk Umum! BDT Challenge – Baparekraf Digital Talent 2024', 'Awal tahun 2024, Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif (Kemenparekraf/Baparekraf) memberikan fasilitas belajar yang ditujukan kepada para generasi mudah masa depan, yaitu Program Baparekraf Digital Talent (BDT) Web Development Bootcamp 2024. Setelah berjalan selama lebih kurang lima (5) bulan, Program BDT 2024 akhirnya membuka BDT Challenge – ...', 'Adrianus Yoza Aprilio', 'challenge1.jpg', '3', '2024-05-17'),
(8, 'Share Your #StudentPlayback and Win Our Prize!', 'Terima kasih telah melangkah bersama Dicoding!  2023 telah menjadi tahun yang penuh dengan perjuangan. Kabar baiknya, kamu berhasil melewati tahun ini dengan berbagai milestone luar biasa🏆   Untuk menutup tahun penuh pencapaian, saatnya mengapresiasi segala usaha dan kerja keras dengan membagikan playback belajar-mu! Jadilah inspirasi bagi lebih banyak calon talenta digital ...', 'Atika Rahma Devina', 'challenge2.jpg', '3', '2023-12-17'),
(9, 'Pengumuman Pemenang Baparekraf Digital Talent Challenge 2023', 'Pandemi COVID-19 telah menyebabkan disrupsi di berbagai bidang. Lebih jauh, pandemi menyebabkan 13 juta pekerja di sektor pariwisata terdampak langsung, dan ditambah 34 juta pekerja lainnya yang tidak terdampak langsung oleh pandemi. Pasca terpuruk akibat pandemi COVID-19, ekonomi kreatif di Indonesia terus berjuang menjadi garda terdepan mengambil bagian dalam momentum ...', 'Dicoding Indonesia', 'challenge3.jpg', '3', '2023-10-06'),
(10, 'Batik Indonesia', 'Batik adalah warisan budaya Indonesia yang sudah diakui secara global', 'Someone', '672ff42c84ce92.82451942.jpg', '1', '2024-11-10'),
(11, 'test', 'test', 'unknown', '672ff50b0f12d1.87909680.jpeg', '1', '2024-11-10'),
(12, 'testlagi', 'lkjkj', 'aksjd', '672ff5c904c3f7.29284617.jpg', '2', '2024-11-03'),
(13, 'lagi', 'kjnas', 'kjasd', '672ff612852920.35119853.jpg', '2', '2024-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `program_pelatihan`
--

CREATE TABLE `program_pelatihan` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_pelatihan`
--

INSERT INTO `program_pelatihan` (`id_program`, `nama_program`, `deskripsi`, `foto`) VALUES
(1, 'IDCamp 2024', 'IDCamp adalah program beasiswa yang diselenggarakan oleh Indosat Ooredoo Hutchison untuk mencetak developer muda Indonesia yang siap bersaing.', 'idcamp2024.png'),
(2, 'Dicoding Bangun Negeri Batch 7', 'Program beasiswa yang ditujukan kepada mahasiswa/i aktif Indonesia untuk menjadi talenta digital berkualitas.', 'dicoding_bangun_negeri.jpg'),
(3, 'AWS Back-End Academy 2024', 'Program beasiswa pelatihan dan sertifikasi Back-End dari AWS untuk mencetak talenta digital di bidang Back-End development berstandar global.', 'aws_backend_academy.jpg'),
(4, 'Test', 'Test input', '672fee319fe666.89213227.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `program_user`
--

CREATE TABLE `program_user` (
  `id_program_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_user`
--

INSERT INTO `program_user` (`id_program_user`, `id_user`, `id_program`) VALUES
(1, 1, 1),
(2, 5, 2),
(3, 1, 3),
(4, 7, 1),
(5, 8, 2),
(6, 9, 3),
(7, 4, 1),
(8, 3, 3),
(9, 7, 2),
(10, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `role`) VALUES
(1, 'Agus', 'Sutanto', 'agus@gmail.com', 'agus12345', '2'),
(2, 'Sumaryo', 'Kusumo', 'sumaryo@gmail.com', 'sumaryo123', '2'),
(3, 'Santi', 'Mawarati', 'santi@gmail.com', 'santi12345', '2'),
(4, 'Budi', 'Purnama', 'budi@gmail.com', 'budi12345', '2'),
(5, 'Fanny', 'Ayuwati', 'fanny@gmail.com', 'fanny12345', '2'),
(6, 'Hanny', 'Sunarti', 'hanny@gmail.com', 'hanny123', '2'),
(7, 'Harry', 'Mardano', 'harry@gmail.com', 'harry12345', '3'),
(8, 'Surya', 'Hartanto', 'surya@gmail.com', 'surya12345', '3'),
(9, 'Fatmawati', 'Rahayu', 'fatma@gmail.com', 'fatma12345', '3'),
(10, 'Shereen', 'Cristal', 'sher@gmail.com', 'sher12345', '1'),
(11, 'Jack', 'Purwanto', 'jack@gmail.com', 'jack12345', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_artikel`
--
ALTER TABLE `berita_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `program_user`
--
ALTER TABLE `program_user`
  ADD PRIMARY KEY (`id_program_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_artikel`
--
ALTER TABLE `berita_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program_user`
--
ALTER TABLE `program_user`
  ADD CONSTRAINT `fk_program_user` FOREIGN KEY (`id_program`) REFERENCES `program_pelatihan` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_program` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
