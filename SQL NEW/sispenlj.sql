-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 05:10 AM
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
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `id_akun` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` bigint(20) DEFAULT NULL,
  `saldo_akhir` bigint(20) DEFAULT NULL,
  `jenis_akun` enum('Debet','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id_akun`, `nama_akun`, `saldo_awal`, `saldo_akhir`, `jenis_akun`, `created_at`, `updated_at`) VALUES
('101', 'Kas', 0, 0, 'Debet', '2022-06-19 11:57:21', '2022-06-19 11:57:21'),
('102', 'Persediaan Barang Dagang', 0, 0, 'Debet', '2022-06-19 11:57:22', '2022-06-19 11:57:22'),
('103', 'piutang usaha', 0, 0, 'Debet', '2022-06-19 11:57:22', '2022-06-19 11:57:22'),
('400', 'penjualan', 0, 0, 'Kredit', '2022-06-19 11:57:22', '2022-06-19 11:57:22'),
('402', 'potongan penjualan', 0, 0, 'Debet', '2022-06-19 11:57:22', '2022-06-19 11:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `angsurans`
--

CREATE TABLE `angsurans` (
  `kode_angsuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ang` date NOT NULL,
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angsuran_ke` bigint(20) NOT NULL,
  `jml_bayar` bigint(20) NOT NULL,
  `kurang_bayar` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `kode_barang` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_barang` enum('Lokal','Luar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`kode_barang`, `jenis_barang`, `asal_barang`, `ukuran_barang`, `stok`, `harga`, `created_at`, `updated_at`) VALUES
('BrgKG1-01', 'Kayu Glugu', 'Lokal', '14m', 689, 50000, '2022-06-19 11:59:48', '2022-07-29 03:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL,
  `id_jurnal` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id_jurnal_detail`, `id_jurnal`, `id_akun`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES
(1, 'JU19062022190116', '101', 100000, 0, '2022-06-19 12:01:17', '2022-06-19 12:01:17'),
(2, 'JU19062022190116', '400', 0, 100000, '2022-06-19 12:01:17', '2022-06-19 12:01:17'),
(3, 'JU19062022190116', '402', 0, 0, '2022-06-19 12:01:18', '2022-06-19 12:01:18'),
(4, 'JU19062022190212', '101', 1845000, 0, '2022-06-19 12:02:12', '2022-06-19 12:02:12'),
(5, 'JU19062022190212', '400', 0, 1845000, '2022-06-19 12:02:12', '2022-06-19 12:02:12'),
(6, 'JU19062022190212', '402', 205000, 0, '2022-06-19 12:02:12', '2022-06-19 12:02:12'),
(7, 'JU19062022190420', '101', 50000, 0, '2022-06-19 12:04:20', '2022-06-19 12:04:20'),
(8, 'JU19062022190420', '103', 200000, 0, '2022-06-19 12:04:20', '2022-06-19 12:04:20'),
(9, 'JU19062022190420', '400', 0, 250000, '2022-06-19 12:04:20', '2022-06-19 12:04:20'),
(10, 'JU19062022190420', '402', 0, 0, '2022-06-19 12:04:20', '2022-06-19 12:04:20'),
(11, 'JU19062022190523', '101', 890000, 0, '2022-06-19 12:05:23', '2022-06-19 12:05:23'),
(12, 'JU19062022190523', '103', 1000000, 0, '2022-06-19 12:05:24', '2022-06-19 12:05:24'),
(13, 'JU19062022190523', '400', 0, 1890000, '2022-06-19 12:05:24', '2022-06-19 12:05:24'),
(14, 'JU19062022190523', '402', 210000, 0, '2022-06-19 12:05:24', '2022-06-19 12:05:24'),
(15, 'JU30062022100233', '101', 150000, 0, '2022-06-30 03:02:33', '2022-06-30 03:02:33'),
(16, 'JU30062022100233', '400', 0, 150000, '2022-06-30 03:02:34', '2022-06-30 03:02:34'),
(17, 'JU30062022100233', '402', 0, 0, '2022-06-30 03:02:34', '2022-06-30 03:02:34'),
(18, 'JU30062022101148', '101', 100000, 0, '2022-06-30 03:11:48', '2022-06-30 03:11:48'),
(19, 'JU30062022101148', '400', 0, 100000, '2022-06-30 03:11:48', '2022-06-30 03:11:48'),
(20, 'JU30062022101148', '402', 0, 0, '2022-06-30 03:11:48', '2022-06-30 03:11:48'),
(21, 'JU30062022102050', '101', 150000, 0, '2022-06-30 03:20:50', '2022-06-30 03:20:50'),
(22, 'JU30062022102050', '400', 0, 150000, '2022-06-30 03:20:50', '2022-06-30 03:20:50'),
(23, 'JU30062022102050', '402', 0, 0, '2022-06-30 03:20:50', '2022-06-30 03:20:50'),
(24, 'JU30062022102443', '101', 200000, 0, '2022-06-30 03:24:44', '2022-06-30 03:24:44'),
(25, 'JU30062022102443', '400', 0, 200000, '2022-06-30 03:24:44', '2022-06-30 03:24:44'),
(26, 'JU30062022102443', '402', 0, 0, '2022-06-30 03:24:44', '2022-06-30 03:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_header`
--

CREATE TABLE `jurnal_header` (
  `id_jurnal` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_posting` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal_header`
--

INSERT INTO `jurnal_header` (`id_jurnal`, `status_posting`, `tanggal`, `id_trx`, `keterangan`, `created_at`, `updated_at`) VALUES
('JU19062022190116', '1', '2022-06-19', 'TRX19062022190041', 'Penjualan ', '2022-06-19 12:01:16', '2022-06-19 12:01:16'),
('JU19062022190212', '1', '2022-06-19', 'TRX19062022190141', 'Penjualan ', '2022-06-19 12:02:12', '2022-06-19 12:02:12'),
('JU19062022190420', '1', '2022-06-19', 'TRX19062022190335', 'Penjualan Kredit', '2022-06-19 12:04:20', '2022-06-19 12:04:20'),
('JU19062022190523', '1', '2022-06-19', 'TRX19062022190442', 'Penjualan Kredit', '2022-06-19 12:05:23', '2022-06-19 12:05:23'),
('JU30062022100233', '1', '2022-06-30', 'TRX30062022100201', 'Penjualan ', '2022-06-30 03:02:33', '2022-06-30 03:02:33'),
('JU30062022101148', '1', '2022-06-30', 'TRX30062022101113', 'Penjualan ', '2022-06-30 03:11:48', '2022-06-30 03:11:48'),
('JU30062022102050', '1', '2022-06-30', 'TRX30062022102024', 'Penjualan ', '2022-06-30 03:20:50', '2022-06-30 03:20:50'),
('JU30062022102443', '1', '2022-06-30', 'TRX30062022102414', 'Penjualan ', '2022-06-30 03:24:44', '2022-06-30 03:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(519, '2017_08_03_055212_create_auto_numbers', 1),
(542, '2019_08_19_000000_create_failed_jobs_table', 2),
(571, '2014_10_12_000000_create_users_table', 3),
(572, '2014_10_12_100000_create_password_resets_table', 3),
(573, '2022_02_26_115242_create_akuns_table', 3),
(574, '2022_02_27_120759_create_barangs_table', 3),
(575, '2022_02_27_140104_create_pelanggans_table', 3),
(576, '2022_03_01_035105_create_trx_headers_table', 3),
(577, '2022_03_01_040702_create_trx_details_table', 3),
(578, '2022_03_04_092204_create_angsurans_table', 3),
(579, '2022_03_26_101135_create_jurnal_detail_table', 3),
(580, '2022_03_28_132333_create_jurnal_header_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `kode_pelanggan` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
('PLG-001', 'Dimas Adi', 'Jalan pangeran antasari', '081542807769', '2022-06-19 12:03:14', '2022-06-19 12:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `trx_details`
--

CREATE TABLE `trx_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_details`
--

INSERT INTO `trx_details` (`id`, `id_trx`, `barang_id`, `qty`, `diskon`, `total_harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TRX19062022190041', 'BrgKG1-01', 2, 0, 100000, '2022-06-19 12:01:01', '2022-06-19 12:01:01', NULL),
(2, 'TRX19062022190141', 'BrgKG1-01', 41, 205000, 1845000, '2022-06-19 12:01:56', '2022-06-19 12:01:56', NULL),
(3, 'TRX19062022190335', 'BrgKG1-01', 5, 0, 250000, '2022-06-19 12:03:53', '2022-06-19 12:03:53', NULL),
(4, 'TRX19062022190442', 'BrgKG1-01', 42, 210000, 1890000, '2022-06-19 12:04:59', '2022-06-19 12:04:59', NULL),
(5, 'TRX30062022100201', 'BrgKG1-01', 3, 0, 150000, '2022-06-30 03:02:21', '2022-06-30 03:02:21', NULL),
(6, 'TRX30062022101113', 'BrgKG1-01', 2, 0, 100000, '2022-06-30 03:11:33', '2022-06-30 03:11:33', NULL),
(7, 'TRX30062022102024', 'BrgKG1-01', 3, 0, 150000, '2022-06-30 03:20:41', '2022-06-30 03:20:41', NULL),
(8, 'TRX30062022102024', 'BrgKG1-01', 2, 0, 100000, '2022-06-30 03:23:25', '2022-06-30 03:23:25', NULL),
(9, 'TRX30062022102414', 'BrgKG1-01', 4, 0, 200000, '2022-06-30 03:24:31', '2022-06-30 03:24:31', NULL),
(10, 'TRX13072022100737', 'BrgKG1-01', 4, 0, 200000, '2022-07-13 03:25:41', '2022-07-13 03:25:41', NULL),
(11, 'TRX29072022103854', 'BrgKG1-01', 3, 0, 150000, '2022-07-29 03:39:21', '2022-07-29 03:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trx_headers`
--

CREATE TABLE `trx_headers` (
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pelanggan` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_trx` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_transaksi` enum('Tunai','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_trx` enum('Belum Lunas','Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `kurang_bayar` bigint(20) DEFAULT NULL,
  `ongkos` bigint(20) DEFAULT NULL,
  `tgl_jatuhtemp` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_headers`
--

INSERT INTO `trx_headers` (`id_trx`, `kode_pelanggan`, `pelanggan`, `tgl_trx`, `keterangan`, `jenis_transaksi`, `status_trx`, `total_bayar`, `kurang_bayar`, `ongkos`, `tgl_jatuhtemp`, `created_at`, `updated_at`, `deleted_at`) VALUES
('TRX19062022190041', NULL, 'UD Degayu', '2022-06-19', NULL, 'Tunai', 'Lunas', 100000, NULL, 70000, NULL, '2022-06-19 12:01:16', '2022-06-19 12:01:16', NULL),
('TRX19062022190141', NULL, 'Gilang Adi P', '2022-06-19', NULL, 'Tunai', 'Lunas', 1845000, NULL, 25000, NULL, '2022-06-19 12:02:12', '2022-06-19 12:02:12', NULL),
('TRX19062022190335', 'PLG-001', NULL, '2022-06-19', NULL, 'Kredit', 'Belum Lunas', 250000, 200000, 100000, '2022-07-19', '2022-06-19 12:04:20', '2022-06-19 12:04:20', NULL),
('TRX19062022190442', 'PLG-001', NULL, '2022-06-19', NULL, 'Kredit', 'Belum Lunas', 1890000, 1000000, 50000, '2022-07-19', '2022-06-19 12:05:23', '2022-06-19 12:05:23', NULL),
('TRX30062022100201', NULL, 'Gilang Adi P', '2022-06-30', NULL, 'Tunai', 'Lunas', 150000, NULL, 13000, NULL, '2022-06-30 03:02:33', '2022-06-30 03:02:33', NULL),
('TRX30062022101113', NULL, 'sada', '2022-06-30', 'asdas', 'Tunai', 'Lunas', 100000, NULL, 10000, NULL, '2022-06-30 03:11:48', '2022-06-30 03:11:48', NULL),
('TRX30062022102024', NULL, 'wfwf', '2022-06-30', NULL, 'Tunai', 'Lunas', 150000, NULL, 17000, NULL, '2022-06-30 03:20:50', '2022-06-30 03:20:50', NULL),
('TRX30062022102414', NULL, 'wgw', '2022-06-30', NULL, 'Tunai', 'Lunas', 200000, NULL, 13000, NULL, '2022-06-30 03:24:44', '2022-06-30 03:24:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `password`, `username`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$rv2sPXWyJsJWqmx5QRmAo.fUnhZOEy0.vFG2IshqGE4d/rUfhz.0a', 'Admin', 'EwfYGvyr8b1jIGJkHuGWTylVZoqFGUetmcbrBIexxVl24N4P48fAEioVGz3d', '2022-06-19 11:57:23', '2022-06-19 11:57:23'),
(2, 'Pemilik', 'pemilik', '$2y$10$BKHu.KcOQFGBHyXW.qm6PuAK/C80bcz7.ioZwPhW//oK3pPH5xvOy', 'Pemilik', 'V6VEINlnlFHZKLWgd6wjsivcUDSiX66UDZ3ldHTFT16Tngla4hcMyfZrsbAs', '2022-06-19 11:57:24', '2022-06-30 02:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `angsurans`
--
ALTER TABLE `angsurans`
  ADD PRIMARY KEY (`kode_angsuran`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id_jurnal_detail`);

--
-- Indexes for table `jurnal_header`
--
ALTER TABLE `jurnal_header`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `jurnal_header_id_trx_foreign` (`id_trx`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `trx_details`
--
ALTER TABLE `trx_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trx_details_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `trx_headers`
--
ALTER TABLE `trx_headers`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `trx_headers_kode_pelanggan_foreign` (`kode_pelanggan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT for table `trx_details`
--
ALTER TABLE `trx_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal_header`
--
ALTER TABLE `jurnal_header`
  ADD CONSTRAINT `jurnal_header_id_trx_foreign` FOREIGN KEY (`id_trx`) REFERENCES `trx_headers` (`id_trx`);

--
-- Constraints for table `trx_details`
--
ALTER TABLE `trx_details`
  ADD CONSTRAINT `trx_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`kode_barang`);

--
-- Constraints for table `trx_headers`
--
ALTER TABLE `trx_headers`
  ADD CONSTRAINT `trx_headers_kode_pelanggan_foreign` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggans` (`kode_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
