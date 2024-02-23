

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



 <li class="navgate_no"><a title='Signup' href="signup.php" style="color:white;font-size:14px;">
<button class="category_post1">Signup</button></a></li>




      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->















<br><br>


<center>

<br><span style='font-size:20px;'> Login System</span><br><br>
</center>




    
  
        <div class="container">



            <div class="row">
<div class="col-sm-2"></div>

      <div class="col-sm-8">

               <script>


//login starts
$(document).ready(function(){
                $('#login_btn').click(function () {
                 
                    var email = $('#email').val();
                   

                    //preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");

if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else{


          var form_data = new FormData();
          form_data.append('email', email);

                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
                    $('#loader').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Login Data is being Processed via Descope...</span>');
                    $.ajax({
                        url: 'descope_login_action.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                        success: function (msg) {
                                
				$('#loader').hide();
				$('.result_data').fadeIn('slow').prepend(msg);
                                $('.alerts_fades').delay(10000).fadeOut('slow');
                                $('#login_btn').removeAttr('disabled');


//$('#email').val('');


                        }
                    });
} // end if validate
                });
            });


// login ends here







        </script>
   


<!--start form-->
<div class='well'>

<form id="" method="post">
 <div class="form-group">
              <label>
<span class="fa fa-envelope-o"></span>Email</label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" placeholder="Enter email" value="">
            </div>

<br>



<div id="loader"></div>
                        <div class="result_data"></div>

                    <input type="button" id="login_btn" class="log_btn_hide pull-right logme_btn btn btn-primary" value="login Now" />
                </form>
<br><br>
</div>

<!--end form-->




<br><br><br><br>



                </div>





<div class="col-sm-2"></div>
</div>


</div></body></html>























