<?php
 include 'connection.php';
 //necesarry include to get username
 // getting customer details  
 $cust_result = mysqli_query($conn,"SELECT * FROM customer WHERE username = '".mysqli_real_escape_string($conn,$username). "'");
 $row_cust = mysqli_fetch_assoc($cust_result);
 /*
 we can ascess name by $row_cust["name"] and like this every column 
 */
 //getting account details 
 $acc_result = mysqli_query($conn,"SELECT * FROM account WHERE customer_id = '".mysqli_real_escape_string($conn,$row_cust["customer_id"]). "'");
 $row_acc = mysqli_fetch_assoc($acc_result);
 /*
 we can ascess balance by $row_acc["balance"] and like this every column 
 */
 ?>