-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 01:34 AM
-- Server version: 5.7.44-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOpened` date NOT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `shopId`, `branchId`, `branchName`, `address1`, `address2`, `dateOpened`, `type`, `notes`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'mandaueT01', 'danaoDB01', 'Try This Shop 1', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 21:44:25', '2024-01-04 21:44:25'),
(2, 'mandaueT01', 'danaoDB02', 'Try This Shop 2', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 21:45:39', '2024-01-04 21:45:39'),
(3, 'mandaueT01', 'danaoDB03', 'Try This Shop 3', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 21:45:52', '2024-01-04 21:45:52'),
(4, 'mandaueD01', 'delsanDB01', 'Delsan Delsan 1', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 22:09:55', '2024-01-04 22:09:55'),
(5, 'mandaueD01', 'delsanDB02', 'Delsan Delsan 2', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 22:10:07', '2024-01-04 22:10:07'),
(6, 'mandaueD01', 'delsanDB03', 'Delsan Delsan 3', 'Amoa', 'Ilaha', '2023-11-28', '1', 'good notes', 'good remark', '2024-01-04 22:10:15', '2024-01-04 22:10:15'),
(7, 'mandaueD01', 'delsanDB07', 'Delsan Business Innovation Corporations', 'Paknaan Mandaue', 'Mandaue City', '2024-01-22', '1', 'very good good notes', 'very good good remarks', '2024-01-18 00:29:23', '2024-01-25 19:09:36'),
(8, 'mandaueT01', 'danaoDB04', 'Try This Shop 4', 'Danao', 'Cebu City', '2024-01-18', '1', 'good notes', 'good remark', '2024-01-18 01:17:46', '2024-01-18 01:17:46'),
(9, 'mandaueD01', 'delsanDB04', 'Delsan04', 'Paknaan', 'Mandaue', '2024-01-27', '1', 'Notes', 'Remarks', '2024-01-26 16:57:27', '2024-01-26 16:57:27'),
(10, 'mandaueD01', 'delsanDB05', 'Delsan05', 'Paknaan', 'Mandaue', '2024-01-25', '1', 'Notes', 'Remarks', '2024-01-26 17:00:33', '2024-01-26 17:00:33'),
(11, 'mandaueD01', 'delsanDB06', 'LOCUS INTERNATIONAL CENTRE FOR ENTREPRENEURSHIP', 'Paknaan, Mandaue City, Cebu, 6001', 'Mandaue City', '2024-01-30', '1', 'Notes', 'Remarks', '2024-01-30 17:04:51', '2024-01-30 17:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `branchsales`
--

CREATE TABLE `branchsales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` decimal(12,2) NOT NULL,
  `closedBy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `TotalStaff` int(11) NOT NULL,
  `totalSlip` int(11) NOT NULL,
  `TotalLoadQty` int(11) NOT NULL,
  `totalLoadAmt` decimal(10,2) NOT NULL,
  `totalsales` decimal(10,2) NOT NULL,
  `totalDetergent` decimal(10,2) NOT NULL,
  `totalFabcon` decimal(10,2) NOT NULL,
  `totalBleach` decimal(10,2) NOT NULL,
  `totalBounce` decimal(10,2) NOT NULL,
  `totalBabad` decimal(10,2) NOT NULL,
  `totalPerla` decimal(10,2) NOT NULL,
  `totalDryClean` decimal(10,2) NOT NULL,
  `totalOther` decimal(10,2) NOT NULL,
  `totalFood` decimal(10,2) NOT NULL,
  `totalBeverage` decimal(10,2) NOT NULL,
  `totalLunch` decimal(10,2) NOT NULL,
  `totalExpOther` decimal(10,2) NOT NULL,
  `totalExtraExpense` decimal(10,2) NOT NULL,
  `totalNetSales` decimal(10,2) NOT NULL,
  `totalCashpaid` decimal(10,2) NOT NULL,
  `totalCashclaimed` decimal(10,2) NOT NULL,
  `totalCashtoday` decimal(10,2) NOT NULL,
  `totalCashout` decimal(10,2) NOT NULL,
  `totalCashtomorrow` decimal(10,2) NOT NULL,
  `totalGcashpaid` decimal(10,2) NOT NULL,
  `totalGcashclaimed` decimal(10,2) NOT NULL,
  `totalBankpaid` decimal(10,2) NOT NULL,
  `totalBankclaimed` decimal(10,2) NOT NULL,
  `totalBankpayment` decimal(10,2) NOT NULL,
  `totalUnpaidtoday` decimal(10,2) NOT NULL,
  `TotalpdSales` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vip` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trancount` int(11) NOT NULL,
  `totalsales` decimal(10,2) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_11_24_005012_create_shop_table', 1),
(5, '2023_11_24_005048_create_branch_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(8, '2024_02_22_090151_create_customers_table', 3),
(9, '2024_02_22_090320_create_sliptransactions_table', 4),
(10, '2024_02_22_090300_create_branchsales_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shopId`, `shopName`, `address1`, `address2`, `notes`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'mandaueT01', 'Try This Shop Mandaue', 'Mandaue City Cebu', 'Poblacion Mandaue', 'good notes', 'good remark', '2024-01-04 21:43:01', '2024-01-04 21:43:01'),
(2, 'mandaueD01', 'Delsan Delsan', 'Mandaue City Cebu', 'Poblacion Mandaue', 'good notes', 'good remark', '2024-01-04 21:46:52', '2024-01-04 21:46:52'),
(5, 'mandaueD02', 'DBIC Tech', 'Mandaue City Cebu', 'Poblacion Mandaue', 'good notes', 'good remark', '2024-01-04 21:48:07', '2024-01-04 21:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliptransactions`
--

CREATE TABLE `sliptransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `custId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receivedBy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receivedDateTime` datetime NOT NULL,
  `slipno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceType` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loadsqty` decimal(10,2) NOT NULL,
  `loadsAmount` decimal(10,2) NOT NULL,
  `loadsTotal` decimal(10,2) NOT NULL,
  `detergentQty` decimal(10,2) NOT NULL,
  `detergentAmount` decimal(10,2) NOT NULL,
  `detergentTotal` decimal(10,2) NOT NULL,
  `fabconQty` decimal(10,2) NOT NULL,
  `fabconAmount` decimal(10,2) NOT NULL,
  `fabconTotal` decimal(10,2) NOT NULL,
  `bleachAty` decimal(10,2) NOT NULL,
  `bleachAmount` decimal(10,2) NOT NULL,
  `bleachTotal` decimal(10,2) NOT NULL,
  `bounceAty` decimal(10,2) NOT NULL,
  `bounceAmount` decimal(10,2) NOT NULL,
  `bounceTotal` decimal(10,2) NOT NULL,
  `babadQty` decimal(10,2) NOT NULL,
  `babadAmount` decimal(10,2) NOT NULL,
  `babadTotal` decimal(10,2) NOT NULL,
  `perlaQty` decimal(10,2) NOT NULL,
  `perlAmount` decimal(10,2) NOT NULL,
  `perlaTotal` decimal(10,2) NOT NULL,
  `dryQty` decimal(10,2) NOT NULL,
  `dryAmount` decimal(10,2) NOT NULL,
  `dryTotal` decimal(10,2) NOT NULL,
  `othersQty` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `restriction` json DEFAULT NULL,
  `dateHired` date NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shopId`, `empId`, `lastName`, `firstName`, `middleName`, `password`, `status`, `restriction`, `dateHired`, `salary`, `notes`, `remark`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'mandaueT01', 'emp_01', 'Balbon', 'Jan', 'Ohaha', '$2y$12$oAvBxFICVXCs2/jckNBI9.ea0zDUmxuWUqtrh6uhUb8DC8klDXUKi', 'active', NULL, '2024-01-12', 50000.00, 'good', 'qwe', NULL, '2024-01-11 21:33:11', '2024-01-11 21:33:11'),
(4, 'mandaueD01', 'admin', 'Balbon', 'Jan', 'Ohaha', '$2y$12$ihBSnPFuJ72ADi85jfV9Oe.eLpkIcjpvZdUQ1.QpXgafSMnRHPfsm', 'active', NULL, '2024-01-12', 50000.00, 'good', 'qwe', NULL, '2024-01-11 21:47:23', '2024-01-11 21:47:23'),
(6, 'mandaueD01', 'emp_02', 'Balbon', 'Jan', 'Ohaha', '$2y$12$vL1SV7Lf60D2hFaQTkZ.HOdU7o8scOKjC.BCGE5j5P3Km/8wseOXK', 'active', '[\"delsanDB07\"]', '2024-01-12', 50000.00, 'good', 'qwe', NULL, '2024-01-11 22:54:01', '2024-01-11 22:54:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_branchid_unique` (`branchId`);

--
-- Indexes for table `branchsales`
--
ALTER TABLE `branchsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_shopid_unique` (`shopId`);

--
-- Indexes for table `sliptransactions`
--
ALTER TABLE `sliptransactions`
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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `branchsales`
--
ALTER TABLE `branchsales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliptransactions`
--
ALTER TABLE `sliptransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
