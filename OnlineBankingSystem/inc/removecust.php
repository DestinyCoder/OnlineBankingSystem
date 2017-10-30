<?php
include '../dbconnect.php';
$database = new Database();
$db = $database->dbConnection();
try{
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset($_POST['remove'])) {
        $custid = $_POST['custid']; 
        $sql = "DELETE FROM customer WHERE customerID=".$custid."";
        $db->exec($sql);
        echo '<script type="text/javascript">'; 
        echo 'alert("Customer removed succesfully");'; 
        echo 'window.location.href = "../admin555/searchcust.php";';
        echo '</script>';
      }
      
  }
catch(PDOException $e)
  {
  echo $sql . "<br>" . $e->getMessage();
  }
 //header("Location: ../admin555/validate.php");
?>
