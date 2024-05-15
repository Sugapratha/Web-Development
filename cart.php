<?php 
include('includes/connect.php');
include('common_functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cart</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
    <style>
      .quantity{
        width:60px;
      } 
      strong{
        font-size: 20px;
        padding: 5px;
        background-color:pink;
        margin-left: 10px;
        border-radius: 10px;
        color: #640c42;
      }
      .cart-page-title{
        text-align: center;
      padding-top: 40px;
      margin:0;
      }
      .cart-empty-title{
        text-align: center;
        font-family: 'Poppins', sans-serif;
        padding-top: 25px;
        color: #640c42;
        font-size: 30px;
      }
      .checkout a{
        color:  #640c42;
        text-decoration: none;
      }
    </style>
  </head>
  
  <body>
      <!-- navbar - header-->
      <div class="topnav" id="myTopnav">
        <a href="index.php" class="active nav-link"> <img src="assets\logo\namelogo1.png" alt="" class="logo"></a>
        <a href="index.php" class="nav-link">Home</a>
        <a href="products.php"class="nav-link">Products</a>
       
        <a href="users_area/user_registration.php"class="nav-link">Register</a>
        <a href="#contact"class="nav-link">Contact</a>
        <a href="javascript:void(0);" class="icon nav-link" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
        <a href="cart.php" class="nav-link-cart"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item();?></sup></i></a>
       
      </div>

      <h2 class="cart-page-title"> Presenting gifts might make someone feel important.</h2>
      <h4 class="cart-page-h4"> Buy a memorable gift!!</h2>
      <!--cart- table-->
      <form action="" method ="post">
      <table class="cart-table">
       
        <tbody>

      <!--cart-products-table-->
          <?php 
          global $con;
          $get_ip_add= getIPAddress();
          $total_price=0;
          $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo " <thead>
                    <tr>
                      <th style='width:150px;'>Product Title</th>
                      <th style='width:230px;'>Product Image</th>
                      <th style='width:140px;'>Quantity</th>
                      <th style='width:140px;'>Total</th>
                      <th style='width:140px;'>Remove</th>
                      <th colspan='2'style='width:230px;'>Operations</th>
                    </tr>
                  </thead>";
          while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="Select * from `products` where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
              $product_price=array($row_product_price['product_price']);
              $price_table=$row_product_price['product_price'];
              $product_name=$row_product_price['product_name'];
              $product_image=$row_product_price['product_image'];
              $product_values=array_sum($product_price);
              $total_price +=$product_values; 
          ?> 
          <tr>
            <!-- name -->
            <td><?php echo $product_name?></td>
            <!-- image -->
            <td><img src="admin_area/product_images/<?php echo $product_image?>" alt="" class="cart-product-img"></td>

            <!-- qantity -->
            <td>
              <input type="text" name="qty" class="quantity">
            <?php 
            $get_ip_add= getIPAddress();
            if(isset($_POST['update_cart'])){
              $quantity=$_POST['qty'];
              $update_cart="update `cart_details` set quantity=  $quantity where ip_address='$get_ip_add'";   
              $result_products_quantity=mysqli_query($con,$update_cart);
              $total_price = $total_price*$quantity;
            }
            ?>
            </td>

            <!-- price -->
            <td><?php echo $price_table?></td>

            <!-- remove -->
            <td>
              <input type="checkbox" name="removeitem[]" 
              value="<?php 
                      echo $product_id;
                      ?>"  ></td>

            <!-- Operations -->
            <td>
              <!-- <button class="update">Update</button>  -->
              <input type="submit" value="Update Cart" class="update" name="update_cart">
              <!-- <button class="remove">Remove</button></td> -->
              <input type="submit" value="Remove Cart" class="remove" name="remove_cart">
          </tr>

          <?php   
          }
          }
        }
        else{
          echo "<h2 class='cart-empty-title'> Cart is Empty. Please add products!</h2>";
        }
          ?>
        </tbody>
      </table>

      <!-- Subtotal -->
      <div class="cart-subtotal">
        <?php 
         $get_ip_add= getIPAddress(); 
         $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
         $result=mysqli_query($con,$cart_query);
         $result_count=mysqli_num_rows($result);
         if($result_count>0){
          echo "  <h3>Subtotal :<strong>  $total_price /-</strong></h3> 
                  <input type='submit' value='Continue Shopping' class='continue-shopping' name='continue_shopping'>
                  <button class='checkout'> <a href='users_area/checkout.php'>Checkout</a></button>";
         }
         else{
          echo "<input type='submit' value='Continue Shopping' class='continue-shopping' name='continue_shopping' style= ' margin:0;margin-bottom: 28px;'>";
         }
        
         if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('index.php','_self')</script>";
         }
        ?>
       
      </div>
      </form> 

      <!-- function to remove items -->
      <?php
      function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
          foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id='$remove_id'";
            $run_delete=mysqli_query($con, $delete_query);
            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }
      echo $remove_item = remove_cart_item();
      ?>
  </body>
  <?php 
      include('includes/footer.php');
  ?> 