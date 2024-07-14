<?php
include('dbconnection.php');
 // Insert Record Function
    function InsertRecord()
    {
      
        $UserName = $_POST['UName'];
        $UserEmail = $_POST['UEmail'];
        
        $query = " insert into user (first_name,email) values('$UserName','$UserEmail')";
        $result= mysqli_query($mysqli,$query);

        if($result)
        {
            echo ' Your Record Has Been Saved in the Database';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    // Display Data Function
    function display_record()
    {
        
        $value = "";
        $value = '<table class="table table-bordered">
                    <tr>
                        <td> User ID </td>
                        <td> User User </td>
                        <td> User Email</td>
                        <td> Edit </td>
                        <td> Delete </td>
                    </tr>';
        $query = "select * from use ";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_assoc($result))
        {
            $value.= ' <tr>
                            <td> '.$row['user_id'].' </td>
                            <td> '.$row['first_name'].' </td>
                            <td> '.$row['email'].'</td>
                            <td> <button class="btn btn-success" id="btn_edit" data-id='.$row['user_id'].'><span class="fa fa-edit"></span></button> </td>
                            <td> <button class="btn btn-danger" id="btn_delete" data-id1='.$row['user_id'].'><span class="fa fa-trash"></span></button> </td>
                        </tr>';
        }
        $value.='</table>';
        echo json_encode(['status'=>'success','html'=>$value]);
    }
     // Get Particular Record
    function get_record()
    {
        global $con;
        $UserID = $_POST['UserID'];
        $query = "select * from user_record where ID='$UserID'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $User_data = "";
            $User_data[0]=$row['ID'];
            $User_data[1]=$row['UserName'];
            $User_data[2]=$row['UserEmail'];
        }
        echo json_encode($User_data);
    }
    // Update Function
    function update_value()
    {
        global $con;
        $Update_ID = $_POST['U_ID'];
        $Update_User =$_POST['U_User'];
        $Update_Email = $_POST['U_Email'];

        $query = "update user_record set UserName='$Update_User', UserEmail='$Update_Email' where ID='$Update_ID '";
        $result = mysqli_query($con,$query);
        if($result)
        {
            echo ' Your Record Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
?>