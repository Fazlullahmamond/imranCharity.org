-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 12:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `image`, `video_url`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Itaque voluptatem el', 'Aute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possiAute ipsam rem possi', '1614322695.png', NULL, 1, '2021-02-25 21:58:15', '2021-02-25 22:00:52'),
(5, 'Delectus non ab com', 'Iure ut dolorem fugi', '1614827789.png', NULL, 1, '2021-03-03 18:16:29', '2021-03-03 18:16:29'),
(6, 'Cupiditate harum par', 'Commodo nihil labore', '1614827825.jpg', NULL, 1, '2021-03-03 18:17:05', '2021-03-03 18:17:05'),
(7, 'Sint non voluptatibu', 'Et numquam aut labor', '1614827857.JPG', NULL, 1, '2021-03-03 18:17:37', '2021-03-03 18:17:37'),
(8, 'Culpa impedit do ea', 'Quae irure alias ad', '1614827892.JPG', NULL, 1, '2021-03-03 18:18:12', '2021-03-03 18:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cause_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cause_goal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cause_raised` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `cause_title`, `cause_description`, `cause_goal`, `cause_raised`, `created_at`, `updated_at`) VALUES
(1, 'Clean Water for Drinking', 'We are helping poor peoples to provide clean water for free.', '20000', '1000', '2021-02-25 04:24:33', '2021-02-25 04:24:33'),
(3, 'Education', 'we are helping a needy in education', '5400', '2000', '2021-02-25 04:25:35', '2021-02-25 04:25:35'),
(4, 'Health for Needy', 'we are helping needy person in providing free medicine and health insurance', '10000', '2300', '2021-02-25 04:26:44', '2021-02-25 04:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_with` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_startDate` date NOT NULL,
  `contract_endDate` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_title`, `contract_with`, `contract_startDate`, `contract_endDate`, `description`, `created_at`, `updated_at`) VALUES
(2, 'now this is real', 'yeah this is real', '2020-11-04', '2021-08-08', 'this is bruh', '2021-02-25 03:54:43', '2021-02-25 03:56:34'),
(3, 'Assumenda iure volup', 'Laudantium aliquid', '2014-04-15', '2003-08-25', 'Eius quia ut nemo ex', '2021-02-25 03:54:51', '2021-02-25 03:54:51'),
(4, 'Eveniet accusantium', 'Eos ullam et ut est', '1986-09-04', '2005-08-22', 'Velit dolorem molli', '2021-02-25 03:54:55', '2021-02-25 03:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

CREATE TABLE `donates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donation_type_id` bigint(20) UNSIGNED NOT NULL,
  `donation_amount` int(10) UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AF',
  `donation_date` date NOT NULL,
  `donation_delivery` date NOT NULL,
  `needy_people_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_box_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donates`
--

INSERT INTO `donates` (`id`, `user_id`, `donation_type_id`, `donation_amount`, `currency`, `donation_date`, `donation_delivery`, `needy_people_id`, `description`, `donation_location`, `donation_box_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 10000, 'AF', '2021-02-25', '2021-02-28', 2, 'hello', 'kabul', NULL, '2021-02-25 05:40:29', '2021-02-25 05:40:29', NULL),
(2, NULL, 1, 11111, 'AF', '2021-02-25', '2021-01-01', 1, 'hello', 'kabul', NULL, '2021-02-25 05:42:58', '2021-02-25 16:55:07', '2021-02-25 16:55:07'),
(3, NULL, 2, 10000, 'AF', '2021-02-25', '2021-01-01', 2, 'hello', 'kabul', NULL, '2021-02-25 05:43:42', '2021-02-25 05:43:42', NULL),
(4, 1, 1, 10000, 'AF', '2020-02-25', '2022-01-01', 1, 'hello testing', 'kunar', NULL, '2021-02-25 05:47:07', '2021-02-25 05:47:07', NULL),
(5, NULL, 2, 2000, 'AF', '2021-02-25', '2022-02-02', 2, 'hello testing', 'kabul', 2, '2021-02-25 05:50:21', '2021-02-25 05:50:21', NULL),
(6, 1, 2, 2000, 'AF', '2021-02-25', '2022-02-02', 2, 'hello testing', 'kabul', 2, '2021-02-25 05:50:22', '2021-02-25 05:50:22', NULL),
(7, 1, 3, 1000, 'USD', '2021-02-25', '2023-02-02', 1, 'hello testing', 'kunar', 3, '2021-02-25 05:50:57', '2021-02-25 05:50:57', NULL),
(8, NULL, 1, 10000, 'AF', '2021-02-26', '2022-01-01', NULL, 'donation has been done.', 'kabul', NULL, '2021-02-25 16:22:11', '2021-02-25 16:22:11', NULL),
(9, 1, 2, 12000, 'AF', '2021-02-26', '2022-01-01', 1, 'hello', 'kabul', 2, '2021-02-25 16:22:33', '2021-02-25 16:22:33', NULL),
(10, NULL, 3, 2000, 'AF', '2021-11-11', '2021-01-01', 1, 'hello', 'kabul', 2, '2021-02-25 16:22:57', '2021-02-25 16:22:57', NULL),
(11, 3, 2, 25, 'ERO', '2005-12-06', '2001-04-06', 1, 'Voluptatum atque ips', 'Qui ipsum eius Nam a', 2, '2021-02-25 16:51:09', '2021-02-25 16:51:09', NULL),
(12, 3, 2, 25, 'ERO', '2005-12-06', '2001-04-06', 1, 'Voluptatum atque ips', 'Qui ipsum eius Nam a', 2, '2021-02-25 16:51:19', '2021-02-25 16:51:19', NULL),
(13, 3, 2, 25, 'ERO', '2005-12-06', '2001-04-06', 1, 'Voluptatum atque ips', 'Qui ipsum eius Nam a', 2, '2021-02-25 16:51:26', '2021-02-25 16:51:26', NULL),
(14, 3, 2, 25, 'ERO', '2005-12-06', '2001-04-06', 1, 'Voluptatum atque ips', 'Qui ipsum eius Nam a', 2, '2021-02-25 16:51:59', '2021-02-25 16:51:59', NULL),
(15, 3, 2, 1000, 'USD', '1974-03-08', '2015-11-27', 2, 'Ratione omnis volupt', 'Velit doloribus ut', 2, '2021-02-25 16:52:18', '2021-02-25 16:52:18', NULL),
(16, 2, 1, 69, 'ERO', '1986-05-20', '1973-04-01', 2, 'Distinctio Ex omnis', 'Est est excepturi m', 2, '2021-02-25 16:53:21', '2021-02-25 16:53:21', NULL),
(17, 2, 1, 100000, 'AF', '2021-02-26', '2021-01-01', 1, 'hello', 'ahmad shah baba mena', 2, '2021-02-25 16:59:31', '2021-02-25 16:59:31', NULL),
(18, 3, 1, 100, 'ERO', '2022-02-26', '2022-09-23', 1, 'hello', 'ahmad shah baba mena', 2, '2021-02-25 17:03:31', '2021-02-25 17:05:31', NULL),
(19, 5, 3, 79, 'USD', '2021-04-23', '1974-01-15', 1, 'Praesentium labore v', 'Repellendus Labore', 2, '2021-02-27 05:41:09', '2021-02-27 05:41:09', NULL),
(20, 3, 1, 21, 'AF', '2021-04-12', '1986-02-18', 3, 'Rerum error reprehen', 'Elit beatae sequi r', 2, '2021-02-27 05:41:18', '2021-02-27 05:41:18', NULL),
(21, 2, 3, 12000, 'AF', '2022-04-04', '2023-01-01', 1, 'Id molestias asperna', 'Repellendus Labore', 2, '2021-03-01 06:59:56', '2021-03-01 06:59:56', NULL),
(22, 5, 2, 46, 'USD', '2005-03-12', '1987-03-05', 1, 'Eligendi quod volupt', 'Ducimus voluptas ex', 3, '2021-03-07 19:21:50', '2021-03-07 19:21:50', NULL),
(23, 11, 1, 5000, 'AF', '2021-03-08', '2022-11-02', 1, 'testing', 'kabul', NULL, '2021-03-07 19:27:04', '2021-03-07 19:27:04', NULL),
(24, 2, 1, 10000, 'AF', '2022-04-27', '2022-04-20', 2, 'hello', 'kabul', NULL, '2022-04-27 05:59:14', '2022-04-27 05:59:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_boxes`
--

CREATE TABLE `donation_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_boxes`
--

INSERT INTO `donation_boxes` (`id`, `name`, `location`, `status`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'charahi 6', 'ahmad shah baba mena', 1, 1, 'Amet minim', '2021-02-25 05:20:45', '2021-02-25 05:24:44'),
(3, 'Chaharahi 2', 'Qui ab consectetur p', 1, 1, 'Proident magni sed', '2021-02-25 05:20:55', '2021-02-25 05:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `donation_types`
--

CREATE TABLE `donation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_types`
--

INSERT INTO `donation_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Health', 'Officiis sint hic dolorum alias facere ullam do voluptates', '2021-02-25 04:13:39', '2021-02-25 04:13:39'),
(2, 'Education', 'Quidem et mollit seq', '2021-02-25 05:32:54', '2021-02-25 05:32:54'),
(3, 'Water', 'supplying water', '2021-02-25 05:33:13', '2021-02-25 05:33:13');

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
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'family_member.jpg',
  `needy_people_id` bigint(20) UNSIGNED NOT NULL,
  `relationship_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `first_name`, `last_name`, `father_name`, `phone_number`, `job`, `date_birth`, `gender`, `image`, `needy_people_id`, `relationship_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Walid', 'Khan', '', NULL, 'doctor', NULL, 0, 'family_member.jpg', 1, 1, NULL, '2021-02-25 05:05:47', '2021-02-25 21:55:27', NULL),
(2, 'Ihsan', 'Khan', 'Sajad', '0782738278', 'doctor', '1999-01-01', 0, 'ihsan1614262485.png', 1, 2, 'hello', '2021-02-25 05:06:22', '2021-02-25 05:14:45', NULL),
(3, 'Khalid', 'Khan', '', NULL, NULL, NULL, 0, 'family_member.jpg', 2, 2, NULL, '2021-02-25 21:13:32', '2021-02-25 21:13:32', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_04_050057_create_sessions_table', 1),
(7, '2021_02_04_124135_create_blogs_table', 1),
(8, '2021_02_04_124156_create_donates_table', 1),
(9, '2021_02_04_124248_create_donation_boxes_table', 1),
(10, '2021_02_04_124328_create_donation_types_table', 1),
(11, '2021_02_04_124411_create_family_members_table', 1),
(12, '2021_02_04_124446_create_monthly_sponsors_table', 1),
(13, '2021_02_04_124546_create_needy_people_table', 1),
(14, '2021_02_04_124611_create_person_types_table', 1),
(15, '2021_02_04_124654_create_relationships_table', 1),
(16, '2021_02_04_124713_create_roles_table', 1),
(17, '2021_02_21_092609_create_contracts_table', 1),
(18, '2021_02_22_020250_create_causes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_sponsors`
--

CREATE TABLE `monthly_sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `needy_people_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_sponsors`
--

INSERT INTO `monthly_sponsors` (`id`, `user_id`, `needy_people_id`, `monthly_amount`, `duration`, `description`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '200000', '2022-12-10', 'testing', '2021-02-25 20:22:56', '2021-02-25 20:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `needy_people`
--

CREATE TABLE `needy_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'needy.jpg',
  `id_card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `predictive_needs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `needy_percentage` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `needy_people`
--

INSERT INTO `needy_people` (`id`, `first_name`, `last_name`, `father_name`, `phone_number`, `hometown`, `current_address`, `date_birth`, `gender`, `image`, `id_card_number`, `predictive_needs`, `needy_percentage`, `description`, `person_type_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Khan', 'Khan', 'Jan', '0787878789', 'kabul', 'kabul', '1999-01-01', 1, 'Kelsie1614260353.png', '78989789', '10000', 88, 'Ad nostrum quia cons', 2, 1, '2021-02-25 04:39:13', '2021-02-25 04:54:38', NULL),
(2, 'Reagan', 'Warren', 'Karim', '78887889', 'kunar', 'Est illo ipsa ad q', '2020-01-01', 1, 'needy.jpg', '9889877878', 'Quod exercitation no', 82, 'Nesciunt eos ea rer', 3, 1, '2021-02-25 04:39:32', '2021-02-25 16:29:25', NULL),
(3, 'Melinda', 'Byrd', 'Brenna Cash', '07888883232', 'Hic officia ut enim', 'Voluptatem id odit c', '1985-07-28', 1, 'needy.jpg', '767888', 'Autem fugiat aperia', 30, 'Quidem enim quae off', 3, 1, '2021-02-25 16:29:57', '2021-02-25 16:29:57', NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_types`
--

CREATE TABLE `person_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person_types`
--

INSERT INTO `person_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mayoob', 'Ipsum ullamco ipsam quas pariatur Veritatis velit ut quam ad consectetur velit libero molestias nulla esse quis', '2021-02-25 04:12:27', '2021-02-25 04:12:27'),
(2, 'Widow', 'Autem voluptatibus assumenda duis reiciendis ut architecto excepteur nihil rerum autem illo veritatis sed aperiam enim laborum', '2021-02-25 04:13:02', '2021-02-25 04:13:02'),
(3, 'Yateem', 'Nihil sed illum libero ex rerum ut temporibus blanditiis quis modi enim accusamus amet id', '2021-02-25 04:13:09', '2021-02-25 04:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Brother', 'a', '2021-02-25 04:18:18', '2021-02-25 04:18:18'),
(2, 'Father', 'a', '2021-02-25 04:20:13', '2021-02-25 04:20:13'),
(3, 'Uncle', 'uncle', '2021-02-25 04:20:56', '2021-02-25 04:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'new description', NULL, NULL),
(2, 'donator', 'new description', NULL, NULL),
(3, 'web developer', 'this is a new description', NULL, NULL),
(4, 'volunteer', 'new description', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3liDQ7hAWhwNGjYIX2hNmfAwJRmcGrI4DL0I6tba', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUFNib0pnQ1dEUDhoRDBkZEFSYWJXNVJxU1hwVUNFMFF3ZEx6YzlqdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWnhsQjJ1TFZieDg3dGtqem84c0FzT2ZnYkNUeVNFYnZOWW52NUVTZDFrTVJFWUNyNm9IQnUiO30=', 1660462574),
('9Sx9DK6i3XO5pniWEeOI1uiNvWhdx5n9W2lQ2aBq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZDFmZmI4S2lYYnZKUExRbHd4eVdGVVBzQkFtQnhMcmdUa1RudkhIbyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTy5vZ1d5SjZVOVl5Q2RWMWRZdC5ULkFNUFhCRmxXOHMzVFd6VVNwTzhjUTFPM2VrZk5BVjIiO30=', 1651055427),
('ArOiqemUlX9svpP8wUQgUbgSqDSlXHyhrWtNOKNI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWGxaZm5OcEdVTlZlU2dMc3pOMEZ5djhweURabnVYcTFwUmRheHA1ciI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbmVlZHkvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE8ub2dXeUo2VTlZeUNkVjFkWXQuVC5BTVBYQkZsVzhzM1RXelVTcE84Y1ExTzNla2ZOQVYyIjt9', 1646329040),
('hHNYn6ueHYjR7NrrgdBAT08DO4ADn7axY1S7Mfhm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZUs4RjByNWhQdFh1MVdyRWszY1V6emJQZjBRblg5SnNJRzRERUlhMiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODVOVW9Gc0ZaMmhPcFFQMlQydXQvZTFjUzIzMTh6aUwwUjZNU1BIR3hYWHFlVXh4eFYxYTIiO30=', 1660992789),
('vRdokkZO03cDm5JcATbSaQ2ePRpzY0EM4KaAI6jv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicXdnQ0M1U3NkZFFWSGpSVVc0Sk1aZFN5bTBHUkNLMEFDN1dnZmI2cyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZG9uYXRlQm94Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE8ub2dXeUo2VTlZeUNkVjFkWXQuVC5BTVBYQkZsVzhzM1RXelVTcE84Y1ExTzNla2ZOQVYyIjt9', 1650025505);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `hometown` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone_number`, `gender`, `date_birth`, `status`, `hometown`, `current_address`, `image`, `description`, `role_id`, `email_verified_at`, `phone_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohammad Shahid', 'Saadat', 'admin@gmail.com', '$2y$10$85NUoFsFZ2hOpQP2T2ut/e1cS2318ziL0R6MSPHGxXXqeUxxxV1a2', NULL, NULL, '0775546000', 1, '1999-01-28', 1, 'kabul', 'kabul', 'user.jpg', 'hello', 1, '2022-08-14 02:37:01', '2022-08-14 02:37:01', NULL, '2021-02-02 06:54:19', '2022-08-14 02:37:02', NULL),
(2, 'Amir', 'Khan', 'Christian1614303038@icseo.org', '$2y$10$85NUoFsFZ2hOpQP2T2ut/e1cS2318ziL0R6MSPHGxXXqeUxxxV1a2', NULL, NULL, '0799999999', 0, '1999-01-01', 1, 'afghanistan', 'afghanistan kabul', 'user.jpg', 'hi how are you', 2, '2021-02-25 16:30:38', '2021-02-25 16:30:38', NULL, '2021-02-25 16:30:38', '2021-03-01 06:07:52', NULL),
(3, 'Minerva', 'Finley', 'Minerva1614303058@icseo.org', '$2y$10$LwDm9e5hYQM9dU2LU7PQI.TDluncW3H/PxkY4ILeqyhKb1gmnxU7u', NULL, NULL, '07888777666', 0, '2000-02-28', 1, 'Iusto fugiat error', 'Sed ea rerum et et e', 'user.jpg', 'Omnis corrupti elit', 2, '2021-02-25 16:30:58', '2021-02-25 16:30:58', NULL, '2021-02-25 16:30:58', '2021-02-25 16:30:58', NULL),
(4, 'Nasim', 'Mendoza', 'Nasim1614303068@icseo.org', '$2y$10$8si9OLXYcQxz3wNNaiY2T.TokWto6dhFyiKaS/cblK.NKFfNTV4JG', NULL, NULL, NULL, 1, '2017-05-20', 0, 'Adipisci quis culpa', 'Mollitia temporibus', 'user.jpg', 'Debitis recusandae', 4, '2021-02-25 16:31:08', '2021-02-25 16:31:08', NULL, '2021-02-25 16:31:08', '2021-02-25 16:31:08', NULL),
(5, 'Alfreda', 'Myers', 'Alfreda1614318498@icseo.org', '$2y$10$QmbgKTsDduxq2ZgnX/Vq..eLJGyqAZV9fmvjqnjqgOYoKbIpwGicG', NULL, NULL, NULL, 0, '1986-07-01', 1, 'Do est ipsam est la', 'Consequatur ipsa at', 'user.jpg', 'Aut nihil molestiae', 2, '2021-02-25 20:48:18', '2021-02-25 20:48:18', NULL, '2021-02-25 20:48:18', '2021-02-25 20:48:18', NULL),
(8, 'Khan', 'Afghan', 'Khan1614321450@icseo.org', '$2y$10$phuW9Hr1Q.FoGeTbAkly7ON2NWQRcfMg0yHYy57DL4U3ee75.DniS', NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, 'user.jpg', NULL, 3, '2021-02-25 21:37:30', '2021-02-25 21:37:30', NULL, '2021-02-25 21:37:30', '2021-02-25 21:37:30', NULL),
(11, 'Shirzai', 'Hanifi', 'Shirzai1615177585@icseo.org', '$2y$10$YPyR474b4NVfDdFsNvFY9unru5Pyl//hf89ZYjmSKDUwJVNpeyk0C', NULL, NULL, '07878876787', 0, '1999-01-01', 1, 'kabul', 'kabul', 'user.jpg', 'hello', 2, '2021-03-07 19:26:25', '2021-03-07 19:26:25', NULL, '2021-03-07 19:26:25', '2021-03-07 19:26:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donates`
--
ALTER TABLE `donates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_boxes`
--
ALTER TABLE `donation_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_types`
--
ALTER TABLE `donation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_sponsors`
--
ALTER TABLE `monthly_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needy_people`
--
ALTER TABLE `needy_people`
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
-- Indexes for table `person_types`
--
ALTER TABLE `person_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donates`
--
ALTER TABLE `donates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `donation_boxes`
--
ALTER TABLE `donation_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation_types`
--
ALTER TABLE `donation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `monthly_sponsors`
--
ALTER TABLE `monthly_sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `needy_people`
--
ALTER TABLE `needy_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_types`
--
ALTER TABLE `person_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
