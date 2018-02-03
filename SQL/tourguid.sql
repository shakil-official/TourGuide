-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 01:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourguid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakil', 'shakil.neub@gmail.com', '1', '$2y$10$n.Yq5.RD9/au8KiDYdViR.9WAw4jAAWcpcbRwGWYWWXIYdNCFLt0.', '06icwmcEUm1Ov5Oa6W1pvYGYFXYEAiulIsoJCBQuwkQ9Z2dU5haQUM9dw9Dl', '2018-01-30 07:47:44', '2018-01-30 07:47:44'),
(2, 'Shakil', 'test@mail.com', '2', '$2y$10$N1VlpdcZgYX.H5Ukf0gPWuWkAbYkU029NnRyZPpR5.3aHxWoKxDvm', 'oDhwxN6hlcQEJP6yskjZzh70y1Jo41zIRXGlU4j51XuJ9gmjWOCVV9cs0aaJ', '2018-01-31 12:14:34', '2018-01-31 12:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `countryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 1, '2018-01-30 07:42:09', '2018-01-30 07:42:09'),
(2, 'Pakistan', 1, '2018-02-01 02:25:38', '2018-02-01 02:25:38'),
(3, 'India', 1, '2018-02-01 02:25:47', '2018-02-01 02:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `districtName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `districtName`, `division_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', 1, 1, '2018-01-30 23:48:15', '2018-01-30 23:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `divisionName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `divisionName`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', 1, 1, '2018-01-30 07:42:31', '2018-01-30 07:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotelName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoteltype_id` int(11) NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotelName`, `description`, `address`, `image`, `website`, `hoteltype_id`, `place_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nazimgarh Wilderness', 'Wilderness\' is possibly one of the most unique \"tropical\" resorts anywhere. It is located at Lalakhal, in the north-east corner of Bangladesh, nestled at the base of the Jaintia Hills of the Indian State of Meghalaya, the last foothills of the mighty Himalayas. Lalakhal was once a part of the ancient Jaintia (Khasi) Kingdom of Jaintiapur, a portion of which, today, is Jaintiapur Upazila.', 'Nazimgarh Wilderness, Lalakhal, Jaintapur, Sylhet.\r\n\r\n(+88) 01841001201, 01841001200, 01712027722.', '15174019611361199859.jpg', 'http://www.nazimgarh.com/wilderness/', 1, 3, 1, '2018-01-31 06:32:41', '2018-01-31 06:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_types_Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_types`
--

INSERT INTO `hotel_types` (`id`, `hotel_types_Name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Resort', 1, '2018-01-31 06:27:16', '2018-01-31 06:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `marketName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `marketName`, `address`, `place_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Market', 'dfd', 1, 1, '2018-02-03 06:05:18', '2018-02-03 06:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_22_125113_create_social_providers_table', 1),
(4, '2017_02_25_025103_create_admins_table', 1),
(5, '2017_09_22_181557_create_countries_table', 1),
(6, '2017_09_22_182048_create_divisions_table', 1),
(7, '2017_09_28_095417_create_districts_table', 1),
(8, '2017_09_28_095449_create_places_table', 1),
(9, '2017_09_28_095544_create_hotel_types_table', 1),
(10, '2017_09_28_095614_create_hotels_table', 1),
(11, '2017_09_28_095648_create_providers_table', 1),
(12, '2017_09_28_095728_create_service_contacts_table', 1),
(13, '2017_09_28_095757_create_religions_table', 1),
(14, '2017_09_28_095919_create_markets_table', 1),
(15, '2017_09_28_100017_create_restaurants_table', 1),
(16, '2017_09_28_100045_create_restaurant_types_table', 1),
(17, '2017_09_28_100232_create_user_infos_table', 1),
(18, '2017_09_28_125051_create_warnings_table', 1),
(19, '2017_11_24_121604_create_visitinformations_table', 1),
(20, '2017_11_24_121828_create_placetypes_table', 1),
(21, '2017_11_24_123207_create_placetype_visitinformation_table', 1),
(22, '2017_12_06_091114_create_photos_table', 1),
(23, '2017_12_11_154231_create_ratings_table', 1),
(24, '2017_12_19_080718_create_events_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitinformation_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `visitinformation_id`, `photo`, `created_at`, `updated_at`) VALUES
(2, 1, '15173795031417937702.jpg', '2018-01-31 00:18:23', '2018-01-31 00:18:23'),
(3, 1, '15173795041555455468.jpg', '2018-01-31 00:18:24', '2018-01-31 00:18:24'),
(4, 1, '1517379504907557824.jpg', '2018-01-31 00:18:24', '2018-01-31 00:18:24'),
(5, 2, '1517380612600751632.jpg', '2018-01-31 00:36:52', '2018-01-31 00:36:52'),
(6, 3, '1517401136842569914.jpg', '2018-01-31 06:18:56', '2018-01-31 06:18:56'),
(7, 3, '15174011361615763052.jpg', '2018-01-31 06:18:57', '2018-01-31 06:18:57'),
(8, 3, '1517401137492504153.jpg', '2018-01-31 06:18:57', '2018-01-31 06:18:57'),
(9, 3, '1517401137661565235.jpg', '2018-01-31 06:18:57', '2018-01-31 06:18:57'),
(10, 4, '15174053241306504958.jpeg', '2018-01-31 07:28:45', '2018-01-31 07:28:45'),
(11, 5, '1517405346456077955.jpeg', '2018-01-31 07:29:06', '2018-01-31 07:29:06'),
(12, 6, '15174054452103700295.jpg', '2018-01-31 07:30:45', '2018-01-31 07:30:45'),
(13, 6, '1517405445640584868.jpg', '2018-01-31 07:30:45', '2018-01-31 07:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `placeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `placeName`, `district_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ratargul', 1, 1, '2018-01-30 23:48:33', '2018-01-30 23:49:14'),
(2, 'Bisnakandi', 1, 1, '2018-01-31 00:33:10', '2018-01-31 00:33:10'),
(3, 'Lalakhal', 1, 1, '2018-01-31 06:19:50', '2018-01-31 06:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `placetypes`
--

CREATE TABLE `placetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placetypes`
--

INSERT INTO `placetypes` (`id`, `place_type_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Swamp Forest', 1, '2018-01-30 23:49:50', '2018-01-30 23:49:50'),
(2, 'Forest', 1, '2018-01-30 23:50:25', '2018-01-30 23:50:25'),
(4, 'Canal', 1, '2018-01-31 06:08:52', '2018-01-31 06:14:53'),
(5, 'River', 1, '2018-01-31 06:15:00', '2018-02-02 05:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `placetype_visitinformation`
--

CREATE TABLE `placetype_visitinformation` (
  `id` int(10) UNSIGNED NOT NULL,
  `placetype_id` int(10) UNSIGNED DEFAULT NULL,
  `visitinformation_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placetype_visitinformation`
--

INSERT INTO `placetype_visitinformation` (`id`, `placetype_id`, `visitinformation_id`) VALUES
(8, 1, 1),
(9, 2, 1),
(10, 5, 2),
(11, 4, 3),
(12, 5, 4),
(13, 5, 5),
(14, 2, 6),
(15, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `visitinformation_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `visitinformation_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, '2018-01-31 00:40:16', '2018-01-31 00:40:16'),
(2, 4, 2, 1, '2018-01-31 00:40:58', '2018-01-31 00:41:01'),
(3, 4, 3, 1, '2018-01-31 11:20:04', '2018-01-31 11:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` int(10) UNSIGNED NOT NULL,
  `religion_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `religion_name`, `place_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Islam', 3, 1, '2018-02-03 06:19:47', '2018-02-03 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `description`, `address`, `image`, `website`, `open`, `close`, `place_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'River Queen Restaurant', 'I spent the days around New Years 2012/2013 at LalaKahal \"Wilderness\", high up in the hills of LalaKhal, Sylhet, Bangladesh. As you will see from the photo\'s, its without doubt a world class property with great facilities. The LalaKhal region of Bangladesh is home to some of the simplest and most endearing people in Asia who are blissfully', 'I spent the days around New Years 2012/2013 at LalaKahal \"Wilderness\", high up in the hills of LalaKhal, Sylhet, Bangladesh. As you will see from the photo\'s, its without doubt a world class property with great facilities. The LalaKhal region of Bangladesh is home to some of the simplest and most endearing people in Asia who are blissfully', '15174025441655705235.jpg', 'http://www.nazimgarh.com/wilderness/', '00:05', '02:10', 3, 1, '2018-01-31 06:42:24', '2018-02-01 02:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_types`
--

CREATE TABLE `restaurant_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_contacts`
--

CREATE TABLE `service_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 1, '1540732982687700', 'facebook', '2018-01-31 00:39:58', '2018-01-31 00:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakil Ahmed', 'shakil1360@yahoo.com', '', '', 1, 'fZH0yFJPUpv0Z7E9FOu3FjD7jizFqpklcOQHA3zEn2mf3PcgFbnBvAD78ZQJ', '2018-01-31 00:39:57', '2018-01-31 00:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` int(11) NOT NULL,
  `social_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitinformations`
--

CREATE TABLE `visitinformations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitinformations`
--

INSERT INTO `visitinformations` (`id`, `title`, `description`, `address`, `rating`, `place_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Let\'s go second sundarban', 'This is a place which is discoverd by Md. Monayem Bokth Majumder. It is a great place to visit ,the best lufehacks ever.', 'i is situated in Guainghat Upazilla .Sylhet', 5, 1, 1, 1, '2018-01-30 23:55:21', '2018-01-31 00:40:16'),
(2, 'Natural Beauty of Bisnakandi', 'Winter is not a suitable time to visit Bisnakandi due to mechanized mining and stone-laden boats and lorries. The absence of such nuisance makes the rainy season the perfect time to visit the beautiful Bisanakandi that coalesces the charms of high mountains, sinuous rivers, graceful falls and dancing clouds. Source:', 'Upazilla, Sylhet City, Bangladesh. ... Private Tour: Sylhet Full-Day Tour of Ratargul and Bisnakandi.', 4, 2, 1, 1, '2018-01-31 00:36:52', '2018-01-31 00:41:02'),
(3, 'Lalakhal Boat Trip', 'Jaflong is one of the most attractive tourist spots in Sylhet division, situated at the border between Bangladesh and the Indian state of Meghalaya, overshadowed by subtropical mountains and rain-forests, beside the river Mari. It is a scenic spot nearby amidst tea gardens and rare beauty of rolling stones from hills.', 'It is located nearly 43.5 km away from Sylhet town. You may take CNG auto rickshaw or bus heading towards highway close to Shari Gowain River', 4, 3, 1, 1, '2018-01-31 06:18:56', '2018-01-31 11:20:05'),
(4, 'Natural Beauty of Bisnakandi', 'Winter is not a suitable time to visit Bisnakandi due to mechanized mining and stone-laden boats and lorries. The absence of such nuisance makes the rainy season the perfect time to visit the beautiful Bisanakandi that coalesces the charms of high mountains, sinuous rivers, graceful falls and dancing clouds. Source:', 'Upazilla, Sylhet City, Bangladesh. ... Private Tour: Sylhet Full-Day Tour of Ratargul and Bisnakandi.', 0, 3, 1, 1, '2018-01-31 07:28:44', '2018-01-31 07:28:44'),
(5, 'Natural Beauty of Bisnakandi', 'Winter is not a suitable time to visit Bisnakandi due to mechanized mining and stone-laden boats and lorries. The absence of such nuisance makes the rainy season the perfect time to visit the beautiful Bisanakandi that coalesces the charms of high mountains, sinuous rivers, graceful falls and dancing clouds. Source:', 'Upazilla, Sylhet City, Bangladesh. ... Private Tour: Sylhet Full-Day Tour of Ratargul and Bisnakandi.', 0, 3, 1, 1, '2018-01-31 07:29:06', '2018-01-31 07:29:06'),
(6, 'Let\'s go second sundarban', 'This is a place which is discoverd by Md. Monayem Bokth Majumder. It is a great place to visit ,the best lufehacks ever.', 'It is situated in Guainghat Upazilla .Sylhet', 0, 1, 1, 1, '2018-01-31 07:30:45', '2018-01-31 07:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `warningType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_country_id_foreign` (`country_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_place_id_foreign` (`place_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_place_id_foreign` (`place_id`);

--
-- Indexes for table `hotel_types`
--
ALTER TABLE `hotel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markets_place_id_foreign` (`place_id`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_visitinformation_id_foreign` (`visitinformation_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_district_id_foreign` (`district_id`);

--
-- Indexes for table `placetypes`
--
ALTER TABLE `placetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placetype_visitinformation`
--
ALTER TABLE `placetype_visitinformation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placetype_visitinformation_placetype_id_foreign` (`placetype_id`),
  ADD KEY `placetype_visitinformation_visitinformation_id_foreign` (`visitinformation_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_visitinformation_id_foreign` (`visitinformation_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_place_id_foreign` (`place_id`);

--
-- Indexes for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_contacts`
--
ALTER TABLE `service_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_contacts_provider_id_foreign` (`provider_id`),
  ADD KEY `service_contacts_place_id_foreign` (`place_id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitinformations`
--
ALTER TABLE `visitinformations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitinformations_place_id_foreign` (`place_id`),
  ADD KEY `visitinformations_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warnings_place_id_foreign` (`place_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `placetypes`
--
ALTER TABLE `placetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placetype_visitinformation`
--
ALTER TABLE `placetype_visitinformation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_contacts`
--
ALTER TABLE `service_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitinformations`
--
ALTER TABLE `visitinformations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `markets`
--
ALTER TABLE `markets`
  ADD CONSTRAINT `markets_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_visitinformation_id_foreign` FOREIGN KEY (`visitinformation_id`) REFERENCES `visitinformations` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `placetype_visitinformation`
--
ALTER TABLE `placetype_visitinformation`
  ADD CONSTRAINT `placetype_visitinformation_placetype_id_foreign` FOREIGN KEY (`placetype_id`) REFERENCES `placetypes` (`id`),
  ADD CONSTRAINT `placetype_visitinformation_visitinformation_id_foreign` FOREIGN KEY (`visitinformation_id`) REFERENCES `visitinformations` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratings_visitinformation_id_foreign` FOREIGN KEY (`visitinformation_id`) REFERENCES `visitinformations` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `service_contacts`
--
ALTER TABLE `service_contacts`
  ADD CONSTRAINT `service_contacts_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `service_contacts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Constraints for table `visitinformations`
--
ALTER TABLE `visitinformations`
  ADD CONSTRAINT `visitinformations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `visitinformations_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);

--
-- Constraints for table `warnings`
--
ALTER TABLE `warnings`
  ADD CONSTRAINT `warnings_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
