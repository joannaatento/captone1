-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:39 PM
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
  `role` int(5) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `type`, `username`, `email`, `role`, `password`) VALUES
(9, '', 'Nurse GSJHS', 'gsjhs@dwc-legazpi.edu', 1, '$2y$10$GifhpjE5vxy1N8BggO6EFuEIzoPHR8QXKBUkXO8G2HKdfzjcuBAlq'),
(10, '', 'Nurse SHS', 'shs@dwc-legazpi.edu', 2, '$2y$10$P2sGF1KR.EILlLMSBA.eYu7kXEPcmMxyXKI8n2Sgqd7.sesXYcVSu'),
(11, '', 'Nurse College', 'college@dwc-legazpi.edu', 3, '$2y$10$vgjsovnMxuz4nNvShLSKeuNSVpfsOswZ56y6yQFsO.MwH4f8BZrVC');

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
  `gradecourseyear` varchar(200) NOT NULL,
  `c_employee` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `is_deleted_on_website` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_id`, `user_id`, `idnumber`, `name`, `dental_service`, `c_enrolled`, `gradecourseyear`, `c_employee`, `message`, `date_created`, `is_read`, `is_deleted_on_website`) VALUES
(73, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 01:21:00', 1, 1),
(74, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 01:26:00', 1, 1),
(75, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 01:27:00', 1, 1),
(76, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 01:31:00', 1, 1),
(77, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', 'Grade School & Grade School & Junior High School', 'Grade 7 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 10:08:00', 1, 1),
(78, 24, 6802182, 'Joanna Mae', 'Cleaning', 'Senior High School', 'Grade 12 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-14 10:21:00', 1, 1),
(79, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'Senior High School', 'BSIT - 4', '', 'pa sched po Monday 11:30A.M', '2023-06-23 12:20:00', 1, 0),
(80, 24, 6666, 'Joanna Mae Atento', 'Tooth Extraction', '', '', 'Employee in SHS', 'parequest po 11:30 AM. Monday', '2023-07-01 10:06:00', 0, 0),
(81, 24, 6666, 'Joanna Mae Atento', 'Cleaning', 'College', '', '', 'parequest po 11:30 AM. Monday', '2023-07-01 10:28:00', 1, 1),
(82, 24, 6666, 'Joanna Mae Atento', 'Tooth Extraction', 'College', 'BSIT - 4', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-01 10:39:00', 1, 1),
(83, 24, 6666, 'Joanna Mae Atento', 'Cleaning', 'College', 'BSIT -3', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-01 10:41:00', 0, 1),
(84, 24, 6666, 'Joanna Mae', 'Tooth Extraction', '', '', 'Employee College', 'pa sched po Monday 11:30A.M', '2023-07-01 10:48:00', 0, 0),
(85, 24, 6666, 'Joanna Atento', 'Cleaning', '', '', 'Employee College', 'parequest po 11:30 AM. Monday', '2023-07-01 10:49:00', 0, 0),
(86, 24, 6666, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in College', 'Ppa sched po ako, Monday 10:30 A.M', '2023-07-01 10:54:00', 1, 1),
(87, 24, 6666, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in College', 'parequest po 11:30 AM. Monday', '2023-07-01 10:59:00', 1, 1),
(88, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', '', '', 'Employee in College', 'Can I have a Monday schedule at 10:30 A.M?', '2023-07-06 08:52:00', 1, 1),
(89, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'Grade School & Grade School & Junior High School', 'Grade 7 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-07 08:30:00', 0, 0),
(90, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-11 09:13:00', 0, 0),
(91, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'College', 'BSIT - 3', '', 'Can I have a Monday schedule at 10:30 A.M?', '2023-07-12 08:09:00', 0, 0),
(92, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', 'College', '', 'Employee in College', 'Ppa sched po ako, Monday 10:30 A.M', '2023-07-12 08:13:00', 0, 0);

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
  `service` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `dentist_name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalapp`
--

INSERT INTO `dentalapp` (`dentalapp_id`, `admin_id`, `idnumber`, `fullname`, `role`, `cenrolled`, `service`, `date_time`, `dentist_name`, `date_created`) VALUES
(21, 11, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT-3', 'Tooth Extraction', '2023-10-30 10:30:00', 'Apolinario Mabini', '2023-06-23 12:52:00'),
(22, 11, 123456789, 'Camila Salvador', 'Student', 'BSIT - 4', 'Tooth Extraction', '2023-06-29 10:30:00', 'Kristine Uy', '2023-06-23 06:24:00'),
(23, 11, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT - 4', 'Cleaning', '2023-07-01 10:30:00', 'Kristine Uy', '2023-06-23 06:30:00'),
(24, 11, 1234567, 'Camila Salvador', 'Student', 'BSIT - 4', 'Cleaning', '2023-06-30 10:40:00', 'Kristine Uy', '2023-06-23 06:33:00'),
(25, 11, 6802182, 'Joanna Mae Atento', 'Employee', '', 'Tooth Extraction', '2023-07-09 10:30:00', 'Kristine Uy', '2023-07-06 08:56:00'),
(26, 9, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT - 4', 'Cleaning', '2023-07-13 10:30:00', 'Kristine Uy', '0000-00-00 00:00:00'),
(27, 9, 6802182, 'Joanna Mae Atento', 'Student', 'Grade 7', 'Cleaning', '2023-12-15 10:30:00', 'Kristine Uy', '2023-07-12 09:21:00'),
(28, 9, 1234567, 'Camila Salvador', 'Student', 'Grade 8', 'Tooth Extraction', '2023-12-12 10:30:00', 'Kristine Uy', '2023-07-12 09:25:00'),
(29, 10, 1234567, 'Camila Salvador', 'Student', 'Grade 8', 'Cleaning', '2023-10-22 10:30:00', 'Kristine Uy', '2023-07-12 09:29:00'),
(30, 9, 1234567, 'Camila Salvador', 'Student', 'BSIT-3', 'Tooth Extraction', '2023-10-20 10:30:00', 'Kristine Uy', '2023-07-12 09:32:00'),
(31, 10, 1234567, 'Joanna Mae Atento', 'Student', 'BSIT-3', 'Cleaning', '2023-12-13 10:33:00', 'Kristine Uy', '2023-07-12 09:36:00');

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
(76, 24, 'WIN_20230311_16_23_23_Pro.jpg', 'Joanna Mae Atento', 6802182, '09156005165', 21, '2002-12-15', 'Female', 'Guinobatan', 'Student', 'BSIT - 3', 'College', 'Jojo Atento', '095768385342', 'Rowena Atento', '093576385645', '', '', '', '', '', '', '', '', '', '', '', 'eye_disorder', 'N/A', 'N/A', 'NO', 'NO', 'YES', 'NO', 'Edita Dela Cruz', '09156005167', 'Grandmother'),
(77, 25, 'WIN_20230203_15_00_13_Pro.jpg', 'Camila Salvador', 123456789, '09156005165', 21, '2001-12-15', 'Female', 'Guinobatan', 'Student', 'BSIT - 4', 'College', 'Jojo Atento', '093754836456', 'Rowena Atento', '091456005879', '', '', '', '', '', '', '', '', '', '', '', 'eye_disorder', 'N/A', 'N/A', '', '', 'YES', 'N/A', 'Edita Dela Cruz', '092325476546', 'Grandmother');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

CREATE TABLE `patientrecord` (
  `p_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `vitalsigns` varchar(200) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientrecord`
--

INSERT INTO `patientrecord` (`p_id`, `admin_id`, `idnumber`, `fullname`, `gradesection`, `vitalsigns`, `diagnosis`, `date_time`) VALUES
(5, 0, 0, 'Joanna Mae Atento', 'Grade 7 Saint Paul', '21', 'Advil', '2023-06-13 12:37:00'),
(6, 0, 0, 'Joanna Mae Atento', 'Grade 7 Saint', '9', 'Advil', '2023-06-13 12:39:00'),
(7, 9, 6802182, 'Joanna Mae Atento', 'Grade 7 Saint Paul', '12A', 'Advil', '2023-06-13 12:47:00'),
(8, 9, 1234567, 'Camila Salvador', 'Grade 7 Saint', '3853563', 'Biogesic', '2023-06-13 12:50:00'),
(9, 9, 1234567, 'Camila Salvador', 'Grade 7 Saint', '1234557', 'Buscopan', '2023-06-13 12:51:00'),
(10, 9, 6802182, 'Joanna Mae Atento', 'Employee', '24/7', 'Biogesic, Advil, Have Enough sleep', '2023-06-14 01:38:00'),
(11, 10, 6802182, 'Joanna Mae Atento', 'BSIT - 3', '457-7', 'Rest', '2023-06-14 09:56:00'),
(12, 9, 6802182, 'Joanna Mae Atento', 'Grade 7 Saint', '60/70', 'Mefinamic', '2023-06-23 11:36:00'),
(13, 9, 6802182, 'Joanna Mae Atento', 'Grade 8 Saint', '70/80', 'nEOZIP', '2023-06-23 11:38:00'),
(14, 10, 6802182, 'Joanna Mae Atento', 'Grade 12', '90/120', 'Neozip', '2023-06-23 11:40:00'),
(15, 10, 1234567, 'Camila Salvador', 'Grade 9', '24/7', 'Rest ', '2023-07-01 09:59:00'),
(16, 11, 6802182, 'Joanna Mae Atento', 'Employee', 'Not Normal', 'Rest', '2023-07-06 09:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `schoolhealthasses`
--

CREATE TABLE `schoolhealthasses` (
  `schoolasses_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `birthday` text NOT NULL,
  `gender` varchar(200) NOT NULL,
  `date` text NOT NULL,
  `weight` text NOT NULL,
  `height` varchar(20) NOT NULL,
  `bmi` text NOT NULL,
  `bp` text NOT NULL,
  `pr` text NOT NULL,
  `scalp` text NOT NULL,
  `skin_nails` text NOT NULL,
  `eyes` text NOT NULL,
  `visual_acuity` text NOT NULL,
  `ears` text NOT NULL,
  `hearing_test` text NOT NULL,
  `nose` text NOT NULL,
  `throat` text NOT NULL,
  `mouth_tongue` text NOT NULL,
  `teeth_gums` text NOT NULL,
  `chest_breasts` text NOT NULL,
  `heart` text NOT NULL,
  `lungs` text NOT NULL,
  `abdomen` text NOT NULL,
  `genitalia` text NOT NULL,
  `spine_extremities` text NOT NULL,
  `sexual` text NOT NULL,
  `screening` text NOT NULL,
  `otherfindings` text NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolhealthasses`
--

INSERT INTO `schoolhealthasses` (`schoolasses_id`, `admin_id`, `idnumber`, `fullname`, `birthday`, `gender`, `date`, `weight`, `height`, `bmi`, `bp`, `pr`, `scalp`, `skin_nails`, `eyes`, `visual_acuity`, `ears`, `hearing_test`, `nose`, `throat`, `mouth_tongue`, `teeth_gums`, `chest_breasts`, `heart`, `lungs`, `abdomen`, `genitalia`, `spine_extremities`, `sexual`, `screening`, `otherfindings`, `remarks`) VALUES
(7, 9, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-19', '42', '150', 'Normal', '60/70', '20', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'overall is good, passed'),
(8, 9, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-05', '45', '151', 'Normal', '100/70', '30', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'passed'),
(9, 9, 1234567, 'Camila Salvador', '2004-04-29', 'Female', '2023-07-14', '47', '153', 'Normal', '80/70', '20', 'Good', 'Good', 'Not Normal', 'Not Normal', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'good'),
(10, 10, 1234567, 'Camila Salvador', '2023-07-01', 'Female', '2023-07-26', '41', '161', 'Normal', '80/70', '21', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'PASSED'),
(11, 11, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-26', '45', '150', 'Normal', '90/70', '30', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'PASSED');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `roles` int(1) NOT NULL,
  `statuses1030_1` varchar(50) NOT NULL,
  `statuses1130_2` varchar(50) NOT NULL,
  `statuses230_3` varchar(50) NOT NULL,
  `statuses330_4` varchar(50) NOT NULL,
  `statuses430_5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `roles`, `statuses1030_1`, `statuses1130_2`, `statuses230_3`, `statuses330_4`, `statuses430_5`) VALUES
(8, 0, 'Available', 'Available', 'Available', 'Available', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `statuscollege`
--

CREATE TABLE `statuscollege` (
  `status_id` int(11) NOT NULL,
  `statuses1030_1` varchar(200) NOT NULL,
  `statuses1130_2` varchar(200) NOT NULL,
  `statuses230_3` varchar(200) NOT NULL,
  `statuses330_4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuscollege`
--

INSERT INTO `statuscollege` (`status_id`, `statuses1030_1`, `statuses1130_2`, `statuses230_3`, `statuses330_4`) VALUES
(1, 'Available', 'Available', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `statusshs`
--

CREATE TABLE `statusshs` (
  `status_id` int(11) NOT NULL,
  `statuses1030_1` varchar(50) NOT NULL,
  `statuses1130_2` varchar(50) NOT NULL,
  `statuses230_3` varchar(50) NOT NULL,
  `statuses330_4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusshs`
--

INSERT INTO `statusshs` (`status_id`, `statuses1030_1`, `statuses1130_2`, `statuses230_3`, `statuses330_4`) VALUES
(10, 'Available', 'Available', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type`, `fullname`, `idnumber`, `email`, `password`) VALUES
(24, '1', 'Joanna Mae Atento', 6802182, '06666@dwc-legazpi.edu', '$2y$10$oSSy892tBzn56X5n9JoiFemFQrHcdJcKIUCW8L5aYZgmmaF.9Xm4S'),
(25, '1', 'Camila Salvador', 1234567, 'camille@dwc-legazpi.edu', '$2y$10$Mt817fi.GicLwj8BLTFHg.AR7VvE14ra4eDj8akuBiv1HNlqx3pm.');

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
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  ADD PRIMARY KEY (`schoolasses_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statuscollege`
--
ALTER TABLE `statuscollege`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusshs`
--
ALTER TABLE `statusshs`
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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `healthrecord`
--
ALTER TABLE `healthrecord`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  MODIFY `schoolasses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statuscollege`
--
ALTER TABLE `statuscollege`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusshs`
--
ALTER TABLE `statusshs`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
