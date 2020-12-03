<?php

session_start();
if(!isset($_SESSION['customer_email'])){
  echo "<script>window.open('../checkout.php','_self')</script>";
}else {
include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUK ONLINE SHOPPING SYSTEM</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
    <div id="top"><!-- Top Begin -->
       <div class="container"><!-- container Begin -->
             <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
                <a href="a" class="btn btn-success btn-sm">
                
                 <?php 
                   if(!isset($_SESSION['customer_email'])){
                     echo "welcome Guest";
                   }else{
                     echo "welcome: " . $_SESSION['customer_email']. ""; 
                   }

                 ?>
                
                
                </a>
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | $ Total price: $ <?php total_price() ?> </a>
       </div><!-- col-md-6 offer Finish -->
       <div class="col-md-6"><!--col-md-6 begin -->
            <ul class="menu"><!-- cmenu Begin -->
            <li>
               <a href="customer_register.php">Register</a>
            </li>
            <li>
               <a href="customer/my_account.php">My Account</a>
            </li>
            <li>
               <a href="../cart.php">Go To Cart</a>
            </li>
            <li>
               <a href="../checkout.php">
               <?php 
                   if(!isset($_SESSION['customer_email'])){
                     echo "<a href='checkout.php'> Login </a>";
                   }else{
                    echo "<a href='logout.php'> Log out </a>";
                   }

                 ?>
               
               </a>
            </li>
            </ul><!-- cmenu finish -->
       </div><!--col-md-6 finish -->
       </div><!-- container Begin --></div><!-- Top Finish -->
<div id="navbar" class="navbar navbar-default"><!--navbar navbar-defaul --> 
   <div class="container"><!-- container begin -->
       <div class="navbar-header"><!--  navbar-header begin -->
          <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home begin -->
              <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
              <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo" class="visible-xs">
          </a><!-- navbar-brand home finish -->
          <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-align-justisfy"></i>
          </button>
          <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
              <span class="sr-only">Toggle search</span>
              <i class="fa fa-search"></i>
          </button>
       </div><!--  navbar-header finish -->
       <div class="navbar-collapse collapse" id="navigation" ><!--navbar-collapse collapse begin-->
            <div class="padding-nav"><!--paddidng nav begin -->
               <ul class="nav navbar-nav left"><!--nav navbar-nav left begin -->
                    <li class="active" >
                        <a href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="shop.php">Shop</a>
                    </li>
                    <li >
                       <?php

                       if(isset($_SESSION['customer_email'])){
                         echo "<a href='checkout.php'>My account</a>";
                       }else {
                        echo "<a href='customer/my_account.php?my_orders.php'>My account</a>";
                       }

                       ?>
                    </li>
                    <li  >
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li >
                        <a href="contact.php">Contact Us</a>
                    </li>
               </ul> <!--nav navbar-nav left finish -->  
            </div><!--paddidng nav finish -->
            <a href="../cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary right begin -->
                <i class="fa fa-shopping-cart"></i>
                <span><?php items(); ?> Items In Your Cart | $ Total price: $ <?php total_price() ?></span>
            </a><!--btn navbar-btn btn-primary right finish -->
            <div class="navbar-collapse collapse right"><!--navbar-collapse collapse right begin -->
                <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search" ><!--btn btn-primary navbar-btn begin -->
                     <span class="sr-only">Toggle search</span>
                     <i class="fa fa-search"></i>
                </button><!--btn btn-primary navbar-btn finish -->
            </div><!--navbar-collapse collapse right finish -->
            <div class="collapse clearfix" id="search"><!--collapse clearfix begin -->
                <form method="get" action="result.php" class="navbar-form"><!--navbar-form begin -->
                   <div class="input-group"><!--input-group begin -->
                     <input type="text" class="form-control" placeholder="search" name="user_query" required>
                     <span class="input-group-btn"><!--input-group-btn start-->
                     <button type="submit" name="search" value="search" class="btn btn-primary" ><!--btn btn-primary begin-->
                       <i class="fa fa-search"></i>
                     </button><!--btn btn-primary finish-->
                     </span><!--input-group-btn finish-->
                   </div><!--input-group finish -->
                </form><!--navbar-form finish -->
            </div><!--collapse clearfix finish -->
          </div><!--navbar-collapse collapse finish-->
        </div> <!-- container finish --> 
    </div><!--navbar navbar-defaul finish-->
    <div id="content"> <!--#container begin -->
      <div class="container"> <!-- container begin -->
         <div class="col-md-12"> <!-- col-md-12 begin-->
           <ul class="breadcrumb"> <!-- breadcrumb begin -->
             <li>
                 <a href="index.php">Home</a>
             </li>
             <li>
                My Account
             </li>
           </ul> <!-- breadcrumb finish -->
         </div> <!-- col-md-12 finish -->
         <div class="col-md-3"> <!-- col-md-3 begin -->
           <?php
           include("includes/sidebar.php")
           ?>
         </div> <!-- col-md-3 finish -->

         <div class="col-md-9"> <!-- col-md-9 begin -->
            <div class="box"> <!-- box begin -->
              <h1 align="center"> Please confirm your payment</h1>
              <form action="confirm.php?update_id =<?php echo $order_id; ?>" method="post" enctype="multupart/form-data"><!-- form begin -->
                 <div class="form-group"> <!-- form-group begin -->
                   <label for="">Invoice Number:</label>
                    <input type="text" class="form-control" name="invoice_number" required>
                 </div> <!-- form-group finish -->
                 <div class="form-group"> <!-- form-group begin -->
                   <label for="">Amount Sent:</label>
                    <input type="text" class="form-control" name="amount" required>
                 </div> <!-- form-group finish -->
                 <div class="form-group"> <!-- form-group begin -->
                   <label for="">Select Payment Mode:</label>
                     <select name="payment_mode" id="" class="form-control"> <!-- form control begin -->
                        <option value="">Select Payment Mode</option>
                        <option value="">payoneer</option>
                        <option value="">mpesa</option>
                        <option value="">paypal</option>
                     </select><!-- form control finish -->
                 </div> <!-- form-group finish -->
                 <div class="form-group"><!-- form group begin -->
                   <label for="">Transaction/ Reference ID:</label>
                   <input type="text" class="form-control" name="ref_number" required>
                 </div><!-- form group finish -->
                 <div class="form-group"><!-- form group begin -->
                   <label for="">Paypal / mpesa / payoneer</label>
                   <input type="text" class="form-control" name="code" required>
                 </div><!-- form group finish -->
                 <div class="form-group"><!-- form group begin -->
                   <label for="">Payment Date:</label>
                   <input type="text" class="form-control" name="payment_date" required>
                 </div><!-- form group finish -->
                 <div class="text-center"><!-- text-center begin-->
                     <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- btn btn-primary btn-lg begin-->
                        <i class="fa fa-user-md"></i>confirm Payment
                     </button><!-- btn btn-primary btn-lg finish-->
                 </div><!-- text-center finish -->
            </form> <!-- form finish -->

            <?php 
            
            if(isset($_POST['confirm_payment'])){
              $update_id =$_GET['update_id'];
              $invoice_number =$_POST['invoice_number'];
              $amount =$_POST['amount'];
              $payment_mode =$_POST['payment_mode'];
              $ref_number =$_POST['ref_number'];
              $code =$_POST['code'];
              $payment_date =$_POST['payment_date'];
              $complete = "Complete";

              $insert_payment = "insert into payments (invoice_number, amount, payment_mode, ref_number, code, payment_date) 
              values('$invoice_number', '$amount', '$payment_mode', '$ref_number','$code', '$payment_date')";

              $run_payment = mysqli_query($con, $insert_payment);
              $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
              $run_customer_order = mysqli_query($con, $update_customer_order);
              $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
              $run_pending_order = mysqli_query($con, $update_pending_order);

              if($run_pending_order){
                echo "<script>alert('thanks for placing your order')</script>";
                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
              }

            }
            
            ?>

            </div> <!-- box finish -->
            </div> <!-- col-md-9 finish -->
         </div> <!-- container finish -->
    </div> <!-- #content finish --> 
<?php
include("includes/footer.php")
?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>
                     
 <?php } ?>