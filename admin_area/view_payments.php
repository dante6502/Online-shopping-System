<?php 

if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else {

?>
<div class="row"><!--row begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="breadcrumb"><!--breadcrumb begin -->
      <li class="active"><!--active begin -->
        <i class="fa fa-dashboard"></i>Dashboard / view payments
      </li><!--active finish -->
    </div><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin 2 -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <div class="panel panel-default"><!--panel panel-default begin -->
      <div class="panel-heading"><!--panel panel-heading begin -->
      <div class="panel-title"><!--panel-title begin -->
         <i class="fa fa-tags"></i> view payments
        </div><!--panel-title finish -->
      </li><!--panel-heading finish -->

       <div class="panel-body"><!--panel-body begin 2 -->
           <div class="table-responsive"><!--table-responsive begin 2 -->
               <table class="table table-striped table-bordered table-hover"><!--table-striped finish -->
                 <thead><!--thead begin 2 -->
                  <tr><!--tr begin 2 -->
                    <td>Payment ID</td>
                    <td>Invoice No</td>
                    <td>Amount</td>
                    <td>Payment Mode</td>
                    <td>Ref No</td>
                    <td>Code</td>
                    <td>Payment date</td>
                    <td>Delete</td>
                  </tr><!--tr finish -->
                 </thead><!--thead finish -->
                   <tbody>
                     <?php
                      $i=0;
                      $get_payments = "select * from payments";
                      $run_payments = mysqli_query($con, $get_payments);

                      while($row_payments = mysqli_fetch_array($run_payments)){
                          $payment_id = $row_payments['payment_id'];
                          $Invoice_No = $row_payments['invoice_number'];
                          $Amount = $row_payments['amount'];
                          $payment_mode = $row_payments['payment_mode'];
                          $ref_no = $row_payments['ref_number'];
                          $code= $row_payments['code'];
                          $payment_date = $row_payments['payment_date'];
                          $i++;
                      
                     ?>
                     <tr><!--tr begin -->
                         <td><?php echo $i ?></td>
                         <td><?php echo $Invoice_No; ?></td>
                         <td><?php echo $Amount; ?></td>
                         <td><?php echo $payment_mode; ?></td>
                         <td><?php echo $ref_no; ?></td>
                         <td><?php echo $code; ?></td>
                         <td><?php echo $payment_date; ?></td>>
                         <td>
                         
                          <a href="index.php?delete_payment=<?php echo $payment_id; ?>">
                           <i class="fa fa-trash-o"></i>Delete Payment
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