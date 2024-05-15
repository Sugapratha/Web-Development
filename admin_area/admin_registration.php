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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <title>Admin Registration</title>
  <style>
    body{
      background-color: rgb(230, 188, 214);
      font-family: 'Poppins', sans-serif;
    }
    a,h1,h2,h3{
      font-family: 'Poppins', sans-serif;
    }
    a{
      text-decoration: none;
    }
    .container{
      display: flex;
      text-align: center;
      align-items: center;
    }
    .reg-form{
      margin-top: 10px;
      padding-top: 15px;
    }
    .reg-title{
      text-align: center;
      color: rgb(133, 25, 92);
    }
    .reg-image{
      width: 58%;
    }
    .reg-details{
      display: flex;
      flex-direction: column;
      text-align: left;
    }
    input{
      height: 30px;
      width: 400px;
      font-family: 'Poppins', sans-serif;
      background-color: rgb(242, 218, 233);
      border: 1px solid rgb(133, 25, 92);
      border-radius: 10px; 
      margin-bottom: 15px;
    }
    input:focus{
      outline: none;
    }
    ::placeholder{
      color: rgb(133, 25, 92);
    }
    label{
      margin-bottom: 10px;
      font-size: 18px;
      color: rgb(133, 25, 92);
    }
    .reg-submit{
      width: 150px;
      margin-top: 15px;
      height: 40px;
      margin-bottom: 0;
      background-color: rgb(133, 25, 92);
      border: none;
      color: rgb(235, 206, 225);
      font-size: 17px;      
      cursor: pointer;
    }
    .reg-submit:hover{
      background-color: rgb(112, 20, 80);

    }
    .reg-acc{
      color: rgb(133, 25, 92);
    }
    .login{
      color: rgb(133, 25, 92);
      font-weight: 600;
    }
    .login:hover{
      text-decoration: underline;
    }
  </style>
</head>
<body>
<h1 class="reg-title">Admin Registration</h1>
  <div class="container">
    
    <div class="reg-image">
      <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-registration-7964198-6381808.png" class="reg-image"alt="">
    </div>

    <div class="reg-form">
      <form action="" method="post">
        <div class="reg-details">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Enter your name">
        </div>
        <div class="reg-details">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Enter your Email ID">
        </div>
        <div class="reg-details">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter your Password">
        </div>
        <div class="reg-details">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" placeholder="Enter your Password">
        </div>
        <div class="reg-details">
          <input type="submit" name="admin_registration" class="reg-submit" value="Register">
          <p class="reg-acc">Already have an account? <a href="admin_login.php" class="login">Login</a></p>
        </div>
      </form>
    </div>
  </div>

  </body>
</html>

  <!-- php code -->
<?php
if(isset($_POST['admin_registration'])){
  $admin_name=$_POST['username'];
  $admin_email=$_POST['email'];
  $admin_password=$_POST['password'];
  $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
  $conf_admin_password=$_POST['confirm_password'];

  //select query
  $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
  $result=mysqli_query($con, $select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username and email already exist')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";
  }else if($admin_password!=$conf_admin_password){
    echo "<script>alert('Password unmatched.Please enter the correct Password')</script>";
  }

  else{
  // insert query
  $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password ) values('$admin_name','$admin_email','$hash_password')";
  $sql_execute=mysqli_query($con,$insert_query); 
  if($sql_execute){
    echo "<script>alert('Registered Successful')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";
  }
}}
?>
