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
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `id` int(11) NOT NULL,
  `order_no` varchar(191) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `user_id` int(191) NOT NULL,
  `address_id` int(191) NOT NULL,
  `discount` int(191) NOT NULL,
  `total_payment` double NOT NULL,
  `delivery_charge` double NOT NULL,
  `shippping_cost` double NOT NULL,
  `save` varchar(191) NOT NULL,
  `order_date` varchar(191) NOT NULL,
  `order_time` varchar(191) NOT NULL,
  `delivery_status` tinyint(6) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Intransit,3-Transit,4-Delivered,5-Cancel Request,6-Cancelled',
  `payment_mode` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`id`, `order_no`, `name`, `mobile`, `user_id`, `address_id`, `discount`, `total_payment`, `delivery_charge`, `shippping_cost`, `save`, `order_date`, `order_time`, `delivery_status`, `payment_mode`) VALUES
(4, '1634831743', NULL, NULL, 7, 4, 0, 551, 50, 50, '100', '21-10-2021', '21-Oct-2021 09:25:43', 1, 'COD'),
(5, '1634911442', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:34:02', 1, 'COD'),
(6, '1634912261', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:47:41', 1, 'COD'),
(7, '1634912402', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:50:02', 1, 'COD'),
(8, '1634912690', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:54:50', 1, 'COD'),
(9, '1634831743', NULL, NULL, 7, 4, 0, 551, 50, 50, '100', '21-10-2021', '21-Oct-2021 09:25:43', 1, 'COD'),
(10, '1634911442', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:34:02', 1, 'COD'),
(11, '1634912261', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:47:41', 1, 'COD'),
(12, '1634912402', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:50:02', 1, 'COD'),
(13, '1634912690', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '22-10-2021', '22-Oct-2021 07:54:50', 1, 'COD'),
(14, '1634974908', NULL, NULL, 7, 4, 0, 164, 50, 50, '100', '23-10-2021', '23-Oct-2021 01:11:48', 1, 'COD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
