-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2025 at 12:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinite_survey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baseline_information`
--

CREATE TABLE `baseline_information` (
  `baseline_info_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cookstove_type` varchar(255) NOT NULL DEFAULT 'Gas',
  `photo_cookstove` varchar(255) DEFAULT NULL,
  `no_of_meals` varchar(255) NOT NULL DEFAULT '350 to 600 calories each',
  `avg_time_per_meal` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL DEFAULT 'wood',
  `prob_procured` varchar(255) NOT NULL,
  `purchase_receipts` varchar(255) NOT NULL,
  `fuel_amount` varchar(255) NOT NULL,
  `problems_current_cookstove` varchar(255) NOT NULL,
  `status` enum('Pending','Accepted','Cancel') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baseline_information`
--

INSERT INTO `baseline_information` (`baseline_info_id`, `beneficiary_id`, `cookstove_type`, `photo_cookstove`, `no_of_meals`, `avg_time_per_meal`, `fuel_type`, `prob_procured`, `purchase_receipts`, `fuel_amount`, `problems_current_cookstove`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Induction', 'upload/1760591947.png', 'between 150 and 200 calories each', '20', 'char-coal', 'test', 'Yes', '20', 'test', 'Pending', '2025-10-15 23:49:07', '2025-10-15 23:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_data`
--

CREATE TABLE `beneficiary_data` (
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `age` int(11) NOT NULL,
  `fmly_members` int(11) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `avg_mnthly_incm` int(11) NOT NULL,
  `vlg_name` varchar(255) NOT NULL,
  `teh_or_block_name` varchar(255) NOT NULL,
  `panchayat_name` varchar(255) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `b_img` varchar(255) DEFAULT NULL,
  `b_mobile` int(11) NOT NULL,
  `b_mo_adhr_or_smgr_no` int(11) NOT NULL,
  `status` enum('Pending','Accepted','Cancel') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiary_data`
--

INSERT INTO `beneficiary_data` (`beneficiary_id`, `b_name`, `father_name`, `gender`, `age`, `fmly_members`, `occupation`, `avg_mnthly_incm`, `vlg_name`, `teh_or_block_name`, `panchayat_name`, `district_name`, `state_name`, `b_img`, `b_mobile`, `b_mo_adhr_or_smgr_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mack', 'john', 'Male', 25, 4, 'Engineer', 20000, 'Kotra', 'Huzur', 'Gram Panchayat', 'Kolar', 'Dehli', 'upload/1760591816.png', 11111111, 1212121212, 'Pending', '2025-10-15 23:46:56', '2025-10-15 23:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_073441_create_products_table', 1),
(6, '2023_10_03_170755_add_deleted_at_to_products_table', 1),
(7, '2023_10_04_074659_create_beneficiary_data_table', 1),
(8, '2023_10_05_060511_create_baseline_information_table', 1),
(9, '2023_10_05_061416_create_ujwala_scheme_details_table', 1),
(10, '2023_10_25_111243_create_test_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ujwala_scheme_details`
--

CREATE TABLE `ujwala_scheme_details` (
  `usd_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avail_lpg` varchar(255) NOT NULL,
  `no_of_cylinders` int(11) NOT NULL,
  `use_lpg_inaday` int(11) NOT NULL,
  `months_onelpg_last` int(11) NOT NULL,
  `pay_one_lpg` int(11) NOT NULL,
  `it_affordabale` varchar(255) NOT NULL,
  `use_traditional_cookstove` varchar(255) NOT NULL,
  `prob_face_lpg` varchar(255) NOT NULL,
  `status` enum('Pending','Accepted','Cancel') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujwala_scheme_details`
--

INSERT INTO `ujwala_scheme_details` (`usd_id`, `beneficiary_id`, `avail_lpg`, `no_of_cylinders`, `use_lpg_inaday`, `months_onelpg_last`, `pay_one_lpg`, `it_affordabale`, `use_traditional_cookstove`, `prob_face_lpg`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Electric Stove', 1, 2, 2, 6, 'Yes', 'Yes', 'test', 'Pending', '2025-10-15 23:49:30', '2025-10-15 23:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baseline_information`
--
ALTER TABLE `baseline_information`
  ADD PRIMARY KEY (`baseline_info_id`),
  ADD KEY `baseline_information_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `beneficiary_data`
--
ALTER TABLE `beneficiary_data`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujwala_scheme_details`
--
ALTER TABLE `ujwala_scheme_details`
  ADD PRIMARY KEY (`usd_id`),
  ADD KEY `ujwala_scheme_details_beneficiary_id_foreign` (`beneficiary_id`);

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
-- AUTO_INCREMENT for table `baseline_information`
--
ALTER TABLE `baseline_information`
  MODIFY `baseline_info_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary_data`
--
ALTER TABLE `beneficiary_data`
  MODIFY `beneficiary_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujwala_scheme_details`
--
ALTER TABLE `ujwala_scheme_details`
  MODIFY `usd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baseline_information`
--
ALTER TABLE `baseline_information`
  ADD CONSTRAINT `baseline_information_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary_data` (`beneficiary_id`);

--
-- Constraints for table `ujwala_scheme_details`
--
ALTER TABLE `ujwala_scheme_details`
  ADD CONSTRAINT `ujwala_scheme_details_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary_data` (`beneficiary_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
