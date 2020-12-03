<h1>Change Password</h1>
<form action="" method="post" enctype="multipart/form-data"><!--form begin-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Old password</label>
   <input type="text" name="customer_old_pass" class="form-control" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">New Password</label>
   <input type="password" name="customer_new_pass" class="form-control" required>
 </div><!--form-group finish-->
 <div class="form-group"><!--form-group begin-->
   <label for="">Confirm new Pass</label>
   <input type="password" name="customer_confirm_new_pass" class="form-control" required>
 </div><!--form-group finish-->
 <div class="text-center"><!--text center begin-->
  <button name="submit" class="btn btn-primary"><!--btn btn begin-->
     <i class="fa fa-user-md"></i>submit
  </button><!--ntn btn finish-->
 </div><!--text-cenetr finish-->
</form><!--form finish-->

<?php
 
 if(isset($_POST['submit'])){

  $customer_email = $_SESSION['customer_email'];
  $customer_old_pass = $_POST['customer_old_pass'];
  $customer_new_pass = $_POST['customer_new_pass'];
  $customer_confirm_new_pass = $_POST['customer_confirm_new_pass'];
  $get_old_pass = "select * from customers where customer_pass='$customer_old_pass'";
  $run_customer_old_pass = mysqli_query($con, $get_old_pass);
  $check_customer_old_pass = mysqli_fetch_array($run_customer_old_pass);

  if($check_customer_old_pass==0){
    echo "</script>alert('sorry, your current password is incorrect. please try again')</script>";
    exit();
  }

  if($customer_new_pass != $customer_confirm_new_pass){
    echo "</script>alert('sorry, your new password didnt match')</script>";
    exit(); 
  }

  $update_customer_pass = "update customers set customer_email='$customer_email'";
  $run_customer_pass = mysqli_query($con, $update_customer_pass);

  if($run_customer_pass){

    echo "<script>alert('your password has been updated')</script>";
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
  }

 }

?>