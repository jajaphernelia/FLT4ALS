-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 04:17 PM
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
('ACNT-00000', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '2023-05-27 16:03:50', 'active'),
('ACNT-00002', 'student', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '2023-05-27 16:55:24', 'active');

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
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `modl_id` varchar(20) NOT NULL,
  `ls_subject` varchar(50) NOT NULL,
  `module_no` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `sub_title` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `regs_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`modl_id`, `ls_subject`, `module_no`, `title`, `sub_title`, `file_name`, `regs_date`, `status`) VALUES
('MODL-00101', 'SUBJ-00001', 1, 'Appropriate Expressions in Meetings and Interviews', '', 'Appropriate Expressions in Meetings and Interviews.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00102', 'SUBJ-00001', 2, 'Daily News', '', 'Daily News.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00103', 'SUBJ-00001', 3, 'Hello May I Help You', '', 'Hello May I Help You.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00104', 'SUBJ-00001', 4, 'I Have A Letter For You', '', 'I Have A Letter For You.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00105', 'SUBJ-00001', 5, 'The ABCs of Writing Complex Sentences', '', 'The ABCs of Writing Complex Sentences.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00201', 'SUBJ-00002', 1, 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00202', 'SUBJ-00002', 2, 'Angkop na Pahayag sa mga Pulong at Panayam', '', 'Angkop na Pahayag sa mga Pulong at Panayam.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00203', 'SUBJ-00002', 3, 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap', '', 'Ang ABC ng Pagsulat ng mga Hugnayang Pangungusap.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00204', 'SUBJ-00002', 4, 'Mayroon akong Liham Para Sa Iyo', '', 'Mayroon akong Liham Para Sa Iyo.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00205', 'SUBJ-00002', 5, 'Pang-araw-araw na Balita', '', 'Pang-araw-araw na Balita.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00301', 'SUBJ-00003', 1, 'Animals Love Them and Care for Them', 'English', 'Animals Love Them and Care for Them.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00302', 'SUBJ-00003', 2, 'Herbal Medicine', 'English', 'Herbal Medicine.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00303', 'SUBJ-00003', 3, 'Living With Simple Machines', 'English', 'Living With Simple Machines.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00304', 'SUBJ-00003', 4, 'Preparing for Calamities', 'English', 'Preparing for Calamities.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00305', 'SUBJ-00003', 5, 'Preparing for Typhoons', 'English', 'Preparing for Typhoons.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00306', 'SUBJ-00003', 6, 'Saving Our Soil Resources', 'English', 'Saving Our Soil Resources.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00307', 'SUBJ-00003', 7, 'Think Green', 'English', 'Think Green.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00309', 'SUBJ-00003', 8, 'What is Happening to Our Environment', 'English', 'What is Happening to Our Environment.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00310', 'SUBJ-00003', 9, 'Ano ang Nangyayari sa Ating Kapaligiran', 'Tagalog', 'Ano ang Nangyayari sa Ating Kapaligiran.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00311', 'SUBJ-00003', 10, 'Mahalin at Arugain ang mga Hayop', 'Tagalog', 'Mahalin at Arugain ang mga Hayop.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00312', 'SUBJ-00003', 11, 'Mga Halamang Gamot', 'Tagalog', 'Mga Halamang Gamot.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00313', 'SUBJ-00003', 12, 'Mga Luntiang Halaman', 'Tagalog', 'Mga Luntiang Halaman.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00314', 'SUBJ-00003', 13, 'Mga Simpleng Makina', 'Tagalog', 'Mga Simpleng Makina.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00315', 'SUBJ-00003', 14, 'Paghahanda Para sa Bagyo', 'Tagalog', 'Paghahanda Para sa Bagyo.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00316', 'SUBJ-00003', 15, 'Paghahanda sa Kalamidad', 'Tagalog', 'Paghahanda sa Kalamidad.pdf', '2023-06-13 13:56:38', 'active'),
('MODL-00318', 'SUBJ-00003', 16, 'Pagliligtas sa Ating mga Yamang Lupa', 'Tagalog', 'Pagliligtas sa Ating mga Yamang Lupa.pdf', '2023-06-13 13:56:38', 'active');

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
  `birthdate` date NOT NULL,
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

INSERT INTO `tbl_student` (`lrn`, `account`, `f_name`, `m_name`, `l_name`, `gender`, `birthdate`, `adrs_num_st`, `adrs_brgy`, `adrs_city`, `adrs_province`, `religion`, `civil_status`, `occupation`, `high_educ`, `grade_section`, `status`) VALUES
('102230060002', 'ACNT-00002', 'María Clara', 'de los Santos', 'Alba', 'Female', '2001-05-20', '01 Sample St.', 'Barangay 1', 'Manila', 'Metro Manila', 'Roman Catholic', 'Single', 'N/A', 'Grade 5', 'GRSC-00000', 'active');

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
('SUBJ-00001', 'LS1', 'Communication Skills (English)', 'active'),
('SUBJ-00002', 'LS1', 'Communication Skills (Filipino)', 'active'),
('SUBJ-00003', 'LS2', 'Scientific Literacy and Critical Thinking', 'active'),
('SUBJ-00004', 'LS3', 'Mathematics and Problem Solving Skills', 'active'),
('SUBJ-00005', 'LS4', 'Life and Career', 'active'),
('SUBJ-00006', 'LS5', 'Understanding the Self and the Society', 'active'),
('SUBJ-00007', 'LS6', 'Digital Citizenship', 'active');

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
  `correct_ans` varchar(500) NOT NULL,
  `points` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_score`
--

CREATE TABLE `tbl_test_score` (
  `trst_id` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `student` varchar(20) NOT NULL,
  `score` varchar(10) NOT NULL,
  `check_by` varchar(20) NOT NULL,
  `check_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`modl_id`),
  ADD KEY `subj_modlFK` (`ls_subject`);

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
-- Constraints for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD CONSTRAINT `subj_modlFK` FOREIGN KEY (`ls_subject`) REFERENCES `tbl_subject` (`subj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
