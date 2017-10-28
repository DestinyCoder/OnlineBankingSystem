<?php 
	session_start(); 
	require_once('class.user.php');
    $reg_user = new user();
    $customerID = $_SESSION['customerSession'];
    $stmt = $reg_user->runQuery("SELECT * FROM transactions WHERE sendId=:sid or receiveId = :rid");
    $stmt->execute(array(":sid"=>$customerID,":rid" => $customerID));
    $customerRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <li><a href="customer.php" role="button">My Account</a></li>
                            <li><a href="ministat.php" role="button">Mini Statement</a></li>
                            <li><a href="moneytransfer.php" role="button">Money Transfer</a></li>
                            <li><a href="" role="button">Loan Details</a></li>
                            <li><a href="" role="button">Customize</a></li>
                            <li><a href="logout.php" role="button">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <section id="content_area_section">
            <div class="row features_area">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Mini Statement</h1>
                    <div>
                        <table class="transtable">
                        	<tr class="transtr">
                        		<td class='transtd'>Transaction Id</td>
                        		<td class='transtd'>Payment Date</td>
                        		<td class='transtd'>Receiver Id</td>
                        		<td class='transtd'>Amount</td>
                        		<td class='transtd'>Status</td>
                        	</tr>
                        	<?php 
                        			foreach ($customerRow as $row) {
     									echo "<tr class='transtr'>";
     									echo "<td class='transtd'>".$row["transId"]."</td>";
     									echo "<td class='transtd'>".$row['paymentDate']."</td>";
     									echo "<td class='transtd'>".$row['receiveId']."</td>";
     									echo "<td class='transtd'>".$row['amount']."</td>";
     									echo "<td class='transtd'>".$row['paymentStat']."</td>";
       								}
    							echo "</table>";
							?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'inc/footer.php'; ?>
    </div>
    <script type="text/javascript" src=""></script>
</body>
</html>