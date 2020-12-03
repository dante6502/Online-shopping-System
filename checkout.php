<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
  ?>

<?php
if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];
    $get_product = "select * from products where product_id = '$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $product_cat_id = $row_product['p_cat_id'];
    $product_title = $row_product['product_title'];
    $product_category = $row_product['p_cat_id'];
    $product_img1 = $row_product['product_img1'];
    $product_img2 = $row_product['product_img2'];
    $product_img3 = $row_product['product_img3'];
    $product_price = $row_product['product_price'];
    $product_keywords = $row_product['product_keywords'];
    $product_desc = $row_product['product_desc'];
    $get_product_cat = "select * from product_categories where p_cat_id='$product_cat_id'";
   $run_product_cat = mysqli_query($con,$get_product_cat);
   $row_product_cat = mysqli_fetch_array($run_product_cat);
   $product_cat_title = $row_product_cat['p_cat_title'];
    
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
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total price: <?php total_price() ?> </a>
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
               <a href="cart.php">Go To Cart</a>
            </li>
            <li>
               <a href="checkout.php">
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
          <a href="index.php" class="navbar-brand home"><!-- navbar-brand home begin -->
           <h3>logo</h3>
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
            <a href="cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary right begin -->
                <i class="fa fa-shopping-cart"></i>
                <span><?php items(); ?> Items In Your Cart |  Total price:  <?php total_price(); ?></span>
            </a><!--btn navbar-btn btn-primary right finish -->
           <!--WE SHOULD HAVE A SEARCH BUTTON HERE -->
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

         <div class="col-md-9"><!-- col-md-3 finish -->
    <?php
      if(!isset($_SESSION['customer_email'])){
          include("customer/customer_login.php");
      } else {
          include("payment_options.php");
      }
    ?>
         </div>  <!-- col-md-9 finish --> 
      </div> <!-- container finish -->
    </div> <!-- #container finish --> 
<?php
include("includes/footer.php")
?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>



