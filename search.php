<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Mart</title>
	<?php include('links.php'); ?>
    <style>
        .noresultfound h4 {
            font-family:'Baloo 2',cursive;
            font-size:40px;
        }
        .noresultfound img{
            width:400px;
        }
        .bottom_section > ul {
            display: inline-block;
            }
            .bottom_section h5{
                font-size:25px;
                font-family:'Rubik',sans-serif;
            }
            .bottom_section ul li{
                font-family:'Raleway',sans-serif;
            }
    </style>
</head>


<?php include('header.php');?>
<!--/Header-->
<main>
<?php 
include('dbconnection.php');
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $searchKey = $_GET['search'];
    $result  = $mysqli->query("SELECT product.*,laptop_brand.id,laptop_brand.brand_name as item_brand FROM product,laptop_brand  WHERE 
                (item_name LIKE '%$searchKey%' OR item_shortdesc LIKE '%$searchKey%' OR item_brand LIKE '%$searchKey%' OR brand_name  LIKE '%$searchKey%'  ) 
                AND product.status='1' AND product.item_brand = laptop_brand.id AND laptop_brand.status = '1' ")or die($mysqli->error);
    $res = mysqli_num_rows($result);
    if($res<=0)
    {
       echo'<div class="container-fluid mt-4 bg-light">
            <div class="noresultfound text-center ">
                <h4 class="text-center py-4 bg-light">Sorry,No result found :( </h4>
                <img src="images/nosearch.png" alt="">
                
            </div>
            <div class="bottom_section text-center">
                <h5>Search Suggestions:</h5>
                <ul><li>Make sure the Product name are spelled correctly</li>
                <li>Try searching for Other Product or something else</li>
            </div>
            </div>';
    }
    
}
else
$result = $mysqli->query("SELECT product.*,laptop_brand.id,laptop_brand.brand_name as item_brand FROM product,laptop_brand  where 
        product.status='1'and product.item_brand = laptop_brand.id and laptop_brand.status = '1' ORDER BY  RAND()") or die($mysqli->error);
 ?>
    <section id="special-price">
        <div class="container-fluid ">
            <h3 class="mt-4 mb-0 mx-3 "></h3>
            <div class="grid text-center mx-4 px-auto">
                <?php
                    while($row = $result->fetch_assoc())
                    {
                ?>	
                <div class="grid-item border mx-3 mb-4 mt-2">
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
                                    
                                        $itemquery = "select * from cart where item_id = '$itemid'AND user_id = '".$_SESSION['Uid']."' ";
                                        $query = mysqli_query($mysqli,$itemquery);
                                        $itemcount = mysqli_num_rows($query);
                                        if(isset($_SESSION['Uname']) && $itemcount<=0)
                                        {
                                            echo'<button type="button" data-id="'.$row['item_id'].'"  onclick="add_to_cart()" class="btn btn-warning mb-2 add_cart" >Add to Cart <i class="fas fa-cog fa-spin spin_icon" hidden></i></button>';
                        
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
                <?php }  ?>
            </div>
        </div>
    </section>

</main>
<!--footer-->
<?php include('footer.php');?>
<!--/footer-->
