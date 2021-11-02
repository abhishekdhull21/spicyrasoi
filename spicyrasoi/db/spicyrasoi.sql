-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 04:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spicyrasoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `admin_type` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` text NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `isverified` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT NULL,
  `remarks` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `name`, `admin_type`, `restaurant`, `mobile`, `email`, `address`, `password`, `add_on`, `isverified`, `status`, `remarks`) VALUES
(100000, 'Test', 1, 0, '123', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2021-10-21 02:44:05', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `cat_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created` date DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `admin_id`, `restaurant`, `cat_name`, `status`, `created`, `created_by`) VALUES
(8, 0, 0, 'JUICE', 1, NULL, 2),
(12, 0, 0, 'Burger ', 1, '2021-10-07', 2),
(14, 0, 0, 'Pizza', 1, '2021-10-08', 2),
(15, 0, 0, 'Cold Drinks ', 1, '2021-10-13', 2),
(16, 0, 0, 'Break Fast ', 1, '2021-10-16', 2),
(17, 123460, 900000, 'Lunch', 1, '2021-10-16', 2),
(18, 0, 0, 'Banking ', 1, '2021-10-16', 2),
(19, 0, 0, 'Dinner', 1, '2021-10-17', 2),
(20, 0, 0, 'Shake', 1, '2021-10-17', 2),
(21, 123460, 900000, 'Pulao', 1, '2021-10-18', 2),
(22, 0, 0, 'test in', 1, '2021-10-21', 2),
(23, 123460, 900000, 'tse', 1, '2021-10-21', 123460),
(24, 900003, 900001, 'test category from 2', 1, '2021-10-22', 900003);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `user_mobile` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_sex` set('MALE','FEMALE','OTHER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FEMALE',
  `user_dob` date DEFAULT NULL,
  `gst` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `wherefrom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whereto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proof` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `restaurant`, `admin_id`, `user_name`, `balance`, `user_mobile`, `user_email`, `user_sex`, `user_dob`, `gst`, `user_address`, `country`, `state`, `district`, `city`, `pincode`, `checkin`, `checkout`, `wherefrom`, `whereto`, `id_proof`, `img`, `join_on`, `email_verified`, `mobile_verified`, `user_verified`, `user_status`) VALUES
(1, 900000, 123460, 'AK', 0, '', NULL, '', NULL, '12', NULL, 0, 0, 0, 0, 126102, '2021-10-30', '2021-10-23', '', '', '12', NULL, '2021-10-23 06:01:10', 0, 0, 0, NULL),
(2, 900000, 123460, 'Abhishek Singh', 0, '7407407401', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 07:18:34', 0, 0, 0, NULL),
(3, 900000, 123460, 'Abhishek', 0, '7404880600', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-24 04:56:57', 0, 0, 0, NULL),
(4, 900000, 123460, 'Abhishek', 0, '7404880600', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-24 05:06:06', 0, 0, 0, NULL),
(5, 900000, 123460, 'Abhishek', 0, '7404880600', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-24 05:08:12', 0, 0, 0, NULL),
(6, 900000, 123460, 'Abhishek', 0, '7404880600', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 07:15:38', 0, 0, 0, NULL),
(7, 900000, 123460, 'Abhishek', 0, '7404880600', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 07:19:38', 0, 0, 0, NULL),
(8, 900000, 123460, 'Abhishek', 0, '7404880602', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 07:19:54', 0, 0, 0, NULL),
(9, 0, 0, 'Cash', 0, NULL, NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-26 07:49:11', 0, 0, 0, NULL),
(10, 900000, 123460, ' ADS', 0, '1234564567', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:26:42', 0, 0, 0, NULL),
(11, 900000, 123460, 'ASD', 0, '1234567890', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:28:36', 0, 0, 0, NULL),
(12, 900000, 123460, 'ASD', 0, '1234567890', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:32:33', 0, 0, 0, NULL),
(13, 900000, 123460, 'ASDF', 0, '7410741074', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:32:56', 0, 0, 0, NULL),
(14, 900000, 123460, 'ASDF', 0, '7410741074', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:35:52', 0, 0, 0, NULL),
(15, 900000, 123460, 'A', 0, '1', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:36:55', 0, 0, 0, NULL),
(16, 900000, 123460, 'A', 0, '1112223330', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:37:17', 0, 0, 0, NULL),
(17, 900000, 123460, '1', 0, '1234578960', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:39:00', 0, 0, 0, NULL),
(18, 900000, 123460, 'ASDSD', 0, '7410852000', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:39:36', 0, 0, 0, NULL),
(19, 900000, 123460, 'ASDSDb', 0, '7410852000', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:48:00', 0, 0, 0, NULL),
(20, 900000, 123460, 'ASDSDb', 0, '7410852000', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:50:04', 0, 0, 0, NULL),
(21, 900000, 123460, 'ZAQ', 0, '7897897890', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:52:39', 0, 0, 0, NULL),
(22, 900000, 123460, 'Hello', 0, '7845120078', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:55:24', 0, 0, 0, NULL),
(23, 900000, 123460, 'Hello Abhishek', 0, '7897897897', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 08:56:31', 0, 0, 0, NULL),
(24, 900000, 123460, 'ASD', 0, '7878787878', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 09:03:37', 0, 0, 0, NULL),
(25, 900000, 123460, 'AD', 0, '7410852096', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 09:04:49', 0, 0, 0, NULL),
(26, 900000, 123460, 'New One', 0, '7894567894', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 09:08:00', 0, 0, 0, NULL),
(27, 900000, 123460, 'JR', 0, '8818084580', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 09:13:12', 0, 0, 0, NULL),
(28, 900000, 123460, 'TR', 0, '1426341523', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 09:16:46', 0, 0, 0, NULL),
(29, 900000, 123460, 'A New', 397, '7897894561', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-01 08:10:01', 0, 0, 0, NULL),
(30, 900000, 123460, 'Added Customer', 90, '7534210000', NULL, 'FEMALE', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-01 12:04:29', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tables` int(11) NOT NULL DEFAULT 1,
  `restaurant` int(11) NOT NULL,
  `charge` double NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `remarks` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `tables`, `restaurant`, `charge`, `admin_id`, `date`, `remarks`, `status`) VALUES
(0, 'Tables', 10, 900000, 0, 1, '2021-10-28', NULL, 1),
(2, 'AC Tables', 15, 900000, 0, 1, '2021-10-28', NULL, 1),
(3, 'Hall', 19, 900000, 0, 123460, '2021-10-28', NULL, 1),
(4, 'AC Room', 5, 900001, 500, 123460, '2021-10-31', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `remarks` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `cat_id`, `amount`, `admin_id`, `restaurant`, `date`, `remarks`, `status`) VALUES
(1, 1, 5000, 123460, 900000, '2021-10-28 11:43:10', 'charges', 1),
(2, 1, 7500, 123460, 900000, '2021-10-28 11:43:10', 'charges', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_cat`
--

DROP TABLE IF EXISTS `expense_cat`;
CREATE TABLE `expense_cat` (
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_cat`
--

INSERT INTO `expense_cat` (`cat_id`, `admin_id`, `restaurant`, `cat_name`, `status`, `created`, `created_by`) VALUES
(1, 123460, 900000, 'Oil', 0, '2021-10-28 07:45:25', 123460);

-- --------------------------------------------------------

--
-- Table structure for table `logined_user`
--

DROP TABLE IF EXISTS `logined_user`;
CREATE TABLE `logined_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `device` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` text NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 1,
  `bill_no` int(11) NOT NULL,
  `order_value` double DEFAULT NULL,
  `order_type` varchar(20) NOT NULL,
  `pay_type` varchar(100) NOT NULL DEFAULT 'Cash',
  `discount` double NOT NULL DEFAULT 0,
  `recived` double NOT NULL DEFAULT 0,
  `paid` double NOT NULL DEFAULT 0,
  `balance` double NOT NULL DEFAULT 0,
  `tableid` int(11) NOT NULL DEFAULT 0,
  `tablegroup` int(11) NOT NULL DEFAULT 0,
  `kot_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`kot_data`)),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `name`, `admin_id`, `user_id`, `restaurant`, `bill_no`, `order_value`, `order_type`, `pay_type`, `discount`, `recived`, `paid`, `balance`, `tableid`, `tablegroup`, `kot_data`, `date`, `status`, `remarks`) VALUES
(9, '18446744073709551615', 'Cash', 123460, 0, 900000, 2, 10, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:21:29', 1, NULL),
(12, '9000001234602730221115611000000', 'Cash', 123460, 0, 900000, 3, 10, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:26:11', 1, NULL),
(13, '9000001234602730221115725000000', 'Cash', 123460, 0, 900000, 4, 60, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:27:25', 1, NULL),
(14, '900000123460030221120018000000', 'Cash', 123460, 0, 900000, 5, 811, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:30:18', 1, NULL),
(15, '900000123460030221120045000000', 'Cash', 123460, 0, 900000, 6, 811, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:30:45', 1, NULL),
(16, '900000123460030221120332000000', 'Cash', 123460, 0, 900000, 7, 10, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:33:32', 1, NULL),
(17, '90000012346021530221121220000000', 'Cash', 123460, 0, 900000, 8, 51, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:42:20', 1, NULL),
(18, '9000001234602930221121448000000', 'Cash', 123460, 0, 900000, 9, 262.5, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-30 06:44:48', 1, NULL),
(19, '9000001234602730321151136000000', 'Cash', 123460, 0, 900000, 10, 466.5, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-10-31 09:41:36', 1, NULL),
(20, '9000001234600630321151623000000', 'Cash', 123460, 0, 900000, 11, 858.5, 'store_price', 'Cash', 30, 100, 150, 50, 0, 0, NULL, '2021-10-31 09:46:23', 1, NULL),
(21, '9000001234600730321152248000000', 'Cash', 123460, 0, 900000, 12, 1232, 'store_price', 'Cash', 72, 1100, 1100, 0, 0, 0, NULL, '2021-10-31 09:52:48', 1, NULL),
(22, '9000001234600330421101714000000', 'Cash', 123460, 0, 900000, 13, 1093, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-11-01 04:47:14', 1, NULL),
(23, '900000123460030421115731000000', 'Cash', 123460, 0, 900000, 14, 600, 'zomato_price', 'UPI', 0, 100, 600, 500, 0, 0, NULL, '2021-11-01 06:27:31', 1, NULL),
(24, '900000123460030421124505000000', 'Abhishek', 123460, 3, 900000, 15, 50, 'zomato_price', 'UPI', 0, 100, 600, 500, 0, 0, NULL, '2021-11-01 07:15:05', 1, NULL),
(25, '9000001234600730421132518000000', 'Abhishek', 123460, 3, 900000, 16, 960, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-11-01 07:55:18', 1, NULL),
(26, '90000012346021530421133325000000', 'Abhishek', 123460, 3, 900000, 17, 300, 'store_price', 'Cash', 0, 0, 0, 0, 0, 0, NULL, '2021-11-01 08:03:25', 1, NULL),
(27, '90000012346031630421133823000000', 'Cash', 123460, 0, 900000, 18, 200, 'store_price', 'Cash', 0, 0, 200, 200, 0, 0, NULL, '2021-11-01 08:08:23', 1, NULL),
(28, '9000001234600630421134008000000', 'A New', 123460, 29, 900000, 19, 180, 'store_price', 'Cash', 30, 100, 150, 50, 0, 0, NULL, '2021-11-01 08:10:08', 1, NULL),
(29, '90000012346021330421140954000000', 'A New', 123460, 29, 900000, 20, 111, 'store_price', 'Cash', 11, 50, 100, 50, 0, 0, NULL, '2021-11-01 08:39:54', 1, NULL),
(30, '9000001234600930421142404000000', 'A New', 123460, 29, 900000, 21, 143, 'store_price', 'Cash', 0, 33, 90, 57, 0, 0, NULL, '2021-11-01 08:54:04', 1, NULL),
(31, '9000001234600930421142533000000', 'A New', 123460, 29, 900000, 22, 90, 'store_price', 'Cash', 0, 33, 90, 57, 0, 0, NULL, '2021-11-01 08:55:33', 1, NULL),
(32, '9000001234600630421143328000000', 'A New', 123460, 29, 900000, 23, 205, 'store_price', 'Cash', 5, 100, 200, 100, 0, 0, NULL, '2021-11-01 09:03:28', 1, NULL),
(33, '90000012346031830421163224000000', 'Cash', 123460, 0, 900000, 24, 191, 'store_price', 'Cash', 0, 0, 0, 0, 18, 3, '[{\"id\":\"19\",\"name\":\"mILK\",\"price\":51,\"qty\":1,\"subtotal\":\"51\"}]', '2021-11-01 11:02:24', 1, NULL),
(34, '90000012346021430421171935000000', 'A New', 123460, 29, 900000, 25, 43, 'store_price', 'Cash', 3, 0, 40, 40, 14, 2, '[{\"id\":\"20\",\"name\":\"CHAI\",\"price\":10,\"qty\":2,\"subtotal\":20},{\"id\":\"21\",\"name\":\"AS\",\"price\":23,\"qty\":1,\"subtotal\":\"23\"}]', '2021-11-01 11:49:35', 1, NULL),
(35, '9000001234600530421173439000000', 'Added Customer', 123460, 30, 900000, 26, 90, 'store_price', 'Cash', 0, 0, 90, 90, 5, 0, '[{\"id\":\"17\",\"name\":\"Veg pulao\",\"price\":60,\"qty\":1,\"subtotal\":\"60\"}]', '2021-11-01 12:04:39', 1, NULL),
(36, '9000001234602530421203101000000', 'Cash', 123460, 0, 900000, 27, 885, 'store_price', 'Cash', 0, 0, 0, 0, 5, 2, '[{\"id\":\"21\",\"name\":\"AS\",\"price\":23,\"qty\":5,\"subtotal\":115}]', '2021-11-01 15:01:01', 1, NULL);

--
-- Triggers `orders`
--
DROP TRIGGER IF EXISTS `add balance`;
DELIMITER $$
CREATE TRIGGER `add balance` AFTER UPDATE ON `orders` FOR EACH ROW IF (NEW.balance > 0) THEN
UPDATE customer set customer.balance = (customer.balance + NEW.balance) where customer.user_id = New.user_id;
end IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `kot data save`;
DELIMITER $$
CREATE TRIGGER `kot data save` AFTER INSERT ON `orders` FOR EACH ROW INSERT INTO `order_kot`( `orderid`, `table_id`, `table_group`, `data`) VALUES(NEW.orderid,NEW.tableid,NEW.tablegroup,NEW.kot_data)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `kot data save on update`;
DELIMITER $$
CREATE TRIGGER `kot data save on update` AFTER UPDATE ON `orders` FOR EACH ROW INSERT INTO `order_kot`( `orderid`, `table_id`, `table_group`, `data`) VALUES(NEW.orderid,NEW.tableid,NEW.tablegroup,NEW.kot_data)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
CREATE TABLE `orders_product` (
  `id` int(11) NOT NULL,
  `orderid` text NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_product`
--

INSERT INTO `orders_product` (`id`, `orderid`, `product_id`, `price`, `qty`, `subtotal`, `date`) VALUES
(95, '9223372036854775807', 17, 60, 1, 60, '2021-10-30 06:27:25'),
(96, '9223372036854775807', 22, 252.5, 2, 505, '2021-10-30 06:30:18'),
(97, '9223372036854775807', 19, 51, 6, 306, '2021-10-30 06:30:19'),
(98, '9223372036854775807', 22, 252.5, 2, 505, '2021-10-30 06:30:46'),
(99, '9223372036854775807', 19, 51, 6, 306, '2021-10-30 06:30:46'),
(100, '9223372036854775807', 20, 10, 1, 10, '2021-10-30 06:33:32'),
(101, '9223372036854775807', 19, 51, 1, 51, '2021-10-30 06:42:20'),
(102, '9000001234602930221121448000000', 22, 252.5, 1, 252.5, '2021-10-30 06:44:48'),
(103, '9000001234602930221121448000000', 20, 10, 1, 10, '2021-10-30 08:05:19'),
(104, '9000001234602730321151136000000', 19, 51, 4, 204, '2021-10-31 09:41:36'),
(105, '9000001234602730321151136000000', 22, 252.5, 1, 252.5, '2021-10-31 09:41:36'),
(106, '9000001234602730321151136000000', 20, 10, 1, 10, '2021-10-31 09:41:36'),
(107, '9000001234600630321151623000000', 20, 10, 5, 50, '2021-10-31 09:46:23'),
(108, '9000001234600630321151623000000', 22, 252.5, 3, 757.5, '2021-10-31 09:46:23'),
(109, '9000001234600630321151623000000', 19, 51, 1, 51, '2021-10-31 09:46:23'),
(110, '9000001234600730321152248000000', 22, 252.5, 4, 1010, '2021-10-31 09:52:48'),
(111, '9000001234600730321152248000000', 19, 51, 2, 102, '2021-10-31 09:53:04'),
(112, '9000001234600730321152248000000', 17, 60, 17, 1020, '2021-10-31 09:53:05'),
(113, '9000001234600330421101714000000', 17, 60, 17, 1020, '2021-11-01 04:47:14'),
(114, '9000001234600330421101714000000', 20, 10, 5, 50, '2021-11-01 04:47:14'),
(115, '9000001234600330421101714000000', 21, 23, 1, 23, '2021-11-01 04:50:26'),
(116, '900000123460030421115731000000', 17, 50, 13, 650, '2021-11-01 06:27:31'),
(117, '900000123460030421115731000000', 20, 0, 2, 0, '2021-11-01 06:29:06'),
(118, '90000012346021530421133325000000', 17, 60, 5, 300, '2021-11-01 08:03:26'),
(119, '90000012346031630421133823000000', 17, 60, 3, 180, '2021-11-01 08:08:23'),
(120, '90000012346031630421133823000000', 20, 10, 2, 20, '2021-11-01 08:08:23'),
(121, '9000001234600630421134008000000', 17, 60, 3, 180, '2021-11-01 08:10:09'),
(122, '90000012346021330421140954000000', 17, 60, 1, 60, '2021-11-01 08:39:54'),
(123, '90000012346021330421140954000000', 19, 51, 1, 51, '2021-11-01 08:39:55'),
(124, '9000001234600930421142404000000', 17, 60, 2, 120, '2021-11-01 08:54:04'),
(125, '9000001234600930421142404000000', 21, 23, 1, 23, '2021-11-01 08:54:04'),
(126, '9000001234600930421142533000000', 17, 60, 1, 60, '2021-11-01 08:55:34'),
(127, '9000001234600930421142533000000', 20, 10, 3, 30, '2021-11-01 08:55:53'),
(128, '9000001234600630421143328000000', 21, 23, 1, 23, '2021-11-01 09:03:28'),
(129, '9000001234600630421143328000000', 20, 10, 2, 20, '2021-11-01 09:03:28'),
(130, '9000001234600630421143328000000', 17, 60, 1, 60, '2021-11-01 09:03:28'),
(131, '9000001234600630421143328000000', 19, 51, 2, 102, '2021-11-01 09:03:55'),
(132, '90000012346031830421163224000000', 17, 60, 2, 120, '2021-11-01 11:02:25'),
(133, '90000012346031830421163224000000', 20, 10, 2, 20, '2021-11-01 11:02:25'),
(134, '90000012346031830421163224000000', 19, 51, 1, 51, '2021-11-01 11:08:06'),
(135, '90000012346021430421171935000000', 20, 10, 2, 20, '2021-11-01 11:49:35'),
(136, '90000012346021430421171935000000', 21, 23, 1, 23, '2021-11-01 11:49:35'),
(137, '9000001234600530421173439000000', 20, 10, 3, 30, '2021-11-01 12:04:39'),
(138, '9000001234600530421173439000000', 17, 60, 1, 60, '2021-11-01 12:06:01'),
(139, '9000001234602530421203101000000', 17, 60, 4, 240, '2021-11-01 15:01:02'),
(140, '9000001234602530421203101000000', 20, 10, 2, 20, '2021-11-01 15:01:52'),
(141, '9000001234602530421203101000000', 19, 51, 10, 510, '2021-11-01 15:16:17'),
(142, '9000001234602530421203101000000', 21, 23, 5, 115, '2021-11-01 15:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_kot`
--

DROP TABLE IF EXISTS `order_kot`;
CREATE TABLE `order_kot` (
  `id` int(11) NOT NULL,
  `orderid` text NOT NULL DEFAULT '0',
  `table_id` int(11) NOT NULL DEFAULT 0,
  `table_group` int(11) NOT NULL DEFAULT 0,
  `data` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `remarks` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_kot`
--

INSERT INTO `order_kot` (`id`, `orderid`, `table_id`, `table_group`, `data`, `date`, `remarks`, `status`) VALUES
(1, '90000012346031830421163224000000', 18, 3, 0, '2021-11-01 11:08:06', NULL, 1),
(2, '90000012346021430421171935000000', 14, 2, 0, '2021-11-01 11:49:35', NULL, 1),
(3, '9000001234600530421173439000000', 5, 0, 0, '2021-11-01 12:04:39', NULL, 1),
(4, '9000001234600530421173439000000', 5, 0, 0, '2021-11-01 12:06:01', NULL, 1),
(5, '90000012346021430421171935000000', 14, 2, 0, '2021-11-01 12:06:39', NULL, 1),
(6, '90000012346021430421171935000000', 14, 2, 0, '2021-11-01 12:08:11', NULL, 1),
(7, '9000001234600530421173439000000', 5, 0, 0, '2021-11-01 12:09:19', NULL, 1),
(8, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:01:01', NULL, 1),
(9, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:01:25', NULL, 1),
(10, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:01:51', NULL, 1),
(11, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:15:27', NULL, 1),
(12, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:16:17', NULL, 1),
(13, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:17:22', NULL, 1),
(14, '9000001234602530421203101000000', 5, 2, 0, '2021-11-01 15:19:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL,
  `permission` text NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 1,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL DEFAULT 2,
  `product_name` text NOT NULL,
  `store_price` double DEFAULT NULL,
  `swiggy_price` double DEFAULT NULL,
  `zomato_price` double DEFAULT NULL,
  `local_price` double DEFAULT NULL,
  `gst` varchar(100) NOT NULL,
  `gst_type` varchar(30) DEFAULT NULL,
  `food_type` varchar(30) NOT NULL DEFAULT 'veg',
  `discount` int(50) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `hsn_code` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `admin_id`, `restaurant`, `category`, `sub_category`, `product_name`, `store_price`, `swiggy_price`, `zomato_price`, `local_price`, `gst`, `gst_type`, `food_type`, `discount`, `unit_name`, `hsn_code`, `status`) VALUES
(2, 0, 1, 8, 2, 'Banana Shake', 40, 40, 40, 40, '0 %', NULL, 'veg', 0, 'Shakes', 'shake123', 1),
(3, 0, 1, 8, 2, 'Mango Shake', 90, 0, 0, 0, '18', NULL, 'veg', 50, 'Juice', 'juciemango123', 1),
(5, 0, 1, 3, 2, 'p', 10000, 15000, 20000, 8000, '0', NULL, 'veg', 0, '', '', 1),
(6, 0, 1, 17, 2, 'Banana', 30, 35, 35, 30, '0', NULL, 'veg', 0, '', '', 1),
(7, 0, 1, 14, 2, 'Pizza Hub ', 49, 39, 39, 59, '12', NULL, 'veg', 10, 'Pcs', '12345', 1),
(8, 0, 1, 8, 3, 'Apple', 50, 50, 50, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(9, 0, 1, 8, 3, 'Yuhhg', 50, 50, 50, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(10, 0, 1, 8, 3, 'Amroli ', 50, 100, 100, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(11, 0, 1, 8, 4, 'Ydydhd', 50, 100, 100, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(12, 0, 1, 8, 4, 'Kakak', 50, 100, 100, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(13, 0, 1, 17, 4, 'Iyewt', 50, 100, 100, 0, '0', NULL, 'veg', 0, 'Glass', '', 1),
(14, 0, 1, 18, 2, 'TSR', 1500, 0, 0, 0, '0', NULL, 'veg', 0, '', '', 1),
(15, 0, 1, 18, 2, 'Notice', 500, 0, 0, 0, '0', NULL, 'veg', 0, '', '', 1),
(16, 0, 1, 20, 2, 'Amrud', 50, 60, 70, 80, '12', NULL, 'veg', 0, 'Glass', '', 1),
(17, 0, 900000, 21, 2, 'Veg pulao', 60, 50, 50, 70, '12', NULL, 'veg', 0, 'Plate', '', 1),
(18, 900003, 900001, 24, 6, 'test product name', 40, 0, 0, 0, '0', 'include', 'not_defined', 0, 'PCS', '', 1),
(19, 123460, 900000, 17, 0, 'mILK', 51, 0, 0, 0, '0', 'include', 'not_defined', 0, 'PCS', '', 1),
(20, 123460, 900000, 21, 0, 'CHAI', 10, 0, 0, 0, '0', 'include', 'non-veg', 0, 'PCS', '', 1),
(21, 123460, 900000, 21, 0, 'AS', 23, 0, 0, 0, '0', 'include', 'not_defined', 0, 'PCS', '', 1),
(22, 123460, 900000, 17, 0, 'AS', 252.5, 252.5, 0, 0, '0', 'include', 'not_defined', 0, 'PCS', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `restaurantid` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gst` varchar(30) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `add_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `remarks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurantid`, `name`, `address`, `mobile`, `phone`, `email`, `gst`, `country`, `state`, `district`, `city`, `added_by`, `add_on`, `status`, `remarks`) VALUES
(900000, 'New Era Restau', 'Ramrai Jind Haryana India ', '7404880600', '', ' ', '', 'India', 'Haryana', 'Jind', 'Ramrai', 0, '2021-10-21 06:45:57', 1, 0),
(900001, 'Restaurant Name Test', '', '123456', '124', 'sdfjk@gm.con', '245763268539127474', 'INDIA', 'Haryana', 'Jind', 'Ramrai', 123460, '2021-10-22 03:37:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `admin_id`, `restaurant`, `name`, `created_by`, `created_on`, `status`) VALUES
(2, 17, 0, 1, 'Small', 2, '2021-10-19', 1),
(3, 8, 0, 1, 'Medium', 2, '2021-10-19', 1),
(4, 17, 0, 1, 'Large', 2, '2021-10-19', 1),
(5, 23, 123460, 900000, 'test Full', 900000, '2021-10-21', 1),
(6, 24, 900003, 900001, 'half', 900003, '2021-10-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `tableid` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tableid`, `admin_id`, `restaurant`, `status`) VALUES
(1, 0, 900000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tables_session`
--

DROP TABLE IF EXISTS `tables_session`;
CREATE TABLE `tables_session` (
  `session_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `tablename` int(11) NOT NULL DEFAULT 0,
  `table_cat` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 1,
  `orderid` text NOT NULL DEFAULT '0',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables_session`
--

INSERT INTO `tables_session` (`session_id`, `table_id`, `tablename`, `table_cat`, `admin_id`, `restaurant`, `orderid`, `data`, `status`) VALUES
(30, 6, 6, 0, 123460, 900000, '9000001234600630421143328000000', NULL, 0),
(31, 7, 7, 0, 123460, 900000, '0', NULL, 0),
(32, 3, 3, 0, 123460, 900000, '0', NULL, 0),
(33, 0, 0, 0, 123460, 900000, '900000123460030421124505000000', NULL, 0),
(34, 15, 215, 2, 123460, 900000, '0', NULL, 0),
(35, 16, 316, 3, 123460, 900000, '90000012346031630421133823000000', NULL, 0),
(36, 13, 213, 2, 123460, 900000, '90000012346021330421140954000000', NULL, 0),
(37, 9, 9, 0, 123460, 900000, '9000001234600930421142533000000', NULL, 0),
(38, 18, 318, 3, 123460, 900000, '0', NULL, 0),
(39, 14, 214, 2, 123460, 900000, '90000012346021430421171935000000', NULL, 0),
(40, 5, 5, 0, 123460, 900000, '9000001234600530421173439000000', NULL, 0),
(41, 5, 25, 2, 123460, 900000, '9000001234602530421203101000000', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL DEFAULT 0,
  `restaurant` int(11) NOT NULL DEFAULT 0,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mobile` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_sex` set('MALE','FEMALE','OTHER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FEMALE',
  `user_dob` date DEFAULT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `admin_type`, `restaurant`, `user_name`, `user_mobile`, `password`, `user_email`, `user_sex`, `user_dob`, `user_address`, `join_on`, `email_verified`, `mobile_verified`, `user_verified`, `user_status`) VALUES
(123460, 2, 900000, 'Abhishek', '7404880600', 'c4ca4238a0b923820dcc509a6f75849b', 'as@gmail.com', 'MALE', NULL, NULL, '2021-10-21 02:57:06', 0, 0, 0, NULL),
(900001, 0, 0, 'Abhishek', '7744110011', 'c4ca4238a0b923820dcc509a6f75849b', 'as@df.com', 'FEMALE', NULL, NULL, '2021-10-22 03:39:15', 0, 0, 0, NULL),
(900002, 0, 0, 'a 1', '1231231230', 'c4ca4238a0b923820dcc509a6f75849b', 'as@gmail.col', 'FEMALE', NULL, NULL, '2021-10-22 03:45:21', 0, 0, 0, NULL),
(900003, 0, 900001, 'Abh', '1231231231', 'c4ca4238a0b923820dcc509a6f75849b', 'asjkd@afj.lco', 'FEMALE', NULL, NULL, '2021-10-22 03:51:20', 0, 0, 0, NULL),
(900004, 0, 900001, 'simple', '7418529630', 'c4ca4238a0b923820dcc509a6f75849b', 'as@adlkc.cl', 'FEMALE', NULL, NULL, '2021-10-31 03:43:42', 0, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_cat`
--
ALTER TABLE `expense_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `logined_user`
--
ALTER TABLE `logined_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`) USING HASH;

--
-- Indexes for table `orders_product`
--
ALTER TABLE `orders_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_kot`
--
ALTER TABLE `order_kot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tableid`);

--
-- Indexes for table `tables_session`
--
ALTER TABLE `tables_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_cat`
--
ALTER TABLE `expense_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logined_user`
--
ALTER TABLE `logined_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders_product`
--
ALTER TABLE `orders_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `order_kot`
--
ALTER TABLE `order_kot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900002;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables_session`
--
ALTER TABLE `tables_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
