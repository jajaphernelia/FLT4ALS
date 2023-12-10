<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Pretest
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content mt-6 pt-3">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-gradient-light opacity-6"></span>
      
    <div class="container-fluid py-7">
      <div class="card card-body gx-4 mb-2 mt-1">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../../assets/img/users/<?=$userProfileIcon?>.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-lg-10 my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?=$_SESSION['StudentName']?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                LRN: <?=$_SESSION['StudentLRN']?>
              </p>

              <!-- User Navigation -->
              <?=$StudentNavigation?>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS1</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS1: Communication Skills (English) <br></p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS1</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS1: Communication Skills (Filipino) <br></p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS2</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS 2: Scientific and Critical Thinking Skills <br></p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS3</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS 3: Mathematical <br> and Problem-solving Skills</p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS4</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS4: Life and Career Skills <br></p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS5</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS5: Understanding the Self and Society <br></p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card">
            <div class="card-header py-2 px-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute p-3">
                <h6 class="text-center text-white">LS6</h6>
              </div>
              <div class="text-end py-2 px-4">
                <p class="text-md mb-0 text-capitalize font-weight-bold">LS6: Digital Citizenship</p>

                <div class="text-center mb-0 p-2">
                <h1 class="font-weight-normal">5/5</h1>
                <h4 class="font-weight-normal">100 avg.</h4>

                </div>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer pt-0 pt-0">
              <p class="mb-0 d-none"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              <button type="button" class="btn btn-sm bg-gradient-primary btn-lg w-100 mt-0 mb-0">Review</button>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer py-4  d-none">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>

      <!-- footer -->
      <?=$PageFooter?>
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
</body>

</html>