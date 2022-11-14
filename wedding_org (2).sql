-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 06:04 AM
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
-- Database: `wedding_org`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `nama`, `alamat`, `no_tlp`, `gambar`) VALUES
(1, 'mohamadarief2090@gmail.com', 'admin', '', '', 'luis garcia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `nama`) VALUES
(1, 'MANDIRI'),
(2, 'BCA'),
(3, 'BRI'),
(4, 'PERMATA'),
(5, 'BNI'),
(6, 'CIMBNIAGA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bankapp`
--

CREATE TABLE `tb_bankapp` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_rekening` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bankapp`
--

INSERT INTO `tb_bankapp` (`id`, `nama`, `no_rekening`) VALUES
(1, 'BCA', '5218432721'),
(2, 'BNI', '5218432722'),
(3, 'BRI', '5218432723'),
(4, 'MANDIRI', '5218432724');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nama`, `alamat`, `no_telp`, `email`, `password`, `gambar`) VALUES
(2, 'mang Darmaaa', 'Tangerang   - banten                                                                                                                                                                                                                                                            ', '0813144777', 'mangdarma@unpas.ac.id', 'mangdarma', 'mangdarma_22.jpg'),
(3, 'Nurull', 'Perumnas 3, Bekasi                                                                                                                        ', '089767712324', 'nurulraws@gmail.com', 'nurul', 'nurul.jpg'),
(5, 'Ria Rahmawati', 'Tambun, Bekasi                    ', '085289878225', 'ag6618836@gmail.com', 'ria_r', 'default.jpg'),
(8, 'Mohamad Faturrahman', 'Tambun, Bekasi Selatan                    ', '0895 3547 373', 'faturahman12345@gmail.com', 'fatur', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(2) NOT NULL,
  `id_pesan` int(2) NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL,
  `id_bankapp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `id_pesan`, `batas_bayar`, `status_pembayaran`, `id_bankapp`) VALUES
(94, 84, '2021-10-25 15:52:15', 'Lunas', 4),
(95, 85, '2021-10-27 17:55:42', 'Lunas', 2),
(96, 86, '2021-11-02 22:33:59', 'Menunggu Pembayaran', 4),
(97, 86, '2021-11-02 22:35:42', 'Menunggu Pembayaran', 4),
(98, 86, '2021-11-02 22:43:13', 'Menunggu Pembayaran', 4),
(99, 86, '2021-11-02 22:44:00', 'Menunggu Pembayaran', 4),
(100, 86, '2021-11-02 22:45:46', 'Menunggu Pembayaran', 4),
(101, 86, '2021-11-02 22:47:13', 'Menunggu Pembayaran', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(2) NOT NULL,
  `id_wo` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_wo`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(2, 40, 'elegant', 'coba in', 2000000, 'feminine-floral2.jpg'),
(4, 40, 'glamour', 'test lagi', 12000000, 'fire-wood-and-earth-weddings-2-BJrcEyfww4.jpg'),
(5, 34, 'elegant', 'MAKEUP BUSANA\r\n1. Makeup & Hair do/hijab do, Akad & Resepsi (hari yang sama)\r\n2. Busana Pengantin (max.3 set)\r\n3. Makeup & Busana Orang tua/Besan\r\n4. Makeup & Busana Pagar Ayu (4 orang)\r\n5. Makeup & Busana Pagar Bagus (2 orang)\r\n\r\nDEKORASI\r\n1. Dekorasi 6meter, Full Dekorasi dan Taman\r\n2. Dekorasi Pelaminan bunga segar\r\n3. Karpet Jalan\r\n4. ALat Prasmanan (2set)\r\n5. Janur (2pcs)\r\n6. Gapura Depan (sesuai tema)\r\n7. Kursi Chitose+sarung (50pcs)\r\n8. Tempat Angpao (2pcs)\r\n9. Meja Prasmanan (2set)\r\n10. Meja Tamu & Vas Bunga Segar (2pcs)\r\n11. Tempat Jus (2pcs)\r\n12. Standing Flower (4pcs)\r\n13. Kursi Futura+sarung (50pcs)\r\n14. Kursi Tiffany & Meja (1set)\r\n15. Ruang VIP\r\n16. Backdrop Photo Selvie\r\n\r\nDOKUMENTASI\r\n1. Foto & Video Shooting\r\n2. Standing Frame Foto\r\n\r\nHIBURAN\r\n1. Sound Sistem\r\n2. Solo Keyboard\r\n3. Penyanyi (1 orang)\r\n\r\nWAITERS\r\n1. Waiters (4 orang)\r\n\r\nFREE: \r\nHenna 7 3D Nails\r\nHand Bouquet\r\n                ', 15000000, 'paket2.jpg'),
(6, 0, 'best', 'baru belajar', 9000000, 'paket_best.png'),
(7, 34, 'best', 'Paket Wedding 300 Pax\r\nFasilitas:\r\nAC, RUANG RIAS ( 2 RUANG), RUANG MEETING, SOUND SYSTEM, MIC WIRELESS, KURSI + COVER 150 PCS\r\nFREE TECHICAL MEETING / TM, PANGGUNG MUSIK, FREE WIFI / INTERNET, GENSET 150 KVA, TERAPI IKAN\r\nGuest House/Penginapan 1 Unit\r\nCatering 300 Pax\r\nGubukan\r\nRias & Busana Pengantin\r\nPhotography\r\nMC & Entertaiment\r\nWedding Organizer (WO) 3 Orang                ', 35000000, 'paket_best.png'),
(8, 34, 'exclusive', ' Paket Intimate Wedding 200 Pax\r\nFasilitas:\r\nAC, RUANG RIAS ( 2 RUANG), RUANG MEETING, SOUND SYSTEM, MIC WIRELESS, KURSI + COVER 150 PCS\r\nFREE TECHICAL MEETING / TM, PANGGUNG MUSIK, FREE WIFI / INTERNET, GENSET 150 KVA, TERAPI IKAN\r\nGuest House/Penginapan 1 Unit\r\nCatering 200 Pax\r\nGubukan\r\nRias & Busana Pengantin\r\nPhotography\r\nMC & Entertaiment\r\nWedding Organizer (WO) 3 Orang               ', 30000000, 'paket_exlusive2.png'),
(9, 34, 'exclusive', 'Paket Intimate Wedding 150 Pax\r\nFasilitas:\r\nAC, RUANG RIAS ( 2 RUANG), RUANG MEETING, SOUND SYSTEM, MIC WIRELESS, KURSI + COVER 150 PCS\r\nFREE TECHICAL MEETING / TM, PANGGUNG MUSIK, FREE WIFI / INTERNET, GENSET 150 KVA, TERAPI IKAN\r\nGuest House/Penginapan 1 Unit\r\nCatering 150 Pax\r\nGubukan\r\nRias & Busana Pengantin\r\nPhotography\r\nMC & Entertaiment\r\nWedding Organizer (WO) 3 Orang', 25000000, 'paket_glamour.png'),
(10, 35, 'elegant', 'A. Gedung dan Fasilitasnya (subsidi Rp. 1 jt.)\r\nB. Buffe Utama 1.200 Pax:\r\nC. Menu Gubuk:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Kue Pengantin (Dummy Cake).\r\nG. MC untuk Resepsi Pernikahan.\r\nH. Dekorasi:\r\nI. Tata Rias & Busana:\r\nJ. Dokumentasi:\r\nK. Prewedding:\r\nL. Mobil Pengantin (Mercy Atau Vellfire) + Hias.\r\nM. Organ Tunggal + Singer.\r\nN. Peralatan:\r\nO. Bonus:', 20000000, 'paket21.jpg'),
(11, 35, 'best', 'A. Gedung & Sarang (subsidi Rp. 1 jt.)\r\nB. Buffe Utama 600 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Kue Pengantin (Dummy Cake).\r\nG. MC untuk Resepsi Pernikahan.\r\nH. Dekorasi:\r\nI. Tata Rias & Busana:\r\nJ. Dokumentasi:\r\nK. Prewedding:\r\nL. Mobil Pengantin (Mercy Atau Vellfire) + Hias.\r\nM. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nO. Bonus:', 25000000, 'paket_best1.png'),
(12, 35, 'glamour', 'A. Gedung & Sarang ( Subsidi Rp. 1 Jt).\r\nB. Buffe Utama 700 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Dekorasi:\r\nG. Tata Rias & Busana:\r\nH. Dokumentasi:\r\nI. Kue Pengantin (Dummy Cake).\r\nJ. MC Untuk Resepsi Pernikahan.\r\nK. Mobil Pengantin (Camry) + Hias (8 jam DKI)\r\nL. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nN. Bonus:', 30000000, 'paket_exlusive3.png'),
(13, 35, 'glamour', 'A. Gedung & Sarang ( Subsidi Rp. 1 Jt).\r\nB. Buffe Utama 800 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Dekorasi:\r\nG. Tata Rias & Busana:\r\nH. Dokumentasi:\r\nI. Kue Pengantin (Dummy Cake).\r\nJ. MC Untuk Resepsi Pernikahan.\r\nK. Mobil Pengantin (Camry) + Hias (8 jam DKI)\r\nL. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nN. Bonus:', 40000000, 'paket_glamour1.png'),
(14, 38, 'elegant', 'A. Gedung & Sarang (subsidi Rp. 1 jt.).\r\nB. Buffe Utama 500 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Dekorasi:\r\nG. Tata Rias & Busana:\r\nH. Dokumentasi:\r\nI. Kue Pengantin (Dummy Cake)\r\nJ. MC Untuk Resepsi Pernikahan.\r\nK. Mobil Pengantin (Mercy/Vellfire) + Hias (8 jam DKI)\r\nL. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nN. Bonus:', 20000000, 'paket214.jpg'),
(15, 38, 'best', 'A. Gedung & Sarang (subsidi Rp. 1 jt.)\r\nB. Buffe Utama 600 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Kue Pengantin (Dummy Cake).\r\nG. MC untuk Resepsi Pernikahan.\r\nH. Dekorasi:\r\nI. Tata Rias & Busana:\r\nJ. Dokumentasi:\r\nK. Prewedding:\r\nL. Mobil Pengantin (Mercy Atau Vellfire) + Hias.\r\nM. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nO. Bonus:', 25000000, 'paket_best2.png'),
(16, 38, 'glamour', 'A. Gedung & Sarang ( Subsidi Rp. 1 Jt).\r\nB. Buffe Utama 700 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Dekorasi:\r\nG. Tata Rias & Busana:\r\nH. Dokumentasi:\r\nI. Kue Pengantin (Dummy Cake).\r\nJ. MC Untuk Resepsi Pernikahan.\r\nK. Mobil Pengantin (Camry) + Hias (8 jam DKI)\r\nL. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nN. Bonus:', 30000000, 'paket_glamour2.png'),
(17, 38, 'exclusive', 'A. Gedung & Sarang ( Subsidi Rp. 1 Jt).\r\nB. Buffe Utama 800 Porsi:\r\nC. Menu Gubug:\r\nD. Menu Sarapan:\r\nE. Pelaminan:\r\nF. Dekorasi:\r\nG. Tata Rias & Busana:\r\nH. Dokumentasi:\r\nI. Kue Pengantin (Dummy Cake).\r\nJ. MC Untuk Resepsi Pernikahan.\r\nK. Mobil Pengantin (Camry) + Hias (8 jam DKI)\r\nL. Organ Tunggal + Singer.\r\nM. Perlengkapan:\r\nN. Bonus:', 35000000, 'paket_exlusive4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(2) NOT NULL,
  `id_invoice` int(2) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `nominal_tf` int(11) NOT NULL,
  `bkt_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `id_invoice`, `tgl_bayar`, `nominal_tf`, `bkt_transaksi`) VALUES
(55, 94, '2021-10-24 00:00:00', 0, '8de7daae9f11021206f548d3e67a7578.jpg'),
(57, 95, '2021-10-27 00:00:00', 20000000, '1c8234aeb01877593bcaa938067c75f2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaranwo`
--

CREATE TABLE `tb_pembayaranwo` (
  `id` int(2) NOT NULL,
  `id_pesan` int(2) NOT NULL,
  `id_pembayarancs` int(2) NOT NULL,
  `tgl_tf` datetime NOT NULL,
  `tgl_approve` datetime NOT NULL,
  `nominal_tf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaranwo`
--

INSERT INTO `tb_pembayaranwo` (`id`, `id_pesan`, `id_pembayarancs`, `tgl_tf`, `tgl_approve`, `nominal_tf`) VALUES
(6, 84, 55, '2021-10-26 00:00:00', '0000-00-00 00:00:00', 25000000),
(9, 85, 57, '2021-10-27 00:00:00', '0000-00-00 00:00:00', 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(2) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `id_paket` int(2) NOT NULL,
  `id_customer` int(2) NOT NULL,
  `lokasi_acara` text NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_acara` datetime NOT NULL,
  `note` text NOT NULL,
  `status_pesananbywo` varchar(15) NOT NULL,
  `status_pesanbycs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `tgl_pesan`, `id_paket`, `id_customer`, `lokasi_acara`, `total`, `tgl_acara`, `note`, `status_pesananbywo`, `status_pesanbycs`) VALUES
(71, '2021-10-15 22:10:27', 8, 2, 'JL. Iskandar Muda, Jakarta Tempoe Doelo', 1, '2021-11-01 00:00:00', '', '', '93'),
(72, '2021-10-16 13:49:58', 11, 5, 'jl. cut Nya dien, aceh', 1, '2021-11-01 00:00:00', '', '', '93'),
(73, '2021-10-16 14:03:49', 12, 5, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-04 00:00:00', '', '', '93'),
(74, '2021-10-16 14:04:18', 12, 5, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-04 00:00:00', '', '', '93'),
(75, '2021-10-16 14:07:04', 12, 5, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-04 00:00:00', '', '', '93'),
(76, '2021-10-16 14:13:32', 8, 5, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-05 00:00:00', '', '', '93'),
(77, '2021-10-16 14:17:06', 8, 5, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-05 00:00:00', '', '', '93'),
(78, '2021-10-17 19:31:41', 11, 3, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-06 00:00:00', '', '', '93'),
(79, '2021-10-17 19:38:24', 9, 3, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-01 00:00:00', '', '', '93'),
(80, '2021-10-17 19:39:50', 9, 3, 'jl. keselamatan Dunia Akhirat', 1, '2021-11-01 00:00:00', '', '', '93'),
(81, '2021-10-17 20:11:58', 7, 3, 'jl. keselamatan Dunia Akhirat', 1, '2021-10-31 00:00:00', '', '', 'Belum Bekerja'),
(84, '2021-10-24 15:52:15', 9, 3, 'jl. keselamatan Dunia Akhirat', 1, '2021-10-24 00:00:00', '', 'Persiapan', 'Bekerja'),
(85, '2021-10-26 17:55:42', 10, 8, '', 1, '2021-10-26 00:00:00', '', '', ''),
(86, '2021-11-01 22:33:59', 12, 8, 'cirebon   - Jawa Barat', 1, '2021-12-11 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(2) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_role` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `nama`, `username`, `password`, `id_role`, `is_active`, `created_at`, `date_created`, `gambar`) VALUES
(13, 'mangdarma@unpas.ac.id', 'mang Darma', '', 'mangdarma', 3, 1, '0000-00-00 00:00:00', 1604672691, 'default.jpg'),
(14, 'nurulraws@gmail.com', 'Nurul', '', 'nurul', 3, 1, '0000-00-00 00:00:00', 1605080388, 'default.jpg'),
(17, 'ag6618836@gmail.com', 'Ria Rahmawati', '', 'ria_r', 3, 1, '0000-00-00 00:00:00', 1605868836, 'default.jpg'),
(19, 'faturahman12345@gmail.com', 'Mohamad Faturrahman', '', 'fatur', 3, 1, '0000-00-00 00:00:00', 1606305870, 'default.jpg'),
(27, 'dennyseptiady2012@gmail.com', 'Denny Septiadi', '', 'aksa_c', 2, 1, '0000-00-00 00:00:00', 1606802162, 'c0d1caa4-5988-4ba6-9bda-fc946108c5ad_1695.jpg'),
(28, 'dejanjaya0@gmail.com', 'dejan jaya', '', 'motion_p', 2, 1, '0000-00-00 00:00:00', 1606802762, 'bv-65-SygRSBQvw2.jpg'),
(29, 'budi_r@gmail.com', 'Budi Raharjo', '', 'nukami_p', 2, 1, '0000-00-00 00:00:00', 1606808204, 'upload-B1KpKDq5D2.jpg'),
(30, 'bedusubuh@gmail.com', 'Bedu subuh', '', 'allisha_b', 2, 1, '0000-00-00 00:00:00', 1606808663, 'whatsapp-image-2019-09-27-at-15_21_47-1-ryTxrhNDD1.jpg'),
(31, 'alizaenal@gmail.com', 'Ali Zaenal', '', 'a_story', 2, 1, '0000-00-00 00:00:00', 1606823978, 'paris7.jpg'),
(50, 'mohamadarief2090@gmail.com', 'mohamad arief', 'admin', 'admin', 1, 1, '0000-00-00 00:00:00', 1607326709, 'luis garcia.jpg'),
(51, 'daviddegea@gmail.com', 'David De Gea', '', 'tein_m', 2, 1, '0000-00-00 00:00:00', 1610172795, 'upload-BJ8InSaIO1.jpg'),
(53, 'tes@gmail.com', 'tes lagi', '', '123', 2, 0, '0000-00-00 00:00:00', 1612591296, 'teknisi_elektronik.jpg'),
(54, 'coba@gmail.com', 'coba', '', '123', 2, 1, '0000-00-00 00:00:00', 1612703218, 'teknisi_elektronik3.jpg'),
(56, 'windyorganizer456@gmail.com', '', '', 'windy123', 2, 1, '0000-00-00 00:00:00', 1632109780, 'feminine-floral10.jpg'),
(57, 'eurasia@gmail.com', '', '', 'eurasia123', 2, 0, '0000-00-00 00:00:00', 1632110839, 'download_(1).png'),
(58, 'ItalianStyle_org@gmail.com', '', '', 'italian123', 2, 0, '0000-00-00 00:00:00', 1632111844, 'planner-logo.jpg'),
(59, 'pariswedding@gmail.com', 'pariswedding', '', 'paris123', 2, 0, '0000-00-00 00:00:00', 1632113788, 'paris.jpg'),
(66, 'fauzismp13@gmail.com', 'London_wedding_org', '', 'fauzi123', 2, 1, '0000-00-00 00:00:00', 1635433109, 'dashboard_wedding36.jpg'),
(71, 'mehrief77@gmail.com', 'yyyy', '', 'romawi123', 2, 1, '0000-00-00 00:00:00', 1635755576, 'c0d1caa4-5988-4ba6-9bda-fc946108c5ad_16910.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wo`
--

CREATE TABLE `tb_wo` (
  `id` int(2) NOT NULL,
  `nama_wo` varchar(30) NOT NULL,
  `alamat` text,
  `no_telp` varchar(13) DEFAULT NULL,
  `akun_ig` varchar(15) NOT NULL,
  `gambar` text NOT NULL,
  `no_ktp` text NOT NULL,
  `no_rek` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_bank` int(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wo`
--

INSERT INTO `tb_wo` (`id`, `nama_wo`, `alamat`, `no_telp`, `akun_ig`, `gambar`, `no_ktp`, `no_rek`, `email`, `id_bank`, `status`) VALUES
(34, 'Aksa Creative', 'Bekasi, Jawa Barat                                                                                                                                                                                                               ', '085219234541', '', 'c0d1caa4-5988-4ba6-9bda-fc946108c5ad_1694.jpg', '', '5558432721', 'dennyseptiady2012@gmail.com', 0, ''),
(35, 'Motion pict', 'Rawa Lumbu - Bekasi                                                                                                    ', '081314476888', '', 'bv-65-SygRSBQvw1.jpg', '', '5558432722', 'dejanjaya0@gmail.com', 0, ''),
(36, 'Nukami Photona', 'Bandung                                                                                                                                       ', '081314476899', '', 'upload-B1KpKDq5D1.jpg', '', '5558432723', 'budi_r@gmail.com', 0, ''),
(37, 'Allisha Bride', 'Klub Kelapa Gading, RW.1, East Kelapa Gading, North Jakarta City, Jakarta, Indonesia                                                                                    ', '082334523345', '', 'whatsapp-image-2019-09-27-at-15_21_47-1-ryTxrhNDD.jpg', '', '5558432724', 'bedusubuh@gmail.com', 0, ''),
(38, 'A Story', 'Jl. Pejaten Barat No.16A, RT.1/RW.10, Ragunan\r\nKec. Ps. Minggu, Kota Jakarta Selatan                                                                                                       ', '0895 3547 373', 'A_Story_org', 'paris5.jpg', '', '5558432725', 'alizaenal@gmail.com', 0, ''),
(39, 'TeinMiere', 'Bandung                                                                                                                                                         ', '085289878445', '', 'upload-BJ8InSaIO.jpg', '', '5558432726', 'daviddegea@gmail.com', 0, ''),
(40, 'windy organizerrr', 'kp. Melayu - Jakarta Timurrr                                                       ', '089535473843', 'windyorganizerr', 'feminine-floral8.jpg', 'images1.Jpg', '12345678901', 'windyorganizer456@gmail.com', 0, ''),
(41, 'eurasia_org', 'jl. kemerdekaan, Pekan Baru - Riau', '0813144768888', 'eurasia_org123', 'download_(1).png', 'download3.jpg', '1234567899', 'eurasia@gmail.com', 0, ''),
(42, 'Italian wedding', 'Jl.Sumpah Pemuda, Surakarta', '089335474837', 'ItalianStyle_or', 'planner-logo2.jpg', 'KTP5.jpeg', '1234567880', 'ItalianStyle_org@gmail.com', 0, ''),
(43, 'pariswedding', 'jl.Limau 4, Jakarta Timur333', '085289878222', 'pariswedding333', 'feminine-floral20.jpg', 'images6.Jpg', '1234567796', 'pariswedding@gmail.com', 0, ''),
(50, 'London_wedding_org', 'jl. Baru kkk', '0895 3547 383', 'London_wedding.', 'dashboard_wedding36.jpg', 'KTP8.jpeg', '1234567889', 'fauzismp13@gmail.com', 0, ''),
(54, 'yyyy', 'yyyy', '085289878225', 'yyyy.ig', 'c0d1caa4-5988-4ba6-9bda-fc946108c5ad_16910.jpg', 'download12.jpg', '12345678910', 'mehrief77@gmail.com', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(2) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`, `created_at`, `id_user`) VALUES
(28, 'mangdarma@unpas.ac.id', '6nSO2yEvJ4Vz2lHA3kxYI+EPmaOZ3S', 1604672691, '0000-00-00 00:00:00', 0),
(29, 'nurulraws@gmail.com', 'VEph4XLHwYiGS4rt5tNKE/Aj+p0O9O', 1605080388, '0000-00-00 00:00:00', 0),
(32, 'ag6618836@gmail.com', '4rUW38GYcmoDDyo9wdDJMHuE0VBprt', 1605868836, '0000-00-00 00:00:00', 0),
(34, 'faturahman12345@gmail.com', 'az6K+8deE2qLjBltFSRemsBXtQ5lQX', 1606305870, '0000-00-00 00:00:00', 0),
(42, 'dennyseptiady2012@gmail.com', 'vpNWMR/5FYp9SeSyQnaFay2JSBM3Mq', 1606802162, '0000-00-00 00:00:00', 0),
(43, 'dejanjaya0@gmail.com', 'WrRWlj0RhCHSlQxTr4PctDw5zwtNCw', 1606802762, '0000-00-00 00:00:00', 0),
(44, 'budi_r@gmail.com', 'NhijMNsMEeqUknBS9Wod2k4usKdtyU', 1606808204, '0000-00-00 00:00:00', 0),
(45, 'bedusubuh@gmail.com', 'eUtBotkYuD+iAGQVFd6cBy+TdySkHn', 1606808663, '0000-00-00 00:00:00', 0),
(46, 'alizaenal@gmail.com', 'kiTsJkXGXQXaYF1nteFtuj+KuADZSf', 1606823978, '0000-00-00 00:00:00', 0),
(47, 'daviddegea@gmail.com', 'Bvy5MVGHntZoJ2EKLkE8rYZHEeHc/P', 1610172795, '0000-00-00 00:00:00', 0),
(48, 'wanita123@gmail.com', 'wbGPdrlyELsiWG/YXIN49xlpDreqZN', 1612437063, '0000-00-00 00:00:00', 0),
(49, 'tes@gmail.com', 'gQhzRr8Bq+C0X9FFv0WjmDpiySO+v4', 1612591296, '0000-00-00 00:00:00', 0),
(50, 'coba@gmail.com', 'x1L4Gz99v04g1aL0vok2zCu98vjaeX', 1612703218, '0000-00-00 00:00:00', 0),
(51, 'windyorganizer456@gmail.com', '/D/yrOsqlO9tQVs0OC54yhcAaoaIM1', 1632109780, '0000-00-00 00:00:00', 0),
(52, 'eurasia@gmail.com', '0tWzWvC9eqTfD91Bv2jxbhqpkPnFW8', 1632110839, '0000-00-00 00:00:00', 0),
(53, 'ItalianStyle_org@gmail.com', '6KaEz+thZtFsyzYJC6FKMkXbf8prni', 1632111844, '0000-00-00 00:00:00', 0),
(54, 'pariswedding@gmail.com', 'j1TSI7vH+CIIc3uZgeUreEdOLEtjVD', 1632113788, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bankapp`
--
ALTER TABLE `tb_bankapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaranwo`
--
ALTER TABLE `tb_pembayaranwo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_pesan` (`id_pesan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wo`
--
ALTER TABLE `tb_wo`
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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_bankapp`
--
ALTER TABLE `tb_bankapp`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_pembayaranwo`
--
ALTER TABLE `tb_pembayaranwo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_wo`
--
ALTER TABLE `tb_wo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
