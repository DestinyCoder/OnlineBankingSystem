<?php
 include 'connection.php';
 include 'getdetails.php';
 // getting all transaction details of the account 
 $trans_result = mysqli_query($conn,"SELECT * FROM transaction WHERE (sender = '".mysqli_real_escape_string($conn,$row_cust["account_no"])."' OR 															receiver = '".mysqli_real_escape_string($conn,$row_cust["account_no"])."')" );
 $row_trans = mysqli_fetch_assoc($trans_result);
 /*
  suppose we want to show amount tranfered in transaction we can show it by echo $row_trans["money"] and like this every column 
 */
 
 ?>