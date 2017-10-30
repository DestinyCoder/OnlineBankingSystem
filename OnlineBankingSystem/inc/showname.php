<?php
 include '../dbconnect.php';

 //necesarry include to get username
 // getting customer details  
		$database = new Database();
		$db = $database->dbConnection();
		$row = $_SESSION['row_name'];
		$value = $_SESSION['value'];
		echo $row;
		echo $value;
		$cust_result = $db->prepare("SELECT * FROM customer WHERE ".$row." = '".$value. "'");
		$cust_result->execute();
		$row_cust = $cust_result->fetchAll();
		/*we can ascess name by $row_cust["name"] and like this every column */
 /*
 we can ascess name by $row_cust["name"] and like this every column 
 */
 ?>