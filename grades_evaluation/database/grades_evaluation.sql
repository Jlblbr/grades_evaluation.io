-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 03:19 AM
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
  `academic_excellence` int(11) NOT NULL DEFAULT 0,
  `intellectual_curiosity` int(11) NOT NULL DEFAULT 0,
  `communication_skills` int(11) NOT NULL DEFAULT 0,
  `leadership_and_service` int(11) NOT NULL DEFAULT 0,
  `overall_impression` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview_scores`
--

INSERT INTO `interview_scores` (`id`, `student_id`, `staff_id`, `academic_excellence`, `intellectual_curiosity`, `communication_skills`, `leadership_and_service`, `overall_impression`, `date_created`, `date_modified`) VALUES
(1, 10, 16, 30, 10, 10, 10, 10, '2023-10-08 17:47:50', '2023-10-09 21:23:58'),
(3, 19, 16, 30, 20, 20, 15, 15, '2023-10-10 19:58:52', '2023-10-10 19:58:52'),
(4, 24, 16, 30, 20, 20, 15, 1, '2023-10-13 09:43:07', '2023-10-13 09:43:07'),
(5, 25, 16, 0, 0, 0, 0, 0, '2023-10-13 10:37:40', '2023-10-13 10:37:40'),
(6, 26, 16, 10, 15, 15, 15, 15, '2023-10-13 11:11:53', '2023-10-13 11:12:41'),
(7, 27, 16, 30, 20, 20, 15, 15, '2023-11-15 22:07:24', '2023-11-19 09:42:00'),
(8, 34, 16, 0, 0, 0, 0, 0, '2023-11-15 22:34:01', '2023-11-16 07:57:54'),
(9, 35, 16, 10, 14, 4, 7, 5, '2023-11-16 08:34:15', '2023-11-16 08:34:15'),
(10, 37, 16, 20, 2, 8, 9, 3, '2023-11-16 09:34:50', '2023-11-16 09:34:50'),
(11, 48, 16, 0, 0, 0, 0, 0, '2023-11-18 09:19:26', '2023-11-18 10:36:33');

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
(3, 18, '2023-10-19', 'Female', 'Staff2', NULL, '2023-10-05 15:10:26', '2023-10-05 15:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
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
(12, 19, '2023-10-27', 'Female', 'student 2', NULL, 'student 2', 'BSIT', 1.5, 80, '2023-10-10 08:01:55', '2023-11-15 22:05:45'),
(13, 20, '2023-10-09', 'Female', 'student3', NULL, '345345', 'BSIT', 0, 0, '2023-10-12 19:35:50', '2023-10-12 19:35:50'),
(20, 27, NULL, '', '', NULL, '202030715', 'BSIT', 1.5, 100, '2023-10-13 11:46:13', '2023-11-19 09:42:21');

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
(19, 'student 2', 'student 2', 'student 2', 'student', 'ad1570d9c21736a983091b157f45e631faf159d1', 'student2@gmail.com', '12354', 'Student', '2023-10-10 02:01:55', '2023-10-10 14:44:11', 1),
(27, 'Mica', '', 'Bertulfo', '202030715', 'ad1570d9c21736a983091b157f45e631faf159d1', 'mjybertulfo2001@gmail.com', '', 'Student', '2023-10-13 05:46:13', '2023-11-17 14:46:42', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
