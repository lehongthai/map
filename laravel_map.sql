-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 11:07 AM
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
(11, 43, '5FAB9B715046', 0, 'Không có', NULL, NULL, '2017-04-10 09:01:34', NULL, NULL, NULL, '2017-04-10 15:57:10', '2017-04-10 16:01:34'),
(12, 44, '780F7185B347', 1, 'Nhanh', NULL, NULL, '2017-04-10 09:03:56', NULL, NULL, NULL, '2017-04-10 16:03:36', '2017-04-10 09:03:56'),
(10, 42, '7C62F4E57845', 2, 'Giao Sớm', NULL, NULL, '2017-04-10 09:03:58', NULL, NULL, NULL, '2017-04-10 15:46:51', '2017-04-10 09:03:58');

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
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `receiver_address` varchar(150) DEFAULT NULL,
  `receiver_phone` varchar(12) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `employee_id`, `name`, `phone`, `product`, `address`, `status`, `code`, `note`, `receiver_address`, `receiver_phone`, `receiver_name`, `created_at`, `updated_at`) VALUES
(17, 45, 42, 'Khách Hàng A', '123456789', '5,4,7', 'Khu Công Nghệ Phần Mềm', 0, '7C62F4E57845', 'Giao Sớm', 'Quận Thủ Đức', '123456789', 'Người Nhận A', '2017-04-10 15:46:44', '2017-04-10 15:55:14'),
(18, 46, 42, 'Khách Hàng B', '123456789', '5,4,7', 'Quận 1', 0, '5FAB9B715046', 'Không có', 'Quận Tân Bình', '123456789', 'Người Nhận B', '2017-04-10 15:57:07', '2017-04-10 15:57:07'),
(19, 47, 44, 'Khách Hàng C', '12435654545', '5,4,8', 'Quận 5', 0, '780F7185B347', 'Nhanh', 'Quận 10', '3434634213', 'Người Nhận C', '2017-04-10 16:03:32', '2017-04-10 16:03:32');

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
(5, 'Máy Tính Bảng', 'MTP001', NULL, NULL, 200, '2017-04-10 15:42:45', '2017-04-10 15:42:45'),
(4, 'Laptop Asus', 'LT001', NULL, NULL, 100, '2017-04-10 15:42:28', '2017-04-10 15:42:28'),
(6, 'TiVi', 'TV001', NULL, NULL, 10, '2017-04-10 15:43:00', '2017-04-10 15:43:00'),
(7, 'Tủ Lạnh', 'TL001', NULL, NULL, 50, '2017-04-10 15:43:21', '2017-04-10 15:43:21'),
(8, 'Máy Chạy Bộ', 'MTB0001', NULL, NULL, 10, '2017-04-10 15:43:59', '2017-04-10 15:43:59');

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
  `distance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthday`, `address`, `password`, `level`, `status`, `active`, `banded`, `remember_token`, `mobile_token`, `image`, `lng`, `lat`, `distance`, `created_at`, `updated_at`) VALUES
(41, 'Lê Hồng Thái', 'ht@gmail.com', NULL, NULL, NULL, '$2y$10$XyihZgaLEzMfSEFuJmRYpOM2Dur7BtOZq06q7cOSNIo6l25IVGMQ6', 1, NULL, NULL, 0, 'M2tV1KuryL7QYhgM0sDKffWY0Ux4ZZJNy51QEnypX88ObqhbYyPumaaE1COw', NULL, '9rx7_1.jpg', NULL, NULL, NULL, '2017-04-10 15:35:06', '2017-04-10 16:05:54'),
(42, 'Phạm Ngọc Dũng', 'nd@gmail.com', '123456789', '2017-04-01', 'Ki Tu Xa', '$2y$10$DLp3rMuktREyms8zvQx3YOplgOLkdvh3oQkbTgP0hM/9eyZ3lBR.O', 2, NULL, '5b8787610d05d18519318ceb0608cc32', 0, NULL, 'AvOUpgaJVCDSadHm7St3TMeD8EHwbQoRT5k9DaEH364f0d9cbe1b7bb0680606899c34c4d7', NULL, NULL, NULL, NULL, '2017-04-10 15:36:34', '2017-04-01 08:39:34'),
(43, 'Nguyễn Kiến Phước', 'kp@gmail.com', '987654321', '2017-04-03', 'Suối Tiên', '$2y$10$yq5ZgFGFy3SvOvsHP46VvevjNLCpKqdgepC/V2ElTvWbjTpXwK5Vy', 2, NULL, '74dc5624de9138007a97b7af34982e7e', 0, NULL, 'AvOUpgaJVCDSadHm7St3TMeD8EHwbQoRT5k9DaEH55f8131443ceb860ffaeba0eef22bcd4', NULL, NULL, NULL, NULL, '2017-04-10 15:38:09', '2017-04-10 15:38:09'),
(44, 'Nhân Viên', 'nv@gmail.com', '2345654321', '2013-04-11', 'Quận 8', '$2y$10$K5slo3wThUtxpd7noudt.uLBs71AEG1/KNAxD/DuWU9ZXNZl6G7cC', 2, NULL, 'e92331d6bace25084064a6f38f72b30f', 0, NULL, 'AvOUpgaJVCDSadHm7St3TMeD8EHwbQoRT5k9DaEH56f29e2de1e0047ec2597b82b04ffc9c', NULL, NULL, NULL, NULL, '2017-04-10 15:39:00', '2017-04-10 15:39:00'),
(45, 'Khách Hàng A', 'kha@gmail.com', '123456789', NULL, 'Khu Công Nghệ Phần Mềm', '$2y$10$wQoH/j023qs98RKgfHWf/eseLYrIuNe9oCW.x4I9fzX96irbyqNZK', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-10 15:45:32', '2017-04-10 15:45:32'),
(46, 'Khách Hàng B', 'khb@gmail.com', '123456789', NULL, 'Quận 1', '$2y$10$VEYArji8c2rS2.HQ2SALwOIrE1G10SlJJPTgdNoX9XgKC1uDTRI22', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-10 15:56:10', '2017-04-10 15:56:10'),
(47, 'Khách Hàng C', 'khc@gmail.com', '12435654545', NULL, 'Quận 5', '$2y$10$zx3jgK54lo7poDluyAKE8.Np5BKI.YIUdVWBQap7PmTrAl3y39nei', 3, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-10 16:03:32', '2017-04-10 16:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) DEFAULT NULL,
  `status` text,
  `date` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
