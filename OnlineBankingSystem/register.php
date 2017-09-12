<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
 $reg_user->redirect('customer.php');
}


if(isset($_POST['submit']))
{
 $account = trim($_POST['account']);
 $bcode = trim($_POST['bcode']);
 $cemail = trim($_POST['email']);
 $pass = trim($_POST['pass']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM customer WHERE customerEmail=:email_id");
 $stmt->execute(array(":email_id"=>$cemail));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() != 1)
 {
  $msg = "
        <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry !</strong>  This email is not connected with your account. </br> Please use the email which you had used at the time of applying for account.
     </div>
     ";
 }
 else
 {
  if($reg_user->register($account,$bcode,$cemail,$pass,$code))
  {   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $cemail,
      <br /><br />
      Welcome to Coding Cage!<br/>
      To complete your registration  please , just click following link<br/>
      <br /><br />
      <a href='localhost/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
      <br /><br />
      Thanks,";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($cemail,$message,$subject); 
    $msg = "
     <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Success!</strong>  We've sent an email to $cemail.
                    Please click on the confirmation link in the email to create your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Registration is Unsuccessfull, Try once again";
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
 		<div class="features_area row">	
			<div class="row_register">
				<?php if(isset($msg)) echo $msg;  ?>
				<h1><center>Register For Netbanking</center></h1>
				<form  name = "myForm" class="register_form" action="" method="post">
				<table> 
					<tr>
						<td><label><b>Account No.</b></label>
						</td><td>:-</td>
						<td><input class="register" type="text" placeholder="Enter Your Name Here" name="account" required> <br><br></td>
					</tr>
					<tr> 
						<td><label><b>Branch code</b></label></td>
						<td>:-</td>
						<td><input class="register" type="text" placeholder="Enter Branch code" name="bcode" required></center><br><br></td>
					</tr>
					<tr>
						<td> <label><b>Email</b></label></td>
						<td>:-</td>
						<td><input class="register" type="Email" placeholder="Enter Email" name="email" required> <br><br></td>
					</tr>
					<tr>
						<td> <label><b>Password</b></label></td>
						<td>:-</td>
						<td><input class="register" type="password" placeholder="Enter Password" name="pass" required> <br><br></td>
					</tr>
    			   </table>
    			   <div class="button_register">
    			   		<button class="button1" id="register_button1" type="submit" name="submit"  ><span>Submit</span></button>
      					<button class="button1" id="register_button2" type="reset"><span>Reset</span></button>     
					</div>
				</form> 
			</div>	 
		</div>
			 
		<?php include 'inc/footer.php'; ?>
	</div>
	<script type="text/javascript" src=""></script>
</body>
</html>                                                       
