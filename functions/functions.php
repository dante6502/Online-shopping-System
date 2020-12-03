<?php
$db = mysqli_connect("localhost","root","","finalproject");

///begin getreal IP User ///

function getRealIpUser(){

  switch(true) {
    case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
    case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
    case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

    default : return $_SERVER['REMOTE_ADDR'];
  }
}
///finish getreal IP User ///

/// begin getCAT fuctions ///

function add_cart(){

  global $db;

  if(isset($_GET['add_cart'])){

    $ip_add = getRealIpUser();
    $product_id = $_GET['add_cart'];
    $product_qty = $_POST['product_qty'];
   
    $check_product = "select * from cart where ip_add='$ip_add' AND product_id='$product_id'";
    $run_check = mysqli_query($db, $check_product);

    if(mysqli_num_rows($run_check)>0) {
      echo "<script>alert('This product has already been added to cart')</script>";
      echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";

    }else{
      $query = "insert into cart (product_id,ip_add,product_qty) values ('$product_id','$ip_add','$product_qty')";
      $run_query = mysqli_query($db, $query);

      echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";

    }
  }
}
/// begin getpro fuctions ///
function getPro(){

  global $db;
  $get_products = "select * from products order by 1 DESC LIMIT 0,9";
  $run_products = mysqli_query($db,$get_products);
  while($row_products= mysqli_fetch_array($run_products)){
    $product_id    = $row_products['product_id'];
    $product_title = $row_products['product_title'];
    $product_price = $row_products['product_price'];
    $product_img1  = $row_products['product_img1'];

    echo "
    
    <div class='col-md-4 col-sm-6 center-responsive'>
      <div class='product'>
        <a href='details.php?product_id=$product_id'>
          <img class='img-responsive' src='admin_area/product_images/$product_img1'>
        </a> 
         <div class='text'>
            <h3>
              <a href='details.php?product_id=$product_id'>
              $product_title
                </a>
            </h3>
            <p class='price'>
             $ $product_price
            </p>
            <p class='button'>
              <a  class='btn btn-default' href='details.php?product_id=$product_id'>
                 View details
              </a>

              <a class='btn btn-primary' href='details.php?product_id=$product_id' >
               <i class='fa fa-shopping-cart'></i>Add to cart
              </a>
            </p>
          </div>
      </div>
    </div>
    ";

    }
  }
/// finish getpro fuctions ///
/// begin getproduct categories fuctions ///
  function getPCats(){
    global $db;
    $get_products_categories = "select * from product_categories";
    $run_products_categories = mysqli_query($db, $get_products_categories);
    while($row_products_categories= mysqli_fetch_array($run_products_categories)){
      $product_cat_id    = $row_products_categories['p_cat_id'];
      $product_cat_title = $row_products_categories['p_cat_title'];
      

         echo "
          <li>
          <a href='shop.php?product_category=$product_cat_id'> $product_cat_title </a>
          </li>
         ";
    }
  }
  /// finish getproduct categories fuctions ///
  /// begin getproductcategory products  fuctions ///
  
  function getpcatpro() {
      global $db;
    if(isset($_GET['product_categories'])){
      $product_cat_id = $GET['p_cat_id'];
      $get_product_categories = "select * from product_categories where p_cat_id = '$product_cat_id'";
      $run_products_categories = mysqli_query($db,$get_products_categories);
      $row_products_categories = mysqli_fetch_array($run_products_categories);
      $product_cat_title = $row_products_categories['p_cat_title'];
      $product_cat_desc =$row_products_categories['p_cat_desc'];
      $get_products = "select * from products where product_cat_id='$product_cat_id'";
      $run_products = mysqli_query($db,$get_products);
      $count = mysqli_num_rows($run_products);
      if($count==0){
        echo "
        <div class='box'>
          <h1>No product in this category</h1>
        </div>
        ";
      }else {
        echo "
          <div class='box'>
          <h1>$product_cat_title </h1>
          <p> $product_cat_desc </p>
          </div>
        ";
      }
      while($row_products = mysqli_fetch_array($run_products)){
        $product_id    = $row_products['product_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_img1  = $row_products['product_img1'];

        echo "
        <div class='col-md-4 col-sm-6 center-responsive '>
        <div class='product'>
        <a href='details.php?product_id=$product_id'>
        <img class='img-responsive' src='admin_area/product_images/$product_img1'>
        <div class='text'>
                <h3>
                  <a href='details.php?product_id=$product_id'>
                    $product_title
                    </a>
                </h3>
                <p class='price'>
                  $product_price
                </p>
                <p class='button'>
                 <a href='details.php?product_id=$product_id' class='btn btn-primary'>
                  View details
                 </a>
                 <a href='details.php?pro_id=$product_id' class='btn btn-primary'>
                 <i class='fa fa-shopping-cart'></i>Add to cart
                </p>
        </div>
        </div>
        
        ";

      }
    }

  }
    /// finish getproductcategory products  fuctions ///
    //begin items fuction//
    function items(){

      global $db;

     $ip_add = getRealIpUser();
     $get_items = "select * from cart where ip_add = '$ip_add'";
     $run_items = mysqli_query($db, $get_items);
     $count_items = mysqli_num_rows($run_items);

     echo $count_items;

    }
    //finish items fuction//

    //begin total_price fuction//
    function total_price(){
      global $db;

      $ip_add = getRealIpUser();
      $total = 0;
      $select_cart = "select * from cart where ip_add='$ip_add'";
      $run_cart = mysqli_query($db,$select_cart);

      while ($record = mysqli_fetch_array($run_cart)){
        $product_id = $record['product_id'];
        $product_qty = $record['product_qty'];
        $get_price = "select * from products where product_id='$product_id'";
        $run_price = mysqli_query($db,$get_price);

        while ($row_price=mysqli_fetch_array($run_price)){
          $sub_total = $row_price['product_price']*$product_qty;
          $total += $sub_total;

        }
     }
     echo "Ksh." . $total;
    }

?>














