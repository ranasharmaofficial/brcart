-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 10:05 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubazar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(191) NOT NULL,
  `orderid` int(191) NOT NULL,
  `seller_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `gst_amount` varchar(100) DEFAULT NULL,
  `without_gst_price` varchar(100) DEFAULT NULL,
  `admin_commission_amount` varchar(100) DEFAULT NULL,
  `seller_payable_amount` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `order_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderid`, `seller_id`, `product_id`, `qty`, `product_price`, `gst_amount`, `without_gst_price`, `admin_commission_amount`, `seller_payable_amount`, `payment_status`, `order_status`) VALUES
(4, 4, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, 1, 19, 1, '57', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, 1, 29, 1, '330', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 6, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 14, 1, 30, 1, '164', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
