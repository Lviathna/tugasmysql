-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nidn` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `prodi` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nidn`, `nama`, `prodi`, `email`) VALUES
(123456789, 'Dr. Andi Setiawan', 'Teknik Informatika', 'andi.setiawan@univ.ac.id'),
(123456790, 'Dr. Budi Santoso', 'Sistem Informasi', 'budi.santoso@univ.ac.id'),
(123456791, 'Dr. Citra Lestari', 'Manajemen', 'citra.lestari@univ.ac.id'),
(123456792, 'Dr. Dedi Kurniawan', 'Akuntansi', 'dedi.kurniawan@univ.ac.id'),
(123456793, 'Dr. Eka Pratama', 'Teknik Elektro', 'eka.pratama@univ.ac.id'),
(123456794, 'Dr. Farah Nabila', 'Pendidikan Bahasa Inggris', 'farah.nabila@univ.ac.id'),
(123456795, 'Dr. Galih Ramadhan', 'Teknik Sipil', 'galih.ramadhan@univ.ac.id'),
(123456796, 'Dr. Hani Putri', 'Ilmu Komunikasi', 'hani.putri@univ.ac.id'),
(123456797, 'Dr. Indra Wijaya', 'Hukum', 'indra.wijaya@univ.ac.id'),
(123456798, 'Dr. Joko Susilo', 'Psikologi', 'joko.susilo@univ.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` int(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `prodi` varchar(120) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama`, `prodi`, `angkatan`, `email`) VALUES
(20210001, 'Ahmad Fauzi', 'Teknik Informatika', 2021, 'ahmad.fauzi@univ.ac.id'),
(20210002, 'Siti Nurhaliza', 'Sistem Informasi', 2021, 'siti.nurhaliza@univ.ac.id'),
(20210003, 'Rudi Hartono', 'Manajemen', 2020, 'rudi.hartono@univ.ac.id'),
(20210004, 'Dewi Kartika', 'Akuntansi', 2022, 'dewi.kartika@univ.ac.id'),
(20210005, 'Fajar Prasetyo', 'Teknik Elektro', 2021, 'fajar.prasetyo@univ.ac.id'),
(20210006, 'Lina Marlina', 'Pendidikan Bahasa Inggris', 2020, 'lina.marlina@univ.ac.id'),
(20210007, 'Bayu Saputra', 'Teknik Sipil', 2022, 'bayu.saputra@univ.ac.id'),
(20210008, 'Rani Oktaviani', 'Ilmu Komunikasi', 2021, 'rani.oktaviani@univ.ac.id'),
(20210009, 'Dimas Nugroho', 'Hukum', 2020, 'dimas.nugroho@univ.ac.id'),
(20210010, 'Maya Sari', 'Psikologi', 2022, 'maya.sari@univ.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `kodematkul` varchar(30) NOT NULL,
  `namamatkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `nidn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`kodematkul`, `namamatkul`, `sks`, `nidn`) VALUES
('AK104', 'Akuntansi Dasar', 3, 123456792),
('HK109', 'Hukum Perdata', 3, 123456797),
('IK108', 'Teori Komunikasi', 2, 123456796),
('MN103', 'Pengantar Manajemen', 2, 123456791),
('PB106', 'Metodologi Pengajaran Bahasa', 2, 123456794),
('PS110', 'Psikologi Umum', 2, 123456798),
('SI102', 'Basis Data', 3, 123456790),
('TE105', 'Rangkaian Listrik', 3, 123456793),
('TI101', 'Pengantar Teknologi Informasi', 3, 123456789),
('TS107', 'Mekanika Teknik', 3, 123456795);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai` double DEFAULT NULL,
  `nilaiHuruf` char(10) NOT NULL,
  `kodematkul` varchar(10) NOT NULL,
  `nim` int(11) NOT NULL,
  `nidn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nilai`, `nilaiHuruf`, `kodematkul`, `nim`, `nidn`) VALUES
(1, 85, 'A', 'IK108', 20210004, 123456789),
(2, 78, 'B+', 'AK104', 20210001, 123456790),
(3, 72, 'B', 'HK109', 20210010, 123456797),
(4, 65, 'C+', 'PB106', 20210008, 123456791),
(5, 90, 'A', 'PS110', 20210003, 123456791),
(6, 80, 'B+', 'HK109', 20210010, 123456795),
(7, 68, 'C+', 'PB106', 20210003, 123456796),
(8, 75, 'B', 'IK108', 20210005, 123456793),
(9, 60, 'C', 'PS110', 20210003, 123456795),
(10, 88, 'A-', 'PB106', 20210004, 123456792);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nidn`) USING BTREE;

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`) USING BTREE;

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`kodematkul`) USING BTREE,
  ADD KEY `nidn` (`nidn`) USING BTREE;

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`) USING BTREE,
  ADD KEY `kodematkul` (`kodematkul`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nidn` (`nidn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD CONSTRAINT `tbl_matkul_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `tbl_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`kodematkul`) REFERENCES `tbl_matkul` (`kodematkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`nidn`) REFERENCES `tbl_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
