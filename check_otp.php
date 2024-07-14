<?php
session_start();
include('dbconnection.php');
	$otp = $_POST['otp'];
    if($_SESSION['user_otp']==$otp)
    {
        $update = $mysqli->query("UPDATE user set token = '0' , status = 'verified' where email='".$_SESSION['email']."'") or die($mysqli->error);
        echo json_encode(['success' => 'OTP verified successfully']);
    }
?>