CREATE TABLE `tbl_chat_msg` (
    `cmsg_id` VARCHAR(20) NOT NULL 
    , `language` VARCHAR(50) NOT NULL 
    , `classification` VARCHAR(50) NOT NULL DEFAULT 'General'
    , `question` VARCHAR(1000) NOT NULL 
    , `response` VARCHAR(1000) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`cmsg_id`)
);

CREATE TABLE `tbl_accounts` (
    `acnt_id` VARCHAR(20) NOT NULL 
    , `username` VARCHAR(50) NOT NULL 
    , `password` VARCHAR(50) NOT NULL 
    , `type` VARCHAR(50) NOT NULL 
    , `regs_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`acnt_id`)
);

-- GRADE AND SECTION
CREATE TABLE `tbl_grade_section` (
    `grsc_id` VARCHAR(20) NOT NULL 
    , `grade_level` VARCHAR(50) NOT NULL 
    , `section` VARCHAR(50) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`grsc_id`)
);

-- CLASS
CREATE TABLE `tbl_class` (
    `clss_id` VARCHAR(20) NOT NULL 
    , `subject` VARCHAR(20) NOT NULL 
    , `grade_section` VARCHAR(20) NOT NULL 
    , `falculty` VARCHAR(20) NOT NULL 
    , `days` VARCHAR(20) NULL 
    , `start_time` TIME NULL 
    , `end_time` TIME NULL 
    , `room` VARCHAR(20) NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`clss_id`)

    , CONSTRAINT `grsc_clssFK` 
        FOREIGN KEY (`grade_section`) 
        REFERENCES `tbl_grade_section` (`grsc_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION

    , CONSTRAINT `subj_clssFK` 
        FOREIGN KEY (`subject`) 
        REFERENCES `tbl_subject` (`subj_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION

    , CONSTRAINT `empl_clssFK` 
        FOREIGN KEY (`falculty`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- STUDENT
CREATE TABLE `tbl_student` (
    `lrn` VARCHAR(20) NOT NULL 
    , `account` VARCHAR(20) NOT NULL 
    , `f_name` VARCHAR(20) NOT NULL 
    , `m_name` VARCHAR(20) NULL 
    , `l_name` VARCHAR(20) NOT NULL 
    , `gender` VARCHAR(6) NOT NULL 
    , `birhtdate` DATE NOT NULL 
    , `adrs_num_st` VARCHAR(100) NOT NULL 
    , `adrs_brgy` VARCHAR(100) NOT NULL 
    , `adrs_city` VARCHAR(100) NOT NULL 
    , `adrs_province` VARCHAR(100) NOT NULL 
    , `religion` VARCHAR(100) NOT NULL 
    , `civil_status` VARCHAR(20) NOT NULL 
    , `occupation` VARCHAR(100) NOT NULL 
    , `high_educ` VARCHAR(20) NULL 

    , `grade_section` VARCHAR(20) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'new'

    , PRIMARY KEY (`lrn`)

    , CONSTRAINT `stdn_clssFK` 
        FOREIGN KEY (`grade_section`) 
        REFERENCES `tbl_grade_section` (`grsc_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION

    , CONSTRAINT `stdn_acntFK` 
        FOREIGN KEY (`account`) 
        REFERENCES `tbl_accounts` (`acnt_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- EMPLOYEE
CREATE TABLE `tbl_employee` (
    `empl_id` VARCHAR(20) NOT NULL 
    , `account` VARCHAR(20) NOT NULL 
    , `f_name` VARCHAR(20) NOT NULL 
    , `m_name` VARCHAR(20) NULL 
    , `l_name` VARCHAR(20) NOT NULL 
    , `gender` VARCHAR(6) NOT NULL 
    , `adrs_num_st` VARCHAR(100) NOT NULL 
    , `adrs_brgy` VARCHAR(100) NOT NULL 
    , `adrs_city` VARCHAR(100) NOT NULL 
    , `adrs_province` VARCHAR(100) NOT NULL 
    , `birhtdate` DATE NOT NULL 
    , `cellphone_num` VARCHAR(20) NOT NULL 
    , `email` VARCHAR(20) NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`empl_id`)
    , CONSTRAINT `empl_acntFK` 
        FOREIGN KEY (`account`) 
        REFERENCES `tbl_accounts` (`acnt_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- LEARNING LEVEL
CREATE TABLE `tbl_learning_lvl` (
    `lrvl_id` VARCHAR(20) NOT NULL 
    , `lrvl_num` FLOAT NOT NULL DEFAULT 1 
    , `name` VARCHAR(500) NOT NULL 
    , `description` VARCHAR(500) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`lrvl_id`)
);

-- SUBJECT
CREATE TABLE `tbl_subject` (
    `subj_id` VARCHAR(20) NOT NULL 
    , `learning_lvl` VARCHAR(20) NOT NULL 
    , `subj_num` FLOAT NOT NULL DEFAULT 1 
    , `name` VARCHAR(20) NOT NULL 
    , `description` VARCHAR(50) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`subj_id`)
    , CONSTRAINT `lrvl_subjFK` 
        FOREIGN KEY (`learning_lvl`) 
        REFERENCES `tbl_learning_lvl` (`lrvl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- LEARNING MODULE
CREATE TABLE `tbl_module` (
    `modl_id` VARCHAR(20) NOT NULL 
    , `ls_subject` VARCHAR(50) NOT NULL 
    , `module_no` INT NOT NULL 
    , `title` VARCHAR(500) NOT NULL 
    , `sub_title` VARCHAR(500) NOT NULL 
    , `sub_folder` VARCHAR(500) NOT NULL DEFAULT ''
    , `file_name` VARCHAR(500) NOT NULL 
    , `regs_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`modl_id`)
    , CONSTRAINT `subj_modlFK` 
        FOREIGN KEY (`ls_subject`) 
        REFERENCES `tbl_subject` (`subj_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- SCHOOL YEAR
CREATE TABLE `tbl_school_year` (
    `shyr_id` VARCHAR(20) NOT NULL 
    , `school_year` VARCHAR(20) NOT NULL 
    , `date_regs` VARCHAR(20) NOT NULL DEFAULT CURRENT_TIMESTAMP 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`shyr_id`)
);

-- TEST PART
CREATE TABLE `tbl_test_part` (
    `tprt_id` VARCHAR(20) NOT NULL 
    , `test_part` VARCHAR(20) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'close'

    , PRIMARY KEY (`tprt_id`)
);

-- TEST SUBJECT
CREATE TABLE `tbl_test_subject` (
    `tsbj_id` VARCHAR(20) NOT NULL 
    , `name` VARCHAR(20) NOT NULL 
    , `description` VARCHAR(50) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`tsbj_id`)
);

-- TEST QUESTIONS
CREATE TABLE `tbl_test_question` (
    `tqst_id` VARCHAR(20) NOT NULL 
    , `subject` VARCHAR(20) NOT NULL 
    , `question_num` VARCHAR(20) NOT NULL \
    , `correct_ans` VARCHAR(1000) 
    , `max_points` INT NOT NULL DEFAULT 1
    , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

    , PRIMARY KEY (`tqst_id`)
    , CONSTRAINT `tqst_subjFK` 
        FOREIGN KEY (`subject`) 
        REFERENCES `tbl_test_subject` (`tsbj_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST ANSWERS
CREATE TABLE `tbl_test_answer` (
    `tans_id` VARCHAR(20) NOT NULL 
    , `school_year` VARCHAR(20) NOT NULL 
    , `test_part` VARCHAR(20) NOT NULL 
    , `student` VARCHAR(20) NOT NULL 
    , `question` VARCHAR(20) NOT NULL 
    , `student_ans` VARCHAR(1000) NOT NULL 
    , `date_ans` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP 
    , `score_points` INT NOT NULL DEFAULT 0
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`tans_id`)
    , CONSTRAINT `tans_shyrFK` 
        FOREIGN KEY (`school_year`) 
        REFERENCES `tbl_school_year` (`shyr_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `tans_tprtFK` 
        FOREIGN KEY (`test_part`) 
        REFERENCES `tbl_test_part` (`tprt_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `tans_trstFK` 
        FOREIGN KEY (`student`) 
        REFERENCES `tbl_student` (`lrn`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `tans_tqstFK` 
        FOREIGN KEY (`question`) 
        REFERENCES `tbl_test_question` (`tqst_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `tans_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);


-- TEST PART
CREATE TABLE `tbl_test_period` (
    `tprd_id` VARCHAR(20) NOT NULL 
    , `test_period` VARCHAR(20) NOT NULL 
    , `status` VARCHAR(20) NOT NULL DEFAULT 'close'

    , PRIMARY KEY (`tprd_id`)
);


-- TEST FLT PIS
CREATE TABLE `tbl_flt_pis` (
    `fpis_id` VARCHAR(20) NOT NULL 
    , `school_year` VARCHAR(20) NOT NULL 
    , `test_period` VARCHAR(20) NOT NULL 
    , `student` VARCHAR(20) NOT NULL 

    , `f_name` VARCHAR(20) NOT NULL 
    , `m_name` VARCHAR(20) NULL 
    , `l_name` VARCHAR(20) NOT NULL 
    , `name_score` INT NOT NULL DEFAULT 0
    , `gender` VARCHAR(6) NOT NULL 
    , `gender_score` INT NOT NULL DEFAULT 0
    , `birthdate` DATE NOT NULL 
    , `birthdate_score` INT NOT NULL DEFAULT 0
    , `adrs_num_st` VARCHAR(100) NOT NULL 
    , `adrs_brgy` VARCHAR(100) NOT NULL 
    , `adrs_city` VARCHAR(100) NOT NULL 
    , `adrs_province` VARCHAR(100) NOT NULL 
    , `adrs_score` INT NOT NULL DEFAULT 0
    , `religion` VARCHAR(100) NOT NULL 
    , `religion_score` INT NOT NULL DEFAULT 0
    , `civil_status` VARCHAR(20) NOT NULL 
    , `civil_status_score` INT NOT NULL DEFAULT 0
    , `occupation` VARCHAR(100) NOT NULL 
    , `occupation_score` INT NOT NULL DEFAULT 0
    , `high_educ` VARCHAR(20) NULL 
    , `high_educ_score` INT NOT NULL DEFAULT 0
    , `about_student` VARCHAR(1000) NULL 
    , `about_student_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 10
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fpis_id`)
    , CONSTRAINT `fpis_shyrFK` 
        FOREIGN KEY (`school_year`) 
        REFERENCES `tbl_school_year` (`shyr_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `fpis_tprdFK` 
        FOREIGN KEY (`test_period`) 
        REFERENCES `tbl_test_period` (`tprd_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `fpis_trstFK` 
        FOREIGN KEY (`student`) 
        REFERENCES `tbl_student` (`lrn`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `fpis_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);


-- TEST FLT PIS
CREATE TABLE `tbl_flt_pis` (
    `fpis_id` VARCHAR(20) NOT NULL 

    , `f_name` VARCHAR(20) NOT NULL 
    , `m_name` VARCHAR(20) NULL 
    , `l_name` VARCHAR(20) NOT NULL 
    , `name_score` INT NOT NULL DEFAULT 0
    , `gender` VARCHAR(6) NOT NULL 
    , `gender_score` INT NOT NULL DEFAULT 0
    , `birhtdate` DATE NOT NULL 
    , `birhtdate_score` INT NOT NULL DEFAULT 0
    , `adrs_num_st` VARCHAR(100) NOT NULL 
    , `adrs_brgy` VARCHAR(100) NOT NULL 
    , `adrs_city` VARCHAR(100) NOT NULL 
    , `adrs_province` VARCHAR(100) NOT NULL 
    , `adrs_score` INT NOT NULL DEFAULT 0
    , `religion` VARCHAR(100) NOT NULL 
    , `religion_score` INT NOT NULL DEFAULT 0
    , `civil_status` VARCHAR(20) NOT NULL 
    , `civil_status_score` INT NOT NULL DEFAULT 0
    , `occupation` VARCHAR(100) NOT NULL 
    , `occupation_score` INT NOT NULL DEFAULT 0
    , `high_educ` VARCHAR(20) NULL 
    , `high_educ_score` INT NOT NULL DEFAULT 0
    , `about_student` VARCHAR(1000) NULL 
    , `about_student_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 10
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fpis_id`)
    , CONSTRAINT `fpis_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS1_eng
CREATE TABLE `tbl_flt_ls1_eng` (
    `fls1e_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    , `q6_answer` VARCHAR(1000) NOT NULL 
    , `q6_score` INT NOT NULL DEFAULT 0
    , `q7_answer` VARCHAR(1000) NOT NULL 
    , `q7_score` INT NOT NULL DEFAULT 0
    , `q8_answer` VARCHAR(1000) NOT NULL 
    , `q8_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 8
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls1e_id`)
    , CONSTRAINT `fls1e_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS1_fil
CREATE TABLE `tbl_flt_ls1_fil` (
    `fls1f_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(1000) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(1000) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 6
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls1f_id`)
    , CONSTRAINT `fls1f_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS2
CREATE TABLE `tbl_flt_ls2` (
    `fls2_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 5
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls2_id`)
    , CONSTRAINT `fls2_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS3
CREATE TABLE `tbl_flt_ls3` (
    `fls3_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    , `q6_answer` VARCHAR(20) NOT NULL 
    , `q6_score` INT NOT NULL DEFAULT 0
    , `q7_answer` VARCHAR(20) NOT NULL 
    , `q7_score` INT NOT NULL DEFAULT 0
    , `q8_answer` VARCHAR(20) NOT NULL 
    , `q8_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 8
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls3_id`)
    , CONSTRAINT `fls3_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS3
CREATE TABLE `tbl_flt_ls4` (
    `fls4_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    , `q6_answer` VARCHAR(20) NOT NULL 
    , `q6_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 6
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls4_id`)
    , CONSTRAINT `fls4_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS5
CREATE TABLE `tbl_flt_ls5` (
    `fls5_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 5
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls5_id`)
    , CONSTRAINT `fls5_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);

-- TEST FLT LS6
CREATE TABLE `tbl_flt_ls6` (
    `fls6_id` VARCHAR(20) NOT NULL 

    , `q1_answer` VARCHAR(20) NOT NULL 
    , `q1_score` INT NOT NULL DEFAULT 0
    , `q2_answer` VARCHAR(20) NOT NULL 
    , `q2_score` INT NOT NULL DEFAULT 0
    , `q3_answer` VARCHAR(20) NOT NULL 
    , `q3_score` INT NOT NULL DEFAULT 0
    , `q4_answer` VARCHAR(20) NOT NULL 
    , `q4_score` INT NOT NULL DEFAULT 0
    , `q5_answer` VARCHAR(20) NOT NULL 
    , `q5_score` INT NOT NULL DEFAULT 0
    , `q6_answer` VARCHAR(20) NOT NULL 
    , `q6_score` INT NOT NULL DEFAULT 0
    
    , `total_score` INT NOT NULL DEFAULT 0
    , `max_score` INT NOT NULL DEFAULT 6
    , `date_ans` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
    , `check_date` DATE 
    , `check_by` VARCHAR(20)
    , `status` VARCHAR(20) NOT NULL DEFAULT 'checking'

    , PRIMARY KEY (`fls6_id`)
    , CONSTRAINT `fls6_emplFK` 
        FOREIGN KEY (`check_by`) 
        REFERENCES `tbl_employee` (`empl_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
);


-- TEST STUDENT FLT
CREATE TABLE `tbl_student_flt` (
    `sflt_id` VARCHAR(20) NOT NULL 
    , `school_year` VARCHAR(20) NOT NULL 
    , `test_period` VARCHAR(20) NOT NULL 
    , `student` VARCHAR(20) NOT NULL 

    , `fpis` VARCHAR(20) NULL 
    , `ls1_eng` VARCHAR(20) NULL 
    , `ls1_fil` VARCHAR(20) NULL 
    , `ls2` VARCHAR(20) NULL 
    , `ls3` VARCHAR(20) NULL 
    , `ls4` VARCHAR(20) NULL 
    , `ls5` VARCHAR(20) NULL 
    , `ls6` VARCHAR(20) NULL 

    , `status` VARCHAR(20) NOT NULL DEFAULT 'pending'

    , PRIMARY KEY (`sflt_id`)
    , CONSTRAINT `sflt_shyrFK` 
        FOREIGN KEY (`school_year`) 
        REFERENCES `tbl_school_year` (`shyr_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION     
    , CONSTRAINT `sflt_tprdFK` 
        FOREIGN KEY (`test_period`) 
        REFERENCES `tbl_test_period` (`tprd_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_trstFK` 
        FOREIGN KEY (`student`) 
        REFERENCES `tbl_student` (`lrn`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION

    , CONSTRAINT `sflt_fpisFK` 
        FOREIGN KEY (`fpis`) 
        REFERENCES `tbl_flt_pis` (`fpis_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls1eFK` 
        FOREIGN KEY (`ls1_eng`) 
        REFERENCES `tbl_flt_ls1_eng` (`fls1e_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls1fFK` 
        FOREIGN KEY (`ls1_fil`) 
        REFERENCES `tbl_flt_ls1_fil` (`fls1f_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls2FK` 
        FOREIGN KEY (`ls2`) 
        REFERENCES `tbl_flt_ls2` (`fls2_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls3FK` 
        FOREIGN KEY (`ls3`) 
        REFERENCES `tbl_flt_ls3` (`fls3_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls4FK` 
        FOREIGN KEY (`ls4`) 
        REFERENCES `tbl_flt_ls4` (`fls4_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls5FK` 
        FOREIGN KEY (`ls5`) 
        REFERENCES `tbl_flt_ls5` (`fls5_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
    , CONSTRAINT `sflt_fls6FK` 
        FOREIGN KEY (`ls6`) 
        REFERENCES `tbl_flt_ls6` (`fls6_id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION

);

-- -- TEST SCORES
-- CREATE TABLE `tbl_test_score` (
--     `trst_id` VARCHAR(20) NOT NULL 
--     , `subject` VARCHAR(20) NOT NULL 
--     , `student` VARCHAR(20) NOT NULL 
--     , `score` VARCHAR(10) NOT NULL 
--     , `check_by` VARCHAR(10) NOT NULL 
--     , `check_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
--     , `status` VARCHAR(20) NOT NULL DEFAULT 'active'

--     , PRIMARY KEY (`trst_id`)
--     , CONSTRAINT `subj_trstFK` 
--         FOREIGN KEY (`subject`) 
--         REFERENCES `tbl_test_subject` (`tsbj_id`) 
--         ON DELETE NO ACTION 
--         ON UPDATE NO ACTION
--     , CONSTRAINT `stdn_trstFK` 
--         FOREIGN KEY (`student`) 
--         REFERENCES `tbl_student` (`lrn`) 
--         ON DELETE NO ACTION 
--         ON UPDATE NO ACTION
--     , CONSTRAINT `empl_trstFK` 
--         FOREIGN KEY (`check_by`) 
--         REFERENCES `tbl_employee` (`empl_id`) 
--         ON DELETE NO ACTION 
--         ON UPDATE NO ACTION
-- );