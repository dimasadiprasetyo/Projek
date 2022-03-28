-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 04:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispenlj`
--

-- --------------------------------------------------------

--
-- Table structure for table `trx_details`
--

CREATE TABLE `trx_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_details`
--

INSERT INTO `trx_details` (`id`, `id_trx`, `barang_id`, `qty`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 'TRX07032022230903', 'BrgKG01', 3, 0, 150000, '2022-03-07 16:19:08', '2022-03-07 16:19:08'),
(2, 'TRX07032022231906', 'BrgKS01', 11, 137500, 412500, '2022-03-07 16:19:43', '2022-03-07 16:19:43'),
(3, 'TRX07032022231906', 'BrgKS01', 11, 137500, 412500, '2022-03-07 16:19:47', '2022-03-07 16:19:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trx_details`
--
ALTER TABLE `trx_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trx_details`
--
ALTER TABLE `trx_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
