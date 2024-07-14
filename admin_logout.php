<?php

session_start();
session_start();
$_SESSION['msg'] = ' Successfully Logged out!!';
$_SESSION['msg_status'] = 'success';
		unset($_SESSION['email'] );
		unset($_SESSION['Admin_login'] );
		header('location:/E-Mart/admin_login.php');
		die();
?>