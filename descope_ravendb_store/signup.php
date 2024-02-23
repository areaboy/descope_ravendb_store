

<!DOCTYPE html>
<html lang="en">





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="javascript/bootstrap.min.css">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/bootstrap.min.js"></script>
    <script src="javascript/moment.js"></script>
    <script src="javascript/livestamp.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">




    <title>Descope & RavenDB Store</title>

</head>



<body>




    


    <div>

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
 <div class="navbar-header">
      <a class="navbar-brand" href="#" style='font-size:20px;color:white;'></a>
    </div>
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




 <li class="navgate_no"><a title='Home' href="index.php" style="color:white;font-size:14px;">
<button class="category_post1">Home</button></a></li>



 <li class="navgate_no"><a title='Login' href="login.php" style="color:white;font-size:14px;">
<button class="category_post1">Login</button></a></li>




      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->















<br><br>


<center>
<span style='font-size:20px;'>Users Signup System</span><br><br>
</center>




    
  
        <div class="container">



            <div class="row">
<div class="col-sm-2"></div>

      <div class="col-sm-8">
 <script>

function imagePreview(e) 
{
 var readImage = new FileReader();
 readImage.onload = function()
 {
  var displayImage = document.getElementById('imageupload_preview');
  displayImage.src = readImage.result;
 }
 readImage.readAsDataURL(e.target.files[0]);
}


            $(function () {
                $('#save_btn').click(function () {
                    var email = $('#email').val();
                    var fullname = $('#fullname').val();
                    var file_fname = $('#file_content').val();
                    var emailaddress_pot = $('#emailaddress_pot').val();

                    //preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");

var status ='users';


// start if validate
if(file_fname==""){
alert('please Select File to Upload');
}


else if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else if(fullname==""){
alert('please Enter Your Fullname');
}

else{
          var form_data = new FormData();
       form_data.append('file_content', $('#file_content')[0].files[0]);
          form_data.append('file_fname', file_fname);
          form_data.append('email', email);
          form_data.append('fullname', fullname);
          form_data.append('status', status);
          form_data.append('emailaddress_pot', emailaddress_pot);
                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
                    $('#loader').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Signup Data is being Submitted to Descope via Descope API</span>');
                    $.ajax({
                        url: 'descope_signup_action.php',
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
                                  upload_percent = Math.ceil(upload_position / upload_total * 100);
                                    $('.upload_progress').css('width', upload_percent + '%');

                                    $('.upload_progress').text(upload_percent + '%');



                                }
                            }, false);
                            return xhr;
                        },
                        success: function (msg) {
                                $('#box').val('');
				$('#loader').hide();
				$('.result_data').fadeIn('slow').prepend(msg);
				$('.alerts_fades').delay(8000).fadeOut('slow');
                                $('#save_btn').removeAttr('disabled');


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#file_fname').val('');
$('#email').val('');
$('#fullname').val('');
}




                        }
                    });
} // end if validate
                });
            });




        </script>
   
<style>
.upload_progress{
padding:10px;
background:green;
color:white;
cursor:pointer;
min-width:30px;
}

#imageupload_preview
{
max-height:200px;
max-width:200px;
}
</style>
<!--start form-->
<div class='well'>



<form id="" method="post">

<div class="form-group">
<label >Select Profile Photo: </label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content" name="file_content" accept="image/*" onchange="imagePreview(event)" />
 <img id="imageupload_preview"/>
</div>


<div class="form-group">
              <label>
<span class="fa fa-male"></span> FullName</label>
              <input type="text" class="col-sm-12 form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
            </div>

 <div class="form-group">
              <label>
<span class="fa fa-envelope-o"></span>Email</label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" placeholder="Enter email">
<div class="result1" id="email_check"></div>
            </div>



<style>
.secured_pot{ display:none; } /* hide because is spam protection */
</style>
<input class="secured_pot" type="text" name="emailaddress_pot" id="emailaddress_pot" />






                    <div class="col-sm-12 form-group">
                           <div class="upload_progress" style="width:0%">0%</div>

                        <div id="loader"></div>
                        <div class="result_data"></div>
                    </div>

                    <input type="button" id="save_btn" class="reg_btn_hide pull-right logme_btn btn btn-primary" value="Register" />
                </form>

<br><br>
</div>

<!--end form-->



<br><br><br><br><br><br>




                </div>





<div class="col-sm-2"></div>
</div>


</div></body></html>























