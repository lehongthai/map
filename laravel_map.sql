-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 07:41 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

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
(2, 3, 'IALSQJD6X931', 1, 'Nhanh', '123', '{lat: 10.802662, lng: 106.696442},\n    {lat: 10.803489, lng:106.689815},\n    {lat: 10.803879, lng: 106.686736},\n    {lat: 10.801413, lng: 106.682616}{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},{lat: 10.797097, lng: 106.689973},', '2017-04-04 11:07:47', '0000-00-00 00:00:00', '', '2017-03-01', '2017-03-27 00:50:53', '2017-04-04 04:07:47'),
(9, 3, 'ialsqjd6x9', 1, 'Không có', NULL, NULL, '2017-04-04 11:08:36', NULL, NULL, NULL, '2017-04-03 03:51:58', '2017-04-04 04:08:36');

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
  `receiver_address` varchar(150) NOT NULL,
  `receiver_phone` varchar(12) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `employee_id`, `name`, `phone`, `product`, `address`, `status`, `code`, `note`, `receiver_address`, `receiver_phone`, `receiver_name`, `created_at`, `updated_at`) VALUES
(6, 31, NULL, 'Lê Thái', '0963256096', '2', 'kí túc xá', 1, 'IALSQJD6X931', 'Không có', '', '', '', '2017-04-03 02:35:40', '2017-04-02 20:13:40'),
(5, 30, NULL, 'Nguyễn Phước', NULL, '2,3', NULL, 1, 'ialsqjd6x9', 'ssss', '', '', '', '2017-04-03 01:04:56', '2017-04-03 03:31:42'),
(13, 37, NULL, 'NetVis Comany', '09632560961', '2,3', 'Khu Công Nghệ Phần Mềm', 0, 'IALSQJD6X937', 'Không có', '', '', '', '2017-04-03 05:31:43', '2017-04-03 11:47:57'),
(14, 37, NULL, 'NetVis Comany', '09632560961', '3', 'Khu Công Nghệ Phần Mềm', 0, 'IALSQJD6X937', 'sssss', '', '', '', '2017-04-03 05:32:07', '2017-04-03 11:48:02'),
(15, 40, NULL, 'NetVis Comany', '09632560961', '2,3', 'Khu Công Nghệ Phần Mềm', 0, 'FBBAAC2F5A40', 'sssss', '', '', '', '2017-04-03 06:53:53', '2017-04-03 06:53:53');

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
(2, 'Dell', 'Asus 123', NULL, NULL, 10, '2017-03-26 22:55:50', '2017-03-26 22:55:50'),
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
(1, 'Lê Hồng Thái', 'lethai.dev01@gmail.com', '1', '2017-03-23', 'Thăng Bình - Quảng Nam', '$2y$10$pnIGtBAVQLgVftO9A4Ulyu5sCYJisScVBJLZFbbyCq/c0XEWLuH2.', 1, 0, NULL, NULL, '2ez8pMd4zof8EDM8u9Rftt6x1L7lqkZXjOM1FeEt3wlBsVDdH5rTEE6OkuS3', '8VVJ4hY7aHrUwlN0z7pnn5a01WNH6JsnDPGGd1mfiKPE65GccSW5LAyi4wH1', 'r9aC_1.jpeg', '104.89195300', '12.69890200', NULL, '2017-03-22 06:49:54', '2017-04-09 08:26:45'),
(3, 'Lê Hồng Quốc', 'lethai.dev02@gmail.com', '1234567890', '1994-01-01', '54-75 Hoa Lan, phường 2, Phú Nhuận, Hồ Chí Minh, Vietnam', '$2y$10$p.XEJm49QFpKUApSziFHqe85UfZZBadFbm3T/A2sKlP4DKldzHdJO', 2, 0, '9dae7fd95389eca10fbfc8096198c556', 0, '48t3HFBJ1qYynTZmlThNte2sJ0wGYhN8pZYR1RaexY9PE80UIM895gDJnuoE', '5027cbf4a619b6c7d03b2504d075bb27', NULL, '106.689973', '10.797097', NULL, '2017-03-24 07:07:42', '2017-04-09 04:37:46'),
(30, 'NetVis Comany', 'lethai.dev03@gmail.com', '0963256096', NULL, 'Khu Công Nghệ Phần Mềm', '$2y$10$KqKyG8SSElSF7kJsp7yS6.6gayXzF4mkjnKP342KRMFtWcAQlzGri', 3, NULL, NULL, 0, '6bCCfpLOCslgKOAwR4Hgr7sQK0qIEnRhekgByzOUfM1VbDl22Ncd3P3yTzAO', NULL, NULL, NULL, NULL, NULL, '2017-04-03 01:04:56', '2017-04-03 02:33:27'),
(31, 'Lê Hồng Thái', 'teamchich26@gmail.com', '1234567890', NULL, 'Kí Túc Xá', '$2y$10$1pazENxDdWAAmTNxDhwG0eM9/hHY3Kny3bNvz3aHhbFFjmOne/myu', 3, NULL, NULL, 0, '3gkpXxxvo0JReXWYeNqpRMjsnLRvmDQJHN9i9adtoYlVOTHN4My3UStBMOQm', NULL, NULL, NULL, NULL, NULL, '2017-04-03 02:35:40', '2017-04-08 23:04:05'),
(37, 'NetVis Comany', 'hongthai0101@gmail.com', '09632560961', NULL, 'Khu Công Nghệ Phần Mềm', '$2y$10$BrkHNFvO27mEY2KkItYgu.J9uM.vTLpQPzIRkv5kyZxWKYw4jKKU.', 3, NULL, NULL, 0, 'w8RI81sj6d2nDN2as6IhnoEl2EcAjKkqrRp30S8d24nO6kzW17XtVyVz01uf', NULL, NULL, NULL, NULL, NULL, '2017-04-03 05:30:49', '2017-04-03 05:30:49'),
(40, 'NetVis Comany', 'admin@gmail.com', '09632560961', NULL, 'Khu Công Nghệ Phần Mềm', '$2y$10$ptiw7opWPPgswiwcji3d8.9dCFIjlgkNDTlQIzsJoEOQJ3YkekFcm', 3, NULL, NULL, 0, 'HPqEi56tSQAJ15de3Z1drOT3kVYvPbsa9GHJ2PaJL6R89CP4eGwb5MxufP26', NULL, NULL, NULL, NULL, NULL, '2017-04-03 06:53:53', '2017-04-03 06:53:53');

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
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `user_id`, `status`, `date`, `created_at`) VALUES
(1, 3, '[{"on":{"start":"16:04:10","end":"20:30:50"}},{"off":{"start":"21:04:10","end":"23:30:50"}},{"on":{"start":"16:04:10","end":"20:30:50"}}]', '2017-04-01', '2017-04-01'),
(2, 3, '[{"on":{"start":"16:04:10","end":"20:30:50"}},{"off":{"start":"21:04:10","end":"23:30:50"}}]', '2017-04-02', '2017-04-01'),
(3, 3, '[{"start":"16:04:10","end":"20:30:50"},{"start":"21:04:10","end":"23:30:50"}]', '2017-04-03', '2017-04-01'),
(4, 3, '[{"start":"16:04:10","end":"20:30:50"},{"start":"21:04:10","end":"23:30:50"}]', '2017-04-04', '2017-04-01');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
