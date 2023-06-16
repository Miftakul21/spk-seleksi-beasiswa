-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2023 pada 03.04
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
(5, 'KIP-Kuliah', 1, '2022', '2022-02-01', '2022-03-01', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `nim`, `file1`, `file2`) VALUES
(22, '1122100048', '034f3fc9c9028bc6695d64d25bad7c7c.pdf', 'a21786705d2007d7eef7ceeb0faae5ae.pdf'),
(27, '1122100020', '3fc5c320071eeefaf39a930d57dfa5b8.pdf', 'e3e66de2010461031e12f90310cd2d3d.pdf'),
(31, '1152100128', '47364962d89043b647e79163ad4145ab.pdf', 'fb59bd0a02661f390891e9771c3454ba.pdf'),
(32, '1212100267', '605db684d26c2f62cb5e05b8a74f7f92.pdf', '89d8da6d14a65c055d6f019eb7035f5c.pdf'),
(33, '1122100082', '72c6dc9b62a79a782861647129838e57.pdf', 'b88c8b163f45e8c15f22205e9b7e4dce.pdf'),
(34, '1152200177', '6e8110b169d16d5a74fc4e1646e70851.pdf', 'd7871b5492613573f4df44d20323259d.pdf'),
(35, '1122200111', '0c7580c4673ecb46e59cd66647ae3712.pdf', '3f0b9d1dfe236f58800c693bfc950fe6.pdf'),
(36, '1122200129', 'b070a58fb9bf8d0ccc996ed5913bdda4.pdf', '14c929696acfa2cf8ea0be8ed328a9d2.pdf'),
(37, '1412200088', 'c0454724bbb9635ed0c7e16c2f1fa1e8.pdf', '3b7b5485604a86e84a01fb352d3575a1.pdf'),
(38, '1462200178', '159fa3915f2e5b3eb5e82f86c3f8662c.pdf', '31dd2903e087be1c9951fd945be2e190.pdf');

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
(30, '1122100048', 0.62),
(31, '1122100020', 0.54),
(35, '1152100128', 0.515),
(36, '1212100267', 0.57),
(37, '1122100082', 0.78),
(38, '1152200177', 0.5675),
(39, '1122200111', 0.5875),
(40, '1122200129', 0.54),
(41, '1412200088', 0.7725),
(42, '1462200178', 0.7125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_bobot` double DEFAULT NULL,
  `atribut_kriteria` varchar(10) NOT NULL,
  `id_beasiswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_bobot`, `atribut_kriteria`, `id_beasiswa`) VALUES
(20, 'Nilai Rata-Rata Rapot', 0.35, 'Benefit', '5'),
(21, 'Penghasilan Orang Tua', 0.2, 'Cost', '5'),
(22, 'Jumlah Tanggungan ', 0.1, 'Benefit', '5'),
(23, 'Status', 0.05, 'Cost', '5'),
(24, 'SKTM', 0.05, 'Benefit', '5'),
(25, 'Prestasi Non Akademik', 0.25, 'Benefit', '5');

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
(10, 'Maulana Achmad Rifai', '1462200178', 'Teknik Informatika', '2022', '5');

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
(153, '1', '4', '1122100048', 3),
(154, '6', '11', '1122100048', 4),
(155, '7', '15', '1122100048', 3),
(156, '8', '18', '1122100048', 1),
(157, '18', '24', '1122100048', 5),
(158, '19', '29', '1122100048', 3),
(183, '1', '5', '1122100020', 4),
(184, '6', '12', '1122100020', 5),
(185, '7', '13', '1122100020', 1),
(186, '8', '18', '1122100020', 1),
(187, '18', '22', '1122100020', 1),
(188, '19', '28', '1122100020', 2),
(207, '1', '3', '1152100128', 2),
(208, '6', '9', '1152100128', 2),
(209, '7', '14', '1152100128', 2),
(210, '8', '19', '1152100128', 2),
(211, '18', '22', '1152100128', 1),
(212, '19', '28', '1152100128', 2),
(213, '1', '5', '1212100267', 4),
(214, '6', '12', '1212100267', 5),
(215, '7', '17', '1212100267', 5),
(216, '8', '18', '1212100267', 1),
(217, '18', '22', '1212100267', 1),
(218, '19', '27', '1212100267', 1),
(219, '1', '6', '1122100082', 5),
(220, '6', '12', '1122100082', 5),
(221, '7', '14', '1122100082', 2),
(222, '8', '18', '1122100082', 1),
(223, '18', '22', '1122100082', 1),
(224, '19', '31', '1122100082', 5),
(225, '20', '34', '1152200177', 3),
(226, '21', '40', '1152200177', 4),
(227, '22', '42', '1152200177', 1),
(228, '23', '47', '1152200177', 1),
(229, '24', '51', '1152200177', 1),
(230, '25', '55', '1152200177', 2),
(231, '20', '34', '1122200111', 3),
(232, '21', '41', '1122200111', 5),
(233, '22', '44', '1122200111', 3),
(234, '23', '47', '1122200111', 1),
(235, '24', '51', '1122200111', 1),
(236, '25', '55', '1122200111', 2),
(237, '20', '33', '1122200129', 2),
(238, '21', '41', '1122200129', 5),
(239, '22', '46', '1122200129', 5),
(240, '23', '47', '1122200129', 1),
(241, '24', '51', '1122200129', 1),
(242, '25', '55', '1122200129', 2),
(243, '20', '34', '1412200088', 3),
(244, '21', '41', '1412200088', 5),
(245, '22', '45', '1412200088', 4),
(246, '23', '47', '1412200088', 1),
(247, '24', '53', '1412200088', 5),
(248, '25', '57', '1412200088', 4),
(249, '20', '35', '1462200178', 4),
(250, '21', '38', '1462200178', 2),
(251, '22', '43', '1462200178', 2),
(252, '23', '47', '1462200178', 1),
(253, '24', '51', '1462200178', 1),
(254, '25', '54', '1462200178', 1);

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
(32, '	70 – 74', 1, '20'),
(33, '	75 – 80', 2, '20'),
(34, '81 – 85', 3, '20'),
(35, '86 – 90', 4, '20'),
(36, '91 - 100', 5, '20'),
(37, '> Rp. 5.000.000', 1, '21'),
(38, '> Rp. 4.000.000', 2, '21'),
(39, '> Rp. 3.000.000', 3, '21'),
(40, '> Rp. 2.000.000', 4, '21'),
(41, '< Rp. 1.000.000', 5, '21'),
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
(58, 'Internasional', 5, '25');

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
(29, 'Maulana Achmad Rifai', '1462200178', '1db8d186f6e311a3607e237b640bbaa0', 'mahasiswa');

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
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
