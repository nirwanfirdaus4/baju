-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 06:23 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(7) NOT NULL,
  `nama_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`) VALUES
(7, 'Aisyah Kid'),
(8, 'Example 2'),
(9, 'Example 3'),
(10, 'Example 4'),
(11, 'Example 5'),
(12, 'Example 6'),
(13, 'Example 7'),
(14, 'Example 8'),
(15, 'Aminah');

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
(12, 7, 7, 1, 'Produk__1574397072.jpg', 5),
(13, 15, 8, 2, 'Produk__1574397157.jpg', 6),
(14, 7, 10, 3, 'Produk__1574397386.jpg', 5),
(15, 15, 11, 6, 'Produk__1574397863.png', 9),
(16, 7, 14, 5, 'Produk__1574397899.png', 6),
(17, 15, 13, 1, 'Produk__1574397916.png', 6),
(18, 7, 16, 5, 'Produk__1574400113.jpg', 5),
(19, 15, 10, 2, 'Produk__1574400135.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(7) NOT NULL,
  `tanggal` date NOT NULL,
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
  `catatan` varchar(500) NOT NULL,
  `alasan_tolak` varchar(100) NOT NULL,
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id_ukuran` int(5) NOT NULL,
  `nama_ukuran` varchar(50) NOT NULL,
  `lingkar_dada` int(7) NOT NULL,
  `panjang_baju` int(7) NOT NULL,
  `panjang_lengan` int(7) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id_ukuran`, `nama_ukuran`, `lingkar_dada`, `panjang_baju`, `panjang_lengan`, `harga`) VALUES
(1, '0', 50, 50, 23, '520000'),
(7, '1', 55, 60, 25, '220000'),
(8, '2', 60, 70, 32, '240000'),
(9, '3', 62, 76, 34, '240000'),
(10, '4', 64, 82, 36, '240000'),
(11, '6', 68, 88, 38, '260000'),
(13, '8', 72, 98, 42, '260000'),
(14, '10', 78, 108, 47, '290000'),
(16, '12', 82, 118, 80, '290000');

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
(1, 'Admin L.A Collection', 'nirwanfirdaus4@gmail.com', 'Jl. Bandulan 1f no: 50B', '08814954125', 'laadmin', 'laadmin123', 1),
(3, 'Moch Nirwan Firdaus', 'nirwanfirdaus4@gmail.com', 'Jl. Bandulan 1F no 50s', '08814954125', 'nirwan', 'firdaus', 2);

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
  MODIFY `id_cart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_warna`
--
ALTER TABLE `tb_warna`
  MODIFY `id_warna` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
