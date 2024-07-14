<?php
include('dbconnection.php');
session_start();

//Add to cart
if(isset($_GET['item_id']))
	{
		$uid = $_SESSION['Uid'];
		$item_id = $_GET['item_id'];
		 $res = $mysqli->query("INSERT INTO cart (user_id,item_id,item_qty) VALUES ($uid,$item_id,1)") or die(mysql_error($mysqli));
		 if($res)
		 {
			 $_SESSION['msg']="Item added to your cart";
			 $_SESSION['msg_status']="success";
			 header('location:/E-Mart/cart.html');
		 }
		 else
		 {
			 echo 'something went wrong';
		 }
	
	}
	if(isset($_POST['item_id']))
	{
		$uid = $_SESSION['Uid'];
		$it_id = $_POST['item_id'];
		echo $it_id;
		 $res = $mysqli->query("INSERT INTO `cart` (user_id,item_id,item_qty) VALUES ('$uid','$it_id','1')") or die($mysqli->error);
		echo("INSERT INTO `cart` (user_id,item_id,item_qty) VALUES ('$uid','$it_id','1')");
		if($res)
		{
			echo"success";
				
		}
	}
	//remove from cart
if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		$item_name = $_GET['item_name'];
		echo $id;
		echo $item_name;
		
		$sql=$mysqli->query("DELETE FROM cart WHERE cart_id=$id") or die(mysql_error($mysqli));
		if($sql)
		{
			$_SESSION['msg'] = 'Succesfully removed '.$item_name.' from your cart';
			$_SESSION['msg_status'] = 'success';
			header('location:/E-Mart/cart.html');
			exit();
			
		}
		else
		{
			echo 'fail';
		}
		
	}
//Wishlist
if(isset($_GET['add']))
	{
		$item_id = $_GET['add'];
		//echo $item_id;
		$res = $mysqli->query("INSERT INTO wishlist (user_id,item_id) values ('".$_SESSION['Uid']."','$item_id')") or die(mysql_error($mysqli));
		 if($res)
		 {
		 	$_SESSION['msg'] = 'Added to your Wishlist';
			$_SESSION['msg_status'] = 'success';
			 header('location:/E-Mart/cart.html');
		 }
		 else
		 {
			 echo 'something went wrong';
		 }
	
	}
if(isset($_GET['remove']))
	{
		$id = $_GET['remove'];

		$res = $mysqli->query("DELETE FROM wishlist WHERE id = $id") or die(mysql_error($mysqli));
		 if($res)
		 {
		 	$_SESSION['msg'] = 'Removed from your Wishlist';
			$_SESSION['msg_status'] = 'success';
			 header('location:/E-Mart/cart.html');
		 }
		 else
		 {
			 echo 'something went wrong';
		 } 
	
	}
if(isset($_GET['add_prod']))
	{
		$item_id = $_GET['add_prod'];
		//echo $item_id;
		$res = $mysqli->query("INSERT INTO wishlist (user_id,item_id) values ('".$_SESSION['Uid']."','$item_id')") or die(mysql_error($mysqli));
		 if($res)
		 {
		 	$_SESSION['msg'] = 'Added to your Wishlist';
			$_SESSION['msg_status'] = 'success';
			 header('location:/E-Mart/product.html?'."item_id=".$item_id);
		 }
		 else
		 {
			 echo 'something went wrong';
		 }
	
	}
if(isset($_GET['r_prod']))
	{
		$id = $_GET['r_prod'];
		$i_id = $_GET['i_id'];
		$res = $mysqli->query("DELETE FROM wishlist WHERE id = $id") or die(mysql_error($mysqli));
		 if($res)
		 {
		 	$_SESSION['msg'] = 'Removed from your Wishlist';
			$_SESSION['msg_status'] = 'success';
			 header('location:/E-Mart/product.html?'."item_id=".$i_id);
		 }
		 else
		 {
			 echo 'something went wrong';
		 } 
		
	
	}

?>