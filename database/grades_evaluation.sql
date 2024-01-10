-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grades_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'student id',
  `instructor_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT 0,
  `subject_id` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image_name` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `user_id`, `date_of_birth`, `sex`, `address`, `profile_image_name`, `date_created`, `date_modified`) VALUES
(1, 13, '2023-10-12', 'Male', 'instructor', NULL, '2023-10-04 11:40:26', '2023-10-05 15:01:30'),
(3, 17, '2023-10-19', 'Male', 'instructor2', NULL, '2023-10-05 15:03:39', '2023-10-05 15:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_assigned_subjects`
--

CREATE TABLE `instructor_assigned_subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'id of the user that the role is instructor',
  `subject_id` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_assigned_subjects`
--

INSERT INTO `instructor_assigned_subjects` (`id`, `user_id`, `subject_id`, `date_created`, `date_modified`) VALUES
(5, 17, 6, '2023-10-06 15:12:32', '2023-10-06 15:12:32'),
(6, 17, 3, '2023-10-06 15:12:32', '2023-10-06 17:08:35'),
(7, 13, 6, '2023-10-07 11:08:20', '2023-10-07 11:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `interview_scores`
--

CREATE TABLE `interview_scores` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL COMMENT 'user_id that role is student',
  `staff_id` int(11) DEFAULT NULL COMMENT 'user_id that role is staff',
  `academic_excellence` int(11) DEFAULT NULL,
  `academic_excellence2` int(11) DEFAULT NULL,
  `academic_excellence3` int(11) DEFAULT NULL,
  `academic_excellence4` int(11) DEFAULT NULL,
  `academic_excellence5` int(11) DEFAULT NULL,
  `intellectual_curiosity` int(11) DEFAULT NULL,
  `intellectual_curiosity2` int(11) DEFAULT NULL,
  `intellectual_curiosity3` int(11) DEFAULT NULL,
  `intellectual_curiosity4` int(11) DEFAULT NULL,
  `intellectual_curiosity5` int(11) DEFAULT NULL,
  `communication_skills` int(11) DEFAULT NULL,
  `communication_skills2` int(11) DEFAULT NULL,
  `communication_skills3` int(11) DEFAULT NULL,
  `communication_skills4` int(11) DEFAULT NULL,
  `communication_skills5` int(11) DEFAULT NULL,
  `leadership_and_service` int(11) DEFAULT NULL,
  `leadership_and_service2` int(11) DEFAULT NULL,
  `leadership_and_service3` int(11) DEFAULT NULL,
  `leadership_and_service4` int(11) DEFAULT NULL,
  `leadership_and_service5` int(11) DEFAULT NULL,
  `overall_impression` int(11) DEFAULT NULL,
  `overall_impression2` int(11) DEFAULT NULL,
  `overall_impression3` int(11) DEFAULT NULL,
  `overall_impression4` int(11) DEFAULT NULL,
  `overall_impression5` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview_scores`
--

INSERT INTO `interview_scores` (`id`, `student_id`, `staff_id`, `academic_excellence`, `academic_excellence2`, `academic_excellence3`, `academic_excellence4`, `academic_excellence5`, `intellectual_curiosity`, `intellectual_curiosity2`, `intellectual_curiosity3`, `intellectual_curiosity4`, `intellectual_curiosity5`, `communication_skills`, `communication_skills2`, `communication_skills3`, `communication_skills4`, `communication_skills5`, `leadership_and_service`, `leadership_and_service2`, `leadership_and_service3`, `leadership_and_service4`, `leadership_and_service5`, `overall_impression`, `overall_impression2`, `overall_impression3`, `overall_impression4`, `overall_impression5`, `date_created`, `date_modified`) VALUES
(1, 10, 16, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-10-08 17:47:50', '2023-12-17 10:05:49'),
(3, 19, 16, 1, 1, 1, 1, 1, 4, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-10-10 19:58:52', '2023-12-17 10:16:46'),
(4, 24, 16, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-10-13 09:43:07', '2023-12-17 10:07:50'),
(5, 25, 16, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 5, 5, 5, 5, '2023-10-13 10:37:40', '2023-12-17 10:08:50'),
(6, 26, 16, 10, 0, 0, 0, 0, 15, 0, 0, 0, 0, 15, 0, 0, 0, 0, 15, 0, 0, 0, 0, 15, 0, 0, 0, 0, '2023-10-13 11:11:53', '2023-10-13 11:12:41'),
(7, 27, 16, 4, 3, 5, 4, 4, 5, 5, 5, 5, 4, 5, 3, 4, 1, 4, 5, 5, 3, 2, 5, 5, 5, 5, 4, 4, '2023-11-15 22:07:24', '2023-12-17 13:45:29'),
(8, 34, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-15 22:34:01', '2023-11-16 07:57:54'),
(9, 35, 16, 10, 0, 0, 0, 0, 14, 0, 0, 0, 0, 4, 0, 0, 0, 0, 7, 0, 0, 0, 0, 5, 0, 0, 0, 0, '2023-11-16 08:34:15', '2023-11-16 08:34:15'),
(10, 37, 16, 20, 0, 0, 0, 0, 2, 0, 0, 0, 0, 8, 0, 0, 0, 0, 9, 0, 0, 0, 0, 3, 0, 0, 0, 0, '2023-11-16 09:34:50', '2023-11-16 09:34:50'),
(11, 48, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-18 09:19:26', '2023-11-18 10:36:33'),
(12, 53, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-23 11:13:12', '2023-11-23 11:22:40'),
(13, 55, 16, 5, 0, 0, 0, 0, 4, 0, 0, 0, 0, 4, 0, 0, 0, 0, 5, 0, 0, 0, 0, 5, 0, 0, 0, 0, '2023-12-07 10:46:02', '2023-12-11 19:15:05'),
(14, 60, 16, 5, 3, 4, 5, 4, 5, 4, 4, 4, 5, 5, 5, 5, 5, 5, 4, 4, 3, 4, 4, 4, 5, 5, 5, 5, '2023-12-17 15:38:50', '2023-12-17 16:13:56'),
(15, 70, 16, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-12-20 18:14:47', '2024-01-04 09:27:12'),
(16, 73, 16, 5, 5, 5, 4, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-12-20 18:15:38', '2023-12-27 17:50:38'),
(17, 69, 16, 5, 5, 5, 3, 5, 5, 4, 5, 5, 5, 5, 4, 4, 3, 5, 5, 4, 4, 4, 5, 5, 5, 3, 4, 5, '2023-12-20 18:17:31', '2023-12-27 13:49:55'),
(18, 82, 16, 0, 0, 5, 5, 5, 5, 0, 5, 5, 5, 5, 0, 5, 5, 5, 5, 0, 5, 5, 5, 5, 0, 5, 5, 5, '2023-12-27 17:54:36', '2023-12-31 13:13:19'),
(19, 65, 16, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-12-28 13:29:35', '2023-12-28 13:41:31'),
(20, 77, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-31 13:02:48', '2023-12-31 13:02:48'),
(21, 84, 16, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2023-12-31 13:15:22', '2023-12-31 13:29:11'),
(22, 85, 16, 5, 5, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-12-31 13:59:17', '2023-12-31 13:59:35'),
(23, 86, 16, 2, 0, NULL, NULL, NULL, 1, 3, NULL, NULL, NULL, 2, 3, NULL, NULL, NULL, 3, 4, NULL, NULL, NULL, 4, 3, NULL, NULL, NULL, '2023-12-31 22:47:29', '2024-01-04 09:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image_name` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `date_of_birth`, `sex`, `address`, `profile_image_name`, `date_created`, `date_modified`) VALUES
(2, 16, '2023-10-01', 'Male', 'staff', NULL, '2023-10-04 16:49:20', '2023-10-05 15:08:18'),
(3, 18, '2023-10-19', 'Female', 'Staff2', NULL, '2023-10-05 15:10:26', '2023-10-05 15:10:26'),
(6, 56, '2023-12-06', 'Male', 'Ormoc City', NULL, '2023-12-06 20:38:05', '2023-12-06 20:38:05'),
(8, 58, '2023-12-07', 'Female', 'Ormoc City', NULL, '2023-12-07 10:39:49', '2023-12-07 10:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image_name` varchar(100) DEFAULT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `course` varchar(60) DEFAULT NULL,
  `gpa` float NOT NULL DEFAULT 0,
  `examination_score` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `date_of_birth`, `sex`, `address`, `profile_image_name`, `school_id`, `course`, `gpa`, `examination_score`, `date_created`, `date_modified`) VALUES
(20, 27, '2023-10-27', 'Computer Science', '', NULL, '202030715', 'BSIT', 1.7, 30, '2023-10-13 11:46:13', '2023-12-17 14:48:16'),
(46, 55, '2023-10-27', 'Computer Science', NULL, NULL, '202030151', 'BSIT', 1.5, 98, '2023-11-24 19:13:35', '2023-12-17 10:15:01'),
(48, 60, '2023-12-17', 'computer_science', 'Kanaga, Leyte', NULL, '123-2014', 'BSIT', 1.75, 87, '2023-12-17 14:46:22', '2023-12-17 15:39:12'),
(49, 61, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '98756-2019', 'BSIT', 0, 0, '2023-12-20 10:00:03', '2023-12-20 10:00:03'),
(50, 62, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '98657-2019', 'BSIT', 0, 0, '2023-12-20 10:01:20', '2023-12-20 10:01:20'),
(51, 63, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '98789-2019', 'BSIT', 0, 0, '2023-12-20 10:02:29', '2023-12-20 10:02:29'),
(52, 64, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '09876-2019', 'BSIT', 0, 0, '2023-12-20 10:03:36', '2023-12-20 10:03:36'),
(53, 65, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '09123243567', 'BSIT', 0, 0, '2023-12-20 10:04:38', '2023-12-20 10:04:38'),
(54, 66, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '09879-2019', 'BSIT', 0, 0, '2023-12-20 10:06:55', '2023-12-22 09:35:52'),
(55, 67, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '98546-2019', 'BSIT', 0, 0, '2023-12-20 10:08:24', '2023-12-20 10:08:24'),
(56, 68, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '09345', 'BSIT', 0, 0, '2023-12-20 10:12:18', '2023-12-20 10:12:18'),
(57, 69, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '34345-2019', 'BSIT', 1.5, 88, '2023-12-20 10:15:04', '2023-12-20 18:16:40'),
(58, 70, '2023-12-20', 'Computer Science', 'Ormoc City', NULL, '98765-2019', 'BSIT', 1, 100, '2023-12-20 10:19:40', '2023-12-20 15:34:37'),
(61, 73, '2023-12-20', 'Computer Science', 'Kananga, Leyte', NULL, '123-2014', 'BSIT', 1.75, 76, '2023-12-20 15:27:55', '2023-12-27 17:51:14'),
(62, 74, '2023-12-21', 'Computer Science', 'Ormoc City', NULL, '33435-2019', 'BSIT', 0, 0, '2023-12-21 09:15:06', '2023-12-21 09:15:06'),
(63, 75, '2023-12-21', 'Computer Science', 'Ormoc City', NULL, '44578-2019', 'BSIT', 0, 0, '2023-12-21 09:16:51', '2023-12-21 09:16:51'),
(64, 76, '2023-12-21', 'Computer Science', 'Ormoc City', NULL, '33998-2019', 'BSIT', 0, 0, '2023-12-21 09:17:58', '2023-12-21 09:17:58'),
(65, 77, '2023-12-21', 'Computer Science', 'Ormoc City', NULL, '00989-2019', 'BSIT', 0, 0, '2023-12-21 09:20:02', '2023-12-21 09:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name_of_subject` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `year_level` varchar(50) DEFAULT NULL,
  `pre_requesit` int(11) DEFAULT NULL COMMENT 'subject id pre requesit',
  `semester` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name_of_subject`, `unit`, `year_level`, `pre_requesit`, `semester`, `date_created`, `date_modified`) VALUES
(3, 'subject 2', 2, 'Second Year', NULL, 'First Semester', '2023-10-04 19:58:25', '2023-10-04 20:49:47'),
(6, 'subject 1', 2, 'Second Year', 3, 'Second Semester', '2023-10-04 20:50:22', '2023-10-04 20:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `email`, `contact_number`, `role`, `created`, `modified`, `status`) VALUES
(1, 'Admina', '', 'Admin', 'admin', 'ad1570d9c21736a983091b157f45e631faf159d1', 'admin1@gmail.com', '09461324094', 'Admin', '2021-09-06 12:02:02', '2023-10-13 15:09:44', 1),
(13, 'instructor', 'instructor', 'instructor', 'instructor', 'ad1570d9c21736a983091b157f45e631faf159d1', 'instructor@gmail.com', '4564', 'Instructor', '2023-10-04 05:40:26', '2023-10-07 04:29:22', 1),
(16, 'staff', 'staff', 'staff', 'staff', 'ad1570d9c21736a983091b157f45e631faf159d1', 'staff@gmail.com', '568756', 'Staff', '2023-10-04 10:49:20', '2023-10-13 03:23:08', 1),
(17, 'instructor2', 'instructor2', 'instructor2', 'instructor2', 'ad1570d9c21736a983091b157f45e631faf159d1', 'instructor2@gmail.com', '12312', 'Instructor', '2023-10-05 09:03:39', '2023-10-05 09:03:39', 1),
(18, 'Staff2', 'Staff2', 'Staff2', 'Staff2', 'ad1570d9c21736a983091b157f45e631faf159d1', 'Staff2@gmail.com', '123', 'Staff', '2023-10-05 09:10:26', '2023-10-05 09:10:26', 1),
(58, 'Julie Ann', '', 'Carno', 'carno', '2b0ffa9d6d8e784174825285c394ad39c2ee6337', 'carno@gmail.com', '09123456789', 'Staff', '2023-12-07 03:39:49', '2023-12-28 06:21:56', 1),
(61, 'Abegail ', 'Abero', 'Montillen', '98756-2019', '89c83fe2130ac25957d5928390c616f629492344', 'montillen@gmail.com', '09127645372', 'Student', '2023-12-20 03:00:03', '2023-12-20 03:00:03', 1),
(62, 'Alijah Vincent', '', 'Odac', '98657-2019', '89c83fe2130ac25957d5928390c616f629492344', 'odac@gmail.com', '09243546784', 'Student', '2023-12-20 03:01:20', '2023-12-20 03:01:20', 1),
(63, 'Allester', '', 'Corton', '98789-2019', '89c83fe2130ac25957d5928390c616f629492344', 'corton@gmail.com', '09123245678', 'Student', '2023-12-20 03:02:29', '2023-12-20 03:02:29', 1),
(64, 'April Joy', '', 'Quilay', '09876-2019', '89c83fe2130ac25957d5928390c616f629492344', 'quilay@gmail.com', '09112345467', 'Student', '2023-12-20 03:03:36', '2023-12-20 03:03:36', 1),
(65, 'Arbie', '', 'Caropo', '09123243567', '89c83fe2130ac25957d5928390c616f629492344', 'carupo@gamil.com', '0921435678', 'Student', '2023-12-20 03:04:38', '2023-12-20 03:04:38', 1),
(66, 'Edgardo', '', 'Po', '09879-2019', '89c83fe2130ac25957d5928390c616f629492344', 'po@gmail.com', '09213245656', 'Student', '2023-12-20 03:06:55', '2023-12-20 03:06:55', 1),
(67, 'Emman', '', 'Barnaba', '98546-2019', '89c83fe2130ac25957d5928390c616f629492344', 'barnaba@gmail.com', '09214354678', 'Student', '2023-12-20 03:08:24', '2023-12-20 03:08:24', 1),
(68, 'Joshua', '', 'Dator', '09345', '89c83fe2130ac25957d5928390c616f629492344', 'dator@gmail.com', '09123456785', 'Student', '2023-12-20 03:12:18', '2023-12-20 03:12:18', 1),
(69, 'Micah Joyce', '', 'Bertulfo', '34345-2019', '89c83fe2130ac25957d5928390c616f629492344', 'bertulfo@gmail.com', '09214356789', 'Student', '2023-12-20 03:15:03', '2023-12-20 03:15:03', 1),
(70, 'Julie Ann', '', 'Carno', '98765-2019', '89c83fe2130ac25957d5928390c616f629492344', 'carno@gmail.com', '09123243567', 'Student', '2023-12-20 03:19:40', '2023-12-20 03:19:40', 1),
(73, 'Jannovee', 'Lajera', 'Balbero', '123-2014', '89c83fe2130ac25957d5928390c616f629492344', 'balberojannovee@gmail.com', '09123435654', 'Student', '2023-12-20 08:27:55', '2023-12-20 10:35:55', 1),
(74, 'Gino', 'Dijeto', 'Soles', '33435-2019', '89c83fe2130ac25957d5928390c616f629492344', 'dejito@gmail.com', '09324545454', 'Student', '2023-12-21 02:15:06', '2023-12-21 02:15:06', 1),
(75, 'Jake', '', 'Pitogo', '44578-2019', '89c83fe2130ac25957d5928390c616f629492344', 'pitogo@gmail.com', '09878756473', 'Student', '2023-12-21 02:16:51', '2023-12-21 02:16:51', 1),
(76, 'Jamaica', '', 'Lerio', '33998-2019', '89c83fe2130ac25957d5928390c616f629492344', 'lerio@gmail.com', '09873434325', 'Student', '2023-12-21 02:17:58', '2023-12-21 02:17:58', 1),
(77, 'John Paul', '', 'Navarra', '00989-2019', '89c83fe2130ac25957d5928390c616f629492344', 'navarra@gmail.com', '09333425467', 'Student', '2023-12-21 02:20:02', '2023-12-21 02:20:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_assigned_subjects`
--
ALTER TABLE `instructor_assigned_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_scores`
--
ALTER TABLE `interview_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_number` (`contact_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor_assigned_subjects`
--
ALTER TABLE `instructor_assigned_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interview_scores`
--
ALTER TABLE `interview_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
