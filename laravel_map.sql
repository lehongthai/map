-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 12:59 AM
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
-- Table structure for table `deliverys`
--

CREATE TABLE `deliverys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `note` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliverys`
--

INSERT INTO `deliverys` (`id`, `user_id`, `product_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 1, 'Nhanh', '2017-03-27 00:50:53', '2017-03-27 04:28:38'),
(3, 10, 3, 2, 'Không', '2017-03-27 00:51:26', '2017-03-27 04:27:21');

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
(2, 'Laptop Asus', 'Asus 123', NULL, NULL, 10, '2017-03-26 22:55:50', '2017-03-26 22:55:50'),
(3, 'Laptop Asus', 'Asus 1234', NULL, NULL, 10, '2017-03-26 22:59:54', '2017-03-26 23:05:08');

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
  `active` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banded` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthday`, `address`, `password`, `active`, `banded`, `remember_token`, `mobile_token`, `image`, `lng`, `lat`, `created_at`, `updated_at`) VALUES
(1, 'Lê Hồng Thái', 'lethai.dev01@gmail.com', '1', '2017-03-23', 'Thăng Bình - Quảng Nam', '$2y$10$Y/kiX/Ga.1lrtl6FTYhiduZFDzyVac5ClHVVqqV2lobgbiUxpYCxm', NULL, NULL, '8VVJ4hY7aHrUwlN0z7pnn5a01WNH6JsnDPGGd1mfiKPE65GccSW5LAyi4wH1', '8VVJ4hY7aHrUwlN0z7pnn5a01WNH6JsnDPGGd1mfiKPE65GccSW5LAyi4wH1', NULL, '104.89195300', '12.69890200', '2017-03-22 06:49:54', '2017-03-25 23:30:22'),
(3, 'Lê Hồng Quốc', 'lethai.dev02@gmail.com', '2', '1994-01-01', 'Hà Lam - Thăng Bình', '$2y$10$p.XEJm49QFpKUApSziFHqe85UfZZBadFbm3T/A2sKlP4DKldzHdJO', '9dae7fd95389eca10fbfc8096198c556', 0, NULL, '5027cbf4a619b6c7d03b2504d075bb27', NULL, '105.59846100', '11.92253000', '2017-03-24 07:07:42', '2017-03-24 07:07:42'),
(9, 'Lê Hồng Tiến', 'lethai.dev03@gmail.com', '3', '1994-01-01', 'Hà Lam - Thăng Bình', '$2y$10$p.XEJm49QFpKUApSziFHqe85UfZZBadFbA2sKlP4DKldzHdJO', '5027cbf4a619b6c7d03b4d075bb27', 0, NULL, '5027cbf4a619b6c7d2504d075bb27', NULL, '104.89195300', '12.69890200', '2017-03-24 07:07:42', '2017-03-24 07:07:42'),
(10, 'Test Map', 'b@gmail.com', NULL, '1993-11-13', '54-75 Hoa Lan, phường 2, Phú Nhuận, Hồ Chí Minh, Vietnam', '$2y$10$Hk74DCJy3nDBTPd.u8gvEugW40cr6vjjBLnoIc0lOM.Ro3tzRuAfu', 'd3cf446d4d83c347f50d5b68ab39fdeb', 0, NULL, '3fb946589052f211a2340bffd04f86c2', NULL, '106.689973', '10.797097', '2017-03-25 16:55:08', '2017-03-27 01:16:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deliverys`
--
ALTER TABLE `deliverys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliverys`
--
ALTER TABLE `deliverys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
