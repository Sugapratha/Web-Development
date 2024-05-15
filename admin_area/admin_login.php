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
  <title>Admin Login</title>
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
      width: 60%;
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
      text-align: left;
    }
    .login{
      color: rgb(133, 25, 92);
      font-weight: 600;
      cursor: pointer;
    }
    .login:hover{
      text-decoration: underline;
    }
  </style>
</head>
<body>
<h1 class="reg-title">Admin Login</h1>
  <div class="container">
    
    <div class="reg-image">
      <img src="https://nilgiricollege.ac.in/app/app-files/images/userlog.png" class="reg-image"alt="">
    </div>

    <div class="reg-form">
      <form action="" method="post">
        <div class="reg-details">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Enter your name">
        </div>
        <div class="reg-details">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter your Password">
        </div>
        <p class="reg-acc"><a href="admin_registration.php" class="login">Forgot Password?</a></p>

        <div class="reg-details">
          <input type="submit" name="admin_login" class="reg-submit" value="Login">
          <p class="reg-acc">Don't have an account? <a href="admin_registration.php" class="login">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

<?php 
if(isset($_POST['admin_login'])){
  $admin_name=$_POST['username'];
  $admin_password=$_POST['password'];
  $select_query="Select * from `admin_table` where admin_name='$admin_name'";
  $result=mysqli_query($con, $select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  if($row_count>0){
    $_SESSION['username']=$admin_name;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }else{
      echo "<script>alert('Invalid Username or Password')</script>";
    }
  }

?>