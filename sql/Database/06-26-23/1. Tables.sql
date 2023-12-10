-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 08:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flt4als_e_learning_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `acnt_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `online_status` varchar(10) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`acnt_id`, `username`, `password`, `type`, `regs_date`, `status`, `online_status`) VALUES
('ACNT-00000', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '2023-05-27 16:03:50', 'active', 'offline'),
('ACNT-00001', 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99', 'teacher', '2023-05-27 16:03:50', 'active', 'online'),
('ACNT-00002', 'student', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-05-27 16:55:24', 'active', 'offline'),
('ACNT-125648', 'alex', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-06-18 14:33:43', 'active', 'offline'),
('ACNT-617208', 'mark', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-06-18 15:13:20', 'active', 'online'),
('ACNT-718245', '136456120450', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-06-19 21:58:02', 'active', 'online'),
('ACNT-873652', 'pepito', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-06-18 14:43:31', 'active', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `empl_id` varchar(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `adrs_num_st` varchar(100) NOT NULL,
  `adrs_brgy` varchar(100) NOT NULL,
  `adrs_city` varchar(100) NOT NULL,
  `adrs_province` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` date NOT NULL,
  `cellphone_num` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`empl_id`, `account`, `f_name`, `m_name`, `l_name`, `adrs_num_st`, `adrs_brgy`, `adrs_city`, `adrs_province`, `gender`, `birthdate`, `cellphone_num`, `email`, `status`) VALUES
('EMPL-0000', 'ACNT-00000', 'Juan', '', 'Dela Cruz', '01 Sampl st.', 'Barangay 01', 'Manila', 'Metro Manila', 'Male', '2001-05-20', '111 111 111', 'sample@gmail.com', 'active'),
('EMPL-0001', 'ACNT-00001', 'Raymundo', 'L', 'De Guzman', '01 Sampl st.', 'Barangay 01', 'Manila', 'Metro Manila', 'Male', '2001-05-20', '111 111 111', 'sample@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls1_eng`
--

CREATE TABLE `tbl_flt_ls1_eng` (
  `fls1e_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `q6_answer` varchar(1000) NOT NULL,
  `q6_score` int(11) NOT NULL DEFAULT 0,
  `q7_answer` varchar(1000) NOT NULL,
  `q7_score` int(11) NOT NULL DEFAULT 0,
  `q8_answer` varchar(1000) NOT NULL,
  `q8_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 8,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls1_eng`
--

INSERT INTO `tbl_flt_ls1_eng` (`fls1e_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `q6_answer`, `q6_score`, `q7_answer`, `q7_score`, `q8_answer`, `q8_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS1E-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 'ans_6', 1, 'ans_7', 1, 'ans_8', 1, 8, 8, '2023-06-22 13:18:30', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls1_fil`
--

CREATE TABLE `tbl_flt_ls1_fil` (
  `fls1f_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(1000) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(1000) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 6,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls1_fil`
--

INSERT INTO `tbl_flt_ls1_fil` (`fls1f_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS1F-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 6, 6, 6, '2023-06-22 13:18:51', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls2`
--

CREATE TABLE `tbl_flt_ls2` (
  `fls2_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 5,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls2`
--

INSERT INTO `tbl_flt_ls2` (`fls2_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS2-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 5, 5, '2023-06-22 13:18:52', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls3`
--

CREATE TABLE `tbl_flt_ls3` (
  `fls3_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `q6_answer` varchar(20) NOT NULL,
  `q6_score` int(11) NOT NULL DEFAULT 0,
  `q7_answer` varchar(20) NOT NULL,
  `q7_score` int(11) NOT NULL DEFAULT 0,
  `q8_answer` varchar(20) NOT NULL,
  `q8_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 8,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls3`
--

INSERT INTO `tbl_flt_ls3` (`fls3_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `q6_answer`, `q6_score`, `q7_answer`, `q7_score`, `q8_answer`, `q8_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS3-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 'ans_6', 1, 'ans_7', 1, 'ans_8', 1, 8, 8, '2023-06-22 13:18:52', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls4`
--

CREATE TABLE `tbl_flt_ls4` (
  `fls4_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `q6_answer` varchar(20) NOT NULL,
  `q6_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 6,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls4`
--

INSERT INTO `tbl_flt_ls4` (`fls4_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `q6_answer`, `q6_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS4-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 'ans_6', 1, 6, 6, '2023-06-22 13:18:52', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls5`
--

CREATE TABLE `tbl_flt_ls5` (
  `fls5_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 5,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls5`
--

INSERT INTO `tbl_flt_ls5` (`fls5_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS5-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 5, 5, '2023-06-22 13:18:52', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_ls6`
--

CREATE TABLE `tbl_flt_ls6` (
  `fls6_id` varchar(20) NOT NULL,
  `q1_answer` varchar(20) NOT NULL,
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_answer` varchar(20) NOT NULL,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_answer` varchar(20) NOT NULL,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_answer` varchar(20) NOT NULL,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `q5_answer` varchar(20) NOT NULL,
  `q5_score` int(11) NOT NULL DEFAULT 0,
  `q6_answer` varchar(20) NOT NULL,
  `q6_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 6,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_ls6`
--

INSERT INTO `tbl_flt_ls6` (`fls6_id`, `q1_answer`, `q1_score`, `q2_answer`, `q2_score`, `q3_answer`, `q3_score`, `q4_answer`, `q4_score`, `q5_answer`, `q5_score`, `q6_answer`, `q6_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FLS6-00001', 'ans_1', 1, 'ans_2', 1, 'ans_3', 1, 'ans_4', 1, 'ans_5', 1, 'ans_6', 1, 6, 6, '2023-06-22 13:18:52', '2023-06-26', 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flt_pis`
--

CREATE TABLE `tbl_flt_pis` (
  `fpis_id` varchar(20) NOT NULL,
  `student` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) NOT NULL,
  `name_score` int(11) NOT NULL DEFAULT 0,
  `gender` varchar(6) NOT NULL,
  `gender_score` int(11) NOT NULL DEFAULT 0,
  `birthdate` date NOT NULL,
  `birthdate_score` int(11) NOT NULL DEFAULT 0,
  `adrs_num_st` varchar(100) NOT NULL,
  `adrs_brgy` varchar(100) NOT NULL,
  `adrs_city` varchar(100) NOT NULL,
  `adrs_province` varchar(100) NOT NULL,
  `adrs_score` int(11) NOT NULL DEFAULT 0,
  `religion` varchar(100) NOT NULL,
  `religion_score` int(11) NOT NULL DEFAULT 0,
  `civil_status` varchar(20) NOT NULL,
  `civil_status_score` int(11) NOT NULL DEFAULT 0,
  `occupation` varchar(100) NOT NULL,
  `occupation_score` int(11) NOT NULL DEFAULT 0,
  `high_educ` varchar(20) DEFAULT NULL,
  `high_educ_score` int(11) NOT NULL DEFAULT 0,
  `about_student` varchar(1000) DEFAULT NULL,
  `about_student_score` int(11) NOT NULL DEFAULT 0,
  `total_score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 10,
  `date_ans` datetime NOT NULL DEFAULT current_timestamp(),
  `check_date` date DEFAULT NULL,
  `check_by` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_flt_pis`
--

INSERT INTO `tbl_flt_pis` (`fpis_id`, `student`, `f_name`, `m_name`, `l_name`, `name_score`, `gender`, `gender_score`, `birthdate`, `birthdate_score`, `adrs_num_st`, `adrs_brgy`, `adrs_city`, `adrs_province`, `adrs_score`, `religion`, `religion_score`, `civil_status`, `civil_status_score`, `occupation`, `occupation_score`, `high_educ`, `high_educ_score`, `about_student`, `about_student_score`, `total_score`, `max_score`, `date_ans`, `check_date`, `check_by`, `status`) VALUES
('FPIS-00001', '102230060002', 'María Clara', 'de los Santos', 'Alba', 1, 'Female', 1, '0000-00-00', 1, '01 Sample St.', 'Barangay 1', 'Manila', 'Metro Manila', 1, 'Roman Catholic', 1, 'Walang asawa', 1, 'N/A', 1, 'Grade 5', 1, 'Testing student description', 2, 10, 10, '2023-06-22 13:17:25', '2023-06-23', 'EMPL-0001', 'checked'),
('FPIS-924870', '136456120450', 'John Kenny', 'Ticala', 'Denosta', 1, 'Male', 1, '2001-01-01', 1, '01 Sample St.', '21', 'Manila', 'Metro Manila', 1, 'Roman Catholic', 1, 'Walang asawa', 1, 'N/A', 1, 'Grade 4', 1, 'testing testing', 2, 10, 10, '2023-06-22 19:39:49', NULL, 'EMPL-0001', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learning_lvl`
--

CREATE TABLE `tbl_learning_lvl` (
  `lrvl_id` varchar(20) NOT NULL,
  `lrvl_num` float NOT NULL DEFAULT 1,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_learning_lvl`
--

INSERT INTO `tbl_learning_lvl` (`lrvl_id`, `lrvl_num`, `name`, `description`, `status`) VALUES
('LRVL-00001', 1, 'Basic Literacy', '', 'active'),
('LRVL-00002', 2, 'Lower Elementary Level', '', 'active'),
('LRVL-00003', 3, 'Advanced Elementary Level', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `modl_id` varchar(20) NOT NULL,
  `ls_subject` varchar(50) NOT NULL,
  `module_no` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `sub_title` varchar(500) NOT NULL,
  `sub_folder` varchar(500) NOT NULL DEFAULT '',
  `file_name` varchar(500) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`modl_id`, `ls_subject`, `module_no`, `title`, `sub_title`, `sub_folder`, `file_name`, `regs_date`, `status`) VALUES
('MODL-10101', 'SUBJ-00101', 1, 'Aralin 1', '', 'All Modules', 'Aralin-1.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10102', 'SUBJ-00101', 2, 'Aralin 2', '', 'All Modules', 'Aralin-2.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10103', 'SUBJ-00101', 3, 'Aralin 3', '', 'All Modules', 'Aralin-3.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10104', 'SUBJ-00101', 4, 'Aralin 4', '', 'All Modules', 'Aralin-4.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10105', 'SUBJ-00101', 5, 'Aralin 5', '', 'All Modules', 'Aralin-5.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10106', 'SUBJ-00101', 6, 'Aralin 5', '', 'All Modules', 'Aralin-6.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10107', 'SUBJ-00101', 7, 'Aralin 5', '', 'All Modules', 'Aralin-7.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10108', 'SUBJ-00101', 8, 'Aralin 5', '', 'All Modules', 'Aralin-8.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10201', 'SUBJ-00102', 1, 'Aralin 1', 'Pagsasaka', 'Pagsasaka', 'Aralin 1.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10202', 'SUBJ-00102', 2, 'Aralin 2', 'Pagsasaka', 'Pagsasaka', 'Aralin 2.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10203', 'SUBJ-00102', 3, 'Cover Page', 'Pagsasaka', 'Pagsasaka', 'Cover Page.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10204', 'SUBJ-00102', 4, 'Manwal', 'Pagsasaka', 'Pagsasaka', 'Manwal.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10205', 'SUBJ-00102', 5, 'Panimula', 'Pagsasaka', 'Pagsasaka', 'Panimula.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10206', 'SUBJ-00102', 6, 'Prelims', 'Pagsasaka', 'Pagsasaka', 'Prelims.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10207', 'SUBJ-00102', 7, 'Title Page', 'Pagsasaka', 'Pagsasaka', 'Title Page.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10208', 'SUBJ-00102', 1, 'Aralin 1', 'Sakit', 'Sakit', 'Aralin 1.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10209', 'SUBJ-00102', 2, 'Aralin 2', 'Sakit', 'Sakit', 'Aralin 2.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10210', 'SUBJ-00102', 3, 'Aralin 3', 'Sakit', 'Sakit', 'Aralin 3.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10211', 'SUBJ-00102', 4, 'Cover Page', 'Sakit', 'Sakit', 'Cover Page.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10212', 'SUBJ-00102', 5, 'Manwal', 'Sakit', 'Sakit', 'Manwal.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10213', 'SUBJ-00102', 6, 'Panimula', 'Sakit', 'Sakit', 'Panimula.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10214', 'SUBJ-00102', 7, 'Prelims', 'Sakit', 'Sakit', 'Prelims.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10215', 'SUBJ-00102', 8, 'Title Page', 'Sakit', 'Sakit', 'Title Page.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10501', 'SUBJ-00105', 1, 'Aralin 1', 'Ako at ang aking Watawat', 'Ako at ang aking Watawat', 'Aralin 1.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10502', 'SUBJ-00105', 2, 'Aralin 2', 'Ako at ang aking Watawat', 'Ako at ang aking Watawat', 'Aralin 2.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10503', 'SUBJ-00105', 1, 'Aralin 1', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 1.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10504', 'SUBJ-00105', 2, 'Aralin 2', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 2.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-10505', 'SUBJ-00105', 2, 'Aralin 3', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Ako, Kami Tayo sa Landas ng Kapayapaan', 'Aralin 3.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20101', 'SUBJ-00202', 1, 'How Do We Breath', '', 'All Modules', 'How Do We Breath.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20102', 'SUBJ-00202', 2, 'My Health My Responsibility', '', 'All Modules', 'My Health My Responsibility.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20103', 'SUBJ-00203', 1, 'Geometrical-Shapes', '', 'All Modules', 'Geometrical-Shapes.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20104', 'SUBJ-00203', 2, 'Its-About-Time', '', 'All Modules', 'Its-About-Time.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20105', 'SUBJ-00203', 3, 'Time', '', 'All Modules', 'Time.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20106', 'SUBJ-00205', 1, 'Ang-Kahalagahan-ng-Pamilya', '', 'All Modules', 'Ang-Kahalagahan-ng-Pamilya.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20107', 'SUBJ-00205', 2, 'Ito-ang-Ating-Kultura', '', 'All Modules', 'Ito-ang-Ating-Kultura.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20108', 'SUBJ-00205', 3, 'Kaya-Natin-Makamit-Ang-Lahat-KUng-Tayo-ay-May-Disiplina', '', 'All Modules', 'Kaya-Natin-Makamit-Ang-Lahat-KUng-Tayo-ay-May-Disiplina.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20109', 'SUBJ-00205', 4, 'Naiiba-Ako', '', 'All Modules', 'Naiiba-Ako.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-20110', 'SUBJ-00205', 5, 'Sino-Ako', '', 'All Modules', 'Sino-Ako.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30101', 'SUBJ-00301', 1, 'Appropriate Expressions in Meetings and Interviews', '', 'All Modules', 'Appropriate Expressions in Meetings and Interviews.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30102', 'SUBJ-00301', 2, 'Daily News', '', 'All Modules', 'Daily News.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30103', 'SUBJ-00301', 3, 'Hello May I Help You', '', 'All Modules', 'Hello May I Help You.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30104', 'SUBJ-00301', 4, 'I Have A Letter For You', '', 'All Modules', 'I Have A Letter For You.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30105', 'SUBJ-00301', 5, 'The ABCs of Writing Complex Sentences', '', 'All Modules', 'The ABCs of Writing Complex Sentences.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30201', 'SUBJ-00302', 1, 'Animals Love Them and Care for Them', 'English', 'English', 'Animals Love Them and Care for Them.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30202', 'SUBJ-00302', 2, 'Herbal Medicine', 'English', 'English', 'Herbal Medicine.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30203', 'SUBJ-00302', 3, 'Living With Simple Machines', 'English', 'English', 'Living With Simple Machines.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30204', 'SUBJ-00302', 4, 'Preparing for Calamities', 'English', 'English', 'Preparing for Calamities.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30205', 'SUBJ-00302', 5, 'Preparing for Typhoons', 'English', 'English', 'Preparing for Typhoons.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30206', 'SUBJ-00302', 6, 'Saving Our Soil Resources', 'English', 'English', 'Saving Our Soil Resources.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30207', 'SUBJ-00302', 7, 'Think Green', 'English', 'English', 'Think Green.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30209', 'SUBJ-00302', 8, 'What is Happening to Our Environment', 'English', 'English', 'What is Happening to Our Environment.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30210', 'SUBJ-00302', 9, 'Ano ang Nangyayari sa Ating Kapaligiran', 'Tagalog', 'Tagalog', 'Ano ang Nangyayari sa Ating Kapaligiran.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30211', 'SUBJ-00302', 10, 'Mahalin at Aru00304gain ang mga Hayop', 'Tagalog', 'Tagalog', 'Mahalin at Arugain ang mga Hayop.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30212', 'SUBJ-00302', 11, 'Mga Halamang Gamot', 'Tagalog', 'Tagalog', 'Mga Halamang Gamot.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30213', 'SUBJ-00302', 12, 'Mga Luntiang Halaman', 'Tagalog', 'Tagalog', 'Mga Luntiang Halaman.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30214', 'SUBJ-00302', 13, 'Mga Simpleng Makina', 'Tagalog', 'Tagalog', 'Mga Simpleng Makina.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30215', 'SUBJ-00302', 14, 'Paghahanda Para sa Bagyo', 'Tagalog', 'Tagalog', 'Paghahanda Para sa Bagyo.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30216', 'SUBJ-00302', 15, 'Paghahanda sa Kalamidad', 'Tagalog', 'Tagalog', 'Paghahanda sa Kalamidad.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30218', 'SUBJ-00302', 16, 'Pagliligtas sa Ating mga Yamang Lupa', 'Tagalog', 'Tagalog', 'Pagliligtas sa Ating mga Yamang Lupa.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30301', 'SUBJ-00303', 1, 'Addition and Subtraction in Daily Life', 'English', 'English', 'Addition and Subtraction in Daily Life.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30302', 'SUBJ-00303', 2, 'Addition and Subtraction in Decimals', 'English', 'English', 'Addition and Subtraction in Decimals.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30303', 'SUBJ-00303', 3, 'Addition and Subtraction of Fractions', 'English', 'English', 'Addition and Subtraction of Fractions.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30304', 'SUBJ-00303', 4, 'Geometrical Shapes', 'English', 'English', 'Geometrical Shapes.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30305', 'SUBJ-00303', 5, 'Its About Time', 'English', 'English', 'Its About Time.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30306', 'SUBJ-00303', 6, 'Learning About Fractions', 'English', 'English', 'Learning About Fractions.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30307', 'SUBJ-00303', 7, 'Measuring Length', 'English', 'English', 'Measuring Length.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30308', 'SUBJ-00303', 8, 'Measuring Volume', 'English', 'English', 'Measuring Volume.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30309', 'SUBJ-00303', 9, 'Multiplication and Division in Daily Life', 'English', 'English', 'Multiplication and Division in Daily Life.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30310', 'SUBJ-00303', 10, 'Multiplication and Division of Decimals', 'English', 'English', 'Multiplication and Division of Decimals.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30311', 'SUBJ-00303', 11, 'Ratio and Proportion', 'English', 'English', 'Ratio and Proportion.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30312', 'SUBJ-00303', 12, 'Solving Day to Day Problems', 'English', 'English', 'Solving Day to Day Problems.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30313', 'SUBJ-00303', 13, 'Itoy Tungkol sa Oras', 'Tagalog', 'Tagalog', 'Itoy Tungkol sa Oras.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30314', 'SUBJ-00303', 14, 'Mga Heometrikong Hugis', 'Tagalog', 'Tagalog', 'Mga Heometrikong Hugis.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30315', 'SUBJ-00303', 15, 'Pagdaragdag at Pagbabawas ng mga Decimals', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas ng mga Decimals.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30316', 'SUBJ-00303', 16, 'Pagdaragdag at Pagbabawas ng Praksyon', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas ng Praksyon.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30317', 'SUBJ-00303', 17, 'Pagdaragdag at Pagbabawas sa Pang araw araw na Buhay', 'Tagalog', 'Tagalog', 'Pagdaragdag at Pagbabawas sa Pang araw araw na Buhay.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30318', 'SUBJ-00303', 18, 'Pagkilala sa mga Praksyon', 'Tagalog', 'Tagalog', 'Pagkilala sa mga Praksyon.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30319', 'SUBJ-00303', 19, 'Paglutas ng Pang araw araw na Suliranin', 'Tagalog', 'Tagalog', 'Paglutas ng Pang araw araw na Suliranin.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30320', 'SUBJ-00303', 20, 'Pagpaparami at Paghahati sa Pang araw araw ng buhay', 'Tagalog', 'Tagalog', 'Pagpaparami at Paghahati sa Pang araw araw ng buhay.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30321', 'SUBJ-00303', 21, 'Pagsukat ng Haba', 'Tagalog', 'Tagalog', 'Pagsukat ng Haba.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30322', 'SUBJ-00303', 22, 'Panumbasan at Proporsiyon', 'Tagalog', 'Tagalog', 'Panumbasan at Proporsiyon.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30401', 'SUBJ-00304', 1, 'Maaari Kang Magtagumpay sa Negosyo', '', 'All Modules', 'Maaari Kang Magtagumpay sa Negosyo.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30402', 'SUBJ-00304', 2, 'Mga Ideya Tungkol sa mga Proyektong Mapagkikitaan', '', 'All Modules', 'Mga Ideya Tungkol sa mga Proyektong Mapagkikitaan.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30403', 'SUBJ-00304', 3, 'Mga Katangian ng Matagumpay na Negosyante', '', 'All Modules', 'Mga Katangian ng Matagumpay na Negosyante.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30404', 'SUBJ-00304', 4, 'Paano Magkaroon ng Sarili Mong Gulayan', '', 'All Modules', 'Paano Magkaroon ng Sarili Mong Gulayan.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30405', 'SUBJ-00304', 5, 'Paghahanda para sa edukasyon Teknikal at Bokasyonal', '', 'All Modules', 'Paghahanda para sa edukasyon Teknikal at Bokasyonal.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30406', 'SUBJ-00304', 6, 'Pagpaplano ng Iyong Negosyo (Ikalawang Bahagi)', '', 'All Modules', 'Pagpaplano ng Iyong Negosyo (Ikalawang Bahagi).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30407', 'SUBJ-00304', 7, 'Pagpaplano ng Iyong Negosyo (Unang Bahagi)', '', 'All Modules', 'Pagpaplano ng Iyong Negosyo (Unang Bahagi).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30408', 'SUBJ-00304', 8, 'Produkto at Serbisyo', '', 'All Modules', 'Produkto at Serbisyo.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30501', 'SUBJ-00305', 1, 'Ako Ang Pamilya at ang Aking Komunidad', '', 'All Modules', 'Ako Ang Pamilya at ang Aking Komunidad.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30502', 'SUBJ-00305', 2, 'Ang Mundo Ayon sa Mapa', '', 'All Modules', 'Ang Mundo Ayon sa Mapa.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30503', 'SUBJ-00305', 3, 'Kailangan Kita', '', 'All Modules', 'Kailangan Kita.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30504', 'SUBJ-00305', 4, 'Mga Masasarap na Pagkain sa Asya', '', 'All Modules', 'Mga Masasarap na Pagkain sa Asya.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30505', 'SUBJ-00305', 5, 'Mga Pinaniniwalaang Pamahiin', '', 'All Modules', 'Mga Pinaniniwalaang Pamahiin.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30506', 'SUBJ-00305', 6, 'Pag unawa sa Stress', '', 'All Modules', 'Pag unawa sa Stress.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30507', 'SUBJ-00305', 7, 'Paggunita sa Ating mga Pambansang Bayani', '', 'All Modules', 'Paggunita sa Ating mga Pambansang Bayani.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30508', 'SUBJ-00305', 8, 'Pagpaplano Para sa Personal na Pagbabago', '', 'All Modules', 'Pagpaplano Para sa Personal na Pagbabago.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30509', 'SUBJ-00305', 9, 'Pilipino Isang Puso Isang Lahi', '', 'All Modules', 'Pilipino Isang Puso Isang Lahi.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30510', 'SUBJ-00305', 10, 'Tuloy Ka sa Aking Tahanan', '', 'All Modules', 'Tuloy Ka sa Aking Tahanan.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30601', 'SUBJ-00306', 1, 'MODULE 1: LET`S FIX COMPUTERS', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M01 (V1.2).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30602', 'SUBJ-00306', 2, 'MODULE 2: DIGITAL APPLICATIONS - WORD PROCESSING', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M02 (V1.2.C).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30603', 'SUBJ-00306', 3, 'MODULE 3: DIGITAL APPLICATIONS - SPREADSHEETS', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M03 (V1.1.C).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30604', 'SUBJ-00306', 4, 'MODULE 4: DIGITAL APPLICATIONS - PRESENTATION SOFTWARE', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M04 (V1.1.C).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30605', 'SUBJ-00306', 5, 'MODULE 5: DIGITAL SYSTEM NETWORK', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M05 (V1.1).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30606', 'SUBJ-00306', 6, 'MODULE 6: DIGITAL DEVICES', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M06 (V1.1).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-30607', 'SUBJ-00306', 7, 'MODULE 7: DIGITAL ETHICS (NETIQUETTE)', '', 'All Modules', 'UNESCO_ALS_LS6_DIGICIT_M07 (V1.1).pdf', '2023-06-17 16:55:52', 'active'),
('MODL-31101', 'SUBJ-00311', 1, 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'All Modules', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-31102', 'SUBJ-00311', 2, 'Angkop na Pahayag sa mga Pulong at Panayam', '', 'All Modules', 'Angkop na Pahayag sa mga Pulong at Panayam.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-31103', 'SUBJ-00311', 3, 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'All Modules', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-31104', 'SUBJ-00311', 4, 'Mayroon akong Liham Para Sa Iyo', '', 'All Modules', 'Mayroon akong Liham Para Sa Iyo.pdf', '2023-06-17 16:55:52', 'active'),
('MODL-31105', 'SUBJ-00311', 5, 'Pang-araw-araw na Balita', '', 'All Modules', 'Pang-araw-araw na Balita.pdf', '2023-06-17 16:55:52', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `shyr_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `date_regs` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`shyr_id`, `school_year`, `date_regs`, `status`) VALUES
('SHYR-00001', '2022-2023', '2023-06-20 12:11:04', 'active'),
('SHYR-00002', '2021-2022', '2023-06-20 12:11:04', 'completed'),
('SHYR-00003', '2020-2021', '2023-06-20 12:11:04', 'completed'),
('SHYR-00004', '2019-2020', '2023-06-20 12:11:04', 'completed'),
('SHYR-00005', '2018-2019', '2023-06-20 12:11:04', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `lrn` varchar(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'new',
  `status` varchar(20) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`lrn`, `account`, `f_name`, `m_name`, `l_name`, `gender`, `status`) VALUES
('102230060002', 'ACNT-00002', 'María Clara', 'de los Santos', 'Alba', 'Female', 'active'),
('102230060006', 'ACNT-125648', 'Alex Christian', '', 'Avelino', 'new', 'new'),
('10223006010', 'ACNT-873652', 'Pepito', 'Lucky', 'Manaloto', 'new', 'new'),
('136453160522', 'ACNT-617208', 'Mark Theodore', 'Mesiona', 'Anandon', 'new', 'new'),
('136456120450', 'ACNT-718245', 'John Kenny', 'Ticala', 'Denosta', 'Male', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_flt`
--

CREATE TABLE `tbl_student_flt` (
  `sflt_id` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `test_period` varchar(20) NOT NULL,
  `student` varchar(20) NOT NULL,
  `fpis` varchar(20) DEFAULT NULL,
  `ls1_eng` varchar(20) DEFAULT NULL,
  `ls1_fil` varchar(20) DEFAULT NULL,
  `ls2` varchar(20) DEFAULT NULL,
  `ls3` varchar(20) DEFAULT NULL,
  `ls4` varchar(20) DEFAULT NULL,
  `ls5` varchar(20) DEFAULT NULL,
  `ls6` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_flt`
--

INSERT INTO `tbl_student_flt` (`sflt_id`, `school_year`, `test_period`, `student`, `fpis`, `ls1_eng`, `ls1_fil`, `ls2`, `ls3`, `ls4`, `ls5`, `ls6`, `status`) VALUES
('SFLT-00001', 'SHYR-00001', 'TPRD-00001', '102230060002', 'FPIS-00001', 'FLS1E-00001', 'FLS1F-00001', 'FLS2-00001', 'FLS3-00001', 'FLS4-00001', 'FLS5-00001', 'FLS6-00001', 'pending'),
('SFLT-924870', 'SHYR-00001', 'TPRD-00001', '136456120450', 'FPIS-924870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subj_id` varchar(20) NOT NULL,
  `learning_lvl` varchar(20) NOT NULL,
  `subj_num` float NOT NULL DEFAULT 1,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subj_id`, `learning_lvl`, `subj_num`, `name`, `description`, `status`) VALUES
('SUBJ-00101', 'LRVL-00001', 1.1, 'LS1', 'Communication Skills', 'active'),
('SUBJ-00102', 'LRVL-00001', 2.1, 'LS2', 'Problem Solving Skills and Critical Thinking', 'active'),
('SUBJ-00105', 'LRVL-00001', 3.1, 'LS5', 'Understanding the Self and the Society', 'active'),
('SUBJ-00202', 'LRVL-00002', 1.1, 'LS2', 'Scientific and Critical Thinking Skills', 'active'),
('SUBJ-00203', 'LRVL-00002', 2.1, 'LS3', 'Mathematical and Problem-solving Skills', 'active'),
('SUBJ-00205', 'LRVL-00002', 3.1, 'LS5', 'Understanding the Self and the Society', 'active'),
('SUBJ-00301', 'LRVL-00003', 1.1, 'LS1', 'Communication Skills (English)', 'active'),
('SUBJ-00302', 'LRVL-00003', 2.1, 'LS2', 'Scientific Literacy and Critical Thinking', 'active'),
('SUBJ-00303', 'LRVL-00003', 3.1, 'LS3', 'Mathematics and Problem Solving Skills', 'active'),
('SUBJ-00304', 'LRVL-00003', 4.1, 'LS4', 'Life and Career', 'active'),
('SUBJ-00305', 'LRVL-00003', 5.1, 'LS5', 'Understanding the Self and the Society', 'active'),
('SUBJ-00306', 'LRVL-00003', 6.1, 'LS6', 'Digital Citizenship', 'active'),
('SUBJ-00311', 'LRVL-00003', 1.2, 'LS1', 'Communication Skills (Filipino)', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_period`
--

CREATE TABLE `tbl_test_period` (
  `tprd_id` varchar(20) NOT NULL,
  `test_period` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test_period`
--

INSERT INTO `tbl_test_period` (`tprd_id`, `test_period`, `status`) VALUES
('TPRD-00001', 'Pre-test', 'open'),
('TPRD-00002', 'Post-test', 'closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`acnt_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`empl_id`),
  ADD KEY `empl_acntFK` (`account`);

--
-- Indexes for table `tbl_flt_ls1_eng`
--
ALTER TABLE `tbl_flt_ls1_eng`
  ADD PRIMARY KEY (`fls1e_id`),
  ADD KEY `fls1e_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls1_fil`
--
ALTER TABLE `tbl_flt_ls1_fil`
  ADD PRIMARY KEY (`fls1f_id`),
  ADD KEY `fls1f_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls2`
--
ALTER TABLE `tbl_flt_ls2`
  ADD PRIMARY KEY (`fls2_id`),
  ADD KEY `fls2_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls3`
--
ALTER TABLE `tbl_flt_ls3`
  ADD PRIMARY KEY (`fls3_id`),
  ADD KEY `fls3_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls4`
--
ALTER TABLE `tbl_flt_ls4`
  ADD PRIMARY KEY (`fls4_id`),
  ADD KEY `fls4_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls5`
--
ALTER TABLE `tbl_flt_ls5`
  ADD PRIMARY KEY (`fls5_id`),
  ADD KEY `fls5_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_ls6`
--
ALTER TABLE `tbl_flt_ls6`
  ADD PRIMARY KEY (`fls6_id`),
  ADD KEY `fls6_emplFK` (`check_by`);

--
-- Indexes for table `tbl_flt_pis`
--
ALTER TABLE `tbl_flt_pis`
  ADD PRIMARY KEY (`fpis_id`),
  ADD KEY `fpis_emplFK` (`check_by`),
  ADD KEY `fpis_stdnFK` (`student`) USING BTREE;

--
-- Indexes for table `tbl_learning_lvl`
--
ALTER TABLE `tbl_learning_lvl`
  ADD PRIMARY KEY (`lrvl_id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`modl_id`),
  ADD KEY `subj_modlFK` (`ls_subject`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`shyr_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`lrn`),
  ADD KEY `stdn_acntFK` (`account`);

--
-- Indexes for table `tbl_student_flt`
--
ALTER TABLE `tbl_student_flt`
  ADD PRIMARY KEY (`sflt_id`),
  ADD KEY `sflt_shyrFK` (`school_year`),
  ADD KEY `sflt_tprdFK` (`test_period`),
  ADD KEY `sflt_trstFK` (`student`),
  ADD KEY `sflt_fpisFK` (`fpis`),
  ADD KEY `sflt_fls1eFK` (`ls1_eng`),
  ADD KEY `sflt_fls1fFK` (`ls1_fil`),
  ADD KEY `sflt_fls2FK` (`ls2`),
  ADD KEY `sflt_fls3FK` (`ls3`),
  ADD KEY `sflt_fls4FK` (`ls4`),
  ADD KEY `sflt_fls5FK` (`ls5`),
  ADD KEY `sflt_fls6FK` (`ls6`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subj_id`),
  ADD KEY `lrvl_subjFK` (`learning_lvl`);

--
-- Indexes for table `tbl_test_period`
--
ALTER TABLE `tbl_test_period`
  ADD PRIMARY KEY (`tprd_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `empl_acntFK` FOREIGN KEY (`account`) REFERENCES `tbl_accounts` (`acnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls1_eng`
--
ALTER TABLE `tbl_flt_ls1_eng`
  ADD CONSTRAINT `fls1e_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls1_fil`
--
ALTER TABLE `tbl_flt_ls1_fil`
  ADD CONSTRAINT `fls1f_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls2`
--
ALTER TABLE `tbl_flt_ls2`
  ADD CONSTRAINT `fls2_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls3`
--
ALTER TABLE `tbl_flt_ls3`
  ADD CONSTRAINT `fls3_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls4`
--
ALTER TABLE `tbl_flt_ls4`
  ADD CONSTRAINT `fls4_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls5`
--
ALTER TABLE `tbl_flt_ls5`
  ADD CONSTRAINT `fls5_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_ls6`
--
ALTER TABLE `tbl_flt_ls6`
  ADD CONSTRAINT `fls6_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_flt_pis`
--
ALTER TABLE `tbl_flt_pis`
  ADD CONSTRAINT `fpis_emplFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fpis_stndFK` FOREIGN KEY (`student`) REFERENCES `tbl_student` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD CONSTRAINT `subj_modlFK` FOREIGN KEY (`ls_subject`) REFERENCES `tbl_subject` (`subj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `stdn_acntFK` FOREIGN KEY (`account`) REFERENCES `tbl_accounts` (`acnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student_flt`
--
ALTER TABLE `tbl_student_flt`
  ADD CONSTRAINT `sflt_fls1eFK` FOREIGN KEY (`ls1_eng`) REFERENCES `tbl_flt_ls1_eng` (`fls1e_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls1fFK` FOREIGN KEY (`ls1_fil`) REFERENCES `tbl_flt_ls1_fil` (`fls1f_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls2FK` FOREIGN KEY (`ls2`) REFERENCES `tbl_flt_ls2` (`fls2_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls3FK` FOREIGN KEY (`ls3`) REFERENCES `tbl_flt_ls3` (`fls3_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls4FK` FOREIGN KEY (`ls4`) REFERENCES `tbl_flt_ls4` (`fls4_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls5FK` FOREIGN KEY (`ls5`) REFERENCES `tbl_flt_ls5` (`fls5_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fls6FK` FOREIGN KEY (`ls6`) REFERENCES `tbl_flt_ls6` (`fls6_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_fpisFK` FOREIGN KEY (`fpis`) REFERENCES `tbl_flt_pis` (`fpis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_shyrFK` FOREIGN KEY (`school_year`) REFERENCES `tbl_school_year` (`shyr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_tprdFK` FOREIGN KEY (`test_period`) REFERENCES `tbl_test_period` (`tprd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sflt_trstFK` FOREIGN KEY (`student`) REFERENCES `tbl_student` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `lrvl_subjFK` FOREIGN KEY (`learning_lvl`) REFERENCES `tbl_learning_lvl` (`lrvl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
