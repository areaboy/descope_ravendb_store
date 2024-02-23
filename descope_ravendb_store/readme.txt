Descope & RavenDB Store

An interactive Online Store that Connects Products Buyers and Sellers around the world Powered by Descope, RavenDB, Paypal Payment Gateways, ysEditor, Google Maps etc..


How To Test the Application locally:

This application was built with Descope, RavenDB, ysEditor, Google Maps, PHP, Ajax, JQUERY, Bootstraps, Css, Mysql etc.

 
1.) Visit http://live-test.ravendb.net/studio/index.html#databases to create Database Eg test_db.


2.) You will need Xampp Server.  Ensure that Apache Server has been started from Xampp Control Panel


3.) Edit settings.php file to  add Descope Project ID Credentials, RavenDB Database Details, Google Javascript Map API Keys and  also configure your apps projects url where appropriates.


4.) Callup the application on the browser Eg http://localhost/descope_ravendb_store/index.php


5 .) Click on Signup Form to get registered. Click on Login Form to access the aplications.







 How we built it

This Application was built with <b>Descope, RavenDB, Curl, PHP, GoogleMap, yseditor, Bootstrap, Jquery-Ajax </b> and much more.

Descope

I Integrated, 2 options for Signing Up and Login into the application via Descope

1.) Signup & Login by Descope Flow via SDK.

FrontEnd Flow Integration:   https://docs.descope.com/build/guides/gettingstarted/

 This is handle by just 2 files descope_signup_login_flow.php  & descope_html_auth_ajax.php



2.) Signup & Login via One Time Password OTP:


   Here is the list of API Used:

Users Signup: https://docs.descope.com/api/openapi/otp/operation/UserSignupOtpEmail/

Users Login: https://docs.descope.com/api/openapi/otp/operation/UserSigninOtpEmail/

Users Signup/Login Email OTP Verification: https://docs.descope.com/api/openapi/otp/operation/VerifyOtpEmail/

<b>Users Session Validation:</b> to ensure this session validation, I ensured that descope_session_validate.php file is dynamicaly called on every page
accessed by Users..

https://docs.descope.com/api/openapi/session/operation/ValidateSession/

Users Signout:  https://docs.descope.com/api/openapi/session/operation/Logout/





RavenDB


RavenDB Database is used to create and manage all data on the platform:

items table/Collection: used to store and query Products Data.
likes table/Collection: used to store and query like data on each published products.
unlikes table/Collection: used to store and query unlike data on each published products.
ratings table/Collection: used to store and query ratings data on each published products.
comments table/Collection: used to store and query comments/Reviews data on each published products.
orders table/Collection: used to store and query orders and payments data placed on each published products.


I leverage RavenDB Restful Client API Below.


https://ravendb.net/docs/article-page/6.0/csharp/client-api/rest-api/document-commands

https://ravendb.net/docs/article-page/6.0/csharp/client-api/rest-api/queries



HTML5 Rich-Text Editor Used:

https://github.com/yusufsefasezer/ysEditor.js




Google Map Integration:

This help Users to easily locate all the nearby products shippable to users country/geolocations on Google Map



Paypal Payments Integration

This help Users to easily order and make payments to products Sellers via Paypal Payments Gateways



What I need to see Improved on RavenDB API

rest-api/queries does not currently supports Inserts and Update Statements. We will like those features in future.. 

