-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2016 at 10:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itcsmand_sino`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id_siswa` int(5) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(20) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` enum('Anak Kandung','Anak Angkat','Anak Tiri') NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `alamat_siswa` varchar(200) NOT NULL,
  `no_telpon_anak` varchar(20) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `asal_kelas` varchar(10) NOT NULL,
  `tgl_terima` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(200) NOT NULL,
  `no_telpon_ortu` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `no_telpon_wali` varchar(20) NOT NULL,
  `pekerjaan_wali` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `view` int(1) NOT NULL,
  `no_peserta` int(20) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id_siswa` (`id_siswa`),
  UNIQUE KEY `username_2` (`username`,`no_peserta`),
  UNIQUE KEY `nis` (`nis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nama_siswa`, `nis`, `tempat_lahir`, `tanggal_lahir`, `kelamin`, `agama`, `status`, `anak_ke`, `alamat_siswa`, `no_telpon_anak`, `asal_sekolah`, `asal_kelas`, `tgl_terima`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `no_telpon_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `alamat_wali`, `no_telpon_wali`, `pekerjaan_wali`, `username`, `password`, `view`, `no_peserta`) VALUES
(1, 'MUHAMAD RIZQI FARHAN', '131412001', 'Sukabumi', '31 Mei 1998', 'Laki-laki', 'Islam', 'Anak Kandung', 1, 'Perumahan bukit randu asri RT 05/022 Cibadak SUkabumi', '081287964854', 'SMPN 1 Cibadak', 'X IPA 6', '-', 'Yudistira, ST', 'Komarawati, SE', 'Perumahan bukit randu asri RT 05/022 Cibadak Sukabumi', '087825603801', 'PNS', 'PNS', '-', '-', '-', '-', 'kucing', 'garong', 0, 131412001),
(2, 'ALVIRA MOHAMAD', '131412002', '', '', 'Laki-laki', '', 'Anak Kandung', 0, '', '0', '', '', '', '', '', '', '0', '', '', '', '', '0', '', 'udin', 'garong', 0, 131412002);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
