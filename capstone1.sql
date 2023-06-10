-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 06:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `type`, `username`, `email`, `password`) VALUES
(1, '0', 'Nurse Edita', 'edita@dwc-legazpi.edu', '$2y$10$fcGjE/6lxScs57Vbgu9HV.ZsKa4Ky7NUj.NSUZPgfromKvYz2UnhK'),
(2, '0', 'Nurse Edith', 'edith@dwc-legazpi.edu', '$2y$10$m7dgLE2yYPQrXXDU8tP4KuY8kuVpKr8/zVANbCPczSNEGUHueGfLu'),
(3, '0', 'Nurse Chin', 'chin@dwc-legazpi.edu', '$2y$10$bv0gkXjyFoxG0o6lmBdrrO1x6LQpAh3hyW7UdGJJmXvRltYm7BiM.'),
(4, '0', 'Nurse Cam', 'camille@dwc-legazpi.edu', '$2y$10$1fVZff89V4/Wsq5/kBVn2uel.I9WTVq5DwnVKTwu360nDC8T24d6S'),
(5, '1', 'Nurse Joanna', 'joanna@dwc-legazpi.edu', '$2y$10$xWb/aCptUtQjMm86mgozuepwMmVW8amTeV.8yQ4/Cj96cNiKzpPbq'),
(6, '1', 'Nurse Troy', 'troy@dwc-legazpi.edu', '$2y$10$ed.DgD6A25oN4psDEMU7X.HPKTB1xNaCt0RUbsCd4ZYMrzICQzrvS');

-- --------------------------------------------------------

--
-- Table structure for table `dental`
--

CREATE TABLE `dental` (
  `dental_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dental_service` varchar(50) NOT NULL,
  `c_enrolled` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_id`, `user_id`, `idnumber`, `name`, `dental_service`, `c_enrolled`, `message`, `date_created`, `is_read`) VALUES
(31, 20, 123456, 'Joanna Mae Atento', 'Cleaning', 'Grade School & Grade School & Junior High School', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-09 10:25:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dentalapp`
--

CREATE TABLE `dentalapp` (
  `dentalapp_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `cenrolled` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalapp`
--

INSERT INTO `dentalapp` (`dentalapp_id`, `admin_id`, `idnumber`, `fullname`, `role`, `cenrolled`, `date_time`) VALUES
(4, 0, 123456, 'Joanna Mae Atento', 'Student', 'BSIT-3', '2023-06-23 10:30:00'),
(5, 0, 123456, 'Joanna Mae Atento', 'Student', 'BSIT-3', '2023-06-08 10:30:00'),
(6, 0, 123456, 'Mae Atento', 'Student', 'BSIT-3', '2023-05-31 10:30:00'),
(7, 5, 1234567, 'Mae Cruz', 'Student', 'BSIT-3', '2023-06-16 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecord`
--

CREATE TABLE `healthrecord` (
  `health_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `personalcpnum` varchar(15) NOT NULL,
  `age` int(5) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `gradecourse` varchar(30) NOT NULL,
  `leveleduc` varchar(50) NOT NULL,
  `fathername` varchar(250) NOT NULL,
  `cfather` varchar(250) NOT NULL,
  `mothername` varchar(250) NOT NULL,
  `cmother` varchar(250) NOT NULL,
  `polio` varchar(15) NOT NULL,
  `measles` varchar(15) NOT NULL,
  `tb` varchar(50) NOT NULL,
  `seizure_epilepsy` varchar(15) NOT NULL,
  `tetanus` varchar(15) NOT NULL,
  `mumps` varchar(15) NOT NULL,
  `hepatits` varchar(15) NOT NULL,
  `bleeding_tendencies` varchar(15) NOT NULL,
  `chicken_pox` varchar(15) NOT NULL,
  `asthma` varchar(15) NOT NULL,
  `fainting_spells` varchar(15) NOT NULL,
  `eye_disorder` varchar(15) NOT NULL,
  `heart` varchar(15) NOT NULL,
  `illness` varchar(15) NOT NULL,
  `allergyfood` varchar(15) NOT NULL,
  `allergymed` varchar(15) NOT NULL,
  `allow_not` varchar(15) NOT NULL,
  `medications` varchar(15) NOT NULL,
  `nameperson` varchar(15) NOT NULL,
  `personcp` varchar(15) NOT NULL,
  `relationship` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecord`
--

INSERT INTO `healthrecord` (`health_id`, `user_id`, `image`, `fullname`, `idnumber`, `personalcpnum`, `age`, `birthday`, `gender`, `address`, `role`, `gradecourse`, `leveleduc`, `fathername`, `cfather`, `mothername`, `cmother`, `polio`, `measles`, `tb`, `seizure_epilepsy`, `tetanus`, `mumps`, `hepatits`, `bleeding_tendencies`, `chicken_pox`, `asthma`, `fainting_spells`, `eye_disorder`, `heart`, `illness`, `allergyfood`, `allergymed`, `allow_not`, `medications`, `nameperson`, `personcp`, `relationship`) VALUES
(73, 20, 'me.jpg', 'Joanna Mae Atento', 6802182, '09156005165', 21, '2001-12-15', 'Female', 'Guinobatan', 'Student', 'BSIT-3', 'College', 'Jojo Atento', '09134374637', 'Rowena Atento', '091476548368', '', '', '', '', '', '', '', '', '', '', '', 'eye_disorder', 'N/A', 'N/A', '', '', 'YES', 'NO', 'Edita Dela Cruz', '091564957760', 'Grandmother'),
(74, 21, 'WIN_20230311_16_23_26_Pro.jpg', 'Employee Juan', 12345678, '09756578679', 22, '2000-12-15', 'Male', 'Polangui', 'Employee', 'Professor', 'Employee', 'Jose Rizal', '09145885479', 'Rowena Atento', '091476548368', '', '', '', '', '', '', '', '', '', '', 'fainting_spells', '', 'N/A', 'N/A', '', '', 'YES', 'NO', 'Tandang Sora', '091475865879', 'Grandmother');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `statuses1030` varchar(50) NOT NULL,
  `statuses1130` varchar(50) NOT NULL,
  `statuses230` varchar(50) NOT NULL,
  `statuses330` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `statuses1030`, `statuses1130`, `statuses230`, `statuses330`) VALUES
(8, 'Unavailable', 'Available', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type`, `fullname`, `email`, `password`) VALUES
(1, '1', 'test', 'test@dwc-legazpi.edu', 'test@dwc-legazpi.edu'),
(20, '1', 'Joanna Mae Atento', '06802182@dwc-legazpi.edu', '$2y$10$Gl9YlutZ.ZQ.Atbhn4qnqOmK/tVfv4iQHKCKleUx9wfp7VjPSAnVO'),
(21, '1', 'Employee Juan', 'employeejuan@dwc-legazpi.edu', '$2y$10$muer4YTynndgh1ZhSh1FPetejl3aNOq3TCUs7HePeYw8H/Fq2M1ha'),
(22, '1', 'Nurse Cha', 'charot@dwc-legazpi.edu', '$2y$10$7U1zD1neafVsgN/bJUGuR.IdSUBZIwrP.raB50kvyg2xezfhefiue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dental`
--
ALTER TABLE `dental`
  ADD PRIMARY KEY (`dental_id`);

--
-- Indexes for table `dentalapp`
--
ALTER TABLE `dentalapp`
  ADD PRIMARY KEY (`dentalapp_id`);

--
-- Indexes for table `healthrecord`
--
ALTER TABLE `healthrecord`
  ADD PRIMARY KEY (`health_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `healthrecord`
--
ALTER TABLE `healthrecord`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
