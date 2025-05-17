-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 02:52 AM
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
-- Database: `uzi-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'WELCOME TO THE FAMILY', 'Welcome to the UZI Family! When you crack open an UZI, you’re embracing unforgettable flavor and letting the good times roll. Join us for a vibrant experience that brings everyone together!', '1747342062_about_us.png', '2025-05-14 18:33:16', '2025-05-15 16:09:30'),
(2, 'THE UZI DIFFERENCE', 'It’s all about our special ingredients! We’ve got electrolytes to keep you refreshed and hydrated, ensuring the good times keep rolling. Grab a can and taste the difference!', '1747265679_about_us.png', '2025-05-14 18:34:39', '2025-05-14 18:34:39'),
(3, 'THE NEW WAY TO BUZZ', 'Forget the same old, same old. UZI is the new way to buzz! Whether you\'re at a beach party, a backyard BBQ, or just chilling with friends, UZI brings that extra + to your experience. We\'re here to shake things up!', '1747265730_about_us.png', '2025-05-14 18:35:30', '2025-05-14 18:35:30'),
(4, 'Join The UZI Movement', 'We\'re more than just a hard seltzer. We\'re a lifestyle. A community of like-minded individuals who believe in having fun and making the most out of every moment. So, crack open a can of UZI!', '1747265774_about_us.png', '2025-05-14 18:36:14', '2025-05-14 18:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '$2y$10$k42gvgKpXXSj8mTECcKHauE4/WXfKRyEXIqt1nUBla4a8CRq7agLC', 0, NULL, NULL, '2025-05-12 16:19:47', '2025-05-12 16:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `banner_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page`, `site_name`, `banner`, `banner_description`, `created_at`, `updated_at`) VALUES
(1, 'home', 'the new way to buzz!', '1747250488.png', 'changing the game with one bold at a time', '2025-05-14 14:21:28', '2025-05-14 14:21:28'),
(2, 'about', 'About Uzi', NULL, '\"<b>What\'s in UZI</b>?\":At UZI Hard Seltzer, we craft bold, refreshing drinks using natural ingredients. Our hard seltzer features real fruit juice and a vodka base, plus added electrolytes to keep you hydrated. We’re all about delivering unique experiences with every sip. When you grab a UZI Hard Seltzer, you’re joining a vibe. It’s about good times with friends and making memories. So crack open a can and enjoy!', '2025-05-14 14:25:52', '2025-05-15 16:14:25'),
(3, 'Ingredients', 'Ingredients', NULL, 'At UZI Hard Seltzer, we’re all about bold flavors and innovative recipes. Our special hard seltzer features real fruit juice and a vodka base for a refreshing taste, with added electrolytes for a little extra kick. We’re here to push boundaries and deliver unique experiences. So grab a can of UZI and let the good times roll!', '2025-05-14 14:28:40', '2025-05-14 14:28:40'),
(4, 'find uzi', 'Find Uzi', NULL, 'WE BROUGHT UZI TO YOUR NEIGHBORHOOD. TRY OUR PRODUCTS TO EXPERIENCE THE NEW WAY TO BUZZ. PLEASE CONTACT YOUR RETAILER TO ENSURE PRODUCTS ARE IN STOCK. ALL PRODUCTS ARE SUBJECT TO AVAILABILITY. PLEASE CONTACT YOUR RETAILER TO ENSURE PRODUCTS ARE IN STOCK.', '2025-05-14 14:29:44', '2025-05-14 14:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Soft Drinks', 'soft-drinks', '2025-05-12 16:57:44', '2025-05-12 16:57:44');

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
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'slider image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(2, 'product', '1747255418_slider.png', '2025-05-14 15:43:38', '2025-05-14 15:43:38'),
(3, 'product', '1747255438_slider.png', '2025-05-14 15:43:58', '2025-05-14 15:43:58'),
(4, 'product', '1747257622_slider.png', '2025-05-14 16:20:22', '2025-05-14 16:20:22'),
(5, 'product', '1747257639_slider.png', '2025-05-14 16:20:39', '2025-05-14 16:20:39'),
(6, 'product', '1747257673_slider.png', '2025-05-14 16:21:13', '2025-05-14 16:21:13'),
(7, 'product', '1747257701_slider.png', '2025-05-14 16:21:41', '2025-05-14 16:21:41'),
(8, 'malibu', '1747260703.jpg', '2025-05-14 16:22:28', '2025-05-14 17:11:43'),
(9, 'malibu', '1747257816_slider.png', '2025-05-14 16:23:36', '2025-05-14 16:23:36'),
(10, 'malibu', '1747257838_slider.png', '2025-05-14 16:23:58', '2025-05-14 16:23:58'),
(11, 'malibu', '1747257880_slider.png', '2025-05-14 16:24:40', '2025-05-14 16:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MILK THISTLE', '<p><b>Milk Thistle </b>, a herb with a legacy spanning over 2,000 years, has\r\n                                                long been revered for its remarkable liver-supporting properties.\r\n                                                Originating from the Mediterranean region, this herb is recognized for its\r\n                                                distinctive spiky purple flowers and glossy green leaves.\r\n\r\n                                                <br>\r\n                                                <b>Historical Use:</b> Ancient civilizations, including the Greeks and\r\n                                                Romans, utilized milk thistle for its therapeutic benefits,\r\n                                                particularly its ability to promote liver health and aid digestion.\r\n                                                <br>\r\n                                                <b>Modern Application:</b> Today, milk thistle continues to be valued for\r\n                                                its active component, silymarin,\r\n                                                which is believed to have antioxidant and anti-inflammatory effects that\r\n                                                support liver function and protect against toxins.\r\n                                                <br>\r\n                                                <b>In UZI Hard Seltzer: </b> We incorporate milk thistle into our alcoholic\r\n                                                hard seltzer not only for its historical reputation but also for its\r\n                                                potential health benefits.\r\n                                                By infusing this ancient herb into our drinks,\r\n                                                we aim to offer a refreshing beverage that not only provides enjoyment but\r\n                                                also supports your well-being.\r\n                                            </p>', '1747352553.png', 1, '2025-05-15 18:18:33', '2025-05-15 18:42:33'),
(2, 'ELECTROLYTES', '<p><b>Electrolytes </b>, Electrolytes are essential minerals that play a crucial\r\n                                                role in maintaining hydration and supporting various bodily functions.\r\n                                                In UZI Hard Seltzer, we specifically incorporate Potassium and Sodium,\r\n                                                two primary electrolytes.\r\n                                                <br>\r\n                                                <b>Hydration Support: </b> Potassium and Sodium help regulate the balance of\r\n                                                fluids in the body, ensuring proper hydration levels.\r\n                                                They facilitate the absorption of water and other nutrients across cell\r\n                                                membranes,\r\n                                                aiding in efficient hydration and preventing dehydration.\r\n                                                <br>\r\n                                                <b>Muscle Function and Nerve Signaling:</b> These electrolytes are vital for\r\n                                                proper muscle function and nerve signaling.\r\n                                                They assist muscles in contracting effectively and ensure that nerve\r\n                                                impulses are transmitted efficiently throughout the body.\r\n                                                <br>\r\n                                                <b>In UZI Hard Seltzer: </b> By including Potassium and Sodium in our\r\n                                                alcoholic hard seltzer, we aim to enhance hydration and support your body\'s\r\n                                                natural equilibrium.\r\n                                                Whether you\'re enjoying our seltzer during leisure time or after physical\r\n                                                exertion,\r\n                                                our formulation helps replenish these essential electrolytes lost, promoting\r\n                                                optimal hydration and leaving you feeling refreshed.\r\n                                                <br>\r\n                                                <b>Note:</b> Including other government health articles your consumers can\r\n                                                visit to get more information about these ingredients.\r\n                                            </p>', '1747351486.png', 1, '2025-05-15 18:24:46', '2025-05-15 18:24:46'),
(3, 'GLUTEN FREE', '<p><b>Gluten-Free</b>, Gluten-Free is a term used to describe products that do\r\n                                                not contain gluten, a protein found in wheat, barley, rye, and their\r\n                                                derivatives.\r\n                                                For those with celiac disease or gluten sensitivity,\r\n                                                avoiding gluten is crucial for maintaining health and well-being.\r\n\r\n                                                <br>\r\n                                                <b>Health and Digestive Benefits:</b> Avoiding gluten helps prevent the\r\n                                                adverse effects associated with gluten consumption, such as gastrointestinal\r\n                                                discomfort,\r\n                                                bloating, and fatigue. For individuals with celiac disease, consuming gluten\r\n                                                can trigger an autoimmune response that damages the small intestine,\r\n                                                leading to malabsorption of nutrients and various health issues.\r\n                                                A gluten-free diet alleviates these symptoms and supports proper digestive\r\n                                                health.\r\n                                                <br>\r\n                                                <b>In Our Products:</b>We ensure that our offerings are formulated to be\r\n                                                gluten-free, catering to those with gluten sensitivities or celiac disease.\r\n                                                Our gluten-free products are crafted with care to maintain both taste and\r\n                                                nutritional value,\r\n                                                allowing you to enjoy our offerings with confidence in their safety and\r\n                                                quality.\r\n\r\n                                            </p>', '1747351540.png', 1, '2025-05-15 18:25:40', '2025-05-15 18:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 'California', 36.778300, -119.417900, '2025-05-13 12:47:15', '2025-05-13 16:57:02'),
(3, 'New York', 43.299400, -74.217900, '2025-05-13 12:48:14', '2025-05-13 16:57:26'),
(4, 'Washington', 47.751100, -120.740100, '2025-05-13 14:40:28', '2025-05-13 16:57:45'),
(5, 'Massachusetts', 42.407200, -71.382400, '2025-05-13 14:47:36', '2025-05-13 16:58:13'),
(6, 'Texas', 31.968600, -99.901800, '2025-05-14 13:10:41', '2025-05-14 13:10:41'),
(7, 'Florida', 27.994400, -81.760300, '2025-05-14 13:16:37', '2025-05-14 13:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `location_coordinates`
--

CREATE TABLE `location_coordinates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinate_id` bigint(20) UNSIGNED NOT NULL,
  `place` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_coordinates`
--

INSERT INTO `location_coordinates` (`id`, `coordinate_id`, `place`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(4, 25, 'Fifth Avenue', 40.773998, -73.966003, '2025-05-16 17:30:16', '2025-05-16 17:30:16'),
(5, 25, 'Manhattan', 40.776676, -73.971321, '2025-05-16 17:30:16', '2025-05-16 17:30:16'),
(6, 25, 'Midtown Manhattan', 40.754932, -73.984016, '2025-05-16 17:41:23', '2025-05-16 17:41:23'),
(7, 25, 'Top of The Rock:', 40.75906, -73.979431, '2025-05-16 17:41:23', '2025-05-16 17:41:23'),
(8, 25, 'Central Park', 40.785091, -73.968285, '2025-05-16 17:41:23', '2025-05-16 17:41:23'),
(9, 26, 'Hollywood Boulevard', 34.101585, -118.333626, '2025-05-16 17:45:46', '2025-05-16 17:45:46'),
(10, 26, 'Death Valley National Park', 36.5054, -117.0794, '2025-05-16 17:45:46', '2025-05-16 17:45:46'),
(11, 26, 'Disneyland Park', 33.812511, -117.918976, '2025-05-16 17:45:46', '2025-05-16 17:45:46'),
(12, 27, 'Walt Disney World', 28.385233, -81.563873, '2025-05-16 17:48:58', '2025-05-16 17:48:58'),
(13, 27, 'Miami', 25.761681, -80.191788, '2025-05-16 17:48:58', '2025-05-16 17:48:58'),
(14, 28, 'Seattle', 47.608013, -122.335167, '2025-05-16 18:20:18', '2025-05-16 18:20:18'),
(15, 28, 'Olympia', 47.0379, -122.9007, '2025-05-16 18:20:18', '2025-05-16 18:20:18'),
(16, 28, 'Spokane', 47.6588, -117.426, '2025-05-16 18:20:18', '2025-05-16 18:20:18'),
(17, 29, 'Boston', 42.3601, -71.0589, '2025-05-16 18:22:28', '2025-05-16 18:22:28'),
(18, 29, 'Harvard University', 42.3736, -71.1097, '2025-05-16 18:22:28', '2025-05-16 18:22:28');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_13_203018_create_admins_table', 1),
(6, '2025_03_17_194956_create_site_contents_table', 1),
(7, '2025_03_17_211038_create_social_links_table', 1),
(8, '2025_03_18_171728_create_homes_table', 1),
(9, '2025_03_19_210222_create_about_us_table', 1),
(10, '2025_03_19_212426_create_our_clients_table', 1),
(11, '2025_03_20_214305_create_categories_table', 1),
(12, '2025_03_20_214316_create_products_table', 1),
(13, '2025_04_16_192715_create_banners_table', 1),
(14, '2025_04_17_004115_create_ingredients_table', 1),
(15, '2025_04_17_220514_create_terms_and_conditions_table', 1),
(16, '2025_04_29_222824_create_carts_table', 1),
(17, '2025_04_29_223642_create_cart_items_table', 1),
(18, '2025_05_02_000421_create_orders_table', 1),
(19, '2025_05_02_001510_create_order_items_table', 1),
(20, '2025_05_02_195111_create_shipping_details_table', 1),
(21, '2025_05_12_211525_create_locations_table', 1),
(22, '2025_05_12_211734_create_product_locations_table', 1),
(23, '2025_05_16_220347_create_location_coordinates_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_clients`
--

CREATE TABLE `our_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_clients`
--

INSERT INTO `our_clients` (`id`, `company_logo`, `company_link`, `status`, `created_at`, `updated_at`) VALUES
(1, '1747349399.png', NULL, 1, '2025-05-15 16:50:07', '2025-05-15 17:49:59'),
(2, '1747345988.png', NULL, 1, '2025-05-15 16:53:08', '2025-05-15 16:53:08'),
(3, '1747346001.png', NULL, 1, '2025-05-15 16:53:21', '2025-05-15 16:53:21'),
(4, '1747346014.png', NULL, 1, '2025-05-15 16:53:34', '2025-05-15 16:53:34'),
(5, '1747346030.png', NULL, 1, '2025-05-15 16:53:50', '2025-05-15 16:53:50'),
(6, '1747346050.png', NULL, 1, '2025-05-15 16:54:10', '2025-05-15 16:54:10'),
(7, '1747346061.png', NULL, 1, '2025-05-15 16:54:21', '2025-05-15 16:54:21'),
(8, '1747346073.png', NULL, 1, '2025-05-15 16:54:33', '2025-05-15 16:54:33'),
(9, '1747346083.png', NULL, 1, '2025-05-15 16:54:43', '2025-05-15 16:54:43');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `discount_percentage` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `packing_image` varchar(255) DEFAULT NULL,
  `fruit_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `stock`, `discount_percentage`, `description`, `image`, `packing_image`, `fruit_image`, `status`, `featured`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sour Apple', 123.00, 99, 21.00, '&amp;amp;amp;amp;lt;p data-pm-slice=\"0 0 []\"&amp;amp;amp;amp;gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;gt;', '1747332229_product.png', '1747094622_packing.png', '1747332389_fruit.png', 1, 0, 'sour-apple', '2025-05-12 17:23:38', '2025-05-15 13:06:29'),
(2, 1, 'Grape Pop', 123.00, 99, 12.00, '&amp;amp;amp;amp;lt;p data-pm-slice=\"0 0 []\"&amp;amp;amp;amp;gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;gt;', '1747332248_product.png', '1747094591_packing.png', '1747332416_fruit.png', 1, 0, 'grape-pop', '2025-05-12 17:25:53', '2025-05-15 13:06:56'),
(3, 1, 'Sour Cherry', 234.00, 99, 14.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1747332271_product.png', '1747094555_packing.png', '1747094555_fruit.png', 1, 0, 'sour-cherry', '2025-05-12 17:30:25', '2025-05-15 13:04:31'),
(6, 1, 'Passion Fruits', 234.00, 99, 12.00, '&amp;amp;amp;lt;strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;amp;amp;amp;quot;Open Sans&amp;amp;amp;amp;quot;, Arial, sans-serif; text-align: justify;\"&amp;amp;amp;gt;Lorem Ipsum&amp;amp;amp;lt;/strong&amp;amp;amp;gt;&amp;amp;amp;lt;span style=\"color: rgb(0, 0, 0); font-family: &amp;amp;amp;amp;quot;Open Sans&amp;amp;amp;amp;quot;, Arial, sans-serif; text-align: justify;\"&amp;amp;amp;gt;&amp;amp;amp;amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,&amp;amp;amp;lt;/span&amp;amp;amp;gt;', '1747332291_product.png', '1747164329_packing.png', '1747332455_fruit.png', 1, 0, 'passion-fruits', '2025-05-13 14:25:29', '2025-05-15 13:07:35'),
(7, 1, 'Peach', 223.00, 88, 8.00, '&amp;amp;lt;strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;amp;amp;quot;Open Sans&amp;amp;amp;quot;, Arial, sans-serif; text-align: justify;\"&amp;amp;gt;Lorem Ipsum&amp;amp;lt;/strong&amp;amp;gt;&amp;amp;lt;span style=\"color: rgb(0, 0, 0); font-family: &amp;amp;amp;quot;Open Sans&amp;amp;amp;quot;, Arial, sans-serif; text-align: justify;\"&amp;amp;gt;&amp;amp;amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged&amp;amp;lt;/span&amp;amp;gt;', '1747332305_product.png', '1747168716_packing.png', '1747168716_fruit.png', 1, 0, 'peach', '2025-05-13 15:38:36', '2025-05-15 13:05:05'),
(8, 1, 'Cotton Candy', 123.00, 99, 18.00, '&lt;strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;\"&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;\"&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged&lt;/span&gt;', '1747332318_product.png', '1747168792_packing.png', '1747168792_fruit.png', 1, 0, 'cotton-candy', '2025-05-13 15:39:52', '2025-05-15 13:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_locations`
--

CREATE TABLE `product_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_locations`
--

INSERT INTO `product_locations` (`id`, `product_id`, `location_id`, `created_at`, `updated_at`) VALUES
(25, 1, 3, '2025-05-16 17:30:16', '2025-05-16 17:30:16'),
(26, 2, 2, '2025-05-16 17:45:46', '2025-05-16 17:45:46'),
(27, 2, 7, '2025-05-16 17:48:58', '2025-05-16 17:48:58'),
(28, 3, 4, '2025-05-16 18:20:18', '2025-05-16 18:20:18'),
(29, 6, 5, '2025-05-16 18:22:28', '2025-05-16 18:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_contents`
--

CREATE TABLE `site_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contents`
--

INSERT INTO `site_contents` (`id`, `logo`, `footer_logo`, `email`, `address`, `copyright`, `created_at`, `updated_at`) VALUES
(1, '20250512214652_logo.png', '20250512214652_logo.png', NULL, NULL, 'Uzi Hardseltzer', '2025-05-12 16:46:52', '2025-05-12 16:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` text DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `instagram`, `tiktok`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.tiktok.com/en/', 'https://www.youtube.com/', '2025-05-12 16:56:33', '2025-05-12 16:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `type`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Terms and Conditions', '<p>(DRNK UP HARD SELTZER LLC) Terms & Conditions this website is maintained by DRNK UP HARD\r\n                                SELTZER LLC for the personal use and enjoyment\r\n                                of those of legal age for the consumption of alcoholic beverages. To ensure a safe, pleasant\r\n                                environment for all of our visitors and users,\r\n                                we have established these Terms of Use. In this way, you know what you can expect from us\r\n                                and what we expect from you. By accessing any areas of this website\r\n                                you agree to be legally bound and to abide by the terms set forth below. Please exit this\r\n                                site if you do not agree to the Terms of Use, are not of legal age to visit this site,\r\n                                or live in a country where consumption of alcoholic beverages is not permitted. LINKS It\r\n                                should be noted that any links to and from this site are provided for your convenience.\r\n                                The sites that you may link to through this website are not part of DRNK UP HARD SELTZER LLC\r\n                                website. </p>\r\n\r\n                            <p>Should you leave this site via a link contained herein, the content that you view therein is\r\n                                not provided by DRNK UP HARD SELTZER LLC.\r\n                                Accordingly, DRNK UP HARD SELTZER LLC is not responsible for, nor has it developed or\r\n                                reviewed the ever-changing and updated content at those sites.\r\n                                DRNK UP HARD SELTZER LLC makes no guarantees, representations or warranties as to, and shall\r\n                                have no liability for, any electronic content delivered on any third-party website,\r\n                                including, without limitation, the accuracy, subject matter, quality or timeliness of such\r\n                                electronic content. The fact that DRNK UP HARD SELTZER LLC may be linked to other sites\r\n                                does not constitute an endorsement or recommendation of those sites, the views expressed on\r\n                                the sites, or the products or services offered on the sites. DISCLAIMERS OF WARRANTIES\r\n                                AND DAMAGES you expressly agree that use of this site is at your sole risk. Every effort has\r\n                                been made to ensure the accuracy of the information on the DRNK UP HARD SELTZER LLC\r\n                                website and DRNK UP HARD SELTZER LLC intends to take reasonable steps to prevent the\r\n                                introduction of viruses or other harmful components on this site. However, DRNK UP HARD\r\n                                SELTZER\r\n                                LLC does not warrant that any of the information,\r\n                                materials or content on the site or functions of the website are accurate, complete or error\r\n                                free or free of any virus or other harmful components or that use of the site will be\r\n                                uninterrupted. </p>\r\n                            <p> DRNK UP HARD SELTZER LLC shall not be liable for any damages arising from any defect in the\r\n                                accuracy, quality, completeness or timeliness of the data, information, or content of the\r\n                                site or for harm caused by a virus or other harmful component on or downloaded from this\r\n                                site. This website, including all content, software, functions, materials and information,\r\n                                is provided by DRNK UP HARD SELTZER LLC on an “as is” basis. DRNK UP HARD SELTZER LLC makes\r\n                                no representations, express or implied, as to the operation of the site or its content,\r\n                                software, functions, materials and information. To the maximum extent permissible by\r\n                                applicable law, DRNK UP HARD SELTZER LLC disclaims all warranties, express or implied,\r\n                                including, but not limited to, implied warranties of fitness for a particular purpose. DRNK\r\n                                UP HARD SELTZER LLC shall under no circumstances be liable to any users and/or third party\r\n                                for any damages of any kind arising from the use of this site, including, but not limited\r\n                                to, direct, indirect, special, punitive or consequential damages even if DRNK UP HARD\r\n                                SELTZER LLC has been advised of the possibility of such damages. UZI Hard Seltzer LLC’s\r\n                                maximum liability is limited to a refund of the purchase price paid for any product\r\n                                purchased through this site.\r\n                            </p>\r\n                            <h2>PRIVACY NOTICE At DRNK UP HARD SELTZER LLC, </h2>\r\n                            <p> we recognize and respect the importance of maintaining the privacy of our customers and\r\n                                website users and have established a Privacy policy as a result. In our Privacy Policy we\r\n                                describe why we gather personal information, what information we collect, how we collect it\r\n                                and what we use the information for. We encourage you to carefully read our Privacy Policy.\r\n                                To view our Privacy Policy click here. By accessing this website you agree to be bound by\r\n                                the terms of the Privacy Policy and acknowledge that while DRNK UP HARD SELTZER LLC will\r\n                                take reasonable security precautions concerning electronic data and communications, it is\r\n                                not responsible for any harm caused by interception of such data and communications. </p>\r\n\r\n                            <h2>TERMINATION OF USAGE DRNK UP HARD SELTZER LLC</h2>\r\n                            <p>may terminate or suspend your access to all or part of this web site, without notice, for any\r\n                                conduct that DRNK UP HARD SELTZER LLC, in its sole discretion, believes is in violation of\r\n                                any applicable law or is harmful to the interests of DRNK UP HARD SELTZER LLC, another user,\r\n                                a third-party provider, merchant, sponsor or service provider. USER INPUT Visitors to this\r\n                                web site who send electronic mail or other input to DRNK UP HARD SELTZER LLC through this\r\n                                website acknowledge that such electronic mail and/or other input can be used by DRNK UP HARD\r\n                                SELTZER LLC for any purpose without compensation to the contributor. In order to prevent any\r\n                                misunderstandings regarding the origin of ideas or concepts, DRNK UP HARD SELTZER LLC cannot\r\n                                accept any ideas or suggestions for its products, merchandise, promotions, advertising,\r\n                                names, designs, artwork, slogans, or any other trademarks. Further, you agree that any\r\n                                ideas, concepts, techniques or other materials that you send to DRNK UP HARD SELTZER LLC may\r\n                                be used by DRNK UP HARD SELTZER LLC for whatever reason without compensation or attribution.\r\n                                APPLICABLE LAWS This site is created and controlled by DRNK UP HARD SELTZER in the State of\r\n                                California, USA. As such, any claim relating to this website, the services provided through\r\n                                this website or to these Terms of Use shall be governed by the substantive laws of the State\r\n                                of California, without giving effect to any principles of conflicts of law. </p>\r\n                            <p>TRADEMARKS ©UZI HARD SELTZER. The content on this site and/or its compilation or arrangement\r\n                                is the property of DRNK UP HARD SELTZER LLC and/or its content providers, and is protected\r\n                                by U.S. and international copyright laws. Users of this website may not copy, redistribute\r\n                                or republish the content on this site for any purpose other than individual personal use\r\n                                without the express written permission of DRNK UP HARD SELTZER LLC. A trademark can be a\r\n                                word, phrase, symbol, or design that distinguishes the source of goods or services. It can\r\n                                also, as trade dress, be the appearance of a product or its packaging. The following is a\r\n                                non-exhaustive list of registered trademarks and service marks owned by DRNK UP HARD SELTZER\r\n                                LLC. These and any other marks owned by DRNK UP HARD SELTZER LLC should not be used without\r\n                                written permission from DRNK UP HARD SELTZER LLC and should not be used in any manner that\r\n                                is likely to cause consumer confusion as to the source of their products and services. DRNK\r\n                                UP HARD SELTZER UZI HARD SELTZER etc. </p>\r\n                            <p><b>Responsibility Page:</b> Appreciating and engaging in responsible alcohol consumption\r\n                                involves more than just enjoying the immediate sensory pleasures. It requires an awareness\r\n                                of the potential consequences. While alcoholic beverages offer a rich tapestry of tastes,\r\n                                aromas, and appearances, excessive or irresponsible consumption can result in significant\r\n                                and tragic outcomes, both for individuals and the wider community. In contrast to some\r\n                                European customs, where wine and beer are often introduced within family settings to impart\r\n                                cultural understanding, American society often lacks structured education about alcohol\'s\r\n                                effects. This absence leaves many individuals to navigate the realm of alcohol through trial\r\n                                and error, potentially leading to dire consequences. At DRNK UP HARD SELTZER LLC, we\r\n                                advocate for the appreciation of our products for their taste, complexity, and sheer\r\n                                enjoyment.</p>\r\n                            <p>We promote moderation in consumption, encouraging drinkers to savor our hard seltzers\r\n                                responsibly. We commend the efforts of organizations\r\n                                and initiatives focused on educating individuals about alcohol consumption, supporting their\r\n                                aim to foster responsible attitudes and behaviors toward drinking.\r\n                                Additionally, in compliance with government regulations and our commitment to\r\n                                accountability, our product packaging includes a government-mandated warning regarding the\r\n                                health\r\n                                implications of consuming alcoholic beverages. This advisory underscores the importance of\r\n                                making informed decisions and underscores the potential risks linked with alcohol use,\r\n                                including impaired driving and health issues.</p>\r\n                            <ul>\r\n                                <li><b> Government warning:</b></li>\r\n                                <li> (1) According to the Surgeon General, pregnant women should refrain from consuming\r\n                                    alcoholic beverages due to the risk of birth defects.</li>\r\n                                <li>(2) Drinking alcoholic beverages impairs your ability to operate machinery or drive a\r\n                                    vehicle and may lead to health complications. Privacy Policy: We\'ve crafted this Privacy\r\n                                    Policy to safeguard your privacy while you browse our site, outlining the types of\r\n                                    information we collect and how it\'s utilized. As our services and technologies evolve,\r\n                                    and as we expand or refine our offerings, this Privacy Policy may be subject to updates.\r\n                                    We encourage you to review it periodically. At DRNK UP HARD SELTZER LLC, we\'re dedicated\r\n                                    to safeguarding your privacy in accordance with federal and state laws. These\r\n                                    regulations mandate that we inform you about how we gather, utilize, share, and\r\n                                    safeguard your personal information, while also delineating the permissible uses of such\r\n                                    data. Please take the time to read this Policy carefully to comprehend how we handle the\r\n                                    personal information we collect. When you reach out to us for assistance with inquiries\r\n                                    or concerns, any personal information you provide is entirely voluntary. We gather and\r\n                                    employ only the necessary minimum of personal information to address your queries and\r\n                                    issues. There may be other instances where we collect your personal information as well.\r\n                                    Typically, this involves obtaining limited details such as your name, address, phone\r\n                                    number, birth date, and/or email address. However, for specific purposes like purchases\r\n                                    or resume submissions, we may require additional personal information such as credit\r\n                                    card details or resume-related information. Instances in which we may collect your\r\n                                    personal information include, but are not restricted to:\r\n                                </li>\r\n                                <li> 1. Making a purchase from our E-Store</li>\r\n                                <li>2. Participating in a contest or promotion </li>\r\n                                <li>3. Subscribing to our newsletter</li>\r\n                                <li>4. Applying for a job position</li>\r\n                                <li>5. Commenting on our blog posts; </li>\r\n                                <li>6. Submitting a question or comment via our Contact Us page. Where does your Information\r\n                                    go? Within DRNK UP HARD SELTZER LLC,\r\n                                    we utilize your personal information for various purposes, such as processing purchases,\r\n                                    contest entries, promotions, or resumes,\r\n                                    and ensuring appropriate responses to your comments or inquiries. To enhance our\r\n                                    services, we collaborate with third-party providers\r\n                                    who assist in delivering certain functionalities of this website. On occasion, your\r\n                                    information may be disclosed to these third parties,\r\n                                    who have contractually agreed not to misuse your personal information beyond the scope\r\n                                    of the services they provide for this website. For instance:\r\n                                    - When making a purchase, your details may be shared with vendors to fulfill your order\r\n                                    and with credit card companies to complete the transaction securely.\r\n                                    - Submitting your resume may involve processing through a third-party vendor for\r\n                                    streamlined management. - Participation in contests or newsletter subscriptions\r\n                                    may entail sharing your information with third-party vendors to facilitate these\r\n                                    activities effectively. - Additionally, we may share aggregated, non-identifiable\r\n                                    data about our general readership with third parties for marketing purposes and to\r\n                                    foster new vendor and customer relationships. Cookies and How we use them:\r\n                                    This website may automatically gather some non-personal data from your device, like the\r\n                                    type of web browser and operating system you\'re using, as well as the\r\n                                    domain name of the website you came from. We use this information in a general sense to\r\n                                    understand our visitors better and make ongoing technical enhancements to the website.\r\n                                    When you browse this site, a small text file known as a \"cookie\" may be stored on your\r\n                                    device to track your interactions, such as the pages you\'ve viewed or activities you\'ve\r\n                                    engaged in. Cookies also help us prevent multiple contest entries from the same\r\n                                    individual. Most web browsers allow you to manage cookies by erasing them, blocking\r\n                                    them, or\r\n                                    receiving warnings before they\'re stored. However, opting out of cookies might limit\r\n                                    your access to certain website features like contests. If you select the \"Remember Me\"\r\n                                    option when entering the site, cookies will be used to associate the birth date you\r\n                                    provided with your IP address. This way, you won\'t need to re-enter the same information\r\n                                    every time you visit. Remember not to check \"Remember Me\" on shared computers for\r\n                                    privacy reasons. Linking: Please be aware that this website may include links to other\r\n                                    websites\r\n                                    operated by third parties. We typically have no affiliation with or authority over the\r\n                                    content on these external websites, each of which may have distinct privacy policies\r\n                                    and practices. <b>Legal Drinking Age: </b>\r\n                                    Our website is designed for individuals who are of legal drinking age. </li>\r\n                                <li><b>Questions?:</b> To submit an online question, comment, or complaint, please visit our\r\n                                    Contact Us page. </li>\r\n                                <li><b>Security:</b> We employ a range of measures, including physical, electronic, and\r\n                                    managerial protocols, to protect the information collected on this site. These measures\r\n                                    encompass firewalls, encryption, intrusion detection, and ongoing site monitoring.\r\n                                    Access to personally identifiable information is restricted to employees who require it\r\n                                    for their roles. Despite our efforts, no data protection method is foolproof, so while\r\n                                    we endeavor to safeguard your information, we cannot ensure its absolute security. </li>\r\n                                <li><b>European Economic Area Visitors and Privacy Shield:</b> This website is hosted and\r\n                                    operated in the United States (\"US\") and various other locations worldwide. By using\r\n                                    this site, you agree to the transfer of your personal information to the US. If you\'re\r\n                                    accessing this site from outside the US, please note that US law may not offer the same\r\n                                    privacy protections as those in your jurisdiction. We adhere to the EU-US Privacy\r\n                                    Shield, safeguarding consumer personal data received from clients in the European\r\n                                    Economic Area and Switzerland in line with Privacy Shield Principles. We\'ve designated\r\n                                    the American Arbitration Association to handle complaints and provide recourse at no\r\n                                    cost, including the option for binding arbitration under certain conditions.</li>\r\n                                <li>Additionally, we ensure the protection of all data transferred to third parties through\r\n                                    contracts, stipulating that your data is used only for specified purposes consistent\r\n                                    with your authorization. We require third-party recipients to uphold the same level of\r\n                                    protection as outlined in Privacy Shield principles and take necessary steps to ensure\r\n                                    effective processing of personal information. Upon request, we can provide a summary or\r\n                                    representative copy of relevant privacy provisions within our contract with the\r\n                                    third-party recipient. For further information on Privacy Shield and to view our\r\n                                    certification,\r\n                                </li>\r\n                                <li><a href=\"https://www.privacyshield.gov\">https://www.privacyshield.gov</a>\r\n                                </li>\r\n                                <li><b>Review and Correction of Your Information:</b> You have the option to review and\r\n                                    modify the information we gather about you by reaching out to us directly. In cases\r\n                                    where your data has been shared with a third party, as outlined in this Privacy Policy,\r\n                                    that party will have received their own copy of your information. If you\'ve been\r\n                                    contacted by one of these third parties and need to rectify or delete your data, kindly\r\n                                    get in touch with them directly.</li>\r\n                                <li><b>California Privacy Rights: </b> Under California law, residents have the right to\r\n                                    request details from companies they have an established business relationship with\r\n                                    regarding the sharing of personal information with third parties for direct marketing\r\n                                    purposes. We do not share any personal information of California consumers with third\r\n                                    parties for marketing purposes without consent. California customers seeking additional\r\n                                    information about our adherence to this law or with privacy-related inquiries can\r\n                                    contact us using the provided contact information below.</li>\r\n                                <li><b>Updates: </b> This Privacy Policy was last revised on June 15, 2024. We periodically\r\n                                    update our Privacy Policy, so we encourage you to check it frequently. By continuing to\r\n                                    use the site, you agree that your information may be used in accordance with the updated\r\n                                    policy. If you disagree with the changes, please discontinue using the site and inform\r\n                                    us that you do not consent to your information being used in line with the revisions.\r\n                                </li>\r\n\r\n\r\n\r\n\r\n                            </ul>\r\n                            <h2 style=\"text-align:center;\">UZI Terms: </h2>\r\n                            <h5 style=\"text-align:center;\">(DRNK UP HARD SELTZER LLC)</h5>\r\n\r\n                            <h2>Terms & Conditions </h2>\r\n                            <p>This website is maintained by DRNK UP HARD SELTZER LLC for the personal use and enjoyment of\r\n                                those of legal age for the consumption of alcoholic beverages. To ensure a safe, pleasant\r\n                                environment for all of our visitors and users, we have established these Terms of Use. In\r\n                                this way, you know what you can expect from us and what we expect from you. By accessing any\r\n                                areas of this website you agree to be legally bound and to abide by the terms set forth\r\n                                below. Please exit this site if you do not agree to the Terms of Use, are not of legal age\r\n                                to visit this site, or live in a country where consumption of alcoholic beverages is not\r\n                                permitted.</p>\r\n\r\n                            <h2> LINKS</h2>\r\n\r\n                            <p>It should be noted that any links to and from this site are provided for your convenience.\r\n                                The sites that you may link to through this website are not part of DRNK UP HARD SELTZER LLC\r\n                                website. Should you leave this site via a link contained herein, the content that you view\r\n                                therein is not provided by DRNK UP HARD SELTZER LLC. Accordingly, DRNK UP HARD SELTZER LLC\r\n                                is not responsible for, nor has it developed or reviewed the ever-changing and updated\r\n                                content at those sites. DRNK UP HARD SELTZER LLC makes no guarantees, representations or\r\n                                warranties as to, and shall have no liability for, any electronic content delivered on any\r\n                                third-party website, including, without limitation, the accuracy, subject matter, quality or\r\n                                timeliness of such electronic content. The fact that DRNK UP HARD SELTZER LLC may be linked\r\n                                to other sites does not constitute an endorsement or recommendation of those sites, the\r\n                                views expressed on the sites, or the products or services offered on the sites.</p>\r\n\r\n                            <h2>DISCLAIMERS OF WARRANTIES AND DAMAGES</h2>\r\n                            <p>You expressly agree that use of this site is at your sole risk. Every effort has been made to\r\n                                ensure the accuracy of the information on the DRNK UP HARD SELTZER LLC website and DRNK UP\r\n                                HARD SELTZER LLC intends to take reasonable steps to prevent the introduction of viruses or\r\n                                other harmful components on this site. However, DRNK UP HARD SELTZER LLC does not warrant\r\n                                that any of the information, materials or content on the site or functions of the website\r\n                                are accurate, complete or error free or free of any virus or other harmful components or\r\n                                that use of the site will be uninterrupted. DRNK UP HARD SELTZER LLC shall not be liable for\r\n                                any damages arising from any defect in the accuracy, quality, completeness or timeliness of\r\n                                the data, information, or content of the site or for harm caused by a virus or other harmful\r\n                                component on or downloaded from this site.</p>\r\n\r\n                            <p>This website, including all content, software, functions, materials and information, is\r\n                                provided by DRNK UP HARD SELTZER LLC on an “as is” basis. DRNK UP HARD SELTZER LLC makes no\r\n                                representations, express or implied, as to the operation of the site or its content,\r\n                                software, functions, materials and information. To the maximum extent permissible by\r\n                                applicable law, DRNK UP HARD SELTZER LLC disclaims all warranties, express or implied,\r\n                                including, but not limited to, implied warranties of fitness for a particular purpose. DRNK\r\n                                UP HARD SELTZER LLC shall under no circumstances be liable to any users and/or third party\r\n                                for any damages of any kind arising from the use of this site, including, but not limited\r\n                                to, direct, indirect, special, punitive or consequential damages even if DRNK UP HARD\r\n                                SELTZER LLC has been advised of the possibility of such damages. UZI Hard Seltzer LLC’s\r\n                                maximum liability is limited to a refund of the purchase price paid for any product\r\n                                purchased through this site.</p>\r\n\r\n                            <h2>PRIVACY NOTICE</h2>\r\n\r\n\r\n                            <p>At DRNK UP HARD SELTZER LLC, we recognize and respect the importance of maintaining the\r\n                                privacy of our customers and website users and have established a Privacy policy as a\r\n                                result. In our Privacy Policy we describe why we gather personal information, what\r\n                                information we collect, how we collect it and what we use the information for. We encourage\r\n                                you to carefully read our Privacy Policy. To view our Privacy Policy click here. By\r\n                                accessing this website you agree to be bound by the terms of the Privacy Policy and\r\n                                acknowledge that while DRNK UP HARD SELTZER LLC will take reasonable security precautions\r\n                                concerning electronic data and communications, it is not responsible for any harm caused by\r\n                                interception of such data and communications.</p>\r\n\r\n                            <h2>TERMINATION OF USAGE</h2>\r\n                            <p>DRNK UP HARD SELTZER LLC may terminate or suspend your access to all or part of this web\r\n                                site, without notice, for any conduct that DRNK UP HARD SELTZER LLC , in its sole\r\n                                discretion, believes is in violation of any applicable law or is harmful to the interests of\r\n                                DRNK UP HARD SELTZER LLC, another user, a third-party provider, merchant, sponsor or service\r\n                                provider.</p>\r\n\r\n                            <h2>USER INPUT</h2>\r\n\r\n                            <p>Visitors to this web site who send electronic mail or other input to DRNK UP HARD SELTZER LLC\r\n                                through this website acknowledge that such electronic mail and/or other input can be used by\r\n                                DRNK UP HARD SELTZER LLC for any purpose without comp</p>', '2025-05-15 19:24:23', '2025-05-15 19:32:08');

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
  `role` enum('vender','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'user@example.com', NULL, '$2y$10$XqktOTUktUNHD8b6L6XBzeMOwiZUg8QQs5Dy4eFukIMWzCi7nJ9se', 'user', NULL, '2025-05-12 16:19:47', '2025-05-12 16:19:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_coordinates`
--
ALTER TABLE `location_coordinates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_coordinates_coordinate_id_foreign` (`coordinate_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `our_clients`
--
ALTER TABLE `our_clients`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_locations`
--
ALTER TABLE `product_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_locations_product_id_foreign` (`product_id`),
  ADD KEY `product_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `site_contents`
--
ALTER TABLE `site_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location_coordinates`
--
ALTER TABLE `location_coordinates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_clients`
--
ALTER TABLE `our_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_locations`
--
ALTER TABLE `product_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_contents`
--
ALTER TABLE `site_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `location_coordinates`
--
ALTER TABLE `location_coordinates`
  ADD CONSTRAINT `location_coordinates_coordinate_id_foreign` FOREIGN KEY (`coordinate_id`) REFERENCES `product_locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_locations`
--
ALTER TABLE `product_locations`
  ADD CONSTRAINT `product_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_locations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
