-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 05:27 AM
-- Server version: 8.0.27
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `482lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `package_id` int NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `members_info` varchar(255) DEFAULT NULL,
  `pax` int NOT NULL DEFAULT '1',
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `package_id`, `is_paid`, `members_info`, `pax`, `price`) VALUES
(23, 'Nibir Ahmed', 'nibirahmed@gmail.com', '01798449001', NULL, 12, 20, 1, 'All male', 2, 15000),
(24, 'Nibir Ahmed', 'nibirahmed@gmail.com', '01628715444', 'Uttara', 12, 22, 1, 'Self', 1, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(15, 'Dhaka'),
(16, 'Sajek'),
(17, 'Chittagong'),
(18, 'Coxs Bazar'),
(19, 'Sylhet'),
(20, 'Rangamati'),
(21, 'Saint Martin'),
(22, 'Sundarban'),
(23, 'Sreemangal');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(10, 'Nibir Ahmed', 'nibirahmed@gmail.com', '01798449001', 15000, 'Dhaka', 'Pending', 'SSLCZ_TEST_6472e5985de63', 'BDT'),
(11, 'Nibir Ahmed', 'nibirahmed@gmail.com', '01628715444', 6500, 'Dhaka', 'Pending', 'SSLCZ_TEST_6472e6202b233', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `price` float NOT NULL,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `images` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `from_id`, `to_id`, `from_date`, `to_date`, `price`, `descriptions`, `images`) VALUES
(20, 'Sajek premium', 15, 16, '2023-06-01 00:00:00', '2023-06-09 00:00:00', 7500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id ornare nisi. Curabitur at massa vitae orci feugiat consequat et in metus. Nulla facilisi. Nullam sit amet purus et dui varius dapibus sed in elit. Suspendisse urna arcu, aliquet id eros vel, pharetra ullamcorper tortor. Vestibulum ullamcorper felis eu ex porta, id consectetur mi auctor. Integer quis sem nunc. Donec mattis sodales lacus et imperdiet. Phasellus mattis mollis arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris pulvinar, urna vel consequat luctus, metus lacus pretium orci, eget pulvinar enim tellus in ligula. Cras eget libero mauris. Sed gravida ex tortor, in molestie nunc euismod ut. Curabitur imperdiet, purus at gravida rutrum, sem nibh tempus odio, ac fermentum ex ipsum et ipsum. Integer nec gravida urna.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Donec eu pharetra tortor. Donec vel fringilla enim. Integer lacinia, nibh mattis aliquam malesuada, sem est suscipit est, eu molestie augue justo et metus. Sed sodales erat vel lectus dignissim volutpat. Maecenas id sagittis nunc. Vivamus imperdiet auctor orci vel consectetur. Maecenas magna justo, tempor vulputate efficitur eu, vehicula vel quam. Morbi erat tellus, iaculis quis nibh eget, imperdiet dignissim ante. Quisque semper arcu tortor, facilisis tincidunt sapien placerat eget. Sed vulputate vel nunc quis consequat.', '[\"images/1685251196-ebadur-rehman-kaium-GBYWXNWO81A-unsplash.jpg\", \"images/1685251196-niloy-biswas-SrNR_FUHdbM-unsplash.jpg\", \"images/1685251196-niloy-biswas-Dlzof0g5svo-unsplash.jpg\"]'),
(21, 'Coxs Bazar', 15, 18, '2023-06-07 00:00:00', '2023-06-10 00:00:00', 5900, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id ornare nisi. Curabitur at massa vitae orci feugiat consequat et in metus. Nulla facilisi. Nullam sit amet purus et dui varius dapibus sed in elit. Suspendisse urna arcu, aliquet id eros vel, pharetra ullamcorper tortor. Vestibulum ullamcorper felis eu ex porta, id consectetur mi auctor. Integer quis sem nunc. Donec mattis sodales lacus et imperdiet. Phasellus mattis mollis arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris pulvinar, urna vel consequat luctus, metus lacus pretium orci, eget pulvinar enim tellus in ligula. Cras eget libero mauris. Sed gravida ex tortor, in molestie nunc euismod ut. Curabitur imperdiet, purus at gravida rutrum, sem nibh tempus odio, ac fermentum ex ipsum et ipsum. Integer nec gravida urna.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Donec eu pharetra tortor. Donec vel fringilla enim. Integer lacinia, nibh mattis aliquam malesuada, sem est suscipit est, eu molestie augue justo et metus. Sed sodales erat vel lectus dignissim volutpat. Maecenas id sagittis nunc. Vivamus imperdiet auctor orci vel consectetur. Maecenas magna justo, tempor vulputate efficitur eu, vehicula vel quam. Morbi erat tellus, iaculis quis nibh eget, imperdiet dignissim ante. Quisque semper arcu tortor, facilisis tincidunt sapien placerat eget. Sed vulputate vel nunc quis consequat.', '[\"images/1685251424-ashraful-pranto-sZ90UEv0CHw-unsplash.jpg\", \"images/1685251424-s-m-ibrahim-1NEJkiTTuLU-unsplash.jpg\"]'),
(22, 'Sylhet', 15, 19, '2023-05-29 00:00:00', '2023-06-03 00:00:00', 6500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id ornare nisi. Curabitur at massa vitae orci feugiat consequat et in metus. Nulla facilisi. Nullam sit amet purus et dui varius dapibus sed in elit. Suspendisse urna arcu, aliquet id eros vel, pharetra ullamcorper tortor. Vestibulum ullamcorper felis eu ex porta, id consectetur mi auctor. Integer quis sem nunc. Donec mattis sodales lacus et imperdiet. Phasellus mattis mollis arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris pulvinar, urna vel consequat luctus, metus lacus pretium orci, eget pulvinar enim tellus in ligula. Cras eget libero mauris. Sed gravida ex tortor, in molestie nunc euismod ut. Curabitur imperdiet, purus at gravida rutrum, sem nibh tempus odio, ac fermentum ex ipsum et ipsum. Integer nec gravida urna.\r\n\r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Donec eu pharetra tortor. Donec vel fringilla enim. Integer lacinia, nibh mattis aliquam malesuada, sem est suscipit est, eu molestie augue justo et metus. Sed sodales erat vel lectus dignissim volutpat. Maecenas id sagittis nunc. Vivamus imperdiet auctor orci vel consectetur. Maecenas magna justo, tempor vulputate efficitur eu, vehicula vel quam. Morbi erat tellus, iaculis quis nibh eget, imperdiet dignissim ante. Quisque semper arcu tortor, facilisis tincidunt sapien placerat eget. Sed vulputate vel nunc quis consequat.', '[\"images/1685251395-simanta-saha-QMOWBMNN92g-unsplash.jpg\", \"images/1685251395-ebadur-rehman-kaium-SqC8M0eYxEY-unsplash.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`) VALUES
(12, 'Nibir Ahmed', 'admin@admin.com', '0179849001', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(21, 'Customer Ahmed', 'customer@customer.com', '01628715444', 'customer', '91ec1f9324753048c0096d036a694f86');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
