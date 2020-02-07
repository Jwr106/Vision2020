-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 02:50 AM
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
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Glass 1', '3DcAM01', 'product-images/SBS020-COL15-256.jpg', 100.00),
(2, 'Glass 2', 'USB02', 'product-images/SBS023-COL30-256.jpg', 100.00),
(3, 'Glass 3', 'wristWear03', 'product-images/SBS024-COL10-256.jpg', 100.00),
(4, 'Glass 4', 'LPN45', 'product-images/SDO-BARNABY-COL104-256.jpg', 100.00),
(5, 'Glass 5', 'dfsdf3232', 'product-images/SDO-MEGHAN-COL002-256.jpg', 100.00),
(6, 'Glass 6', 'dfsd32', 'product-images/SDO-PATERSON-COL104-256.jpg', 100.00),
(7, 'Glass 7', 'erwe33', 'product-images/SDO-REGGIE-COL001-256.jpg', 100.00),
(8, 'Glass 8', 'ere33', 'product-images/SDO-SACRAMENTO-COL106-256.jpg', 100.00),
(9, 'Glass 9', 'weq11', 'product-images/SPX595-COL40-256.jpg', 100.00),
(10, 'Glass 10', 'wq11', 'product-images/SPX609-COL70-256.jpg', 100.00),
(11, 'Glass 11', 'waq11', 'product-images/SPX619-COL30-256.jpg', 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
