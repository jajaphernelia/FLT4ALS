
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
</head>

<?php
// include '../variables.php';
// include '../config.php';

$studentLRN = $_SESSION['StudentLRN'];


$TestPeriodID = '';
if (isset($_GET['TP'])){
  $TestPeriodID = $_GET['TP'];
}
?>
<?php
      $StudentFLTScore = GetUserStudentFLTScore($conn, $ActiveSchoolYearID, $TestPeriodID, $studentLRN);
      if ($ActiveTestPeriod == 'Close'){ ?>
        <div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
            <span class="text-sm">FLT is not yet Open</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
      <?php } else if ($StudentFLTScore->num_rows>0){
      while ($flt=$StudentFLTScore-> fetch_assoc()){
      ?>
      <p class="mt-4 mb-1 text-lg text-uppercase font-weight-bold text-center">
        <?=$flt['Test Period']?> (School Year <?=$ActiveSchoolYear?>)
      </p>

<div class="row mt-5 d-flex justify-content-center">
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS1</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS1: Communication Skills (English) <br> <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls1e"
                    , NullValueHandler($flt['LS1E Total Score'])
                    , NullValueHandler($flt['LS1E Max Score'])-NullValueHandler($flt['LS1E Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS1E Total Score'])?>/<?=NullValueHandler($flt['LS1E Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS1E Total Score'], $flt['LS1E Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS1E Status'] == 'pending'){ 
                    $reviewLS1E = 'd-block'; 
                    $answerLS1E = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS1E Date Answered']?> <br>
                        <?=$flt['LS1E Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS1E Status'] == 'checked'){ 
                    $reviewLS1E = 'd-block'; 
                    $answerLS1E = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS1E Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS1E = 'd-none'; 
                    $answerLS1E = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
            <button type="button" onclick="openPage('ls1e_answer')" class="<?=$reviewLS1E?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls1e_form')" class="<?=$answerLS1E?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS1</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS1: Communication Skills (Filipino) <br> <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls1f"
                    , NullValueHandler($flt['LS1F Total Score'])
                    , NullValueHandler($flt['LS1F Max Score'])-NullValueHandler($flt['LS1F Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS1F Total Score'])?>/<?=NullValueHandler($flt['LS1F Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS1F Total Score'], $flt['LS1F Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS1F Status'] == 'pending' || $flt['LS1E Status'] == 'checking'){ 
                    $reviewLS1F = 'd-block'; 
                    $answerLS1F = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS1F Date Answered']?> <br>
                        <?=$flt['LS1F Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS1F Status'] == 'checked'){ 
                    $reviewLS1F = 'd-block'; 
                    $answerLS1F = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS1F Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS1F = 'd-none'; 
                    $answerLS1F = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
            <?php if ($flt['LS1E Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls1f_answer')" class="<?=$reviewLS1F?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls1f_form')" class="<?=$answerLS1F?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS2</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS 2: Scientific Literacy and <br> Critical Thinking Skills <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls2"
                    , NullValueHandler($flt['LS2 Total Score'])
                    , NullValueHandler($flt['LS2 Max Score'])-NullValueHandler($flt['LS2 Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS2 Total Score'])?>/<?=NullValueHandler($flt['LS2 Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS2 Total Score'], $flt['LS2 Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS2 Status'] == 'pending' || $flt['LS1F Status'] == 'checking'){ 
                    $reviewLS2 = 'd-block'; 
                    $answerLS2 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS2 Date Answered']?> <br>
                        <?=$flt['LS2 Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS2 Status'] == 'checked'){ 
                    $reviewLS2 = 'd-block'; 
                    $answerLS2 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS2 Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS2 = 'd-none'; 
                    $answerLS2 = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
        <?php if ($flt['LS1F Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls2_answer')" class="<?=$reviewLS2?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls2_form')" class="<?=$answerLS2?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS3</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS 3: Mathematical <br> and Problem-solving Skills <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls3"
                    , NullValueHandler($flt['LS3 Total Score'])
                    , NullValueHandler($flt['LS3 Max Score'])-NullValueHandler($flt['LS3 Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS3 Total Score'])?>/<?=NullValueHandler($flt['LS3 Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS3 Total Score'], $flt['LS3 Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS3 Status'] == 'pending' || $flt['LS2 Status'] == 'checking'){ 
                    $reviewLS3 = 'd-block'; 
                    $answerLS3 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS3 Date Answered']?> <br>
                        <?=$flt['LS3 Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS3 Status'] == 'checked'){ 
                    $reviewLS3 = 'd-block'; 
                    $answerLS3 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS3 Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS3 = 'd-none'; 
                    $answerLS3 = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
        <?php if ($flt['LS2 Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls3_answer')" class="<?=$reviewLS3?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls3_form')" class="<?=$answerLS3?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS4</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS4: Life and Career Skills <br> <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls4"
                    , NullValueHandler($flt['LS4 Total Score'])
                    , NullValueHandler($flt['LS4 Max Score'])-NullValueHandler($flt['LS4 Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS4 Total Score'])?>/<?=NullValueHandler($flt['LS4 Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS4 Total Score'], $flt['LS4 Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS4 Status'] == 'pending' || $flt['LS3 Status'] == 'checking'){ 
                    $reviewLS4 = 'd-block'; 
                    $answerLS4 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS4 Date Answered']?> <br>
                        <?=$flt['LS4 Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS4 Status'] == 'checked'){ 
                    $reviewLS4 = 'd-block'; 
                    $answerLS4 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS4 Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS4 = 'd-none'; 
                    $answerLS4 = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
        <?php if ($flt['LS3 Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls4_answer')" class="<?=$reviewLS4?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls4_form')" class="<?=$answerLS4?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS5</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS5: Understanding the Self and Society <br> <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls5"
                    , NullValueHandler($flt['LS5 Total Score'])
                    , NullValueHandler($flt['LS5 Max Score'])-NullValueHandler($flt['LS5 Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS5 Total Score'])?>/<?=NullValueHandler($flt['LS5 Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS5 Total Score'], $flt['LS5 Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS5 Status'] == 'pending' || $flt['LS4 Status'] == 'checking'){ 
                    $reviewLS5 = 'd-block'; 
                    $answerLS5 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS5 Date Answered']?> <br>
                        <?=$flt['LS5 Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS5 Status'] == 'checked'){ 
                    $reviewLS5 = 'd-block'; 
                    $answerLS5 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS5 Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS5 = 'd-none'; 
                    $answerLS5 = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
        <?php if ($flt['LS4 Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls5_answer')" class="<?=$reviewLS5?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls5_form')" class="<?=$answerLS5?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-5">
        <div class="card h-100">
        <div class="card-header py-2 px-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
            <h6 class="text-center text-white">LS6</h6>
            </div>
            <div class="text-end py-2 px-4">
            <p class="text-md mb-3 text-capitalize font-weight-bold">LS6: Digital Citizenship <br> <br></p>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-0 d-flex justify-content-center">
                <!-- <div class="" id="donut_single"></div> -->
                <?=PieChartGenirator(
                    "ls6"
                    , NullValueHandler($flt['LS6 Total Score'])
                    , NullValueHandler($flt['LS6 Max Score'])-NullValueHandler($flt['LS6 Total Score'])
                )?>
                </div>
                <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="text-center mb-0 p-2">
                    <h1 class="font-weight-normal"><?=NullValueHandler($flt['LS6 Total Score'])?>/<?=NullValueHandler($flt['LS6 Max Score'])?></h1>
                    <h4 class="font-weight-normal"><?=GetAverage($flt['LS6 Total Score'], $flt['LS6 Max Score'])?>% avg.</h4>
                    <?php if ($flt['LS6 Status'] == 'pending' || $flt['LS6 Status'] == 'checking'){ 
                    $reviewLS6 = 'd-block'; 
                    $answerLS6 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-warning font-weight-bolder">Initial Score </span> <br>
                        <?=$flt['LS6 Date Answered']?> <br>
                        <?=$flt['LS6 Time Answered']?>
                    </p>
                    <?php } else if ($flt['LS6 Status'] == 'checked'){ 
                    $reviewLS6 = 'd-block'; 
                    $answerLS6 = 'd-none';?>
                    <p class="mb-0 text-sm">
                        <span class="text-success font-weight-bolder">Final Score </span> <br>
                        <?=$flt['LS6 Date Checked']?>
                    </p>
                    <?php } else { 
                    $reviewLS6 = 'd-none'; 
                    $answerLS6 = 'd-block';?>
                    <p class="mb-0 text-sm">
                        <span class="text-secondary font-weight-bolder">Not yet Answered </span> <br> <br>
                    </p>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer pt-0 pt-0 h-100 text-center">
        <?php if ($flt['LS5 Status'] != NULL){  ?>
            <button type="button" onclick="openPage('ls6_answer')" class="<?=$reviewLS6?> btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            <button type="button" onclick="openPage('ls6_form')" class="<?=$answerLS6?> btn btn-sm bg-gradient-success btn-lg w-100 mt-0 mb-0">Start</button>
            <?php } else { ?>
            <button type="button" class="btn btn-sm bg-gradient-light btn-lg w-100 mt-0 mb-0">
            <i class="fa fa-lock text-secondary text-sm" aria-hidden="true"></i>
            </button>
            <?php } ?>
        </div>
        </div>
    </div>
</div>

<?php } } else {?>
      <div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
          <span class="text-sm">No Data Recorded</span>
          <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
      </div>
      <?php } ?>

      </html>