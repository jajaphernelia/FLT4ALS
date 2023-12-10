<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
        <tr>
            <th width="10%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
            <th width="40%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
            <th width="20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
            <th width="30%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
        </tr>
        </thead>
        <tbody> <?php
        $List_Student = GetFilteredLimitedData($conn, 'vw_students', 'Student Status', 'active', 5);
        $student_row_count = 1;

        if ($List_Student->num_rows>0){ 
            $view_btn = 'd-block';
        while ($row_data=$List_Student-> fetch_assoc()){
            if ($row_data['Online Status'] == "online"){
            $status_badge = "success";
            } else if ($row_data['Online Status'] == "offline"){
            $status_badge = "secondary";
            } else{
            $status_badge = "warning";
            }?>
        <tr>
            <td class="align-middle text-center">
            <span class="text-secondary font-weight-bold text-xs">
                <?=$student_row_count?>
            </span>
            </td>
            <td>
            <div class="d-flex px-2 py-1">
                <div>
                <img src="assets/img/users/<?=$row_data['Gender']?>.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                </div>
                <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?=$row_data['Name']?></h6>
                <p class="text-xs text-secondary mb-0"><?=$row_data['LRN']?></p>
                </div>
            </div>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0"><?=$row_data['Age']?></p>
            <p class="text-xs text-secondary mb-0"><?=$row_data['Birthdate']?></p>
            </td>
            <td class="align-middle text-center">
            <span class="badge badge-sm bg-gradient-<?=$status_badge?>"><?=$row_data['Online Status']?></span>
            </td>
        </tr>
        <?php $student_row_count++; } } else { 
            $view_btn = 'd-none'; ?>
        <tr>
            <td colspan="4">
            <p class="p-1 mb-1 text-center">
                No data Recorded
            </p>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <hr class='<?=$view_btn?>'>
    <div class="card-footer py-0 mb-3 <?=$view_btn?>">
        <a href="" class="btn btn-outline-secondary w-100 btn-sm mb-0"> View All </a>
    </div>
</div> <?php
?>