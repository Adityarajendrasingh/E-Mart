<?php 
   include('admin_top.php');
   include('dbconnection.php');

$sql = $mysqli->query("select * from userlogs order by id desc") or die($mysqli->error);
$result = mysqli_num_rows($sql);

?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="font-size:25px;">User Logs</h4>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
   
                     <table class="table ">
                        <thead>
                           <tr>
                              <th c>#</th>
                              <th class="avatar">User ID</th>
                              <th>User Name</th>
                              <th>User IP</th>
                              <th>Status</th>
                              <th>Login Time</th>
                              <th>Logout Time</th> 
                           </tr>
                        </thead>

                        <tbody>
                              <?php 
                              $c=1;
                              if($result<=0)
                              {
                                 echo '<div class="norecord">
                                          <h4>NO Record Found</h4>
                              </div>                  ';
                              }
                              while($row = mysqli_fetch_assoc($sql)) 
                              {
                                 $login = $row['logintime'];
                                 $date = strtotime($login);
                                 $time=date('d/m/Y h:i:s A',$date);
                                
                              ?>
                              <tr>
                                 <td class="serial"><?php echo $c ;?></td>
                                 <td><?php echo $row['uid'] ;?></td>
                                 <td><?php echo $row['username'] ;?></td>
                                 <td><?php echo $row['userip'] ;?></td>
                                 <td><?php echo $row['status'] ;?></td>
                                 <td><?php echo $time ;?></td>
                                 <td><?php echo $row['logout'] ;?></td>
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
