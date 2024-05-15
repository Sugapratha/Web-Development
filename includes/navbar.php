<?php 
include('includes/connect.php');
include('./common_functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Art Selling Website</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
  </head>
  
  <body>
      <!-- navbar - header-->
      <div class="topnav" id="myTopnav">
        <a href="index.php" class="active nav-link"> <img src="assets\logo\namelogo1.png" alt="" class="logo"></a>
        <a href="index.php" class="nav-link">Home</a>
        <a href="products.php"class="nav-link">Products</a>
       <?php 
       if(isset($_SESSION['username'])){
        echo " <a href = './users_area/profile.php' class='nav-link'> My Account</a>";
       }else{
        echo " <a href = './users_area/user_registration.php' class='nav-link'> Register</a>";
       }
       ?>
        <a href="#contact"class="nav-link">Contact</a>
        <a href="javascript:void(0);" class="icon nav-link" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
        <?php 
         
         if(!isset($_SESSION['username'])){
          echo " <a href='' class='nav-link-cart'> Welcome Guest</a>"; 
        }else{
          echo "<a href='' class='nav-link-cart'>Welcome ".$_SESSION['username']."</a>";
        }

  if(!isset($_SESSION['username'])){
    echo "<a href='./users_area/user_login.php'  class='nav-link-cart'>Login</a>"; 
  }else{
    echo "<a href='./users_area/logout.php' class='nav-link-cart'>Logout</a>";
  }
        
        ?>

       
        <li class="nav-link-price">Total Price: <?php total_cart_price();?> </li>
        <a href="cart.php" class="nav-link-cart"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item();?></sup></i></a>
       
      </div>
    