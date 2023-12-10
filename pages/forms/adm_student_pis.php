<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "admin");

  if (isset($_GET['lrn'])){
    $selectedStudent = $_GET['lrn'];

    $studentName = GetStudentData($conn, $selectedStudent, "Name");
    $studentStatus = GetStudentData($conn, $selectedStudent, "Student Status");
  } else {
    $selectedStudent = '----';
    $studentStatus = '';
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
    FLT4ALS | Student P.I.S
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
  <?=$ModalPlugins?>

</head>

<body class="g-sidenav-show bg-gray-200">
  <!-- Navigation -->
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
          <a class="nav-link text-white" href="<?=$Admin_Dashboard?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          </li>
          <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Users</h6>
          </li>
          <li class="nav-item">
          <a class="nav-link active bg-secondary text-white" href="<?=$Admin_Student_PIS?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i>
              </div>
              <span class="nav-link-text ms-1 overflow-hidden">ALS Students</span>
          </a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-white" href="<?=$Admin_Employee_Data?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1 overflow-hidden">Teacher and Admins</span>
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">ALS Students</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">ALS Students</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <span class="d-sm-inline pl-3 text-md"><?=$_SESSION['UserName']?> (Admin)</span> &nbsp&nbsp
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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-sm-9 mb-xl-0 mb-4">
          <div class="row">
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">date_range</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-mb mb-0 text-capitalize">Current School Year</p>
                        <h4 class="mb-0">S.Y. <?=$ActiveSchoolYear?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3 d-flex justify-content-between">
                    <p class="mb-0"><span class="text-secondary text-mb font-weight-bolder">Date: </span><?=$CurrentDate?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2 pb-0">
                  <div class="icon icon-md icon-shape bg-gradient-success text-center border-radius-md mt-2 position-absolute">
                    <i class="material-icons opacity-10">school</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-mb mb-0 text-capitalize">ALS Student</p>
                    <h4 class="mb-0 ps-5"><?=$studentName?> <br> </h4>
                    <p class="m-0 text-uppercase text-sm font-weight-bolder"><?=$studentStatus?> ALS student</p>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer py-3 px-3 tx-3 d-flex justify-content-between align-items-center">
                  <p class="mb-0 text-sm"><span class="text-secondary text-mb font-weight-bolder">LRN: </span><?=$selectedStudent?> </p>
                  
                    
                  <button class="btn btn-outline-warning btn-sm modal-btn m-0 p-1" 
                      type="button" 
                      onclick="open_page('reset_pass', <?=$selectedStudent?>)">
                      <i class="material-icons text-sm position-relative mx-1">manage_accounts</i>  
                      Account Settings
                    </button>
                </div>
              </div>
            </div>
            <div class="col-xl-4 mb-2">
              <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">school</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-mb mb-0 text-capitalize">Active Student</p>
                    <h4 class="mb-0"><?=$Count_ActiveStudent?> Active</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-mb font-weight-bolder" id="allStudentCount"><?=$Count_AllStudent?></span> Registered Student/s</p>
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
                      <h4 class="mb-0">PERSONAL INFORMATION SHEET</h4>
                    </div>
                  </div>
                </div>
                
                <div class="card-body px-4 py-2">
                  <form role="form" class="text-start" action="" method="POST">
                      <div class="row mt-3">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">Student Name</p>
                        </label> 
                        <div class="col-sm-4">
                            <label class="form-label mb-0">First Name</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['f_name']?>" name="f_name" class="form-control ml-3">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label mb-0">Midddle Name</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['m_name']?>" name="m_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label mb-0">Last Name</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['l_name']?>" name="l_name" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                            Gender
                          </p>
                        </label>
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioMale?> type="radio" value="Male" name="gender" id="gender">
                            <label class="form-label" for="gender">Male</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                            <input required class="form-check-input" <?=$radioFemale?> type="radio" value="Female" name="gender" id="gender">
                            <label class="form-label" for="gender">Female</label>
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                            Birthday
                          </p>
                        </label>
                        <div class="col-4">
                            <label class="form-label mb-0">Month</label>
                            <div class="input-group input-group-outline mb-3">
                              <select required class="form-select p-2 border-secondary opacity-5" name="birth_month">
                                  <option value="<?=date_format(date_create($flt_data['birthdate']),"m")?>"><?=date_format(date_create($flt_data['birthdate']),"F")?></option>
                                  <?=$OptionsMonths?>
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label mb-0">Day</label>
                            <div class="input-group input-group-outline mb-3">
                              <select required class="form-select p-2 border-secondary opacity-5" name="birth_day">
                                  <option value="<?=date_format(date_create($flt_data['birthdate']),"d")?>"><?=date_format(date_create($flt_data['birthdate']),"d")?></option>
                                  <?=$OptionsDays?>
                              </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label mb-0">Year</label>
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
                          <p class="mb-0">
                            Address
                          </p>
                        </label>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">House Number / Street</label>
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
                            <label class="form-label mb-0">City</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['adrs_city']?>" name="addrss_city" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label mb-0">Province</label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['adrs_province']?>" name="addrss_province" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top"> 
                          <p class="mb-0">
                            Religion
                          </p>
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['religion']?>" name="religion" class="form-control ml-3">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                            Civil Status
                          </p>
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
                        <div class="col-md-6 col-sm-12">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                            Occupation
                          </p>
                        </label>
                            <div class="input-group input-group-outline mb-3">
                              <input required type="text" value="<?=$flt_data['occupation']?>" name="occupation" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                        <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                          <p class="mb-0">
                            Highest Education Attainment
                          </p>
                        </label>
                            <div class="input-group input-group-outline mb-3">
                            <input required type="text" value="<?=$flt_data['high_educ']?>" name="high_educ" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                      <div class="col-md-12 col-sm-12 text-end">
                        <input class="form-control border-danger m-1 d-none" type="text" name="lrn" value="<?=$selectedStudent?>">
                        <button class="btn bg-gradient-success my-2" type="submit" value="<?=$flt_data['fpis_id']?>" name="update_student_data">
                          <i class="material-icons text-sm me-2">check</i> Submit
                        </button>
                      </div>
                      </div>
                  </form>
                </div>
              </div>

              
              <?php } } else if (!isset($_GET['lrn'])) { ?>
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
              <div class="row mb-2 d-flex align-items-center">
                <div class="col-md-6">
                  <h6 class="mb-0">Student Masterlist</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <button class="btn btn-outline-success btn-sm mb-0 modal-btn" data-toggle="modal" data-target="#Modal_AddStudent">
                    <i class="material-icons text-sm position-relative me-1">school</i>  Add Student
                  </button>
                </div>
              </div>
            </div>
            <div style="max-height: 1000px; overflow: auto;" class="card-body px-2 py-2" id="activeStudentTable">
              <ul class="list-group">
                <?php
                if ($AdminList_AllStudent->num_rows>0){ 
                while ($row_data=$AdminList_AllStudent-> fetch_assoc()){
                    if ($row_data['Account Status'] == "active"){
                      $status_badge = "success";
                    } else if ($row_data['Account Status'] == "new"){
                    $status_badge = "warning";
                    } else{
                    $status_badge = "secondary";
                    }?>
                <a href="<?=$Admin_Student_PIS?>?lrn=<?=$row_data['LRN']?>" class="border-secondary border-radius-lg">
                  <li class="list-group-item d-flex justify-content-between align-items-center ps-2 mb-2">
                    <div class="d-flex align-items-center">
                      <img src="../../assets/img/users/<?=$row_data['Gender']?>.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?=$row_data['Name_2']?></h6>
                        <span class="text-xs"><?=$row_data['LRN']?></span>
                      </div>
                    </div>
                    <div style="width: 60px;" class="text-<?=$status_badge?> text-uppercase text-sm d-flex justify-content-end  align-items-center">
                      <?=$row_data['Account Status']?>
                    </div>
                  </li>
                </a>
                <?php } } else { ?>
                  <p class="p-1 mb-1 text-center">
                      No data Recorded
                  </p>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?=$PageFooter?>
  </main>
<!-- Modal -->
<div class="modal fade" id="Modal_AddStudent" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content p-3">
        <div class="card-header pb-0">
          <h4 class="font-weight-bolder">Register New Student</h4>
          <p class="mb-0">Enter student details and student account to register</p>
        </div>
        <form role="form" class="text-start" action="" method="POST">
          <div class="card-body">
            <label class="input-label">Student Details</label>
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">First Name</label>
                  <input type="text" name="f_name" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Middle Name</label>
                  <input type="text" name="m_name" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Last Name</label>
                  <input type="text" name="l_name" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-0">
                  <label class="form-label">LRN</label>
                  <input type="number" onchange="lrnValidation(this.value)" pattern="[1-11]{1}[0-11]{11}" name="lrn" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <span class="text-sm text-danger mb-0" id="lrnWarning"></span>
              </div>
            </div>
            <label class="input-label mt-4">Student Account</label>
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer p-0 pt-2">
            <button id="createStudentBtn" class="btn bg-gradient-success my-2" type="submit" name="add_NewStudent">Create</button>
            <button type="button" class="btn bg-gradient-secondary my-2" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
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
  let container_height = screen.height * 0.6;
  console.log("Avail H: " +container_height);
  document.getElementById("TestContainer").style.height = container_height + "px";
</script>

<script>
  function open_page(targetPage, LRN) {
    if (targetPage == 'flt_lss'){ 
      window.open("<?=$Admin_Student_Reset_Pass?>?lrn="+LRN
      , "_blank"
      , "toolbar=no,scrollbars=yes,resizable=yes,top=10,left=500,width=1000,height=1000");

    } else if (targetPage == 'reset_pass'){ 
      window.open("<?=$Admin_Student_Reset_Pass?>?lrn="+LRN
      , "_blank"
      , "toolbar=no,scrollbars=yes,resizable=yes,top=10,left=500,width=800,height=500");
    }
  }
</script>

<script>
  function lrnValidation(input) {
      if (input.length > 12 || input.length < 12) {
        document.getElementById("lrnWarning").innerHTML = "Invalid LRN. LRN must be  composed of 12 digit characters";
        document.getElementById("createStudentBtn").disabled = true;
      } else {
        document.getElementById("lrnWarning").innerHTML = "";
        document.getElementById("createStudentBtn").disabled = false;
      }
  }

</script>
</body>

</html>