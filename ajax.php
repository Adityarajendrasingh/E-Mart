<?php
include('dbconnection.php');
extract($_POST);
//Insert
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['gender']))
{

	$sql=$mysqli->query ("INSERT INTO address (`pcode`, `locality`, `address`, `city`) VALUES('$firstname','$lastname','$email','$gender')") or die($mysqli->error);
	if($sql)
	{
		echo "inserted";
	}
	else
	{
		echo"failed";
	}
	
}
if(isset($_POST['pcode']) && isset($_POST['locality']))
{

	$sql=$mysqli->query ("INSERT INTO address (`pcode`, `locality`) VALUES('$pcode','$locality')") or die($mysqli->error);
	if($sql)
	{
		echo "inserted";
	}
	else
	{
		echo"failed";
	}
	
}
//Display
if(isset($_POST['operation']))
{
	$result = $mysqli->query("SELECT * FROM user") or die(mysql_error($mysqli));
	if($result)
	{
		$number =1;
		?>
		<table class="table table-striped table-responsive" >
        		<thead>
            		<tr>
			            <th>#</th>
			            <th>First Name</th>
			            <th>last Name</th>
			            <th>Email</th>
			            <th>Gender</th>
			            <th>ID</th>
			            <th>Action</th>
            		</tr>
        		</thead>
		<?php
		while($row = mysqli_fetch_array($result))
		{?>
		<tr id="<?php echo $row['user_id'];?>">
			<td ><?php echo $number ;?></td>
			<td ><?php echo $row['first_name'];?></td>
            <td ><?php echo $row['last_name'];?></td>
            <td ><?php echo $row['email'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['user_id'];?></td>
            <td>
            	<button id="btn-edit" data-id="<?php echo $row['user_id'] ?>"
			    class=" edit btn btn-outline-info"><i class="fas fa-pencil-alt"  ></i></button>
			  
				  <button 
			   id="<?php echo $row['user_id']; ?>"class=" delete btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
<?php
		$number++;
	}

		?>
	</table>
		<?php
	}
}


//Delete 
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$sql=$mysqli->query("DELETE FROM user WHERE user_id = $id") or die(mysql_error($mysqli));
	if($sql)
	{
		echo "delete";
	}
	else
	{
		echo"failed";
	}
}
if(isset($_POST['pcode']))
{
	$pcode = $_POST['pcode'];
	$locality = $_POST['locality'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$landmark = $_POST['landmark'];
	$addrtype = $_POST['addrtype'];
	$mobile2 = $_POST['mobile2'];

	echo $pcode;

	$sql=$mysqli->query ("INSERT INTO address (`pcode`, `locality`, `address`, `landmark`,'addrtype','mobile2') VALUES ('$pcode','$locality','$address','$address','$landmark','$addrtype','$mobile2')") or die($mysqli->error);
		if($sql)
		{
			echo "inserted";
		}
		else
		{
			echo"failed";
		}
}
?>

