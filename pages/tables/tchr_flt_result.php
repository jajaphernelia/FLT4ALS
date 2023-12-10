<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "teacher");
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT Results
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
  <?=$ModalPlugins?>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="">
            <img src="<?=$Long_logo?>" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_Dashboard?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_Student?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">ALS Students</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active bg-secondary text-white" href="<?=$Teacher_FLT_Results?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">bar_chart</i>
            </div>
            <span class="nav-link-text ms-1">FLT Result</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  text-white" href="<?=$Teacher_LS_Modules?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1">Learning Modules</span>
        </a>
        </li>
        <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">FLT Response</h6>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_PIS?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">ALS Student P.I.S</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS1E?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (English)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS1F?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (Filipino)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS2?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS2 Scientific Literacy and Critical Thinking</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS3?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS3 Mathematics and Problem Solving Skills</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS4?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS4 Life & Career</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS5?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS5 Understanding the Self & Society</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_LS6?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1 overflow-hidden">LS6 Digital Citizenship</span>
        </a>
        </li>
    </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="" method="POST">
            <button class="btn bg-gradient-primary mt-4 w-100" type="submit" name="logout">
            <i class="material-icons opacity-10">logout</i>&nbsp&nbsp
                Logout
            </button>
            </form>
        </div>
    </div>
  </aside>
  <main id="mainContainer" class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Teacher</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">FLT Results</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">FLT Results</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <span class="d-sm-inline pl-3 text-md"><?=$_SESSION['UserName']?> (ALS Teacher)</span> &nbsp&nbsp
                <!-- <i class="fa fa-user me-sm-1"></i> -->
                <img src="<?=$Images_Directory?>/users/<?=$_SESSION['UserGender']?>.png" class="ms-1 avatar avatar-xs border-radius-lg" alt="user1">
              </a>
            </li>
            <li class="ms-2 nav-item d-xl-none d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <!-- Teacher Hearder -->
      <?php include '../elements/tchr_header.php'; ?>

        <?php if (isset($_GET['message'])){
          GenerateMessage($_GET['type'], $_GET['message']);
        }?>
      <div class="row mt-0 mt-5 mb-3">
        <div class="col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-none border-radius-lg pt-3 pb-1">
                <h6 class="text-white text-center text-uppercase">Student FLT Pre-test Result</h6>
              </div>
            </div>
            <div class="card-body px-3 pb-2 pt-1 mt-3">
              <div style="max-height:500px;" class="m-0 p-0 overflow-auto">
                <div class="p-0 m-0">
                  <!-- $AdminRealtimeDataLoader -->
                  <div class="table-responsive pt-1 pb-3">
                    <table class="table table-striped align-items-center mb-0">
                        <thead class="bg-success">
                          <tr>
                              <th width="6%" class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                              <th width="20%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">Student</th>
                              <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">Progress</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">PIS</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Eng.</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Fil</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS2</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS3</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS4</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS5</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS6</th>
                              <th width="10%" class="text-center text-white text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">Evaluation</th>
                          </tr>
                        </thead>
                      <tbody id="studentPreTest">
                        <tr>
                          <td colspan="12">
                            <p class="p-1 mb-1 text-center">Loading data...</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-0 mt-5 mb-3">
        <div class="col-12 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-warning shadow-none border-radius-lg pt-3 pb-1">
                <h6 class="text-white text-center text-uppercase">Student FLT Post-test Result</h6>
              </div>
            </div>
            <div class="card-body px-3 pb-2 pt-1 mt-3">
              <div style="max-height:500px;" class="m-0 p-0 overflow-auto">
                <div class="p-0 m-0">
                  <!-- $AdminRealtimeDataLoader -->
                  <div class="table-responsive pt-1 pb-3">
                    <table class="table table-striped align-items-center mb-0">
                        <thead class="bg-success">
                          <tr>
                              <th width="6%" class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                              <th width="20%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">Student</th>
                              <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">Progress</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">PIS</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Eng.</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Fil</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS2</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS3</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS4</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS5</th>
                              <th width="7%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS6</th>
                              <th width="10%" class="text-center text-white text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">Evaluation</th>
                          </tr>
                        </thead>
                      <tbody id="studentPostTest">
                        <tr>
                          <td colspan="12">
                            <p class="p-1 mb-1 text-center">Loading data...</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?=$PageFooter?>
  </main>
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

<?=$PageRealtimeDataLoader?>
<script>
  // loadRealTimeData("allStudentCount", "counts/count_students_all.php", 1);
  // loadRealTimeData("activeStudentCount", "counts/count_students_active.php", 1);

  // loadRealTimeData("allTeacherCount", "counts/count_teachers_all.php", 1);
  // loadRealTimeData("activeTeacherCount", "counts/count_teachers_active.php", 1);

  // loadRealTimeData("allAdminCount", "counts/count_admin_all.php", 1);
  // loadRealTimeData("activeAdminCount", "counts/count_admins_active.php", 1);

  loadRealTimeData("studentPreTest", "real_time_table/table_students_flt_pre_test.php", 2);
  loadRealTimeData("studentPostTest", "real_time_table/table_students_flt_post_test.php", 2);
  // loadRealTimeData("activeAdminTable", "real_time_table/table_admins_active.php", 5);
</script>

</body>

</html>