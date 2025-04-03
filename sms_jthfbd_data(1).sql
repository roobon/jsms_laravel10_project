-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 12:55 AM
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
(1, 'Ziaul Habib', 'roobon@gmail.com', '$2y$10$3ZX6Ff8QRNjKoiXkN1KPsON/owxB2PSWML9YEtS8XfCoFXrXBSmWi', 'active', NULL, '2025-03-22 13:02:25', '2025-03-22 13:02:25'),
(2, 'Syed Mahbubul Habib', 'smahbub.bd@gmail.com', '$2y$10$Kb3JmmvejWypv3IOeFoKM.e2KmbWtycIuH0UhDEBjS3dlmmfm8r4W', 'active', NULL, '2025-03-22 13:02:25', '2025-03-22 13:02:25'),
(3, 'Manager', 'manager@jthfbd.com', '$2y$10$W9JnddPW68gwedAuUE5MceNR0Me.ntrAmTOjvWqylfz8PpJ0tbDoO', 'active', NULL, '2025-03-22 13:02:25', '2025-03-22 13:02:25');

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
(1, 'SQUARE TOILETRIES @KAZIPARA', '2025-01-01', 100000.00, 1, 1, NULL, 'active', '2025-03-22 13:03:53', '2025-03-22 13:03:53'),
(2, 'SQUARE TOILETRIES @IBRAHIMPUR', '2025-02-01', 100000.00, 2, 1, NULL, 'active', '2025-03-24 09:13:32', '2025-03-24 09:13:32');

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
(1, 'SQUARE TOILETRIES', '7596 Dicki Plaza\nLake Anne, SD 84272', 'Justus Schroeder', '177471784462', 'sokon@example.net', 'https://www.imtAj.com', NULL, 'active', NULL, NULL),
(2, 'NEWZEALAND DAIRY', '9174 Johns Mews Suite 705\nGleasonmouth, IA 71177', 'Krystina Boehm', '174159396479', 'dejah.tromp@example.net', 'https://www.oTchJ.com', NULL, 'active', NULL, NULL),
(3, 'KAMAL GENERAL STORE', '3255 Samantha Inlet\nEast Theronton, IL 62387-3443', 'Dr. Laurine Morissette DVM', '175839111523', 'vhalvorson@example.com', 'https://www.heFaY.com', NULL, 'active', NULL, NULL),
(4, 'FAMOUS ENTERPRISE', '113 Keeling Drive Suite 064\nGinofort, CA 80513-3274', 'Ofelia Morar', '170658110246', 'cruickshank.dameon@example.net', 'https://www.Uobq5.com', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `damage_products`
--

CREATE TABLE `damage_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `factory_name` varchar(255) NOT NULL,
  `chalan_date` date NOT NULL,
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

INSERT INTO `damage_products` (`id`, `factory_name`, `chalan_date`, `claim_type`, `claim_amount`, `claim_photo`, `business_id`, `company_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'ddfd', '2025-03-07', 'replacement', 20000.00, NULL, 1, 1, 1, '2025-03-22 13:07:16', '2025-03-22 13:07:16'),
(2, 'dfadfd', '2025-03-10', 'outofpolicy', 10000.00, NULL, 1, 1, 1, '2025-03-22 13:08:05', '2025-03-22 13:08:05'),
(3, 'dfdfd', '2025-03-11', 'replacement', 78000.00, NULL, 1, 1, 1, '2025-03-22 14:00:46', '2025-03-22 14:00:46'),
(4, 'dfd', '2025-03-14', 'outofpolicy', 94000.00, NULL, 1, 1, 1, '2025-03-22 14:01:42', '2025-03-22 14:01:42');

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
(1, 'dfdfd33', 500000.00, '2025-03-13', NULL, 1, 1, '2025-03-22 14:23:03', '2025-03-22 14:23:03'),
(2, 'dfdf22', 200000.00, '2025-03-14', NULL, 1, 1, '2025-03-22 14:25:24', '2025-03-22 14:25:24'),
(3, 'dfd222', 250000.00, '2025-03-16', NULL, 1, 1, '2025-03-22 14:26:34', '2025-03-22 14:26:34');

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
(1, 'Trevor Kihn', 'Manager', '680 Retha Prairie\nVandervortmouth, WV 57235', '2024-11-06', '2024-10-04', '176159818505', 'americo38@example.org', '$2y$10$ULPmRLGXMcF4qfo/NrFmheEE.RPKwVTUC8qCgH6XtNKs4nKO02OUu', NULL, NULL, NULL, 1, 1, 'active', '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(2, 'Reyes Morissette', 'Delivery Man', '89688 Stan Junction Suite 698\nKelsistad, MT 35545', '2024-04-03', '2024-07-27', '171222669964', 'kcremin@example.com', '$2y$10$BepEjkM6ers3X5VWCC3QaO8aiFV90WiLCsslPRqUP4kj4cpiR/CNC', NULL, NULL, NULL, 3, 2, 'active', '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(3, 'Mr. Brett Reynolds', 'Delivery Man', '674 Jeanne Lights\nNew Eda, MS 30418', '2024-04-04', '2024-11-01', '171708925097', 'lking@example.com', '$2y$10$bk8OZhKg2rh7LwXJ0o9R3.101H8ogpKVRcFdnAtdGNpEywbVB.Dye', NULL, NULL, NULL, 3, 4, 'active', '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(4, 'Dr. Carey Wehner DDS', 'Van Driver', '74093 Eldon Well\nJackelinestad, OK 83478', '2024-07-16', '2024-12-19', '179150092896', 'monserrate66@example.org', '$2y$10$Jg3aUZsuZu0nnV8J8PFyBeYLVpGVSngKefRLS.x4NkJlB1vaI/6Ym', NULL, NULL, NULL, 1, 4, 'active', '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(5, 'Gino Willms', 'Manager', '4527 Norval Throughway Apt. 578\nMaudiemouth, MI 63075-8449', '2024-06-29', '2024-09-12', '175606444007', 'coy27@example.com', '$2y$10$B9nvdfqFHqHWAiQrGcf0D.xqdZLyDBIzJzA2GT.WCkcwrqaETZU6e', NULL, NULL, NULL, 3, 3, 'active', '2025-03-22 13:02:26', '2025-03-22 13:02:26');

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
  `incentive_month` date NOT NULL,
  `received_date` date NOT NULL,
  `business_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insentives`
--

INSERT INTO `insentives` (`id`, `insentive_amount`, `incentive_month`, `received_date`, `business_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 50000.00, '2025-02-00', '2025-03-05', 1, 1, '2025-03-22 13:06:25', '2025-03-22 13:06:25'),
(2, 150000.00, '2025-01-00', '2025-03-15', 1, 1, '2025-03-22 14:02:36', '2025-03-22 14:02:36');

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
(1, 300000.00, '2025-01-02', 1, NULL, '2025-03-22 13:04:27', '2025-03-22 13:04:27'),
(2, 500000.00, '2025-02-07', 1, NULL, '2025-03-22 13:04:44', '2025-03-22 13:04:44'),
(3, 200000.00, '2025-03-06', 1, NULL, '2025-03-22 13:29:34', '2025-03-22 13:29:34'),
(4, 150000.00, '2025-03-08', 1, NULL, '2025-03-22 13:30:11', '2025-03-22 13:30:11'),
(5, 250000.00, '2025-03-06', 1, NULL, '2025-03-22 13:30:53', '2025-03-22 13:30:53');

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
(470, '2014_10_12_000000_create_users_table', 1),
(471, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(472, '2019_08_19_000000_create_failed_jobs_table', 1),
(473, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(474, '2024_11_18_063322_create_admins_table', 1),
(475, '2024_11_19_041753_create_doctors_table', 1),
(476, '2024_11_20_042405_create_specialists_table', 1),
(477, '2024_11_27_062123_create_appointments_table', 1),
(478, '2024_12_07_140313_create_companies_table', 1),
(479, '2024_12_10_041705_create_retailers_table', 1),
(480, '2024_12_10_050322_create_points_table', 1),
(481, '2024_12_10_050447_create_employees_table', 1),
(482, '2024_12_10_050535_create_user_permissions_table', 1),
(483, '2024_12_10_050609_create_sales_table', 1),
(484, '2024_12_10_050735_create_payments_table', 1),
(485, '2024_12_10_050755_create_investments_table', 1),
(486, '2024_12_10_050823_create_insentives_table', 1),
(487, '2024_12_10_050909_create_display_centers_table', 1),
(488, '2024_12_10_051040_create_expire_replacements_table', 1),
(489, '2024_12_10_051107_create_expire_claims_table', 1),
(490, '2024_12_15_184458_create_sales_payments_stocks_table', 1),
(491, '2024_12_16_022833_create_targets_table', 1),
(492, '2024_12_20_112137_create_stocks_table', 1),
(493, '2024_12_27_131604_create_retailer_dues_table', 1),
(494, '2024_12_28_053708_create_collections_table', 1),
(495, '2024_12_29_185540_create_sales_returns_table', 1),
(496, '2025_01_06_182406_create_business_launch_table', 1),
(497, '2025_01_10_112128_create_opening_closing_table', 1),
(498, '2025_01_11_083548_create_businesses_table', 1),
(499, '2025_02_07_135340_create_deposits_table', 1),
(500, '2025_03_16_062048_create_damage_products_table', 1),
(502, '2025_03_23_150044_create_retailer_dues_collecion_table', 2);

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
  `damage_sent_rep_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `damage_sent_oop_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
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

INSERT INTO `opening_closing` (`id`, `security_money`, `investment_amount`, `bank_deposit_amount`, `product_received_amount`, `slab_received_amount`, `vat_adjustment_received_amount`, `promotion_received_amount`, `replacement_received_amount`, `outofpolicy_received_amount`, `insentive_received_amount`, `damage_sent_rep_amount`, `damage_sent_oop_amount`, `sales_amount`, `collection_amount`, `due_amount`, `due_realize_amount`, `total_due_amount`, `ho_deposit_amount`, `report_date`, `month`, `year`, `business_id`, `period`, `status`, `created_at`, `updated_at`) VALUES
(1, 100000.00, 800000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 1, 'opening', 'ended', NULL, NULL),
(2, 100000.00, 1400000.00, 650000.00, 500000.00, 50000.00, 35000.00, 80000.00, 90000.00, 75000.00, 200000.00, 98000.00, 104000.00, 300000.00, 185000.00, 115000.00, 0.00, 0.00, 950000.00, '2025-03-01', 3, '2025', 1, 'closing', 'running', NULL, '2025-03-22 14:26:34'),
(3, 100000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 2, 'opening', 'ended', NULL, NULL),
(4, 100000.00, 0.00, 340000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 50000.00, 30000.00, 20000.00, 0.00, 0.00, 0.00, '2025-03-01', 3, '2025', 2, 'closing', 'running', NULL, '2025-03-25 14:11:24');

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
(1, 'banktransfer', 'dfd222', '2025-03-03', 300000.00, 1, 1, 1, NULL, NULL, '2025-03-22 13:32:42', '2025-03-22 13:32:42'),
(2, 'banktransfer', 'dfdf222', '2025-03-12', 350000.00, 1, 1, 1, NULL, NULL, '2025-03-22 13:33:29', '2025-03-22 13:33:29'),
(3, 'banktransfer', 'dfd55', '2025-03-15', 340000.00, 1, 2, 1, NULL, NULL, '2025-03-25 14:11:24', '2025-03-25 14:11:24');

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
(1, 'KAZIPARA CENTER', '94738 Ryann Stream\nEast Skylarborough, NJ 46278-6241', '2024-01-01', NULL, '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(2, 'IBRAHIMPUR CENTER', '2179 Jones Port Apt. 957\nPort Saraibury, GA 21681', '2024-01-08', NULL, '2025-03-22 13:02:26', '2025-03-22 13:02:26'),
(3, 'KURIL CENTER', '5619 DuBuque Knolls Suite 262\nEast Nelda, IL 79288', '2024-01-05', NULL, '2025-03-22 13:02:26', '2025-03-22 13:02:26');

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
(1, 'Bosco LLC', 'Lafayette Christiansen', 'Mr. Ned Rohan Market', '66362 Kunde Stream Suite 488\nKailynchester, NE 20280', 'vZXYO5XThp', 'Adele Schimmel', '179164998194', 'lang.brain@example.org', '2024-11-02', 2, 2, 7, NULL, 0.00, 'excellent', '2025-03-22 13:02:26', '2025-04-03 16:36:17'),
(2, 'Dare Ltd', 'Helene Homenick', 'Letha Boehm III Market', '113 Royce Forest\nMarceloberg, MO 16953-3479', 'c2L6jodd3G', 'Karson Quitzon DDS', '172607539459', 'laurianne.cartwright@example.com', '2024-11-28', 3, 2, 8, NULL, 15000.00, 'good', '2025-03-22 13:02:26', '2025-04-03 16:26:57'),
(3, 'Swaniawski and Sons', 'Simeon Tremblay', 'Ignatius Hand Market', '65353 Corwin Common Apt. 511\nGoldamouth, OH 28771', 'GC2F4E8ss2', 'Odessa Flatley', '172297729848', 'white.fredrick@example.com', '2024-10-17', 4, 1, 8, NULL, 10000.00, 'good', '2025-03-22 13:02:26', '2025-04-03 16:39:37'),
(4, 'Runolfsdottir, Reichert and Strosin', 'Cassidy Stehr V', 'Clara Lakin Market', '9910 Dedrick Ranch\nVelmaview, AR 90994-4557', 'WkmQrs3YO2', 'Dr. Reyes Terry', '173690498037', 'shaun.hane@example.org', '2024-05-25', 1, 1, 6, NULL, 20000.00, 'poor', '2025-03-22 13:02:26', '2025-04-03 16:45:34'),
(5, 'Gerhold-Paucek', 'Catalina O\'Reilly', 'Francesca Dickens Market', '9102 Fanny Vista\nRomaguerafurt, MI 90491-4022', 'iADq0qRwyJ', 'Myrna Bernier', '179141925837', 'leonardo.cruickshank@example.com', '2024-11-27', 2, 4, 6, NULL, 0.00, 'excellent', '2025-03-22 13:02:26', '2025-04-03 16:00:46');

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

-- --------------------------------------------------------

--
-- Table structure for table `retailer_dues_collecion`
--

CREATE TABLE `retailer_dues_collecion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `invoice_date` date NOT NULL,
  `transaction` enum('sales','realization') NOT NULL,
  `sales_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `collection_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(255) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` enum('pending','clear') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailer_dues_collecion`
--

INSERT INTO `retailer_dues_collecion` (`id`, `retailer_id`, `invoice`, `invoice_date`, `transaction`, `sales_amount`, `collection_amount`, `due_amount`, `photo`, `business_id`, `employee_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 'A111', '2025-03-02', 'sales', 20000.00, 10000.00, 10000.00, NULL, 1, 2, 'clear', '2025-04-03 16:18:18', '2025-04-03 16:27:53'),
(10, 2, 'B112', '2025-03-05', 'sales', 30000.00, 15000.00, 15000.00, NULL, 1, 2, 'pending', '2025-04-03 16:26:57', '2025-04-03 16:26:57'),
(11, 1, 'A111', '2025-03-07', 'realization', 0.00, 5000.00, 5000.00, NULL, 1, 1, 'pending', '2025-04-03 16:27:53', '2025-04-03 16:27:53'),
(12, 1, 'A111', '2025-03-09', 'realization', 0.00, 5000.00, 0.00, NULL, 1, 1, 'clear', '2025-04-03 16:36:17', '2025-04-03 16:36:17'),
(13, 3, 'C110', '2025-03-06', 'sales', 30000.00, 20000.00, 10000.00, NULL, 1, 2, 'pending', '2025-04-03 16:39:37', '2025-04-03 16:39:37'),
(14, 4, 'C113', '2025-03-09', 'sales', 50000.00, 30000.00, 20000.00, NULL, 1, 2, 'pending', '2025-04-03 16:45:34', '2025-04-03 16:45:34');

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
(1, 2, 125000.00, 75000.00, 50000.00, '2025-03-13', 1, 1, NULL, '2025-03-22 14:15:08', '2025-03-22 14:15:08'),
(2, 2, 75000.00, 50000.00, 25000.00, '2025-03-09', 1, 1, NULL, '2025-03-22 14:16:04', '2025-03-22 14:16:04'),
(3, 3, 55000.00, 30000.00, 25000.00, '2025-03-12', 1, 1, NULL, '2025-03-22 14:17:16', '2025-03-22 14:17:16'),
(4, 2, 45000.00, 30000.00, 15000.00, '2025-03-16', 1, 1, NULL, '2025-03-22 14:19:32', '2025-03-22 14:19:32'),
(5, 3, 50000.00, 30000.00, 20000.00, '2025-03-12', 2, 5, NULL, '2025-03-25 13:27:17', '2025-03-25 13:27:17');

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
(1, 'dd22', '2025-03-05', 300000.00, '2025-03-04', 'normal', NULL, 1, 1, 1, '2025-03-22 13:37:49', '2025-03-22 13:37:49'),
(2, 'dfd222', '2025-03-05', 200000.00, '2025-03-06', 'normal', NULL, 1, 1, 1, '2025-03-22 13:40:45', '2025-03-22 13:40:45'),
(3, 'dfd22', '2025-03-07', 50000.00, '2025-03-08', 'slab', NULL, 1, 1, 1, '2025-03-22 13:41:59', '2025-03-22 13:41:59'),
(4, 'cvc22', '2025-03-08', 35000.00, '2025-03-09', 'vatadjust', NULL, 1, 1, 1, '2025-03-22 13:42:58', '2025-03-22 13:42:58'),
(5, 'gffg33', '2025-03-09', 80000.00, '2025-03-09', 'mktpromo', NULL, 1, 1, 1, '2025-03-22 13:44:17', '2025-03-22 13:44:17'),
(6, 'dfdf63', '2025-03-10', 90000.00, '2025-03-11', 'replacement', NULL, 1, 1, 1, '2025-03-22 13:45:16', '2025-03-22 13:45:16'),
(7, 'dfd33', '2025-03-10', 75000.00, '2025-03-12', 'out_of_policy', NULL, 1, 1, 1, '2025-03-22 13:46:10', '2025-03-22 13:46:10');

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
(1, '2025-03-01', '2025-03-31', 600000.00, 95, 25, 1, '2025-03-22 13:05:13', '2025-03-22 13:05:13'),
(2, '2025-03-01', '2025-03-31', 700000.00, 95, 25, 2, '2025-03-24 09:37:05', '2025-03-24 09:37:05');

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
-- Indexes for table `retailer_dues_collecion`
--
ALTER TABLE `retailer_dues_collecion`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `opening_closing`
--
ALTER TABLE `opening_closing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retailer_dues_collecion`
--
ALTER TABLE `retailer_dues_collecion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
