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
      $update_status =$mysqli->query( "Update laptop_brand set status = '$status' where id='$id'");
   }
   if($type=='delete')
   {
      $id = $_GET['id'];
      $delete_cat =$mysqli->query( "delete from laptop_brand where  id='$id'");
   }
}
   $sql = $mysqli->query("select * from laptop_brand order by brand_name Asc") or die($mysqli->error);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="font-size:25px;">Brand Name </h4>
                  <h6 ><a href="admin_manage_brand.php" style="font-size: 15px;" class="mt-2 btn btn-outline-primary">Add Brand</a></h6>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">#</th>
                              <th class="avatar">ID</th>
                              <th>Brand name</th>
                              <th>Status</th>
                              
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
                                 <td><?php echo $row['id'] ;?></td>
                                 <td><?php echo $row['brand_name'] ;?></td>
                                 <td>
                                    <?php
                                       if($row['status']==1)
                                       {
                                          echo "<span class='badge badge-complete'><a href ='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp";
                                       }
                                       else
                                       {
                                          echo "<span class='badge badge-pending'><a href ='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp";
                                       }
                                       echo "<span class='badge badge-edit'><a href='admin_manage_brand.php?type=edit&id=".$row['id']."'>Edit</a></span>&nbsp";
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
                                    //   echo "<span class='badge badge-edit'><a href='?type=edit&id=".$row['id']."'>Delete</a></span>&nbsp";
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
