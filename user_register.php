<?php
session_start();
include('dbconnection.php');

//login 


if(isset($_POST['register']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobno = $_POST['mobno'];
	
	//checking for email 
	
	$emailquery = "select * from user where email = '$email' ";
	$query = mysqli_query($mysqli,$emailquery);
	$emailcount = mysqli_num_rows($query);
	
	if($emailcount>10)
	{
		$_SESSION['msg']="Email Id already Exists";
		$_SESSION['msg_status']="error";
	
		header("location:/E-Mart/index.html");
		//echo 'email exists';
	}
	else
	{
		$token =  rand(999999, 111111); 
		$status = "notverified";
		$sql = $mysqli->query("INSERT INTO user (first_name,last_name,gender,email,password,mobile,token,status) VALUES ('$fname','$lname','$gender','$email','$password',$mobno,'$token','$status')")  or die($mysqli->error);
		if($sql)
		{
			try
			{
				include ('sendmail_header.php');
				$message = 'Your verification code is' .$token;
				$mail->Subject = 'Email Activation OTP From E-Mart';
				$mail->Body = "<h3>Name : $fname $lname <br>Email: $email <br>Message : $message </h3>";
				if($mail->Send())
				{ 
					$_SESSION['msg'] = 'Check your mail for OTP to activate your account..!!';
					$_SESSION['msg_status'] = 'info';
								
					$_SESSION['email']=$email;
					$_SESSION['password'] = $password;
					header('location:/E-Mart/user_opt.php');
		
				}
			}
			catch(Exception $e)
			{
				$_SESSION['msg'] = $e->getMessage();
				$_SESSION['msg_status'] = 'error';
				header('location:/E-Mart/index.html');
				exit(); 
			}
		}
		else
		{
			$_SESSION['msg'] = 'Something went wrong..!!';
			$_SESSION['msg_status'] = 'info';
			header('location:/E-Mart/user_register.html'); 
		}
	}
}
//Email Verification via OTP checking for correct otp
if(isset($_POST['check']))
{
	$_SESSION['info'] = "";
	$otp_code = mysqli_real_escape_string($mysqli, $_POST['otp']);
	$check_code = "SELECT * FROM user WHERE token = $otp_code";
	$code_res = mysqli_query($mysqli, $check_code);
	if(mysqli_num_rows($code_res) > 0)
	{
		$fetch_data = mysqli_fetch_assoc($code_res);
		$fetch_code = $fetch_data['token'];
		$email = $fetch_data['email'];
		$code = 0;
		$status = 'verified';
		$update_otp = "UPDATE user SET token = '$token', status = '$status' WHERE token = $fetch_code";
		$update_res = mysqli_query($mysqli, $update_otp);
		if($update_res)
		{
			$_SESSION['msg']="Succussfully Register";
			$_SESSION['msg_status']="success";
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			header('location: user_login.html');
			exit();
		}
		else
		{
			$_SESSION['msg'] = 'something went wrong!!';
			$_SESSION['msg_status'] = 'error';
		}
	}
	else
	{
		$_SESSION['msg'] = 'Invalid code!!!';
		$_SESSION['msg_status'] = 'error';
	}
}

//Sending OTP on mail is user click on forgot password
  if(isset($_POST['check-email']))
  {
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$check_email = "SELECT * FROM user WHERE email='$email'";
	$run_sql = mysqli_query($mysqli, $check_email);
	if(mysqli_num_rows($run_sql) > 0)
	{
		$code = rand(999999, 111111);
		$insert_code = "UPDATE user SET token = $code WHERE email = '$email'";
		$run_query =  mysqli_query($mysqli, $insert_code);
		if($run_query)
		{
		 	try
			{
				
				include ('sendmail_header.php');
				
				$message = 'Your verification code is'.$code;
				$mail->Subject = 'Reset Password OTP';
				$mail->Body = "<h3>Name : $fname <br>Email: $email <br>Message : $message </h3>";
				if($mail->Send())
				{
					$_SESSION['msg'] = "We've sent a passwrod reset otp to your email - $email!!";
					$_SESSION['msg_status'] = 'info';
					
					$_SESSION['email']=$email;
					$_SESSION['password'] = $password;
					header('location:/E-Mart/user_resetcode.php');
					exit();
				}
			}
			catch(Exception $e)
			{
				$_SESSION['msg'] = $e->getMessage();
				$_SESSION['msg_status'] = 'error';
				header('location:/E-Mart/user_forgotpassword.php');
				exit();
			}

		  
		}
		else
		{
			 $_SESSION['msg'] = 'something went wrong!!';
			 $_SESSION['msg_status'] = 'error';
			 header('location:/E-Mart/user_forgotpassword.php');
			 exit();
		}
	}
	else
	{
		 $_SESSION['msg'] = "This email address does not exist!";
		 $_SESSION['msg_status'] = 'error';
		 header('location:/E-Mart/user_forgotpassword.php');
		 exit();
	}
  }
  //checking otp
  if(isset($_POST['check-reset-otp']))
  {
	$_SESSION['info'] = "";
	$otp_code = mysqli_real_escape_string($mysqli, $_POST['otp']);
	$check_code = "SELECT * FROM user WHERE token = $otp_code";
	$code_res = mysqli_query($mysqli, $check_code);
	if(mysqli_num_rows($code_res) > 0)
	{
		$fetch_data = mysqli_fetch_assoc($code_res);
		$email = $fetch_data['email'];
		$_SESSION['email'] = $email;
		$_SESSION['msg'] = "Please create a new password that you don't use on any other site.";
		$_SESSION['msg_status'] = 'info';
		header('location: user_newpassword.php');
		exit();
	}
	else
	{
		$_SESSION['msg'] = "You've entered incorrect code!";
		$_SESSION['msg_status'] = 'warning';
		header('location:/E-Mart/user_resetcode.php');
		exit();
	}
  }
  
  //changing password
  if(isset($_POST['change-password']))
  {
   
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$cpassword = mysqli_real_escape_string($mysqli, $_POST['cpassword']);
	if($password !== $cpassword)
	{
		$_SESSION['msg']  = "Confirm password not matched!";
		$_SESSION['msg_status'] = 'error';
		header("location:/E-Mart/user_newpassword.php");
		exit();
	}
	else
	{
		$code = 0;
		$email = $_SESSION['email']; //getting this email using session
		$update_pass = "UPDATE user SET token = $code, password = '$password' WHERE email = '$email'";
		$run_query = mysqli_query($mysqli, $update_pass);
		if($run_query)
		{
			
			$_SESSION['msg']="Your password changed. Now you can login with your new password.";
			$_SESSION['msg_status']="success";
			header("location:/E-Mart/user_login.html");
			exit();
			
		}
		else
		{
		   $_SESSION['msg']  = "Failed to change your password!";
		   $_SESSION['msg_status'] = 'error';
		   header("location:/E-Mart/user_newpassword.php");
		   exit();
		}
	}
}



?>