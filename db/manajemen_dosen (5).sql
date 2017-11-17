-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 07:56 AM
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
-- Table structure for table `buku_teks`
--

CREATE TABLE `buku_teks` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `penulis` varchar(500) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_teks`
--

INSERT INTO `buku_teks` (`id`, `uid`, `penulis`, `tahun_terbit`, `judul_buku`, `penerbit`) VALUES
(1, 4, 'Manaf, Asnawi; Yulianti, Wiwik; Pefridiyono, Tri Aji; Hadisusilo, M. Firmansyah; Binawijaya, Holi', '2008', 'Membangun Kesepakatan Bersama di Kondisi Paska Konflik dan Bencana', 'UN-Habitat');

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_mk` varchar(200) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `deskripsi_mk` text NOT NULL,
  `sks_mk` int(2) NOT NULL,
  `pengampu_mk` text NOT NULL,
  `rps_mk` varchar(500) NOT NULL,
  `kontrak_mk` varchar(500) NOT NULL,
  `silabus_mk` varchar(500) NOT NULL,
  `link_kulon` varchar(100) NOT NULL,
  `link_drive` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tahun_mulai` varchar(4) NOT NULL,
  `tahun_selesai` varchar(10) NOT NULL,
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
  `bidang_ilmu` varchar(100) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `judul_ta` varchar(255) NOT NULL,
  `pembimbing` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `uid`, `tingkat`, `nama_pt`, `bidang_ilmu`, `tahun_masuk`, `tahun_lulus`, `judul_ta`, `pembimbing`) VALUES
(1, 1, 'S1', 'Universitas Diponegoro', 'Teknik Elektro', 2008, 2012, 'Penyeimbangan Beban Proxy Server', 'Adian Fatchur'),
(2, 1, 'S2', 'Universitas Gadjah Mada', 'Teknologi Informasi', 2012, 2014, 'Porn Filtering', 'Teguh Bharata Adji'),
(3, 4, 'S1', 'Universitas Diponegoro', 'Arsitektur', 1990, 1996, 'Testing', 'Testing'),
(4, 4, 'S2', 'Kassel University, Germany', 'Urban and Community Planning', 2001, 2002, 'Testing', 'Testing'),
(5, 4, 'S3', 'Kassel University, Germany', 'Urban and Community Planning', 2002, 2005, 'Testing', 'Testing');

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
(24, 4, 'tes', 2012, 2013, 'tes', 1, 'penelitian'),
(23, 4, 'asasas', 2014, 2016, 'asas', 10000, 'penelitian'),
(21, 4, 'tes', 2013, 2014, 'tes', 10000, 'penelitian'),
(22, 4, 'coba', 2014, 2015, 'coba', 100000, 'penelitian'),
(1, 4, 'Pengembangan Model Kolaborasi Program Skala Kota dengan Skala Lingkungan untuk Mendukung Keberhasilan Program Penataan Lingkungan Permukiman  Berbasis Komunitas (PLP-BK)', 2015, 2016, 'Ditlitabmas DIKTI ', 15000000, 'penelitian'),
(2, 4, ' Pengembangan Model Kolaborasi Program Skala Kota dengan Skala Lingkungan untuk Mendukung Keberhasilan Program Penataan Lingkungan Permukiman  Berbasis Komunitas (PLP-BK)', 2014, 2015, 'Ditlitabmas DIKTI ', 15000000, 'penelitian'),
(3, 4, 'Pengembangan Model Kolaborasi Program Skala Kota dengan Skala Lingkungan untuk Mendukung Keberhasilan Program Penataan Lingkungan Permukiman  Berbasis Komunitas (PLP-BK)', 2013, 2014, 'Ditlitabmas DIKTI ', 15000000, 'penelitian'),
(4, 4, 'Penataan Permukiman Kumuh Nelayan Berbasis Pengembangan Kawasan Melalui KerjasamaPublic, Private, Community Partnership (Studi Kasus: Penataan Kawasan Permukiman Nelayan di Desa Kurau Kabupaten Bangka Tengah)', 2013, 2014, 'BOPTN Undip', 15000000, 'penelitian'),
(5, 4, 'Pengembangan Model Kerjasama Public, Private, Community Partnership Menuju Komunitas Kota yang Berkelanjutan (Studi kasus: Penataan Lingkungan Permukiman Informal Desa Kutoharjo berbasis Pengembangan Kawasan Wisata Religi Kecamatan Kaliwungu Kabupaten Ken', 2012, 2013, 'DIPA FT UNDIP 2012', 15000000, 'penelitian'),
(6, 4, 'Pengentasan Kemiskinan Berbasis Pengembangan Kawasan: Alternatif Model Pemanfaatan CSR yang Lebih Berkelanjutan (Studi Kasus: Pengembangan Kawasan Wisata Kelinci di Kelurahan Pringapus Kabupaten Semarang)', 2012, 2013, 'PNBP UNDIP 2012', 15000000, 'penelitian'),
(7, 4, 'Model Kelembagaan Lokal dalam Peningkatan Kualitas Lingkungan Permukiman Informal secara Pertisipatif', 2011, 2012, 'Hibah Stranas thn ke-2 DP2M Dikti', 15000000, 'penelitian'),
(8, 4, 'Engaging local community voluntary organizations to improve low income sub standard housing: challenges and advantages (2011). A case study of the implementation of sub standard housing improvement program in Pringapus Village, Semarang District', 2011, 2012, 'Joint Research International DIPA FT UNDIP 2011', 15000000, 'penelitian'),
(9, 4, 'Model Kelembagaan Lokal dalam Peningkatan Kualitas Lingkungan Permukiman Informal secara Pertisipatif', 2010, 2011, 'Hibah Stranas thn ke-1 DP2M Dikti', 15000000, 'penelitian'),
(10, 4, 'Penerapan Perencanaan Tata Bangunan & Lingkungan Berbasis Komunitas: Kendala, Tantangan, dan Keuntungan (Studi Kasus: Pelaksanaan Program PLP-BK di Kota Pekalongan, Kabupaten Kendal dan Kota Semarang)', 2010, 2011, 'Hibah Pengembangan SDM MTPWK UNDIP 2010', 15000000, 'penelitian'),
(11, 4, 'Community Driven Approach in Housing Construction, Lessons learned from UN-HABITAT Pidie, NAD', 2007, 2008, 'ANSSP-UN-HABITAT 2007', 15000000, 'penelitian'),
(12, 4, 'Pengembangan dan Penguatan Kelembagaan Lokal dalam Pengelolaan Sampah Terpadu Berbasis Komunitas', 2013, 2014, 'DIPA FT UNDIP 2013', 15000000, 'pengabdian'),
(26, 4, 'emimd', 2011, 2012, 'diamdis', 10, 'penelitian'),
(25, 4, 'ededeeded', 2011, 2013, 'ededded', 200000, 'penelitian'),
(27, 1, 'Testing', 2013, 2014, 'Testing', 20000000, 'penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tahun_penghargaan` varchar(4) NOT NULL,
  `sebagai` varchar(200) NOT NULL,
  `nama_penghargaan` varchar(200) NOT NULL,
  `pemberi_penghargaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `uid`, `tahun_penghargaan`, `sebagai`, `nama_penghargaan`, `pemberi_penghargaan`) VALUES
(1, 4, '2002', 'Penerima', 'beasiswa pendidikan S2 dan S3 ', 'Pemerintah Jerman (DAAD Scholarship award)');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nm_prodi`) VALUES
(1, 'Teknik Sipil'),
(2, 'Teknik Arsitektur'),
(3, 'Teknik Kimia'),
(4, 'Teknik Perencanaan Wilayah dan Kota'),
(5, 'Teknik Mesin'),
(6, 'Teknik Elektro'),
(7, 'Teknik Perkapalan'),
(8, 'Teknik Industri'),
(9, 'Teknik Lingkungan'),
(10, 'Teknik Geologi'),
(11, 'Teknik Geodesi'),
(12, 'Sistem Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `penulis` varchar(300) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `nama_jurnal` varchar(255) NOT NULL,
  `nomor_jurnal` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `uid`, `penulis`, `judul`, `tahun`, `nama_jurnal`, `nomor_jurnal`) VALUES
(1, 4, 'Manaf, Asnawi, Setyono, Budi, Wahyudi, Imam', 'Collaborative planning in community based neighborhood upgrading program in Indonesia: lessons from Podosugih village in Pekalongan city, Indonesia', '2016', 'The International Journal of Architecture and Planning Research', 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nama_seminar` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `sebagai` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `uid`, `nama_seminar`, `tema`, `sebagai`, `tempat`, `waktu`) VALUES
(5, 1, 'coba', 'coba', 'coba', 'coba', '2017-10-11'),
(6, 1, 'tes', 'tes', 'tes', 'tes', '2017-10-10');

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
  `deskripsi_singkat` text NOT NULL,
  `jabatan_fungsional` varchar(63) NOT NULL,
  `jabatan_struktural` varchar(63) NOT NULL,
  `gelar_akademik` varchar(100) NOT NULL,
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
  `foto_path` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `scopus_id` text NOT NULL,
  `scholar_id` text NOT NULL,
  `sinta_id` text NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `no_induk`, `password`, `nama`, `level`, `nama_lengkap`, `prodi`, `deskripsi_singkat`, `jabatan_fungsional`, `jabatan_struktural`, `gelar_akademik`, `nidn`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `kontak_rumah`, `kontak_hp`, `alamat_kantor`, `kontak_kantor`, `email`, `meluluskan`, `mk_diampu`, `research_interests`, `foto_path`, `foto`, `scopus_id`, `scholar_id`, `sinta_id`, `tanggal_buat`, `tanggal_login`, `aktif`) VALUES
(1, 'yosua', '01c4bf6ba816ef53c34e057af258f76f', 'Yosua', 'dosen', 'Yosua Alvin Adi Soetrisno, S.T., M.Eng.', 'Teknik Elektro', 'Associate Professor (Lektor Kepala) pada Departemen Perencanaan Wilayah dan Kota Universitas Diponegoro. Dosen dan Peneliti Bidang Perumahan dan Permukiman dan Pengembangan Masyarakat ini menyelesaikan PendidikanSarjana Teknik Arsitektur di Jurusan Arsitektur Fakultas Teknik Undip pada tahun 1996 dan mempersiapkan studi S3 serta meraih gelar Doktor (Dr. -Ing.) dari Kassel University Jerman pada tahun 2005.\r\n\r\nSaat ini, peneliti yang pernah meraih beberapa penghargaan dalam lomba menulis dan juga lomba Dosen serta Kajur/Kaprodi Berprestasi ini, adalah Wakil Dekan Komunikasi dan Bisnis Fakultas Teknik Undip dan juga sekaligus dipercaya untuk mengemban amanah sebagai Anggota Majelis Wali Amanat (MWA) Universitas Diponegoro masa bakti 2015-2020. Sikap kritisnya terhadap peran perguruan tinggi sebagai \"centre of excellence\" di dalam memecahkan permasalahan sosial sangat kental tercermin dari fokus penelitian dan publikasinya serta beberapa buku yang ditulisnya. Dedikasinya yang tinggi terhadap permasalahan dan issue-issue terkait dengan kemiskinan, pemberdayaan dan pengembangan masyarakat khususnya dalam bidang perumahan dan permukiman di perkotaan telah membuatnya sering dimintai untuk menjadi pembicara atau nara sumber di berbagai seminar dan diskusi.', 'Pengajar', 'Staff IT', 'Magister', '', 'Semarang', '1990-10-13', 'Semarang', '088821222122', '0888121233213', 'Baru 2', '088812312312', 'contoh@gmail.com', 'D3:12,S1:13,Pr:12,S2:13,S3:14', 'Standarisasi', 'Software Engineering,Algorithm and Data Structure', './files/11990/foto/', '86def965cee2a21cfb139423fe7fbf7f.jpg', '1241231', '124123123', '124123', '2017-05-10 08:51:21', '2017-10-12 08:57:25', 1),
(4, 'asnawi', 'ce28eed1511f631af6b2a7bb0a85d636', 'Asnawi', 'dosen', 'Dr. Ing. Asnawi Manaf, S.T.', 'Teknik Perencanaan Wilayah dan Kota', 'Associate Professor (Lektor Kepala) pada Departemen Perencanaan Wilayah dan Kota Universitas Diponegoro. Dosen dan Peneliti Bidang Perumahan dan Permukiman dan Pengembangan Masyarakat ini menyelesaikan Pendidikan Sarjana Teknik Arsitektur di Jurusan Arsitektur Fakultas Teknik Undip pada tahun 1996 dan mempersiapkan studi S3 serta meraih gelar Doktor (Dr. -Ing.) dari Kassel University Jerman pada tahun 2005.\r\n\r\nSaat ini, peneliti yang pernah meraih beberapa penghargaan dalam lomba menulis dan juga lomba Dosen serta Kajur/Kaprodi Berprestasi ini, adalah Wakil Dekan Komunikasi dan Bisnis Fakultas Teknik Undip dan juga sekaligus dipercaya untuk mengemban amanah sebagai Anggota Majelis Wali Amanat (MWA) Universitas Diponegoro masa bakti 2015-2020. \r\n\r\nSikap kritisnya terhadap peran perguruan tinggi sebagai \"centre of excellence\" di dalam memecahkan permasalahan sosial sangat kental tercermin dari fokus penelitian dan publikasinya serta beberapa buku yang ditulisnya. Dedikasinya yang tinggi terhadap permasalahan dan issue-issue terkait dengan kemiskinan, pemberdayaan dan pengembangan masyarakat khususnya dalam bidang perumahan dan permukiman di perkotaan telah membuatnya sering dimintai untuk menjadi pembicara atau nara sumber di berbagai seminar dan diskusi.', 'Lektor Kepala', 'Wakil Dekan III Komunikasi dan Bisnis FT', 'Doktor', '', 'Sigli', '1971-07-24', 'Sendang Pakel Raya RT 02/03, Gedawang, Banyumanik, Semarang', '0247460054', '0811288190', 'Tembalang, Semarang', '', 'asnawimanaf@gmail.com', 'D3:0,S1:0,Pr:0,S2:0,S3:0', '', 'Urban Planning & Development', './files/4asnawi/foto/', '013cf88701d8843203b2b7e99e7fd5f9.jpg', '512341231', '12312312312', '257093', '2017-05-10 08:51:21', '2017-10-10 19:50:39', 1),
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', './files/foto/', 'admin.png', '', '', '', '2017-05-10 08:51:21', '2017-10-04 11:31:26', 1),
(8, 'sugiono', 'ce28eed1511f631af6b2a7bb0a85d636', 'Sugiono', 'dosen', 'Prof. Dr.Ir. Sugiono Soetomo, DEA', 'Teknik Perencanaan Wilayah dan Kota', '', '', '', 'Profesor', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', './files/8sugiono/foto/', '0a70a3ebc353aa6b530a3d1cff0d88eb.jpg', '', '', '', '2017-10-02 08:29:49', '2017-10-04 10:01:50', 0),
(12, '196906121994031001', '8ad782f425f17a957909b2b3fb224059', 'Wahyudi', 'dosen', 'Dr. Wahyudi, S.T., M.T.', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-10-10 09:31:24', '2017-10-10 09:31:24', 0),
(13, '1230193109231803912', '01c4bf6ba816ef53c34e057af258f76f', 'Budi', 'dosen', 'Budi, S.T., M.T.', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:41:02', '2017-11-04 14:41:02', 0),
(14, '192318102931802931', '01c4bf6ba816ef53c34e057af258f76f', 'Tono', 'dosen', 'Tono', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:41:20', '2017-11-04 14:41:20', 0),
(15, '1094120519238109238', '01c4bf6ba816ef53c34e057af258f76f', 'Toni', 'dosen', 'Toni', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:41:30', '2017-11-04 14:41:30', 0),
(16, '10924182019312309', '01c4bf6ba816ef53c34e057af258f76f', 'Bobo', 'dosen', 'Bobo', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:41:50', '2017-11-04 14:41:50', 0),
(17, '10294102391823012', '01c4bf6ba816ef53c34e057af258f76f', 'Rodi', 'dosen', 'Rodi', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:42:03', '2017-11-04 14:42:03', 0),
(18, '123109230123', '01c4bf6ba816ef53c34e057af258f76f', 'Sinta', 'dosen', 'Sinta', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:42:28', '2017-11-04 14:42:28', 0),
(19, '190230192481023012', '01c4bf6ba816ef53c34e057af258f76f', 'Joni', 'dosen', 'Joni', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-11-04 14:42:40', '2017-11-04 14:42:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_teks`
--
ALTER TABLE `buku_teks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

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
ALTER TABLE `users` ADD FULLTEXT KEY `research_interests` (`research_interests`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_teks`
--
ALTER TABLE `buku_teks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kuliah`
--
ALTER TABLE `kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
