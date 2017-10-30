<?php
include '../dbconnect.php';
$database = new Database();
$db = $database->dbConnection();
try{
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset($_POST['accept'])) {
        $custid = $_POST['custid'];
        $sql = "UPDATE customer SET accountStatus='Y' WHERE customerID=".$custid."";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        /*require_once '../class.user.php';
        $user = new USER();
        $cust  = $db->prepare("SELECT * FROM customer WHERE customerID=".$custid."");
        $cust ->execute();
        $row = $cust->fetchAll();
        $email = $row["customerEmail"];
        echo $email;

        $name = $row["customerName"];
        $account = $row_cust["customerAccount"];
        $subject = "Account accepted";
        $message = "Hello $name, Your Account has been Open In our Bank.<br /> For Online Banking service Register Using Following link <br /><br />
        <a href='localhost/OnlineBankingSystem/register.php'>click here to Register</a>
       <br /><br />
       Your account No is <b>$account<b><br /><br />
       thank you";
        $user->send_mail($email,$message,$subject);*/
        echo '<script type="text/javascript">'; 
        echo 'alert("Customer added succesfully ");'; 
        echo 'window.location.href = "../admin555/validate.php";';
        echo '</script>';
      }
      elseif (isset($_POST['reject'])) {
        $custid = $_POST['custid']; 
        $sql = "DELETE FROM customer WHERE customerID=".$custid."";
        $db->exec($sql);
        echo '<script type="text/javascript">'; 
        echo 'alert("Customer removed succesfully");'; 
        echo 'window.location.href = "../admin555/validate.php";';
        echo '</script>';
      }
      
  }
catch(PDOException $e)
  {
  echo $sql . "<br>" . $e->getMessage();
  }
 //header("Location: ../admin555/validate.php");
?>
