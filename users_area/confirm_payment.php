<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
  $order_id=$_GET['order_id'];
  //echo $order_id;
  $select_data="Select* from `user_orders` where  order_id=$order_id";
  $result=mysqli_query($con, $select_data);
  $row_fetch=mysqli_fetch_assoc($result);
  $invoice_number=$row_fetch['invoice_number'];
  $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
  $invoice_number=$_POST['invoice_number'];
  $amount=$_POST['amount'];
  $payment_mode=$_POST['payment_mode'];
  $insert_query="insert into `user_payment` (order_id, invoice_number, amount, payment_mode) values($order_id,$invoice_number,$amount, '$payment_mode')";
  $result=mysqli_query($con, $insert_query);
  if($result){
    echo "<h3>Payment Succeed!</h3>";
    echo "<script> window.open('profile.php?my_orders','_self')</script>";
  }
  $update_orders="update  `user_orders` set order_status='Complete' where order_id=$order_id";
  $result=mysqli_query($con,$update_orders);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirm Payment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
</head>
<style>
  body{
    font-family: 'Poppins', sans-serif;
  }
  .payment{
    background-image: url('https://images.hdqwalls.com/download/patterns-and-texture-4k-oi-3840x2400.jpg');
    background-repeat: no-repeat;
    object-fit: cover;
    animation: slideUp 2000ms ease;
    overflow: hidden;
  }
  @keyframes slideUp {
    0% {
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
    }

    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);

    }
}
  .payment-details{
    background-color:rgb(189, 136, 171, 0.5);
    width: 50%;
    margin: auto;
    margin-top: 8%;
    border-radius: 15px;
  }
  .pay-title{
    text-align: center;
    color: white;
    padding: 20px;
    padding-top: 5%;
    margin: 0;
  }
  form{
    text-align: center;
  }
  input{
    width: 250px;
    padding: 8px;
    margin-bottom: 20px;
    border-radius: 5px;
    border:none ;
  }
  input:focus{
    border-color: blue;
  }
  .amount-set{
    display: flex;
    flex-direction: column;
    text-align: center;
    align-content: center;
    flex-wrap: wrap;
  }
  label{
    color:white;
    margin-bottom: 10px;
  }
  select{
    width: 40%;
    height: 30px;
    border: none;
    border-radius: 7px;
    margin-bottom: 5%;
    font-family: 'Poppins', sans-serif;
  }
  .confirm{
    width: 100px;
    text-align: center;
    cursor: pointer;
    background-color: rgb(112, 30, 67);
    font-family: 'Poppins', sans-serif;
    color: white;
    font-weight: 600;
    margin-bottom: 7%;
  }
  .confirm:hover{
    border:1px rgb(112, 30, 67) solid ;
    background-color:rgb(189, 136, 171, 0.5) ;
    color: rgb(112, 30, 67);
    font-weight: 600;
    outline: none;
  }
</style>
<body class="payment">
  <div class="payment-details">
  <h2 class="pay-title">Confirm Payment</h2>
  <form action="" method="post">
    <div class="invoice">
      <input type="text" class="" name="invoice_number" value="<?php echo $invoice_number?>">
    </div>
    <div class="amount-set">
      <label for="amount">Amount</label>
      <input type="text" class="" name="amount" value="<?php echo $amount_due?>">
    </div>
    <div class="amount-set">
      <label for="amount">Payment Mode</label>
      <select name="payment_mode" id="">
        <option>Select Payment mode</option>
        <option>GPay</option>
        <option>Paypal</option>
        <option>Net Banking</option>
        <option>Cash on Delivery</option>
      </select>
    </div>
    <div class="amount-set">
      <input type="submit" class="confirm" value="Confirm" name="confirm_payment">
    </div>

  </form>
  </div>
  
</body>
</html>