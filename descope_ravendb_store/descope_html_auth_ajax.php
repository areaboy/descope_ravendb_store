<?php

error_reporting(0);
include('settings.php');

$email = $_POST['emailx'];
$userid = $_POST['useridx'];
$fullname = $_POST['fullnamex'];
$sessionJwt = $_POST['sessionJwtx'];
$refreshJwt = $_POST['refreshJwtx'];



session_start();
session_regenerate_id();


// initialize session if things where ok.

$pics ='descope.png';
$_SESSION['uid_d'] = $userid;
$_SESSION['fullname_d'] = $fullname;
$_SESSION['username_d'] = $userid;
//$_SESSION['email_d'] = $email;
$_SESSION['email_d'] = '';
$_SESSION['photo_d'] = $pics;
$_SESSION['token_d'] = $sessionJwt;
$_SESSION['refreshJwt'] = $refreshJwt;
$_SESSION['status_d'] = 'user';




echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful <img src='ajax-loader.gif'></div>";
echo "<script>window.location='dashboard.php'</script>";

//echo "<script>window.location.replace='dashboard.php'</script>";
?>