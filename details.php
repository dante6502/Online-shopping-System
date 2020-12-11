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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
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
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li> 
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $product_cat_title; ?></a>
                   </li>
                   
                   <li> <?php echo $product_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
          
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $product_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $product_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"><?php echo $product_title; ?></h1>

                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <p class="price"><?php echo $product_price; ?> </p>
                               <p class="text-center buttons">
                               <button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button>
                               </p>
                           </form><!-- form-horizontal Finish -->
                       </div><!-- box Finish -->
                      
                   </div><!-- col-sm-6 Finish -->
               </div><!-- row Finish --> 
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>