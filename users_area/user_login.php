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
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<style>
  body{
  margin: 0;
  padding: 0;}
 .login-img{
  width: 100%;
  position: relative;
  height: 700px;
  width:100%;
  overflow-y: hidden;
  overflow-x: hidden;
}
h2{
  margin-top: 45px;
}
</style>
<body>
  <div class="login-img">
    <img src="https://wallpaperaccess.com/full/6437667.jpg" alt="">
  </div>
  <h2>User Login</h2>
  <div class="login-form">
    <form action="" method="post">

      <!-- username -->
      <div class="username">
        <div  class="labels"><label for="user_user_name">Username</label></div>
        <div><input type="text" id="user_user_name" class="inputs" placeholder="Enter your username" autocomplete="off" required name="user_user_name"></div>
      </div>
      
      <!-- password -->
      <div class="username">
        <div  class="labels"><label for="user_password">Password</label></div>
        <div><input type="password" id="user_password" class="inputs" placeholder="Enter your Password" autocomplete="off" required name="user_password"></div>
      </div>

       <!-- submit-->
         <div class="submit"> <input  type="submit" value="Login" class="submit-button" autocomplete="off" required name="user_login"></div>

         <p class="login">Don't have an Account? <a href="user_registration.php">Register</a></p>

    </form>
  </div>
  
</body>
</html>

<?php 
if(isset($_POST['user_login'])){
  $user_username=$_POST['user_user_name'];
  $user_password=$_POST['user_password'];
  $select_query="Select * from `user_table` where user_name='$user_username'";
  $result=mysqli_query($con, $select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $user_ip=getIPAddress();

  //cart item
  $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
  $select_cart=mysqli_query($con, $select_query_cart);  
  $row_count_cart=mysqli_num_rows($select_cart);
  if($row_count>0){
    $_SESSION['username']=$user_username;
    if(password_verify($user_password,$row_data['user_password'])){
      // echo "<script>alert('Login Successful')</script>";
      if($row_count==1 and $row_count_cart==0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      }
      else{
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
      }

    }else{
      echo "<script>alert('Invalid Username or Password')</script>";
    }
  }else{
    echo "<script>alert('Invalid Username or Password')</script>";
  }
}

?>