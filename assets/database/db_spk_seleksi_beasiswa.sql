-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2023 pada 00.54
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
  `status` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `jenis_beasiswa`, `kuota`, `periode`, `tgl_pendaftaran`, `tgl_penutupan`, `status`) VALUES
(1, 'KIP-Kuliah', 50, '2022', '2023-02-01', '2023-02-28', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_bobot` int(11) NOT NULL,
  `atribut_kriteria` varchar(10) NOT NULL,
  `id_beasiswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_bobot`, `atribut_kriteria`, `id_beasiswa`) VALUES
(1, 'Nilai Rata-Rata Rapot', 35, 'Benefit', '1'),
(6, 'Penghasilan Orang Tua', 30, 'Cost', '1'),
(7, 'Jumlah Tanggungan', 20, 'Cost', '1'),
(8, 'Satus Anak', 5, 'Cost', '1'),
(18, 'Kartu Sosial', 10, 'Benefit', '1');

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
  `nilai_rapot` varchar(100) NOT NULL,
  `penghasilan_ortu` varchar(100) NOT NULL,
  `jumlah_tanggungan` varchar(100) NOT NULL,
  `status_anak` varchar(100) NOT NULL,
  `kartu_sosial` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `id_beasiswa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `jurusan`, `angkatan`, `nilai_rapot`, `penghasilan_ortu`, `jumlah_tanggungan`, `status_anak`, `kartu_sosial`, `password`, `file1`, `file2`, `id_beasiswa`) VALUES
(2, 'Putra Dwi Andrianto', '1461900064', 'Teknik Informatika', '2019', '', '', '', '', '', '1461900064', '', '', ''),
(3, 'Gito Pramana Karya ', '1461900049', 'Teknik Industri', '2020', '', '', '', '', '', '1461900049', '', '', '1'),
(4, 'Miftakul Huda', '1461900035', 'Teknik Informatika', '2019', '> Rp. 2.000.000', '3.00 S/d  3.49', '3 Anak', 'Yatim', 'Tidak Memiliki KIP/KKS/PKH', '1461900035', 'Pengumuman_Perwalian_Semester_Genap_Tahun_Akademik_2022-20231.pdf', '274-503-1-SM.pdf', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `id_subkriteria` varchar(3) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nilai`, `id_kriteria`, `id_subkriteria`, `nim`, `nilai`) VALUES
(11, '1', '4', '1461900035', 3),
(12, '6', '11', '1461900035', 4),
(13, '7', '15', '1461900035', 3),
(14, '8', '19', '1461900035', 2),
(15, '18', '22', '1461900035', 1),
(22, '6', '8', '1461900049', 1),
(23, '1', '3', '1461900049', 2),
(24, '7', '13', '1461900049', 1),
(25, '8', '18', '1461900049', 1),
(26, '18', '22', '1461900049', 1);

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
(22, 'Tidak Memiliki KIP/KKS/PKH', 1, '18'),
(23, 'Memiliki KIP/KKS/PKH', 3, '18');

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
(25, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

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
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
