<?php
//error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid_d']);
$userid_sess = $uid;
$fullname_sess = strip_tags($_SESSION['fullname_d']);
$username_sess =  strip_tags($_SESSION['username_d']);
$photo_sess = strip_tags($_SESSION['photo_d']);

$fullname= strip_tags($_POST['fullname']);
$email= strip_tags($_POST['email']);
$address= strip_tags($_POST['address']);
$postalcode= strip_tags($_POST['postalcode']);
$country= strip_tags($_POST['country']);
$state= strip_tags($_POST['state']);
$city= strip_tags($_POST['city']);
$owner_id= strip_tags($_POST['owner_id']);
$product_sum= strip_tags($_POST['product_sum']);
$price= strip_tags($_POST['price']);
$qty= strip_tags($_POST['qty']);
$product_name= strip_tags($_POST['product_name']);


if ($price == ''){
exit();
}


if ($price != ''){


include('settings.php');




// Insert into product_tb_like Docs in Ravendb
$timer = time();

$collect =array('@collection' => $product_tb_order);
$data = array(
'fullname' => $fullname,
'email' => $email,
'product_name' => $product_name,
'price' => $price,
'qty' => $qty,
'product_sum' => $product_sum,
'address' => $address,
'postalcode' => $postalcode,
'country' => $country,
'state' => $state,
'city' => $city,
'owner_id' => $owner_id,
'timeago' => $timer,
'userid' => $userid_sess,
    '@metadata' => $collect

);
 $payload = json_encode($data);


// insert into RavenDB Database
$ch = curl_init();
$url ="$ravendb_database_url/databases/$ravendb_database_name/docs?id=$product_tb_order/$time";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
//$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);


$json = json_decode($result, true);
$res_id = $json['Id'];
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);


if (curl_errno($ch)) {
   $curl_error = curl_error($ch);

$return_arr = array("msg"=>"curl_error", "msg2"=>"Curl Request Error: $curl_error .Ensure There is Internet Connection");
echo json_encode($return_arr);
exit();
}



if($http_status ==200){
}
curl_close($ch);

}



$return_arr = array("msg"=>"success", "msg2"=>"Order Created Successfully", "amount"=>$product_sum);
echo json_encode($return_arr);
