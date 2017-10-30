<?php
 // include('adminsession.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>HOME</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="styleadd.css" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" > 

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../index.php" class="simple-text">
                    WORLD BANK
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php"> 
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="validate.php"> 
                        <p>Validate Customer</p>
                    </a>
                </li>
                <li>
                    <a href="addemp.php"> 
                        <p>Add Employee</p>
                    </a>
                </li>
                <li>
                    <a href="viewtrans.php"> 
                        <p>View Transaction log</p>
                    </a>
                </li>
                <li>
                    <a href="searchcust.php"> 
                        <p>View/Remove Customer Details</p>
                    </a>
                </li>
                <li>
                    <a href="searchemp.php"> 
                        <p>View/Remove Employee Details</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="adminhome.php">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse"> 

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               LOGOUT
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="content" >
            <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-12">
                        <div class="card" style="height: 550px; margin-bottom: 0px">
                            <div class="header">
                                <h4 class="title"></h4> 
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                    <div class="row" ">
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute; left:  100px;" ><img src="icon/validate.ico" class="icondash"> 
                                          <a href="validate.php"> 
                                            <p>Validate Customer</p>
                                          </a>
                                        </div>
                                      </div>
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute; left: 250px;"> <img src="icon/addemp.ico" class="icondash"> 
                                            <a href="addemp.php"> 
                                                <p>Add Employee</p>
                                            </a>
                                        </div>
                                      </div>
                                      <div  class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6" >
                                        <div class="font-icon-detail" style="position:absolute; right: -350px;"><img src="icon/validate.ico" class="icondash"> 
                                            <a href="viewtrans.php"> 
                                                <p>View Transaction log</p>
                                            </a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute;  left:  100px;top: 150px"><img src="icon/viewcust.ico" class="icondash"> 
                                            <a href="searchcust.php"> 
                                                <p>View Customer Details</p>
                                            </a>
                                        </div>
                                      </div>
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute;  left: 250px;top: 150px""> <img src="icon/viewemp.ico" class="icondash"> 
                                            <a href="searchemp.php"> 
                                                <p>View Emoployee Details</p>
                                            </a>
                                        </div>
                                      </div>
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute;  right: -350px;top: 150px"><img src="icon/removecust.ico" class="icondash"> 
                                            <a href="searchcust.php"> 
                                                <p>Remove Customer</p>
                                            </a>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" style="position:absolute;  left: 410px;top: 300px"><img src="icon/removeemp.ico" class="icondash"> 
                                            <a href="searchemp.php">
                                                <p>Remove Employee</p>
                                            </a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <?php include '../inc/footer.php'; ?>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>
