<?php
session_start();
include('dbconnection.php');

$fname = $_POST['fname'];
$pno = $_POST['pno'];
$pimage = "hello/lll";
$uid = $_SESSION['Uid'];

$sql = $mysqli->query("INSERT INTO user_pancard (user_id,pnumber,name,pimage) VALUES ($uid,$pno,'$fname','$pimage')") or die($mysqli->error);
if($sql)
{
    echo json_encode(array("statusCode"=>200));
}
else
{
    echo json_encode(array("statusCode"=>201));
}

?>