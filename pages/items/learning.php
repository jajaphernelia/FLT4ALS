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
    FLT4ALS | Learnings
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
      
    <div class="container-fluid">
      <!-- Student Hearder -->
      <?php include '../../pages/elements/std_header.php'; ?>

      <div class="row mt-4">
        <?php 
        $LRVL_list = GetGroupedOrderedData($conn, 'vw_modules', 'Learning Level ID', 'Learning Level Number');
        if ($LRVL_list->num_rows>0){
        while ($ls=$LRVL_list-> fetch_assoc()){
          $Block_ID = $ls['Learning Level ID'];
          $Block_Name = $ls['Learning Level']; ?>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-dark border-radius-lg py-3 pe-1">
                <h6 class="mb-0 text-center text-white"><?=$Block_Name?></h6>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <?php 
                $LS_list = GetFilteredGroupOrderedData($conn, 'vw_modules', 'Learning Level ID', $Block_ID, 'Subject ID', 'Subject Number');
                $Module_count = mysqli_num_rows(GetFilteredData($conn, 'vw_modules', 'Learning Level ID', $Block_ID));

                if ($LS_list->num_rows>0){
                  
                while ($mdl=$LS_list-> fetch_assoc()){?>
                <li class="list-group-item border d-flex justify-content-between p-3 mb-2 border-radius-lg">
                  <a class="btn-link d-flex align-items-center"
                  href="http://<?=$Domain?>/pages/documents/module.php?subject=<?=$mdl['Subject ID']?>&module=<?=$mdl['Module ID']?>" 
                  target="_blank">
                    <div class="border border-info rounded-circle border-rounded border-outline-info mb-0 me-3 p-2 btn-sm d-flex align-items-center justify-content-center">
                      <i class="material-icons text-lg text-info">book</i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?=$mdl['Subject Name']?></h6>
                      <!-- <span class="text-xs text-secondary"><?=$mdl['Sub Title']?></span> -->
                      <!-- <span class="text-xs"><?=$mdl['Module Num']?>, <?=$mdl['Module Title']?></span> -->
                    </div>
                  </a>
                  <div class="d-flex align-items-center text-darktext-gradient text-sm font-weight-bold">
                    <span class="btn-link text-dark text-sm mb-0 px-0 ms-4" >
                      <i class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                    </span>
                  </div>
                  
                </li>
                <?php } } else { ?>
                  <li class="list-group-item border p-3 mb-2 border-radius-lg text-center">
                    No data Recorded
                  </li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
        <?php } } else {?>
        <div class="card-body text-center">
          No avilable modules
        </div>
        <?php }?>
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
    </div>
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
</body>

</html>