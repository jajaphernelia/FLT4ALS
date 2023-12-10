<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");
  CheckExisitingFLT($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID, 'LS6 ID', $Domain, 'std_review_ls6.php');
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT LS6 Digital Citizenship
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
                  <h5 class="mb-0 ps-5">Digital Citizenship</h5>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer py-2 tx-3 h-100 d-flex align-items-center">
                <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">Test Period: </span><?=$ActiveTestPeriod?></p>
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
                <div class="row">
                  <div class="col-12 text-center">
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS6. Digital Citizenship</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="../../assets/php/config.php" method="POST">
                  <label class="input-label text-md font-weight-bold">
                    Directions: Read each item. Select the letter of the correct answer on the answer sheet provided for LS6.
                  </label>

                  <div class="row mt-3">
                    <label class="input-label text-md">1. Which of the following describes a computer?</label>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. It produces many errors. </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q1_std_ans">
                      <label class="form-label">B. It takes a long time to operate. </label>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. It works without instruction from the user.  </label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. It works fast and performs multiple functions. </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Which is the correct order of steps in turning off a computer?</label>
                    <span class="px-5 mb-2">
                      <p class="py-2 px-4 m-0 text-justify">
                        1. Click the start button. <br>
                        2. Save and Close all the applications <br>
                        3. Click the Shutdown button.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. 3.2.1 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. 1, 2, 3 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. 2, 1, 3 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. 2, 3, 1 </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. Which of the following statements about microcomputer is correct?</label>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Calculator captures images.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. Tablet PC is bigger than laptop.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. Desktop computer is portable.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. Smartphone is used for calls and text messages.</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-1">
                    <label class="input-label text-md">
                      4. Which of the following computer device is used to make copies of reports, photographs and other documents?
                    </label>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. Mouse</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. Microphone </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. Printer</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. Speaker</label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      5. Jaf needs to scan his ID picture. What is the correct order of steps that he should follow?
                    </label>
                    <span class="px-5 mb-2">
                      <p class="py-2 px-4 m-0 text-justify">
                        1. Connect the scanner to the computer. <br>
                        2. Place the picture to the scanner. <br>
                        3. Press on the power button of the scanner. <br>
                        4. Click the scan button.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. 1, 3, 2, 4 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. 3, 2, 1, 4 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. 4, 3, 2, 1</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q5_std_ans">
                        <label class="form-label">D. 2, 1, 3, 4 </label>
                        </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <label class="input-label text-md">
                      6. Jaime wants to save his project into a USB flash drive. What is the correct order of steps to save it?
                    </label>
                    <span class="px-5 mb-2">
                      <p class="py-2 px-4 m-0 text-justify">
                        1. Click File <br>
                        2. Choose Save As <br>
                        3. Name the file and click save <br>
                        4. Insert the flash drive to USB slot
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q6_std_ans">
                        <label class="form-label">A. 3, 4, 2, 1 </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q6_std_ans">
                        <label class="form-label">B. 2, 3, 1, 4  </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q6_std_ans">
                        <label class="form-label">C. 1, 2, 3, 4</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q6_std_ans">
                        <label class="form-label">D. 4, 1, 2, 3 </label>
                        </div>
                    </div>
                  </div>

                  <!-- Submit Panel -->
                  <div class="row mt-2">
                    <div class="col-md-12 col-sm-12 text-end">
                        <button class="btn bg-gradient-success my-2" type="submit" value="<?=$_SESSION['StudentLRN']?>" name="submit_ls6">
                        <i class="material-icons text-sm">check</i>&nbsp&nbsp
                        Submit
                        </button>
                    </div>
                  </div>
                </form>
              </div>
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
<script>
  click_to_record.addEventListener('click',function(){
    var indicator = document.getElementById("speak_indicator");
    var speech = true;
    window.SpeechRecognition = window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;

    recognition.lang = "fil-PH";
    // recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.addEventListener('result', e => {
        const transcript = Array.from(e.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('')

        document.getElementById("convert_text").innerHTML = transcript;
        indicator.style.visibility = "hidden";
        // console.log(transcript);
        // console.log(recognition.lang);
    });
    
    if (speech == true) {
        recognition.start();
        indicator.style.visibility = "visible";
        console.log('speaking');
    }
  });
</script>
</html>