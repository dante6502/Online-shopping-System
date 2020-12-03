
<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="breadcrumb"><!--breadcrumb begin-->
            <li><!--li begin-->
             <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category
            </li><!--li finish-->
        </div><!--breadcrumb finish-->
    </div><!--col-lg-12 finish-->
</div><!--row finish-->

<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="panel panel-default"><!--panel begin-->
            <div class="panel-heading"><!--panel-heading begin-->
                <div class="panel-title" ><!--panel-title begin-->
                <i class="fa fa-money fa-fw"></i>Insert Product Category
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
               <input type="text" name="p_cat_title" class="form-control">
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
            <div class="form-group"><!--form-group begin-->
              <label for="" class="control-label col-md-3"><!--control-label begin-->
                Product Category Description
              </label><!--control-label finish-->
              <div class="col-md-6"><!--col-md-6 begin-->
                <textarea type="text" name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
            <div class="form-group"><!--form-group begin-->
              <label for="" class="control-label col-md-3"><!--control-label begin-->
                
              </label><!--control-label finish-->
              <div class="col-md-6"><!--col-md-6 begin-->
               <input value="submit" type="submit" name="submit" class="form-control btn btn-primary" >
              </div><!--col-md-6 finish-->
            </div><!--form-group finish-->
          </form><!--form finish-->
        </div><!--panel-bodyfinish-->
    </div><!--panel-title finish-->
</div><!--row finish-->

<?php 

if(isset($_POST['submit'])){
  $p_cat_title = $_POST['p_cat_title'];
  $p_cat_desc = $_POST['p_cat_desc'];
  $insert_product_cat = "insert into product_categories (p_cat_title, p_cat_desc)
  values('$p_cat_title','$p_cat_desc')";
  $run_p_cat = mysqli_query($con,$insert_product_cat);

  if($run_p_cat){
    echo "<script>alert('Your new product category has been inserted successfully')</script>";
    echo "<script>window.open('index.php?view_product_cats','_self')</script>";
  }

}

?>


<?php } ?>