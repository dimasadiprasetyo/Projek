-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 04:31 PM
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
  `id_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` bigint(20) DEFAULT NULL,
  `saldo_akhir` bigint(20) DEFAULT NULL,
  `jenis_akun` enum('Debet','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `angsurans`
--

CREATE TABLE `angsurans` (
  `kode_angsuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ang` date NOT NULL,
  `id_trx` bigint(20) UNSIGNED NOT NULL,
  `angsuran_ke` bigint(20) NOT NULL,
  `jml_bayar` bigint(20) NOT NULL,
  `kurang_bayar` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('BrgKG01', 'Kayu Glugu', 'Lokal', '12m', 15, 50000, '2022-03-16 15:25:23', '2022-03-16 15:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lappens`
--

CREATE TABLE `lappens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2017_08_03_055212_create_auto_numbers', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2022_02_26_115242_create_akuns_table', 1),
(28, '2022_02_27_120759_create_barangs_table', 1),
(29, '2022_02_27_140104_create_pelanggans_table', 1),
(30, '2022_03_01_035105_create_trx_headers_table', 1),
(31, '2022_03_01_040702_create_trx_details_table', 1),
(32, '2022_03_04_092204_create_angsurans_table', 1),
(33, '2022_03_04_102020_create_lappens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `kode_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('PLG-001', 'Dimas Adi', 'Tirto', '089', '2022-03-17 01:24:24', '2022-03-17 01:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `trx_details`
--

CREATE TABLE `trx_details` (
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

INSERT INTO `trx_details` (`id_trx`, `barang_id`, `qty`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
('TRX17032022075746', 'BrgKG01', 8, 0, 400000, '2022-03-17 00:58:17', '2022-03-17 00:58:17'),
('TRX17032022080032', 'BrgKG01', 4, 0, 200000, '2022-03-17 01:01:24', '2022-03-17 01:01:24'),
('TRX17032022080140', 'BrgKG01', 5, 0, 250000, '2022-03-17 01:03:49', '2022-03-17 01:03:49'),
('TRX17032022082608', 'BrgKG01', 3, 0, 150000, '2022-03-17 01:26:30', '2022-03-17 01:26:30'),
('TRX17032022082942', 'BrgKG01', 1, 0, 50000, '2022-03-17 01:30:31', '2022-03-17 01:30:31'),
('TRX17032022162232', 'BrgKG01', 3, 0, 150000, '2022-03-17 09:23:00', '2022-03-17 09:23:00'),
('TRX17032022165003', 'BrgKG01', 4, 0, 200000, '2022-03-17 09:50:34', '2022-03-17 09:50:34'),
('TRX17032022220101', 'BrgKG01', 4, 0, 200000, '2022-03-17 15:01:26', '2022-03-17 15:01:26'),
('TRX17032022220135', 'BrgKG01', 4, 0, 200000, '2022-03-17 15:03:02', '2022-03-17 15:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `trx_headers`
--

CREATE TABLE `trx_headers` (
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_trx` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_transaksi` enum('Tunai','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_trx` enum('Belum Lunas','Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `kurang_bayar` bigint(20) DEFAULT NULL,
  `tgl_jatuhtemp` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_headers`
--

INSERT INTO `trx_headers` (`id_trx`, `kode_pelanggan`, `tgl_trx`, `keterangan`, `jenis_transaksi`, `status_trx`, `total_bayar`, `kurang_bayar`, `tgl_jatuhtemp`, `created_at`, `updated_at`) VALUES
('TRX16032022231157', NULL, '2022-03-16', NULL, 'Tunai', 'Lunas', NULL, NULL, NULL, '2022-03-16 17:08:52', '2022-03-16 17:08:52'),
('TRX17032022080032', NULL, '2022-03-17', NULL, 'Tunai', 'Lunas', NULL, NULL, NULL, '2022-03-17 01:01:40', '2022-03-17 01:01:40'),
('TRX17032022080140', NULL, '2022-03-17', NULL, 'Tunai', 'Lunas', NULL, NULL, NULL, '2022-03-17 01:03:55', '2022-03-17 01:03:55'),
('TRX17032022220101', 'PLG-001', '2022-03-17', NULL, 'Kredit', 'Belum Lunas', NULL, NULL, '2022-03-17', '2022-03-17 15:01:35', '2022-03-17 15:01:35'),
('TRX17032022220135', 'PLG-001', '2022-03-17', NULL, 'Kredit', 'Belum Lunas', NULL, NULL, '2022-03-17', '2022-03-17 15:03:09', '2022-03-17 15:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lappens`
--
ALTER TABLE `lappens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `trx_details`
--
ALTER TABLE `trx_details`
  ADD PRIMARY KEY (`id_trx`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lappens`
--
ALTER TABLE `lappens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trx_headers`
--
ALTER TABLE `trx_headers`
  ADD CONSTRAINT `trx_headers_kode_pelanggan_foreign` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggans` (`kode_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
