<?php 
      include('../includes/connect.php');
      session_start()
  ?> 

<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>

    <link rel="stylesheet" href="../style.css">
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
      .user{
        margin-top: 60px;
      }
      </style>
  </head>
  
  <body>
      <!-- navbar - header-->
      <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active nav-link"> <img src="..\assets\logo\namelogo1.png" alt="" class="logo"></a>
        <a href="../index.php" class="nav-link">Home</a>
        <a href="../products.php"class="nav-link">Products</a>
       
        <a href="user_registration.php"class="nav-link">Register</a>
        <a href="#contact"class="nav-link">Contact</a>
        
        <a href="user_login.php"  class="nav-link-cart">Login</a>
        <a href="javascript:void(0);" class="icon nav-link" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a> 
       
      </div>
    
      <div class="user">
        <?php
        if(!isset($_SESSION['username'])){
          include('user_login.php');
        } else{
          include('payment.php');
        }
        ?>
      </div>



  <!-- footer -->
   <!--footer-->
 <div class="footer">
      <div class="footer-grid">
        <div class="footer-logo">
          <img src="../assets\logo\1logo.png" alt="" class="footer-logo-img" >
        </div>

        <div class="catergories">
          <a href="categories.php"  ><h3 class="footer-title">Products</h3></a>
          <p class="footer-links">Portraits</p>
          <p class="footer-links">Landscapes</p>
          <p class="footer-links">Painting</p>
          <p class="footer-links">Digital Art</p>
        </div>

        <div class="craft">
          <a href=""  ><h3 class="footer-title">Crafts</h3></a>
          <p class="footer-links">Wall hanging</p>
          <p class="footer-links">Mini frames</p>
          <p class="footer-links">Handmade Greetings</p>
        </div>

        <div class="fanart">
          <a href="" ><h3 class="footer-title">Fanart</h3></a>
          <p class="footer-links">BTS</p>
          <p class="footer-links">Celebrities</p>
        </div>

        <div class="services">
          <a href="" ><h3 class="footer-title">Services</h3></a>
          <p class="footer-links">Framed works</p>
          <p class="footer-links">Birthday gifts</p>
          <p class="footer-links">Digital Templates</p>
        </div>

        <div class="personal">
          <p class="personal-title">For personalized work</p>
          <h3 class="call">Call <br>+91 9566756760</h3>
        </div>
      </div> 
    </div>
      <p class="cr-text"> All rights reserved  © Designed by Blue Flame</p> 