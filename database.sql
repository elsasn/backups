-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2020 at 09:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `det_pembelian`
--

CREATE TABLE `det_pembelian` (
  `id_det_pembelian` int(11) NOT NULL,
  `id_pembelian` varchar(50) DEFAULT NULL,
  `nama_roduk` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `category_id` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`category_id`, `category_name`) VALUES
('KTG-2004-0001', 'Wedding'),
('KTG-2004-0002', 'Paket'),
('KTG-2004-0003', 'Venue'),
('KTG-2004-0004', 'Wedding Cake'),
('KTG-2004-0005', 'Sound System '),
('KTG-2004-0006', 'Souvernir'),
('KTG-2004-0007', 'Make Up');

-- --------------------------------------------------------

--
-- Table structure for table `ms_item`
--

CREATE TABLE `ms_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(255) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_item`
--

INSERT INTO `ms_item` (`id`, `name`, `category_id`, `price`, `image`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'Paket Gold ', 'KTG-2004-0002', 100000000, 'wedding12.png', '0000-00-00 00:00:00', '', '2020-04-17 13:32:24', ''),
(2, 'Paket Platinum', 'KTG-2004-0002', 200000000, 'wedding21.png', '0000-00-00 00:00:00', '', '2020-04-17 13:32:41', ''),
(3, 'Paket Super ', 'KTG-2004-0002', 500000000, 'wedding13.png', '0000-00-00 00:00:00', '', '2020-04-17 13:34:53', ''),
(4, 'Dekorasi ', 'KTG-2004-0001', 5000000, 'wedding14.png', '0000-00-00 00:00:00', '', '2020-04-17 14:08:21', ''),
(5, 'Paket Gold 2', 'KTG-2004-0002', 2147483647, 'wedding15.png', '0000-00-00 00:00:00', '', '2020-04-17 14:16:07', ''),
(6, 'Undangan 1', 'KTG-2004-0001', 5000, 'wedding22.png', '0000-00-00 00:00:00', '', '2020-04-17 14:16:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Pegawai','Pelanggan') NOT NULL DEFAULT 'Pelanggan',
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
('PLGN-2003-0001', '', 'pelanggan', '123456', 'pelanggan@example.com', '8947293748239', NULL, 'Pelanggan', 'aktif', '2020-03-29 15:10:02', '2020-03-29 15:10:02'),
('PLGN-2004-0002', '', 'pelanggan2', '123456', 'elsa.snb@gmail.com', '23456789', NULL, 'Pelanggan', 'aktif', '2020-04-17 16:10:25', '2020-04-17 16:10:25'),
('PLGN-2004-0003', '', 'pelanggan', '12345678', 'elsa.snb@gmail.com', '3231232131313', NULL, 'Pelanggan', 'aktif', '2020-04-17 16:11:32', '2020-04-17 16:11:32'),
('PLGN-2004-0004', '', 'pelanggan', '312312313', 'elsa.snb@gmail.com', '3123123131231', NULL, 'Pelanggan', 'aktif', '2020-04-17 16:12:25', '2020-04-17 16:12:25'),
('PLGN-2004-0005', '', 'pelanggan', '211312312', 'elsa.snb@gmail.com', '3123123123123', NULL, 'Pelanggan', 'aktif', '2020-04-17 16:14:04', '2020-04-17 16:14:04'),
('PLGN-2004-0006', '', 'pelanggan2', '48732472389479234', 'elsa.snb@gmail.com', '7827492348237', NULL, 'Pelanggan', 'aktif', '2020-04-17 16:14:37', '2020-04-17 16:14:37'),
('PLGN-2004-0007', '', 'test', 'qwerty', 'super123@gmail.com', '08', NULL, 'Pelanggan', 'aktif', '2020-04-30 06:22:47', '2020-04-30 06:22:47'),
('PLGN-2004-0008', '', 'test123', 'hallo', 'test123@gmail.co', '085647370307', NULL, 'Pelanggan', 'aktif', '2020-04-30 06:23:41', '2020-04-30 06:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `id_pembelian` varchar(50) NOT NULL,
  `total_pembayaran` double NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tgl_pembayaran`, `id_pembelian`, `total_pembayaran`, `status_pembayaran`) VALUES
(1, '2020-06-20', 'INV-0002', 100000000000000, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(50) NOT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `nama_client` varchar(50) DEFAULT NULL,
  `id_produk` double DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `nama_client`, `id_produk`, `status_pembayaran`) VALUES
('INV-0001', '2020-06-20', 'dasdasdasdas', NULL, 'Belum Lunas'),
('INV-0002', '2020-06-20', 'dusyifuyjhasduasdgfdsagf', 3, 'Belum Lunas'),
('INV-0003', '2020-06-20', 'dusyifuyjhasduasdgfdsagf', 3, 'Lunas'),
('INV-0004', '2020-06-20', 'dusyifuyjhasduasdgfdsagf', 1, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `id_kategori`, `harga`) VALUES
('PRDK-2003-0001', 'Test Produk', 'KTG-2003-0001', 5000000),
('PRDK-2003-0002', 'Gaun Pengantin Muslim Modern', 'KTG-2003-0001', 1000000),
('PRDK-2003-0003', 'Undangan Pernikahan', 'KTG-2003-0006', 3500),
('PRDK-2003-0004', 'Undangan Ekslusif', 'KTG-2003-0006', 8000),
('PRDK-2003-0005', 'Adat Jawa', 'KTG-2003-0007', 25000000),
('PRDK-2003-0006', 'Adat Sumatra', 'KTG-2003-0007', 80000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Pegawai','Pelanggan') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', 'aac1259dfa2c6c5ead508f34e52bb990', 'superadmin@gmail.com', '12345678', 'user-default.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2019-02-14 08:05:40'),
(2, 'kadina', 'Kadina Putri', '202cb962ac59075b964b07152d234b70', 'kadinaputri@gmail.com', '085680892909', 'kadina.png', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15'),
(3, 'danang', 'Danang Kesuma', '202cb962ac59075b964b07152d234b70', 'danang@gmail.com', '085758858855', '', 'Pegawai', 'aktif', '2017-04-01 08:15:15', '2019-01-22 03:34:09'),
(4, 'admin', 'Admin', '41504508b3cec65b1313905001118579', 'admin@gmail.com', '085669919769', 'indrasatya.jpg', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2019-02-14 22:35:14'),
(5, 'pegawai', 'pegawai', '202cb962ac59075b964b07152d234b70', 'kadinaputri@gmail.com', '085680892909', 'kadina.png', 'Pegawai', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15'),
(6, 'manajer', 'manajer', '202cb962ac59075b964b07152d234b70', 'danang@gmail.com', '085758858855', '', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2017-04-01 08:15:15'),
(7, 'pelanggan', 'pelanggan', '7f78f06d2d1262a0a222ca9834b15d9d', 'pelanggan@example.com', '12345678', NULL, 'Pelanggan', 'aktif', '2019-02-21 18:23:57', '2019-02-21 18:23:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ms_item`
--
ALTER TABLE `ms_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_item`
--
ALTER TABLE `ms_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
