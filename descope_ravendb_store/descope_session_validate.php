

<?php


error_reporting(0);
session_start();

include('settings.php');

// Descope Validate Sessions
//https://docs.descope.com/api/openapi/session/operation/ValidateSession/

$jwt = $_SESSION['token_d'];


$payload ='{}';
$ch = curl_init();
$url ="https://api.descope.com/v1/auth/validate";
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




if($errorCode == 'E061005'){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'><b>Descope Error:</b> $errorDescription</div>";
echo "<script> alert('Invalid Token....Token Expired. We will redirect you to Login Page....');</script>";

echo "<div style='background:green;padding:8px;color:white;border:none;'>Redirect to Login... <img src='ajax-loader.gif'></div>";
echo "<script>window.location='login.php'</script>";

exit();
}

if($errorCode != ''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'><b>Descope Error:</b> $errorDescription</div>";

echo "<script> alert('Some Descope Request is missing. We will redirect you to Login Page....');</script>";
echo "<div style='background:green;padding:8px;color:white;border:none;'>Redirect to Login... <img src='ajax-loader.gif'></div>";
echo "<script>window.location='login.php'</script>";
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

//echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>Session validation Successfully...</div><br>";

$parsedJWT = $json['parsedJWT'];





}








?>