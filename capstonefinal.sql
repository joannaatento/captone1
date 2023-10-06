-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2023 at 10:26 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u857174813_healthclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `role`, `password`) VALUES
(36, 'Dentist', 'denstist@dwc-legazpi.edu', 5, '$2y$10$DJKA2M2KNPHxLov3/Npu7egXtoYsbAMt4xHGFcPcxmwIKcK.zEV8y'),
(37, 'Dentist College', 'dentistcollege@dwc-legazpi.edu', 5, '$2y$10$kWoI2awhWLvlEBZPOqrqh.O3JnFnueFNVLen6o9m1yXVg4m7uihjK'),
(38, 'Nurse College', 'nursecollege@dwc-legazpi.edu', 3, '$2y$10$b9S10GMSwCPq5rJGJ3BB..pFzQ56vb.kYwtjTxo7zSlx9G.gRLNr6');

-- --------------------------------------------------------

--
-- Table structure for table `consultationformrecord`
--

CREATE TABLE `consultationformrecord` (
  `consultform_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(20) NOT NULL,
  `chiefcomplaint` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultationformrecordcollege`
--

CREATE TABLE `consultationformrecordcollege` (
  `consultform_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `courseyear` varchar(20) NOT NULL,
  `chiefcomplaint` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentalapp`
--

CREATE TABLE `dentalapp` (
  `dentalapp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `service` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `sched_time` varchar(50) NOT NULL,
  `gradecourseyear` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentalappcollege`
--

CREATE TABLE `dentalappcollege` (
  `dentalapp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `service` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `sched_time` varchar(50) NOT NULL,
  `gradecourseyear` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL,
  `done_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalappcollege`
--

INSERT INTO `dentalappcollege` (`dentalapp_id`, `user_id`, `idnumber`, `fullname`, `service`, `phoneno`, `date_time`, `sched_time`, `gradecourseyear`, `role`, `created_at`, `is_deleted_on_website`, `availability`, `status`, `done_status`) VALUES
(82, 120, '07002799', 'Jan Rica M. Marchan', 'Cleaning', '+639156005165', '2023-10-06', '09:00AM', 'BSA - 2', 'Student in College', '2023-09-30 08:05:33', 0, 1, 'Unavailable', 'Done'),
(83, 120, '07002799', 'Jan Rica M. Marchan', 'Cleaning', '+639156005165', '2023-10-06', '11:00AM', 'BSA - 2', 'Student in College', '2023-09-30 08:14:46', 0, 1, 'Unavailable', 'Done'),
(84, 120, '07002799', 'Jan Rica M. Marchan', 'Cleaning', '+639156005165', '2023-10-05', '11:00AM', 'BSA - 2', 'Student in College', '2023-09-30 08:15:06', 0, 1, 'Unavailable', 'Done'),
(85, 120, '07002799', 'Jan Rica M. Marchan', 'Tooth Extraction', '+639156005165', '2023-10-04', '10:00AM', 'BSIT - 2', 'Student in College', '2023-09-30 08:15:24', 0, 1, 'Unavailable', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformcollege`
--

CREATE TABLE `healthrecordformcollege` (
  `healthcollege_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
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
  `relation` varchar(100) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `contactno2` varchar(100) NOT NULL,
  `physiciannumcall` varchar(100) NOT NULL,
  `addresshospital` varchar(100) NOT NULL,
  `td` varchar(100) NOT NULL,
  `mmr` varchar(100) NOT NULL,
  `hepab` varchar(100) NOT NULL,
  `varicella` varchar(100) NOT NULL,
  `asthma_history` varchar(100) NOT NULL,
  `asthma_relation` text NOT NULL,
  `bleedingtendency_history` varchar(100) NOT NULL,
  `bleedingtendency_relation` varchar(100) NOT NULL,
  `cancer_history` varchar(100) NOT NULL,
  `cancer_relation` varchar(100) NOT NULL,
  `diabetes_history` varchar(100) NOT NULL,
  `diabetes_relation` varchar(100) NOT NULL,
  `heartdisorder_history` varchar(100) NOT NULL,
  `heartdisorder_relation` varchar(100) NOT NULL,
  `highblood_history` varchar(100) NOT NULL,
  `highblood_relation` varchar(100) NOT NULL,
  `kidneyproblem_history` varchar(100) NOT NULL,
  `kidneyproblem_relation` varchar(100) NOT NULL,
  `mentaldisorder_history` varchar(100) NOT NULL,
  `mentaldisorder_relation` varchar(100) NOT NULL,
  `obesity_history` varchar(100) NOT NULL,
  `obesity_relation` varchar(100) NOT NULL,
  `seizuredisorder_history` varchar(100) NOT NULL,
  `seizuredisorder_relation` varchar(100) NOT NULL,
  `stroke_history` varchar(100) NOT NULL,
  `stroke_relation` varchar(100) NOT NULL,
  `tb_history` varchar(100) NOT NULL,
  `tb_relation` varchar(100) NOT NULL,
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
  `hospitalization_history` varchar(100) NOT NULL,
  `surgicaloperation_history` varchar(100) NOT NULL,
  `specialmed` varchar(100) NOT NULL,
  `allergicdrugs` varchar(100) NOT NULL,
  `otherrelevant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformcollege`
--

INSERT INTO `healthrecordformcollege` (`healthcollege_id`, `user_id`, `image`, `idnumber`, `fullname`, `gender`, `address`, `pcontact`, `nationality`, `birthday`, `religion`, `fguardian`, `occupation1`, `mother`, `occupation2`, `contactemer`, `contactno`, `relation`, `referral`, `contactno2`, `physiciannumcall`, `addresshospital`, `td`, `mmr`, `hepab`, `varicella`, `asthma_history`, `asthma_relation`, `bleedingtendency_history`, `bleedingtendency_relation`, `cancer_history`, `cancer_relation`, `diabetes_history`, `diabetes_relation`, `heartdisorder_history`, `heartdisorder_relation`, `highblood_history`, `highblood_relation`, `kidneyproblem_history`, `kidneyproblem_relation`, `mentaldisorder_history`, `mentaldisorder_relation`, `obesity_history`, `obesity_relation`, `seizuredisorder_history`, `seizuredisorder_relation`, `stroke_history`, `stroke_relation`, `tb_history`, `tb_relation`, `allergy`, `anemia`, `asthma`, `behavioral`, `bleedingprob`, `blood`, `chickenpox`, `convulsion`, `dengue`, `diabetess`, `earproblem`, `eating_disorder`, `epilepsy`, `eyeproblemm`, `fracture`, `hearing_problem`, `heart_disorder`, `hyperacidity`, `indigestion`, `insomia`, `kidney_problem`, `liver_problem`, `measless`, `mumpss`, `parasitism`, `pneumonia`, `primary_complex`, `scoliosis`, `skin_problem`, `tonsillitis`, `typhoid_fever`, `vision_defect`, `hospitalization_history`, `surgicaloperation_history`, `specialmed`, `allergicdrugs`, `otherrelevant`) VALUES
(23, 120, '1.png', '07002799', 'Jan Rica M. Marchan', 'Female', 'Mayon, Daraga', '+639922863038', 'Filipino', '2000-04-28', 'Roman Catholic', 'Bobby E. Marchan', 'Forman', 'Rosiel M. Marchan', 'Housewife', 'Rosiel M. Marchan', '+639156005165', 'Mother', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'no', '', 'allergy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformgsjhs`
--

CREATE TABLE `healthrecordformgsjhs` (
  `healthnogsjhs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `birthday` varchar(200) NOT NULL,
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
  `student_lives` varchar(255) NOT NULL,
  `guardianname` varchar(255) NOT NULL,
  `guardianrelation` varchar(255) NOT NULL,
  `cguardian` varchar(255) NOT NULL,
  `bcg` varchar(50) NOT NULL,
  `dpt` varchar(50) NOT NULL,
  `opv` varchar(50) NOT NULL,
  `hepa` varchar(50) NOT NULL,
  `measles` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `vaccination` varchar(50) NOT NULL,
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
  `heartcondition` varchar(200) NOT NULL,
  `heartcon_specify` text NOT NULL,
  `eyeproblem` varchar(200) NOT NULL,
  `eyeprob_specify` text NOT NULL,
  `seriousillness` varchar(200) NOT NULL,
  `seriousillness_specify` text NOT NULL,
  `surgeries_injuries` varchar(200) NOT NULL,
  `surgeries_injuries_specify` text NOT NULL,
  `medicationtreatment` varchar(200) NOT NULL,
  `medicationtreatment_specify` text NOT NULL,
  `allergiesmed` varchar(200) NOT NULL,
  `allergiesmed_specify` text NOT NULL,
  `allergiesfood` varchar(200) NOT NULL,
  `allergiesfood_specify` text NOT NULL,
  `firstaid` varchar(200) NOT NULL,
  `concerns` varchar(200) NOT NULL,
  `concerns_specify` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformshs`
--

CREATE TABLE `healthrecordformshs` (
  `healthshs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `birthday` varchar(200) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
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
  `allergy_food` varchar(50) NOT NULL,
  `allergyfood_specify` text NOT NULL,
  `allergy_med` varchar(50) NOT NULL,
  `allergymed_specify` text NOT NULL,
  `give_med` varchar(255) NOT NULL,
  `take_medication` varchar(50) NOT NULL,
  `take_medication_specify` varchar(50) NOT NULL,
  `notified` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalapp`
--

CREATE TABLE `medicalapp` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalappcollege`
--

CREATE TABLE `medicalappcollege` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL,
  `done_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalappcollege`
--

INSERT INTO `medicalappcollege` (`medicalapp_id`, `user_id`, `idnumber`, `fullname`, `gradecourseyear1`, `phoneno`, `date_time`, `sched_time`, `role`, `onoff`, `created_at`, `is_deleted_on_website`, `availability`, `status`, `done_status`) VALUES
(7, 120, '07002799', 'Jan Rica M. Marchan', 'BSIT - 2', '+639156005165', '2023-10-06', '04:00PM', 'Student in College', 'On-campus Activity', '2023-09-30 09:44:26', 0, 1, 'Unavailable', ''),
(8, 120, '07002799', 'Jan Rica M. Marchan', 'BSIT - 1', '+639156005165', '2023-10-05', '08:00AM', 'Student in College', 'On-campus Activity', '2023-09-30 09:45:37', 0, 1, 'Unavailable', ''),
(9, 120, '07002799', 'Jan Rica M. Marchan', 'BSIT - 1', '+639156005165', '2023-10-04', '10:00AM', 'Student in College', 'On-campus Activity', '2023-09-30 09:45:58', 0, 1, 'Unavailable', ''),
(10, 120, '07002799', 'Jan Rica M. Marchan', 'BSIT - 1', '+639156005165', '2023-10-03', '09:00AM', 'Student in College', 'On-campus Activity', '2023-09-30 09:50:31', 0, 1, 'Unavailable', ''),
(11, 120, '07002799', 'Jan Rica M. Marchan', 'BSIT - 1', '+639156005165', '2023-10-03', '08:00AM', 'Student in College', 'On-campus Activity', '2023-09-30 09:53:31', 0, 1, 'Unavailable', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `medicalappshs`
--

CREATE TABLE `medicalappshs` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `role` int(50) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `role`, `medicine_name`, `quantity`, `date_created`) VALUES
(35, 3, 'Paracetamol', '4', '2023-09-05'),
(36, 3, 'Bioflu', '6', '2023-09-05'),
(37, 1, 'Advil', '4', '2023-09-05'),
(38, 1, 'Buscopan', '6', '2023-09-05'),
(39, 2, 'Amoxicilin', '4', '2023-09-05'),
(40, 3, 'Bioflu', '10', '2023-09-07'),
(41, 2, 'Bioflu', '2', '2023-09-11'),
(42, 0, 'Paracetamol', '2', '2023-09-23'),
(43, 2, 'Paracetamol', '2', '2023-09-23'),
(44, 0, 'Paracetamol', '2', '2023-09-23'),
(45, 0, 'Paracetamol', '2', '2023-09-23'),
(46, 2, 'Advil', '2', '2023-09-23'),
(47, 0, 'Medicol', '2', '2023-09-23'),
(48, 0, 'Mangusteen', '10', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `nursenotesshs`
--

CREATE TABLE `nursenotesshs` (
  `nurse_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `vitalsigns` varchar(200) NOT NULL,
  `nursenotes` text NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

CREATE TABLE `patientrecord` (
  `p_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `vitalsigns` varchar(200) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicalexaminationgsjhs`
--

CREATE TABLE `physicalexaminationgsjhs` (
  `pe_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `levelsection` varchar(200) NOT NULL,
  `pastsurgeries` varchar(200) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `familyhistory` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `pr` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `bmi` varchar(200) NOT NULL,
  `heent` varchar(200) NOT NULL,
  `cvs` varchar(200) NOT NULL,
  `gis` varchar(200) NOT NULL,
  `gus` varchar(200) NOT NULL,
  `extremities` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `medicalexaminer` varchar(200) NOT NULL,
  `dateexamined` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicalexaminationshs`
--

CREATE TABLE `physicalexaminationshs` (
  `peshs_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `pastsurgeries` varchar(200) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `familyhistory` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `pr` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `heent` varchar(200) NOT NULL,
  `cvs` varchar(200) NOT NULL,
  `gis` varchar(200) NOT NULL,
  `gus` varchar(200) NOT NULL,
  `skin` varchar(200) NOT NULL,
  `musculoskeletal` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `medicalexaminer` varchar(200) NOT NULL,
  `dateexamined` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicianapp`
--

CREATE TABLE `physicianapp` (
  `phy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicianappcollege`
--

CREATE TABLE `physicianappcollege` (
  `phy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicianorderprogressgsjhs`
--

CREATE TABLE `physicianorderprogressgsjhs` (
  `pop_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `progressnotes` text NOT NULL,
  `doctorsorder` text NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `levelsection` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicianorderprogressshs`
--

CREATE TABLE `physicianorderprogressshs` (
  `popshs_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `progressnotes` text NOT NULL,
  `doctorsorder` text NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolhealthasses`
--

CREATE TABLE `schoolhealthasses` (
  `schoolasses_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
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
  `remarks` text NOT NULL,
  `is_deleted_on_website` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_message`
--

CREATE TABLE `sms_message` (
  `message_id` int(11) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms_message`
--

INSERT INTO `sms_message` (`message_id`, `phone`, `message`, `date_created`) VALUES
(1, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 11:00 A.M', ''),
(2, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(3, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(4, '639156005165', 'Good Day! Your request for amo po is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(5, '639156005165', 'Good Day!. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(6, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(7, '639156005165', 'Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(8, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(9, '639156005165', 'hello', ''),
(10, '639156005165', 'hellohi', '2023-08-03 04:22 PM'),
(11, '639156005165', 'We summon you', '2023-08-03 04:23 PM'),
(12, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-08 06:30 PM'),
(13, '639156005165', 'Your daugther', '2023-08-08 06:36 PM'),
(14, '639156005165', 'Daughter', '2023-08-08 06:39 PM'),
(15, '639156005165', 'Hi', '2023-08-08 06:43 PM'),
(16, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(17, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(18, '639156005165', 'hahahahaha', ''),
(19, '639156005165', 'Good Day! Your request for physician consulatation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(20, '639156005165', 'heyow', ''),
(21, '639156005165', 'Hi', ''),
(22, '+639156005165', 'Your choose', '2023-08-26 09:47 AM'),
(23, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(24, '+639156005165', 'We regret to inform you that your request for medical appointment has been rejected. Please choose another schedule.', ''),
(25, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(26, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(27, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(28, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(29, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 04:54 PM'),
(30, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 07:55 PM'),
(31, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 10:24 PM'),
(32, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-27 12:29 PM'),
(33, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-27 04:42 PM'),
(34, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on August 28, 2023 at 10:30 A.M', '2023-08-27 07:23 PM'),
(35, '+639156005165', 'We summon you', '2023-08-28 12:35 AM'),
(36, '+639156005165', 'hi', '2023-08-29 05:18 PM'),
(37, '+639262345194', 'hello', '2023-08-31 11:26 AM'),
(38, '+639922863038', 'hello', '2023-08-31 11:27 AM'),
(39, '+639295127752', 'hello', '2023-08-31 11:27 AM'),
(40, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:26 PM'),
(41, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:27 PM'),
(42, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:29 PM'),
(43, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-05 12:59 PM'),
(44, '+639156005165', 'Good Day! Your request for physician consultation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-06 09:32 PM'),
(45, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:19 PM'),
(46, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:20 PM'),
(47, '+639637077358', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:20 PM'),
(48, '+639156005165', 'We summon you', '2023-09-09 10:45 AM'),
(49, '+639156005165', 'hi', '2023-09-09 10:49 AM'),
(50, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:54 AM'),
(51, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:56 AM'),
(52, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:58 AM'),
(53, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 05:57 PM'),
(54, '+639156005165', 'HI', '2023-09-11 06:00 PM'),
(55, '+639156005165', 'G?', '2023-09-11 06:02 PM'),
(56, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 06:22 PM'),
(57, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 06:23 PM'),
(58, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 07:18 PM'),
(59, '+639156005165', 'Good Day! Your request for physician consultation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 07:20 PM'),
(60, '+639156005165', 'hello', '2023-09-12 12:05 PM'),
(61, '+639156005165', 'Good Day! Your request for physician consultation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-13 10:08 AM'),
(62, '+639156005165', 'dsfgtyh', '2023-09-23 03:11 PM'),
(63, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-23 03:11 PM'),
(64, '+639156005165', 'summoning\r\n', '2023-09-24 07:34 PM'),
(65, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-24 07:43 PM'),
(66, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 10, 2023 at 10:30 A.M', '2023-09-26 03:38 PM'),
(67, '+639156005165', 'Good Day! Your request for dental appointment is approved. ', '2023-09-28 05:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `leveleduc` int(5) NOT NULL,
  `role` varchar(200) NOT NULL,
  `gradelevel` varchar(200) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `leveleduc`, `role`, `gradelevel`, `idnumber`, `email`, `password`) VALUES
(120, 'Jan Rica M. Marchan', 3, 'Student in GS/JHS', 'BSIT', '07002799', '07002799@dwc-legazpi.edu', '$2y$10$K8P5Fzy3Aj6dQMApZFaAjeiMdlrf4eo5uibKzhCdKmmyS1KhG6JpO');

-- --------------------------------------------------------

--
-- Table structure for table `vitalsigns`
--

CREATE TABLE `vitalsigns` (
  `vital_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `t` varchar(200) NOT NULL,
  `p` varchar(200) NOT NULL,
  `r` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weightmonitor`
--

CREATE TABLE `weightmonitor` (
  `weight_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `consultationformrecord`
--
ALTER TABLE `consultationformrecord`
  ADD PRIMARY KEY (`consultform_id`);

--
-- Indexes for table `consultationformrecordcollege`
--
ALTER TABLE `consultationformrecordcollege`
  ADD PRIMARY KEY (`consultform_id`);

--
-- Indexes for table `dentalapp`
--
ALTER TABLE `dentalapp`
  ADD PRIMARY KEY (`dentalapp_id`);

--
-- Indexes for table `dentalappcollege`
--
ALTER TABLE `dentalappcollege`
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
  ADD PRIMARY KEY (`healthnogsjhs_id`);

--
-- Indexes for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  ADD PRIMARY KEY (`healthshs_id`);

--
-- Indexes for table `medicalapp`
--
ALTER TABLE `medicalapp`
  ADD PRIMARY KEY (`medicalapp_id`),
  ADD UNIQUE KEY `unique_slot` (`date_time`,`sched_time`);

--
-- Indexes for table `medicalappcollege`
--
ALTER TABLE `medicalappcollege`
  ADD PRIMARY KEY (`medicalapp_id`);

--
-- Indexes for table `medicalappshs`
--
ALTER TABLE `medicalappshs`
  ADD PRIMARY KEY (`medicalapp_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `nursenotesshs`
--
ALTER TABLE `nursenotesshs`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `physicalexaminationgsjhs`
--
ALTER TABLE `physicalexaminationgsjhs`
  ADD PRIMARY KEY (`pe_id`);

--
-- Indexes for table `physicalexaminationshs`
--
ALTER TABLE `physicalexaminationshs`
  ADD PRIMARY KEY (`peshs_id`);

--
-- Indexes for table `physicianapp`
--
ALTER TABLE `physicianapp`
  ADD PRIMARY KEY (`phy_id`);

--
-- Indexes for table `physicianappcollege`
--
ALTER TABLE `physicianappcollege`
  ADD PRIMARY KEY (`phy_id`);

--
-- Indexes for table `physicianorderprogressgsjhs`
--
ALTER TABLE `physicianorderprogressgsjhs`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `physicianorderprogressshs`
--
ALTER TABLE `physicianorderprogressshs`
  ADD PRIMARY KEY (`popshs_id`);

--
-- Indexes for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  ADD PRIMARY KEY (`schoolasses_id`);

--
-- Indexes for table `sms_message`
--
ALTER TABLE `sms_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  ADD PRIMARY KEY (`vital_id`);

--
-- Indexes for table `weightmonitor`
--
ALTER TABLE `weightmonitor`
  ADD PRIMARY KEY (`weight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `consultationformrecord`
--
ALTER TABLE `consultationformrecord`
  MODIFY `consultform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `consultationformrecordcollege`
--
ALTER TABLE `consultationformrecordcollege`
  MODIFY `consultform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `dentalappcollege`
--
ALTER TABLE `dentalappcollege`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `healthrecordformcollege`
--
ALTER TABLE `healthrecordformcollege`
  MODIFY `healthcollege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `healthrecordformgsjhs`
--
ALTER TABLE `healthrecordformgsjhs`
  MODIFY `healthnogsjhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  MODIFY `healthshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `medicalapp`
--
ALTER TABLE `medicalapp`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `medicalappcollege`
--
ALTER TABLE `medicalappcollege`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medicalappshs`
--
ALTER TABLE `medicalappshs`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `nursenotesshs`
--
ALTER TABLE `nursenotesshs`
  MODIFY `nurse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `physicalexaminationgsjhs`
--
ALTER TABLE `physicalexaminationgsjhs`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `physicalexaminationshs`
--
ALTER TABLE `physicalexaminationshs`
  MODIFY `peshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `physicianapp`
--
ALTER TABLE `physicianapp`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `physicianappcollege`
--
ALTER TABLE `physicianappcollege`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `physicianorderprogressgsjhs`
--
ALTER TABLE `physicianorderprogressgsjhs`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `physicianorderprogressshs`
--
ALTER TABLE `physicianorderprogressshs`
  MODIFY `popshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  MODIFY `schoolasses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sms_message`
--
ALTER TABLE `sms_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weightmonitor`
--
ALTER TABLE `weightmonitor`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
