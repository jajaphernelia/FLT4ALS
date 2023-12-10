<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';
  //include 'assets/php/login_config.php';

  LoggedInRequired($Domain, "student");
  $TestPeriodID = '';
  if (isset($_GET['TP'])){
    $TestPeriodID = $_GET['TP'];
  }

  if ($TestPeriodID == 'TPRD-00001'){
    $TestPeriod = 'Pre-Test';
  } else if ($TestPeriodID == 'TPRD-00002'){
    $TestPeriod = 'Post-Test';
  } else {
    $TestPeriod = '--';
  }

  $stdFLTSubjectID = GetFLTSubjectID($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $TestPeriodID, 'LS5 ID');
  $FLTSubjectStatus= GetFLTSubjectStatus($conn, 'tbl_flt_ls5', 'fls5_id', $stdFLTSubjectID);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS5 Understanding The Self And Society
  </title>
  
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<body class="bg-gray-200">
  <main id="mainContainer" class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <div class="container-fluid py-3">
        <!-- Student Header -->
        <div class="row d-flex justify-content-center">
          <div class="col-xl-3 mb-2">
            <div class="card h-100">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-md icon-shape bg-gradient-success text-center border-radius-md mt-2 position-absolute">
                  <i class="material-icons opacity-10">school</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-mb mb-0 text-capitalize">Student</p>
                  <h5 class="mb-0 ps-5"><?=$_SESSION['StudentName']?> <br> </h5>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer py-2 tx-3 h-100 d-flex align-items-center">
                <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">LRN: </span><?=$_SESSION['StudentLRN']?> </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mb-2">
            <div class="card h-100">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-md icon-shape bg-gradient-info text-center border-radius-md mt-2 position-absolute">
                  <i class="material-icons opacity-10">book</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-mb mb-0 text-capitalize">Test Part</p>
                  <h5 class="mb-0 ps-5">Understanding The Self And Society</h5>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer py-2 tx-3 h-100 d-flex align-items-center">
                <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">Test Period: </span><?=$TestPeriod?></p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mb-2">
            <div class="card h-100">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-md icon-shape bg-gradient-warning text-center border-radius-md mt-2 position-absolute">
                  <i class="material-icons opacity-10">date_range</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-mb mb-0 text-capitalize">Current School Year</p>
                  <h5 class="mb-0 ps-5">S.Y. <?=$ActiveSchoolYear?></h5>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer py-2 tx-3 h-100 d-flex align-items-center">
                <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">Date: </span><?=$CurrentDate?></p>
              </div>
            </div>
          </div>
        </div>
        <?php if (isset($_GET['message'])){
          GenerateMessage($_GET['type'], $_GET['message']);
        }?>
  
        <!-- FLT Queston Form -->
        <div class="row d-flex justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="card my-2 overflow-auto" id="TestContainer">
              <div class="card-header pb-0 p-3">
              <?php
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls5', 'fls5_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS5. Understanding The Self And Society</h3>
                  <?php if ($FLTSubjectStatus== 'checked'){ ?>
                    <h6 class="mb-0 text-success">Final Score: <?=$row_data['total_score']?>/<?=$row_data['max_score']?> (<?=DateConverter($row_data['check_date'], 'F j, Y')?>)</h6>
                  <?php } else {?>
                    <h6 class="mb-0 text-warning">Initial Score: <?=$row_data['total_score']?>/<?=$row_data['max_score']?> (<?=DateConverter($row_data['date_ans'], 'F j, Y')?>)</h6>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="../../assets/php/config.php" method="POST">
                  <label class="input-label text-md font-weight-bold">
                    Panuto: Basahin ang bawat aytem. Bilugan ang titik ng tamang sagot sa sagutang papel para sa LS 5.
                  </label>

                  <div class="row mt-3">
                    <label class="input-label text-md">1. Ano ang pinakatamang gawin kapag inabutan ka ng lindol sa learning center?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q1_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. Ligpitin ang mahahalagang bagay. </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                      <label class="form-label">B. Tumakbo nang mabilis palabas. </label>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. Sumandal sa mataas na pader.  </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. Magtago sa ilalim ng matibay na mesa. </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Batay sa larawan, alin ang tamang pagkakasunod-sunod ng mga kaganapan sa buhay ng isang tao?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q2_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2 text-center">
                      <img src="../../assets/img/question_img/ls5_q2.png" alt="question_image" 
                      class="py-2 px-4 m-0 w-80 border-radius-lg">
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. 3-2-4-1 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. 4-3-2-1 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. 1-4-2-3 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. 2-3-4-1 </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. Napansin mong alas dose na ng gabi ngunit malakas pa rin ang tugtog at boses ng iyong kapitbahay. 
                      Hindi makatulog ang pamilya mo. Ano ang dapat mong gawin?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q3_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Kausapin siya nang mahinahon.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. Igalang ang karapatan niya.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. Tumawag agad ng pulis.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. Tiisin na lang ang ingay.</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      4. Maagang nag-asawa sina Celso at Jade. Nagkaanak agad sila ngunit naging iresponsable si Celso. 
                      Humantong ito sa kanilang paghihiwalay. 
                      May karapatan bang humingi si Jade ng suportang pinansyal kay Celso para sa kanilang anak?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q4_answer']?>
                      </span>
                    
                    </label>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. Hindi, dahil hiwalay na sila.</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. Hindi, dahil sandali lang naman silang nagsama. </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. Oo, may pananagutan si Celso sa bata.</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. Oo, dahil may trabaho naman si Celso.</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      5. Nakita ni Luis ang isang matandang babae na balak tumawid sa "pedestrian lane." Nilapitan niya ang matanda at inalalayan sa pagtawid. Ano ang katangiang taglay niya?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q5_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. Matiyaga </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. Matulungin </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. Mapag-aruga</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q5_std_ans">
                        <label class="form-label">D. Magalang </label>
                        </div>
                    </div>
                  </div>
                </form>
              </div>

              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?=$PageFooter?>
  </main>
  <!--   Core JS Files   -->
  <?=$PageScripts?>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
  
</body>
</html>