-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 02:43 PM
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

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id_akun`, `nama_akun`, `saldo_awal`, `saldo_akhir`, `jenis_akun`, `created_at`, `updated_at`) VALUES
('101', 'Kas', 0, 675000, 'Debet', '2022-05-07 06:30:20', '2022-05-07 07:43:17'),
('102', 'Persediaan Barang Dagang', 0, 0, 'Debet', '2022-05-07 06:30:20', '2022-05-07 06:30:20'),
('103', 'piutang usaha', 0, 175000, 'Debet', '2022-05-07 06:30:20', '2022-05-07 06:46:05'),
('400', 'penjualan', 0, 850000, 'Kredit', '2022-05-07 06:30:21', '2022-05-07 07:43:17'),
('402', 'potongan penjualan', 0, 250000, 'Debet', '2022-05-07 06:30:21', '2022-05-07 06:46:05');

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

--
-- Dumping data for table `angsurans`
--

INSERT INTO `angsurans` (`kode_angsuran`, `tanggal_ang`, `id_trx`, `angsuran_ke`, `jml_bayar`, `kurang_bayar`, `created_at`, `updated_at`) VALUES
('ASR-07052022134404', '2022-05-07', 'TRX07052022134249', 2, 175000, 175000, '2022-05-07 06:44:23', '2022-05-07 06:44:23');

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
('BrgKG01', 'Kayu Glugu', 'Lokal', '12m', 8, 50000, '2022-05-07 06:35:49', '2022-05-07 07:42:09');

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
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL,
  `id_jurnal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'JU07052022134211', '101', 375000, 0, '2022-05-07 06:42:11', '2022-05-07 06:42:11'),
(2, 'JU07052022134211', '400', 0, 375000, '2022-05-07 06:42:11', '2022-05-07 06:42:11'),
(3, 'JU07052022134211', '402', 125000, 0, '2022-05-07 06:42:12', '2022-05-07 06:42:12'),
(4, 'JU07052022134327', '101', 200000, 0, '2022-05-07 06:43:27', '2022-05-07 06:43:27'),
(5, 'JU07052022134327', '103', 175000, 0, '2022-05-07 06:43:28', '2022-05-07 06:43:28'),
(6, 'JU07052022134327', '400', 0, 375000, '2022-05-07 06:43:28', '2022-05-07 06:43:28'),
(7, 'JU07052022134327', '402', 125000, 0, '2022-05-07 06:43:28', '2022-05-07 06:43:28'),
(8, 'JU07052022144212', '101', 100000, 0, '2022-05-07 07:42:13', '2022-05-07 07:42:13'),
(9, 'JU07052022144212', '400', 0, 100000, '2022-05-07 07:42:13', '2022-05-07 07:42:13'),
(10, 'JU07052022144212', '402', 0, 0, '2022-05-07 07:42:13', '2022-05-07 07:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_header`
--

CREATE TABLE `jurnal_header` (
  `id_jurnal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('JU07052022134211', '1', '2022-05-07', 'TRX07052022134144', 'Penjualan ', '2022-05-07 06:42:11', '2022-05-07 06:45:55'),
('JU07052022134327', '1', '2022-05-07', 'TRX07052022134249', 'Penjualan Kredit', '2022-05-07 06:43:27', '2022-05-07 06:46:05'),
('JU07052022144212', '1', '2022-05-07', 'TRX07052022144153', 'Penjualan ', '2022-05-07 07:42:12', '2022-05-07 07:43:17');

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
(253, '2014_10_12_000000_create_users_table', 1),
(254, '2014_10_12_100000_create_password_resets_table', 1),
(255, '2017_08_03_055212_create_auto_numbers', 1),
(256, '2019_08_19_000000_create_failed_jobs_table', 1),
(257, '2022_02_26_115242_create_akuns_table', 1),
(258, '2022_02_27_120759_create_barangs_table', 1),
(259, '2022_02_27_140104_create_pelanggans_table', 1),
(260, '2022_03_01_035105_create_trx_headers_table', 1),
(261, '2022_03_01_040702_create_trx_details_table', 1),
(262, '2022_03_04_092204_create_angsurans_table', 1),
(263, '2022_03_26_101135_create_jurnal_detail_table', 1),
(264, '2022_03_28_132333_create_jurnal_header_table', 1);

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
('PLG001', 'Murdiyono', 'Denasri', '081542807765', '2022-05-07 06:36:32', '2022-05-07 06:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `trx_details`
--

CREATE TABLE `trx_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trx` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'TRX07052022134144', 'BrgKG01', 10, 125000, 375000, '2022-05-07 06:42:03', '2022-05-07 06:42:03', NULL),
(2, 'TRX07052022134249', 'BrgKG01', 10, 125000, 375000, '2022-05-07 06:43:07', '2022-05-07 06:43:07', NULL),
(3, 'TRX07052022144153', 'BrgKG01', 2, 0, 100000, '2022-05-07 07:42:05', '2022-05-07 07:42:05', NULL);

--
-- Triggers `trx_details`
--
DELIMITER $$
CREATE TRIGGER `Delete` AFTER DELETE ON `trx_details` FOR EACH ROW BEGIN
  	  Update barangs SET stok = stok  + OLD.qty
  	  WHERE kode_barang = OLD.barang_id;
	END
$$
DELIMITER ;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_headers`
--

INSERT INTO `trx_headers` (`id_trx`, `kode_pelanggan`, `tgl_trx`, `keterangan`, `jenis_transaksi`, `status_trx`, `total_bayar`, `kurang_bayar`, `tgl_jatuhtemp`, `created_at`, `updated_at`, `deleted_at`) VALUES
('TRX07052022134144', NULL, '2022-05-07', NULL, 'Tunai', 'Lunas', 375000, NULL, NULL, '2022-05-07 06:42:11', '2022-05-07 06:42:11', NULL),
('TRX07052022134249', 'PLG001', '2022-05-07', NULL, 'Kredit', 'Lunas', 375000, 0, '2022-06-07', '2022-05-07 06:43:27', '2022-05-07 06:44:23', NULL),
('TRX07052022144153', NULL, '2022-05-07', NULL, 'Tunai', 'Lunas', 100000, NULL, NULL, '2022-05-07 07:42:12', '2022-05-07 07:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$Qcla5/7u0/uYCmyuWmFGt.LS6IBRkARiplk3DgfobhsfGtto/EAPS', 'tkhL7U7fqFSgrkt0xY56QOkKdDEszA1ZxU5zyP5sy2hjf4mgR0t3EATwFiv8', '2022-05-07 06:30:21', '2022-05-07 06:30:21'),
(2, 'Pemilik', 'pemilik', 'pemilik@gmail.com', NULL, '$2y$10$PFJrL5xcUKNzs2o5hb7Nm.DOKcTJTHP1g5L34uZijXtdDVeNiX.Kq', 'aOxTw925lda6AfFDG2D8RGGWVwUMYgVghbnvAnGKJougV1t0P2exFsQ15uSK', '2022-05-07 06:30:22', '2022-05-07 06:30:22');

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
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `trx_details`
--
ALTER TABLE `trx_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
