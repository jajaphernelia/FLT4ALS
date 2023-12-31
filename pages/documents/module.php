<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  // LoggedInRequired($Domain, "student");

  $Subject = $_GET['subject'];
  $Module = $_GET['module'];
//   http://localhost/FLT4ALS_E-Learning_System/pages/documents/module.php?subject=SUBJ-00001&module=MODL-00102
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Modules
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="http://<?=$Domain?>/pages/documents/module.php?subject=<?=$Subject?>&module=<?=$Module?>">
        <img src="../../assets/img/logo/logo_big_wht.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php 
        $Folder_list = GetFilteredGroupOrderedData($conn, 'vw_modules', 'Subject ID', $Subject, 'Sub Folder', 'Subject ID');
        while ($fld=$Folder_list-> fetch_assoc()){
          ?>
          <h6 class=" px-3 m-0 text-uppercase text-sm text-white font-weight-normal opacity-8"> <br>
            <?=$fld['Sub Folder']?>
          </h6>
          <?php
          $Sub_Folder = $fld['Sub Folder'];
          $Sub_ID = $fld['Subject ID'];
          $Module_list = mysqli_query($conn,"SELECT * FROM `vw_modules` WHERE `Subject ID` = '$Sub_ID' AND `Sub Folder` = '$Sub_Folder'");
          if ($Module_list->num_rows>0){
            while ($mdl=$Module_list-> fetch_assoc()){
              ?>
          <li class="nav-item">
            <a class="nav-link text-white border border-secondary my-1" 
              href="http://<?=$Domain?>/pages/documents/module.php?subject=<?=$Subject?>&module=<?=$mdl['Module ID']?>">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
              </div>
              <span id="btn_text" class="nav-link-text ms-1 overflow-hidden"><?=$mdl['Module Num']?>. <?=$mdl['Module Title']?></span>
            </a>
          </li>
        <?php } }}?>
      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" 
        href="http://<?=$Domain?>/pages/items/learning.php" 
        type="button">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
            <span id="btn_text" class="nav-link-text ms-1 overflow-hidden">
            Learnings
            </span>
          </div>
        </a>
      </div>
    </div>
  </aside>

  <main id="mainContainer" class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $Module_file = GetFilteredData($conn, 'vw_modules', 'Module ID', $Module);
    if ($Module_file->num_rows>0){
    while ($pdf_mdl=$Module_file-> fetch_assoc()){?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?=$pdf_mdl['Subject Name']?></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Modules</li>
          </ol>
          <h6 class="font-weight-bolder mt-1 mb-0"><?=$pdf_mdl['Module Title']?></h6>
          <h6 class="font-weight-normal mt-1 mb-0"><?=$pdf_mdl['Sub Title']?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group">
              <label class="d-none form-label">Type here...</label>
              <input type="d-none text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="d-none fa fa-user me-sm-1"></i>
                <!-- <span class="d-none d-sm-inline">Sign In</span> -->
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="d-none fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="d-none nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-xl-none ps-2 d-flex align-items-center">
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
    <div class="container-fluid py-0">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-body px-3 pb-2">
              <div class="table-responsive">
                <!-- 21:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe id="pdf_container" 
                        class="embed-responsive-item" 
                        src="http://<?=$Domain?>/assets/documents/<?=$pdf_mdl['File']?>#toolbar=0&view=FitH&zoom=300&page=1" 
                        width="100%"
                        style="border-radius: 10px;"
                        allowtransparency="true">
                    </iframe>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <?php } } ?>
    </div>
      <!-- footer -->
      <?=$PageFooter?>
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

    <script>
        let container_height = screen.height * 0.73;
        console.log("Avail H: " +container_height);
        document.getElementById("pdf_container").style.height = container_height + "px";
    
        // var turnk_text = document.getElementById("btn_text").innerHTML.substring(0, 20) + "...";
        // document.getElementById("btn_text").innerHTML = turnk_text;

    </script>
</body>

</html>