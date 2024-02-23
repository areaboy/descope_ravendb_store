<?php
error_reporting(0); 
?>



<?php
session_start();
include ('descope_session_validate.php');
include ('settings.php');

$email_sess =  htmlentities(htmlentities($_SESSION['email_d'], ENT_QUOTES, "UTF-8"));
$userid_sess =  htmlentities(htmlentities($_SESSION['uid_d'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username_d'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo_d'], ENT_QUOTES, "UTF-8"));


?>
<?php include('header_title.php') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

<title> Welcome <?php echo htmlentities(htmlentities($_SESSION['fullname_d'], ENT_QUOTES, "UTF-8")); ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="" />


<link rel="stylesheet" href="yseditors/css/yseditor.min.css" />
<script src="yseditors/js/yseditor.min.js"></script>




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




<li class="navgate">

<button title="Post New <br> Products" data-toggle="modal" data-target="#myModal_post" class="category_post1"><i  style="color:white;font-size:10px;"></i>Post New <br> Products</button>

</li>


<li class="navgate">

<button title="Search Products" data-toggle="modal" data-target="#myModal_search" class="category_post1"><i  style="color:white;font-size:10px;"></i>Search <br>Products</button>

</li>



 <li class="navgate_no"><a target='_blank' title='Products Map Locations' href="products_google_mapping.php" style="color:white;font-size:14px;">
<button class="category_post1">Products Country <br>Map Locations</button></a></li>



 <li class="navgate_no"><a title='My Customers Orders' href="products_customers_order.php" style="color:pink;font-size:14px;">
<button class="category_post1">My Customers<br> Orders</button></a></li>


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

<h3><center > <b style='color:#800000'>Descope & RavenDB Store System</b></center></h3>




<style>
.upload_progress1{
padding:10px;
background:green;
color:white;
cursor:pointer;
min-width:30px;
}

#imageupload_preview1
{
max-height:200px;
max-width:200px;
}
</style>



<script>
function imagePreview1(e) 
{
 var readImage = new FileReader();
 readImage.onload = function()
 {
  var displayImage = document.getElementById('imageupload_preview1');
  displayImage.src = readImage.result;
 }
 readImage.readAsDataURL(e.target.files[0]);
}


           // $(function () {
$(document).ready(function(){

 var myEditor = new ysEditor();

               


                $('#save_btn1').click(function () {
                    var file_fname = $('#file_content1').val();

   
var title = $('#title').val();				
var country = $('.country_a').val();
var paypal_email = $('#paypal').val();
var category = $('#category').val();
var price = $('#price').val();
var state = $('#state').val();
var city = $('#city').val();

 var desc = document.querySelector("#hidden").value = myEditor.getHTML();
//alert(desc);

var str_c = desc;
var desc_counted = str_c.length;					

// start if validate

if(file_fname==""){
alert('Product Image cannot be Empty');
}

else if(title==""){
alert('Product Title cannot be Empty');
}
else if(desc==""){
alert('Product Description cannot be Empty');
}


else if(category==""){
alert('Products Category cannot be Empty');
}


else if(country==""){
alert('Product Country Name of Availability cannot be Empty');
}




else if(price==""){
alert('Price cannot be Empty');
}

//else if(!isNaN(price)){
else if(isNaN(price)){
alert('Price must be Numbers.....');
}


else if(paypal_email==""){
alert('Your Paypal Email Address cannot be Empty');
}

else{

var fname=  $('#file_content1').val();
var ext = fname.split('.').pop();
//alert(ext);

// add double quotes around the variables
var fileExtention_quotes = ext;
fileExtention_quotes = "'"+fileExtention_quotes+"'";

 var allowedtypes = ["PNG", "png", "gif", "GIF", "jpeg", "JPEG", "BMP", "bmp","JPG","jpg"];
    if(allowedtypes.indexOf(ext) !== -1){
//alert('Good this is a valid Image');
}else{
alert("Please Upload a Valid image. Only Images Files are allowed");
return false;
    }
	

          var form_data = new FormData();
          form_data.append('file_content', $('#file_content1')[0].files[0]);
          form_data.append('file_fname', file_fname);
		  form_data.append('title', title);
		  form_data.append('desc', desc);
		  form_data.append('category', category);
                  form_data.append('country',  country);
		  form_data.append('paypal_email',  paypal_email);
      form_data.append('price',  price);
form_data.append('state',  state);
form_data.append('city',  city);
      

          
                    $('.upload_progress').css('width', '0');
                    $('#btn1').attr('disabled', 'disabled');
                    $('#loader1').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Pls Wait. Products/Items is being Submitted...</span>');
                    $.ajax({
                        url: 'products_posts.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                        xhr: function () {
                      //var xhr = new window.XMLHttpRequest();
                            var xhr = $.ajaxSettings.xhr();
                            xhr.upload.addEventListener("progress", function (event) {
                                var upload_percent = 0;
                                var upload_position = event.loaded;
                                var upload_total  = event.total;

                                if (event.lengthComputable) {
                                    var upload_percent = upload_position / upload_total;
                                    upload_percent = parseInt(upload_percent * 100);
                                  //upload_percent = Math.ceil(upload_position / upload_total * 100);
                                    $('.upload_progress1').css('width', upload_percent + '%');
                                    $('.upload_progress1').text(upload_percent + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (msg) {
                                $('#box').val('');
				$('#loader1').hide();
				//$('.result_data1').fadeIn('slow').prepend(msg);
				$('.result_data1').html(msg);
				$('#alertdata_uploadfiles1').delay(5000).fadeOut('slow');
                                $('#alerts_reg1').delay(5000).fadeOut('slow');
                                $('#alertdata_uploadfiles21').delay(20000).fadeOut('slow');
                                $('#save_btn1').removeAttr('disabled');

								
//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#file_fname').val('');
}




                        }
                    });
} // end if validate
                });
            });

			
			
			</script>




<!-- posts modal starts here -->

<div id="myModal_post" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg modal-appear-center1 pull-right1 modaling_sizing1">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color:black;background:#c1c1c1">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Publish New Items</h4>
      </div>
      <div class="modal-body">
        <p>




<form id="" method="post">



<div class="form-group col-sm-12">
<label style="">Products/Items Image</label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content1" name="file_content1" accept="image/*" onchange="imagePreview1(event)" />
 <img id="imageupload_preview1"/>
</div><br>




<div class="col-sm-12 form-group">
<label>Products Title. </label><br>
<input  class="form-control " id="title" name="title" placeholder="Enter Title" type="text" required>
</div>

<div class="col-sm-12 form-group">
<label>Products Descriptions. </label><br>



 <div id="yseditor"></div>
    <input type="hidden" name="content" id="hidden" />

</div>



<div class="col-sm-12 form-group">
<b>Prducts Category</b><br>

<select  class="category form-control" id="category">
    <option value="">Select Products Category</option>

<?php
if(file_exists('products_category.json'))
{	
	$filenamex = 'products_category.json';
	$datax = file_get_contents($filenamex);
	$ds =  json_decode($datax, true);

foreach ($ds as $row) {
$items =$row['items'];    
    ?>
    <option value="<?php echo $items; ?>" ><?php echo $items; ?> </option>
   <?php
    }
}else{
	
echo "<div class='alerts_fades' style='background:red;padding:8px;color:white;border:none;'>products_category.Json File not Found.</div>";
}
    ?>
</select>


</div>




<div class="col-sm-12 form-group">
<b>Products Country Shipping Availability</b><br>

<select  class="country_a form-control" id="country_a">
    <option value="">Select Country</option>

<?php
if(file_exists('products_map_data.json'))
{	
	$filename = 'products_map_data.json';
	$data = file_get_contents($filename);
	$gmap_data =  json_decode($data, true);

foreach ($gmap_data as $rowz) {
$id =$rowz['id_gmaps_countries'];    
$country =$rowz['country'];
$country_code =$rowz['iso'];
    ?>
    <option value="<?php echo $country_code; ?>_<?php echo $country; ?>" ><?php echo $country; ?> </option>
   <?php
    }
}else{
	
echo "<div class='alerts_fades' style='background:red;padding:8px;color:white;border:none;'>Data.Json File not Found.</div>";
}
    ?>
</select>


</div>




<div style='display:none' class="col-sm-12 form-group">
<label>State of  Availability Eg. California</label><br>
<input type="text" class="form-control state" class="form-control" id="state" value='all'>

</div>
<br>



<div style='display:none' class="col-sm-12 form-group">
<label>City of Availability Eg. Los Angeles</label><br>
<input type="text" class="form-control city" class="form-control" id="city" value='all'>

</div>
<br>




<div class="col-sm-12 form-group">
<label>Product Price:(USD)</label><br>
<input type="text" class="form-control price" class="form-control" id="price" placeholder='Price Must be Number Only'>

</div>
<br>




<div class="col-sm-12 form-group">
<label>Sellers Paypal Email:</label><span style='color:red'>Your Paypal Email address for Recieving Payments</b></span><br>
<input type="text" class="form-control paypal" class="form-control" id="paypal" value='esedofredrick@gmail.com'>

</div>
<br>



<br>




                    <div class="form-group  col-sm-12">
                            <div class="upload_progress1  col-sm-12" style="width:0%">0%</div>

                        <div id="loader1"></div>
                        <div class="result_data1"></div>
                    </div>

                    <input type="button" id="save_btn1" class="category_post1" value="Publish Items/Products" />
    </form>



<!--end form-->


</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--  posts modal ends here -->








<script>

// clear Modal div content on modal closef closed
$(document).ready(function(){
$('#myModal_searchy').on('hidden.bs.modal', function() {
//alert('Modal Closed');
   $('.myform_clean_searchy').empty();  
 console.log("modal closed and content cleared");
 });
});

</script>



<script>


//  post Pagination starts

$(document).ready(function(){
            
      $(".loadmore_data").click(function(){
                

                    var row_limit = Number($('#row_limit').val());
                    var total_count = Number($('#total_count').val());
					var querytotal  = total_count;
                    var rowpage = 2;
                    row_limit = row_limit + rowpage;
					
					 if(row_limit >= querytotal){
               
                  alert('No More Post to Load');
$("#nomore_content_check").html("<div class='col-sm-12' style='background:red;color:white;padding:4px;bottom:0'>No More Post to Load <br> <center><button style='background:#3b5998;border:none;color:white;padding:10px;cursor:pointer' title='Refresh Page' class='reloadData'>Refresh Page</button></center> </div>");   
$('#loader_posts').hide();
                }

                    if(row_limit <= querytotal){
                        $('#row_limit').val(row_limit);
$("#loader_posts").fadeIn(400).html('<br><div style="color:black;background:#c1c1c1;padding:10px;"><img src="loader.gif">  Please Wait. Loading  Posts <i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');

                        $.ajax({
                            url: 'products_pagination.php',
                            type: 'post',
                            data: {row_limit:row_limit},
                            success: function(response){
                                $(".post:last").after(response).show().fadeIn("slow");
$('#loader_posts').hide();
                            }
                        });
                    }
                

            });
        
        });





   $(document).ready(function(){
//$(".reloadData").click(function(){
$(document).on( 'click', '.reloadData', function(){ 

location.reload();

});

});


// post Pagination ends



 

// post like starts




$(document).ready(function(){

 $(".plike_btn").click(function(){



     var post_id = this.id; 
     var id = post_id;
//alert(id);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-plike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item Liking in Progress.</div>');

$("#loader2-plike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_like.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='like_already'){
alert('You Already Like This Products/Items');
$("#loader-plike_"+id).hide();
$("#loader2-plike_"+id).hide();
}

if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}


if(msg=='success'){

                var like = data['like'];
               
$("#plike_total_"+id).text(like);


alert('Item Successfully Liked...');

$("#loader-plike_"+id).hide();
$("#loader2-plike_"+id).hide();
}



            }
        });

    });
});

// post like ends






// post like 2 starts




$(document).ready(function(){

 //$(".plike_btn2").click(function(){
$(document).on( 'click', '.plike_btn2', function(){ 


     var post_id = this.id; 
     var id = post_id;
//alert(id);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-plike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item Liking in Progress.</div>');
$("#loader2-plike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_like.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='like_already'){
alert('You Already Like This Products/Items');
$("#loader-plike_"+id).hide();
$("#loader2-plike_"+id).hide();
}


if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}

if(msg=='success'){

                var like = data['like'];
               
$("#plike_total_"+id).text(like);


alert('	Item Successfully Liked...');

$("#loader-plike_"+id).hide();
$("#loader2-plike_"+id).hide();
}



            }
        });

    });
});

// post like 2 ends






// post unlike starts




$(document).ready(function(){

 $(".punlike_btn").click(function(){



     var post_id = this.id; 
     var id = post_id;
//alert(id);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-punlike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item UnLiking in Progress.</div>');

$("#loader2-punlike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_unlike.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='unlike_already'){
alert('You Already UnLike This Products/Items');
$("#loader-punlike_"+id).hide();
$("#loader2-punlike_"+id).hide();
}


if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}

if(msg=='success'){

                var unlike = data['unlike'];
               
$("#punlike_total_"+id).text(unlike);


alert('Item Successfully UnLiked...');

$("#loader-punlike_"+id).hide();
$("#loader2-punlike_"+id).hide();
}



            }
        });

    });
});

// post unlike ends






// post unlike 2 starts




$(document).ready(function(){

 //$(".punlike_btn2").click(function(){
$(document).on( 'click', '.punlike_btn2', function(){ 


     var post_id = this.id; 
     var id = post_id;
//alert(id);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-punlike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item UnLiking in Progress.</div>');
$("#loader2-punlike_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_unlike.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='unlike_already'){
alert('You Already UnLike This Products/Items');
$("#loader-punlike_"+id).hide();
$("#loader2-punlike_"+id).hide();
}


if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}

if(msg=='success'){

                var unlike = data['unlike'];
               
$("#punlike_total_"+id).text(unlike);


alert('	Item Successfully UnLiked...');

$("#loader-punlike_"+id).hide();
$("#loader2-punlike_"+id).hide();
}



            }
        });

    });
});

// post unlike 2 ends






// post rating starts




$(document).ready(function(){

 $(".rating_btn").click(function(){

 var pid = this.id;
 var split_id = pid.split("_");

		var rating = split_id[1]; 
						
						
     var post_id = split_id[0]; 
     var id = post_id;
//alert(id);
//alert(rating);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-rating_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item Rating in Progress.</div>');

$("#loader2-rating_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_rating.php',
            type: 'post',
            data: {post_id:post_id, rating:rating},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='rating_already'){
alert('You Already Rated This Products/Items');
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}

if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}


if(msg=='internet_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}




if(msg=='success'){

                var rating = data['rating'];
               
$("#rating_total_"+id).text(rating);


alert('Item Successfully Rated...');

$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}



            }
        });

    });
});

// post rating ends






// post rating 2 starts




$(document).ready(function(){

 //$(".rating_btn2").click(function(){
$(document).on( 'click', '.rating_btn2', function(){ 


 
 var pid = this.id;
 var split_id = pid.split("_");

		var rating = split_id[1]; 
						
						
     var post_id = split_id[0]; 
     var id = post_id;
//alert(id);
//alert(rating);

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-rating_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Item Rating in Progress.</div>');
$("#loader2-rating_"+id).fadeIn(400).html('<div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"></div>');

        $.ajax({
            url: 'products_rating.php',
            type: 'post',
            data: {post_id:post_id, rating:rating},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='rating_already'){
alert('You Already Rated This Products/Items');
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}


if(msg=='curl_error'){
alert(data['msg2']);
$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}



if(msg=='success'){

                var rating = data['rating'];
               
$("#rating_total_"+id).text(rating);


alert('	Item Successfully Rated...');

$("#loader-rating_"+id).hide();
$("#loader2-rating_"+id).hide();
}



            }
        });

    });
});

// post rating 2 ends






</script>




<?php
// get total list of products from RavenDB For Data Pagination

$ch2 = curl_init();
$url2 ="$ravendb_database_url/databases/$ravendb_database_name/queries";
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');
//curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $users_tb where email = '$email'\" \n}");
curl_setopt($ch2, CURLOPT_POSTFIELDS, "{ \n    \"Query\":\"from $product_tb\" \n}");

$headers2 = array();
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$result2 = curl_exec($ch2);

$json2 = json_decode($result2, true);
$TotalResults = $json2['TotalResults'];
$http_status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);

$totalcount = $TotalResults;

$db_url = $json2['Url'];
$db_msg = $json2['Message'];


if($db_url !=''){
echo "<div class='alerts_fadesx' style='background:red;color:white;padding:10px;border:none;'><b>RavenDB Database Connection Error:</b>  
$db_msg. please  go to <b>(<a  style='color:white;' target='_blank' href='http://live-test.ravendb.net/studio/index.html#databases'>
http://live-test.ravendb.net/studio/index.html#databases</a>)</b> to create database First.. </div><br>";

}


if (curl_errno($ch2)) {
   $curl_error2 = curl_error($ch2);
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Requet Error: $curl_error2</div><br>";
}


if($result2 ==''){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



if($TotalResults == 0){
echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>No Products or Items Added Yet by users</div>";

}


if($http_status2 ==200){
//echo "<div class='alerts_fades' style='background:green;color:white;padding:10px;border:none;'>API Call Successfully Made...</div><br>";
}
curl_close($ch2);


?>



<style>
.car_css{

background:#800000;
padding:10px;
border:none;
color:white;
border-radius:20%;
font-size:16px;
text-align:center;
width:100%;
}


.car_css:hover{
background:orange;
color:black;

}


.cal_css{
color:white;

}


.car_css:hover{
background:orange;
color:black;

}


</style>

<div class='row'>

<div class='col-sm-2'>
<h3>All Sellers Products Category</h3>



<div  class="col-sm-12 form-group">



<?php
if(file_exists('products_category.json'))
{	
	$filenamexcar = 'products_category.json';
	$dataxcar = file_get_contents($filenamexcar);
	$dscar =  json_decode($dataxcar, true);

foreach ($dscar as $rowcar) {
$itemscar =$rowcar['items'];    
    ?>
<div class='col-sm-12 car_css'>
   
<a class='cal_css' target='_blank'  title='<?php echo $itemscar; ?>' href='products_category_all.php?products_id=<?php echo $itemscar; ?>' ><?php echo $itemscar; ?>
</a>
</div><br>



   <?php
    }
}else{
	
echo "<div class='alerts_fades' style='background:red;padding:8px;color:white;border:none;'>products_category.Json File not Found.</div>";
}
    ?>



</div>





</div>





<div class='col-sm-9'>

<p>


<!--start posts-->

<div class="container">

<?php




// Fetch Records from RavenDB Database for Pagination

if($totalcount  > 0){
} // totalcount if statement

$rowpage = 2;
$start = 0;

$ch = curl_init();
$url ="$ravendb_database_url/databases/$ravendb_database_name/docs?startsWith=$product_tb&start=$start&pageSize=$rowpage";
//$url ="$ravendb_database_url/databases/$ravendb_database_name/docs?matches=$product_tb&start=$start&pageSize=$rowpage";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
//$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 $result = curl_exec($ch);

$json = json_decode($result, true);
//$res_id = $json['Id'];


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//curl_close($ch);


if (curl_errno($ch)) {
   $curl_error = curl_error($ch);

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Curl Request Error: $curl_error</div><br>";
}



if($result ==''){

echo "<div class='alerts_fades' style='background:red;color:white;padding:10px;border:none;'>Please Ensure there is Internet Connection and Try Again...</div><br>";
exit();
}



foreach ($json['Results'] as $row){

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

//}




//curl_close($ch);






if($status == 'Active'){

$fx ="green_css";
$fs = "Post Approved";
}else{

$fx ="red_css";
$fs = "Post Pending Approval";

}



            ?>

                <div class='post col-sm-6 well'  style='display:inline-block;' id="post_<?php echo $id; ?>">

<?php
if($title){
?>




<div class='row'>

    
<div class='col-sm-12'>
<b style='color:#8B008B;font-size:14px;' >Owner: <?php echo $fullname; ?> </b><br>

<div title='Visit Owners Store For More Products' class='col-sm-12 time_css2' style='color:#824c4e;'>  <a  style="color:#8B008B;" href="profile_user.php?userid=<?php echo $userid;?>&identity=<?php echo $username;?>">
Visit Owners Store For More Products &nbsp;&nbsp;<i  style='display:none;color:#824c4e;font-size:30px;' class='fa fa-user'></i></a></div><br>

<img class='pull-right img-rounded' style='border-style: solid; border-width:3px; border-color:#8B008B; width:200px;height:200px; 
max-width:200px;max-height:200px; min-width:200px;min-height:200px;' src='images/<?php echo $images; ?>' title='<?php echo $title; ?>' alt='<?php echo $title; ?>'>
<br>


<p class='title_css'></p><h3> Title:</b>  <?php echo $title_micro; ?></h3>
<b>Category:</b> <?php echo $category; ?><br>
<b>Descriptions:</b> <?php echo $microcontent; ?><br>
<b> Price:</b> <span class='time_css2'><?php echo $price; ?> (USD)</span><br>
<b>Country Shipping Availability:</b> <?php echo $country; ?><br>
<b>State Shipping Availability:</b> <?php echo $state; ?><br>
<b>City Shipping Availability:</b> <?php echo $city; ?><br>
<span><b> <span style='color:#8B008B;' class='fa fa-calendar'></span>Created:</b>  <span data-livestamp="<?php echo $timing;?>"></span></span>
<br>
<br>


<!--start p-->
<div class-'row'>
<div class='col-sm-5 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'>

<span>
<span id="loader-plike_<?php echo $postid; ?>"></span>
<span style="font-size:26px;color:#800000;cursor:pointer;" class="plike_btn fa fa-thumbs-up time_css2" id="<?php echo $postid; ?>" title="Like">
&nbsp;<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
<span style='font-size:14px'>(<span id="plike_total_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)</span>
</span> 

<span id="loader-plike_no_<?php echo $postid; ?>"></span>
</span>


</div>


<div class='col-sm-5 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'>
<span>
<span id="loader-punlike_<?php echo $postid; ?>"></span>
<span style="font-size:26px;color:#800000;cursor:pointer;" class="punlike_btn fa fa-thumbs-down time_css2" id="<?php echo $postid; ?>" title="UnLike">
&nbsp;<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
<span style='font-size:14px'>(<span id="punlike_total_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)</span>
</span> 

<span id="loader-punlike_no_<?php echo $postid; ?>"></span>
</span>



</div>



<style>
.rt_css{
//background-color: #800000;
//font-size:20px;
//cursor:pointer;
}
.rt_css:hover {
background: grey;
}
</style>

<div class='col-sm-5 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'>
<p></p>
<p>
<span>
<span id="loader-rating_<?php echo $postid; ?>"></span>
<span style="font-size:20px;color:#800000;cursor:pointer;" class="rating_btn fa fa-star time_css2no rt_css" id="<?php echo $postid; ?>_1" title="1 Star">
<span id="<?php echo $postid; ?>"  style="color:#800000x;" /></span>
</span> 

<span style="font-size:20px;color:#800000;cursor:pointer;" class="rating_btn fa fa-star time_css2no rt_css" id="<?php echo $postid; ?>_2" title="2 Star">
<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
</span>

<span style="font-size:20px;color:#800000;cursor:pointer;" class="rating_btn fa fa-star time_css2no rt_css" id="<?php echo $postid; ?>_3" title="3 Star">
<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
</span>

<span style="font-size:20px;color:#800000;cursor:pointer;" class="rating_btn fa fa-star time_css2no rt_css" id="<?php echo $postid; ?>_4" title="4 Star">
<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
</span>

<span style="font-size:20px;color:#800000;cursor:pointer;" class="rating_btn fa fa-star time_css2no rt_css" id="<?php echo $postid; ?>_5" title="5 Star">
<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
</span>

<span style='font-size:14px'>(<span id="rating_total_<?php echo $postid; ?>"><?php echo $total_rate; ?></span>)</span>
</p>

</span>



</div>







<div class='col-sm-5 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'>

<span>
<a href='products_profile.php?pageid=<?php echo $title_seo;?>'>
<span style="font-size:26px;color:#800000;cursor:pointer;" class="comments_btn fa fa-comment time_css2" id="<?php echo $postid; ?>" title="Comments">
&nbsp; <span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
<span style='font-size:14px'>(<span id="pcomments_total_<?php echo $postid; ?>"><?php echo $total_comments; ?></span>)</span>


</span> </a>

<span id="loader-pcomments_<?php echo $postid; ?>"></span>
</span>


</div>










<div class='col-sm-5 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'>
<span style='color:#824c4e;'>  <a  title='View Details and Buy' style="color:#8B008B;" href="products_profile.php?pageid=<?php echo $title_seo;?>">
<b>View Details & Buy</b><i  style='color:#824c4e;font-size:30px;' class=''></i></a></span>
</div>

<div class='col-sm-6 time_css2x' style='border-radius:20%; border-style: groove;border-color: coral;border-width: 7px'><p>Share:





<a target='_blank' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>&quote=<?php echo $title; ?>">
<i class="fa fa-facebook pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true" title="Facebook" style="font-size:26px;color:#3b5998;cursor:pointer;"></i>
</a>
&nbsp;

<a  target='_blank' href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>">
<i class="fa fa-twitter pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true" title="Twitter" style="font-size:26px;color:#0b7dda;cursor:pointer;">
</i></a>
&nbsp;

<a  target='_blank' href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>">
<i class="fa fa-linkedin pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true"  title="LinkedIn" style="font-size:26px;color:#2196F3;cursor:pointer;"></i>
</a>
&nbsp;

<a style='display:none;' target='_blank' href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>&caption=<?php echo $title; ?>&tags=<?php echo $title; ?>">
<i class="fa fa-tumblr pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true" title="Tumblr" style="font-size:26px;color:#da190b;cursor:pointer;"></i>
</a>
&nbsp;
<a target='_blank' href="https://t.me/share/url?url=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>&text=<?php echo $title; ?>">
<i class="fa fa-telegram pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true" title="Telegram" style="font-size:26px;color:#0088cc;cursor:pointer;"></i>
</a>
&nbsp;
<a  target='_blank' href="https://wa.me/?text=<?php echo $site_url; ?>/share.php?title=<?php echo $title_seo; ?>">
<i class="fa fa-whatsapp pshare_btn"  id="<?php echo $postid; ?>" aria-hidden="true" title="Whatsapp" style="font-size:26px;color:#075E54;cursor:pointer;"></i>
</a>

</a>


</div>

</div>

<!--end p-->



</div>
</div>



<?php } ?>








                   
                </div>

            <?php
            }
            ?>
<div id="loader_posts" class="loader_posts col-sm-12"></div>
<div id="nomore_content_check"></div>
            <input type="hidden" id="row_limit" value="0">
            <input type="hidden" id="total_count" value="<?php echo $totalcount; ?>">

<br>
<center><button class='col-sm-12 loadmore_data btn btn-primary' title='Load More Products' > Load More Products From RavenDB</button></center><br>



        </div>

<!--end posts-->




</p>


</div>


<div class='col-sm-1'>
</div>



</div>









<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">
        <div class="col-sm-12">

<p class="footer_text1"><?php echo $header_tit; ?></p>
<p class="footer_text2"><?php include('footer_title.php'); echo $footer_tit1; ?></p>

        </div>



        </div>

</footer>

<!-- footer Section ends -->










<!-- Search Modal starts -->

<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal_search" role="dialog">
    <div class="modal-dialog modal-lg modal-appear-center1 modaling_sizingx">
      <div class="modal-content">
        <div class="modal-header" style="color:black;background:#c1c1c1">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">World Products Search Engine System</h4>
        </div>
        <div class="modal-body ">
         

<p>



          
<b>Different Ways of Searching For Products around the World</b>
<br>
<ul style='display:none;'>
<li>  
Search Products by Categories Eg. <b>Shirt, Trousers, Male_Shoes, Female_Shoes, Necklace, </b> etc.
</li>


<li>  
Search Products by  <b>Countries/Locations</b>
</li>



</ul>




<!--form START-->



        <script>


$(document).ready(function(){

$('.cars_catx').hide();
$('.cars_countryx').hide();
$('.cars_statex').hide();
$('.cars_cityx').hide();


$('.cars_cat').click(function(){
$('.cars_catx').show();	
$('.cars_countryx').hide();	
$('.cars_statex').hide();	
$('.cars_cityx').hide();	
});



$('.cars_country').click(function(){
$('.cars_countryx').show();
$('.cars_catx').hide();	
$('.cars_statex').hide();	
$('.cars_cityx').hide();
});


$('.cars_state').click(function(){
$('.cars_statex').show();
$('.cars_catx').hide();	
$('.cars_countryx').hide();	
$('.cars_cityx').hide();	
});


$('.cars_city').click(function(){
$('.cars_cityx').show();
$('.cars_catx').hide();	
$('.cars_countryx').hide();	
$('.cars_statex').hide();	
});


//$(".search_btn").keyup(function() {
$('.search_btncall').click(function(){

		
//var search_data = $(this).val();
//var search_data = $('#search_data').val();

var search_typex = $(".s_cars:checked").val();

var split_id = search_typex.split("-");
var search_type = split_id[0]; 
var id = split_id[1]; 
var search_data = $("#search_data_"+id).val();

if(search_type==undefined){
alert('Please Check Radio-box Car Lender Search to Perform.');
return false;
}


if(search_data==""){
alert('Search Content cannot be empty');	
		}
else{
$('#loader_search').fadeIn(400).html('<br><span class="well alerts alert-info"><img src="ajax-loader.gif" align="absmiddle">&nbsp;Please Wait, Your Data is being Searched Via RavenDB API..</span>');
var datasend = "search_data="+ search_data + "&search_type=" + search_type;


		
		$.ajax({
			
			type:'POST',
			url:'products_search.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
	                       //$('#search_data').val('');
				
                                $("#result_search").html(msg);
				$('#alerts_search').delay(5000).fadeOut('slow');
$('.alerts_fadesp').delay(8000).fadeOut('slow');
                                $('#loader_search').hide();			
			}
			
		});
		
		}
		
	})
					
});



// clear Modal div content on modal closef closed
$(document).ready(function(){
$('#myModal_search').on('hidden.bs.modal', function() {
//alert('Modal Closed');
   $('.myform_clean_search').empty();  
 console.log("modal closed and content cleared");
 });
});


        </script>



<br>



 <div class="form-group col-sm-12">
	 
<div class='col-sm-6 time_css'>
<input type="radio" id="s_cars" name="s_cars" value="cars_cat-1" class="s_cars cars_cat"/><b>Search Products by Category:</b><br>
Eg. Shirt, Trousers, Male_Shoes, Female_Shoes, Necklace etc.<br>
</div>

<div class='col-sm-6 time_css'>
<input type="radio" id="s_cars" name="s_cars" value="cars_country-2" class="s_cars cars_country"/>Search Products by  <b>Countries/Locations</b> Eg. <b>US,Canada, Germany & Many More</b> etc.
</div>



</div>











<br>

<b class='cars_catx'>Search Products by Category:</b><br>



<div class="col-sm-12 form-group cars_catx">

<select  class="search_btn cars_catx search_data form-control" name="search_data" id="search_data_1">
    <option value="">Select Products Category</option>

<?php
if(file_exists('products_category.json'))
{	
	$filenamex2 = 'products_category.json';
	$datax2 = file_get_contents($filenamex2);
	$ds2 =  json_decode($datax2, true);

foreach ($ds2 as $row2) {
$items =$row2['items'];    
    ?>
    <option value="<?php echo $items; ?>" ><?php echo $items; ?> </option>
   <?php
    }
}else{
	
echo "<div class='alerts_fades' style='background:red;padding:8px;color:white;border:none;'>products_category.Json File not Found.</div>";
}
    ?>
</select>


</div>





<b class='cars_countryx'>Search Products by  Countries/Locations</b>



<div class="col-sm-12 form-group cars_countryx">

<select  class="search_btn cars_countryx search_data form-control"  name="search_data" id="search_data_2">
    <option value="">Select Country</option>

<?php
if(file_exists('products_map_data.json'))
{	
	$filename2 = 'products_map_data.json';
	$data2 = file_get_contents($filename2);
	$gmap_data2 =  json_decode($data2, true);

foreach ($gmap_data2 as $rowz2) {
$id2 =$rowz2['id_gmaps_countries'];    
$country2 =$rowz2['country'];
$country_code2 =$rowz2['iso'];
    ?>
    <option value="<?php echo $country_code2; ?>_<?php echo $country2; ?>" ><?php echo $country2; ?> </option>
   <?php
    }
}else{
	
echo "<div class='alerts_fades' style='background:red;padding:8px;color:white;border:none;'>products_map_data.json File not Found.</div>";
}
    ?>
</select>


</div>







<br>
<button style='width:100%;' class='search_btncall btn btn-primary' title='search Car Lenders' > Search Now</button><br>
<br>
<div id="loader_search" class="myform_clean_search"></div>
<div  id="result_search" class='searching_res_no myform_clean_search'></div>  
              

<!--form ENDS-->


</p>





        </div>
        <div class="modal-footer" style="color:black;background:#c1c1c1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Search Modal ends -->



















</body>
</html>