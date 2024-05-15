<?php
include('../includes/connect.php');
include('../common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>


    <style>
      /*profile page*/
      .profile{
        background-image: url("https://static.vecteezy.com/system/resources/previews/002/326/334/non_2x/gradient-light-color-background-graphic-free-vector.jpg");
        background-size: cover;
      }
      .progress{
        position: relative;
        background: #a33d6b;
        width:350px;
      }
      .prof-side-section{
        position: absolute;
        top: 20%;
        left: 50%;
      }
      .prof-order-title{
        color: #69173c;
        font-size: 25px;
      }
      span{
        color: red;
      }
    .prof-order-details{
      text-align: center;
      color: rgb(168, 50, 115);
      font-weight: 600;
      }  
    .explore-details{
      text-align: center;
      margin-left: 35%;
      color: rgb(168, 50, 115);
      font-weight: 600;
    }
    
      .prof-order-details a{
            color: rgb(105, 39, 70);
      }
      img{
        object-fit: contain;
      }
    </style>
</head>



<body class="profile">
  <!-- navbar - header-->
  <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active nav-link"> <img src="..\assets\logo\namelogo1.png" alt="" class="logo"></a>
        <a href="../index.php" class="nav-link">Home</a>
        <a href="../products.php"class="nav-link">Products</a>
       
        <a href="user_registration.php"class="nav-link">Register</a>
        <a href="#contact"class="nav-link">Contact</a>
        
       <?php  if(!isset($_SESSION['username'])){
    echo "<a href='./user_login.php'  class='nav-link-cart'>Login</a>"; 
  }else{
    echo "<a href='./logout.php' class='nav-link-cart'>Logout</a>";
  }?>
        <a href="javascript:void(0);" class="icon nav-link" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a> 
       
      </div>
      

<div class="progress">
  
  <ul>
    <h3> <a href="#sec1" class="prof-title">Your Profile</a> </h3>

    <?php 
    $username=$_SESSION['username'];
    $user_image="Select * from  `user_table` where  user_name='$username'";
    $user_image=mysqli_query($con,$user_image);
    $row_image=mysqli_fetch_array($user_image);
    $user_image=$row_image['user_image'];
    echo "<img src='./user_images/$user_image' class='prof-img' alt=''>";
    ?>

    
    <li> <a href="profile.php" class="clickable">Pending Orders</a> </li>
    <li> <a href="profile.php?edit_account" class="clickable">Edit Account</a> </li>
    <li> <a href="profile.php?my_orders" class="clickable">My Orders</a> </li>
    <li> <a href="profile.php?delete_account" class="clickable">Delete Account</a> </li>
    <li> <a href="profile.php?logout.php" class="clickable">Logout</a> </li>
  </ul>
</div>

<!--side section-->

<div class="prof-side-section">
  <?php 
  get_user_order_details();
  if(isset($_GET['edit_account'])){
    include('edit_account.php');
  }
  if(isset($_GET['my_orders'])){
    include('user_orders.php');
  }
  if(isset($_GET['delete_account'])){
    include('delete_account.php');
  }
  ?>
</div>
 <!--footer-->
 <div class="footer">
      <div class="footer-grid">
        <div class="footer-logo">
          <img src="../assets/logo/1logo.png" alt="" class="footer-logo-img" >
        </div>

        <div class="catergories">
          <h3 class="footer-title">Products</h3>
          <p class="footer-links">Portraits</p>
          <p class="footer-links">Landscapes</p>
          <p class="footer-links">Painting</p>
          <p class="footer-links">Digital Art</p>
        </div>

        <div class="craft">
          <h3 class="footer-title">Crafts</h3>
          <p class="footer-links">Wall hanging</p>
          <p class="footer-links">Mini frames</p>
          <p class="footer-links">Handmade Greetings</p>
        </div>

        <div class="fanart">
         <h3 class="footer-title">Fanart</h3>
          <p class="footer-links">BTS</p>
          <p class="footer-links">Celebrities</p>
        </div>

        <div class="services">
          <h3 class="footer-title">Services</h3>
          <p class="footer-links">Framed works</p>
          <p class="footer-links">Birthday gifts</p>
          <p class="footer-links">Digital Templates</p>
        </div>

        <div class="personal">
          <p class="personal-title">For personalized work</p>
          <h3 class="call">Call <br>+91 9566756760</h3>
          <div class="social-icons">
          <a href="https://www.instagram.com/_sugapratha_/" title="instagram" target="blank">  
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          </div>
        </div>
      </div> 
    </div>
      <p class="cr-text"> All rights reserved  © Designed by Blue Flame</p>
</body>
</html>

