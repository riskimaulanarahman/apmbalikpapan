-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rtlapor.log_sendmail
CREATE TABLE IF NOT EXISTS `log_sendmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `mailto` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=latin1;

-- Dumping data for table rtlapor.log_sendmail: ~4 rows (approximately)
/*!40000 ALTER TABLE `log_sendmail` DISABLE KEYS */;
INSERT INTO `log_sendmail` (`id`, `module`, `id_users`, `mailto`, `status`, `created_at`, `updated_at`) VALUES
	(280, 'warga lapor', 50, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username "riskimaulanarahman@gmail.com" using 3 possible ', '2021-02-21 20:35:17', '2021-02-21 20:35:17'),
	(281, 'respon rt', 51, 'elsharionnn@gmail.com', 'Failed to authenticate on SMTP server with username "riskimaulanarahman@gmail.com" using 3 possible ', '2021-02-21 20:39:16', '2021-02-21 20:43:09'),
	(282, 'warga lapor', 50, 'elsharionnn@gmail.com', 'success', '2021-02-21 20:41:46', '2021-02-21 20:41:46'),
	(283, 'respon rt', 51, 'ikistudios.official@gmail.com', 'success', '2021-02-21 20:43:46', '2021-02-21 20:43:46');
/*!40000 ALTER TABLE `log_sendmail` ENABLE KEYS */;

-- Dumping structure for table rtlapor.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table rtlapor.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table rtlapor.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table rtlapor.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table rtlapor.tbl_kecamatan
CREATE TABLE IF NOT EXISTS `tbl_kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(50) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table rtlapor.tbl_kecamatan: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_kecamatan` DISABLE KEYS */;
INSERT INTO `tbl_kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
	(9, '647106', 'Balikpapan Kota', '2021-02-19 17:34:08', '2021-02-20 10:21:52'),
	(10, '647104', 'Balikpapan Tengah', '2021-02-19 17:34:28', '2021-02-20 10:21:27'),
	(11, '647101', 'Balikpapan Timur', '2021-02-19 17:34:42', '2021-02-20 10:20:36'),
	(12, '647102', 'Balikpapan Barat', '2021-02-19 17:34:57', '2021-02-20 10:20:49'),
	(13, '647105', 'Balikpapan Selatan', '2021-02-19 17:35:05', '2021-02-20 10:21:43'),
	(14, '647103', 'Balikpapan Utara', '2021-02-19 17:36:09', '2021-02-20 10:21:11');
/*!40000 ALTER TABLE `tbl_kecamatan` ENABLE KEYS */;

-- Dumping structure for table rtlapor.tbl_kelurahan
CREATE TABLE IF NOT EXISTS `tbl_kelurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(50) NOT NULL,
  `kode_kelurahan` varchar(50) NOT NULL,
  `nama_kelurahan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rtlapor.tbl_kelurahan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_kelurahan` DISABLE KEYS */;
INSERT INTO `tbl_kelurahan` (`id`, `kode_kecamatan`, `kode_kelurahan`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
	(1, '647104', '6471041006', 'Sumber Rejo', '2021-02-20 15:41:47', '2021-02-20 15:41:47');
/*!40000 ALTER TABLE `tbl_kelurahan` ENABLE KEYS */;

-- Dumping structure for table rtlapor.tbl_laporan
CREATE TABLE IF NOT EXISTS `tbl_laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rtlapor.tbl_laporan: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_laporan` DISABLE KEYS */;
INSERT INTO `tbl_laporan` (`id`, `id_users`, `laporan`, `status`, `created_at`, `updated_at`) VALUES
	(3, 50, 'test', 'dibaca', '2021-02-21 10:04:01', '2021-02-21 16:48:44'),
	(8, 50, 'pak rt saya ingin melapor  kalau tagihan listrik saya belum dibayar', 'dibaca', '2021-02-21 20:27:22', '2021-02-21 20:39:13'),
	(9, 50, 'pak rt saya ingin melapor  kalau tagihan listrik saya belum dibayar', 'dibaca', '2021-02-21 20:31:14', '2021-02-21 20:43:43'),
	(10, 50, 'pak rt saya ingin melapor  kalau tagihan listrik saya belum dibayar', 'menunggu', '2021-02-21 20:35:14', '2021-02-21 20:35:14'),
	(11, 50, 'pak, parit yang di gang merpati mampet karna tumpukan sampah', 'menunggu', '2021-02-21 20:41:44', '2021-02-21 20:41:44');
/*!40000 ALTER TABLE `tbl_laporan` ENABLE KEYS */;

-- Dumping structure for table rtlapor.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `isActive` int(11) DEFAULT 1,
  `isRT` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_users`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table rtlapor.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `notelp`, `kode_kecamatan`, `kode_kelurahan`, `nomor_rt`, `role`, `password`, `remember_token`, `pass_txt`, `isActive`, `isRT`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', 'admin@gmail.com', '', '', '', 0, 'admin', '$2y$10$S0GdzoB9hPZIE2P0lweZ8epEpiOBzw6ETuqur8Mz1ba.e4w2YXQOm', 'Hcc6oVMEhE6zFRJPe99KZr7ufhXSPL3hFzyspumTsnSSZoBfxUKg5Z55Kae3', 'admin123', 1, 0, NULL, NULL),
	(50, 'warga2', 'warga2', 'ikistudios.official@gmail.com', '08123', '647104', '6471041006', 1, 'warga', '$2y$10$YNHZDYgJR7sjUR6APXUzqews9qBBzvPCFkewSzBJJ.JIGo7Ud78f2', 'GNlykv0zXANwzZ4XHOHFr3c4olh0IBLXgj81tzQchHotU626j5mSNsQGIPbE', 'warga2', 1, 0, '2021-02-20 22:26:08', '2021-02-20 22:26:08'),
	(51, 'sumberrejo_rt1', 'sumberrejo_rt1', 'elsharionnn@gmail.com', '08123', '647104', '6471041006', 1, 'rt', '$2y$10$dXtKlIeUKilCAFJiODSrEOKoM8yrjEvEOEpu9/naHPmlrvwJwkFZm', 'MKTRIsKcEYvgEJyB3ehJU2S4l2LfgV4N5vLW2liv8Q6OZ1EEdZJC95WmPQWs', 'sumberrejo_rt1', 1, 1, '2021-02-20 22:45:30', '2021-02-21 17:11:46'),
	(52, 'sumberrejo_rt2', 'sumberrejo_rt2', 'rishnaskr@gmail.com', '08321', '647104', '6471041006', 2, 'rt', '$2y$10$cEPxp09eDYbbB94j3qgN0uqusWtfjGlM34Ci9DEFN0LOLC8ulUpCC', 'ESo15sl8uBEtWnZSFoy8YiT9JkIuLlKjeTHeQYQv5FgTl4qxtulCf411sWtn', 'sumberrejo_rt2', 1, 1, '2021-02-21 14:40:49', '2021-02-21 14:59:38'),
	(53, 'warga3', 'warga3', 'elsharionnn.official@gmail.com', '084321', '647104', '6471041006', 2, 'warga', '$2y$10$hL0cy/Jaz9Lxc1qeCOR84e/GAKFen6d2mG4oTcJF/tnZKqqz59OAy', 'nYQ8jU7PK0o2RspoOAO2a7t9xJTRXgTBe6MJIrLeGmokBexY9X9Vrr2sVvhW', 'warga3', 1, 0, '2021-02-21 15:18:10', '2021-02-21 15:18:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
