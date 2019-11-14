-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 07:43 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baju_anak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(7) NOT NULL,
  `nama_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `nama_akses`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(7) NOT NULL,
  `id_warna` int(7) NOT NULL,
  `jumlah_barang` varchar(8) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_user`, `id_produk`, `id_ukuran`, `id_warna`, `jumlah_barang`, `harga`, `status`) VALUES
(1, 1, 4, 0, 0, '3', '50000', ''),
(2, 1, 6, 0, 0, '5', '80000', ''),
(4, 1, 7, 13, 2, '3', '780000', ''),
(5, 1, 7, 13, 3, '1', '260000', ''),
(6, 1, 7, 13, 2, '2', '520000', ''),
(7, 1, 7, 13, 2, '2', '520000', ''),
(8, 1, 7, 13, 2, '2', '520000', ''),
(9, 1, 7, 1, 2, '1', '220000', ''),
(15, 2, 7, 1, 2, '2', '440000', 'pasif'),
(17, 2, 7, 1, 3, '1', '220000', 'pasif'),
(18, 2, 7, 13, 2, '1', '260000', 'aktif'),
(19, 2, 7, 1, 3, '1', '220000', 'aktif'),
(22, 2, 7, 9, 4, '3', '720000', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(7) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `ukuran` int(5) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `stok` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `ukuran`, `warna`, `foto`, `stok`) VALUES
(7, 'Aisyah Kid', 1, 'Abu-abu', 'Produk__1573368061.jpg', 10),
(8, 'Example 2', 7, 'Dusty Pink', 'Produk__1573368080.jpg', 5),
(9, 'Example 3', 8, 'Dusty Pink', 'Produk__1573368103.jpg', 10),
(10, 'Example 4', 10, 'Ungu', 'Produk__1573368118.png', 3),
(11, 'Example 5', 11, 'Peach', 'Produk__1573368136.png', 3),
(12, 'Example 6', 12, 'Merah Maroon', 'Produk__1573368151.png', 7),
(13, 'Example 7', 13, 'Ungu', 'Produk__1573368168.jpg', 18),
(14, 'Example 8', 9, 'Peach', 'Produk__1573368222.jpg', 17),
(15, 'GO Baju', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(7) NOT NULL,
  `id_produk` int(7) NOT NULL,
  `id_ukuran` int(7) NOT NULL,
  `id_warna` int(7) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jumlah_stok` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_produk`, `id_ukuran`, `id_warna`, `foto`, `jumlah_stok`) VALUES
(6, 7, 1, 3, 'Produk__1573477194.jpg', 1),
(7, 7, 13, 2, 'Produk__1573518038.jpg', 1),
(8, 7, 9, 4, 'Produk__1573709761.jpg', 7),
(9, 7, 15, 4, 'Produk__1573709823.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(7) NOT NULL,
  `id_user` int(7) NOT NULL,
  `id_cart1` int(5) NOT NULL,
  `id_cart2` int(5) NOT NULL,
  `id_cart3` int(5) NOT NULL,
  `id_cart4` int(5) NOT NULL,
  `id_cart5` int(5) NOT NULL,
  `id_cart6` int(5) NOT NULL,
  `id_cart7` int(5) NOT NULL,
  `id_cart8` int(5) NOT NULL,
  `id_cart9` int(5) NOT NULL,
  `id_cart10` int(5) NOT NULL,
  `ekspedisi` varchar(10) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `biaya_ekspedisi` varchar(100) NOT NULL,
  `total_biaya` varchar(50) NOT NULL,
  `tujuan_pengiriman` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_cart1`, `id_cart2`, `id_cart3`, `id_cart4`, `id_cart5`, `id_cart6`, `id_cart7`, `id_cart8`, `id_cart9`, `id_cart10`, `ekspedisi`, `harga_produk`, `biaya_ekspedisi`, `total_biaya`, `tujuan_pengiriman`, `penerima`, `cp`, `bukti_transfer`, `status_transaksi`) VALUES
(3, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 'JNE', '130000', '5000', '135000', 'Jl. bandulan 1F', 'Nirwan', '08812233435', '', 'invalid'),
(5, 2, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 'JNE', '660000', '25000', '685000', 'Perum bukit Tidar', 'Vega Bilamonos sdsdssd', '0884232312', 'Bukti__1573649360.jpg', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id_ukuran` int(5) NOT NULL,
  `nama_ukuran` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id_ukuran`, `nama_ukuran`, `harga`) VALUES
(1, '0', '220000'),
(7, '1', '220000'),
(8, '2', '240000'),
(9, '3', '240000'),
(10, '4', '240000'),
(11, '6', '260000'),
(12, '7', '260000'),
(13, '8', '260000'),
(14, '10', '290000'),
(15, '11', '290000'),
(16, '12', '290000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(7) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_akses` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `gmail`, `alamat`, `telp`, `username`, `password`, `id_akses`) VALUES
(1, 'Moch Nirwan Firdaus', 'nirwanfirdaus4@gmail.com', 'Jl. Bandulan 1f no: 50B', '08814954125', 'nirwan', 'nirwan', 1),
(2, 'Vega Bilamonos sdsdssd', 'rogo@gmail.com', 'Perum bukit Tidar', '0884232312', 'vega', 'vega', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_warna`
--

CREATE TABLE `tb_warna` (
  `id_warna` int(7) NOT NULL,
  `nama_warna` varchar(100) NOT NULL,
  `kode_warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_warna`
--

INSERT INTO `tb_warna` (`id_warna`, `nama_warna`, `kode_warna`) VALUES
(1, 'Abu-Abu', '#95a5a6'),
(2, 'Dusty Pink', '#d494af'),
(3, 'Ungu', '#9b59b6'),
(4, 'Navy', '#000080'),
(5, 'Peach', '#fea176'),
(6, 'Merah Maroon', '#800000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_warna`
--
ALTER TABLE `tb_warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_warna`
--
ALTER TABLE `tb_warna`
  MODIFY `id_warna` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
