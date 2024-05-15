<?php   
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  


//cart function
function cart(){
  if(isset($_GET['addtocart'])){
    global $con;
    $get_ip_add= getIPAddress();
    $get_product_id=$_GET['addtocart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id='$get_product_id'";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('Item is already present in cart') </script>";
      echo"<script>window.open('products.php','_self')</script>";
    } else{
      $insert_query="insert into `cart_details` (product_id, ip_address, quantity) values('$get_product_id','$get_ip_add',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is inserted successfully') </script>";
      echo"<script>window.open('products.php','_self')</script>";
    }
  }
}

function cart_item(){
  if(isset($_GET['addtocart'])){
    global $con;
    $get_ip_add= getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);
   } else{
      global $con;
      $get_ip_add= getIPAddress();
      $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_item=mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
  }

function total_cart_price(){
    global $con;
    $get_ip_add= getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from `products` where product_id='$product_id'";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price +=$product_values;
      }
    }
    echo $total_price;
  }

  //get user order details
  function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where user_name='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset ($_GET['edit_account'])){
        if(!isset ($_GET['my_orders'])){
          if(!isset ($_GET['delete_account'])){
            $get_orders="Select * from `user_orders` where user_id='$user_id' and order_status='pending'";
            $result_orders_query=mysqli_query($con,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){
              echo "<h3 class='prof-order-title'> You have <span>$row_count</span> Pending Orders</h3>
              <div  class='prof-order-details'><a href='profile.php?my_orders'>Order Details</a></div>";
            }else{
              echo "<h3 class='prof-order-title'> You have <span>0</span> Pending Orders</h3>
              <a href='../index.php' class='explore-details'>Explore More</a>";
            }
          }
        }
      }
    }
  }





  











