
<div class="row"><!--row  begin -->
  <div class="col-lg-12"><!--col-lg-12 begin -->
    <h1 class="pahe-header">Dashboard</h1>
      <ol class="breadcrumb"><!--breadcrumb begin -->
        <li class="active"><!--activebegin -->
          <i class="fa fa-dashboard"></i>Dashboard
        </li><!--active finish -->
      </ol><!--breadcrumb finish -->
  </div><!--col-lg-12 finish -->
</div><!--row finish -->

<div class="row"><!--row begin -->
  <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-3 begin -->
    <div class="panel panel-primary"><!--panel panel-primary begin -->
      <div class="panel-heading"><!--panel-headingbegin -->
        <div class="row"><!-- panel-heading row begin -->
          <div class="col-xs-3"><!--col-xs-3 begin -->
            <i class="fa fa-tanks fa-5x"></i>
          </div><!--col-xs-3 finish -->
          <div class="col-xs-9 text-right"><!--col-xs-9 text-right begin -->
            <div class="huge"><?php echo $count_products; ?></div>
              <div> Products </div>
          </div><!--col-xs-9 text-right finish -->
        </div><!--panel-heading row finish -->
      </div><!--panel-heading finish -->
      <a href="index.php?view_products"><!--a href begin -->
        <div class="panel-footer"><!--panel-footer begin -->
          <span class="pull-left"><!--pull-left begin -->
            View Detais
          </span><!--pull-left finish-->
          <span class="pull-right"><!--pull-right begin -->
            <i class="fa fa-arrow-circle-cirle-right"></i>
          </span><!--pull-right finish-->
          <div class="clearfix"></div>
        </div><!--panel-footer finish -->
      </a><!--a href finish -->
    </div><!--panel panel-primary finish -->
  </div><!--col-lg-3 col-md-3 finish -->
  <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-3 begin -->
    <div class="panel panel-green"><!--panel panel-primary begin -->
      <div class="panel-heading"><!--panel-headingbegin -->
        <div class="row"><!-- panel-heading row begin -->
          <div class="col-xs-3"><!--col-xs-3 begin -->
            <i class="fa fa-user fa-5x"></i>
          </div><!--col-xs-3 finish -->
          <div class="col-xs-9 text-right"><!--col-xs-9 text-right begin -->
            <div class="huge"><?php echo $count_customers; ?></div>
            <div> Customers </div>
          </div><!--col-xs-9 text-right finish -->
        </div><!--panel-heading row finish -->
      </div><!--panel-heading finish -->
      <a href="index.php?view_customers"><!--a href begin -->
        <div class="panel-footer"><!--panel-footer begin -->
          <span class="pull-left"><!--pull-left begin -->
            View Detais
          </span><!--pull-left finish-->
          <span class="pull-right"><!--pull-right begin -->
            <i class="fa fa-arrow-circle-cirle-right"></i>
          </span><!--pull-right finish-->
          <div class="clearfix"></div>
        </div><!--panel-footer finish -->
      </a><!--a href finish -->
    </div><!--panel panel-green finish -->
  </div><!--col-lg-3 col-md-3 finish -->
  <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-3 begin -->
    <div class="panel panel-yellow"><!--panel panel-primary begin -->
      <div class="panel-heading"><!--panel-headingbegin -->
        <div class="row"><!-- panel-heading row begin -->
          <div class="col-xs-3"><!--col-xs-3 begin -->
            <i class="fa fa-tags fa-5x"></i>
          </div><!--col-xs-3 finish -->
          <div class="col-xs-9 text-right"><!--col-xs-9 text-right begin -->
            <div class="huge"><?php echo $count_p_categories; ?></div>
              <div> Product categories </div>
          </div><!--col-xs-9 text-right finish -->
        </div><!--panel-heading row finish -->
      </div><!--panel-heading finish -->
      <a href="index.php?view_product_cats"><!--a href begin -->
        <div class="panel-footer"><!--panel-footer begin -->
          <span class="pull-left"><!--pull-left begin -->
            View Detais
          </span><!--pull-left finish-->
          <span class="pull-right"><!--pull-right begin -->
            <i class="fa fa-arrow-circle-cirle-right"></i>
          </span><!--pull-right finish-->
          <div class="clearfix"></div>
        </div><!--panel-footer finish -->
      </a><!--a href finish -->
    </div><!--panel panel-primary finish -->
  </div><!--col-lg-3 col-md-3 finish -->
  <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-3 begin -->
    <div class="panel panel-red"><!--panel panel-primary begin -->
      <div class="panel-heading"><!--panel-headingbegin -->
        <div class="row"><!-- panel-heading row begin -->
          <div class="col-xs-3"><!--col-xs-3 begin -->
            <i class="fa fa-shopping-cart fa-5x"></i>
          </div><!--col-xs-3 finish -->
          <div class="col-xs-9 text-right"><!--col-xs-9 text-right begin -->
            <div class="huge"><?php echo $count_pending_orders ?></div>
            <div> Orders </div>
          </div><!--col-xs-9 text-right finish -->
        </div><!--panel-heading row finish -->
      </div><!--panel-heading finish -->
      <a href="index.php?view_orders"><!--a href begin -->
        <div class="panel-footer"><!--panel-footer begin -->
          <span class="pull-left"><!--pull-left begin -->
            View Detais
          </span><!--pull-left finish-->
          <span class="pull-right"><!--pull-right begin -->
            <i class="fa fa-arrow-circle-cirle-right"></i>
          </span><!--pull-right finish-->
          <div class="clearfix"></div>
        </div><!--panel-footer finish -->
      </a><!--a href finish -->
    </div><!--panel panel-green finish -->
  </div><!--col-lg-3 col-md-3 finish -->
</div><!--row finish -->

<div class="row"><!--row begin -->
    <div class="col-lg-8"><!--col-lg-8 begin -->
        <div class="panel panel-primary"><!--panel panel-primary begin -->
            <div class="panel-heading"><!--panel-heading begin -->
                <h3 class="panel-title"><!--panel-title begin -->
                  <i class="fa fa-money fa-f3"></i>New orders
                </h3><!--panel-title finish -->
            </div><!--panel-heading finish -->
            <div class="panel-body"><!--panel-body begin -->
                <div class="table-responsive"><!--table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin -->
                      <thead><!--thead begin -->
                      <tr><!--tr begin -->
                       <td>order no:</td>
                       <td>customer Email</td>
                       <td>Invoice No.</td>
                       <td>Product ID</td>
                       <td>Product Qty</td>
                       <td>status</td>
                      </tr><!--tr finish -->
                      </thead><!--th finish -->

                      <tbody><!--tbody finish -->
                      <?php 
                        $i=0;
                        $get_order = "select * from pending_orders order by 1 DESC LIMIT 0,4";
                        $run_order = mysqli_query($con,$get_order);

                        while($row_order=mysqli_fetch_array($run_order)){

                         $order_id = $row_order['order_id'];
                         $customer_id = $row_order['customer_id'];
                         $invoice_no = $row_order['invoice_number'];
                         $product_id = $row_order['product_id'];
                         $qty = $row_order['product_qty'];
                         $order_status = $row_order['order_status'];
                         $i++;
                      ?>
                        <tr><!--tr begin -->
                           <td><?php echo $order_id; ?></td>
                           <td>
                            <?php
                              
                              $get_customer = "select * from customers where customer_id='$customer_id'";
                              $run_customer = mysqli_query($con,$get_customer);
                              $row_customer = mysqli_fetch_array($run_customer);
                              $customer_email = $row_customer['customer_email'];
                              echo $customer_email;
                           
                            ?>
                           </td>
                           <td><?php echo $invoice_no; ?></td>
                           <td><?php echo $product_id; ?></td>
                           <td><?php echo $qty ; ?></td>
                           <td>
                              <?php 
                                if($order_status=='pending'){
                                  echo $order_status="pending";
                                }else {
                                  echo $order_status="complete";
                                }
                              
                              ?>

                           </td>
                        </tr><!--tr finish -->
                        <?php } ?>
                      </tbody><!--tbody finish -->
                     
               
                    </table><!--table finish -->
                </div><!--table-responsive finish -->
                <div class="text-right"><!--text-right begin -->
                  <a href="index.php?view_orders">
                      view orders <i class="fa fa-arrow-rircle-right"></i>
                  </a>
                </div><!--text-right finish -->
            </div><!--panel-body finish -->
        </div><<!--panel panel-primary finish -->
    </div><!--col-lg-8 finish -->
</div><!--row finish -->