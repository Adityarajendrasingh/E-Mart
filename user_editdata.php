<?php
include('dbconnection.php');
session_start();
		$id=$_SESSION['Uid'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$mobno = $_POST['mobile'];
		$gender = $_POST['genders'];
		$sql = $mysqli->query("update user set first_name = '$fname',last_name = '$lname',mobile='$mobno',gender='$gender' WHERE user_id = '$id' ") or die($mysqli->error);
		if($sql)
		{
			$_SESSION['Uname'] = $fname;
		$_SESSION['Lname'] = 	$lname;
		$_SESSION['Umobile'] = $mobno ;
		}
		echo json_encode($fname);

?>