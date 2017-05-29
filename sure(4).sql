-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2017 at 02:52 PM
-- Server version: 10.1.14-MariaDB
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sure`
--

-- --------------------------------------------------------

--
-- Table structure for table `caveats`
--

CREATE TABLE `caveats` (
  `id` int(10) UNSIGNED NOT NULL,
  `Caveat_Date` date NOT NULL,
  `Caveat_Ref` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Enquiry_Details` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LR_No` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `LRNo_Block` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `IR_IC_Nos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Size` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'In Hectares',
  `Town` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Document_Uploads` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Publish_date` date DEFAULT NULL,
  `Publish_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `caveats`
--

INSERT INTO `caveats` (`id`, `Caveat_Date`, `Caveat_Ref`, `Description`, `Enquiry_Details`, `LR_No`, `LRNo_Block`, `IR_IC_Nos`, `Size`, `Town`, `Document_Uploads`, `Publish_date`, `Publish_status`, `created_at`, `updated_at`) VALUES
(1, '2017-01-10', 'Caveat Ref', 'Desc.', 'Enq. Details', 'LRNO.', 'LRNOBlock', 'IRICNos', '123', 'Nairobi', 'KibakiCharlesWatsonNdethiCV2016 (1).pdf', NULL, 0, '2017-01-18 04:20:58', '2017-01-18 04:20:58'),
(2, '2017-01-10', 'Caveat Ref', 'Desc.', 'Enq', 'LRN', 'NEN', 'IRIC', '123', 'Nairobi', 'KibakiCharlesWatsonNdethiCV2016 (1).pdf', NULL, 0, '2017-01-18 08:57:43', '2017-01-18 08:57:43'),
(3, '2017-01-10', 'Caveat Ref', 'Description', 'Enq Details', 'LR N', 'LRNB', 'IRICN', '123', 'Nairobi', 'KibakiCharlesWatsonNdethiCV2016 (1).pdf', NULL, 0, '2017-01-18 09:32:35', '2017-01-18 09:32:35'),
(4, '2017-01-10', 'Caveat Ref', 'Description', 'Enq Details', 'LR N', 'LRNB', 'IRICN', '123', 'Nairobi', 'KibakiCharlesWatsonNdethiCV2016 (1).pdf', NULL, 0, '2017-01-18 09:35:16', '2017-01-18 09:35:16'),
(5, '2017-01-10', 'Caveat Ref', 'Desc', 'Enq Details', 'LRNO', 'LRNoBlock', 'iRCICN', '12', 'Nairobi', 'KibakiCharlesWatsonNdethiCV2016 (1).pdf', NULL, 0, '2017-01-18 09:39:21', '2017-01-18 09:39:21'),
(6, '2017-01-11', 'Caveat Ref', 'Description', 'Enq.', 'LR No', 'LRNB', 'IRIC', '123', 'Nairobi', 'Balsamiq Mockups 3.exe', NULL, 0, '2017-01-19 03:33:09', '2017-01-19 03:33:09'),
(7, '2017-01-19', 'Caveat Ref', 'Description', 'Enq. Details', 'LRNo', 'LRNo Block', 'IRICNos', '12', 'Nairobi', 'KEVIN MWANGI NDITIKA.docx', NULL, 0, '2017-01-19 05:45:38', '2017-01-19 05:45:38'),
(8, '2017-01-10', 'Caveat Ref', 'Desc', 'Enq.', 'LRNo', 'LRNB', 'IRIC', '123', 'Nairobi', 'KEVIN MWANGI NDITIKA.docx', NULL, 0, '2017-01-19 10:03:58', '2017-01-19 10:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `Plan_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Alias` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Annual_Rate` double(15,8) NOT NULL,
  `Monthly_Rate` double(15,8) NOT NULL,
  `Notices` int(11) NOT NULL,
  `trial_period` int(11) NOT NULL COMMENT 'In Days',
  `Plan_Details` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `Plan_Name`, `Alias`, `Annual_Rate`, `Monthly_Rate`, `Notices`, `trial_period`, `Plan_Details`, `created_at`, `updated_at`) VALUES
(1, 'Jaribu Plan', 'jaribu', 30000.00000000, 3000.00000000, 5, 30, 'Entry Level', NULL, NULL),
(2, 'Hakika Plan', 'hakika', 50000.00000000, 5000.00000000, 10, 30, 'Intermediate', NULL, NULL),
(3, 'Wezesha Plan', 'wezesha', 250000.00000000, 30000.00000000, 75, 30, 'Pro', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `abbrev` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `caveats_balance` int(11) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `trial_notices` int(11) NOT NULL DEFAULT '3',
  `trial_start_date` date DEFAULT NULL,
  `trial_end_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `plan_id`, `user_id`, `payment_id`, `caveats_balance`, `approved`, `trial_notices`, `trial_start_date`, `trial_end_date`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 10, 0, 0, NULL, NULL, NULL, NULL, '2017-01-18 05:36:35', '2017-01-18 05:36:35'),
(2, 1, 2, NULL, 5, 0, 0, NULL, NULL, NULL, NULL, '2017-01-18 09:02:30', '2017-01-18 09:02:30'),
(3, 1, 2, NULL, 5, 0, 0, NULL, NULL, NULL, NULL, '2017-01-18 09:16:37', '2017-01-18 09:16:37'),
(4, 2, 2, NULL, 10, 0, 0, NULL, NULL, NULL, NULL, '2017-01-18 09:18:03', '2017-01-18 09:18:03'),
(5, 1, 3, NULL, 5, 0, 3, '2017-09-08', '1970-01-01', NULL, NULL, '2017-01-19 05:47:37', '2017-01-19 05:47:37'),
(6, 1, 3, NULL, 5, 0, 3, '2017-01-19', '2017-01-19', NULL, NULL, '2017-01-19 10:14:38', '2017-01-19 10:14:38'),
(7, 1, 3, NULL, 5, 0, 3, '2017-01-19', '2017-02-18', NULL, NULL, '2017-01-19 10:23:00', '2017-01-19 10:23:00'),
(8, 1, 3, NULL, 5, 0, 3, '2017-01-19', '2017-02-18', NULL, NULL, '2017-01-19 10:28:07', '2017-01-19 10:28:07'),
(9, 1, 3, NULL, 5, 0, 3, '2017-01-19', '2017-02-18', NULL, NULL, '2017-01-19 10:43:40', '2017-01-19 10:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `user_type_id` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `user_type_id`, `password`, `confirmation_token`, `confirmed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Watson', 'watkibx@gmail.com', 1, 1, '$2y$10$KP1NAv5svgoWaq.hbjQXGeJG/A3cYO9T5E0Pfd79cPO1LnhgOVeP.', NULL, 1, NULL, '2017-01-18 04:20:59', '2017-01-18 04:21:33'),
(2, 'Watson', 'ndethiw@gmail.com', 1, 1, '$2y$10$5bLuWyqgOYHQD8aonESUiOMv35wnZGNLo3WL2nUe4HBW2Nix0G.RK', NULL, 1, NULL, '2017-01-18 08:57:45', '2017-01-18 08:59:57'),
(3, 'Watson', 'wndethi@gmail.com', 1, 1, '$2y$10$0dVwdjYIMSWu8rdf3rrb4OI6z4mnYenPfg5KBNs4MfPnu8V1bBwWm', NULL, 1, NULL, '2017-01-19 05:45:38', '2017-01-19 05:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_caveats`
--

CREATE TABLE `user_caveats` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `caveat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_caveats`
--

INSERT INTO `user_caveats` (`id`, `email`, `caveat_id`) VALUES
(1, 'watkibx@gmail.com', 1),
(2, 'ndethiw@gmail.com', 2),
(3, 'ndethiw@gmail.com', 5),
(4, 'watkibx@gmail.com', 6),
(5, 'wndethi@gmail.com', 7),
(6, 'wndethi@gmail.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_social`
--

CREATE TABLE `user_social` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caveats`
--
ALTER TABLE `caveats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_caveats`
--
ALTER TABLE `user_caveats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social`
--
ALTER TABLE `user_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caveats`
--
ALTER TABLE `caveats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_caveats`
--
ALTER TABLE `user_caveats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_social`
--
ALTER TABLE `user_social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
