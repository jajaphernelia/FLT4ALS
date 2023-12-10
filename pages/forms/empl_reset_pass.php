<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  $selectedEmployee = $_GET['empl'];
  $studentData = GetEmployeeAccount($conn, $selectedEmployee);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$Circle_logo?>">
  <link rel="icon" type="image/png" href="<?=$Circle_logo?>">
  <title>
    FLT4ALS | FLT Student Password Reset
  </title>
  
  <!-- plugins -->
  <?=$PagesPlugins?>
</head>

<body class="bg-gray-200">
  <main id="mainContainer" class="main-content  mt-0">
    <div class="page-header align-items-center min-vh-100">
      <div class="container-fluid py-3">
        <?php while ($account=$studentData-> fetch_assoc()){ ?>
        <!-- FLT Password Reset Form -->
        
        <div class="row d-flex justify-content-center">
          <div class="col-xl-6 col-lg-12">
            <div class="card my-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-4">
                <div class="bg-gradient-info shadow-none border-radius-lg pt-3 pb-1">
                  <h6 class="text-white text-lg text-center text-uppercase">EMPLOYEE ACCOUNT</h6>
                </div>
              </div>
              
              <div class="card-body px-4 py-2">
                <form role="form" class="text-start" action="" method="POST">
                    <div class="row d-flex justify-content-between">
                      <div class="col-md-6 col-sm-12">
                        <div class="row">
                          <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                            <p class="mb-0">Account Details</p>
                          </label> 
                          <div class="col-12">
                              <label class="form-label mb-0">Account ID</label>
                              <div class="input-group input-group-outline mb-3">
                              <input readonly type="text" value="<?=$account['acnt_id']?>" name="acnt_id" class="form-control ml-3">

                            </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label mb-0">Date Registered</label>
                              <div class="input-group input-group-outline mb-2">
                                <input readonly type="text" value="<?=DateConverter($account['regs_date'], 'F j, Y')?>" class="form-control">
                              </div>
                          </div>
                          <?php 
                            $optActive = 'd-none';
                            $optDeactive = 'd-none';
                            if ($account['status'] == 'active' || $account['status'] == 'active'){
                              $optDeactive = '';
                            } else if ($account['status'] == 'deactivated' || $account['status'] == 'Deactivated') {
                              $optActive = '';
                            }
                          ?>
                          <div class="col-12">
                            <label class="form-label mb-0">Account Status</label>                      
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-select p-2 border-secondary opacity-5" name="status">
                                  <option class="<?=$optActive?>" value="active">Active</option>
                                  <option class="<?=$optDeactive?>" value="deactivated">Deactivated</option>
                                </select>
                            </div>
                          </div>
                          <?php 
                            $optTeacher = 'd-none';
                            $optAdmin = 'd-none';
                            if ($account['type'] == 'teacher' || $account['type'] == 'Teacher'){
                              $optAdmin = '';
                            } else if ($account['type'] == 'admin' || $account['type'] == 'Admin') {
                              $optTeacher = '';
                            }
                          ?>
                          <div class="col-12">
                              <label class="form-label mb-0">Account Type</label>                      
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-select p-2 border-secondary opacity-5" name="type">
                                  <option class="<?=$optTeacher?>" value="teacher">Teacher</option>
                                  <option class="<?=$optAdmin?>" value="admin">Admin</option>
                                </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6 col-sm-12">
                        <div class="row">
                          <label class="input-label text-md mb-0 d-flex justify-content-start justify-content-md-start align-items-top">
                            <p class="mb-0">Reset Password</p>
                          </label> 
                          <div class="col-12">
                              <label class="form-label mb-0">Username</label>
                              <div class="input-group input-group-outline mb-3">
                              <input required type="text" value="<?=$account['username']?>" name="username" class="form-control ml-3">
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label mb-0">New Password</label>
                              <div class="input-group input-group-outline mb-3">
                                <input type="password" value="" name="new_pass1" class="form-control">
                              </div>
                          </div>
                          <div class="col-12">
                              <label class="form-label mb-0">Confirm Password</label>
                              <div class="input-group input-group-outline mb-3">
                                <input type="password" value="" name="new_pass2" class="form-control">
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
              
                    
                    <?php if (isset($_GET['message'])){
                      GenerateMessage($_GET['type'], $_GET['message']);
                    }?>

                    <div class="row mt-2">
                    <div class="col-md-12 col-sm-12 text-end">
                        <button class="btn bg-gradient-success my-2" type="submit" value="<?=$selectedEmployee?>" name="update_employee_account">
                        <i class="material-icons text-sm">check</i>&nbsp&nbsp
                        Update
                        </button>
                    </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
  
</body>
<script>
  click_to_record.addEventListener('click',function(){
    var speech = true;
    window.SpeechRecognition = window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;

    recognition.lang = "en-US";
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.addEventListener('result', e => {
        const transcript = Array.from(e.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('')

        document.getElementById("convert_text").innerHTML = transcript;
        console.log(transcript);
        console.log(recognition.lang);
    });
    
    if (speech == true) {
        recognition.start();
    }
  });
</script>
</html>