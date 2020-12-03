<center>
    <h1>Do you really want to delete your account?</h1>
    <form action="" method="post"><!--form begin -->
      <input type="submit" name="Yes" value="Yes, I want to delete" class="btn btn-danger">
      <input type="submit"  name="No" value="No, I dot want to delete" class="btn btn-primary">
    </form><!-- form finish-->
</center>

<?php 

$customer_email = $_SESSION['customer_email'];
if(isset($_POST['Yes'])){
  $delete_customer = "delete from customers where customer_email='$customer_email'";
  $run_delete_customer = mysqli_query($con,$delete_customer);
  
  if($run_delete_customer){
    session_destroy();
    echo "<script>alert('Account deleted successfuly')</script>";
    echo "<script>window.open('../index.php', '_self')</script>";
  }
}

if(isset($_POST['No'])){
  echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
}


?>