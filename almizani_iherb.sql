-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 02 أغسطس 2018 الساعة 11:23
-- إصدار الخادم: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almizani_iherb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `type`, `name`, `branch`, `email`, `password`, `pass`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mohammed', 0, 'mohamad302@hotmail.com', '$2y$10$aTRMun9fg08SftVlOq2WdOB9xBQjjl5yAIshynmkFp6k2lBN2A202', '654321', 'PoYqvgUWLYXHcCBnrrrpWElhQeWY9i9a2UQPbmFGC7sTxfzotp1YQ2kYPaae', NULL, '2017-09-09 15:11:39'),
(8, 1, 'محمد الغزالي', 0, 'mohamad402@hotmail.com', '$2y$10$UUvNfgZhaGgg6k4qVD9ROe3AsPXHoXz3loCPvqiGB8ctNuS6rSrpO', '123456', NULL, '2018-06-27 12:30:33', '2018-06-27 12:30:33');

-- --------------------------------------------------------

--
-- بنية الجدول `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'الراجحي', '2018-07-13 06:00:12', '2018-07-13 08:30:42');

-- --------------------------------------------------------

--
-- بنية الجدول `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `charges`
--

INSERT INTO `charges` (`id`, `order_id`, `value`, `created_at`, `updated_at`) VALUES
(2, 22, 12, '2018-06-28 10:35:44', '2018-06-28 10:36:32');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `whatsup` bigint(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `link` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `name`, `whatsup`, `address`, `link`, `date`, `order`, `charge`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'sabi', 12312000, 'gaza', 'http://www.google.com', '2018-06-27 16:44:01', 222, 33, 9, '2018-07-02 07:21:43', '2018-07-02 05:21:43'),
(3, 'محمد', 2147483647, 'gaza', 'http://www.google.com', '2018-06-28 14:21:23', 66, 0, 7, '2018-07-13 15:20:29', '2018-07-13 13:20:29'),
(4, 'محمد', 12312000, 'gaza', 'http://www.google.com', '2018-06-28 15:45:07', 0, 0, 10, '2018-07-02 07:06:23', '2018-07-02 05:06:23'),
(5, 'محمد جوال', 595444892, 'غزة', 'https://mostaql.com', '2018-06-28 16:28:23', 0, 0, 11, '2018-06-29 12:41:55', '2018-06-29 10:41:55'),
(6, 'nasseralmizani', 500332219, 'KING KHALID Rd', 'http://iherb.direct/iherb', '2018-06-29 06:23:09', 22, 55, 9, '2018-07-02 07:32:14', '2018-07-02 05:32:14'),
(7, 'Chh', 2147483647, '.iHerb.com تَفَقَّدْ سلة التسوق الخاصة بي على', 'http://iherb.direct/iherb/', '2018-06-29 06:32:49', 44585, 444, 9, '2018-07-02 07:27:00', '2018-07-02 05:27:00'),
(8, 'Nsnd', 2147483647, '.iHerb.com تَفَقَّدْ سلة التسوق الخاصة بي على', 'https://ar.m.wikipedia.org/wiki/%D8%AE%D8%A7%D9%84%D8%AF_%D8%B9%D8%A8%D8%AF_%D8%A7%D9%84%D8%B1%D8%AD%D9%85%D9%86', '2018-06-29 06:48:22', 0, 0, 10, '2018-07-02 07:06:15', '2018-07-02 05:06:15'),
(13, 'ناصر', 2147483647, 'غزة', 'Google. Com', '2018-06-29 16:44:35', 4557, 0, 10, '2018-06-30 18:33:27', '2018-06-30 16:33:27'),
(14, 'ناصر الغامدي', 2147483647, 'gaza', 'http://www.google.com', '2018-06-29 20:14:37', 4456, 0, 7, '2018-07-13 15:38:38', '2018-07-13 13:38:38'),
(15, 'Nasser', 2147483647, 'القصيم', 'نابذومكم', '2018-06-30 18:36:13', 0, 0, 11, '2018-07-01 11:22:10', '2018-07-01 09:22:10'),
(16, 'NASSER', 2147483647, 'الرياض-النسيم الشرقي', 'http://iherb.direct/iherb', '2018-07-01 09:10:01', 0, 234, 9, '2018-07-02 07:21:20', '2018-07-02 05:21:20'),
(17, 'جديد', 2147483647, 'KING KHALID Rd', '.iHerb.com تَفَقَّدْ سلة التسوق الخاصة بي على https://www.iherb.com/tr/cb?pcodes=AHR-12004', '2018-07-01 16:41:10', 2255, 111, 7, '2018-07-13 14:01:32', '2018-07-13 12:01:32'),
(18, 'محمد الغزالي جديد', 2147483647, 'جدة', 'http://www.google.com', '2018-07-01 18:01:19', 55, 22, 12, '2018-07-13 14:05:25', '2018-07-13 12:05:25'),
(19, 'محمد الغزالي جديد', 972595444872, 'gaza', 'http://www.google.com', '2018-07-01 18:11:45', 11, 22, 10, '2018-07-01 20:12:36', '2018-07-01 18:12:36'),
(20, 'nasseralmizani', 966500332219, 'KING KHALID Rd', 'http://iherb.direct/iherb', '2018-07-01 19:19:45', 22554, 55223311, 10, '2018-07-02 07:07:32', '2018-07-02 05:07:32'),
(21, 'فلان بن فلان', 966500332219, 'الرياض-حي النسيم الشرقي', 'https://www.iherb.com/tr/cb?pcodes=SDX-09701qty2_PKY-68000qty2_KMF-83354&rcode=QPJ021', '2018-07-02 07:54:11', 99, 77, 8, '2018-07-02 08:03:40', '2018-07-02 06:03:40'),
(22, 'فلان بن فلان', 966500000000, 'جده- السليمانيه', 'https://www.iherb.com/tr/cb?pcodes=SDX-09701qty2_CRX-47024&rcode=QPJ021', '2018-07-02 08:32:15', 221, 0, 8, '2018-07-02 08:35:23', '2018-07-02 06:35:23'),
(23, 'ساره احمد', 966500000000, 'الرياض- الروضه', 'https://www.iherb.com/tr/cb?pcodes=SDX-09701qty2_CRX-47024&rcode=QPJ021', '2018-07-02 08:43:38', 0, 0, 1, '2018-07-02 06:43:38', '2018-07-02 06:43:38'),
(24, 'ساره', 966500123456, 'الرياض-الريان', 'Hejaka', '2018-07-02 14:40:06', 0, 0, 7, '2018-07-02 16:26:21', '2018-07-02 14:26:21'),
(25, 'fidaa', 9617149979, 'Abu Alfouz, Yasser Mater,2nd Floor', 'iherb.direct', '2018-07-12 21:34:22', 0, 0, 7, '2018-07-14 17:52:49', '2018-07-14 15:52:49'),
(26, 'yassir', 966553313631, 'Qassim- unaizah', 'https://www.iherb.com/pr/Solgar-Cinnamon-Alpha-Lipoic-Acid-60-Tablets/10442', '2018-07-15 10:14:41', 0, 0, 1, '2018-07-15 08:14:41', '2018-07-15 08:14:41'),
(27, 'asdasd', 342342342342, 'ثصثق', 'صثقصثق', '2018-07-15 21:21:54', 0, 0, 1, '2018-07-15 19:21:54', '2018-07-15 19:21:54'),
(28, 'Hgddffv', 97633466674, 'Khartoum', 'mostaql.com/portfolio/207928', '2018-07-15 21:52:20', 0, 0, 1, '2018-07-15 19:52:20', '2018-07-15 19:52:20'),
(29, 'sdfsdfsdf sdfsdfs', 966555555555, 'sdfsdf sdf sdf sdf sdf sd fsd sdf dsds fsd fsd sd sdf sd sdf sdf ', 'https://www.iherb.com/tr/cb?pcodes=NTL-05508qty4', '2018-07-15 22:15:56', 0, 0, 1, '2018-07-15 20:15:56', '2018-07-15 20:15:56'),
(30, 'Crystal W. Harris', 1408689662, '1287 Friendship Lane', 'https://www.iherb.com/', '2018-07-15 23:08:43', 651, 0, 8, '2018-08-01 09:57:43', '2018-08-01 07:57:43'),
(31, 'Zineb', 415368188943, '244 WEST MARY ANN COURT', 'https://checkout.iherb.com/EditCart', '2018-07-19 21:25:00', 0, 0, 1, '2018-07-19 19:25:00', '2018-07-19 19:25:00');

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `bank_from` varchar(250) NOT NULL,
  `bank_to` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `payments`
--

INSERT INTO `payments` (`id`, `name`, `order_id`, `bank_from`, `bank_to`, `amount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(11, 'ناصر الميزاني', 25, 'الاهلي', 2, 500, '2018-07-14 08:25:44', 2, '2018-07-14 08:27:46', '2018-07-14 06:27:46'),
(12, 'محمد الغزالي', 24, 'الاهلي', 2, 120, '2018-07-14 08:28:22', 1, '2018-07-14 08:28:39', '2018-07-14 06:28:39'),
(13, 'H', 25, 'H', 2, 5, '2018-07-14 17:52:19', 1, '2018-07-14 17:52:49', '2018-07-14 15:52:49');

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_link` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_message` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ss'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `freelancer_link`, `name`, `link`, `google`, `pay_message`, `created_at`, `updated_at`, `color`) VALUES
(1, 0, 'ايهيرب دايركت', 'https://www.youtube.com/embed/WO7lAf-0XeE', 'تم استقبال طلبك بنجاح, وسيتم التواصل معك خلال 12 ساعه القادمه', 'تم بنجاح', NULL, '2018-07-13 12:24:46', 'darkblue-rtl.min.css');

-- --------------------------------------------------------

--
-- بنية الجدول `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'جديد', '2018-06-29 08:17:34', '2018-06-29 06:17:34'),
(5, 'تم التواصل', '2018-06-29 08:17:47', '2018-06-29 06:17:47'),
(6, 'انتظار التحويل', '2018-06-29 06:15:52', '2018-06-29 06:15:52'),
(7, 'تم التحويل', '2018-06-29 06:16:09', '2018-06-29 06:16:09'),
(8, 'تم الطلب', '2018-06-29 06:16:15', '2018-06-29 06:16:15'),
(9, 'تم الشحن', '2018-06-29 06:16:19', '2018-06-29 06:16:19'),
(10, 'مكتمل', '2018-06-29 08:30:08', '2018-06-29 06:30:08'),
(11, 'ملغي', '2018-06-29 06:16:52', '2018-06-29 06:16:52'),
(12, 'لم يتم التحويل', '2018-07-02 14:28:11', '2018-07-02 14:28:11');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_end` date NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `email_verification` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `email_token`, `name`, `email`, `address`, `tel`, `password`, `pass`, `about`, `image`, `type`, `date_end`, `verified`, `status`, `email_verification`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'ss', 'mohammad alghazali', 'mohamad302@hotmail.com', 'gaza                                                    ', 2147483647, '$2y$10$ZhV5cVyn7HYxro6SAnQtJe.aOSBFjojn2.dkk..NAhaJPOafo7a2.', 'ss', 'ss', '1515357969.jpg', 1, '0000-00-00', 0, 1, NULL, 'RCs92slV5QRyRDvvTqpkVRrFunibMlBl5vNjxE2KcoRGtFvgQ2vV6oL1SaBn', NULL, '2018-05-06 12:04:10', '2017-12-11 08:06:31'),
(2, '', 'محمد الغزالي', 'mohamad302@outlook.sa', '', 0, '$2y$10$Qqx3Ra8VxcNlBymAoZZp5usJb..TOxZD4lHPcrM1VZiop5HR6ShYe', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, 'pLjxmA67Fl70gYv3YETJmDRKMuFJzWLvsPv5wk61uYT9KQf5EzyEzTEflFCt', '2018-01-07 22:37:09', '2018-01-24 13:36:39', '2018-01-07 16:37:09'),
(3, '', 'صالح باسبيت', 's2sd@hotmail.com', '', 2147483647, '$2y$10$JPb2vlPLhg3wpDWdZpAKeufZ4TqQXD9cG83vvw7ATrUzvkMd04Gqq', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, NULL, '2018-01-14 11:13:48', '2018-04-25 03:52:12', '2018-01-14 05:13:48'),
(4, '', 'osama', 'qais@outlook.sa', '', 0, '$2y$10$f/N1UF7gEA9eHCWnLtkbqujyV.ewSqREoXA66c11pXj/bj0cxDgZG', '', '', '', 2, '0000-00-00', 0, 1, 0, NULL, '2018-01-18 14:59:36', '2018-01-18 14:59:36', '2018-01-18 08:59:36'),
(5, '', 'admin', 'admin@demo.com', '', 0, '$2y$10$bMNgJ2FBBN20RZiN2Tklp.n7TyN/.wkjL2sxRb1zXONON37yyFQP.', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'r263VlqTfNSHNGWOphXY6TIPrsKoVZZ5CdF1bCXzzgnczDzy3OXLdgxR8fKc', '2018-01-24 14:31:06', '2018-01-24 14:31:06', '2018-01-24 08:31:06'),
(6, '', 'صالح علي', 'Saleh2all@gmail.com', '', 0, '$2y$10$TlSTWVW1rRqh.7chBDl8Qe0zguBsZCCA7m8AZNqGK/bbyCxskyW7m', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'y9Dli9XbjjCowwxqpVI3wXsAUxROjAJGAkaoO8IKhgl4wCh51LXJwrFU4tCF', '2018-02-06 03:31:40', '2018-02-06 03:31:40', '2018-02-05 21:31:40'),
(7, '', 'هاني', 'sssssss@ss.com', '', 0, '$2y$10$AAv.D5B6yp4SS9KPqo4YMuD8KsEsn11E16JL39L9sk1fhQfQK/ts6', '', '', 'user-profile-avatar.jpg', 2, '0000-00-00', 0, 1, 0, 'CP7jbhpnluadz5gCXE207udygPpONT42wgSgAx49bT86Mh573rBvORmH021d', '2018-02-06 19:31:50', '2018-02-06 20:05:58', '2018-02-06 13:31:50'),
(8, '', 'ماجد العوشن', 'majedsaud2@hotmail.com', '', 0, '$2y$10$MZOu0IVsYsz9njHIkeTlKezIj7UINJAnwDu6VYqacyyF96XYqA7jW', '', '', '', 2, '0000-00-00', 0, 1, 0, NULL, '2018-02-06 20:02:11', '2018-02-06 20:02:11', '2018-02-06 14:02:11'),
(10, '', 'osama33', 'mohamad30222@hotmail.com', '', 1234567890, '$2y$10$HbeduNKZLmR2F18iGBdZIOm9GdqlWWl4KTCk3.TgzPPbPQ3daRenq', '', '', '', 1, '0000-00-00', 0, 1, 0, NULL, '2018-04-25 03:38:07', '2018-04-25 03:41:02', '2018-04-25 06:38:07'),
(11, '', 'صهيب', 'mohamad402@hotmail.com', 'gaza            2                 ', 0, '$2y$10$Egeb8sgSK5pSupg.aN/xA.Bzmx56gaXd7YlEvNzNxhjk3rYBtWnPa', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'XgC8NL9XQKwIPgFOApZVWYIu7pZzGJ2LE55V8S7DuJprqZ0G1xsdzA9IYDqU', '2018-05-04 10:09:27', '2018-05-06 03:31:10', '2018-05-04 13:09:27'),
(12, '', 'sabi', 'mohamad303@hotmail.com', '', 0, '$2y$10$aWq83nlIa1nCHO8nMXIQveEzBifXdvutCOwhIvZJMjxvPykxAtdAa', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, 'wz1Gy6EnZKRsXnv6muBdbyX0lPpkHZZjdGs9tXB99rZk1Al1B6eySHbes6rM', '2018-05-05 05:01:44', '2018-05-05 05:01:44', '2018-05-05 08:01:44'),
(13, '', 'Noor madhon', 'noor335@outlook.sa', 'ss22', 12312, '$2y$10$zxJuY.de0f.aD5Ut7wRQxOP/oo1yadSxc.0MY3mEgfgbt4qYu0Rji', '', '', '', 1, '0000-00-00', 0, 1, 0, NULL, '2018-05-06 03:53:18', '2018-05-06 03:54:27', '2018-05-06 06:53:18'),
(14, '', 'alaa', 'mohamad505@hotmail.com', '', 0, '$2y$10$lS1dSBK.tz8bn7.hgVxMe.TR8tOeOEpnnYjlHkG1yggjkDwBwMBlO', '', '', 'user-profile-avatar.jpg', 1, '0000-00-00', 0, 1, 0, NULL, '2018-05-08 03:14:46', '2018-05-08 03:14:46', '2018-05-08 06:14:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
