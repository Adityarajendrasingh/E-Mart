<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care | www.emart.com</title>
 	<?php 
	  
	 	include('links.php');
  	?>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="css/style.css">
<?php include('header.php');?>
<body>
<!--Special price-->
<?php 
include('dbconnection.php');
$result = $mysqli->query("SELECT product.*,laptop_brand.id,laptop_brand.brand_name as item_brand FROM product,laptop_brand  where product.status='1'  and product.item_brand = laptop_brand.id and laptop_brand.status = '1' ORDER BY  RAND()") or die($mysqli->error);
$re = $mysqli->query("SELECT * FROM product ORDER BY RAND()") or die(mysql_error($mysqli));
 ?>
 <?php
 $res = $mysqli->query("SELECT laptop_brand.brand_name as item_brand FROM laptop_brand  where status = 1  ORDER BY brand_name ") or die(mysql_error($mysqli));
 
   ?>
    <section id="special-price">
      	<div class="container-fluid ">
		<div class="heading text-capitalize text-center pt-3">
			<h5 class="comment_heading">Special Price</h5>
			<hr class="divider">
			<div class="subtitle mb-4 text-center">
				<span>These company we keep</span>
			</div>
		</div>
        <div id="fliters" class="button-group text-right">
          <button class="btn is-checked" data-filter="*">All Brand</button>
		  <?php
			while($res1 = $res->fetch_assoc())
			{
		  ?>
          <button class="btn " data-filter=".<?php echo $res1['item_brand']; ?>"><?php echo $res1['item_brand'];?></button>
			   <?php } ?>
          
        </div>
        <div class="grid mb-2 ">
		<?php

			while($row = $result->fetch_assoc())
			{
		
		?>	
          <div class="grid-item border mx-3 mb-4 mt-2 <?php echo $row['item_brand']; ?> ">
            <div class="product py-2" style="width:260px;">
              <div class="item">
                <div class="box mx-auto my-3 " >
                  <div class="slider-img" style="overflow: hidden;">
                    <img src="images/<?php echo $row['item_images']; ?> "alt="1" class="img-fluid" >
                    <div class="overlay d-flex">
						<?php 
							$itemid1=$row['item_id'];
							if(empty($_SESSION['Uname']))
							{
								echo '<a href="user_login.html" class="buy-btn"  ><span>Buy Now</span></a>';
							}
							else
							{
								echo'<a href="checkout_action.php?item_id='.$row['item_id'].'" class="buy-btn"><span class="buy-btn">Buy Now</span></a>';
							}
						?>
                    </div>
                  </div>
                  <div class="detail-box w-100 bg-light">
                    <div class="type d-flex text-center" style="font-size: 22px;">
                      <a href="product.html?item_id=<?= $row['item_id'];?>" class="font-weight-bold" style="font-family: 'Baloo Thambi 2', cursive;"><?php echo $row['item_brand']; ?></a>
                      <a href="product.html?item_id=<?= $row['item_id'];?>" style="font-family: 'Raleway', sans-serif; color:product.html?item_id=<?= $row['item_id'];?>494949 ; font-size:16px;" ><?php echo $row['item_name']; ?></a>
                    <a href="product.html?item_id=<?= $row['item_id'];?>" class="price"style="font-family: 'Rubik', sans-serif;" >₹ <?php echo $row['item_price']; ?></a>
                    
					<?php 
						$itemid=$row['item_id'];
					
						if(empty($_SESSION['Uname']))
						{
						echo '<a href="cart.html"><button type="" name="" class="btn btn-warning mb-2" >Add to Cart</button></a>';
						}
						else
						{
						
							$itemquery = "select * from cart where item_id = '$itemid' AND user_id = '".$_SESSION['Uid']."' ";
							$query = mysqli_query($mysqli,$itemquery);
							$itemcount = mysqli_num_rows($query);
							if(isset($_SESSION['Uname']) && $itemcount<=0)
							{
								echo'<button type="button" id="'.$itemid.'" class="btn btn-warning mb-2 add_cart" >Add to Cart <i class="fas fa-cog fa-spin spin_icon" hidden></i></button>';
			
							}
							else if($itemcount>0)
							{
							echo'<button type="submit" name="submit" class="btn btn-info mb-2" style="cursor:not-allowed;"disabled >Add to Cart <i class="fas fa-check"></i></button>';
							}
						}
					?>
					
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<?php } ?>
        </div>
      </div>
    </section>
</body>
<!--footer-->
<?php include('footer.php');?>
<!--/footer-->
	 