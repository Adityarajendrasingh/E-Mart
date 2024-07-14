<?php 
include('dbconnection.php');
if(isset($_POST['item_id']))
{
	function pre_r ($array)
   {
       
       print_r($array);
 
   }
	$item_id = $_POST['item_id'];
	$sql = $mysqli->query("select * from product where item_id = $item_id");
	$res = $sql->fetch_array();
	//$pr = pre_r ($res);


	$p=$res['item_price'];
	$m=$res['item_mrp'];
	echo json_encode($res);
	//echo json_encode($m);
}


?>