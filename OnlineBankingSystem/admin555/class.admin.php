<?php
require_once '../dbconnect.php';
class adminClass
{
	
/* User Login */

public function adminLogin($usernameEmail,$password)
{
try{
 $db = $database->dbConnection();
//$hash_password= hash('sha256', $adminpass); //Password encryption 
  $hash_password= $adminpass;
$stmt = $db->prepare("SELECT adminid FROM admin WHERE (add_user=:adminname) AND add_user =:hash_password"); 
$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_OBJ);
$db = null;
if($count)
{
$_SESSION['adminid']=$data->adminid; // Storing user session value
return true;
}
else
{
return false;
} 
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}
}
?>