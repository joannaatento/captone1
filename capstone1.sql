-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 04:00 AM
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
(11, '', 'Nurse College', 'college@dwc-legazpi.edu', 3, '$2y$10$vgjsovnMxuz4nNvShLSKeuNSVpfsOswZ56y6yQFsO.MwH4f8BZrVC'),
(12, '', 'Physician GSJHSSHS', 'physiciangsjhsshs@dwc-legazpi.edu', 6, '$2y$10$/NDUtH.edNX.CfqGUzBl9.c.ares5.WtEot/xRwK8b4AOMRNt05uO'),
(13, '', 'Physician College', 'physiciancollege@dwc-legazpi.edu', 7, '$2y$10$.FIjfm6oWCXbv5uhGqxcy.N/vtM5UwM8./o50pf0RvH6s7fByJ8q6'),
(14, '', 'Dentist GSJHSSHS', 'dentistgsjhsshs@dwc-legazpi.edu', 4, '$2y$10$OOdBHtUQF38eWUVr9ZjccOlNO8g6ZmtWxkEZu3jLQyEBAipia.p3i'),
(15, '', 'Dentist College', 'dentistcollege@dwc-legazpi.edu', 5, '$2y$10$8xuw4mycJZ4f1sQeGiyoeOpV0aDXolN1YjXS3dv.4lqIChbF0Vm7O');

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
(89, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'Grade School & Grade School & Junior High School', 'Grade 7 Saint', '', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-07 08:30:00', 1, 1),
(90, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', '', '', 'Employee in GS and JHS', 'Pa sched po ako, Monday 10:30 A.M', '2023-07-11 09:13:00', 1, 1),
(91, 24, 6802182, 'Joanna Mae Atento', 'Tooth Extraction', 'College', 'BSIT - 3', '', 'Can I have a Monday schedule at 10:30 A.M?', '2023-07-12 08:09:00', 1, 0),
(92, 24, 6802182, 'Joanna Mae Atento', 'Cleaning', 'College', '', 'Employee in College', 'Ppa sched po ako, Monday 10:30 A.M', '2023-07-12 08:13:00', 1, 1),
(93, 26, 123123, 'Mae Atento', 'Cleaning', 'Grade School & Grade School & Junior High School', 'Grade 12', '', 'dfghjkhlfdsdfghjkh', '2023-07-19 10:57:00', 1, 1),
(94, 26, 123123, 'Mae Atento', 'Cleaning', '', '', 'Employee in North Campus', 'sdfghjjhgfdhsgshdfjgkhljkjhd', '2023-07-19 11:04:00', 1, 1),
(95, 26, 123123, 'Mae Atento', 'Tooth Extraction', '', '', 'Employee in South Campus', 'VBGHNMJHNGFF', '2023-07-21 06:01:00', 1, 1),
(96, 26, 123123, 'Mae Atento', 'Tooth Extraction', 'Grade School, JHS or SHS', 'Grade 12', '', 'sdfghjkuyjhgfcvn', '2023-07-21 07:30:00', 1, 1),
(97, 26, 123123, 'Mae Atento', 'Tooth Extraction', '', '', 'Employee in North Campus', 'ghcivobkhnjtrgfbnh', '2023-07-21 07:37:00', 1, 1);

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
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalapp`
--

INSERT INTO `dentalapp` (`dentalapp_id`, `admin_id`, `idnumber`, `fullname`, `role`, `cenrolled`, `service`, `date_time`, `date_created`) VALUES
(21, 11, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT-3', 'Tooth Extraction', '2023-10-30 10:30:00', '2023-06-23 12:52:00'),
(22, 11, 123456789, 'Camila Salvador', 'Student', 'BSIT - 4', 'Tooth Extraction', '2023-06-29 10:30:00', '2023-06-23 06:24:00'),
(23, 11, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT - 4', 'Cleaning', '2023-07-01 10:30:00', '2023-06-23 06:30:00'),
(24, 11, 1234567, 'Camila Salvador', 'Student', 'BSIT - 4', 'Cleaning', '2023-06-30 10:40:00', '2023-06-23 06:33:00'),
(25, 11, 6802182, 'Joanna Mae Atento', 'Employee', '', 'Tooth Extraction', '2023-07-09 10:30:00', '2023-07-06 08:56:00'),
(26, 9, 6802182, 'Joanna Mae Atento', 'Student', 'BSIT - 4', 'Cleaning', '2023-07-13 10:30:00', '0000-00-00 00:00:00'),
(27, 9, 6802182, 'Joanna Mae Atento', 'Student', 'Grade 7', 'Cleaning', '2023-12-15 10:30:00', '2023-07-12 09:21:00'),
(28, 9, 1234567, 'Camila Salvador', 'Student', 'Grade 8', 'Tooth Extraction', '2023-12-12 10:30:00', '2023-07-12 09:25:00'),
(29, 10, 1234567, 'Camila Salvador', 'Student', 'Grade 8', 'Cleaning', '2023-10-22 10:30:00', '2023-07-12 09:29:00'),
(30, 9, 1234567, 'Camila Salvador', 'Student', 'BSIT-3', 'Tooth Extraction', '2023-10-20 10:30:00', '2023-07-12 09:32:00'),
(31, 10, 1234567, 'Joanna Mae Atento', 'Student', 'BSIT-3', 'Cleaning', '2023-12-13 10:33:00', '2023-07-12 09:36:00'),
(32, 14, 1234567, 'Camila Salvador', 'Student', 'Grade 7', 'Cleaning', '2023-12-13 10:30:00', '2023-07-18 09:03:00'),
(33, 15, 123123, 'Mae Atento', 'Student', 'BSIT-3', 'Cleaning', '2023-10-24 10:30:00', '2023-07-21 06:26:00'),
(34, 14, 123123, 'Mae Atento', 'Student', 'Grade 12', 'Tooth Extraction', '2024-11-06 10:30:00', '2023-07-21 07:45:00'),
(35, 14, 99090, 'Rica Chan', 'Student', 'Grade 9', 'Cleaning', '2023-10-30 10:00:00', '2023-07-23 02:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformcollege`
--

CREATE TABLE `healthrecordformcollege` (
  `healthcollege_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `courseyear` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pcontact` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `fguardian` varchar(100) NOT NULL,
  `occupation1` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `occupation2` varchar(100) NOT NULL,
  `contactemer` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `contactno2` varchar(100) NOT NULL,
  `physiciannumcall` varchar(100) NOT NULL,
  `addresshospital` varchar(100) NOT NULL,
  `td` varchar(100) NOT NULL,
  `mmr` varchar(100) NOT NULL,
  `hepab` varchar(100) NOT NULL,
  `varicella` varchar(100) NOT NULL,
  `yesasthma` varchar(100) NOT NULL,
  `noasthma` varchar(100) NOT NULL,
  `relationasthma` text NOT NULL,
  `yesbleeding` varchar(100) NOT NULL,
  `nobleeding` varchar(100) NOT NULL,
  `relationbleeding` varchar(100) NOT NULL,
  `yescancer` varchar(100) NOT NULL,
  `nocancer` varchar(100) NOT NULL,
  `relationcancer` varchar(100) NOT NULL,
  `yesdiabetes` varchar(100) NOT NULL,
  `nodiabetes` varchar(100) NOT NULL,
  `relationdiabetes` varchar(100) NOT NULL,
  `yesheartdis` varchar(100) NOT NULL,
  `noheartdis` varchar(100) NOT NULL,
  `relationheartdis` varchar(100) NOT NULL,
  `yesbp` varchar(100) NOT NULL,
  `nobp` varchar(100) NOT NULL,
  `relationbp` varchar(100) NOT NULL,
  `yeskidney` varchar(100) NOT NULL,
  `nokidney` varchar(100) NOT NULL,
  `relationkidney` varchar(100) NOT NULL,
  `yesmental` varchar(100) NOT NULL,
  `nomental` varchar(100) NOT NULL,
  `relationmental` varchar(100) NOT NULL,
  `yesobese` varchar(100) NOT NULL,
  `noobese` varchar(100) NOT NULL,
  `relationobese` varchar(100) NOT NULL,
  `yesseizure` varchar(100) NOT NULL,
  `noseizure` varchar(100) NOT NULL,
  `relationseizure` varchar(100) NOT NULL,
  `yesstroke` varchar(100) NOT NULL,
  `nostroke` varchar(100) NOT NULL,
  `relationstroke` varchar(100) NOT NULL,
  `yestb` varchar(100) NOT NULL,
  `notb` varchar(100) NOT NULL,
  `relationtb` varchar(100) NOT NULL,
  `allergy` varchar(100) NOT NULL,
  `anemia` varchar(100) NOT NULL,
  `asthma` varchar(100) NOT NULL,
  `behavioral` varchar(100) NOT NULL,
  `bleedingprob` varchar(100) NOT NULL,
  `blood` varchar(100) NOT NULL,
  `chickenpox` varchar(100) NOT NULL,
  `convulsion` varchar(100) NOT NULL,
  `dengue` varchar(100) NOT NULL,
  `diabetess` varchar(100) NOT NULL,
  `earproblem` varchar(100) NOT NULL,
  `eating_disorder` varchar(100) NOT NULL,
  `epilepsy` varchar(100) NOT NULL,
  `eyeproblemm` varchar(100) NOT NULL,
  `fracture` varchar(100) NOT NULL,
  `hearing_problem` varchar(100) NOT NULL,
  `heart_disorder` varchar(100) NOT NULL,
  `hyperacidity` varchar(100) NOT NULL,
  `indigestion` varchar(100) NOT NULL,
  `insomia` varchar(100) NOT NULL,
  `kidney_problem` varchar(100) NOT NULL,
  `liver_problem` varchar(100) NOT NULL,
  `measless` varchar(100) NOT NULL,
  `mumpss` varchar(100) NOT NULL,
  `parasitism` varchar(100) NOT NULL,
  `pneumonia` varchar(100) NOT NULL,
  `primary_complex` varchar(100) NOT NULL,
  `scoliosis` varchar(100) NOT NULL,
  `skin_problem` varchar(100) NOT NULL,
  `tonsillitis` varchar(100) NOT NULL,
  `typhoid_fever` varchar(100) NOT NULL,
  `vision_defect` varchar(100) NOT NULL,
  `yeshospitalization` varchar(100) NOT NULL,
  `nohospitalization` varchar(100) NOT NULL,
  `yessurgical` varchar(100) NOT NULL,
  `nosurgical` varchar(100) NOT NULL,
  `specialmed` varchar(100) NOT NULL,
  `allergicdrugs` varchar(100) NOT NULL,
  `otherrelevant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformcollege`
--

INSERT INTO `healthrecordformcollege` (`healthcollege_id`, `user_id`, `image`, `fullname`, `courseyear`, `role`, `idnumber`, `gender`, `address`, `pcontact`, `nationality`, `birthday`, `religion`, `fguardian`, `occupation1`, `mother`, `occupation2`, `contactemer`, `contactno`, `address2`, `relation`, `referral`, `contactno2`, `physiciannumcall`, `addresshospital`, `td`, `mmr`, `hepab`, `varicella`, `yesasthma`, `noasthma`, `relationasthma`, `yesbleeding`, `nobleeding`, `relationbleeding`, `yescancer`, `nocancer`, `relationcancer`, `yesdiabetes`, `nodiabetes`, `relationdiabetes`, `yesheartdis`, `noheartdis`, `relationheartdis`, `yesbp`, `nobp`, `relationbp`, `yeskidney`, `nokidney`, `relationkidney`, `yesmental`, `nomental`, `relationmental`, `yesobese`, `noobese`, `relationobese`, `yesseizure`, `noseizure`, `relationseizure`, `yesstroke`, `nostroke`, `relationstroke`, `yestb`, `notb`, `relationtb`, `allergy`, `anemia`, `asthma`, `behavioral`, `bleedingprob`, `blood`, `chickenpox`, `convulsion`, `dengue`, `diabetess`, `earproblem`, `eating_disorder`, `epilepsy`, `eyeproblemm`, `fracture`, `hearing_problem`, `heart_disorder`, `hyperacidity`, `indigestion`, `insomia`, `kidney_problem`, `liver_problem`, `measless`, `mumpss`, `parasitism`, `pneumonia`, `primary_complex`, `scoliosis`, `skin_problem`, `tonsillitis`, `typhoid_fever`, `vision_defect`, `yeshospitalization`, `nohospitalization`, `yessurgical`, `nosurgical`, `specialmed`, `allergicdrugs`, `otherrelevant`) VALUES
(1, 34, '1_20221028_125623_0000.png', 'Vicky Robles', 'BSIT - 3', 'Student in College', 909090, 'Female', 'Guinobatan Albay', '09156005165', 'Filipino', '2001-12-15', 'Roman Catholic', 'Andres Robles', 'Lineman', 'Andrea Robles', 'Housewife', 'Andrea Robles', '09156005165', 'Guinobatan Albay', 'Daugther', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '', 'noasthma', '', '', 'nobleeding', '', '', 'nocancer', '', '', 'nodiabetes', '', '', 'noheartdis', '', '', 'nobp', '', '', 'nokidney', '', '', 'nomental', '', '', 'noobese', '', '', 'noseizure', '', '', 'nostroke', '', '', 'notb', '', 'allergy', 'anemia', 'asthma', 'behavioral', 'bleedingprob', 'blood', 'chickenpox', 'convulsion', 'dengue', 'diabetess', 'earproblem', 'eating_disorder', 'epilepsy', 'eyeproblemm', 'fracture', 'hearing_problem', 'heart_disorder', 'hyperacidity', 'indigestion', 'insomia', 'kidney_problem', 'liver_problem', 'measless', 'mumpss', 'parasitism', 'pneumonia', 'primary_complex', 'scoliosis', 'skin_problem', 'tonsillitis', 'typhoid_fever', 'vision_defect', '', 'nohospitalization', '', 'nosurgical', 'None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformgsjhs`
--

CREATE TABLE `healthrecordformgsjhs` (
  `healthgsjhs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gradelevel` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `cfather` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `cmother` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `bothparents` varchar(255) NOT NULL,
  `livesfather` varchar(255) NOT NULL,
  `livesmother` varchar(255) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `guardianname` varchar(255) NOT NULL,
  `guardianrelation` varchar(255) NOT NULL,
  `cguardian` varchar(255) NOT NULL,
  `altrelation` varchar(255) NOT NULL,
  `altrel` varchar(255) NOT NULL,
  `acontact` varchar(255) NOT NULL,
  `bcg` varchar(50) NOT NULL,
  `dpt` varchar(50) NOT NULL,
  `opv` varchar(50) NOT NULL,
  `hepa` varchar(50) NOT NULL,
  `measles` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `firstdose` varchar(50) NOT NULL,
  `seconddose` varchar(50) NOT NULL,
  `boosterdose` varchar(50) NOT NULL,
  `no` varchar(50) NOT NULL,
  `imagevac` varchar(200) NOT NULL,
  `asthma` varchar(50) NOT NULL,
  `faintingspells` varchar(50) NOT NULL,
  `allergicrhinitis` varchar(50) NOT NULL,
  `freqheadache` varchar(50) NOT NULL,
  `anxietydis` varchar(50) NOT NULL,
  `g6pd` varchar(50) NOT NULL,
  `bleedingclotting` varchar(50) NOT NULL,
  `hearingprob` varchar(50) NOT NULL,
  `hypergas` varchar(50) NOT NULL,
  `derma` varchar(50) NOT NULL,
  `hypertension` varchar(50) NOT NULL,
  `diabetes` varchar(50) NOT NULL,
  `hyperventilation` varchar(50) NOT NULL,
  `mens` varchar(50) NOT NULL,
  `othersmedical` varchar(50) NOT NULL,
  `heartcondition` text NOT NULL,
  `eyeproblem` text NOT NULL,
  `illness` text NOT NULL,
  `injuries` text NOT NULL,
  `treatment` text NOT NULL,
  `medication` text NOT NULL,
  `food` text NOT NULL,
  `firstaid` text NOT NULL,
  `concernshealth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformgsjhs`
--

INSERT INTO `healthrecordformgsjhs` (`healthgsjhs_id`, `user_id`, `image`, `gradelevel`, `role`, `fullname`, `idnumber`, `cp`, `age`, `gender`, `address`, `paddress`, `father`, `cfather`, `mother`, `cmother`, `religion`, `nationality`, `language`, `bothparents`, `livesfather`, `livesmother`, `guardian`, `guardianname`, `guardianrelation`, `cguardian`, `altrelation`, `altrel`, `acontact`, `bcg`, `dpt`, `opv`, `hepa`, `measles`, `others`, `firstdose`, `seconddose`, `boosterdose`, `no`, `imagevac`, `asthma`, `faintingspells`, `allergicrhinitis`, `freqheadache`, `anxietydis`, `g6pd`, `bleedingclotting`, `hearingprob`, `hypergas`, `derma`, `hypertension`, `diabetes`, `hyperventilation`, `mens`, `othersmedical`, `heartcondition`, `eyeproblem`, `illness`, `injuries`, `treatment`, `medication`, `food`, `firstaid`, `concernshealth`) VALUES
(30, 30, 'WIN_20230203_15_00_21_Pro.jpg', 'Grade 9', 'Student in GS/JHS', 'Rica Chan', 9909, '09156005165', '16', 'Female', 'Calzada Guinobatan Albay', 'Calzada Guinobatan Albay', '', '09467878686654', '', '0924354765848', 'Roman Catholic', 'Filipino', 'Bicol, Tagalog, English', '', '', '', 'guardian', 'Edita Dela Cruz', 'Grandmother', '09156005165', 'N/A', 'N/A', 'N/A', '', '', '', '', '', '', '', 'seconddose', '', '', 'WIN_20230203_15_00_23_Pro.jpg', '', '', '', '', '', '', '', 'hearingprob', '', '', '', '', '', 'mens', '', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'Yes', 'None'),
(31, 31, 'WIN_20230203_15_00_08_Pro.jpg', '', 'Employee in GS/JHS', 'Employee GSJHS', 1234, '09156005165', '32', 'Female', 'Guinobatan Albay', 'Guinobatan Albay', '', '09243576847', '', '09156005165', 'Roman Catholic', 'Filipino', 'Bicol, Tagalog, English', '', '', 'livesmother', '', '', '', '09156005165', '', '', '', '', '', '', '', 'measles', '', '', 'seconddose', '', '', 'WIN_20230203_15_00_13_Pro.jpg', '', 'faintingspells', '', '', '', 'g6pd', '', '', '', '', '', '', '', '', '', 'None', 'None', 'None', 'None', 'None', '', 'None', 'Yes', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformshs`
--

CREATE TABLE `healthrecordformshs` (
  `healthshs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gradelevel` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `age` varchar(50) NOT NULL,
  `pcontact` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `cfather` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `cmother` varchar(255) NOT NULL,
  `polio` varchar(100) NOT NULL,
  `tetanus` varchar(100) NOT NULL,
  `chickenpox` varchar(100) NOT NULL,
  `measles` varchar(100) NOT NULL,
  `mumps` varchar(100) NOT NULL,
  `tb` varchar(100) NOT NULL,
  `asthma` varchar(100) NOT NULL,
  `hepatitis` varchar(100) NOT NULL,
  `faintingspells` varchar(255) NOT NULL,
  `seizure` varchar(255) NOT NULL,
  `bleeding` varchar(255) NOT NULL,
  `eyedis` varchar(255) NOT NULL,
  `heartailment` varchar(255) NOT NULL,
  `otherillness` varchar(255) NOT NULL,
  `yesfood` varchar(50) NOT NULL,
  `nofood` varchar(50) NOT NULL,
  `food` text NOT NULL,
  `yesmed` varchar(50) NOT NULL,
  `nomed` varchar(255) NOT NULL,
  `med` text NOT NULL,
  `allow` varchar(255) NOT NULL,
  `notallow` varchar(255) NOT NULL,
  `medpresent` text NOT NULL,
  `notified` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformshs`
--

INSERT INTO `healthrecordformshs` (`healthshs_id`, `user_id`, `image`, `gradelevel`, `fullname`, `role`, `idnumber`, `age`, `pcontact`, `gender`, `address`, `paddress`, `father`, `cfather`, `mother`, `cmother`, `polio`, `tetanus`, `chickenpox`, `measles`, `mumps`, `tb`, `asthma`, `hepatitis`, `faintingspells`, `seizure`, `bleeding`, `eyedis`, `heartailment`, `otherillness`, `yesfood`, `nofood`, `food`, `yesmed`, `nomed`, `med`, `allow`, `notallow`, `medpresent`, `notified`, `contact`, `relationship`) VALUES
(2, 32, 'WIN_20230311_16_23_34_Pro.jpg', 'Grade 12', 'Joanna Mae Atento', 'Student in SHS', 6802182, '19', '093574348673', 'Female', 'Calzada Guinobatan Albay', 'Calzada Guinobatan Albay', 'Jojo Atento', '093458685422', 'Rowena Atento', '094647456337', '', '', '', '', '', '', '', '', 'faintingspells', '', '', 'eyedis', 'None', '', '', 'nofood', '', '', 'nomed', '', 'allow', '', 'No', 'Edita Dela Cruz', '09156005165', 'Grandmother'),
(3, 33, 'WIN_20230311_16_23_21_Pro.jpg', '', 'Employee SHS', 'Employee in SHS', 1919, '29', '09156005165', 'Female', 'Polangui', 'Polangui', 'Jojo Ateto', '0947533678524', 'Rowena Atento', '092345676586', 'polio', '', '', '', '', '', 'asthma', '', '', '', 'bleeding', '', 'None', 'None', '', 'nofood', '', '', 'nomed', '', 'allow', '', 'None', 'Edita Dela Cruz', '09156005165', 'Auntie');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `idnumber2` int(11) NOT NULL,
  `name2` varchar(50) NOT NULL,
  `gradecourseyear2` varchar(50) NOT NULL,
  `idnumber3` int(11) NOT NULL,
  `name3` varchar(50) NOT NULL,
  `gradecourseyear3` varchar(50) NOT NULL,
  `idnumber4` int(11) NOT NULL,
  `name4` varchar(50) NOT NULL,
  `gradecourseyear4` varchar(50) NOT NULL,
  `idnumber5` int(11) NOT NULL,
  `name5` varchar(50) NOT NULL,
  `gradecourseyear5` varchar(50) NOT NULL,
  `c_enrolled` varchar(100) NOT NULL,
  `c_employee` varchar(50) NOT NULL,
  `onoff` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_read` int(11) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`med_id`, `user_id`, `idnumber`, `name1`, `gradecourseyear1`, `idnumber2`, `name2`, `gradecourseyear2`, `idnumber3`, `name3`, `gradecourseyear3`, `idnumber4`, `name4`, `gradecourseyear4`, `idnumber5`, `name5`, `gradecourseyear5`, `c_enrolled`, `c_employee`, `onoff`, `message`, `date_created`, `is_read`, `is_deleted_on_website`) VALUES
(1, 24, 6802182, 'Joanna Mae Atento', 'Grade 9', 1234567, 'Camila Salvador', 'Grade 9', 12345678, 'Jan Rica Marchan', 'Grade 9', 1334564, 'Patricia Hinlo', 'Grade 9', 8359465, 'Eric Baraquiel', 'Grade 9', 'Grade School & Junior High School', '', 'On-campus Activity', 'pa sched po for instrams', '2023-07-14 01:43:00', 1, 1),
(2, 24, 6802182, 'Joanna Mae Atento', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in GS and JHS', 'On-campus Activity', 'Can I request a medical schedule on July 2, 2023 at 9:00 A.M?', '2023-07-14 03:10:00', 1, 1),
(3, 25, 1234567, 'Camila Salvador', 'Grade 11 - Grabsch', 6802182, 'Joanna Mae Atento', 'Grade 11 - Grabsch', 0, '', '', 0, '', '', 0, '', '', 'Senior High School', '', 'Off-campus Activity', 'Can we have an schedule on July 21, 2023 at 10:30AM?', '2023-07-15 04:09:00', 1, 1),
(4, 25, 1234567, 'Camila Salvador', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in SHS', 'On-campus Activity', 'Can I a July 29, 2023 at 9:00AM schedule?', '2023-07-15 04:26:00', 1, 1),
(5, 25, 1234567, 'Camila Salvador', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in SHS', 'Off-campus Activity', 'can i', '2023-07-15 04:43:00', 1, 1),
(6, 25, 1234567, 'Camila Salvador', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in SHS', 'Off-campus Activity', 'CAN', '2023-07-15 04:50:00', 1, 1),
(7, 25, 1234567, 'Camila Salvador', 'BSIT - 3', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 'College', '', 'On-campus Activity', 'Pa sched po July 1, 2023 at 10:00 AM', '2023-07-15 05:36:00', 1, 1),
(8, 25, 1234567, 'Camila Salvador', 'BSIT - 3', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 'College', '', 'On-campus Activity', 'July 1, 2023 8:00AM', '2023-07-15 05:48:00', 1, 1),
(9, 25, 1234567, 'Camila Salvador', 'BSIT - 3 ', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in College', 'On-campus Activity', 'July 2, 2023 at 1:30PM', '2023-07-15 05:58:00', 1, 1),
(10, 26, 123123, 'Mae Atento', 'Grade 9', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 'Grade School & Junior High School', '', 'On-campus Activity', 'SDFGHJKHGFDFGHYJU', '2023-07-20 08:53:00', 1, 1),
(11, 26, 123123, 'Mae Atento', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in GS and JHS', 'Off-campus Activity', 'ASDSFGHJKJGHFGDFSDAS', '2023-07-20 09:12:00', 1, 1),
(12, 26, 123123, 'Mae Atento', 'Grade 11', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 'Senior High School', 'Employee in SHS', 'Off-campus Activity', 'awefrtyhuikujythgtrfds', '2023-07-20 10:26:00', 1, 1),
(13, 26, 123123, 'Mae Atento', 'BSIT - 3', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 'College', '', 'Off-campus Activity', 'ASDFDGHJKKJHGF', '2023-07-20 11:14:00', 1, 1),
(14, 26, 123123, 'Mae Atento', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', 'Employee in College', 'On-campus Activity', 'ASFSGDHFJGFHGFD', '2023-07-20 11:22:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicalapp`
--

CREATE TABLE `medicalapp` (
  `medicalapp_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `onoff` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalapp`
--

INSERT INTO `medicalapp` (`medicalapp_id`, `admin_id`, `idnumber`, `name1`, `gradecourseyear1`, `role`, `onoff`, `date_time`, `date_created`) VALUES
(2, 9, 6802182, 'Joanna Mae Atento', 'Grade 10', 'Student', 'On-campus Activity', '2023-06-19 10:30:00', '2023-07-14 04:39:00'),
(3, 9, 1234567, 'Camila Salvador', 'Grade 9', 'Student', 'On-campus Activity', '2023-12-15 11:00:00', '2023-07-14 04:50:00'),
(5, 10, 1234567, 'Camila Salvador', 'Grade 11', 'Student', 'Off-campus Activity', '2023-07-21 10:30:00', '2023-07-15 03:57:00'),
(6, 11, 1234567, 'Camila Salvador', 'BSIT - 3', 'Student', 'Off-campus Activity', '2023-08-01 08:30:00', '2023-07-15 05:29:00'),
(7, 11, 1234567, 'Camila Salvador', '', 'Employee', 'Off-campus Activity', '2023-07-02 09:00:00', '2023-07-15 06:06:00'),
(8, 9, 123123, 'Mae Atento', 'Grade 9', 'Student', 'On-campus Activity', '2023-10-24 10:30:00', '2023-07-20 09:32:00'),
(9, 10, 123123, 'Mae Atento', 'Grade 11 - Grabsch', 'Student', 'On-campus Activity', '2023-12-15 10:30:00', '2023-07-20 10:43:00'),
(10, 9, 1234, 'Employee GSJHS', '', 'Employee', 'On-campus Activity', '2023-10-30 16:00:00', '2023-07-23 02:23:00');

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
(16, 11, 6802182, 'Joanna Mae Atento', 'Employee', 'Not Normal', 'Rest', '2023-07-06 09:02:00'),
(17, 9, 123123, 'Mae Cruz', 'Grade 9', '60/90', 'Headache', '2023-07-20 09:38:00'),
(18, 10, 123123, 'Mae Atento', 'Grade 12', '60/90', 'Rest', '2023-07-20 10:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `physician_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gradecourseyear` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_read` int(11) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`physician_id`, `user_id`, `idnumber`, `name`, `gradecourseyear`, `role`, `message`, `date_created`, `is_read`, `is_deleted_on_website`) VALUES
(12, 25, 1234567, 'Camila Salvador', '', 'Employee in South Campus', 'dfvdghijotehgdfsa', '2023-07-18 07:37:00', 0, 1),
(13, 25, 1234567, 'Camila Salvador', '', 'Employee in North Campus', 'DFGHJKULIOUTKJTHGFDSC', '2023-07-18 07:38:00', 1, 1),
(14, 25, 1234567, 'Camila Salvador', '', 'Employee in South Campus', 'FGHJKKYUJTHRGFE', '2023-07-18 07:45:00', 1, 1),
(15, 26, 123123, 'Mae Atento', 'Grade 7 Saint', 'Student in North Campus', 'cfgbhnjkjytergvhh', '2023-07-21 09:33:00', 1, 1),
(16, 26, 123123, 'Mae Atento', 'Grade 12', 'Student in North Campus', 'fvdgfhjkjhgf', '2023-07-21 11:48:00', 1, 1),
(17, 26, 123123, 'Mae Atento', '', 'Employee in South Campus', 'ASXDCFVGBHNMJ', '2023-07-21 11:59:00', 1, 0),
(18, 26, 123123, 'Mae Atento', '', 'Student in South Campus', 'SFGHNJMK', '2023-07-21 11:59:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `physicianapp`
--

CREATE TABLE `physicianapp` (
  `phy_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `cenrolled` varchar(50) NOT NULL,
  `role` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianapp`
--

INSERT INTO `physicianapp` (`phy_id`, `admin_id`, `idnumber`, `fullname`, `cenrolled`, `role`, `date_time`, `date_created`) VALUES
(8, 13, 1234567, 'Camila Salvador', 'BSIT - 3', 'Student in College', '2023-12-15 10:30:00', '2023-07-18 08:27:00'),
(9, 12, 6802182, 'Joanna Mae Atento', 'Grade 12', 'Student in North Campus', '2023-10-24 10:30:00', '2023-07-18 08:30:00'),
(10, 12, 123123, 'Mae Atento', 'Grade 12', 'Student in North Campus', '2023-12-15 10:30:00', '2023-07-21 10:39:00'),
(11, 12, 123123, 'Mae Atento', 'Grade 12', 'Employee in North Campus', '2023-01-16 10:03:00', '2023-07-21 10:44:00'),
(12, 13, 123123, 'Mae Atento', '', 'Employee in College', '2023-11-12 10:10:00', '2023-07-22 12:14:00');

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
(11, 11, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-26', '45', '150', 'Normal', '90/70', '30', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'PASSED'),
(12, 9, 123123, 'Mae Atento', '2001-12-15', 'Female', '2023-07-20', '42', '152', 'Normal', '60/70', '20', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'good');

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
(8, 0, 'Unavailable', 'Available', 'Available', 'Unavailable', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `statuscollege`
--

CREATE TABLE `statuscollege` (
  `status_id` int(11) NOT NULL,
  `statuses1030_1` varchar(200) NOT NULL,
  `statuses1130_2` varchar(200) NOT NULL,
  `statuses230_3` varchar(200) NOT NULL,
  `statuses330_4` varchar(200) NOT NULL,
  `statuses430_5` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuscollege`
--

INSERT INTO `statuscollege` (`status_id`, `statuses1030_1`, `statuses1130_2`, `statuses230_3`, `statuses330_4`, `statuses430_5`) VALUES
(1, 'Unavailable', 'Available', 'Available', 'Unavailable', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollege`
--

CREATE TABLE `statusmedicalcollege` (
  `medical_id` int(11) NOT NULL,
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollege`
--

INSERT INTO `statusmedicalcollege` (`medical_id`, `statusmedmonam_1`, `statusmedtueam_2`, `statusmedwedam_3`, `statusmedthuam_4`, `statusmedfriam_5`, `statusmedmonpm_6`, `statusmedtuepm_7`, `statusmedwedpm_8`, `statusmedthupm_9`, `statusmedfripm_10`) VALUES
(1, 'Available', 'Unavailable', 'Unavailable', 'Available', 'Available', 'Unavailable', 'Available', 'Available', 'Unavailable', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhs`
--

CREATE TABLE `statusmedicalgsjhs` (
  `medical_id` int(11) NOT NULL,
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhs`
--

INSERT INTO `statusmedicalgsjhs` (`medical_id`, `statusmedmonam_1`, `statusmedtueam_2`, `statusmedwedam_3`, `statusmedthuam_4`, `statusmedfriam_5`, `statusmedmonpm_6`, `statusmedtuepm_7`, `statusmedwedpm_8`, `statusmedthupm_9`, `statusmedfripm_10`) VALUES
(1, 'Unavailable', 'Available', 'Available', 'Available', 'Available', 'Available', 'Unavailable', 'Unavailable', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshs`
--

CREATE TABLE `statusmedicalshs` (
  `medical_id` int(11) NOT NULL,
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshs`
--

INSERT INTO `statusmedicalshs` (`medical_id`, `statusmedmonam_1`, `statusmedtueam_2`, `statusmedwedam_3`, `statusmedthuam_4`, `statusmedfriam_5`, `statusmedmonpm_6`, `statusmedtuepm_7`, `statusmedwedpm_8`, `statusmedthupm_9`, `statusmedfripm_10`) VALUES
(1, 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Unavailable', 'Unavailable', 'Available', 'Available');

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
  `fullname` varchar(50) NOT NULL,
  `leveleduc` int(5) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `leveleduc`, `idnumber`, `email`, `password`) VALUES
(25, 'Camila Salvador', 0, 1234567, 'camille@dwc-legazpi.edu', '$2y$10$Mt817fi.GicLwj8BLTFHg.AR7VvE14ra4eDj8akuBiv1HNlqx3pm.'),
(26, 'Mae Atento', 0, 123123, '123123@dwc-legazpi.edu', '$2y$10$BKRDIIR3Ppz.qfDw6Gy6NuTbOHwgcwqpRA.MGGJ.LTZvGMMxauV6W'),
(29, 'Joanna Atento', 1, 2147483647, '12345678910@dwc-legazpi.edu', '$2y$10$abLEHbiWOYxwaDYOaAIA7.MLAJZUAF2DlW8tSbkIp9fY4Rhiubkpe'),
(30, 'Rica Chan', 1, 99090, 'ricachan@dwc-legazpi.edu', '$2y$10$qtLW5wQj9joNVIrKSnW9EeqLrVrEmnYNsD1RddnyJfTv13kAwUDUW'),
(31, 'Employee GSJHS', 1, 1234, '1234@dwc-legazpi.edu', '$2y$10$ow7RotJ9skoiZalQ6gFtaOulAQregw0YFU4FepO.TZXiR9a/78BGO'),
(32, 'Joanna Mae Atento', 2, 6802182, '068021821@dwc-legazpi.edu', '$2y$10$leQ0MHbc2sBPAFd45lomtOAHgsfiLjLDh4sOdeBFHw6XdrHk1NzRm'),
(33, 'Employee SHS', 2, 1919, '1919@dwc-legazpi.edu', '$2y$10$lkDH3vJNUkC2Y2NbT.OzBOQVXwG/BZa66OYK9M29LkhH8HjIlC9pS'),
(34, 'Vicky Robles', 3, 909090, '909090@dwc-legazpi.edu', '$2y$10$4wSfYPbUXUFtsY7nX/eYWOCNmaeLRHydyF7ibVBZ0jew4Q9JGzuwm');

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
-- Indexes for table `healthrecordformcollege`
--
ALTER TABLE `healthrecordformcollege`
  ADD PRIMARY KEY (`healthcollege_id`);

--
-- Indexes for table `healthrecordformgsjhs`
--
ALTER TABLE `healthrecordformgsjhs`
  ADD PRIMARY KEY (`healthgsjhs_id`);

--
-- Indexes for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  ADD PRIMARY KEY (`healthshs_id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medicalapp`
--
ALTER TABLE `medicalapp`
  ADD PRIMARY KEY (`medicalapp_id`);

--
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`physician_id`);

--
-- Indexes for table `physicianapp`
--
ALTER TABLE `physicianapp`
  ADD PRIMARY KEY (`phy_id`);

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
-- Indexes for table `statusmedicalcollege`
--
ALTER TABLE `statusmedicalcollege`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalgsjhs`
--
ALTER TABLE `statusmedicalgsjhs`
  ADD PRIMARY KEY (`medical_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `healthrecordformcollege`
--
ALTER TABLE `healthrecordformcollege`
  MODIFY `healthcollege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `healthrecordformgsjhs`
--
ALTER TABLE `healthrecordformgsjhs`
  MODIFY `healthgsjhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  MODIFY `healthshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medicalapp`
--
ALTER TABLE `medicalapp`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `physician`
--
ALTER TABLE `physician`
  MODIFY `physician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `physicianapp`
--
ALTER TABLE `physicianapp`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  MODIFY `schoolasses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `statusmedicalcollege`
--
ALTER TABLE `statusmedicalcollege`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusmedicalgsjhs`
--
ALTER TABLE `statusmedicalgsjhs`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusshs`
--
ALTER TABLE `statusshs`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
