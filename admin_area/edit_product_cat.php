
<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<?php
if(isset($_GET['edit_product_cat'])){

    $edit_product_id = $_GET['edit_product_cat'];
    $get_product_category = "select * from product_categories where p_cat_id = '$edit_product_id'";
    $run_edit = mysqli_query($con,    $get_product_category);
    $row_edit = mysqli_fetch_array($run_edit);
    $product_cat_id = $row_edit['p_cat_id'];
    $product_cat_title = $row_edit['p_cat_title'];
    $product_cat_desc = $row_edit['p_cat_desc'];
 
}
?>
<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="breadcrumb"><!--breadcrumb begin-->
            <li><!--li begin-->
             <i class="fa fa-dashboard"></i> Dashboard /Edit Product Category
            </li><!--li finish-->
        </div><!--breadcrumb finish-->
    </div><!--col-lg-12 finish-->
</div><!--row finish-->

<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="panel panel-default"><!--panel begin-->
            <div class="panel-heading"><!--panel-heading begin-->
                <div class="panel-title" ><!--panel-title begin-->
                <i class="fa fa-pencil fa-fw"></i>Edit Product Category
                </div><!--col-lg-12 finish-->
            </div><!--panel finish-->
        </div><!--panel-heading finish-->
        <div class="panel-body"><!--panel-body begin-->
          <form action="" class="form-horizontal" method="post"><!--form begin-->
            <div class="form-group"><!--form-group begin-->
              <label for="" class="control-label col-md-3"><!--control-label begin-->
                Product Category Title
              </label><!--control-label finish-->
              <div class="col-md-6"><!--col-md-6 begin-->
               <input type="text" value="<?php echo $product_cat_title; ?>" name="p_cat_title" class="form-control">
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
            <div class="form-group"><!--form-group begin-->
              <label for="" class="control-label col-md-3"><!--control-label begin-->
                Product Category Description
              </label><!--control-label finish-->
              <div class="col-md-6"><!--col-md-6 begin-->
                <textarea type="text" name="p_cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $product_cat_desc; ?> </textarea>
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
            <div class="form-group"><!--form-group begin-->
              <label for="" class="control-label col-md-3"><!--control-label begin-->
                
              </label><!--control-label finish-->
              <div class="col-md-6"><!--col-md-6 begin-->
               <input value="update" type="submit" name="update" class="form-control btn btn-primary" >
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
          </form><!--form finish-->
        </div><!--panel-bodyfinish-->
    </div><!--panel-title finish-->
</div><!--row finish-->

<?php 
  
  if(isset($_POST['update'])) {

    $product_cat_title = $_POST['p_cat_title'];
    $product__cat_desc = $_POST['p_cat_desc'];
    $update_product_category = "update product_categories set
    p_cat_title=' $product_cat_title',p_cat_desc='$product__cat_desc' where p_cat_id='$product_cat_id'";
    $run_product_category = mysqli_query($con,$update_product_category );
    if($run_product_category){
        echo "<script>alert('product has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }

  }
?>


<?php } ?>