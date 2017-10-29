<?php
    session_start();
    require_once('class.user.php');
    $reg_user = new user();
    $customerID = $_SESSION['customerSession'];
    $stmt = $reg_user->runQuery("SELECT * FROM customer WHERE customerID=:cid");
    $stmt->execute(array(":cid"=>$customerID));
    $customerRow=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $reg_user->runQuery("SELECT * FROM accounts WHERE customerID=:cid");
    $stmt->execute(array(":cid"=>$customerID));
    $accountRow=$stmt->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['submit'])) {
        $account = trim($_POST['account']);
        $amount = trim($_POST['amount']);
       // $transpass = trim($_POST['transpass']);
       // $transpass = md5($transpass);
       // if ($customerRow['transpass'] == $transpass) {
            $stmt = $reg_user->runQuery("SELECT * FROM customer WHERE customerAccount=:account");
            $stmt->execute(array(":account"=>$account));
            $receiverRow=$stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $reg_user->runQuery("SELECT * FROM accounts WHERE customerAccount=:account");
            $stmt->execute(array(":account"=>$account));

            $receiveraccount=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {
                $receiveramount = $amount + $receiveraccount['accountBalance'];
                $stmt = $reg_user->runQuery("UPDATE accounts SET accountBalance = :amount WHERE customerAccount=:account");
                $stmt->execute(array(":amount" => $receiveramount, ":account" => $account));
                $senderamount = $accountRow['accountBalance'] - $amount;
                $stmt = $reg_user->runQuery("UPDATE accounts SET accountBalance = :amount WHERE customerAccount=:account");
                $stmt->execute(array(":amount"=>$senderamount,":account"=>$customerRow['customerAccount']));
                $date = date('y-m-d');
                $stmt = $reg_user->runQuery("INSERT INTO transactions(paymentDate,sendId,receiveId,amount,paymentStat) 
                    VALUES(:paymentDate,:sendId,:receiveId,:amount,:stat)");
                $stmt->execute(array(":paymentDate"=>$date,":amount"=>$amount,":sendId"=>$customerRow['customerID'],":receiveId"=>$receiverRow['customerID'],":stat"=>'SUCCESS'));
    $stmt = $reg_user->runQuery("SELECT * FROM accounts WHERE customerID=:cid");
    $stmt->execute(array(":cid"=>$customerID));
    $accountRow=$stmt->fetch(PDO::FETCH_ASSOC);
                 $msg = "
                    <div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong>  Your Transaction is successfull.
                        Your Balance is ".$accountRow['accountBalance']."
                    </div>";
         //  }
          /*  else {
                $date = date('y-m-d');
                $stmt = $reg_user->runQuery("INSERT INTO transactions(paymentDate,sendId,receiveId,amount,paymentStat) 
                    VALUES(:transId,:paymentDate,:sendId,:receiveId,:amount,:stat)");
                $stmt->execute(array(":paymentDate"=>$date,":amount"=>$amount,":sendId"=>$customerRow['customerID'],":receiveId"=>$receiverRow['customerID'],":stat"=>FAILED));
                $msg = "
                    <div class='alert alert-error'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry !</strong>  Account doesn't exists , Please Check account number.
                    </div> ";


            } */

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
                            <li><a href="loan.php" role="button">Loan Details</a></li>
                            <li><a href="customize.php" role="button">Customize</a></li>
                            <li><a href="logout.php" role="button">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <section id="content_area_section">
            <div class="row features_area">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div style="align-content: center;">
                        <?php if(isset($msg)) echo $msg;  ?>

                        <h1>Transfer Money</h1>
                        <form  name = "myForm" class="register_form" action="" method="post">

                        <table>
                            <tr>
                                <td>Account no</td>
                                <td><input class="register" type="number" placeholder="Enter account number" name="account" required> <br><br></td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td><input class="register" type="number" placeholder="Enter amount to Transfer" name="amount" required> <br><br></td>
                            </tr>
                            <tr>
                                <td>Transaction Password</td>
                                <td><input class="register" type="password" placeholder="Enter transaction password" name="transpass"> <br><br></td>
                            </tr>
                        </table>
                        <div class="button_register">
                            <button class="button1" id="register_button3" type="submit" name="submit"  ><span>Transfer</span></button>
                            <button class="button1" id="register_button4" type="reset"><span>Reset</span></button>
                        </div>
                       </form> 

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