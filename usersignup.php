<?php
session_start();
include('dbconnection.php');
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gen'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobno = $_POST['mobileno'];
	$sql = $mysqli->query("UPDATE user set first_name = '$fname',last_name ='$lname',gender = '$gender',password = '$password',mobile='$mobno' where email = '".$_SESSION['email']."'")or die($mysqli->error);
	if($sql)
	{
		echo json_encode(['success'=>'User register successfully']);
		exit;
	}
	else
	{
		echo 'error';
		echo json_encode($fname);
	}
	
?>