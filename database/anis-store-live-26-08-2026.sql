-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2026 at 02:09 AM
-- Server version: 8.0.45
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anisstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, 'Active', 1, '2026-08-25 13:04:07', '2026-08-25 13:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `img_url`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, 'Active', 1, '2026-08-25 13:04:07', '2026-08-25 13:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `upazila_id` bigint UNSIGNED DEFAULT NULL,
  `thana_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `customer_name`, `address_details`, `date`, `mobile`, `email`, `img_url`, `nid`, `previous_due_amount`, `district_id`, `upazila_id`, `thana_id`, `user_id`, `created_at`, `updated_at`, `location_id`) VALUES
(1, '1001', 'Walk in Customer', 'Store Walk-in', NULL, '0000000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-08-25 05:53:57', '2026-08-25 05:53:57', NULL),
(2, 'CUST-1002', 'মিম কসমেটিক', 'খান বাহাদুর মার্কেট', NULL, '01749239471', NULL, NULL, NULL, '3820', NULL, NULL, NULL, 1, '2026-08-25 10:37:53', '2026-08-25 10:37:53', NULL),
(3, 'CUST-1003', 'আনিস স্টোর', 'ঝালাই পটি', NULL, '01711451334', NULL, NULL, NULL, '0', NULL, NULL, NULL, 1, '2026-08-25 17:41:39', '2026-08-25 17:41:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_details`
--

CREATE TABLE `customer_payment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `paid_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_collection_date` date DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `expense_type_id` bigint UNSIGNED NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `expense_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `type_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'নাচত', 'InActive', 1, '2026-08-25 19:00:46', '2026-08-25 19:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_19_090149_create_personal_access_tokens_table', 1),
(5, '2024_09_21_084506_create_brands_table', 1),
(6, '2024_09_21_130437_create_categories_table', 1),
(7, '2025_01_08_071602_create_sub_categories_table', 1),
(8, '2025_01_08_072428_create_units_table', 1),
(9, '2025_01_08_072707_create_products_table', 1),
(10, '2025_01_11_053642_create_suppliers_table', 1),
(11, '2025_01_12_061519_create_purchases_table', 1),
(12, '2025_01_13_100914_create_purchase_order_details_table', 1),
(13, '2025_01_13_103344_create_purchase_payment_details_table', 1),
(14, '2025_01_14_111246_create_districts_table', 1),
(15, '2025_01_15_071041_create_upazilas_table', 1),
(16, '2025_01_15_094111_create_thanas_table', 1),
(17, '2025_01_20_081311_create_locations_table', 1),
(18, '2025_01_20_094304_create_customers_table', 1),
(19, '2025_01_20_094711_create_customer_payment_details_table', 1),
(20, '2025_01_20_101901_add_location_id_to_customers_table', 1),
(21, '2025_01_22_101032_create_orders_table', 1),
(22, '2025_01_22_101435_create_order_details_table', 1),
(23, '2025_01_22_101530_create_order_payment_details_table', 1),
(24, '2025_02_04_065739_create_expense_types_table', 1),
(25, '2025_02_04_070426_create_expenses_table', 1),
(26, '2025_02_10_090857_create_product_returns_table', 1),
(27, '2025_02_26_094016_create_supplier_due_collections_table', 1),
(28, '2025_08_20_021940_create_purchase_returns_table', 1),
(29, '2025_11_25_174839_create_opening_balances_table', 1),
(30, '2026_08_03_165159_add_permissions_to_users_table', 1),
(31, '2026_08_06_000001_add_return_adjustment_amount_to_orders_table', 1),
(32, '2026_08_06_000002_add_quantity_and_product_id_to_product_returns_table', 1),
(33, '2026_08_07_000002_add_return_adjustment_amount_to_purchases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opening_balances`
--

CREATE TABLE `opening_balances` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `return_adjustment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `previous_due_amount` decimal(10,2) DEFAULT NULL,
  `order_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `sub_total`, `return_adjustment_amount`, `paid_amount`, `discount_amount`, `due_amount`, `previous_due_amount`, `order_note`, `customer_id`, `invoice_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '#InvID00001', 946.00, 0.00, 0.00, 6.00, 40.00, 0.00, NULL, 3, '2026-08-25', 1, '2026-08-25 17:49:37', '2026-08-25 17:49:37'),
(2, '#InvID00001', 946.00, 0.00, 0.00, 6.00, 40.00, 0.00, NULL, 3, '2026-08-25', 1, '2026-08-25 17:49:38', '2026-08-25 17:49:38'),
(3, '#InvID00001', 946.00, 0.00, 0.00, 6.00, 40.00, 0.00, NULL, 3, '2026-08-25', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(4, '#InvID00001', 946.00, 0.00, 0.00, 6.00, 40.00, 0.00, NULL, 3, '2026-08-25', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(6, '#InvID00001', 946.00, 0.00, 0.00, 6.00, 40.00, 0.00, NULL, 3, '2026-08-25', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(7, '#InvID00002', 300.00, 0.00, 0.00, 0.00, 300.00, 200.00, NULL, 3, '2026-08-25', 1, '2026-08-25 18:00:05', '2026-08-25 18:00:05'),
(8, '#InvID00002', 300.00, 0.00, 0.00, 0.00, 300.00, 200.00, NULL, 3, '2026-08-25', 1, '2026-08-25 18:00:09', '2026-08-25 18:00:09'),
(9, '#InvID00003', 840.00, 0.00, 0.00, 0.00, 40.00, 800.00, NULL, 3, '2026-08-25', 1, '2026-08-25 18:03:24', '2026-08-25 18:03:24'),
(10, '#InvID00004', 40.00, 0.00, 0.00, 0.00, 40.00, 0.00, NULL, 1, '2026-08-25', 1, '2026-08-25 19:17:08', '2026-08-25 19:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `selling_price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 27, '12', '50', '52', 1, '2026-08-25 17:49:37', '2026-08-25 17:49:37'),
(2, 1, 14, '6', '47', '50', 1, '2026-08-25 17:49:37', '2026-08-25 17:49:37'),
(3, 1, 12, '1', '21', '22', 1, '2026-08-25 17:49:37', '2026-08-25 17:49:37'),
(4, 2, 27, '12', '50', '52', 1, '2026-08-25 17:49:38', '2026-08-25 17:49:38'),
(5, 2, 14, '6', '47', '50', 1, '2026-08-25 17:49:38', '2026-08-25 17:49:38'),
(6, 2, 12, '1', '21', '22', 1, '2026-08-25 17:49:38', '2026-08-25 17:49:38'),
(7, 3, 27, '12', '50', '52', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(8, 3, 14, '6', '47', '50', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(9, 4, 27, '12', '50', '52', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(10, 3, 12, '1', '21', '22', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(12, 4, 14, '6', '47', '50', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(13, 4, 12, '1', '21', '22', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(14, 6, 27, '12', '50', '52', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(15, 6, 14, '6', '47', '50', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(16, 6, 12, '1', '21', '22', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(17, 7, 28, '6', '45', '50', 1, '2026-08-25 18:00:05', '2026-08-25 18:00:05'),
(18, 8, 28, '6', '45', '50', 1, '2026-08-25 18:00:09', '2026-08-25 18:00:09'),
(19, 9, 2, '12', '58', '70', 1, '2026-08-25 18:03:24', '2026-08-25 18:03:24'),
(20, 10, 6, '1', '29', '25', 1, '2026-08-25 19:17:08', '2026-08-25 19:17:08'),
(21, 10, 4, '1', '17.71', '15', 1, '2026-08-25 19:17:08', '2026-08-25 19:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_payment_details`
--

CREATE TABLE `order_payment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_collection_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payment_details`
--

INSERT INTO `order_payment_details` (`id`, `order_id`, `paid_amount`, `discount_amount`, `transaction_id`, `payment_method`, `due_collection_date`, `payment_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 17:49:37', '2026-08-25 17:49:37'),
(2, 2, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 17:49:38', '2026-08-25 17:49:38'),
(3, 3, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(4, 4, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(5, 6, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 17:49:41', '2026-08-25 17:49:41'),
(6, 7, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 18:00:05', '2026-08-25 18:00:05'),
(7, 8, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 18:00:09', '2026-08-25 18:00:09'),
(8, 9, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 18:03:24', '2026-08-25 18:03:24'),
(9, 10, 0.00, NULL, NULL, 'due', '2026-08-25', 'বাকী', 1, '2026-08-25 19:17:08', '2026-08-25 19:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '932a5e5aff5b2022ad312486f874e8cd475ef3f0204960bac70a79285c1fd497', '[\"*\"]', '2026-08-10 20:56:01', NULL, '2026-08-10 20:06:58', '2026-08-10 20:56:01'),
(2, 'App\\Models\\User', 1, 'authToken', '1717d154aa140dc750e9fbbb64f82425b05beb130cad0bf82f83241eb5ac4490', '[\"*\"]', '2026-08-11 10:22:52', NULL, '2026-08-11 03:35:11', '2026-08-11 10:22:52'),
(3, 'App\\Models\\User', 1, 'authToken', '3ae5e67a3feefde22f30244413ca3cb22e379d63f02d2f3b994c0dd62c06f3f3', '[\"*\"]', '2026-08-18 11:54:27', NULL, '2026-08-18 06:35:47', '2026-08-18 11:54:27'),
(4, 'App\\Models\\User', 1, 'authToken', '7d41a43d1a67884b360ce3e51738810125be09d4bca4fa0961df690d060ed75d', '[\"*\"]', '2026-08-19 14:40:05', NULL, '2026-08-19 00:45:51', '2026-08-19 14:40:05'),
(5, 'App\\Models\\User', 1, 'authToken', 'd3b9084886915768a985787f92f596f6ab66026300f93af95bcfd35459ca7e99', '[\"*\"]', '2026-08-19 02:07:53', NULL, '2026-08-19 02:07:40', '2026-08-19 02:07:53'),
(6, 'App\\Models\\User', 1, 'authToken', 'f52da7706593784d1a4ac854558690e6199ee096e8ff6bd1cd422f28f4564ad6', '[\"*\"]', '2026-08-20 03:45:25', NULL, '2026-08-20 03:45:09', '2026-08-20 03:45:25'),
(7, 'App\\Models\\User', 1, 'authToken', '879905724982def75a378c1d7b32b9dfffd7c25110823ffa6a136b49aaf59d63', '[\"*\"]', '2026-08-23 05:27:40', NULL, '2026-08-22 10:42:54', '2026-08-23 05:27:40'),
(8, 'App\\Models\\User', 1, 'authToken', 'e9ca999b3031ee331fa6a32c27e03db7586650181598ed29360a4e4d2e84908c', '[\"*\"]', '2026-08-25 05:54:49', NULL, '2026-08-23 14:32:31', '2026-08-25 05:54:49'),
(9, 'App\\Models\\User', 1, 'authToken', '40eb91204fce079de21a1533687ed3300d43d30413b6e98bd866f523d323dbe1', '[\"*\"]', '2026-08-25 17:51:37', NULL, '2026-08-25 10:27:15', '2026-08-25 17:51:37'),
(10, 'App\\Models\\User', 1, 'authToken', '8634e323eaa4c46883b3c826e3d79796a0b2982dd20e28c92a998e08d8a14b40', '[\"*\"]', '2026-08-25 18:20:33', NULL, '2026-08-25 10:28:22', '2026-08-25 18:20:33'),
(11, 'App\\Models\\User', 1, 'authToken', 'ed1a77f604bb5587f0127b02254e99dbcae2285d52be17a2f896e5998a69cb61', '[\"*\"]', '2026-08-25 19:53:48', NULL, '2026-08-25 10:32:20', '2026-08-25 19:53:48'),
(12, 'App\\Models\\User', 1, 'authToken', '4576fa974484b627997a1e584ccdd1d6ef929a7bfb2e3bed6e5b1f358a713a25', '[\"*\"]', '2026-08-25 15:31:22', NULL, '2026-08-25 15:30:37', '2026-08-25 15:31:22'),
(13, 'App\\Models\\User', 1, 'authToken', '5bee6427e37b040d2bcf3e2ed9be52728f764f8e2f819c36cd870395e8b4f7da', '[\"*\"]', '2026-08-25 21:40:54', NULL, '2026-08-25 21:40:27', '2026-08-25 21:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` json NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img_url`, `product_name`, `quantity`, `cost_price`, `sell_price`, `status`, `product_code`, `brand_id`, `category_id`, `sub_category_id`, `unit_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'কেলে', '480', '30', '32', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 14:04:50', '2026-08-25 14:04:50'),
(2, NULL, 'সিলাইম কোটা ছোট', '16', '58', '70', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 14:07:23', '2026-08-25 18:03:24'),
(4, NULL, 'প্যারাসুট  পাতা কালো', '383', '17.71', '20', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 14:35:00', '2026-08-25 19:17:08'),
(5, NULL, 'সান সিল্ক শ্যাম্পু মিনি প্যাক ব্লাক', '100', '25', '26', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:07:21', '2026-08-25 17:07:21'),
(6, NULL, 'সান সিল্ক মিনিপ্যাক শ্যামপুগোলাপি', '99', '29', '30', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:09:35', '2026-08-25 19:17:08'),
(7, NULL, 'ডাব শ্যাম্পু মিনি প্যাক', '90', '41.5', '42', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:10:28', '2026-08-25 17:10:28'),
(8, NULL, 'ডাব মিনিকন্ডিশনার', '90', '51.5', '52', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:12:06', '2026-08-25 17:12:06'),
(9, NULL, 'সান সিল্ক কন্ডিশনার মিনি প্যাক', '90', '38', '40', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:12:44', '2026-08-25 17:12:44'),
(10, NULL, 'ক্লিয়ার শ্যাম্পু মিনি প্যাক', '80', '38', '40', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:13:52', '2026-08-25 17:13:52'),
(11, NULL, 'লাইফ বয় মিনি প্যাক শ্যাম্পু', '40', '19', '20', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:14:31', '2026-08-25 17:14:31'),
(12, NULL, 'রিফাইভ মিনি প্যাক শ্যাম্পু 2টাকা', '46', '21', '22', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:15:22', '2026-08-25 17:49:41'),
(13, NULL, 'সিলেট প্লাস শ্যাম্পু মিনি প্যাক', '24', '88', '95', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:16:10', '2026-08-25 17:16:10'),
(14, NULL, 'কিলিয়ার মিনি প্যাক শ্যাম্পু ম্যান', '26', '47', '50', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:16:43', '2026-08-25 17:49:41'),
(15, NULL, 'ভার্টিকা মিনি প্যাক শ্যাম্পু এক টাকা', '100', '8', '9', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:18:16', '2026-08-25 17:18:16'),
(16, NULL, 'ভাটিকা মিনি প্যাক শ্যাম্পু দুই টাকা', '50', '16', '18', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:19:11', '2026-08-25 17:19:11'),
(17, NULL, 'প্লাস শ্যাম্পু মিনি প্যাক', '50', '13', '14', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:19:57', '2026-08-25 17:19:57'),
(18, NULL, 'প্যারাসুট মিনি প্যাক শ্যাম্পু', '300', '18', '20', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:21:47', '2026-08-25 17:21:47'),
(19, NULL, 'এলিট শ্যাম্পু কালী মিনি প্যাক', '72', '21', '25', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:25:40', '2026-08-25 17:25:40'),
(20, NULL, 'ডিটল সাবান মিনি প্যাক', '100', '12.5', '13', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:28:46', '2026-08-25 17:28:46'),
(21, NULL, 'লাক্স সাবান মিনি প্যাক', '96', '11', '12', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:31:06', '2026-08-25 17:31:06'),
(22, NULL, 'অ্যাক্টিভ সাবান মিনি প্যাক', '96', '7', '8', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:31:49', '2026-08-25 17:31:49'),
(23, NULL, 'সেভলন সাবান মিনি প্যাক', '86', '8', '9', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:33:06', '2026-08-25 17:33:06'),
(24, NULL, 'মেরিল সাবান মিনি প্যাক', '144', '8.5', '8.75', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:34:01', '2026-08-25 17:34:01'),
(25, NULL, 'লাইফ বয় সাবান মিনি প্যাক', '120', '11', '12', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:35:42', '2026-08-25 17:35:42'),
(26, NULL, 'নবরত্ন তেল মিনি প্যাক', '40', '40', '45', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:36:37', '2026-08-25 17:36:37'),
(27, NULL, 'সাপ এক্সেল মিনি প্যাক', '-28', '50', '52', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:37:22', '2026-08-25 17:49:41'),
(28, NULL, 'ভিক্সোল', '12', '45', '55', 'Active', '[]', 1, 1, NULL, NULL, 1, '2026-08-25 17:57:59', '2026-08-25 18:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `referance_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payable_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `grand_subtotal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_adjustment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `attach_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_id`, `referance_no`, `paid_amount`, `due_amount`, `purchase_payable_amount`, `date`, `grand_subtotal`, `return_adjustment_amount`, `attach_document`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '#PurID00001', '#PurID00001', '0', '3399.9359999999997', '350', '2026-08-22', '3399.9359999999997', 0.00, NULL, 2, 1, '2026-08-25 14:36:27', '2026-08-25 14:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `purchase_id` bigint UNSIGNED NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `product_id`, `purchase_id`, `quantity`, `cost_price`, `subtotal`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '192', '17.708', '3399.936', 1, '2026-08-25 14:36:27', '2026-08-25 14:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment_details`
--

CREATE TABLE `purchase_payment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `purchases_id` bigint UNSIGNED NOT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_due_collection_date` date DEFAULT NULL,
  `purchase_order_details_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payment_details`
--

INSERT INTO `purchase_payment_details` (`id`, `purchases_id`, `paid_amount`, `discount_amount`, `payment_method`, `payment_status`, `transaction_id`, `purchase_due_collection_date`, `purchase_order_details_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, NULL, 'Cash', 'Unpaid', NULL, '2026-08-22', NULL, 1, '2026-08-25 14:36:27', '2026-08-25 14:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `due_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3HYOaUyOc2FRhFfOW2xpRqaCxGajuUMmndYQRMPd', NULL, '199.45.154.78', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlc5R3MybldRQnVHWXVKaDJtZmlIR21hTzVXem0wU25TTHFhMHRMayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaW5qYWF6aC5pbmZvIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787673279),
('4ZBrKODneqOR1EySkTzDtukhDw9nyixu9g8Q3yTy', NULL, '164.92.82.91', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjFlY3lrMnE4Rm11N2FLUGZSYlF0YXdwOExBdlJjN0Zhem0wN1ZMNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787677451),
('5199ovBBfMcIR8P2gnj5DaIqI6uM8qB2YqUMLW8y', NULL, '57.131.131.18', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHNBU2NCMGNyelc2ajA2V1UxVEFOVmdGWXcxcFI0NXpUUGI0ZEdqOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaW5qYWF6aC5pbmZvIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787677378),
('5GRbeN20Ottsq9OZborF8NBrMb18AVNGPtxFJX3q', NULL, '199.45.154.78', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1gyemMyNlJobUZiUENaaFZFa3RFVUtRVTdGNmhLRmt1SldldmRtQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaW5qYWF6aC5pbmZvIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787673327),
('6dB1QlA7maLfHk56GqV42jrNtYyirCIKAcMzZpsO', NULL, '103.118.78.129', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnRVckpUeEdvNmxrM0Fla2xtdE5JNGJpVVdNeHZSVm0wWnhvNkFUciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njk6Imh0dHBzOi8vYW5pc3N0b3JlLmluamFhemguY29tL2FkbWluLWRhc2hib2FyZC1sb3ctc3RvY2stbm90aWZpY2F0aW9ucyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787673248),
('AQAiRR7BmbsZDonKg46pCTpetv8PyKxBkBZjfEwM', NULL, '45.156.129.132', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.6312.86 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTB4SVNTTll6OEo1NVhMeEE2eUczd0RBdHloVWJjdU1qR21aQ1ptYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787680063),
('BxBSGEhkrEdKD2YCxtikG0LA6oJx6Ditcy43djQj', NULL, '217.11.165.13', 'Mozilla/5.0 (SS; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibDN1OHhsa3NwOVVxTkFidTNBbW5ab1REaWFnZ0hUekZXYzBrbFFnUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787671915),
('C1gjsFusORuPH4qmv1eFiNmvJvy9OR73GLKoiUj7', NULL, '217.11.165.75', 'Mozilla/5.0 (Macintosh, Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiY0NNeGkwU1pCeUxnMFdvRkdIZjAxUnUxSHN1WFc3QTVpcFhrWDY3cCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787674834),
('DaiAPq6RwTlk2F0niX1MI5c3fGjjoLilqUqwEytE', NULL, '217.11.165.57', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaUtzM0gyN3NnMkw3aDRTdXkyTEI5VURNdnJSdmk3TUdMWDJseWw1aSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787673362),
('FaqyfJ1ozA3jEpST5ZlkGVksVQ5xW68WWDJbgHk2', NULL, '217.11.165.55', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.1 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRW1nc1VDcW5ERU0xeGhNaFlrRnloS2NGVmNmQVFiOWZ4Zkp4QjZlaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787678541),
('fVWVXrmZKLbJXhiAVRkEfIMDnni4Ezewh6HgBYjv', NULL, '57.131.131.17', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHZDTkNWbFhQdWxhV3Q5cVpuMHE2SWlKWWw3aXRaRmFZcE1CRURybyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaW5qYWF6aC5pbmZvIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787680901),
('FxeAO419e1DC4hTWHRIp1Vo6nsU1fZVptsFbgbap', NULL, '217.11.165.39', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 14_7_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4.1 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUWd3azR5VDZiQXEza0lSY0ttaWFsZ0VuMGVVczE2ZlJ6N3lPMTBYaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787671333),
('GttMsmzBkusKelkRdEl9tkFSjXEiHU1yED99QhuH', NULL, '217.11.165.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRGlSSEo1cEg0eWxCYW9yb2w4NHo3TmNVdnlvOFJTT0NOSHJTYWxhbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787672944),
('hcEl9lyq7uaWyDu1NjjYccPKPMPkTBvDQ55NiinK', NULL, '217.11.165.45', 'Mozilla/5.0 (Knoppix; Linux x86_64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYlh5V1hERDI4d2J4UTN4bmpWY2VmcjZpb2JPaldVVWgwNkpRdzd6VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787680924),
('hRQRUlwUmRUIDtCGXTZyYsd9IIhTrj5ohUfykVEV', NULL, '217.11.165.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMURhWFRrck1UbGFGQWgzVXU3TmtHa1hCTUV5cXQ3dGZNU2FKVDJvNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787679677),
('IQRcNOeljFd40XksqVtXVKuvgsNW2uAh3dJKkjwb', NULL, '66.132.195.59', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT05DVzhUSEJHUU9tSDlBNDd5NkNIZ3lTWUNZMkVmcVVNSkxQWnJLNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd3d3LmluamFhemguaW5mbyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787671597),
('IrN8uF52i1tz24E4OvPLCMua3lrktip0skKQSGwk', NULL, '217.11.165.39', 'Mozilla/5.0 (Debian; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUJaTlFXSkpZUEIwc2FpcWoweHhDRnFBRmZlamN0ajR1V2ljb3hJQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787671356),
('isWtKp1iOCfGRvtYpT0lfpRoWM7nzBFyf5I1yNAE', NULL, '154.51.61.11', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUU9obk1oZTdmbXJwcmg4WkcwdWlvUm1ncmxCVTFla24wZlNWc1FiNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787673347),
('L57TucQkc9uvMcaH99mS8uUFxv6SAxOAtwIpKLyA', NULL, '172.105.196.91', 'Mozilla/5.0 zgrab/0.x', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWVRUXE2bXRURmFxbnoycWtobWhNZUk0Q01OYlZXSHdiR2RZMzRIcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787671431),
('lVHwS6REvS6K55dfsC4VFNUJZl1KmuIzsOS1286P', NULL, '103.81.29.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVRLWDdJcVVvdHpRZU5JZDJtcnY5QXB4Z2lvM09wbjVRZ3FQOGJzRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYW5pc3N0b3JlLmluamFhemguY29tL2ludm9pY2UvMSI7czo1OiJyb3V0ZSI7czoxMjoiaW52b2ljZS5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787681051),
('NRpbuC6L71EKkrmTL7RUfpaPIdp6L8QtmixkC5XH', NULL, '217.11.165.45', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib2NFNHFrQThhWXRQVHVIZ2NGRzNmRkE2b2pScWQ5QXNCc0VvVDU3OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787680462),
('o6hLyPvLBj9MQ7ireGt1amr5EhgAbgbNP9aEz1R3', NULL, '217.11.165.7', 'Mozilla/5.0 (ZZ; Linux i686; rv:122.0) Gecko/20100101 Firefox/122.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYjhTSjBodHhsTTU2cDdxVVYzU1BjOVRkNzFuOUhETjNQTHFsRFpXNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787673976),
('SPPt8P13lRgwt0oIj5H9EMfgSCiwlOuGxEpQVDC6', NULL, '217.11.165.57', 'Mozilla/5.0 (CentOS; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRTdocDBlM1p6WUpZa1lxbjcxWUZSNU5lMEpUMHJLSGNxRTgwUmhjZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787671827),
('sXmn387HglmKmvT3zBnvwinMNGfW4sk19fFNdgei', NULL, '185.87.121.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUl4OWlFRjZxNDVXbVFEWjVqZ0ticTR2ekNWUW9ab1BBV3FKMzR5WCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787673324),
('TchOkIE247U7dCuefobdeTzGZBsEowSFSN7ikuLR', NULL, '207.90.244.5', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjA0VkhjYmlnWndoelRsUlpQNWR3NFlRMm5xSDMzZkNJekR6cnVtdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787679070),
('TJdBIyS1uzOkyi0lh8iYXom2xWRivD23GWiZfPj2', NULL, '217.11.165.57', 'Mozilla/5.0 (CentOS; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUVZd2d2RVc1dnhYVm80UDM5WFRRUkEwZ1pHY0pVdHI1NVRkZTU3ZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787677060),
('Ukc8ph8n6uLiL2HefF83MoFJ9Y790ns2yDgQoCcC', NULL, '66.132.195.59', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzZYTUdCNHpHWkFpZ29ZVXJZRUIyYTExR25hTXBERElJQTBwZndyWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd3d3LmluamFhemguaW5mbyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787671630),
('UkQQ0wpYkTlsxieNTgblkP15DSCBv40DJX88mk3f', NULL, '185.12.59.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXdBbHd0dllJN2RmRTBLaHVaQzRaalphYjhQdVQ5eFBmU3BtNzRyUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787676725),
('UoyI7LPY0wcYPoAYVdG45Am2fC05NqDFxJBLHZ2H', NULL, '217.11.165.37', 'Mozilla/5.0 (Fedora; Linux i686; rv:126.0) Gecko/20100101 Firefox/126.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWHhLbkVOcWRRbmZ5QmU5aGFMbEl5ZGpFTFA2dWthZVJHUGlZdzN5YSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787677730),
('W9Y1qvKIRJAG1zOuI5jUD6KoJ5ms9pRZfMtUnBKT', NULL, '217.11.165.57', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 14_7_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVWN5aU1QRDNuVEtqSEloZWo2ejVzdmFacGJ0cXhiUlpaZm5mVVNhdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787677036),
('XLQD65eeOuckwHNEugW8kklLU360GWLe4kEydPt4', NULL, '62.210.209.139', 'Mozilla/5.0 zgrab/0.x', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieERCZU1oZjBFVDN3V21Oc2I5UFAza3N6N2hKMElrSlNoMVFWV2l2ayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vaW5qYWF6aC5pbmZvL2luZGV4LnBocD9yZXN0X3JvdXRlPSUyRndwJTJGdjIlMkZ1c2VycyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787676652),
('zAkLOhbWnfT8TPvzcS95swKD3OlDb8NNSuQHAbdY', NULL, '139.59.170.85', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXRLVlNXTlRqRjFvUWZRNWltVG1TYk55RVlMOHVadHo0WGVwY1d1SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vMTU3LjE3My4xMjYuMjUyIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787679801);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payable_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `name`, `company`, `mobile`, `address`, `email`, `img_url`, `purchase_payable_amount`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SUP-10001', 'আনিস স্টোর', '', '01711451334', 'পাবনা', '', NULL, '2000', 'Active', 1, '2026-08-25 10:51:41', '2026-08-25 10:51:41'),
(2, 'SUP-10002', 'জাকির স্টোর', '', '01732709880', 'চকমোগল টলি ঢাকা', '', NULL, '350', 'Active', 1, '2026-08-25 14:17:11', '2026-08-25 14:17:11'),
(3, 'SUP-10003', 'শরিফ এন্টার পাইজ', '', '01862855784', 'চকবাজার', '', NULL, '65160', 'Active', 1, '2026-08-25 19:50:48', '2026-08-25 19:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_due_collections`
--

CREATE TABLE `supplier_due_collections` (
  `id` bigint UNSIGNED NOT NULL,
  `paid_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payable_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_collection_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint UNSIGNED NOT NULL,
  `Thana_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `upazila_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint UNSIGNED NOT NULL,
  `upazila_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users',
  `permissions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `img_url`, `name`, `email`, `mobile`, `password`, `otp`, `otp_expires_at`, `status`, `role`, `permissions`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@anisstore.com', '01700000000', '$2y$12$vaC.CAEsWT8joBuS82/rieODdwzdK83P9KZWkI0WUgAUMuA71sf7G', '0', NULL, 'approved', 'admin', NULL, '2026-08-25 05:53:57', '2026-08-25 05:53:57'),
(2, NULL, 'জনি', NULL, '01757017978', '$2y$12$wWmuSj57UbgtP0tVFFqmFeozTBRHd1ONlhzSXb3KvYnmx0lbihFU2', '0', NULL, 'approved', 'staff', NULL, '2026-08-25 19:04:45', '2026-08-25 19:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_district_id_foreign` (`district_id`),
  ADD KEY `customers_upazila_id_foreign` (`upazila_id`),
  ADD KEY `customers_thana_id_foreign` (`thana_id`),
  ADD KEY `customers_user_id_foreign` (`user_id`),
  ADD KEY `customers_location_id_foreign` (`location_id`);

--
-- Indexes for table `customer_payment_details`
--
ALTER TABLE `customer_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_payment_details_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_payment_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_user_id_foreign` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expense_type_id_foreign` (`expense_type_id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_types_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_balances`
--
ALTER TABLE `opening_balances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `opening_balances_date_user_id_unique` (`date`,`user_id`),
  ADD KEY `opening_balances_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_payment_details`
--
ALTER TABLE `order_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payment_details_order_id_foreign` (`order_id`),
  ADD KEY `order_payment_details_user_id_foreign` (`user_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_returns_order_id_foreign` (`order_id`),
  ADD KEY `product_returns_customer_id_foreign` (`customer_id`),
  ADD KEY `product_returns_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_details_product_id_foreign` (`product_id`),
  ADD KEY `purchase_order_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_order_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_payment_details`
--
ALTER TABLE `purchase_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_payment_details_purchase_order_details_id_foreign` (`purchase_order_details_id`),
  ADD KEY `purchase_payment_details_purchases_id_foreign` (`purchases_id`),
  ADD KEY `purchase_payment_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_returns_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_returns_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_returns_product_id_foreign` (`product_id`),
  ADD KEY `purchase_returns_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_user_id_foreign` (`user_id`);

--
-- Indexes for table `supplier_due_collections`
--
ALTER TABLE `supplier_due_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_due_collections_supplier_id_foreign` (`supplier_id`),
  ADD KEY `supplier_due_collections_user_id_foreign` (`user_id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanas_district_id_foreign` (`district_id`),
  ADD KEY `thanas_upazila_id_foreign` (`upazila_id`),
  ADD KEY `thanas_user_id_foreign` (`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_user_id_foreign` (`user_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`),
  ADD KEY `upazilas_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_payment_details`
--
ALTER TABLE `customer_payment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `opening_balances`
--
ALTER TABLE `opening_balances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_payment_details`
--
ALTER TABLE `order_payment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_payment_details`
--
ALTER TABLE `purchase_payment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_due_collections`
--
ALTER TABLE `supplier_due_collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_thana_id_foreign` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `customer_payment_details`
--
ALTER TABLE `customer_payment_details`
  ADD CONSTRAINT `customer_payment_details_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_type_id_foreign` FOREIGN KEY (`expense_type_id`) REFERENCES `expense_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD CONSTRAINT `expense_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `opening_balances`
--
ALTER TABLE `opening_balances`
  ADD CONSTRAINT `opening_balances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `order_payment_details`
--
ALTER TABLE `order_payment_details`
  ADD CONSTRAINT `order_payment_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD CONSTRAINT `product_returns_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `product_returns_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `product_returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchase_payment_details`
--
ALTER TABLE `purchase_payment_details`
  ADD CONSTRAINT `purchase_payment_details_purchase_order_details_id_foreign` FOREIGN KEY (`purchase_order_details_id`) REFERENCES `purchase_order_details` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_payment_details_purchases_id_foreign` FOREIGN KEY (`purchases_id`) REFERENCES `purchases` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_payment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD CONSTRAINT `purchase_returns_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_returns_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_returns_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `supplier_due_collections`
--
ALTER TABLE `supplier_due_collections`
  ADD CONSTRAINT `supplier_due_collections_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_due_collections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `thanas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `thanas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `upazilas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
