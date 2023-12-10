<?php
include 'variables.php';
include 'login_config.php';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$userID = $_SESSION['userID'];
$accountID = $_SESSION['accountID'];
$userType = $_SESSION['userType'];
$randomKey = substr(str_shuffle("1234567890"), 0, 5);
date_default_timezone_set('Asia/Manila'); 
//$CurrentDate = date("l, F j, Y " );
$CurrentDate = date("F j, Y");
$CurrentDateNumbered = date("Y-n-j");
$CurrentDate2 = date("jS") . " of " . date("F, Y");
$CurrentYear = date("Y");
$CurrentMonth = date("F");
$CurrentDayDate = date("j");
$CurrentTime = date("h : i : A");
$userProfileIcon  = 'new';

// echo ($userID);
if ($userType == NULL || $userType == NULL){
    session_destroy();
    header('Location: http://'.$Domain.'/login.php?type=danger&message=User Must Login First');
}

if (isset($_POST['logout'])){
    AccountStatusUpdate($conn, $_SESSION['accountID'], "offline");
    session_destroy();
    // LogActivity($conn, $randomKey, $accountID, "Logout Successfully"); 
    header('Location: http://'.$Domain.'/login.php');
}

function PageJump($Host, $PageType, $PageName, $MsgType, $MsgContent) {
    if($MsgType == NULL){
        header('Location: http://'.$Domain.'/pages/'.$PageType.'/'.$PageName.'');
    } else{
        header('Location: http://'.$Domain.'/pages/'.$PageType.'/'.$PageName.'?type='.$MsgType.'&message='.$MsgContent.'');
    }
}

if ($_SESSION['userType'] == 'admin'){
    // $Navigation = $AdminNavigation;
} else if ($_SESSION['userType'] == 'Faculty'){
    $Navigation = $FacultyNavigation;
} else if ($_SESSION['userType'] == 'student'){
    $userProfileIcon = 'http://'.$Domain.'/assets/img/users/'.GetUserGender($conn, 'vw_students', $accountID).'.png';
} else {
    $Navigation = '';
}

if (isset($_POST['view_modules'])){
    $Subject_ID = $_POST['view_modules'];

    if ($Subject_ID == 'SUBJ-00001'){
        header('Location: http://'.$Domain.'/pages/documents/module.php?subject='.$Subject_ID.'&module=MODL-00101');
    } else if ($Subject_ID == 'SUBJ-00002'){
        header('Location: http://'.$Domain.'/pages/documents/module.php?subject='.$Subject_ID.'&module=MODL-00201');
    } else if ($Subject_ID == 'SUBJ-00003'){
        header('Location: http://'.$Domain.'/pages/documents/module.php?subject='.$Subject_ID.'&module=MODL-00301');
    }
}

$List_Faqs = GetAllData($conn, 'tbl_chat_msg');

$ActiveSchoolYear = GetActiveSchoolYear($conn);
$ActiveSchoolYearID = GetActiveSchoolYearID($conn);
$ActiveTestPeriod = GetActiveTestPeriod($conn);
$ActiveTestPeriodID = GetActiveTestPeriodID($conn);

$List_AllStudent = mysqli_query($conn,"SELECT * FROM `vw_students` WHERE `Account Status` = 'active'");
$Count_AllStudent = mysqli_num_rows($List_AllStudent);


$AdminList_AllStudent = mysqli_query($conn,"SELECT * FROM `vw_students`");
$AdminCount_AllStudent = mysqli_num_rows($AdminList_AllStudent);

$List_ActiveStudent = mysqli_query($conn,"SELECT * FROM `vw_students` WHERE `Student Status` = 'active' AND `Account Status` = 'active'");
$Count_ActiveStudent = mysqli_num_rows($List_ActiveStudent);

$AdminList_AllEmps = mysqli_query($conn,"SELECT * FROM `vw_employees`");
$AdminCount_AllEmps = mysqli_num_rows($AdminList_AllEmps);

$Count_AllFaculties = mysqli_num_rows(GetFilteredData($conn, 'vw_employees', 'Type', 'teacher'));
$Count_ActiveFaculties = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `vw_employees` WHERE `Type` = 'teacher' AND `Status` = 'active'"));

$Count_AllAdmins = mysqli_num_rows(GetFilteredData($conn, 'vw_employees', 'Type', 'admin'));
$Count_ActiveAdmin = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `vw_employees` WHERE `Type` = 'admin' AND `Status` = 'active'"));

if(isset($_POST['add_NewStudent'])){
    $lrn = $_POST['lrn'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];

    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $accountID = "ACNT-".$randomKey;

    $AddAccount = mysqli_query($conn, "INSERT INTO `tbl_accounts`(
        `acnt_id`, `username`, `password`, `type`) 
        VALUES (
            '$accountID' ,'$username' , '$password' ,'student')");

    $AddData = mysqli_query($conn, "INSERT INTO `tbl_student`(
        `lrn` , `account` , `f_name` , `m_name` , `l_name`, `gender`) 
        VALUES (
        '$lrn', '$accountID' ,'$f_name' , '$m_name' ,'$l_name', 'new')");


    //LogActivity($conn, $randomKey, $accountID, "Create Blotter Report $Blotter_ID");    
    header('Location: http://'.$Domain.'/pages/forms/adm_student_pis.php?type=success&message=Student is successfully registered');    
    // PageJump($Domain, "tables", "admin.php", "info", "Blotter Report is recorded");
}

if(isset($_POST['submit_PIS'])){
    $fltpis_ID = "FPIS-".$randomKey;
    $sflt_ID = "SFLT-".$randomKey;

    $LRN = $_POST['submit_PIS'];

    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $name_score = NullAnswerChecker($f_name." ".$m_name." ".$l_name, 1);

    $gender = $_POST['gender'];
    $gender_score = NullAnswerChecker($gender, 1);

    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];
    $birthdate = $birth_year."-".$birth_month."-".$birth_day;
    $birthdate_score = NullAnswerChecker($birthdate, 1); 
    
    $addrss_num = $_POST['addrss_num'];
    $addrss_brgy = $_POST['addrss_brgy'];
    $addrss_city = $_POST['addrss_city'];
    $addrss_province = $_POST['addrss_province'];
    $address_score = NullAnswerChecker($addrss_province, 1);

    $religion = $_POST['religion'];
    $religion_score = NullAnswerChecker($religion, 1);

    $civil_status = $_POST['civil_status'];
    $civil_status_score = NullAnswerChecker($civil_status, 1);

    $occupation = $_POST['occupation'];
    $occupation_score = NullAnswerChecker($occupation, 1);

    $high_educ = $_POST['high_educ'];
    $high_educ_score = NullAnswerChecker($high_educ, 1);

    $about_student = $_POST['about_student'];
    $about_student_score = NullAnswerChecker($about_student, 1);

    $total_score = 
        $name_score
        + $gender_score
        + $birthdate_score
        + $address_score
        + $religion_score
        + $civil_status_score
        + $occupation_score
        + $high_educ_score
        + $about_student_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_pis`(
        `fpis_id`, `student`, `f_name`, `m_name`, `l_name`, `name_score`
        , `gender`, `gender_score`
        , `birthdate`, `birthdate_score`
        , `adrs_num_st`
        , `adrs_brgy`
        , `adrs_city`
        , `adrs_province`, `adrs_score`
        , `religion`, `religion_score`
        , `civil_status`, `civil_status_score`
        , `occupation`, `occupation_score`
        , `high_educ`, `high_educ_score`
        , `about_student`, `about_student_score`

        , `total_score`
        , `status`) 

        VALUES (
        '$fltpis_ID', '$LRN', '$f_name', '$m_name', '$l_name', $name_score
        , '$gender', $gender_score
        , '$birthdate', $birthdate_score
        , '$addrss_num'
        , '$addrss_brgy'
        , '$addrss_city'
        , '$addrss_province', $address_score
        , '$religion', $religion_score
        , '$civil_status', $civil_status_score
        , '$occupation', $occupation_score
        , '$high_educ', $high_educ_score
        , '$about_student', $about_student_score

        , $total_score
        , 'pending')
    ");
    
    $addStundentFLT = mysqli_query($conn, "INSERT INTO `tbl_student_flt`(
        `sflt_id`
        , `school_year`
        , `test_period`
        , `student`
        , `fpis`
        , `status`)
        
        VALUES(
        '$sflt_ID'
        ,'$ActiveSchoolYearID'
        ,'TPRD-00001'
        ,'$LRN'
        ,'$fltpis_ID'
        ,'pending')
    ");

    $updateStudentGender = mysqli_query($conn, "UPDATE `tbl_student` 
        SET `gender`='$gender'
        WHERE `lrn` = '$LRN'");

    UpdateStudentStatus($conn, $LRN, "active");
    header('Location: http://'.$Domain.'/student.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['check_PIS'])){
    $fltpis_ID = $_POST['check_PIS'];
    $LRN = $_POST['lrn'];
    $Teacher_ID = $_SESSION['UserID'];

    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $name_score = $_POST['name_score'];

    $gender = $_POST['gender'];
    $gender_score = $_POST['gender_score'];

    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];
    $birthdate = $birth_year."-".$birth_month."-".$birth_day;
    $birthdate_score = $_POST['birthdate_score'];
    
    $addrss_num = $_POST['addrss_num'];
    $addrss_brgy = $_POST['addrss_brgy'];
    $addrss_city = $_POST['addrss_city'];
    $addrss_province = $_POST['addrss_province'];
    $address_score = $_POST['adrs_score'];

    $religion = $_POST['religion'];
    $religion_score = $_POST['religion_score'];

    $civil_status = $_POST['civil_status'];
    $civil_status_score = $_POST['civil_status_score'];

    $occupation = $_POST['occupation'];
    $occupation_score = $_POST['occupation_score'];

    $high_educ = $_POST['high_educ'];
    $high_educ_score = $_POST['high_educ_score'];

    $about_student = $_POST['about_student'];
    $about_student_score = $_POST['about_student_score'];

    $total_score = 
        $name_score
        + $gender_score
        + $birthdate_score
        + $address_score
        + $religion_score
        + $civil_status_score
        + $occupation_score
        + $high_educ_score
        + $about_student_score;

    $updateStudentPIS = mysqli_query($conn, "UPDATE `tbl_flt_pis`
    SET
        `f_name` = '$f_name',
        `m_name` = '$m_name',
        `l_name` = '$l_name',
        `name_score` = '$name_score',
        `gender` = '$gender',
        `gender_score` = '$gender_score',
        `birthdate` = '$birthdate',
        `birthdate_score` = '$birthdate_score',
        `adrs_num_st` = '$addrss_num',
        `adrs_brgy` = '$addrss_brgy',
        `adrs_city` = '$addrss_city',
        `adrs_province` = '$addrss_province',
        `adrs_score` = '$address_score',
        `religion` = '$religion',
        `religion_score` = '$religion_score',
        `civil_status` = '$civil_status',
        `civil_status_score` = '$civil_status_score',
        `occupation` = '$occupation',
        `occupation_score` = '$occupation_score',
        `high_educ` = '$high_educ',
        `high_educ_score` = '$high_educ_score',
        `about_student` = '$about_student',
        `about_student_score` = '$about_student_score',
        `total_score` = '$total_score',
        `check_date` = '$CurrentDateNumbered',
        `check_by` = '$Teacher_ID',
        `status` = 'checked'

    WHERE `fpis_id` = '$fltpis_ID' ");
    
    $updateStudentData = mysqli_query($conn, "UPDATE `tbl_student` 
        SET 
            `f_name` = '$f_name',
            `m_name` = '$m_name',
            `l_name` = '$l_name',
            `gender`='$gender'
        WHERE `lrn` = '$LRN'");

    header('Location: http://'.$Domain.'/pages/forms/tch_check_pis.php?lrn='.$LRN.'&type=success&message=Student PIS Score is recorded');    
}

if(isset($_POST['submit_ls1e'])){
    $fltls1e_ID = "FLS1E-".$randomKey;

    $LRN = $_POST['submit_ls1e'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "A", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "B", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "D", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "A", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "D", 1);
    
    $q6_std_ans = $_POST['q6_std_ans'];
    $q6_score = SentenceAnswerChecker($q6_std_ans, 1, 1);
    $q7_std_ans = $_POST['q7_std_ans'];
    $q7_score = SentenceAnswerChecker($q7_std_ans, 1, 1);
    $q8_std_ans = $_POST['q8_std_ans'];
    $q8_score = SentenceAnswerChecker($q8_std_ans, 1, 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score
        + $q6_score
        + $q7_score
        + $q8_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls1_eng`(
        `fls1e_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        , `q6_answer`, `q6_score`
        , `q7_answer`, `q7_score`
        , `q8_answer`, `q8_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls1e_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score
        , '$q6_std_ans', $q6_score
        , '$q7_std_ans', $q7_score
        , '$q8_std_ans', $q8_score

        , $total_score
        , 8
        , 'pending')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls1_eng`='$fltls1e_ID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");
    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['check_LS1E'])){
    $fltls1e_ID = $_POST['check_LS1E'];
    $LRN = $_POST['student'];
    $Teacher_ID = $_SESSION['UserID'];

    $initial_score = $_POST['initial_score'];
    $q6_score = $_POST['q6_score'];
    $q7_score = $_POST['q7_score'];
    $q8_score = $_POST['q8_score'];

    $total_score = 
        $initial_score
        + $q6_score
        + $q7_score
        + $q8_score;

    $updateStudentLS1E = mysqli_query($conn, "UPDATE `tbl_flt_ls1_eng`
    SET
        `q6_score` = '$q6_score',
        `q7_score` = '$q7_score',
        `q8_score` = '$q8_score',
        `total_score` = '$total_score',
        `check_date` = '$CurrentDateNumbered',
        `check_by` = '$Teacher_ID',
        `status` = 'checked'

    WHERE `fls1e_id` = '$fltls1e_ID' ");
    
    header('Location: http://'.$Domain.'/pages/forms/tch_check_ls1e.php?lrn='.$LRN.'&type=success&message=Student LS1 English Score is recorded');    
}

if(isset($_POST['submit_ls1f'])){
    $fltls1efID = "FLS1F-".$randomKey;
    $LRN = $_POST['submit_ls1f'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "C", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "C", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "D", 1);

    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker(strtoupper($q4_std_ans), "KOMPYUTER", 1);

    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = SentenceAnswerChecker($q5_std_ans, 2, 2);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls1_fil`(
        `fls1f_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls1efID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score

        , $total_score
        , 6
        , 'pending')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls1_fil`='$fltls1efID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['check_LS1F'])){
    $fltls1f_ID = $_POST['check_LS1F'];
    $LRN = $_POST['student'];
    $Teacher_ID = $_SESSION['UserID'];

    $initial_score = $_POST['initial_score'];
    $q4_score = $_POST['q4_score'];
    $q5_score = $_POST['q5_score'];

    $total_score = 
        $initial_score
        + $q4_score
        + $q5_score;

    $updateStudentLS1E = mysqli_query($conn, "UPDATE `tbl_flt_ls1_fil`
    SET
        `q4_score` = '$q4_score',
        `q5_score` = '$q5_score',
        `total_score` = '$total_score',
        `check_date` = '$CurrentDateNumbered',
        `check_by` = '$Teacher_ID',
        `status` = 'checked'

    WHERE `fls1f_id` = '$fltls1f_ID' ");
    
    header('Location: http://'.$Domain.'/pages/forms/tch_check_ls1f.php?lrn='.$LRN.'&type=success&message=Student LS1 English Score is recorded');    
}

if(isset($_POST['submit_ls2'])){
    $fltls2_ID = "FLS2-".$randomKey;
    $LRN = $_POST['submit_ls2'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "B", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "C", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "C", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "B", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "D", 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls2`(
        `fls2_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls2_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score

        , $total_score
        , 5
        , 'checked')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls2`='$fltls2_ID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['submit_ls3'])){
    $fltls3_ID = "FLS3-".$randomKey;
    $LRN = $_POST['submit_ls3'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "D", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "A", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "B", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "B", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "A", 1);

    $q6_std_ans = $_POST['q6_std_ans'];
    $q6_score = CorrectAnswerChecker($q6_std_ans, "A", 1);
    $q7_std_ans = $_POST['q7_std_ans'];
    $q7_score = CorrectAnswerChecker($q7_std_ans, "D", 1);
    $q8_std_ans = $_POST['q8_std_ans'];
    $q8_score = CorrectAnswerChecker($q8_std_ans, "C", 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score
        + $q6_score
        + $q7_score
        + $q8_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls3`(
        `fls3_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        , `q6_answer`, `q6_score`
        , `q7_answer`, `q7_score`
        , `q8_answer`, `q8_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls3_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score
        , '$q6_std_ans', $q6_score
        , '$q7_std_ans', $q7_score
        , '$q8_std_ans', $q8_score

        , $total_score
        , 8
        , 'checked')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls3`='$fltls3_ID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['submit_ls4'])){
    $fltls4_ID = "FLS4-".$randomKey;
    $LRN = $_POST['submit_ls4'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "C", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "A", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "B", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "D", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "C", 1);

    $q6_std_ans = $_POST['q6_std_ans'];
    $q6_score = CorrectAnswerChecker($q6_std_ans, "A", 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score
        + $q6_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls4`(
        `fls4_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        , `q6_answer`, `q6_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls4_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score
        , '$q6_std_ans', $q6_score

        , $total_score
        , 6
        , 'checked')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls4`='$fltls4_ID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['submit_ls5'])){
    $fltls5_ID = "FLS5-".$randomKey;
    $LRN = $_POST['submit_ls5'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "D", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "A", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "A", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "C", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "B", 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls5`(
        `fls5_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls5_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score

        , $total_score
        , 5
        , 'checked')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls5`='$fltls5_ID'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');    
}

if(isset($_POST['submit_ls6'])){
    $fltls6_ID = "FLS6-".$randomKey;
    $LRN = $_POST['submit_ls6'];

    $q1_std_ans = $_POST['q1_std_ans'];
    $q1_score = CorrectAnswerChecker($q1_std_ans, "D", 1);
    $q2_std_ans = $_POST['q2_std_ans'];
    $q2_score = CorrectAnswerChecker($q2_std_ans, "C", 1);
    $q3_std_ans = $_POST['q3_std_ans'];
    $q3_score = CorrectAnswerChecker($q3_std_ans, "D", 1);
    $q4_std_ans = $_POST['q4_std_ans'];
    $q4_score = CorrectAnswerChecker($q4_std_ans, "C", 1);
    $q5_std_ans = $_POST['q5_std_ans'];
    $q5_score = CorrectAnswerChecker($q5_std_ans, "A", 1);
    
    $q6_std_ans = $_POST['q6_std_ans'];
    $q6_score = CorrectAnswerChecker($q6_std_ans, "D", 1);

    $total_score = 
        $q1_score
        + $q2_score
        + $q3_score
        + $q4_score
        + $q5_score
        + $q6_score;

    $addStudentPIS = mysqli_query($conn, "INSERT INTO `tbl_flt_ls6`(
        `fls6_id`
        , `q1_answer`, `q1_score`
        , `q2_answer`, `q2_score`
        , `q3_answer`, `q3_score`
        , `q4_answer`, `q4_score`
        , `q5_answer`, `q5_score`
        , `q6_answer`, `q6_score`
        
        , `total_score`, `max_score`
        , `status`) 
    
    VALUES (
        '$fltls6_ID'
        , '$q1_std_ans', $q1_score
        , '$q2_std_ans', $q2_score
        , '$q3_std_ans', $q3_score
        , '$q4_std_ans', $q4_score
        , '$q5_std_ans', $q5_score
        , '$q6_std_ans', $q6_score

        , $total_score
        , 6
        , 'checked')
    ");
    
    $updateStundentFLT = mysqli_query($conn, "UPDATE `tbl_student_flt`
        SET `ls6`='$fltls6_ID' , 
            `status`='completed'
        WHERE `school_year` = '$ActiveSchoolYearID'
            AND `test_period` = '$ActiveTestPeriodID'
            AND `student` = '$LRN'
    ");

    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$ActiveTestPeriodID.'&type=success&message=Great Job! Your Answers are submitted');     
}


if(isset($_POST['update_test_period'])){
    $selectedTestPeriod = $_POST['update_test_period'];

    if ($selectedTestPeriod == 'Closed'){
        $CloseTestPeriod = mysqli_query($conn, "UPDATE `tbl_test_period`
            SET `status`='active'
            WHERE `test_period` = 'Closed' 
        ");

        header('Location: http://'.$Domain.'/teacher.php?type=info&message=Test Period is Successfully Closed');    
    } else {
        $CloseAllTestPeriod = mysqli_query($conn, "UPDATE `tbl_test_period`
            SET `status`='close'    
        ");
    
        $ActivateTestPeriod = mysqli_query($conn, "UPDATE `tbl_test_period`
            SET `status`='active'
            WHERE `test_period` = '$selectedTestPeriod' 
        ");

        header('Location: http://'.$Domain.'/teacher.php?type=success&message=Test Period is Successfully updated');  
    }
  
}

if(isset($_POST['update_test_status'])){
    $test_status = $_POST['update_test_status'];

        $CloseTestPeriod = mysqli_query($conn, "UPDATE `tbl_test_period`
            SET `status`='$test_status'
            WHERE `test_period` = 'Closed' 
        ");

        header('Location: http://'.$Domain.'/teacher.php?type=info&message=Test Status is successfully updated');    
}

if (isset($_POST['open_flt_score_board'])){
    $studentLRN = $_SESSION['StudentLRN'];
    $selectedTestPeriod = $_POST['open_flt_score_board'];

    $sflt_ID = "SFLT-".$randomKey;
    
    $fltpis_ID = GetUserStudentFLTData($conn, $studentLRN, $ActiveSchoolYearID, 'TPRD-00001', 'PIS ID');
    
    $checkStudentFLTScore = GetUserStudentFLTScore($conn, $ActiveSchoolYearID, $selectedTestPeriod, $studentLRN);
    if (!$checkStudentFLTScore->num_rows>0){
        $addStundentFLT = mysqli_query($conn, "INSERT INTO `tbl_student_flt`(
            `sflt_id`
            , `school_year`
            , `test_period`
            , `student`
            , `fpis`
            , `status`)
            
            VALUES(
            '$sflt_ID'
            ,'$ActiveSchoolYearID'
            ,'$selectedTestPeriod'
            ,'$studentLRN'
            ,'$fltpis_ID'
            ,'pending')
        ");
    } 
    header('Location: http://'.$Domain.'/pages/items/assessment_score_board.php?TP='.$selectedTestPeriod);    
}

if (isset($_POST['view_pis'])){
    $LRN = $_POST['view_pis'];
    header('Location: http://'.$Domain.'/pages/forms/tch_check_pis.php?lrn='.$LRN);    
}

if (isset($_POST['view_flt_lss'])){
    $LRN = $_POST['view_flt_lss'];

    $link = 'http://'.$Domain.'/pages/documents/std_flt_lss.php?lrn='.$LRN;
    //header('Location: http://'.$Domain.'/pages/documents/std_flt_lss.php?lrn='.$LRN); 
    
    echo ('
    <script>
        window.open("'.$link.'"
        ,"_blank"
        , "toolbar=yes,scrollbars=yes
        ,resizable=yes,top=500
        ,left=500
        ,width=400
        ,height=400");
    </script>
    ');
}


if(isset($_POST['add_NewSchoolYear'])){
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    $schol_year = $start_year."-".$end_year;

    $sy_ID = "SHYR-".$randomKey;

    $CloseLastSchoolYears = mysqli_query($conn, "UPDATE `tbl_school_year`
        SET `status`='completed'
    ");

    $DeactLastStudents = mysqli_query($conn, "UPDATE `tbl_accounts`
        SET `status`='deactivated'
        WHERE `type` = 'student' 
    ");

    $AddScoolYear = mysqli_query($conn, "INSERT INTO 
        `tbl_school_year` (`shyr_id`, `school_year`) 
        VALUES ('$sy_ID' ,'$schol_year')"
    );

    //LogActivity($conn, $randomKey, $accountID, "Create Blotter Report $Blotter_ID");    
    header('Location: http://'.$Domain.'/admin.php?type=success&message=New School Year is successfully registered');    
    // PageJump($Domain, "tables", "admin.php", "info", "Blotter Report is recorded");
}

if(isset($_POST['update_student_data'])){
    $fltpis_ID = $_POST['update_student_data'];
    $LRN = $_POST['lrn'];
    $Teacher_ID = $_SESSION['UserID'];

    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];

    $gender = $_POST['gender'];

    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $birth_year = $_POST['birth_year'];
    $birthdate = $birth_year."-".$birth_month."-".$birth_day;
    
    $addrss_num = $_POST['addrss_num'];
    $addrss_brgy = $_POST['addrss_brgy'];
    $addrss_city = $_POST['addrss_city'];
    $addrss_province = $_POST['addrss_province'];

    $religion = $_POST['religion'];

    $civil_status = $_POST['civil_status'];

    $occupation = $_POST['occupation'];

    $high_educ = $_POST['high_educ'];

    $updateStudentPIS = mysqli_query($conn, "UPDATE `tbl_flt_pis`
    SET
        `f_name` = '$f_name',
        `m_name` = '$m_name',
        `l_name` = '$l_name',
        `name_score` = '$name_score',
        `gender` = '$gender',
        `gender_score` = '$gender_score',
        `birthdate` = '$birthdate',
        `birthdate_score` = '$birthdate_score',
        `adrs_num_st` = '$addrss_num',
        `adrs_brgy` = '$addrss_brgy',
        `adrs_city` = '$addrss_city',
        `adrs_province` = '$addrss_province',
        `adrs_score` = '$address_score',
        `religion` = '$religion',
        `religion_score` = '$religion_score',
        `civil_status` = '$civil_status',
        `civil_status_score` = '$civil_status_score',
        `occupation` = '$occupation',
        `occupation_score` = '$occupation_score',
        `high_educ` = '$high_educ',
        `high_educ_score` = '$high_educ_score'

    WHERE `fpis_id` = '$fltpis_ID' ");
    
    $updateStudentData = mysqli_query($conn, "UPDATE `tbl_student` 
        SET 
            `f_name` = '$f_name',
            `m_name` = '$m_name',
            `l_name` = '$l_name',
            `gender`='$gender'
        WHERE `lrn` = '$LRN'");

    header('Location: http://'.$Domain.'/pages/forms/adm_student_pis.php?lrn='.$LRN.'&type=success&message=Student PIS Score is recorded');    
}


if(isset($_POST['update_student_account'])){
    $LRN = $_POST['update_student_account'];
    $accountID = $_POST['acnt_id'];
    $status = $_POST['status'];

    $username = $_POST['username'];
    $new_pass1 = $_POST['new_pass1'];
    $new_pass2 = $_POST['new_pass2'];

    if ($new_pass1 == $new_pass2){
        $password = MD5($new_pass2);
        $updateStudentAccount = mysqli_query($conn, "UPDATE `tbl_accounts`
        SET
            `username` = '$username',
            `password` = '$password',
            `status` = '$status'

        WHERE `acnt_id` = '$accountID' ");

        header('Location: http://'.$Domain.'/pages/forms/std_reset_pass.php?lrn='.$LRN.'&type=success&message=Student Account is updated');
    } else {
        header('Location: http://'.$Domain.'/pages/forms/std_reset_pass.php?lrn='.$LRN.'&type=danger&message=New password did not match');
    }
}



if(isset($_POST['update_employee_account'])){
    $empl_id = $_POST['update_employee_account'];
    $accountID = $_POST['acnt_id'];
    $status = $_POST['status'];

    $username = $_POST['username'];
    $new_pass1 = $_POST['new_pass1'];
    $new_pass2 = $_POST['new_pass2'];
    $type = $_POST['type'];

    if ($new_pass1 == $new_pass2){
        $password = MD5($new_pass2);
        $updateStudentAccount = mysqli_query($conn, "UPDATE `tbl_accounts`
        SET
            `username` = '$username',
            `password` = '$password',
            `type` = '$type',
            `status` = '$status'

        WHERE `acnt_id` = '$accountID' ");

        header('Location: http://'.$Domain.'/pages/forms/empl_reset_pass.php?empl='.$empl_id.'&type=success&message=Employee Account is updated');
    } else {
        header('Location: http://'.$Domain.'/pages/forms/empl_reset_pass.php?empl='.$empl_id.'&type=danger&message=New password did not match');
    }
}


if(isset($_POST['update_employee_data'])){
    $employee_ID = $_POST['update_employee_data'];
    $LRN = $_POST['lrn'];
    $Teacher_ID = $_SESSION['UserID'];

    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];

    $addrss_num = $_POST['addrss_num'];
    $addrss_brgy = $_POST['addrss_brgy'];
    $addrss_city = $_POST['addrss_city'];
    $addrss_province = $_POST['addrss_province'];

    $birthdate = $_POST['birthdate'];
    $cellphone_num = $_POST['cellphone_num'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    

    $updateEmployeeData = mysqli_query($conn, "UPDATE `tbl_employee`
    SET
        `f_name` = '$f_name',
        `m_name` = '$m_name',
        `l_name` = '$l_name',
        
        `adrs_num_st` = '$addrss_num',
        `adrs_brgy` = '$addrss_brgy',
        `adrs_city` = '$addrss_city',
        `adrs_province` = '$addrss_province',

        `birthdate` = '$birthdate',
        `cellphone_num` = '$cellphone_num',
        `gender` = '$gender',
        `email` = '$email'

    WHERE `empl_id` = '$employee_ID' ");

    header('Location: http://'.$Domain.'/pages/forms/adm_employee_data.php?emp='.$employee_ID.'&type=success&message=Employee data is successfully updated');    
}


if(isset($_POST['add_NewEmployee'])){
    $empl_id = "EMPL-".$randomKey;
    $LRN = $_POST['lrn'];
    $Teacher_ID = $_SESSION['UserID'];

    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];

    $addrss_num = $_POST['addrss_num'];
    $addrss_brgy = $_POST['addrss_brgy'];
    $addrss_city = $_POST['addrss_city'];
    $addrss_province = $_POST['addrss_province'];

    $birthdate = $_POST['birthdate'];
    $cellphone_num = $_POST['cellphone_num'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    
    $acnt_id = "ACNT-".$randomKey;
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $type = $_POST['type'];
    
    $AddAccount = mysqli_query($conn, "INSERT INTO `tbl_accounts`(
        `acnt_id`, `username`, `password`, `type`) 
        VALUES (
            '$acnt_id' ,'$username' , '$password' ,'$type')");

    $AddScoolYear = mysqli_query($conn, "INSERT INTO 
        `tbl_employee` (
            `empl_id`, 
            `account`, 

            `f_name`, 
            `m_name`,
            `l_name`,

            `adrs_num_st`,
            `adrs_brgy`,
            `adrs_city`,
            `adrs_province`,
            
            `birthdate`,
            `cellphone_num`,
            `gender`,
            `email`
        ) 
        VALUES (
            '$empl_id' ,
            '$acnt_id' ,

            '$f_name' ,
            '$m_name' ,
            '$l_name' ,

            '$adrs_num_st' ,
            '$adrs_brgy' ,
            '$adrs_city' ,
            '$adrs_province' ,

            '$birthdate' ,
            '$cellphone_num' ,
            '$gender' ,
            '$email'
        )
    "
    );

    header('Location: http://'.$Domain.'/pages/forms/adm_employee_data.php?emp='.$employee_ID.'&type=success&message=Employee is successfully registred');    
}


?>


