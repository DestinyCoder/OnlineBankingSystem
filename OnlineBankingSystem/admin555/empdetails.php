<?php
 include('adminsession.php');
require_once '../dbconnect.php'; 
$database = new Database();
$db = $database->dbConnection();
 
    $value=$_POST['search'];
    $row = $_POST['typetosearch']; 
    $emp_result = $db->prepare("SELECT * FROM employee WHERE ".$row." = '".$value. "'");
    $emp_result->execute();
    $row_emp = $emp_result->fetch();
    if ($row_emp < 1){
        echo '<script type="text/javascript">'; 
        echo 'alert("No Details Found");'; 
        echo 'window.location.href = "../admin555/searchemp.php";';
        echo '</script>';
 }
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <script type="text/javascript">
        function backpage(){
            window.location.href = "../admin555/searchemp.php"
        }
    </script>
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
    <link href="addstyle.css" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../index.php" class="simple-text">
                    WORLD BANK
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="adminhome.php"> 
                        <p>Home</p>
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
                    <a class="navbar-brand" href="adminhome.php">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--<ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>-->

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
                        <div class="card" >
                            <div class="header">
                                <h4 class="title"><center>Verify Customer</center></h4> 
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                    <form name="validcust" action="../inc/removeemp.php" method="POST">
                                        <table class="validatecust" style="width: 100%"> 
                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo $row_emp["empname"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Customer Id</td>
                                                <td><?php echo $row_emp["empid"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone No.</td>
                                                <td><?php echo $row_emp["empmobile"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>E-mail</td>
                                                <td><?php echo $row_emp["empemail"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td><?php echo $row_emp["empdob"] ?></td>
                                            </tr> 
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row_emp["empgender"] ?></td>
                                            </tr> 
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $row_emp["empadd"] ?></td>
                                            </tr>
                                            
                                        </table>
                                        <input type="hidden" name="empid" value="<?php echo htmlspecialchars($row_emp["empid"]); ?>">
                                        <button class="button1" id="login_button1" type="submit" name="remove" style="width: 300px;"><span>Remove Employee</span></button>
                                        <button class="button1" id="login_button1"  onclick="backpage()" ><span>Back</span></button>
                                    </form>
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

