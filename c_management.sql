-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 08:23 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(20) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `tvr` int(2) NOT NULL,
  `suplier_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(20) NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT 'no_thumb.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `ref`, `desig`, `tvr`, `suplier_id`, `category_id`, `unit_id`, `thumb`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 'post area', 'post area', 20, 1, 1, 1, 'no_thumb.jpg', '2017-06-12 08:46:10', '2017-06-12 08:46:10', 1, 1),
(2, 'sdd', 'sdf', 20, 0, 0, 0, 'no_thumb.jpg', '2017-06-05 09:58:18', '2017-06-05 09:58:18', 1, 1),
(3, 'rfer', 'rfer', 0, 44, 0, 0, 'Array', '2017-06-05 10:20:33', '2017-06-05 10:20:33', 1, 1),
(4, 'sdf', 'sdf', 0, 77, 0, 0, 'Array', '2017-06-05 10:23:53', '2017-06-05 10:23:53', 1, 1),
(5, 'sdf', 'sdf', 0, 21, 0, 0, 'Array', '2017-06-05 11:55:34', '2017-06-05 11:55:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Books'),
(2, 'Tickets');

-- --------------------------------------------------------

--
-- Table structure for table `suppleries`
--

CREATE TABLE `suppleries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(50) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zip_code` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppleries`
--

INSERT INTO `suppleries` (`id`, `name`, `tel`, `city`, `adress`, `created_at`, `update_at`, `created_by`, `updated_by`, `email`, `zip_code`) VALUES
(1, 'INFO SUP', 666666666, 'Egypt, Cairo', 'Helwan', '2017-06-03 11:15:39', '2017-06-03 11:15:39', 1, 1, 'eslam@eslam.com', 2215);

-- --------------------------------------------------------

--
-- Table structure for table `trv`
--

CREATE TABLE `trv` (
  `trv` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trv`
--

INSERT INTO `trv` (`trv`) VALUES
(12),
(14),
(20),
(17),
(19),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(20) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'U'),
(2, 'K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppleries`
--
ALTER TABLE `suppleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suppleries`
--
ALTER TABLE `suppleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
