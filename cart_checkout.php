<?php
include('dbconnection.php');
session_start();
if(isset($_GET['Uid']))
{
	$id = $_GET['Uid'];
	//$item_id = $_GET['item_id'];
	echo "Uid: ".$id;
	//echo "item_id: ".$item_id;
	//$result = $mysqli->query("select *from cart where user_id=$id");
//	$result = $mysqli->query("SELECT checkout.item_id,checkout.user_id,cart.item_id from checkout,cart")or die($mysqli->error);

	//$result = $mysqli->query("SELECT * from checkout where item_id = ("select item_id from cart where user_id = $id") ")or die($mysqli->error);
	//$sql = $mysqli->query("Insert into checkout (user_id, item_id) SELECT user_id, item_id FROM cart WHERE NOT EXISTS (SELECT item_id FROM cart where cart.item_id = checkout.item_id)")or die($mysqli->error);
	$sql = $mysqli->query("INSERT INTO checkout (user_id, item_id) SELECT cart.user_id, cart.item_id FROM cart  WHERE cart.item_id  NOT IN (SELECT item_id FROM checkout)") or die($mysqli->error);

	if($sql)
	{
		header('location:/E-Mart/checkout.php');
		echo 'success';
		die();
	}
	else
	{
		header('location:/E-Mart/cart.html');
		die();
	}


	//echo $result;
	//$check = mysqli_num_rows($result);
	//$re = mysqli_fetch_array($result);
	//echo $result;

	//echo $check;
	//foreach($re as $row )
	//{
	//	echo "row: ".$row;
	//}
	//echo $check;
   	//echo $check;
	/*if($check==0)
	{

		$res = $mysqli->query("insert into checkout (user_id,item_id,qty) select user_id,item_id,item_qty from cart ");
		if($res)
		{
			header('location:/E-Mart/checkout.php');
		}
		
	}

	else
	{
		header('location:/E-Mart/checkout.php');
		exit();
	} */
}
if(isset($_GET['ptb_id']))
{
	$id = $_GET['ptb_id'];
	$uid = $_SESSION['Uid'];
	$result = $mysqli->query("select * from checkout where id = '".$_SESSION['Uid']."' and item_id = $id");
	$re = mysqli_fetch_assoc($result);
	$check = mysqli_num_rows($result);
	if($check>1)
	{

		header('location:/E-Mart/checkout.php');
		exit();
	}
	else
	{
		$res = $mysqli->query("insert into checkout (user_id,item_id) VALUES($uid,$id)") or die(mysql_error($mysqli));
		if($res)
		{
			 header('location:/E-Mart/checkout.php');
			 die();
		}
	}
}



?>