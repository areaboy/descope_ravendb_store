

<?php
error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$email = strip_tags($_POST['email']);


if ($email == ''){
echo "<div class='alert alert-danger' id='alerts_login'><font color=red>Email is empty</font></div>";
exit();
}

include('settings.php');


 
// Users Signin Via Descope One Time password OTP
//https://docs.descope.com/api/openapi/otp/operation/UserSigninOtpEmail/

$payload ='{
    "loginId": "'.$email.'",
    "loginOptions": {
      "stepup": false,
      "customClaims": {},
      "mfa": false
    }
  }';




$ch = curl_init();
$url ="https://api.descope.com/v1/auth/otp/signin/email";
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
$maskedEmail = $json['maskedEmail'];


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

echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>Success: Please Check Your Email.  Enter OTP Sent to Your Email to Complete Your Login .....</div><br>";



echo "
<script>
$(document).ready(function(){

$('.log_btn_hide').hide();

$('#otp_btn').click(function () {
                    var otp = $('#otp').val();
var email = '$email';

if(otp==''){
alert('Please Enter OTP Sent to Your Email to Complete Your Login.....');

}

else{

$('#loader_otp').fadeIn(400).html('<br><div style=color:black;background:#ddd;padding:10px;><img src=loader.gif style=font-size:20px> &nbsp;Please Wait!. OTP is being Vrify via Descope</div>');
var datasend = {otp:otp, email:email};


$.ajax({
			
			type:'POST',
			url:'descope_otp_verify.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

                        $('#loader_otp').hide();
				//$('#result_otp').fadeIn('slow').prepend(msg);
$('#result_otp').html(msg);



			
			}
			
		});
		
		}
		
					
	});
});


</script>




<br>
<div class='well'>

<div class='form-group col-sm-12'>
              <label>Enter OTP Code</label>
              <input type='text' class='col-sm-12 form-control' id='otp' name='otp' placeholder='Enter OTP Code'>
            </div>
<div id='loader_otp'></div>
<div id='result_otp'></div>
<div class='form-group col-sm-12'>
     <input type='button' id='otp_btn' class='pull-right btn btn-primary' value='Complete Login Now via OTP' />
</div>
</div>
<br>
<br>
<br><br>

";


}







}else{

echo "<div style='background:red;color:white;padding:10px;border:none;'>Direct Page Access Not Allowed</div><br>";


}






?>

<?php ob_end_flush(); ?>
