-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 01:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_seleksi_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_beasiswa`
--

CREATE TABLE `tb_beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `jenis_beasiswa` varchar(70) NOT NULL,
  `kuota` int(11) NOT NULL,
  `periode` varchar(40) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tgl_penutupan` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `jenis_beasiswa`, `kuota`, `periode`, `tgl_pendaftaran`, `tgl_penutupan`, `file`, `status`) VALUES
(1, 'KIP-Kuliah', 1, '2022', '2022-01-01', '2022-02-01', '44c037bd7debdbe66bf75d3acd59f571.pdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `nim`, `file1`, `file2`) VALUES
(15, '1462200049', '8e03b7be8e3b9ac599b139d9a6d7beca.pdf', 'e2c477b621c405050370dffddb010083.pdf'),
(16, '1462200035', '39b7015770ce1242bd2a6ace0d1ab957.pdf', '5d5ef8fe556be894ae003fa45e046a9d.pdf'),
(17, '1462200081', 'ba76c405e1a06edd0b2fb752d529be9e.pdf', 'db2b96a6f13323ad78f114d52708469b.pdf'),
(18, '1462200092', '38e61c83f75e6da80a6f32e91c8868e6.pdf', '7957e64b3e51aa8c72e6e3baab53f8cd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_nilai` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_nilai`, `nim`, `nilai`) VALUES
(12, '1462200049', 0.675),
(13, '1462200035', 0.875),
(14, '1462200081', 0.6125),
(15, '1462200092', 0.7125);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_bobot` double DEFAULT NULL,
  `atribut_kriteria` varchar(10) NOT NULL,
  `id_beasiswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_bobot`, `atribut_kriteria`, `id_beasiswa`) VALUES
(1, 'Nilai Rata-Rata Rapot', 0.35, 'Benefit', '1'),
(6, 'Penghasilan Orang Tua', 0.3, 'Cost', '1'),
(7, 'Jumlah Tanggungan', 0.2, 'Benefit', '1'),
(8, 'Satus Anak', 0.05, 'Cost', '1'),
(18, 'Kartu Sosial', 0.1, 'Benefit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `jurusan` varchar(70) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `id_beasiswa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `jurusan`, `angkatan`, `id_beasiswa`) VALUES
(2, 'Putra Dwi Andrianto', '1462200064', 'Teknik Informatika', '2022', ''),
(3, 'Gito Pramana Karya ', '1462200049', 'Teknik Industri', '2022', '1'),
(4, 'Miftakul Huda', '1462200035', 'Teknik Informatika', '2022', '1'),
(6, 'Muhammad Haris', '1462200081', 'Teknik Informatika', '2022', '1'),
(7, 'Muhammad jamaludin', '1462200092', 'Teknik Informatika', '2022', '1'),
(8, 'Adit WIjanarko', '1462000121', 'Teknik Informatika', '2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `id_subkriteria` varchar(3) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nilai`, `id_kriteria`, `id_subkriteria`, `nim`, `nilai`) VALUES
(117, '1', '3', '1462200049', 2),
(118, '6', '9', '1462200049', 2),
(119, '7', '13', '1462200049', 1),
(120, '8', '18', '1462200049', 1),
(121, '18', '22', '1462200049', 1),
(122, '1', '5', '1462200035', 4),
(123, '6', '10', '1462200035', 3),
(124, '7', '16', '1462200035', 4),
(125, '8', '19', '1462200035', 2),
(126, '18', '23', '1462200035', 2),
(127, '1', '4', '1462200081', 3),
(128, '6', '11', '1462200081', 4),
(129, '7', '13', '1462200081', 1),
(130, '8', '18', '1462200081', 1),
(131, '18', '26', '1462200081', 4),
(132, '1', '4', '1462200092', 3),
(133, '6', '10', '1462200092', 3),
(134, '7', '14', '1462200092', 2),
(135, '8', '18', '1462200092', 1),
(136, '18', '26', '1462200092', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `nama_subkriteria`, `nilai_subkriteria`, `id_kriteria`) VALUES
(2, '< 2.50', 1, '1'),
(3, '2.50 S/d 2.99', 2, '1'),
(4, '3.00 S/d  3.49', 3, '1'),
(5, '3.50 S/d 3.74', 4, '1'),
(6, '3.75 S/d 4.00', 5, '1'),
(8, '> Rp. 5.000.000', 1, '6'),
(9, '> Rp. 4.000.000', 2, '6'),
(10, '> Rp. 3.000.000', 3, '6'),
(11, '> Rp. 2.000.000', 4, '6'),
(12, '< Rp. 1.000.000', 5, '6'),
(13, '1 Anak ', 1, '7'),
(14, '2 Anak', 2, '7'),
(15, '3 Anak', 3, '7'),
(16, '4 Anak', 4, '7'),
(17, '5 Anak', 5, '7'),
(18, 'Tidak Satupun', 1, '8'),
(19, 'Yatim', 2, '8'),
(20, 'Piatu', 3, '8'),
(21, 'Yatim Piatu ', 4, '8'),
(22, 'Tidak memiliki surat rekomendasi', 1, '18'),
(23, 'Surat Keterangan Miskin', 2, '18'),
(24, 'Kartu Keluarga Sejahtera (KKS)', 3, '18'),
(25, 'Program Keluarga Harapan (PKH)', 3, '18'),
(26, 'Kartu Indonesia Pintar', 4, '18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin'),
(17, 'kepala biro', 'kepalabiro123', 'b8c802e90b3cbd3239015685778d2581', 'Kepala Biro');

--
-- Triggers `tb_users`
--
DELIMITER $$
CREATE TRIGGER `trigger_delete_users` AFTER DELETE ON `tb_users` FOR EACH ROW begin
	if OLD.id_users <=1  then 
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Data cannot deleted because the main data';
	END IF;
	
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
