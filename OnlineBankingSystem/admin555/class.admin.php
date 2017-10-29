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
		

 		 
		//$hash_password= hash('sha256', $adminpass); //Password encryption 
		  $hash_password= $password;
		$stmt = $this->conn->prepare("SELECT * FROM admin WHERE add_user=:adminname"); 
		$stmt->bindParam(":adminname", $usernameEmail,PDO::PARAM_STR) ;
		
		$stmt->execute();
		   $adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
   
     if($adminRow['add_pass']==$hash_password)
     {
      $_SESSION['adminid'] = $adminRow['adminid'];
      return true;
     }
	
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