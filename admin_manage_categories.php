<?php
include('dbconnection.php');
include('admin_top.php');
$cat='';
$msg = '';
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$id = $_GET['id'];
	$res = $mysqli->query("select * from categories where id = '$id'");
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		$row=mysqli_fetch_assoc($res);
		$cat = $row['categories'];
	}
	else
	{
		header('location:admin_categories.php');
		die();
	}


}

if(isset($_POST['submit']))
{
	$cat = $_POST['categories'];
	$res = $mysqli->query("select * from categories where categories = '$cat'");
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
				$msg = 'Categories already Exists';
			}
		}
		else
		{
			$msg = 'Categories already Exists';
		}
		
		
	}
	if($msg=='')
	{

		if(isset($_GET['id']) && ($_GET['id'])!='')
		{
			$update_cat =$mysqli->query( "Update categories set categories = '$cat' where id='$id'");
		}
		else
		{
			$sql = $mysqli->query("Insert into categories (categories,status) values ('$cat','1')");
		}
		header('location:admin_categories.php');
		die();
	}
}
if(isset($_GET['id']) && ($_GET['id'])!='')
{
	$id = $_GET['id'];
	$res = $mysqli->query("select * from categories where id = '$id'");
	$row=mysqli_fetch_assoc($res);
	$cat = $row['categories'];


}

?>
 		<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                     	<form method="post">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <div class="form-group">
                           	<label for="categories" class=" form-control-label">Add Categories</label><input type="text" name="categories" placeholder="Enter Categories name" class="form-control" required value="<?php echo  $cat ;?>">
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