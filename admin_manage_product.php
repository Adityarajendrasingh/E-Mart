<?php
include('dbconnection.php');
include('admin_top.php');
$cat='';
$msg = '';
$image_required='required';
$categories_id='';
$item_brand='';
$item_name='';
$item_mrp='';
$item_price='';
$item_qty='';
$item_shortdesc='';
$item_longdesc='';
$best_seller='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$image_required='';
	$id = $_GET['id'];
	$res = $mysqli->query("select * from product where item_id = '$id'");
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		$row=mysqli_fetch_assoc($res);
		$categories_id = $row['categories_id'];
		$item_brand=$row['item_brand'];
		$item_name=$row['item_name'];
		$item_mrp=$row['item_mrp'];
		$item_price=$row['item_price'];
		$item_qty=$row['item_qty'];
		$item_shortdesc=$row['item_shortdesc'];
		$item_longdesc=$row['item_longdesc'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
		
	}
	else
	{
		header('location:admin_product.php');
		die();
	}


}

//Insert
if(isset($_POST['submit']))
{
	$categories_id = $_POST['categories_id'];
	$item_brand = $_POST['item_brand'];
	$item_name = $_POST['item_name'];
	$item_mrp = $_POST['item_mrp'];
	$item_price = $_POST['item_price'];
	$item_qty = $_POST['item_qty'];
	$item_shortdesc = $_POST['item_shortdesc'];
	$item_longdesc = $_POST['item_longdesc'];
	$meta_title = $_POST['meta_title'];
	$meta_desc = $_POST['meta_desc'];
	$meta_keyword = $_POST['meta_keyword'];
	$best_seller = $_POST['best_seller'];

	$res = $mysqli->query("select * from product where item_name = '$item_name'");
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		if(isset($_GET['id']) && ($_GET['id'])!='')
		{
			$getdata=mysqli_fetch_assoc($res);
		
		
			if($id==$getdata['item_id'])
			{

			}
			else
			{
				$msg = 'Product already Exists';
			}
		}
		else
		{
			$msg = 'Product already Exists';
		}
	}

	if( $_FILES['item_images']['type']!='image/png'  || $_FILES['item_images']['type']!='image/jpg' || $_FILES['item_images']['type']!='image/jpeg')
	{
		
	}


	if($msg=='')
	{

		if(isset($_GET['id']) && ($_GET['id'])!='')
		{
			if($_FILES['item_images']['name']!='')
			{
				$image =$_FILES['item_images']['name'];
				move_uploaded_file($_FILES['item_images']['tmp_name'],'./images/Product_image/'.$image);
				$update_sql="Update product set categories_id = '$categories_id',item_brand = '$item_brand',item_name = '$item_name',item_mrp = '$item_mrp',item_price = '$item_price',item_qty = '$item_qty',item_shortdesc= '$item_shortdesc',item_longdesc = '$item_longdesc',meta_title = '$meta_title',meta_desc = '$meta_desc',meta_keyword = '$meta_keyword',
				item_images= '$image' , best_seller = '$best_seller' where item_id='$id'";
			}
			else
			{
				$update_sql="Update product set categories_id = '$categories_id',item_brand = '$item_brand',item_name = '$item_name',item_mrp = '$item_mrp',item_price = '$item_price',item_qty = '$item_qty',item_shortdesc= '$item_shortdesc',item_longdesc = '$item_longdesc',meta_title = '$meta_title',meta_desc = '$meta_desc',meta_keyword = '$meta_keyword',best_seller = '$best_seller' where item_id='$id'";
				//echo "Update product set categories_id = '$categories_id',item_brand = '$item_brand',item_name = '$item_name',item_mrp = '$item_mrp',item_price = '$item_price',item_qty = '$item_qty',item_shortdesc= '$item_shortdesc',item_longdesc = '$item_longdesc',meta_title = '$meta_title',meta_desc = '$meta_desc',meta_keyword = '$meta_keyword',best_seller = '$best_seller' where item_id='$id'";
			}
			mysqli_query($mysqli,$update_sql);
		}
		else
		{
			$image =$_FILES['item_images']['name'];
			move_uploaded_file($_FILES['item_images']['tmp_name'],'./images/Product_image/'.$image);


			$sql = $mysqli->query("Insert into product (categories_id,item_brand,item_name,item_mrp,item_price,item_qty,item_shortdesc,item_longdesc,meta_title,meta_desc,meta_keyword,status,item_images,best_seller) values ('$categories_id','$item_brand','$item_name','$item_mrp','$item_price','$item_qty','$item_shortdesc','$item_longdesc','$meta_title','$meta_desc','$meta_keyword','1','$image','$best_seller')");
		}
		header('location:admin_product.php');
		die();
	}
}
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$id = $_GET['id'];
	$res = $mysqli->query("select * from categories where id = '$id'");
	$row=mysqli_fetch_assoc($res);
	//$cat = $row['categories'];


}

?>
	<div class="content pb-0">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="field_error mt-3 mx-4" style="font-size: 20px;font-family: 'Raleway', sans-serif;"><?php echo $msg; ?></div>
                        <div class="card-body card-block">
                        	<form method="post" enctype="multipart/form-data">
								<div class="form-group py-1 px-4">
									<label for="categories">Categories</label>
									<select class="form-control" style=" font-family: 'Baloo Thambi 2', cursive;font-size:17px " name="categories_id">
										<option>Select Category</option>
										<?php
											$result = $mysqli->query("select id,categories from categories order by categories asc");
											while ($row=mysqli_fetch_assoc($result)) 
											{ 
												if($row['id']==$categories_id)
												{
													echo "<option selected value=".$row['id'].">".$row['categories']."</option>";

												}
												else
												{
													echo "<option value=".$row['id'].">".$row['categories']."</option>";

												}
												
											}
										?>
									</select>
								</div>
								<!--Product brand /name-->
								<div class="form-group py-1 px-4">
									<div class="row">
										<div class="col">
											<label for="categories">Brand name</label>
											<select class="form-control text-capitalize" style=" font-family: 'Baloo Thambi 2', cursive;font-size:17px " name="item_brand">
												<option>Select Brand</option>
												<?php
													$result = $mysqli->query("select id,brand_name from laptop_brand order by brand_name asc") or die($mysqli->error);
													while ($row=mysqli_fetch_assoc($result)) 
													{ 
														if($row['id']==$item_brand)
														{
															echo "<option selected value=".$row['id'].">".$row['brand_name']."</option>";

														}
														else
														{
															echo "<option value=".$row['id'].">".$row['brand_name']."</option>";

														}
													}
												?>
											</select>
										</div>
										<div class="col">
											<label for="productname">Product Name</label>
											<input type="text" class="form-control w-100" placeholder="Product name" name="item_name" value="<?php echo $item_name ?>">
										</div>
									</div>
								</div>
								<!--/Product brand /name-->

								<!--Price-->
								<div class="form-group py-1 px-4">
									<div class="row">
										<div class="col">
											<label>MRP</label>
											<input type="text" class="form-control w-100" placeholder="Mrp" name="item_mrp" value="<?php echo $item_mrp ?>">         
										</div>
										<div class="col">
										<label>Selling Price</label>
											<input type="text" class="form-control w-100" placeholder="Selling Price" name="item_price" value="<?php echo $item_price ?>">
										</div>
									</div>
								</div>
								<!--/Price--->

								<!--qty-->
								<div class="form-group py-1 px-4">
									<label>Product Quantity</label>
									<input type="text" class="form-control w-100" name="item_qty" placeholder="Product Quantity" value="<?php echo $item_qty ?>" >
								</div>
								<!--/qty-->

								<!--images-->
								<div class="form-group py-1 px-4">
									<label>Product Images</label>
									<input type="file" class="form-control w-100" name="item_images" <?php echo $image_required ?> >
								</div>
								<!--/images-->

								<!--short desc-->
								<div class="form-group py-1 px-4">
									<label>Short Description of Product</label>
									<textarea  id="" cols="" rows="3" class="px-2 py-1 w-100 form-control " placeholder="Short Description" name="item_shortdesc"><?php echo $item_shortdesc ?></textarea>
								</div>
								<!--/short desc-->

								<!--Long Desc-->
								<div class="form-group py-1 px-4">
									<label>Description of Product</label>
									<textarea  id="" cols="" rows="5" class="px-2 py-1 w-100 form-control " placeholder="Description" name="item_longdesc"><?php echo $item_longdesc ?></textarea>
								</div>
								<!--/Long Desc-->

								<!--Best seller-->
								<div class="form-group py-1 px-4">
									<label for="categories">Best seller</label>
									<select class="form-control" style=" font-family: 'Baloo Thambi 2', cursive;font-size:17px " name="best_seller">
										<option>Select</option>
										<option value="1"<?php if($best_seller=="1") echo 'selected="selected"';?>>Yes</option>
										<option value="0"<?php if($best_seller=="0") echo 'selected="selected"';?>>No</option>
										
									</select>
								</div>
								<!--Best seller-->

								<!--Meta title desc-->
								<div class="form-group py-1 px-4">
									<div class="row">
										<div class="col">
											<label>Meta title</label>
										<textarea  id="" cols="" rows="3" class="px-2 py-1 w-100 form-control " placeholder="Title" name="meta_title"><?php echo $meta_title ?></textarea>        
										</div>
										<div class="col">
										<label>Meta Description</label>
											<textarea  id="" cols="" rows="3" class="px-2 py-1 w-100 form-control " placeholder="Meta Description" name="meta_desc"><?php echo $meta_desc ?></textarea>
										</div>
									</div>
								</div>
								<!--/Meta title desc--->

								<!--meta keyword-->
								<div class="form-group py-1 px-4">
									<label>Keyword</label>
									<textarea  id="" cols="" rows="4" class="px-2 py-1 w-100 form-control " placeholder="Meta keyword" name="meta_keyword"><?php echo $meta_keyword ?></textarea>
								</div>
								<!--/META KEYWORD-->
							
								<button id="payment-button" type="submit" class="btn  btn-info btn-block" name="submit">
									<span id="payment-button-amount" name="submit">Submit</span>
								</button>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('admin_footer.php');?>