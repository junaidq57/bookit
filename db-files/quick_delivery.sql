-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2019 at 11:04 AM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quick_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_queries`
--

CREATE TABLE `admin_queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_from` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_queries`
--

INSERT INTO `admin_queries` (`id`, `message`, `send_from`, `send_to`, `status`, `created_at`, `updated_at`, `deleted_at`, `phone`, `email`) VALUES
(1, 'Hello Friendsssss', 1, 0, 1, '2019-03-10 00:02:26', '2019-03-10 00:07:00', NULL, '', ''),
(2, 'hello friend', 1, 8, 1, '2019-03-10 02:43:58', '2019-03-10 02:43:58', NULL, '', ''),
(3, 'Hello everyone', 1, 0, 1, '2019-03-10 12:17:20', '2019-03-10 12:17:20', NULL, '', ''),
(4, 'Hello everyone', 1, 0, 1, '2019-03-10 12:21:03', '2019-03-10 12:21:03', NULL, '', ''),
(5, 'Hello Everyone hello', 1, 11, 1, '2019-03-11 01:39:30', '2019-03-11 01:39:30', NULL, '', ''),
(6, 'Hello Supervisor how are you?', 2, 10, 1, '2019-03-11 02:45:25', '2019-03-11 02:45:25', NULL, '', ''),
(7, 'hello from ismail', 2, 0, 1, '2019-03-12 16:20:36', '2019-03-12 16:20:36', NULL, '', ''),
(8, 'Hello everyone', 2, 0, 1, '2019-03-15 16:01:22', '2019-03-15 16:01:22', NULL, '', ''),
(9, 'bhai kia haal hain', 1, 1, 1, '2019-07-21 21:04:41', '2019-07-21 21:04:41', NULL, '', ''),
(10, 'bhai kia haal hain', 1, 1, 1, '2019-07-21 21:05:57', '2019-07-21 21:05:57', NULL, '03412079829', 'junaid@aalogics.com'),
(11, 'bhai kia haal hain', 1, 2, 1, '2019-07-21 21:06:09', '2019-07-21 21:06:09', NULL, '03412079829', 'junaid@aalogics.com'),
(12, 'bhai kia haal hain', 1, 2, 1, '2019-07-21 21:08:41', '2019-07-21 21:08:41', NULL, '03412079829', 'junaid@aalogics.com'),
(13, 'Hdsdc', 49, 0, 1, '2019-07-22 03:14:16', '2019-07-22 03:14:16', NULL, '677577', 'usman@gmail.com'),
(14, 'bhai kia haal hain', 48, 2, 1, '2019-07-22 03:15:09', '2019-07-22 03:15:09', NULL, '03412079829', 'junaid@aalogics.com'),
(15, 'Sas', 49, 0, 1, '2019-07-22 03:19:28', '2019-07-22 03:19:28', NULL, '87986767', 'aa@aa.aa'),
(16, 'Ad', 49, 0, 1, '2019-07-22 03:22:50', '2019-07-22 03:22:50', NULL, '87986767', 'aa@aa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) UNSIGNED NOT NULL,
  `instance_id` int(11) DEFAULT NULL,
  `instance_type` varchar(255) DEFAULT NULL,
  `attachment` text,
  `attachment_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `instance_id`, `instance_type`, `attachment`, `attachment_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, '0', 'attachments/fb3txfTubcUyy5pJKXuZ0Ju7BS8fBE9Kafg5V7H2.jpeg', 'C:\\xampp2\\tmp\\php4B5E.tmp', '2019-02-27 16:25:31', '2019-02-27 16:25:31', NULL),
(2, 11, '0', 'attachments/qBEyWKQIJYKHGZL4ON1tbQmz8Gg8vudZ31VTDiXK.jpeg', 'C:\\xampp2\\tmp\\php4B5F.tmp', '2019-02-27 16:25:31', '2019-02-27 16:25:31', NULL),
(3, 12, '0', 'attachments/AP5Gmhxof9T59ysO90cmfmdXGGWp4O2fC5dYjWtO.jpeg', 'C:\\xampp2\\tmp\\phpCF39.tmp', '2019-02-28 16:13:41', '2019-02-28 16:13:41', NULL),
(4, 12, '0', 'attachments/ByVILAu0xvC218pPQ1cbvpTktvo4yplkZ83gLITa.jpeg', 'C:\\xampp2\\tmp\\phpCF69.tmp', '2019-02-28 16:13:41', '2019-02-28 16:13:41', NULL),
(5, 13, '0', 'attachments/lgWCf0RaJY9gWu9DXGV4Zv4bbUe14N97BQsdlW6p.jpeg', '/tmp/phpfNs8uQ', '2019-03-29 15:26:19', '2019-03-29 15:26:19', NULL),
(6, 14, '0', 'attachments/rLFaG9xUDtpPb7YG569ypaYmCCF6K61rTBsM21bx.jpeg', '/tmp/php1eJUhA', '2019-03-29 16:31:31', '2019-03-29 16:31:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `job_date` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `time_in`, `time_out`, `job_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 8, '12:42:00', '13:43:00', '2019-03-02', '2019-03-03 21:16:13', '2019-03-03 07:43:03', NULL),
(5, 8, '03:51:00', '04:51:00', '2019-03-02', '2019-03-14 06:07:45', '2019-03-03 10:51:01', NULL),
(6, 11, '08:59:00', '09:59:00', '2019-03-03', '2019-03-16 01:00:09', '2019-03-04 03:59:29', NULL),
(7, 8, '08:37:00', '10:37:00', '2019-03-05', '2019-03-06 20:45:59', '2019-03-06 15:37:43', NULL),
(8, 8, '08:59:00', '09:01:00', '2019-03-06', '2019-03-07 09:01:19', '2019-03-07 16:01:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `company` varchar(191) NOT NULL,
  `detail` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company`, `detail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'Flafla2', 'flafla company2', '2019-01-30 18:08:49', '2019-01-31 13:29:41', NULL),
(2, 9, 'don2', 'don2', '2019-01-31 15:02:27', '2019-02-01 07:40:42', '2019-01-31 12:40:42'),
(3, 8, 'hello bhaijan', 'hello company', '2019-02-03 10:07:59', '2019-02-03 10:07:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

CREATE TABLE `facilitator` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_engaged` tinyint(1) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitator`
--

INSERT INTO `facilitator` (`id`, `user_id`, `is_engaged`, `available`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 41, 0, 0, '2019-05-26 17:10:06', '2019-05-26 17:10:06', NULL),
(2, 42, 0, 0, '2019-05-26 17:11:55', '2019-05-26 17:11:55', NULL),
(3, 43, 0, 0, '2019-05-26 17:12:30', '2019-05-26 17:12:30', NULL),
(4, 45, 0, 0, '2019-05-26 17:17:50', '2019-05-26 17:17:50', NULL),
(5, 53, 0, 0, '2019-07-29 02:16:46', '2019-07-29 02:16:46', NULL),
(6, 54, 0, 0, '2019-07-29 02:22:02', '2019-07-29 02:22:02', NULL),
(7, 55, 0, 0, '2019-07-31 01:24:01', '2019-07-31 01:24:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilitator_tracks`
--

CREATE TABLE `facilitator_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `facilitator_id` int(10) UNSIGNED NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitator_tracks`
--

INSERT INTO `facilitator_tracks` (`id`, `facilitator_id`, `longitude`, `latitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 41, '67.198930', '24.930800', '2019-05-26 17:10:06', '2019-05-27 04:02:50', NULL),
(5, 2, '67.106525', '24.942592', '2019-05-26 17:10:06', '2019-05-27 04:02:50', NULL),
(6, 6, '1237728..1788', '123.454.221', '2019-05-30 02:38:58', '2019-07-29 02:55:26', NULL),
(7, 0, NULL, NULL, '2019-05-30 02:50:40', '2019-05-30 02:50:40', NULL),
(8, 0, NULL, NULL, '2019-05-30 04:43:18', '2019-05-30 04:43:18', NULL),
(9, 5, '', '', '2019-07-29 02:16:46', '2019-07-29 02:16:46', NULL),
(10, 6, '', '', '2019-07-29 02:22:02', '2019-07-29 02:22:02', NULL),
(11, 7, '', '', '2019-07-31 01:24:01', '2019-07-31 01:24:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `code`, `title`, `native_name`, `direction`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', 'English', NULL, 'LTR', 1, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(2, 'ar', 'Arabic', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(3, 'ab', 'Abkhaz', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(4, 'aa', 'Afar', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(5, 'af', 'Afrikaans', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(6, 'ak', 'Akan', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(7, 'sq', 'Albanian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(8, 'am', 'Amharic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(9, 'an', 'Aragonese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(10, 'hy', 'Armenian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(11, 'as', 'Assamese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(12, 'av', 'Avaric', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(13, 'ae', 'Avestan', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(14, 'ay', 'Aymara', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(15, 'az', 'Azerbaijani', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(16, 'bm', 'Bambara', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(17, 'ba', 'Bashkir', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(18, 'eu', 'Basque', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(19, 'be', 'Belarusian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(20, 'bn', 'Bengali', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(21, 'bh', 'Bihari', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(22, 'bi', 'Bislama', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(23, 'bs', 'Bosnian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(24, 'br', 'Breton', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(25, 'bg', 'Bulgarian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(26, 'my', 'Burmese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(27, 'ca', 'Catalan; Valencian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(28, 'ch', 'Chamorro', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(29, 'ce', 'Chechen', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(30, 'ny', 'Chichewa; Chewa; Nyanja', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(31, 'zh', 'Chinese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(32, 'cv', 'Chuvash', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(33, 'kw', 'Cornish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(34, 'co', 'Corsican', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(35, 'cr', 'Cree', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(36, 'hr', 'Croatian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(37, 'cs', 'Czech', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(38, 'da', 'Danish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(39, 'dv', 'Divehi; Dhivehi; Maldivian;', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(40, 'nl', 'Dutch', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(41, 'eo', 'Esperanto', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(42, 'et', 'Estonian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(43, 'ee', 'Ewe', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(44, 'fo', 'Faroese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(45, 'fj', 'Fijian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(46, 'fi', 'Finnish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(47, 'fr', 'French', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(48, 'ff', 'Fula; Fulah; Pulaar; Pular', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(49, 'gl', 'Galician', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(50, 'ka', 'Georgian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(51, 'de', 'German', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(52, 'el', 'Greek, Modern', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(53, 'gn', 'Guaraní', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(54, 'gu', 'Gujarati', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(55, 'ht', 'Haitian; Haitian Creole', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(56, 'ha', 'Hausa', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(57, 'he', 'Hebrew (modern)', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(58, 'hz', 'Herero', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(59, 'hi', 'Hindi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(60, 'ho', 'Hiri Motu', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(61, 'hu', 'Hungarian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(62, 'ia', 'Interlingua', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(63, 'id', 'Indonesian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(64, 'ie', 'Interlingue', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(65, 'ga', 'Irish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(66, 'ig', 'Igbo', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(67, 'ik', 'Inupiaq', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(68, 'io', 'Ido', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(69, 'is', 'Icelandic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(70, 'it', 'Italian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(71, 'iu', 'Inuktitut', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(72, 'ja', 'Japanese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(73, 'jv', 'Javanese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(74, 'kl', 'Kalaallisut, Greenlandic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(75, 'kn', 'Kannada', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(76, 'kr', 'Kanuri', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(77, 'ks', 'Kashmiri', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(78, 'kk', 'Kazakh', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(79, 'km', 'Khmer', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(80, 'ki', 'Kikuyu, Gikuyu', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(81, 'rw', 'Kinyarwanda', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(82, 'ky', 'Kirghiz, Kyrgyz', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(83, 'kv', 'Komi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(84, 'kg', 'Kongo', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(85, 'ko', 'Korean', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(86, 'ku', 'Kurdish', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(87, 'kj', 'Kwanyama, Kuanyama', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(88, 'la', 'Latin', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(89, 'lb', 'Luxembourgish, Letzeburgesch', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(90, 'lg', 'Luganda', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(91, 'li', 'Limburgish, Limburgan, Limburger', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(92, 'ln', 'Lingala', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(93, 'lo', 'Lao', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(94, 'lt', 'Lithuanian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(95, 'lu', 'Luba-Katanga', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(96, 'lv', 'Latvian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(97, 'gv', 'Manx', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(98, 'mk', 'Macedonian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(99, 'mg', 'Malagasy', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(100, 'ms', 'Malay', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(101, 'ml', 'Malayalam', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(102, 'mt', 'Maltese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(103, 'mi', 'Māori', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(104, 'mr', 'Marathi (Marāṭhī)', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(105, 'mh', 'Marshallese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(106, 'mn', 'Mongolian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(107, 'na', 'Nauru', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(108, 'nv', 'Navajo, Navaho', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(109, 'nb', 'Norwegian Bokmål', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(110, 'nd', 'North Ndebele', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(111, 'ne', 'Nepali', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(112, 'ng', 'Ndonga', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(113, 'nn', 'Norwegian Nynorsk', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(114, 'no', 'Norwegian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(115, 'ii', 'Nuosu', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(116, 'nr', 'South Ndebele', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(117, 'oc', 'Occitan', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(118, 'oj', 'Ojibwe, Ojibwa', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(119, 'cu', 'Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(120, 'om', 'Oromo', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(121, 'or', 'Oriya', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(122, 'os', 'Ossetian, Ossetic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(123, 'pa', 'Panjabi, Punjabi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(124, 'pi', 'Pāli', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(125, 'fa', 'Persian', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(126, 'pl', 'Polish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(127, 'ps', 'Pashto, Pushto', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(128, 'pt', 'Portuguese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(129, 'qu', 'Quechua', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(130, 'rm', 'Romansh', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(131, 'rn', 'Kirundi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(132, 'ro', 'Romanian, Moldavian, Moldovan', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(133, 'ru', 'Russian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(134, 'sa', 'Sanskrit (Saṁskṛta)', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(135, 'sc', 'Sardinian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(136, 'sd', 'Sindhi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(137, 'se', 'Northern Sami', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(138, 'sm', 'Samoan', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(139, 'sg', 'Sango', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(140, 'sr', 'Serbian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(141, 'gd', 'Scottish Gaelic; Gaelic', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(142, 'sn', 'Shona', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(143, 'si', 'Sinhala, Sinhalese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(144, 'sk', 'Slovak', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(145, 'sl', 'Slovene', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(146, 'so', 'Somali', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(147, 'st', 'Southern Sotho', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(148, 'es', 'Spanish; Castilian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(149, 'su', 'Sundanese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(150, 'sw', 'Swahili', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(151, 'ss', 'Swati', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(152, 'sv', 'Swedish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(153, 'ta', 'Tamil', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(154, 'te', 'Telugu', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(155, 'tg', 'Tajik', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(156, 'th', 'Thai', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(157, 'ti', 'Tigrinya', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(158, 'bo', 'Tibetan Standard, Tibetan, Central', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(159, 'tk', 'Turkmen', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(160, 'tl', 'Tagalog', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(161, 'tn', 'Tswana', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(162, 'to', 'Tonga (Tonga Islands)', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(163, 'tr', 'Turkish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(164, 'ts', 'Tsonga', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(165, 'tt', 'Tatar', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(166, 'tw', 'Twi', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(167, 'ty', 'Tahitian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(168, 'ug', 'Uighur, Uyghur', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(169, 'uk', 'Ukrainian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(170, 'ur', 'Urdu', NULL, 'RTL', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(171, 'uz', 'Uzbek', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(172, 've', 'Venda', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(173, 'vi', 'Viettitlese', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(174, 'vo', 'Volapük', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(175, 'wa', 'Walloon', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(176, 'cy', 'Welsh', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(177, 'wo', 'Wolof', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(178, 'fy', 'Western Frisian', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(179, 'xh', 'Xhosa', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(180, 'yi', 'Yiddish', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(181, 'yo', 'Yoruba', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL),
(182, 'za', 'Zhuang, Chuang', NULL, 'LTR', 0, '2019-01-23 07:47:37', '2019-01-23 07:47:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `is_protected` tinyint(4) NOT NULL DEFAULT '0',
  `static` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `module_id`, `name`, `icon`, `slug`, `position`, `is_protected`, `static`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dashboard', 'fa fa-dashboard', 'dashboard', 2, 1, 1, 1, '2019-01-23 07:47:35', '2019-03-16 07:41:51', NULL),
(2, 3, 'Users', 'fa fa-user', 'users', 3, 1, 0, 1, '2019-01-23 07:47:35', '2019-03-16 07:41:50', NULL),
(3, 4, 'Roles', 'fa fa-edit', 'roles', 1, 1, 0, 1, '2019-01-23 07:47:35', '2019-03-16 07:41:51', NULL),
(4, 5, 'Permissions', 'fa fa-check-square-o', 'permissions', 4, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(5, 6, 'Modules', 'fa fa-database', 'modules', 5, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(6, 7, 'Languages', 'fa fa-comments-o', 'languages', 6, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(7, 8, 'Pages', 'fa fa-wpforms', 'pages', 7, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(8, 9, 'Menus', 'fa fa-th', 'menus', 8, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(9, 10, 'Message', 'fa fa-mail-forward', 'contactus', 9, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(10, 11, 'Notifications', 'fa fa-bell', 'notifications', 10, 1, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(11, 12, 'Settings', 'fa fa-gears', 'settings', 11, 0, 0, 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(12, 13, 'Attendances', 'fa fa-th-list', 'attendances', 12, 0, 0, 0, '2019-01-26 09:42:21', '2019-05-17 03:30:09', NULL),
(13, 14, 'Tasks', 'fa fa-glass', 'tasks', 13, 0, 0, 0, '2019-01-26 09:52:58', '2019-05-17 03:30:13', NULL),
(14, 15, 'Task Categories', 'fa fa-th-large', 'task-categories', 14, 0, 0, 0, '2019-02-18 10:34:48', '2019-05-17 03:30:13', NULL),
(15, 16, 'Task Comments', 'fa fa-comments', 'task-comments', 15, 0, 0, 0, '2019-02-27 15:22:18', '2019-05-17 03:30:21', NULL),
(16, 17, 'Orders', 'fa fa-glass', 'orders', 16, 0, 0, 0, '2019-04-26 17:51:45', '2019-05-17 03:30:34', NULL),
(18, 20, 'Quickorders', 'fa fa-glass', 'quickorders', 17, 0, 0, 1, '2019-04-28 14:11:50', '2019-06-25 22:30:05', NULL),
(19, 21, 'Quickorderitems', 'fa fa-glass', 'quickorderitems', 18, 0, 0, 1, '2019-04-28 14:13:21', '2019-06-25 22:30:27', NULL),
(20, 22, 'Facilitators', 'fa fa-glass', 'facilitators', 19, 0, 0, 1, '2019-05-22 01:33:40', '2019-06-25 22:30:27', NULL),
(21, 23, 'Facilitator Tracks', 'fa fa-glass', 'facilitator-tracks', 20, 0, 0, 1, '2019-05-22 01:36:01', '2019-05-22 01:36:01', NULL);

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
(3, '2018_04_06_134936_create_modules_table', 1),
(4, '2018_04_06_151644_entrust_setup_tables', 1),
(5, '2018_04_09_111106_add_soft_delete_in_users_table', 1),
(6, '2018_04_09_152013_create_menus_table', 1),
(7, '2018_07_12_083021_create_locales_table', 1),
(8, '2018_07_12_084644_create_pages_table', 1),
(9, '2018_07_13_181040_create_notification_table', 1),
(10, '2018_07_13_191027_create_admin_query_table', 1),
(11, '2018_10_02_055325_create_settings_table', 1),
(12, '2019_04_25_224050_orders', 2),
(13, '2019_04_27_190446_quick_orders', 3),
(14, '2019_05_14_150413_order_table_changes', 4),
(15, '2019_05_14_152754_order_add_status', 5),
(16, '2019_05_19_064550_missing_column', 6),
(17, '2019_06_06_095531_order_table_changes', 7),
(18, '2019_07_07_190617_user_detail_updates', 8),
(19, '2019_07_08_194932_order_update_column', 9),
(20, '2019_07_18_185817_order_table_update', 10),
(21, '2019_07_21_134043_contact_us_changes', 11),
(22, '2019_07_22_191811_order_ship_columns', 12),
(23, '2019_07_25_210229_order_accept_decline', 13),
(24, '2019_08_03_042911_order_ratings', 14);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_module` tinyint(4) NOT NULL DEFAULT '0',
  `config` text COLLATE utf8mb4_unicode_ci,
  `is_protected` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `table_name`, `icon`, `status`, `is_module`, `config`, `is_protected`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin Panel', 'adminpanel', '-', 'fa fa-dashboard', 1, 0, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(2, 'Dashboard', 'dashboard', '-', 'fa fa-dashboard', 1, 0, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(3, 'Users', 'users', 'users', 'fa fa-user', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(4, 'Roles', 'roles', 'roles', 'fa fa-edit', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(5, 'Permissions', 'permissions', 'permissions', 'fa fa-check-square-o', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(6, 'Modules', 'modules', 'modules', 'fa fa-database', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(7, 'Languages', 'languages', 'locales', 'fa fa-comments-o', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(8, 'Page', 'pages', 'pages', 'fa fa-wpforms', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(9, 'Contactus', 'contactus', 'admin_queries', 'fa fa-message', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(10, 'Notification', 'notifications', 'notifications', 'fa fa-bell', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(11, 'Menu', 'menus', 'menus', 'fa fa-th', 1, 1, 'null', 1, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(12, 'Setting', 'settings', 'app_settings', 'fa fa-gears', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"default_language\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"select\",\"validations\":\"required|exists:locales,code\",\"inIndex\":true,\"searchable\":true},{\"name\":\"email\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"email\",\"validations\":\"required|email\",\"inIndex\":true,\"searchable\":true},{\"name\":\"logo\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required|image|mimetypes:text\\/plain,...\",\"inIndex\":true,\"searchable\":true},{\"name\":\"phone\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"latitude\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"number\",\"validations\":\"required\",\"inIndex\":false,\"searchable\":false},{\"name\":\"longitude\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"number\",\"validations\":\"required\",\"inIndex\":false,\"searchable\":false},{\"name\":\"playstore\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":false,\"searchable\":false},{\"name\":\"appstore\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":false,\"searchable\":false},{\"name\":\"social_links\",\"primary\":false,\"dbType\":\"text,65535\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":false,\"searchable\":false},{\"name\":\"app_version\",\"primary\":false,\"dbType\":\"float\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"number\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"force_update\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"checkbox\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-01-23 07:47:35', '2019-01-23 07:47:35', NULL),
(13, 'Attendance', 'attendances', 'attendance', 'fa fa-th-list', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"user_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"time_in\",\"primary\":false,\"dbType\":\"time\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"time_out\",\"primary\":false,\"dbType\":\"time\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"job_date\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true}]', 0, '2019-01-26 09:41:20', '2019-01-26 09:42:20', NULL),
(14, 'Task', 'tasks', 'tasks', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"title\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"detail\",\"primary\":false,\"dbType\":\"text,65535\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"priority\",\"primary\":false,\"dbType\":\"boolean\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"start_date\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"end_date\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"complete_date\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"created_by\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"status\",\"primary\":false,\"dbType\":\"boolean\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-01-26 09:52:00', '2019-01-26 09:52:58', NULL),
(15, 'TaskCategory', 'task-categories', 'task_categories', 'fa fa-th-large', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"parent_task_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"title\",\"primary\":false,\"dbType\":\"string,100\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-02-18 10:34:03', '2019-02-18 10:34:47', NULL),
(16, 'TaskComment', 'task-comments', 'task_comments', 'fa fa-comments', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"task_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"user_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"carried_out\",\"primary\":false,\"dbType\":\"boolean\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"radio\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"quantity\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"number\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"comment\",\"primary\":false,\"dbType\":\"text,65535\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"textarea\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-02-27 15:21:08', '2019-02-27 15:22:18', NULL),
(17, 'Order', 'orders', 'orders', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"user_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"select\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"destination_current_address\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"destination_other_address\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true}]', 0, '2019-04-26 17:50:44', '2019-04-26 17:51:45', NULL),
(18, 'OrderItem', 'orderitems', 'order_item', 'fa fa-th-list', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"order_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"item\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"quantity\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"category\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true}]', 0, '2019-04-26 17:52:50', '2019-04-26 17:54:23', NULL),
(19, 'Orderitem', 'orderitems', 'order_item', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"order_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"item\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"quantity\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"category\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true}]', 0, '2019-04-26 17:57:12', '2019-04-26 17:57:30', NULL),
(20, 'Quickorder', 'quickorders', 'quick_order', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"user_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"destination_current_address\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"destination_other_address\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"totals\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-04-28 14:11:03', '2019-04-28 14:11:50', NULL),
(21, 'Quickorderitem', 'quickorderitems', 'quick_order_items', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"order_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"item\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"quantity\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"category\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"price\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-04-28 14:12:47', '2019-04-28 14:13:21', NULL),
(22, 'Facilitator', 'facilitators', 'facilitator', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false},{\"name\":\"user_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"is_engaged\",\"primary\":false,\"dbType\":\"boolean\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"available\",\"primary\":false,\"dbType\":\"boolean\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true}]', 0, '2019-05-22 01:32:05', '2019-05-22 01:33:39', NULL),
(23, 'FacilitatorTrack', 'facilitator-tracks', 'facilitator_tracks', 'fa fa-glass', 1, 1, '[{\"name\":\"id\",\"primary\":true,\"dbType\":\"increments\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"facilitator_id\",\"primary\":false,\"dbType\":\"increments\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"longitude\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"latitude\",\"primary\":false,\"dbType\":\"string,191\",\"fillable\":true,\"inForm\":true,\"htmlType\":\"text\",\"validations\":\"required\",\"inIndex\":true,\"searchable\":true},{\"name\":\"created_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"updated_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":true,\"searchable\":true},{\"name\":\"deleted_at\",\"primary\":false,\"dbType\":\"datetime\",\"fillable\":false,\"inForm\":false,\"htmlType\":false,\"validations\":false,\"inIndex\":false,\"searchable\":false}]', 0, '2019-05-22 01:35:21', '2019-05-22 01:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `url`, `action_type`, `ref_id`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'http://localhost/mothercare/admin/contactus/4', 'contactus', 8, 'You have a new message', 0, '2019-03-10 12:21:03', '2019-03-11 01:33:51', NULL),
(2, 1, 'http://localhost/mothercare/admin/contactus/3', 'contactus', 9, 'Blablabla\r\n', 0, '2019-03-10 17:58:01', '2019-03-10 13:59:30', NULL),
(3, 1, 'http://localhost/mothercare/admin/contactus/5', 'contactus', 11, 'You have a new message', 1, '2019-03-11 01:39:30', '2019-03-11 01:39:30', NULL),
(4, 2, 'http://localhost/mothercare/admin/contactus/6', 'contactus', 10, 'You have a new message', 1, '2019-03-11 02:45:25', '2019-03-11 02:45:25', NULL),
(5, 2, 'http://localhost/mothercare/admin/tasks/6', 'tasks', 8, 'You have assigned a new task', 1, '2019-03-11 04:52:37', '2019-03-11 04:52:37', NULL),
(6, 2, 'http://localhost/mothercare/admin/tasks/7', 'tasks', 8, 'You have assigned a new task', 1, '2019-03-11 04:55:58', '2019-03-11 09:04:43', NULL),
(7, 2, 'http://www.clickteam.asia/admin/contactus/7', 'contactus', 0, 'You have a new message', 1, '2019-03-12 16:20:36', '2019-03-12 16:20:36', NULL),
(8, 2, 'http://clickteam.asia/admin/tasks/6', 'tasks', 11, 'You have assigned a new task', 1, '2019-03-15 15:57:38', '2019-03-15 15:57:38', NULL),
(9, 2, 'http://clickteam.asia/admin/contactus/8', 'contactus', 0, 'You have a new message', 1, '2019-03-15 16:01:22', '2019-03-15 16:01:22', NULL),
(10, 1, 'http://quickdeliveryslu.com/admin/contactus/9', 'contactus', 1, 'You have a new message', 1, '2019-07-21 21:04:41', '2019-07-21 21:04:41', NULL),
(11, 1, 'http://quickdeliveryslu.com/admin/contactus/10', 'contactus', 1, 'You have a new message', 1, '2019-07-21 21:05:57', '2019-07-21 21:05:57', NULL),
(12, 1, 'http://quickdeliveryslu.com/admin/contactus/11', 'contactus', 2, 'You have a new message', 1, '2019-07-21 21:06:09', '2019-07-21 21:06:09', NULL),
(13, 1, 'http://quickdeliveryslu.com/admin/contactus/12', 'contactus', 2, 'You have a new message', 1, '2019-07-21 21:08:41', '2019-07-21 21:08:41', NULL),
(14, 49, 'http://quickdeliveryslu.com/admin/contactus/13', 'contactus', 0, 'You have a new message', 1, '2019-07-22 03:14:16', '2019-07-22 03:14:16', NULL),
(15, 48, 'http://quickdeliveryslu.com/admin/contactus/14', 'contactus', 2, 'You have a new message', 1, '2019-07-22 03:15:09', '2019-07-22 03:15:09', NULL),
(16, 49, 'http://quickdeliveryslu.com/admin/contactus/15', 'contactus', 0, 'You have a new message', 1, '2019-07-22 03:19:28', '2019-07-22 03:19:28', NULL),
(17, 49, 'http://quickdeliveryslu.com/admin/contactus/16', 'contactus', 0, 'You have a new message', 1, '2019-07-22 03:22:50', '2019-07-22 03:22:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_users`
--

CREATE TABLE `notification_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '10=Sent, 20=Delivered, 30=Read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `destination_current_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_other_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'privacy_policy', 1, '2019-07-21 19:11:21', '2019-07-21 19:11:21', NULL),
(2, 'Term_condition', 1, '2019-07-21 19:12:13', '2019-07-21 19:12:13', NULL),
(3, 'help', 1, '2019-07-21 19:12:55', '2019-07-21 19:12:55', NULL),
(4, 'about_us', 1, '2019-07-21 19:13:37', '2019-07-21 19:13:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Privacy Policy', 'This Is our Privacy Policy', 1, '2019-07-21 19:11:52', '2019-07-21 19:11:52', NULL),
(2, 2, 'en', 'Terms And Conditions', 'This Is our Terms and conditions', 1, '2019-07-21 19:12:40', '2019-07-21 19:12:40', NULL),
(3, 3, 'en', 'Help', 'Call us to Help', 1, '2019-07-21 19:13:18', '2019-07-21 19:13:18', NULL),
(4, 4, 'en', 'About Us', 'We are here for your ease to provide every kind of shopping', 1, '2019-07-21 19:14:21', '2019-07-21 19:14:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parent_tasks`
--

CREATE TABLE `parent_tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent_tasks`
--

INSERT INTO `parent_tasks` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Duties By Performance\r\n', '2019-02-18 15:27:43', '2019-02-18 15:27:43', NULL),
(2, 'Duties By Conformance\r\n', '2019-02-18 15:28:04', '2019-02-18 15:28:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(4) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `display_name`, `is_protected`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'adminpanel', 'Admin Panel', 1, 'Admin Panel', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(2, 2, 'dashboard', 'Dashboard', 1, 'Dashboard', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(3, 3, 'users.index', 'List Users', 1, 'List Roles', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(4, 3, 'users.create', 'Create Users', 1, 'Create Users', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(5, 3, 'users.show', 'View User', 1, 'View User', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(6, 3, 'users.edit', 'Edit User', 1, 'Edit User', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(7, 3, 'users.destroy', 'Delete User', 1, 'Delete User', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(8, 4, 'roles.index', 'List Roles', 1, 'List Roles', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(9, 4, 'roles.create', 'Create Role', 1, 'Create Role', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(10, 4, 'roles.show', 'View Role', 1, 'View Role', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(11, 4, 'roles.edit', 'Edit Role', 1, 'Edit Role', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(12, 4, 'roles.destroy', 'Delete Role', 1, 'Delete Role', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(13, 5, 'permissions.index', 'List Permissions', 1, 'List Permissions', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(14, 5, 'permissions.create', 'Create Permission', 1, 'Create Permission', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(15, 5, 'permissions.show', 'View Permission', 1, 'View Permission', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(16, 5, 'permissions.edit', 'Edit Permission', 1, 'Edit Permission', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(17, 5, 'permissions.destroy', 'Delete Permission', 1, 'Delete Permission', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(18, 6, 'modules.index', 'List Modules', 1, 'List Modules', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(19, 6, 'modules.create', 'Create Module', 1, 'Create Module', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(20, 6, 'modules.show', 'View Module', 1, 'View Module', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(21, 6, 'modules.edit', 'Edit Module', 1, 'Edit Module', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(22, 6, 'modules.destroy', 'Delete Module', 1, 'Delete Module', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(23, 7, 'languages.index', 'List Languages', 1, 'List Languages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(24, 7, 'languages.create', 'Create Languages', 1, 'Create Languages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(25, 7, 'languages.show', 'View Languages', 1, 'View Languages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(26, 7, 'languages.edit', 'Edit Languages', 1, 'Edit Languages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(27, 7, 'languages.destroy', 'Delete Languages', 1, 'Delete Languages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(28, 8, 'pages.index', 'List Pages', 1, 'List Pages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(29, 8, 'pages.create', 'Create Pages', 1, 'Create Pages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(30, 8, 'pages.show', 'View Pages', 1, 'View Pages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(31, 8, 'pages.edit', 'Edit Pages', 1, 'Edit Pages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(32, 8, 'pages.destroy', 'Delete Pages', 1, 'Delete Pages', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(33, 9, 'contactus.index', 'List Contact Us', 1, 'List Contact Us Record', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(34, 9, 'contactus.create', 'Create Contact Us', 1, 'Create Contact Us Record', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(35, 9, 'contactus.show', 'View Contact Us', 1, 'View Contact Us Record', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(36, 9, 'contactus.edit', 'Edit Contact Us', 1, 'Edit Contact Us Record', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(37, 9, 'contactus.destroy', 'Delete Contact Us', 1, 'Delete Contact Us Record', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(38, 10, 'notifications.index', 'List Notification', 1, 'List Notification', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(39, 10, 'notifications.create', 'Create Notification', 1, 'Create Notification', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(40, 10, 'notifications.show', 'View Notification', 1, 'View Notification', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(41, 10, 'notifications.edit', 'Edit Notification', 1, 'Edit Notification', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(42, 10, 'notifications.destroy', 'Delete Notification', 1, 'Delete Notification', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(43, 11, 'menus.index', 'List Menu', 1, 'List Menu', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(44, 11, 'menus.create', 'Create Menu', 1, 'Create Menu', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(45, 11, 'menus.show', 'View Menu', 1, 'View Menu', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(46, 11, 'menus.edit', 'Edit Menu', 1, 'Edit Menu', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(47, 11, 'menus.destroy', 'Delete Menu', 1, 'Delete Menu', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(48, 12, 'settings.index', 'Settings', 0, 'Index Settings', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(49, 12, 'settings.create', 'Settings', 0, 'Create Settings', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(50, 12, 'settings.show', 'Settings', 0, 'Show Settings', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(51, 12, 'settings.edit', 'Settings', 0, 'Edit Settings', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(52, 12, 'settings.destroy', 'Settings', 0, 'Destroy Settings', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(53, 13, 'attendances.index', 'Attendances', 0, 'Index Attendances', '2019-01-26 14:42:20', '2019-01-26 14:42:20', NULL),
(54, 13, 'attendances.create', 'Attendances', 0, 'Create Attendances', '2019-01-26 14:42:20', '2019-01-26 14:42:20', NULL),
(55, 13, 'attendances.show', 'Attendances', 0, 'Show Attendances', '2019-01-26 14:42:21', '2019-01-26 14:42:21', NULL),
(56, 13, 'attendances.edit', 'Attendances', 0, 'Edit Attendances', '2019-01-26 14:42:21', '2019-01-26 14:42:21', NULL),
(57, 13, 'attendances.destroy', 'Attendances', 0, 'Destroy Attendances', '2019-01-26 14:42:21', '2019-01-26 14:42:21', NULL),
(58, 14, 'tasks.index', 'Tasks', 0, 'Index Tasks', '2019-01-26 14:52:58', '2019-01-26 14:52:58', NULL),
(59, 14, 'tasks.create', 'Tasks', 0, 'Create Tasks', '2019-01-26 14:52:58', '2019-01-26 14:52:58', NULL),
(60, 14, 'tasks.show', 'Tasks', 0, 'Show Tasks', '2019-01-26 14:52:58', '2019-01-26 14:52:58', NULL),
(61, 14, 'tasks.edit', 'Tasks', 0, 'Edit Tasks', '2019-01-26 14:52:58', '2019-01-26 14:52:58', NULL),
(62, 14, 'tasks.destroy', 'Tasks', 0, 'Destroy Tasks', '2019-01-26 14:52:58', '2019-01-26 14:52:58', NULL),
(64, 3, 'users.add', 'Users', 1, 'Add user to supervisor', '2019-02-03 07:14:49', '2019-02-03 07:14:49', NULL),
(65, 15, 'task-categories.index', 'Task Categories', 0, 'Index Task Categories', '2019-02-18 15:34:47', '2019-02-18 15:34:47', NULL),
(66, 15, 'task-categories.create', 'Task Categories', 0, 'Create Task Categories', '2019-02-18 15:34:48', '2019-02-18 15:34:48', NULL),
(67, 15, 'task-categories.show', 'Task Categories', 0, 'Show Task Categories', '2019-02-18 15:34:48', '2019-02-18 15:34:48', NULL),
(68, 15, 'task-categories.edit', 'Task Categories', 0, 'Edit Task Categories', '2019-02-18 15:34:48', '2019-02-18 15:34:48', NULL),
(69, 15, 'task-categories.destroy', 'Task Categories', 0, 'Destroy Task Categories', '2019-02-18 15:34:48', '2019-02-18 15:34:48', NULL),
(70, 3, 'tasks.taskComplete', 'Task Complete', 0, 'Task Complete', '2019-02-27 19:18:21', '2019-02-27 19:18:21', NULL),
(71, 16, 'task-comments.index', 'Taskcomments', 0, 'Index Taskcomments', '2019-02-27 20:22:18', '2019-02-27 20:22:18', NULL),
(72, 16, 'task-comments.create', 'Taskcomments', 0, 'Create Taskcomments', '2019-02-27 20:22:18', '2019-02-27 20:22:18', NULL),
(73, 16, 'task-comments.show', 'Taskcomments', 0, 'Show Taskcomments', '2019-02-27 20:22:18', '2019-02-27 20:22:18', NULL),
(74, 16, 'task-comments.edit', 'Taskcomments', 0, 'Edit Taskcomments', '2019-02-27 20:22:18', '2019-02-27 20:22:18', NULL),
(75, 16, 'task-comments.destroy', 'Taskcomments', 0, 'Destroy Taskcomments', '2019-02-27 20:22:18', '2019-02-27 20:22:18', NULL),
(76, 11, 'admin.clock', 'Clock In', 0, 'Clock In', '2019-03-02 22:49:50', '2019-03-02 22:49:50', '2019-03-02 22:49:50'),
(77, 17, 'orders.index', 'Orders', 0, 'Index Orders', '2019-04-26 10:51:45', '2019-04-26 10:51:45', NULL),
(78, 17, 'orders.create', 'Orders', 0, 'Create Orders', '2019-04-26 10:51:45', '2019-04-26 10:51:45', NULL),
(79, 17, 'orders.show', 'Orders', 0, 'Show Orders', '2019-04-26 10:51:45', '2019-04-26 10:51:45', NULL),
(80, 17, 'orders.edit', 'Orders', 0, 'Edit Orders', '2019-04-26 10:51:45', '2019-04-26 10:51:45', NULL),
(81, 17, 'orders.destroy', 'Orders', 0, 'Destroy Orders', '2019-04-26 10:51:45', '2019-04-26 10:51:45', NULL),
(88, 20, 'quickorders.index', 'Quickorders', 0, 'Index Quickorders', '2019-04-28 07:11:50', '2019-04-28 07:11:50', NULL),
(89, 20, 'quickorders.create', 'Quickorders', 0, 'Create Quickorders', '2019-04-28 07:11:50', '2019-04-28 07:11:50', NULL),
(90, 20, 'quickorders.show', 'Quickorders', 0, 'Show Quickorders', '2019-04-28 07:11:50', '2019-04-28 07:11:50', NULL),
(91, 20, 'quickorders.edit', 'Quickorders', 0, 'Edit Quickorders', '2019-04-28 07:11:50', '2019-04-28 07:11:50', NULL),
(92, 20, 'quickorders.destroy', 'Quickorders', 0, 'Destroy Quickorders', '2019-04-28 07:11:50', '2019-04-28 07:11:50', NULL),
(93, 21, 'quickorderitems.index', 'Quickorderitems', 0, 'Index Quickorderitems', '2019-04-28 07:13:21', '2019-04-28 07:13:21', NULL),
(94, 21, 'quickorderitems.create', 'Quickorderitems', 0, 'Create Quickorderitems', '2019-04-28 07:13:21', '2019-04-28 07:13:21', NULL),
(95, 21, 'quickorderitems.show', 'Quickorderitems', 0, 'Show Quickorderitems', '2019-04-28 07:13:21', '2019-04-28 07:13:21', NULL),
(96, 21, 'quickorderitems.edit', 'Quickorderitems', 0, 'Edit Quickorderitems', '2019-04-28 07:13:21', '2019-04-28 07:13:21', NULL),
(97, 21, 'quickorderitems.destroy', 'Quickorderitems', 0, 'Destroy Quickorderitems', '2019-04-28 07:13:21', '2019-04-28 07:13:21', NULL),
(98, 22, 'facilitators.index', 'Facilitators', 0, 'Index Facilitators', '2019-05-22 06:33:40', '2019-05-22 06:33:40', NULL),
(99, 22, 'facilitators.create', 'Facilitators', 0, 'Create Facilitators', '2019-05-22 06:33:40', '2019-05-22 06:33:40', NULL),
(100, 22, 'facilitators.show', 'Facilitators', 0, 'Show Facilitators', '2019-05-22 06:33:40', '2019-05-22 06:33:40', NULL),
(101, 22, 'facilitators.edit', 'Facilitators', 0, 'Edit Facilitators', '2019-05-22 06:33:40', '2019-05-22 06:33:40', NULL),
(102, 22, 'facilitators.destroy', 'Facilitators', 0, 'Destroy Facilitators', '2019-05-22 06:33:40', '2019-05-22 06:33:40', NULL),
(103, 23, 'facilitator-tracks.index', 'Facilitator Tracks', 0, 'Index Facilitator Tracks', '2019-05-22 06:36:00', '2019-05-22 06:36:00', NULL),
(104, 23, 'facilitator-tracks.create', 'Facilitator Tracks', 0, 'Create Facilitator Tracks', '2019-05-22 06:36:00', '2019-05-22 06:36:00', NULL),
(105, 23, 'facilitator-tracks.show', 'Facilitator Tracks', 0, 'Show Facilitator Tracks', '2019-05-22 06:36:00', '2019-05-22 06:36:00', NULL),
(106, 23, 'facilitator-tracks.edit', 'Facilitator Tracks', 0, 'Edit Facilitator Tracks', '2019-05-22 06:36:00', '2019-05-22 06:36:00', NULL),
(107, 23, 'facilitator-tracks.destroy', 'Facilitator Tracks', 0, 'Destroy Facilitator Tracks', '2019-05-22 06:36:00', '2019-05-22 06:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(15, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(38, 2),
(40, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(65, 4),
(66, 4),
(67, 4),
(68, 4),
(69, 4),
(1, 5),
(2, 5),
(5, 5),
(30, 5),
(35, 5),
(40, 5),
(55, 5),
(58, 5),
(60, 5),
(67, 5),
(70, 5),
(73, 5),
(1, 8),
(2, 8),
(88, 8),
(89, 8),
(90, 8),
(91, 8),
(92, 8),
(93, 8),
(94, 8),
(95, 8),
(96, 8),
(97, 8),
(98, 8),
(99, 8),
(100, 8),
(101, 8),
(102, 8);

-- --------------------------------------------------------

--
-- Table structure for table `quick_order`
--

CREATE TABLE `quick_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `destination_current_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_other_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totals` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_amount` decimal(8,2) NOT NULL,
  `shipping_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total_item_count` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dev_id` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_saved` tinyint(1) NOT NULL,
  `ship_start` time DEFAULT NULL,
  `ship_end` time DEFAULT NULL,
  `pickup_longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_order`
--

INSERT INTO `quick_order` (`id`, `user_id`, `destination_current_address`, `destination_other_address`, `totals`, `longitude`, `latitude`, `customer_username`, `customer_email`, `shipping_amount`, `shipping_description`, `grand_total`, `subtotal`, `total_item_count`, `status`, `dev_id`, `category`, `image`, `signature_image`, `is_saved`, `ship_start`, `ship_end`, `pickup_longitude`, `pickup_latitude`, `accept`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 32, 'latitude', 'latitude', NULL, '', '', '', '', '0.00', '', '0.00', '0.00', 0, '', 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-05-15 02:49:01', '2019-05-15 02:58:33', '2019-05-15 02:58:33'),
(9, 32, 'latitude', 'latitude', '120', '', '', '', '', '0.00', '', '0.00', '0.00', 0, '', 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-05-15 02:57:35', '2019-05-15 03:09:29', '2019-05-15 03:09:29'),
(10, 34, 'MALIR HAT', 'malir halt', '2100', '1234567', '234567', 'junaid', 'junaid@aalogics.com', '20.00', 'hello world', '2100.00', '2100.00', 2, '40', 45, NULL, '/tmp/phpX4pSvT', 'http://quickdeliveryslu.com/storage/app/Signatureimage/fOo6Yphb2KBcWs6XtLOIu0NtFXiv4kXNC0NSjw5F.jpeg', 0, NULL, NULL, NULL, NULL, 1, 4, '2019-05-15 03:08:37', '2019-07-31 01:19:11', NULL),
(74, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 45, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 3, '2019-07-18 02:06:36', '2019-07-18 02:06:36', NULL),
(73, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:06:14', '2019-07-18 02:06:14', NULL),
(72, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:05:59', '2019-07-18 02:05:59', NULL),
(71, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:05:24', '2019-07-18 02:05:24', NULL),
(70, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:04:49', '2019-07-18 02:04:49', NULL),
(68, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Courier', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:56:21', '2019-07-18 01:56:21', NULL),
(69, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:04:23', '2019-07-18 02:04:23', NULL),
(66, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'C', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:51:28', '2019-07-18 01:51:28', NULL),
(67, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'S', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:54:39', '2019-07-18 01:54:39', NULL),
(65, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:47:00', '2019-07-18 01:47:00', NULL),
(63, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 2, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:43:40', '2019-07-18 01:43:40', NULL),
(64, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 2, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:43:56', '2019-07-18 01:43:56', NULL),
(61, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'D', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:37:34', '2019-07-18 01:37:34', NULL),
(62, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 2, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:42:37', '2019-07-18 01:42:37', NULL),
(60, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Q', '0.00', '0.00', 1, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:35:56', '2019-07-18 01:35:56', NULL),
(58, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', '11', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:29:31', '2019-07-18 01:29:31', NULL),
(59, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'As', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 01:34:55', '2019-07-18 01:34:55', NULL),
(56, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'A', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 03:15:24', '2019-07-17 03:15:24', NULL),
(57, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 03:16:18', '2019-07-17 03:16:18', NULL),
(55, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 03:14:09', '2019-07-17 03:14:09', NULL),
(53, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 03:09:29', '2019-07-17 03:09:29', NULL),
(54, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'A', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 03:13:02', '2019-07-17 03:13:02', NULL),
(51, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'A', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:43:19', '2019-07-17 02:43:19', NULL),
(52, 48, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:43:58', '2019-07-17 02:43:58', NULL),
(50, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:41:56', '2019-07-17 02:41:56', NULL),
(48, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', '0', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:35:51', '2019-07-17 02:35:51', NULL),
(49, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', '0', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:38:10', '2019-07-17 02:38:10', NULL),
(46, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', '0', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:32:49', '2019-07-17 02:32:49', NULL),
(47, 48, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:33:18', '2019-07-17 02:33:18', NULL),
(45, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', '0', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:30:16', '2019-07-17 02:30:16', NULL),
(43, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:25:23', '2019-07-17 02:25:23', NULL),
(44, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', '0', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:26:43', '2019-07-17 02:26:43', NULL),
(41, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aaaa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:23:53', '2019-07-17 02:23:53', NULL),
(42, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Ss', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:24:22', '2019-07-17 02:24:22', NULL),
(40, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Asd', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:22:45', '2019-07-17 02:22:45', NULL),
(38, 48, 'laka', 'skaka', '0', '2212345', '12345677', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:09:01', '2019-07-17 02:09:01', NULL),
(39, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Asd', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-17 02:21:45', '2019-07-17 02:21:45', NULL),
(37, 48, 'laka', 'skaka', '30', '2212345', '12345677', 'shaka', 'junaid@gmail.com', '0.00', '0', '30.00', '30.00', 2, '20', 0, 'shawal', 'http://quickdeliveryslu.com/storage/app/prescriptions/hZRDDffwq4jb4QcYnEhLZckKMA5AsUKotrreJ7aT.jpeg', NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-11 03:23:56', '2019-07-11 03:27:39', NULL),
(75, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:09:16', '2019-07-18 02:09:16', NULL),
(76, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:09:42', '2019-07-18 02:09:42', NULL),
(77, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:09:55', '2019-07-18 02:09:55', NULL),
(78, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'A', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:11:55', '2019-07-18 02:11:55', NULL),
(79, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'A', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:12:22', '2019-07-18 02:12:22', NULL),
(80, 49, 'destination', 'destination', '0', '0', '0', 'Asd', 'aa@aa.aa', '0.00', 'Sass', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:15:05', '2019-07-18 02:15:05', NULL),
(81, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aaaaaaa', '0.00', '0.00', 3, '10', 0, 'Medicines', 'http://quickdeliveryslu.com/storage/app/prescriptions/GC7VcfZgCuTcBqUCdNBO506ECpkTMFMbyzAzT2OA.jpeg', NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:43:24', '2019-07-18 02:43:24', NULL),
(82, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aaaaaaa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:45:45', '2019-07-18 02:45:45', NULL),
(83, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aaaaaaa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:46:40', '2019-07-18 02:46:40', NULL),
(84, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aaaaaaa', '0.00', '0.00', 1, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:48:03', '2019-07-18 02:48:03', NULL),
(85, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:48:20', '2019-07-18 02:48:20', NULL),
(86, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:48:41', '2019-07-18 02:48:41', NULL),
(87, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:50:14', '2019-07-18 02:50:14', NULL),
(88, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:50:29', '2019-07-18 02:50:29', NULL),
(89, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Aa', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:53:32', '2019-07-18 02:53:32', NULL),
(90, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:54:31', '2019-07-18 02:54:31', NULL),
(91, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:55:27', '2019-07-18 02:55:27', NULL),
(92, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:55:50', '2019-07-18 02:55:50', NULL),
(93, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:56:52', '2019-07-18 02:56:52', NULL),
(94, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:57:14', '2019-07-18 02:57:14', NULL),
(95, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:58:34', '2019-07-18 02:58:34', NULL),
(96, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 02:58:49', '2019-07-18 02:58:49', NULL),
(97, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:00:11', '2019-07-18 03:00:11', NULL),
(98, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:00:50', '2019-07-18 03:00:50', NULL),
(99, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:01:41', '2019-07-18 03:01:41', NULL),
(100, 49, 'laka', 'skaka', '0', '0.0', '0.0', 'shaka', 'junaid@gmail.com', '0.00', 'asd', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:01:58', '2019-07-18 03:01:58', NULL),
(101, 49, 'destination', 'destination', '0', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Iji', '0.00', '0.00', 3, '10', 0, 'Meals', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:02:47', '2019-07-18 03:02:47', NULL),
(102, 49, 'destination', 'destination', '124', '0.0', '0.0', 'Asd', 'aa@aa.aa', '0.00', 'Hi', '124.00', '124.00', 3, '10', 0, 'Medicines', 'http://quickdeliveryslu.com/storage/app/prescriptions/pEGmtjGJTlx0tWnqTNggaDb5lnuNJm57dxyFhY7J.jpeg', NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 03:03:16', '2019-08-03 02:26:57', NULL),
(103, 48, 'laka', 'skaka', '0', '2212345', '12345677', 'shaka', 'junaid@gmail.com', '0.00', '0', '0.00', '0.00', 2, '10', 0, 'shawal', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-18 04:42:12', '2019-07-18 04:42:12', NULL),
(104, 54, 'string', 'string', '100', 'test', 'test', 'test', 'test', '12.00', 'test', '0.00', '0.00', 4, '10', 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, '2019-07-23 03:35:58', '2019-07-23 03:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quick_order_items`
--

CREATE TABLE `quick_order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `item_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_options` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_order_items`
--

INSERT INTO `quick_order_items` (`id`, `order_id`, `item`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`, `item_description`, `item_options`, `weight`) VALUES
(11, 10, 'ketchup', 10, '100', '2019-05-17 01:49:38', '2019-05-22 03:48:35', NULL, '', '', '0.00'),
(12, 10, 'checkup', 2, '2000', '2019-05-17 03:31:52', '2019-05-22 03:33:18', NULL, '', '', '0.00'),
(13, 11, 'tomato', 1, NULL, '2019-07-05 03:27:20', '2019-07-05 03:27:20', NULL, '', '', '0.00'),
(14, 11, 'tomato', 1, NULL, '2019-07-05 03:27:20', '2019-07-05 03:27:20', NULL, '', '', '0.00'),
(15, 12, 'tomato', 1, NULL, '2019-07-11 02:36:16', '2019-07-11 02:36:16', NULL, '', '', '0.00'),
(16, 12, 'tomato', 1, NULL, '2019-07-11 02:36:16', '2019-07-11 02:36:16', NULL, '', '', '0.00'),
(17, 13, 'tomato', 1, NULL, '2019-07-11 02:42:11', '2019-07-11 02:42:11', NULL, '', '', '0.00'),
(18, 13, 'tomato', 1, NULL, '2019-07-11 02:42:11', '2019-07-11 02:42:11', NULL, '', '', '0.00'),
(42, 52, 'squatch', 2, NULL, '2019-07-17 02:43:58', '2019-07-17 02:43:58', NULL, '', '', '0.00'),
(41, 47, 'ketchup', 1, NULL, '2019-07-17 02:33:18', '2019-07-17 02:33:18', NULL, '', '', '0.00'),
(40, 47, 'squatch', 2, NULL, '2019-07-17 02:33:18', '2019-07-17 02:33:18', NULL, '', '', '0.00'),
(39, 38, 'ketchup', 1, NULL, '2019-07-17 02:09:01', '2019-07-17 02:09:01', NULL, '', '', '0.00'),
(38, 38, 'squatch', 2, NULL, '2019-07-17 02:09:01', '2019-07-17 02:09:01', NULL, '', '', '0.00'),
(37, 37, 'ketchup', 1, '10', '2019-07-11 03:23:56', '2019-07-11 03:27:13', NULL, '', '', '0.00'),
(36, 37, 'squatch', 2, '20', '2019-07-11 03:23:56', '2019-07-11 03:27:13', NULL, '', '', '0.00'),
(33, 35, 'squatch', 2, NULL, '2019-07-11 03:15:50', '2019-07-11 03:15:50', NULL, '', '', '0.00'),
(34, 36, 'squatch', 2, NULL, '2019-07-11 03:16:24', '2019-07-11 03:16:24', NULL, '', '', '0.00'),
(35, 36, 'ketchup', 1, NULL, '2019-07-11 03:16:24', '2019-07-11 03:16:24', NULL, '', '', '0.00'),
(43, 52, 'ketchup', 1, NULL, '2019-07-17 02:43:58', '2019-07-17 02:43:58', NULL, '', '', '0.00'),
(44, 53, 'squatch', 2, NULL, '2019-07-17 03:09:29', '2019-07-17 03:09:29', NULL, '', '', '0.00'),
(45, 53, 'ketchup', 1, NULL, '2019-07-17 03:09:29', '2019-07-17 03:09:29', NULL, '', '', '0.00'),
(46, 61, '1', 2, NULL, '2019-07-18 01:37:34', '2019-07-18 01:37:34', NULL, '', '', '0.00'),
(47, 61, '1', 2, NULL, '2019-07-18 01:37:34', '2019-07-18 01:37:34', NULL, '', '', '0.00'),
(48, 62, 'q', 0, NULL, '2019-07-18 01:42:37', '2019-07-18 01:42:37', NULL, '', '', '0.00'),
(49, 63, 'q', 0, NULL, '2019-07-18 01:43:40', '2019-07-18 01:43:40', NULL, '', '', '0.00'),
(50, 64, 'q', 0, NULL, '2019-07-18 01:43:56', '2019-07-18 01:43:56', NULL, '', '', '0.00'),
(51, 65, '1', 2, NULL, '2019-07-18 01:47:00', '2019-07-18 01:47:00', NULL, '', '', '0.00'),
(52, 65, '1', 2, NULL, '2019-07-18 01:47:00', '2019-07-18 01:47:00', NULL, '', '', '0.00'),
(53, 68, 'q', 0, NULL, '2019-07-18 01:56:21', '2019-07-18 01:56:21', NULL, '', '', '0.00'),
(54, 68, '1', 2, NULL, '2019-07-18 01:56:21', '2019-07-18 01:56:21', NULL, '', '', '0.00'),
(55, 79, 'a', 1, NULL, '2019-07-18 02:12:22', '2019-07-18 02:12:22', NULL, '', '', '0.00'),
(56, 79, 'a', 1, NULL, '2019-07-18 02:12:22', '2019-07-18 02:12:22', NULL, '', '', '0.00'),
(57, 79, 'a', 1, NULL, '2019-07-18 02:12:22', '2019-07-18 02:12:22', NULL, '', '', '0.00'),
(58, 80, 'qwerqwe', 1, NULL, '2019-07-18 02:15:05', '2019-07-18 02:15:05', NULL, '', '', '0.00'),
(59, 80, 'sasa', 1, NULL, '2019-07-18 02:15:05', '2019-07-18 02:15:05', NULL, '', '', '0.00'),
(60, 80, 'sas', 1, NULL, '2019-07-18 02:15:05', '2019-07-18 02:15:05', NULL, '', '', '0.00'),
(61, 81, '[', 0, NULL, '2019-07-18 02:43:24', '2019-07-18 02:43:24', NULL, '', '', '0.00'),
(62, 81, '[', 0, NULL, '2019-07-18 02:43:24', '2019-07-18 02:43:24', NULL, '', '', '0.00'),
(63, 81, '[', 0, NULL, '2019-07-18 02:43:24', '2019-07-18 02:43:24', NULL, '', '', '0.00'),
(64, 82, '[', 0, NULL, '2019-07-18 02:45:45', '2019-07-18 02:45:45', NULL, '', '', '0.00'),
(65, 82, '[', 0, NULL, '2019-07-18 02:45:45', '2019-07-18 02:45:45', NULL, '', '', '0.00'),
(66, 82, '[', 0, NULL, '2019-07-18 02:45:45', '2019-07-18 02:45:45', NULL, '', '', '0.00'),
(67, 83, '[', 0, NULL, '2019-07-18 02:46:40', '2019-07-18 02:46:40', NULL, '', '', '0.00'),
(68, 83, '[', 0, NULL, '2019-07-18 02:46:40', '2019-07-18 02:46:40', NULL, '', '', '0.00'),
(69, 83, '[', 0, NULL, '2019-07-18 02:46:40', '2019-07-18 02:46:40', NULL, '', '', '0.00'),
(70, 84, '[', 0, NULL, '2019-07-18 02:48:03', '2019-07-18 02:48:03', NULL, '', '', '0.00'),
(71, 100, 'ketchup', 1, NULL, '2019-07-18 03:01:58', '2019-07-18 03:01:58', NULL, '', '', '0.00'),
(72, 100, 'sdfghj', 2, NULL, '2019-07-18 03:01:58', '2019-07-18 03:01:58', NULL, '', '', '0.00'),
(73, 101, 'huouho', 1, NULL, '2019-07-18 03:02:47', '2019-07-18 03:02:47', NULL, '', '', '0.00'),
(74, 101, 'jij', 1, NULL, '2019-07-18 03:02:47', '2019-07-18 03:02:47', NULL, '', '', '0.00'),
(75, 101, 'ijiui', 1, NULL, '2019-07-18 03:02:47', '2019-07-18 03:02:47', NULL, '', '', '0.00'),
(76, 102, 'huouho', 1, '100', '2019-07-18 03:03:16', '2019-08-03 02:26:57', NULL, '', '', '0.00'),
(77, 102, 'jij', 1, '12', '2019-07-18 03:03:16', '2019-08-03 02:26:57', NULL, '', '', '0.00'),
(78, 102, 'ijiui', 1, '12', '2019-07-18 03:03:16', '2019-08-03 02:26:57', NULL, '', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(4) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `tax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `is_protected`, `description`, `tax`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'super-admin', 'Super Admin', 1, 'Super Admin has all permissions', '400', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(2, 'admin', 'Administrators', 1, 'Assign this role to all the users who are administrators.', '130', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(3, 'authenticated', 'Authenticated', 1, 'Authenticated users will be able to access front-end functionality', '230', '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(4, 'Supervisor', 'Supervisor', 0, 'Supervisor', '150', '2019-01-30 15:37:00', '2019-01-30 15:37:00', NULL),
(5, 'Worker', 'Worker', 0, 'Worker', '400', '2019-01-30 16:25:47', '2019-05-15 02:04:21', '2019-05-15 02:04:21'),
(6, 'Sweeper', '123', 0, 'Look busy do Nothing', '120', '2019-03-12 16:22:39', '2019-05-15 02:04:05', '2019-05-15 02:04:05'),
(7, 'delivery_boy', 'Delivery Boy', 0, NULL, NULL, '2019-05-15 02:07:43', '2019-05-15 02:07:43', NULL),
(8, 'dispatcher', 'dispatcher', 1, 'dispatcher', NULL, '2019-05-27 02:07:43', '2019-05-27 02:07:43', NULL),
(9, 'guest', 'Guest User', 0, 'user to create orders', NULL, '2019-08-03 13:46:30', '2019-08-03 13:46:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(12, 3),
(13, 3),
(14, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(10, 4),
(31, 7),
(41, 7),
(42, 7),
(43, 7),
(45, 7),
(53, 7),
(54, 7),
(55, 7),
(44, 8),
(46, 8),
(47, 8),
(56, 9);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `default_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playstore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appstore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_links` text COLLATE utf8mb4_unicode_ci,
  `app_version` double(3,1) NOT NULL,
  `force_update` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `default_language`, `email`, `logo`, `phone`, `latitude`, `longitude`, `playstore`, `appstore`, `social_links`, `app_version`, `force_update`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', NULL, 'public/logo.png', NULL, NULL, NULL, NULL, NULL, NULL, 1.0, '1', '2019-01-23 07:47:37', '2019-07-21 22:37:47', '2019-07-21 22:37:47'),
(2, 'en', 'superadmin@quickdelivery.com', 'public/logo.png', '0900-78601', '25.110026', '55.14551600000004', '_blank', '_blank', NULL, 1.0, '1', '2019-07-21 22:37:47', '2019-07-21 22:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `title`, `address`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Mother Care', NULL, 'Application for user\'s task management', '2019-01-23 07:47:37', '2019-07-21 22:37:47', '2019-07-21 22:37:47'),
(2, 2, 'en', 'Mother Care', NULL, 'Application for user\'s task management', '2019-07-21 22:37:47', '2019-07-21 22:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `task_id` int(11) UNSIGNED NOT NULL,
  `detail` text,
  `priority` tinyint(4) NOT NULL DEFAULT '10' COMMENT '10=Normal, 20=High, 30=Low, 40=Immediate',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `complete_date` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '10' COMMENT '10=Pending, 20=On Hold, 30=In Progress, 40=Complete',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_id`, `detail`, `priority`, `start_date`, `end_date`, `complete_date`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'fla fla task', 30, '2019-03-02 12:03:00', '2019-03-04 12:03:00', '2019-03-04 12:03:00', 2, 40, '2019-02-24 17:13:32', '2019-03-29 16:31:31', NULL),
(2, 2, 'hello world', 20, '2019-03-04 12:03:00', '2019-03-04 12:03:00', '2019-03-04 12:03:00', 1, 30, '2019-02-24 17:29:28', '2019-02-24 17:29:28', NULL),
(3, 2, 'hello world', 10, '2019-03-04 12:03:00', '2019-03-05 12:03:00', '2019-03-04 12:03:00', 1, 10, '2019-02-24 17:31:12', '2019-02-24 17:31:12', NULL),
(4, 1, 'fla fla fla', 20, '2019-03-10 12:03:00', '2019-03-11 12:03:00', '2019-03-04 12:03:00', 2, 40, '2019-02-24 17:54:35', '2019-03-29 15:21:13', NULL),
(5, 11, 'Kindly complete this task as per discussion.', 10, '2019-03-06 12:03:00', '2019-03-14 12:03:00', '2019-03-04 12:03:00', 2, 10, '2019-03-06 15:36:49', '2019-03-06 15:36:49', NULL),
(6, 4, 'hello edge kindly complete this task', 10, '2019-03-15 12:03:00', '2019-03-15 12:03:00', '2019-03-04 12:03:00', 2, 40, '2019-03-15 15:57:38', '2019-03-29 15:26:19', NULL),
(7, 3, 'bohat acha hai 1', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 2, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL),
(8, 3, 'bohat acha hai 2', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 1, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL),
(9, 3, 'bohat acha hai 3', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 1, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL),
(10, 3, 'bohat acha hai 4', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 1, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL),
(11, 3, 'bohat acha hai 5', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 1, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL),
(12, 3, 'bohat acha hai 6', 10, '2019-03-02 12:03:00', '2019-05-02 12:05:00', NULL, 1, 10, '2019-04-18 16:24:31', '2019-04-18 16:24:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_task_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `roles` varchar(100) DEFAULT NULL,
  `earn_point` varchar(100) DEFAULT NULL,
  `cash_value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_categories`
--

INSERT INTO `task_categories` (`id`, `parent_task_id`, `title`, `roles`, `earn_point`, `cash_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Till(Cashier)/(Registering of customers)', NULL, '15', NULL, '2019-02-24 08:40:38', '2019-02-24 08:40:38', NULL),
(2, 2, 'Customer Interraction website/facebook', NULL, NULL, NULL, '2019-02-24 10:19:56', '2019-03-06 15:26:56', NULL),
(3, 1, 'Order Processing/Delivery(packaging)', NULL, '21', NULL, '2019-03-06 15:29:24', '2019-03-06 15:29:24', NULL),
(4, 1, 'Customer Interraction calls/Whatsapp(sales)', NULL, '41', NULL, '2019-03-06 15:29:44', '2019-03-06 15:29:44', NULL),
(5, 1, 'Customer Interraction in store(sale)', NULL, '41', NULL, '2019-03-06 15:30:20', '2019-03-06 15:30:20', NULL),
(6, 1, 'Customer Interraction website/facebook(sales)', NULL, '15', NULL, '2019-03-06 15:30:35', '2019-03-06 15:30:35', NULL),
(7, 1, 'Customer conflict  good resolution', NULL, '150', NULL, '2019-03-06 15:30:50', '2019-03-06 15:30:50', NULL),
(8, 1, 'Upload to website', NULL, '41', NULL, '2019-03-06 15:31:07', '2019-03-06 15:31:07', NULL),
(9, 1, 'Upload to media(facebook,instagram,etc', NULL, '35', NULL, '2019-03-06 15:31:22', '2019-03-06 15:31:22', NULL),
(10, 1, 'Inventory Reconcilation', NULL, '15', NULL, '2019-03-06 15:32:14', '2019-03-06 15:32:14', NULL),
(11, 1, 'Receiving new items', NULL, '15', NULL, '2019-03-06 15:32:28', '2019-03-06 15:32:28', NULL),
(12, 1, 'Sourcing', NULL, '250', NULL, '2019-03-06 15:32:48', '2019-03-06 15:32:48', NULL),
(13, 2, 'Merchandising(Arrange stock,take out items without tags to be taged)', NULL, NULL, NULL, '2019-03-06 15:33:06', '2019-03-06 15:33:32', NULL),
(14, 2, 'Bad Customer Service', NULL, '', NULL, '2019-03-06 15:33:45', '2019-03-06 15:33:45', NULL),
(15, 2, 'Refill of stock', NULL, '', NULL, '2019-03-06 15:34:36', '2019-03-06 15:34:36', NULL),
(16, 2, 'Open(plan todays activities)', NULL, '', NULL, '2019-03-06 15:34:46', '2019-03-06 15:34:46', NULL),
(17, 2, 'Close(Submit all report for the day)', NULL, '', NULL, '2019-03-06 15:34:57', '2019-03-06 15:34:57', NULL),
(18, 2, 'Cash Imbalance at register-Amount', NULL, '', NULL, '2019-03-06 15:35:09', '2019-03-06 15:35:09', NULL),
(19, 2, 'Clean(Washroom,Floors, and glasses)', NULL, '', NULL, '2019-03-06 15:35:20', '2019-03-06 15:35:20', NULL),
(20, 2, 'Stuff causing Damages-Amount', NULL, '', NULL, '2019-03-06 15:35:32', '2019-03-06 15:35:32', NULL),
(21, 2, 'Wrong information to Customers/packaging', NULL, '', NULL, '2019-03-06 15:35:47', '2019-03-06 15:35:47', NULL),
(22, 2, 'Stock Room tidying', NULL, '', NULL, '2019-03-06 15:35:58', '2019-03-06 15:35:58', NULL),
(23, 2, 'test category', '5', '123', '', '2019-03-15 15:55:54', '2019-03-15 15:56:29', '2019-03-14 20:56:29'),
(24, 1, 'Cleaning Lobby', '2', '1', '0.02', '2019-03-17 21:20:44', '2019-03-17 21:20:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `task_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `carried_out` tinyint(2) NOT NULL DEFAULT '10' COMMENT '10=Yes,20=No',
  `quantity` int(11) DEFAULT '1',
  `rating` varchar(20) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_comments`
--

INSERT INTO `task_comments` (`id`, `task_id`, `user_id`, `carried_out`, `quantity`, `rating`, `comment`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 4, 8, 10, 3, NULL, 'hello world', 0, '2019-03-04 09:18:13', '2019-02-27 16:25:30', '2019-02-26 21:25:30'),
(12, 4, 8, 10, 2, '4', 'i done my job', 1, '2019-03-11 22:16:37', '2019-03-11 17:16:37', NULL),
(13, 6, 8, 10, 2, NULL, 'I complete my work', 0, '2019-03-29 15:26:18', '2019-03-29 15:26:18', NULL),
(14, 1, 11, 10, 1, '3', 'i complete it', 1, '2019-03-29 09:32:41', '2019-03-29 16:32:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `task_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) UNSIGNED NOT NULL DEFAULT '10' COMMENT '10=Pending, 20=On Hold, 30=In Progress, 40=Complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`user_id`, `task_id`, `status`) VALUES
(11, 1, 10),
(8, 4, 10),
(11, 4, 10),
(8, 3, 10),
(11, 2, 10),
(8, 5, 10),
(8, 1, 10),
(8, 6, 10),
(8, 7, 10),
(11, 7, 10),
(8, 8, 10),
(11, 8, 10),
(8, 9, 10),
(11, 9, 10),
(8, 10, 10),
(11, 10, 10),
(8, 11, 10),
(11, 11, 10),
(8, 12, 10),
(11, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `protect` tinyint(2) NOT NULL DEFAULT '0',
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `protect`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'superadmin@mothercare.com', '$2y$12$0ph.ymDAK30FPwz/GucUD.bdK35mg3df0.glYsYzXxJesYVZ.qxpG', 'c0QEKv0QG6ApxOqo2ycAjRNiR9EGggeNiGfBVOmrnrN68kALY9mSd0A5OEnj', 1, NULL, NULL, '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(2, 'Admin', 'admin@mothercare.com', '$2y$12$0ph.ymDAK30FPwz/GucUD.bdK35mg3df0.glYsYzXxJesYVZ.qxpG', 'lwc9V5yGfiGsThWTLVaqZIXrjXepXZj9waOuxzZMmgmZx04DlrYpokG0N37l', 1, NULL, NULL, '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL),
(8, 'John Cena', 'john@yopmail.com', '$2y$10$8y1k91BCzFbnFIUFebmUH.JQd7/EL90h9B.5f7y3HIVPqp6ru/7NK', 'Dx3KixBmSqXMXynesOoVKKtTzI4peJKr6gPA4hn4pRbWlf36issvNQOF6Pi9', 0, NULL, NULL, '2019-01-30 17:12:52', '2019-05-15 02:04:21', '2019-05-15 02:04:21'),
(9, 'Triple H', 'triple@gmail.com', '$2y$10$BGBcuhgi7FFHQ5kUwNkdfu6ofuE8dezV/rg2aabioyyIC.ND40eSW', NULL, 0, NULL, NULL, '2019-01-30 18:06:52', '2019-02-01 07:40:42', '2019-02-01 07:40:42'),
(10, 'Flafla Flafla', 'supervisor@yopmail.com', '$2y$10$ig6vC6HVFMeDe6FGqmCHCerKkaGdWpELxEg5Cu09Adyw/8ZxpdtDG', 'LUCGYB9yR8V59e7yJu9Wm8H0xRfjquT7kWRoLt4W5VmMGI4sMMnri2aUdIX0', 0, NULL, NULL, '2019-01-30 18:08:49', '2019-01-30 18:08:49', NULL),
(11, 'Edge Worker', 'edge@yopmail.com', '$2y$10$EjXe0r1LMBqrYGpnFcBbAOzpvKFFdnDazPDdmJ0IgwYEDoP/sT9Ym', NULL, 0, NULL, NULL, '2019-02-03 10:09:20', '2019-05-15 02:04:21', '2019-05-15 02:04:21'),
(12, 'Junaid Quadri', 'junaid@aalogics.com', '$2y$10$.kfwUUGCGnj/670iEJ0P6ekTeR1JWnAjwMwZs9uZWhs1AlyZbIdD.', NULL, 0, NULL, NULL, '2019-04-09 13:26:18', '2019-04-09 13:26:18', NULL),
(13, 'Hassan Quadri', 'hassan@gmail.com', '$2y$10$Tjzo6y.HoY9kwd1i0mCh2OhpIkOJmf1Pb0kjN/.qZRsSlJzc0wfAO', NULL, 0, NULL, NULL, '2019-04-18 15:20:37', '2019-04-18 15:20:37', NULL),
(14, 'Junaid Quadri', 'junaid.quadri1@aalogics.com', '$2y$10$XNU.QnOuCuzBpfMc84Lzgea86wp7NMCk9ydDgcVwflZjrf78avTWu', NULL, 0, NULL, NULL, '2019-04-18 15:33:47', '2019-04-18 15:33:47', NULL),
(27, 'junaid', 'junaid@gmail.com', '$2y$10$wRPZ1PfyQOZHGxpgCX6sxO4YSnKI2dsOiRq8V3e.tHHMN2DENAicC', NULL, 0, NULL, NULL, '2019-04-18 17:18:14', '2019-04-18 17:18:14', NULL),
(28, 'junaid', 'junaid@hotmail.com', '$2y$10$URL2gBS3Ln1vf1bv/KXRl.5dMbsg3KzVoH2oZwLfkSg1DFKoE4z3G', NULL, 0, NULL, NULL, '2019-04-18 17:18:14', '2019-04-18 17:18:14', NULL),
(29, 'Hassan Shah', 'hassanshah@gmail.com', '$2y$10$O4YI35TkunpgEDQGU4D7A.ZM1KLxEgLROHzPqXAB4yJofHmnm3n1O', NULL, 0, NULL, NULL, '2019-04-24 14:48:03', '2019-04-24 14:48:03', NULL),
(30, 'Junaid Quadri', 'junaid.quadri@gmail.com', '$2y$10$lvmunBUKQqZNaosaKO6I6O1N0D6G2/LaExflUzXOWZLMnf5JHxpSu', NULL, 0, NULL, NULL, '2019-04-28 15:18:28', '2019-04-28 15:18:28', NULL),
(31, 'Usman Rehan', 'usman@gmail.com', '$2y$10$8THthosicKp3CWC1KuG17uE00tuIERBWGB964c79MuhHvNm4cX9MK', NULL, 0, NULL, NULL, '2019-04-29 14:24:00', '2019-04-29 14:24:00', NULL),
(32, 'Usman Rehan', 'usman1@gmail.com', '$2y$10$zk.pBdrpZfeHBT6miRghK.YQsaxKUZBQxOJjrAzDYnW.Ob6ml66q.', NULL, 0, NULL, NULL, '2019-04-29 14:25:23', '2019-04-29 14:25:23', NULL),
(33, 'Junaid Quadri', 'jun@gmail.com', '$2y$10$wV4tzL4q5CkjMKGbB7LzQeJLf1.BXKhgeCUHtb4T221ZVxUa6AKXm', NULL, 0, NULL, NULL, '2019-05-19 02:45:48', '2019-05-19 02:45:48', NULL),
(34, 'Junaid Quadri padri', 'junai@gmail.com', '$2y$10$gaou6rElUqbTqnHaMhSdQ.IQqtzKEn0.LqM61w0Gs7XNmtFJysYuu', NULL, 0, NULL, NULL, '2019-05-19 02:47:54', '2019-05-19 02:47:54', NULL),
(35, 'shaka', 'junaid1@gmail.com', '$2y$10$KsfZivfaVnrV/WT46sJC7usKyYGssII79THPl4RBismccUcaTUpbG', NULL, 0, NULL, NULL, '2019-05-19 02:48:30', '2019-07-23 04:04:52', NULL),
(36, 'junaid', 'juand@aaloics.com', '$2y$10$9HeQ.v07q9LrTHK52GIPi.Mtt3nUGBp5oheqbgA41kV8..CJ8mpcC', '3ZosyBDTo3dQttLy2mhXVb9fFCk9TlDWDAovxxcVDHPr8k7a6y08WiJyGJA0', 0, NULL, NULL, '2019-05-19 13:02:01', '2019-05-19 13:02:01', NULL),
(37, 'chacha', 'chacha@gmail.com', '$2y$10$g/VSavBE3l04S4gmar9n5uZwCPZZcmFbZ90/AiBsfTv6yIW.rXPcW', 'ZvaDQiJqCPDgvdI3YdHptgXL5wFDCvLDoispaBdR6dCNa7rIGc6wiTtS2mQc', 0, NULL, NULL, '2019-05-23 22:16:41', '2019-05-23 22:16:41', NULL),
(38, 'dsdsa', 'juna@gmail.com', '$2y$10$OgmsK5qCVOb2pBSKjhH7ce/1A.RKrYMZ5xa7bZPhhYv0whQku6JUa', 'ZUVj7FD4SqfpctA4mcepCcuMOuRzvhX6gNGFT6tVwaABMJoPL3hFj36OEG3P', 0, NULL, NULL, '2019-05-23 22:43:34', '2019-05-23 22:43:34', NULL),
(39, 'junaid', 'admin@gm.com', '$2y$10$7v29dD92SvuW7.lQYiOGguAhZG6OH.ae5bimCl671oJNDJ63CrfPy', NULL, 0, NULL, NULL, '2019-05-26 17:07:20', '2019-05-26 17:07:20', NULL),
(40, 'junaid', 'admin@gmail.com', '$2y$10$CSgeyYwQ3ySs9JfrXI8ptekNJ9jTgQeX6N6FkHfe9P1CTzt5Tl/q.', NULL, 0, NULL, NULL, '2019-05-26 17:08:25', '2019-05-26 17:08:25', NULL),
(41, 'junaid', 'admin@gmal.com', '$2y$10$0MxM47RRW9JRQk4kk/xeCeqEFemexjjw0LOCWHjoRPWJvjOYYHbfG', NULL, 0, NULL, NULL, '2019-05-26 17:10:06', '2019-05-26 17:10:06', NULL),
(42, 'junaid', 'admina@gm.com', '$2y$10$wwssS3HCJs.xEm/d2LGVlug4QLxvlTWPm/nf/OxPmB860TSm6R9AS', NULL, 0, NULL, NULL, '2019-05-26 17:11:55', '2019-07-23 02:38:54', NULL),
(43, 'junaid', 'admin11@gm.com', '$2y$10$334no.g.XlRXR4GfMZNYl.kPnJvqU.ExQ7EMpOS67URjskoahRky6', '2Q5CcIlYkIYvri5cq9tSqHBVQvEX7m6ZjkgTPSWHyXsCdU0JCyFya2sLrkeZ', 0, NULL, NULL, '2019-05-26 17:12:29', '2019-05-26 17:12:29', NULL),
(44, 'junaid', 'adminshah@gm.com', '$2y$10$HZItdmsh5WO1jHOYxLcP/.Ewb1ejt/xWEsr3/cnq6CoK7vw2bK6Ly', 'pXOTf1pIizVN8nzkIHSV3U2zaSWVuhfKs5QEYJjE1pPJzwIkzcEYwJpNgPa7', 0, NULL, NULL, '2019-05-26 17:13:10', '2019-05-26 17:13:10', NULL),
(45, 'junaid', 'adminah@gm.com', '$2y$10$/QNIToSixZVCO32o7URb1.zKoZaqASQtyJubLWmXfnbYSedui0aiy', 'xnefsKcDGL4F3LWRW5fj1bStj6iyNI0mAJnp6kQlYcjzI4M6dZKcqAlQc03w', 0, NULL, NULL, '2019-05-26 17:17:50', '2019-08-03 13:08:03', NULL),
(46, 'junaid', 'dispatcher@gm.com', '$2y$10$OZnyL9l4DfIEWuKHOvA8deS8v.11KOVj26Fz/j9blx1Cxqj4xEHV6', 'NCV15HEl1hpzd0nsX0T2WgNZHUQdrvFCmV3WvER4lhq0szI70XRCB9cDDYIt', 0, NULL, NULL, '2019-05-26 17:18:40', '2019-05-26 17:18:40', NULL),
(47, 'junaid', 'admin75@gm.com', '$2y$10$Z8zwNTCVxiXYUrXHLW93zeIY7q53raBVK/hAy/rdLqmvpLP5WcgN.', 'K0m7eHa7KLDTPzcbmwVW6ep4k0PzMQagSSy1GWW1diln79eo5zIFPBuKTk0V', 1, NULL, NULL, '2019-05-26 17:21:07', '2019-05-26 17:21:07', NULL),
(48, 'Hassan Khan', 'hassankhan@gmail.com', '$2y$10$KA9.uBbc22j80eS9rBa1uOUnYE5jlZBX8952kJqesZj0G3HJ0zsKi', NULL, 0, NULL, NULL, '2019-07-05 02:26:39', '2019-07-05 02:26:39', NULL),
(49, 'Name', 'aa@aa.aa', '$2y$10$1GK8XGYNVSR8G32TjSu6xO9qc6zi0PbctA3WBir.iXo9WFabkrPWu', NULL, 0, NULL, NULL, '2019-07-15 00:09:15', '2019-07-27 02:32:32', NULL),
(50, 'Junaid Quadri', 'jun@aalogics.com', '$2y$10$qtolsXBWgHt.ve2UpSj..ugYAvvgusx7.KWXWuUDt2GwwOecYmJ6W', NULL, 0, NULL, NULL, '2019-07-21 22:23:30', '2019-07-21 22:23:30', NULL),
(51, 'Junaid Quadri', 'juni@aalogics.com', '$2y$10$5nPo83/L4Z8uMiXjA6tL7eHJIP7g6R17WEXO6Q//bWgYCCOZZqtiu', NULL, 0, NULL, NULL, '2019-07-21 22:24:34', '2019-07-21 22:24:34', NULL),
(52, 'Ess ', 'qw@er.com', '$2y$10$Gzlq/b7Z8UoEluG4qtL8he6EzsgAoyk9H/JUMc.rS.fwvNfGNwH5G', NULL, 0, NULL, NULL, '2019-07-28 02:06:17', '2019-07-28 02:06:17', NULL),
(53, 'junaid', 'junaid@aalogis.com', '$2y$10$8jYAyZkUrvYEf/WQ5G.EwuhlExW9/8rUJlhvVeBSoPwkihdqb8yy2', 'xey86u5tlxam1BZEFaP1DaupVWinUVKDxaliHyunabnNwcjrsqPa9qDk2eZo', 0, NULL, NULL, '2019-07-29 02:16:46', '2019-07-29 02:16:46', NULL),
(54, 'kakakaka', 'kaka@gmail.com', '$2y$10$5fJfWBgnqTefWjM0X8y04ef5A.n1aPrvbyLsvizjT8uPIuxD13lRC', NULL, 0, NULL, NULL, '2019-07-29 02:22:02', '2019-07-29 02:22:02', NULL),
(55, 'Driver-1', 'usmanrehan124@gmail.com', '$2y$10$e1OWtD.jgYrQVE5ZC/Zcq.I0j4fJOL/OnEI6gH7BvROnb/eROYL3S', NULL, 0, NULL, NULL, '2019-07-31 01:24:01', '2019-07-31 01:24:01', NULL),
(56, 'Guest User', 'noreply@noreply.com', '$2y$10$qfQuj5BgrHYmCj6kyNJo2.4JCBBk90VThnzkFBNceG1MCGfmsUM2.', NULL, 0, NULL, NULL, '2019-08-03 14:36:27', '2019-08-03 14:36:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_company`
--

INSERT INTO `user_company` (`user_id`, `company_id`) VALUES
(8, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0,1',
  `salary` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_updates` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,1',
  `is_social_login` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `address`, `image`, `is_verified`, `salary`, `email_updates`, `is_social_login`, `created_at`, `updated_at`, `deleted_at`, `city`, `postcode`, `country`, `home_longitude`, `home_latitude`, `work_address`, `work_longitude`, `work_latitude`) VALUES
(1, 1, NULL, NULL, NULL, 1, '13000', 1, 0, '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, 1, '12400', 1, 0, '2019-01-23 07:47:36', '2019-01-23 07:47:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 8, '12312312312', '123 street', NULL, 1, '12000', 0, 0, '2019-01-30 17:12:53', '2019-05-15 02:04:20', '2019-05-15 02:04:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 9, '111111111', '23abc street', NULL, 1, '12500', 1, 0, '2019-01-30 18:06:52', '2019-02-01 07:40:42', '2019-02-01 07:40:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 10, '12342134324', '456 street', 'users/kkRoWJlyHySCedfWYeSLHwce17QBrdlxVUytRizW.png', 1, '14000', 1, 0, '2019-01-30 18:08:49', '2019-01-31 13:29:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 11, '2321313123', 'flafal address', NULL, 1, '12000', 1, 0, '2019-02-03 10:09:20', '2019-05-15 02:04:21', '2019-05-15 02:04:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 12, '923412079829', 'malir', NULL, 1, '', 0, 0, '2019-04-09 13:26:18', '2019-04-09 13:26:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 13, '923412079829', 'malir halt', NULL, 1, '', 0, 0, '2019-04-18 15:20:37', '2019-04-18 15:20:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 14, '', '', 'users/TPbFB1cUNScCQIZwy9rris78bBx9xauT7cfBbPbC.jpeg', 1, '', 0, 0, '2019-04-18 15:33:47', '2019-04-18 15:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 27, '9.23E+11', 'sharifabad', NULL, 1, '55000', 0, 0, '2019-04-18 17:18:14', '2019-04-18 17:18:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 28, '9.23E+11', 'sharifabad', NULL, 1, '55000', 0, 0, '2019-04-18 17:18:14', '2019-04-18 17:18:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 29, '123456789', 'abcAddress', 'users/R41NEA6huYZu7CPpLYgBl25ai0wOATR6koHB64H6.jpeg', 1, '', 0, 0, '2019-04-24 14:48:03', '2019-04-24 14:48:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 30, '923412079829', 'c-111, rafael street', NULL, 1, '', 0, 0, '2019-04-28 15:18:28', '2019-04-28 15:18:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 31, '123456789', 'address', NULL, 1, NULL, 1, 0, '2019-04-29 14:24:00', '2019-05-15 02:09:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 32, '123456789', 'address', NULL, 1, '', 0, 0, '2019-04-29 14:25:23', '2019-04-29 14:25:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 33, '923412079829', 'kalaboard', NULL, 1, '', 0, 0, '2019-05-19 02:45:48', '2019-05-19 02:45:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 34, '923412079829', 'kalaboard', NULL, 1, '', 0, 0, '2019-05-19 02:47:54', '2019-05-19 02:47:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 35, '090078601', 'csdcds', 'http://quickdeliveryslu.com/storage/app/users/gZNGXC8a7kiBf3WNnkBrolLwM6ZMief1DH1eoN1u.png', 1, '', 0, 0, '2019-05-19 02:48:30', '2019-07-23 04:12:11', NULL, 'dsdsdsdsds', 'bfsdjf', 'dsfsf', '12nsjaknjka', '12nsjaknjka', 'aaloigcs', '', ''),
(26, 40, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:08:25', '2019-05-26 17:08:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 41, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:10:06', '2019-05-26 17:10:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 42, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:11:55', '2019-07-23 02:38:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 43, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:12:29', '2019-05-26 17:12:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 44, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:13:10', '2019-05-26 17:13:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 45, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:17:50', '2019-08-03 13:08:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 46, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:18:40', '2019-05-26 17:18:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 47, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-05-26 17:21:07', '2019-05-26 17:21:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 48, '923412079829', 'Gulshan Iqbal', NULL, 1, '', 0, 0, '2019-07-05 02:26:39', '2019-07-05 02:26:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 49, '090078601', 'csdcds', 'http://quickdeliveryslu.com/storage/app/users/01A6HhMnPD7Wq3Maw882aa7tGyGeZggyHWzhvtiy.jpeg', 1, NULL, 0, 0, '2019-07-15 00:09:15', '2019-07-27 03:08:13', NULL, 'City', '0909', 'Angola', '0.0', '0.0', 'csdcds', '0.0', '0.0'),
(36, 50, '03412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-07-21 22:23:30', '2019-07-21 22:23:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 51, '03412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-07-21 22:24:34', '2019-07-22 03:17:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 52, '45945454554', 'Gulf Shores, AL, USA', 'users/p44GTF3ti3tA3yE57ohV4H5db38UELfpIRbnDBGJ.jpeg', 1, NULL, 0, 0, '2019-07-28 02:06:17', '2019-07-28 02:06:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 53, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-07-29 02:16:46', '2019-07-29 02:16:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 54, '923412079829', 'malir halt', NULL, 1, NULL, 0, 0, '2019-07-29 02:22:02', '2019-07-29 02:22:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 55, '03042009909', 'Address', NULL, 1, NULL, 0, 0, '2019-07-31 01:24:01', '2019-07-31 01:24:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 56, '00000000000', 'No where', NULL, 1, NULL, 0, 0, '2019-08-03 14:36:27', '2019-08-03 14:36:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_notification` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `user_id`, `device_type`, `device_token`, `push_notification`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 33, 'android', 'abcd123456', 0, '2019-05-19 02:45:48', '2019-05-19 02:45:48', NULL),
(2, 34, 'android', 'abcd123456', 0, '2019-05-19 02:47:54', '2019-05-19 02:47:54', NULL),
(3, 48, 'android', '1234234567890', 0, '2019-07-05 02:26:39', '2019-07-05 02:26:39', NULL),
(4, 49, 'ios', 'No certificates', 0, '2019-07-15 00:09:15', '2019-07-15 00:09:15', NULL),
(5, 50, 'android', 'abcd123456789', 0, '2019-07-21 22:23:30', '2019-07-21 22:23:30', NULL),
(6, 51, 'android', 'abcd123456789', 1, '2019-07-21 22:24:34', '2019-07-22 03:17:50', NULL),
(7, 52, 'android', 'doArZiA9OvM:APA91bGff7yZa8peu8FTANlFRtzy7E05TVRuST-ucDHXh5ybZ5t-VWcjdM41W4DNcw47ZBj6g5-7yyTC2enEcWKTmRX0fSD44ARub-J6vmoko5hDQLjxGIFAzudetiE2UO7ERNTACCzF', 0, '2019-07-28 02:06:17', '2019-07-28 02:06:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_social_accounts`
--

CREATE TABLE `user_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0,1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_queries`
--
ALTER TABLE `admin_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_user_id_fk` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_company_user_id_fk` (`user_id`);

--
-- Indexes for table `facilitator`
--
ALTER TABLE `facilitator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilitator_user_id_foreign` (`user_id`);

--
-- Indexes for table `facilitator_tracks`
--
ALTER TABLE `facilitator_tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilitator_tracks_facilitator_id_foreign` (`facilitator_id`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_module_id_foreign` (`module_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `notification_users`
--
ALTER TABLE `notification_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_users_user_id_foreign` (`user_id`),
  ADD KEY `notification_users_notification_id_foreign` (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_order_id_foreign` (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_translations_page_id_foreign` (`page_id`);

--
-- Indexes for table `parent_tasks`
--
ALTER TABLE `parent_tasks`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `quick_order`
--
ALTER TABLE `quick_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quick_order_user_id_foreign` (`user_id`);

--
-- Indexes for table `quick_order_items`
--
ALTER TABLE `quick_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quick_order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_task_id_fk` (`task_id`);

--
-- Indexes for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_categories_id_fk` (`parent_task_id`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_comments_task_id` (`task_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD KEY `task_user_user_id_fk` (`user_id`),
  ADD KEY `task_user` (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD KEY `user_company_user_id_fk2` (`user_id`),
  ADD KEY `user_company_company_id_fk` (`company_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_devices_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_social_accounts_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_queries`
--
ALTER TABLE `admin_queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facilitator`
--
ALTER TABLE `facilitator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `facilitator_tracks`
--
ALTER TABLE `facilitator_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification_users`
--
ALTER TABLE `notification_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_tasks`
--
ALTER TABLE `parent_tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `quick_order`
--
ALTER TABLE `quick_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `quick_order_items`
--
ALTER TABLE `quick_order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `user_company_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_users`
--
ALTER TABLE `notification_users`
  ADD CONSTRAINT `notification_users_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_task_id_fk` FOREIGN KEY (`task_id`) REFERENCES `task_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD CONSTRAINT `task_categories_id_fk` FOREIGN KEY (`parent_task_id`) REFERENCES `parent_tasks` (`id`);

--
-- Constraints for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD CONSTRAINT `task_comments_task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `task_user` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_company`
--
ALTER TABLE `user_company`
  ADD CONSTRAINT `user_company_company_id_fk` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `user_company_user_id_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD CONSTRAINT `user_devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_social_accounts`
--
ALTER TABLE `user_social_accounts`
  ADD CONSTRAINT `user_social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
