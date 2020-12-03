
<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<nav class="navbar navbar-inverse navbar-fixed-top"><!--navbar navbar-inverse navbar-fixed-top begin-->
    <div class="navbar-header"><!--navbar-header begin-->
       <button type="button" class="navbar-toggle" data-toggle="collape" data-target=".nabar-exl-collapse"><!--navbar-toggle begin-->
        <span class="sr-only">toggle navigation</span>

        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
       </button><!--navbar-toggle finish-->
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
    </div><!--navbar-header finish-->
    <div class="nav navbar-right top-nav"><!--navbar-right-top-nav begin-->
      <li class="dropdown"><!--dropdown begin-->
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!--dropdown-toggle begin-->
        <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>
       </a><!--dropdown-toggle finish-->
       <ul class="dropdown-menu"><!--dropdown-menu begin-->
        <li><!--li begin-->
          <a href="index.php?user_profile=<?php echo $admin_id; ?> ">
           <i class="fa fa-fw fa-user"></i>Profile
          </a>
          </li><!--li finish-->
          <li><!--li begin-->
          <a href="index.php?view_products">
           <i class="fa fa-fw fa-envelope"></i>Products
           <span class="badge"><?php echo $count_products ; ?></span>
          </a>
          </li><!--li finish-->
          <li><!--li begin-->
          <a href="index.php?view_customers">
           <i class="fa fa-fw fa-users"></i>Customers
           <span class="badge"><?php echo $count_customers ; ?></span>
          </a>
          </li><!--li finish-->
          <li><!--li begin-->
          <a href="index.php?view_cats">
           <i class="fa fa-fw fa-gear"></i>Product_categories
           <span class="badge"><?php echo $count_p_categories ; ?></span>
          </a>
          </li><!--li finish-->
          <li class="divider"></li>
          <li><!--li begin-->
          <a href="logout.php">
           <i class="fa fa-fw fa-power-off"></i>Log out
          </a>
          </li><!--li finish-->
       </ul><!--dropdown-menu finish-->
      </li><!--dropdown finish-->
    </div><!--navbar-right-top-nav finish-->
    <div class="collapse navbar-collapse navbar-exl-collapse"><!--collapse navbar-collapse navbar-exc-collapse begin-->
     <ul class="nav navbar-nav side-nav"><!--nav navbar side-navbegin-->
      <li><!--li begin-->
       <a href="index.php?dashboard">
        <i class="fa fa-fw fa-dashboard"></i>Dashboard
       </a>
      </li><!--li finish-->
      <li><!--li begin-->
       <a href="#" data-toggle="collapse" data-target="#products">
        <i class="fa fa-fw fa-tag"></i>Products
        <i class="fa fa-fw fa-caret-down"></i>
       </a>
         <ul id="products" class="collapse"><!--collapse begin-->
           <li><!--li begin-->
           <a href="index.php?insert_product">Insert Product </a>
           </li><!--li finish-->
          <li><!--li begin-->
           <a href="index.php?view_products">View Products </a>
           </li><!--li finish-->
         </ul><!--collapse finish-->
      </li><!--li finish-->
      <li><!--li begin-->
       <a href="#" data-toggle="collapse" data-target="#p_cat">
        <i class="fa fa-fw fa-tag"></i>Product Categories
        <i class="fa fa-fw fa-caret-down"></i>
       </a>
         <ul id="p_cat" class="collapse"><!--collapse begin-->
           <li><!--li begin-->
           <a href="index.php?insert_product_cat">Insert Product Category</a>
           </li><!--li finish-->
          <li><!--li begin-->
           <a href="index.php?view_product_cats">View Product category</a>
           </li><!--li finish-->
         </ul><!--collapse finish-->
      </li><!--li finish-->
      <li><!--li begin-->
        <a href="index.php?view_customers">
          <i class="fa fa-fw fa-users"></i>  View customers</a>
      </li><!--li finish-->
      <li><!--li begin-->
        <a href="index.php?view_orders">
          <i class="fa fa-fw fa-book"></i>  View orders</a>
      </li><!--li finish-->
      <li><!--li begin-->
        <a href="index.php?view_payments">
          <i class="fa fa-fw fa-money"></i>  View payments</a>
      </li><!--li finish-->
      <li><!--li begin-->
       <a href="#" data-toggle="collapse" data-target="#users">
        <i class="fa fa-fw fa-users"></i>Users
        <i class="fa fa-fw fa-caret-down"></i>
       </a>
       <ul id="users" class="collapse"><!--collapse begin-->
           <li><!--li begin-->
           <a href="index.php?insert_admin">Insert User </a>
           </li><!--li finish-->
          <li><!--li begin-->
           <a href="index.php?view_users">View Users</a>
           </li><!--li finish-->
           <li><!--li begin-->
           <a href="index.php?user_profile=<?php echo $admin_id; ?> ">Edit user profile</a>
           </li><!--li finish-->
           </ul><!--collapse finish-->
           </li><!--li finish-->
           <li><!--li begin-->
        <a href="logout.php">
          <i class="fa fa-fw fa-power-off"></i>  Log out </a>
      </li><!--li finish-->
     </ul><!--nav navbar side-nav finish-->
    </div><!--collapse navbar-collapse navbar-exc-collapse finish-->
</nav><!--navbar navbar-inverse navbar-fixed-top finish-->
<?php } ?>