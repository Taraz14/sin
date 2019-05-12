-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 01:57 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(15) NOT NULL,
  `nisn` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `tanpa_keterangan` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `nisn`, `sakit`, `ijin`, `tanpa_keterangan`, `semester`) VALUES
(1, 616626, 2, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` int(11) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `nama_guru` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `id_kelas`, `nama_guru`, `alamat`, `status`, `jenis_kelamin`, `telepon`, `email`, `jabatan`) VALUES
(9876, 'XI-IPS-01', 'Yuniarti', 'Jakarta', 'Menikah', 'perempuan', '+62(813)445-76-', 'yuni@gmail.com', 'Wali Kelas'),
(12345, 'X-MIPA-01', 'ss', 'asdasd', 'lajang', 'laki-laki', '+62(817)737-63-', 'deka@gmail.com', 'wali Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_kelas`
--

CREATE TABLE `tb_kategori_kelas` (
  `id_kategoriK` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_kelas`
--

INSERT INTO `tb_kategori_kelas` (`id_kategoriK`, `nama_kategori`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'MIPA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_kategoriK` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nip`, `id_kategoriK`, `nama_kelas`, `jumlah_siswa`) VALUES
('X-MIPA-01', 12345, 3, 'X MIPA', 21),
('XI-IPS-01', 9876, 2, 'XI IPS', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(200) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `kkm`) VALUES
(1, 'Alqur\'an Hadist', 62),
(2, 'Tarikh', 62),
(3, 'Fikih', 62),
(4, 'Matematika', 62),
(5, 'Biologi', 62),
(6, 'Sejarah', 62),
(7, 'Kimia', 62),
(8, 'Bahasa Inggris', 62),
(9, 'Fisika', 62);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0',
  `predikat_nilai` varchar(1) DEFAULT '-',
  `tugas` int(11) NOT NULL DEFAULT '0',
  `predikat_tugas` varchar(1) NOT NULL DEFAULT '-',
  `uts` int(11) NOT NULL DEFAULT '0',
  `predikat_uts` varchar(1) NOT NULL DEFAULT '-',
  `uas` int(11) NOT NULL DEFAULT '0',
  `predikat_uas` varchar(1) NOT NULL DEFAULT '-',
  `sikap` varchar(2) NOT NULL DEFAULT '-',
  `kompetensi` varchar(2) NOT NULL DEFAULT '-',
  `keterampilan` varchar(2) NOT NULL DEFAULT '-',
  `catatan` text NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nisn`, `nip`, `id_semester`, `id_mapel`, `nilai`, `predikat_nilai`, `tugas`, `predikat_tugas`, `uts`, `predikat_uts`, `uas`, `predikat_uas`, `sikap`, `kompetensi`, `keterampilan`, `catatan`, `tahun_ajaran`) VALUES
(94, 45525, 9876, 1, 1, 90, 'A', 90, 'A', 90, 'A', 90, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(95, 45525, 9876, 1, 2, 89, 'A', 89, 'A', 89, 'A', 89, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(96, 45525, 9876, 1, 3, 70, 'C', 70, 'C', 70, 'C', 70, 'C', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(97, 45525, 9876, 1, 4, 100, 'A', 100, 'A', 100, 'A', 100, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(98, 45525, 9876, 1, 5, 90, 'A', 90, 'A', 90, 'A', 90, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(99, 45525, 9876, 1, 6, 90, 'A', 90, 'A', 90, 'A', 90, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(100, 45525, 9876, 1, 7, 67, 'C', 67, 'C', 67, 'C', 67, 'C', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(101, 45525, 9876, 1, 8, 78, 'B', 78, 'B', 78, 'B', 78, 'B', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011'),
(102, 45525, 9876, 1, 9, 89, 'A', 89, 'A', 89, 'A', 89, 'A', 'C', 'A', 'A', 'perbaiki sikap', '2010/2011');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembangan_diri`
--

CREATE TABLE `tb_pengembangan_diri` (
  `id_pengembangan` int(11) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`) VALUES
(1, 'ganjil'),
(2, 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` int(11) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `telepon` varchar(18) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `no_kk` int(11) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL DEFAULT '-',
  `nama_ibu` varchar(200) NOT NULL DEFAULT '-',
  `tahun_ajaran` varchar(20) NOT NULL,
  `penilaian` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `id_kelas`, `nama_siswa`, `tanggal_lahir`, `alamat`, `agama`, `jenis_kelamin`, `telepon`, `tempat_lahir`, `foto`, `no_kk`, `nama_ayah`, `nama_ibu`, `tahun_ajaran`, `penilaian`) VALUES
(41195, 'X-MIPA-01', 'Taraz', '1995-04-14', 'jakal', 'Islam', 'laki-laki', '+62(813)787-87-878', 'Surabaya', NULL, 2147483647, 'Patrio', 'patria', '2010/2011', 0),
(41277, 'X-MIPA-01', 'Yeyen', '2019-05-29', 'lump', 'Budha', 'laki-laki', '+62(817)788-87-777', 'Salatiga', NULL, 2147483647, 'Bardock', 'Tania', '2010/2011', 0),
(42278, 'X-MIPA-01', 'Yani', '2019-05-28', 'karmen', 'Katolik', 'laki-laki', '+62(815)388-38-838', 'Jakarta', NULL, 2147483647, 'yono', 'yuni', '2010/2011', 0),
(45525, 'XI-IPS-01', 'Yaser', '2019-05-16', 'sorong', 'Hindu', 'laki-laki', '+62(817)787-78-778', 'sorong', 'avatar.png', 2147483647, 'yusak', 'yasui', '2010/2011', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, '9876', '912e79cd13c64069d91da65d62fbb78c', 'guru'),
(10, '41195', 'ba0909e302db12f30293fed31693f19b', 'murid'),
(12, '42278', 'a1ad46372861ecf61fdab04c7bf5082e', 'murid'),
(13, '45525', '8e8d89872be72005d16f13bc59c81296', 'murid'),
(14, '41277', 'f2258c61a8b46c0620005f5949fb11b8', 'murid'),
(17, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_kategori_kelas`
--
ALTER TABLE `tb_kategori_kelas`
  ADD PRIMARY KEY (`id_kategoriK`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_pengembangan_diri`
--
ALTER TABLE `tb_pengembangan_diri`
  ADD PRIMARY KEY (`id_pengembangan`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kategori_kelas`
--
ALTER TABLE `tb_kategori_kelas`
  MODIFY `id_kategoriK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tb_pengembangan_diri`
--
ALTER TABLE `tb_pengembangan_diri`
  MODIFY `id_pengembangan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
