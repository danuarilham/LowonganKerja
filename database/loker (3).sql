-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 12:24 PM
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
-- Table structure for table `detail_lamaran`
--

CREATE TABLE `detail_lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `pesan_promosi` text NOT NULL,
  `status_lamaran` int(11) NOT NULL,
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

--
-- Dumping data for table `detail_lamaran`
--

INSERT INTO `detail_lamaran` (`id_lamaran`, `id_pekerjaan`, `id_pelamar`, `pesan_promosi`, `status_lamaran`, `nama_pelamar`, `email_pelamar`, `telepon_pelamar`, `foto_pelamar`, `pendidikan_terakhir`, `resume`, `jenis_kelamin`, `tahun_kelahiran`, `alamat_pelamar`, `kota_kab_pelamar`, `lama_bekerja`, `tanggal_lamar`) VALUES
(4, 2, 1, 'bang aku heker looohhhh', 0, 'Boy Aditya Rohmaulana', 'boy@gmail.com', '1234567', '6476185ba637b.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'subang KAPAN ADA GACOAN???????', 'Bandung', 'Lebih dari 10 Tahun', '2023-06-01 22:15:36'),
(6, 2, 1, 'COK', 0, 'Boy Aditya Rohmaulana', 'boy@gmail.com', '1234567', '6476185ba637b.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'subang KAPAN ADA GACOAN???????', 'Bandung', 'Lebih dari 10 Tahun', '2023-06-01 22:18:52'),
(7, 2, 1, 'hehe', 0, 'Boy Aditya Rohmaulana', 'boy@gmail.com', '1234567', '6478bead98ec5.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'subang KAPAN ADA GACOAN???????', 'Bandung', 'Lebih dari 10 Tahun', '2023-06-01 22:52:28'),
(8, 1, 1, 'kl', 0, 'Boy Aditya Rohmaulana', 'boy@gmail.com', '1234567', '6478bead98ec5.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'subang KAPAN ADA GACOAN???????', 'Bandung', 'Lebih dari 10 Tahun', '2023-06-02 15:17:24'),
(9, 3, 1, 'dffdg', 0, 'Boy Aditya Rohmaulana', 'boy@gmail.com', '1234567', '6478bead98ec5.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'subang KAPAN ADA GACOAN???????', 'Bandung', 'Lebih dari 10 Tahun', '2023-06-02 15:17:37');

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
(1, 1, 1, 1, 'Chef Restoran', 'Full Time', '3000000', 'S1', 'chef yang jago', '', '', '', ''),
(2, 2, 2, 2, 'Programmer', 'Full Time', '5000000', 'S1', 'programmer yang jago', '', '', '', ''),
(3, 1, 1, 2, 'test12', 'Freelance', '100000', 'SMA/Sederajat', 'waduh', '', '', '', ''),
(4, 5, 2, 2, 'salma gacoan', 'Full Time', '5000', 'Sarjana / S1', 'waduh', '', '', '', ''),
(5, 1, 1, 1, 'Staff IT Design', 'Full Time', 'Rp. 5 - 10 Juta', 'Sarjana / S1', 'Kantor Notaris PPAT Mario Christo merupakan salah satu kantor notaris yang berlokasi di Tangerang. Kami saat ini membutuhkan Admin IT – Desain yang bertugas untuk mengelola graphic dan web konten Kantor.', 'Laki-Laki', '– Mempersiapkan laporan klien\r\n– Mempersiapkan proposal klien\r\n– Administrasi komputer (saas)\r\n– Manajemen dokumen\r\n– Manajemen konten (web system)\r\n– Menyimpan seluruh data pada komputer yang digunakan user\r\n– Mengarsip dokumen dan graphic assets\r\n– Melakukan pencatatan kantor\r\n– Membuat laporan berkala', '– Keahlian sistem administrasi komputer\r\n– Memiliki kemampuan komunikasi logis\r\n– Wajib memiliki keahlian standar Office (Ms Word, Ms Excel dan PowerPoint)\r\n– Memiliki Kemampuan Desain (diutamakan Photoshop/Illustrator)\r\n– Manajemen konten (web system)\r\n– Memiliki pengetahuan yang baik di bidang teknologi informasi\r\n– Memahami aplikasi web dengan baik', 'Senin – Jumat , Pukul 08.00 – 17.00 WIB dan Sabtu 08.00 – 12.00 WIB');

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
(2, 'Chef');

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
(1, 'boy@gmail.com', '123', 'boy@gmail.com', 'Boy Aditya Rohmaulana', '1234567', '6478bead98ec5.jpg', 'Doctor / S3', '6476185ba6aae.pdf', 'Laki-Laki', '2003', 'Jl. Doktor Setiabudi No. 299', 'Bandung', 'Lebih dari 10 Tahun', 1),
(2, 'pahreja@gmail.com', '', 'pahreja@gmail.com', '', '', '', '', '', '', '', '', '', '', 0),
(4, 'samla@gmail.com', '123', 'samla@gmail.com', '', '', 'default_foto.png', '', '', '', '', '', '', '', 0);

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
(5, 'salma@gmail.com', '123', 'salma', 'salma@gmail.com', '123', '', 'default_logo.png', 2, '');

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
-- Indexes for table `detail_lamaran`
--
ALTER TABLE `detail_lamaran`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indexes for table `info_pekerjaan`
--
ALTER TABLE `info_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

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
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_lamaran`
--
ALTER TABLE `detail_lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `info_pekerjaan`
--
ALTER TABLE `info_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
