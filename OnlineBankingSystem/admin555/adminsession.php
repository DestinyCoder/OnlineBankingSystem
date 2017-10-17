<?php
if(!empty($_SESSION['adminid']))
{
$session_adminid=$_SESSION['adminid'];
include(' adminClass.php');
$adminClass = new adminClass();
}
if(empty($session_adminid))
{
$url= '../index.php';
header("Location: $url");
}
?>