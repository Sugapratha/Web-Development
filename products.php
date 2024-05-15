<?php 
include('./includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Products</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
  </head>
  
  <body>
    <!-- navbar - header-->
    <?php 
    include('includes/navbar.php');
?>
    <!-- navbar - header-->
    <h2 class="categories-tit">Choose your Favourite one</h2>
    <p class="cat-content"> Gifts are an easier way to express Love.</p>
     

     <!--calling functions-->
     <div class="insert-form">
     <?php
       global $con;
       $select_query="Select * from `products` order by rand()";
       $result_query=mysqli_query($con,$select_query);
       //$row=mysqli_fetch_assoc($result_query);
       //echo $row['product_title'];
       while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_size=$row['product_size'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "<div class='product-card'>
        <div class='prod-container'>
          <div class='prod-pic'>
            <img src='admin_area/product_images/$product_image' class='prod-image' />
          </div>
          <div class='product-details'>
            <p class='prod-title'>$product_size</p>
            <h1 class='prod-name'>$product_name</h1>
            <h2 class='prod-amt'>$product_price</h2>
            <div class='cart-buttons'>
            <a href='products.php?addtocart=$product_id'><button class='add-home'>Add to Cart</button></a>
            
            </div>
          </div>
        </div>
      </div>";


      cart();
    }
    
    ?>
      
</body>


</html>
