-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 02:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kandidat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `kriteria_id`, `kandidat_id`, `value`, `created_at`, `updated_at`) VALUES
(57, 1, 8, '3.70', '2022-04-22 00:50:03', '2022-04-22 00:50:03'),
(58, 2, 8, '95', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(59, 3, 8, '87', '2022-04-22 00:50:03', '2022-04-28 16:10:29'),
(60, 4, 8, '100', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(61, 5, 8, '95', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(62, 6, 8, '80', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(63, 7, 8, '90', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(64, 8, 8, '85', '2022-04-22 00:50:03', '2022-04-28 16:10:12'),
(65, 1, 9, '2.60', '2022-04-22 00:52:19', '2022-04-22 00:56:18'),
(66, 2, 9, '98', '2022-04-22 00:52:19', '2022-04-28 16:09:08'),
(67, 3, 9, '80', '2022-04-22 00:52:19', '2022-04-28 16:08:58'),
(68, 4, 9, '100', '2022-04-22 00:52:19', '2022-04-25 06:03:08'),
(69, 5, 9, '85', '2022-04-22 00:52:19', '2022-04-28 16:08:58'),
(70, 6, 9, '76', '2022-04-22 00:52:19', '2022-04-28 16:08:58'),
(71, 7, 9, '80', '2022-04-22 00:52:19', '2022-04-25 06:08:29'),
(72, 8, 9, '80', '2022-04-22 00:52:20', '2022-04-28 16:08:58'),
(81, 1, 11, '3.40', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(82, 2, 11, '90', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(83, 3, 11, '80', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(84, 4, 11, '75', '2022-04-24 08:51:41', '2022-04-25 06:02:59'),
(85, 5, 11, '100', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(86, 6, 11, '100', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(87, 7, 11, '75', '2022-04-24 08:51:41', '2022-04-25 06:08:16'),
(88, 8, 11, '90', '2022-04-24 08:51:41', '2022-04-24 08:51:41'),
(89, 1, 12, '3.50', '2022-04-26 19:52:56', '2022-04-26 19:52:56'),
(90, 2, 12, '80', '2022-04-26 19:52:56', '2022-04-26 19:52:56'),
(91, 3, 12, '75', '2022-04-26 19:52:56', '2022-04-26 19:52:56'),
(92, 4, 12, '100', '2022-04-26 19:52:56', '2022-04-26 19:53:10'),
(93, 5, 12, '85', '2022-04-26 19:52:56', '2022-04-26 19:52:56'),
(94, 6, 12, '70', '2022-04-26 19:52:56', '2022-04-26 19:52:56'),
(95, 7, 12, '85', '2022-04-26 19:52:56', '2022-04-26 19:53:10'),
(96, 8, 12, '95', '2022-04-26 19:52:56', '2022-04-26 19:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crips`
--

CREATE TABLE `crips` (
  `id_crips` bigint(20) UNSIGNED NOT NULL,
  `nama_crips` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crips`
--

INSERT INTO `crips` (`id_crips`, `nama_crips`, `created_at`, `updated_at`) VALUES
(1, 'Pengalaman Organisasi', NULL, NULL),
(2, 'Pengalaman Menjabat', NULL, NULL),
(3, 'Kesehatan', NULL, NULL),
(4, 'Komunikasi', NULL, NULL),
(5, 'Problem-Solving', NULL, NULL),
(6, 'Kedisiplinan', NULL, NULL),
(7, 'Visi Misi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crips_detail`
--

CREATE TABLE `crips_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crips_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelompok` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crips_detail`
--

INSERT INTO `crips_detail` (`id`, `crips_id`, `deskripsi`, `kelompok`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kurang', 1, NULL, NULL),
(2, 1, 'Cukup', 2, NULL, NULL),
(3, 1, 'Baik', 3, NULL, NULL),
(4, 1, 'Sangat Baik', 4, NULL, NULL),
(5, 2, 'Anggota', 1, NULL, NULL),
(6, 2, 'Bendahara', 2, NULL, NULL),
(7, 2, 'Sekertaris', 3, NULL, NULL),
(8, 2, 'Ketua/Wakil', 4, NULL, NULL),
(9, 3, 'Kurang', 1, NULL, NULL),
(10, 3, 'Cukup', 2, NULL, NULL),
(11, 3, 'Baik', 3, NULL, NULL),
(12, 3, 'Sangat Baik', 4, NULL, NULL),
(17, 4, 'Kurang', 1, NULL, NULL),
(18, 4, 'Cukup', 2, NULL, NULL),
(19, 4, 'Baik', 3, NULL, NULL),
(20, 4, 'Sangat Baik', 4, NULL, NULL),
(21, 5, 'Kurang', 1, NULL, NULL),
(22, 5, 'Cukup', 2, NULL, NULL),
(23, 5, 'Baik', 3, NULL, NULL),
(24, 5, 'Sangat Baik', 4, NULL, NULL),
(25, 6, 'Kurang', 1, NULL, NULL),
(26, 6, 'Cukup', 2, NULL, NULL),
(27, 6, 'Baik', 3, NULL, NULL),
(28, 6, 'Sangat Baik', 4, NULL, NULL),
(29, 7, 'Kurang', 1, NULL, NULL),
(30, 7, 'Cukup', 2, NULL, NULL),
(31, 7, 'Baik', 3, NULL, NULL),
(32, 7, 'Sangat Baik', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(255) DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `id_user`, `nim`, `nama`, `created_at`, `updated_at`) VALUES
(8, 1, '72180217', 'Yose', '2022-04-22 00:50:02', '2022-04-22 00:50:02'),
(9, 1, '72180218', 'Govinda', '2022-04-22 00:52:19', '2022-04-22 00:55:50'),
(11, 1, '72170126', 'Desta Siwi P', '2022-04-24 08:51:41', '2022-04-24 08:52:12'),
(12, 1, '72180200', 'Lala', '2022-04-26 19:52:56', '2022-04-28 16:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` double(5,2) DEFAULT NULL,
  `crips_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe_data` enum('integer','float','crips') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `satuan`, `bobot`, `crips_id`, `tipe_data`, `created_at`, `updated_at`) VALUES
(1, 'IPK', '-', 20.00, NULL, 'float', NULL, NULL),
(2, 'Keaktifan', '-', 15.00, NULL, 'float', NULL, NULL),
(3, 'Pengalaman Menjabat', '-', 10.00, NULL, 'float', NULL, NULL),
(4, 'Kesehatan', '-', 15.00, NULL, 'float', NULL, NULL),
(5, 'Komunikasi', '-', 10.00, NULL, 'float', NULL, NULL),
(6, 'Problem-Solving', '-', 10.00, NULL, 'float', NULL, NULL),
(7, 'Kedisiplinan', '-', 10.00, NULL, 'float', NULL, NULL),
(8, 'Visi Misi', '-', 10.00, NULL, 'float', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_07_101615_create_skripsi_table', 2);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yose Awanaustus Salawangi', 'awanaustus@gmail.com', NULL, '$2y$10$XsykHdCzb2Po.2yM13ujSeqJHvBpaFLTvmGqtqZEVHsNLOpV3R9vu', NULL, '2022-04-07 03:21:03', '2022-04-07 03:21:03'),
(2, 'Awan', 'admin@gmail.com', NULL, '$2y$10$KSk.cWn6dXCQhHxwQxXCduxyLXXNq2S2iQi1.7hWw7aWeRjYmROEi', NULL, '2022-04-10 12:04:30', '2022-04-10 12:04:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atribut_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `atribut_kandidat_id_foreign` (`kandidat_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crips`
--
ALTER TABLE `crips`
  ADD PRIMARY KEY (`id_crips`);

--
-- Indexes for table `crips_detail`
--
ALTER TABLE `crips_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crips_detail_crips_id_foreign` (`crips_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_crips_id_foreign` (`crips_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut`
--
ALTER TABLE `atribut`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crips`
--
ALTER TABLE `crips`
  MODIFY `id_crips` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crips_detail`
--
ALTER TABLE `crips_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atribut`
--
ALTER TABLE `atribut`
  ADD CONSTRAINT `atribut_kandidat_id_foreign` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atribut_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `crips_detail`
--
ALTER TABLE `crips_detail`
  ADD CONSTRAINT `crips_detail_crips_id_foreign` FOREIGN KEY (`crips_id`) REFERENCES `crips` (`id_crips`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_crips_id_foreign` FOREIGN KEY (`crips_id`) REFERENCES `crips` (`id_crips`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
