<?php 
	include('dbconnection.php');
	$result =  $mysqli->query("SELECT product.*,laptop_brand.id,laptop_brand.brand_name as item_brand FROM product,laptop_brand  where product.status='1'  and product.item_brand = laptop_brand.id and laptop_brand.status = '1' ORDER BY item_id desc") or die($mysqli->error);
 ?>
	<section id="new-brand">
		<div class="container-fluid bg-light ">
			<div class="heading">
				<h5 class="comment_heading">New Arrival</h5>
				<hr class="divider">
				<div class="subtitle">
					<span>newly arrived products </span>
				</div>
			</div>
			<div class="owl-carousel owl-theme">
				<?php
					while($row = $result->fetch_assoc())			
					{ 	
				?>
				<div class="item">
					<div class="box">
						<div class="slider-img">
							<img src="images/<?php echo $row['item_images'];?>" alt="1" class="img-fluid" >
							<div class="overlay d-flex">
								<?php 
									$itemid1=$row['item_id'];
									if(empty($_SESSION['Uname']))
									{
										echo '<a href="cart.html" class="buy-btn"  ><span>Buy Now</span></a>';
									}
									else
									{
										$itemquery1 = "select * from cart where item_id = '$itemid1' AND user_id ='".$_SESSION['Uid']."' ";
										$query1 = mysqli_query($mysqli,$itemquery1);
										$itemcount1 = mysqli_num_rows($query1);
										if(isset($_SESSION['Uname']) && $itemcount1<=0 )
										{
											echo'<a href="checkout_action.php?item_id='.$row['item_id'].'" class="buy-btn"><span class="buy-btn">Buy Now</span></a>';
										}
										else if($itemcount1>0)
										{
											echo'<a href="checkout_action.php?item_id='.$row['item_id'].'" class="buy-btn"><span class="buy-btn">Buy Now</span></a>';
										}
									}
								?>
							</div>
						</div>
						<div class="detail-box bg-light">
							<div class="type d-flex text-center" style="font-size: 18px;">
							<a href="product.html?item_id=<?= $row['item_id'];?>" class="brand-name"><?php echo $row['item_brand']; ?></a>
							<a href ="product.html?item_id=<?= $row['item_id'];?>" class="item_name_new_aarival text-truncate"><?php echo $row['item_name']; ?></a>
							<a href="product.html?item_id=<?= $row['item_id'];?>" class="price">₹ <?php echo $row['item_price']; ?></a>
							<?php 
								$itemid=$row['item_id'];
								if(empty($_SESSION['Uname']))
								{
								echo '<a href="cart.html" class="addtocart"><button type="" name="" class="btn btn-warning mb-2 " ><span>Add to Cart</span></button></a>';
								}
								else
								{
								
									$itemquery = "select * from cart where item_id = '$itemid'AND user_id = '".$_SESSION['Uid']."' ";
									$query = mysqli_query($mysqli,$itemquery);
									$itemcount = mysqli_num_rows($query);
									if(isset($_SESSION['Uname']) && $itemcount<=0)
									{
										echo'<a href="cart.php?item_id='.$row['item_id'].'" class="addtocart"><button type="submit" name="submit" class="btn btn-warning mb-2" ><span>Add to Cart</span></button>';
					
									}
									else if($itemcount>0)
									{
										echo '<button type="submit" name="submit" class="btn btn-primary mb-2 addtocart_disabled" style="cursor:not-allowed;"disabled ><span>Add to Cart </span><i class="fas fa-check ml-1"></i></button>';
									}
								}
							?>
						</a>
						</div>
					</div>
					</div>
				</div> 
				<?php } ?>
			</div>
		</div>
	</section>