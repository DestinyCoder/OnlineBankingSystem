<?php
 include('adminsession.php');
require_once 'class.admin.php';
$admin = new adminClass();
if(isset($_POST['submit']))
{
 $ename = trim($_POST['ename']);
 $egen = trim($_POST['radio']);
 $eadd = trim($_POST['eadd']);
 $esalary = trim($_POST['esalary']);
 $eemail = trim($_POST['eemail']);
 $emobile = trim($_POST['emobile']);
 $edob = trim($_POST['edob']);
 $stmt = $admin->runQuery("SELECT * FROM customer WHERE customerEmail=:email_id");
 $stmt->execute(array(":email_id"=>$cemail));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry !</strong>  email allready exists , Please Try another one
     </div>
     ";
 }
 else
 {
  if($admin->addemp($ename,$egen,$eadd,$esalary,$eemail,$emobile,$edob))
  {   
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee added succesfully");'; 
        echo 'window.location.href = "../admin555/adminhome.php";';
        echo '</script>';
  }
  else
  {
        echo '<script type="text/javascript">'; 
        echo 'alert("Error Occured! Try again");'; 
        echo 'window.location.href = "../admin555/addemp.php";';
        echo '</script>';
  }  
 }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add Employee</title>

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
    <link href="addstyle.css" rel="stylesheet"/>

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
                                <h4 class="title"><center>Enter Details</center></h4> 
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                    <form  name = "myForm" class="register_form" action="" method="post">
                <table> 
                    <tr>
                        <td><label><b>Name</b></label>
                        </td><td>:-</td>
                        <td><input class="register" type="text" name="ename" required> <br><br></td>
                    </tr>
                    <tr> 
                        <td><label><b>Mobile No</b></label></td>
                        <td>:-</td>
                        <td><input class="register" type="number" name="emobile" required> <br><br></td>
                    </tr>
                    <tr>
                        <td> <label><b>Email</b></label></td>
                        <td>:-</td>
                        <td><input class="register" type="Email" name="eemail" required> <br><br></td>
                    </tr>
                    <tr>

                        <td><label><b>Gender</b></label>
                        </td><td>:-</td>
                        <td> 
                            <input type="radio" name="radio" value="Male">Male&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="radio" value="Female">Female&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr> 
                        <td><label><b>Salary per annum</b></label></td>
                        <td>:-</td>
                        <td><input class="register" type="number" name="esalary" required> <br><br></td>
                    </tr>
                    <tr>
                        <td> <label><b>Date of Birth</b></label></td>
                        <td>:-</td>
                        <td><input class="register" type="Date" name="edob" required> <br><br></td>
                    </tr>
                    <tr>
                        <td> <label><b>Address</b></label></td>
                        <td>:-</td>
                        <td><input class="register" type="text" name="eadd" required> <br><br></td>
                    </tr>
                   </table>
                   <div class="button_register">
                        <button class="button1" id="register_button1" type="submit" name="submit"  ><span>Submit</span></button>
                        <button class="button1" id="register_button2" type="reset"><span>Reset</span></button>     
                    </div>
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
