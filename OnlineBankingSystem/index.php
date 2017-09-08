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
		<section id="content_area_section">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div id="carousel-banner" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-banner" data-slide-to="1"></li>
							<li data-target="#carousel-banner" data-slide-to="2"></li>
							<li data-target="#carousel-banner" data-slide-to="3"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="item active" style="height: 280px;"><img src="images/img1.png"></div>
							<div class="item" style="height: 280px;"><img src="images/img2.jpg"></div>
							<div class="item" style="height: 280px;"><img src="images/img3.jpg"></div>
							<div class="item" style="height: 280px;"><img src="images/img4.jpg"></div>
						</div>
					</div>
				</div>
			</div>
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
			<div class="row features_area">
				<div class="register">
					<h2><a href="Register.php">Register For NetBanking Now!!</a></h2> 
					<p>
						Now monitor, transact and control your bank account online through our net banking service. 
            			You can do multiple things from the comforts of your home or office with our Internet Banking - a one stop solution
             			for all your banking needs.You can now get all your accounts details, submit requests and undertake a wide range of transactions online. Our E-Banking service makes banking a lot more easy and effective.
            		</p>
            		<p id="features">Features</p>
            		<ul class="feature_list">
            			<li><span>Account Details</span><p>View your bank account details, account balance, download statements and more. Also view your Demat, 
                		Loan & Credit Card Account Details too all in one place.</p></li>

                		<li><span>Fund Transfer</span><p>Transfer fund to your own accounts,Other Gotham Bank accounts seamlessly.</p></li>

                		<li><span>Request Services</span><p>Give a request for Cheque book,Demand Draft,Stop Cheque Payment,Debit Card Loyalty Point Redemption etc.</p></li>

                		<li><span>Investment Services</span><p>View your complete Portfolio with the bank, Create Fixed Deposit, Apply for IPO.</p></li>

                		<li><span>Value Added Services</span><p>Pay Utility bills for more than 160 billers, Recharge Mobile, Create Virtual Cards, Pay any Visa Credit Card bills,Register for estatement and sms banking</p></li>
            		</ul>
            		<p>Register now for World Bank's internet banking service to get started and avail for you multiple utility services, all in a matter of a click. Getting started with our internet banking is real easy. All you need to do is follow a few simple steps and you are good to go. <a href="Register.php">Click here</a> for our registration process.</p>
					<p>We at the World Bank follow best-in-class online security practices in order to safeguard your information while you are banking online. We are constantly at task for preventing fraud and thereby making all your net banking transactions completely safe.</p>
            	</div>
         	</div>
		</section>
		<?php include 'inc/footer.php'; ?>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>
