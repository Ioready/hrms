-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 02:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `virtual_status` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_ipaddress` longtext NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_ipaddress` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `virtual_status`, `created_date`, `created_ipaddress`, `update_date`, `updated_ipaddress`) VALUES
(1, 'shobi', 'DELETED', '2024-01-07 15:39:13', '::1', '2024-01-07 15:49:07', ''),
(2, 'swaathi', 'DELETED', '2024-01-07 15:57:37', '::1', '2024-01-07 16:58:16', ''),
(3, 'shobi', 'DELETED', '2024-01-07 16:44:23', '::1', '2024-01-07 16:58:26', ''),
(4, 'shobi', 'DELETED', '2024-01-07 16:58:53', '::1', '2024-01-07 17:22:38', ''),
(5, 'test', 'DELETED', '2024-01-07 17:07:41', '::1', '2024-01-07 17:59:21', ''),
(6, 'shobi', 'DELETED', '2024-01-07 17:22:59', '::1', '2024-01-07 18:31:08', ''),
(7, 'sharan', 'DELETED', '2024-01-07 17:59:43', '::1', '2024-01-07 18:01:38', ''),
(8, 'swaathi', 'ACTIVE', '2024-01-07 18:29:26', '::1', '2024-01-07 18:29:26', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
