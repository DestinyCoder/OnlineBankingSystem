 <?php
session_start();  
include("../dbconnect.php");
include('class.admin.php');
$adminClass = new adminClass();
 
$errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
$adminname=$_POST['adminname'];
$adminpass=$_POST['adminpass'];
if(strlen(trim($adminname))>1 && strlen(trim($adminpass))>1 )
{
$adminid=$adminClass->adminLogin($adminname,$adminpass);
if($adminid)
{
$url=BASE_URL.'adminhome.php';
header("Location: $url"); // Page redirecting to home.php 
}
else
{
$errorMsgLogin="Wrong Credentials";
}
}
}

?> 
 

<!DOCTYPE html>
<html>
<head>
	<title>The World Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="images/icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/button_style.css">
</head>
<body>
	<div class="container" id="wrapper">
		<div id="white"></div>
		<header>
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3 hidden-xs">
					<a href="index.php"><img  id="logo" src="../images/logo.png" alt="The World Bank Logo" class="img-responsive img-rounded"></a>
				</div>
			<!--<div class="col-sm-9 col-md-9 col-lg-9">
					<h1 style="float: right;color: lightblue">World Bank</h1>
				</div>-->
			</div>
		</header>
 		<div class="features_area row" id="middle_box" style="padding: 0;">	
				<div class="admin_login">
				<center><h2 id="login_span">Admin Login</h2>
				
					<form action="" style="margin-top: 20px;" method="POST" >
						<label>Secrete Word</label><br>
 						<input type="text" class="login" name="adminname" required ><br>
  						<label>Secrete code</label><br>
  						<input type="Password" class="login" name="adminpass" required ><br><br>
 						<button class="button1" id="login_button1" type="submit" name="submit"><span>Login</span></button>
 				 		<button class="button1" id="login_button2" type="reset"><span>Reset</span></button>
					</form></center>
				</div> 
				<center>
					<br>
					<a class="extra" href="../index.php">Return to Home Page</a><br><br><br>
				</center>			 
			</div>
			
		<?php include '../inc/footer.php'; ?>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>