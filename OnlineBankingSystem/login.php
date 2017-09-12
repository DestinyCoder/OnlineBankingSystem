<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
 $user_login->redirect('customer.php');
}

if(isset($_POST['submit']))
{
 $account = trim($_POST['account']);
 $cpass = trim($_POST['password']);
 
 if($user_login->login($account,$cpass))
 {
  $user_login->redirect('customer.php');
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/button_style.css">
</head>
<body>
	<div class="container" id="wrapper">
		<div id="white"></div>
		<header>
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-3 hidden-xs">
					<a href="index.php"><img  id="logo" src="images/logo.png" alt="The World Bank Logo" class="img-responsive img-rounded"></a>
				</div>
			<!--<div class="col-sm-9 col-md-9 col-lg-9">
					<h1 style="float: right;color: lightblue">World Bank</h1>
				</div>-->
			</div>
		</header>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar navbar-default">
					<div class="navbar-header hidden-sm hidden-md hidden-lg">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my_navbar">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html"></a><img id="logo" class="img-responsive img-rounded" src="images/logo.png" alt="The World Bank Logo">
					</div>
					<div class="collapse navbar-collapse" id="my_navbar" style="height: 0px">
						<ul class="nav navbar-nav" id="main_nav">
							<li><a href="index.php" role="button">Home</a></li>
							<li><a href="login.php" role="button">Login</a></li>
							<li><a href="branch.php" role="button">Branch</a></li>
							<li><a href="help.php" role="button">Help</a></li>
							<li><a href="contact.php" role="button">Contact Us</a></li>
							<li><a href="apply.php" role="button">Apply</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
 		<div class="features_area row" id="middle_box" style="padding: 0;">	
				<div class="row_login">
				<center><h2 id="login_span">Login</h2></center>
				
					<form action="process.php" style="margin-top: 20px;" method="POST" >
						<label>Account No.</label><br>
 						<input type="number" class="login" name="account" required ><br>
  						<label>Password:</label><br>
  						<input type="Password" class="login" name="password" required ><br><br>
 						<button class="button1" id="login_button1" type="submit" name="submit"><span>Login</span></button>
 				 		<button class="button1" id="login_button2" type="reset"><span>Reset</span></button>
					</form>
				</div> 
				<div class="mid_login">
					<br><br><br><br><br><br><br>
					<a class="extra" href="">Forgot Password</a><br><br><br>
					<a class="extra" href="">Forgot Username</a><br><br><br>
					<a class="extra" href="apply.php">New User?/Register</a><br><br>
				</div>
				 
					<img id="login_page_img" src="images/indeximg.jpg">
				 
			</div>
			<section id="content_area_section">
			<div class="row features_area">
				<div class="col-sm-12 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-comn">
					<div class="row">
						<div class="col-sm-3 col-md-3 col-lg-3 loan_area">
							<div class="loan_features">
								<span id="features_a"></span>
								<h3>Home Loan</h3>
								<p>@8.35%<sup>*</sup></p>
								<a href="">Apply Now <span class="apply_arrow"></span></a>
							</div>
							<span class="loan_separtor hidden-xs"></span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3 loan_area">
							<div class="loan_features">
								<span id="features_b"></span>
								<h3>Car Loan</h3>
								<p>@8.75%<sup>*</sup></p>
								<a href="">Apply Now <span class="apply_arrow"></span></a>
							</div>
							<span class="loan_separtor hidden-xs"></span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3 loan_area">
							<div class="loan_features">
								<span id="features_c"></span>
								<h3>Savings Bank </h3>
								<p>Online Account Opening</p>
								<a href="">Apply Now <span class="apply_arrow"></span></a>
							</div>
							<span class="loan_separtor hidden-xs"></span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3 loan_area">
							<div class="loan_features">
								<span id="features_d"></span>
								<h3>Personal Loan</h3>
								<p>SBI Loan Scheme</p>
								<a href="">Apply Now <span class="apply_arrow"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
 
		</section>
		<?php include 'inc/footer.php'; ?>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>