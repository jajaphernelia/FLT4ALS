<!DOCTYPE html>
<?php 
  include 'assets/php/variables.php';
  include 'assets/php/config.php';

  LoggedInRequired($Domain, "admin");
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | Admin
  </title>
  <!-- plugins -->
  <?=$MainPagePlugins?>
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
          <a class="nav-link active bg-secondary text-white" href="<?=$Admin_Dashboard?>">
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
          <a class="nav-link text-white" href="<?=$Admin_Student_PIS?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i>
              </div>
              <span class="nav-link-text ms-1 overflow-hidden">Students</span>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <span class="d-sm-inline pl-3 text-md"><?=$_SESSION['UserName']?> (Admin)</span> &nbsp&nbsp
                <!-- <i class="fa fa-user me-sm-1"></i> -->
                <img src="assets/img/users/<?=$_SESSION['UserGender']?>.png" class="ms-1 avatar avatar-xs border-radius-lg" alt="user1">
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
      <!-- Admin Hearder -->
      <?php include 'pages/elements/adm_header.php'; ?>

      <?php if (isset($_GET['message'])){
        GenerateMessage($_GET['type'], $_GET['message']);
      }?>
      
      <div class="row mb-2 d-flex justify-content-center">
        <div class="col-md-9 col-sm-12 p-0">
          <div class="p-4 text-center">
            <h2 class="mb-3 text-capitalize font-weight-bold">Functional Literacy Test</h2>
            <p class="text-lg">
              The Functional Literacy Test (FLT) assesses preparedness for the learning strands of ALS K-12 BEC Curriculum. 
              It includes measures of ability to supply personal information and prior knowledge of the six learning strands: 
              Communication Skills- English and Filipino, Scientific Literacy and Critical Thinking Skills, Mathematical and 
              Problem Solving Skills, Life and Career Skills, Understanding the Self and Society, and Digital Citizenship.
            </p>
            
            <a class="btn btn-md bg-gradient-success mt-0 border-radius-xl" 
              href="<?=$Admin_Student_PIS?>" 
              type="button">
              <i class="material-icons opacity-10 me-2">school</i> 
              Students
            </a>
          </div>
        </div>
      </div>

      <div class="row mb-2 d-flex justify-content-center">
        <div class="col-md-9 col-sm-12 p-0">
          <div class="p-4 text-center">
            <h2 class="mb-3 text-capitalize font-weight-bold">Functional Literacy Test Results</h2>
            <p class="text-lg">
              The teacher will be able to determine and evaluate the knowledge and skills of the pupils in a variety of topics, 
              including language, mathematics, and science, using the FLT test result. Based on their strengths and areas for 
              development in their disciplines, the scoring system, which assesses the competence level of pupils, will give a 
              clear indicator of what category level they belong to in class.
            </p>
          </div>
        </div>
      </div>

      <div class="row mt-0 d-none">
        <div class="col-sm-6 mb-xl-0 mb-4">
          <div class="card my-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Active Students</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0 modal-btn" data-toggle="modal" data-target="#Modal_AddStudent">Add</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2" id="activeStudentTable">
              <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th width="10%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th width="40%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th width="20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
                    <th width="30%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                      <td colspan="4">
                      <p class="p-1 mb-1 text-center">
                        Loading data...
                      </p>
                      </td>
                  </tr>
                </tbody>
              </table>
              <!-- $AdminRealtimeDataLoader -->
            </div>
          </div>
        </div>

        <div class="col-sm-6 mb-xl-0 mb-4">
          <div class="card my-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Active Admins</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0 modal-btn" data-toggle="modal" data-target="#">Add</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2" id="activeAdminTable">
              <p class="p-1 mb-1 text-center">
                  Loading data...
              </p>
              <!-- $AdminRealtimeDataLoader -->
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
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">LRN</label>
                  <input type="text" name="lrn" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
              </div>
            </div>
            <label class="input-label mt-2">Student Account</label>
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
            <button class="btn bg-gradient-success my-2" type="submit" name="add_NewStudent">Submit</button>
            <button type="button" class="btn bg-gradient-secondary my-2" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
  

<?=$MainPageScripts?>

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