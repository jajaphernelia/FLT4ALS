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
  $stdFLTSubjectID = GetFLTSubjectID($conn, $selectedStudent, $ActiveSchoolYearID, $ActiveTestPeriodID, 'LS1F ID');
  $FLTSubjectStatus = GetFLTSubjectStatus($conn, 'tbl_flt_ls1_fil', 'fls1f_id', $stdFLTSubjectID)
  

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | Student LS1 Filipino
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
        <a class="nav-link active bg-secondary text-white" href="<?=$Teacher_FLT_LS1F?>">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Student LS1 Filipino</li>
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
                    <h5 class="mb-0 ps-5">LS1 Communication Skills (Filipino)</h5>
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
                $Student_FLT = GetFLTAnswers($conn, 'tbl_flt_ls1_fil', 'fls1f_id', $stdFLTSubjectID);
                if ($Student_FLT->num_rows>0){ 
                while ($row_data=$Student_FLT-> fetch_assoc()){ 
                  $initial_score = 
                    $row_data['q1_score']
                    + $row_data['q2_score']
                    + $row_data['q3_score'];?>
              <div class="card my-2 overflow-auto" id="TestContainer">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-12 text-center">
                      <h6 class="mb-0 text-secondary text-uppercase">LS1 Communication Skills (Filipino)</h6>
                      <?php if ($FLTSubjectStatus == 'checked'){ ?>
                        <h6 class="mb-0 text-success">Score: <?=$row_data['total_score']?>/<?=$row_data['max_score']?> (<?=DateConverter($row_data['check_date'], 'F j, Y')?>)</h6>
                      <?php } else if ($FLTSubjectStatus == 'pending'){ ?>
                        <h6 class="mb-0 text-warning">Initial Score: <?=$row_data['total_score']?>/<?=$row_data['max_score']?> (<?=DateConverter($row_data['date_ans'], 'F j, Y')?>)</h6>
                      <?php }?>
                    </div>
                  </div>
                </div>
                
                <div class="card-body px-4 py-2">
                  <form role="form" class="text-start" action="../../assets/php/config.php" method="POST">
                    <label class="input-label text-md font-weight-bold">
                      Part I. Pagbasa <br>
                      Panuto: Basahin ang bawat aytem. Bilugan ang titik ng tamang sagot sa sagutang papel para sa LS1 Filipino.
                    </label>

                    <div class="row mt-3">
                      <label class="input-label text-md">1. Basahin ang sitwasyon at piliin ang tamang sagot na nagpapakita ng magalang na pananalita.
                        <?=CorrectAnswerIndicator($row_data['q1_answer'],'C')?>
                      </label>
                      <span class="px-5 mb-2">
                        <p class="border border-secondary py-2 px-4 m-0 text-justify">
                        &nbsp&nbsp&nbsp&nbsp&nbsp Nais mong pumasok sa learning center ngunit ang iyong 
                        guro at ang kanyang kausap ay nasa pintuan. Ano ang iyong sasabihin sa kanila?
                        </p>
                      </span>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="A" name="q1_std_ans">
                          <label class="form-label">A. Tumabi po kayo.</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="B" name="q1_std_ans">
                          <label class="form-label">B. Tumabi po kayo. </label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="C" name="q1_std_ans">
                          <label class="form-label">C. Makikiraan po. </label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="D" name="q1_std_ans">
                          <label class="form-label">D. Pwede bang dumaan? </label>
                          </div>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <label class="input-label text-md">2. Alin sa mga sumusunod na pangungusap ang may tamang bantas?
                        <?=CorrectAnswerIndicator($row_data['q2_answer'],'C')?>
                      </label>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="A" name="q2_std_ans">
                          <label class="form-label">A. Ang Araw ng Kalayaan ay ipinagdiriwang tuwing Hunyo 12?</label>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="B" name="q2_std_ans">
                          <label class="form-label">B. Dadalo ka ba sa pagpupulong ngayong Huwebes. </label>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="C" name="q2_std_ans">
                          <label class="form-label">C. Naku, may sunog! </label>
                          </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="D" name="q2_std_ans">
                          <label class="form-label">D. "Ang mga bata ay masayang naglalaro," </label>
                          </div>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <label class="input-label text-md">3. Basahin ang pangungusap at piliin ang pares ng mga salitang magkasalungat ang kahulugan.
                        <?=CorrectAnswerIndicator($row_data['q3_answer'],'D')?>
                      </label>
                      <span class="px-5 mb-2">
                        <p class="border border-secondary py-2 px-4 m-0 text-justify">
                          &nbsp&nbsp&nbsp&nbsp&nbsp Nakalulungkot isipin na sa mata ng batas, nakalalamang ang mayamang 
                          may pantustos sa mga tagapagtanggol kaysa sa maralitang kahit pangkain ay wala.
                        </p>
                      </span>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="A" name="q3_std_ans">
                          <label class="form-label">A. Nakalalamang - Nakalulungkot</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="B" name="q3_std_ans">
                          <label class="form-label">B. Tagapagtanggol – Batas</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="C" name="q3_std_ans">
                          <label class="form-label">C. Pantustos Pangkain</label>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                          <div class="form-check">
                          <input disabled class="form-check-input" type="radio" value="D" name="q3_std_ans">
                          <label class="form-label">D. Mayaman Maralita</label>
                          </div>
                      </div>
                    </div>

                    <hr>

                    <label class="input-label text-md font-weight-bold">
                      Part II. Pagsulat<br>
                      Panuto: Basahin ang aytem. Ilagay ang sagot sa nakalaang patlang sa ibaba ng tanong.
                    </label>

                    <div class="row mt-1">
                      <label class="input-label text-md">
                        4. Ilagay sa patlang ang baybay sa Filipino ng salitang hiram na "<u>computer</u>".
                      </label>
                      <div class="col-md-12 col-sm-12 px-4">
                        <div class="input-group input-group-outline mb-2">
                          <textarea style="resize: none;" readonly class="form-control text-info" name="q4_std_ans" rows="2"><?=$row_data['q4_answer']?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 d-flex justify-content-end align-items-top">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="0" name="q4_score">
                          <label class="form-label text-danger">0 pt</label>
                        </div>
                        <div class="form-check">
                          <input checked class="form-check-input" type="radio" value="1" name="q4_score">
                          <label class="form-label text-danger">1 pt</label>
                        </div>
                      </div>
                    </div>
                    
                    <hr>

                    <label class="input-label text-md font-weight-bold">
                      Part III. Pakikinig/Pagsasalita <br>
                    </label>
                    <div class="row mt-1">
                      <label class="input-label text-md">
                        5. Pakinggan mo ang aking isasalaysay na sitwasyon at sagutin nang malinaw ang kasunod na tanong. (2 points)
                      </label>
                      <span class="px-5 mb-2">
                        <p class="border border-secondary py-2 px-4 m-0 text-justify">
                          &nbsp&nbsp&nbsp&nbsp&nbsp Habang ikaw ay naglalakad papunta sa plaza para maglaro, 
                          nakita mo ang iyong kaibigan na naglilinis ng kanilang bakuran. 
                          Ano ang iyong gagawin? Ibigay ang iyong sagot sa 2 o 3 pangungusap.
                        </p>
                      </span>
                      <div class="col-md-12 col-sm-12 px-4">
                        <div class="input-group input-group-outline">
                          <textarea style="resize: none;" readonly class="form-control text-info" name="q5_std_ans" rows="3" id="convert_text"><?=$row_data['q5_answer']?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 d-flex justify-content-end align-items-top">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="0" name="q5_score">
                          <label class="form-label text-danger">0 pt</label>
                        </div>
                        <div class="form-check">
                          <input checked class="form-check-input" type="radio" value="1" name="q5_score">
                          <label class="form-label text-danger">1 pt</label>
                        </div>
                        <div class="form-check">
                          <input checked class="form-check-input" type="radio" value="2" name="q5_score">
                          <label class="form-label text-danger">2 pts</label>
                        </div>
                      </div>
                    </div>

                    <!-- Submit Panel -->
                    <div class="row mt-2">
                      <input type="text" class="d-none" value="<?=$initial_score?>" name="initial_score">
                      <input type="text" class="d-none" value="<?=$selectedStudent?>" name="student">
                      <div class="col-md-12 col-sm-12 text-end">
                          <button class="btn bg-gradient-success my-2" type="submit" value="<?=$stdFLTSubjectID?>" name="check_LS1F">
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
                $List_Student = GetAllStudentFLT($conn, $ActiveSchoolYearID, $ActiveTestPeriodID);
                $student_row_count = 1;
                if ($List_Student->num_rows>0){ 
                    $view_btn = 'd-block';
                while ($row_data=$List_Student-> fetch_assoc()){
                    if ($row_data['LS1F Status'] == "checked"){
                    $status_badge = "success";
                    $student_flt_status = $row_data['LS1F Total Score'].'/'.$row_data['LS1F Max Score'];
                    } else if ($row_data['LS1F Status'] == "pending"){
                    $status_badge = "warning";
                    $student_flt_status = $row_data['LS1F Total Score'].'/'.$row_data['LS1F Max Score'];
                    } else if ( $row_data['LS1F Status'] == NULL){
                      $status_badge = "info";
                      $student_flt_status = 'pending';
                    } else{
                    $status_badge = "secondary";
                    $student_flt_status = "";
                    }?>
                <a href="<?=$Teacher_FLT_LS1F?>?lrn=<?=$row_data['LRN']?>" class="border-secondary border-radius-lg">
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