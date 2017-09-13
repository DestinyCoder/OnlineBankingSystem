<?php

require_once 'dbconnect.php';

class USER
{ 

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
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
    public function apply($cname,$gen,$locat,$bcode,$cemail,$mobile,$account) 
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO customer(customerName,gender,location,branchCode,customerEmail,mobile,customerAccount)
                                                VALUES(:customer_name, :gender, :location, :bcode, :customer_email, :mobile,:account)");

            $stmt->bindparam(":customer_name",$cname);
            $stmt->bindparam(":gender",$gen);
            $stmt->bindparam(":location",$locat);
            $stmt->bindparam(":bcode",$bcode);
            $stmt->bindparam(":customer_email",$cemail);
            $stmt->bindparam(":mobile",$mobile);
            $stmt->bindparam(":account",$account);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
    public function getAccountNumber()
    {
        $rand = '';
        for ($i = 0; $i<5; $i++) 
        {
          $rand .= mt_rand(0,9);
        }
        return $rand;
    }
    public function register($account,$bcode,$cemail,$pass,$code) //preparing and inserting registration
    {
        try
        {
            $password = md5($pass);
            $stmt = $this->conn->prepare("UPDATE customer SET customerPass = :user_pass, tokenCode = :active_code WHERE customerAccount = :account");
            $stmt->bindparam(":user_pass",$password);
            $stmt->bindparam(":active_code",$code);
            $stmt->bindparam(":account",$account);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
 public function login($account,$cpass)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM customer WHERE customerAccount=:account");
   $stmt->execute(array(":account"=>$account));
   $customerRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($customerRow['customerStatus']=="Y")
    {
     if($customerRow['customerPass']==md5($cpass))
     {
      $_SESSION['customerSession'] = $customerRow['customerID'];
      return true;
     }
     else
     {
      header("Location: login.php?error1");
      exit;
     }
    }
    else
    {
     header("Location: login.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: login.php?error2");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 
 public function is_logged_in()
 {
  if(isset($_SESSION['customerSession']))
  {
   return true;
  }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  session_destroy();
  $_SESSION['customerSession'] = false;
 }
 
 function send_mail($email,$message,$subject)
 {      
  require_once('mailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress($email);
  $mail->Username="rajpurohitjitendra81@gmail.com";  
  $mail->Password="gmailpassword";            
  $mail->From='rajpurohitjitendra81@gmail.com';
  $mail->AddReplyTo("rajpurohitjitendra81@gmail.com","Jitendra Rajpurohit");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 
}