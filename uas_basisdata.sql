-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 10:27 AM
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
-- Database: `uas_basisdata`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `format_nama_dosen` (`nama_lengkap` VARCHAR(100)) RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
    DECLARE nama_pendek VARCHAR(100);
    SET nama_pendek = SUBSTRING_INDEX(nama_lengkap, ',', 1);
    RETURN nama_pendek;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_usia` (`tanggal_lahir` DATE) RETURNS INT(11) DETERMINISTIC BEGIN
    DECLARE usia INT;
    SET usia = TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE());
    RETURN usia;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kd_ds` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kd_ds`, `nama`) VALUES
('DS001', 'Aditya Saputra, S.T., M.Kom.'),
('DS002', 'Dede Kurniawan, S.T., M.Sc.'),
('DS003', 'Sintia Putri, S.T., M.Kom.'),
('DS004', 'Darmanto, S.Kom., M.Kom.'),
('DS005', 'Wulandari, S.T., M.T.I.'),
('DS006', 'Rahmat Fauzi, S.T, M.T.'),
('DS007', 'Ilham Setiawan, S.Kom., M.Kom.'),
('DS008', 'Bagus Sanjaya, S.Kom., M.Kom.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalmengajar`
--

CREATE TABLE `jadwalmengajar` (
  `id_jadwal` int(11) NOT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `kd_mk` varchar(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL,
  `ruang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwalmengajar`
--

INSERT INTO `jadwalmengajar` (`id_jadwal`, `kd_ds`, `kd_mk`, `hari`, `jam`, `ruang`) VALUES
(1, 'DS001', 'MK001', 'Senin', '08:00', 'R101'),
(2, 'DS002', 'MK002', 'Selasa', '10:00', 'R102'),
(3, 'DS003', 'MK003', 'Rabu', '13:00', 'R103'),
(4, 'DS004', 'MK004', 'Kamis', '09:00', 'R104'),
(5, 'DS005', 'MK005', 'Jumat', '10:00', 'R105'),
(6, 'DS006', 'MK006', 'Senin', '11:00', 'R106'),
(7, 'DS007', 'MK007', 'Rabu', '14:00', 'R107'),
(8, 'DS008', 'MK008', 'Kamis', '15:00', 'R108');

-- --------------------------------------------------------

--
-- Table structure for table `krsmahasiswa`
--

CREATE TABLE `krsmahasiswa` (
  `id_krs` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `kd_mk` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `nilai` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krsmahasiswa`
--

INSERT INTO `krsmahasiswa` (`id_krs`, `nim`, `kd_ds`, `kd_mk`, `semester`, `nilai`) VALUES
(1, '22050108', 'DS001', 'MK001', 4, 'A'),
(2, '22050107', 'DS002', 'MK002', 4, 'A-'),
(3, '22050106', 'DS003', 'MK003', 2, 'B+'),
(4, '22050105', 'DS004', 'MK004', 2, 'B'),
(5, '22050104', 'DS005', 'MK005', 3, 'A'),
(6, '22050103', 'DS006', 'MK006', 4, 'A'),
(7, '22050102', 'DS007', 'MK007', 3, 'B+'),
(8, '22050101', 'DS008', 'MK008', 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tgl_lahir`, `no_hp`, `alamat`, `jalan`, `kota`, `kodepos`, `kd_ds`) VALUES
('22050101', 'Ali Maulana', 'L', '2002-01-01', '08123456701', 'Jl. Mawar 1', 'Jl. Mawar 1', 'Bandung', '40111', 'DS001'),
('22050102', 'Dina Larasati', 'P', '2001-02-02', '08123456702', 'Jl. Melati 2', 'Jl. Melati 2', 'Jakarta', '10230', 'DS001'),
('22050103', 'Rizky Ramadhan', 'L', '2002-03-03', '08123456703', 'Jl. Anggrek 3', 'Jl. Anggrek 3', 'Yogyakarta', '55281', 'DS002'),
('22050104', 'Nina Putri', 'P', '2001-04-04', '08123456704', 'Jl. Kenanga 4', 'Jl. Kenanga 4', 'Surabaya', '60292', 'DS002'),
('22050105', 'Dimas Pratama', 'L', '2002-05-05', '08123456705', 'Jl. Dahlia 5', 'Jl. Dahlia 5', 'Semarang', '50123', 'DS001'),
('22050106', 'Sarah Ayu', 'P', '2001-06-06', '08123456706', 'Jl. Teratai 6', 'Jl. Teratai 6', 'Malang', '65123', 'DS003'),
('22050107', 'Rendy Saputra', 'L', '2002-07-07', '08123456707', 'Jl. Kamboja 7', 'Jl. Kamboja 7', 'Bogor', '16111', 'DS003'),
('22050108', 'Putri Melati', 'P', '2001-08-08', '08123456708', 'Jl. Melur 8', 'Jl. Melur 8', 'Padang', '25112', 'DS004'),
('22050109', 'Fajar Nugraha', 'L', '2002-09-09', '08123456709', 'Jl. Mawar 9', 'Jl. Mawar 9', 'Medan', '20111', 'DS004'),
('22050110', 'Citra Ayuningtyas', 'P', '2001-10-10', '08123456710', 'Jl. Cempaka 10', 'Jl. Cempaka 10', 'Palembang', '30123', 'DS005'),
('22050111', 'Galih Prasetyo', 'L', '2002-11-11', '08123456711', 'Jl. Wijaya 11', 'Jl. Wijaya 11', 'Pontianak', '78121', 'DS005'),
('22050112', 'Laras Sekar', 'P', '2001-12-12', '08123456712', 'Jl. Mahoni 12', 'Jl. Mahoni 12', 'Balikpapan', '76112', 'DS006'),
('22050113', 'Andika Surya', 'L', '2002-12-01', '08123456713', 'Jl. Jati 13', 'Jl. Jati 13', 'Banjarmasin', '70123', 'DS006'),
('22050114', 'Ayu Puspita', 'P', '2001-11-01', '08123456714', 'Jl. Pinus 14', 'Jl. Pinus 14', 'Makassar', '90111', 'DS007'),
('22050115', 'Budi Hartono', 'L', '2002-10-01', '08123456715', 'Jl. Cemara 15', 'Jl. Cemara 15', 'Manado', '95123', 'DS008');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_mk` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_mk`, `nama`, `sks`) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Web', 3),
('MK003', 'Algoritma dan Struktur Data', 4),
('MK004', 'Sistem Operasi', 3),
('MK005', 'Jaringan Komputer', 3),
('MK006', 'Kecerdasan Buatan', 2),
('MK007', 'Pemrograman Mobile', 3),
('MK008', 'Interaksi Manusia dan Komputer', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kd_ds`);

--
-- Indexes for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kd_ds` (`kd_ds`),
  ADD KEY `kd_mk` (`kd_mk`);

--
-- Indexes for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kd_ds` (`kd_ds`),
  ADD KEY `kd_mk` (`kd_mk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_ds` (`kd_ds`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_mk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwalmengajar`
--
ALTER TABLE `jadwalmengajar`
  ADD CONSTRAINT `jadwalmengajar_ibfk_1` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`),
  ADD CONSTRAINT `jadwalmengajar_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`);

--
-- Constraints for table `krsmahasiswa`
--
ALTER TABLE `krsmahasiswa`
  ADD CONSTRAINT `krsmahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `krsmahasiswa_ibfk_2` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`),
  ADD CONSTRAINT `krsmahasiswa_ibfk_3` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_ds`) REFERENCES `dosen` (`kd_ds`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
