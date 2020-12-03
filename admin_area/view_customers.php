<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<div class="row"><!--row begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="breadcrumb"><!--breadcrumb begin -->
      <li class="active"><!--active begin -->
        <i class="fa fa-dashboard"></i>Dashboard / view customers
      </li><!--active finish -->
    </div><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin 2 -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="panel panel-default"><!--panel panel-default begin -->
      <div class="panel-heading"><!--panel panel-heading begin -->
      <div class="panel-title"><!--panel-title begin -->
         <i class="fa fa-tags"></i> view customers
        </div><!--panel-title finish -->
      </li><!--panel-heading finish -->

       <div class="panel-body"><!--panel-body begin 2 -->
           <div class="table-responsive"><!--table-responsive begin 2 -->
               <table class="table table-striped table-bordered table-hover"><!--table-striped finish -->
                 <thead><!--thead begin 2 -->
                  <tr><!--tr begin 2 -->
                    <td>No:</td>
                    <td>Name</td>
                    <td>Regno</td>
                    <td>Rmail</td>
                    <td>Course</td>
                    <td>Yearofstudy</td>
                    <td> Contact</td>
                    <td>Profile</td>
                    <td>Delete</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                   <tbody>
                     <?php
                      $i=0;
                      $get_customer = "select * from customers";
                      $run_customer = mysqli_query($con, $get_customer);

                      while($row_customer = mysqli_fetch_array($run_customer)){
                          $customer_id = $row_customer['customer_id'];
                          $customer_name = $row_customer['customer_name'];
                          $customer_regno = $row_customer['customer_regno'];
                          $customer_email = $row_customer['customer_email'];
                          $customer_course = $row_customer['customer_course'];
                          $customer_yearofstudy  = $row_customer['customer_yearofstudy'];
                          $customer_contact = $row_customer['customer_contact'];
                          $customer_profile = $row_customer['customer_profile'];
                           $i++;
                      
                     ?>
                     <tr><!--tr begin -->
                         <td><?php echo $i ?></td>
                         <td><?php echo $customer_name; ?></td>
                         <td><?php echo $customer_regno; ?></td>
                         <td><?php echo $customer_email; ?></td>
                         <td><?php echo $customer_course; ?></td>
                         <td><?php echo $customer_yearofstudy; ?></td>
                         <td><?php echo $customer_contact; ?></td>
                         <td><img src="../customer/customer_images/<?php echo $customer_profile; ?>" width="60" height="60" alt=""></td>
                         <td>
                          <a href="index.php?delete_customer=<?php echo $customer_id ?>">
                            <i class="fa fa-trash-o"></i>Delete
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