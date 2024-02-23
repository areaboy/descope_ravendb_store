<?php
//error_reporting(0); 
?>



<?php

include ('settings.php');


if($google_map_api_key == ''){
echo "<br><div style='background:red;color:white;padding:10px;'>Google Map API KEY is Empty. You can update it in <b>settings.php</b> file</div>";
exit();
}


if($site_url == ''){
echo "<div style='color:white;background:red;padding:6px;border:none'>Please Update Site Projects folder URL at <b>settings.php</b> file </div>";

exit();
}



// check if folder yseditor exist

$ckeditor_path ='yseditors/js/yseditor.js';
// Check if file already exists
if (file_exists($ckeditor_path)) {
//echo "<div>CKEditor already exist</div>";
}else{
echo "<div style='color:white;background:red;padding:6px;border:none'>ysEditor Folder is missing in the main application project.<br></div>";
exit(); 
}


?>
<?php include('header_title.php') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

<title> Descope & RavenDB Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Car Lenders & Borrowers System" />



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






 <li style='display:none;' class="navgate_no"><a target='_blank' title='Signup' href="signup.php" style="color:white;font-size:14px;">
<button class="category_post1">SignUp</button></a></li>

 <li style='display:none;' class="navgate_no"><a target='_blank' title='Login' href="login.php" style="color:white;font-size:14px;">
<button class="category_post1">Login</button></a></li>





      </ul>




    </div>
  </div>



</nav>


    </div><br />

<!-- end column nav-->










    </div><br />

<!-- end column nav-->

<h2><center > <b style='color:#800000'>Descope & RavenDB Store</b></center></h2>
<span style='display:nonex;'><?php echo $heading; ?></span>


<div class='row' style=''>


<div style='height:90px' class='col-sm-6 data_cssx'>
<p><b style='font-size:20px'>Descope Signup & Login Flow Via PHP<span style='color:red;'>(New)</span></b></p>

<p>
<a target='_blank' style='color:white;background:purple;border:none;padding:10px;' href='signup.php' title='Signup'> Signup </a>&nbsp;&nbsp;&nbsp;&nbsp;
<a target='_blank' style='color:white;background:purple;border:none;padding:10px;' href='login.php' title='Login'>Login </a>

</p>
</div>


<div style='height:90px' class='col-sm-6 data_cssx'>
<p><b style='font-size:20px'>Descope Signup & Login Flow via SDK </b></p>

<p>
<a target='_blank' style='color:white;background:purple;border:none;padding:10px;' href='descope_signup_login_flow.php' title='Users Signup'>Signup/Login with Descope Flow </a>


</p>
</div>
</div>

<br>


<center><img src='logo_sample.png' style='min-width:60%;max-width:60%;min-height:400px;max-height:400px;'></center>


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

</body>
</html>