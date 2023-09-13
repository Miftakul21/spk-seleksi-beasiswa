-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2023 pada 15.14
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

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
-- Struktur dari tabel `tb_beasiswa`
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
-- Dumping data untuk tabel `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `jenis_beasiswa`, `kuota`, `periode`, `tgl_pendaftaran`, `tgl_penutupan`, `file`, `status`) VALUES
(1, 'KIP-Kuliah ', 2, '2021', '2021-05-04', '2022-06-04', '44c037bd7debdbe66bf75d3acd59f571.pdf', '1'),
(5, 'KIP-Kuliah', 1, '2022', '2022-02-01', '2022-03-01', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `file4` varchar(100) NOT NULL,
  `file5` varchar(100) NOT NULL,
  `file6` varchar(100) NOT NULL,
  `file7` varchar(100) NOT NULL,
  `file8` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `nim`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `file7`, `file8`) VALUES
(45, '1122100048', '1a253d8d6f4697094974b7454fd373a0.pdf', '48ddd9526654223ce557be18e4cebe24.pdf', 'efb94adf6f346f14bd538a42da76a509.pdf', '', '94aa216f49144474b3f7559a0116c18b.pdf', '0fbaa567be7c4aeedfa0d4fb71f5bc36.pdf', '', ''),
(46, '1122100020', 'dd3010318c52378dfb30023fca483afd.pdf', '58c392d506e45993ca1dce74e6e4a53d.pdf', '507471355790115534c112aec1f93b83.pdf', '', '', '63458d4bf750d708bf3afcf52e1e5107.pdf', '', ''),
(47, '1152100128', 'a52c37849a3050a0c60955c3c2f92f3c.pdf', '857b38a43aa798d728d7717904c7fcae.pdf', 'e0d95896458cad423ae6981f5ff85678.pdf', '', '', '8ee05c2a28f6fb039fb3c6ab9c875ec4.pdf', '', ''),
(48, '1212100267', '9d5db44437fb9a2f62774ede8fce3a2c.pdf', 'f586d53ef22e983cf15579c82b6a838a.pdf', 'd2879c85437118120b0406cb40022d9d.pdf', '', '', '', '', ''),
(49, '1122100082', 'd5263157adb61a394f1a2af4c5f53029.pdf', '814f74c6f40eb7cfc2b9207cc7d6fd81.pdf', 'c68001f737bf9e6613823e2d44e64688.pdf', '', '', '05dc98a54d54efb42ad48aeafc2fd460.pdf', '', ''),
(51, '1152200177', '97a74b7eaa689e24ce46f2e1d24db4e9.pdf', '5c65257b9d99986dd958f08ef34733bc.pdf', '3451896270c538e8722cc6d36a560d5e.pdf', '', '', '9bbb35a51eef6c9e6dcb7ffa69692116.pdf', '', ''),
(52, '1122200111', '478f44ebd1070d208e7647786e07b65c.pdf', 'c88b090048ee5a8f0ae16c05a62c5c46.pdf', 'e99861ef97c03dc63bf3f4c19628a716.pdf', '', '', '0c133fb62cf59a41d2f281862a7ef91b.pdf', '', ''),
(53, '1122200129', 'bbad95bddb25d03abf17c9ddf716e139.pdf', '3d760167233c91dd702205d37d75add5.pdf', '0bb06537db404fc98277fa73488ef064.pdf', '', '', '58c80a4dfd5177869519377fc5a3a6d8.pdf', '', ''),
(54, '1412200088', '915a599c72c1bf4c62fa1de7120cb774.pdf', 'af075f5a43077e652db09d1e2a4cea16.pdf', '5cc91d9338c6abd2f76356c1dac189a3.pdf', '', 'ba5a1d96adec2b77ce92d3363c9c7c8e.pdf', '2a652671cd73e2dd8f5cbfca5954382b.pdf', '', ''),
(55, '1462200178', 'e563be0f76398b4b89f95c1d7df0ed5c.pdf', '73d2840b3f2cbad915db3a437dfc5a75.pdf', '374a7e7e76c974207e3562bd92f42cc0.pdf', '', '', '', '', ''),
(56, '142100092', '3b602c53f698f922dc5104ccc01b1743.pdf', 'cc2a19f3f2f873fdf4e6b2d34c264f0d.pdf', 'c4ea6f2645e9bc84e580aeab8053dd48.pdf', '', '', 'b3bc332846f7bb8845888507c64937fc.pdf', 'abd936a7de097ae1c3335cb62cf7db17.pdf', '385ad48e7b178828cca528aea3153fcf.pdf'),
(57, '1462100031', 'f2ca4717df51c6cf63b6913eea1dc85f.pdf', 'eaf9251b334af9e8fd341f95281947e2.pdf', '1ee1ecb8bba8bd4082d5d2bcc7f69cc0.pdf', '', '', '6d531f5429227ff9ac1ecd24733122c5.pdf', '0b2d99e0326c6dc46eb39dc9a87bbfb4.pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_nilai` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_nilai`, `nim`, `nilai`) VALUES
(43, '', 3.2),
(51, '1122100048', 3.15),
(52, '1122100020', 3.15),
(53, '1152100128', 2.1),
(54, '1212100267', 3.3),
(55, '1122100082', 4.35),
(57, '1152200177', 2.6),
(58, '1122200111', 3),
(59, '1122200129', 2.85),
(60, '1412200088', 3.7),
(61, '1462200178', 2.4),
(62, '142100092', 5.9666666666667),
(63, '1462100031', 3.3666666666667);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_bobot` double DEFAULT NULL,
  `id_beasiswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_bobot`, `id_beasiswa`) VALUES
(1, 'Nilai Rata-Rata Raport', 0.35, '1'),
(6, 'Penghasilan Orang Tua', 0.2, '1'),
(7, 'Jumlah Tanggungan', 0.1, '1'),
(8, 'Status Anak', 0.05, '1'),
(18, 'SKTM', 0.05, '1'),
(19, 'Prestasi Sekolah', 0.25, '1'),
(21, 'Nilai Rata-Rata Raport', 0.35, '5'),
(26, 'Penghasilan Orang Tua', 0.2, '5'),
(27, 'Jumlah Tanggungan', 0.1, '5'),
(28, 'Status Anak', 0.05, '5'),
(29, 'SKTM', 0.05, '5'),
(30, 'Prestasi Sekolah', 0.25, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
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
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `jurusan`, `angkatan`, `id_beasiswa`) VALUES
(1, 'Yunia Purni Fidiastuti', '1122100048', 'Ilmu Administrasi Negara', '2021', '1'),
(2, 'Riris Verdina Purbayani', '1122100020', 'Ilmu Administrasi Negara', '2021', '1'),
(3, 'Arya Firman Satriawan', '1152100128', 'Ilmu Komunikasi', '2021', '1'),
(4, 'Husen Bondan', '1212100267', 'Management', '2021', '1'),
(5, 'Triya Nur Fadila', '1122100082', 'Administrasi Negara', '2021', '1'),
(6, 'Devia Nafasya', '1152200177', 'Ilmu Komunikasi', '2022', '5'),
(7, 'FARSHA ALFINA AZZHARA PUTRI', '1122200111', 'Ilmu Administrasi Niaga', '2022', '5'),
(8, 'SARAH NABILLA KHOIRUNISA WINARTO', '1122200129', 'Ilmu Administrasi Niaga', '2022', '5'),
(9, 'WANDAH WIDYANTIKA', '1412200088', 'Teknik Industri', '2022', '5'),
(10, 'Maulana Achmad Rifai', '1462200178', 'Teknik Informatika', '2022', '5'),
(11, 'Joko', '142100092', 'Teknik Informatika', '2021', '1'),
(12, 'Bejo', '1462100031', 'Teknik Informatika', '2021', '1');

--
-- Trigger `tb_mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `tambah_akun_mahasiswa` AFTER INSERT ON `tb_mahasiswa` FOR EACH ROW BEGIN
    insert into tb_users(nama, username, password, level_user) 
    values (NEW.nama, NEW.nim, md5(new.nim), 'mahasiswa');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `id_subkriteria` varchar(3) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nilai`, `id_kriteria`, `id_subkriteria`, `nim`, `nilai`) VALUES
(291, '1', '4', '1122100048', 3),
(292, '6', '11', '1122100048', 4),
(293, '7', '15', '1122100048', 3),
(294, '8', '18', '1122100048', 1),
(295, '18', '61', '1122100048', 4),
(296, '19', '29', '1122100048', 3),
(297, '1', '5', '1122100020', 4),
(298, '6', '12', '1122100020', 5),
(299, '7', '13', '1122100020', 1),
(300, '8', '18', '1122100020', 1),
(301, '18', '23', '1122100020', 2),
(302, '19', '28', '1122100020', 2),
(303, '1', '3', '1152100128', 2),
(304, '6', '9', '1152100128', 2),
(305, '7', '14', '1152100128', 2),
(306, '8', '59', '1152100128', 4),
(307, '18', '23', '1152100128', 2),
(308, '19', '28', '1152100128', 2),
(309, '1', '5', '1212100267', 4),
(310, '6', '12', '1212100267', 5),
(311, '7', '17', '1212100267', 5),
(312, '8', '18', '1212100267', 1),
(313, '18', '23', '1212100267', 2),
(314, '19', '27', '1212100267', 1),
(315, '1', '6', '1122100082', 5),
(316, '6', '12', '1122100082', 5),
(317, '7', '14', '1122100082', 2),
(318, '8', '18', '1122100082', 1),
(319, '18', '23', '1122100082', 2),
(320, '19', '31', '1122100082', 5),
(327, '21', '39', '1152200177', 3),
(328, '26', '66', '1152200177', 4),
(329, '27', '68', '1152200177', 1),
(330, '28', '73', '1152200177', 1),
(331, '29', '79', '1152200177', 2),
(332, '30', '84', '1152200177', 2),
(333, '21', '39', '1122200111', 3),
(334, '26', '67', '1122200111', 5),
(335, '27', '70', '1122200111', 3),
(336, '28', '73', '1122200111', 1),
(337, '29', '79', '1122200111', 2),
(338, '30', '84', '1122200111', 2),
(339, '21', '38', '1122200129', 2),
(340, '26', '67', '1122200129', 5),
(341, '27', '72', '1122200129', 5),
(342, '28', '73', '1122200129', 1),
(343, '29', '79', '1122200129', 2),
(344, '30', '84', '1122200129', 2),
(345, '21', '39', '1412200088', 3),
(346, '26', '67', '1412200088', 5),
(347, '27', '71', '1412200088', 4),
(348, '28', '73', '1412200088', 1),
(349, '29', '81', '1412200088', 4),
(350, '30', '86', '1412200088', 4),
(351, '21', '40', '1462200178', 4),
(352, '26', '64', '1462200178', 2),
(353, '27', '69', '1462200178', 2),
(354, '28', '73', '1462200178', 1),
(355, '29', '79', '1462200178', 2),
(356, '30', '83', '1462200178', 1),
(357, '1', '4', '142100092', 3),
(358, '6', '10', '142100092', 3),
(359, '7', '17', '142100092', 5),
(360, '8', '18', '142100092', 1),
(361, '18', '23', '142100092', 2),
(362, '19', '30', '142100092', 4),
(363, '1', '4', '1462100031', 3),
(364, '6', '11', '1462100031', 4),
(365, '7', '14', '1462100031', 2),
(366, '8', '19', '1462100031', 2),
(367, '18', '22', '1462100031', 1),
(368, '19', '28', '1462100031', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `nama_subkriteria`, `nilai_subkriteria`, `id_kriteria`) VALUES
(2, '70 – 74', 1, '1'),
(3, '75 – 80', 2, '1'),
(4, '81 – 85', 3, '1'),
(5, '86 – 90', 4, '1'),
(6, '91 - 100', 5, '1'),
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
(19, 'Bercerai', 2, '8'),
(20, 'Piatu', 3, '8'),
(22, 'Keluarga Mampu', 1, '18'),
(23, 'Tidak memiliki surat rekomendasi', 2, '18'),
(24, 'Memiliki SKTM', 3, '18'),
(27, 'Tidak Memiliki', 1, '19'),
(28, 'Tingkat Kota / Kabupaten', 2, '19'),
(29, 'Tingkat Provinsi', 3, '19'),
(30, 'Tingkat Nasional', 4, '19'),
(31, 'Internasional', 5, '19'),
(32, '	70 – 74', 1, '20'),
(33, '	75 – 80', 2, '20'),
(34, '81 – 85', 3, '20'),
(35, '86 – 90', 4, '20'),
(36, '91 - 100', 5, '20'),
(37, '70-74', 1, '21'),
(38, '75 - 80', 2, '21'),
(39, '81 - 85', 3, '21'),
(40, '86 - 90', 4, '21'),
(41, '91 - 100', 5, '21'),
(42, '1 Anak', 1, '22'),
(43, '2 Anak', 2, '22'),
(44, '3 Anak', 3, '22'),
(45, '4 Anak', 4, '22'),
(46, '5 Anak', 5, '22'),
(47, 'Tidak Satupun', 1, '23'),
(48, 'Yatim', 2, '23'),
(49, 'Piatu', 3, '23'),
(50, 'Yatim Piatu', 4, '23'),
(51, 'Tidak memiliki surat rekomendas', 1, '24'),
(52, 'Surat Keterangan Tidak Mampu', 3, '24'),
(53, 'Memiliki KIP-Kuliah', 5, '24'),
(54, 'Tidak Memiliki', 1, '25'),
(55, 'Tingkat Kota / Kabupaten', 2, '25'),
(56, 'Tingkat Provinsi', 3, '25'),
(57, 'Tingkat Nasional', 4, '25'),
(58, 'Internasional', 5, '25'),
(59, 'Yatim', 4, '8'),
(60, 'Yatim Piatu', 5, '8'),
(61, 'Memiliki KIP-Kuliah', 4, '18'),
(62, 'Memiliki SKTM dan KIP-Kuliah', 5, '18'),
(63, '> Rp. 5.000.000', 1, '26'),
(64, '> Rp. 4.000.000', 2, '26'),
(65, '> Rp. 3.000.000', 3, '26'),
(66, '> Rp. 2.000.000', 4, '26'),
(67, '< Rp. 1.000.000', 5, '26'),
(68, '1 Anak', 1, '27'),
(69, '2 Anak', 2, '27'),
(70, '3 Anak', 3, '27'),
(71, '4 Anak', 4, '27'),
(72, '5 Anak', 5, '27'),
(73, 'Tidak satupun', 1, '28'),
(74, 'Bercerai', 2, '28'),
(75, 'Yatim', 3, '28'),
(76, 'Piatu', 4, '28'),
(77, 'Yatim Piatu', 5, '28'),
(78, 'Keluarga Mampu', 1, '29'),
(79, 'TIdak memiliki SKTM', 2, '29'),
(80, 'Memiliki SKTM', 3, '29'),
(81, 'KIP-Kuliah', 4, '29'),
(82, 'Memiliki SKTM dan KIP-Kuliah', 5, '29'),
(83, 'Tidak Memiliki', 1, '30'),
(84, 'TIngkat Kota/Kabupaten', 2, '30'),
(85, 'Tingkat Provinsi', 3, '30'),
(86, 'Tingkat Nasional', 4, '30'),
(87, 'International', 5, '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin'),
(17, 'kepala biro', 'kepalabiro123', 'b8c802e90b3cbd3239015685778d2581', 'Kepala Biro'),
(20, 'Yunia Purni Fidiastuti', '1122100048', '204aa0f7329a9800b6b25bb06cde8c43', 'mahasiswa'),
(21, 'Riris Verdina Purbayani', '1122100020', 'ad16578ec4a94fd0ce85295e92209255', 'mahasiswa'),
(22, 'ARYA FIRMAN SATRIAWAN', '1152100128', 'e30367071a93ff047b0e4de6d1d91082', 'mahasiswa'),
(23, 'Husen Bondan', '1212100267', '0fc5200ffb85b04120cabbed3ff1c3ab', 'mahasiswa'),
(24, 'Triya Nur Fadila', '1122100082', '3382e71613ba3d5b01ab5d9a6a66c95a', 'mahasiswa'),
(25, 'Devia Nafasya', '1152200177', 'cea7e01a76cc332b54f9a49715714bd3', 'mahasiswa'),
(26, 'FARSHA ALFINA AZZHARA PUTRI', '1122200111', 'ca07dfd76970986b57603f9f100af35e', 'mahasiswa'),
(27, 'SARAH NABILLA KHOIRUNISA WINARTO', '1122200129', 'dde68798d24ed3ce4894cd0cab270e7f', 'mahasiswa'),
(28, 'WANDAH WIDYANTIKA', '1412200088', 'faeb277a16bf535d67c3ef295e98ca78', 'mahasiswa'),
(29, 'Maulana Achmad Rifai', '1462200178', '1db8d186f6e311a3607e237b640bbaa0', 'mahasiswa'),
(30, 'Joko', '142100092', '6ddadb1549669fbad9e5f607dd97937c', 'mahasiswa'),
(31, 'Bejo', '1462100031', '3ee9c8ad47310d39e28dbf84b34ffc2f', 'mahasiswa');

--
-- Trigger `tb_users`
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
-- Indeks untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
