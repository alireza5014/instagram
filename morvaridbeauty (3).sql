-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 04:22 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morvaridbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'خدمات', 'خدمات', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(2, 'بلاگ', 'بلاگ', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(3, 'تجهیزات', 'تجهیزات', '2019-04-24 19:30:00', '2019-04-24 19:30:00'),
(4, 'about_us', 'about_us', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(5, 'contact_us', 'about_us', '2019-04-24 19:30:00', '2019-07-05 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) NOT NULL DEFAULT '0',
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `like` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `post_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 'keywords', 'sg ffg hjg', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(2, 3, 'description', 'asfasf چگونه-می-توان-بهره-وری-را-افزایش-داد4', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(3, 13, 'description', 'description', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(4, 13, 'keywords', 'contact us', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(5, 12, 'description', 'description', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(6, 12, 'keywords', 'contact us', '2019-04-24 19:30:00', '2019-07-05 19:30:00');

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
(3, '2019_10_08_102721_create_categories_table', 1),
(4, '2019_10_08_104815_create_posts_table', 1),
(5, '2019_10_08_104827_create_comments_table', 1),
(6, '2019_10_08_104839_create_likes_table', 1),
(7, '2019_10_08_104851_create_tags_table', 1),
(8, '2019_10_08_110117_create_metas_table', 1),
(9, '2019_10_08_111736_create_sliders_table', 1),
(10, '2019_10_08_112000_create_tariffes_table', 1),
(11, '2019_10_08_112102_create_contacts_table', 1);

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `slug`, `title`, `image_path`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'چگونه-می-توان-بهره-وری-را-افزایش-داد', 'چگونه می توان بهره وری را افزایش داد؟', '/images/post/01.jpg', 'لیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.\r\n\r\nلیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(2, 1, 2, 'چگونه-می-توان-بهره-وری-را-افزایش-داد2', '12چگونه می توان بهره وری را افزایش داد؟1', '/images/post/02.jpg', 'لیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.\r\n\r\nلیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است. ب', '2019-10-01 20:30:00', '2019-10-09 20:30:00'),
(3, 1, 2, 'چگونه-می-توان-بهره-وری-را-افزایش-داد4', '5می توان بهره وری را افزایش داد؟1', '/images/post/03.jpg', 'بثیلیسل لیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.\r\n\r\nلیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.', '2019-10-01 20:30:00', '2019-10-01 20:30:00'),
(4, 1, 3, 'دستگاه-لیز-موهای-زاید-دایود', 'دستگاه لیز موهای زاید دایود', '/images/devices/001.jpg', 'adfasd', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(5, 1, 3, 'دستگاه-لیز-موهای-زاید-E-LIGHT SHR', 'دستگاه لیز موهای زاید E-LIGHT SHR', '/images/devices/002.jpg', 'asd', '2019-04-24 19:30:00', '2019-07-30 19:30:00'),
(6, 1, 1, 'لیزر-موهای-زاید', 'لیزر موهای زاید', '/images/devices/002.jpg', 'as', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(7, 1, 1, 'هاشور-ابرو-و-آرایش-دایم-صورت', 'هاشور ابرو و آرایش دایم صورت', '/images/devices/002.jpg', 'as', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(8, 1, 1, 'پاکسازی-پوست', 'پاکسازی پوست', '/images/devices/002.jpg', '', '2019-10-09 20:30:00', '2019-10-08 20:30:00'),
(9, 1, 1, 'کربوکسی-تراپی', 'کربوکسی تراپی', '/images/devices/002.jpg', '', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(10, 1, 1, 'تزریق-ژل-و-بوتاکس', 'تزریق ژل و بوتاکس', '/images/devices/002.jpg', '', '2019-10-09 20:30:00', '2019-10-08 20:30:00'),
(11, 1, 1, 'میکرونیدلینگ', 'میکرونیدلینگ', '/images/devices/002.jpg', '', '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(12, 1, 4, 'درباره-کلینیک-مروارید', 'درباره کلینیک مروارید', '/images/about.jpg', 'لیزر رفع موهای زائد دستگاهی است که فرایند از بین بردن مو‌های ناخواسته یا موهای زائد را با استفاده از قرار گرفتن در معرض پالس لیزر نور انجام می‌دهد و منجر به از بین بردن فولیکول مو و عدم رشد مجدد مو می‌شود. امروزه ليزرها براي درمان و همچنين براي زيبايي چهره و بدن استفاده مي‌شوند. كلينيك ليزر مروارید در سال ۱۳92 تأسيس‌شده است كه تحت نظر پزشکان مجرب اقدام به لیزرموهای زاید نواحی مختلف بدن و صورت می نماید هم چنین با انجام دیگر کارهای متنوع به مشكلات زيبايي مي‌پردازد. وجه تمايز كلينيك ليزر مروارید با دیگر کلینیک های موجود در این منطقه اين است كه این کلینیک به صورت تمام وقت و حتی روزهای تعطیل اماده ارایه تمام خدمات مرتبط با پوست و مو می باشد هم چنین داشتن فضای ارام و بزرگ و طراحی شیک و تهویه مناسب پرسنل مجرب و با اخلاق تمای شرایط موردنیاز جهت حفظ ارامش بیماران و مشتریان را فراهم اورده است. شايان‌ذكر است كه استفاده از دستگاه‌هاي به‌روز دنيا مجهز به سيستم‌هاي خنك‌كننده قوي، درمان مؤثر، ايمن و بدون عارضه‌اي را براي مراجعين به ارمغان آورده است. استقبال چشمگير مراجعين از نحوه خدمت رساني و همچنين اثربخشي دستگاه‌هاي ليزر بدون كمترين عارضه در طول ساليان گواه اين امر است.', '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(13, 1, 5, 'تماس-با-ما', 'تماس با ما', 'تماس با ما تماس با ما', 'تماس با ما تماس با ما', '2019-04-24 19:30:00', '2019-03-10 20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tariffes`
--

CREATE TABLE `tariffes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariffes`
--

INSERT INTO `tariffes` (`id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, 'پکیج کاربردی', 415000, '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(2, 'پکیج طلایی', 315000, '2019-04-24 19:30:00', '2019-07-05 19:30:00'),
(3, 'پکیج نقره ای', 415000, '2019-07-30 19:30:00', '2019-07-30 19:30:00'),
(4, 'پکیج برنزی', 315000, '2019-04-24 19:30:00', '2019-07-05 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tariffe_item`
--

CREATE TABLE `tariffe_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tariffe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariffe_item`
--

INSERT INTO `tariffe_item` (`id`, `title`, `tariffe_id`) VALUES
(1, 'دست کامل', 1),
(2, 'پا کامل', 1),
(3, 'زیر بغل و بکینی', 1),
(4, 'صورت کامل', 1),
(5, 'خط شکم', 1),
(6, 'فول بادی کامل (کل بدن)', 2),
(7, 'صورت کامل', 2),
(8, 'فول بادی کامل (کل بدن)', 3),
(9, 'صورت کامل', 3),
(10, 'فول بادی کامل (کل بدن)', 4),
(11, 'صورت کامل', 4);

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
(1, 'alireza heidari', 'persian402@gmail.com', NULL, '$2y$10$gs45sHX8ZlL9jhXojrcm7.7Ixktky2IGudJTs7gNlLjNv2OQ9x38a', NULL, '2019-10-08 08:04:35', '2019-10-08 08:04:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metas_post_id_foreign` (`post_id`);

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
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffes`
--
ALTER TABLE `tariffes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffe_item`
--
ALTER TABLE `tariffe_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tariffe_item_tariffe_id_foreign` (`tariffe_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tariffes`
--
ALTER TABLE `tariffes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tariffe_item`
--
ALTER TABLE `tariffe_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tariffe_item`
--
ALTER TABLE `tariffe_item`
  ADD CONSTRAINT `tariffe_item_tariffe_id_foreign` FOREIGN KEY (`tariffe_id`) REFERENCES `tariffes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
