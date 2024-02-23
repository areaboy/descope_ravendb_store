<?php
//error_reporting(0); 
?>



<?php
session_start();
include ('descope_session_validate.php');
include ('settings.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid_d'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username_d'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo_d'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email_d'], ENT_QUOTES, "UTF-8"));

?>
<?php include('header_title.php') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

<title> Welcome <?php echo htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8")); ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="crackeddevs Remote Jobs" />







   <link rel="stylesheet" href="javascript/bootstrap.min.css">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/moment.js"></script>
    <script src="javascript/livestamp.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }
    </style>


<script>

// stopt all bootstrap drop down menu from closing on click inside
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});


</script>





</head>

<body>
<!-- start column nav-->


<div class="text-center">




<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo1.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">


 <li class="navgate_no"><a title='Back To Dashboard' href="dashboard.php" style="color:white;font-size:14px;">
<button class="category_post1">Back To Dashboard</button></a></li>



<li class="navgate" style='display:none;'>

<button  title="Post Products" data-toggle="modal" data-target="#myModal_post" class="category_post1"><i  style="color:white;font-size:10px;"></i>Post Products</button>

</li>


<li style='display:none;' class="navgate">

<button title="Products Search" data-toggle="modal" data-target="#myModal_search" class="category_post1"><i  style="color:white;font-size:10px;"></i>Products Search</button>

</li>

 <li class="navgate_no"><a title='My Store' href="profile_base.php" style="color:white;font-size:14px;">
<button class="category_post1">My Store</button></a></li>

 <li class="navgate_no"><a title='Logout' href="descope_logout.php" style="color:white;font-size:14px;">
<button class="category_post1">Logout</button></a></li>


             
<li class="navgate"><img style="max-height:60px;max-width:60px;" class="img-circle" width="60px" height="60px" src="uploads/<?php echo htmlentities(htmlentities($_SESSION['photo_d'], ENT_QUOTES, "UTF-8")); ?>" width="80px" height="80px">


<span class="dropdown">
  <a style="color:white;font-size:14px;cursor:pointer;" title='View More Data' class="btn1 btn-default1 dropdown-toggle"  data-toggle="dropdown"><?php echo htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8")); ?>
  <span class="caret"></span></a>

<ul class="dropdown-menu col-sm-12">
<li><a title='My Store' href="profile_base.php">My Store</a></li>
<li><a title='Logout' href="descope_logout.php">Logout</a></li>

</ul></span>

</li>



      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->






    </div><br /><br />

<!-- end column nav-->

<h3><center > <b style='color:#800000'>My Customers Products Orders and Payment System</b></center></h3>









<div class='row'>



<div class='col-sm-10'>

<p>


<!--start posts-->

<div class="container">

<?php


$ch2 = curl_init();
$url2 ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb_order where owner_id = '$userid_sess'\" \n}");

$headers2 = array();
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$result2 = curl_exec($ch2);

$json2 = json_decode($result2, true);
$TotalResults = $json2['TotalResults'];
$http_status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);

$totalcount = $TotalResults;




if (curl_errno($ch2)) {
   $curl_error2 = curl_error($ch2);
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Requet Error: $curl_error2</div><br>";
}


if($result2 ==''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($TotalResults == 0){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>No Order/Payments has been placed or Made on Your Products Yet..... </div>";

}


if($http_status2 ==200){
//echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>API Call Successfully Made...</div><br>";
}



curl_close($ch2);



echo '<table border="0" cellspacing="2" cellpadding="2" class="col-sm-12 table table-striped_no table-bordered table-hover"> 
      <tr> 
          <th> <font face="Arial">Name</font> </th> 
          <th> <font face="Arial">Email</font> </th> 
          <th> <font face="Arial">Product Name</font> </th>
 <th> <font face="Arial">Qty</font> </th>  
          <th> <font face="Arial">Price</font> </th> 
 <th> <font face="Arial">Total Amount</font> </th> 
          <th> <font face="Arial">Address</font> </th> 
<th> <font face="Arial">PostalCode</font> </th> 
<th> <font face="Arial">Country</font> </th> 
 <th> <font face="Arial">State</font> </th> 
 <th> <font face="Arial">City</font> </th> 
<th> <font face="Arial">Time</font> </th> 


      </tr>';



foreach ($json2['Results'] as $row){

                $product_name = htmlentities(htmlentities($row['product_name'], ENT_QUOTES, "UTF-8"));
                $timing = htmlentities(htmlentities($row['timeago'], ENT_QUOTES, "UTF-8"));
                $email = htmlentities(htmlentities($row['email'], ENT_QUOTES, "UTF-8"));
                $fullname =htmlentities(htmlentities($row['fullname'], ENT_QUOTES, "UTF-8"));
                $userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
$owner_id = htmlentities(htmlentities($row['owner_id'], ENT_QUOTES, "UTF-8"));
$qty = htmlentities(htmlentities($row['qty'], ENT_QUOTES, "UTF-8")); 
$product_sum = htmlentities(htmlentities($row['product_sum'], ENT_QUOTES, "UTF-8")); 
$address = htmlentities(htmlentities($row['address'], ENT_QUOTES, "UTF-8")); 
$country = htmlentities(htmlentities($row['country'], ENT_QUOTES, "UTF-8"));
$postalcode = htmlentities(htmlentities($row['postalcode'], ENT_QUOTES, "UTF-8"));  
$price = htmlentities(htmlentities($row['price'], ENT_QUOTES, "UTF-8"));
$city = htmlentities(htmlentities($row['city'], ENT_QUOTES, "UTF-8"));
$state = htmlentities(htmlentities($row['state'], ENT_QUOTES, "UTF-8"));



if($state){

$fx ="green_css";
$fs = "Paid";
}else{

$fx ="red_css";
$fs = "UnPaid";

}

$currency ='USD';

   echo "<tr> 
<td>$fullname</td>
<td>$email</td> 
                  <td>$product_name</td>  
<td>$qty</td>               
                  <td>$price($currency)</td>
<td>$product_sum($currency)</td>  
                  <td>$address</td> 
                  <td>$postalcode</td> 
 <td>$country</td> 
<td>$state</td> 
<td>$city</td> 
<td><span data-livestamp='$timing'></span></td> 
              </tr>";

           
}
?>

        </div>

<!--end posts-->


</p>


</div>


<div class='col-sm-0'>
</div>



</div>

</body>
</html>