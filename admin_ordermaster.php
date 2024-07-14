<?php 
   include('admin_top.php');
   include('dbconnection.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type=$_GET['type'];
      if($type=='delete')
   {
      $id = $_GET['id'];
      $delete_cat =$mysqli->query( "delete from user where  user_id='$id'");
   }
}
if(isset($_POST['submit']))
{
   $order_status = $_POST['order_status'];
   $id=$_POST['order_id'];
   echo $id;
   //echo  $order_status;
   $update = $mysqli->query("update order_checkout set order_status = ' $order_status' where id = $id ") or die($mysqli->error);
}
   $sql = $mysqli->query("select * from user order by user_id desc")or die($mysqli->error);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="font-size:25px;">Order Detail </h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                  <?php
                     $result = $mysqli->query("SELECT order_checkout.*,order_detail.*,product.*,order_status.id,order_status.status as order_status,user_address.* from order_checkout,order_detail,product,order_status,user_address where order_detail.order_id=order_checkout.id AND product.item_id = order_detail.item_id AND order_checkout.order_status = order_status.id AND user_address.user_id = order_checkout.user_id " ) or die($mysqli->error);
                     $query = mysqli_num_rows($result);
                     if($query<1)
                     {
                  ?>
                  <div class="norecord "><h4 class="text-center font-weight-bold">No Record Found</h4></div>
                  <?php
                     }
                     else
                     {
                  ?>
                     <table class="table " >
                        <thead>
                           <th>Order Id</th>
                           <th>User Id</th>
                           <th>Product Image</th>
                           <th>Prdouct Name</th>
                           <th>Product Price</th>
                           <th>Dilvery Address</th>
                           <th>Order Date</th>
                           <th>Payment Mode</th>
                           <th>Order Status</th>
                           <th>Total Price</th>
                           <th>Receipt</th>
                           <th></th>
                        </thead>
                        <tbody>
     
                              <?php
                           
                          
                             
                              while($row = mysqli_fetch_assoc($result))
                              {
                              $total = 0;
                              $total += $row['total_price'];
                              $status = $row['order_status'];
                              $id=$row['order_id'];
                        
                           
                        ?>
                        <tr>
                           <td><?php echo $row['order_id'];?></td>
                           <td><?php echo $row['user_id'];?></td>
                           <td><img src="images/<?php echo $row['item_images'] ?>" alt="" style="max-width: 100px;"></td>
                           <td><?php echo $row['item_name'];?></td>
                           <td class="text-nowrap">₹ <?php echo $row['item_price'];?></td>
                           <td><?php echo $row['address'];?></td>
                           <td><?php echo $row['added_on'];?></td>
                           <td><?php echo $row['payment_type'];?></td>
                           <td class="text-nowrap">
                              <form action="" method="POST">
                                 <div class="order_status mx-3">
                                    <strong>Order Status</strong>
                                    <p><?php echo $status ?></p>
                                    <strong>Update Order Status</strong>
                                    <input type="hidden" name="order_id" value=<?php echo $id ?>>
                                    <select class="form-control" style=" font-family: 'Baloo Thambi 2', cursive;font-size:17px " name="order_status">

                                       <option>Select Category</option>
                                       <?php
                                          $result1 = $mysqli->query("select id,status from order_status ");
                                          while ($row1=mysqli_fetch_assoc($result1)) 
                                          { 
                                             if($row1['status']==$status)
                                             {
                                                echo "<option selected value=".$row1['id'].">".$row1['status']."</option>";

                                             }
                                             else
                                             {
                                                echo "<option value=".$row1['id'].">".$row1['status']."</option>";

                                             }
                                             
                                          }

                                       ?>
                                    </select>
                                    <br>
                                 </div>
                                 <div class="update mx-3">
                                    <button type="" class="btn btn-primary w-100" name="submit">Update</button>
                                 </div>
                              </form>
                           </td>
                           <td class="text-nowrap">₹ <?php echo $row['item_price'];?></td>
                           <td class="text-nowrap"><span class="mt-1" style="font-size:1rem;font-family: 'Baloo 2',cursive;"><button class="mx-2 mt-1 btn btn-info"><a href="orderpdf.php?orderid=<?php echo $row['order_id'] ?>" class="text-white">Download</a></button></span></td>
                        </tr>
                        
                        <?php } ?>
                       
                        </tbody>
                    

                        
                     </table>
                     <hr>
                     <?php } ?>
                     <br>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include('admin_footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <?php
      if(isset($_SESSION['msg']) && $_SESSION['msg']!='')
      {
     ?>
     <script>
      swal.fire({
               title:"<?php echo $_SESSION['msg'];?>",
               icon:"<?php echo $_SESSION['msg_status'];?>",
               button:"OK",
         });
     </script>
     <?php
     unset($_SESSION['msg']);
      }
     ?>
