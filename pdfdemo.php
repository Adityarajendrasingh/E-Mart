<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
include('dbconnection.php');
include('links.php');
session_start();
	$res = $mysqli->query("SELECT order_detail.*,order_checkout.user_id,order_checkout.payment_type,order_checkout.total_price,order_checkout.payment_status,order_checkout.id FROM order_detail,order_checkout  WHERE order_checkout.id  = order_detail.order_id")or die($mysqli->error);
	$r = mysqli_num_rows($res);

        $table='
        <div class=container>
        
	    <table class="table text-center table-bordered w-100">
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>order_id</th>
                    <th>item_id</th>
                    <th>item_qty</th>
                    <th>total_price</th>
                </tr>
            </thead>';
            if($r>0)
            {
            while($row = mysqli_fetch_array($res))
            {
                $table.='
		<tr>
            <td >'.$row["user_id"].'</td>
            <td>'.$row["order_id"].'</td>
            <td>'.$row["item_id"].'</td>
            <td>'.$row["item_qty"].'</td>
            <td>'.$row["total_price"].'</td>
            <td>'.$row["item_price"].'</td>
        </tr>';
            }
	$table.='</table></div>';
    }
    echo $table;
  /*  $pdf = new \Mpdf\Mpdf();
    $pdf->WriteHTML("");
    $pdf->output("Order.pdf","S"); */
   

   
	
?>