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


CREATE or REPLACE VIEW vw_students AS
SELECT
    acnt.`acnt_id` AS 'Account',
    stnd.`lrn` AS `LRN`,
    acnt.`type` AS `Type`,
    CONCAT(stnd.`f_name`, ' ', stnd.`l_name`) AS 'Name',
    CONCAT(stnd.`l_name`, ', ', stnd.`f_name`, ' ', LEFT(stnd.`m_name`, 1), '.') AS 'Name_2',
    stnd.`gender` AS 'Gender',
    DATE_FORMAT(stnd.`birthdate`, '%M %d, %Y') AS 'Birthdate',
    DATE_FORMAT(
        FROM_DAYS(
            TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(stnd.`birthdate`)),
            '%Y'
        ) + 0 AS `Age`,
    CONCAT(
        stnd.`adrs_num_st`,
        ' ',
        stnd.`adrs_brgy`,
        ' ',
        stnd.`adrs_city`,
        ', ',
        stnd.`adrs_province`
    ) AS 'Complete Address',
    stnd.`adrs_num_st` AS 'Num Street',
    stnd.`adrs_brgy` AS 'Barangay',
    stnd.`adrs_city` AS 'City',
    stnd.`adrs_province` AS 'Provice',
    stnd.`religion` AS 'Religion',
    stnd.`civil_status` AS 'Civil Status',
    stnd.`occupation` AS 'Occupation',
    stnd.`status` AS 'Student Status',
    acnt.`status` AS 'Account Status',
    acnt.`online_status` AS 'Online Status',
    DATE_FORMAT(acnt.`regs_date`, '%M %d, %Y') AS 'Date Registered'
FROM `tbl_student`  as stnd

INNER JOIN `tbl_accounts` acnt
    ON stnd.`account` = acnt.`acnt_id`
            
ORDER BY stnd.`l_name`;


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
