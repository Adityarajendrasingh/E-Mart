<?php
include('dbconnection.php');
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$comment=$_POST['message'];

$sql = $mysqli->query("insert into contact_us (name,email,mobile,comment) values('$name','$email','$mobile','$comment')");
echo 'Thank you';
?>