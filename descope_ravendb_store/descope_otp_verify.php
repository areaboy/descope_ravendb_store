<?php
error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

 $otp = strip_tags($_POST['otp']);
 $email = strip_tags($_POST['email']);


include('settings.php');

if ($otp == ''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>OTP Code is Empty</div><br>";
exit();
}


// Verify Descope OTP Code
//https://docs.descope.com/api/openapi/otp/operation/VerifyOtpEmail/



$payload ='{
    "loginId": "'.$email.'"
,
    "code": "'.$otp.'"

  }';

$ch = curl_init();
$url ="https://api.descope.com/v1/auth/otp/verify/email";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$headers = array();
$headers[] = "Authorization: Bearer $descope_project_id";
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

$json = json_decode($result, true);
$errorCode = $json['errorCode'];
$errorDescription = $json['errorDescription'];


if($errorCode != ''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'><b>Descope Error:</b> $errorDescription</div>";
exit();
}


echo $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
   $curl_error = curl_error($ch);

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Request Error: $curl_error</div><br>";
}



if($result ==''){

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($http_status =='200'){

echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>Signup Completed Successfully...</div><br>";

$sessionJwt = $json['sessionJwt'];
$refreshJwt = $json['refreshJwt'];
$email = $json['user']['email'];
$userid = $json['user']['userId'];
$fullname = $json['user']['name'];
//$photo = $json['user']['picture'];

$ext='png';
$pics = str_replace(' ', '_', $fullname);
$picsname =  $pics.'.'.$ext;

// initialize php session


session_start();
session_regenerate_id();


// initialize session if things where ok.
$_SESSION['uid_d'] = $userid;
$_SESSION['fullname_d'] = $fullname;
$_SESSION['username_d'] = $userid;
$_SESSION['email_d'] = $email;
$_SESSION['photo_d'] = $picsname;
$_SESSION['token_d'] = $sessionJwt;
$_SESSION['refreshJwt'] = $refreshJwt;
$_SESSION['status_d'] = 'user';


echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful <img src='ajax-loader.gif'></div>";
echo "<script>window.location='dashboard.php'</script>";



}



}else{

echo "<div style='background:red;color:white;padding:10px;border:none;'>Direct Page Access Not Allowed</div><br>";


}




?>



