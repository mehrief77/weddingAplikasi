-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 07:53 AM
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
-- Database: `e_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `name`, `gambar`) VALUES
(1, 'mohamadarief1090@gmail.com', 'admin', 'luis garcia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `alamat`, `no_telp`, `email`, `password`, `gambar`) VALUES
(2, 'mang Darmaa', 'Tangerang                                                                                                                                                                                                                        ', '0813144768', 'mangdarma@unpas.ac.id', 'mangdarma', 'mangdarma_22.jpg'),
(3, 'Nurull', 'Perumnas 3, Bekasi                                                                                                                        ', '089767712324', 'nurulraws@gmail.com', 'nurul', 'nurul.jpg'),
(5, 'Ria Rahmawati', 'Tambun, Bekasi                    ', '085289878225', 'ag6618836@gmail.com', 'ria_r', 'default.jpg'),
(8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '0895 3547 373', 'faturahman12345@gmail.com', 'fatur', 'default.jpg'),
(25, 'fauzi smp', 'jl.baru', '0895 3547 373', 'fauzismp13@gmail.com', '123', 'bartez.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `metode` varchar(100) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_jasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_customer`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `metode`, `status_pembayaran`, `status_jasa`) VALUES
(23, 8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '2020-12-17 11:25:52', '2020-12-18 11:25:52', 'BNI - 5218432722', 'Lunas', ''),
(24, 8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '2020-12-17 11:31:25', '2020-12-18 11:31:25', 'BNI - 5218432722', 'lunas', ''),
(25, 8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '2020-12-17 11:36:24', '2020-12-18 11:36:24', 'BNI - 5218432722', 'lunas', ''),
(27, 8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '2020-12-17 12:13:14', '2020-12-18 12:13:14', 'BNI - 5218432722', 'lunas', ''),
(28, 3, 'Nurul', 'Perumnas 3, Bekasi                                        ', '2020-12-17 13:38:59', '2020-12-18 13:38:59', 'MANDIRI - 5218432724', 'Lunas', ''),
(29, 3, 'Nurul', 'Perumnas 3, Bekasi                                        ', '2020-12-17 15:37:19', '2020-12-18 15:37:19', 'BRI - 5218432723', 'Lunas', ''),
(30, 3, 'Nurul', 'Perumnas 3, Bekasi                                        ', '2020-12-17 15:46:05', '2020-12-18 15:46:05', 'MANDIRI - 5218432724', 'Lunas', ''),
(31, 3, 'Nurul', 'Perumnas 3, Bekasi                                        ', '2021-01-04 15:09:47', '2021-01-05 15:09:47', 'MANDIRI - 5218432724', 'Lunas', ''),
(33, 3, 'Nurul', 'Perumnas 3, Bekasi                                        ', '2021-01-08 15:19:32', '2021-01-09 15:19:32', 'BCA - 5218432721', 'Lunas', ''),
(34, 2, 'mang Darma', 'Tangerang                                                                                                                                                                                                                    ', '2021-01-18 21:33:53', '2021-01-19 21:33:53', 'MANDIRI - 5218432724', 'Lunas', ''),
(35, 25, 'fauzi smp', 'jl.baru', '2021-01-18 22:27:35', '2021-01-19 22:27:35', 'BRI - 5218432723', 'Lunas', ''),
(36, 25, 'fauzi smp', 'jl.baru', '2021-01-20 15:27:31', '2021-01-21 15:27:31', 'MANDIRI - 5218432724', 'Lunas', ''),
(37, 25, 'fauzi smp', 'jl.baru', '2021-01-20 15:35:22', '2021-01-21 15:35:22', 'BCA - 5218432721', 'Lunas', ''),
(38, 25, 'fauzi smp', 'jl.baru', '2021-01-20 15:49:29', '2021-01-21 15:49:29', 'BCA - 5218432721', 'Lunas', ''),
(39, 25, 'fauzi smp', 'jl.baru', '2021-01-20 15:52:59', '2021-01-21 15:52:59', 'BCA - 5218432721', 'Lunas', ''),
(40, 25, 'fauzi smp', 'jl.baru', '2021-01-20 17:11:23', '2021-01-21 17:11:23', 'MANDIRI - 5218432724', 'Lunas', ''),
(41, 25, 'fauzi smp', 'jl.baru', '2021-01-20 17:28:49', '2021-01-21 17:28:49', 'MANDIRI - 5218432724', 'Lunas', ''),
(42, 25, 'fauzi smp', 'jl.baru', '2021-01-22 20:19:35', '2021-01-23 20:19:35', 'BCA - 5218432721', 'Lunas', ''),
(44, 25, 'fauzi smp', 'jl.baru', '2021-01-24 19:10:42', '2021-01-25 19:10:42', 'BCA - 5218432721', 'Lunas', ''),
(46, 2, 'mang Darmaa', 'Tangerang                                                                                                                                                                                                                        ', '2021-02-04 01:05:27', '2021-02-05 01:05:27', 'BCA - 5218432721', 'Lunas', ''),
(48, 2, 'mang Darmaa', 'Tangerang                                                                                                                                                                                                                        ', '2021-02-04 10:29:42', '2021-02-05 10:29:42', 'BCA - 5218432721', 'Lunas', ''),
(50, 2, 'mang Darmaa', 'Tangerang                                                                                                                                                                                                                        ', '2021-02-04 11:04:06', '2021-02-05 11:04:06', 'BCA - 5218432721', 'Lunas', ''),
(52, 3, 'Nurull', 'Perumnas 3, Bekasi                                                                                                    ', '2021-02-05 14:11:42', '2021-02-06 14:11:42', 'BNI - 5218432722', 'Lunas', ''),
(53, 3, 'Nurull', 'Perumnas 3, Bekasi                                                                                                    ', '2021-02-06 13:27:52', '2021-02-07 13:27:52', 'MANDIRI - 5218432724', 'Lunas', ''),
(54, 3, 'Nurull', 'Perumnas 3, Bekasi                                                                                                                        ', '2021-02-17 10:30:19', '2021-02-18 10:30:19', 'MANDIRI - 5218432724', 'Lunas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_detail`
--

CREATE TABLE `tb_invoice_detail` (
  `id_invoice` int(11) NOT NULL,
  `id_tkg` int(11) NOT NULL,
  `status_jasa` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice_detail`
--

INSERT INTO `tb_invoice_detail` (`id_invoice`, `id_tkg`, `status_jasa`, `status`) VALUES
(44, 38, 'Selesai', 'Selesai'),
(44, 35, 'Selesai', ''),
(23, 35, 'Selesai', 'Selesai'),
(24, 37, 'Selesai', ''),
(24, 37, 'Selesai', ''),
(25, 38, 'Selesai', ''),
(31, 34, 'Selesai', 'Selesai'),
(31, 35, 'Selesai', ''),
(31, 37, 'Selesai', ''),
(27, 37, 'Proses', ''),
(27, 37, 'Selesai', ''),
(29, 38, 'Selesai', ''),
(30, 37, 'Selesai', 'Selesai'),
(33, 35, 'Selesai', 'Selesai'),
(34, 36, 'Selesai', 'Selesai'),
(35, 39, 'Selesai', 'Berangkat'),
(36, 37, 'Selesai', ''),
(37, 34, 'Selesai', ''),
(38, 36, 'Selesai', 'Selesai'),
(39, 35, 'Selesai', 'Selesai'),
(40, 38, 'Selesai', 'Selesai'),
(41, 36, 'Selesai', 'Selesai'),
(42, 34, 'Selesai', ''),
(33, 35, 'Selesai', 'Selesai'),
(29, 38, 'Selesai', ''),
(33, 35, 'Selesai', 'Selesai'),
(34, 36, 'Komplen', 'Selesai'),
(34, 36, 'Komplen', 'Selesai'),
(46, 34, 'Selesai', 'Persiapan'),
(46, 34, 'Selesai', 'Persiapan'),
(46, 34, 'Selesai', 'Persiapan'),
(48, 35, 'Selesai', 'Selesai'),
(30, 37, 'Selesai', 'Selesai'),
(28, 36, 'Proses', 'Selesai'),
(28, 36, 'Selesai', 'Selesai'),
(53, 39, 'Selesai', 'Selesai'),
(54, 36, 'Selesai', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jasa`
--

CREATE TABLE `tb_jasa` (
  `id_tkg` int(11) NOT NULL,
  `nama_tkg` varchar(60) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `keahlian` varchar(60) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga_tkg` int(11) NOT NULL,
  `bayaran` varchar(60) NOT NULL,
  `gambar` text NOT NULL,
  `no_ktp` text,
  `email` varchar(128) DEFAULT NULL,
  `sertifikat` text NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jasa`
--

INSERT INTO `tb_jasa` (`id_tkg`, `nama_tkg`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `agama`, `jk`, `pendidikan`, `keahlian`, `kategori`, `harga_tkg`, `bayaran`, `gambar`, `no_ktp`, `email`, `sertifikat`, `status`) VALUES
(34, 'Denny Septiadi ok', 'Bekasi', '1997-02-11', 'Bekasi, Jawa Barat                                                                                                                        ', '085219234541', 'Islam', 'L', 'sma', 'Sumur Bor', 'Tukang Ledeng', 1500000, 'Borongan', 'pompaair_1.jpg', 'ktpdenny_s1.jpg', 'dennyseptiady2012@gmail.com', 'sertifikat ledeng.jpg', 'Selesai'),
(35, 'dejan jayaaa', 'Bogor', '1994-05-08', 'Rawa Lumbu - Bekasi                                                                                ', '081314476888', 'Islam', 'L', 'sma', 'Instalasi Listrik', 'Electrical', 100000, 'Borongan', 'dejan_listr.jpg', 'Ktpdejanjaya.jpg', 'dejanjaya0@gmail.com', 'sertifikat listrik.jpg', 'Selesai'),
(36, 'Budi Raharjo', 'Semarang', '1985-06-08', 'Jl. Panjang, Karawnag                                                            ', '081314476899', 'Islam', 'L', 'sma', 'Las Pagar Rumah', 'Perkakas', 100000, 'Borongan', 'budi_r.jpg', 'ktp_budi.jpg', 'budi_r@gmail.com', 'sertifikat las.jpg', 'Berangkat'),
(37, 'Bedu subuh', 'Tangerang', '1984-05-03', 'Kp. Rambutan, Jakarta                                        ', '085289878335', 'Islam', 'L', 'sma', 'Membangun rumah', 'Tukang Bangunan', 150000, 'Harian', 'bangunanbedu.jpg', 'ktpbedu.jpg', 'bedusubuh@gmail.com', 'sertifikat bangunan.png', 'Selesai'),
(38, 'Ali Zaenal', 'Kerawang', '1999-01-09', 'jl.mawar 3 -  bekasi                                                                                ', '0895 3547 373', 'Islam', 'L', 'sma', 'Riper Laptop', 'Elektronik', 150000, 'Borongan', 'RiperKomputer_1.jpg', 'ali_Zaenal.jpg', 'alizaenal@gmail.com', 'sertifikat elektronik.jpg', 'Selesai'),
(39, 'David De Gea', 'Manado, Sulawesi', '1983-06-09', 'Jl. Merdeka, Depok                                                                                                                                            ', '085289878445', 'Katolik', 'L', 'sma', 'Membuat Kanopi', 'Perkakas', 2000000, 'Borongan', 'degea1.jpg', 'download2.jpg', 'daviddegea@gmail.com', 'sertifikat las.jpg', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `metode` varchar(100) NOT NULL,
  `bkt_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_invoice`, `id_customer`, `tgl_bayar`, `metode`, `bkt_transaksi`) VALUES
(15, 22, 2, '0000-00-00', 'BNI - 5218432722', 'f85555ceaa891a564166559e0bf68333.jpg'),
(16, 23, 8, '2020-12-17', 'BNI - 5218432722', 'b9fb9d37bdf15a699bc071ce49baea53.jpg'),
(17, 24, 8, '2020-12-17', 'BNI - 5218432722', '904dbff1cf66e1100e990161f319db56.jpg'),
(18, 25, 8, '2020-12-17', 'BNI - 5218432722', 'b9fb9d37bdf15a699bc071ce49baea53.jpg'),
(19, 27, 8, '2020-12-17', 'BNI - 5218432722', '8ab2b6db2fc7d04a58a3b3815e51e650.jpg'),
(20, 28, 3, '2020-12-17', 'MANDIRI - 5218432724', 'b9203826156e5fb175a96463424ee88c.jpg'),
(21, 29, 3, '2020-12-17', 'BRI - 5218432723', '904dbff1cf66e1100e990161f319db56.jpg'),
(22, 30, 3, '2020-12-17', 'MANDIRI - 5218432724', 'dd3a58fd6d40bad874666df74f3d9849.jpg'),
(23, 31, 3, '2021-01-08', 'MANDIRI - 5218432724', '55ccf27d26d7b23839986b6ae2e447ab.jpg'),
(25, 34, 2, '2021-01-18', 'MANDIRI - 5218432724', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(26, 33, 3, '0000-00-00', 'BCA - 5218432721', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(27, 35, 25, '2021-01-18', 'BRI - 5218432723', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(28, 36, 25, '2021-01-20', 'MANDIRI - 5218432724', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(29, 38, 25, '2021-01-20', 'BCA - 5218432721', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(30, 39, 25, '2021-01-20', 'BCA - 5218432721', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(31, 40, 25, '2021-01-20', 'MANDIRI - 5218432724', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(32, 41, 25, '2021-01-20', 'MANDIRI - 5218432724', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(33, 42, 25, '2021-01-22', 'BCA - 5218432721', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(34, 44, 25, '2021-01-24', 'BCA - 5218432721', '1e6ae4ada992769567b71815f124fac5.jpg'),
(35, 37, 25, '2021-01-26', 'BCA - 5218432721', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(36, 46, 2, '2021-02-04', 'BCA - 5218432721', 'efc1a80c391be252d7d777a437f86870.jpg'),
(37, 48, 2, '2021-02-04', 'BCA - 5218432721', 'efc1a80c391be252d7d777a437f86870.jpg'),
(38, 50, 2, '2021-02-04', 'BCA - 5218432721', 'efc1a80c391be252d7d777a437f86870.jpg'),
(39, 52, 3, '2021-02-05', 'BNI - 5218432722', '5c642ec854a6a92a56d7ebf0b9648eea.jpg'),
(40, 53, 3, '2021-02-06', 'MANDIRI - 5218432724', 'efc1a80c391be252d7d777a437f86870.jpg'),
(41, 54, 3, '0000-00-00', 'MANDIRI - 5218432724', '15e5e38937f0502785148080bfa8bf74.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_tkg` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga_tkg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `email`, `id_invoice`, `id_tkg`, `jumlah`, `harga_tkg`) VALUES
(26, 'faturahman12345@gmail.com', 23, 35, 1, 100000),
(27, 'faturahman12345@gmail.com', 24, 37, 1, 150000),
(28, 'faturahman12345@gmail.com', 25, 38, 1, 100000),
(29, 'faturahman12345@gmail.com', 27, 37, 1, 150000),
(30, 'nurulraws@gmail.com', 28, 36, 1, 100000),
(31, 'nurulraws@gmail.com', 29, 38, 1, 100000),
(32, 'nurulraws@gmail.com', 30, 37, 1, 150000),
(33, 'nurulraws@gmail.com', 31, 34, 1, 1500000),
(34, 'nurulraws@gmail.com', 31, 35, 1, 100000),
(35, 'nurulraws@gmail.com', 31, 37, 1, 150000),
(38, 'nurulraws@gmail.com', 33, 35, 1, 100000),
(39, 'mangdarma@unpas.ac.id', 34, 36, 1, 100000),
(40, 'fauzismp13@gmail.com', 35, 39, 1, 2000000),
(41, 'fauzismp13@gmail.com', 36, 37, 1, 150000),
(42, 'fauzismp13@gmail.com', 37, 34, 1, 1500000),
(43, 'fauzismp13@gmail.com', 38, 36, 1, 100000),
(44, 'fauzismp13@gmail.com', 39, 35, 1, 100000),
(45, 'fauzismp13@gmail.com', 40, 38, 1, 100000),
(46, 'fauzismp13@gmail.com', 40, 35, 1, 100000),
(47, 'fauzismp13@gmail.com', 41, 36, 1, 100000),
(48, 'fauzismp13@gmail.com', 42, 34, 2, 1500000),
(49, 'nurulraws@gmail.com', 43, 38, 1, 100000),
(50, 'nurulraws@gmail.com', 43, 39, 1, 2000000),
(51, 'fauzismp13@gmail.com', 44, 38, 1, 100000),
(52, 'fauzismp13@gmail.com', 44, 35, 1, 100000),
(53, 'mangdarma@unpas.ac.id', 46, 34, 1, 1500000),
(54, 'mangdarma@unpas.ac.id', 48, 35, 1, 100000),
(55, 'mangdarma@unpas.ac.id', 50, 37, 1, 150000),
(56, 'nurulraws@gmail.com', 51, 36, 1, 100000),
(57, 'nurulraws@gmail.com', 52, 38, 1, 100000),
(58, 'nurulraws@gmail.com', 53, 39, 1, 2000000),
(59, 'nurulraws@gmail.com', 54, 36, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `name`, `username`, `password`, `role_id`, `is_active`, `date_created`, `gambar`) VALUES
(13, 'mangdarma@unpas.ac.id', 'mang Darma', '', 'mangdarma', 3, 1, 1604672691, 'default.jpg'),
(14, 'nurulraws@gmail.com', 'Nurul', '', 'nurul', 3, 1, 1605080388, 'default.jpg'),
(17, 'ag6618836@gmail.com', 'Ria Rahmawati', '', 'ria_r', 3, 1, 1605868836, 'default.jpg'),
(19, 'faturahman12345@gmail.com', 'Mohamad Faturrahman', '', 'fatur', 3, 1, 1606305870, 'default.jpg'),
(27, 'dennyseptiady2012@gmail.com', 'Denny Septiadi', '', 'denny_s', 2, 1, 1606802162, 'pompaair_1.jpg'),
(28, 'dejanjaya0@gmail.com', 'dejan jaya', '', 'dejan_j', 2, 1, 1606802762, 'dejan_listr.jpg'),
(29, 'budi_r@gmail.com', 'Budi Raharjo', '', 'budi_r', 2, 1, 1606808204, 'budi_r.jpg'),
(30, 'bedusubuh@gmail.com', 'Bedu subuh', '', 'bedu_s', 2, 1, 1606808663, 'bangunanbedu.jpg'),
(31, 'alizaenal@gmail.com', 'Ali Zaenal', '', 'ali_z', 2, 1, 1606823978, 'RiperKomputer_1.jpg'),
(48, 'fauzismp13@gmail.com', 'fauzi smp', '', '123', 3, 1, 1607326728, 'default.jpg'),
(50, 'mohamadarief1090@gmail.com', 'mohamad arief', 'admin', 'admin', 1, 1, 1607326709, 'luis garcia.jpg'),
(51, 'daviddegea@gmail.com', 'David De Gea', '', '1234', 2, 1, 1610172795, 'degea.jpg'),
(52, 'wanita123@gmail.com', 'test', '', '123', 2, 1, 1612437063, 'wanita.png'),
(53, 'tes@gmail.com', 'tes lagi', '', '123', 2, 0, 1612591296, 'teknisi_elektronik.jpg'),
(54, 'coba@gmail.com', 'coba', '', '123', 2, 1, 1612703218, 'teknisi_elektronik3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(28, 'mangdarma@unpas.ac.id', '6nSO2yEvJ4Vz2lHA3kxYI+EPmaOZ3SAUkZFTSOFm1J4=', 1604672691),
(29, 'nurulraws@gmail.com', 'VEph4XLHwYiGS4rt5tNKE/Aj+p0O9OYPDRknUqaugPY=', 1605080388),
(32, 'ag6618836@gmail.com', '4rUW38GYcmoDDyo9wdDJMHuE0VBprtHbRn+5A0bTvDE=', 1605868836),
(34, 'faturahman12345@gmail.com', 'az6K+8deE2qLjBltFSRemsBXtQ5lQXRZOm+PFgc1v+s=', 1606305870),
(42, 'dennyseptiady2012@gmail.com', 'vpNWMR/5FYp9SeSyQnaFay2JSBM3MqQH43c/YrdEUyc=', 1606802162),
(43, 'dejanjaya0@gmail.com', 'WrRWlj0RhCHSlQxTr4PctDw5zwtNCwvU0pan65NBU+Y=', 1606802762),
(44, 'budi_r@gmail.com', 'NhijMNsMEeqUknBS9Wod2k4usKdtyUPolmZN5qnwjew=', 1606808204),
(45, 'bedusubuh@gmail.com', 'eUtBotkYuD+iAGQVFd6cBy+TdySkHnmQSXQHfHLHAm8=', 1606808663),
(46, 'alizaenal@gmail.com', 'kiTsJkXGXQXaYF1nteFtuj+KuADZSf+l/fmdTxr8HFU=', 1606823978),
(47, 'daviddegea@gmail.com', 'Bvy5MVGHntZoJ2EKLkE8rYZHEeHc/Pd8DDqZ6dfegkg=', 1610172795),
(48, 'wanita123@gmail.com', 'wbGPdrlyELsiWG/YXIN49xlpDreqZN2eFaEX5MtNrjQ=', 1612437063),
(49, 'tes@gmail.com', 'gQhzRr8Bq+C0X9FFv0WjmDpiySO+v4+4O7zrwRmYqII=', 1612591296),
(50, 'coba@gmail.com', 'x1L4Gz99v04g1aL0vok2zCu98vjaeXeGuhm6YprZwIc=', 1612703218);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD PRIMARY KEY (`id_tkg`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_jasa`
--
ALTER TABLE `tb_jasa`
  MODIFY `id_tkg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
