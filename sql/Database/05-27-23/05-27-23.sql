-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 03:19 PM
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
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`acnt_id`, `username`, `password`, `type`, `regs_date`, `status`) VALUES
('ACNT-00000', 'admin', 'password', 'admin', '2023-05-27 16:03:50', 'active'),
('ACNT-00002', 'student', 'password', 'student', '2023-05-27 16:55:24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `clss_id` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `grade_section` varchar(20) NOT NULL,
  `falculty` varchar(20) NOT NULL,
  `days` varchar(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `room` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`clss_id`, `subject`, `grade_section`, `falculty`, `days`, `start_time`, `end_time`, `room`, `status`) VALUES
('CLSS-00000', 'SUBJ-0000', 'GRSC-00000', 'EMPL-0000', NULL, NULL, NULL, NULL, 'active');

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
('EMPL-0000', 'ACNT-00000', 'Juan', '', 'Dela Cruz', '01 Sampl st.', 'Barangay 01', 'Manila', 'Metro Manila', 'Male', '2001-05-20', '111 111 111', 'sample@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_section`
--

CREATE TABLE `tbl_grade_section` (
  `grsc_id` varchar(20) NOT NULL,
  `grade_level` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grade_section`
--

INSERT INTO `tbl_grade_section` (`grsc_id`, `grade_level`, `section`, `status`) VALUES
('GRSC-00000', 'Grade 7', '1', 'active');

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
  `gender` varchar(6) NOT NULL,
  `birhtdate` date NOT NULL,
  `adrs_num_st` varchar(100) NOT NULL,
  `adrs_brgy` varchar(100) NOT NULL,
  `adrs_city` varchar(100) NOT NULL,
  `adrs_province` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `high_educ` varchar(20) DEFAULT NULL,
  `grade_section` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`lrn`, `account`, `f_name`, `m_name`, `l_name`, `gender`, `birhtdate`, `adrs_num_st`, `adrs_brgy`, `adrs_city`, `adrs_province`, `religion`, `civil_status`, `occupation`, `high_educ`, `grade_section`, `status`) VALUES
('102230060002', 'ACNT-00000', 'María Clara', 'de los Santos', 'Alba', 'Female', '2001-05-20', '01 Sample St.', 'Barangay 1', 'Manila', 'Metro Manila', 'Roman Catholic', 'Single', 'N/A', 'Grade 5', 'GRSC-00000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subj_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subj_id`, `name`, `description`, `status`) VALUES
('SUBJ-0000', 'LS1', 'Communication Skills (English)', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_answer`
--

CREATE TABLE `tbl_test_answer` (
  `tans_id` varchar(20) NOT NULL,
  `question` varchar(20) NOT NULL,
  `student` varchar(20) NOT NULL,
  `student_ans` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test_answer`
--

INSERT INTO `tbl_test_answer` (`tans_id`, `question`, `student`, `student_ans`, `date_time`, `status`) VALUES
('QANS-0000', 'TQST-0000', '102230060002', 'correct', '2023-05-27 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_question`
--

CREATE TABLE `tbl_test_question` (
  `tqst_id` varchar(20) NOT NULL,
  `test_type` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `question_type` varchar(20) NOT NULL,
  `order_num` varchar(20) NOT NULL,
  `question` varchar(500) NOT NULL,
  `correct_ans` varchar(20) NOT NULL,
  `points` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test_question`
--

INSERT INTO `tbl_test_question` (`tqst_id`, `test_type`, `subject`, `question_type`, `order_num`, `question`, `correct_ans`, `points`, `status`) VALUES
('TQST-0000', 'pre-test', 'SUBJ-0000', 'mc', '1', 'Sample question', 'correct', '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_score`
--

CREATE TABLE `tbl_test_score` (
  `trst_id` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `student` varchar(20) NOT NULL,
  `score` varchar(10) NOT NULL,
  `check_by` varchar(10) NOT NULL,
  `check_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_employees`
-- (See below for the actual view)
--
CREATE TABLE `vw_employees` (
`Account` varchar(20)
,`Employee ID` varchar(20)
,`Type` varchar(50)
,`Name` varchar(41)
,`Name_2` varchar(45)
,`Gender` varchar(6)
,`Birthdate` varchar(73)
,`Age` double(17,0)
,`Complete Address` varchar(404)
,`Num Street` varchar(100)
,`Barangay` varchar(100)
,`City` varchar(100)
,`Provice` varchar(100)
,`Contact Number` varchar(20)
,`Email` varchar(20)
,`Status` varchar(20)
,`Date Registered` varchar(73)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_test_result`
-- (See below for the actual view)
--
CREATE TABLE `vw_test_result` (
`Qustion ID` varchar(20)
,`Date` varchar(73)
,`Time` varchar(8)
,`Subject ID` varchar(20)
,`Test Type` varchar(20)
,`Subject Name` varchar(20)
,`Subject Description` varchar(50)
,`LRN` varchar(20)
,`Student` varchar(45)
,`No.` varchar(20)
,`Question` varchar(500)
,`Point` varchar(20)
,`Type` varchar(20)
,`Correct Answer` varchar(20)
,`Student Answer` varchar(500)
,`Correct Point` varchar(1)
,`Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_employees`
--
DROP TABLE IF EXISTS `vw_employees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `vw_employees`  AS SELECT `acnt`.`acnt_id` AS `Account`, `empl`.`empl_id` AS `Employee ID`, `acnt`.`type` AS `Type`, concat(`empl`.`f_name`,' ',`empl`.`l_name`) AS `Name`, concat(`empl`.`l_name`,', ',`empl`.`f_name`,' ',left(`empl`.`m_name`,1),'.') AS `Name_2`, `empl`.`gender` AS `Gender`, date_format(`empl`.`birthdate`,'%M %d, %Y') AS `Birthdate`, date_format(from_days(to_days(current_timestamp()) - to_days(`empl`.`birthdate`)),'%Y') + 0 AS `Age`, concat(`empl`.`adrs_num_st`,' ',`empl`.`adrs_brgy`,' ',`empl`.`adrs_city`,', ',`empl`.`adrs_province`) AS `Complete Address`, `empl`.`adrs_num_st` AS `Num Street`, `empl`.`adrs_brgy` AS `Barangay`, `empl`.`adrs_city` AS `City`, `empl`.`adrs_province` AS `Provice`, `empl`.`cellphone_num` AS `Contact Number`, `empl`.`email` AS `Email`, `empl`.`status` AS `Status`, date_format(`acnt`.`regs_date`,'%M %d, %Y') AS `Date Registered` FROM (`tbl_employee` `empl` join `tbl_accounts` `acnt` on(`empl`.`account` = `acnt`.`acnt_id`)) ORDER BY `empl`.`l_name` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_test_result`
--
DROP TABLE IF EXISTS `vw_test_result`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `vw_test_result`  AS SELECT `tans`.`question` AS `Qustion ID`, date_format(`tans`.`date_time`,'%M %d, %Y') AS `Date`, date_format(`tans`.`date_time`,'%h:%i %p') AS `Time`, `tqst`.`subject` AS `Subject ID`, `tqst`.`test_type` AS `Test Type`, `subj`.`name` AS `Subject Name`, `subj`.`description` AS `Subject Description`, `sdnt`.`lrn` AS `LRN`, concat(`sdnt`.`l_name`,', ',`sdnt`.`f_name`,' ',left(`sdnt`.`m_name`,1),'.') AS `Student`, `tqst`.`order_num` AS `No.`, `tqst`.`question` AS `Question`, `tqst`.`points` AS `Point`, `tqst`.`question_type` AS `Type`, `tqst`.`correct_ans` AS `Correct Answer`, `tans`.`student_ans` AS `Student Answer`, CASE WHEN `tqst`.`correct_ans` = `tans`.`student_ans` THEN '1' ELSE '0' END AS `Correct Point`, `tans`.`status` AS `Status` FROM (((`tbl_test_answer` `tans` join `tbl_test_question` `tqst` on(`tans`.`question` = `tqst`.`tqst_id`)) join `tbl_subject` `subj` on(`tqst`.`subject` = `subj`.`subj_id`)) join `tbl_student` `sdnt` on(`tans`.`student` = `sdnt`.`lrn`)) ORDER BY `tqst`.`order_num` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`acnt_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`clss_id`),
  ADD KEY `grsc_clssFK` (`grade_section`),
  ADD KEY `empl_clssFK` (`falculty`),
  ADD KEY `subj_clssFK` (`subject`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`empl_id`),
  ADD KEY `empl_acntFK` (`account`);

--
-- Indexes for table `tbl_grade_section`
--
ALTER TABLE `tbl_grade_section`
  ADD PRIMARY KEY (`grsc_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`lrn`),
  ADD KEY `stdn_clssFK` (`grade_section`),
  ADD KEY `stdn_acntFK` (`account`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tbl_test_answer`
--
ALTER TABLE `tbl_test_answer`
  ADD PRIMARY KEY (`tans_id`),
  ADD KEY `tans_tqstFK` (`question`),
  ADD KEY `tans_trstFK` (`student`);

--
-- Indexes for table `tbl_test_question`
--
ALTER TABLE `tbl_test_question`
  ADD PRIMARY KEY (`tqst_id`),
  ADD KEY `tqst_subjFK` (`subject`);

--
-- Indexes for table `tbl_test_score`
--
ALTER TABLE `tbl_test_score`
  ADD PRIMARY KEY (`trst_id`),
  ADD KEY `stdn_trstFK` (`student`),
  ADD KEY `empl_trstFK` (`check_by`),
  ADD KEY `subj_trstFK` (`subject`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `empl_clssFK` FOREIGN KEY (`falculty`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grsc_clssFK` FOREIGN KEY (`grade_section`) REFERENCES `tbl_grade_section` (`grsc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subj_clssFK` FOREIGN KEY (`subject`) REFERENCES `tbl_subject` (`subj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `empl_acntFK` FOREIGN KEY (`account`) REFERENCES `tbl_accounts` (`acnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `stdn_acntFK` FOREIGN KEY (`account`) REFERENCES `tbl_accounts` (`acnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stdn_clssFK` FOREIGN KEY (`grade_section`) REFERENCES `tbl_grade_section` (`grsc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_test_answer`
--
ALTER TABLE `tbl_test_answer`
  ADD CONSTRAINT `tans_tqstFK` FOREIGN KEY (`question`) REFERENCES `tbl_test_question` (`tqst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tans_trstFK` FOREIGN KEY (`student`) REFERENCES `tbl_student` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_test_question`
--
ALTER TABLE `tbl_test_question`
  ADD CONSTRAINT `tqst_subjFK` FOREIGN KEY (`subject`) REFERENCES `tbl_subject` (`subj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_test_score`
--
ALTER TABLE `tbl_test_score`
  ADD CONSTRAINT `empl_trstFK` FOREIGN KEY (`check_by`) REFERENCES `tbl_employee` (`empl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stdn_trstFK` FOREIGN KEY (`student`) REFERENCES `tbl_student` (`lrn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subj_trstFK` FOREIGN KEY (`subject`) REFERENCES `tbl_subject` (`subj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
