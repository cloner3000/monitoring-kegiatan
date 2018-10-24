-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 05:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `institusi`, `fakultas`, `jurusan`, `jenis_kelamin`, `tanggal_lahir`, `password`) VALUES
('0001116801', 'Sri Lestari', 'Universitas Widyatama', 'Teknik', 'Sistem informasi', 'Perempuan', '1978-07-21', '0c909a141f1f2c0a1cb602b0b2d7d050'),
('0414106701', 'Rozahi Istambul', 'Universitas Widyatama', 'Teknik', 'Sistem informasi', 'Laki - Laki', '1982-09-11', '0c909a141f1f2c0a1cb602b0b2d7d050'),
('0421097701', 'R. A. E. VIRGANA Targa Sapanji', 'Universitas Widyatama', 'Teknik', 'Sistem informasi', 'Laki - Laki', '1985-07-27', '0c909a141f1f2c0a1cb602b0b2d7d050');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(4) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `asal_dana` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `pdf_visum` varchar(50) DEFAULT NULL,
  `pdf_sertifikat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nidn`, `nama_kegiatan`, `tanggal`, `lokasi`, `asal_dana`, `keterangan`, `foto`, `pdf_visum`, `pdf_sertifikat`) VALUES
(6, '111401023', 'Hikmat Ramdhani', '2018-09-08', 'Arcamanik', 'Personal', 'Belajar Website', 'museum-cafe-coffee-mona-01.jpg', '', ''),
(20, '0414106701', 'cobakkk', '2016-09-29', 'Rumah', 'Dikti', 'tessss keterangan asdjflkajsdfj adslkfjalsdkfj laksdjflkdjfklas djfkasdfjlaskd jlaksdjf laskdjfla ksdjflksdjflaksdj laksdjflaksdj flkasdjfa sdf', 'SEMINAR Engineering Day.pdf', 'Pengabdian & Penelitian DISKOMINFO.pdf', 'PPU.pdf'),
(21, '0421097701', 'Kegiatan Pa Rae', '2016-11-30', 'Arcamanik', 'Dikti', 'dsfadfafadsf', 'KULIAH UMUM UU ITE 2.pdf', 'KULIAH UMUM UU ITE.pdf', 'EPT.pdf'),
(22, '0414106701', 'tes', '2017-09-22', 'Kampus', 'DIKTI', 'tesksdfka ka lkdjfalks ja', '', '', ''),
(23, '0001116801', 'nama_kegiatan', '0000-00-00', 'lokasi', 'asal_dana', 'keterangan', 'namaFoto', 'namaVisum', 'namaSertifikat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
