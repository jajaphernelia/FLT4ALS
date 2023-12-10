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

  $stdFLTSubjectID = GetFLTSubjectID($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $TestPeriodID, 'LS1F ID');
  $FLTSubjectStatus= GetFLTSubjectStatus($conn, 'tbl_flt_ls1_fil', 'fls1f_id', $stdFLTSubjectID);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS1 Filipino
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
                  <h5 class="mb-0 ps-5">Communication Skills (Filipino)</h5>
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
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls1_fil', 'fls1f_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS1. Communication Skills (Filipino)</h3>
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
                    Part I. Pagbasa <br>
                    Panuto: Basahin ang bawat aytem. Bilugan ang titik ng tamang sagot sa sagutang papel para sa LS1 Filipino.
                  </label>

                  <div class="row mt-3">
                    <label class="input-label text-md">1. Basahin ang sitwasyon at piliin ang tamang sagot na nagpapakita ng magalang na pananalita.
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q1_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                      &nbsp&nbsp&nbsp&nbsp&nbsp Nais mong pumasok sa learning center ngunit ang iyong 
                      guro at ang kanyang kausap ay nasa pintuan. Ano ang iyong sasabihin sa kanila?
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. Tumabi po kayo.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                        <label class="form-label">B. Tumabi po kayo. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. Makikiraan po. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. Pwede bang dumaan? </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Alin sa mga sumusunod na pangungusap ang may tamang bantas?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q2_answer']?>
                      </span>
                    </label>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. Ang Araw ng Kalayaan ay ipinagdiriwang tuwing Hunyo 12?</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. Dadalo ka ba sa pagpupulong ngayong Huwebes. </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. Naku, may sunog! </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. "Ang mga bata ay masayang naglalaro," </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. Basahin ang pangungusap at piliin ang pares ng mga salitang magkasalungat ang kahulugan.
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q3_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp Nakalulungkot isipin na sa mata ng batas, nakalalamang ang mayamang 
                        may pantustos sa mga tagapagtanggol kaysa sa maralitang kahit pangkain ay wala.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Nakalalamang - Nakalulungkot</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. Tagapagtanggol – Batas</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. Pantustos Pangkain</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. Mayaman Maralita</label>
                        </div>
                    </div>
                  </div>

                  <hr>

                  <label class="input-label text-md font-weight-bold">
                    Part II. Pagsulat<br>
                    Panuto: Basahin ang aytem. Ilagay ang sagot sa nakalaang patlang sa ibaba ng tanong.
                  </label>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      4. Ilagay sa patlang ang baybay sa Filipino ng salitang hiram na "<u>computer</u>".
                    </label>
                    <div class="col-md-12 col-sm-12 px-4">
                        <div class="input-group input-group-outline mb-2">
                        <textarea style="resize: none;" readonly class="form-control" name="q4_std_ans" rows="2"><?=$row_data['q4_answer']?></textarea>
                        </div>
                    </div>
                  </div>
                  
                  <hr>

                  <label class="input-label text-md font-weight-bold">
                    Part III. Pakikinig/Pagsasalita <br>
                  </label>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      5. Pakinggan mo ang aking isasalaysay na sitwasyon at sagutin nang malinaw ang kasunod na tanong. (2 points)
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp Habang ikaw ay naglalakad papunta sa plaza para maglaro, 
                        nakita mo ang iyong kaibigan na naglilinis ng kanilang bakuran. 
                        Ano ang iyong gagawin? Ibigay ang iyong sagot sa 2 o 3 pangungusap.
                      </p>
                    </span>
                    <div class="col-md-12 col-sm-12 px-4">
                      <div class="input-group input-group-outline">
                        <textarea style="resize: none;" readonly class="form-control text-secondary" name="q5_std_ans" rows="3" id="convert_text"><?=$row_data['q5_answer']?></textarea>
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