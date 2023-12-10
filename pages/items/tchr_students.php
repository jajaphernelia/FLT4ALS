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
    FLT4ALS | Students
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
  <?=$ModalPlugins?>

</head>

<body class="g-sidenav-show bg-gray-200">
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
        <a class="nav-link active bg-secondary text-white" href="<?=$Teacher_Student?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">ALS Students</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="<?=$Teacher_FLT_Results?>">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Students</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Students</h6>
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
      <div class="row mt-0 mt-3 mb-3">
        <?php
          if ($List_AllStudent->num_rows>0){ 
            while ($std=$List_AllStudent-> fetch_assoc()){
              $std_pis_buttons = '';
              $std_fls_buttons = '';
              if ($std['Student Status'] == 'active'){
                $bdg_color = 'success';
              } else if ($std['Student Status'] == 'new'){
                $bdg_color = 'warning';
              }
              $alsLevel = NullDBValueHandler(
                GetUserStudentFLTData($conn, $std['LRN'], $ActiveSchoolYearID, 'TPRD-00001', 'Learning Level')
                , 'Pending'
              );
              if ($alsLevel == 'Lower Elementary (Grade 2-3)'){
                $als_color = 'danger';
              } else if ($alsLevel == 'Lower Elementary (Grade 2-3)'){
                $als_color = 'warning';
              } else if ($alsLevel == 'Pending'){
                $als_color = 'warning';
                $std_pis_buttons = 'disabled';
                $std_fls_buttons = 'disabled';
              } else if ($alsLevel == 'Advance Elementary (Grade 4-6)'){
                $als_color = 'success';
              } else if ($alsLevel == 'Junior H.S. (Grade 7-10)'){
                $als_color = 'info';
              } else {
                $als_color = 'secondary';
              }
              
              $fltEval = NullDBValueHandler(
                GetUserStudentFLTData($conn, $std['LRN'], $ActiveSchoolYearID, 'TPRD-00002', 'Learning Level')
                , 'Pending'
              );
              if ($fltEval == 'Lower Elementary (Grade 2-3)'){
                $flt_color = 'danger';
              } else if ($fltEval == 'Lower Elementary (Grade 2-3)'){
                $flt_color = 'warning';
              } else if ($fltEval == 'Pending'){
                $als_color = 'warning';
                $std_fls_buttons = 'disabled';
              } else if ($fltEval == 'Advance Elementary (Grade 4-6)'){
                $flt_color = 'success';
              } else if ($fltEval == 'Junior H.S. (Grade 7-10)'){
                $flt_color = 'info';
              } else {
                $flt_color = 'secondary';
              }
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-auto">
                      <div class="avatar avatar-xl position-relative">
                        <img src="http://<?=$Domain?>/assets/img/users/<?=$std['Gender']?>.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                      </div>
                      <span class="d-block badge badge-sm bg-gradient-<?=$bdg_color?>">
                        <?=$std['Student Status']?>
                      </span>
                  </div>
                  <div class="col-9">
                    <div class="">
                      <h5 class="mb-1">
                        <?=$std['Name']?>
                      </h5>
                      <p class="mb-0 text-mb text-<?=$als_color?> font-weight-bold text-capitalize">
                        ALS Level: <?=$alsLevel?>
                      </p>
                      <p class="mb-0 text-mb text-<?=$flt_color?> font-weight-bold text-capitalize">
                        FLT Result: <?=$fltEval?>
                      </p>
                      <p class="mb-0 text-mb text-capitalize">
                        LRN: <?=$std['LRN']?>
                      </p>
                      
                      <button class="btn btn-outline-secondary text-secondary btn-sm mb-0 py-1 px-2 text-font-weight-normal" 
                        type="button" 
                        onclick="open_page('reset_pass', <?=$std['LRN']?>)">
                        <i class="material-icons text-sm position-relative me-1">manage_accounts</i>  
                        Account Settings
                      </button>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="card-footer px-3 pt-0 pb-3">
              <hr class="mt-0 pt-0">
              <form role="form" class="d-flex justify-content-between" action="" method="POST">
                <button <?=$std_fls_buttons?> class="btn btn-outline-success text-success btn-sm mb-0 text-font-weight-normal" 
                  type="button" 
                  onclick="open_page('flt_lss', <?=$std['LRN']?>)">
                  <i class="material-icons text-sm position-relative me-1">grade</i>  
                  FLT Learner Score Sheet
                </button>
                <button <?=$std_pis_buttons?> class="btn btn-outline-info btn-sm mb-0 py-1 px-2" type="submit" name="view_pis" value="<?=$std['LRN']?>">View P.I.S</button>
              </form>
            </div>
          </div>
        </div>
        <?php } } ?>
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

<script>
  function open_page(targetPage, LRN) {
    if (targetPage == 'flt_lss'){ 
      window.open("<?=$Teacher_FLT_LSS?>?lrn="+LRN
      , "_blank"
      , "toolbar=no,scrollbars=yes,resizable=yes,top=10,left=500,width=1000,height=1000");

    } else if (targetPage == 'reset_pass'){ 
      window.open("<?=$Admin_Student_Reset_Pass?>?lrn="+LRN
      , "_blank"
      , "toolbar=no,scrollbars=yes,resizable=yes,top=10,left=500,width=800,height=500");
    }
  }
</script>
</body>

</html>