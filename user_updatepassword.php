<?php
include('dbconnection.php');
session_start();
		$id=$_SESSION['Uid'];
		$opass = $_POST['opass'];
		$cpass = $_POST['cpass'];
		$cnpass = $_POST['cnpass'];
		$sql = $mysqli->query("update user set password = '$cnpass' WHERE user_id = '$id' ") or die($mysqli->error);
		if($sql)
		{
            $_SESSION['Uname'] = $fname;
            $_SESSION['Lname'] = 	$lname;
            $_SESSION['Umobile'] = $mobno ;
		}
		echo json_encode($fname);

?>