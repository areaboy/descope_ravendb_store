<?php 
include('settings.php');

?>

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


  <script src="https://unpkg.com/@descope/web-component@x.x.x/dist/index.js"></script>
  <script src="https://unpkg.com/@descope/web-js-sdk@x.x.x/dist/index.umd.js"></script>



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





      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->















<br><br>


<center>

<br><span style='font-size:20px;'>Descope Signup/Login Flow System</span><br><br>
</center>


    
  
        <div class="containerx">



            <div class="row">
<div class="col-sm-2"></div>

      <div class="col-sm-8">

             

 <p id="container"></p>


    <script>
$(document).ready(function(){
      const sdk = Descope({ projectId: '<?php echo $descope_project_id; ?>', persistTokens: true, autoRefresh: true });

      const sessionToken = sdk.getSessionToken()
      var notValidToken
      if (sessionToken) {
          notValidToken = sdk.isJwtExpired(sessionToken)
      }
      if (!sessionToken || notValidToken) {
          var container = document.getElementById('container');
          container.innerHTML = '<descope-wc project-id="<?php echo $descope_project_id; ?>" flow-id="sign-up-or-in"></descope-wc>';

          const wcElement = document.getElementsByTagName('descope-wc')[0];
          const onSuccess = (e) => {
            console.log(e.detail.user);
            //alert('refresh' +e.detail.refreshJwt);
            //alert('sess' +e.detail.sessionJwt);
            sdk.refresh();

// pass users Data to php backend for usage on app via ajax call
if(e.detail.user.loginIds !=''){

//alert('user Detail Successfully Retrieved from Descope');

//var emailx = e.detail.user.loginIds;
var emailx = e.detail.user.email;
var useridx = e.detail.user.userId;
var fullnamex = e.detail.user.name;
var sessionJwtx = e.detail.sessionJwt;
var refreshJwtx = e.detail.refreshJwt;


$('.loader_auth').fadeIn(400).html('<br><div style=color:black;background:#ddd;padding:10px;><img src=loader.gif style=font-size:20px> &nbsp;Please Wait!. Establishing Session and Login User In</div>');
var datasend = {useridx:useridx, emailx:emailx, fullnamex:fullnamex, sessionJwtx:sessionJwtx, refreshJwtx:refreshJwtx};
$.ajax({
			
			type:'POST',
			url:'descope_html_auth_ajax.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
                        //alert(msg);
                        $('.loader_auth').hide();
                        $('.result_auth').html(msg);
			
			}	
		});
}; // end if
          
          };
          const onError = (err) => console.log(err);

          wcElement.addEventListener('success', onSuccess);
          wcElement.addEventListener('error', onError);
      }

});
    </script>



<div class='loader_auth'></div>
<div class='result_auth'></div>


   






<br><br><br><br>



                </div>





<div class="col-sm-2"></div>
</div>


</div></body></html>


<script src="https://unpkg.com/@descope/web-js-sdk@x.x.x/dist/index.umd.js"></script>
<script>
  sdk.refresh();
</script>




















