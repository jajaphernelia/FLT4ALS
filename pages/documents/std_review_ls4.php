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

  $stdFLTSubjectID = GetFLTSubjectID($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $TestPeriodID, 'LS4 ID');
  $FLTSubjectStatus= GetFLTSubjectStatus($conn, 'tbl_flt_ls4', 'fls4_id', $stdFLTSubjectID);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS4 Learning and Career Skills
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
                  <h5 class="mb-0 ps-5">Learning and Career Skills</h5>
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
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls4', 'fls4_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS4. Learning and Career Skills</h3>
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
                    Panuto: Basahin ang bawat aytem. Bilugan ang titik ng tamang sagot sa sagutang papel para sa LS4.
                  </label>

                  <div class="row mt-3">
                    <label class="input-label text-md">1. Gusto ni Nelia na madagdagan pa ang kanyang kaalaman at kasanayan sa pagluluto. Ano ang pinakamainam niyang gawin?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q1_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. Magsanay sa pagluluto nang mag-isa </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                      <label class="form-label">B. Magpaturo ng pagluluto sa kaibigan. </label>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. Sumali sa pagsananay tungkol sa pagluluto  </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. Magsaliksik sa internet tungkol sa pagluluto </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Si Dexter ay marunong gumawa ng iba't ibang home-made na tinapay. Anong trabaho ang maaari niyang pagkakitaan?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q2_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. Panadero</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. Sorbetero </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. Serbidor </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. Kusinero </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. Maagang binubuksan ni Mang Roldan ang pinapasukang Auto Repair Shop. Tumatanggap siya ng mga mamimili kahit lampas na sa oras at sinisigurado niyang maayos ang kanyang trabaho. 
                      Ano ang magandang katangiang ipinapakita niya bilang isang empleyado?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q3_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Masayahin</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. Masipag</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. Mahusay</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. Mapagbigay</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      4. Ano ang dapat gamitin ng mga mananahi ng ASAS Dress Shop sa paglilinis ng mga makina sa pagtatahi?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q4_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. Basang tisyu</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. Mamasa-masang tela </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. Magaspang na tela</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. Malambot at tuyong tela</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      5. Si Junjun ay isang construction worker sa White Forth Company. Alin sa mga sumusunod ang dapat ihanda at suotin ni Junjun bago pumasok?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q5_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. leather shoes at barong tagalog</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. sombrero, salamin at panyo </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. helmet, bota, mask at gloves</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q5_std_ans">
                        <label class="form-label">D. rubber shoes, shades at jacket</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      6. Alin sa mga sumusunod ang nagpapakita na ang may-ari ng negosyo ay nagbibigay ng maayos na serbisyo sa kaniyang mamimili?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q6_answer']?>
                      </span>
                    </label>
                    <div class="col-md-12 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q6_std_ans">
                        <label class="form-label">A. Pinapalitan ang mga depektibong gamit</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q6_std_ans">
                        <label class="form-label">B. Walang pakialam ang security guard sa mga mamimili.</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q6_std_ans">
                        <label class="form-label">C. Walang priority lane</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q6_std_ans">
                        <label class="form-label">D. Hindi pinapansin ng mga sales lady ang kailangan ng mamimili.</label>
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