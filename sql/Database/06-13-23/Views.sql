-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 04:18 PM
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
-- Stand-in structure for view `vw_modules`
-- (See below for the actual view)
--
CREATE TABLE `vw_modules` (
`Module ID` varchar(20)
,`Subject ID` varchar(50)
,`Subject Name` varchar(72)
,`Module Num` int(11)
,`Module Title` varchar(500)
,`Sub Title` varchar(500)
,`File` varchar(500)
,`Date Uploaded` varchar(73)
,`Time Uploaded` varchar(8)
,`Subject Status` varchar(20)
,`Module Status` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_students`
-- (See below for the actual view)
--
CREATE TABLE `vw_students` (
`Account` varchar(20)
,`LRN` varchar(20)
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
,`Religion` varchar(100)
,`Civil Status` varchar(20)
,`Occupation` varchar(100)
,`GrSc ID` varchar(20)
,`Grade Level` varchar(50)
,`Section` varchar(50)
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
,`Correct Answer` varchar(500)
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
-- Structure for view `vw_modules`
--
DROP TABLE IF EXISTS `vw_modules`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `vw_modules`  AS SELECT `modl`.`modl_id` AS `Module ID`, `modl`.`ls_subject` AS `Subject ID`, concat(`subj`.`name`,': ',`subj`.`description`) AS `Subject Name`, `modl`.`module_no` AS `Module Num`, `modl`.`title` AS `Module Title`, `modl`.`sub_title` AS `Sub Title`, `modl`.`file_name` AS `File`, date_format(`modl`.`regs_date`,'%M %d, %Y') AS `Date Uploaded`, date_format(`modl`.`regs_date`,'%h:%i %p') AS `Time Uploaded`, `subj`.`status` AS `Subject Status`, `modl`.`status` AS `Module Status` FROM (`tbl_module` `modl` join `tbl_subject` `subj` on(`modl`.`ls_subject` = `subj`.`subj_id`)) ORDER BY `modl`.`regs_date` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_students`
--
DROP TABLE IF EXISTS `vw_students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `vw_students`  AS SELECT `acnt`.`acnt_id` AS `Account`, `stnd`.`lrn` AS `LRN`, `acnt`.`type` AS `Type`, concat(`stnd`.`f_name`,' ',`stnd`.`l_name`) AS `Name`, concat(`stnd`.`l_name`,', ',`stnd`.`f_name`,' ',left(`stnd`.`m_name`,1),'.') AS `Name_2`, `stnd`.`gender` AS `Gender`, date_format(`stnd`.`birthdate`,'%M %d, %Y') AS `Birthdate`, date_format(from_days(to_days(current_timestamp()) - to_days(`stnd`.`birthdate`)),'%Y') + 0 AS `Age`, concat(`stnd`.`adrs_num_st`,' ',`stnd`.`adrs_brgy`,' ',`stnd`.`adrs_city`,', ',`stnd`.`adrs_province`) AS `Complete Address`, `stnd`.`adrs_num_st` AS `Num Street`, `stnd`.`adrs_brgy` AS `Barangay`, `stnd`.`adrs_city` AS `City`, `stnd`.`adrs_province` AS `Provice`, `stnd`.`religion` AS `Religion`, `stnd`.`civil_status` AS `Civil Status`, `stnd`.`occupation` AS `Occupation`, `stnd`.`grade_section` AS `GrSc ID`, `grsc`.`grade_level` AS `Grade Level`, `grsc`.`section` AS `Section`, `stnd`.`status` AS `Status`, date_format(`acnt`.`regs_date`,'%M %d, %Y') AS `Date Registered` FROM ((`tbl_student` `stnd` join `tbl_accounts` `acnt` on(`stnd`.`account` = `acnt`.`acnt_id`)) join `tbl_grade_section` `grsc` on(`stnd`.`grade_section` = `grsc`.`grsc_id`)) ORDER BY `stnd`.`l_name` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_test_result`
--
DROP TABLE IF EXISTS `vw_test_result`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `vw_test_result`  AS SELECT `tans`.`question` AS `Qustion ID`, date_format(`tans`.`date_time`,'%M %d, %Y') AS `Date`, date_format(`tans`.`date_time`,'%h:%i %p') AS `Time`, `tqst`.`subject` AS `Subject ID`, `tqst`.`test_type` AS `Test Type`, `subj`.`name` AS `Subject Name`, `subj`.`description` AS `Subject Description`, `sdnt`.`lrn` AS `LRN`, concat(`sdnt`.`l_name`,', ',`sdnt`.`f_name`,' ',left(`sdnt`.`m_name`,1),'.') AS `Student`, `tqst`.`order_num` AS `No.`, `tqst`.`question` AS `Question`, `tqst`.`points` AS `Point`, `tqst`.`question_type` AS `Type`, `tqst`.`correct_ans` AS `Correct Answer`, `tans`.`student_ans` AS `Student Answer`, CASE WHEN `tqst`.`correct_ans` = `tans`.`student_ans` THEN '1' ELSE '0' END AS `Correct Point`, `tans`.`status` AS `Status` FROM (((`tbl_test_answer` `tans` join `tbl_test_question` `tqst` on(`tans`.`question` = `tqst`.`tqst_id`)) join `tbl_subject` `subj` on(`tqst`.`subject` = `subj`.`subj_id`)) join `tbl_student` `sdnt` on(`tans`.`student` = `sdnt`.`lrn`)) ORDER BY `tqst`.`order_num` ASC  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
