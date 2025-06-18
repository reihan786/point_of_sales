-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 07:46 AM
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
-- Database: `db_pakreza`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `urutan` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `icon`, `url`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'bi bi-grid', 'home.php', 1, '2025-06-11 04:21:50', NULL),
(2, 0, 'Master Data', 'bi bi-menu-button-wide', '', 2, '2025-06-11 04:28:32', NULL),
(3, 0, 'Modul', 'bi bi-book', '?page=moduls', 3, '2025-06-11 04:29:57', NULL),
(4, 2, 'Instructor', 'bi bi-circle', 'instructor', 1, '2025-06-11 04:31:01', '2025-06-11 05:27:36'),
(5, 2, 'Major', 'bi bi-circle', 'major', 2, '2025-06-11 04:32:09', '2025-06-11 05:28:18'),
(6, 2, 'Menu', 'bi bi-circle', 'menu', 3, '2025-06-11 04:32:23', '2025-06-11 05:27:57'),
(7, 2, 'Role', 'bi bi-circle', 'role', 4, '2025-06-11 04:32:43', '2025-06-11 05:27:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
