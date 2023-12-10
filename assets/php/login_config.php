<?php
include 'variables.php';
include 'functions.php';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
// echo 'Login is Ready';

session_start();
// LoggedInRequired();

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    // echo '<br>' + $username;
    // echo '<br>' + $password;
    $AutheticateAccount = mysqli_query($conn, "SELECT * FROM `tbl_accounts` WHERE `username` = '$username' AND password = '$password'");
    
    if ($AutheticateAccount->num_rows>0) {  
        while($account = mysqli_fetch_array($AutheticateAccount)){
            $_SESSION['userID'] = $account['acnt_id'];
            $_SESSION['accountID'] = $account['acnt_id'];
            $_SESSION['userType'] = $account['type'];   

            $accountID = $account['acnt_id'];
            $accountType = $account['type'];
            if ($account['status'] == 'deactivated'){
                header('Location: http://'.$Domain.'/login.php?type=danger&message=Your account is already been deactivated');
            
            }  else if ($account['type'] == 'student'){
                $_SESSION['AccountType'] = 'Student';
                $_SESSION['StudentLRN'] = GetUserStudentData($conn, $accountID, 'LRN');
                $_SESSION['StudentName'] = GetUserStudentData($conn, $accountID, 'Name');
                $_SESSION['StudentGender']= GetUserStudentData($conn, $accountID, 'Gender');
                $_SESSION['StudentStatus']= GetUserStudentData($conn, $accountID, 'Student Status');
                $_SESSION['AccountStatus']= GetUserStudentData($conn, $accountID, 'Account Status');
                // $_SESSION['StudentGradeSection']= GetStudentData($conn, $accountID, 'Grade and Section');
                
                //header('Location: http://'.$Domain.'/index.php?type=danger&message=User '.$accountID.' ('.$accountType.') Student   -'.$studentID);
                
                AccountStatusUpdate($conn, $_SESSION['accountID'], "online");
                header('Location: http://'.$Domain.'/student.php');

            }   else if ($account['type'] == 'admin'){
                $_SESSION['AccountType'] = 'Admin';
                $_SESSION['UserID']= GetEmployeeData($conn, $accountID, 'Employee ID');
                $_SESSION['UserName']= GetEmployeeData($conn, $accountID, 'Name');
                $_SESSION['UserGender']= GetEmployeeData($conn, $accountID, 'Gender');
                
                // header('Location: http://'.$Domain.'/login.php?type=danger&message=User '.$_SESSION['UserName'].' ('.$_SESSION['UserID'].') Gender   -'. $_SESSION['UserGender']);
                AccountStatusUpdate($conn, $_SESSION['accountID'], "online");
                header('Location: http://'.$Domain.'/admin.php');
            }   else if ($account['type'] == 'teacher'){
                $_SESSION['AccountType'] = 'Teachers';
                $_SESSION['UserID']= GetEmployeeData($conn, $accountID, 'Employee ID');
                $_SESSION['UserName']= GetEmployeeData($conn, $accountID, 'Name');
                $_SESSION['UserGender']= GetEmployeeData($conn, $accountID, 'Gender');
                
                // header('Location: http://'.$Domain.'/login.php?type=danger&message=User '.$_SESSION['UserName'].' ('.$_SESSION['UserID'].') Gender   -'. $_SESSION['UserGender']);
                AccountStatusUpdate($conn, $_SESSION['accountID'], "online");
                header('Location: http://'.$Domain.'/teacher.php');
            }
        }
    } else {
        header('Location: http://'.$Domain.'/login.php?type=danger&message=Username and Password didn`t match');
        session_destroy();
    }
    
} 
?>