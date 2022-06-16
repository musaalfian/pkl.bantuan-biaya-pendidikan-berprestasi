-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 01:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_disdikbud`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(1, 'islam'),
(2, 'protestan'),
(3, 'katolik'),
(4, 'hindu'),
(5, 'budha'),
(6, 'khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'c9dab193d9aa8b076d3b64e5d6c664b7', '2022-03-01 10:22:46'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'ef62b90cb4835068370eb08022dedc87', '2022-03-02 05:58:03'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '15b59b9e01e401a41d401588175b771d', '2022-03-06 15:57:23'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'fa9252b91003bd98a46e524353922724', '2022-03-07 20:59:47'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '73a66596a6151a58830638532d1cba15', '2022-03-11 09:57:07'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'cbdef004681e4c29faa8725830f613c0', '2022-03-31 09:25:46'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '987671d593ce19d70ce78b560ff55053', '2022-03-31 09:25:57'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '9b565d5b1df88245d5fbc2570cdb2acb', '2022-03-31 11:47:15'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'ec67e96009ef32cb6fe21a2e573737d9', '2022-04-16 21:54:38'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '5877e1eb6022e1963cfaf837c41f9cd5', '2022-05-24 13:30:11'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '1689c2fd47e81042da9f1f6f019202c0', '2022-05-25 09:16:28'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', 'be7a56c7f3f8be8ecb882934396e3f83', '2022-05-26 12:49:36'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'fd39a08afd9fe678f2658b2fd1c3df3b', '2022-05-30 16:14:28'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '28a0e06355633597d6935e145b0b1c6e', '2022-05-30 19:23:25'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'f01101e3361f249bf000c8f2f1a53aa6', '2022-05-30 19:38:25'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', 'cc8515e41cfcb622475fa112eb926e06', '2022-06-02 08:44:13'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '010062407a99918f356ae64d692a81d1', '2022-06-13 22:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'mengelola data peserta'),
(2, 'pendaftar', 'pengguna yang mendaftar beasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 21),
(2, 22),
(2, 23),
(2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-01 10:23:06', 1),
(2, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-02 05:58:06', 1),
(3, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-02 06:35:09', 1),
(4, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-02 10:02:00', 1),
(5, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-02 17:13:01', 1),
(6, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-02 22:37:07', 1),
(7, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-03 10:06:31', 1),
(8, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-03 16:39:48', 1),
(9, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-04 08:43:19', 1),
(10, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-04 10:40:18', 1),
(11, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-04 18:59:49', 1),
(12, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-04 22:28:43', 1),
(13, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-05 09:15:57', 1),
(14, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-05 13:47:41', 1),
(15, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-05 13:47:53', 1),
(16, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-05 13:49:48', 1),
(17, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-05 18:53:08', 1),
(18, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-06 07:54:25', 1),
(19, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-06 15:58:03', 1),
(20, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-06 20:49:33', 1),
(21, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-06 20:59:34', 1),
(22, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-06 20:59:46', 1),
(23, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-07 10:49:39', 1),
(24, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-07 13:46:34', 1),
(25, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-07 17:08:52', 1),
(26, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-07 19:37:45', 1),
(27, '::1', 'tokosundip@gmail.com', 4, '2022-03-07 20:59:52', 1),
(28, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-08 11:24:10', 1),
(29, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-08 14:38:16', 1),
(30, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-08 16:55:20', 1),
(31, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-08 20:28:13', 1),
(32, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-09 06:47:45', 1),
(33, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-09 09:50:18', 1),
(34, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-09 15:59:43', 1),
(35, '::1', 'tokosundip@gmail.com', 4, '2022-03-09 18:47:18', 1),
(36, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-09 18:59:57', 1),
(37, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-09 19:01:44', 1),
(38, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-09 19:16:37', 1),
(39, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-10 08:54:14', 1),
(40, '::1', 'tokosundip@gmail.com', 4, '2022-03-10 11:18:20', 1),
(41, '::1', 'tokosundip@gmail.com', 4, '2022-03-10 14:49:05', 1),
(42, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-10 21:26:52', 1),
(43, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 00:03:58', 1),
(44, '::1', 'tokosundip@gmail.com', 4, '2022-03-11 00:53:01', 1),
(45, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 00:56:14', 1),
(46, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 06:24:04', 1),
(47, '::1', 'Peserta didik', NULL, '2022-03-11 09:57:11', 0),
(48, '::1', 'soalbank7@gmail.com', 6, '2022-03-11 09:57:25', 1),
(49, '::1', 'admin1', NULL, '2022-03-11 09:59:55', 0),
(50, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 10:00:19', 1),
(51, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 10:00:53', 1),
(52, '::1', 'Peserta didik', NULL, '2022-03-11 10:18:45', 0),
(53, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 10:47:18', 1),
(54, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-11 10:47:41', 1),
(55, '::1', 'soalbank7@gmail.com', 6, '2022-03-11 11:09:46', 1),
(56, '::1', 'soalbank7@gmail.com', 6, '2022-03-11 22:30:21', 1),
(57, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-12 02:03:17', 1),
(58, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-12 07:46:54', 1),
(59, '::1', 'rafli', NULL, '2022-03-12 07:53:48', 0),
(60, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-12 07:53:53', 1),
(61, '::1', 'soalbank7@gmail.com', 6, '2022-03-12 08:19:50', 1),
(62, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-12 08:29:17', 1),
(63, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-12 15:14:39', 1),
(64, '::1', 'pendaftar1', NULL, '2022-03-12 15:16:31', 0),
(65, '::1', 'pendaftar1', NULL, '2022-03-12 15:16:49', 0),
(66, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-12 15:17:19', 1),
(67, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-13 19:44:37', 1),
(68, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-14 16:33:54', 1),
(69, '::1', 'pendaftar1', NULL, '2022-03-14 17:49:21', 0),
(70, '::1', 'pendaftar1', NULL, '2022-03-14 17:49:29', 0),
(71, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-14 17:50:00', 1),
(72, '::1', 'pesertadidik', NULL, '2022-03-14 17:51:31', 0),
(73, '::1', 'soalbank7@gmail.com', 6, '2022-03-14 17:51:45', 1),
(74, '::1', 'soalbank7@gmail.com', 6, '2022-03-14 19:23:43', 1),
(75, '::1', 'soalbank7@gmail.com', 6, '2022-03-15 10:58:23', 1),
(76, '::1', 'soalbank7@gmail.com', 6, '2022-03-15 17:09:52', 1),
(77, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-15 17:20:37', 1),
(78, '::1', 'soalbank7@gmail.com', 6, '2022-03-15 22:42:46', 1),
(79, '::1', 'tokosundip@gmail.com', 4, '2022-03-18 07:12:42', 1),
(80, '::1', 'admin1', NULL, '2022-03-18 07:18:26', 0),
(81, '::1', 'admin1', NULL, '2022-03-18 07:18:37', 0),
(82, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-18 07:18:50', 1),
(83, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-18 08:37:53', 1),
(84, '::1', 'tokosundip@gmail.com', 4, '2022-03-18 09:14:44', 1),
(85, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-18 09:52:35', 1),
(86, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-18 12:50:59', 1),
(87, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-18 15:05:10', 1),
(88, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-18 15:05:38', 1),
(89, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-18 15:06:23', 1),
(90, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-18 15:15:51', 1),
(91, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-18 18:42:47', 1),
(92, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-19 08:28:59', 1),
(93, '::1', 'soalbank7@gmail.com', 6, '2022-03-19 10:15:58', 1),
(94, '::1', 'soalbank7@gmail.com', 6, '2022-03-19 17:07:39', 1),
(95, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-19 20:25:03', 1),
(96, '::1', 'soalbank7@gmail.com', 6, '2022-03-19 20:33:31', 1),
(97, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-20 12:21:52', 1),
(98, '::1', 'soalbank7@gmail.com', 6, '2022-03-20 12:29:21', 1),
(99, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-20 13:53:17', 1),
(100, '::1', 'soalbank7@gmail.com', 6, '2022-03-20 14:36:28', 1),
(101, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-20 16:27:29', 1),
(102, '::1', 'ferdianrafli32@gmail.com', 3, '2022-03-20 20:26:29', 1),
(103, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-21 13:24:28', 1),
(104, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-21 14:26:03', 1),
(105, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-22 00:25:09', 1),
(106, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-22 09:01:21', 1),
(107, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-22 18:54:33', 1),
(108, '::1', 'soalbank7@gmail.com', 6, '2022-03-23 19:15:09', 1),
(109, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-24 00:27:01', 1),
(110, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-24 18:58:53', 1),
(111, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-24 19:07:17', 1),
(112, '::1', 'pesertadidik', NULL, '2022-03-24 22:49:29', 0),
(113, '::1', 'soalbank7@gmail.com', 6, '2022-03-24 22:50:08', 1),
(114, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-25 08:18:20', 1),
(115, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-25 09:42:20', 1),
(116, '::1', 'pendaftar1', NULL, '2022-03-25 15:40:27', 0),
(117, '::1', 'pendaftar1', NULL, '2022-03-25 15:40:46', 0),
(118, '::1', 'banksoalbatang@gmail.com', 2, '2022-03-25 15:41:18', 1),
(119, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-31 07:17:40', 1),
(120, '::1', 'admin1', NULL, '2022-03-31 08:44:39', 0),
(121, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-31 08:44:54', 1),
(122, '::1', 'pendaftar1', 8, '2022-03-31 09:25:12', 0),
(123, '::1', 'ferdianrafli32@gmail.com', 8, '2022-03-31 09:26:01', 1),
(124, '::1', 'admin1', NULL, '2022-03-31 10:24:01', 0),
(125, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-31 10:24:09', 1),
(126, '::1', 'ferdianrafli32@gmail.com', 8, '2022-03-31 11:07:57', 1),
(127, '::1', 'sri hadiati', 10, '2022-03-31 11:42:47', 0),
(128, '::1', 'sri hadiati', 10, '2022-03-31 11:44:26', 0),
(129, '::1', 'sri hadiati', 10, '2022-03-31 11:44:50', 0),
(130, '::1', 'sri hadiati', 10, '2022-03-31 11:44:57', 0),
(131, '::1', 'soalbank7@gmail.com', 11, '2022-03-31 11:47:19', 1),
(132, '::1', 'admin1', NULL, '2022-03-31 12:14:40', 0),
(133, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-31 12:14:54', 1),
(134, '::1', 'admin1', NULL, '2022-03-31 14:56:35', 0),
(135, '::1', 'ferdianrafli125@gmail.com', 1, '2022-03-31 14:56:44', 1),
(136, '::1', 'RafliFerdian', NULL, '2022-04-13 21:24:37', 0),
(137, '::1', 'RafliFerdian', NULL, '2022-04-13 21:24:48', 0),
(138, '::1', 'Peserta didik', NULL, '2022-04-13 21:25:50', 0),
(139, '::1', 'Pesertadidik', NULL, '2022-04-13 21:25:56', 0),
(140, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-13 21:26:08', 1),
(141, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-14 09:35:11', 1),
(142, '::1', 'pendaftar2', 9, '2022-04-14 10:49:43', 0),
(143, '::1', 'tokosundip@gmail.com', 4, '2022-04-14 10:49:58', 1),
(144, '::1', 'tokosundip@gmail.com', 4, '2022-04-16 10:53:58', 1),
(145, '::1', 'tokosundip@gmail.com', 4, '2022-04-16 10:54:15', 1),
(146, '::1', 'tokosundip@gmail.com', 4, '2022-04-16 20:40:23', 1),
(147, '::1', 'admin1', NULL, '2022-04-16 20:40:46', 0),
(148, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-16 20:41:01', 1),
(149, '::1', 'pendaftar2', 9, '2022-04-16 21:51:11', 0),
(150, '::1', 'banksoalbatang@gmail.com', 9, '2022-04-16 21:54:58', 1),
(151, '::1', 'banksoalbatang@gmail.com', 9, '2022-04-16 23:23:03', 1),
(152, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-20 14:09:20', 1),
(153, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-20 14:11:40', 1),
(154, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-20 21:38:35', 1),
(155, '::1', 'tokosundip@gmail.com', 4, '2022-04-21 00:18:19', 1),
(156, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-21 14:51:41', 1),
(157, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-21 14:52:40', 1),
(158, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-21 14:57:30', 1),
(159, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-21 20:01:04', 1),
(160, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-21 20:25:41', 1),
(161, '::1', 'admin1', NULL, '2022-04-21 20:31:33', 0),
(162, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-21 20:31:44', 1),
(163, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-21 20:32:15', 1),
(164, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-22 21:19:14', 1),
(165, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-22 22:05:27', 1),
(166, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-28 09:05:40', 1),
(167, '::1', 'admin1', NULL, '2022-04-28 10:00:58', 0),
(168, '::1', 'ferdianrafli125@gmail.com', 1, '2022-04-28 10:01:18', 1),
(169, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-28 11:16:25', 1),
(170, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-29 10:13:16', 1),
(171, '::1', 'pendaftar1', NULL, '2022-04-29 10:18:48', 0),
(172, '::1', 'ferdianrafli32@gmail.com', 8, '2022-04-29 10:20:05', 1),
(173, '::1', 'pendaftar1', NULL, '2022-04-29 10:20:26', 0),
(174, '::1', 'admin1', NULL, '2022-05-07 13:24:26', 0),
(175, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-07 13:28:12', 1),
(176, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-11 10:28:57', 1),
(177, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-12 14:56:53', 1),
(178, '::1', 'admin1', NULL, '2022-05-13 16:58:34', 0),
(179, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-13 16:58:53', 1),
(180, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-13 17:58:42', 1),
(181, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-20 07:36:28', 1),
(182, '::1', 'admin1', NULL, '2022-05-20 07:51:54', 0),
(183, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-20 07:52:22', 1),
(184, '::1', 'pendaftar1', NULL, '2022-05-20 11:00:36', 0),
(185, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-20 11:00:59', 1),
(186, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-20 11:40:40', 1),
(187, '::1', 'admin1', NULL, '2022-05-21 20:50:51', 0),
(188, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-21 20:51:06', 1),
(189, '::1', 'admin1', NULL, '2022-05-21 21:01:22', 0),
(190, '::1', 'admin1', NULL, '2022-05-21 21:01:28', 0),
(191, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-21 21:03:52', 1),
(192, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-21 21:04:15', 1),
(193, '::1', 'admin1', NULL, '2022-05-21 21:59:19', 0),
(194, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-21 22:02:22', 1),
(195, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-22 01:12:04', 1),
(196, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-22 02:35:05', 1),
(197, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-22 02:35:38', 1),
(198, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-22 10:22:05', 1),
(199, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-22 10:22:40', 1),
(200, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-22 10:36:02', 1),
(201, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-22 10:36:35', 1),
(202, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-22 10:39:54', 1),
(203, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-22 10:40:20', 1),
(204, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-23 07:39:19', 1),
(205, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-23 07:40:13', 1),
(206, '::1', 'soalbank7@gmail.com', 15, '2022-05-24 13:31:44', 1),
(207, '::1', 'soalbank7@gmail.com', 15, '2022-05-24 13:35:27', 1),
(208, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-24 13:37:59', 1),
(209, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-24 14:11:54', 1),
(210, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-25 08:17:08', 1),
(211, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-25 08:35:26', 1),
(212, '::1', 'banksoalbatang@gmail.com', 9, '2022-05-25 08:44:34', 1),
(213, '::1', 'pendaftar3', NULL, '2022-05-25 09:13:37', 0),
(214, '::1', 'pendaftar3', NULL, '2022-05-25 09:14:03', 0),
(215, '::1', 'pendaftar4', 12, '2022-05-25 09:14:50', 0),
(216, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-25 09:16:49', 1),
(217, '::1', 'admin1', NULL, '2022-05-25 09:27:37', 0),
(218, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-25 09:28:00', 1),
(219, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-25 12:37:39', 1),
(220, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-26 10:15:55', 1),
(221, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-26 10:28:25', 1),
(222, '::1', 'pendaftar4', NULL, '2022-05-26 10:49:07', 0),
(223, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-26 10:49:36', 1),
(224, '::1', 'pendaftar12', 17, '2022-05-26 12:53:05', 0),
(225, '::1', 'pendaftar3', NULL, '2022-05-26 12:54:39', 0),
(226, '::1', 'pendaftar3', NULL, '2022-05-26 12:54:59', 0),
(227, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-26 12:55:19', 1),
(228, '::1', 'ferdianrafli32@gmail.com', 8, '2022-05-26 13:16:14', 1),
(229, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-26 13:38:26', 1),
(230, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-26 21:24:17', 1),
(231, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-30 07:56:03', 1),
(232, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 08:00:37', 1),
(233, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 11:54:29', 1),
(234, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-30 14:05:56', 1),
(235, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 14:11:31', 1),
(236, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 14:22:48', 1),
(237, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 14:30:39', 1),
(238, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-30 15:01:04', 1),
(239, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 15:16:47', 1),
(240, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-30 15:21:18', 1),
(241, '::1', 'rafliferdian1203@gmail.com', 12, '2022-05-30 15:52:09', 1),
(242, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-30 15:57:39', 1),
(243, '::1', 'pendaftar4', NULL, '2022-05-30 16:13:36', 0),
(244, '::1', 'pendaftar1', 18, '2022-05-30 16:14:22', 0),
(245, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-30 16:14:39', 1),
(246, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-30 19:14:58', 1),
(247, '::1', 'pendaftar2', 19, '2022-05-30 19:20:33', 0),
(248, '::1', 'soalbank7@gmail.com', 19, '2022-05-30 19:23:38', 1),
(249, '::1', 'pendaftar3', NULL, '2022-05-30 19:34:39', 0),
(250, '::1', 'pendaftar3', 20, '2022-05-30 19:34:55', 0),
(251, '::1', 'rafliferdian1203@gmail.com', 20, '2022-05-30 19:38:43', 1),
(252, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-31 07:02:54', 1),
(253, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-31 09:07:38', 1),
(254, '::1', 'soalbank7@gmail.com', 19, '2022-05-31 09:17:03', 1),
(255, '::1', 'rafliferdian1203@gmail.com', 20, '2022-05-31 09:21:13', 1),
(256, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-31 10:00:10', 1),
(257, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-31 12:08:31', 1),
(258, '::1', 'rafliferdian1203@gmail.com', 20, '2022-05-31 14:24:51', 1),
(259, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-31 14:25:28', 1),
(260, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-31 15:25:10', 1),
(261, '::1', 'banksoalbatang@gmail.com', 18, '2022-05-31 15:42:49', 1),
(262, '::1', 'admin1', NULL, '2022-05-31 15:57:05', 0),
(263, '::1', 'ferdianrafli125@gmail.com', 1, '2022-05-31 15:57:24', 1),
(264, '::1', 'admin1', NULL, '2022-06-02 08:26:58', 0),
(265, '::1', 'ferdianrafli125@gmail.com', 1, '2022-06-02 08:27:57', 1),
(266, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-02 08:44:54', 1),
(267, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-02 09:43:09', 1),
(268, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-02 11:34:24', 1),
(269, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-02 14:23:09', 1),
(270, '::1', 'admin1', NULL, '2022-06-02 15:17:40', 0),
(271, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-02 15:17:57', 1),
(272, '::1', '\"\" or \"\"=\"\"', NULL, '2022-06-07 09:11:04', 0),
(273, '::1', 'admin1', NULL, '2022-06-07 09:11:16', 0),
(274, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-07 09:11:29', 1),
(275, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-13 11:34:56', 1),
(276, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-13 11:43:00', 1),
(277, '::1', 'rafliferdian', NULL, '2022-06-13 13:31:32', 0),
(278, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-13 13:31:51', 1),
(279, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-13 13:39:58', 1),
(280, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-13 14:15:51', 1),
(281, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-13 22:20:11', 1),
(282, '::1', 'banksoal', 27, '2022-06-13 22:54:22', 0),
(283, '::1', 'soalbank7@gmail.com', 27, '2022-06-13 22:54:49', 1),
(284, '::1', 'soalbank7@gmail.com', 27, '2022-06-13 23:00:01', 1),
(285, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-13 23:06:22', 1),
(286, '::1', 'soalbank7@gmail.com', 27, '2022-06-14 00:55:24', 1),
(287, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-14 01:45:42', 1),
(288, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-14 02:02:23', 1),
(289, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-14 09:22:11', 1),
(290, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-14 10:02:11', 1),
(291, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-14 12:39:45', 1),
(292, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-14 14:42:15', 1),
(293, '::1', 'pendaftar1', NULL, '2022-06-14 14:47:03', 0),
(294, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-14 14:47:22', 1),
(295, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-14 15:57:49', 1),
(296, '::1', 'pendaftar3', NULL, '2022-06-14 16:09:49', 0),
(297, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-14 16:10:09', 1),
(298, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-14 16:21:31', 1),
(299, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-15 06:04:06', 1),
(300, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-15 06:05:31', 1),
(301, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-15 09:22:48', 1),
(302, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-15 11:22:47', 1),
(303, '::1', 'pendaftar3', NULL, '2022-06-15 11:42:18', 0),
(304, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-15 11:42:30', 1),
(305, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-15 11:52:31', 1),
(306, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-15 12:05:03', 1),
(307, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-15 14:20:30', 1),
(308, '::1', 'ferdianrafli125@gmail.com', 23, '2022-06-15 14:22:03', 1),
(309, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-15 14:22:35', 1),
(310, '::1', 'beasiswabatang@gmail.com', 1, '2022-06-15 17:36:19', 1),
(311, '::1', 'ferdianrafli25@gmail.com', 22, '2022-06-15 17:41:55', 1),
(312, '::1', 'ferdianrafli32@gmail.com', 21, '2022-06-15 17:52:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'soalbank7@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '578da5c5c75e600acabf97bed1dfd391', '2022-06-13 22:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) NOT NULL,
  `kartu_pelajar` varchar(255) DEFAULT NULL,
  `rek_bpd` varchar(255) DEFAULT NULL,
  `raport_smt` varchar(255) DEFAULT NULL,
  `raport_legalisasi` varchar(255) DEFAULT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `sktm` varchar(255) NOT NULL,
  `diterima_pt` varchar(255) DEFAULT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  `akreditasi_pt` varchar(255) DEFAULT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `formulir_pendaftaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `no_induk`, `ktp`, `kk`, `kartu_pelajar`, `rek_bpd`, `raport_smt`, `raport_legalisasi`, `pas_foto`, `sktm`, `diterima_pt`, `proposal`, `akreditasi_pt`, `laporan`, `formulir_pendaftaran`) VALUES
(59, '3324162512000004', '14.BAB I.pdf', 'quality.en.id.pdf', 'formulir-pendaftaran.pdf', NULL, NULL, NULL, 'logo-mysql-26295.png', 'Installing_MPI.pdf', NULL, 'formulir-pendaftaran_2.pdf', 'PEMBAHASAN SOAL UAS KJI 20192020.pdf', NULL, 'formulir-pendaftaran_3.pdf'),
(61, '3324162512000002', 'UPL_10_Acceptance Testing.pdf', 'UPL_09_Bug  Debugging.pdf', 'UPL_11_Pengujian_GUI_dan_Lingkungan_Spesifik.pdf', NULL, 'UPL_12_PDHUPL.pdf', 'UPL_13_Tugas Kelompok.pdf', 'logo-batang.png', 'UPL_14_Tugas Kelompok Lanjut.pdf', NULL, NULL, NULL, NULL, 'formulir-pendaftaran_2.pdf'),
(62, '3324162512000005', '6 Project Cost Management.pdf', 'RPS-AIK21365-Manajemen Proyek PL.pdf', 'Materi 9. Data dan Variabel.pdf', NULL, NULL, NULL, 'Undip.png', 'Print Kartu UAS.pdf', 'UPL_09_Bug  Debugging.pdf', 'UPL_14_Tugas Kelompok Lanjut.pdf', NULL, NULL, 'formulir-pendaftaran_6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `no_induk` varchar(25) NOT NULL,
  `no_induk_pelajar` varchar(25) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `id_kecamatan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jarak_sekolah` int(11) DEFAULT NULL,
  `id_transportasi` int(11) DEFAULT NULL,
  `id_sekolah` varchar(18) DEFAULT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `nama_pt` varchar(100) DEFAULT NULL,
  `akreditasi_pt` varchar(1) DEFAULT NULL,
  `tahun_masuk_pt` year(4) DEFAULT NULL,
  `semester_ke` int(11) DEFAULT NULL,
  `alamat_pt` text DEFAULT NULL,
  `id_status_peserta` int(11) NOT NULL,
  `id_status_pendaftaran` int(11) DEFAULT NULL,
  `id_status_pembayaran` int(11) DEFAULT NULL,
  `id_status_final` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `no_rek` varchar(16) DEFAULT NULL,
  `pernah_menerima_bantuan` varchar(5) NOT NULL,
  `menerima_bantuan_dari` varchar(100) NOT NULL,
  `nama_pemilik_rekening` varchar(50) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`no_induk`, `no_induk_pelajar`, `nama_lengkap`, `jenis_kelamin`, `ttl`, `id_agama`, `anak_ke`, `no_telepon`, `alamat_rumah`, `id_kecamatan`, `jarak_sekolah`, `id_transportasi`, `id_sekolah`, `kelas`, `nama_pt`, `akreditasi_pt`, `tahun_masuk_pt`, `semester_ke`, `alamat_pt`, `id_status_peserta`, `id_status_pendaftaran`, `id_status_pembayaran`, `id_status_final`, `pesan`, `no_rek`, `pernah_menerima_bantuan`, `menerima_bantuan_dari`, `nama_pemilik_rekening`, `nominal`, `created_at`) VALUES
('3324162512000002', '00012671101', 'Peserta didik', 'L', 'kendal', 1, 2, '0895411812445', 'rumah', 'KC12', 12, 3, '20322737', '11', NULL, NULL, NULL, NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 'tidak', '', NULL, NULL, '2022-06-15'),
('3324162512000004', '24060119120042', 'mahasiswa', 'L', 'kendal', 1, NULL, '0895411812445', 'alamat', 'KC13', NULL, NULL, NULL, NULL, 'undip', 'A', 2019, 6, 'semarang', 3, 3, NULL, NULL, '<ul><li>Belajar tanpa henti</li><li>tetap bergerak</li><li>istirahat sesekali saja</li></ul>', NULL, 'ya', 'jarum pentol', NULL, NULL, '2022-06-15'),
('3324162512000005', '0001267111', 'Calon mahasiswa', 'L', 'kendal, 25 desmber 2000', 1, NULL, '0895411812445', 'batang, jawa tengah', 'KC09', NULL, NULL, NULL, NULL, 'Universitas Diponegoro', 'A', 2021, 2, 'Semarang, Jawa tengah', 2, 4, NULL, NULL, NULL, NULL, 'tidak', '', NULL, NULL, '2022-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_pendaftaran`
--

CREATE TABLE `informasi_pendaftaran` (
  `id_informasi_pendaftaran` int(11) NOT NULL,
  `persyaratan` text DEFAULT NULL,
  `jadwal_kegiatan` varchar(50) DEFAULT NULL,
  `jadwal_pelaksanaan` varchar(50) DEFAULT NULL,
  `proses_seleksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_pendaftaran`
--

INSERT INTO `informasi_pendaftaran` (`id_informasi_pendaftaran`, `persyaratan`, `jadwal_kegiatan`, `jadwal_pelaksanaan`, `proses_seleksi`) VALUES
(1, 'Warga Negara Indonesia yang bertempat tinggal dan menjadi penduduk Kabupaten Batang', 'Sosialisasi Program Bantuan.', '2 s.d 31 Juni 2022', 'Proses seleksi administratif dilakukan secara langsung oleh Tim, setelah berkas dinyatakan lengkap memenuhi persyaratan, apabila berkas yang dikirim baik jalur daring atau luring belum lengkap, Tim menyampaikan kepada yang bersangkutan kekurangannya dan diberikan kesempatan untuk melengkapi sampai dengan jadwal pemberkasan teknis.'),
(2, 'Memiliki salah satu atau lebih prestasi', 'Pendaftaran siswa.', '1 s.d 31 Juli 2022', 'Pemeringkatan sesuai kuota diurutkan berdasarkan bobot prestasi yang diambil paling tinggi berdasarkan tabel prestasi.'),
(3, 'Memiliki nilai rata-rata laporan akademik (raport) pada semester terakhir minimal 7.50 (tujuh koma lima nol) serta tidak ada nilai dibawah 7.00 (tujuh koma nol-nol)', 'Seleksi Administrasi.', '2 s.d 31 Juni 2022', 'Apabila calon penerima bantuan memiliki lebih dari satu prestasi, maka hanya diperhitungkan salah satu prestasi yang berbobot paling tinggi.'),
(4, 'Berasal dari keluarga miskin atau tidak mampu secara ekonomi', 'Pemberkasan Teknis.', '2 s.d 14 Arustus 2022', 'Apabila total bobot antara calon penerima memiliki nilai yang sama, maka pemeringkatan calon penerima bantuan diprioritaskan berdasarkan pertimbangan pada kemampuan ekonomi orangtua/wali.'),
(5, 'Berasal dari perguruan tinggi yang terakreditasi', 'Pengumuman Penerima Bantuan.', '31 Agustus 2022', 'Untuk prestasi non akademik mampu menghafal Al Quran, Dinas dapat menguji secara sederhana hafalan Al Quran kepada calon penerima jika diperlukan.'),
(6, 'Sedang menempuh program diploma atau sarjana strata 1', 'Pemberkasan Pencairan Bantuan.', '1 s.d 14 September 2022', 'Penerima bantuan ditetapkan dengan Keputusan Kepala Dinas serta diumumkan sesuai dengan jadwal yang telah ditetapkan melalui Surat Dinas atau laman website Dinas.'),
(7, 'Menyusun proposal bantuan', 'Penyaluran Bantuan.', 'Akhir September 2022', 'Keputusan Kepala Dinas bersifat final dan tidak dapat diganggu gugat.'),
(8, 'Diterima dalam program diploma atau sarjana strata 1 pada perguruan tinggi yang terakreditasi minimal B', 'Monitoring, Evaluasi dan Pelaporan.', 'Oktober 2022', NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informasi_terbaru`
--

CREATE TABLE `informasi_terbaru` (
  `id_informasi_terbaru` int(11) NOT NULL,
  `judul_informasi_terbaru` varchar(255) NOT NULL,
  `deskripsi_informasi_terbaru` text NOT NULL,
  `file_informasi_terbaru` varchar(255) DEFAULT NULL,
  `gambar_informasi_terbaru` varchar(255) DEFAULT NULL,
  `link_informasi_terbaru` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_terbaru`
--

INSERT INTO `informasi_terbaru` (`id_informasi_terbaru`, `judul_informasi_terbaru`, `deskripsi_informasi_terbaru`, `file_informasi_terbaru`, `gambar_informasi_terbaru`, `link_informasi_terbaru`, `created_at`, `updated_at`) VALUES
(1, 'Peraturan Gubernur Bantuan Biaya Pendidikan', 'Peraturan Gubernur Bantuan Biaya Pendidikan', 'Pengumuman Prog Bantuan Biaya Pendidikan 2021.pdf', NULL, NULL, '2022-05-26 11:48:02', '2022-05-26 09:48:02'),
(2, 'Peraturan Bupati Bantuan Biaya Pendidikan', 'Peraturan Bupati Bantuan Biaya Pendidikan', 'Pengumuman Prog Bantuan Biaya Pendidikan 2021.pdf', NULL, NULL, '2022-05-26 11:53:23', '2022-05-26 11:53:23'),
(3, 'Tata cara Bantuan Biaya Pendidikan', 'Tata cara Bantuan Biaya Pendidikan', 'Perbup Tata Cara Pemberian Bantuan Biaya Pendidikan bagi Peserta didik menengah dan mhs yg berprestasi dr keluarga miskin.pdf', NULL, NULL, '2022-05-26 11:53:48', '2022-05-26 11:53:48'),
(4, 'Bantuan Biaya Pendidikan', 'Bantuan Biaya Pendidikan', 'Perbup Tata Cara Pemberian Bantuan Biaya Pendidikan bagi Peserta didik menengah dan mhs yg berprestasi dr keluarga miskin.pdf', NULL, NULL, '2022-05-26 11:54:24', '2022-05-26 11:54:24'),
(8, 'undangan', 'silahkan download undangan', 'Dokumen Pengujian UPL - 11.pdf', 'download.png', NULL, '2022-05-24 14:10:56', '2022-05-15 08:23:18'),
(13, 'penerimaan ', 'penerimaan beasiswa', 'UAS Genap 2020-21 Masyarakat dan Etika Profesi final.pdf', 'Lambang_Kabupaten_Batang.png', NULL, '2022-06-13 11:54:10', '2022-06-13 11:54:10'),
(14, 'Pendaftaran Bantuan Biaya Pendidikan', 'Pendaftaran Bantuan Biaya Pendidikan', '280884-penerapan-sistem-informasi-dalam-sosio-t-cd56f3cf.pdf', NULL, NULL, '2022-06-13 13:51:16', '2022-06-13 13:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('KC01', 'BANDAR'),
('KC02', 'BANYUPUTIH'),
('KC03', 'BATANG'),
('KC04', 'BAWANG'),
('KC05', 'BLADO'),
('KC06', 'GRINGSING'),
('KC07', 'KANDEMAN'),
('KC08', 'LIMPUNG'),
('KC09', 'PECALUNGAN'),
('KC10', 'REBAN'),
('KC11', 'SUBAH'),
('KC12', 'TERSONO'),
('KC13', 'TULIS'),
('KC14', 'WARUNGASEM'),
('KC15', 'WONOTUNGGAL');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `usia_ayah` int(11) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pendidikan_ayah` varchar(10) NOT NULL,
  `penghasilan_ayah` int(11) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `usia_ibu` int(11) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `penghasilan_ibu` int(11) NOT NULL,
  `alamat_ibu` text NOT NULL,
  `rtsm_rtm` varchar(5) NOT NULL,
  `pkh_kks_kbs` varchar(5) NOT NULL,
  `bsm_kip` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `no_induk`, `nama_ayah`, `usia_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `nama_ibu`, `usia_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `rtsm_rtm`, `pkh_kks_kbs`, `bsm_kip`) VALUES
(55, '3324162512000005', 'Suharyanto', 55, 'Programmer', 'S3', 50000000, 'Tawang Kendal', 'Nasriah', 50, 'Ibu rumah tangga', 'S1', 30000000, 'Tawang, Rowosari', 'tidak', 'tidak', 'tidak'),
(56, '3324162512000002', 'Suharyanto', 0, 'Programmer', 'D4', 40000000, 'tawang kendal', 'nasriah', 0, 'ibu rumah tangga', 'D4', 40000000, 'tawang kendal', 'ya', 'ya', 'ya'),
(57, '3324162512000004', 'suhar', 54, 'swasta', 'D3', 30000000, 'rumah', 'nas', 53, 'pedagang', 'D3', 20000000, 'rumah', 'tidak', 'ya', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1646150677, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `kategori` varchar(16) NOT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `juara` varchar(10) DEFAULT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `nama_prestasi` varchar(100) NOT NULL,
  `tahun_prestasi` year(4) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `file_prestasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `kategori`, `tingkat`, `juara`, `nilai`, `nama_prestasi`, `tahun_prestasi`, `no_induk`, `file_prestasi`) VALUES
(126, 'perlombaan', 'nasional', 'juara 3', 80, 'lomba', 2020, '3324162512000004', 'formulir-pendaftaran_2.pdf'),
(127, 'hafidz', NULL, NULL, 200, 'hafidz', 2021, '3324162512000004', 'formulir-pendaftaran.pdf'),
(128, 'KHS', NULL, NULL, 0, 'khs', 2021, '3324162512000004', '280884-penerapan-sistem-informasi-dalam-sosio-t-cd56f3cf.pdf'),
(130, 'perlombaan', 'internasional', 'juara 1', 200, 'UPL', 2022, '3324162512000002', 'UMPL_05_Masalah_Strategis_dan_Pengujian_Unit.pdf'),
(131, 'hafidz', NULL, NULL, 200, 'hafidz quran', 2022, '3324162512000002', 'UMPL_06_Test_Case_Development.pdf'),
(132, 'lainnya', NULL, NULL, 0, 'lainyya', 2022, '3324162512000002', 'UMPL_07_Software_Testing_App.pdf'),
(133, 'perlombaan', 'nasional', 'juara 1', 100, 'Voli pantai', 2022, '3324162512000005', '2 Introduction to Project Management.pdf'),
(134, 'ujian sekolah', NULL, NULL, 0, 'ujian sekolah nasional', 2022, '3324162512000005', '1 Kontrak Kuliah.pdf'),
(135, 'hafidz', NULL, NULL, 200, 'hafidz quran', 2022, '3324162512000005', 'RPS-AIK21365-Manajemen Proyek PL.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` varchar(18) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`) VALUES
('20322709', 'SMK NUSANTARA BATANG', 'Jl. RE Martadinata No. 305 Batang'),
('20322710', 'SMK NU BANDAR', 'Jl. Rambutan Komplek Masjid Besar, Bandar'),
('20322711', 'SMK NEGERI 1 KANDEMAN', 'Jl. Raya Kandeman, Kandeman'),
('20322712', 'SMK MUHAMMADIYAH BAWANG', 'Jl. Raya Sukorejo Bandung, Bawang'),
('20322713', 'SMK BINTARA BATANG', 'Jl. Gajah Mada No. 90 Batang'),
('20322714', 'SMK BHAKTI PRAJA BATANG', 'Jl. Ki Mangunsarkoro No. 45 Batang'),
('20322715', 'SMK PGRI BATANG', 'Jl. Ki Mangunsarkoro No. 25 Batang'),
('20322727', 'SMK NEGERI 1 BATANG', 'Jl. Ki Mangunsarkoro No. 2, Batang'),
('20322728', 'SMK MUHAMMADIYAH BATANG', 'Jl. Jend Sudirman No. 250 Batang'),
('20322729', 'SMA BHAKTI PRAJA BATANG', 'Jl. Ki Mangunsarkoro 10, Batang'),
('20322737', 'SMA BHAKTI PRAJA LIMPUNG', 'Jl. Raya Banyuputih - Limpung, Limpung'),
('20322738', 'SMA ISLAM AHMAD YANI BATANG', 'Jl. Tembus Kramat, Batang'),
('20322739', 'SMA MUHAMMADIYAH TERSONO', 'Jl. Raya Tersono-Limpung, Tersono'),
('20322740', 'SMAN 2 BATANG', 'Jl. Pemuda Rowobelang, Batang'),
('20322741', 'SMAN 1 SUBAH', 'Jl. Raya Jatisari, Subah'),
('20322742', 'SMAN 1 GRINGSING', 'Jl. Karanganyar Lebo, Gringsing'),
('20322743', 'SMAN 1 BAWANG', 'Jl. Jlamprang, Bawang'),
('20322744', 'SMAN 1 BATANG', 'Jl. Ki Mangunsarkoro No. 8, Batang'),
('20322745', 'SMAN 1 BANDAR', 'Jl. Raya Sidayu, Bandar'),
('20322746', 'SMA WAHID HASYIM TERSONO', 'Jl. Lapangan Gedongsari, Tersono'),
('20322747', 'SMA NU AL MUNAWWIR GRINGSING', 'Jl. Raya Lama No 16 Gringsing, Gringsing'),
('20322986', 'MAS THOLABUDDIN WARUNGASEM', 'Jl. Raya Masin No. 5, Warungasem'),
('20322987', 'MAS SUNAN KALIJAGA BAWANG', 'Jl. Sunan Kalijaga No.16, Bawang'),
('20322988', 'MAS NU BANYUPUTIH', 'Jl. Lapangan 9A Banyuputih, Banyuputih'),
('20322989', 'MAS NAHDLATUL ULAMA BATANG', 'Jl. A Yani 114 Kauman, Batang'),
('20322990', 'MAS NU GRINGSING', 'Jl. Plelen Ketanggan Km 2, Gringsing'),
('20322991', 'MAS MUHAMMADIYAH BATANG', 'Jl. Jenderal Sudirman No. 250 Kauman, Batang'),
('20322992', 'MAS MUHAMMADIYAH LIMPUNG', 'Jl. Bawang-Limpung No. 34, Limpung'),
('20322993', 'MAS DARUSSALAM SUBAH', 'Jl. Desa Kemiri, Subah'),
('20322994', 'MAS YIC BANDAR', 'Jl. Raya Wonokerto No. 7, Bandar'),
('20323007', 'MAS SUBHANAH SUBAH', 'Jl. Delima No1 Kaliman, Subah'),
('20337647', 'SMK MA\'ARIF NU 01 LIMPUNG', 'Jl. KH. Wahid Hasyim No. 1, Limpung'),
('20337812', 'MA NEGERI BATANG', 'Jl. Kramalan-Pekalongan, Batang'),
('20337813', 'SMA N 1 WONOTUNGGAL', 'Jl. Siwatu, Wonotunggal'),
('20350670', 'SMK DARUSSALAM SUBAH', 'Jl. Lapangan Selatan Kemiri Barat, Subah'),
('20350703', 'SMK DIPONEGORO BANYUPUTIH', 'Jl. Lapangan Banyuputih 9a, Banyuputih'),
('20353726', 'SMK AL SYA\'IRIYAH LIMPUNG', 'Jl. Raya Limpung - Tersono KM 1,5, Limpung'),
('20362113', 'SMK MA\'ARIF NU NUSAHADA REBAN', 'Jl. Raya Reban Limpung Km. 02 Padomasan, Reban'),
('20362114', 'SMK BARDAN WASALAMAN BATANG', 'Jl. Sambong, Batang'),
('20362115', 'SMK SEKAR BUMI NUSANTARA GRINGSING', 'Jl. Desa Gringsing, Gringsing'),
('20362117', 'SMK BHAKTI KENCANA SUBAH', 'Jl. Desa Kalimanggis, Subah'),
('20362731', 'SMK NEGERI 1 WARUNGASEM', 'Jl. Banjiran-Sawahjoho KM 0,8 Ds. Kalibeluk, Warungasem'),
('20364899', 'SMK MAARIF NU BAWANG', 'Jl. Sunan Bonang No. 57 Ds. Bawang, Bawang'),
('20364900', 'SMK TAMAN KARYA SUBAH', 'Jl. Manggis Desa Subah, Subah'),
('20367305', 'MA TAKHASSUS AL-INAAROH WONOTUNGGAL', 'Jl. Raya Batang-Bandar KM. 09 Ds. Brayo, Wonotunggal'),
('60728097', 'MAS NU 01 LIMPUNG', 'Jl. Kalangsono Km 01 Ds. Babadan, Limpung'),
('69754025', 'SMK EL HUSNA KANDEMAN', 'Jl. Pondok Pesantren El-Husna Km.01 Ds. Bakalan, Kandeman'),
('69754606', 'SMK MA\'ARIF NU PECALUNGAN', 'Jl. Raya Pecalungan KM 1 Ds. Pecalungan, Pecalungan'),
('69756066', 'SMK NEGERI 1 BLADO', 'Jl. Blado-Kalipancur KM. 2 Ds. Cokro, Blado'),
('69759226', 'SMK BHAKTI PRAJA 2 BATANG', 'Jl. Ki Mangunsarkoro No. 10 Kel, Proyonanggan Selatan, Batang'),
('69786402', 'SMA PONDOK MODERN SELAMAT 2 BATANG', 'Jl. Raya Batang-Semarang KM.14 Ds. Clapar, Subah'),
('69867955', 'SMK BATIK MIFTAHUL ULUM BATANG', 'Jl. Pemuda Ds. Cepokokuning, Batang'),
('69874020', 'SMK TERPADU AL MINHAJ BANDAR', 'Jl. Tulis - Bandar Km.05 Ds. Wonosegoro, Bandat'),
('69910051', 'SMA DARUL MA\'ARIF BANYUPUTIH', 'Jl. Raya Pantura Desa Sembung, Banyuputih'),
('69910052', 'SMK NU TULIS', 'Jl. Raya Tulis-Batang Gg Melati No. 02 Gondangan, Tulis Batang'),
('69962613', 'SMK ISLAM BANDAR', 'Jl. Raya Pesalakan - Bandar KM 03 Ds. Pesalakan, Bandar'),
('69995407', 'MA TAKHASSUS AL SYAIRIYAH PLUMBON LIMPUNG', 'Jl. Kemuning, Rt.01/Rw.06 Ds. Plumbon, Limpung');

-- --------------------------------------------------------

--
-- Table structure for table `status_final`
--

CREATE TABLE `status_final` (
  `id_status_final` int(11) NOT NULL,
  `nama_status_final` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_final`
--

INSERT INTO `status_final` (`id_status_final`, `nama_status_final`) VALUES
(1, 'lolos'),
(2, 'tidak lolos');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_status_pembayaran` int(11) NOT NULL,
  `nama_status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_status_pembayaran`, `nama_status_pembayaran`) VALUES
(1, 'belum transfer'),
(2, 'sudah transfer');

-- --------------------------------------------------------

--
-- Table structure for table `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `id_status_pendaftaran` int(11) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pendaftaran`
--

INSERT INTO `status_pendaftaran` (`id_status_pendaftaran`, `nama_status`) VALUES
(1, 'Memenuhi syarat'),
(2, 'Tidak memenuhi syarat'),
(3, 'Perbaikan data'),
(4, 'Proses verifikasi data');

-- --------------------------------------------------------

--
-- Table structure for table `status_peserta`
--

CREATE TABLE `status_peserta` (
  `id_status_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_peserta`
--

INSERT INTO `status_peserta` (`id_status_peserta`, `nama_peserta`) VALUES
(1, 'peserta didik'),
(2, 'calon mahasiswa'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_penting`
--

CREATE TABLE `tanggal_penting` (
  `id_tanggal_penting` int(11) NOT NULL,
  `nama_tanggal_penting` varchar(50) NOT NULL,
  `tanggal_penting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggal_penting`
--

INSERT INTO `tanggal_penting` (`id_tanggal_penting`, `nama_tanggal_penting`, `tanggal_penting`) VALUES
(1, 'Tanggal Pembukaan Pendaftaran', '2022-05-31'),
(2, 'Tanggal Pengumuman', '2022-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `nama_transportasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `nama_transportasi`) VALUES
(1, 'transportasi umum'),
(2, 'mobil'),
(3, 'motor'),
(4, 'sepeda'),
(5, 'jalan kaki');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `no_induk` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `no_induk`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'beasiswabatang@gmail.com', 'admin1', NULL, '$2y$10$Euhkx3BPxfSrXG8O2apu1.JFFEDo6WOo6eElsbd5jiQgS1r0RUoam', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-03-01 10:22:10', '2022-03-01 10:22:46', NULL),
(21, 'ferdianrafli32@gmail.com', 'pendaftar1', '3324162512000002', '$2y$10$sEcmiPOJygQStxy/ggvZNudYOLYd9HTHYbVCZpIExl2afqWark71O', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-02 08:42:45', '2022-06-02 08:44:13', NULL),
(22, 'ferdianrafli25@gmail.com', 'pendaftar2', '3324162512000005', '$2y$10$H50lhI23rIGg91RSrcMXOe00rh7ndsDJ2pmuM6/9.YMt3K0s.n/DK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-13 11:42:41', '2022-06-13 11:42:41', NULL),
(23, 'ferdianrafli125@gmail.com', 'pendaftar3', '3324162512000004', '$2y$10$yF7rNHvd1W7p4Af./Ye5SuWt7xHqHHzXIyocxXox5cBSPEaPv2wAa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-13 13:30:50', '2022-06-13 13:30:50', NULL),
(27, 'soalbank7@gmail.com', 'banksoal', NULL, '$2y$10$XazcR1GysyF06MzHdWQJmOqoMNq3J7P0Yu7sbxAV9Pqj1q0vwrf7S', '769ddd27072dbbc12885f434d7dc5891', '2022-06-13 22:59:38', '2022-06-14 01:14:55', NULL, NULL, NULL, 1, 0, '2022-06-13 22:50:10', '2022-06-14 00:14:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_transportasi` (`id_transportasi`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_status_pendaftaran` (`id_status_pendaftaran`),
  ADD KEY `id_status_pembayaran` (`id_status_pembayaran`),
  ADD KEY `id_status_peserta` (`id_status_peserta`),
  ADD KEY `id_status_final` (`id_status_final`);

--
-- Indexes for table `informasi_pendaftaran`
--
ALTER TABLE `informasi_pendaftaran`
  ADD PRIMARY KEY (`id_informasi_pendaftaran`);

--
-- Indexes for table `informasi_terbaru`
--
ALTER TABLE `informasi_terbaru`
  ADD PRIMARY KEY (`id_informasi_terbaru`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE;

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `status_final`
--
ALTER TABLE `status_final`
  ADD PRIMARY KEY (`id_status_final`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id_status_pembayaran`);

--
-- Indexes for table `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`id_status_pendaftaran`);

--
-- Indexes for table `status_peserta`
--
ALTER TABLE `status_peserta`
  ADD PRIMARY KEY (`id_status_peserta`);

--
-- Indexes for table `tanggal_penting`
--
ALTER TABLE `tanggal_penting`
  ADD PRIMARY KEY (`id_tanggal_penting`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `informasi_pendaftaran`
--
ALTER TABLE `informasi_pendaftaran`
  MODIFY `id_informasi_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `informasi_terbaru`
--
ALTER TABLE `informasi_terbaru`
  MODIFY `id_informasi_terbaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `status_final`
--
ALTER TABLE `status_final`
  MODIFY `id_status_final` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id_status_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  MODIFY `id_status_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_peserta`
--
ALTER TABLE `status_peserta`
  MODIFY `id_status_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanggal_penting`
--
ALTER TABLE `tanggal_penting`
  MODIFY `id_tanggal_penting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `identitas` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `identitas`
--
ALTER TABLE `identitas`
  ADD CONSTRAINT `identitas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `identitas_ibfk_3` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`),
  ADD CONSTRAINT `identitas_ibfk_4` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON UPDATE CASCADE,
  ADD CONSTRAINT `identitas_ibfk_5` FOREIGN KEY (`id_status_peserta`) REFERENCES `status_peserta` (`id_status_peserta`),
  ADD CONSTRAINT `identitas_ibfk_6` FOREIGN KEY (`id_status_pendaftaran`) REFERENCES `status_pendaftaran` (`id_status_pendaftaran`),
  ADD CONSTRAINT `identitas_ibfk_7` FOREIGN KEY (`id_status_pembayaran`) REFERENCES `status_pembayaran` (`id_status_pembayaran`),
  ADD CONSTRAINT `identitas_ibfk_8` FOREIGN KEY (`id_status_final`) REFERENCES `status_final` (`id_status_final`),
  ADD CONSTRAINT `identitas_ibfk_9` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`Id_kecamatan`);

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `identitas` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `identitas` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `identitas` (`no_induk`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
