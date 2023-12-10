<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "teacher");

    $selectedStudent = '';

  if (isset($_GET['lrn'])){
    $selectedStudent = $_GET['lrn'];
  }

  $studentName = NullDBValueHandler(
    GetUserStudentFLTData($conn, $selectedStudent, $ActiveSchoolYearID, 'TPRD-00001', 'Student Name')
    , 'Unknown'
  );

  $alsLevel = NullDBValueHandler(
    GetUserStudentFLTData($conn, $selectedStudent, $ActiveSchoolYearID, 'TPRD-00001', 'Learning Level')
    , 'Pending'
  );

  $fltEval = 
    NullDBValueHandler(
      GetUserStudentFLTData($conn, $selectedStudent, $ActiveSchoolYearID, 'TPRD-00002', 'FLT Total Score')
      , 'Pending'
    )
    .'/'.
    NullDBValueHandler(
      GetUserStudentFLTData($conn, $selectedStudent, $ActiveSchoolYearID, 'TPRD-00002', 'FLT Max Score')
      , 'Pending'
  );

  $studentFLTScores = GetUserStudentFLTScore($conn, $ActiveSchoolYearID, 'TPRD-00002', $selectedStudent);
  
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT Learning Score Sheet
  </title>
  
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<body class="bg-gray-200">
  <main id="mainContainer" class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <div class="container-fluid py-3">
  
        <!-- FLT Queston Form -->
        <div class="row d-flex justify-content-center">
          <div class="col-xl-6 col-lg-12">
            <div class="card p-5">
              <div class="card-header text-center p-0 mb-4">
                <h3 class="mb-0 text-secondary text-uppercase">FLT Learning Score Sheet</h3>
              </div>
              <div class="card-body p-0"> 
                <div class="row mb-3">
                    <div class="col-7">
                        <p class="mb-0 text-lg text-uppercase mb-2">
                            <b>Name:</b> <u>&nbsp&nbsp&nbsp <?=$studentName?> &nbsp&nbsp&nbsp</u>
                        </p>
                    </div>
                    <div class="col-5">
                        <p class="mb-0 text-lg text-uppercase mb-2 d-flex justify-content-end">
                            <b>Date:</b> <u>&nbsp&nbsp&nbsp <?=$CurrentDate?> &nbsp&nbsp&nbsp</u>
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="mb-0 text-lg  text-uppercase mb-2">
                            <b>Overall Score:</b> &nbsp&nbsp&nbsp 
                            <u>&nbsp&nbsp&nbsp <?=$fltEval?> &nbsp&nbsp&nbsp</u>  
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="mb-0 text-lg text-uppercase mb-2">
                            <b>ALS Level:</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                            <u>&nbsp&nbsp&nbsp <?=$alsLevel?> &nbsp&nbsp&nbsp</u>
                        </p>  
                    </div>
                </div>

                <div class="table-responsive pb-2">
                  <table class="table table-bordered border border-dark align-items-center mb-0">
                    <thead class="bg-light text-center">
                        <tr class="">
                            <th width="40%">STRANDS</th>
                            <th width="20%">SCORE</th>
                            <th width="40%">LEVEL OF LEARNING</th>
                        </tr>   
                        <tr>
                            <!-- empty -->
                        </tr> 
                    </thead>

                    <?php  if ($studentFLTScores->num_rows>0){ 
                      while ($flt_data=$studentFLTScores-> fetch_assoc()){
                      ?>

                    <tbody class="text-dark">
                        <tr>
                            <td class="py-3">
                                <b>PIS</b>
                            </td>
                            <td class="text-center">
                              <!-- <span class="border border-secondary py-2 px-3"> -->
                                <?=$flt_data['PIS Total Score']?>
                              <!-- </span> -->
                            </td>
                            <td class="text-center">
                              <?=evaluatePIS($flt_data['PIS Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                              <b>LS1 Communication Skills - English</b>
                              <?php $LS1E = GetFilteredData($conn, 'tbl_flt_ls1_eng', 'fls1e_id', $flt_data['LS1E ID']);
                                while ($LS1E_data=$LS1E-> fetch_assoc()){?>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Multiple Choice
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1E_data['q1_score']
                                      + $LS1E_data['q2_score']
                                      + $LS1E_data['q3_score']
                                      + $LS1E_data['q4_score']
                                      + $LS1E_data['q5_score']
                                    ?>
                                  </span>
                                </div>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Writing
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1E_data['q6_score']?>
                                  </span>
                                </div>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Listening/Speaking
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1E_data['q7_score'] + $LS1E_data['q8_score']?>
                                  </span>
                                </div>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS1E Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS1E($flt_data['LS1E Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS1 Communication Skills - Filipino</b> 
                              <?php $LS1F = GetFilteredData($conn, 'tbl_flt_ls1_fil', 'fls1f_id', $flt_data['LS1F ID']);
                                while ($LS1F_data=$LS1F-> fetch_assoc()){?>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Multiple Choice
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1F_data['q1_score']
                                      + $LS1F_data['q2_score']
                                      + $LS1F_data['q3_score']
                                    ?>
                                  </span>
                                </div>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Pagsusulat
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1F_data['q4_score']?>
                                  </span>
                                </div>
                                <div class="px-3 mb-1 d-flex justify-content-between align-items-center">
                                  <p class="m-0 p-0">
                                    Pakikinig/Pagsasalita
                                  </p>
                                  <span class="border border-secondary py-2 px-3">
                                    <?=$LS1F_data['q5_score']?>
                                  </span>
                                </div>
                              <?php } ?>
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS1F Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS1F($flt_data['LS1F Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS2 Scientific and Critical Thinking Skills</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS2 Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS2($flt_data['LS2 Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS3 Mathematical and Problem-solving Skills</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS3 Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS3($flt_data['LS3 Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS4 Life and Career</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS4 Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS4($flt_data['LS4 Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS5 Understanding the Self and the Society</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS5 Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS5($flt_data['LS5 Total Score'])?>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3"><b>LS6 Digital Citizenship</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['LS6 Total Score']?>
                            </td>
                            <td class="text-center">
                              <?=evaluateLS6($flt_data['LS6 Total Score'])?>
                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td class="py-3"><b>OVERALL SCORE</b>          
                            </td>
                            <td class="text-center">
                              <?=$flt_data['FLT Total Score']?>
                            </td>
                            <td>
                              
                            </td>
                        </tr>

                        <tr>
                            <!-- empty -->
                        </tr>
                    </tbody>
                    <?php } } ?>
                  </table>
                </div>

                <p class="text-lg text-uppercase text-dark mt-4">
                    <b>Name and Signature of ALS Teacher</b> 
                    <h4 class="font-weight-normal m-0">
                      <u>&nbsp&nbsp&nbsp <?=$_SESSION['UserName']?> &nbsp&nbsp&nbsp</u>
                    </h4>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
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
    var speech = true;
    window.SpeechRecognition = window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;

    recognition.lang = "en-US";
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.addEventListener('result', e => {
        const transcript = Array.from(e.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('')

        document.getElementById("convert_text").innerHTML = transcript;
        console.log(transcript);
        console.log(recognition.lang);
    });
    
    if (speech == true) {
        recognition.start();
    }
  });
</script>
</html>