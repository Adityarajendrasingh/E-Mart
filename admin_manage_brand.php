<?php
include('dbconnection.php');
include('admin_top.php');
$cat='';
$msg = '';
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$id = $_GET['id'];
	$res = $mysqli->query("select * from laptop_brand where id = '$id'");
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		$row=mysqli_fetch_assoc($res);
		$cat = $row['brand_name'];
	}
	else
	{
		header('location:admin_productbrand.php');
		die();
	}


}

if(isset($_POST['submit']))
{
	$cat = $_POST['brand_name'];
	$res = $mysqli->query("select * from laptop_brand where brand_name = '$cat'");
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		if(isset($_GET['id']) && ($_GET['id'])!='')
		{
			$getdata=mysqli_fetch_assoc($res);
		
		
			if($id==$getdata['id'])
			{

			}
			else
			{
				$msg = 'Brand name already Exists';
			}
		}
		else
		{
			$msg = 'Brand Name already Exists';
		}
		
		
	}
	if($msg=='')
	{

		if(isset($_GET['id']) && ($_GET['id'])!='')
		{
			$update_cat =$mysqli->query( "Update laptop_brand set brand_name = '$cat' where id='$id'");
		}
		else
		{
			$sql = $mysqli->query("Insert into laptop_brand (brand_name,status) values ('$cat','1')");
		}
		header('location:admin_productbrand.php');
		die();
	}
}
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$id = $_GET['id'];
	$res = $mysqli->query("select * from laptop_brand where id = '$id'");
	$row=mysqli_fetch_assoc($res);
	$cat = $row['brand_name'];


}

?>
 		<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     	<form method="post">
                        <div class="card-header"><strong>Brand Name</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <div class="form-group">
                           	<label for="BrandName" class=" form-control-label">Add Brand Name</label><input type="text" name="brand_name" placeholder="Enter Categories name" class="form-control text-capitalize" required value="<?php echo  $cat ;?>">
                           	<button id="payment-button" type="submit" class="btn  btn-info btn-block mt-3" name="submit">
                           <span id="payment-button-amount" name="submit">Submit</span>
                           </button>
                           <div class="field_error mt-3"><?php echo $msg; ?></div>
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php include('admin_footer.php');?>