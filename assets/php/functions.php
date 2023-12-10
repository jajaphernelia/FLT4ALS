<?php
function GenerateMessage($type, $message){
    echo '
    <div class="alert alert-'.$type.' alert-dismissible text-white m-1 mt-3" role="alert">
        <span class="text-sm">'.$message.'</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    ';
}

function GetEmployeeData($conn, $accountID, $SelectedData){
    $userData = mysqli_query($conn, "SELECT * FROM `vw_employees` WHERE `Account` = '$accountID' LIMIT 1");
    //$resData_list = mysqli_query($conn,$resData);
    while($data = mysqli_fetch_array($userData)){
        $empsData = $data[$SelectedData];
        return $empsData;
    }
}

function GetEmployeeDataByID($conn, $empID, $SelectedData){
    $userData = mysqli_query($conn, "SELECT * FROM `vw_employees` WHERE `Employee ID` = '$empID' LIMIT 1");
    //$resData_list = mysqli_query($conn,$resData);
    while($data = mysqli_fetch_array($userData)){
        $empsData = $data[$SelectedData];
        return $empsData;
    }
}

function GetUserStudentData($conn, $accountID, $SelectedData){
    $userData = mysqli_query($conn, "SELECT * FROM `vw_students` WHERE `Account` = '$accountID' LIMIT 1");
    while($data = mysqli_fetch_array($userData)){
        $stdData = $data[$SelectedData];
        return $stdData;
    }
}

function GetStudentData($conn, $lrn, $SelectedData){
    $sourceData = mysqli_query($conn, "SELECT * FROM `vw_students` WHERE `LRN` = '$lrn' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $stdData = $data[$SelectedData];
        return $stdData;
    }
}

function GetUserGender($conn, $source, $accountID){
    $sourceData = mysqli_query($conn, "SELECT * FROM `$source` WHERE `Account` = '$accountID' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $gender = $data['Gender'];
        return $gender;
    }
}

function LoggedInRequired($Domain, $userType){
    if ($_SESSION['userID'] == NULL || $_SESSION['userType'] == NULL){
        session_destroy();
        header('Location: http://'.$Domain.'/login.php?type=danger&message=User Must Login First');
    } else if ($_SESSION['userType'] != "$userType"){
        // session_destroy();
        header('Location: http://'.$Domain.'/login.php?type=danger&message=Invalid User!');
    }
}

function CheckLoginAccount($Domain, $userType){
    if ($_SESSION['userType'] != "$userType"){
        header('Location: http://'.$Domain.'/login.php?type=danger&message=Invalid User!');
    } 
}

function GetActiveSchoolYear($conn){
    $sourceData = mysqli_query($conn, "SELECT * FROM `tbl_school_year` WHERE `status` = 'active' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['school_year'];
        return $returnData;
    }
}

function GetActiveSchoolYearID($conn){
    $sourceData = mysqli_query($conn, "SELECT * FROM `tbl_school_year` WHERE `status` = 'active' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['shyr_id'];
        return $returnData;
    }
}

function GetActiveTestPeriod($conn){
    $sourceData = mysqli_query($conn, "SELECT * FROM `tbl_test_period` WHERE `status` = 'active' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['test_period'];
        return $returnData;
    }
}

function GetActiveTestPeriodID($conn){
    $sourceData = mysqli_query($conn, "SELECT * FROM `tbl_test_period` WHERE `status` = 'active' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['tprd_id'];
        return $returnData;
    }
}

function GetCloseTestPeriodID($conn){
    $sourceData = mysqli_query($conn, "SELECT * FROM `tbl_test_period` WHERE `test_period` = 'Closed' LIMIT 1");
    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['status'];
        return $returnData;
    }
}

// Database Functions
function GetAllData($conn, $source){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source`");
    return $data_rows;
}

function GetLimitedData($conn, $source, $row_limit){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` LIMIT $row_limit");
    return $data_rows;
}

function GetGroupedData($conn, $source, $group_column){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` GROUP BY `$group_column`");
    return $data_rows;
}

function GetGroupedOrderedData($conn, $source, $group_column, $order_column){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` GROUP BY `$group_column` ORDER BY `$order_column` ");
    return $data_rows;
}

function GetFilteredData($conn, $source, $req_column, $req_value){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` WHERE `$req_column` = '$req_value'");
    return $data_rows;
}

function GetFilteredGroupOrderedData($conn, $source, $req_column, $req_value, $group_column, $order_column){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` WHERE `$req_column` = '$req_value' GROUP BY `$group_column` ORDER BY `$order_column`");
    return $data_rows;
}

function GetFilteredLimitedData($conn, $source, $req_column, $req_value, $limit){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$source` WHERE `$req_column` = '$req_value' LIMIT $limit");
    return $data_rows;
}

function AccountStatusUpdate($conn, $accountID, $Status){
    $updateAccountStatus = mysqli_query($conn, "UPDATE `tbl_accounts` 
        SET `online_status`='$Status'
        WHERE `acnt_id` = '$accountID'");
}

function NullAnswerChecker($value, $score){
    if ($value == NULL || $value == "" || $value == " "){
        return 0;
    } else {
        return $score;
    }
}

function CorrectAnswerChecker($std_ans, $crt_ans, $score){
    if ($std_ans == $crt_ans){
        return $score;
    } else {
        return 0;
    }
}

function CorrectAnswerIndicator($std_ans, $crt_ans){
    if ($std_ans == $crt_ans){
        echo '
        <br>
        <span class="py-2 px-4 m-0 text-left text-sm text-success">
            Student Answer: '.$std_ans.'
        </span>
        ';
    } else {
        echo '
        <br>
        <span class="py-2 px-4 m-0 text-left text-sm text-danger">
            Student Answer: '.$std_ans.'  &nbsp&nbsp(Correct: '.$crt_ans.')
        </span>
        ';
    }
}

function countSentences($str){
	return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/',$str,$match);
}

function SentenceAnswerChecker($std_ans, $requiredSentence, $score){
    if (countSentences($std_ans) >= $requiredSentence){
        return $score;
    } else {
        return 0;
    }
}

function UpdateStudentStatus($conn, $lrn, $Status){
    $updateStudentStatus = mysqli_query($conn, "UPDATE `tbl_student` 
        SET `status`='$Status'
        WHERE `lrn` = '$lrn'");
}

function GetFLTSubjectID($conn, $studentLRN, $schoolYearID, $testPeriodID, $selectedSubject){
    $sourceData = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = '$testPeriodID'
            AND `LRN` = '$studentLRN'
        LIMIT 1");

    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data[$selectedSubject];
        return $returnData;
    }
}

function CheckExisitingFLT($conn, $studentLRN, $schoolYearID, $testPeriodID, $selectedSubject, $Domain, $CatchPage){
    $CheckData = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = '$testPeriodID'
            AND `LRN` = '$studentLRN'
        LIMIT 1");

    while($data = mysqli_fetch_array($CheckData)){
        if ($data[$selectedSubject] != NULL) {
            header('Location: http://'.$Domain.'/pages/documents/'.$CatchPage.'?TP='.$testPeriodID.'&type=warning&message=Your answers are already submitted, Please Refresh your Assessements Page and try again');    
        }
    }
}


function GetStudentAccount($conn, $LRN){
    $studentData = mysqli_query($conn,"SELECT * FROM `vw_students` 
        WHERE `LRN` = '$LRN' ");

    while ($std=$studentData-> fetch_assoc()){
        $studentAccount = $std['Account'];

        $accountData = mysqli_query($conn,"SELECT * FROM `tbl_accounts` 
            WHERE `acnt_id` = '$studentAccount' ");
        return $accountData;
    }
}

function GetEmployeeAccount($conn, $EMPL){
    $employeeData = mysqli_query($conn,"SELECT * FROM `vw_employees` 
        WHERE `Employee ID` = '$EMPL' ");

    while ($empl=$employeeData-> fetch_assoc()){
        $employeeAccount = $empl['Account'];

        $accountData = mysqli_query($conn,"SELECT * FROM `tbl_accounts` 
            WHERE `acnt_id` = '$employeeAccount' ");
        return $accountData;
    }
}

function GetEmployeeAccountData($conn, $EMPL, $selectedData){
    $employeeData = mysqli_query($conn,"SELECT * FROM `vw_employees` 
        WHERE `Employee ID` = '$EMPL' ");

    while ($empl=$employeeData-> fetch_assoc()){
        $employeeAccount = $empl['Account'];

        $accountData = mysqli_query($conn,"SELECT * FROM `tbl_accounts` 
            WHERE `acnt_id` = '$employeeAccount' ");

        while ($emplAccount=$accountData-> fetch_assoc()){
            return $emplAccount[$selectedData];
        }
    }
}

function GetAllStudentFLT($conn, $schoolYearID, $testPeriodID){
    $data_rows = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = '$testPeriodID'");
    return $data_rows;
}

function GetUserStudentFLTScore($conn, $schoolYearID, $testPeriodID, $LRN){
    $data_rows = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = '$testPeriodID'
            AND `LRN` = '$LRN'");
    return $data_rows;
}

function GetUserStudentPreTestScore($conn, $schoolYearID, $testPeriodID, $LRN){
    $data_rows = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = 'TPRD-00001'
            AND `LRN` = '$LRN'");
    return $data_rows;
}

function GetUserStudentFLTData($conn, $studentLRN, $schoolYearID, $testPeriodID, $selectedData){
    $sourceData = mysqli_query($conn,"SELECT * FROM `vw_flt_als_evaluation` 
        WHERE `School Year ID` = '$schoolYearID' 
            AND `Test Period ID` = '$testPeriodID'
            AND `LRN` = '$studentLRN'
        LIMIT 1");

    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data[$selectedData];
        return $returnData;
    }
}

function GetFLTAnswers($conn, $sourceFLT, $fltColID, $fltValID){
    $data_rows = mysqli_query($conn,"SELECT * FROM `$sourceFLT` 
        WHERE `$fltColID` = '$fltValID'");
    return $data_rows;
}

function CheckBoxIndicator($scoreValue){
    if ($scoreValue >= 1){
        return "checked";
    } else {
        return '';
    }
}

function NullValueHandler($value){
    if ($value == NULL || $value == '' || $value == ' '){
        return 0;
    } else {
        return $value;
    }
}

function NullDBValueHandler($value, $catchReturn){
    if ($value == NULL || $value == '' || $value == ' '){
        return $catchReturn;
    } else {
        return $value;
    }
}

function GetFLTSubjectStatus($conn, $FLTSourceSubject, $FLTSubjectPK, $FLTSubjectID){
    $sourceData = mysqli_query($conn,"SELECT * FROM `$FLTSourceSubject` 
        WHERE `$FLTSubjectPK` = '$FLTSubjectID' 
        LIMIT 1");

    while($data = mysqli_fetch_array($sourceData)){
        $returnData = $data['status'];
        return $returnData;
    }
}

function DateConverter($dateValue, $format){
    // $CurrentDate = date("F j, Y");
    // $CurrentDateNumbered = date("Y-n-j");

    $date = date_create($dateValue);
    return date_format($date,"$format");
}

function PieChartGenirator($divID, $value1, $value2){
    $value3 = 0;
    $textColor = "#616a78";
    if ($value1 == NULL && $value2 == NULL){
        $value3 = 100;
        $textColor = "transparent";
    } else {
        $value3 = 0;
        $textColor = "#616a78";
    }

    echo ('
    <div class="d-none" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    ">
    </div>
    ');

    echo ("
        <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
        <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Subject', 'Score'],
            ['Correct Answers', $value1],
            ['Wrong Answers',   $value2],
            ['Not yet Answered',   $value3],
            ]);

            var options = {
            backgroundColor: 'transparent',
            pieHole: 0.6,
            pieSliceTextStyle: {
            color: '$textColor',
            fontSize: 20,
            bold: true,
            },
            
            chartArea: {'width': '100%', 'height': '100%'},
            legend: 'none',
            slices: {
                0: { color: '#57b05b' },
                1: { color: '#fd9a14' },
                2: { color: '#6f7786' }
            }
            };

            var chart = new google.visualization.PieChart(document.getElementById('$divID'));
            chart.draw(data, options);
        }
        </script>

        <div id='$divID'></div>
    ");
}


function ProfilePieChartGenirator($divID, $value1, $value2){
    $average = 0;
    if ($value1 > 0){
        $average = number_format(($value1/($value2+$value1))*100,0);
    } else {
        $average = 0;
    }
    
    $value3 = 0;
    $textColor = "#616a78";
    if ($value1 == NULL && $value2 == NULL){
        $value3 = 100;
        $textColor = "#6f7786";
    } else {
        $value3 = 0;
        $textColor = "#57b05b";
    }

    echo ('
    <div class="w-100" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    ">
        <h2 class="m-0 text-center" 
            style="color: '.$textColor.';">
            '.$average.'%
        </h2>
    </div>
    ');

    echo ("
        <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Subject', 'Score'],
            ['Correct Answers', $value1],
            ['Wrong Answers',   $value2],
            ['Not yet Answered',   $value3],
            ]);

            var options = {
            backgroundColor: 'transparent',
            pieHole: 0.6,
            pieSliceTextStyle: {
            color: 'transparent',
            fontSize: 20,
            bold: true,
            },
            
            chartArea: {'width': '100%', 'height': '100%'},
            legend: 'none',
            slices: {
                0: { color: '#57b05b' },
                1: { color: '#fd9a14' },
                2: { color: '#6f7786' }
            }
            };

            var chart = new google.visualization.PieChart(document.getElementById('$divID'));
            chart.draw(data, options);
        }
        </script>

        <div id='$divID'></div>
    ");
}


function StudentProgressPieChartGenirator($divID, $value1, $value2){
    $average = 0;
    if ($value1 > 0 ){
        $average = number_format(($value1/($value2+$value1))*100,0);
    } else {
        $average = 0;
    }
    
    $value3 = 0;
    $textColor = "#616a78";
    if ($value1 == NULL && $value2 == NULL){
        $value3 = 100;
        $textColor = "#6f7786";
    } else {
        $value3 = 0;
        $textColor = "#57b05b";
    }

    echo ('
    <div class="w-100 m-0 p-0" style="
        position: absolute;
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    ">
        <h2 class="m-0 p-0 text-center" 
            style="color: '.$textColor.';">
            '.$average.'%
        </h2>
    </div>
    ');

    echo ("
        <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Subject', 'Score'],
            ['Done', $value1],
            ['Not Yet Answered',   $value2],
            ['Not yet Answered',   $value3],
            ]);

            var options = {
                backgroundColor: 'transparent',
                pieHole: 0.6,
                pieSliceTextStyle: {
                color: 'transparent',
                fontSize: 40,
                bold: true,
            },
            
            chartArea: {'width': '100%', 'height': '100%'},
            legend: 'none',
            slices: {
                0: { color: '#57b05b' },
                1: { color: '#49a3f1' },
                2: { color: '#6f7786' }
            }
            };

            var chart = new google.visualization.PieChart(document.getElementById('$divID'));
            chart.draw(data, options);
        }
        </script>

        <div id='$divID'></div>
    ");
}

function ConvertUserType($type){
    if ($type == "student"){
        return "ALS Student";
    } else if ($type == "admin"){
        return "Admin";
    }  else if ($type == "teacher"){
        return "ALS Teacher";
    } else {
        return "Invalid User";
    }
}

function GetAverage($currentValue, $maxValue){
    if ($currentValue >= 1 && $maxValue >= 1 && $currentValue != NULL && $maxValue != NULL){
    return number_format(($currentValue*100)/$maxValue);
    } else {
        return 0;
    }
}
// countSentences("This is a test.  Hey!"); // returns 2
// countSentences("What do you want?"); // returns 1
// // etc.


function evaluatePIS($score){
    if ($score >= 0 && $score <= 4){
        return 'Basic Level (Grade 1)';
    } else if ($score == 5){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score == 6){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 7 && $score <= 10){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS1E($score){
    if ($score >= 0 && $score <= 2){
        return 'Basic Level (Grade 1)';
    } else if ($score == 3){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score == 4){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 5 && $score <= 8){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS1F($score){
    if ($score >= 0 && $score <= 1){
        return 'Basic Level (Grade 1)';
    } else if ($score == 2){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score == 3){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 4 && $score <= 6){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS2($score){
    if ($score == 0 ){
        return 'Basic Level (Grade 1)';
    } else if ($score == 0){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score >= 1 && $score <= 2){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 3 && $score <= 5){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS3($score){
    if ($score >= 0 && $score <= 2 ){
        return 'Basic Level (Grade 1)';
    } else if ($score == 3){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score == 4){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 5 && $score <= 8){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS4($score){
    if ($score == 0 ){
        return 'Basic Level (Grade 1)';
    } else if ($score == 0){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score >= 1 && $score <= 3){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 4 && $score <= 6){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS5($score){
    if ($score == 0 ){
        return 'Basic Level (Grade 1)';
    } else if ($score == 0){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score >= 1 && $score <= 3){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 4 && $score <= 6){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function evaluateLS6($score){
    if ($score == 0 ){
        return 'Basic Level (Grade 1)';
    } else if ($score == 0){
        return 'Lower Elem. (Grade 2-3)';
    }  else if ($score >= 1 && $score <= 2){
        return 'Advance Elem. (Grade 4-6)';
    } else if ($score >= 3 && $score <= 6){
        return 'Junior H.S (Grade 7-10)';
    } else {
        return 'Invalid Score';
    }
}

function getFLTProgress($conn, $LRN, $schoolYearID, $TestPeriodID){
    $sourceData = mysqli_query($conn,"SELECT * FROM `vw_student_progress` 
        WHERE `LRN` = '$LRN' 
        AND `School Year ID` = '$schoolYearID'
        AND `Test Period ID` = '$TestPeriodID'");

    while($flt = mysqli_fetch_array($sourceData)){
        $total = 
            $flt['LS1E']
            + $flt['LS1F']
            + $flt['LS2']
            + $flt['LS3']
            + $flt['LS4']
            + $flt['LS5']
            + $flt['LS6'];
        
        $average = number_format(($total/7)*100,0);

        // $average = number_format(($value1/($value2+$value1))*100,1);

        return $total;
    }
}

function generateFLTProgress($conn, $LRN, $schoolYearID, $TestPeriodID){
    $sourceData = mysqli_query($conn,"SELECT * FROM `vw_student_progress` 
        WHERE `LRN` = '$LRN' 
        AND `School Year ID` = '$schoolYearID'
        AND `Test Period ID` = '$TestPeriodID'");

    while($flt = mysqli_fetch_array($sourceData)){
        $total = 
            $flt['LS1E']
            + $flt['LS1F']
            + $flt['LS2']
            + $flt['LS3']
            + $flt['LS4']
            + $flt['LS5']
            + $flt['LS6'];
        
        $average = number_format(($total/7)*100,0);

        // $average = number_format(($value1/($value2+$value1))*100,1);

        return generateProgressBar($average);
    }
}

function generateProgressBar($progressValue){
    $progressColor = 'secondary';

    if ($progressValue >= 0 && $progressValue <= 20 ){
        $progressColor = 'secondary';
    } else if ($progressValue >= 21 && $progressValue <= 40 ){
        $progressColor = 'danger';
    } else if ($progressValue >= 41 && $progressValue <= 60 ){
        $progressColor = 'warning';
    } else if ($progressValue >= 61 && $progressValue <= 80 ){
        $progressColor = 'info';
    } else if ($progressValue >= 81 && $progressValue <= 100 ){
        $progressColor = 'success';
    }

    echo '
        <div class="d-flex align-items-center justify-content-center">
            <span class="me-2 text-xs font-weight-bold">'.$progressValue.'%</span>
            <div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-'.$progressColor.'" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$progressValue.'%;"></div>
                </div>
            </div>
        </div>
    ';
}


function teacherNavigation($varsLoc, $activePage){
    include $varsLoc;
    
    $Teacher_Dashboard_Btn = '';
    $Teacher_Student_Btn = '';

    echo '
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="">
            <img src="'.$Long_logo.'" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link '.$Teacher_Dashboard_Btn.' text-white" href="'.$Teacher_Dashboard.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link '.$Teacher_Student_Btn.' text-white" href="'.$Teacher_Student.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">Students</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_Results.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">bar_chart</i>
            </div>
            <span class="nav-link-text ms-1">FLT Result</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active bg-info text-white" href="'.$Teacher_LS_Modules.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1">Learning Modules</span>
        </a>
        </li>
        <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">FLT Response</h6>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_PIS.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">Student P.I.S</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS1E.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (English)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS1F.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (Filipino)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS2.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS2 Scientific Literacy and Critical Thinking</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS3.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS3 Mathematics and Problem Solving Skills</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS4.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS4 Life & Career</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS5.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS5 Understanding the Self & Society</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="'.$Teacher_FLT_LS6.'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS6 Digital Citizenship</span>
        </a>
        </li>
    </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="" method="POST">
            <button class="btn bg-gradient-primary mt-4 w-100" type="submit" name="logout">
            <i class="material-icons opacity-10">logout</i>&nbsp&nbsp
                Logout
            </button>
            </form>
        </div>
    </div>`
    </aside>
    ';
}
?>