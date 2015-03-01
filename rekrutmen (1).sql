-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mar 2015 pada 06.40
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rekrutmen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(5) NOT NULL,
  `parent_kriteria` int(5) DEFAULT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `subkriteria` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `parent_kriteria`, `kode_kriteria`, `nama_kriteria`, `keterangan`, `subkriteria`) VALUES
(53, NULL, 'K1', 'IPK', 'aa', 'false'),
(54, NULL, 'K2', 'Pendidikan', '', 'false'),
(55, NULL, 'K3', 'Identitas Diri', '<br>', 'true'),
(56, NULL, 'K4', 'Psikotes', '', 'false'),
(57, NULL, 'K5', 'Wawancara', '<span class="Apple-tab-span" > </span>', 'true'),
(68, 55, 'K3SK1', 'Proporsional', '', 'false'),
(69, 55, 'K3SK2', 'Usia', '', 'false'),
(70, 55, 'K3SK3', 'Ketekunan', '', 'false'),
(71, 57, 'K5SKK1', 'Komunikasi', '', 'false'),
(72, 57, 'K5SKD2', 'Dampak', '', 'false'),
(73, 57, 'K5SKM3', 'Motivasi', '', 'false'),
(75, 57, 'K5SKW4', 'Wawasan', '', 'false'),
(76, 57, 'K5SKP5', 'Pengendalian Diri', '', 'false'),
(77, 57, 'K5SKS6', 'Keterampilan Sosial', '', 'false'),
(78, 57, 'K5SKI7', 'Inisiatif', '', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
`id` int(10) unsigned NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `berakhir` date NOT NULL,
  `kode_lowongan` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
`no_peserta` int(5) NOT NULL,
  `pendidikan` varchar(150) DEFAULT NULL,
  `institusi` varchar(150) NOT NULL,
  `lama_pendidikan` int(5) DEFAULT NULL,
  `jurusan` varchar(170) DEFAULT NULL,
  `tahun_masuk` int(5) DEFAULT NULL,
  `tahun_ijazah` int(5) DEFAULT NULL,
  `IPK` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`no_peserta`, `pendidikan`, `institusi`, `lama_pendidikan`, `jurusan`, `tahun_masuk`, `tahun_ijazah`, `IPK`) VALUES
(1, 'D3', 'Universitas Sriwijaya', 4, 'Sistem Informasi Bilingual', 2010, 2014, 3.6),
(2, 'D3', 'a', 0, 'a', 2012, 2012, 3.9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_berpasangan`
--

CREATE TABLE IF NOT EXISTS `perbandingan_berpasangan` (
`id` int(10) unsigned NOT NULL,
  `baris` int(11) NOT NULL,
  `kolom` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `nilai` float NOT NULL,
  `parent_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data untuk tabel `perbandingan_berpasangan`
--

INSERT INTO `perbandingan_berpasangan` (`id`, `baris`, `kolom`, `nama`, `nilai`, `parent_kriteria`) VALUES
(5, 53, 53, '53_53', 1, NULL),
(6, 54, 53, '54_53', 2, NULL),
(7, 53, 54, '53_54', 0.5, NULL),
(8, 54, 54, '54_54', 1, NULL),
(9, 55, 53, '55_53', 6, NULL),
(10, 53, 55, '53_55', 0.17, NULL),
(11, 55, 54, '55_54', 4, NULL),
(12, 54, 55, '54_55', 0.25, NULL),
(13, 55, 55, '55_55', 1, NULL),
(14, 56, 53, '56_53', 4, NULL),
(15, 53, 56, '53_56', 0.25, NULL),
(16, 56, 54, '56_54', 3, NULL),
(17, 54, 56, '54_56', 0.33, NULL),
(18, 56, 55, '56_55', 5, NULL),
(19, 55, 56, '55_56', 0.2, NULL),
(20, 56, 56, '56_56', 1, NULL),
(21, 57, 53, '57_53', 3, NULL),
(22, 53, 57, '53_57', 0.33, NULL),
(23, 57, 54, '57_54', 2, NULL),
(24, 54, 57, '54_57', 0.5, NULL),
(25, 57, 55, '57_55', 4, NULL),
(26, 55, 57, '55_57', 0.25, NULL),
(27, 57, 56, '57_56', 3, NULL),
(28, 56, 57, '56_57', 0.33, NULL),
(29, 57, 57, '57_57', 1, NULL),
(33, 68, 68, '68_68', 1, 55),
(34, 69, 68, '69_68', 0.5, 55),
(35, 68, 69, '68_69', 2, 55),
(36, 69, 69, '69_69', 1, 55),
(37, 70, 68, '70_68', 0.33, 55),
(38, 68, 70, '68_70', 3, 55),
(39, 70, 69, '70_69', 0.25, 55),
(40, 69, 70, '69_70', 4, 55),
(41, 70, 70, '70_70', 1, 55),
(42, 71, 71, '71_71', 1, 57),
(43, 72, 71, '72_71', 3, 57),
(44, 71, 72, '71_72', 0.33, 57),
(45, 72, 72, '72_72', 1, 57),
(46, 73, 71, '73_71', 2, 57),
(47, 71, 73, '71_73', 0.5, 57),
(48, 73, 72, '73_72', 0.5, 57),
(49, 72, 73, '72_73', 2, 57),
(50, 73, 73, '73_73', 1, 57),
(58, 75, 71, '75_71', 0.25, 57),
(59, 71, 75, '71_75', 4, 57),
(60, 75, 72, '75_72', 0.25, 57),
(61, 72, 75, '72_75', 4, 57),
(62, 75, 73, '75_73', 0.25, 57),
(63, 73, 75, '73_75', 4, 57),
(66, 75, 75, '75_75', 1, 57),
(67, 76, 71, '76_71', 3, 57),
(68, 71, 76, '71_76', 0.33, 57),
(69, 76, 72, '76_72', 0.5, 57),
(70, 72, 76, '72_76', 2, 57),
(71, 76, 73, '76_73', 3, 57),
(72, 73, 76, '73_76', 0.33, 57),
(75, 76, 75, '76_75', 4, 57),
(76, 75, 76, '75_76', 0.25, 57),
(77, 76, 76, '76_76', 1, 57),
(78, 77, 71, '77_71', 2, 57),
(79, 71, 77, '71_77', 0.5, 57),
(80, 77, 72, '77_72', 0.5, 57),
(81, 72, 77, '72_77', 2, 57),
(82, 77, 73, '77_73', 2, 57),
(83, 73, 77, '73_77', 0.5, 57),
(86, 77, 75, '77_75', 4, 57),
(87, 75, 77, '75_77', 0.25, 57),
(88, 77, 76, '77_76', 0.33, 57),
(89, 76, 77, '76_77', 3, 57),
(90, 77, 77, '77_77', 1, 57),
(91, 78, 71, '78_71', 3, 57),
(92, 71, 78, '71_78', 0.33, 57),
(93, 78, 72, '78_72', 2, 57),
(94, 72, 78, '72_78', 0.5, 57),
(95, 78, 73, '78_73', 3, 57),
(96, 73, 78, '73_78', 0.33, 57),
(99, 78, 75, '78_75', 4, 57),
(100, 75, 78, '75_78', 0.25, 57),
(101, 78, 76, '78_76', 0.5, 57),
(102, 76, 78, '76_78', 2, 57),
(103, 78, 77, '78_77', 2, 57),
(104, 77, 78, '77_78', 0.5, 57),
(105, 78, 78, '78_78', 1, 57);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
`no_peserta` int(5) NOT NULL,
  `nama_peserta` varchar(200) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `agama` enum('Islam','Protestan','Khatolik','Hindu','Budha','Lainnya') DEFAULT 'Lainnya',
  `alamat` text,
  `kode_pos` varchar(7) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tinggi_badan` int(5) DEFAULT NULL COMMENT 'in cm',
  `berat_badan` int(5) DEFAULT NULL COMMENT 'in kilogram',
  `warga_negara` varchar(50) DEFAULT NULL,
  `hobby` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`no_peserta`, `nama_peserta`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `status`, `agama`, `alamat`, `kode_pos`, `no_telp`, `no_hp`, `tinggi_badan`, `berat_badan`, `warga_negara`, `hobby`, `email`, `password`) VALUES
(1, 'Rahma Fitri', '1992-11-19', 'Palembang', 'Perempuan', '0', 'Islam', 'Indonesia', '31114', '', '08981169578', 158, 40, NULL, 'ntah', 'rahmafitri92@gmail.com', '5a1a5593623cdde561bacff4477aec78'),
(2, 'Frans Filasta Pratama', NULL, NULL, NULL, NULL, 'Lainnya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'therealfrans@gmail.com', 'fff362de37277ebf4e9aff1a080770e8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prioritas`
--

CREATE TABLE IF NOT EXISTS `prioritas` (
`id` int(10) unsigned NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `parent_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `prioritas`
--

INSERT INTO `prioritas` (`id`, `id_kriteria`, `nilai`, `parent_kriteria`) VALUES
(34, 53, 0.06, NULL),
(35, 54, 0.11, NULL),
(36, 55, 0.2, NULL),
(37, 56, 0.27, NULL),
(38, 57, 0.36, NULL),
(39, 68, 0.52, 55),
(40, 69, 0.36, 55),
(41, 70, 0.13, 55),
(42, 71, 0.07, 57),
(43, 72, 0.21, 57),
(44, 73, 0.1, 57),
(45, 75, 0.04, 57),
(46, 76, 0.24, 57),
(47, 77, 0.12, 57),
(48, 78, 0.22, 57);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_ri`
--

CREATE TABLE IF NOT EXISTS `table_ri` (
`id` int(10) unsigned NOT NULL,
  `n` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `table_ri`
--

INSERT INTO `table_ri` (`id`, `n`, `nilai`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0.58),
(4, 4, 0.9),
(5, 5, 1.12),
(6, 6, 1.24),
(7, 7, 1.32),
(8, 8, 1.41),
(9, 9, 1.45),
(10, 10, 1.49),
(11, 11, 1.51),
(12, 12, 1.48),
(13, 13, 1.56),
(14, 14, 1.57),
(15, 15, 1.59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('manager','staff','admin') NOT NULL DEFAULT 'staff',
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `nama`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Lisa', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`), ADD KEY `parent_kriteria` (`parent_kriteria`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
 ADD PRIMARY KEY (`no_peserta`);

--
-- Indexes for table `perbandingan_berpasangan`
--
ALTER TABLE `perbandingan_berpasangan`
 ADD PRIMARY KEY (`id`), ADD KEY `baris` (`baris`), ADD KEY `kolom` (`kolom`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
 ADD PRIMARY KEY (`no_peserta`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `prioritas`
--
ALTER TABLE `prioritas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `table_ri`
--
ALTER TABLE `table_ri`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
MODIFY `no_peserta` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perbandingan_berpasangan`
--
ALTER TABLE `perbandingan_berpasangan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
MODIFY `no_peserta` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prioritas`
--
ALTER TABLE `prioritas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `table_ri`
--
ALTER TABLE `table_ri`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`parent_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perbandingan_berpasangan`
--
ALTER TABLE `perbandingan_berpasangan`
ADD CONSTRAINT `perbandingan_berpasangan_ibfk_1` FOREIGN KEY (`baris`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
ADD CONSTRAINT `perbandingan_berpasangan_ibfk_2` FOREIGN KEY (`kolom`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prioritas`
--
ALTER TABLE `prioritas`
ADD CONSTRAINT `prioritas_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
