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

  $stdFLTSubjectID = GetFLTSubjectID($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $TestPeriodID, 'LS3 ID');
  $FLTSubjectStatus= GetFLTSubjectStatus($conn, 'tbl_flt_ls3', 'fls3_id', $stdFLTSubjectID);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS3 Mathematical And Problem-Solving Skills
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
                  <h5 class="mb-0 ps-5">Mathematical And Problem-Solving Skills</h5>
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
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls3', 'fls3_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS3. Mathematical And Problem-Solving Skills</h3>
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
                    Directions: Read each item. Select the letter of the correct answer on the answer sheet provided for LS3.
                  </label>

                  <div class="row mt-3">
                    <label class="input-label text-md">1. What is the difference between the numbers of hearts inside the boxes?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q1_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <img src="../../assets/img/question_img/ls3_q1.png" alt="question_image" 
                      class="py-2 px-4 m-0 w-100 border-radius-lg">
                    </span>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. 17</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                      <label class="form-label">B. 13 </label>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. 10  </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. 5 </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Which of the following symbols must be placed in the box?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q2_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2 text-center">
                      <img src="../../assets/img/question_img/ls3_q2.png" alt="question_image" 
                      class="py-2 px-4 m-0 w-40 border-radius-lg">
                    </span>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. ></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. < </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. = </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. =/ </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. The residents of Barangay San Pedro planted 1,655 mahogany trees and 2,340 mango trees in their barangay. How many trees did they plant altogether?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q3_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. 2,795</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. 3,995</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. 4,895</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. 5,985</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      4. (250 x 40) + (50 x 8) =
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q4_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. 15</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. 25</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. 35</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. 45</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      5. Of the twelve classes of DRT High School, each class donated 45 boxes of toothpaste to an orphanage. How many boxes of toothpaste were donated in all?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q5_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. 540</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. 541</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. 542</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q5_std_ans">
                        <label class="form-label">D. 543</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      6. Jack is planning to treat his 6 friends on his birthday. He decided to buy 3 boxes of pizza with 8 slices per box. How many slices of pizza can each of his friends have?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q6_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q6_std_ans">
                        <label class="form-label">A. 4</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q6_std_ans">
                        <label class="form-label">B. 5</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q6_std_ans">
                        <label class="form-label">C. 6</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q6_std_ans">
                        <label class="form-label">D. 7</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      7. Marco bought four items from a sari-sari store. He bought the following: cooking oil at P35.75, canned tuna at P28.15, tomato sauce at P19.50 and powdered milk at P123.65. How much did he pay for all the items?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q7_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q7_std_ans">
                        <label class="form-label">A. ₱ 237.75</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q7_std_ans">
                        <label class="form-label">B. ₱ 227.50 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q7_std_ans">
                        <label class="form-label">C. ₱ 217.15</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q7_std_ans">
                        <label class="form-label">D. ₱ 207.05</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      8. In a fruit stand, the ratio of mangoes to oranges is 4:3. How many oranges are there if there are 16 mangoes?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q8_answer']?>
                      </span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q8_std_ans">
                        <label class="form-label">A. 16</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q8_std_ans">
                        <label class="form-label">B. 14 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q8_std_ans">
                        <label class="form-label">C. 12</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q8_std_ans">
                        <label class="form-label">D. 10</label>
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