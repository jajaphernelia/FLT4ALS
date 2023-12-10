<!DOCTYPE html>
<?php 
  include 'assets/php/variables.php';
  include 'assets/php/login_config.php';
  // include 'assets/php/functions.php';

  // CheckLoginAccount($Domain);
  // LoggedInRequired($Domain);

  // if ($_SESSION['userID'] != NULL && $_SESSION['userType'] = "student"){
  //     header('Location: http://'.$Domain.'/student.php');
  // } else if ($_SESSION['userID'] != NULL && $_SESSION['userType'] = "admin"){
  //     header('Location: http://'.$Domain.'/admin.php');
  // } 
?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Login
  </title>
  <!-- plugins -->
  <?=$MainPagePlugins?>
</head>

<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('http://<?=$Domain?>/assets/img/manila-high.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">F L T 4 A L S</h4>
                  
                  <!-- icons -->
                  <div class="row mt-3 d-none">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input required type="text" name="username" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input required type="password" name="password" class="form-control">
                  </div>

                  <?php if (isset($_GET['message'])){?>
                    <p class="text-sm mb-0 text-center text-<?=$_GET['type']?>">
                      <?=$_GET['message'];?>
                    </p>
                  <?php } ?>
                  
                  <!-- remember toggle -->
                  <div class="form-check form-switch d-flex align-items-center mb-3 d-none">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>

                  <div class="text-center">
                    <button class="btn bg-gradient-primary w-100 my-4 mb-2"  type="submit" name="login">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
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