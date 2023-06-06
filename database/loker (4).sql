-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lamaran`
--

CREATE TABLE `detail_lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `pesan_promosi` text NOT NULL,
  `nama_pelamar` varchar(100) NOT NULL,
  `email_pelamar` varchar(100) NOT NULL,
  `telepon_pelamar` varchar(20) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tahun_kelahiran` varchar(5) NOT NULL,
  `alamat_pelamar` varchar(255) NOT NULL,
  `kota_kab_pelamar` varchar(100) NOT NULL,
  `lama_bekerja` varchar(25) NOT NULL,
  `tanggal_lamar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_pekerjaan`
--

CREATE TABLE `info_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `tanggung_jawab` text NOT NULL,
  `keahlian` text NOT NULL,
  `waktu_bekerja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_pekerjaan`
--

INSERT INTO `info_pekerjaan` (`id_pekerjaan`, `id_perusahaan`, `id_lokasi`, `id_kategori`, `judul`, `tipe`, `gaji`, `pendidikan`, `deskripsi`, `gender`, `tanggung_jawab`, `keahlian`, `waktu_bekerja`) VALUES
(6, 6, 1, 1, 'Administrasi Staff', 'Full Time', 'Rp. 2 - 4 Juta', 'Diploma/D1/D2/D3', 'Diperlukan pelamar untuk mengurusi tata kelola administrasi, mengurus segala berkas, membuat laporan, pengarsipan pada perusahaan kami.', 'Laki-Laki atau Perempuan', 'Melakukan tata kelola administrasi perusahaan', '1. Teliti, Detail, dan Cekatan.\r\n2. Terbiasa mengoperasikan komputer, e-mail, dan internet.\r\n3. Memahami alur laporan penjualan.\r\n4. Menguasai Ms. Office terutama Ms. Excel.\r\n5. Memiliki pengalaman di bidang administrasi staff.\r\n6. Memahami bidang marketplace.', 'Jam 9 - 17, Senin - Jum&#039;at'),
(7, 7, 2, 24, 'WORKSHOP BUSSINESS DEVELOPMENT', 'Part Time', 'Rp. 5 - 10 Juta', 'Sarjana / S1', 'PT. DAYA ANUGRAH MANDIRI \r\nDAYA MOTOR\r\nPERUSAHAAN RETAIL SEPEDA MOTOR HONDA', 'Laki-Laki atau Perempuan', '- Melakukan pembinaan, kontrol dan meningkatkan kualitas bengkel untuk memenuhi kepuasan pelanggan.\r\n- Memonitor, mengkoordinir, dan menyusun strategi untuk meningkatkan penjualan bengkel (Service, Parts dan Accessories).\r\n- Mengelola sumber daya manusia meliputi perencanaan tenaga kerja, pengelolaan kinerja, pelatihan dan pengembangan.', '1. Pendidikan minimal S1 Teknik Industri, Teknik Mesin atau Ekonomi Menejemen\r\n2. Memiliki pengalaman minimal 1 tahun.\r\n3. Memiliki ketertarikan dibidang Otomotif, Part &amp; Service.\r\n4. Memiliki Kreatifitas yang tinggi dengan kemampuan analytical thinking yang sangat baik\r\n5. Memiliki Keterampilan Leadership, interpersonal dan komunikasi yang sangat baik.', 'Dapat dirundingkan terlebih dahulu'),
(8, 7, 2, 24, 'MT Kepala Bengkel', 'Full Time', 'Rp. 5 - 10 Juta', 'Diploma/ D3', 'Akan bekerja di bawah pengawasan manajer atau eksekutif perusahaan.', 'Laki-Laki atau Perempuan', '- Membuat perencanaan tahunan Workshop termasuk program promosi dan anggarannya.\r\n- Mengarahkan bawahan dalam membuat rencana kerja bulanan/harian.\r\n- Mengawasi operasional bengkel.\r\n- Memonitor dan me-review implementasi rencana kerja bengkel.\r\n- Membuat laporan periodik dan mempertanggung jawabkan kinerja Bengkel.\r\n- Mengelola SDM bengkel, termasuk perencanaan tenaga kerja, rekrutmen, pengelolaan kinerja, pelatihan dan pengembangan.', '- Pendidikan Minimal D3 Teknik Mesin/ Industri\r\n- Memiliki pengalaman di bidang Automotif minimal selama 1 tahun (minimal sebagai Service Advisor)\r\n- Teliti, Komunikatif', '9.00 - 17.00, Senin - Jum&#039;at'),
(9, 8, 4, 11, 'Trainer/ Guru', 'Part Time', 'Rp. 2 - 4 Juta', 'SMA/Sederajat', 'ROBOTICS® Education Centre (REC) merupakan sebuah lembaga pendidikan yang mengarahkan perhatiannya terhadap perkembangan teknologi memerlukan trainer atau guru yang berkompeten.', 'Laki-Laki atau Perempuan', '- Mengajar tidak hanya sesuai materi, namun juga dapat kreatif memberikan ilmu-ilmu mata pelajaran kepada anak-anak, khususnya anak yang membutuhkan metode penyampaian materi yang berbeda. Karena setiap anak berbeda penyerapan materinya.\r\n- Mendidik semua calon murid dengan baik sehingga dapat mengikuti pelajaran dengan baik dan kondusif.\r\n- Membimbing setiap anak-anak yang mengikuti perlombaan.\r\n- Membuat laporan mengajar, serta data perkembangan tiap murid, agar setiap murid memiliki perkembangan dalam setiap pertemuannya.\r\n- Mengerti sedikit pengetahuan art and craft, agar disaat dibutuhkan guru dapat berimprovisasi agar kelas dapat lebih menarik.\r\n- Menciptakan kelas yang menyenangkan dan harmoni.', '- Memiliki ethos kerja yang baik dan dapat fokus pada performa pekerjaan.\r\n- Dapat diandalkan dan bekerja dalam tim pada lingkungan yang bergerak cepat.\r\n- Teliti, memiliki kemampuan mengatur dan melaksanakan project yang baik.\r\n- Kreatif, imajinatif.\r\n- Dapat mengoperasikan mikrosoft office.\r\n- Dapat sedikit berkomunikasi dengan bahasa inggris ringan.\r\n- Memiliki pemahaman logika yang baik.\r\n- Diutamakan lulusan Teknik/Elektronika/Mekanik.', 'Diskusi stelah recruitment'),
(10, 9, 1, 17, '3D Modeling Animation Designer', 'Full Time', 'Rp. 2 - 4 Juta', 'SMA/Sederajat', 'Are you a motivated, hands-on, talented 3D Animator Designer ready to seize an opportunity to work on a wide range of creative projects for one of the world’s premiere entertainment brands? Based in Bandung is seeking a talented 3D Animator Designer to join our squad. The 3D Designer’s work will help define the look of a wide range of Complex event content.The ideal candidate’s portfolio should demonstrate fresh thinking and creative, cutting-edge work that stands out from the clutter. ', 'Laki-Laki atau Perempuan', 'Creating 3D modeling animation\r\nCommunicating effectively with production staff to fulfill graphic requests\r\nKeeping up with a fast-paced work environment and deliver animations under tight deadlines', 'Fresh Graduate are welcome\r\nHave experience in animation or motion will be a point plus\r\nMust proficient in Cinema 4D+ Octane, After Effects, Illustrator, Photoshop and Premiere also Bridge\r\nExperience in creating 3D modeling\r\nCreative artistic design ability, with quick turn-around skills\r\nHave good skill and interpretation to deliver message from Client&#039;s Brief to KEY VISUAL\r\nProficiency in Social Media trends and content strategies\r\nMust include a link to your 3D modeling portfolio/reel to demonstrate your creative talent and skill set\r\nEntertainment brand experience preferred\r\nWilling and able to handle multiple small daily projects with tight deadlines\r\nStrong communication skills and team player\r\nWilling and able to work flexible hours and long hours, including evenings and weekends as needed\r\nMinimum has one year of working experience in related field \r\nDiploma or Bachelor degree in Animation/Graphic Design preferred', 'Senin - Jum&#039;at, Pukul 10.00 - 17.00'),
(11, 9, 1, 17, 'Motion Animator Designer', 'Full Time', 'Negosiasi', 'SMA/Sederajat', 'Are you a motivated, hands-on, talented Motion Animation Designer ready to seize an opportunity to work on a wide range of creative projects for one of the world’s premiere entertainment brands? Based in Bandung is seeking a talented Motion Animation Designer to join our squad. The Motion Designer’s work will help define the look of a wide range of Complex event content. The ideal candidate’s portfolio should demonstrate fresh thinking and creative, cutting-edge work that stands out from the clutter.  ', 'Laki-Laki atau Perempuan', '- Creating and compositing animation\r\n- Communicating effectively with production staff to fulfill graphic requests\r\n- Keeping up with a fast-paced work environment and deliver animations under tight deadlines', 'Having minimum 1-2 years experience in compositing or motion\r\nHaving experience in creative or animation industry will be a point plus\r\nProficient in After Effects and Photoshop, Illustrator, and Premiere also Media Encoder\r\nCreative artistic design ability, with quick turn-around skills\r\nHave good skill and interpretation to deliver message from Client&#039;s Brief to KEY VISUAL\r\nProficiency in Social Media trends and content strategies\r\nMust include a link to your motion portfolio/reel to demonstrate your creative talent and skill set\r\nEntertainment brand experience preferred\r\nWilling and able to handle multiple small daily projects with tight deadlines\r\nStrong communication skills and team player\r\nWilling and able to work flexible hours and long hours, including evenings and weekends as needed\r\nDiploma or Bachelor degree in Animation/ Multimedia preferred', 'Senin - Jum&#039;at, Pukul 10.00 - 17.00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Administrasi'),
(4, 'Akuntansi dan Keuangan'),
(5, 'Automotive'),
(6, 'Event'),
(7, 'Hukum & Keamanan'),
(8, 'Internet & New Media'),
(9, 'Kontruksi dan Bangunan'),
(10, 'Pabrik dan Manufaktur'),
(11, 'Pendidikan dan Pelatihan'),
(12, 'Pertambangan dan Energi'),
(13, 'Purchasing/ Pembelian'),
(14, 'Retail'),
(15, 'Tranportasi & Logistik'),
(16, 'Advertising & Public Relations'),
(17, 'Arts, Entertainment & Publishing'),
(18, 'Customer Care'),
(19, 'Hospitality & Travel'),
(20, 'Human Resources'),
(21, 'Kecantikan'),
(22, 'Management Consulting'),
(23, 'Pekerjaan Umum'),
(24, 'Penjualan/ Pemasaran'),
(25, 'Programmer'),
(26, 'Research & Development'),
(27, 'Teknik'),
(28, 'Agrikultur'),
(29, 'Asuransi'),
(30, 'Desain'),
(31, 'Hotel'),
(32, 'Information Technology'),
(33, 'Kesehatan dan Kedokteran'),
(34, 'Non-Profit & Volunteer'),
(35, 'Pelayanan Profesional'),
(36, 'Perbankan'),
(37, 'Property & Real Estate'),
(38, 'Restaurant'),
(39, 'Telekomunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_pekerjaan`
--

CREATE TABLE `lokasi_pekerjaan` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_pekerjaan`
--

INSERT INTO `lokasi_pekerjaan` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'Kota Bandung'),
(2, 'Kab. Bandung'),
(3, 'Bandung Barat'),
(4, 'Cimahi'),
(5, 'Sumedang'),
(6, 'Luar Bandung Raya');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `username_pelamar` varchar(100) NOT NULL,
  `password_pelamar` varchar(100) NOT NULL,
  `email_pelamar` varchar(100) NOT NULL,
  `nama_pelamar` varchar(100) NOT NULL,
  `telepon_pelamar` varchar(20) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tahun_kelahiran` varchar(5) NOT NULL,
  `alamat_pelamar` varchar(255) NOT NULL,
  `kota_kab_pelamar` varchar(100) NOT NULL,
  `lama_bekerja` varchar(25) NOT NULL,
  `status_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `username_pelamar`, `password_pelamar`, `email_pelamar`, `nama_pelamar`, `telepon_pelamar`, `foto_pelamar`, `pendidikan_terakhir`, `resume`, `jenis_kelamin`, `tahun_kelahiran`, `alamat_pelamar`, `kota_kab_pelamar`, `lama_bekerja`, `status_akun`) VALUES
(1, 'boy@gmail.com', '123', 'boy@gmail.com', 'Boy Aditya Rohmaulana', '1234567', '6478bead98ec5.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'Jl. Doktor Setiabudi No. 299', 'Bandung', 'Lebih dari 10 Tahun', 1);

--
-- Triggers `pelamar`
--
DELIMITER $$
CREATE TRIGGER `tr_default_foto` BEFORE INSERT ON `pelamar` FOR EACH ROW BEGIN
        IF NEW.foto_pelamar = ''
        THEN
            SET NEW.foto_pelamar = 'default_foto.png';
        END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `username_perusahaan` varchar(100) NOT NULL,
  `password_perusahaan` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `email_perusahaan` varchar(100) NOT NULL,
  `telepon_perusahaan` varchar(20) NOT NULL,
  `website_perusahaan` varchar(255) NOT NULL,
  `logo_perusahaan` varchar(255) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tentang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `username_perusahaan`, `password_perusahaan`, `nama_perusahaan`, `email_perusahaan`, `telepon_perusahaan`, `website_perusahaan`, `logo_perusahaan`, `id_lokasi`, `tentang`) VALUES
(1, 'miegacoan@gmail.com', '123', 'Mie Gacoan', 'miegacoan@gmail.com', '123', 'www.miegacoan.co.id', '6477717caacd8.png', 1, '&quot;Mie Gacoan&quot; adalah sebuah merk dagang dari jaringan restaurant mie pedas no 1 di indonesia, yang menjadi anak perusahaan PT Pesta Pora Abadi.'),
(2, 'inti@gmail.com', '123', 'PT. Inti Optima Teknologi', 'inti@gmail.com', '123', 'www.inti.com', '64788155a0536.png', 2, 'IoT eksis dengan tujuan utama untuk memegang teguh kepercayaan dan akan melayanani kebutuhan Teknologi/Sistem Informasi dari klien'),
(6, 'klikoptima@mail.com', '123', 'PT Klik Optima Indonesia', 'klikoptima@mail.com', '0821222333444', '', '647c445a40eda.jpeg', 1, ''),
(7, 'dayaretail@gmail.com', '123', 'PT Daya Anugrah Mandiri', 'dayaretail@gmail.com', '123', '', '647c4623a09b3.jpeg', 2, ''),
(8, 'roboticedu@xyz.com', '123', 'Robotics Education Centre', 'roboticedu@xyz.com', '123', '', '647c4d76a34ac.jpeg', 4, ''),
(9, 'mki@gmail.com', '123', 'PT Maha Kreasi Indonesia', 'mki@gmail.com', '123', '', 'default_logo.png', 1, '');

--
-- Triggers `perusahaan`
--
DELIMITER $$
CREATE TRIGGER `tr_default_logo` BEFORE INSERT ON `perusahaan` FOR EACH ROW BEGIN
        IF NEW.logo_perusahaan = ''
        THEN
            SET NEW.logo_perusahaan = 'default_logo.png';
        END IF;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_lamaran`
--
ALTER TABLE `detail_lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `fk_dl_pekerjaan` (`id_pekerjaan`),
  ADD KEY `fk_dl_pelamar` (`id_pelamar`);

--
-- Indexes for table `info_pekerjaan`
--
ALTER TABLE `info_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `fk_info_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_info_kategori` (`id_kategori`),
  ADD KEY `fk_info_lokasi` (`id_lokasi`);

--
-- Indexes for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi_pekerjaan`
--
ALTER TABLE `lokasi_pekerjaan`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `fk_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_lamaran`
--
ALTER TABLE `detail_lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `info_pekerjaan`
--
ALTER TABLE `info_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `lokasi_pekerjaan`
--
ALTER TABLE `lokasi_pekerjaan`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_lamaran`
--
ALTER TABLE `detail_lamaran`
  ADD CONSTRAINT `fk_dl_pekerjaan` FOREIGN KEY (`id_pekerjaan`) REFERENCES `info_pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dl_pelamar` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE;

--
-- Constraints for table `info_pekerjaan`
--
ALTER TABLE `info_pekerjaan`
  ADD CONSTRAINT `fk_info_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_pekerjaan` (`id_kategori`),
  ADD CONSTRAINT `fk_info_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_pekerjaan` (`id_lokasi`),
  ADD CONSTRAINT `fk_info_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `fk_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_pekerjaan` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
