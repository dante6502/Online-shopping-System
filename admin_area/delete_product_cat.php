<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>

<?php 

 if(isset($_GET['delete_product_cat'])){
     $delete_p_cat_id = $_GET['delete_product_cat'];
     $delete_product_category = "delete from product_categories where p_cat_id=' $delete_p_cat_id '";
     $run_delete_product_cat = mysqli_query($con,$delete_product_category );

     if($run_delete_product_cat){
        echo "<script>alert('product category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_product_cats','_self')</script>";
     }
 }

?>

<?php } ?>