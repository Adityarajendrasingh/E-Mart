<?php
session_start();
include('dbconnection.php');
if(isset($_GET['delete']))

	{
		$id = $_GET['delete'];
		echo $id;
		$sql=$mysqli->query("DELETE FROM checkout WHERE id = $id") or die(mysql_error($mysqli));
		if($sql)
		{
			$_SESSION['msg']="Removed";
			$_SESSION['msg_status']="success";
			// header("location:/E-Mart/checkout.php");
			die();
		}
		else
		{
			echo 'fail';
		} 
		
	}
if(isset($_POST['qty']))
{
	$qty = $_POST['qty'];
	$item_id = $_POST['item_id'];
	echo $qty;
	echo $item_id;
	$sql = $mysqli->query("INSERT INTO  checkout (item_id,qty) VALUES ('$item_id','$qty')")or die($mysqli->error);
	if($sql)
	{
		echo 'Success';
	}
}
if(isset($_POST['id']))
{
$id = $_POST['id'];
$sql=$mysqli->query("DELETE FROM checkout WHERE id = $id AND user_id ='".$_SESSION['Uid']."'") or die($mysqli->error);
if($sql)
	{
		echo "delete";
	}
	else
	{
		echo"failed";
	}
	// echo json_encode($id);
}
if(isset($_GET['item_id']))
{
	$item_id = $_GET['item_id'];
	$uid =  $_SESSION['Uid'] ;
	$sql = $mysqli->query("INSERT INTO checkout (user_id, item_id) SELECT '$uid', product.item_id FROM product  WHERE  product.item_id = $item_id AND product.item_id  NOT IN (SELECT item_id FROM checkout)") or die($mysqli->error);
	if($sql)
	{
		echo 'success';
		header('location:/E-Mart/checkout.php');
	}
	else 
	{
		echo 'error';
	}
}

//


///$sql = $mysqli->query("INSERT INTO  order_details (item_id,item_qty,item_price) VALUES ('$item_id','$item_qty','#item_price')")or die($mysqli->error);
/*$order_array = array( $item_id,$item_qty,$item_price);
foreach ($order_array as $data) {
	echo $data ;
	# code...
}
echo $order_array;
foreach($item_price as $price )
{
	echo $price;
}
$sql = $mysqli->query("INSERT INTO  order_detail (item_price) VALUES ('$price')")or die($mysqli->error);
$columns = implode(", ",array_keys($data));
$escaped_values = array_map('mysqli_real_escape_string', array_values($data));
$values  = implode(", ", $escaped_values);
$sql = "INSERT INTO `order_detail`($columns) VALUES ($values)";

$data= array (
				'item_id' => $item_id,
				'item_qty' => $item_qty,
				'item_price' => $item_price); 
echo $data[$item_id];
foreach($data as  $value)
{
	echo $value[0];
	

//echo $value[0];
//$update =   $mysqli->query("INSERT INTO order_detail(item_id,item_qty,item_price) VALUES ()") or die($mysqli->error);
}
foreach($item_price as $price )
{
	echo $price;
}

foreach($item_id as $id )
{
	$it_id[]=$id;
 }

 foreach($item_qty as $qty)
{
	$it_qty[]=$qty;
}
 foreach($item_price as $price )
{
	$it_price[]=$price;
 }

 $it_id=implode(",", $it_id);
$it_qty=implode(",", $it_qty);
$it_price=implode(",",	$it_price);
 //echo $k;
 echo $it_id;
 echo $it_qty;
 echo $it_price;
*/
//print_r($item_id);
//print_r($item_price);
//print_r($item_qty);

//echo $dataa;
//print_r($data);
//print_r($dataa);

if(isset($_POST['item_id']))
{
	
	$item_id = $_POST['item_id'];
	$total = $_POST['total'];
	$_SESSION['total_amt'] = $total;
	$i=0;
	$sql = $mysqli->query("INSERT INTO order_checkout(total_price,user_id,payment_status,order_status) VALUES ('$total','".$_SESSION['Uid']."','pending','1') ")  or die($mysqli->error);
	foreach($item_id as $id)
	{ 
		$item_qty = $_POST['item_qty'];
		$item_price = $_POST['item_price'];
		$update =   $mysqli->query("INSERT INTO order_detail(user_id,item_id,item_qty,item_price) VALUES ('".$_SESSION['Uid']."','$id','".$item_qty[$i]."','".$item_price[$i]."')") or die($mysqli->error);
		$Oid=$mysqli->insert_id;
		$resul=$mysqli->query("Select * from order_checkout where user_id = '".$_SESSION['Uid']."'order by id DESC") or die($mysqli->error);
		$row=mysqli_fetch_assoc($resul);
		$order_id=$row['id'];
		echo $Oid;
		$update_detail = $mysqli->query("Update order_detail set order_id = $order_id where id = $Oid  ") or die($mysqli->error);
		if($update_detail)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	
		
		echo $Oid;
		$i++;
	}
 
}
if(isset($_POST['payment']))
{
	$paymenttype = $_POST['payment'];
	echo $paymenttype;
	$r=mt_rand(3,12);
	$d=strtotime("+$r Days");
	$da=date("d-m-Y", $d);
	$result = $mysqli->query("Update order_checkout set payment_type = '$paymenttype',order_deliverydate = '$da' where user_id = '".$_SESSION['Uid']."'  ORDER BY id DESC LIMIT 1  ") or die($mysqli->error);
	$resu=$mysqli->query("DELETE FROM checkout where user_id ='".$_SESSION['Uid']."'") or die($mysqli->error);
	if($paymenttype=="Cash on Delivery")
	{
		try
		{
			require_once   './vendor/autoload.php';
			$mpdf = new \Mpdf\Mpdf();


			// book mark of pdf 

			$mpdf->Bookmark('Start of the document');


			//then let start us html for generate report 
			// we need to use a variable for store the html 
			//here is our report 
			$resul=$mysqli->query("Select * from order_checkout where user_id = '".$_SESSION['Uid']."'order by id DESC") or die($mysqli->error);
			$row=mysqli_fetch_assoc($resul);
			$orderid=$row['id'];
			$sql= $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id AND order_checkout.id= $orderid") or die($mysqli->error);
			$query= $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id AND order_checkout.id= $orderid") or die($mysqli->error);
			$result = $mysqli->query("SELECT order_checkout.*,order_detail.id,user_address.address,user_address.pcode from order_checkout,user_address,order_detail where user_address.user_id = order_checkout.user_id and order_checkout.id  = order_detail.order_id") or die($mysqli->error);
			$r = mysqli_num_rows($sql);
			$res = mysqli_fetch_assoc($result);
			// $res1 = mysqli_fetch_array($sql);
			$address = $res["address"];
			$html  = '
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<meta charset="UTF-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>Email PDF</title>

						<!-- file css for style on report  -->
						<link rel="stylesheet" href="css/index.css">
					</head>
					<body>
						<div class="container">
							<!-- so this row should be our header of report  -->
							<div class="row">
								<div class="header">
									<div class="logo_description_report_header">
										<img src="images/emart_logo.png" style="width:90px;margin-bottom:13px;">&nbsp;&nbsp;
										<div class="company_title">
											<span class="company_brand">E-Mart</span>  
										</div>
									</div>
									<hr>
									<div class="company_detail">
										<span class="company_address">Awesome Street 1023<br>Mumbai<br>India<br>400000</span>
										<span class="company_address">emartadmin0800@gmail.com<br>0220200XXX</span>';
										while($res = mysqli_fetch_assoc($sql))
										{
											$addedon=$res['added_on'];
											$strtotime=strtotime($addedon);
											$time=date('d/m/Y h:i A',$strtotime);
											$html.='
											<span class="company_address">Order Id :'.$res['id'].'<br>Invoice date:'.$time.'</span>';
										}
										$html.='
									</div>
								</div>
							</div>
							<hr>
							<!-- body of report  -->
							<div class="row">
								<div class="body_report">

									<div class="Header_title">
										<strong class="title">
										Shipping Address
										</strong>
										<br>
										<span class="shipping_address">'.$address.'</span>
										
									</div>
									<div class="container_details">
										<!-- it should be table of report  -->
										<table>
											<thead>
												<tr>
													<th>Product</th>
													<th>Qty</th>
													<th>Price</th>
													<th>IGST</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>';
												$qty=0;
												$totalitemprice=0;
												$totaligst=0;
												$totalprice=0;

												while($row = mysqli_fetch_assoc($query))
												{
												
													$price=$row['item_price'];
													$igst = $price * 0.18;
													$price=$price-$igst;
													$total=$price+$igst;
													$qty+=$row['item_qty'];
													$totalitemprice+=$row['item_price'];
													$totalprice+=$price;
													$totaligst+=$igst;
												
													
													$html.='
													
													<tr>
														<td id="product_name" class="text-center">'.$row["item_name"].'</td>
														<td id="qty" class="text-center">'.$row["item_qty"].'</td>
														<td id="price" class="text-center">₹'.$price.'</td>
														<td id="igst" class="text-center">₹'. $igst.'</td>
														<td id="product_total" class="text-center">₹'.$total.'</td> 
													</tr>';
												}
												$html.='
												<tr id="total" class="total">
													<td class="font-weight-bold">Total</td>
													<td>'.$qty.'</td>
													<td>₹'.$totalprice.'</td>
													<td>₹'.$totaligst.'</td>
													<td>₹'.$totalitemprice.'</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- footer of report  -->
							<div class="row">
								<div class="payment_mode">
									
								</div>
								<div class="tel">
								
								</div>
							</div>
						</div>
					</body>
				</html>'; 
			// echo $html;
			$mpdf->WriteHTML($html);

			$email = $_SESSION['Uemail'];
			include ('sendmail_header.php');
			$message = "";
			$mail->Subject = 'Receipt';
			$pdf = $_SESSION['pdf_demo'];
			$mail->Body = "<h3>Name :".$_SESSION['Uname']." <br>Email: $email <br>Message : $message </h3>";
			$mail->addStringAttachment($mpdf->Output("","S"), 'Bill.pdf');//, $encoding = 'base64', $type = 'application/pdf');
			if($mail->Send())
			{
				echo 'Success';
			
			}

		}
		catch(Exception $e)
		{
			$_SESSION['msg'] = $e->getMessage();
			$_SESSION['msg_status'] = 'error';
			header('location:/E-Mart/checkout.php');
			exit();
		}
		
	}
		
	
	else 
	{
		echo'error';	
	}

	
}
?>
