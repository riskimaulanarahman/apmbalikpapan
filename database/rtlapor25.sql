-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2021 at 11:52 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rtlapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_sendmail`
--

CREATE TABLE `log_sendmail` (
  `id` int(11) NOT NULL,
  `module` varchar(100) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `mailto` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_sendmail`
--

INSERT INTO `log_sendmail` (`id`, `module`, `id_users`, `mailto`, `status`, `created_at`, `updated_at`) VALUES
(280, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-02-21 12:35:17', '2021-02-21 12:35:17'),
(281, 'respon rt', 51, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-02-21 12:39:16', '2021-02-21 12:43:09'),
(282, 'warga lapor', 50, 'elsharionnn@gmail.com', 'success', '2021-02-21 12:41:46', '2021-02-21 12:41:46'),
(283, 'respon rt', 51, 'ikistudios.official@gmail.com', 'success', '2021-02-21 12:43:46', '2021-02-21 12:43:46'),
(284, 'respon rt', 51, 'ikistudios.official@gmail.com', 'Connection could not be established with host smtp.gmail.com :stream_socket_client(): unable to conn', '2021-05-10 06:43:41', '2021-05-10 06:43:41'),
(285, 'respon rt', 51, 'ikistudios.official@gmail.com', 'Connection could not be established with host smtp.gmail.com :stream_socket_client(): unable to conn', '2021-05-10 07:03:35', '2021-05-10 07:03:35'),
(286, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-22 03:32:44', '2021-05-22 03:32:44'),
(287, 'respon rt', 51, 'ikistudios.official@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-22 03:46:03', '2021-05-22 03:46:03'),
(288, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 09:57:44', '2021-05-23 09:57:44'),
(289, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 10:00:59', '2021-05-23 10:00:59'),
(290, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 10:03:00', '2021-05-23 10:03:00'),
(291, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 10:05:14', '2021-05-23 10:05:14'),
(292, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 10:11:00', '2021-05-23 10:11:00'),
(293, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 10:12:27', '2021-05-23 10:12:27'),
(294, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 12:33:27', '2021-05-23 12:33:27'),
(295, 'respon rt', 51, 'ikistudios.official@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 13:50:08', '2021-05-23 13:50:08'),
(296, 'respon rt', 51, 'ikistudios.official@gmail.com', 'Failed to authenticate on SMTP server with username \"riskimaulanarahman@gmail.com\" using 3 possible ', '2021-05-23 13:50:23', '2021-05-23 13:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id` int(11) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(9, '647106', 'Balikpapan Kota', '2021-02-19 09:34:08', '2021-02-20 02:21:52'),
(10, '647104', 'Balikpapan Tengah', '2021-02-19 09:34:28', '2021-02-20 02:21:27'),
(11, '647101', 'Balikpapan Timur', '2021-02-19 09:34:42', '2021-02-20 02:20:36'),
(12, '647102', 'Balikpapan Barat', '2021-02-19 09:34:57', '2021-02-20 02:20:49'),
(13, '647105', 'Balikpapan Selatan', '2021-02-19 09:35:05', '2021-02-20 02:21:43'),
(14, '647103', 'Balikpapan Utara', '2021-02-19 09:36:09', '2021-02-20 02:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelurahan`
--

CREATE TABLE `tbl_kelurahan` (
  `id` int(11) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  `kode_kelurahan` varchar(50) NOT NULL,
  `nama_kelurahan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`id`, `kode_kecamatan`, `kode_kelurahan`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, '647104', '6471041006', 'Sumber Rejo', '2021-02-20 07:41:47', '2021-02-20 07:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `laporan` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id`, `id_users`, `gambar`, `laporan`, `status`, `aksi`, `created_at`, `updated_at`) VALUES
(18, 50, 'warga lapor_1621764742_test.png', 'okeoke', 'dibaca', NULL, '2021-05-23 10:12:22', '2021-05-23 13:50:02'),
(19, 50, 'warga lapor_1621773201_Screen Shot 2021-05-23 at 19.44.18.png', 'mantap', 'dibaca', NULL, '2021-05-23 12:33:21', '2021-05-23 13:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proses`
--

CREATE TABLE `tbl_proses` (
  `id` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rt` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_txt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` int(11) DEFAULT '1',
  `isRT` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `notelp`, `kode_kecamatan`, `kode_kelurahan`, `nomor_rt`, `role`, `password`, `remember_token`, `pass_txt`, `isActive`, `isRT`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '', '', '', 0, 'admin', '$2y$10$S0GdzoB9hPZIE2P0lweZ8epEpiOBzw6ETuqur8Mz1ba.e4w2YXQOm', 'Plx85SHLi5YaUodRmlwEb0JkawSFB39cO9HMQmkOkmvuhZESwepLmk3ewviM', 'admin123', 1, 0, NULL, NULL),
(50, 'warga2', 'warga2', 'ikistudios.official@gmail.com', '08123', '647104', '6471041006', 1, 'warga', '$2y$10$YNHZDYgJR7sjUR6APXUzqews9qBBzvPCFkewSzBJJ.JIGo7Ud78f2', 'HSRxYH5oyFjGbzEMKT0kuhST3isNnwzl6IrU8cdZ8zxq5LXgqTckTSws1Wft', 'warga2', 1, 0, '2021-02-20 14:26:08', '2021-02-20 14:26:08'),
(51, 'sumberrejo_rt1', 'sumberrejo_rt1', 'elsharionnn@gmail.com', '08123', '647104', '6471041006', 1, 'rt', '$2y$10$dXtKlIeUKilCAFJiODSrEOKoM8yrjEvEOEpu9/naHPmlrvwJwkFZm', 'xTz4chb35dBmyTerKvYIsDYx4ctqJY3hKHWNIcuSOhGF8AfLCeYYTDb8iGwM', 'sumberrejo_rt1', 1, 1, '2021-02-20 14:45:30', '2021-02-21 09:11:46'),
(52, 'sumberrejo_rt2', 'sumberrejo_rt2', 'rishnaskr@gmail.com', '08321', '647104', '6471041006', 2, 'rt', '$2y$10$cEPxp09eDYbbB94j3qgN0uqusWtfjGlM34Ci9DEFN0LOLC8ulUpCC', '42sOMcpB7KhajncFK2T8mz25gZYMmvXdI5j4V40YmWFS2L0EnJakA89FpGoK', 'sumberrejo_rt2', 1, 1, '2021-02-21 06:40:49', '2021-02-21 06:59:38'),
(53, 'warga3', 'warga3', 'elsharionnn.official@gmail.com', '084321', '647104', '6471041006', 2, 'warga', '$2y$10$hL0cy/Jaz9Lxc1qeCOR84e/GAKFen6d2mG4oTcJF/tnZKqqz59OAy', 'nYQ8jU7PK0o2RspoOAO2a7t9xJTRXgTBe6MJIrLeGmokBexY9X9Vrr2sVvhW', 'warga3', 1, 0, '2021-02-21 07:18:10', '2021-02-21 07:18:10'),
(54, 'riski', 'riski', 'riski@gmail.com', '08123', '647104', '6471041006', 3, 'warga', '$2y$10$sO6L2VM9hGUrLHp05eeYpejk7a3fyb4LoRdvG9Wv/oYOOR4s1W3SS', 'h25whhQ4tMq51Ji3fl7zw4SIVf4rpRxAvI240LaFOKv0dHTqJSK0tuz2NuiL', 'riski', 1, 0, '2021-05-10 06:07:18', '2021-05-10 06:07:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_sendmail`
--
ALTER TABLE `log_sendmail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191)) USING BTREE;

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_sendmail`
--
ALTER TABLE `log_sendmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
