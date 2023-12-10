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
  
  $stdFLTSubjectID = GetFLTSubjectID($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID, 'LS1E ID');
  $FLTSubjectStatus= GetFLTSubjectStatus($conn, 'tbl_flt_ls1_eng', 'fls1e_id', $stdFLTSubjectID);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS1 English
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
                  <h5 class="mb-0 ps-5">Communication Skills (English)</h5>
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
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls1_eng', 'fls1e_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ ?>
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS1. Communication Skills (English)</h3>
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
                    Part I. Reading <br>
                    Directions: Read each item. Select the letter of the correct answer on the answer sheet provided for LS1 English.
                  </label>
                  <div class="row mt-3">
                    <label class="input-label text-md">1. <u>GREEN</u> light in the traffic sign means.
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q1_answer']?>
                      </span>
                    </label>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. Go</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                        <label class="form-label">B. Ready </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. Stop </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. Slow Down </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Identify the type of sentence according to use.
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q2_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-center">
                        I won the lottery!
                      </p>
                    </span>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. Imperative</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. Exclamatory </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. Declarative </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. Interrogative </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. What is the main idea of the given paragraph?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q3_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp The Sun is very important. Without it, there would be only darkness and our 
                        planet would be very cold and be without liquid water. Our planet would also be 
                        without people, animals, and plants because these things need sunlight and water to live.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Things need sunlight to live.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. There would be darkness in our planet.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. It would be very cold on Earth.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. The importance of the Sun.</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">
                      4. Fill in the blank with the correct word from the options below that will make the
                        statement <b>POSITIVE</b>. Choose the letter of the correct answer.
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q4_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-center">
                        I will ________ eat that vegetable. It's delicious!
                      </p>
                    </span>
                      <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. definitely</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. hardly </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. never </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. not </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">5 .What is the main idea of the given paragraph?
                      <br><span class="py-2 px-4 m-0 text-left font-weight-bold text-primary">
                          Answer: <?=$row_data['q5_answer']?>
                      </span>
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp All living things are made up of cells. Since humans are alive, we are also made of cells. 
                        Our body tissues are made up of cells. Tissue makes our body organs. Organs make our body systems. 
                        Cells are the building blocks of our bodies.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. Cells are building blocks of our bodies.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. Body tissues are made up of cells. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. Body organs are made up of tissue. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input disabled class="form-check-input" type="radio" value="D" name="q5_std_ans">
                        <label class="form-label">D. Living things are made up of cells. </label>
                        </div>
                    </div>
                  </div>

                  <hr>

                  <label class="input-label text-md font-weight-bold">
                    Part II. Writing<br>
                    Directions: Read the item below. Write your answer on the blanks provided on the LS1 English answer sheet.
                  </label>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      6. Choose one (1) member of your family and write a simple sentence to describe him/her. (1 point)
                    </label>
                    <label class="input-label text-sm font-weight-bold">
                      Your answer is provided on the space below.
                    </label>
                    <div class="col-md-12 col-sm-12 px-4">
                        <div class="input-group input-group-outline mb-2">
                        <textarea style="resize: none;" readonly class="form-control text-primary" name="q6_std_ans" rows="3"><?=$row_data['q6_answer']?></textarea>
                        </div>
                    </div>
                  </div>
                  
                  <hr>

                  <label class="input-label text-md font-weight-bold">
                    Part III. Listening/Speaking <br>
                    Instructions for the Teacher/Examiner: Prepare the Record of Responses Sheet (RRS) for this part. Read each item clearly, showing the picture, when needed, then write the learner's response verbatim on the RRS.
                  </label>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      7. Look at the picture. What are the people doing in the picture? Give your answer in one complete sentence. (1 point)
                    </label>
                    <span class="px-5 mb-2">
                      <img src="../../assets/img/question_img/ls1e_q7.png" alt="question_image" 
                      class="py-2 px-4 m-0 w-100 border-radius-lg">
                    </span>
                    <div class="col-md-12 col-sm-12 px-4">
                      <label class="input-label text-sm font-weight-bold">
                        Your answer is provided on the space below.
                      </label>
                      <div class="input-group input-group-outline">
                        <textarea style="resize: none;" readonly class="form-control text-primary" name="q7_std_ans" rows="3" id="convert_text"><?=$row_data['q7_answer']?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">
                      8. Read carefully and try to understand what it means. 
                      Then explain what you understand, using at least one (1) complete sentence. 
                      (Read the article slowly, and then write the answer on the RRS.) (1 point)
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp Childhood bullying is so common that it may not seem like a 
                        big deal. Up to 35% of people are estimated to have experienced it at some point. 
                        By adulthood, we are generally expected to have "got over" it. But the mental health 
                        effects of being bullied can be serious and last a lifetime. One study has even 
                        suggested that, when it comes to mental health, bullying is as harmful as child abuse, 
                        if not worse.
                      </p>
                    </span>
                    <div class="col-md-12 col-sm-12 px-4">
                      <label class="input-label text-sm font-weight-bold">
                        Your answer is provided on the space below.
                      </label>
                      <div class="input-group input-group-outline mb-2">
                        <textarea style="resize: none;" readonly class="form-control text-primary" name="q8_std_ans" rows="3"><?=$row_data['q8_answer']?></textarea>
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