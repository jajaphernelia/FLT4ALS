CREATE or REPLACE VIEW vw_employees AS
SELECT 
    acnt.acnt_id           as  'Account'
    , empl.empl_id             as  'Employee ID'
    
    , acnt.type           as  'Type'
    , concat(empl.f_name,' ',empl.l_name)   as 'Name'
    , concat(empl.l_name,', ',empl.f_name,' ',LEFT(empl.m_name, 1),'.')   as 'Name_2'
    , empl.gender            as  'Gender'
    , DATE_FORMAT(empl.birthdate, '%M %d, %Y') as `Birthdate`
    , DATE_FORMAT(
        FROM_DAYS(
            TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(empl.birthdate)),
            '%Y'
        ) + 0 AS `Age`

    , concat(empl.adrs_num_st, ' '
        , empl.adrs_brgy, ' '
        , empl.adrs_city, ', '
        , empl.adrs_province) AS `Complete Address`
    , empl.adrs_num_st   as  'Num Street'
    , empl.adrs_brgy   as  'Barangay'
    , empl.adrs_city   as  'City'
    , empl.adrs_province   as  'Provice'

    , empl.cellphone_num   as  'Contact Number'
    , empl.email            as  'Email'
    , empl.status           as  'Status'

    , DATE_FORMAT(acnt.regs_date, '%M %d, %Y') as `Date Registered`

FROM tbl_employee       as empl

INNER JOIN tbl_accounts     as acnt 
    ON empl.account = acnt.acnt_id

ORDER BY empl.l_name;

CREATE or REPLACE VIEW vw_test_result AS
SELECT 
    tans.question           as  'Qustion ID'
    , DATE_FORMAT(tans.date_time, '%M %d, %Y') as `Date`
    , DATE_FORMAT(tans.date_time, '%h:%i %p') as `Time`

    , tqst.subject  as  'Subject ID'
    , tqst.test_type  as  'Test Type'
    , subj.name  as  'Subject Name'
    , subj.description  as  'Subject Description'

    , sdnt.lrn  as  'LRN'
    , concat(sdnt.l_name,', ',sdnt.f_name,' ',LEFT(sdnt.m_name, 1),'.')   as 'Student'

    , tqst.order_num             as  'No.'
    , tqst.question             as  'Question'
    , tqst.points             as  'Point'
    , tqst.question_type             as  'Type'
    , tqst.correct_ans             as  'Correct Answer'
    , tans.student_ans             as  'Student Answer'
    
    , case when tqst.correct_ans = tans.student_ans then '1'
            else '0'
        end as 'Correct Point'

    , tans.status           as  'Status'

FROM tbl_test_answer       as tans

INNER JOIN tbl_test_question     as tqst 
    ON tans.question = tqst.tqst_id
    
INNER JOIN tbl_subject     as subj 
    ON tqst.subject = subj.subj_id

INNER JOIN tbl_student     as sdnt 
    ON tans.student = sdnt.lrn

ORDER BY tqst.order_num;

CREATE or REPLACE VIEW vw_modules AS
SELECT 
    lrvl.lrvl_id  as  'Learning Level ID'
    , lrvl.lrvl_num  as  'Learning Level Number'
    , lrvl.name  as  'Learning Level'
    , subj.subj_num  as  'Subject Number'
    , modl.ls_subject  as  'Subject ID'
    , concat(subj.name,': ',subj.description)   as 'Subject Name'
    , modl.modl_id           as  'Module ID'
    , modl.module_no  as  'Module Num'
    , modl.title  as  'Module Title'
    , modl.sub_title  as  'Sub Title'
    , modl.sub_folder  as  'Sub Folder'
    , concat(modl.ls_subject,'/',modl.sub_folder,'/',modl.file_name)  as  'File'
    , DATE_FORMAT(modl.regs_date, '%M %d, %Y') as `Date Uploaded`
    , DATE_FORMAT(modl.regs_date, '%h:%i %p') as `Time Uploaded`

    , subj.status           as  'Subject Status'
    , modl.status           as  'Module Status'

FROM tbl_module       as modl

INNER JOIN tbl_subject     as subj 
    ON modl.ls_subject = subj.subj_id
INNER JOIN tbl_learning_lvl     as lrvl 
    ON subj.learning_lvl = lrvl.lrvl_id

ORDER BY modl.regs_date;


CREATE or REPLACE VIEW vw_test_result AS
SELECT 
    tans.tans_id as 'Answer ID'
    , tans.school_year as 'School Year ID'
    , shyr.school_year as 'School Year'
    , tans.test_part as 'Test Part ID'
    , tprt.test_part as 'Test Part'
    , tans.student as 'LRN'
    , concat(sdnt.l_name,', ',sdnt.f_name,' ',LEFT(sdnt.m_name, 1),'.')   as 'Student Name'

    , tqst.subject as 'Subject ID'
    , concat(tsbj.name,': ',tsbj.description)   as 'Subject Name'
    , tans.question as 'Question ID'
    , tqst.question_num as 'Question Number'

    , tans.student_ans as 'Student Answer'
    , tqst.correct_ans as 'Correct Answer'
    , tans.score_points as 'Student Score'
    , tqst.max_points as 'Max Score'
    , CASE
        WHEN tans.student_ans = '' THEN 0
        WHEN UPPER(tans.student_ans) = UPPER(tqst.correct_ans) THEN tqst.max_points
        WHEN tqst.correct_ans = '' THEN tans.score_points
        WHEN tans.student_ans = null THEN 'Null Answer'
        ELSE 'Error'
    END AS 'Checked Score'
    
    , DATE_FORMAT(tans.date_ans, '%M %d, %Y') as 'Date Answered'
    , DATE_FORMAT(tans.date_ans, '%h:%i %p') as 'Time Answered'
    , DATE_FORMAT(tans.check_date, '%M %d, %Y') as 'Date Checked'
    , DATE_FORMAT(tans.check_date, '%h:%i %p') as 'Time Checked'
    , tans.check_by as 'Teacher ID'
    , concat(empl.f_name,' ',empl.l_name)   as 'Teacher Name'
    , tans.status as 'Answer Status'

FROM tbl_test_answer       as tans

INNER JOIN tbl_school_year     as shyr 
    ON tans.school_year = shyr.shyr_id

INNER JOIN tbl_test_part     as tprt 
    ON tans.test_part = tprt.tprt_id

INNER JOIN tbl_student     as sdnt 
    ON tans.student = sdnt.lrn

INNER JOIN tbl_test_question     as tqst 
    ON tans.question = tqst.tqst_id
INNER JOIN tbl_test_subject     as tsbj 
    ON tqst.subject = tsbj.tsbj_id

LEFT JOIN tbl_employee     as empl 
    ON tans.check_by = empl.empl_id

ORDER BY tqst.question_num;

-- FLT RESULT
CREATE or REPLACE VIEW vw_flt_result AS
SELECT 
    `School Year ID`
    , `School Year`
    , `Test Part ID`
    , `Test Part`
    , `Subject ID`
    , `Subject Name`
    , `LRN`
    , `Student Name`
    , SUM(`Checked Score`) as 'Test Score'
    , SUM(`Max Score`) as 'Max Score'

FROM vw_test_result

GROUP BY `Subject ID`
ORDER BY `Subject ID`


CREATE or REPLACE VIEW vw_als_evaluation AS
SELECT 
    `School Year ID`
    , `School Year`
    , `Test Part ID`
    , `Test Part`
    , `LRN`
    , `Student Name`
    , SUM(`Test Score`) as 'Total Score'
    , SUM(`Max Score`) as 'Max Score'
    , CASE
        WHEN SUM(`Test Score`) >= 0 AND SUM(`Test Score`) <= 9 THEN 'Basic Level (Grade 1)'
        WHEN SUM(`Test Score`) >= 10 AND SUM(`Test Score`) <= 13 THEN 'Lower Elementrary (Grade 2-3)'
        WHEN SUM(`Test Score`) >= 14 AND SUM(`Test Score`) <= 27 THEN 'Advance Elementrary (Grade 4-6)'
        WHEN SUM(`Test Score`) >= 28 AND SUM(`Test Score`) <= 54 THEN 'Junior High School (Grade 7-10)'
        ELSE 'Error'
    END AS 'Learning Level'

FROM vw_flt_result

GROUP BY `School Year` AND `Test Part ID` AND `LRN`
ORDER BY `Subject Name`