<?php
 include 'connection.php';

 //necesarry include to get username
 // getting customer details  
 $cust_result = $conn->prepare("SELECT * FROM customer WHERE username = '".$username. "'");
 $cust_result->execute();
 $row_cust = $cust_result->fetch(); 
 /*
 we can ascess name by $row_cust["name"] and like this every column 
 */
 //getting account details 
 $acc_result = $conn->prepare("SELECT * FROM account WHERE account_no = '".$row_cust["account_no"]. "'");
 $acc_result->execute();
 $row_acc =$acc_result->fetch();

 /*
 we can ascess balance by $row_acc["balance"] and like this every column 

 */
 ?>