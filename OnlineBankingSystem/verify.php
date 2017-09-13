<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
    $user->redirect('login.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];
 
    $statusY = "Y";
    $statusN = "N";
 
    $stmt = $user->runQuery("SELECT customerID,customerStatus FROM customer WHERE customerID=:uID AND tokenCode=:code LIMIT 1");
    $stmt->execute(array(":uID"=>$id,":code"=>$code));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
        if($row['customerStatus']==$statusN)
        {
            $stmt = $user->runQuery("UPDATE customer SET customerStatus=:status WHERE customerID=:uID");
            $stmt->bindparam(":status",$statusY);
            $stmt->bindparam(":uID",$id);
            $stmt->execute(); 
   
            $msg = "
                <div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>WoW !</strong>  Your Account is Now Activated : <a href='login.php'>Login here</a>
                </div>
                "; 
        }
        else
        {
            $msg = "
                <div class='alert alert-error'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>sorry !</strong>  Your Account is allready Activated : <a href='login.php'>Login here</a>
                </div>
                ";
        }
    }
    else
    {
        $msg = "
            <div class='alert alert-error'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>sorry !</strong>  No Account Found : <a href='register.php'>Register here</a>
            </div>
            ";
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
            </div>   
        </div>
       
        <?php include 'inc/footer.php'; ?>
    </div>
    <script type="text/javascript" src=""></script>
</body>
</html>                                                       
