-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:52 AM
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
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'Nurse Edita', 'edita@dwc-legazpi.edu', '$2y$10$fcGjE/6lxScs57Vbgu9HV.ZsKa4Ky7NUj.NSUZPgfromKvYz2UnhK'),
(2, 'Nurse Edith', 'edith@dwc-legazpi.edu', '$2y$10$m7dgLE2yYPQrXXDU8tP4KuY8kuVpKr8/zVANbCPczSNEGUHueGfLu');

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
  `message` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_id`, `user_id`, `idnumber`, `name`, `dental_service`, `c_enrolled`, `message`, `date_created`) VALUES
(3, 0, 123456, 'Joanna Mae Atento', 'Cleaning', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(4, 0, 23456, 'Mae Atento', 'Tooth Extraction', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(5, 0, 123456, 'Joanna Mae Atento', 'Tooth Extraction', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(6, 0, 67, 'Mae Atento', 'Cleaning', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(7, 16, 76967, 'Mae Dela Cruz', 'Tooth Extraction', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(8, 16, 76967, 'Mae Dela Cruz', 'Cleaning', 'BSCS-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(9, 16, 76967, 'Mae Dela Cruz', 'Cleaning', 'BLISS-3', 'Ppa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(10, 19, 6802182, 'Mae Atento', 'Cleaning', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30'),
(11, 19, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'BSIT-3', 'Pa sched po ako, Monday 10:30 A.M', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecord`
--

CREATE TABLE `healthrecord` (
  `health_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `age` int(5) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `gradecourse` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
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

INSERT INTO `healthrecord` (`health_id`, `user_id`, `fullname`, `idnumber`, `contact`, `age`, `birthday`, `gender`, `role`, `gradecourse`, `address`, `fathername`, `cfather`, `mothername`, `cmother`, `polio`, `measles`, `tb`, `seizure_epilepsy`, `tetanus`, `mumps`, `hepatits`, `bleeding_tendencies`, `chicken_pox`, `asthma`, `fainting_spells`, `eye_disorder`, `heart`, `illness`, `allergyfood`, `allergymed`, `allow_not`, `medications`, `nameperson`, `personcp`, `relationship`) VALUES
(1, 1, 'test', 12345, 123456, 12, '2023-05-18', 'male', 'student', '12', '12', '', '', '', '', 'polio', '', '', '', '', '', '', '', '', 'asthma', '', '', 'heart', 'illness', 'yes', 'yes', 'yes', 'yes', 'yes', '123', 'yesy'),
(2, 0, 'Mae Atento', 89556, 0, 0, '0000-00-00', '', 'student', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 4, 'Mae Atento', 46, 45846975, 0, '2023-06-01', 'female', 'student', 'ret', '235', '', '', '', '', '', 'measles', '', '', '', '', '', '', '', '', '', '', '87238463', '45', '24dfjsnngh', 'dcsfvhgjk', 'dfkjg', 'adfhghjrk.', 'dfjhgkl', '09156005165', 'dfhbjgkl'),
(4, 13, '09156005165', 1234, 2147483647, 21, '2023-06-07', 'female', 'student', 'BSIT - 3', 'Natera St.', 'Joanna Mae De La Cruz', '56789', 'Jonna Marie Atento', '67878', 'polio', 'measles', '', '', '', '', '', '', '', '', '', '', 'fdhfj', 'fdgh', 'fjhgkh', 'adfgthy', 'sdfrgty', 'adfgt', 'efrt', '3467', 'dfgh'),
(5, 14, '+639952337012', 6098934, 2147483647, 21, '2023-06-02', 'female', 'student', 'BSIT - 3', 'Natera St.', 'Atento, Jonna Marie, D.', '56789', 'rowena', '67878', '', '', '', '', '', 'mumps', '', '', '', '', 'fainting_spells', 'eye_disorder', 'fhghjkj', 'efrgthy', 'dfgiohpy', 'fgekjrhlj', 'dfegrhjk', 'fghtj', 'dfghy', '95678', 'GrandMother'),
(6, 15, 'Joanna Mae De La Cruz Atento', 6802182, 2147483647, 21, '2001-12-15', 'Female', 'Student', 'BSIT - 3', 'Natera St. Calzada Guinobatan Albay', 'Jojo Atento', '0956723886547', 'Rowena Atento', '0965468837636', '', '', '', '', '', '', '', '', '', 'asthma', 'fainting_spells', 'eye_disorder', 'N/A', 'N/A', 'NO', 'NO', 'YES', 'NO', 'Edita Dela Cruz', '095783685723', 'GrandMother'),
(7, 16, 'Employee', 123456, 2147483647, 20, '2023-05-03', 'Male', 'Employee', 'Dean', 'Guinobatan Albay', 'Ramon Dela Cruz', '09265588434546', 'Edita Dela Cruz', '097585784587', '', '', 'tb', '', '', 'mumps', '', 'bleeding_tenden', '', '', '', '', 'adfkjgh', 'dahjfk', 'NO', 'NO', 'YES', 'NO', 'Joanna Atento', '0943537692', 'Parent'),
(8, 16, 'Employee', 19000, 2147483647, 21, '2023-05-17', 'Male', 'Student', 'BSIT-3', 'Guinobatan', 'Jojo Atento', '092738458775', 'Rowena Atento', '0945678876454', '', '', '', '', '', '', 'hepatits', '', '', 'asthma', '', 'eye_disorder', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Edita Dela Cruz', '0934356454', 'Grandmother'),
(10, 18, 'Mae Cruz', 2147483647, 2147483647, 21, '2023-05-18', 'Female', 'Student', 'BSIT-3', 'Guinobatan', 'Jojo Atento', '092738458775', 'Rowena Atento', '0945678876454', '', '', '', '', '', '', '', '', '', '', '', 'eye_disorder', '', '', '', '', 'Yes', 'No', 'Edita Dela Cruz', '09345675324', 'Grandmother'),
(13, 16, 'Employee', 12345, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(8, 'Available', 'Unavailable', 'Unavailable', 'Unavailable');

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
(5, '1', 'DWCL', 'dwclstudent@dwc-legazpi.edu', '$2y$10$rrWz5vy1Lj7JVvGMSmRshejxgcQ1gi2uV45dtI5OIvM'),
(7, '1', 'CSIT', 'csit@dwc-legazpi.edu', '$2y$10$QNaXTU88qCSEWMAf5dDdpOj86QORxKtxlDDv.n0QNPH'),
(16, '1', 'Employee', 'employees@dwc-legazpi.edu', '$2y$10$yGAMWqqs7ifuBtlto0h2mOONnDryEOOl8J3ufIrAxQz6q89iTxS56'),
(18, '1', 'Mae Cruz', 'mae@dwc-legazpi.edu', '$2y$10$tctOE9XaJ6cKw1ed3Mnzauq8Tp5sUGMnIklRU.VQMLN/O6SHURH9q'),
(19, '1', 'Mae Atento', 'maee@dwc-legazpi.edu', '$2y$10$x79Bdaf7Rb3X2pPa3qvzvekuW54g89koLBmKNNkizqHSskKoVqzt.');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `healthrecord`
--
ALTER TABLE `healthrecord`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
