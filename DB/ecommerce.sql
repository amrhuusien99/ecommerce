-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 04:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1,
  `pin_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `created_at`, `updated_at`, `name`, `email`, `password`, `phone`, `photo`, `is_activate`, `pin_code`) VALUES
(1, '2021-01-05 10:19:43', '2021-03-23 00:39:29', 'amrr', 'amr@gmail.com', '$2y$10$F8ghCUc8Yi4EtwbsXQT9f.VGo66iJAExtgqhVmtzFz7aKzdsXLesK', '123479', 'files/images/admins/161646716950252.jpg', 1, NULL),
(2, '2021-03-21 18:49:40', '2021-03-23 00:39:10', 'amrr', 'amr@gmail.com', '$2y$10$NEkOXyhfF.yVotNztwzpdOpnrF65FpIQdrdtB5uc4e01Ww2IErN7i', '123479', 'files/images/admins/161646715040664.jpg', 1, NULL),
(3, '2021-03-22 23:45:48', '2021-03-22 23:45:49', 'mora', 'mora@gamin.com', '$2y$10$S2/NJ0XFujFYzuGhdEGdHuyMIIRJuo5i.0HiJWi.fkTowuCl9LOjG', '123454', 'files/images/admins/161646394954214.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `created_at`, `updated_at`, `is_activate`) VALUES
(2, '2021-01-15 16:01:55', '2021-01-15 16:04:28', 1),
(3, '2021-02-06 08:03:41', '2021-02-06 08:03:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `name`, `locale`, `attribute_id`) VALUES
(1, 'imagesgggg', 'en', 2),
(2, 'imagesgggg ar', 'ar', 2),
(3, 'imagesgggg es', 'es', 2),
(4, 'color', 'en', 3);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created_at`, `updated_at`, `photo`, `is_activate`) VALUES
(1, '2021-01-05 11:26:01', '2021-01-05 13:19:38', 'files/admin/images/brands/160985527782069.png', '1'),
(4, '2021-01-05 20:42:44', '2021-01-05 20:42:44', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `name`, `locale`, `brand_id`) VALUES
(1, 'ccccc', 'en', 1),
(3, 'vvvvv', 'ar', 1),
(5, 'imagesgggg', 'en', 4),
(8, 'gggggggg', 'es', 1),
(9, 'asas', 'es', 4);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `user_id`, `product_id`) VALUES
(11, '2021-02-11 21:08:19', '2021-02-11 21:08:19', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `parent_id`, `slug`, `is_activate`) VALUES
(1, '2021-01-05 10:21:04', '2021-01-05 13:14:59', NULL, 'aaaa-aaaa55', 1),
(2, '2021-01-05 10:23:49', '2021-01-05 10:23:49', 1, 'bbbb-bbbbbb', 1),
(3, '2021-01-06 09:36:38', '2021-01-06 09:36:38', 2, 'momo-mo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'aaaaaaaaa'),
(2, 1, 'ar', 'اااااااا'),
(3, 2, 'en', 'bbbbbb'),
(4, 3, 'en', 'momomomo'),
(5, 3, 'ar', 'momom55'),
(6, 2, 'ar', 'bbbb55'),
(13, 1, 'es', 'aaaaaaaaa ES'),
(14, 2, 'es', 'aaaaaaccaaa ES'),
(15, 3, 'es', 'imagesgggg es 500');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_message` enum('complaint','suggestion','enquiry') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `content`, `type_of_message`) VALUES
(1, NULL, NULL, 'agrgc rgsrfg', 'sdvsdv@gmail.com', '0452452452', 'dfvsfb sgbsfgbta sfgbsfgbsfgb bsdfafvad', 'complaint');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorates`
--

CREATE TABLE `favorates` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorates`
--

INSERT INTO `favorates` (`user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, '2021-01-26 22:33:54', '2021-01-26 22:33:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_17_134649_create_attributes_table', 1),
(4, '2019_12_17_134649_create_brands_table', 1),
(5, '2019_12_17_134649_create_categories_table', 1),
(6, '2019_12_17_134649_create_options_table', 1),
(7, '2019_12_17_134649_create_payment_methods_table', 1),
(8, '2019_12_17_134649_create_products_table', 1),
(9, '2019_12_17_134649_create_sliders_table', 1),
(10, '2020_12_17_134649_create_admins_table', 1),
(11, '2020_12_17_134649_create_attribute_translations_table', 1),
(12, '2020_12_17_134649_create_brand_translations_table', 1),
(14, '2020_12_17_134649_create_category_translations_table', 1),
(15, '2020_12_17_134649_create_contact_us_table', 1),
(17, '2020_12_17_134649_create_notifications_table', 1),
(18, '2020_12_17_134649_create_option_translations_table', 1),
(20, '2020_12_17_134649_create_product_categories_table', 1),
(21, '2020_12_17_134649_create_product_tags_table', 1),
(22, '2020_12_17_134649_create_product_translations_table', 1),
(23, '2020_12_17_134649_create_settings_table', 1),
(24, '2020_12_17_134649_create_slider_translations_table', 1),
(25, '2020_12_17_134649_create_tags_table', 1),
(26, '2020_12_17_134649_create_tags_translations_table', 1),
(27, '2020_12_17_134649_create_vendors_table', 1),
(28, '2020_12_17_134649_create_payment_method_translations_table', 2),
(29, '2020_12_17_134649_create_carts_table', 3),
(30, '2020_11_28_182605_create_favorates_table', 4),
(31, '2018_08_07_135631306565_create_orders_table', 5),
(32, '2018_09_11_213926106353_create_transactions_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notifiable_id` int(11) NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `notifiable_id`, `notifiable_type`, `title`, `content`) VALUES
(1, '2021-01-06 15:16:11', '2021-01-06 15:16:19', 1, 'App\\Models\\Admin', 'qaceaeefa esfsfsdefWF EFefsd\\fawf Fwfsdvzrfg', 'EFefsd\\fawf Fwfsdvzrfg EFefsd\\fawf Fwfsdvzrfg EFefsd\\fawf Fwfsdvzrfg EFefsd\\fawf Fwfsdvzrfg');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `created_at`, `updated_at`, `attribute_id`, `product_id`, `is_activate`) VALUES
(3, '2021-01-16 13:49:38', '2021-01-16 15:30:13', '2', '5', 1),
(6, '2021-02-06 08:04:08', '2021-02-06 08:04:08', '3', '5', 1),
(7, '2021-02-06 08:36:00', '2021-02-06 08:36:00', '3', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option_translations`
--

CREATE TABLE `option_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_translations`
--

INSERT INTO `option_translations` (`id`, `option_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'en', 'option 1', NULL, NULL),
(3, 3, 'ar', 'option ar 11', NULL, NULL),
(4, 3, 'es', 'option es 1', NULL, NULL),
(5, 6, 'en', 'red', NULL, NULL),
(6, 7, 'en', 'black', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('pending','rejected','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `product_id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_phone`, `user_name`, `address`, `quantity`, `cost`, `delivery_cost`, `total_cost`, `commission`, `net_cost`, `locale`, `status`, `state`, `product_id`, `payment_method_id`, `user_id`, `vendor_id`) VALUES
(23, '2021-02-10 16:06:07', '2021-02-10 16:06:07', '0148765489', 'AmrHussienHassan', 'cairo', 4, '1600', '100', '1700', '170', '1530', 'en', 'paid', 'pending', 5, 2, 1, 4),
(24, '2021-02-10 16:07:55', '2021-02-10 16:07:55', '0148765489', 'AmrHussienHassan', 'cairo', 5, '2000', '100', '2100', '210', '1890', 'en', 'paid', 'pending', 5, 2, 1, 4),
(27, '2021-02-11 21:08:59', '2021-02-11 21:08:59', '0148765489', 'AmrHussienHassan', 'cairo', 4, '4000', '100', '4100', '410', '3690', 'en', 'paid', 'pending', 21, 2, 1, 4),
(28, '2021-02-11 21:36:54', '2021-02-11 21:36:54', '0148765489', 'AmrHussienHassan', 'cairo', 5, '5000', '100', '5100', '510', '4590', 'en', 'paid', 'pending', 21, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `is_activate`) VALUES
(6, '2021-01-06 20:30:33', '2021-01-06 20:30:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_translations`
--

CREATE TABLE `payment_method_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_translations`
--

INSERT INTO `payment_method_translations` (`id`, `name`, `locale`, `payment_method_id`) VALUES
(1, 'Cache', 'en', 6),
(2, 'aaaaaaaaa5000', 'ar', 6),
(3, 'momomomo ES', 'es', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `special_price` int(11) DEFAULT NULL,
  `special_price_start` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_end` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` int(11) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 0,
  `special_product` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `slug`, `photo`, `photos`, `quantity`, `sku`, `price`, `special_price`, `special_price_start`, `special_price_end`, `in_stock`, `is_activate`, `special_product`, `brand_id`, `vendor_id`) VALUES
(5, '2021-01-13 01:32:13', '2021-01-27 00:32:12', 'product-11-en', 'files/admin/images/products/161171473213362.png', 'files/admin/images/products/161171473257777.png,files/admin/images/products/161171473234714.png,files/admin/images/products/161171473248720.png,files/admin/images/products/161171473236871.png', 200, 'aas55', 8500, 400, '2021-01-20', '2021-01-30', 1, 1, 1, 1, 4),
(21, '2021-01-27 01:11:18', '2021-02-11 21:36:54', 'product-3-en', 'files/admin/images/products/161171714789160.png', 'files/admin/images/products/161171714729648.png,files/admin/images/products/161171714769653.png,files/admin/images/products/161171714715112.png,files/admin/images/products/161171714780610.png', 95, NULL, 1000, NULL, NULL, NULL, NULL, 1, 1, 4, 4),
(22, '2021-02-14 15:57:44', '2021-02-14 15:59:50', 'product-1223', 'files/admin/images/products/161332557182495.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 4),
(24, '2021-02-14 22:47:45', '2021-02-14 22:48:54', 'product-5', 'files/admin/images/products/161335010435264.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `created_at`, `updated_at`, `product_id`, `category_id`) VALUES
(5, NULL, NULL, 5, 1),
(6, NULL, NULL, 5, 2),
(27, NULL, NULL, 20, 1),
(28, NULL, NULL, 20, 2),
(29, NULL, NULL, 21, 1),
(30, NULL, NULL, 21, 2),
(31, NULL, NULL, 22, 1),
(32, NULL, NULL, 22, 2),
(33, NULL, NULL, 22, 3),
(34, NULL, NULL, 23, 1),
(35, NULL, NULL, 23, 2),
(36, NULL, NULL, 23, 3),
(37, NULL, NULL, 24, 1),
(38, NULL, NULL, 24, 2),
(39, NULL, NULL, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `created_at`, `updated_at`, `product_id`, `tag_id`) VALUES
(2, NULL, NULL, 5, 1),
(11, NULL, NULL, 20, 1),
(12, NULL, NULL, 21, 1),
(13, NULL, NULL, 22, 1),
(14, NULL, NULL, 23, 1),
(15, NULL, NULL, 24, 1),
(16, NULL, NULL, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `name`, `locale`, `description`, `short_description`, `product_id`) VALUES
(1, 'product 1 en', 'en', 'the first product 1 en', 'first product 1 en', 5),
(2, 'product 1 ar', 'ar', 'the first product 1 ar', 'first product 1 ar', 5),
(3, 'product 1 es', 'es', 'the first product 1 es', 'first product 1 es', 5),
(17, 'product 3 en', 'en', 'product 3 en', 'product 3 en', 21),
(18, 'product 2 en', 'en', 'the first product 111  en', 'first product 2 en', 22),
(20, 'product 5 en', 'en', 'the first product 5 en', 'the first product 5 en', 24);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `email`, `phone`, `facebook`, `insta`, `whats_app`, `bank_name`, `commission`, `app_link`, `twitter`, `youtube`) VALUES
(1, '2021-01-08 11:05:19', '2021-01-08 09:46:07', 'amr55@gmail.com', '0123456789', 'faacebook@facebook.com', 'insta@insta.com', '013246865312', 'amrhussien55', '.10', 'http://localhost/phpmyadmin/tbl_change.php?db=ecommerce&table=settings', 'wtitter@twitter.com', 'youtube@youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `is_activate`, `photo`) VALUES
(2, '2021-01-07 22:31:29', '2021-01-18 02:45:32', 1, 'files/admin/images/sliders/161094513296934.jpg'),
(4, '2021-01-18 03:26:29', '2021-01-18 03:26:29', 1, 'files/admin/images/sliders/161094758911323.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `title`, `description`, `locale`, `slider_id`) VALUES
(1, 'INTERIOR REMODELING', 'asdg xagsfxgfasx xasgfdxgasx asfgxcasgxas asgfxcgas ascfgcashgca asgfchsgavashga jhafcastgx', 'en', 2),
(3, 'INTERIOR REMODELING5000', 'aaaaaa aaaa aaaa5000', 'ar', 2),
(4, 'INTERIOR REMODELING ES', 'aaaaaa aaaa aaaa5000 ES', 'es', 2),
(5, 'INTERIOR REMODELING 500500', 'the first product 111  the first product 111', 'en', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `slug`, `vendor_id`, `is_activate`) VALUES
(1, '2021-01-05 20:47:21', '2021-01-06 09:18:34', 'image-name55', NULL, 1),
(3, '2021-02-14 22:44:25', '2021-02-14 22:46:43', 'aaaa-aaaa', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags_translations`
--

CREATE TABLE `tags_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_translations`
--

INSERT INTO `tags_translations` (`id`, `name`, `locale`, `tag_id`) VALUES
(1, 'imagesgggg995', 'en', 1),
(2, 'imagesgggg55', 'ar', 1),
(4, 'imagesgggg es 500', 'es', 1),
(5, 'aaaaaaaaa', 'en', 3),
(6, 'aaaaaaa ar', 'ar', 3),
(7, 'aaaaaa es', 'es', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `transaction_id`, `payment_method_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 23, '060646043735741962', '2', NULL, '2021-02-10 16:06:07', '2021-02-10 16:06:07'),
(22, 24, '060646043935742062', '2', NULL, '2021-02-10 16:07:55', '2021-02-10 16:07:55'),
(25, 27, '060655620245281462', '2', NULL, '2021-02-11 21:08:59', '2021-02-11 21:08:59'),
(26, 28, '060655621045281962', '2', NULL, '2021-02-11 21:36:54', '2021-02-11 21:36:54');

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
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1,
  `pin_code` int(11) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `phone`, `is_activate`, `pin_code`, `api_token`) VALUES
(1, 'AmrHussienHassan55566', 'amrrr@gmail.com', NULL, '$2y$10$Cdn4dLfm8IbELdjNy3USc.tdkcIptgaqen7oUXoTSNaoNsWOzx.cy', NULL, '2021-01-06 18:05:15', '2021-02-12 13:33:53', 'files/admin/images/users/160996351563894.png', '0148765489', 1, NULL, 'I8LDf4e8yPNGSbt5lh4IR3VUsQnlfXuSgY3hF2MNzFVesYUjePyjH6sB7qjt'),
(4, 'amrhussien', 'am@gamil.com', NULL, '$2y$10$YcvlKzf6.ZGNZLdyBa9tiu5BuJQA9402XXI8Wcz7NGcFSi3FgFztO', NULL, '2021-02-12 14:06:37', '2021-02-12 14:06:37', 'files/admin/images/users/161314599730999.jpg', '01533456789', 1, NULL, 'PjJN1sjddiZm6RV58rXuIMxj05ENZE0lsBOlVxm7cUUJldvpHHy9nwCYdtwk');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_cost` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_order` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'close',
  `special_vendor` int(11) NOT NULL DEFAULT 0,
  `pin_code` int(11) DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `photo`, `address`, `delivery_cost`, `minimum_order`, `is_activate`, `state`, `special_vendor`, `pin_code`, `api_token`) VALUES
(4, '2021-01-07 11:31:43', '2021-02-14 13:43:09', 'AmrHussienHassan', 'amrhuusien999@gmail.com', '0201867608', '$2y$10$IxYDXmWlV07prkjgVaRuP.oTlvGfK1wPEwj66jgI9dCdBxC7nySb2', 'files/admin/images/vendors/161036951953174.png', 'cairo', '100', '200', 1, 'close', 1, NULL, 'I8LDf4e8yPNGSbt5lh4IR3VUsQnlfXuSgY3hF2MNzFVesYUjePyjH6sB7iRf'),
(6, '2021-02-14 21:34:51', '2021-02-14 21:35:05', 'momomomo', 'mo@gamil.com', '01533456789000', '$2y$10$UVRT6/V7F1cDz2u7aLn8V.YpfD4Ll0yh0aMssviSfMXFPWGkovnny', 'files/admin/images/vendors/161334569168723.jpg', 'cairo', '50', '200', 1, 'close', 1, NULL, 'ZofoYyi6FjlfqXFVLNyMDVgtKjdv207s8Pbbw9h2xvZ5S0Fdlu6nwSAGnTM5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_translations_brand_id_locale_unique` (`brand_id`,`locale`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorates`
--
ALTER TABLE `favorates`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_translations_option_id_locale_unique` (`option_id`,`locale`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method_translations`
--
ALTER TABLE `payment_method_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_method_translations_payment_method_id_locale_unique` (`payment_method_id`,`locale`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_unique` (`locale`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slider_translations_slider_id_locale_unique` (`slider_id`,`locale`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_translations`
--
ALTER TABLE `tags_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_translations_tag_id_locale_unique` (`tag_id`,`locale`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_order_id_unique` (`order_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `option_translations`
--
ALTER TABLE `option_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method_translations`
--
ALTER TABLE `payment_method_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags_translations`
--
ALTER TABLE `tags_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD CONSTRAINT `brand_translations_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD CONSTRAINT `option_translations_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_method_translations`
--
ALTER TABLE `payment_method_translations`
  ADD CONSTRAINT `payment_method_translations_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_translations`
--
ALTER TABLE `tags_translations`
  ADD CONSTRAINT `tags_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
