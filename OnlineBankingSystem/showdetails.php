<!DOCTYPE html>
<html>
<?php include 'inc/getdetails.php';?>
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
	<link rel="stylesheet" type="text/css" href="css/table.css">
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
 		<div class="features_area row" >	
		<center>
				<label class="show_detail_head">Personal Details</label><br><br>
				<div class="row_register" style="width: 80%; border: 1px solid #ddd;" >
				
				<table class="show_detail" style="width: 100%"> 
				<tr>
					<td>Name</td>
					<td><?php echo $row_cust["name"] ?></td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td><?php echo $row_cust["phone"] ?></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td><?php echo $row_cust["email"] ?></td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td><?php echo $row_cust["dob"] ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php echo $row_cust["gender"] ?></td>
				</tr> 
				<tr>
					<td>Address</td>
					<td><?php echo $row_cust["address"] ?></td>
				</tr>
				<tr>
					<td>Account No</td>
					<td><?php echo $row_acc["account_no"] ?></td>
				</tr>
				<tr>
					<td>Customer Id</td>
					<td><?php echo $row_cust["cust_id"] ?></td>
				</tr>
			</table>
			</div></center>	 
		</div>
			 
		<?php include 'inc/footer.php'; ?>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>
