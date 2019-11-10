-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 06:39 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah_barang` varchar(8) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `id_user`, `id_produk`, `jumlah_barang`, `harga`, `status`) VALUES
(1, 1, 4, '3', '50000', 'aktif'),
(2, 1, 6, '5', '80000', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(7) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `ukuran` int(5) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `ukuran`, `warna`, `foto`) VALUES
(4, 'Baroees', 13, 'Peach', 'Produk__1573335875.jpg'),
(6, 'Cute Wing', 7, 'Navy', 'Produk__1573335875.jpg');

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
(3, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 'JNE', '130000', '5000', '135000', 'Jl. bandulan 1F', 'Nirwan', '08812233435', '', 'invalid');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `gmail`, `alamat`, `telp`, `username`, `password`) VALUES
(1, 'Moch Nirwan Firdaus', 'nirwanfirdaus4@gmail.com', 'Jl. Bandulan 1f no: 50B', '08814954125', 'nirwan', 'nirwan');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
