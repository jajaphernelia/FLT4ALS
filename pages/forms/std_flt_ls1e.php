<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");
  CheckExisitingFLT($conn, $_SESSION['StudentLRN'], $ActiveSchoolYearID, $ActiveTestPeriodID, 'LS1E ID', $Domain, 'std_review_ls1e.php');
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
                    <h3 class="mb-0 text-secondary text-lg text-uppercase">LS1. Communication Skills (English)</h3>
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
                    <label class="input-label text-md">1. <u>GREEN</u> light in the traffic sign means.</label>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q1_std_ans">
                        <label class="form-label">A. Go</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q1_std_ans">
                        <label class="form-label">B. Ready </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q1_std_ans">
                        <label class="form-label">C. Stop </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q1_std_ans">
                        <label class="form-label">D. Slow Down </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">2. Identify the type of sentence according to use.</label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-center">
                        I won the lottery!
                      </p>
                    </span>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q2_std_ans">
                        <label class="form-label">A. Imperative</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q2_std_ans">
                        <label class="form-label">B. Exclamatory </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q2_std_ans">
                        <label class="form-label">C. Declarative </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q2_std_ans">
                        <label class="form-label">D. Interrogative </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">3. What is the main idea of the given paragraph?</label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp The Sun is very important. Without it, there would be only darkness and our 
                        planet would be very cold and be without liquid water. Our planet would also be 
                        without people, animals, and plants because these things need sunlight and water to live.
                      </p>
                    </span>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q3_std_ans">
                        <label class="form-label">A. Things need sunlight to live.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q3_std_ans">
                        <label class="form-label">B. There would be darkness in our planet.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q3_std_ans">
                        <label class="form-label">C. It would be very cold on Earth.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q3_std_ans">
                        <label class="form-label">D. The importance of the Sun.</label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">
                      4. Fill in the blank with the correct word from the options below that will make the
                        statement <b>POSITIVE</b>. Choose the letter of the correct answer.
                    </label>
                    <span class="px-5 mb-2">
                      <p class="border border-secondary py-2 px-4 m-0 text-center">
                        I will ________ eat that vegetable. It's delicious!
                      </p>
                    </span>
                      <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="A" name="q4_std_ans">
                        <label class="form-label">A. definitely</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q4_std_ans">
                        <label class="form-label">B. hardly </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q4_std_ans">
                        <label class="form-label">C. never </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q4_std_ans">
                        <label class="form-label">D. not </label>
                        </div>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <label class="input-label text-md">5 .What is the main idea of the given paragraph?
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
                        <input required class="form-check-input" type="radio" value="A" name="q5_std_ans">
                        <label class="form-label">A. Cells are building blocks of our bodies.</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="B" name="q5_std_ans">
                        <label class="form-label">B. Body tissues are made up of cells. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="C" name="q5_std_ans">
                        <label class="form-label">C. Body organs are made up of tissue. </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-check">
                        <input required class="form-check-input" type="radio" value="D" name="q5_std_ans">
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
                    <div class="col-md-12 col-sm-12 px-4">
                        <div class="input-group input-group-outline mb-2">
                        <textarea style="resize: none;" class="form-control" name="q6_std_ans" rows="3"></textarea>
                        </div>
                    </div>
                  </div>
                  
                  <hr>

                  <label class="input-label text-md font-weight-bold">
                    Part III. Listening/Speaking
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
                      <label class="input-label text-sm">
                        Click the "LISTEN TO ME" button to record your answer.
                      </label>
                      <div class="input-group input-group-outline">
                        <textarea style="resize: none;" readonly class="form-control text-secondary" name="q7_std_ans" rows="3" id="convert_text">Your answer will be displayed here...</textarea>
                      </div>
                      <div class="text-end">
                        <span class="text-danger text-sm me-3" style="visibility: hidden" id="speak_indicator">
                          <i class="material-icons text-sm">graphic_eq</i>&nbsp&nbsp you may speak now...
                        </span>
                        <button type="button" class="btn btn-outline-info btn-sm my-2" id="click_to_record">
                          <i class="material-icons text-sm">mic</i>&nbsp&nbsp
                          Listen to Me
                        </button>
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
                      <label class="input-label text-sm">
                        Provide your answer on the given space below.
                      </label>
                      <div class="input-group input-group-outline mb-2">
                        <textarea style="resize: none;" class="form-control" name="q8_std_ans" rows="3"></textarea>
                      </div>
                    </div>
                  </div>

                  <!-- Submit Panel -->
                  <div class="row mt-2">
                    <div class="col-md-12 col-sm-12 text-end">
                        <button class="btn bg-gradient-success my-2" type="submit" value="<?=$_SESSION['StudentLRN']?>" name="submit_ls1e">
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

    recognition.lang = "en-US";
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
    }
  });
</script>
</html>