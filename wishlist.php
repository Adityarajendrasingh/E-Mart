<?php
session_start();
include('dbconnection.php');
$id = $_GET['id'];
$sql = $mysqli->query("insert into  wishlist (user_id,item_id) values ('".$_SESSION['Uid']."','$id')");
if($sql)
{
		$_SESSION['msg'] = 'Add to your wishlist';
		$_SESSION['msg_status'] = 'success';
		header('location:/E-Mart/product.html?item_id='.$id);
		exit();
		echo $id;
}
//Display


?>