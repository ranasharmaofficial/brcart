-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 04:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `email_subscription`
--

CREATE TABLE `email_subscription` (
  `id` int(11) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `ip_address` char(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_subscription`
--

INSERT INTO `email_subscription` (`id`, `created_at`, `email`, `ip_address`) VALUES
(119, '30-Dec-2021 08:41:41', 'okay@gmail.com', '::1'),
(120, '30-Dec-2021 08:44:24', 'ranaokay@gmail.com', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_subscription`
--
ALTER TABLE `email_subscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_subscription`
--
ALTER TABLE `email_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
