-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 07:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsms_laravel10`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment_stock`
--

CREATE TABLE `sales_payment_stock` (
  `id` int(11) NOT NULL,
  `point_id` int(11) NOT NULL,
  `sales_amount` decimal(10,0) NOT NULL,
  `collection_amount` decimal(10,0) NOT NULL,
  `deposit_amount` decimal(10,0) NOT NULL,
  `stock_amount` decimal(10,0) NOT NULL,
  `ledger_view` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_payment_stock`
--

INSERT INTO `sales_payment_stock` (`id`, `point_id`, `sales_amount`, `collection_amount`, `deposit_amount`, `stock_amount`, `ledger_view`) VALUES
(1, 1, 40000, 18000, 0, 0, 0),
(2, 2, 20000, 10000, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_payment_stock`
--
ALTER TABLE `sales_payment_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_payment_stock`
--
ALTER TABLE `sales_payment_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
