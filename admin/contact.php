<?php 
require 'header.inc.php'; 

if (isset($_GET['type']) && $_GET['type']!='') {

    $type = get_safe_vale($con,$_GET['type']);
   
   
    if($type=='delete'){
        $id = get_safe_vale($con,$_GET['id']);
        $delete_sql = "delete from contact_us  where id='$id'";
        mysqli_query($con,$delete_sql);
    }
    
}
$sql = "Select * FROM contact_us order by id desc";
$res = mysqli_query($con,$sql);
?>
      
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Details</h4>
                           

                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                        <th class="serial">Sr No</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>email</th>
                                       <th>phone</th>
                                       <th>added_on</th>
                                       <th></th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>

                                    <?php 
                                    $i = 1;
                                    while($row= mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                        <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['id'] ?></td>
                                       <td><?php echo $row['name'] ?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['phone']?></td>
                                       <td><?php echo $row['added_on']?></td>
                                        <td>
                                            <?php 
                                               
                                                echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>&nbsp";
                                            ?>
                                        </td>
                                    </tr>
                                    
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>

<?php require 'footer.inc.php' ?>
         