-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2025 at 02:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Nasional', 'nasional', '2025-05-21 06:29:05', '2025-05-21 06:29:05'),
(2, 'Internasional', 'internasional', '2025-05-21 06:29:05', '2025-05-21 06:29:05'),
(3, 'Olahraga', 'olahraga', '2025-05-21 06:29:05', '2025-05-21 06:29:05'),
(4, 'Teknologi', 'teknologi', '2025-05-21 06:29:05', '2025-05-21 06:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '1',
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `guest_name`, `guest_email`, `is_approved`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'keren bangettt', NULL, NULL, 1, 1, 1, '2025-05-21 06:37:45', '2025-05-21 06:37:45'),
(2, 'keren!!!!', NULL, NULL, 1, 3, 2, '2025-06-01 10:12:16', '2025-06-01 10:12:16');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_05_162217_create_posts_table', 1),
(5, '2025_05_12_172347_create_comments_table', 1),
(6, '2025_05_12_172949_add_guest_info_to_comments_table', 1),
(7, '2025_05_21_130959_create_categories_table', 1),
(8, '2025_05_21_131049_add_category_id_to_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','publish') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `content`, `status`, `thumbnail`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'aaaa', 'aaaaa', '<div>aaaaa<br><br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;peace.jpg&quot;,&quot;filesize&quot;:37326,&quot;height&quot;:736,&quot;href&quot;:&quot;/storage/images/CM04wrKMzts57SCfMzmZkwmBnNPrlVtHdCUQ5Gb9.jpg&quot;,&quot;url&quot;:&quot;/storage/images/CM04wrKMzts57SCfMzmZkwmBnNPrlVtHdCUQ5Gb9.jpg&quot;,&quot;width&quot;:736}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;caption&quot;:&quot;peace&quot;,&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"/storage/images/CM04wrKMzts57SCfMzmZkwmBnNPrlVtHdCUQ5Gb9.jpg\"><img src=\"/storage/images/CM04wrKMzts57SCfMzmZkwmBnNPrlVtHdCUQ5Gb9.jpg\" width=\"736\" height=\"736\"><figcaption class=\"attachment__caption attachment__caption--edited\">peace</figcaption></a></figure></div>', 'publish', '1747834307_e2f2df0d420f1ab5b7c30386f26ac33a.jpg', 1, 1, '2025-05-21 13:30:42', '2025-05-21 06:31:47'),
(2, 'apa kek', 'apa-kek', 'apa kek', '<div>lorem ipsum <br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;ac3a28bbf125b96d79426b6cbc067d08.jpg&quot;,&quot;filesize&quot;:15487,&quot;height&quot;:736,&quot;href&quot;:&quot;/storage/images/Y2Cdyj0Tgn9eRrhppgSAXwxvPuSqcpcXxbagcBKt.jpg&quot;,&quot;url&quot;:&quot;/storage/images/Y2Cdyj0Tgn9eRrhppgSAXwxvPuSqcpcXxbagcBKt.jpg&quot;,&quot;width&quot;:736}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;caption&quot;:&quot;contoh gambar&quot;,&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"/storage/images/Y2Cdyj0Tgn9eRrhppgSAXwxvPuSqcpcXxbagcBKt.jpg\"><img src=\"/storage/images/Y2Cdyj0Tgn9eRrhppgSAXwxvPuSqcpcXxbagcBKt.jpg\" width=\"736\" height=\"736\"><figcaption class=\"attachment__caption attachment__caption--edited\">contoh gambar</figcaption></a></figure></div>', 'publish', '1747834339_2f7d46889252034eb852d95db0bd962c.jpg', 1, 3, '2025-05-21 06:32:19', '2025-05-21 06:32:19'),
(3, 'Komparasi Harga BBM Pertamina, Shell, BP dan Vivo', 'komparasi-harga-bbm-pertamina-shell-bp-dan-vivo', 'Perbandingan harga BBM di Indonesia', '<div>Pertamina kembali melakukan penyesuaian harga bahan bakar minyak (BBM) non subsidi jenis mulai 1 Juni 2025.<br>&nbsp;<br>Dilansir dari laman resmi masing-masing merek pada Minggu (1/4/2025), harga BBM jenis Pertamax, Pertamax Turbo, Pertamax Green 95, Dexlite, dan Pertamina Dex mengalami penurunan harga dengan besaran yang bervariasi.<br>&nbsp;<br>Bukan hanya Pertamina, penurunan harga BBM juga dilakukan oleh Shell, BP, hingga Vivo untuk semua jenis bahan bakarnya.<br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:500,&quot;url&quot;:&quot;https://asset.kompas.com/crops/b7wagzgcL3wUK6-zGDUdYCiGsPo=/0x0:0x0/750x500/data/photo/2025/03/13/67d29ea294b1d.jpeg&quot;,&quot;width&quot;:750}\" data-trix-content-type=\"image\" data-trix-attributes=\"{&quot;caption&quot;:&quot;bbm pertamina&quot;}\" class=\"attachment attachment--preview\"><img src=\"https://asset.kompas.com/crops/b7wagzgcL3wUK6-zGDUdYCiGsPo=/0x0:0x0/750x500/data/photo/2025/03/13/67d29ea294b1d.jpeg\" width=\"750\" height=\"500\"><figcaption class=\"attachment__caption attachment__caption--edited\">bbm pertamina</figcaption></figure>Misalnya saja untuk harga Pertamax yang kini dipasarkan Rp 12.100 per liter, turun dari sebelumnya Rp 12.500 per liter.<br><br>Adapun untuk BBM RON 92 dari Shell, yaitu Shell Super kini dibanderol Rp 12.370 per liter, dari sebelumnya Rp 12.920 per liter. Sementara untuk BP 92 kini dijual dengan harga Rp 12.370 per liter, dari sebelumnya Rp 12.800 per liter. Sedangkan Revvo 92 yang sebelumnya dihargai Rp 12.290 per liter, saat ini ditawarkan dengan harga Rp 12.340 per liter.<br><br>Berikut update harga BBM per 1 Juni 2025 untuk wilayah Jabodetabek: <br><strong>SPBU Pertamina</strong> <br>- Pertamax : Rp 12.100 per liter, dari sebelumnya Rp 12.400 per liter <br>- Pertamax Green 95 : Rp 12.800 per liter, dari sebelumnya Rp 13.150 per liter <br>- Pertamax Turbo : Rp 13.050 per liter, dari sebelumnya Rp 13.300 per liter <br>- Dexlite : Rp 12.740 per liter, dari sebelumnya Rp 13.350 per liter <br>- Pertamina Dex : Rp 13.200 per liter, dari sebelumnya Rp 13.750 per liter <br><strong>SPBU Shell </strong><br>- Shell Super (RON 92): Rp 12.370 per liter, dari sebelumnya Rp 12.920 per liter <br>- Shell V-Power (RON 95): Rp 12.840 per liter, dari sebelumnya Rp 13.379 per liter <br>- Shell V Power Diesel (CN 51): Rp 13.250 per liter, dari sebelumnya Rp 14.060 per liter <br>- Shell V-Power Nitro+ (RON 98): Rp 13.070 per liter, dari sebelumnya Rp 13.550 per liter<br><br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:500,&quot;url&quot;:&quot;https://asset.kompas.com/crops/Fa-zpuAid8qT3ZGvYF-DU0VWQVc=/0x125:1471x1106/750x500/data/photo/2024/04/17/661f6b9e6dc2d.jpg&quot;,&quot;width&quot;:750}\" data-trix-content-type=\"image\" data-trix-attributes=\"{&quot;caption&quot;:&quot;SPBU BP&quot;}\" class=\"attachment attachment--preview\"><img src=\"https://asset.kompas.com/crops/Fa-zpuAid8qT3ZGvYF-DU0VWQVc=/0x125:1471x1106/750x500/data/photo/2024/04/17/661f6b9e6dc2d.jpg\" width=\"750\" height=\"500\"><figcaption class=\"attachment__caption attachment__caption--edited\">SPBU BP</figcaption></figure><br><br><strong>SPBU BP AKR</strong> <br>- BP 92: Rp 12.370 per liter, dari sebelumnya Rp 12.800 per liter <br>- BP Ultimate: Rp 12.840 per liter, dari sebelumnya Rp 13.370 per liter <br>- BP Ultimate Diesel: Rp 13.250 per liter, dari sebelumnya Rp 14.060 per liter <br><strong>Vivo</strong>&nbsp;<br>- Revvo 90: Rp 12.260 per liter, dari sebelumnya Rp 12.800 per liter&nbsp;<br>- Revvo 92: Rp 12.340 per liter, dari sebelumnya Rp 12.290 per liter&nbsp;<br>- Revvo 95: Rp 12.810 per liter, dari sebelumnya Rp 13.370 per liter&nbsp;<br>- Primus Diesel: Rp 13.210 per liter, dari sebelumnya Rp 14.060 per liter<br><br><br><br></div>', 'publish', '1748797784_6331e5410e7f0.jpg', 2, 1, '2025-06-01 10:09:44', '2025-06-01 10:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1i2eaSxAdWJ0kJWc9sYttoMtXxfXQ0Qd1usurlSe', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibEdCcEw4WTloTFFtVHlVSjNJYVYxb2k4dlZ4eHlTT2lxQWhscFpKZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWVzL25hc2lvbmFsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1748797967),
('3imed47cvEJXOrOZ29u5X74InFh2CD5xtK3c3HNu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHYwUHl4NWhtdVBaT0VKaUxFQkVnSGZZcXZyRnI5TVBtbzNTVEdLTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWVzL25hc2lvbmFsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747917744),
('9eovigctdDecL386t77aywO8LKO8ubCzQj5ukGsu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTEVudWZZbk9ncWp5RmJaOTcwZnREdWpuTXBRVG1xdFhNZFIxdm9JSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1747834685),
('UeAwERqNqeYzLUsDodLCBRMDlau07MWsTTeRXZ2O', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTMxcnhOVDdQeFdNcGFhRnVER0w0bERwVDFFRVZqaDNsZHRSS2w5NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749520802);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Satu', 'admin@admin.com', '2025-05-21 06:29:04', '$2y$12$sTn33IdKAt5d8Lq6n0ydXu6961sjwT.M70Yi25FGj3bGT90389HfG', 'kvdTceFkwB', '2025-05-21 06:29:05', '2025-05-21 06:29:05'),
(2, 'Restu', 'restu@gmail.com', NULL, '$2y$12$67WtQFc4FSoPzz4gp9ECX.TmGYUR7xnWw8SCywLtjgKzoXfX6i4Vq', NULL, '2025-06-01 10:01:18', '2025-06-01 10:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
