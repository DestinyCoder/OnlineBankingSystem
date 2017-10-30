<?php
include '../dbconnect.php';
$database = new Database();
$db = $database->dbConnection();
try{
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset($_POST['remove'])) {
        $empid = $_POST['empid']; 
        $sql = "DELETE FROM employee WHERE empid=".$empid."";
        $db->exec($sql);
        echo '<script type="text/javascript">'; 
        echo 'alert("Employee removed succesfully");'; 
        echo 'window.location.href = "../admin555/searchemp.php";';
        echo '</script>';
      }
      
  }
catch(PDOException $e)
  {
  echo $sql . "<br>" . $e->getMessage();
  }
 //header("Location: ../admin555/validate.php");
?>
