<?php
include('dbconnection.php');
session_start();
//Insert
//if(isset($_POST['pcode']))
//{
	$pcode = $_POST['pcode'];
	$locality = $_POST['locality'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$landmark = $_POST['landmark'];
	
	$mobile2 = $_POST['mobile2'];
	$addrtype = $_POST['addrtype'];
	echo $address;

	echo $pcode;

	$sql=$mysqli->query ("INSERT INTO user_address (user_id,pcode,locality,address,city,state,landmark,mobile2,addrtype) VALUES ('".$_SESSION['Uid']."','$pcode','$locality','$address','$city','$state','$landmark','$mobile2','$addrtype')") or die($mysqli->error);
		if($sql)
		{
			echo json_encode(array("statusCode"=>200));
		}
		else
		{
			echo json_encode(array("statusCode"=>201));
		}
//}
//Display

extract($_POST);
/*Insert
if(isset($_POST['pcode']))
{
	$pcode = $_POST['pcode'];
	$locality = $_POST['locality'];
	$address = $_POST['address'];
	$landmark = $_POST['landmark'];
	$mobile2 = $_POST['mobile2'];
	$sql=$mysqli->query ("INSERT INTO address (`pcode`, `locality`, `address`,'mobile2') VALUES('$pcode','$locality','$address','$mobile2')") or die($mysqli->error);
	if($sql)
	{
		echo "inserted";
	}
	else
	{
		echo"failed";
	}
	
}*/
?>