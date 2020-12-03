<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>

<div class="row"><!--row begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="breadcrumb"><!--breadcrumb begin -->
      <li class="active"><!--active begin -->
        <i class="fa fa-dashboard"></i>Dashboard / view orders
      </li><!--active finish -->
    </div><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin 2 -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="panel panel-default"><!--panel panel-default begin -->
      <div class="panel-heading"><!--panel panel-heading begin -->
      <div class="panel-title"><!--panel-title begin -->
         <i class="fa fa-tags"></i> view orders
        </div><!--panel-title finish -->
      </li><!--panel-heading finish -->

       <div class="panel-body"><!--panel-body begin 2 -->
           <div class="table-responsive"><!--table-responsive begin 2 -->
               <table class="table table-striped table-bordered table-hover"><!--table-striped finish -->
                 <thead><!--thead begin 2 -->
                  <tr><!--tr begin 2 -->
                    <td>Order No</td>
                    <td>Customer Email</td>
                    <td>Invoice No</td>
                    <td>Product Name</td>
                    <td>Product Qty</td>
                    <td>Order Date</td>
                    <td>Total Amount</td>
                    <td> Order Status</td>
                    <td>Delete</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                   <tbody>
                     <?php
                      $i=0;
                      $get_order = "select * from pending_orders";
                      $run_order = mysqli_query($con, $get_order);

                      while($row_order = mysqli_fetch_array($run_order)){
                          $order_id = $row_order['order_id'];
                          $customer_id = $row_order['customer_id'];
                          $Invoice_No = $row_order['invoice_number'];
                          $Product_id = $row_order['product_id'];
                          $qty = $row_order['product_qty'];
                          $order_status = $row_order['order_status'];
                          $get_products = "select * from products where product_id = '$Product_id'";
                          $run_products = mysqli_query($con,$get_products);
                          $row_products = mysqli_fetch_array($run_products);
                          $product_title = $row_products['product_title'];

                          $get_customer = "select * from customers where customer_id='$customer_id'";        
                          $run_customer = mysqli_query($con,$get_customer);
                          $row_customer = mysqli_fetch_array($run_customer);
                          $customer_email = $row_customer['customer_email'];
                      
                          $get_customer_orders = "select * from pending_orders where order_id = '$order_id'";
                          $run_customer_orders = mysqli_query($con,$get_customer_orders );
                          $row_orders = mysqli_fetch_array($run_customer_orders);
                          $order_date = $row_orders['order_date'];
                          $order_amount = $row_orders['due_amount'];
                           $i++;
                      
                     ?>
                     <tr><!--tr begin -->
                         <td><?php echo $i ?></td>
                         <td><?php echo $customer_email; ?></td>
                         <td><?php echo $Invoice_No ; ?></td>
                         <td><?php echo $product_title; ?></td>
                         <td><?php echo $qty; ?></td>
                         <td><?php echo $order_date; ?></td>
                         <td><?php echo $order_amount; ?></td>
                         <td>
                          <?php
                          
                          if($order_status=='pending'){
                            echo $order_status='pending';
                          }else{
                            echo $order_status='complete';
                          }
                          ?>
                         </td>
                         <td>
                         
                          <a href="index.php?delete_order=<?php echo $order_status; ?>">
                           <i class="fa fa-trash-o"></i>Delete
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