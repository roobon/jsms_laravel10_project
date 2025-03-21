-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 01:11 AM
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
-- Database: `sms_jthfbd_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ziaul Habib', 'roobon@gmail.com', '$2y$10$e8VXZNX3Wdx9cdgwtvULyeAscpSSVEFWHyjUpZQV3NhXgvL1lHYra', 'active', NULL, '2025-03-19 08:27:25', '2025-03-19 08:27:25'),
(2, 'Syed Mahbubul Habib', 'smahbub.bd@gmail.com', '$2y$10$YhSj.V7V/Kdv8TqBT.zaH.ivIUPdF31p0fjUKeKztkOVTWO.L2sJa', 'active', NULL, '2025-03-19 08:27:25', '2025-03-19 08:27:25'),
(3, 'Manager', 'manager@jthfbd.com', '$2y$10$nviVmx1VhH9yPHUxOGF0QuNxJ2ZAcv6r83RNYco.0tFPxbRGCcybC', 'active', NULL, '2025-03-19 08:27:26', '2025-03-19 08:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `launch_date` date NOT NULL,
  `security_money` decimal(12,2) NOT NULL DEFAULT 0.00,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `launch_photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_name`, `launch_date`, `security_money`, `point_id`, `company_id`, `launch_photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SQUARE TOILETRIES @KAZIPARA', '2025-01-01', 100000.00, 1, 1, NULL, 'active', '2025-03-19 08:34:54', '2025-03-20 16:36:03'),
(2, 'SQUARE AND IBRAHIMPUR', '2025-02-01', 100000.00, 2, 1, NULL, 'active', '2025-03-19 08:35:41', '2025-03-19 08:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `business_launch`
--

CREATE TABLE `business_launch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `launch_date` date NOT NULL,
  `security_money` decimal(12,2) NOT NULL DEFAULT 0.00,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `launch_photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `invoice_no` varchar(60) NOT NULL,
  `invoice_date` date NOT NULL,
  `collection_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rest_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `business_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_address`, `contact_person`, `contact_number`, `contact_email`, `website`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SQUARE TOILETRIES', '99041 Gage Village\nNorth Arnoldo, OH 24427', 'Taya Rau', '177181292508', 'roob.shawna@example.org', 'https://www.Iz7uZ.com', NULL, 'active', NULL, NULL),
(2, 'NEWZEALAND DAIRY', '659 George Course\nWest Mossie, OR 47662-5886', 'Doyle Heller', '176924173613', 'jay87@example.net', 'https://www.k3RrJ.com', NULL, 'active', NULL, NULL),
(3, 'KAMAL GEN STORE', '57828 Kling Pass\r\nNew Austin, PA 62694', 'Rowan Wiegand', '170987204762', 'dariana23@example.org', 'https://www.1my7N.com', NULL, 'active', NULL, '2025-03-20 13:21:16'),
(4, 'FAMOUS ENTERPRISE', '14522 Swift Port\r\nNorth Estellview, MI 28975', 'Amelia Turcotte', '176722964155', 'alize.brown@example.net', 'https://www.mUWdg.com', 'images/company/20250319142909.png', 'active', NULL, '2025-03-19 08:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `damage_products`
--

CREATE TABLE `damage_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_num` varchar(255) NOT NULL,
  `claim_date` date NOT NULL,
  `claim_type` enum('replacement','outofpolicy') NOT NULL,
  `claim_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `claim_photo` varchar(255) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `damage_products`
--

INSERT INTO `damage_products` (`id`, `voucher_num`, `claim_date`, `claim_type`, `claim_amount`, `claim_photo`, `business_id`, `company_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'aa22', '2025-03-04', 'replacement', 6000.00, NULL, 1, 1, 2, '2025-03-20 15:33:25', '2025-03-20 15:33:25'),
(2, 'zz221', '2025-03-06', 'outofpolicy', 9000.00, NULL, 1, 3, 2, '2025-03-20 15:34:15', '2025-03-20 15:34:15'),
(3, 'zz22', '2025-03-08', 'replacement', 8000.00, NULL, 1, 3, 2, '2025-03-20 15:35:27', '2025-03-20 15:35:27'),
(4, 'xxz22', '2025-03-09', 'replacement', 15000.00, NULL, 1, 1, 2, '2025-03-20 15:36:24', '2025-03-20 15:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_voucher_num` varchar(255) NOT NULL,
  `deposit_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `deposit_date` date NOT NULL,
  `deposit_photo` varchar(255) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `check_voucher_num`, `deposit_amount`, `deposit_date`, `deposit_photo`, `business_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'dfdf', 150000.00, '2025-03-11', NULL, 1, 2, '2025-03-20 17:31:25', '2025-03-20 17:31:25'),
(2, 'dfd11', 250000.00, '2025-03-07', NULL, 1, 2, '2025-03-20 18:05:02', '2025-03-20 18:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `display_centers`
--

CREATE TABLE `display_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `joining_date` date NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `address`, `dob`, `joining_date`, `contact_number`, `contact_email`, `password`, `photo`, `nid`, `resume`, `point_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Marcos D\'Amore', 'Delivery Man', '395 Woodrow View\nNew Hiram, HI 22416', '2024-11-28', '2024-11-23', '178560850180', 'cassin.candelario@example.net', '$2y$10$xUY7ehUSmXQH3/Lo9bGNcum1xW9fRiI1bORgUWFuCgp7IgdCegAm2', NULL, NULL, NULL, 3, 2, 'active', '2025-03-19 08:27:27', '2025-03-19 08:27:27'),
(2, 'Ms. Christelle Harris IV', 'Manager', '5920 Rebeca Oval\nSouth Augustineborough, AK 78747', '2024-08-30', '2025-03-17', '174336041161', 'okshlerin@example.net', '$2y$10$JXhWtkeZyO43ZU/59/9Z3uB6tSZPWySaGSUEZ15O6XkIxFW3h6tPC', NULL, NULL, NULL, 1, 3, 'active', '2025-03-19 08:27:27', '2025-03-19 08:27:27'),
(3, 'Mr. Rahul Witting DVM', 'Van Driver', '990 Hansen Courts\nBeahanberg, MI 63216', '2025-01-21', '2025-03-04', '175810900166', 'marcos.koss@example.net', '$2y$10$H6XP0n3mAUjPIXlm6Tg6YeD4vMXnFtf9QkkQDUD8tvBCCyUTcCMwG', NULL, NULL, NULL, 3, 4, 'active', '2025-03-19 08:27:27', '2025-03-19 08:27:27'),
(4, 'Davonte Marks', 'Van Driver', '5200 Theresa Throughway\nOpalton, NE 80305-7244', '2024-05-06', '2024-05-25', '177292247915', 'emmanuel.harber@example.org', '$2y$10$jvteYBYHc2JKftcehRLndeoudmTRbj.9Tn4LpJmoRKVeRI3FcTm0u', NULL, NULL, NULL, 1, 1, 'active', '2025-03-19 08:27:27', '2025-03-19 08:27:27'),
(5, 'Ariane Hermann', 'Van Driver', '41264 Myrtice Port\nSouth Maxine, MS 68843', '2024-08-07', '2024-07-21', '176513960711', 'cullen.connelly@example.net', '$2y$10$UJj34POQokfLaZ7w9fHPVe8jKt8eXrQY5XQLi/OdHRuQr4vuyypXO', NULL, NULL, NULL, 2, 1, 'active', '2025-03-19 08:27:27', '2025-03-19 08:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `expire_claims`
--

CREATE TABLE `expire_claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expire_replacements`
--

CREATE TABLE `expire_replacements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `insentives`
--

CREATE TABLE `insentives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `insentive_amount` decimal(10,2) NOT NULL,
  `received_date` date NOT NULL,
  `business_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insentives`
--

INSERT INTO `insentives` (`id`, `insentive_amount`, `received_date`, `business_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 156000.00, '2025-03-12', 1, 1, '2025-03-19 13:27:15', '2025-03-19 13:27:15'),
(2, 42000.00, '2025-03-14', 1, 1, '2025-03-19 13:43:44', '2025-03-19 13:43:44'),
(3, 79000.00, '2025-03-19', 1, 1, '2025-03-20 13:19:54', '2025-03-20 13:19:54'),
(4, 32000.00, '2025-03-20', 1, 3, '2025-03-20 13:20:28', '2025-03-20 13:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `investment_date` date NOT NULL,
  `business_id` int(11) NOT NULL,
  `investment_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `investment_amount`, `investment_date`, `business_id`, `investment_photo`, `created_at`, `updated_at`) VALUES
(1, 300000.00, '2025-01-10', 1, NULL, '2025-03-19 08:36:51', '2025-03-19 08:36:51'),
(2, 200000.00, '2025-01-12', 1, NULL, '2025-03-19 09:02:04', '2025-03-19 09:02:04'),
(3, 700000.00, '2025-02-03', 2, NULL, '2025-03-19 09:02:35', '2025-03-19 09:02:35'),
(4, 300000.00, '2025-02-07', 2, NULL, '2025-03-19 09:03:00', '2025-03-19 09:03:00'),
(5, 200000.00, '2025-03-02', 1, NULL, '2025-03-19 09:33:38', '2025-03-19 09:33:38'),
(6, 150000.00, '2025-03-05', 1, NULL, '2025-03-19 09:34:23', '2025-03-19 09:34:23'),
(7, 300000.00, '2025-03-08', 2, NULL, '2025-03-19 09:35:57', '2025-03-19 09:35:57');

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
(434, '2014_10_12_000000_create_users_table', 1),
(435, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(436, '2019_08_19_000000_create_failed_jobs_table', 1),
(437, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(438, '2024_11_18_063322_create_admins_table', 1),
(439, '2024_11_19_041753_create_doctors_table', 1),
(440, '2024_11_20_042405_create_specialists_table', 1),
(441, '2024_11_27_062123_create_appointments_table', 1),
(442, '2024_12_07_140313_create_companies_table', 1),
(443, '2024_12_10_041705_create_retailers_table', 1),
(444, '2024_12_10_050322_create_points_table', 1),
(445, '2024_12_10_050447_create_employees_table', 1),
(446, '2024_12_10_050535_create_user_permissions_table', 1),
(447, '2024_12_10_050609_create_sales_table', 1),
(448, '2024_12_10_050735_create_payments_table', 1),
(449, '2024_12_10_050755_create_investments_table', 1),
(450, '2024_12_10_050823_create_insentives_table', 1),
(451, '2024_12_10_050909_create_display_centers_table', 1),
(452, '2024_12_10_051040_create_expire_replacements_table', 1),
(453, '2024_12_10_051107_create_expire_claims_table', 1),
(454, '2024_12_15_184458_create_sales_payments_stocks_table', 1),
(455, '2024_12_16_022833_create_targets_table', 1),
(456, '2024_12_20_112137_create_stocks_table', 1),
(457, '2024_12_27_131604_create_retailer_dues_table', 1),
(458, '2024_12_28_053708_create_collections_table', 1),
(459, '2024_12_29_185540_create_sales_returns_table', 1),
(460, '2025_01_06_182406_create_business_launch_table', 1),
(461, '2025_01_10_112128_create_opening_closing_table', 1),
(462, '2025_01_11_083548_create_businesses_table', 1),
(463, '2025_02_07_135340_create_deposits_table', 1),
(464, '2025_03_16_062048_create_damage_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opening_closing`
--

CREATE TABLE `opening_closing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `security_money` decimal(12,2) NOT NULL DEFAULT 0.00,
  `investment_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `bank_deposit_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `product_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `slab_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `vat_adjustment_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `promotion_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `replacement_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `outofpolicy_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `insentive_received_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `damage_sent_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `sales_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collection_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due_realize_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_due_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `ho_deposit_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `report_date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `business_id` int(11) NOT NULL,
  `period` enum('opening','closing') NOT NULL,
  `status` enum('running','ended') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opening_closing`
--

INSERT INTO `opening_closing` (`id`, `security_money`, `investment_amount`, `bank_deposit_amount`, `product_received_amount`, `slab_received_amount`, `vat_adjustment_received_amount`, `promotion_received_amount`, `replacement_received_amount`, `outofpolicy_received_amount`, `insentive_received_amount`, `damage_sent_amount`, `sales_amount`, `collection_amount`, `due_amount`, `due_realize_amount`, `total_due_amount`, `ho_deposit_amount`, `report_date`, `month`, `year`, `business_id`, `period`, `status`, `created_at`, `updated_at`) VALUES
(1, 100000.00, 500000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 1, 'opening', 'ended', NULL, NULL),
(2, 100000.00, 850000.00, 2500000.00, 942000.00, 70000.00, 64000.00, 122000.00, 25000.00, 79000.00, 309000.00, 38000.00, 455000.00, 335000.00, 120000.00, 0.00, 0.00, 400000.00, '2025-03-01', 3, '2025', 1, 'closing', 'running', NULL, '2025-03-20 18:05:02'),
(3, 100000.00, 1000000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 2, 'opening', 'ended', NULL, NULL),
(4, 100000.00, 1300000.00, 800000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 2, 'closing', 'running', NULL, '2025-03-19 09:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transfer_method` enum('banktransfer','rtgs') NOT NULL,
  `cheque_voucher` varchar(60) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` decimal(12,2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payment_note` varchar(100) DEFAULT NULL,
  `cheque_voucher_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transfer_method`, `cheque_voucher`, `payment_date`, `payment_amount`, `company_id`, `business_id`, `employee_id`, `payment_note`, `cheque_voucher_photo`, `created_at`, `updated_at`) VALUES
(1, 'banktransfer', 'dfdf222', '2025-03-07', 600000.00, 1, 1, 2, NULL, NULL, '2025-03-19 09:43:53', '2025-03-19 09:43:53'),
(2, 'banktransfer', 'dfdf22ew', '2025-03-09', 800000.00, 1, 1, 2, NULL, NULL, '2025-03-19 09:45:08', '2025-03-19 09:45:08'),
(3, 'banktransfer', 'dfd222', '2025-03-06', 500000.00, 1, 2, 2, NULL, NULL, '2025-03-19 09:46:48', '2025-03-19 09:46:48'),
(4, 'banktransfer', 'ddf222', '2025-03-08', 300000.00, 1, 2, 2, NULL, NULL, '2025-03-19 09:47:59', '2025-03-19 09:47:59'),
(5, 'banktransfer', 'dfd22', '2025-03-02', 1100000.00, 3, 1, 2, NULL, NULL, '2025-03-19 13:13:10', '2025-03-19 13:13:10');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point_name` varchar(50) NOT NULL,
  `point_address` varchar(255) NOT NULL,
  `opening_date` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `point_name`, `point_address`, `opening_date`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'KAZIPARA CENTER', '164 Sporer Ways\nNorth Noemi, KY 00530-9293', '2024-01-01', NULL, '2025-03-19 08:27:26', '2025-03-19 08:27:26'),
(2, 'IBRAHIMPUR CENTER', '7061 Cummerata Port\nWest Tadburgh, AL 84097-8836', '2024-01-08', NULL, '2025-03-19 08:27:26', '2025-03-19 08:27:26'),
(3, 'KURIL CENTER', '86595 Quincy Squares Apt. 208\nNorth Mariannestad, ME 63551-6999', '2024-01-05', NULL, '2025-03-19 08:27:26', '2025-03-19 08:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(60) NOT NULL,
  `proprietor_name` varchar(50) NOT NULL,
  `market_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) NOT NULL,
  `retailer_code` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `business_starts` date NOT NULL,
  `point_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `delman_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `current_due` decimal(10,2) NOT NULL DEFAULT 0.00,
  `performance` enum('excellent','good','poor') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `shop_name`, `proprietor_name`, `market_name`, `shop_address`, `retailer_code`, `contact_person`, `contact_number`, `contact_email`, `business_starts`, `point_id`, `manager_id`, `delman_id`, `photo`, `current_due`, `performance`, `created_at`, `updated_at`) VALUES
(1, 'Dickens Ltd', 'Prof. Kaden Becker', 'Horacio Sporer Market', '695 DuBuque Terrace Apt. 794\nKameronhaven, AZ 43017', '02CeykbYe9', 'Kattie Dicki', '176770884337', 'jhessel@example.net', '2024-07-29', 1, 4, 5, NULL, 2000.00, 'excellent', '2025-03-19 08:27:26', '2025-03-20 17:15:38'),
(2, 'Kessler-Stroman', 'Miss Callie Windler Jr.', 'Miss Shea Monahan MD Market', '102 Neal Crossing\nSouth Justice, DE 33299', 'TjQ2QwWGTi', 'Charley Lockman I', '176686209585', 'myra35@example.net', '2024-06-02', 3, 4, 8, NULL, 0.00, 'excellent', '2025-03-19 08:27:26', '2025-03-19 08:27:26'),
(3, 'McKenzie, Langworth and Collier', 'Miss Suzanne Larkin', 'Henry Daniel Market', '563 Noelia Extension Apt. 010\nNew Vidalville, NM 91100', 'DIJTekV2cf', 'Mrs. Angelica Schuster', '177020282921', 'yabbott@example.org', '2024-09-15', 2, 4, 8, NULL, 0.00, 'excellent', '2025-03-19 08:27:26', '2025-03-19 08:27:26'),
(4, 'Cole-Christiansen', 'Braxton Lang', 'Prof. Brook Rogahn V Market', '86477 Volkman Shore\nPort Samantha, NM 19828', 'UiwgRthGJL', 'Monty Tromp', '171727546419', 'abshire.pearline@example.net', '2024-06-02', 1, 3, 6, NULL, 0.00, 'excellent', '2025-03-19 08:27:26', '2025-03-19 08:27:26'),
(5, 'Paucek-Kuphal', 'Prof. Scottie McDermott', 'Ellie Murphy Market', '4648 Rosenbaum Forges\nNorth Cleve, WA 57939', 'gop7bRaaq0', 'Gustave Kuhic', '177858992488', 'winona38@example.com', '2024-08-15', 3, 2, 6, NULL, 0.00, 'excellent', '2025-03-19 08:27:26', '2025-03-19 08:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_dues`
--

CREATE TABLE `retailer_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `sales_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `collection_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(255) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailer_dues`
--

INSERT INTO `retailer_dues` (`id`, `retailer_id`, `sales_date`, `invoice_number`, `sales_amount`, `collection_amount`, `due_amount`, `photo`, `business_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-03-03', 'dd333', 10000.00, 8000.00, 2000.00, NULL, 1, 1, '2025-03-20 17:15:38', '2025-03-20 17:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delman_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `collection_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL,
  `sales_date` date NOT NULL,
  `business_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `voucher_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `delman_id`, `total_amount`, `collection_amount`, `due_amount`, `sales_date`, `business_id`, `manager_id`, `voucher_photo`, `created_at`, `updated_at`) VALUES
(1, 1, 50000.00, 35000.00, 15000.00, '2025-03-05', 1, 2, NULL, '2025-03-20 15:38:47', '2025-03-20 15:38:47'),
(2, 1, 70000.00, 45000.00, 25000.00, '2025-03-10', 1, 2, NULL, '2025-03-20 16:37:19', '2025-03-20 16:37:19'),
(3, 1, 60000.00, 40000.00, 20000.00, '2025-03-08', 1, 2, NULL, '2025-03-20 16:50:51', '2025-03-20 16:50:51'),
(4, 1, 150000.00, 120000.00, 30000.00, '2025-03-12', 1, 2, NULL, '2025-03-20 16:52:00', '2025-03-20 16:52:00'),
(5, 1, 50000.00, 40000.00, 10000.00, '2025-03-11', 1, 2, NULL, '2025-03-20 17:14:35', '2025-03-20 17:14:35'),
(6, 1, 75000.00, 55000.00, 20000.00, '2025-03-12', 1, 2, NULL, '2025-03-20 17:20:54', '2025-03-20 17:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `sales_payments_stocks`
--

CREATE TABLE `sales_payments_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ims_target` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collection_target` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `working_days` int(11) NOT NULL,
  `sales_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collection_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `deposit_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collTargetVSdeposit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `startMonthdue` decimal(12,2) NOT NULL DEFAULT 0.00,
  `endMonthdue` decimal(12,2) NOT NULL DEFAULT 0.00,
  `godownstock` decimal(12,2) NOT NULL DEFAULT 0.00,
  `ledgerDue` decimal(12,2) NOT NULL DEFAULT 0.00,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE `sales_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memo_number` varchar(30) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `memo_photo` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `product_amount` decimal(10,2) NOT NULL,
  `received_date` date NOT NULL,
  `product_type` enum('normal','slab','vatadjust','mktpromo','replacement','out_of_policy') NOT NULL,
  `invoice_photo` varchar(255) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `invoice_number`, `invoice_date`, `product_amount`, `received_date`, `product_type`, `invoice_photo`, `business_id`, `company_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(2, 'dfdd222', '2025-03-05', 125000.00, '2025-03-05', 'normal', NULL, 1, 1, 2, '2025-03-19 10:44:54', '2025-03-19 10:44:54'),
(3, 'dfd222', '2025-03-05', 50000.00, '2025-03-06', 'slab', NULL, 1, 1, 2, '2025-03-19 10:46:15', '2025-03-19 10:46:15'),
(4, 'ddfd22', '2025-03-06', 30000.00, '2025-03-08', 'vatadjust', NULL, 1, 1, 2, '2025-03-19 10:55:28', '2025-03-19 10:55:28'),
(5, 'fdfd22w', '2025-03-08', 80000.00, '2025-03-09', 'mktpromo', NULL, 1, 1, 2, '2025-03-19 10:56:52', '2025-03-19 10:56:52'),
(6, 'fgf22', '2025-03-10', 180000.00, '2025-03-11', 'normal', NULL, 1, 1, 2, '2025-03-19 11:18:34', '2025-03-19 11:18:34'),
(7, 'dfd11', '2025-03-10', 20000.00, '2025-03-11', 'slab', NULL, 1, 1, 2, '2025-03-19 11:26:25', '2025-03-19 11:26:25'),
(8, 'dfdf22', '2025-03-10', 20000.00, '2025-03-11', 'mktpromo', NULL, 1, 1, 2, '2025-03-19 12:30:21', '2025-03-19 12:30:21'),
(10, 'xx222', '2025-03-10', 9000.00, '2025-03-11', 'replacement', NULL, 1, 1, 2, '2025-03-19 12:46:32', '2025-03-19 12:46:32'),
(11, 'hh33', '2025-03-13', 32000.00, '2025-03-14', 'out_of_policy', NULL, 1, 1, 2, '2025-03-19 12:53:08', '2025-03-19 12:53:08'),
(12, 'dd22', '2025-03-11', 47000.00, '2025-03-12', 'out_of_policy', NULL, 1, 1, 2, '2025-03-19 12:54:04', '2025-03-19 12:54:04'),
(13, 'hh44', '2025-03-18', 16000.00, '2025-03-19', 'replacement', NULL, 1, 1, 2, '2025-03-19 12:55:04', '2025-03-19 12:55:04'),
(14, 'ffq2', '2025-03-10', 34000.00, '2025-03-11', 'vatadjust', NULL, 1, 1, 2, '2025-03-19 12:57:55', '2025-03-19 12:57:55'),
(15, 'ss33', '2025-03-08', 600000.00, '2025-03-08', 'normal', NULL, 1, 3, 2, '2025-03-19 13:14:43', '2025-03-19 13:14:43'),
(16, 'dfd11', '2025-03-06', 37000.00, '2025-03-06', 'normal', NULL, 1, 1, 2, '2025-03-20 13:27:14', '2025-03-20 13:27:14'),
(17, 'xzzz1', '2025-03-19', 22000.00, '2025-03-20', 'mktpromo', NULL, 1, 3, 2, '2025-03-20 15:53:21', '2025-03-20 15:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ims_target` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collection_target` int(11) NOT NULL,
  `working_days` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `start_date`, `end_date`, `ims_target`, `collection_target`, `working_days`, `business_id`, `created_at`, `updated_at`) VALUES
(1, '2025-03-01', '2025-03-31', 600000.00, 95, 25, 1, '2025-03-19 09:04:24', '2025-03-19 09:04:24'),
(2, '2025-03-01', '2025-03-31', 700000.00, 95, 25, 2, '2025-03-19 09:06:00', '2025-03-19 09:06:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_launch`
--
ALTER TABLE `business_launch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_products`
--
ALTER TABLE `damage_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `display_centers`
--
ALTER TABLE `display_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expire_claims`
--
ALTER TABLE `expire_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expire_replacements`
--
ALTER TABLE `expire_replacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insentives`
--
ALTER TABLE `insentives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_closing`
--
ALTER TABLE `opening_closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_dues`
--
ALTER TABLE `retailer_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_payments_stocks`
--
ALTER TABLE `sales_payments_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_returns`
--
ALTER TABLE `sales_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_launch`
--
ALTER TABLE `business_launch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `damage_products`
--
ALTER TABLE `damage_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `display_centers`
--
ALTER TABLE `display_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expire_claims`
--
ALTER TABLE `expire_claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expire_replacements`
--
ALTER TABLE `expire_replacements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insentives`
--
ALTER TABLE `insentives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `opening_closing`
--
ALTER TABLE `opening_closing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retailer_dues`
--
ALTER TABLE `retailer_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_payments_stocks`
--
ALTER TABLE `sales_payments_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
