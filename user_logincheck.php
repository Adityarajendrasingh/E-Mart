<?php

session_start();
include('dbconnection.php');
 	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql=("SELECT * FROM user WHERE email ='$email' AND password='$password'")	or die($mysqli->error);
	$result = mysqli_query($mysqli,$sql);
	$check = mysqli_fetch_array($result);
	if($check > 0)
	{
		$status= $check['status'];
		if($status == 'verified')
		{
			$_SESSION['msg'] = ' Successfully Login!!';
			$_SESSION['msg_status'] = 'success';
			header('location: /E-Mart/index.html');
			echo 'successfull';
		}
		else
		{
			$_SESSION['msg'] = "It's look like you haven't still verify your email !! - $email";
			$_SESSION['msg_status'] = 'info';
            header('location: user-opt.php');
        }
	}
	else
	{
		// echo json_encode($email);
		// $_SESSION['msg'] = 'Email or Password is incoorect!';
		// $_SESSION['msg_status'] = 'error';
	//	header('location:/E-Mart/index.html'); 
		//echo 'Incorrect Email ID or Password..';
	}
	if(isset($check)>0)
	{
		$_SESSION['Uname'] = $check['first_name'];
		$_SESSION['Lname'] = $check['last_name'];
		$_SESSION['Umobile'] = $check['mobile'];
		$_SESSION['Uemail']=$check['email'];
		$_SESSION['Uid']=$check['user_id'];
		$_SESSION['Ugender']=$check['gender'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		$status=1;
		$mysql=mysqli_query($mysqli,"INSERT INTO userlogs(uid,username,userip,status)VALUES(' ".$_SESSION['Uid']."','".$_SESSION['Uemail']."','$uip','$status')");
		exit();
		
	}
	