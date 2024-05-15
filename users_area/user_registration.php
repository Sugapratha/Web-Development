<?php 
include('../includes/connect.php');
include('../common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
      @media(max-width:750px){
        .register-form, .inputs{
          width: 600px ;
        }
      }
      @media(max-width:550px){
        .register-form, .inputs{
          width: 400px ;
        }
      }
      .user-reg-title{
        font-family: 'Poppins', sans-serif;
  color: rgb(144, 24, 100);
  text-align: center;
  left: 40%;
      }
      .register-form{
        margin-top: 120px;
      }
      label{
        color:rgb(148, 38, 95) ;
      }
      .login{
        color: rgb(148, 38, 95);
      }
    </style>
</head>
<body>
  <h2 class="user-reg-title">New User Registration</h2>
  <div class="register-form">
    <form action="" method="post" enctype="multipart/form-data">

      <!-- username -->
      <div class="username">
        <div  class="labels"><label for="user_user_name">Username</label></div>
        <div><input type="text" id="user_user_name" class="inputs" placeholder="Enter your username" autocomplete="off" required name="user_user_name"></div>
      </div>
      
      <!-- email -->
      <div class="username">
        <div  class="labels"><label for="user_email">Email ID</label></div>
        <div><input type="text" id="user_email" class="inputs" placeholder="Enter your Email ID" autocomplete="off" required name="user_email"></div>
      </div>

      <!-- image -->
      <div class="username">
        <div  class="labels"><label for="user_image">Image</label></div>
        <div><input type="file" id="user_image" class="inputs" required name="user_image"></div>
      </div>

      <!-- password -->
      <div class="username">
        <div  class="labels"><label for="user_password">Password</label></div>
        <div><input type="password" id="user_password" class="inputs" placeholder="Enter your Password" autocomplete="off" required name="user_password"></div>
      </div>

       <!-- confirm password -->
       <div class="username">
        <div  class="labels"><label for="conf_user_password">Confirm Password</label></div>
        <div><input type="password" id="conf_user_password" class="inputs" placeholder="Confirm Password" autocomplete="off" required name="conf_user_password"></div>
      </div>

       <!-- Address-->
       <div class="username">
        <div  class="labels"><label for="user_address">Address</label></div>
        <div><input type="text" id="user_address" class="inputs" placeholder="Enter your Address" autocomplete="off" required name="user_address"></div>
      </div>

       <!-- contact-->
       <div class="username">
        <div  class="labels"><label for="user_contact">Contact</label></div>
        <div><input type="text" id="user_contact" class="inputs" placeholder="Enter your Mobile number" autocomplete="off" required name="user_contact"></div>
      </div>

       <!-- submit-->
         <div class="submit"> <input  type="submit" value="Register" class="submit-button" autocomplete="off" required name="user_register"></div>

         <p class="login">Already have an Account? <a href="user_login.php">Login</a></p>

    </form>
  </div>
  
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_user_name'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  $user_ip=getIPAddress();

  //select query
  $select_query="Select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con, $select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username and email already exist')</script>";
  }else if($user_password!=$conf_user_password){
    echo "<script>alert('Password unmatched.Please enter the correct Password')</script>";
  }

  else{
  // insert query
  move_uploaded_file($user_image_tmp,"./user_images/ $user_image");
  $insert_query="insert into `user_table` (user_name, user_email, user_password, user_image, user_ip, 	user_address, user_mobile) values('$user_username','$user_email','$hash_password  ','$user_image','$user_ip','$user_address','$user_contact')";
  $sql_execute=mysqli_query($con,$insert_query); 
}

// select cart items
$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con, $select_cart_items);
$rowS_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo "<script>alert('You have items in cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  echo "<script>window.open('../index.php','_self')</script>";
}
}


?>