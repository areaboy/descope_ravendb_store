<?php
//error_reporting(0);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

include('settings.php');



if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	
	
	session_start();

$userid_sess =  htmlentities(htmlentities($_SESSION['uid_d'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo_d'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email_d'], ENT_QUOTES, "UTF-8"));
$username_sess =  htmlentities(htmlentities($_SESSION['token_d'], ENT_QUOTES, "UTF-8"));


$title = strip_tags($_POST['title']);


$desc1 =  str_replace(' " ', '', $_POST['desc']);
$desc2 = trim(strip_tags($_POST['desc']));
$desc3 = trim($_POST['desc']);
$category = strip_tags($_POST['category']);
$price = strip_tags($_POST['price']);
$state = strip_tags($_POST['state']);
$city = strip_tags($_POST['city']);


$paypal_email = strip_tags($_POST['paypal_email']);

$country_all = strip_tags($_POST['country']);
$str = $country_all;
$parts = explode('_', $str);
//$result = $parts[1];

$country_iso =  $parts[0];
$country = $parts[1]; 


// Sanitize Post content to only allowed certain html tags based on CKEditor
$allowed_htmltags ="<font></font><b></b><p><strong></strong></p><em></em><u></u><s></s><ol><li></li></ol><ul></ul><blockquote></blockquote><br><br /><a></a><address></address><h1></h1><h2></h2><h3></h3><h4></h4><span></span><img><img />";
$desc_sanitized = strip_tags($desc3, $allowed_htmltags);

//replace any space with hyphen
$sp ='-';
$tt = time();
$title_seo = str_replace(' ', '-', $title.$sp.$tt);

$file_content = strip_tags($_POST['file_fname']);


if ($file_content == ''){
echo "<div class='alert alert-danger' id='alerts_reg1'><font color=red>Files Upload is empty</font></div>";
exit();
}


$upload_path = "images/";

$filename_string = strip_tags($_FILES['file_content']['name']);
// thus check files extension names before major validations

$allowed_formats = array("PNG", "png", "gif", "GIF", "jpeg", "JPEG","JPG","jpg");
$exts = explode(".",$filename_string);
$ext = end($exts);

if (!in_array($ext, $allowed_formats)) { 
echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>File Formats not allowed. Only Images are allowed.<br></div>";
exit();
}


$fsize = $_FILES['file_content']['size']; 
$ftmp = $_FILES['file_content']['tmp_name'];

//give file a random names
$mt_id=rand(0000,9999);
$uname = rand(0000,9999);
$filecontent_name = $uname.time();


$allowed_types=array(
'image/gif',
    'image/jpeg',
    'image/png',
'image/jpg',
'image/GIF',
    'image/JPEG',
    'image/PNG',
'image/JPG'
);
if ( ! ( in_array($_FILES["file_content"]["type"], $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>Only Images are allowed bro..<br><br></div>";

exit();

}




// Calling getimagesize() function 
//$image_info = getimagesize("team1.png"); 
//print_r($image_info); 

$image_info =getimagesize($_FILES['file_content']['tmp_name']);

    $width = $image_info[0];
    $height = $image_info[1];
    $mime_image = $image_info['mime'];
/*
//validate file dimension eg 400 by 250
if ($width > "400" || $height > "250") {
       echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>file upload dimension must not be more than 400(width) by 250(height)</div>";
exit();

}
*/


// check file validation using getimagesizes
 if ($image_info === FALSE) {
           echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>cannot determine the image type</div>";
exit();
        }




if ( ! ( in_array($mime_image, $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>Only Image types are allowed..<br><br></div>";

exit();

}



if (($image_info[2] !== IMAGETYPE_GIF) && ($image_info[2] !== IMAGETYPE_JPEG) && ($image_info[2] !== IMAGETYPE_PNG)) {
           echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>only image format gif,jpg, png are allowed..</div>";
exit();
        }


//validate image using file info  method
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file_content']['tmp_name']);


if ( ! ( in_array($mime, $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles1' class='alerts alert-danger'>Only Images are allowed...<br></div>";

exit();

}
finfo_close($finfo);

$time = time();
$dt2=date("Y-m-d H:i:s");

if (move_uploaded_file($ftmp, $upload_path . $filecontent_name.'.'.$ext)) {

 $final_filename =  $filecontent_name.'.'.$ext;

$status ='Active';


$collect =array('@collection' => $product_tb);
$data = array(
    'image' => $final_filename,
    'title' => $title,
'title_seo' => $title_seo,
    'detail' => $desc2,
'detail_html' => $desc_sanitized,
'price' => $price,
    'category' => $category,
'country' => $country,
    'country_iso' => $country_iso,
  'state' => $state,
  'city' => $city,
'paypal_email' => $paypal_email,
    'fullname' => $fullname_sess,
'email' => $email_sess,
    'userid' => $userid_sess,
'user_photo' => $photo_sess,
    'status' => $status,
'product_id' => $time,
'total_comments' => '0',
'total_likes' => '0',
'total_unlikes' => '0',
'total_rate' => '0',
    '@metadata' => $collect

);
 $payload = json_encode($data);



// insert into RavenDB Database
$ch = curl_init();
$url ="$ravendb_database_url/databases/$ravendb_database_name/docs?id=$product_tb/$time";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

//curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \n  \"image\":\"$final_filename\", \n  \"title\":\"$title\", \n  \"title_seo\":\"$title_seo\", \n  \"detail\":\"$desc2\", \n  \"detail_html\":\"$desc_sanitized\", \n   \"category\":\"$category\", \n   \"country\":\"$country\", \n   \"country_iso\":\"$country_iso\", \n   \"paypal_email\":\"$paypal_email\", \n     \"fullname\":\"$fullname_sess\", \n    \"email\":\"$email_sess\",\n   \"userid\":\"$userid_sess\",\n  \"user_photo\":\"$photo_sess\", \n   \"status\":\"$status\", \n   \"product_id\":\"$time\",\n   \"@metadata\":{\n        \"@collection\":\"$product_tb\"\n    }\n}");

curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
//$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
echo $result = curl_exec($ch);

$json = json_decode($result, true);
$res_id = $json['Id'];


echo $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
   $curl_error = curl_error($ch);

echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>Curl Requet Error: $curl_error</div><br>";
}



if($result ==''){

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($http_status ==201){

echo "<div class='alerts_fadesx' style='background:green;color:white;padding:10px;border:none;'>API Call Successfully Made...</div><br>";


if($res_id !=''){

echo "<div class='alerts_fadesx' style='background:green;color:white;padding:10px;border:none;'>Data Successfully Inserted into RavenDB (ID: $res_id)</div>
.Redirecting in  1 second.....<img src='loader.gif'><br><br>";


echo "<script>
alert('Data Successfully Inserted into RavenDB');
window.setTimeout(function() {
location.reload();
}, 1000);
</script><br><br>";



}




}

curl_close($ch);






}else{

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>File Uploads Failed..</div><br>";

}

}

?>