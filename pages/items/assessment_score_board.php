<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");

  $TestPeriodID = '';
  if (isset($_GET['TP'])){
    $TestPeriodID = $_GET['TP'];
  }

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

<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content">
    <div class="page-header align-items-start min-vh-100">
      <!-- <span class="mask bg-gradient-light opacity-6"></span> -->
    <div class="container-fluid pb-7 mt-6 pt-3">
      <!-- Student Hearder -->
      <?php include '../../pages/elements/std_header.php'; ?>
      
      
      <?php if (isset($_GET['message'])){
        GenerateMessage($_GET['type'], $_GET['message']);
      }?>
      <?php 
      include '../../assets/php/real_time_elements/std_flt_scores.php'; 
      ?>

      <div id="student_scores"></div>
      

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
      if (targetPage == 'ls1e_form'){
        window.open("<?=$Student_FLT_LS1E?>", "_self");
      } else if (targetPage == 'ls1e_answer'){
        window.open("<?=$Student_Review_LS1E.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls1f_form'){
        window.open("<?=$Student_FLT_LS1F?>", "_self");
      } else if (targetPage == 'ls1f_answer'){
        window.open("<?=$Student_Review_LS1F.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls2_form'){
        window.open("<?=$Student_FLT_LS2?>", "_self");
      } else if (targetPage == 'ls2_answer'){
        window.open("<?=$Student_Review_LS2.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls3_form'){
        window.open("<?=$Student_FLT_LS3?>", "_self");
      } else if (targetPage == 'ls3_answer'){
        window.open("<?=$Student_Review_LS3.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls4_form'){
        window.open("<?=$Student_FLT_LS4?>", "_self");
      } else if (targetPage == 'ls4_answer'){
        window.open("<?=$Student_Review_LS4.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls5_form'){
        window.open("<?=$Student_FLT_LS5?>", "_self");
      } else if (targetPage == 'ls5_answer'){
        window.open("<?=$Student_Review_LS5.'?TP='.$TestPeriodID?>", "_self");
      } else if (targetPage == 'ls6_form'){
        window.open("<?=$Student_FLT_LS6?>", "_self");
      } else if (targetPage == 'ls6_answer'){
        window.open("<?=$Student_Review_LS6.'?TP='.$TestPeriodID?>", "_self");
      }
    }
  </script>
  
  <?=$PageRealtimeDataLoader?>
  
  <script>
    // loadRealTimeData("student_scores", "real_time_elements/std_flt_scores.php?TP="+"<?=$TestPeriodID?>", 2);
  </script>
</body>

</html>