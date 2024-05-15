<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
    <style> 
      .cart-page-title{
        text-align: center;
      padding-top: 40px;
      margin:0;
      }
      </style>
  </head>
  
  <body>
      <!-- navbar - header-->
      <div class="topnav" id="myTopnav">
        <a href="index.php" class="active nav-link"> <img src="assets\logo\namelogo1.png" alt="" class="logo"></a>
        <a href="index.php" class="nav-link">Home</a>
        <a href="products.php"class="nav-link">Products</a>
       
        <a href="#register"class="nav-link">Register</a>
        <a href="#contact"class="nav-link">Contact</a>
        <a href="javascript:void(0);" class="icon nav-link" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a> 
       
      </div>
    
      
      <h2 class="cart-page-title"> Presenting gifts might make someone feel important.</h2>
      <h4 class="cart-page-h4"> Buy a memorable gift!!</h2>
      <div class="user">
        <?php
        if(!isset($_SESSION['username'])){
          include('users_area/user_login.php');
        } else{
          include('payment.php');
        }
        ?>
      </div>



  <!-- footer -->
  