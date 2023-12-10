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
    ORDER BY empl.l_name
;

CREATE or REPLACE VIEW vw_students AS
    SELECT
        acnt.acnt_id AS 'Account',
        stnd.lrn AS 'LRN',
        acnt.type AS Type,
        CONCAT(stnd.f_name, ' ', stnd.l_name) AS 'Name',
        CONCAT(stnd.l_name, ', ', stnd.f_name, ' ', LEFT(stnd.m_name, 1), '.') AS 'Name_2',
        stnd.gender AS 'Gender',

        DATE_FORMAT(fpis.birthdate, '%M %d, %Y') AS 'Birthdate',
        DATE_FORMAT(
            FROM_DAYS(TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(fpis.birthdate)),'%Y'
        ) + 0 AS 'Age',
        CONCAT(
            fpis.adrs_num_st,' '
            ,fpis.adrs_brgy,' '
            ,fpis.adrs_city,', '
            ,fpis.adrs_province
        ) AS 'Complete Address',

        fpis.adrs_num_st AS 'Num Street',
        fpis.adrs_brgy AS 'Barangay',
        fpis.adrs_city AS 'City',
        fpis.adrs_province AS 'Provice',
        fpis.religion AS 'Religion',
        fpis.civil_status AS 'Civil Status',
        fpis.occupation AS 'Occupation',
        fpis.about_student AS 'About Student',
        stnd.status AS 'Student Status',
        acnt.status AS 'Account Status',
        acnt.online_status AS 'Online Status',
        DATE_FORMAT(acnt.regs_date, '%M %d, %Y') AS 'Date Registered'
        
    FROM tbl_student  as stnd

    INNER JOIN tbl_accounts acnt
        ON stnd.account = acnt.acnt_id
    LEFT JOIN tbl_student_flt sflt
        ON stnd.lrn = sflt.student
    LEFT JOIN tbl_flt_pis fpis
        ON sflt.fpis = fpis.fpis_id
    GROUP BY stnd.lrn
    ORDER BY stnd.l_name
;

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

    ORDER BY modl.regs_date
;

CREATE or REPLACE VIEW vw_flt_als_evaluation AS
    SELECT 
        sflt.sflt_id    as 'FLT ID'
        , sflt.school_year as 'School Year ID'
        , shyr.school_year as 'School Year'

        , sflt.student as 'LRN'
        , concat(sdnt.l_name,', ',sdnt.f_name,' ',LEFT(sdnt.m_name, 1),'.')   as 'Student Name'
        , sdnt.gender as 'Gender'


        , sflt.test_period as 'Test Period ID'
        , tprd.test_period as 'Test Period'

        , sflt.fpis as 'PIS ID'
        , fpis.total_score as 'PIS Total Score'
        , fpis.max_score as 'PIS Max Score'
        , DATE_FORMAT(fpis.date_ans, '%M %d, %Y') as 'PIS Date Answered'
        , DATE_FORMAT(fpis.date_ans, '%h:%i %p') as 'PIS Time Answered'
        , DATE_FORMAT(fpis.check_date, '%M %d, %Y') as 'PIS Date Checked'
        , fpis.status as 'PIS Status'

        , sflt.ls1_eng as 'LS1E ID'
        , fls1e.total_score as 'LS1E Total Score'
        , fls1e.max_score as 'LS1E Max Score'
        , DATE_FORMAT(fls1e.date_ans, '%M %d, %Y') as 'LS1E Date Answered'
        , DATE_FORMAT(fls1e.date_ans, '%h:%i %p') as 'LS1E Time Answered'
        , DATE_FORMAT(fls1e.check_date, '%M %d, %Y') as 'LS1E Date Checked'
        , fls1e.status as 'LS1E Status'

        , sflt.ls1_fil as 'LS1F ID'
        , fls1f.total_score as 'LS1F Total Score'
        , fls1f.max_score as 'LS1F Max Score'
        , DATE_FORMAT(fls1f.date_ans, '%M %d, %Y') as 'LS1F Date Answered'
        , DATE_FORMAT(fls1f.date_ans, '%h:%i %p') as 'LS1F Time Answered'
        , DATE_FORMAT(fls1f.check_date, '%M %d, %Y') as 'LS1F Date Checked'
        , fls1f.status as 'LS1F Status'

        , sflt.ls2 as 'LS2 ID'
        , fls2.total_score as 'LS2 Total Score'
        , fls2.max_score as 'LS2 Max Score'
        , DATE_FORMAT(fls2.date_ans, '%M %d, %Y') as 'LS2 Date Answered'
        , DATE_FORMAT(fls2.date_ans, '%h:%i %p') as 'LS2 Time Answered'
        , DATE_FORMAT(fls2.check_date, '%M %d, %Y') as 'LS2 Date Checked'
        , fls2.status as 'LS2 Status'


        , sflt.ls3 as 'LS3 ID'
        , fls3.total_score as 'LS3 Total Score'
        , fls3.max_score as 'LS3 Max Score'
        , DATE_FORMAT(fls3.date_ans, '%M %d, %Y') as 'LS3 Date Answered'
        , DATE_FORMAT(fls3.date_ans, '%h:%i %p') as 'LS3 Time Answered'
        , DATE_FORMAT(fls3.check_date, '%M %d, %Y') as 'LS3 Date Checked'
        , fls3.status as 'LS3 Status'

        , sflt.ls4 as 'LS4 ID'
        , fls4.total_score as 'LS4 Total Score'
        , fls4.max_score as 'LS4 Max Score'
        , DATE_FORMAT(fls4.date_ans, '%M %d, %Y') as 'LS4 Date Answered'
        , DATE_FORMAT(fls4.date_ans, '%h:%i %p') as 'LS4 Time Answered'
        , DATE_FORMAT(fls4.check_date, '%M %d, %Y') as 'LS4 Date Checked'
        , fls4.status as 'LS4 Status'

        , sflt.ls5 as 'LS5 ID'
        , fls5.total_score as 'LS5 Total Score'
        , fls5.max_score as 'LS5 Max Score'
        , DATE_FORMAT(fls5.date_ans, '%M %d, %Y') as 'LS5 Date Answered'
        , DATE_FORMAT(fls5.date_ans, '%h:%i %p') as 'LS5 Time Answered'
        , DATE_FORMAT(fls5.check_date, '%M %d, %Y') as 'LS5 Date Checked'
        , fls5.status as 'LS5 Status'

        , sflt.ls6 as 'LS6 ID'
        , fls6.total_score as 'LS6 Total Score'
        , fls6.max_score as 'LS6 Max Score'
        , DATE_FORMAT(fls6.date_ans, '%M %d, %Y') as 'LS6 Date Answered'
        , DATE_FORMAT(fls6.date_ans, '%h:%i %p') as 'LS6 Time Answered'
        , DATE_FORMAT(fls6.check_date, '%M %d, %Y') as 'LS6 Date Checked'
        , fls6.status as 'LS6 Status'

        -- FLT TOTAL SCORE
        , fpis.total_score 
            + fls1e.total_score
            + fls1f.total_score
            + fls2.total_score
            + fls3.total_score
            + fls4.total_score
            + fls5.total_score
            + fls6.total_score
        as 'FLT Total Score'
        
        -- FLT MAS SCORE
        , fpis.max_score 
            + fls1e.max_score
            + fls1f.max_score
            + fls2.max_score
            + fls3.max_score
            + fls4.max_score
            + fls5.max_score
            + fls6.max_score
        as 'FLT Max Score'
        
        , CASE
            WHEN 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score >= 0 
                AND 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score <= 9 
                THEN 'Basic Level (Grade 1)'
            WHEN 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score >= 10 
                AND 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score <= 13 
                THEN 'Lower Elementrary (Grade 2-3)'
            WHEN 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score >= 14 
                AND 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score <= 27 
                THEN 'Advance Elementrary (Grade 4-6)'
            WHEN 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score >= 28 
                AND 
                fpis.total_score 
                + fls1e.total_score
                + fls1f.total_score
                + fls2.total_score
                + fls3.total_score
                + fls4.total_score
                + fls5.total_score
                + fls6.total_score <= 54 
                THEN 'Junior H.S. (Grade 7-10)'
            ELSE 'FLT is not yet Completed'
        END AS 'Learning Level'

    FROM tbl_student_flt as sflt

    LEFT JOIN tbl_student     as sdnt 
        ON sdnt.lrn = sflt.student

    LEFT JOIN tbl_school_year     as shyr 
        ON sflt.school_year = shyr.shyr_id
    LEFT JOIN tbl_test_period     as tprd 
        ON sflt.test_period = tprd.tprd_id

    LEFT JOIN tbl_flt_pis    as fpis 
        ON sflt.fpis = fpis.fpis_id
    LEFT JOIN tbl_flt_ls1_eng     as fls1e 
        ON sflt.ls1_eng = fls1e.fls1e_id
    LEFT JOIN tbl_flt_ls1_fil     as fls1f 
        ON sflt.ls1_fil = fls1f.fls1f_id
    LEFT JOIN tbl_flt_ls2     as fls2 
        ON sflt.ls2 = fls2.fls2_id
    LEFT JOIN tbl_flt_ls3     as fls3 
        ON sflt.ls3 = fls3.fls3_id
    LEFT JOIN tbl_flt_ls4     as fls4 
        ON sflt.ls4 = fls4.fls4_id
    LEFT JOIN tbl_flt_ls5     as fls5
        ON sflt.ls5 = fls5.fls5_id
    LEFT JOIN tbl_flt_ls6     as fls6 
        ON sflt.ls6 = fls6.fls6_id
;

CREATE or REPLACE VIEW vw_student_progress AS
    SELECT
        stnd.`LRN`
        , stnd.`Name`
        , stnd.`Name_2`
        , stnd.`Gender`

        , sflt.`FLT ID`

        , sflt.`School Year ID`
        , sflt.`School Year`
        
        , sflt.`Test Period ID`
        , sflt.`Test Period`

        , CASE
            WHEN sflt.`PIS TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'PIS'

        , CASE
            WHEN sflt.`LS1E TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS1E'

        , CASE
            WHEN sflt.`LS1F TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS1F'

        , CASE
            WHEN sflt.`LS2 TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS2'

        , CASE
            WHEN sflt.`LS3 TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS3'

        , CASE
            WHEN sflt.`LS4 TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS4'

        , CASE
            WHEN sflt.`LS5 TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS5'

        , CASE
            WHEN sflt.`LS6 TOTAL SCORE` >= 0 
                THEN '1'
            ELSE '0'
        END AS 'LS6'

        , stnd.`Student Status`
        , stnd.`Account Status`
        , stnd.`Online Status`
        
    FROM vw_students  as stnd

    LEFT JOIN vw_flt_als_evaluation sflt
        ON stnd.lrn = sflt.LRN
    ORDER BY stnd.`Name_2`
;