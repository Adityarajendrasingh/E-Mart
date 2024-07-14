<?php
include('dbconnection.php');
	$user_id = $_POST['id'];
	$output="";
	$result = $mysqli->query("SELECT * FROM user where user_id = $user_id") or die(mysql_error($mysqli));	
	while($row = mysqli_fetch_array($result))
	{
$output .= 
			'
		<div class="" id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
          <div class="form-group py-1 px-4">
            <div class="row">
                <div class="col">
                    <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: "Rubik", sans-serif;">First Name</h5>
                    <input type="text" class="form-control w-100" placeholder="First name"  id="firstname_update"value='.$row['first_name'].'  >
                    <input type="hidden" class="form-control w-100"   id="UserId_update" value='.$row['user_id'].'  >
                    <span id="error_first_name" class="text-danger"></span>
                </div>
                <div class="col">
                    <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: "Rubik", sans-serif;">Last Name</h5>
                    <input type="text" class="form-control w-100" placeholder="Last Name"  id="lastname_update"value='.$row['last_name'].'  >
                    <span id="error_last_name" class="text-danger"></span>
                </div>
            </div>
          </div>
          <div class="form-group py-1 px-4">
            <div class="row">
                <div class="col">
                    <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: "Rubik", sans-serif;">Email</h5>
                    <input type="text" class="form-control w-100" placeholder="Email ID" id="email_update" value='.$row['email'].' >
                    <span id="error_email" class="text-danger"></span>
                </div>
                <div class="col">
                    <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: "Rubik", sans-serif;">Gender</h5>
                    <input type="text" class="form-control w-100" placeholder="Gender"  id="gender_update" value='.$row['gender'].' >
                    <span id="error_gender" class="text-danger"></span>
                </div>
                <input type="hidden" id="UserId_update" name="">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" name="update" id="edit-submit">Update</button>
      </div>

    </div>
  </div>
</div>

			';
		}
		echo $output;
			

	


?>