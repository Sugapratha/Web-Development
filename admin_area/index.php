<?php 
include('../includes/connect.php');
include('../common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Art Selling Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  </head>
  <style>
    a,h1,h2,h3{
      font-family: 'Poppins', sans-serif;
    }
    .details{
      padding-top: 20px;
      margin-bottom: 15px;
      color: rgb(128, 29, 85);
    }
    .insert-form{
      top: 50%;
    }
    .cat-buttons{
      
  background-color: #f4bfe0;
    }
  </style>
  
  <body>

    <!-- navbar - header-->
    <div class="topnav" id="myTopnav">
      <a href="../index.php" class="active nav-link"> <img src="namelogo1.png" alt="" class="logo"></a>
      <?php 
       
       if(!isset($_SESSION['username'])){
        echo " <a href='' class='nav-link'> Welcome Guest</a>"; 
      }else{
        echo "<a href='' class='nav-link'>Welcome ".$_SESSION['username']."</a>";
      }
      ?>
    </div>
    

    <div class="cat-details">
      <h2 class="details">Manage Details</h2>
    </div>

    <div class="admin-buttons">
      <div class="admin-grid1">
        <div class="admn-buttons-list">
          <a href="index.php?products"><button class="cat-buttons">Insert Products</button></a>
        </div>
        <div class="admn-buttons-list">
          <a href="index.php?view_products"><button class="cat-buttons">View Products</button></a>
        </div>
        <div class="admn-buttons-list">
          <a href="index.php?list_orders"><button class="cat-buttons">All Orders</button></a>
        </div>
        <div class="admn-buttons-list">
          <a href="index.php?list_payment"><button class="cat-buttons">All Payments</button></a>
        </div>
        <div class="admn-buttons-list">
          <a href="index.php?list_users"><button class="cat-buttons">List Users</button></a>
        </div>
        <div class="admn-buttons-list">
          <a href=""><button class="cat-buttons">Logout</button></a>
        </div>  
      </div>
      <div class="admin-grid2">
              
        
      </div>
    </div>

    <div class="below-page">
      <?php 
      if(isset($_GET['products']))
      {
        include('products.php');
      }
      if(isset($_GET['view_products']))
      {
        include('view_products.php');
      }
      if(isset($_GET['edit_products']))
      {
        include('edit_products.php');
      }
      if(isset($_GET['delete_products']))
      {
        include('delete_products.php');
      }
      if(isset($_GET['list_orders']))
      {
        include('list_orders.php');
      }
      if(isset($_GET['list_payment']))
      {
        include('list_payment.php');
      }
      if(isset($_GET['list_users']))
      {
        include('list_user.php');
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
  </body>
  </html>