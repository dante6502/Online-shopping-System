<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<div class="row"><!--row begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="breadcrumb"><!--breadcrumb begin -->
      <li class="active"><!--active begin -->
        <i class="fa fa-dashboard"></i>Dashboard /view products
      </li><!--active finish -->
    </div><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin 2 -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="panel panel-default"><!--panel panel-default begin -->
      <div class="panel-heading"><!--panel panel-heading begin -->
      <div class="panel-title"><!--panel-title begin -->
         <i class="fa fa-tags"></i> view products
        </div><!--panel-title finish -->
      </li><!--panel-heading finish -->

       <div class="panel-body"><!--panel-body begin 2 -->
           <div class="table-responsive"><!--table-responsive begin 2 -->
               <table class="table table-striped table-bordered table-hover"><!--table-striped finish -->
                 <thead><!--thead begin 2 -->
                  <tr><!--tr begin 2 -->
                    <td>Product id</td>
                    <td>Product title</td>
                    <td>Product image</td>
                    <td>Product price</td>
                    <td>Product sold</td>
                    <td>Product keywords</td>
                    <td> Date</td>
                    <td>Product delete</td>
                    <td>Product edit</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                   <tbody>
                     <?php
                      $i=0;
                      $get_product = "select * from products";
                      $run_products = mysqli_query($con, $get_product);

                      while($row_product = mysqli_fetch_array($run_products)){
                          $product_id = $row_product['product_id'];
                          $product_title = $row_product['product_title'];
                          $product_img1 = $row_product['product_img1'];
                          $product_price = $row_product['product_price'];
                          $product_keywords = $row_product['product_keywords'];
                          $date = $row_product['date'];
                           $i++;
                      
                     ?>
                     <tr><!--tr begin -->
                         <td><?php echo $i ?></td>
                         <td><?php echo $product_title ?></td>
                         <td><img src="product_images/<?php echo $product_img1 ?>" width="60" height="60" alt=""></td>
                         <td><?php echo $product_price ?></td>
                         <td> <?php 
                           $get_sold = "select * from pending_orders where product_id='$product_id'";
                           $run_sold = mysqli_query($con,$get_sold);
                           $count = mysqli_num_rows($run_sold);
                           echo $count;
                         ?>
                         </td>
                         <td><?php echo $product_keywords ?></td>
                         <td><?php echo  $date   ?></td>
                         <td>
                          <a href="index.php?delete_product=<?php echo $product_id ?>">
                            <i class="fa fa-trash-o"></i>Delete
                          </a>
                         </td>
                         <td>
                         <a href="index.php?edit_product=<?php echo $product_id ?>">
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