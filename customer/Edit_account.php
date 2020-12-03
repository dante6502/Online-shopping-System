<?php 

$customer_session = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email = '$customer_session'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_regno = $row_customer['customer_regno'];
$customer_contact = $row_customer['customer_contact'];
$customer_course = $row_customer['customer_course'];
$customer_yearofstudy = $row_customer['customer_yearofstudy'];
$customer_profile = $row_customer['customer_profile'];

?>

<h1>Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data"><!--form begin-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Name</label>
   <input type="text" name="c_name"  value="<?php echo $customer_name;?>" class="form-control" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Email</label>
   <input type="text" name="c_nemail" class="form-control" value="<?php echo $customer_email;?>" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Registration number</label>
   <input type="text" name="c_registrationnumber" class="form-control" value="<?php echo $customer_regno;?>" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">contact</label>
   <input type="text" name="c_telnumber" class="form-control" value="<?php echo $customer_contact;?>" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">course</label>
   <input type="text" name="c_course" class="form-control" value="<?php echo $customer_course;?>" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">year of study</label>
   <input type="text" name="c_yearofstudy" class="form-control" value="<?php echo $customer_yearofstudy;?>" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Profile picture</label>
   <input type="file" name="c_image" class="form-control" value="<?php echo $customer_profile;?> required>
   <img class="img-responsive" src="admin_area/product_images/product6" alt="product 6">
 </div><!--form-group finish-->

 <?php

 if(isset($_POST['update'])){
   $update_id = $customer_id;
   $c_name = $_POST['c_name'];
   $c_email = $_POST['c_email'];
   $c_regno = $_POST['c_regno'];
   $c_contact = $_POST['c_contact'];
   $c_course = $_POST['c_course'];
   $c_yearofstudy = $_POST['c_yearofstudy'];

   $c_profile = $_FILES['c_profile']['tmp_name'];
   move_uploaded_file ($c_profile_tmp, "customer_images/$c_image");

   $update_customer = "update customers set customer_name='$customer_name',customer_email='$customer_email',customer_regno='$customer_regno',customer_contact='$customer_contact',customer_course='$customer_course',customer_yearofstudy='$customer_yearofstudy',customer_profile='$customer_profile' where customer_id='$update_id'";
   $run_customer = mysqli_query($con, $update_customer);

   if($run_customer){

    echo "<script>alert('your account has been successfull update...to complete the task login')</script>";
    echo "<script>window.open('logout.php', '_self')</script>";
   }

 }
 ?>
 <div class="text-center"><!--text center begin-->
  <button name="update" class="btn btn-primary"><!--btn btn begin-->
     <i class="fa fa-user-md"></i>Update Now
  </button><!--ntn btn finish-->
 </div><!--text-cenetr finish-->
</form><!--form finish-->