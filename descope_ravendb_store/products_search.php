<?php
error_reporting(0); 
include('settings.php');

?>




<div class='row'>

<div class='col-sm-1'>
</div>

<div class='col-sm-10'>

<p>


<!--start posts-->

<div class="container">

            <?php


$search_data = strip_tags($_POST['search_data']);
$search_type = strip_tags($_POST['search_type']);



$ch2 = curl_init();
$url2 ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');

if($search_type =='cars_cat'){
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb where category = '$search_data'\" \n}");
}

if($search_type =='cars_country'){

$country_all = $search_data;
$str = $country_all;
$parts = explode('_', $str);
//$result = $parts[1];

$country_iso =  $parts[0];
$country = $parts[1]; 


curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb where country = '$country'\" \n}");
}


if($search_type =='cars_state'){
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb where state = '$search_data'\" \n}");
}


if($search_type =='cars_city'){
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb where city = '$search_data'\" \n}");
}



$headers2 = array();
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$result2 = curl_exec($ch2);

$json2 = json_decode($result2, true);
$TotalResults = $json2['TotalResults'];
$http_status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);

$totalcount = $TotalResults;

$fullname_ss = $json2['Results'][0]['fullname'];


if (curl_errno($ch2)) {
   $curl_error2 = curl_error($ch2);
echo "<div class='alerts_fadesp' style='background:red;color:white;padding:10px;border:none;width:60%;'>Curl Requet Error: $curl_error2</div><br>";
}


if($result2 ==''){
echo "<div class='alerts_fadesp' style='background:red;color:white;padding:10px;border:none;width:60%;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($TotalResults == 0){
echo "<br><br><div class='alerts_fadesp' style='background:red;color:white;padding:10px;border:none;width:60%;'>No Products Found for this Search <b>$search_data</b>.. Please Ensure Your Typing and Spelling is okay....... </div>";

}


if($http_status2 ==200){
//echo "<div class='alerts_fadesp' style='background:green;color:white;padding:10px;border:none;width:60%;'>API Call Successfully Made...</div><br>";
}



curl_close($ch2);


foreach ($json2['Results'] as $row){

$id= $row['product_id'];
                $postid = $row['product_id'];
                $title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
                $description = htmlentities(htmlentities($row['detail'], ENT_QUOTES, "UTF-8"));
                $description_html = $row['detail_html'];
                $title_seo = htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
                $timing = htmlentities(htmlentities($row['product_id'], ENT_QUOTES, "UTF-8"));
                $username = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
                $fullname =htmlentities(htmlentities($row['fullname'], ENT_QUOTES, "UTF-8"));
                $photo = htmlentities(htmlentities($row['user_photo'], ENT_QUOTES, "UTF-8"));
                $userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$category = htmlentities(htmlentities($row['category'], ENT_QUOTES, "UTF-8"));
$total_comments = htmlentities(htmlentities($row['total_comments'], ENT_QUOTES, "UTF-8")); 
$total_likes = htmlentities(htmlentities($row['total_likes'], ENT_QUOTES, "UTF-8")); 
$total_unlikes = htmlentities(htmlentities($row['total_unlikes'], ENT_QUOTES, "UTF-8")); 
$total_rate = htmlentities(htmlentities($row['total_rate'], ENT_QUOTES, "UTF-8")); 
//$total_views = htmlentities(htmlentities($row['total_views'], ENT_QUOTES, "UTF-8"));
$images = htmlentities(htmlentities($row['image'], ENT_QUOTES, "UTF-8"));      
$microcontent = substr($description, 0, 100)."...";  
$title_micro = substr($title, 0, 27)."...";  
$country = htmlentities(htmlentities($row['country'], ENT_QUOTES, "UTF-8"));
$country_code = htmlentities(htmlentities($row['country_iso'], ENT_QUOTES, "UTF-8"));  
$status = htmlentities(htmlentities($row['status'], ENT_QUOTES, "UTF-8")); 
$paypal_email = htmlentities(htmlentities($row['paypal_email'], ENT_QUOTES, "UTF-8"));
$email = htmlentities(htmlentities($row['email'], ENT_QUOTES, "UTF-8"));
$price = htmlentities(htmlentities($row['price'], ENT_QUOTES, "UTF-8"));
$changevector = $row['@metadata']['@change-vector'];
$city = htmlentities(htmlentities($row['city'], ENT_QUOTES, "UTF-8"));
$state = htmlentities(htmlentities($row['state'], ENT_QUOTES, "UTF-8"));




            ?>

                <br><br><div class='postx col-sm-8 well'  style='display:inline-blockx;' id="postx_<?php echo $id; ?>">










<div class='row'>
<div class='col-sm-3'>

<a target='_blank' class='btn btn-primary btn-sm' title='View  Detail' href='products_profile.php?pageid=<?php echo $title_seo; ?>'>
<img class='pull-right img-rounded' style='border-style: solid; border-width:3px; border-color:#8B008B; width:200px;height:200px; 
max-width:200px;max-height:200px; min-width:200px;min-height:200px;' src='images/<?php echo $images; ?>' title='<?php echo $title; ?>' alt='<?php echo $title; ?>'>
</a>
</div>
    <div class='col-sm-1'></div>

<div class='col-sm-8'>

<a target='_blank' class='btn btn-primary btn-sm' title='View  Detail' href='products_profile.php?pageid=<?php echo $title_seo; ?>'>
<h3>Category:</b>  <?php echo $category; ?></h3>
<p class='title_css'></p><b>Title:</b>  <?php echo $title; ?><br>
<b>Price:</b> <span class='time_css2'><?php echo $price; ?> (USD)</span><br>
<b>Country Shipping Availability:</b> <?php echo $country; ?><br>
<b>State:</b> <?php echo $state; ?><br>
<b>City:</b> <?php echo $city; ?><br>


<span><b> <span style='color:#8B008B;' class='fa fa-calendar'></span>Time Posted:</b> <span data-livestamp="<?php echo $id;?>"></span> </span>
</a>




</div>
</div>



</div>
<?php } ?>










