<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('dbconnection.php');
	$email = $_POST['email'];
    $emailquery = "select * from user where email = '$email' ";
	$query = mysqli_query($mysqli,$emailquery);
	$emailcount = mysqli_num_rows($query);
	
	if($emailcount>5)
	{
		echo json_encode(['exists' => 'Email ID already exists in Database']);
	} 
	else
	{
		$token =  rand(999999, 111111); 
		$status = "notverified";
		$_SESSION['user_otp']=$token;
		$_SESSION['email']=$email;
		// $sql = $mysqli->query("INSERT INTO user (email,token,status) VALUES ('$email','$token','$status')")  or die($mysqli->error);
		$sql = $mysqli->query("INSERT INTO user (first_name, last_name, mobile, gender, password, email, token, status) VALUES ('', '', '', '', '', '$email', '$token', '$status')") or die($mysqli->error);

		if($sql)
		{
			try
			{
				include ('sendmail_header.php');
				$message = 'Your verification code is ' .$token;
				$mail->Subject = 'Email Activation OTP From E-Mart';
				$mail->Body = "<h3>Name : '' <br>Email: $email <br>Message : $message </h3>";
				if($mail->Send())
				{
					echo json_encode(['success' => 'OTP send successfully']);
				}

			}
			catch(Exception $e)
			{
				
				$update = $mysqli->query("Update user set token ='0',status='invalid' where email='$email'")  or die($mysqli->error);

				$_SESSION['msg'] = $e->getMessage();
				$_SESSION['msg_status'] = 'error';
				echo json_encode(['error' => $e->getMessage()]);
				exit;
				
			}
		}
		else
		{
			$_SESSION['msg'] = 'Something went wrong..!!';
			$_SESSION['msg_status'] = 'info';
			//header('location:/E-Mart/user_signup.html'); 
		}
	}
?>