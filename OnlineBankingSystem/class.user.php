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
 
    public function apply($cname,$gen,$locat,$bcode,$cemail,$mobile,$account,$acctype) 
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO customer(customerName,gender,location,branchCode,customerEmail,mobile,customerAccount,acctype)
                                                VALUES(:customer_name, :gender, :location, :bcode, :customer_email, :mobile,:account,:acctype)");

            $stmt->bindparam(":customer_name",$cname);
            $stmt->bindparam(":gender",$gen);
            $stmt->bindparam(":location",$locat);
            $stmt->bindparam(":bcode",$bcode);
            $stmt->bindparam(":customer_email",$cemail);
            $stmt->bindparam(":mobile",$mobile);
            $stmt->bindparam(":account",$account);
            $stmt->bindparam(":acctype",$acctype);
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
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "worldofbank@gmail.com";
  $mail->Password = "world@123";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "worldofbank@gmail.com";
  $mail->FromName = "World Bank";
  
  $mail->addAddress($email);
  
  $mail->isHTML(true);
 
  $mail->Subject = $subject;
  $mail->Body = $message;
  $mail->AltBody = $message;

  if(!$mail->send())
  { 
    ob_end_clean();
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
    ob_end_clean();
  }
 } 
}