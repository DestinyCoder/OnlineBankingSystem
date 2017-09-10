<?php
 include 'connection.php';
 include 'getdetails.php';
 // getting customer details  
 $cust_result = mysqli_query("SELECT * FROM customer WHERE username = '".mysql_real_escape_string($username). "'");
 $row_cust = mysqli_fetch_assoc($cust_result);
 /*
 we can ascess name by $row_cust["name"] and like this every column 
 */
 //getting account details 
 $acc_result = mysqli_query("SELECT * FROM account WHERE customer_id = '".mysql_real_escape_string($row_cust["customer_id"]). "'");
 $row_acc = mysqli_fetch_assoc($acc_result);
 /*
 we can ascess balance by $row_acc["balance"] and like this every column 
 */
 ?>