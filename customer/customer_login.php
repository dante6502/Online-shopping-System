<div class="box"><!--box begin -->
  <div class="box-header"><!--box-header begin -->
   <center><!--center begin -->
     <h1> Login </h1>
   </center><!--center finish -->
  <form action="checkout.php" method="Post"><!--form begin -->
  <div class="form-group"> <!-- form group begin -->
    <label for="">Email</label>
        <input type="text" class="form-control" name="c_email" required>
  </div> <!-- form-group finish finish -->
  <div class="form-group"> <!-- form group begin -->
    <label for="">Password</label>
       <input type="password" class="form-control" name="c_pass" required>
    </div> <!-- form-group finish finish -->
    <div class="text-center"> <!-- text-center begin -->
        <button value="Login" name="login" class="btn btn-primary">
            <i class="fa fa-sign-in"></i>Login
        </button>
        </div> <!-- text-center finish-->
    </form><!--form finish -->

    <center><!--center begin -->
       <a href="customer_register.php">
         <h3>Dont have an account...? Register here</h3>
       </a>
    </center><!--center finish -->
    </div><!--box-header finish -->
</div><!--box finish-->

<?php
if(isset($_POST['login'])){
    $customer_email = $_POST['c_email'];
    $customer_password = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_password'";
    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){
        echo"<script>alert('Your email or password is wrong')</script>";
        exit();
    }
    if( $check_customer==1 AND $check_cart==0) {
        $_SESSION['customer_email'] = $customer_email;
        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        }else{
        $_SESSION['customer_email'] = $customer_email;
        echo"<script>alert('You are logged in')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";

        }


}


?>