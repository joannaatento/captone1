-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 06:58 PM
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
(68, 20, 6802182, 'Joanna Mae Atento', 'Cleaning', 'Grade School & Grade School & Junior High School', 'Grade 7 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-12 10:16:00', 1, 1),
(69, 20, 6802182, 'Joanna Mae Atento', 'Cleaning', 'Grade School & Grade School & Junior High School', 'Grade 7 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-06-12 11:14:00', 0, 0);

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
(74, 21, 'WIN_20230311_16_23_26_Pro.jpg', 'Employee Juan', 12345678, '09756578679', 22, '2000-12-15', 'Male', 'Polangui', 'Employee', 'Professor', 'Employee', 'Jose Rizal', '09145885479', 'Rowena Atento', '091476548368', '', '', '', '', '', '', '', '', '', '', 'fainting_spells', '', 'N/A', 'N/A', '', '', 'YES', 'NO', 'Tandang Sora', '091475865879', 'Grandmother'),
(75, 23, 'WIN_20230311_16_23_21_Pro.jpg', 'Charity Corpuz', 898989, '09275467589', 20, '2002-12-15', 'Female', 'Guinobatan', 'Student', 'BLISS-3', 'College', 'Marco Corpuz', '094375568768', 'Liezel Corpuz', '093477578996', 'polio', 'measles', '', '', '', '', '', '', '', '', '', 'eye_disorder', 'N/A', 'N/A', '', '', 'YES', 'NO', 'Domitilia Corpu', '092377435826', 'Grandmother');

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
(9, 9, 1234567, 'Camila Salvador', 'Grade 7 Saint', '1234557', 'Buscopan', '2023-06-13 12:51:00');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `healthrecord`
--
ALTER TABLE `healthrecord`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
