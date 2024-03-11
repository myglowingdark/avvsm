-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 12:41 PM
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
-- Database: `abvssm`
--

-- --------------------------------------------------------

--

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `duration`, `fees`, `created_at`, `updated_at`) VALUES
(1, 'Basic English Speaking', 1, '1200', '2024-03-10 05:33:09', '2024-03-10 05:33:09'),
(2, 'Basic Makeup Course', 2, '1000', '2024-03-10 05:34:14', '2024-03-10 05:34:14'),
(4, 'Certificate Course In  Basic Compute', 3, '1800', '2024-03-10 05:35:51', '2024-03-10 05:35:51'),
(5, 'English Typing', 1, '1000', '2024-03-10 05:36:19', '2024-03-10 05:36:19'),
(6, 'Hindi Typing', 1, '1500', '2024-03-10 05:36:51', '2024-03-10 05:36:51'),
(7, 'English (Intermediate+Basic)', 2, '1800', '2024-03-10 05:37:14', '2024-03-10 05:37:14'),
(8, 'Makeup (Intermediate+Basic)', 2, '2000', '2024-03-10 05:37:46', '2024-03-10 05:37:46'),
(9, 'Certificate In Computer                             Concept', 1, '1000', '2024-03-10 05:38:16', '2024-03-10 05:38:16'),
(10, 'Advance Excel', 2, '1200', '2024-03-10 05:41:07', '2024-03-10 05:41:07'),
(12, 'Advance Microsoft', 2, '1200', '2024-03-10 05:46:23', '2024-03-10 05:46:23'),
(13, 'Javascript', 2, '1000', '2024-03-10 05:46:43', '2024-03-10 05:46:43'),
(14, 'HTML/DHTML', 2, '1800', '2024-03-10 05:47:58', '2024-03-10 05:47:58'),
(15, 'Data Structure', 3, '1000', '2024-03-10 05:48:20', '2024-03-10 05:48:20'),
(16, 'AUTOCAD', 1, '1200', '2024-03-10 05:48:40', '2024-03-10 05:48:40'),
(17, 'Corel Draw', 1, '1800', '2024-03-10 05:48:59', '2024-03-10 05:48:59'),
(18, 'Adobe Photoshop', 2, '1000', '2024-03-10 05:49:18', '2024-03-10 05:49:18'),
(19, 'DTP', 1, '1200', '2024-03-10 05:49:44', '2024-03-10 05:49:44'),
(20, 'DTP (Page Maker,                             Photoshop, Coreldraw)', 1, '1200', '2024-03-10 05:50:44', '2024-03-10 05:50:44'),
(21, 'Certificate In Image Editing', 3, '1000', '2024-03-10 05:51:01', '2024-03-10 05:51:01'),
(22, 'Certificate In 2D Animation', 1, '1200', '2024-03-10 05:51:25', '2024-03-10 05:51:25'),
(23, 'Designing', 1, '1500', '2024-03-10 05:51:50', '2024-03-10 05:51:50'),
(24, 'Certificate In GST', 4, '1000', '2024-03-10 05:52:21', '2024-03-10 05:52:21'),
(25, 'Tally', 2, '1200', '2024-03-10 05:52:54', '2024-03-10 05:52:54'),
(26, 'Certificate In Tally GST', 1, '1000', '2024-03-10 05:53:37', '2024-03-10 05:53:37'),
(27, 'Tally With Accounting', 2, '1500', '2024-03-10 05:54:10', '2024-03-10 05:54:10'),
(28, 'Certificate In Accounting', 1, '1500', '2024-03-10 05:54:43', '2024-03-10 05:54:43'),
(29, 'Certificate In Marketing', 2, '1500', '2024-03-10 05:55:04', '2024-03-10 05:55:04'),
(30, 'Certificate Course PHP', 2, '1200', '2024-03-10 05:55:26', '2024-03-10 05:55:26'),
(34, 'Data Entry Operations', 3, '1200', '2024-03-10 05:58:25', '2024-03-10 05:58:25'),
(35, 'Internet & Online Work', 2, '1000', '2024-03-10 05:58:45', '2024-03-10 05:58:45'),
(38, 'Makeup Course With Hair                             Cutting', 1, '1200', '2024-03-10 05:59:58', '2024-03-10 05:59:58'),
(39, 'Beautician Therapy', 3, '1500', '2024-03-10 06:00:22', '2024-03-10 06:00:22'),
(40, 'Diploma (Basic) Makeup &                             Hairstyle', 1, '900', '2024-03-10 06:02:10', '2024-03-10 06:02:10'),
(41, 'Basic To Advance (Makeup                             Course)', 2, '1500', '2024-03-10 06:02:31', '2024-03-10 06:02:31'),
(42, 'ertificate In                             Personality Development', 1, '1500', '2024-03-10 06:02:52', '2024-03-10 06:02:52'),
(44, 'Computer Hardware', 2, '1500', '2024-03-10 06:03:42', '2024-03-10 06:03:42'),
(45, '>Diploma                             Mobile Repairing & Software Installation', 4, '900', '2024-03-10 06:04:06', '2024-03-10 06:04:06'),
(46, 'Diploma (Editing Expert)', 2, '1000', '2024-03-10 06:04:35', '2024-03-10 06:04:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`course_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
