-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 01:25 PM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_price` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `virtual_status` text NOT NULL DEFAULT 'ACTIVE',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_ipaddress` longtext NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_ipaddress` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `product_code`, `category_id`, `unit_price`, `description`, `image`, `virtual_status`, `created_date`, `created_ipaddress`, `update_date`, `updated_ipaddress`) VALUES
(1, 'shobi', '3333', 0, '1000', 'Testing field', NULL, 'ACTIVE', '2024-01-08 16:47:52', '::1', '2024-01-09 17:02:30', ''),
(2, 'test11', '22222', 0, '1000', 'Testing field', NULL, 'DELETED', '2024-01-08 16:48:45', '::1', '2024-01-09 17:20:29', ''),
(3, 'swaa', '22222', 0, '1000', 'Testing field', NULL, 'ACTIVE', '2024-01-08 16:52:21', '::1', '2024-01-09 17:02:13', ''),
(4, 'test', '22222', 0, '1000', 'Testing field', NULL, 'ACTIVE', '2024-01-09 15:11:00', '::1', '2024-01-09 17:02:46', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
