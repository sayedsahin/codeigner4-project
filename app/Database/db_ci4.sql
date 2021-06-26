-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2021 at 06:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `mobile`, `message`) VALUES
(1, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 'sss'),
(2, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 'sayed'),
(3, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 'sayed'),
(4, 'sahinsa', 'sayed@gmail.com', '01832816748', 'how');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `mobile`, `salary`, `designation`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 2500, 'emploee', 'feni', NULL, '2021-06-26 00:58:23', NULL),
(2, 'sahin', 'sahin.sayed1@gmail.com', '01832816748', 25000, 'emploee', 'feni', NULL, '2020-10-23 22:03:43', NULL),
(3, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 1455, 'emploee', 'feni', NULL, '2020-10-23 21:21:43', '2020-10-23 21:21:43'),
(4, 'sayed', 'sahin.sayed1@gmail.com', '01832816748', 1455, 'emploee', 'feni', '2020-10-21 22:50:51', '2020-10-23 21:20:50', '2020-10-23 21:20:50'),
(5, 'Ashraf', 'ashraf@gmail.com', '01832816748', 255568, 'emploee', 'feni', '2020-10-23 17:59:10', '2020-10-23 21:21:11', '2020-10-23 21:21:11'),
(6, 'Ashfi', 'ashfi@gmail.com', '12312312312', 2545, 'employee', 'Feni', '2020-12-11 15:50:00', '2020-12-11 15:50:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

DROP TABLE IF EXISTS `login_activity`;
CREATE TABLE IF NOT EXISTS `login_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniid` varchar(60) DEFAULT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `uniid`, `agent`, `ip`, `login_at`, `logout_at`) VALUES
(5, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-13 23:33:21', '2020-10-13 06:34:28'),
(6, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-13 23:34:32', '2020-10-13 06:40:06'),
(7, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-13 23:40:12', NULL),
(8, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-14 20:46:37', '2020-10-14 05:28:03'),
(9, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-15 22:42:19', NULL),
(10, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-17 21:01:46', NULL),
(11, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-18 21:59:08', '2020-10-18 05:18:01'),
(12, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-18 22:18:08', NULL),
(13, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-19 21:46:41', '2020-10-19 05:00:02'),
(14, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-19 22:24:01', '2020-10-19 05:24:23'),
(15, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-20 18:26:44', '2020-10-20 02:30:24'),
(16, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-20 20:22:34', '2020-10-20 03:22:40'),
(17, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-20 20:25:16', '2020-10-20 03:27:24'),
(18, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-20 20:27:32', NULL),
(19, '5f84f01868403', 'Chrome 86.0.4240.75', '::1', '2020-10-21 03:21:43', '2020-10-20 10:22:07'),
(20, '5f84f01868403', 'Chrome 86.0.4240.111', '::1', '2020-10-23 22:58:29', NULL),
(21, '5f84f01868403', 'Chrome 86.0.4240.111', '::1', '2020-10-24 23:07:56', NULL),
(22, '5f84f01868403', 'Chrome 87.0.4280.66', '::1', '2020-11-24 23:17:55', '2020-11-24 05:19:47'),
(23, '5f84f01868403', 'Chrome 87.0.4280.88', '::1', '2020-12-11 21:44:09', '2020-12-11 04:06:38'),
(24, '5f84f01868403', 'Chrome 87.0.4280.88', '::1', '2021-01-01 09:04:36', NULL),
(25, '5f84f01868403', 'Chrome 87.0.4280.141', '::1', '2021-01-22 21:00:31', NULL),
(26, '5f84f01868403', 'Chrome 91.0.4472.114', '::1', '2021-06-26 06:01:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `quantity`, `created_at`) VALUES
(1, 'Ulto Nirnoy', 200, 5, '2020-10-21 12:11:56'),
(2, 'Duble Standard', 325, 10, '2020-10-21 12:12:26'),
(3, 'Chintaporadh', 150, 15, '2020-10-21 12:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `mobile` int(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `mobile`, `gender`, `dob`) VALUES
(1, 'sayed', 'sayed@gmail.com', 'sayed123', 1832816748, 'male', '1993-11-12'),
(2, 'sahin', 'sahin@gmail.com', 'sahin123', 1832816748, 'male', '1993-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'inactive',
  `uniid` varchar(250) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `profile_pic`, `created_at`, `status`, `uniid`, `activation_date`) VALUES
(6, 'sayed', 'sahin.sayed1@gmail.com', '$2y$10$Nknjx63b/sePyyJu1NN6huyyJom3PBf2r/gO2wvekHyrh7AGmHQT.', '01832816748', NULL, '2020-10-13 06:08:56', 'active', '5f84f01868403', '2020-10-12 07:08:56'),
(7, 'sahin', 'sahin.sayed@gmail.com', '$2y$10$CLkW.4oFJlQi8FlmLhaTyOLmqvWqmzrRlzBct6UAxMnoLLSlJWAxe', '01256458853', NULL, '2020-12-12 04:07:26', 'inactive', '5fd3ed9e65b4f', '2020-12-11 04:07:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
