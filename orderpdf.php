<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
include('dbconnection.php');
?>

<?php
$orderid=$_GET['orderid'];
$sql = $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id AND order_checkout.id= $orderid" ) or die($mysqli->error);
$result = $mysqli->query("SELECT order_checkout.*,order_detail.id,user_address.address,user_address.pcode from order_checkout,user_address,order_detail where user_address.user_id = order_checkout.user_id and order_checkout.id  = order_detail.order_id") or die($mysqli->error);
$query= $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id AND order_checkout.id= $orderid") or die($mysqli->error);
$r = mysqli_num_rows($sql);
$res = mysqli_fetch_assoc($result);
// $res1 = mysqli_fetch_array($sql);
$address = $res["address"];

$stylesheet = file_get_contents('./css/bootstrap.css');
$stylesheet.= file_get_contents('./css/order.css');

$table='
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ORDER PDF</title>

            <!-- file css for style on report  -->
            <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/order.css">
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="logo_description_report_header">
                        <img src="images/emart_logo.png" style="width:90px;margin-bottom:13px;">&nbsp;&nbsp;
                        <div>
                            <span class="company_brand" style="font-size:23px;font-weigth:600;">E-Mart</span>
                        </div>
                    </div>
                    <hr>
                    <div class="company_detail">
                       

                        <span class="company_address">Awesome Street 1023<br>Mumbai<br>India<br>400000</span>
                        <span class="company_address">emartadmin0800@gmail.com<br>0220200XXX</span>';
                            while($row = mysqli_fetch_array($query))
                            {
                                $addedon=$row['added_on'];
                                $strtotime=strtotime($addedon);
                                $time=date('d/m/Y h:i A',$strtotime);
                                $table.='
                        <span class="company_address" style="font-weight:600">Order Id :'.$row['id'].'<br>Order date:'.$time.'</span>     
                    </div>';
                            }
                        $table.='
                </div>';
                $table.='
                <hr>
                <div class="sub_part">
                    <table id="address_table" class="table table-bordered  text-center w-100" style="">
                        <thead>
                            <tr>
                                <th id="address_shipping">Address</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">'.$address.'</td>
                        </tr>
                        </tbody>';
                        $table.='
                    </table>
                    <hr>';

                    $table.='
                    <div class="main_content">
                        <table id="product"  class="table  table-bordered table-responsive text-center w-100" style="">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">IGST</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>';
                                $qty=0;
                                $totalitemprice=0;
                                $totaligst=0;
                                $totalprice=0;
                                while($row = mysqli_fetch_assoc($sql))
                                {
                                    $price=$row['item_price'];
                                    $igst = $price * 0.18;
                                    $price=$price-$igst;
                                    $total=$price+$igst;
                                    $qty+=$row['item_qty'];
                                    $totalitemprice+=$row['item_price'];
                                    $totalprice+=$price;
                                    $totaligst+=$igst;
                                    
                                    $table.='
                        
                                    <tr>
                                        <td id="product_name" class="text-center">'.$row["item_name"].'</td>
                                        <td id="qty" class="text-center">'.$row["item_qty"].'</td>
                                        <td id="price" class="text-center">₹'.$price.'</td>
                                        <td id="igst" class="text-center">₹'. $igst.'</td>
                                        <td id="product_total" class="text-center">₹'.$total.'</td> 
                                    </tr>';
                                }
                                $table.='
                                <tr id="total" class="font-weight-bold">
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
        </body>
    </html>';
// echo $table;
$pdf = new \Mpdf\Mpdf();
    // $pdf->WriteHTML($stylesheet,1);
    // $pdf->WriteHTML($table,2);
    $pdf->WriteHTML($table);
    $pdf->output("Bill.pdf","D");
?>