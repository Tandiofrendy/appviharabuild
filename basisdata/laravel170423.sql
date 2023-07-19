-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2023 at 04:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_posting` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_absensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdiksas`
--

CREATE TABLE `bookingdiksas` (
  `kode_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_diksa` date NOT NULL,
  `kode_vihara` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `nama_divisi`, `created_at`, `updated_at`) VALUES
('KA-001', 'PEMBUKUAN', '2023-01-10 20:14:21', '2023-01-10 20:14:21'),
('KP-001', 'KEGIATAN', '2023-03-07 00:39:38', '2023-03-07 00:39:38'),
('KPD-01', 'PENDIKSAAN', '2023-03-07 00:40:21', '2023-03-07 00:40:21'),
('KU-001', 'UMAT', '2023-03-07 00:40:37', '2023-03-07 00:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwalkegiatan`
--

CREATE TABLE `jadwalkegiatan` (
  `kode_kegiatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jadwal` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwalkegiatan`
--

INSERT INTO `jadwalkegiatan` (`kode_kegiatan`, `email`, `status_jadwal`, `created_at`, `updated_at`) VALUES
('JW-732023', 'help@piniastudio.com', 1, '2023-03-07 00:53:33', '2023-03-07 20:47:03'),
('JW-832023', 'help@piniastudio.com', 0, '2023-03-07 20:46:11', '2023-03-07 20:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `kategorikegiatans`
--

CREATE TABLE `kategorikegiatans` (
  `kodekategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namakategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorikegiatans`
--

INSERT INTO `kategorikegiatans` (`kodekategori`, `namakategori`, `keterangan`, `created_at`, `updated_at`) VALUES
('AA-001', 'ANAK-ANAK', 'kelas anak-anak', NULL, NULL),
('HR-01', 'HARIAN', 'KELAS TGL 1 DAN 15', '2023-03-07 00:50:51', '2023-03-07 00:50:51'),
('RM-102', 'REMAJA', 'KELAS REMAJA', '2023-03-07 00:49:49', '2023-03-07 00:49:49'),
('SD-01', 'SIDANG DHARMA', 'KHUSUS', '2023-03-07 00:50:27', '2023-03-07 00:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_16_073246_create_kategorikegiatans_table', 1),
(6, '2022_08_17_132354_create_userinformations_table', 1),
(7, '2022_08_18_024949_add_activation_column_to_users', 1),
(8, '2022_08_20_141734_add_jeniskl_to_userinformations', 1),
(9, '2022_08_20_153059_create_divisi_table', 1),
(10, '2022_08_20_153632_create_roleadmin_table', 1),
(11, '2022_08_21_085533_create_vihara_table', 1),
(12, '2022_08_21_100950_create_jadwalkegiatan_table', 1),
(13, '2022_08_21_101459_create_post_jadwalkegiatan_table', 1),
(14, '2022_08_23_060652_create_temp_jadwalkegiatan_table', 1),
(15, '2022_08_23_132150_add_status_jadwal_to_jadwalkegiatan_table', 1),
(16, '2022_08_26_072947_add_deskripsi_to_temp_jadwalkegiatan_table', 1),
(17, '2022_09_09_093525_create_absensi_table', 1),
(18, '2022_09_11_025846_add_tambah_to_absensi', 1),
(19, '2023_02_15_035905_create_bookingdiksas_tables', 2),
(20, '2023_02_15_043120_create_bookingdiksas_tables', 3),
(21, '2023_02_15_043212_create_reservasidiksas_tables', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_jadwalkegiatan`
--

CREATE TABLE `post_jadwalkegiatan` (
  `kode_posting` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodekategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_vihara` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `tglselesai_kegiatan` date NOT NULL,
  `mulai_kegiatan` time NOT NULL,
  `selesai_kegiatan` time NOT NULL,
  `lama_kegiatan` tinyint(1) NOT NULL DEFAULT '0',
  `nama_penceramah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status_posting` tinyint(1) NOT NULL DEFAULT '0',
  `kodeqr` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_jadwalkegiatan`
--

INSERT INTO `post_jadwalkegiatan` (`kode_posting`, `kodekategori`, `kode_vihara`, `email`, `judul_kegiatan`, `tanggal_kegiatan`, `tglselesai_kegiatan`, `mulai_kegiatan`, `selesai_kegiatan`, `lama_kegiatan`, `nama_penceramah`, `keterangan`, `status_posting`, `kodeqr`, `created_at`, `updated_at`) VALUES
('JW-722023-1', 'AA-001', 'CH', 'help@piniastudio.com', 'Kelas HARI IBU', '2023-02-01', '2023-02-03', '09:00:00', '15:00:00', 1, NULL, 'TIDAK ADA', 0, '1NFluNZaJZb8rpCMIqXNzhSiSRnEsu', '2023-02-07 00:50:07', '2023-02-07 00:50:07'),
('JW-722023-2', 'AA-001', 'CH', 'help@piniastudio.com', 'KELAS SIDANG DHARMA', '2023-02-01', '2023-02-02', '10:00:00', '14:00:00', 1, NULL, 'SDFSDF', 0, 'oe0LvrT8Yl0K9RyMzBByyzFAi0SyB8', '2023-03-02 01:06:31', '2023-03-02 01:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservasidiksas`
--

CREATE TABLE `reservasidiksas` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pendiksa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pendiksa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roleadmin`
--

CREATE TABLE `roleadmin` (
  `id` bigint UNSIGNED NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_divisi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roleadmin`
--

INSERT INTO `roleadmin` (`id`, `email_user`, `kode_divisi`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tandio89@gmail.com', 'KA-001', 'Admin', 0, '2023-01-10 20:18:03', '2023-01-10 23:24:16'),
(4, 'help@piniastudio.com', 'KA-001', 'Admin', 1, '2023-01-10 22:35:11', '2023-03-07 00:37:43'),
(5, 'tandio78@gmail.com', 'KA-001', 'Admin', 0, '2023-03-07 00:29:54', '2023-03-07 00:29:54'),
(8, 'fiony@gmail.com', 'KA-001', 'Admin', 0, '2023-03-07 00:37:37', '2023-03-07 00:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `temp_jadwalkegiatan`
--

CREATE TABLE `temp_jadwalkegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_kegiatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodekategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_vihara` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `tglselesai_kegiatan` date DEFAULT NULL,
  `mulai_kegiatan` time NOT NULL,
  `selesai_kegiatan` time NOT NULL,
  `lama_kegiatan` tinyint(1) NOT NULL DEFAULT '0',
  `nama_penceramah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_jadwalkegiatan`
--

INSERT INTO `temp_jadwalkegiatan` (`id`, `kode_kegiatan`, `kodekategori`, `kode_vihara`, `judul_kegiatan`, `tanggal_kegiatan`, `tglselesai_kegiatan`, `mulai_kegiatan`, `selesai_kegiatan`, `lama_kegiatan`, `nama_penceramah`, `keterangan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(3, 'JW-732023', 'HR-01', 'CH', 'KELAS TGL 1', '2023-03-01', '2023-03-01', '18:00:00', '21:00:00', 0, 'AMEN ( HERIANTO )', 'PAKAIAN RAPI', NULL, '2023-03-07 00:53:34', '2023-03-07 00:53:34'),
(4, 'JW-732023', 'AA-001', 'CMM', 'KEGIATAN MENGEMBANGKAN CINTA KASIH', '2023-04-16', '2023-04-17', '08:00:00', '13:00:00', 1, NULL, 'WAJIB MEMBAWA UNDANGAN', NULL, '2023-03-07 00:54:46', '2023-03-07 00:54:46'),
(5, 'JW-732023', 'RM-102', 'CT', 'Kelas HARI IBU', '2023-08-01', '2023-08-03', '08:00:00', '15:00:00', 1, NULL, 'ACARA DIWAJIBKAN TIDUR DIVIHARA', NULL, '2023-03-07 00:55:50', '2023-03-07 00:55:50'),
(6, 'JW-732023', 'RM-102', 'CM', 'KEGIATAN KAMP MUDA MUDI', '2023-11-23', '2023-11-25', '08:30:00', '20:30:00', 1, NULL, 'MEMBAWA PERALATAN YG DI UMUM KAN', NULL, '2023-03-07 00:56:47', '2023-03-07 00:56:47'),
(7, 'JW-832023', 'AA-001', 'CH', 'Kelas HARI IBU', '2023-05-05', '2023-05-05', '08:00:00', '14:00:00', 0, 'CHEN CS (CHEN AI LIAN)', 'TIDAK ADA', NULL, '2023-03-07 20:46:12', '2023-03-07 20:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `userinformations`
--

CREATE TABLE `userinformations` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mandarin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_indonesia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttlahir` date NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinformations`
--

INSERT INTO `userinformations` (`email`, `nama_mandarin`, `nama_indonesia`, `alamat`, `ttlahir`, `nohp`, `created_at`, `updated_at`, `jenis_kelamin`) VALUES
('help@piniastudio.com', 'administrator', 'administrator', 'tidak ada', '2001-01-03', '081273827272', '2023-01-02 20:20:49', '2023-01-02 20:20:49', 'laki-laki'),
('tandio89@gmail.com', 'tandio', 'tandio frendy', 'jl.tidak tau', '2000-01-07', '08125787273', '2023-01-10 20:17:31', '2023-01-10 20:17:31', 'laki-laki'),
('tandio78@gmail.com', 'tandio user', 'user', 'sdfsfdsf', '2001-01-19', '0812312222', '2023-01-10 22:56:35', '2023-01-10 22:56:35', 'laki-laki'),
('fiony@gmail.com', 'Fiony', 'Fiony Natasha', 'JL.tebu', '2001-02-26', '08127232122', '2023-03-07 00:37:03', '2023-03-07 00:37:03', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token_activation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `token_activation`, `isVerified`) VALUES
(1, 'Tasha', 'help@piniastudio.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2023-01-08 21:27:31', '129219', 1),
(14, 'endy', 'tandio89@gmail.com', NULL, '$2y$10$kHi2n0p1ExdjFoxi67bHeucsnTdhi//nW8Nm4y/yi/WbwQRb2gRei', NULL, '2023-01-10 20:16:40', '2023-03-07 00:10:20', '580407', 1),
(15, 'tania', 'tandio78@gmail.com', NULL, '$2y$10$mXvQOtaF3BIhQrKvy1gFJOzjqEQPuYv3Zf2PrgJg3de1aslQ7xW6a', NULL, '2023-01-10 22:55:42', '2023-01-10 22:55:57', '807669', 1),
(16, 'tandio', 'tandio999@gmail.com', NULL, '$2y$10$L4l4Dp1FiYeNMX6DF1/8deTwo5L1l.hLsaxyihlZIl.fxvU1SlK5O', NULL, '2023-02-05 20:59:04', '2023-02-05 20:59:05', '886208', 0),
(17, 'Fiony', 'fiony@gmail.com', NULL, '$2y$10$DhgTALtfDCRBNPss7rno2.Kcp5y3QsVLVidcvIJ.GYOdR00.CwrjO', NULL, '2023-03-07 00:36:02', '2023-03-07 00:36:02', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vihara`
--

CREATE TABLE `vihara` (
  `kode_vihara` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vihara` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vihara`
--

INSERT INTO `vihara` (`kode_vihara`, `nama_vihara`, `alamat`, `created_at`, `updated_at`) VALUES
('CH', 'CHIEN HE', 'JL.SETIA BUDI', '2023-02-07 00:41:13', '2023-02-07 00:41:13'),
('CM', 'CHIEN MING', 'SUNGAI DURI', '2023-03-07 00:43:49', '2023-03-07 00:43:49'),
('CMM', 'CHIEN MU', 'TPI', '2023-03-07 00:44:34', '2023-03-07 00:44:34'),
('CT', 'CHIEN TE', 'SIAGA', '2023-03-07 00:43:59', '2023-03-07 00:43:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_email_foreign` (`email`),
  ADD KEY `absensi_kode_posting_foreign` (`kode_posting`);

--
-- Indexes for table `bookingdiksas`
--
ALTER TABLE `bookingdiksas`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `bookingdiksas_email_foreign` (`email`),
  ADD KEY `bookingdiksas_kode_vihara_foreign` (`kode_vihara`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwalkegiatan`
--
ALTER TABLE `jadwalkegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`),
  ADD KEY `jadwalkegiatan_email_foreign` (`email`);

--
-- Indexes for table `kategorikegiatans`
--
ALTER TABLE `kategorikegiatans`
  ADD PRIMARY KEY (`kodekategori`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post_jadwalkegiatan`
--
ALTER TABLE `post_jadwalkegiatan`
  ADD PRIMARY KEY (`kode_posting`),
  ADD KEY `post_jadwalkegiatan_kodekategori_foreign` (`kodekategori`),
  ADD KEY `post_jadwalkegiatan_kode_vihara_foreign` (`kode_vihara`),
  ADD KEY `post_jadwalkegiatan_email_foreign` (`email`);

--
-- Indexes for table `reservasidiksas`
--
ALTER TABLE `reservasidiksas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservasidiksas_booking_kode_foreign` (`booking_kode`);

--
-- Indexes for table `roleadmin`
--
ALTER TABLE `roleadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleadmin_email_user_foreign` (`email_user`),
  ADD KEY `roleadmin_kode_divisi_foreign` (`kode_divisi`);

--
-- Indexes for table `temp_jadwalkegiatan`
--
ALTER TABLE `temp_jadwalkegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temp_jadwalkegiatan_kode_kegiatan_foreign` (`kode_kegiatan`),
  ADD KEY `temp_jadwalkegiatan_kodekategori_foreign` (`kodekategori`),
  ADD KEY `temp_jadwalkegiatan_kode_vihara_foreign` (`kode_vihara`);

--
-- Indexes for table `userinformations`
--
ALTER TABLE `userinformations`
  ADD KEY `userinformations_email_user_foreign` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vihara`
--
ALTER TABLE `vihara`
  ADD PRIMARY KEY (`kode_vihara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasidiksas`
--
ALTER TABLE `reservasidiksas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roleadmin`
--
ALTER TABLE `roleadmin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_jadwalkegiatan`
--
ALTER TABLE `temp_jadwalkegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `absensi_kode_posting_foreign` FOREIGN KEY (`kode_posting`) REFERENCES `post_jadwalkegiatan` (`kode_posting`);

--
-- Constraints for table `bookingdiksas`
--
ALTER TABLE `bookingdiksas`
  ADD CONSTRAINT `bookingdiksas_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `bookingdiksas_kode_vihara_foreign` FOREIGN KEY (`kode_vihara`) REFERENCES `vihara` (`kode_vihara`);

--
-- Constraints for table `jadwalkegiatan`
--
ALTER TABLE `jadwalkegiatan`
  ADD CONSTRAINT `jadwalkegiatan_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `post_jadwalkegiatan`
--
ALTER TABLE `post_jadwalkegiatan`
  ADD CONSTRAINT `post_jadwalkegiatan_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `post_jadwalkegiatan_kode_vihara_foreign` FOREIGN KEY (`kode_vihara`) REFERENCES `vihara` (`kode_vihara`),
  ADD CONSTRAINT `post_jadwalkegiatan_kodekategori_foreign` FOREIGN KEY (`kodekategori`) REFERENCES `kategorikegiatans` (`kodekategori`);

--
-- Constraints for table `reservasidiksas`
--
ALTER TABLE `reservasidiksas`
  ADD CONSTRAINT `reservasidiksas_booking_kode_foreign` FOREIGN KEY (`booking_kode`) REFERENCES `bookingdiksas` (`kode_booking`);

--
-- Constraints for table `roleadmin`
--
ALTER TABLE `roleadmin`
  ADD CONSTRAINT `roleadmin_email_user_foreign` FOREIGN KEY (`email_user`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `roleadmin_kode_divisi_foreign` FOREIGN KEY (`kode_divisi`) REFERENCES `divisi` (`kode_divisi`);

--
-- Constraints for table `temp_jadwalkegiatan`
--
ALTER TABLE `temp_jadwalkegiatan`
  ADD CONSTRAINT `temp_jadwalkegiatan_kode_kegiatan_foreign` FOREIGN KEY (`kode_kegiatan`) REFERENCES `jadwalkegiatan` (`kode_kegiatan`),
  ADD CONSTRAINT `temp_jadwalkegiatan_kode_vihara_foreign` FOREIGN KEY (`kode_vihara`) REFERENCES `vihara` (`kode_vihara`),
  ADD CONSTRAINT `temp_jadwalkegiatan_kodekategori_foreign` FOREIGN KEY (`kodekategori`) REFERENCES `kategorikegiatans` (`kodekategori`);

--
-- Constraints for table `userinformations`
--
ALTER TABLE `userinformations`
  ADD CONSTRAINT `userinformations_email_user_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
