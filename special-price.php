<!--Special price-->
<?php 
include('dbconnection.php');
$result = $mysqli->query("SELECT product.*,laptop_brand.id,laptop_brand.brand_name as item_brand FROM product,laptop_brand  where product.status='1'  and product.item_brand = laptop_brand.id and laptop_brand.status = '1' ORDER BY  RAND()") or die($mysqli->error);
$re = $mysqli->query("SELECT * FROM product ORDER BY RAND()") or die(mysql_error($mysqli));
$res = $mysqli->query("SELECT laptop_brand.brand_name as item_brand FROM laptop_brand  where status = 1  ORDER BY brand_name ") or die(mysql_error($mysqli));
?>
    <section id="special-price">
      	<div class="container-fluid ">
		<div class="heading">
			<h5 class="comment_heading">Special Price</h5>
			<hr class="divider">
			<div class="subtitle">
				<span>These company we keep</span>
			</div>
		</div>
        <div id="fliters" class="button-group text-right filter-button mb-2">
          <button class="btn is-checked" data-filter="*"><span>All Brand</span></button>
		  <?php
			while($res1 = $res->fetch_assoc())
			{
		  ?>
          <button class="btn " data-filter=".<?php echo $res1['item_brand']; ?>"><span><?php echo $res1['item_brand'];?></span></button>
			   <?php } ?>
          
        </div>
        <div class="grid text-center ">
		<?php

			while($row = $result->fetch_assoc())
			{
		
		?>	
          <div class="grid-item <?php echo $row['item_brand'];?>">
            <div class="product">
              <div class="item-special_price">
                <div class="box" >
                  <div class="slider-img">
                    <img src="images/<?php echo $row['item_images']; ?> "alt="Product_image" class="img-fluid" >
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
                  <div class="detail-box w-100 ">
                    <div class="type d-flex text-center">
                      <a href="product.html?item_id=<?= $row['item_id'];?>" class="brand-name"><?php echo $row['item_brand']; ?></a>
                      <a href="product.html?item_id=<?= $row['item_id'];?>" class="item-name-specialprice text-truncate"><?php echo $row['item_name']; ?></a>
                    <a href="product.html?item_id=<?= $row['item_id'];?>" class="price">₹ <?php echo $row['item_price']; ?></a>
                    
					<?php 
						$itemid=$row['item_id'];
					
						if(empty($_SESSION['Uname']))
						{
						echo '<a href="cart.html" class="addtocart"><button class="btn btn-warning mb-2"><span>Add to Cart</span></button></a>';
						}
						else
						{
						
							$itemquery = "select * from cart where item_id = '$itemid' AND user_id = '".$_SESSION['Uid']."' ";
							$query = mysqli_query($mysqli,$itemquery);
							$itemcount = mysqli_num_rows($query);
							if(isset($_SESSION['Uname']) && $itemcount<=0)
							{
								echo'<button type="button" id="'.$itemid.'" class="btn btn-warning mb-2 addtocart" ><span>Add to Cart </span><i class="fas fa-cog fa-spin spin_icon" hidden></i></button>';
			
							}
							else if($itemcount>0)
							{
							echo'<button type="submit" name="submit" class="btn btn-info mb-2 addtocart_disabled" disabled ><span>Add to Cart </span><i class="fas fa-check"></i></button>';
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
      <!--/Special price-->
	 