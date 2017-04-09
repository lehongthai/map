-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 02:30 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `website`, `phone`, `address`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
(1, 'Chuyển phát nhanh', 'giaohang.com', '180011', 'Khu du lịch Suối Tiên', '106.802953', '10.868540', '2017-04-03 00:44:47', '2017-04-03 07:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `deliverys`
--

CREATE TABLE `deliverys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_code` varchar(12) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `note` varchar(300) DEFAULT NULL,
  `distance` varchar(15) DEFAULT NULL,
  `routes` text,
  `time_get` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `time_over` timestamp NULL DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliverys`
--

INSERT INTO `deliverys` (`id`, `user_id`, `order_code`, `status`, `note`, `distance`, `routes`, `time_get`, `time_over`, `image`, `date`, `created_at`, `updated_at`) VALUES
(10, 44, '12F0FD57F047', 0, 'Xong rồi về liền', NULL, NULL, '2017-04-09 11:19:24', NULL, NULL, NULL, '2017-04-08 19:44:53', '2017-04-09 18:19:24'),
(11, 44, 'DA9959590746', 0, 'Không có', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:45:54', '2017-04-08 19:45:54'),
(12, 44, '263C12F5B348', 0, NULL, NULL, NULL, '2017-04-09 11:10:44', NULL, NULL, NULL, '2017-04-09 17:41:36', '2017-04-09 18:10:44'),
(13, 43, '971EE1195D45', 0, NULL, NULL, NULL, '2017-04-09 11:19:37', NULL, NULL, NULL, '2017-04-09 17:41:36', '2017-04-09 18:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `product`, `address`, `status`, `code`, `note`, `employee_id`, `created_at`, `updated_at`) VALUES
(19, 48, 'Khách Hàng D', '1233211234', '5,4,6,7', 'Quận 7', 0, '263C12F5B348', 'Giao hàng sớm nhất', 44, '2017-04-09 17:41:27', '2017-04-09 18:01:27'),
(18, 47, 'Khách Hàng C', '0961233211', '5,4,6,7', 'Quận 1', 1, '12F0FD57F047', 'Giao hàng đúng địa chỉ', 43, '2017-04-08 19:41:21', '2017-04-09 11:19:14'),
(17, 46, 'Khách Hàng B', '0963256096', '6,7', 'Quận 5', 1, 'DA9959590746', NULL, 44, '2017-04-08 19:40:37', '2017-04-09 10:47:57'),
(16, 45, 'Khách Hàng A', '012345678', '5,4,6', 'Phan Xích Long - Phú Nhuận', 0, '971EE1195D45', 'Giao hàng sớm', 44, '2017-04-08 19:39:38', '2017-04-09 10:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `quanlity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `keyword`, `description`, `quanlity`, `created_at`, `updated_at`) VALUES
(5, 'Máy Tính Bảng', 'MTP001', NULL, NULL, 20, '2017-04-08 19:37:28', '2017-04-08 19:37:28'),
(4, 'Lap Top', 'LT001', NULL, NULL, 10, '2017-04-08 19:37:09', '2017-04-08 19:37:09'),
(6, 'TiVi', 'TV001', NULL, NULL, 20, '2017-04-08 19:37:43', '2017-04-08 19:37:43'),
(7, 'Tủ Lạnh', 'TL001', NULL, NULL, 29, '2017-04-08 19:37:56', '2017-04-08 19:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '3',
  `status` tinyint(2) DEFAULT NULL,
  `active` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banded` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distanceUser` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minute` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthday`, `address`, `password`, `level`, `status`, `active`, `banded`, `remember_token`, `mobile_token`, `image`, `lng`, `lat`, `distanceUser`, `minute`, `created_at`, `updated_at`) VALUES
(42, 'Le Hong Thai', 'lethai.dev01@gmail.com', NULL, NULL, NULL, '$2y$10$RdUNtj/MhbAHYu7yeWFIjetXk4l31E2gyzLWYHAEvopDXcDLwoDXS', 1, NULL, NULL, 0, 'Z1hWRFk0mXUKWR5myAv7xErGDUr4lZ3HhHdGE7ygjbRmBae9YsIrFAWnQvru', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-08 18:21:12', '2017-04-08 18:21:12'),
(43, 'Phạm Ngọc Dũng', 'nd@gmail.com', '1233211234', '2017-04-06', 'Quận 7', '$2y$10$yJGVl./nWqEity2mmWMQluKRLgIevVWN7phdOFtWT14f8LXSJzQ0a', 2, NULL, '8b9247327c970739e262090788084015', 0, NULL, 'kDmy8AwOGiZ3pYQPQU3vvpvE35RykXHo2uE84kkr0e2eebd07a3ac57b4cebf2adb0585b7b', NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:29:41', '2017-04-09 17:56:40'),
(44, 'Nguyễn Kiến Phước', 'kp@gmail.com', '1233211234', '1994-05-22', 'Quận 7', '$2y$10$OXQsUCLmSYQT2wOUaGT3I.JhUeXNjMisAigWhsoQre.tCChuAaDju', 2, NULL, '0f696a883b990c00ab32ba907764a128', 0, NULL, 'kDmy8AwOGiZ3pYQPQU3vvpvE35RykXHo2uE84kkrc65f08b82baf1e203aa51c7c9c15d659', NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:36:40', '2017-04-09 17:52:28'),
(45, 'Khách Hàng A', 'kha@gmail.com', '012345678', NULL, 'Phan Xích Long - Phú Nhuận', '$2y$10$IK/Z.ZOmVKvADI6wXAxdcO5VpWSUp5Q/JepPv/KP8I3ry1gENXgcG', 3, NULL, NULL, 0, 'YeQvVG2L0rbQVpDFnvUcpbtFcfj3khlFpFPOdnJU3or4esYaPkVAomoLXxjh', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:39:38', '2017-04-08 19:39:38'),
(46, 'Khách Hàng B', 'khb@gmail.com', '0963256096', NULL, 'Quận 5', '$2y$10$RuAcyurBR8xsYrcSc4rbW.E6tjBJdeqs7wGaRvk.trYX9IKUE37Gm', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:40:37', '2017-04-08 19:40:37'),
(47, 'Khách Hàng C', 'khc@gmail.com', '0961233211', NULL, 'Quận 1', '$2y$10$c2AQnwtmFEfg2fRR6is0ROQMsDVDs8vhqpNTfjUPQwpU/PV2B.Ff2', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-08 19:41:21', '2017-04-08 19:41:21'),
(48, 'Khách Hàng D', 'khd@gmail.com', '1233211234', NULL, 'Quận 7', '$2y$10$tNJzC524RuTrXjJcBMykzucD.uD7LTIz/Yf3h4JcD0Gvy3XRhCx8K', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-09 17:41:27', '2017-04-09 18:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) DEFAULT NULL,
  `status` text,
  `date` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deliverys`
--
ALTER TABLE `deliverys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_token` (`mobile_token`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliverys`
--
ALTER TABLE `deliverys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
