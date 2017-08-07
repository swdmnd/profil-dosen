-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 02:45 AM
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
-- Table structure for table `bersama`
--

CREATE TABLE `bersama` (
  `id` int(11) NOT NULL,
  `id_penelitian` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `ref` enum('penelitian','publikasi') NOT NULL DEFAULT 'penelitian'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bersama`
--

INSERT INTO `bersama` (`id`, `id_penelitian`, `id_anggota`, `ref`) VALUES
(4, 1, 1, 'publikasi'),
(6, 1, 2, 'penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `uid`, `tahun`, `jabatan`) VALUES
(1, 1, 2010, 'Gol IV/A'),
(2, 1, 2015, 'Gol IV/AA');

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
(8, 1, 'D3', 'asdf', 0, 2011, 2017, 'asdf', 'aaa, aku juga pembimbing'),
(7, 2, 'D3', 'asdf', 0, 2009, 2015, 'asdf', 'asdf');

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
  `tags` varchar(4096) NOT NULL,
  `tipe` enum('penelitian','pengabdian') NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id`, `uid`, `judul`, `tahun_mulai`, `tahun_selesai`, `sumber_dana`, `jumlah_dana`, `tags`, `tipe`, `timestamp`) VALUES
(1, 1, 'asd', 2010, 2014, 'asdf', 2100000, 'tes,aja', 'penelitian', '2017-08-06 14:01:31'),
(2, 1, 'asdf', 2013, 2013, 'KEMENRISTEK', 125, '', 'penelitian', '2017-08-06 14:01:31'),
(3, 1, '123', 2013, 2014, '123', 123, '', 'pengabdian', '2017-08-06 14:01:31'),
(4, 1, 'asu', 2010, 2011, 'asu', 222222, '', 'penelitian', '2017-08-06 14:01:31'),
(5, 1, 'tes', 2010, 2014, 'KEMENRISTEK', 100000, '', 'penelitian', '2017-08-06 14:01:31'),
(6, 1, 'haha', 2011, 2018, 'asu', 853, '', 'pengabdian', '2017-08-06 14:01:31'),
(7, 1, 'Kisah Nabi Muhammad', 2014, 2019, 'asdf', 123123, 'asdf,dd', 'penelitian', '2017-08-06 14:01:31');

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
  `nomor_jurnal` varchar(255) NOT NULL,
  `tags` varchar(4096) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `uid`, `judul`, `tahun`, `nama_jurnal`, `nomor_jurnal`, `tags`, `timestamp`) VALUES
(1, 2, 'aaa', 0000, 'aaa', 'aaa', '', '2017-08-06 14:02:34'),
(2, 1, 'sss', 2019, 'sss', 'sss', '', '2017-08-06 14:02:34');

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
  `waktu` date NOT NULL,
  `tags` varchar(4096) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `uid`, `nama_seminar`, `tema`, `tempat`, `waktu`, `tags`, `timestamp`) VALUES
(1, 2, 'asdf', 'asdf', 'asdf', '1999-02-02', '', '2017-08-06 14:03:03'),
(2, 1, 'asdf', 'asdf', 'asdf', '2017-09-06', '', '2017-08-06 14:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `no_induk` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('admin','pimpinan','dosen','mahasiswa') NOT NULL DEFAULT 'dosen',
  `nama_lengkap` varchar(255) NOT NULL,
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
  `mk_diampu` varchar(4096) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `no_induk`, `password`, `nama`, `level`, `nama_lengkap`, `jabatan_fungsional`, `jabatan_struktural`, `nidn`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `kontak_rumah`, `kontak_hp`, `alamat_kantor`, `kontak_kantor`, `email`, `meluluskan`, `mk_diampu`, `foto`, `tanggal_buat`, `tanggal_login`, `aktif`) VALUES
(1, 'dosen', '102a6ed6587b5b8cb4ebbe972864690b', 'Dosen Biasa', 'dosen', 'Muhammad Arief Fatkhurrahman', 'Pegawai', 'Pegawai', '0001', 'Subang', '1995-12-25', 'Bekasi', '088821222122', '0888121233213', 'Semarang', '088812312312', 'contoh@gmail.com', 'masih prototype', 'a:1:{i:0;s:1:\"1\";}', 'faf787d0ab3ec37b86b73925978701ae.jpg', '2017-05-10 08:51:21', '2017-08-06 13:28:45', 1),
(2, '21060113140126', '102a6ed6587b5b8cb4ebbe972864690b', 'arief', 'dosen', 'arief', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '2017-08-03 06:01:40', '2017-08-05 16:46:03', 1),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'admin', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '2017-08-06 07:15:27', '2017-08-06 07:42:13', 0),
(4, '123', '202cb962ac59075b964b07152d234b70', 'Maman Somantri', 'dosen', 'Dr. Maman Somantri S.T.,M.T.', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '2017-08-06 09:13:49', '2017-08-06 09:14:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bersama`
--
ALTER TABLE `bersama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_penelitian` (`id_penelitian`);

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
-- AUTO_INCREMENT for table `bersama`
--
ALTER TABLE `bersama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
