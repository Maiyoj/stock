-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 05:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `approves`
--

CREATE TABLE `approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requests_id` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engineer_comments`
--

CREATE TABLE `engineer_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_engineer_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engineer_reports`
--

CREATE TABLE `engineer_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_engineer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allocated_quantity` int(11) NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engineer_reports`
--

INSERT INTO `engineer_reports` (`id`, `user_id`, `request_engineer_id`, `item_id`, `site_name`, `client_name`, `allocated_quantity`, `document`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'kenya', 'kenya', 100, '1643657108.purchase', '2022-01-31 19:25:08', '2022-01-31 19:25:08'),
(2, 3, 1, 2, 'kenya', 'kenya', 100, '1643657139.pdf', '2022-01-31 19:25:39', '2022-01-31 19:25:39'),
(3, 3, 3, 1, 'kenya', 'kenya', 10, '1643694758.pdf', '2022-02-01 05:52:38', '2022-02-01 05:52:38'),
(4, 3, 4, 1, 'kenya', 'kenya', 50, '1643788161.purchase', '2022-02-02 07:49:21', '2022-02-02 07:49:21'),
(5, 3, 4, 2, 'kenya', 'kenya', 50, '1643788236.pdf', '2022-02-02 07:50:36', '2022-02-02 07:50:36'),
(6, 3, 1, 1, 'kenya', 'kenya', 50, '1643869859.pdf', '2022-02-03 06:30:59', '2022-02-03 06:30:59'),
(7, 3, 5, 1, 'kenya', 'kenya', 50, '1643870269.pdf', '2022-02-03 06:37:49', '2022-02-03 06:37:49'),
(8, 3, 5, 2, 'kenya', 'kenya', 50, '1643881565.pdf', '2022-02-03 09:46:05', '2022-02-03 09:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issuancees`
--

CREATE TABLE `issuancees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issuances`
--

CREATE TABLE `issuances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `threshold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `type`, `name`, `description`, `units`, `sku`, `created_at`, `updated_at`, `deleted_at`, `threshold`) VALUES
(1, 'Goods', 'Cables', 'This is Cable', 'meters', '234', '2022-01-31 09:33:06', '2022-01-31 09:33:06', NULL, '50'),
(2, 'Goods', 'Tv', 'Samsung', 'boxs', 'er', '2022-01-31 09:33:29', '2022-01-31 09:33:29', NULL, '50'),
(3, 'Goods', 'rj45', 'C type', 'pieces', 'ere', '2022-01-31 09:34:02', '2022-01-31 09:34:02', NULL, '50');

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
(48, '2022_01_31_103859_add_teamlead_id_to_requests', 3),
(49, '2014_10_12_000000_create_users_table', 4),
(50, '2014_10_12_100000_create_password_resets_table', 4),
(51, '2019_08_19_000000_create_failed_jobs_table', 4),
(52, '2021_08_15_100334_create_items_table', 4),
(53, '2021_08_16_120759_create_purchases_table', 4),
(54, '2021_08_18_070210_create_zones_table', 4),
(55, '2021_08_19_040143_create_stocks_table', 4),
(56, '2021_08_20_033625_create_issuances_table', 4),
(57, '2021_08_20_083639_create_issuancees_table', 4),
(58, '2021_08_22_090240_create_team_lead_stocks_table', 4),
(59, '2021_08_25_030027_adds_softdeletes_to_items', 4),
(60, '2021_08_25_052950_adds_softdeletes_to_purchases', 4),
(61, '2021_08_25_053747_adds_softdeletes_to_zones', 4),
(62, '2021_08_25_054153_adds_softdeletes_to_users', 4),
(63, '2021_08_25_055420_adds_softdeletes_to_issuances', 4),
(64, '2021_08_25_060203_adds_softdeletes_to_issuancees', 4),
(65, '2021_08_26_055029_create_profiles_table', 4),
(66, '2021_08_26_074645_adds_softdeletes_to_stocks', 4),
(67, '2021_08_27_131802_adds_softdeletes_to_team_lead_stocks', 4),
(68, '2021_08_27_143745_create_vendors_table', 4),
(69, '2021_08_27_151250_create_prices_table', 4),
(70, '2021_08_27_155040_adds_softdeletes_to_prices', 4),
(71, '2021_08_27_155441_adds_softdeletes_to_vendors', 4),
(72, '2021_08_28_014133_create_returneds_table', 4),
(73, '2021_08_28_200936_create_returns_table', 4),
(74, '2021_08_28_210851_adds_softdeletes_to_returneds', 4),
(75, '2021_08_28_211019_adds_softdeletes_to_returns', 4),
(76, '2021_09_08_231537_create_approves_table', 4),
(77, '2021_09_09_092252_create_requests_table', 4),
(78, '2021_09_10_121420_create_request_engineers_table', 4),
(79, '2021_09_13_080404_adds_threshold_to_items', 4),
(80, '2021_09_23_153217_create_purchase_items_table', 4),
(81, '2021_09_23_153542_alter_table_purchases', 4),
(82, '2021_09_24_020437_alter_table_requests', 4),
(83, '2021_09_24_020846_create_request_items_table', 4),
(84, '2021_09_24_032439_alter_table_engineer_requests', 4),
(85, '2021_09_24_033610_create_request_engineers_items_table', 4),
(86, '2021_11_16_131946_create_permission_tables', 4),
(87, '2021_12_08_070223_add_engineer_id_to_request', 4),
(88, '2021_12_08_071958_add_draft_to_request_engineer', 4),
(89, '2021_12_08_131244_add_draft_to_requests', 4),
(90, '2021_12_09_120907_create_comments_table', 4),
(91, '2021_12_21_162128_create_engineer_comments_table', 4),
(92, '2022_01_11_054849_add_date_to_purchases', 4),
(93, '2022_01_11_065842_create_engineer_reports_table', 4),
(94, '2022_02_01_094026_add_teamlead_id_to_requests_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'item', 'web', '2022-01-31 09:48:06', '2022-01-31 09:48:06'),
(2, 'vendor', 'web', '2022-01-31 09:48:14', '2022-01-31 09:48:14'),
(3, 'price', 'web', '2022-01-31 09:48:30', '2022-01-31 09:48:30'),
(4, 'purchases', 'web', '2022-01-31 09:48:46', '2022-01-31 09:48:46'),
(5, 'stock', 'web', '2022-01-31 09:48:59', '2022-01-31 12:47:34'),
(6, 'zone', 'web', '2022-01-31 09:49:10', '2022-01-31 09:49:10'),
(7, 'approve', 'web', '2022-01-31 09:49:25', '2022-01-31 09:49:25'),
(8, 'team', 'web', '2022-01-31 09:49:43', '2022-01-31 12:55:53'),
(9, 'request', 'web', '2022-01-31 09:49:53', '2022-01-31 09:49:53'),
(10, 'approval', 'web', '2022-01-31 09:50:11', '2022-01-31 09:50:11'),
(11, 'requestengineer', 'web', '2022-01-31 09:50:38', '2022-01-31 09:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `vendor_id`, `item_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 400, '2022-01-31 09:36:17', '2022-01-31 09:36:17', NULL),
(2, 1, 2, 400, '2022-01-31 09:36:28', '2022-01-31 09:36:28', NULL),
(3, 2, 3, 400, '2022-01-31 09:36:40', '2022-01-31 09:36:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `PO_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `delivery_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `vendor_id`, `PO_number`, `price`, `created_at`, `updated_at`, `deleted_at`, `date`, `delivery_note`) VALUES
(1, 1, 'kj', 12000000, '2022-01-31 09:37:50', '2022-01-31 09:37:50', NULL, '2022-01-31', '1643621854.purchase');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000, '2022-01-31 09:37:50', '2022-01-31 09:37:50'),
(2, 1, 2, 10000, '2022-01-31 09:37:50', '2022-01-31 09:37:50'),
(3, 1, 3, 10000, '2022-01-31 09:37:51', '2022-01-31 09:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `pmstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT 0,
  `teamlead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `zone_id`, `pmstatus`, `status`, `created_at`, `updated_at`, `draft`, `teamlead_id`) VALUES
(22, 7, 1, 'waiting', 'pending', '2022-02-03 07:05:17', '2022-02-03 07:09:20', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `request_engineers`
--

CREATE TABLE `request_engineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `engineer_id` int(11) NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_engineers`
--

INSERT INTO `request_engineers` (`id`, `user_id`, `zone_id`, `purpose`, `status`, `rstatus`, `created_at`, `updated_at`, `engineer_id`, `draft`) VALUES
(1, 1, 1, 'Deployment', 'pending', 'Not received', '2022-01-31 19:23:28', '2022-02-01 07:28:32', 6, 1),
(2, 6, 1, 'Deployment', 'pending', 'Not received', '2022-01-31 19:24:11', '2022-02-01 05:46:38', 3, 1),
(3, 6, 1, 'Deployment', 'pending', 'Not received', '2022-02-01 05:48:14', '2022-02-01 05:48:26', 3, 1),
(4, 6, 1, 'Deployment', 'pending', 'Not received', '2022-02-02 07:45:36', '2022-02-02 07:46:11', 3, 1),
(5, 6, 1, 'Survey', 'pending', 'Not received', '2022-02-03 06:32:43', '2022-02-03 06:37:08', 3, 1),
(6, 6, 1, 'Survey', 'pending', 'Not received', '2022-02-03 06:35:04', '2022-02-03 06:35:04', 3, 0),
(7, 7, 1, 'Deployment', 'pending', 'Not received', '2022-02-03 06:36:54', '2022-02-03 06:36:54', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_engineers_items`
--

CREATE TABLE `request_engineers_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_engineer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_engineers_items`
--

INSERT INTO `request_engineers_items` (`id`, `request_engineer_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, '2022-01-31 19:23:29', '2022-02-01 07:28:29'),
(2, 1, 2, 100, '2022-01-31 19:23:29', '2022-01-31 19:23:29'),
(3, 2, 1, 200, '2022-01-31 19:24:11', '2022-01-31 19:24:11'),
(4, 2, 2, 100, '2022-01-31 19:24:11', '2022-01-31 19:24:11'),
(5, 3, 1, 100, '2022-02-01 05:48:14', '2022-02-01 05:48:14'),
(6, 3, 2, 100, '2022-02-01 05:48:14', '2022-02-01 05:48:14'),
(7, 4, 1, 100, '2022-02-02 07:45:36', '2022-02-02 07:45:36'),
(8, 4, 2, 100, '2022-02-02 07:45:37', '2022-02-02 07:45:37'),
(9, 5, 1, 100, '2022-02-03 06:32:44', '2022-02-03 06:32:44'),
(10, 5, 2, 100, '2022-02-03 06:32:44', '2022-02-03 06:32:44'),
(11, 6, 1, 1001, '2022-02-03 06:35:04', '2022-02-04 10:25:23'),
(12, 6, 2, 100, '2022-02-03 06:35:04', '2022-02-03 06:35:04'),
(13, 7, 1, 100, '2022-02-03 06:36:55', '2022-02-03 06:36:55'),
(14, 7, 2, 100, '2022-02-03 06:36:55', '2022-02-03 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `request_items`
--

CREATE TABLE `request_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requests_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`id`, `requests_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000, '2022-01-31 10:03:29', '2022-01-31 10:03:29'),
(2, 1, 2, 1000, '2022-01-31 10:03:29', '2022-01-31 10:03:29'),
(3, 2, 1, 1000, '2022-01-31 10:04:05', '2022-01-31 10:04:05'),
(4, 2, 2, 1000, '2022-01-31 10:04:05', '2022-01-31 10:04:05'),
(5, 3, 1, 1000, '2022-01-31 11:31:56', '2022-01-31 11:31:56'),
(6, 3, 2, 1000, '2022-01-31 11:31:56', '2022-01-31 11:31:56'),
(7, 4, 1, 1001, '2022-01-31 11:32:23', '2022-02-01 13:52:40'),
(8, 5, 1, 100, '2022-02-01 06:48:54', '2022-02-01 06:48:54'),
(9, 5, 3, 100, '2022-02-01 06:48:54', '2022-02-01 06:48:54'),
(10, 6, 1, 100, '2022-02-01 06:49:26', '2022-02-01 06:49:26'),
(11, 6, 3, 100, '2022-02-01 06:49:26', '2022-02-01 06:49:26'),
(12, 7, 1, 100, '2022-02-01 06:53:14', '2022-02-01 06:53:14'),
(13, 7, 2, 100, '2022-02-01 06:53:14', '2022-02-01 06:53:14'),
(14, 8, 1, 100, '2022-02-01 06:53:43', '2022-02-01 06:53:43'),
(15, 9, 1, 100, '2022-02-01 06:54:11', '2022-02-01 06:54:11'),
(16, 10, 1, 100, '2022-02-01 06:56:21', '2022-02-01 06:56:21'),
(17, 11, 1, 100, '2022-02-01 06:56:35', '2022-02-01 06:56:35'),
(18, 12, 1, 100, '2022-02-01 06:56:52', '2022-02-01 06:56:52'),
(19, 13, 1, 100, '2022-02-01 06:58:59', '2022-02-01 06:58:59'),
(20, 14, 1, 100, '2022-02-01 07:02:20', '2022-02-01 07:02:20'),
(21, 15, 1, 100, '2022-02-01 07:08:57', '2022-02-01 07:08:57'),
(22, 16, 1, 100, '2022-02-01 07:12:42', '2022-02-01 07:12:42'),
(23, 16, 2, 100, '2022-02-01 07:12:42', '2022-02-01 07:12:42'),
(24, 17, 1, 100, '2022-02-01 07:50:27', '2022-02-01 07:50:27'),
(25, 17, 2, 100, '2022-02-01 07:50:27', '2022-02-01 07:50:27'),
(26, 18, 1, 100, '2022-02-02 14:09:25', '2022-02-02 14:09:25'),
(27, 18, 2, 100, '2022-02-02 14:09:25', '2022-02-02 14:09:25'),
(28, 19, 1, 100, '2022-02-02 14:10:32', '2022-02-02 14:10:32'),
(29, 20, 1, 100, '2022-02-03 06:39:04', '2022-02-03 06:39:04'),
(30, 21, 1, 100, '2022-02-03 06:41:30', '2022-02-03 06:41:30'),
(31, 21, 2, 1000, '2022-02-03 06:41:30', '2022-02-03 06:41:30'),
(32, 22, 1, 100, '2022-02-03 07:05:18', '2022-02-03 07:05:18'),
(33, 22, 3, 100, '2022-02-03 07:05:18', '2022-02-03 07:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `returneds`
--

CREATE TABLE `returneds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-01-31 09:28:51', '2022-01-31 09:28:51'),
(2, 'TeamLead', 'web', '2022-01-31 09:38:36', '2022-01-31 09:38:36'),
(3, 'Engineer', 'web', '2022-01-31 09:40:20', '2022-01-31 09:40:20'),
(4, 'Manager', 'web', '2022-01-31 09:40:31', '2022-01-31 09:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 8900, '2022-01-31 09:37:50', '2022-02-01 13:51:57', NULL),
(2, 2, 9000, '2022-01-31 09:37:50', '2022-01-31 10:05:22', NULL),
(3, 3, 10000, '2022-01-31 09:37:51', '2022-01-31 09:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_lead_stocks`
--

CREATE TABLE `team_lead_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_lead_stocks`
--

INSERT INTO `team_lead_stocks` (`id`, `user_id`, `item_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 1, 1100, '2022-01-31 10:05:23', '2022-02-01 13:51:57', NULL),
(2, 6, 2, 1000, '2022-01-31 10:05:23', '2022-01-31 10:05:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$wk0s86kOFWseGX6xmQx.oe3CzbDZRYM41/SHpxt7X.qDbMFqcJidu', NULL, '2022-01-31 09:30:54', '2022-01-31 09:30:54', NULL),
(3, 'Engineer', 'eng@gmail.com', NULL, '$2y$10$dDiPvrrxurLmczuXUM/UtuRfz.NNM/uK1u55TzoYxBrUrcTMWySZC', NULL, '2022-01-31 09:41:48', '2022-01-31 09:41:48', NULL),
(6, 'Teamlead', 'team@gmail.com', NULL, '$2y$10$JLoHegAXFgW5/g4jtMxjTO2Eoo6/mqd8uNI.g3jFtlyVHMJhCOM1.', NULL, '2022-01-31 09:44:52', '2022-01-31 09:44:52', NULL),
(7, 'Storemanager', 'manager@gmail.com', NULL, '$2y$10$mZSY/YttCGiTwNRjpx4YuOTR/OG5/oD3lOsuw.779.obbjNFNVHLC', NULL, '2022-01-31 09:46:13', '2022-01-31 09:46:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `title`, `name`, `email`, `number`, `address`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Company', 'Safaricom', 'saf@gmail.com', '8907', '3768', 'Kenya', '2022-01-31 09:34:43', '2022-01-31 09:34:43', NULL),
(2, 'Company', 'RAD', 'rad@gmail.com', '6758', '98', 'Israel', '2022-01-31 09:36:05', '2022-01-31 09:36:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `user_id`, `zone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'Zone C1', '2022-01-31 10:03:06', '2022-01-31 10:03:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approves`
--
ALTER TABLE `approves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer_comments`
--
ALTER TABLE `engineer_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer_reports`
--
ALTER TABLE `engineer_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `issuancees`
--
ALTER TABLE `issuancees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuances`
--
ALTER TABLE `issuances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_engineers`
--
ALTER TABLE `request_engineers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_engineers_items`
--
ALTER TABLE `request_engineers_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returneds`
--
ALTER TABLE `returneds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_lead_stocks`
--
ALTER TABLE `team_lead_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approves`
--
ALTER TABLE `approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `engineer_comments`
--
ALTER TABLE `engineer_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `engineer_reports`
--
ALTER TABLE `engineer_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuancees`
--
ALTER TABLE `issuancees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuances`
--
ALTER TABLE `issuances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `request_engineers`
--
ALTER TABLE `request_engineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_engineers_items`
--
ALTER TABLE `request_engineers_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `returneds`
--
ALTER TABLE `returneds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_lead_stocks`
--
ALTER TABLE `team_lead_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
