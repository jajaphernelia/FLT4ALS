<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");
  $studentLRN = $_SESSION['StudentLRN'];

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Assessments
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content mt-6 pt-3">
    <div class="page-header align-items-start min-vh-100">
    <div class="container-fluid">
      <!-- Student Hearder -->
      <?php include '../../pages/elements/std_header.php'; ?>
      <?php 
        $closeTestPeriod = GetCloseTestPeriodID($conn);
        $StudentFLTScore = GetUserStudentFLTScore($conn, $ActiveSchoolYearID, 'TPRD-00001', $studentLRN);
        $lock_Post_test = 'd-none';
        $lock_Pre_test = 'd-none';
        $PIS_warning = 'd-none';

        $student_status = GetUserStudentData($conn, $_SESSION['accountID'], "Student Status");
        if ($student_status == "new"){
          $PIS_warning = '';
        } else {
          $PIS_warning = 'd-none';
        }

        if ($closeTestPeriod == 'close'){
          $btn_Post_test = 'd-none';
          $btn_Pre_test = 'd-none';
          $lock_Post_test = '';      
          $lock_Pre_test = '';

        } else if ($StudentFLTScore->num_rows>0){
          if ($ActiveTestPeriod == 'Pre-test'){ 
            $btn_Post_test = 'd-none';
            $lock_Post_test = '';
          } else if ($ActiveTestPeriod == 'Closed'){ 
            $btn_Post_test = 'd-none';
            $btn_Pre_test = 'd-none';
            $lock_Post_test = '';      
            $lock_Pre_test = '';
          } 

        } else {
          $btn_Post_test = 'd-none';
          $btn_Pre_test = 'd-none';
          $lock_Post_test = '';      
          $lock_Pre_test = '';
        }
      ?>

      <div class="row mb-2 d-flex justify-content-center">
        <div class="col-md-9 col-sm-12 p-0">
          <div class="p-4 text-center">
            <h2 class="mb-3 text-capitalize font-weight-bold">Functional Literacy Test</h2>
            <p class="text-lg">
              The Functional Literacy Test (FLT) assesses preparedness for the learning strands of ALS K-12 BEC Curriculum. 
              It includes measures of ability to supply personal information and prior knowledge of the six learning strands: 
              Communication Skills- English and Filipino, Scientific Literacy and Critical Thinking Skills, Mathematical and 
              Problem Solving Skills, Life and Career Skills, Understanding the Self and Society, and Digital Citizenship.
            </p>
            <p class="<?=$PIS_warning?> text-lg text-danger m-0"> 
              Please answer the <a href="<?=$Student_Profile?>" class="text-danger"><u>Personal Information Sheet</u></a> first
            </p>
          </div>
        </div>
      </div>
      
      

      <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-sm-12 mb-5">
          <div class="card p-5 h-100">
            <div class="card-header p-0 d-flex justify-content-start align-items-center mb-3">
              <img src="<?=$Circle_logo?>" alt="logo" height="60px">
              <h3 class="ms-2 mb-0 text-capitalize font-weight-bold">FLT Pre-test </h3>
            </div>
            <div class="card-body p-0">
              <p class="text-md text-justify">
                The Functional Literacy Test (FLT) assesses preparedness for the learning strands of ALS K-12 BEC Curriculum. 
                It includes measures of ability to supply personal information and prior knowledge of the six learning strands: 
                Communication Skills- English and Filipino, Scientific Literacy and Critical Thinking Skills, Mathematical and 
                Problem Solving Skills, Life and Career Skills, Understanding the Self and Society, and Digital Citizenship.
              </p>
            </div>
            
            <form role="form" class="text-start" action="../../assets/php/config.php" method="POST">
              <div class="card-footer p-0 text-end d-flex justify-content-end">
                <button type="submit" name="open_flt_score_board" value="TPRD-00001" class="<?=$btn_Pre_test?> btn bg-gradient-info btn-md mb-0 d-flex align-items-center">
                  <i class="material-icons text-sm">play_arrow</i> &nbsp Start
                </button>
                <button type="button" disabled class="<?=$lock_Pre_test?> btn btn-md mb-0 d-flex align-items-center">
                  <i class="material-icons text-sm">https</i> &nbsp Not yet Available
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-xl-5 col-sm-12 mb-5">
          <div class="card p-5 h-100">
            <div class="card-header p-0 d-flex justify-content-start align-items-center mb-3">
              <img src="<?=$Circle_logo?>" alt="logo" height="60px">
              <h3 class="ms-2 mb-0 text-capitalize font-weight-bold">FLT Post-test </h3>
            </div>
            <div class="card-body p-0">
              <p class="text-md text-justify">
                To evaluate the level of reading and writing proficiency of ALS students, the FLT post-test is created and given 
                at the end of the class year using the same material as the pre-test. The lessons that are already understood, 
                or "prior learning," are identified, allowing the teacher to plan learning interventions based on the individual 
                student's areas of weakness.
              </p>
            </div>
            <form role="form" class="text-start" action="../../assets/php/config.php" method="POST">
                <div class="card-footer p-0 text-end d-flex justify-content-end">
                <button type="submit" name="open_flt_score_board" value="TPRD-00002" class="<?=$btn_Post_test?> btn bg-gradient-info btn-md mb-0 d-flex align-items-center">
                  <i class="material-icons text-sm">play_arrow</i> &nbsp Start
                </button>
                <button type="button" disabled class="<?=$lock_Post_test?> btn btn-md mb-0 d-flex align-items-center">
                  <i class="material-icons text-sm">https</i> &nbsp Not yet Available
                </button>
              </div>
          </form>
          </div>
        </div>
      </div>

    </div>
    </div>
    <!-- footer -->
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
  <script>
    function openPage(targetPage) {
      if (targetPage == 'pre_test'){
        window.open("<?=$Student_Assessment_Score_Board.'?TP=TPRD-00001'?>", "_self");
      } else if (targetPage == 'post_test'){
        window.open("<?=$Student_Assessment_Score_Board.'?TP=TPRD-00002'?>", "_self");
      } 
    }
  </script>
</body>

</html>