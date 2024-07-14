<?php
include('dbconnection.php');
session_start();

$pcode = $_POST['pcode'];
$locality = $_POST['locality'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$landmark = $_POST['landmark'];
$mobile2 = $_POST['mobile2'];
$addrtype = $_POST['addrtype'];
$Uid = $_SESSION['Uid'];
echo  "pcode:-".$pcode;
echo $locality;
echo $address;
echo $city;
echo $state;
echo $landmark;
echo $mobile2;
echo $addrtype;
echo $_SESSION['Uid'];

    $update = $mysqli->query(" UPDATE user_address SET pcode = '$pcode' , locality = '$locality', address ='$address', city = '$city' , state = '$state', landmark = '$landmark', mobile2 = '$mobile2', addrtype ='$addrtype' WHERE user_id  =  $Uid ") or die($mysqli->error);

?>