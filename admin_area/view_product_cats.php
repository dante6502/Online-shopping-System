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
                  <td>Product Category ID</td>
                    <td>Product Category Title</td>
                    <td>Product Category Desc</td>
                    <td>Edit Product Categor</td>
                    <td>Delete Product Category ID</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                 <tbody><!--tbody begin-->
                     <?php
                      $i=0;
                      $get_product_cats = "select * from product_categories";
                      $run_product_cats = mysqli_query($con, $get_product_cats);

                      while($row_product_cats = mysqli_fetch_array($run_product_cats)){
                          $product_cat_id = $row_product_cats['p_cat_id'];
                          $product_cat_title = $row_product_cats['p_cat_title'];
                          $product_cat_desc = $row_product_cats['p_cat_desc'];
                           $i++;
                     
                    ?>
                    <tr><!--tr begin-->
                      <td><?php echo $i; ?></td>
                      <td><?php echo  $product_cat_title; ?></td>
                      <td width="300" ><?php echo  $product_cat_desc; ?> </td>
                      <td><a href="index.php?edit_product_cat=<?php echo  $product_cat_id;?>">
                       <i class="fa fa-pencil"></i>Edit
                       </a></td>
                      <td><a href="index.php?delete_product_cat=<?php echo  $product_cat_id;?>">
                       <i class="fa fa-pencil"></i> Delete
                       </a></td>
                    </tr><!--trfinish-->
                    <?php  } ?>
                     </tbody><!--tbody finish-->
               </table><!--panel-body begin 2 -->
           </div><!--table-responsive finish -->
       </div><!--table-striped finish -->
    </div><!--panel panel-defaultfinish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->


<?php } ?>