<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<div class="row"><!--row begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="breadcrumb"><!--breadcrumb begin -->
      <li class="active"><!--active begin -->
        <i class="fa fa-dashboard"></i>Dashboard /view users
      </li><!--active finish -->
    </div><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin 2 -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="panel panel-default"><!--panel panel-default begin -->
      <div class="panel-heading"><!--panel panel-heading begin -->
      <div class="panel-title"><!--panel-title begin -->
         <i class="fa fa-tags"></i> view users
        </div><!--panel-title finish -->
      </li><!--panel-heading finish -->

       <div class="panel-body"><!--panel-body begin 2 -->
           <div class="table-responsive"><!--table-responsive begin 2 -->
               <table class="table table-striped table-bordered table-hover"><!--table-striped finish -->
                 <thead><!--thead begin 2 -->
                  <tr><!--tr begin 2 -->
                    <td>Admin id</td>
                    <td>Admin Name</td>
                    <td>Admin Email</td>
                    <td>Admin Image</td>
                    <td>Admin contact</td>
                    <td>Admin delete</td>
                    <td>Admin edit</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                   <tbody>
                     <?php
                      $i=0;
                      $get_admins = "select * from admins";
                      $run_admins = mysqli_query($con, $get_admins);

                      while($row_admins = mysqli_fetch_array($run_admins)){
                          $admin_id = $row_admins['admin_id'];
                          $admin_name = $row_admins['admin_name'];
                          $admin_email = $row_admins['admin_email'];
                          $admin_image = $row_admins['admin_image'];
                          $admin_contact = $row_admins['admin_contact'];
                           $i++;
                      
                     ?>
                     <tr><!--tr begin -->
                         <td><?php echo $i ?></td>
                         <td><?php echo  $admin_name ?></td>
                         <td><?php echo $admin_email ?></td>
                         <td><img src="../admin_area/admin_images/<?php echo $admin_image ?>" width="60" height="60" alt=""></td>
                         <td><?php echo $admin_contact ?></td>
                         <td>
                          <a href="index.php?delete_admins=<?php echo $admin_id?>">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                         </td>
                         <td>
                         <a href="index.php?user_profile=<?php echo $admin_id ?>">
                            <i class="fa fa-pencil"></i>Edit
                          </a>
                         </td>
                     </tr><!--tr finish -->
                     <?php } ?>
                   </tbody>
               </table><!--panel-body begin 2 -->
           </div><!--table-responsive finish -->
       </div><!--table-striped finish -->
    </div><!--panel panel-defaultfinish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->


<?php } ?>