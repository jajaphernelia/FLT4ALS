<?php
include '../variables.php';
include '../config.php';
?>
<?php
    $List_Student = GetAllStudentFLT($conn, $ActiveSchoolYearID, 'TPRD-00002');
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
                    <img src="<?=$Images_Directory?>/users/<?=$row_data['Gender']?>.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm"><?=$row_data['Student Name']?></h6>
                    <p class="text-xs text-secondary mb-0"><?=$row_data['LRN']?></p>
                </div>
            </div>
        </td>
        <td>
            <?=generateFLTProgress($conn, $row_data['LRN'], $ActiveSchoolYearID, 'TPRD-00002')?>
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
        <td colspan="12">
        <p class="p-1 mb-1 text-center">
            No data Recorded
        </p>
        </td>
    </tr>
<?php } ?>