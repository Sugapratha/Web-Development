<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Account</title>
  <style>
    .remove-acc{
      margin-left: 48%;
      width: 100%;
      font-size: 20px;
      color:rgb(156, 37, 108);
    }
    .deleting-account{
      margin: auto;
      width: 100%;
      margin-left: 35%;
    }
    .delete-acc{
      margin: auto;
      text-align: center;
      font-family: 'Poppins', sans-serif;
      margin-bottom: 20px;
    }
    input{
      width: 250px;
      height: 40px;
      font-weight: 600;
      border: 1px rgb(156, 37, 108) solid;
      border-radius: 10px;
      cursor: pointer;
      color:  rgb(117, 22, 76);
      background-color: rgb(222, 149, 194);
      
    }
  </style>
</head>
<body>
<div class="remove-acc">
  <h3>Remove Account</h3>
</div>
<form action="" method="post">
  <div class="deleting-account">
    <input type="submit" class="delete-acc" name="delete" value="Delete Account">
  </div>
  <div class="deleting-account">
    <input type="submit" class="delete-acc" name="dont_delete" value="Don't Delete Account">
  </div>
</form>
<?php 
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
  $delete_query="Delete from `user_table` where user_name='$username_session'";
  $result=mysqli_query($con, $delete_query);
  if($result){
    session_destroy();
    echo "<script>alert('Account Deleted Successfully')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }


  if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
  }
}
?>