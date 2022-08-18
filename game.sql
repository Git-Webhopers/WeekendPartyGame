-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2022 at 09:20 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

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
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint UNSIGNED NOT NULL,
  `looser_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('To Be Started','Being Played','Game Over','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'To Be Started',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `looser_id`, `status`, `created_at`, `updated_at`) VALUES
(16, NULL, 'To Be Started', '2022-08-02 12:35:17', '2022-08-02 12:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `game_user`
--

CREATE TABLE `game_user` (
  `id` bigint UNSIGNED NOT NULL,
  `game_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `flipped_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_user`
--

INSERT INTO `game_user` (`id`, `game_id`, `user_id`, `flipped_id`, `created_at`, `updated_at`) VALUES
(11, 16, 9, 9, NULL, NULL),
(12, 16, 12, 13, NULL, NULL),
(13, 16, 13, 9, NULL, NULL),
(14, 16, 11, 11, NULL, NULL);

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
(5, '2022_07_27_161421_create_games_table', 2),
(6, '2022_07_27_162543_create_game_user_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Admin','Player') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Player',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `role`, `avatar`, `bio`, `password`, `last_seen_at`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(8, 'Admin', 'admin@gmail.com', NULL, 'Admin', NULL, NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-08-03 11:29:32', 'gAdfU3pFaPBx7LtjmGggq9wIYDbxWtshAki56bvPfYf4FFRKndAKdfDp7gVW', NULL, '2022-07-26 11:43:13', '2022-08-03 11:29:32'),
(9, 'Lalit Kumar', 'lalitkumar9557758955@gmail.com', '9876541450', 'Player', '//avatars/img-20211105-184722jpg_1658855671.jpg', NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-08-03 11:26:04', 'f1NaaRJitidgPAJBP30qGxCAHTZlACoqRhqeedcikPY2h2VkMz7Eav1iODLd', NULL, '2022-07-26 11:44:31', '2022-08-03 11:26:04'),
(10, 'Mukesh Sharma', 'mukesh@sharma.com', '9876541450', 'Player', '//avatars/5jpeg_1658855755.jpg', NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-07-27 12:57:25', NULL, NULL, '2022-07-26 11:45:55', '2022-07-27 12:57:25'),
(11, 'Shivam Kumar', 'shivam@kumar.com', '9876543210', 'Player', '//avatars/4png_1658855813.jpg', NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-08-03 11:25:51', NULL, NULL, '2022-07-26 11:46:53', '2022-08-03 11:25:51'),
(12, 'Mukta Saini', 'mukta@saini.com', '9876541450', 'Player', '//avatars/3jpeg_1658855854.jpg', NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-08-18 10:20:14', NULL, NULL, '2022-07-26 11:47:34', '2022-08-18 10:20:14'),
(13, 'Neha Sharma', 'neha@sharma.com', '9876541450', 'Player', '//avatars/1jpeg_1658855894.jpg', NULL, '$2y$10$Iowuj.rJcn2xfZCZ05ESheF1lwVAabMdnB3YWVzYLREQVyGSpc8SK', '2022-08-03 11:24:03', NULL, NULL, '2022-07-26 11:48:14', '2022-08-03 11:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_looser_id_foreign` (`looser_id`);

--
-- Indexes for table `game_user`
--
ALTER TABLE `game_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_user_game_id_foreign` (`game_id`),
  ADD KEY `game_user_user_id_foreign` (`user_id`),
  ADD KEY `game_user_flipped_id_foreign` (`flipped_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `game_user`
--
ALTER TABLE `game_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_looser_id_foreign` FOREIGN KEY (`looser_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `game_user`
--
ALTER TABLE `game_user`
  ADD CONSTRAINT `game_user_flipped_id_foreign` FOREIGN KEY (`flipped_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `game_user_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `game_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
