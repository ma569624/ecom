<?php 
require 'header.inc.php'; 

if (isset($_GET['type']) && $_GET['type']!='') {

    $type = get_safe_vale($con,$_GET['type']);
   
    if($type=='status'){
        $operation = get_safe_vale($con,$_GET['operation']);
        $id = get_safe_vale($con,$_GET['id']);
        if($operation=='active')
        {
            $status = '1';
        }
        else{
            $status = '0'; 
        }
        $update_status = "update categories set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
    }
    if($type=='delete'){
        $id = get_safe_vale($con,$_GET['id']);
        $delete_sql = "delete from categories  where id='$id'";
        mysqli_query($con,$delete_sql);
    }
    
}
$sql = "Select * FROM categories order by categories asc";
$res = mysqli_query($con,$sql);
?>
      
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categirous </h4>
                           <h6 ><a href="add_cat.php">Add Categirous</a></h6>

                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                        <th class="serial">Sr No</th>
                                       <th>ID</th>
                                       <th>Categirous Name</th>
                                       <th>Status</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>

                                    <?php 
                                    $i = 1;
                                    while($row= mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                        <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['id'] ?></td>
                                       <td><?php echo $row['categories']?></td>
                                        <td>
                                            <?php 
                                                if($row['status']==1){
                                                    echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."' style='color: #fff !important'>Active</a> </span> &nbsp";
                                                }
                                                else {
                                                    echo "<span class='badge badge-complete'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp";
                                                }
                                                
                                                echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>&nbsp";
                                                echo "&nbsp<a href=' add_cat.php?id=".$row['id']."'>Edit</a>&nbsp";
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
         