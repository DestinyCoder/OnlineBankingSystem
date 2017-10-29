<?php
require_once '../dbconnect.php';
class adminClass
{
	
	/* User Login */
	private $conn;
	 
	public function __construct()
	{
	  $database = new Database();
	  $db = $database->dbConnection();
	  $this->conn = $db;
	}
	public function runQuery($sql)
	{
	  $stmt = $this->conn->prepare($sql);
	  return $stmt;
	}   
	public function adminLogin($usernameEmail,$password){
		try{

 		 $database = new Database();
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
	catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }

}
	public function addemp($ename,$egen,$eadd,$esalary,$eemail,$emobile,$edob)
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO employee(empname,empgender,empadd,empsalary,empemail,empmobile,empdob)
                                                VALUES(:empname, :empgender, :empadd, :empsalary, :empemail, :empmobile,:empdob)");

            $stmt->bindparam(":empname",$ename);
            $stmt->bindparam(":empgender",$egen);
            $stmt->bindparam(":empadd",$eadd);
            $stmt->bindparam(":empsalary",$esalary);
            $stmt->bindparam(":empemail",$eemail);
            $stmt->bindparam(":empmobile",$emobile);
            $stmt->bindparam(":empdob",$edob);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
 
	/*public function showcname(){

  		$database = new Database();
		$db = $database->dbConnection();
		$cust_result = $db->prepare("SELECT * FROM customer WHERE accountStatus = '"."N". "'");
		$cust_result->execute();
		$row_cust = $cust_result->fetch();
		return $row_cust;
		/*we can ascess name by $row_cust["name"] and like this every column 
	}*/

}
?>