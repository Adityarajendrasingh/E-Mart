<?php 
   include('admin_top.php');
   include('dbconnection.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type=$_GET['type'];
   if($type=='status')
   {
      $operation = $_GET['operation'];
      $id = $_GET['id'];
      if($operation=='active')
      {
         $status='1';
      }
      else
      {
         $status='0';
      }
      $update_status =$mysqli->query( "Update product set status = '$status' where item_id='$id'");
   }
   if($type=='delete')
   {
      $id = $_GET['id'];
      $delete_cat =$mysqli->query( "delete from product where  item_id='$id'");
   }
}
$sql = $mysqli->query("select product.*,categories.categories,laptop_brand.brand_name from product,categories,laptop_brand where product.categories_id = categories.id and product.item_brand = laptop_brand.id and laptop_brand.status = '1' ORDER by 1 asc ") or die($mysqli->error);
?>


<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="font-size:25px;">Product </h4>
                  <h6 ><a href="admin_manage_product.php" style="font-size: 15px;" class="mt-2 btn btn-outline-primary">Add Product</a></h6>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table table-responsive ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th class="avatar">ID</th>
                              <th>Categories</th>
                              <th>Brand</th>
                              <th>Name</th>
                              <th>Images=</th>
                              <th>MRP</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th></th>
                              
                              
                           </tr>
                        </thead>
                        <tbody>
                              <?php 
                              $c=1;
                              while($row = mysqli_fetch_assoc($sql)) 
                              {
                              ?>
                              <tr>
                                 <td class="serial"><?php echo $c ;?></td>
                                 <td><?php echo $row['item_id'] ;?></td>
                                 <td><?php echo $row['categories'] ;?></td>
                                 <td><?php echo $row['brand_name'] ;?></td>
                                 <td><?php echo $row['item_name'] ;?></td>
                                 <td><img src="images/<?php echo $row['item_images'] ;?>"></td>
                                 <td><?php echo $row['item_mrp'] ;?></td>
                                 <td><?php echo $row['item_price'] ;?></td>
                                 <td class="text-nowrap"><?php echo $row['item_qty'] ;?></td>
                                 <td class="text-nowrap">
                                    <?php
                                       if($row['status']==1)
                                       {
                                          echo "<span class='badge badge-complete'><a href ='?type=status&operation=deactive&id=".$row['item_id']."'>Active</a></span>&nbsp";
                                       }
                                       else
                                       {
                                          echo "<span class='badge badge-pending'><a href ='?type=status&operation=active&id=".$row['item_id']."'>Deactive</a></span>&nbsp";
                                       }
                                       echo "<span class='badge badge-edit'><a href='admin_manage_product.php?type=edit&id=".$row['item_id']."'>Edit</a></span>&nbsp";
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['item_id']."'>Delete</a></span>&nbsp";
                                    ?>
                                 </td>
                              </tr> 
                              <?php 
                                $c++; } 
                              ?>
                           </tbody>
                        </tbody>
                     </table>
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
