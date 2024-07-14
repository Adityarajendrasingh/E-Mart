<?php
session_start();
include('dbconnection.php');

$_SESSION['Uemail']=='';
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
$datetime = date("Y-m-d H:i:s"); 
$timestamp = strtotime($datetime); 
$sql=mysqli_query($mysqli,"UPDATE userlogs  SET logout = '$ldate' WHERE uid = '".$_SESSION['Uid']."'  ORDER BY id DESC LIMIT 1") or die($mysqli->error);
if($sql)
{			
		//$_SESSION['msg'] = ' Successfully Logged out!!';
		//$_SESSION['msg_status'] = 'success';
		//header('location:/E-HealthCare/user_login.php');
		session_unset();
		session_destroy();
		header('location:/E-Mart/index.html');
}
//session_unset();
//session_destroy();


?>