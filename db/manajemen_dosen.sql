-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2017 at 07:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tahun` date NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tingkat` enum('D3','S1','S2','S3') NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `bidang_ilmu` int(100) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `judul_ta` varchar(255) NOT NULL,
  `pembimbing` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `uid`, `tingkat`, `nama_pt`, `bidang_ilmu`, `tahun_masuk`, `tahun_lulus`, `judul_ta`, `pembimbing`) VALUES
(5, 1, 'S1', 'asdf', 0, 1990, 2000, '12', '12'),
(4, 1, 'D3', '222', 0, 1990, 1999, '111', '111'),
(6, 1, '', 'Gol. IVA', 0, 0000, 0000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  `jumlah_dana` int(11) NOT NULL,
  `tipe` enum('penelitian','pengabdian') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id`, `uid`, `judul`, `tahun_mulai`, `tahun_selesai`, `sumber_dana`, `jumlah_dana`, `tipe`) VALUES
(1, 1, 'asd', 2010, 2014, 'asdf', 214, 'penelitian'),
(2, 1, 'asdf', 2013, 2013, 'KEMENRISTEK', 125, 'penelitian'),
(3, 1, '123', 2013, 2014, '123', 123, 'pengabdian');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `nm_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`nm_prodi`) VALUES
('Teknik Kimia'),
('Teknik Mesin'),
('Teknik Sipil'),
('Teknik Arsitektur'),
('Teknik Perencanaan Wilayah dan Kota'),
('Teknik Elektro'),
('Sistem Komputer'),
('Teknik Geodesi'),
('Teknik Geologi'),
('Teknik Industri'),
('Teknik Lingkungan'),
('Teknik Perkapalan');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_jurnal` varchar(255) NOT NULL,
  `nomor_jurnal` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_seminar` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `no_induk` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('admin','pimpinan','dosen','mahasiswa') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jabatan_fungsional` varchar(63) NOT NULL,
  `jabatan_struktural` varchar(63) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `kontak_rumah` varchar(50) NOT NULL,
  `kontak_hp` varchar(50) NOT NULL,
  `alamat_kantor` varchar(255) NOT NULL,
  `kontak_kantor` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `meluluskan` varchar(255) NOT NULL COMMENT 'comma seperated values (tingkatpendidikan_jumlahlulusan,tingkatpendidikan_jumlahlulusan, dst...)',
  `mk_diampu` varchar(1000) NOT NULL,
  `research_interests` varchar(1000) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `no_induk`, `password`, `nama`, `level`, `nama_lengkap`, `prodi`, `jabatan_fungsional`, `jabatan_struktural`, `nidn`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `kontak_rumah`, `kontak_hp`, `alamat_kantor`, `kontak_kantor`, `email`, `meluluskan`, `mk_diampu`, `research_interests`, `foto`, `tanggal_buat`, `tanggal_login`, `aktif`) VALUES
(1, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'Dosen', 'dosen', 'Yosua Alvin Adi Soetrisno, M.Eng.', 'Teknik Elektro', 'Pegawai', 'Pegawai', '0001', 'Semarang', '1990-10-13', 'Semarang', '088821222122', '0888121233213', 'Semarang', '088812312312', 'contoh@gmail.com', 'D3:12,S1:13,Pr:12,S2:13,S3:14', '', 'Software Engineering,Algorithm and Data Structure', './files/1dosen/foto/logo-undip.png', '2017-05-10 08:51:21', '2017-06-18 10:36:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`,`tingkat`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`no_induk`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
