-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 09:35 PM
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
-- Database: `jsms_laravel10`
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
(1, 'Ziaul Habib', 'roobon@gmail.com', '$2y$10$GLgGMMneWnR18tYVstTyduSMdqcQZxiIczviSUf6AJ8aa3poI9wmW', 'active', NULL, '2025-01-02 12:01:54', '2025-01-02 12:01:54'),
(2, 'Syed Mahbubul Habib', 'smahbub.bd@gmail.com', '$2y$10$P65HO8cRVJ2dwWHfdsSTV.QkZhAc.Xvg3IOcx8S2keagbRULQJnSK', 'active', NULL, '2025-01-02 12:01:54', '2025-01-02 12:01:54');

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
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `current_due` decimal(10,2) NOT NULL DEFAULT 0.00,
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
  `business_starts` date NOT NULL,
  `security_money` decimal(10,2) NOT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `last_business_date` date DEFAULT NULL,
  `last_balance` decimal(10,2) DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `business_starts`, `security_money`, `company_address`, `contact_person`, `contact_number`, `contact_email`, `website`, `last_business_date`, `last_balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SQUARE TOILETRIES', '2027-01-01', 1000000.00, 'Mirpur, Dhaka', 'test person', '0174523698533', NULL, NULL, '2025-01-31', 0.00, 'active', '2025-01-02 12:05:27', '2025-01-02 12:05:27');

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
  `photo` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `point_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `address`, `dob`, `joining_date`, `contact_number`, `contact_email`, `password`, `photo`, `nid`, `resume`, `point_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anupa Biswas', 'Manager', 'Mirpur, Dhaka', '2025-01-01', '2024-01-01', '01475236589', NULL, '$2y$10$EMKD8qvwzqOmh4EjGERGIummTY0Wp3hOXkZ6eX67EY1UK6bWCJoDy', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 1, 'active', '2025-01-02 12:17:14', '2025-01-02 12:17:14'),
(2, 'Nuton Mitro', 'Delivery Man', 'Kazipara, Mirpur', '2025-01-01', '2024-01-04', '017498523641', NULL, '$2y$10$vZR6vwfkzZBmx4xGHLgn1u7Bkc6CbHHHQTQZfmkdsgC1b9zWwhbW2', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 1, 'active', '2025-01-02 12:18:33', '2025-01-02 12:18:33'),
(3, 'Md. Jesad', 'Van Driver', 'Mirpur 11, Dhaka', NULL, '2024-01-10', '01733225226', NULL, '$2y$10$VWXNgZy9b.LEh33yAaYMG.M/JgtT0EOc1Ytc0HcviIePZFIw8otX6', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 1, 'active', '2025-01-02 12:20:51', '2025-01-02 12:20:51'),
(4, 'Md. Ibrahim Khalil Bhuyan', 'Manager', 'Kuril, Dhaka', NULL, '2024-01-13', '01723423651', NULL, '$2y$10$wsU1vc8UWkqBoS6PizJLY.hlqRhYcUUPbiHef8QvzO0dnQlu8fZ8W', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 2, 'active', '2025-01-02 12:58:31', '2025-01-02 12:58:31'),
(5, 'Md. Rabbi Molla', 'Delivery Man', NULL, NULL, '2024-01-11', '01732123456', NULL, '$2y$10$KE3KxmBqXYuCV3Xkw69bzOseQoIzzyE2sikNvOnq57E1f9xoDhvZS', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 2, 'active', '2025-01-02 13:00:26', '2025-01-02 13:00:26'),
(6, 'Md. Dulal', 'Store Keeper', NULL, NULL, '2024-11-06', '01723654789', NULL, '$2y$10$8wu7O4W0MPkgGltddM.lhe5Z.9gn7vRPaN1eHgMh9NcbEYUljJ/ki', 'images/employee/nophoto.jpg', 'images/employee/nonid.jpg', 'images/employee/noresume.pdf', 2, 'active', '2025-01-02 13:09:24', '2025-01-02 13:09:24');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(60) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `item_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `investment_date` date NOT NULL,
  `point_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `investment_photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(187, '2014_10_12_000000_create_users_table', 1),
(188, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(189, '2019_08_19_000000_create_failed_jobs_table', 1),
(190, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(191, '2024_11_18_063322_create_admins_table', 1),
(192, '2024_11_19_041753_create_doctors_table', 1),
(193, '2024_11_20_042405_create_specialists_table', 1),
(194, '2024_11_27_062123_create_appointments_table', 1),
(195, '2024_12_07_140313_create_companies_table', 1),
(196, '2024_12_10_041705_create_retailers_table', 1),
(197, '2024_12_10_050322_create_points_table', 1),
(198, '2024_12_10_050447_create_employees_table', 1),
(199, '2024_12_10_050535_create_user_permissions_table', 1),
(200, '2024_12_10_050609_create_sales_table', 1),
(201, '2024_12_10_050735_create_payments_table', 1),
(202, '2024_12_10_050755_create_investments_table', 1),
(203, '2024_12_10_050823_create_insentives_table', 1),
(204, '2024_12_10_050845_create_slabs_table', 1),
(205, '2024_12_10_050909_create_display_centers_table', 1),
(206, '2024_12_10_051040_create_expire_replacements_table', 1),
(207, '2024_12_10_051107_create_expire_claims_table', 1),
(208, '2024_12_15_184458_create_sales_payments_stocks_table', 1),
(209, '2024_12_16_022833_create_targets_table', 1),
(210, '2024_12_20_112137_create_stocks_table', 1),
(211, '2024_12_27_131604_create_retailer_dues_table', 1),
(212, '2024_12_28_053708_create_collections_table', 1),
(213, '2024_12_29_185540_create_sales_returns_table', 1);

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
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payment_note` varchar(100) DEFAULT NULL,
  `cheque_voucher_photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `point_name`, `point_address`, `opening_date`, `created_at`, `updated_at`) VALUES
(1, 'KAZIPARA CENTRE', 'Kazipara, Mirpur, Dhaka', '2025-01-01', '2025-01-02 12:14:26', '2025-01-02 12:56:56'),
(2, 'KURIL CENTRE', 'Kuril, Dhaka', '2024-10-01', '2025-01-02 12:56:06', '2025-01-02 12:56:34');

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
  `trade_lisence` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `business_starts` date NOT NULL,
  `last_business` date NOT NULL,
  `last_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `point_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `shop_name`, `proprietor_name`, `market_name`, `shop_address`, `trade_lisence`, `contact_person`, `contact_number`, `contact_email`, `business_starts`, `last_business`, `last_balance`, `point_id`, `employee_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Oishe General Store', 'N/A', NULL, 'Old Kochukhet, Mirpur', 'fdaddfdfd', 'fdfdd', '017498523641', NULL, '2025-01-01', '2025-01-01', 0.00, 1, 1, 'active', '2025-01-02 13:21:55', '2025-01-02 13:35:16'),
(2, 'Khondokar Phamracy', 'N/A', NULL, 'Old Kochukhet', 'ddffd333', 'dfdfd', '01763214560', NULL, '2025-01-01', '2025-01-01', 0.00, 2, 6, 'active', '2025-01-02 13:34:49', '2025-01-02 13:34:49'),
(3, 'Save General Store', 'N/A', NULL, 'Senpara 2, Mirpur, Dhaka', 'fdfd333', 'dfdfdfd', '01763214560', NULL, '2025-01-01', '2024-12-31', 0.00, 2, 6, 'active', '2025-01-02 13:37:57', '2025-01-02 13:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_dues`
--

CREATE TABLE `retailer_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `current_due` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailer_dues`
--

INSERT INTO `retailer_dues` (`id`, `retailer_id`, `current_due`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, NULL, NULL),
(2, 2, 0.00, NULL, NULL),
(3, 3, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `invoice_number` varchar(30) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `collection_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL,
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `voucher_photo` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `sales_payments_stocks`
--

INSERT INTO `sales_payments_stocks` (`id`, `ims_target`, `collection_target`, `start_date`, `end_date`, `working_days`, `sales_amount`, `collection_amount`, `deposit_amount`, `collTargetVSdeposit`, `startMonthdue`, `endMonthdue`, `godownstock`, `ledgerDue`, `point_id`, `company_id`, `target_id`, `created_at`, `updated_at`) VALUES
(1, 4447000.00, 95, '2024-12-01', '2024-12-31', 29, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, NULL, NULL),
(2, 7056728.00, 95, '2024-12-01', '2024-12-31', 29, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2, 1, 2, NULL, NULL);

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
-- Table structure for table `slabs`
--

CREATE TABLE `slabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `product_amount` decimal(10,2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `point_id` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `invoice_photo` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `point_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `start_date`, `end_date`, `ims_target`, `collection_target`, `working_days`, `point_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, '2024-12-01', '2024-12-31', 4447000.00, 95, 29, 1, 1, '2025-01-02 13:40:49', '2025-01-02 13:40:49'),
(2, '2024-12-01', '2024-12-31', 7056728.00, 95, 29, 2, 1, '2025-01-02 13:50:30', '2025-01-02 13:50:30');

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
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collections_retailer_id_unique` (`retailer_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `retailer_dues_retailer_id_unique` (`retailer_id`);

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
-- Indexes for table `slabs`
--
ALTER TABLE `slabs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailer_dues`
--
ALTER TABLE `retailer_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_payments_stocks`
--
ALTER TABLE `sales_payments_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slabs`
--
ALTER TABLE `slabs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
