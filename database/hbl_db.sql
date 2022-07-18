-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 08:36 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `blog_cat_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`blog_cat_id`, `name`, `status`) VALUES
(1, 'rana', 2),
(2, 'sharma', 2),
(3, 'abc1', 2),
(4, 'abc1', 2),
(5, 'hello', 2),
(6, 'hii', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_details`
--

CREATE TABLE `blog_details` (
  `blog_details_id` int(11) NOT NULL,
  `blog_cat_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `blog_description` varchar(1000) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_details`
--

INSERT INTO `blog_details` (`blog_details_id`, `blog_cat_id`, `title`, `blog_description`, `file_name`, `file_path`, `file_id`, `user_id`, `created_at`) VALUES
(1, 1, 'How to Gain Weight Fast and Safely', 'About two thirds of people in the US are either overweight or obese (1Trusted Source).\r\n\r\nHowever, there are also many people with the opposite problem of being too skinny (2Trusted Source).\r\n\r\nThis is a concern, as being underweight can be just as bad for your health as being obese.\r\n\r\nAdditionally, many people who are not clinically underweight still want to gain some muscle.\r\n\r\nWhether you’re clinically underweight or simply struggling to gain muscle weight, the main principles are the same.', '', '', 0, 0, '2020-08-13 18:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `status`) VALUES
(1, 'Medicine', 2),
(2, 'rana', 2),
(3, 'Rana1 hhghhgfhg', 2),
(4, 'llklklk', 2),
(5, 'thrtrttr', 2),
(6, 'Medicine', 2),
(7, 'rana', 2),
(8, 'Rana1lll', 2),
(9, 'x', 2),
(10, 'thrtrttr', 2),
(11, 'kkka', 2),
(12, 'abcd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('16ufurimk288affatv1isdrv62g5cft2', '::1', 1597685646, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638353634353b),
('1iiegk6ad2h8c080ehr75kn0nev8ampv', '::1', 1597675358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373637353335353b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('7fj78veb8128bk3gogf388g10biefnio', '::1', 1597689257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638383936303b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('7k9i9vvof2s6ge18cfcrnojav47jbct7', '::1', 1597657138, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635363937303b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('7vvcp7lcqnqf176jn6tv77g3u8lof78k', '::1', 1597661746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636313438333b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('9n3iule96fsccvfaqolep86pul92rn7d', '::1', 1597685441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638353137303b),
('am0nu8087jiblt56vmvrsjpp85lcpp0j', '::1', 1597591778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373539313737313b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('b5jq1h3sqrvsdi3eul3rtsekctpljvmi', '::1', 1597652559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635323535383b),
('bi5i2fc72c4vcmm37aj7omdubdtpve4c', '::1', 1597659805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635393631383b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('cg8il956ih9cfues3g8vtha3gmr6qtaf', '::1', 1597662748, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636323531303b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('co8ijb1ksfj8jako9iqq2mm03u1ltl3a', '::1', 1597669292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636393239323b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('donhec2ir5jjncd7j5gn3319k7av7ehp', '::1', 1597688192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638383030323b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('ejibl7tibitf794lc62vpt445g0a40bn', '::1', 1597657347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635373332313b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('em28d2hi01ruje4qg2ktu87i93g78hfn', '::1', 1597687551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638373336333b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('fecpm93547nft5nlfjh6stf6lsnhv55l', '::1', 1597658237, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635383034343b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('g53jrotag5n1jmcniei3fierpngobjvc', '::1', 1597686689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638363536343b),
('g7t067e4ifablucfe898tn7toi6h2vs7', '::1', 1597597697, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373539373639333b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('gikegjquavj7srsv9c9mpgjc2334vvto', '::1', 1597688934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638383634313b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('gqfhr96e2kg6t1t7t80n5vv8lln1plan', '::1', 1597585668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373538353338303b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('gtj1gvckpclajhfbfqbj63uif6m6mecm', '::1', 1597586671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373538363433333b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('h2tm1c7dhqfd99tkuevv8k8i16adi9r6', '::1', 1597654226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635343232333b),
('hkj7aon55um9oubamnur15gqvgcmujnj', '::1', 1597657915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373635373730373b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('i03fejjkiunn0lj052f8ailem6ug5rg0', '::1', 1597662858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636323833363b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('ib72h13jvt9gncmqi6d95oq3lqi17epe', '::1', 1597591398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373539313339383b),
('khm3k680s1v9u5j4qjo3gabfcd90sjud', '::1', 1597687199, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638363931333b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('mirs0vr4p022dan2err6ci9v6b6d4cks', '::1', 1597667516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636373330343b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('mv5lcblnc0mv5sg37q9imii1l1f3anej', '::1', 1597660593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636303534353b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('ob0e9fme1s90a9lpoclh70g4q4qimrpb', '::1', 1597586350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373538363132353b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('oms9opjj14c7l5mfone6v4ovrg7jhgu8', '::1', 1597687942, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638373636343b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('oo48e6rgfr8okk6d2ltcflrs4usp6vh8', '::1', 1597689304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638393330343b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('q7shdfs22537tc1f7so508ds5oc97et0', '::1', 1597661856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373636313835353b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b),
('qhnu12eq7ismffopaupomj2e1brstamu', '::1', 1597684961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373638343737323b),
('u9m38191sij1rdav9uq1b1dskakksqt3', '::1', 1597591377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539373539313337373b69645f757365727c733a313a2231223b66697273745f6e616d657c733a373a2253617572616268223b69645f757365725f747970657c733a313a2231223b69645f726f6c657c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id_page` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` bigint(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` char(15) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `created_at`, `ip_address`, `name`, `email`, `mobile`, `message`) VALUES
(1, '2020-08-14 17:29:33', '', 'Rana Sharma', 'iamrana@gmail.com', '9199758612', 'Feel free to contact us');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` varchar(55) DEFAULT NULL,
  `pin` varchar(15) DEFAULT NULL,
  `created_at` varchar(55) NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `order_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `disc_amount` int(11) NOT NULL,
  `payable_amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `billing_address` varchar(150) NOT NULL,
  `shipping_address` varchar(150) NOT NULL,
  `contact_name_no` varchar(150) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `hindi_desc` text CHARACTER SET utf8 COLLATE utf8_bin,
  `mrp_price` int(11) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name`, `quantity`, `description`, `hindi_desc`, `mrp_price`, `discount_amount`, `sell_price`, `purchase_price`, `file_name`, `file_path`, `file_id`) VALUES
(1, 1, 'Amrit Tulsi', NULL, '', NULL, 500, 400, 250, 200, NULL, NULL, 0),
(2, 1, 'Haldiram Soanpapdi', NULL, 'Buy Haldiram''s Soan Papdi - Badami Box for Rs.65 online. Haldiram''s Soan Papdi - Badami Box at best prices with FREE shipping & cash on delivery.\r\n Rating: 4.2 - ?304 reviews\r\n\r\nSoan Papdi - Haldiram''swww.haldirams.com › soan-papdi-online\r\nHaldiram''s Soan papdi is delicate cotton candy confections made with besan and creamy milk. that melt in your mouth with a flavourful burst of cardamon and ...\r\n?230.00', NULL, 150, 135, 135, 130, NULL, NULL, 0),
(3, 1, 'Product Two', NULL, '<p><span style="color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;">An article is a word that is used with a noun to specify grammatical definiteness of the noun, and in some languages extending to volume or numerical scope. The articles in English grammar are the and a/an, and in certain contexts some.</span><br></p>', '<p class="story-body__introduction" style="border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; font-weight: bold; line-height: 1.44444; margin-top: 28px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;">आपदा के समय ज़्यादातर लोग वो अहम काम करने में असफल रहते हैं जो उनकी जान बचा सकता है.</p><p style="border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;">लेकिन ऐसा क्यों होता है ? इसका जवाब खोजते समय 27 सितंबर 1994 की उस घटना पर ध्यान देना चाहिए जिसमें 852 लोग समुद्र में डूब गए थे.</p><p style="border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;">उस दिन सुबह सात बजे समुद्री जहाज़ एमएस एस्टोनिया 989 मुसाफ़िरों को लेकर तालिन बंदरगाह से रवाना हुआ. उसे बाल्टिक सागर पार कर स्टॉकहोम जाना था. पर जहाज़़ कभी वहाँ नहीं पंहुचा.</p><p style="border: 0px; color: rgb(64, 64, 64); font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Arial, Verdana, Geneva, Helvetica, sans-serif; font-size: 1.125rem; line-height: 1.44444; margin-top: 18px; margin-bottom: 0px; padding: 0px; vertical-align: baseline;">बंदरगाह छोड़ने के छह घंटे बाद जहाज़ ज़बरदस्त तूफ़ान में फंस गया, इसके सामने का दरवाज़ा टूट गया और पानी तेज़ी से अंदर घुसने लगा.</p>', 150, 150, 150, 150, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Active,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `is_staff` char(1) NOT NULL DEFAULT 'N',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  `id_user_type` int(11) NOT NULL DEFAULT '0',
  `id_role` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile_no` char(15) DEFAULT NULL,
  `alt_mobile_no` char(15) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'M' COMMENT 'M-Male,F-Female',
  `file_path` varchar(225) DEFAULT NULL,
  `display_order` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `is_staff`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `id_user_type`, `id_role`, `first_name`, `last_name`, `email`, `mobile_no`, `alt_mobile_no`, `gender`, `file_path`, `display_order`) VALUES
(1, 'Y', NULL, 0, NULL, 0, 2, 1, 1, 'Saurabh', 'Sir', NULL, '8210211736', '', 'M', NULL, 1),
(2, 'N', NULL, 0, NULL, 0, 2, 1, 1, 'Saurabh', 'Sir', NULL, '8210211736', '', 'M', NULL, 1),
(3, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Saurabh', 'Sir', NULL, '+91 8210211736', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595379502/saurabh_soj4mu.jpg', 2),
(4, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Suman', 'Sir', NULL, '+91 8210211736', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595379551/suman_pudif5.jpg', 4),
(5, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Gopal', 'Mishra', NULL, '+91 8521926238', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595380243/IMG-20200717-WA0003_sll3j6.jpg', 3),
(6, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Ashok', 'Kumar', NULL, '+91 9472846329', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595474202/WhatsApp_Image_2020-07-22_at_19.23.42_xathjv.jpg', 1),
(7, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Tapan', 'Sir', NULL, '+91 7991177541', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595382658/IMG-20200719-WA0045_p1ynrj.jpg', 5),
(8, 'N', NULL, 0, NULL, 0, 2, 3, 3, 'Rahul', 'Sir', NULL, '+91 8406986929', '', 'M', 'https://res.cloudinary.com/dnxxccs9g/image/upload/v1595390573/Screenshot_20200722-054650_2_yavv2a.png', 5),
(9, 'N', NULL, 0, NULL, 0, 2, 0, 0, 'Ajit', 'Jha', 'ajitjhaaaa@gmail.com', '8789019048', '', 'M', NULL, 1),
(10, 'N', '2020-08-05 10:36:31', 1, NULL, 0, 2, 3, 3, 'Rana', 'Sharma', 'iamranasharma@gmail.com', '9199758612', '', 'M', NULL, 1),
(11, 'N', '2020-08-15 13:06:49', 0, NULL, 0, 2, 0, 0, 'g', 'ghj', 'aaaa@gmail.com', '9199758612', '', 'M', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `id_user_address` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `address_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Native Address,2-Communication Address',
  `id_country` int(11) NOT NULL DEFAULT '0',
  `id_state` int(11) NOT NULL DEFAULT '0',
  `id_city` int(11) NOT NULL DEFAULT '0',
  `id_location` int(11) NOT NULL DEFAULT '0',
  `address` varchar(225) DEFAULT NULL,
  `pin_code` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_adhar_card`
--

CREATE TABLE `users_adhar_card` (
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `adhar_card_no` varchar(25) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_logins`
--

CREATE TABLE `users_logins` (
  `id_login` bigint(20) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1-InActive,2-Active',
  `id_user` bigint(20) NOT NULL DEFAULT '0',
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_logins`
--

INSERT INTO `users_logins` (`id_login`, `modified_at`, `modified_by`, `status`, `id_user`, `username`, `password`, `last_login_time`) VALUES
(1, NULL, 0, 2, 1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(2, NULL, 0, 2, 2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(3, NULL, 0, 2, 3, 'teacher', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(4, NULL, 0, 2, 3, 'cdirector', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_pan_card`
--

CREATE TABLE `users_pan_card` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `pan_number` char(15) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_path` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id_role` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive',
  `name` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id_role`, `modified_at`, `modified_by`, `status`, `name`) VALUES
(1, '2020-07-16 00:00:00', 1, 2, 'Super Admin'),
(2, '2020-07-16 00:00:00', 1, 2, 'Admin'),
(3, '2020-07-16 00:00:00', 1, 2, 'Teacher'),
(4, '2020-07-16 00:00:00', 1, 2, 'Coaching Director');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id_user_type` int(11) NOT NULL,
  `name` varchar(85) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-Deleted,1-Pending,2-Active,3-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id_user_type`, `name`, `status`) VALUES
(1, 'Super Admin', 1),
(2, 'Admin', 1),
(3, 'Customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_cat_id`);

--
-- Indexes for table `blog_details`
--
ALTER TABLE `blog_details`
  ADD PRIMARY KEY (`blog_details_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_type` (`id_user_type`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id_user_address`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_country` (`id_country`),
  ADD KEY `id_state` (`id_state`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `users_adhar_card`
--
ALTER TABLE `users_adhar_card`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users_logins`
--
ALTER TABLE `users_logins`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users_pan_card`
--
ALTER TABLE `users_pan_card`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id_user_type`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `blog_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_details`
--
ALTER TABLE `blog_details`
  MODIFY `blog_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id_user_address` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_logins`
--
ALTER TABLE `users_logins`
  MODIFY `id_login` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
