<?php
session_start();
$total_amt = $_SESSION['total_amt'];
echo $total_amt;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_570c2bf0c848cf76285979c268d",
            "X-Auth-Token:test_423d302947bd810892119975bd6"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => $total_amt,
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://localhost/E-Mart/myorder.html',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'kaptaanji08@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response=json_decode($response);
echo '<pre>';
print_r($response);

?>
