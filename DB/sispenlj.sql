-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 02:08 AM
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
('101', 'Kas', 0, 1770000, 'Debet', '2022-04-25 10:18:52', '2022-04-30 03:30:45'),
('102', 'Persediaan Barang Dagang', 0, 0, 'Debet', '2022-04-25 10:18:52', '2022-04-25 10:18:52'),
('103', 'piutang usaha', 0, 4200000, 'Debet', '2022-04-25 10:18:52', '2022-04-29 21:46:42'),
('400', 'penjualan', 0, 5820000, 'Kredit', '2022-04-25 10:18:52', '2022-04-30 03:30:45'),
('402', 'potongan penjualan', 0, 0, 'Debet', '2022-04-25 10:18:52', '2022-04-25 10:18:52');

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
('ASR-28042022155811', '2022-04-28', 'TRX25042022175027', 2, 70000, 60000, '2022-04-28 08:58:43', '2022-04-28 08:58:43'),
('ASR-28042022222857', '2022-04-28', 'TRX25042022175027', 3, -10000, 60000, '2022-04-28 15:29:43', '2022-04-28 15:29:43'),
('ASR-28042022223125', '2022-04-28', 'TRX25042022175027', 4, 70000, 70000, '2022-04-28 15:31:59', '2022-04-28 15:31:59');

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
('BrgKG01', 'Kayu Glugu', 'Lokal', '12m', 2, 70000, '2022-04-25 10:46:21', '2022-04-29 22:06:02'),
('BrgKM02', 'Kayu Mahoni', 'Luar', '14m', 13, 100000, '2022-05-01 06:45:28', '2022-05-02 14:45:25'),
('BrgRKS01', 'Reng Kayu Sengon', 'Lokal', '12m', 7, 20000, '2022-04-25 10:47:18', '2022-05-02 14:43:35');

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
(1, 'JU25042022174950', '101', 180000, 0, '2022-04-25 10:49:51', '2022-04-25 10:49:51'),
(2, 'JU25042022174950', '400', 0, 180000, '2022-04-25 10:49:51', '2022-04-25 10:49:51'),
(3, 'JU25042022174950', '101', 180000, 0, '2022-04-25 10:49:51', '2022-04-25 10:49:51'),
(4, 'JU25042022174950', '400', 0, 180000, '2022-04-25 10:49:51', '2022-04-25 10:49:51'),
(5, 'JU25042022175114', '101', 100000, 0, '2022-04-25 10:51:14', '2022-04-25 10:51:14'),
(6, 'JU25042022175114', '103', 60000, 0, '2022-04-25 10:51:14', '2022-04-25 10:51:14'),
(7, 'JU25042022175114', '400', 0, 160000, '2022-04-25 10:51:14', '2022-04-25 10:51:14'),
(8, 'JU26042022230258', '101', 20000, 0, '2022-04-26 16:02:59', '2022-04-26 16:02:59'),
(9, 'JU26042022230258', '400', 0, 20000, '2022-04-26 16:02:59', '2022-04-26 16:02:59'),
(10, 'JU26042022232441', '101', 50000, 0, '2022-04-26 16:24:41', '2022-04-26 16:24:41'),
(11, 'JU26042022232441', '103', 230000, 0, '2022-04-26 16:24:41', '2022-04-26 16:24:41'),
(12, 'JU26042022232441', '400', 0, 280000, '2022-04-26 16:24:42', '2022-04-26 16:24:42'),
(13, 'JU30042022050606', '101', 140000, 0, '2022-04-29 22:06:07', '2022-04-29 22:06:07'),
(14, 'JU30042022050606', '400', 0, 140000, '2022-04-29 22:06:07', '2022-04-29 22:06:07'),
(15, 'JU30042022065536', '101', 40000, 0, '2022-04-29 23:55:36', '2022-04-29 23:55:36'),
(16, 'JU30042022065536', '400', 0, 40000, '2022-04-29 23:55:36', '2022-04-29 23:55:36'),
(17, 'JU30042022065704', '101', 40000, 0, '2022-04-29 23:57:04', '2022-04-29 23:57:04'),
(18, 'JU30042022065704', '400', 0, 40000, '2022-04-29 23:57:04', '2022-04-29 23:57:04'),
(19, 'JU30042022102855', '101', 20000, 0, '2022-04-30 03:28:55', '2022-04-30 03:28:55'),
(20, 'JU30042022102855', '400', 0, 20000, '2022-04-30 03:28:55', '2022-04-30 03:28:55'),
(21, 'JU30042022102932', '101', 20000, 0, '2022-04-30 03:29:32', '2022-04-30 03:29:32'),
(22, 'JU30042022102932', '400', 0, 20000, '2022-04-30 03:29:32', '2022-04-30 03:29:32'),
(23, 'JU01052022000831', '101', 20000, 0, '2022-04-30 17:08:34', '2022-04-30 17:08:34'),
(24, 'JU01052022000831', '400', 0, 20000, '2022-04-30 17:08:34', '2022-04-30 17:08:34'),
(25, 'JU01052022001708', '101', 20000, 0, '2022-04-30 17:17:08', '2022-04-30 17:17:08'),
(26, 'JU01052022001708', '400', 0, 20000, '2022-04-30 17:17:08', '2022-04-30 17:17:08'),
(27, 'JU02052022214341', '101', 20000, 0, '2022-05-02 14:43:41', '2022-05-02 14:43:41'),
(28, 'JU02052022214341', '400', 0, 20000, '2022-05-02 14:43:41', '2022-05-02 14:43:41'),
(29, 'JU02052022214541', '101', 100000, 0, '2022-05-02 14:45:41', '2022-05-02 14:45:41'),
(30, 'JU02052022214541', '103', 200000, 0, '2022-05-02 14:45:41', '2022-05-02 14:45:41'),
(31, 'JU02052022214541', '400', 0, 300000, '2022-05-02 14:45:41', '2022-05-02 14:45:41');

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
('JU01052022000831', '0', '2022-03-01', 'TRX01052022000438', 'Penjualan ', '2022-04-30 17:08:33', '2022-04-30 17:08:33'),
('JU01052022001708', '0', '2022-05-01', 'TRX01052022001630', 'Penjualan ', '2022-04-30 17:17:08', '2022-04-30 17:17:08'),
('JU02052022214341', '0', '2022-05-02', 'TRX02052022214321', 'Penjualan ', '2022-05-02 14:43:41', '2022-05-02 14:43:41'),
('JU02052022214541', '0', '2022-05-02', 'TRX02052022214440', 'Penjualan Kredit', '2022-05-02 14:45:41', '2022-05-02 14:45:41'),
('JU25042022174950', '1', '2022-04-25', 'TRX25042022174920', 'Penjualan ', '2022-04-25 10:49:50', '2022-04-25 11:32:37'),
('JU25042022175114', '1', '2022-04-25', 'TRX25042022175027', 'Penjualan Kredit', '2022-04-25 10:51:14', '2022-04-25 15:20:45'),
('JU26042022230258', '1', '2022-04-26', 'TRX26042022230236', 'Penjualan ', '2022-04-26 16:02:58', '2022-04-28 15:58:03'),
('JU26042022232441', '1', '2022-04-26', 'TRX26042022232355', 'Penjualan Kredit', '2022-04-26 16:24:41', '2022-04-28 16:17:15'),
('JU30042022050606', '1', '2022-04-30', 'TRX30042022050546', 'Penjualan ', '2022-04-29 22:06:06', '2022-04-29 22:07:07'),
('JU30042022065536', '1', '2022-04-30', 'TRX30042022065513', 'Penjualan ', '2022-04-29 23:55:36', '2022-04-29 23:58:19'),
('JU30042022065704', '1', '2022-04-30', 'TRX30042022065609', 'Penjualan ', '2022-04-29 23:57:04', '2022-04-30 03:28:15'),
('JU30042022102855', '1', '2022-04-30', 'TRX30042022102834', 'Penjualan ', '2022-04-30 03:28:55', '2022-04-30 03:30:45'),
('JU30042022102932', '0', '2022-04-30', 'TRX30042022102910', 'Penjualan ', '2022-04-30 03:29:32', '2022-04-30 03:29:32');

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
(121, '2014_10_12_000000_create_users_table', 1),
(122, '2014_10_12_100000_create_password_resets_table', 1),
(123, '2017_08_03_055212_create_auto_numbers', 1),
(124, '2019_08_19_000000_create_failed_jobs_table', 1),
(125, '2022_02_26_115242_create_akuns_table', 1),
(126, '2022_02_27_120759_create_barangs_table', 1),
(127, '2022_02_27_140104_create_pelanggans_table', 1),
(128, '2022_03_01_035105_create_trx_headers_table', 1),
(129, '2022_03_01_040702_create_trx_details_table', 1),
(130, '2022_03_04_092204_create_angsurans_table', 1),
(131, '2022_03_26_101135_create_jurnal_detail_table', 1),
(132, '2022_03_28_132333_create_jurnal_header_table', 1);

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
('PLG001', 'Murdiyono', 'Perumperuri', '081542807769', '2022-04-25 10:48:09', '2022-04-25 10:49:03'),
('PLG002', 'Dimas', 'Denasri', '081542807765', '2022-04-25 10:48:41', '2022-04-25 10:48:41');

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
(1, 'TRX25042022174920', 'BrgKG01', 2, 0, 140000, '2022-04-25 10:49:33', '2022-04-25 10:49:33'),
(2, 'TRX25042022174920', 'BrgRKS01', 2, 0, 40000, '2022-04-25 10:49:41', '2022-04-25 10:49:41'),
(3, 'TRX25042022175027', 'BrgKG01', 2, 0, 140000, '2022-04-25 10:50:45', '2022-04-25 10:50:45'),
(4, 'TRX25042022175027', 'BrgRKS01', 1, 0, 20000, '2022-04-25 10:50:57', '2022-04-25 10:50:57'),
(5, 'TRX26042022230236', 'BrgRKS01', 1, 0, 20000, '2022-04-26 16:02:51', '2022-04-26 16:02:51'),
(6, 'TRX26042022232355', 'BrgKG01', 4, 0, 280000, '2022-04-26 16:24:19', '2022-04-26 16:24:19'),
(9, 'TRX30042022050546', 'BrgKG01', 2, 0, 140000, '2022-04-29 22:05:59', '2022-04-29 22:05:59'),
(10, 'TRX30042022065513', 'BrgRKS01', 2, 0, 40000, '2022-04-29 23:55:29', '2022-04-29 23:55:29'),
(12, 'TRX30042022065609', 'BrgRKS01', 2, 0, 40000, '2022-04-29 23:56:54', '2022-04-29 23:56:54'),
(13, 'TRX30042022102834', 'BrgRKS01', 1, 0, 20000, '2022-04-30 03:28:48', '2022-04-30 03:28:48'),
(14, 'TRX30042022102910', 'BrgRKS01', 1, 0, 20000, '2022-04-30 03:29:26', '2022-04-30 03:29:26'),
(15, 'TRX01052022000438', 'BrgRKS01', 1, 0, 20000, '2022-04-30 17:08:21', '2022-04-30 17:08:21'),
(16, 'TRX01052022001630', 'BrgRKS01', 1, 0, 20000, '2022-04-30 17:16:57', '2022-04-30 17:16:57'),
(19, 'TRX01052022141649', 'BrgKG01', 5, 0, 350000, '2022-05-01 07:17:12', '2022-05-01 07:17:12'),
(20, 'TRX02052022214321', 'BrgRKS01', 1, 0, 20000, '2022-05-02 14:43:34', '2022-05-02 14:43:34'),
(22, 'TRX02052022214440', 'BrgKM02', 3, 0, 300000, '2022-05-02 14:45:23', '2022-05-02 14:45:23');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_headers`
--

INSERT INTO `trx_headers` (`id_trx`, `kode_pelanggan`, `tgl_trx`, `keterangan`, `jenis_transaksi`, `status_trx`, `total_bayar`, `kurang_bayar`, `tgl_jatuhtemp`, `created_at`, `updated_at`) VALUES
('TRX01052022000438', NULL, '2022-03-01', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-04-30 17:08:32', '2022-04-30 17:08:32'),
('TRX01052022001630', NULL, '2022-05-01', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-04-30 17:17:08', '2022-04-30 17:17:08'),
('TRX02052022214321', NULL, '2022-05-02', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-05-02 14:43:41', '2022-05-02 14:43:41'),
('TRX02052022214440', 'PLG002', '2022-05-02', NULL, 'Kredit', 'Belum Lunas', 300000, 200000, '2022-06-02', '2022-05-02 14:45:41', '2022-05-02 14:45:41'),
('TRX25042022174920', NULL, '2022-04-25', NULL, 'Tunai', 'Lunas', 180000, NULL, NULL, '2022-04-25 10:49:50', '2022-04-25 10:49:50'),
('TRX25042022175027', 'PLG001', '2022-04-25', NULL, 'Kredit', 'Lunas', 160000, 0, '2022-05-25', '2022-04-25 10:51:14', '2022-04-28 15:31:59'),
('TRX26042022230236', NULL, '2022-04-26', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-04-26 16:02:58', '2022-04-26 16:02:58'),
('TRX26042022232355', 'PLG002', '2022-04-26', NULL, 'Kredit', 'Belum Lunas', 280000, 230000, '2022-05-26', '2022-04-26 16:24:41', '2022-04-26 16:24:41'),
('TRX30042022050546', NULL, '2022-04-30', NULL, 'Tunai', 'Lunas', 140000, NULL, NULL, '2022-04-29 22:06:06', '2022-04-29 22:06:06'),
('TRX30042022065513', NULL, '2022-04-30', NULL, 'Tunai', 'Lunas', 40000, NULL, NULL, '2022-04-29 23:55:36', '2022-04-29 23:55:36'),
('TRX30042022065609', NULL, '2022-04-30', NULL, 'Tunai', 'Lunas', 40000, NULL, NULL, '2022-04-29 23:57:04', '2022-04-29 23:57:04'),
('TRX30042022102834', NULL, '2022-04-30', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-04-30 03:28:55', '2022-04-30 03:28:55'),
('TRX30042022102910', NULL, '2022-04-30', NULL, 'Tunai', 'Lunas', 20000, NULL, NULL, '2022-04-30 03:29:32', '2022-04-30 03:29:32');

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
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$F4TQGIswyq/MikFVgO.Tg.LBQFkG5.BAeLEzzI4Z48sv4gaIVCFqq', 'cMKN4wp686c6Jv4zRfBD4Tq0yO2ZfEKwxTwgY4H7uOzEsYxVd7FDBxrkKNK2', '2022-04-25 10:18:53', '2022-04-25 10:18:53'),
(2, 'Pemilik', 'pemilik', 'pemilik@gmail.com', NULL, '$2y$10$gGUptIMS0eXQCn7Sv3tldezCQhdy.YvjTN//q/M6C9QEN1t8myVQe', 'CxwRFP8CBTUAlPuhnARLQgQ3B3eDA5XHzhbSHSFNc5kldET7tlLSJv8NbJLN', '2022-04-25 10:18:53', '2022-04-25 10:18:53'),
(3, 'Admin', 'admin', 'admin@admin.com', NULL, '$2y$10$xLs5OPWWiLJVGYyJF6PZhupwYe1E7xl7rX45YwMAAi5XEat26IyxC', 'BWjUINvOT4mNetVVXf9T5BytRU9GDsZU426g6SB0ufI5x3LmbflIL8g9nXwk', '2022-04-25 10:38:00', '2022-04-25 10:38:00');

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
  MODIFY `id_jurnal_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `trx_details`
--
ALTER TABLE `trx_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
