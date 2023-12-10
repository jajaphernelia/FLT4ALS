<?php
$DbTestPeriod = GetCloseTestPeriodID($conn);
$TestPeriod = '--';
if ($DbTestPeriod == 'active'){
    $TestPeriod = $ActiveTestPeriod;
} else {
    $TestPeriod = 'Closed';
}
?>

<div class="row mt-1 mb-4 bg-white pt-3 pb-1 border-radius-lg shadow-secondary">
    <div class="col-md-4 col-sm-12 mb-2">
        <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
            <div class="card-body px-0 pt-2 pb-0">
                <div class="row">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                    <img src="<?=$userProfileIcon?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-lg-9 my-auto">
                    <div class="h-100">
                    <h5 class="mb-1">
                        <?=$_SESSION['StudentName']?>
                    </h5>
                    <p class="mb-0 text-mb mb-0 text-capitalize">
                        LRN: <?=$_SESSION['StudentLRN']?>
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 mb-2">
        <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
        <div class="card-body px-0 pt-2 pb-0">
            <div class="icon icon-lg icon-shape bg-gradient-success text-center border-radius-md position-absolute">
            <i class="material-icons opacity-10">date_range</i>
            </div>
            <div class="text-end pt-1">
            <p class="text-lg mb-0 text-capitalize">Current School Year</p>
            <h4 class="mb-0 ps-5">S.Y. <?=$ActiveSchoolYear?></h4>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 mb-2">
        <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
        <div class="card-body px-0 pt-2 pb-0">
            <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-md position-absolute">
            <i class="material-icons opacity-10">local_library</i>
            </div>
            <div class="text-end pt-1">
            <p class="text-lg mb-0 text-capitalize">Current Test Period</p>
            <h4 class="mb-0 ps-5"><?=$TestPeriod?></h4>
            </div>
        </div>
        </div>
    </div>
    
    <div class="col-12 mb-2">
        <?=$StudentNavigation?>
    </div>
</div>