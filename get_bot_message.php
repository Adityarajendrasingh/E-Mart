<?php
date_default_timezone_set('Asia/Kolkata');
include('dbconnection.php');
session_start();
$txt=mysqli_real_escape_string($mysqli,$_POST['txt']);
$result=$mysqli->query("select reply from chatbot_hints where question like '%$txt%'");

if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
	$html=$row['reply'];
}else{
	$html="Sorry not be able to understand you";
}
$added_on=date('Y-m-d H:i:s');
$sql=$mysqli->query("insert into message(user_id,message,added_on,type) values('".$_SESSION['Uid']."','$txt','$added_on','user')") or die($mysqli->error);
$added_on=date('Y-m-d H:i:s');
$res=$mysqli->query("insert into message(user_id,message,added_on,type) values('".$_SESSION['Uid']."','$html','$added_on','bot')") or die($mysqli->error);

echo $html;
?>