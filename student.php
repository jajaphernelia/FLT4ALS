<!DOCTYPE html>
<?php 
  include 'assets/php/variables.php';
  include 'assets/php/config.php';
  //include 'assets/php/login_config.php';

  LoggedInRequired($Domain, "student");
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | Student
  </title>
  <!-- plugins -->
  <?=$MainPagePlugins?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->

  <main id="mainContainer" class="main-content mt-6 pt-3">
    <div class="page-header align-items-start min-vh-100">
      
    <div class="container-fluid">
      <!-- Student Hearder -->
      <?php include 'pages/elements/std_header.php'; ?>

      <?php if (isset($_GET['message'])){
        GenerateMessage($_GET['type'], $_GET['message']);
      }?>

      <?php 
      $student_status = GetUserStudentData($conn, $_SESSION['accountID'], "Student Status");
      // echo $student_status;
      if ($student_status == "new"){
          include 'pages/forms/std_pis.php';
      } else {
        include 'pages/documents/std_profile.php';
      }?>
 
  </main>
  <?=$PageFooter?>
  <!--   Core JS Files   -->

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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