
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
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
              <button class="btn btn-outline-success btn-sm mb-0 py-1 px-2" type="button" data-toggle="modal" data-target="#Modal_UpdateSY">Update</button>
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">school</i>
              </div>
              <div class="text-end pt-1">
              <p class="text-mb mb-0 text-capitalize">Active ALS Student</p>
              <h4 class="mb-0" id="activeStudentCount">0 Active</h4>
              </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-mb font-weight-bolder" id="allStudentCount">0</span> Registered ALS Student/s</p>
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">local_library</i>
            </div>
            <div class="text-end pt-1"> 
            <p class="text-mb mb-0 text-capitalize">ALS Teachers</p>
            <h4 class="mb-0" id="activeTeacherCount">0 Active</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-mb font-weight-bolder" id="allTeacherCount">0</span> Registered Teacher/s</p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">admin_panel_settings</i>
            </div>
            <div class="text-end pt-1">
            <p class="text-mb mb-0 text-capitalize">Admin</p>
            <h4 class="mb-0" id="activeAdminCount">0 Active</h4>
            </div>
        </div>  
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-mb font-weight-bolder" id="allAdminCount">0</span> Registered Admin/s</p>
        </div>
        </div>
    </div>
    
    <?=$RealtimeDataLoader?>
    <script>
      loadRealTimeData("allStudentCount", "counts/count_students_all.php", 1);
      loadRealTimeData("activeStudentCount", "counts/count_students_active.php", 1);

      loadRealTimeData("allTeacherCount", "counts/count_teachers_all.php", 1);
      loadRealTimeData("activeTeacherCount", "counts/count_teachers_active.php", 1);

      loadRealTimeData("allAdminCount", "counts/count_admin_all.php", 1);
      loadRealTimeData("activeAdminCount", "counts/count_admins_active.php", 1);

      loadRealTimeData("activeStudentTable", "real_time_table/table_students_active.php", 5);
      loadRealTimeData("activeAdminTable", "real_time_table/table_admins_active.php", 5);
    </script>
</div>
<hr>
<!-- Modal -->
<div class="modal fade" id="Modal_UpdateSY" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content p-3">
      <div class="card-header pb-0">
        <h4 class="font-weight-bolder">Creat New School Year</h4>
        <p class="mb-0">Enter the starting year and the ending year of the New School Year</p>
      </div>
      <form role="form" class="text-start" action="" method="POST">
        <div class="card-body">
          <div class="row pb-0">
            <div class="col-sm-6">
              <label class="input-label">Starting year</label>
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">Form</label>
                <input type="number" name="start_year" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              </div>
            </div>
            <div class="col-sm-6">
              <label class="input-label">Ending year</label>
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">To</label>
                <input type="number" name="end_year" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              </div>
            </div>
          </div>
          
          <div class="row pb-0">
            <div class="col-sm-12">
              <p class="mb-0 text-sm text-danger">
                Note: <br>
                All student accounts of the current school year will be deactivated once the school year has been updated.
              </p>
            </div>
          </div>
        </div>
        

        <div class="modal-footer p-0 pt-2">
          <button class="btn bg-gradient-success my-2" type="submit" name="add_NewSchoolYear">Submit</button>
          <button type="button" class="btn bg-gradient-secondary my-2" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    
  </div>
</div>