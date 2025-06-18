-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 02:58 AM
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
-- Database: `lms_angkatan_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `education` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `gender`, `education`, `phone`, `email`, `password`, `address`, `created_at`, `update_at`) VALUES
(8, 'Muhammad Reza Ibrahim', 0, 'S1', '087654343', 'reza@gmail.com', '', 'bekasi', '2025-06-04 02:23:57', NULL),
(9, 'Tri', 0, 's1', '0856784536271', 'Tri@gmaill.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '                                Tri@gmaill.com                            ', '2025-06-04 02:35:47', '2025-06-05 05:06:41'),
(10, 'hardianti', 0, 'politeknik negeri jakarta', '85722240065', 'dhiantyazza@gmail.com', '', 'tes', '2025-06-04 04:53:58', NULL),
(11, 'hardianti lagi', 0, 'politeknik negeri JAKARTA', '85722240065', 'dhiantyazza@gmail.com', '', 'aaaaaaaaaaaa', '2025-06-04 04:57:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_majors`
--

CREATE TABLE `instructor_majors` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_majors`
--

INSERT INTO `instructor_majors` (`id`, `id_major`, `id_instructor`, `created_at`, `update_at`) VALUES
(1, 7, 12, '2025-06-04 06:52:37', NULL),
(2, 7, 12, '2025-06-04 06:53:03', NULL),
(3, 6, 12, '2025-06-04 06:53:27', NULL),
(4, 5, 12, '2025-06-04 07:12:34', NULL),
(5, 6, 12, '2025-06-04 07:18:21', NULL),
(6, 6, 12, '2025-06-04 07:18:25', NULL),
(7, 7, 12, '2025-06-04 07:18:50', NULL),
(8, 6, 12, '2025-06-04 07:21:00', NULL),
(9, 5, 12, '2025-06-04 07:37:19', NULL),
(10, 6, 12, '2025-06-04 07:46:26', NULL),
(11, 6, 12, '2025-06-04 07:46:31', NULL),
(24, 5, 10, '2025-06-05 02:50:43', NULL),
(33, 6, 11, '2025-06-05 03:07:29', NULL),
(34, 5, 11, '2025-06-05 03:08:47', NULL),
(35, 4, 11, '2025-06-05 03:09:47', NULL),
(36, 2, 11, '2025-06-05 03:10:00', NULL),
(37, 5, 11, '2025-06-05 03:16:25', NULL),
(38, 1, 11, '2025-06-05 03:16:35', NULL),
(39, 4, 11, '2025-06-05 03:16:41', NULL),
(40, 7, 11, '2025-06-05 05:09:39', NULL),
(41, 3, 9, '2025-06-05 08:00:49', NULL),
(42, 5, 9, '2025-06-05 08:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Make Up Artist', '2025-06-04 02:14:38', '2025-06-04 02:14:38'),
(2, 'Teknik Jaringan', '2025-06-04 02:14:23', '2025-06-04 02:14:23'),
(3, 'Content Creator', '2025-06-04 02:14:14', '2025-06-04 02:14:14'),
(4, 'Multimedia', '2025-06-04 02:13:28', '2025-06-04 02:13:28'),
(5, 'Web Programming', '2025-06-04 02:13:20', '2025-06-04 02:13:20'),
(6, 'Tata Busana', '2025-06-04 02:14:56', NULL),
(7, 'Perhotelan', '2025-06-04 02:15:25', NULL),
(8, 'Tri', '2025-06-05 09:07:29', NULL),
(9, 'Tri', '2025-06-05 09:08:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moduls_details`
--

CREATE TABLE `moduls_details` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `update_at`) VALUES
(2, 'Administrator', '2025-06-03 13:24:16', '2025-06-04 02:24:42'),
(8, 'Instruktur', '2025-06-04 02:16:51', NULL),
(9, 'Siswa', '2025-06-04 02:17:05', NULL),
(10, 'PIC', '2025-06-04 02:24:23', NULL),
(11, 'Tri', '2025-06-05 09:08:32', NULL),
(12, 'didi', '2025-06-05 09:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'dianti', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2025-06-03 03:39:44', NULL, 0),
(3, 'aldo', 'aldo@gmail.com', '', '2025-06-03 07:40:22', '2025-06-04 01:35:32', 0),
(4, 'hardianti', 'hardianticv@gmail.com', '123', '2025-06-03 07:41:42', '2025-06-03 13:55:43', 0),
(5, 'hakim haki', 'hakimhaki@gmail.com', '123', '2025-06-03 08:13:00', '2025-06-04 01:08:55', 0),
(6, 'lala', 'lala@gmail.com', '123', '2025-06-04 00:58:37', '2025-06-04 01:00:58', 1),
(7, 'Nanda', 'Nanda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-06-04 02:17:49', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_majors`
--
ALTER TABLE `instructor_majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls_details`
--
ALTER TABLE `moduls_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instructor_majors`
--
ALTER TABLE `instructor_majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moduls_details`
--
ALTER TABLE `moduls_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
