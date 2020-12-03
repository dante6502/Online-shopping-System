
<?php 
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
  }else {


?>
<?php 
if(isset($_GET['user_profile'])){
   $edit_user = $_GET['user_profile'];
   $get_admin = "select * from admins where admin_id='$admin_id'";
   $run_admin = mysqli_query($con,$get_admin);
   $row_admin = mysqli_fetch_array($run_admin);
   
   $admin_name = $row_admin['admin_name'];
   $admin_email = $row_admin['admin_email'];
   $admin_contact = $row_admin['admin_contact'];
   $admin_pass = $row_admin['admin_pass'];
   $admin_image = $row_admin['admin_image'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Admin
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_name" type="text" class="form-control" value="<?php echo $admin_name ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin Email </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_email" type="email" class="form-control" value="<?php echo $admin_email ?>" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin Image </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_image" type="file" class="form-control"  >
                          <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_name; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_contact" type="text" class="form-control" value="<?php echo $admin_contact ?>"required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="admin_pass" type="password" class="form-control" value="<?php echo $admin_pass ?>"required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="text-center"><!--text center begin-->
                      <button name="update" class="btn btn-primary"><!--btn btn begin-->
                       <i class="fa fa-user-md"></i>Update Now
                      </button><!--ntn btn finish-->
                    </div><!--text-cenetr finish-->
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
      
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<!--inserting products to the database-->
<?php 
  
  if(isset($_POST['update'])) {
    
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_contact = $_POST['admin_contact'];
    $admin_pass = $_POST['admin_pass'];

    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
    
    $update_admins = "update admins set
    admin_name='$admin_name',admin_email='$admin_email',admin_image='$admin_image',
    admin_contact='$admin_contact',admin_pass='$admin_pass' where admin_id='$admin_id'";
    $run_update_admins = mysqli_query($con,$update_admins );

    if($run_update_admins){
        echo "<script>alert('admin has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_user','_self')</script>";
        session_destroy();
    }

  }
?>
<?php } ?>