<div class="row gx-4 m-0 p-0 d-flex justify-content-center">
    <div class="col-md-9 m-0 p-0">
        <div class="row gx-4 mb-2 mt-3">
            <div class="col-md-3 col-sm-12 mb-3">
                <div class="card card-body p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-plain h-100">
                                    <div class="card-header p-1">
                                        <h6 class="mb-0 text-uppercase text-center">Student ALS Level</h6>
                                    </div>
                                    <div class="card-body p-3">
                                    <?php 
                                        $stdFLT = GetUserStudentPreTestScore($conn, $ActiveSchoolYearID, $ActiveTestPeriodID, $_SESSION['StudentLRN']);
                                        while ($flt=$stdFLT-> fetch_assoc()){
                                        
                                        ProfilePieChartGenirator(
                                        "fltScore"
                                        , NullValueHandler($flt['FLT Total Score'])
                                        , NullValueHandler($flt['FLT Max Score'])-NullValueHandler($flt['FLT Total Score'])
                                        );?>
                                        <?php } ?>
                                    </div>
                                    
                                    <?php $alsLevel = GetUserStudentFLTData($conn
                                        , $_SESSION['StudentLRN']
                                        , $ActiveSchoolYearID
                                        , 'TPRD-00001'
                                        , 'Learning Level');
                                        
                                        $alsColor = "";

                                        if ($alsLevel == 'FLT is not yet Completed'){
                                            $alsColor = "danger";
                                        } else {
                                            $alsColor = "success";
                                        }
                                    ?>
                                    <h4 class="mt-1 mb-0 text-<?=$alsColor?> text-center">
                                        <?=$alsLevel?>
                                    </h4>
                                    <button type="button" 
                                        onclick="openPage('ls1e_answer')" 
                                        class="d-none btn btn-sm bg-gradient-primary btn-lg w-100 mt-3 mb-0">
                                        Assessment
                                    </button>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 mb-3">
                <div class="card card-body p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card card-plain h-100">
                                    <div class="card-header p-1">
                                        <div class="row">
                                            <h6 class="mb-0 text-uppercase text-center">Student Information</h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Full Name:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Name")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">LRN:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "LRN")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Gender:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Gender")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Birthdate:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Birthdate")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Age:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Age")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Address:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Complete Address")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Religion:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Religion")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Civil Status:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Civil Status")?>
                                        </li>
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">Occupation:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "Occupation")?>
                                        </li>      
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                            <strong class="text-dark">About the Student:</strong> 
                                            &nbsp; <?=GetUserStudentData($conn, $_SESSION['accountID'], "About Student")?>
                                        </li>                           
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card card-body p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card card-plain h-100">
                                    <div class="card-header p-1">
                                        <h6 class="mb-0 text-uppercase text-center">FLT Accomplishment</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        
                                    <h4 class="mb-1 text-secondary text-uppercase text-center">
                                        <?=$ActiveTestPeriod?>
                                    </h4>
                                    <?php StudentProgressPieChartGenirator(
                                        "FLTProgress"
                                        , NullValueHandler(getFLTProgress($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID))
                                        , 7 - NullValueHandler(getFLTProgress($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID))
                                        ); 
                                    ?>
                                    </div>
                                    
                                    <div class="d-flex justify-content-around m-0 p-0 mt-2">
                                        <h5 class="mt-1 mb-0 text-success text-center">
                                            Done : <?=NullValueHandler(getFLTProgress($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID))?>
                                        </h5>

                                        
                                        <h5 class="mt-1 mb-0 text-info text-center">
                                            Pending : <?=7 - NullValueHandler(getFLTProgress($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID))?>
                                        </h5>
                                    </div>
                                    <button type="button" 
                                        onclick="openPage('ls1e_answer')" 
                                        class="d-none btn btn-sm bg-gradient-primary btn-lg w-100 mt-3 mb-0">
                                        Assessment
                                    </button>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>