
<?php
session_start();
include('dbconnection.php');
if(isset($_POST['operation']))
{

	$uid = $_SESSION['Uid'];
	$result = $mysqli->query("SELECT product.item_id,product.item_name,product.item_brand,product.item_price,product.item_images,wishlist.item_id,wishlist.user_id,wishlist.id from product,wishlist where product.item_id = wishlist.item_id AND  user_id = '".$_SESSION['Uid']."' ") or die(mysql_error($mysqli));
	$res = $mysqli->query("select * from wishlist where user_id = '".$_SESSION['Uid']."'");
	$r = mysqli_num_rows($res);
	$_SESSION['i'] = $r;

	if($result)
	{
		$number =1;
		if($r<1)
		{
		?>
		 <div class="col-12 text-center">
            <img src="images/empty_wishlist.PNG" alt="" class="img-fluid" style="width:650px">
            <h2 class="text-capitalize" style="font-family: 'Baloo Thambi 2', cursive;">Empty Wishlist!</h2>
            <h6 class="text-black-50" style="font-family: 'Rubik', sans-serif;">Search for items to Start adding them to your Wishlist!</h6>
         </div>
         <br>
            
      <?php } else {?>
		<table class="table table-striped table-responsive" >
				<thead>
            		<tr>
			            <th>#</th>
			            <th>Product Image</th>
			            <th>Product Price</th>
			            <th>Product Name</th>
			            <th>Remove</th>
			           
            		</tr>
        		</thead>
        	
		<?php
		while($row = mysqli_fetch_array($result))
		{?>
		<tr id="<?php echo $row['id'];?>">
			<td ><?php echo $number ;?></td>
			<td ><img src="images/<?php echo $row['item_images'];?>" class="img-fluid" style="max-width:100px"></td>
            <td >  <h5 class="m-0 p-0 itemname" style="  font-family: 'Baloo Thambi 2', cursive;font-size: 22px;"> <a href="product.html?item_id=<?= $row['item_id'];?>" class="" style=""><?php echo $row['item_name'];?></a></h5></td>
            <td >₹ <?php echo $row['item_price'];?></td>
            <td>
				  <button 
			   id="<?php echo $row['id']; ?>"class=" delete btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
<?php
		$number++;
	}

		?>
	</table>
		<?php
		}
	}
}

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$sql=$mysqli->query("DELETE FROM wishlist WHERE id = $id") or die(mysql_error($mysqli));
	if($sql)
	{
		echo "delete";
	}
	else
	{
		echo"failed";
	}
}

?>
