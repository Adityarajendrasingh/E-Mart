<?php 
   include('admin_top.php');
   include('dbconnection.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type=$_GET['type'];
      if($type=='delete')
   {
      $id = $_GET['id'];
      $delete_cat =$mysqli->query( "delete from contact_us where  id='$id'");
   }
}
   $sql = $mysqli->query("select * from contact_us order by id desc") or die($mysqli->error);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="font-size:25px;">Contact Us </h4>
                 
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th c>#</th>
                              <th class="avatar">ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile No.</th>
                              <th>Comment</th>
                              <th>Date</th>
                              <th>Action</th>
                              
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
                                 <td><?php echo $row['name'] ;?></td>
                                 <td><?php echo $row['email'] ;?></td>
                                 <td><?php echo $row['mobile'] ;?></td>
                                 <td><?php echo $row['comment'] ;?></td>
                                 <td><?php echo $row['added_on'] ;?></td>
                                 <td>
                                    <?php
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
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
