<?php  
// first is import MPDF 
require_once   './vendor/autoload.php';
include('dbconnection.php');
session_start();
$mpdf = new \Mpdf\Mpdf();


// book mark of pdf 

$mpdf->Bookmark('Start of the document');


//then let start us html for generate report 
// we need to use a variable for store the html 
//here is our report 
$orderid=1;
$sql= $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id") or die($mysqli->error);
$query= $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_detail.item_qty as item_qty,order_checkout.id as id from order_checkout,order_detail,product where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id") or die($mysqli->error);
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
                            <img src="images/emart_logo.png" >&nbsp;&nbsp;
                            <span class="company_brand">E-Mart</span>  
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

// $mpdf->output();
$_SESSION['pdf_demo'] = $mpdf->Output("","S");

?>
