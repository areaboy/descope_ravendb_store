<?php
//error_reporting(0);
session_start();

$uid = strip_tags($_SESSION['uid_d']);
$userid_sess = $uid;
$fullname_sess = strip_tags($_SESSION['fullname_d']);
$username_sess =  strip_tags($_SESSION['username_d']);
$photo_sess = strip_tags($_SESSION['photo_d']);

$post_id = strip_tags($_POST['post_id']);

$rating = strip_tags($_POST['rating']);
$postid  = $post_id;



if ($post_id == ''){
exit();
}


if ($post_id != ''){


include('settings.php');

$token= md5(uniqid());
$timer = time();
$dt2=date("Y-m-d H:i:s");
$pa = 0;

/*

//check if User has already rated the products post
$ch2 = curl_init();
$url2 ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb_rating where product_id = '$post_id' AND userid = '$userid_sess'\" \n}");

$headers2 = array();
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$result2 = curl_exec($ch2);

$json2 = json_decode($result2, true);
$TotalResults = $json2['TotalResults'];
$http_status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);

$user_rating_value = $json2['Results'][0]['rating_count'];



$TotalResults_rating = $TotalResults;

if (curl_errno($ch2)) {
   $curl_error2 = curl_error($ch2);

$return_arr = array("msg"=>"curl_error", "msg2"=>"Curl Requet Error: $curl_error2 .Ensure There is Internet Connection");
echo json_encode($return_arr);
exit();
}



if($http_status2 ==200){

if($TotalResults_rating == 1){
	// User already Rated the item prducts
$return_arr = array("msg"=>"rating_already", "msg_value"=>"$user_rating_value", "msg_rating"=>"You have Already Rated This Product/Post '($user_rating_value Star.)' We will Added it to Your Comment. You Can Comment on the Products/Posts Now ");
echo json_encode($return_arr);
exit();

}
}
curl_close($ch2);


*/


// Insert into product_tb_rating Docs in Ravendb


$collect =array('@collection' => $product_tb_rating);
$data = array(
    'product_id' => $post_id,
'rating_count' => $rating,
'timeago' => $timer,
'userid' => $userid_sess,
'fullname' => $fullname_sess,
'photo' => $photo_sess,
    '@metadata' => $collect

);
 $payload = json_encode($data);


// insert likes into RavenDB Database
$ch = curl_init();
$url ="$ravendb_database_url/databases/$ravendb_database_name/docs?id=$product_tb_rating/$time";
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
curl_close($ch);






//query the rating docs to get rating count

$ch2x = curl_init();
$url2x ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2x, CURLOPT_URL, $url2x);
curl_setopt($ch2x, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2x, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch2x, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb_rating where product_id = '$post_id'\" \n}");

$headers2x = array();
$headers2x[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2x, CURLOPT_HTTPHEADER, $headers2x);
$result2x = curl_exec($ch2x);

$json2x = json_decode($result2x, true);
$TotalResultsx_rating = $json2x['TotalResults'];
$http_status2x = curl_getinfo($ch2x, CURLINFO_HTTP_CODE);


if (curl_errno($ch2x)) {
   $curl_error2 = curl_error($ch2x);
}
curl_close($ch2x);



$sum = 0;
foreach ($json2x['Results'] as $row){
 //$rating_c = $row['rating_count'];
$sum += $row['rating_count'];

}

$total_rating_sum = $sum/$TotalResultsx_rating;

// round it to first decimal number
$total_rating_sum_round = round($total_rating_sum, 1);


//query the products docs to get rating count

$ch2 = curl_init();
$url2 ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb where product_id = '$post_id'\" \n}");

$headers2 = array();
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$result2 = curl_exec($ch2);

$json2 = json_decode($result2, true);
$TotalResults = $json2['TotalResults'];
$http_status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
$t_rating = $json2['Results'][0]['total_rate'];
//$total_rating_all = $t_rating + $rating;


$image = $json2['Results'][0]['image'];
$title = $json2['Results'][0]['title'];
$title_seo = $json2['Results'][0]['title_seo'];
$detail = $json2['Results'][0]['detail'];
$detail_html = $json2['Results'][0]['detail_html'];
$category = $json2['Results'][0]['category'];
$country = $json2['Results'][0]['country'];
$country_iso = $json2['Results'][0]['country_iso'];
$paypal_email = $json2['Results'][0]['paypal_email'];
$fullname = $json2['Results'][0]['fullname'];
$email = $json2['Results'][0]['email'];
$userid = $json2['Results'][0]['userid'];
$user_photo = $json2['Results'][0]['user_photo'];
$status = $json2['Results'][0]['status'];
$product_id = $json2['Results'][0]['product_id'];
$total_comments = $json2['Results'][0]['total_comments'];
$total_likes = $json2['Results'][0]['total_likes'];
$total_unlikes = $json2['Results'][0]['total_unlikes'];
$price = $json2['Results'][0]['price'];
$city = $json2['Results'][0]['city'];
$state =$json2['Results'][0]['state'];

/*
if (curl_errno($ch2)) {
   $curl_error2 = curl_error($ch2);
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Requet Error: $curl_error2</div><br>";
}



if($result2 ==''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}
*/


if($http_status2 ==200){
}
curl_close($ch2);



// update rating count for Products/Items in RavendB


$collect =array('@collection' => $product_tb);
$data = array(
    'image' => $image,
    'title' => $title,
'title_seo' => $title_seo,
    'detail' => $detail,
'detail_html' => $detail_html,
   'price' => $price,
    'category' => $category,
'country' => $country,
    'country_iso' => $country_iso,
  'state' => $state,
  'city' => $city,
'paypal_email' => $paypal_email,
    'fullname' => $fullname,
'email' => $email,
    'userid' => $userid,
'user_photo' => $user_photo,
    'status' => $status,
'product_id' => $product_id,
'total_comments' => $total_comments,
'total_likes' => $total_likes,
'total_unlikes' => $total_unlikes,
'total_rate' => $total_rating_sum_round,
    '@metadata' => $collect

);
 $payload = json_encode($data);


// insert into RavenDB Database
$ch3 = curl_init();
$url3 ="$ravendb_database_url/databases/$ravendb_database_name/docs?id=$product_tb/$post_id";
curl_setopt($ch3, CURLOPT_URL, $url3);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, 'PUT');

curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload);
$headers3 = array();
$headers3[] = 'Content-Type: application/x-www-form-urlencoded';
//$headers3[] = 'Content-Type: application/json';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers3);
$result3 = curl_exec($ch3);
curl_close($ch3);

}





$return_arr = array("msg_value"=>"$rating", "rating"=>$total_rating_sum_round, "msg"=>"success");
echo json_encode($return_arr);
