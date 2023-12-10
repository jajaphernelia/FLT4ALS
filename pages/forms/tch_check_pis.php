<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "teacher");

  if (isset($_GET['lrn'])){
    $selectedStudent = $_GET['lrn'];

    $studentName = GetStudentData($conn, $selectedStudent, "Name");
  } else {
    $selectedStudent = '----';
    $studentName = '--<i>Select Student</i>--';
  }
  
  $FLTSubjectID = GetFLTSubjectID($conn, $selectedStudent, $ActiveSchoolYearID, 'TPRD-00001', 'PIS ID');
  $FLTSubkectStatus = GetFLTSubjectStatus($conn, 'tbl_flt_pis', 'fpis_id', $FLTSubjectID)

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | ALS Student P.I.S
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>

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
        <a class="nav-link active bg-secondary text-white" href="<?=$Teacher_FLT_PIS?>">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">ALS Student P.I.S</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <span class="d-sm-inline pl-3 text-md"><?=$_SESSION['UserName']?> (ALS Teacher)</span> &nbsp&nbsp
                <img src="../../assets/img/users/<?=$_SESSION['UserGender']?>.png" class="ms-1 avatar avatar-xs border-radius-lg" alt="user1">
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
    <div class="container-fluid py-0 mb-3">
      <div class="row">
        <div class="col-sm-9 mb-xl-0 mb-4">
          <div class="row">
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-md icon-shape bg-gradient-success text-center border-radius-md mt-2 position-absolute">
                    <i class="material-icons opacity-10">school</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-mb mb-0 text-capitalize">ALS Student</p>
                    <h5 class="mb-0 ps-5 mb-4"><?=$studentName?> <br> </h5>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer py-2 tx-3">
                  <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">LRN: </span><?=$selectedStudent?> </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-md icon-shape bg-gradient-warning text-center border-radius-md mt-2 position-absolute">
                    <i class="material-icons opacity-10">date_range</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-mb mb-0 text-capitalize">Current School Year</p>
                    <h5 class="mb-0 ps-5 mb-4">S.Y. <?=$ActiveSchoolYear?></h5>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer py-2 tx-3">
                  <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">Date: </span><?=$CurrentDate?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-md icon-shape bg-gradient-info text-center border-radius-md mt-2 position-absolute">
                    <i class="material-icons opacity-10">book</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-mb mb-0 text-capitalize">Test Part</p>
                    <h5 class="mb-0 ps-5">Personal Information Sheet</h5>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer py-2 tx-3">
                  <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">Test Period: </span><?=$ActiveTestPeriod?></p>
                </div>
              </div>
            </div>
          </div>
          <?php if (isset($_GET['message'])){
            GenerateMessage($_GET['type'], $_GET['message']);
          }?>
          <div class="row">
            <div class="col-sm-12">
              <?php
                $fltTestData = mysqli_query($conn,"SELECT * FROM `tbl_flt_pis` WHERE `fpis_ID` = '$FLTSubjectID'");

                if ($fltTestData->num_rows>0){ 
                while ($flt_data=$fltTestData-> fetch_assoc()){
                  $radioMale = '';
                  $radioFemale = '';
                  $radioCivilStat1 = '';
                  $radioCivilStat2 = '';
                  $radioCivilStat3 = '';
                  $radioCivilStat4 = '';

                  if($flt_data['gender'] == 'Male'){
                    $radioMale = 'checked';
                  } else if($flt_data['gender'] == 'Female'){
                    $radioFemale = 'checked';
                  }
                  
                  if($flt_data['civil_status'] == 'Walang asawa'){
                    $radioCivilStat1 = 'checked';
                  } else if($flt_data['civil_status'] == 'May-asawa'){
                    $radioCivilStat2 = 'checked';
                  } else if($flt_data['civil_status'] == 'Biyudo / Biyuda'){
                    $radioCivilStat3 = 'checked';
                  } else if($flt_data['civil_status'] == 'Hiwalay sa asawa'){
                    $radioCivilStat4 = 'checked';
                  }
                  ?>
                  
              <div class="card my-2 overflow-auto" id="TestContainer">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-12 text-center">
                      <h6 class="mb-0">PERSONAL INFORMATION SHEET</h6>
                      <?php if ($FLTSubkectStatus == 'checked'){ ?>
                        <h6 class="mb-0 text-success">Score: <?=$flt_data['total_score']?>/<?=$flt_data['max_score']?> (<?=DateConverter($flt_data['check_date'], 'F j, Y')?>)</h6>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                
                <div class="card-body px-4 py-2">
                  <form role="form" class="text-start" action="" method="POST">
                      <label class="input-label text-md font-weight-bold">A. Panuto: Sagutan and mga sumusunod na tanong.</label>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['name_score'])?> name="name_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                            1. Ano ang iyong pangalan?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label> 
                        <div class="col-sm-4">
                            <label class="form-label mb-0">Unang Pangalan</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['f_name']?>" name="f_name" class="form-control ml-3">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label mb-0">Gitnang Pangalan</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['m_name']?>" name="m_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label mb-0">Apelyido</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['l_name']?>" name="l_name" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['gender_score'])?> name="gender_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          2. Ano ang iyong kasarian? Lagyan ng tsek (✔) and tamang kahon.
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioMale?> type="radio" value="Male" name="gender" id="gender">
                            <label class="form-label" for="gender">Lalake</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioFemale?> type="radio" value="Female" name="gender" id="gender">
                            <label class="form-label" for="gender">Babae</label>
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['birthdate_score'])?> name="birthdate_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          3. Kailan ka isinilang o ipinanganak?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-4">
                            <label class="form-label mb-0">Buwan</label>
                            <div class="input-group input-group-outline mb-3">
                              <select required class="form-select p-2 border-secondary opacity-5" name="birth_month">
                                  <option value="<?=date_format(date_create($flt_data['birthdate']),"m")?>"><?=date_format(date_create($flt_data['birthdate']),"F")?></option>
                                  <?=$OptionsMonths?>
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label mb-0">Araw</label>
                            <div class="input-group input-group-outline mb-3">
                              <select required class="form-select p-2 border-secondary opacity-5" name="birth_day">
                                  <option value="<?=date_format(date_create($flt_data['birthdate']),"d")?>"><?=date_format(date_create($flt_data['birthdate']),"d")?></option>
                                  <?=$OptionsDays?>
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label mb-0">Taon</label>
                            <div class="input-group input-group-outline mb-3">
                              <select required class="form-select p-2 border-secondary opacity-5" name="birth_year">
                                  <option value="<?=date_format(date_create($flt_data['birthdate']),"Y")?>"><?=date_format(date_create($flt_data['birthdate']),"Y")?></option>
                                  <?=$OptionsYears?>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['adrs_score'])?> name="adrs_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          4. Saan ka nakatira?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Numero ng bahay/kalye</label>
                            <div class="input-group input-group-outline mb-3">
                              <input required type="text" value="<?=$flt_data['adrs_num_st']?>" name="addrss_num" class="form-control ml-3">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Barangay</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['adrs_brgy']?>" name="addrss_brgy" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Lungsod/Bayan</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['adrs_city']?>" name="addrss_city" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Probinsya</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['adrs_province']?>" name="addrss_province" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['religion_score'])?> name="religion_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                            5. Ano ang iyong relihiyon?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Relihiyon</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['religion']?>" name="religion" class="form-control ml-3">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['civil_status_score'])?> name="civil_status_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          6. Ano ang estado mo sa buhay? Lagyan ng tsek (✔) ang tamang kahon.
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-check mb-3">
                            <input class="form-check-input" <?=$radioCivilStat1?> type="radio" value="Walang asawa" name="civil_status" id="civil_status">
                            <label class="form-label" for="civil_status">Walang asawa</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioCivilStat2?> type="radio" value="May-asawa" name="civil_status" id="civil_status">
                            <label class="form-label" for="civil_status">May-asawa</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioCivilStat3?> type="radio" value="Biyudo/Biyuda" name="civil_status" id="civil_status">
                            <label class="form-label" for="civil_status">Biyudo / Biyuda</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioCivilStat4?> type="radio" value="Hiwalay sa asawa" name="civil_status" id="civil_status">
                            <label class="form-label" for="civil_status">Hiwalay sa asawa</label>
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['occupation_score'])?> name="occupation_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          7. Ano ang hanapbuhay/trabaho mo?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group input-group-outline mb-3">
                              <input required type="text" value="<?=$flt_data['occupation']?>" name="occupation" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <div class="form-check form-check-inline sm-3 p-0 m-0">
                            <input class="form-check-input border-danger m-1" <?=CheckBoxIndicator($flt_data['high_educ_score'])?> name="high_educ_score" type="checkbox" value="1">
                          </div>  
                          <p class="mb-0 ms-2">
                          8. Ano ang pinakamataas na antas na natapos mo sa pag-aaral?
                          </p>
                          <label class="form-check-label text-danger ms-2" for="inlineCheckbox1">1pt</label>
                        </label>
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['high_educ']?>" name="high_educ" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                          B. Panuto: Sumulat ng isang talata na binubuo ng dalawa hanggang tatlong pangungusap tungkol sa iyong sarili, gayundin ang mga ambisyon mo.
                          </p>
                        </label>
                        <div class="col-md-12 col-sm-12">
                            <div class="input-group input-group-outline mb-3">
                              <textarea required class="form-control text-md lh-base" name="about_student" rows="5"><?=$flt_data['about_student']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end align-items-top">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="about_student_score">
                            <label class="form-label text-danger">0 pt</label>
                          </div>
                          <div class="form-check">
                            <input checked class="form-check-input" type="radio" value="1" name="about_student_score">
                            <label class="form-label text-danger">1 pt</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="2" name="about_student_score">
                            <label class="form-label text-danger">2 pt</label>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                      <div class="col-md-12 col-sm-12 text-end">
                          <input class="form-control border-danger m-1 d-none" type="text" name="lrn" value="<?=$selectedStudent?>">
                          <button class="btn bg-gradient-success my-2" type="submit" value="<?=$flt_data['fpis_id']?>" name="check_PIS">
                          <i class="material-icons text-sm">check</i>&nbsp&nbsp
                          Submit
                          </button>
                      </div>
                      </div>
                  </form>
                </div>
              </div>
              <?php } } else { ?>
                <div class="alert alert-info alert-dismissible text-white mt-3" role="alert">
                  <span class="text-sm">Please Select Student</span>
                  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              <?php  }?>
            </div>
          </div>
        </div>
        <div class="col-sm-3 p-0">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <div class="row mb-2">
                <div class="col-md-6">
                  <h6 class="mb-0">Student Masterlist</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>S.Y <?=$ActiveSchoolYear?></small>
                </div>
              </div>
            </div>
            <div style="max-height: 1000px; overflow: auto;" class="card-body px-2 py-2" id="activeStudentTable">
              <ul class="list-group">
                <?php
                $List_Student = GetAllStudentFLT($conn, $ActiveSchoolYearID, 'TPRD-00001');
                $student_row_count = 1;
                if ($List_Student->num_rows>0){ 
                    $view_btn = 'd-block';
                while ($row_data=$List_Student-> fetch_assoc()){
                    if ($row_data['PIS Status'] == "checked"){
                    $status_badge = "success";
                    $student_flt_status = $row_data['PIS Total Score'].'/'.$row_data['PIS Max Score'];
                    } else if ($row_data['PIS Status'] == "pending"){
                    $status_badge = "warning";
                    $student_flt_status = $row_data['PIS Total Score'].'/'.$row_data['PIS Max Score'];
                    } else if ( $row_data['PIS Status'] == NULL){
                      $status_badge = "pending";
                      $student_flt_status = $row_data['PIS Total Score'].'/'.$row_data['PIS Max Score'];
                    } else{
                    $status_badge = "secondary";
                    $student_flt_status = "";
                    }?>
                <a href="<?=$Teacher_FLT_PIS?>?lrn=<?=$row_data['LRN']?>" class="border-secondary border-radius-lg">
                  <li class="list-group-item d-flex justify-content-between ps-2 mb-2">
                    <div class="d-flex align-items-center">
                      <img src="../../assets/img/users/<?=$row_data['Gender']?>.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?=$row_data['Student Name']?></h6>
                        <span class="text-xs"><?=$row_data['LRN']?></span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-<?=$status_badge?> text-gradient text-sm font-weight-bold">
                      <?=$student_flt_status?>
                    </div>
                  </li>
                </a>
                <?php $student_row_count++; } } else { 
                        $view_btn = 'd-none'; ?>
                <p class="p-1 mb-1 text-center">
                    No data Recorded
                </p>
                </tr>
                <?php } ?>
              </ul>
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

<?=$RealtimeDataLoader?>
<script>
  // loadRealTimeData("allStudentCount", "counts/count_students_all.php", 1);
  // loadRealTimeData("activeStudentCount", "counts/count_students_active.php", 1);
</script>
<script>
    let container_height = screen.height * 0.63;
    console.log("Avail H: " +container_height);
    document.getElementById("TestContainer").style.height = container_height + "px";
    </script>
</body>

</html>