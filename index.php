<!DOCTYPE html>
<html lang="en">
<?php 
  include 'assets/php/variables.php';
  
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Home
  </title>
  <!-- plugins -->
  <?=$MainPagePlugins?>

</head>

<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content mt-0 mb-2 p-0">
    <span class="mask" style="z-index: -10; background-image: url('http://<?=$Domain?>/assets/img/home_title_bg_v2.jpg'); size: cover; position:fixed;"></span>
    
    <div class="container-fluid p-0">
      <div class="row d-flex justify-content-around mt-7 mx-0 px-2 text-center">
        <div class="col-md-8 col-sm-12 m-4">
          <div class="container mt-0"> 
            <h1 class="mb-3 text-capitalize font-weight-bold">Take the Functional Literacy Test </h1>
            <h3 class="font-weight-normal">
              This is a test on readiness of applicants for the different levels
              in the curriculum of Alternative Learning System in the
              Department of Education. 
            </h3>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-around m-0 p-0">
        <div class="col-lg-10 col-md-10 m-0 p-0">
          <div class="row d-flex justify-content-around my-5 px-3 text-center">
            <div class="col-lg-3 col-md-4 mb-4">
              <div class="card bg-danger py-3">
                <div class="card-header mx-4 p-1 text-center bg-danger">
                  <div class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg mt-2">
                    <i class="fa fa-book text-danger"></i>
                  </div>
                </div>
                <div class="card-body mt-1 p-3 text-center">
                  <h3 class="text-center mb-3 text-white">Modules</h3>
                  <span class="text-md text-white">
                    This contains the learning <br>
                    materials from the respective <br>
                    level of the student.
                  </span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-4 mb-4">
              <div class="card bg-success py-3">
                <div class="card-header mx-4 p-1 text-center bg-success">
                  <div class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg mt-2">
                    <i class="fa fa-user text-success"></i>
                  </div>
                </div>
                <div class="card-body mt-1 p-3 text-center">
                  <h3 class="text-center mb-3 text-white">Profile</h3>
                  <span class="text-md text-white">
                    This contains the <br> 
                    information of student <br>
                    in the ALS.
                  </span>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-4 mb-4">
              <div class="card bg-info py-3">
                <div class="card-header mx-4 p-1 text-center bg-info">
                  <div class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg mt-2">
                    <i class="fa fa-signal text-info"></i>
                  </div>
                </div>
                <div class="card-body mt-1 p-3 text-center">
                  <h3 class="text-center mb-3 text-white">Progress</h3>
                  <span class="text-md text-white">
                    This contains the status <br>
                    of the knowledge and <br>
                    progress of the student.
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

      <!-- <div class="row bg-light d-flex justify-content-center align-items-center position-fixed bottom-0 w-100 px-5"> -->
    
  </main>
  <footer class="footer w-100">
    <div class="row bg-light d-flex justify-content-center px-2 py-0 m-0">
      <div class="col-md-8 col-sm-12 m-0 p-0">
        <img class="w-100 py-4" src="assets/img/logo/deped-als.png" alt="" >
      </div>
    </div>
  </footer>
  
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