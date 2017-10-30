<?php
 include '../dbconnect.php';

 //necesarry include to get username
 // getting customer details  
 $database = new Database();
		$db = $database->dbConnection();
		$trans_result = $db->prepare("SELECT * FROM transaction ORDER BY trans_date DESC");
		$trans_result->execute();
		$row_trans = $trans_result->fetchAll();
		/*we can ascess name by $row_trans["name"] and like this every column */
 /*
 we can ascess name by $row_trans["name"] and like this every column 
 */
 ?>