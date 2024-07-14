<?php
session_start();
require('config.php');
include('dbconnection.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);
	$total = $_SESSION['total_amt'];
	$email = $_SESSION['Uemail'];
	$name = $_SESSION['Uname'];
	$token=$_POST['stripeToken'];
	$customer=\Stripe\Customer::create(array(
		"email" => $email, 
		"source"=>$token,
		
	));
	$data=\Stripe\Charge::create(array(
		"amount"=>$total*100,
		"currency"=>"inr",
		"description"=>"Emart Payment",
		"customer" => $customer->id
	));
	$payment_id =  $data->id;
	$trans_id = $data->payment_method;
	if($data)
	{
		$r=mt_rand(3,12);
		$d=strtotime("+$r Days");
		$da=date("d-m-Y", $d);
		$result = $mysqli->query("Update order_checkout set payment_type = 'Card/Debit Card/ATM Card',order_deliverydate = '$da' where user_id = '".$_SESSION['Uid']."'  ORDER BY id DESC LIMIT 1  ") or die($mysqli->error);
		$res = $mysqli->query("Select * from order_checkout where user_id = '".$_SESSION['Uid']."'order by id DESC") or die($mysqli->error);
		$row = mysqli_fetch_assoc($res);
		$order_id = $row['id'];
		$sql = $mysqli->query("INSERT INTO `card_payment`(`payment_id`, `user_id`, `order_id`, `total_amt`) VALUES('$trans_id','".$_SESSION['Uid']."','$order_id','$total')") or die($mysqli->error);
		if($sql)
		{
			$update_detail = $mysqli->query("Update order_checkout set payment_status ='Successful' where id = $order_id  ") or die($mysqli->error);
			$resu=$mysqli->query("DELETE FROM checkout where user_id ='".$_SESSION['Uid']."'") or die($mysqli->error);
			$_SESSION['msg']="Thankyou for your order";
			$_SESSION['msg_text']="we are currently processing your order.You can track your order under orderpage";
			$_SESSION['msg_status']="success";
			header('location:/E-Mart/myorder.html');
		}

		
	}

}
?>