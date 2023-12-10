<?php
include 'variables.php';
include 'login_config.php';

$accountID = $_SESSION['accountID'];

AccountStatusUpdate($conn, $accountID, "offline");
session_destroy();
header('Location: http://'.$Domain.'/login.php?type=danger&message=User Must Login First');

?>