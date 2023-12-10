
<div class="row mb-0">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">school</i>
            </div>
            <div class="text-end pt-1">
            <p class="text-mb mb-0 text-capitalize">Active ALS Student</p>
            <h4 class="mb-0" id="activeStudentCount"><?=$Count_ActiveStudent?> Active</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-mb font-weight-bolder" id="allStudentCount"><?=$Count_AllStudent?></span> Registered ALS Student/s</p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">date_range</i>
            </div>
            <div class="text-end pt-1">
            <p class="text-mb mb-0 text-capitalize">Current School Year</p>
            <h4 class="mb-0">S.Y. <?=$ActiveSchoolYear?></h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-secondary text-mb font-weight-bolder">Date: </span><?=$CurrentDate?></p>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <?php
        if ($ActiveTestPeriod == 'Pre-test'){
            $btn_Pre_test = 'd-none';
            $btn_Post_test = '';
        } else if ($ActiveTestPeriod == 'Post-test'){
            $btn_Pre_test = '';
            $btn_Post_test = 'd-none';
        }
        ?>
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">local_library</i>
            </div>
            <div class="text-end pt-1"> 
            <p class="text-mb mb-0 text-capitalize">Active Test Period</p>
            <h4 class="mb-0" id="activeTeacherCount"><?=$ActiveTestPeriod?></h4>
            
            <form role="form" class="text-end" action="" method="POST">
            </form>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <form role="form" class="d-flex justify-content-end" action="" method="POST">
            <button class="btn <?=$btn_Pre_test?> btn-outline-success btn-sm mb-0 py-1 px-2" type="submit" name="update_test_period" value="Pre-test">Start Pre-test</button>
            <button class="btn <?=$btn_Post_test?> btn-outline-info btn-sm mb-0 py-1 px-2" type="submit" name="update_test_period" value="Post-test">Start Post-test</button>
            </form>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <?php
        
        $closeTestPeriod = GetCloseTestPeriodID($conn);
        $testStatus = '';
        if ($closeTestPeriod == 'close'){
            $testStatus = 'Closed';
            $btn_Close_test = 'd-none';
            $btn_Open_test = '';
        } else {
            $testStatus = 'Open';
            $btn_Close_test = '';
            $btn_Open_test = 'd-none';
        }
        ?>
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">article</i>
                </div>
                <div class="text-end pt-1"> 
                <p class="text-mb mb-0 text-capitalize">Test Status</p>
                <h4 class="mb-0" id="activeTeacherCount"><?=$testStatus?></h4>
                
                <form role="form" class="text-end" action="" method="POST">
                </form>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <form role="form" class="d-flex justify-content-end" action="" method="POST">
                <button class="btn <?=$btn_Open_test?> btn-outline-success btn-sm mb-0 py-1 px-2" type="submit" name="update_test_status" value="active">Start Accepting Test Response</button>
                <button class="btn <?=$btn_Close_test?> btn-outline-danger btn-sm mb-0 py-1 px-2" type="submit" name="update_test_status" value="close">Stop Accepting Test Response</button>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>