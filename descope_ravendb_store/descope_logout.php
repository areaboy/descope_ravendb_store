<?php

error_reporting(0);

include('settings.php');

// Descope Users Sessions Logout
//https://docs.descope.com/api/openapi/session/operation/Logout/
session_start();
 $jwt = $_SESSION['refreshJwt'];


$payload ='{}';
$ch = curl_init();
$url ="https://api.descope.com/v1/auth/logout";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$headers = array();
$headers[] = "Authorization: Bearer $descope_project_id:$jwt";
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


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
   $curl_error = curl_error($ch);

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Request Error: $curl_error</div><br>";
}



if($result ==''){

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($http_status =='200'){

//session_start();
session_destroy();


echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>Logout Successful...</div><br>";
echo "<script>alert('Logout Successful');</script>";
header("Location:index.php");


}








?>