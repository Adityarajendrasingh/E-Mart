<?php
include('dbconnection.php');

$result = $mysqli->query("SELECT * FROM user") or die(mysql_error($mysqli));
$num = mysqli_num_rows($result);
$output =
			'	
			<table class="table table-bordered table-striped" >
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
			';	
if($num >  0)
{
	$number =1;
	while($row = mysqli_fetch_array($result))
	{ 
		$output .='
			
		<tr>
			<td>'.$number.'</td>
			<td >'.$row["first_name"].'</td>
            <td >'.$row["last_name"].'</td>
            <td >'.$row["email"].'</td>
            <td>'.$row['gender'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>
            	<button id="'.$row['user_id'].'" id="edit" class=" edit btn btn-outline-info"><i class="fas fa-pencil-alt"></i></button>
			  
				<button id="'.$row['user_id'].'" class=" delete btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
			</td>
		</tr>
					';
					$number++;
	}
}
else
{
	$output .='<tr>
					<td>Data Not Found</td>
				</tr>'
				;
}
$output .= '</table>';
echo $output;
?>