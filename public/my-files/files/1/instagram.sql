-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2019 at 09:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `profile_pic_url` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `username`, `password`, `created_at`, `updated_at`, `full_name`, `is_private`, `profile_pic_url`, `biography`, `external_url`, `phone_number`, `pk`) VALUES
(1, 1, 'pininja.ir', 'P@ssw0rd', '2019-01-16 20:30:00', '2019-10-19 16:07:02', 'pininja پین اینجا', 0, 'https://instagram.fevn1-3.fna.fbcdn.net/vp/fe59e6376fff50dedf15543a02a6f28c/5E2ED4A6/t51.2885-19/s150x150/67712350_2392733434388333_1376417042751553536_n.jpg?_nc_ht=instagram.fevn1-3.fna.fbcdn.net', '📢 کسب و کارتو رایگان توی سایت و کانال  تلگرام و اینستاگرام معرفی کن و بیا صفحه اول گوگل.\n از طریق ربات یا سایت آگهی کسب و کارتو ثبت کن.\npininja_bot', 'https://l.instagram.com/?u=http%3A%2F%2Fpininja.ir%2F&e=ATMaGtseAQnzizhxjQjAcFQ1dpXftoedwfAHz7mTNCBS4b_MUstBVLoXpooSS17Y8WpPMIOEV4q_vbqz', '+989126145705', 11199822384),
(2, 1, 'morvaridbeauty.ir', 'pp5014397', '2019-04-24 19:30:00', '2019-10-19 16:07:12', 'morvaridbeauty.ir', 0, 'https://instagram.fevn1-3.fna.fbcdn.net/vp/09249cd7b3cda4476dafece28d4e3220/5E5EC81A/t51.2885-19/s150x150/71594249_2470331379703375_34097015218503680_n.jpg?_nc_ht=instagram.fevn1-3.fna.fbcdn.net', 'بهترین و مجهزترین مرکز لیز موهای زاید ویژه بانوان در شهر قدس', 'https://l.instagram.com/?u=http%3A%2F%2Fmorvaridbeauty.ir%2F&e=ATMj0crQhi-5ig53ue1k7ts_c873-7H-LBvvL8AncMH3KctmXhYkPtiC810wug5W07I71Mtf8Dq4qMHbwA', '', 21663687545);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'تصویر', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(2, 'آلبوم', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(3, 'ویدیو', '2019-04-24 19:30:00', '2019-04-24 19:30:00'),
(4, 'لایو', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(5, 'استوری', '2019-04-24 19:30:00', '2019-07-05 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_07_100001_create_accounts_table', 1),
(4, '2019_10_08_104815_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('photo','video','album','live','story') COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `file` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `account_id`, `type`, `caption`, `sent_at`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'photo', 'sdsds', '2019-10-19 17:03:26', '/images/posts/2LiyPaQ0lH_main_image.png', '2019-10-19 17:05:16', '2019-10-19 17:05:16'),
(2, 1, 2, 'photo', 'aefaedef', '2019-10-19 17:12:00', '/images/posts/dubC7hSHio_main_image.png', '2019-10-19 17:12:29', '2019-10-19 17:12:29'),
(3, 1, 2, 'photo', 'feqfe', '2019-10-19 17:12:00', '/images/posts/g9ZqVIWpoq_main_image.png', '2019-10-19 17:13:15', '2019-10-19 17:13:15'),
(4, 1, 1, 'photo', 'sddd', '2019-10-19 17:13:33', '/images/posts/FVU1qPBihc_main_image.png', '2019-10-19 17:13:57', '2019-10-19 17:13:57'),
(5, 1, 2, 'photo', 'sddd', '2019-10-19 17:13:33', '/images/posts/FVU1qPBihc_main_image.png', '2019-10-19 17:13:57', '2019-10-19 17:13:57'),
(6, 1, 1, 'photo', 'dsfdaf', '2019-10-19 17:13:33', '/images/posts/aEijSoRMTS_main_image.png', '2019-10-19 17:23:22', '2019-10-19 17:23:22'),
(7, 1, 1, 'photo', 'eded', '2019-10-19 17:13:33', '/images/posts/3aUr74uyN8_main_image.png', '2019-10-19 17:24:55', '2019-10-19 17:24:55'),
(8, 1, 2, 'photo', 'eded', '2019-10-19 17:13:33', '/images/posts/3aUr74uyN8_main_image.png', '2019-10-19 17:24:55', '2019-10-19 17:24:55'),
(9, 1, 1, 'photo', 'awdwdwwdwdwd', '2019-10-19 17:13:33', '/images/posts/0PlBZNZceQ_main_image.png', '2019-10-19 17:34:27', '2019-10-19 17:34:27'),
(10, 1, 1, 'photo', 'awdwdwwdwdwd', '2019-10-19 17:13:33', '/images/posts/XT1Nzum7TF_main_image.png', '2019-10-19 17:35:01', '2019-10-19 17:35:01'),
(11, 1, 1, 'photo', 'dzfasfasf', '2019-10-19 17:13:33', '/images/posts/GRRJ4l7X8e_main_image.png', '2019-10-19 17:36:12', '2019-10-19 17:36:12'),
(12, 1, 1, 'photo', '4', NULL, '1', '2019-10-19 17:38:16', '2019-10-19 17:38:16'),
(13, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:38:40', '2019-10-19 17:38:40'),
(14, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:38:42', '2019-10-19 17:38:42'),
(15, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:38:54', '2019-10-19 17:38:54'),
(16, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:39:17', '2019-10-19 17:39:17'),
(17, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:40:08', '2019-10-19 17:40:08'),
(18, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:40:42', '2019-10-19 17:40:42'),
(19, 1, 1, 'photo', '4', '2019-10-19 17:38:32', '1', '2019-10-19 17:40:54', '2019-10-19 17:40:54'),
(20, 1, 1, 'photo', 'sdsad', '2019-10-19 17:44:17', '/images/posts/QSRJt2rCVm_main_image.png', '2019-10-19 17:44:36', '2019-10-19 17:44:36'),
(21, 1, 2, 'photo', 'sdsad', '2019-10-19 17:44:17', '/images/posts/QSRJt2rCVm_main_image.png', '2019-10-19 17:44:36', '2019-10-19 17:44:36'),
(22, 1, 1, 'photo', 'sdsdasas', '2019-10-19 17:44:17', 'images/posts/O84teXAguS_main_image.png', '2019-10-19 17:49:34', '2019-10-19 17:49:34'),
(23, 1, 2, 'photo', 'sdsdasas', '2019-10-19 17:44:17', 'images/posts/O84teXAguS_main_image.png', '2019-10-19 17:49:34', '2019-10-19 17:49:34'),
(24, 1, 1, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/xP0MuNDzgT_main_image.png', '2019-10-19 17:52:21', '2019-10-19 17:52:21'),
(25, 1, 2, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/xP0MuNDzgT_main_image.png', '2019-10-19 17:52:21', '2019-10-19 17:52:21'),
(26, 1, 1, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/N3f6jaHM42_main_image.png', '2019-10-19 17:53:07', '2019-10-19 17:53:07'),
(27, 1, 2, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/N3f6jaHM42_main_image.png', '2019-10-19 17:53:07', '2019-10-19 17:53:07'),
(28, 1, 1, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/MgYqxd4QdH_main_image.png', '2019-10-19 17:53:33', '2019-10-19 17:53:33'),
(29, 1, 2, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/MgYqxd4QdH_main_image.png', '2019-10-19 17:53:33', '2019-10-19 17:53:33'),
(30, 1, 1, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/xzMYEeLvAW_main_image.png', '2019-10-19 17:53:45', '2019-10-19 17:53:45'),
(31, 1, 2, 'photo', 'sdsd', '2019-10-19 17:52:06', 'images/posts/xzMYEeLvAW_main_image.png', '2019-10-19 17:53:45', '2019-10-19 17:53:45'),
(32, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/OwVPTUDk3G_main_image.png', '2019-10-19 17:56:47', '2019-10-19 17:56:47'),
(33, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/OwVPTUDk3G_main_image.png', '2019-10-19 17:56:47', '2019-10-19 17:56:47'),
(34, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/QzlTqkMtms_main_image.png', '2019-10-19 17:57:17', '2019-10-19 17:57:17'),
(35, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/QzlTqkMtms_main_image.png', '2019-10-19 17:57:17', '2019-10-19 17:57:17'),
(36, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/CF7KC7WOVH_main_image.png', '2019-10-19 17:57:39', '2019-10-19 17:57:39'),
(37, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/CF7KC7WOVH_main_image.png', '2019-10-19 17:57:39', '2019-10-19 17:57:39'),
(38, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/CScJZXv4Dh_main_image.png', '2019-10-19 17:58:02', '2019-10-19 17:58:02'),
(39, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/CScJZXv4Dh_main_image.png', '2019-10-19 17:58:02', '2019-10-19 17:58:02'),
(40, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/pcIbjmSRVv_main_image.png', '2019-10-19 17:58:14', '2019-10-19 17:58:14'),
(41, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/pcIbjmSRVv_main_image.png', '2019-10-19 17:58:14', '2019-10-19 17:58:14'),
(42, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/EeNzho3Hbf_main_image.png', '2019-10-19 17:58:42', '2019-10-19 17:58:42'),
(43, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', 'images/posts/EeNzho3Hbf_main_image.png', '2019-10-19 17:58:42', '2019-10-19 17:58:42'),
(44, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', '/images/posts/dIeIWrauCM_main_image.png', '2019-10-19 17:59:14', '2019-10-19 17:59:14'),
(45, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', '/images/posts/dIeIWrauCM_main_image.png', '2019-10-19 17:59:14', '2019-10-19 17:59:14'),
(46, 1, 1, 'photo', 'sdsddsd', '2019-10-19 17:52:06', '/images/posts/LfraS24lqM_main_image.png', '2019-10-19 17:59:47', '2019-10-19 17:59:47'),
(47, 1, 2, 'photo', 'sdsddsd', '2019-10-19 17:52:06', '/images/posts/LfraS24lqM_main_image.png', '2019-10-19 17:59:48', '2019-10-19 17:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ali  heidari', 'persian402@gmail.com', NULL, '$2y$10$Z6rDCtYoATCLVcRDKK2abep.EtskLFCTPpzA3gWrQWmEF1y.F.gqW', NULL, '2019-06-03 19:30:00', '2019-03-10 20:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_account_id_foreign` (`account_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
