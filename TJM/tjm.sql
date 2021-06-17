-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notlp1` int(25) NOT NULL,
  `notlp2` int(25) DEFAULT NULL,
  `notlp3` int(25) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `nama`, `notlp1`, `notlp2`, `notlp3`, `alamat`, `deskripsi`) VALUES
(1, 'Juki', 2147483647, NULL, NULL, 'Jl.taruna', 'Hanya Buat Test saja');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `iddetail` int(11) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `foto_mobil` varchar(100) DEFAULT NULL,
  `foto_norangka` varchar(100) DEFAULT NULL,
  `foto_nomesin` varchar(100) DEFAULT NULL,
  `foto_stnk` varchar(100) DEFAULT NULL,
  `foto_bpkb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `idmobil` int(11) NOT NULL,
  `no_polisi` varchar(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(50) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `stnk_atasnama` varchar(50) NOT NULL,
  `status_unit` varchar(50) NOT NULL,
  `unitin` varchar(50) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `unitout` varchar(50) NOT NULL,
  `buyer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`idmobil`, `no_polisi`, `merk`, `type`, `tahun`, `no_rangka`, `no_mesin`, `no_faktur`, `stnk_atasnama`, `status_unit`, `unitin`, `seller`, `unitout`, `buyer`) VALUES
(1, 'B4568IO', 'TOYOTA', 'PICKUP', 2000, 'MHYKZE81SCJ115045', '45E-0231530', 'UHJ/1548/BUX4/2004', 'HERMAN', 'TERJUAL', '15/8/2010', 'HERMAN', '4/8/2018', 'BUDI'),
(4, '121 pot', 'TOYOTA', 'dump truck', 2012, 'mhywal4398874', 'dhsfiy', 'kdfi232', 'kfjsidt', 'kju', '20012021', 'al', '', ''),
(5, 'B4568IB', 'MITSUBISI', 'BOX', 2014, 'MHYKZE81SCJ115123', '45E-023456', 'UHJ/1548/BUX4/2010', 'HENDRA', 'TEREDIA', '', 'HENDR', '4/8/2017', 'JUDE');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idakun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idakun`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '@dm1n', 'admin'),
(2, 'karyawan', 'karyawan', 'k@ryaWan', 'karyawan'),
(3, 'management', 'management', 'Mana9emEnt', 'management');

-- --------------------------------------------------------

--
-- Table structure for table `managemet`
--

CREATE TABLE `managemet` (
  `idmanage` int(11) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `hargabeli` varchar(100) NOT NULL,
  `hargaawal` varchar(50) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `cara_bayar` varchar(50) NOT NULL,
  `tgl_bayar` varchar(50) NOT NULL,
  `nomminal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`idmobil`),
  ADD KEY `buyer` (`buyer`),
  ADD KEY `seller` (`seller`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `managemet`
--
ALTER TABLE `managemet`
  ADD PRIMARY KEY (`idmanage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `idmobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `managemet`
--
ALTER TABLE `managemet`
  MODIFY `idmanage` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
