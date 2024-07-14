<?php 

include('dbconnection.php');
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $sql = $mysqli->query("UPDATE order_checkout set order_status = '4'  where id = '$id' ")or die($mysqli->error);
    if($sql)
    {
        echo 'success';
    }
    
}

?>