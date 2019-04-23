-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 04:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_transaksijual`
--

CREATE TABLE `bantuan_transaksijual` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_transaksi_beli`
--

CREATE TABLE `bantuan_transaksi_beli` (
  `id` int(11) NOT NULL,
  `idobat` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `jumlahobat` int(11) NOT NULL,
  `hargasubtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bantuan_transaksi_beli`
--

INSERT INTO `bantuan_transaksi_beli` (`id`, `idobat`, `hargasatuan`, `jumlahobat`, `hargasubtotal`) VALUES
(1, 1, 4000, 2000, 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksibeli`
--

CREATE TABLE `detail_transaksibeli` (
  `id_transaksibeli` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksibeli`
--

INSERT INTO `detail_transaksibeli` (`id_transaksibeli`, `id_obat`, `hargasatuan`, `jumlah`, `subtotal`) VALUES
(4, 2, 50000, 4, 200000);

--
-- Triggers `detail_transaksibeli`
--
DELIMITER $$
CREATE TRIGGER `update stok` AFTER INSERT ON `detail_transaksibeli` FOR EACH ROW BEGIN
	UPDATE obat SET stok_obat=stok_obat+new.jumlah WHERE id_obat=new.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksijual`
--

CREATE TABLE `detail_transaksijual` (
  `id_transaksijual` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksijual`
--

INSERT INTO `detail_transaksijual` (`id_transaksijual`, `id_obat`, `jumlah_obat`, `hargasatuan`, `subtotal`) VALUES
(1, 2, 3, 5000, 15000),
(2, 3, 30, 5000, 150000),
(3, 1, 5, 5000, 25000),
(3, 2, 4, 5000, 20000),
(3, 3, 2, 5000, 10000),
(4, 3, 4, 5000, 20000),
(4, 2, 1, 5000, 5000),
(4, 1, 2, 5000, 10000);

--
-- Triggers `detail_transaksijual`
--
DELIMITER $$
CREATE TRIGGER `updatestok_penjualan` AFTER INSERT ON `detail_transaksijual` FOR EACH ROW BEGIN
	UPDATE obat SET stok_obat=stok_obat-new.jumlah_obat WHERE id_obat=new.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(3, 'mah'),
(4, 'mencret'),
(5, 'sakit gigi'),
(6, 'GIGIfghfh'),
(7, 'Pilek');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `hargabeli_obat` int(11) NOT NULL,
  `hargajual_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `id_jenis`, `hargabeli_obat`, `hargajual_obat`, `stok_obat`) VALUES
(1, 'kgh', 4, 4000, 5000, 42),
(2, 'mencret', 3, 50000, 5000, 15),
(3, 'llll', 7, 4000, 5000, 9993);

-- --------------------------------------------------------

--
-- Stand-in structure for view `penjualan`
-- (See below for the actual view)
--
CREATE TABLE `penjualan` (
`id_transaksijual` int(11)
,`tgl_transaksijual` date
,`id_user` int(11)
,`id_obat` int(11)
,`jumlah_obat` int(11)
,`hargasatuan` int(11)
,`subtotal` int(11)
,`totalpenjualan` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_telp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `kota`, `no_telp`) VALUES
(3, 'fgs', 'sdfs', 'sds', '2342');

-- --------------------------------------------------------

--
-- Table structure for table `transaksibeli`
--

CREATE TABLE `transaksibeli` (
  `id_transaksibeli` int(11) NOT NULL,
  `tgl_transaksibeli` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `totalpembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksibeli`
--

INSERT INTO `transaksibeli` (`id_transaksibeli`, `tgl_transaksibeli`, `id_user`, `id_suplier`, `totalpembelian`) VALUES
(4, '2019-01-25', 17, 3, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksijual`
--

CREATE TABLE `transaksijual` (
  `id_transaksijual` int(11) NOT NULL,
  `tgl_transaksijual` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `totalpenjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksijual`
--

INSERT INTO `transaksijual` (`id_transaksijual`, `tgl_transaksijual`, `id_user`, `totalpenjualan`) VALUES
(1, '2019-02-08', 20, 15000),
(2, '2019-02-10', 20, 150000),
(3, '2019-02-10', 20, 55000),
(4, '2019-02-10', 20, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `alamat_user` varchar(250) NOT NULL,
  `tgllahir_user` date NOT NULL,
  `jeniskelamin_user` enum('l','p') NOT NULL,
  `level_user` enum('kasir','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `alamat_user`, `tgllahir_user`, `jeniskelamin_user`, `level_user`) VALUES
(16, 'ketut sukarena', '1615323046', '114a42d736ced0dce1affc1e898c69b3998426df', 'Tegallalang', '1997-05-30', 'l', 'admin'),
(17, 'ari pratama', 'ari', 'c129b324aee662b04eccf68babba85851346dff9', 'bleleng', '2019-01-16', 'l', 'admin'),
(20, 'Ketut', 'ketut', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 'rt', '2019-02-14', 'l', 'kasir'),
(21, 'komank pramana', 'komank', '3c82139c71c1fc8c7f4306d1dc22e6f026c2dea3', 'Tabanan', '1998-04-10', 'l', 'kasir');

-- --------------------------------------------------------

--
-- Structure for view `penjualan`
--
DROP TABLE IF EXISTS `penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan`  AS  select `transaksijual`.`id_transaksijual` AS `id_transaksijual`,`transaksijual`.`tgl_transaksijual` AS `tgl_transaksijual`,`transaksijual`.`id_user` AS `id_user`,`detail_transaksijual`.`id_obat` AS `id_obat`,`detail_transaksijual`.`jumlah_obat` AS `jumlah_obat`,`detail_transaksijual`.`hargasatuan` AS `hargasatuan`,`detail_transaksijual`.`subtotal` AS `subtotal`,`transaksijual`.`totalpenjualan` AS `totalpenjualan` from (`transaksijual` join `detail_transaksijual` on((`detail_transaksijual`.`id_transaksijual` = `transaksijual`.`id_transaksijual`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan_transaksijual`
--
ALTER TABLE `bantuan_transaksijual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_transaksi_beli`
--
ALTER TABLE `bantuan_transaksi_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksibeli`
--
ALTER TABLE `detail_transaksibeli`
  ADD KEY `id_transaksibeli` (`id_transaksibeli`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `detail_transaksijual`
--
ALTER TABLE `detail_transaksijual`
  ADD KEY `id_transaksijual` (`id_transaksijual`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksibeli`
--
ALTER TABLE `transaksibeli`
  ADD PRIMARY KEY (`id_transaksibeli`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `transaksijual`
--
ALTER TABLE `transaksijual`
  ADD PRIMARY KEY (`id_transaksijual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan_transaksijual`
--
ALTER TABLE `bantuan_transaksijual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bantuan_transaksi_beli`
--
ALTER TABLE `bantuan_transaksi_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksibeli`
--
ALTER TABLE `transaksibeli`
  MODIFY `id_transaksibeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksijual`
--
ALTER TABLE `transaksijual`
  MODIFY `id_transaksijual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksibeli`
--
ALTER TABLE `detail_transaksibeli`
  ADD CONSTRAINT `detail_transaksibeli_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksibeli_ibfk_2` FOREIGN KEY (`id_transaksibeli`) REFERENCES `transaksibeli` (`id_transaksibeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksijual`
--
ALTER TABLE `detail_transaksijual`
  ADD CONSTRAINT `detail_transaksijual_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksijual_ibfk_2` FOREIGN KEY (`id_transaksijual`) REFERENCES `transaksijual` (`id_transaksijual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksibeli`
--
ALTER TABLE `transaksibeli`
  ADD CONSTRAINT `transaksibeli_ibfk_1` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksibeli_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksijual`
--
ALTER TABLE `transaksijual`
  ADD CONSTRAINT `transaksijual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
