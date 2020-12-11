
<div class="box"><!-- box Begin -->
                   
                   <form action="" method="" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <h1>Review and Summary</h1>
                       
                       <?php 
                       
                       $ip_add = getRealIpUser();
                
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>
                       
                       <p class="text-muted">You currently have <?php echo $count; ?> product(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th >Product name</th>
                                       <th >Unit Price</th>
                                       <th >Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                  
                                  <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $product_id = $row_cart['product_id'];  
                                     $product_qty = $row_cart['product_qty'];
                                       
                                       $get_products = "select * from products where product_id='$product_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $sub_total = $row_products['product_price']*$product_qty;
                                           
                                           $total += $sub_total;
                                           
                                   ?>
                                   
                                   <tr><!-- tr Begin -->
                                     <td>
                                           
                                          <?php echo $product_title; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                          Ksh. <?php echo $only_price; ?>
                                           
                                       </td>
                              
                                       
                                       <td>
                                           
                                           Ksh.<?php echo $sub_total; ?>
                                           
                                       </td>
                                       
                                   </tr><!-- tr Finish -->
                                   
                                   <?php } } ?>
                                   
                               </tbody><!-- tbody Finish -->
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Total</th>
                                       <th colspan="2">Ksh.<?php echo $total; ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                     </form><!-- form Finish -->
                     <div class="box-header"><!--box-header begin -->

   <center><!--center begin -->
     <h1> Payment </h1>
   </center><!--center finish -->
  <form action="lipa.php" method="POST"><!--form begin -->
     <div class="form-group"> <!-- form group begin -->
        <label for="">Phone Number</label>
           <input type="number" value="254790765441" class="form-control" name="phonenumber" required>
     </div> <!-- form-group finish finish -->
     <div class="form-group">
           <input type="submit" name="deposit" value="PAY NOW Ksh.<?php echo $total; ?>" class="btn btn-primary btn-lg mt-4"  class="form-control">
      </div>
 </form><!--form finish -->
</div><!-- box Finish -->