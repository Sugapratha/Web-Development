<?php 
include('../includes/connect.php');
include('../common_functions.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Payment</title>
    
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
    <style> 
    .back-button:hover {
    background-color: rgb(237, 150, 161);
    color: black;
    transform: scale(1.05);
    transition: 0.5s;
}
      </style>
  </head>
  
  <body>
      <!-- navbar - header-->
      <?php
      $user_ip=getIPAddress();
      $get_user="Select * from `user_table` where user_ip='$user_ip'";
      $result=mysqli_query($con,$get_user);
      $run_query=mysqli_fetch_array($result);
      $user_id= $run_query['user_id'];
      ?>
      <h1 >Payment</h1>
      <div class="wrapper">
    <div class="container">
        <form action="" method="post">
            <h1>
            <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="name">
                <div>
                    <label for="f-name" class="payment-label">First</label>
                    <input type="text" name="f-name"required>
                </div>
                <div>
                    <label for="l-name" class="payment-label">Last</label>
                    <input type="text" name="l-name" required>
                </div>
            </div>
            <div class="street">
                <label for="name" class="payment-label">Street</label>
                <input type="text" name="address" required>
            </div>
            <div class="address-info">
                <div>
                    <label for="city" class="payment-label">City</label>
                    <input type="text" name="city" required>
                </div>
                <div>
                    <label for="state" class="payment-label">State</label>
                    <input type="text" name="state" required>
                </div>
                <div>
                    <label for="zip" class="payment-label">Zip</label>
                    <input type="text" name="zip" required>
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card" class="payment-label"></i> Payment Information
            </h1>

            <div class="offline-btn">
               <button  class="offline-button"><a href="">Paypal / Gpay</a></button>
               <button  class="offline-button"><a href="order.php?user_id=<?php echo $user_id?>">Pay Offline</a></button>
            </div>
            
            
           
            
            <div class="btns">
                <button  class="back-button"><a href="../index.php">Purchase</a></button>
                <button class="back-button"><a href="../products.php">Back to cart</a></button>
            </div>
        </form>
    </div>
</div>
  <!-- footer -->
  