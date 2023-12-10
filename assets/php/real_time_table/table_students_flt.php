<?php
include '../variables.php';
include '../config.php';
?>
<div class="table-responsive pt-1 pb-3">
    <table class="table table-striped align-items-center mb-0">
        <thead class="bg-success">
        <tr>
            <th width="6%" class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
            <th width="20%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">Student</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">PIS</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Eng.</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS1 Fil</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS2</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS3</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS4</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS5</th>
            <th width="8%" class="text-uppercase text-white text-secondary text-center text-xs font-weight-bolder opacity-7">LS6</th>
            <th width="10%" class="text-center text-white text-uppercase text-secondary text-center text-xs font-weight-bolder opacity-7">Evaluation</th>
        </tr>
        </thead>
        <tbody> <?php
        $List_Student = GetAllStudentFLT($conn, $ActiveSchoolYearID, $ActiveTestPeriodID);
        $student_row_count = 1;

        if ($List_Student->num_rows>0){ 
            $view_btn = 'd-block';
        while ($row_data=$List_Student-> fetch_assoc()){
            if ($row_data['Learning Level'] == "Error"){
            $status_badge = "warning";
            $learning_level = "";
            } else {
            $status_badge = "dark";
            $learning_level = $row_data['Learning Level'];
            }
        ?>
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
                        <h6 class="mb-0 text-sm"><?=$row_data['Student Name']?></h6>
                        <p class="text-xs text-secondary mb-0"><?=$row_data['LRN']?></p>
                    </div>
                </div>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['PIS Total Score']?>/<?=$row_data['PIS Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS1E Total Score']?>/<?=$row_data['LS1E Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS1F Total Score']?>/<?=$row_data['LS1F Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS2 Total Score']?>/<?=$row_data['LS2 Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS3 Total Score']?>/<?=$row_data['LS3 Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS4 Total Score']?>/<?=$row_data['LS4 Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS5 Total Score']?>/<?=$row_data['LS5 Max Score']?></p>
            </td>
            <td>
                <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['LS6 Total Score']?>/<?=$row_data['LS6 Max Score']?></p>
            </td>
            <td class="align-middle text-center">
            <p class="text-xs text-center font-weight-bold m-0"><?=$row_data['FLT Total Score']?>/<?=$row_data['FLT Max Score']?></p>
                <span class="text-xs text-<?=$status_badge?>"><?=$learning_level?></span>
            </td>
        </tr>
        <?php $student_row_count++; } } else { 
            $view_btn = 'd-none'; ?>
        <tr>
            <td colspan="11">
            <p class="p-1 mb-1 text-center">
                No data Recorded
            </p>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>