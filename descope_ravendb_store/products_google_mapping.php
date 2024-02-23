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




<li style='display:none;' class="navgate">

<button title="Post Products" data-toggle="modal" data-target="#myModal_post" class="category_post1"><i  style="color:white;font-size:10px;"></i>Post Products</button>

</li>


<li style='display:none;' class="navgate">

<button title="Products Search" data-toggle="modal" data-target="#myModal_search" class="category_post1"><i  style="color:white;font-size:10px;"></i>Products Search</button>

</li>

 <li class="navgate_no"><a title='Dashboard' href="dashboard.php" style="color:white;font-size:14px;">
<button class="category_post1">Back To Dashboard</button></a></li>

 <li class="navgate_no"><a title='My Store' href="profile_base.php" style="color:white;font-size:14px;">
<button class="category_post1">My Store</button></a></li>


             
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







<?php

if($google_map_api_key == ''){
echo "<br><div style='background:red;color:white;padding:10px;'>Google Map API KEY is Empty. You can update it in settings.php file</div>";
exit();
}



?>


    </div><br /><br />

<!-- end column nav-->

<h3><center > <b style='color:#800000'>Find Products & Its Shippings Locations on Google Map</b></center></h3>






<center><div id="loader_map"></div></center>

    <div id="map-canvas" style="width: 100%;height: 100%;"></div>













<div class="container_page">

  <div class="modal fade " id="myModal_jobs_mapping" role="dialog">
    <div class="modal-dialog modal-lg modal-appear-center1 pull-right1 modaling_sizing1">
      <div class="modal-content">
        <div class="modal-header" style="color:black;background:#c1c1c1">
 <button type="button" class="pull-right btn btn-default" data-dismiss="modal">Close</button>
      <h4 class="modal-title">Products Countries World Mapping</h4>
        </div>
        <div class="modal-body">






<div id="content"></div>


<div class='col-sm-12' style='background:#ddd;color:black;padding:10px;border-style: dashed; border-width:2px; border-color: orange;'>
                        <div id="loaderxv"></div>
                        <div id="resultxv"></div>


<br>



</div><br><br>

<br><br>

<!--form ENDS-->


        </div>
        <div class="modal-footer" style="color:black;background:#c1c1c1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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





    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_map_api_key; ?>"></script>





    <script>
$( document ).ready(function() {
$('#loader_map').fadeIn(400).html('<br><br><div class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Pls Wait. Loading Products Locations on Google  Map ...</div>');
            let countries = [];
            let mapOptions = {
                zoom: 3,
                minZoom: 1,
                center: new google.maps.LatLng(50.7244893,3.2668189),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                backgroundColor: 'none'
            };
            let map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            init();
            function init() {
//$('#loader_map').fadeIn(400).html('<br><br><div class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Pls Wait. Loading Products Locations on Google  Map...</div>');

                $.ajax({
                    url : 'products_map_data.json',
                    cache : true,
                    dataType : 'json',
                    async : true,
                    success : function(data) {
                        if (data) {
                            $.each(data, function(id,country) {

                                var countryCoords;
                                var ca;
                                var co;

                                if ('multi' in country) {

                                    var ccArray = [];

                                    for (var t in country['xml']['Polygon']) {

                                        countryCoords = [];

                                        co = country['xml']['Polygon'][t]['outerBoundaryIs']['LinearRing']['coordinates'].split(' ');

                                        for (var i in co) {

                                            ca = co[i].split(',');

                                            countryCoords.push(new google.maps.LatLng(ca[1], ca[0]));
                                        }

                                        ccArray.push(countryCoords);
                                    }

                                    createCountry(ccArray,country);

                                } else {

                                    countryCoords = [];

                                    co = country['xml']['outerBoundaryIs']['LinearRing']['coordinates'].split(' ');

                                    for (var j in co) {

                                        ca = co[j].split(',');

                                        countryCoords.push(new google.maps.LatLng(ca[1], ca[0]));
                                    }

                                    createCountry(countryCoords,country);
                                }
                            }.bind(this));

                            showCountries();
$('#loader_map').hide();

                        }
                    }.bind(this)
                });
            }

            function showCountries() {
                for (var i=0; i<countries.length; i++) {
                    countries[i].setMap(map);

                    google.maps.event.addListener(countries[i],"mouseover",function(){
                        this.setOptions({fillColor: "#f5c879", 'fillOpacity': 0.5});
                    });

                    google.maps.event.addListener(countries[i],"mouseout",function(){
                        this.setOptions({fillColor: "#f5c879", 'fillOpacity': 0});
                    });

                    google.maps.event.addListener(countries[i], 'click', function(event) {
                       // alert(this.title+' ('+this.code+')');
$('#myModal_jobs_mapping').modal('show');

 var map_data = "<div style='background:#c1c1c1; border-bottom: 2px dashed purple;'>" +
"<div style='background:fuchsia;color:white;padding:10px;'>Finds Products Locations on Google  Map</div><br />" +
"<span><b>Country Name:</b> " + this.title + "</span><br />" +
"<span><b>Country code:</b> " + this.code + "</span><br />" +

                    "</div>";

$('#content').html(map_data);


// start ajaxcall


           // $(function () {
               
                   
               
var countryx = this.title;
var country_code = this.code

//alert(countryx);
//alert(country_code);

// start if validate
if(country_code==""){
alert('Selected Country Code cannot be Empty. Please Refresh the Page');
}
else if(countryx==""){
alert('Selected Country Name cannot be Empty. Please Refresh the Page');
}

else{
          var form_data = new FormData();
		  form_data.append('countryx', countryx);
                   form_data.append('country_code', country_code);
          
                    $('#loaderxv').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Pls Wait. Selected Products Country Details is being Loaded...</span>');
                    $.ajax({
                        url: 'products_map_ravendb_calls.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                       
                        success: function (msg) {
				$('#loaderxv').hide();
				$('#resultxv').html(msg);
				
                        }
                    });
}
               // });
          





// ends ajaxcall

                    });
                }
            }

            function createCountry(coords, country) {
                var currentCountry = new google.maps.Polygon({
                    paths: coords,
                    //strokeColor: 'white',
                    title: country.country,
                    code: country.iso,
                    strokeOpacity: 0,
                    //strokeWeight: 1,
                    //fillColor: country['color'], // can be used as default color
                    fillOpacity: 0
                });

                countries.push(currentCountry);
            }

        });




    </script>









</body>
</html>