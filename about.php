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
    FLT4ALS | About
  </title>
  <!-- plugins -->
  <?=$MainPagePlugins?>
</head>

<style>
  #page_header{
    background-image: url('http://<?=$Domain?>/assets/img/about_title_bg.jpg'); 
    background-size: cover; 
    position: relative;
  }

</style>
<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main m-0 p-0">
    <div class="container-fluid p-0 m-0">
      <div id="page_header" class="row d-flex justify-content-around mt-0 mx-0 pt-7 pb-4 text-center">
        <div class="col-md-8 col-sm-12 m-4">
          <div class="container mt-0"> 
            <h1 class="mb-3 text-capitalize font-weight-bold">Function Literacy Test for Alternative Learning System</h1>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center m-0 py-5">
        <div class="col-lg-5 col-md-10 m-0 mb-2 p-0">
          <div class="row my-1 px-3 text-center mx-0">
            <div class="col-lg-11 col-md-12">
              <h4 class="font-weight-normal text-start">
                FLT4ALS is an online platform that has been developed with the aim of supporting ALS 
                (Alternative Learning System) students and educators. Our mission is to provide a comprehensive 
                and easily accessible online learning resource that complements the face-to-face teaching and learning interventions.
                <br><br>
                Our website is dedicated to providing high-quality online learning materials that are specifically 
                designed to meet the needs of ALS students and educators. We understand the importance of structured 
                learning approaches, and we encourage educators to use our materials as a supplement to their existing programs.
              </h4>
            </div>
          </div>
        </div>
        
        <div class="col-lg-5 col-md-10 m-0 mb-2 p-0">
          <div class="row my-1 px-3 text-center mx-0">
            <div class="col-lg-11 col-md-12">
              <h4 class="font-weight-normal text-start">
                FLT4ALS is committed to ensuring the continuity of ALS Program delivery by providing a wide range of 
                resources that cover various subjects, including mathematics, science, social studies, and language. 
                Our online platform is user-friendly and accessible to learners of all ages and skill levels.
                <br><br>
                We are passionate about education and are dedicated to providing a high-quality learning experience for 
                all ALS students and educators. Whether you are a student who wants to improve your knowledge and skills 
                or an educator who wants to enhance your teaching methods, FLT4ALS has something for you. Join us today 
                and start your journey towards a brighter future!
            </h4>
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