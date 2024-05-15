<?php 
if(isset($_GET['edit_account'])){
  $user_session_name=$_SESSION['username'];
  $select_query="Select * from `user_table` where user_name='$user_session_name'";
  $result_query=mysqli_query($con, $select_query);
  $row_fetch=mysqli_fetch_assoc($result_query);
  $user_id=$row_fetch['user_id'];
  $username=$row_fetch['user_name'];
  $user_email=$row_fetch['user_email'];
  $user_address=$row_fetch['user_address'];
  $user_mobile=$row_fetch['user_mobile'];
}
  if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    //update query
    $update_data="update `user_table` set user_name='$username', user_email='$user_email',user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' where user_id=$update_id";
    $result_query_update=mysqli_query($con,$update_data);
    if($result_query_update){
      echo "<script>alert('Data updated successfully')</script>";
      echo "<script>window.open('logout.php','_self')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Account</title>
</head>
<style>
  .prof-side-section{
        position: absolute;
        top: 20%;
        left: 45%;
      }
  .edit-title{
  margin-left: 45%;
  margin-bottom: 25px;
  color: darkmagenta;
  }
  form{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
  }
  .username{
    align-items: center;
    justify-content: center;
    
    margin-bottom:15px ;
  }
  label{
    margin-right: 20px;
    padding: 5px;
    color: darkmagenta;
    font-weight: 600;
  }
  input{
    width: 60vh;
    border-radius: 10px;
    height: 30px;
    border: none;
    outline: none;
    cursor: pointer;
  }
  input:active{
    font-family: 'Poppins', sans-serif;
  }
  input:focus{
    box-shadow: 2px 2px 8px lightsalmon;
    border: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
    color: darkmagenta;
  }
  ::placeholder{
    font-family: 'Poppins', sans-serif;
    padding: 10px;
    color: darkmagenta;
  }
  
input::-webkit-file-upload-button{
    border: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
    color: darkmagenta;
    height: 30px;
    background-color: pink;
}
input[type='file'] {
  font-family: 'Poppins', sans-serif;
  background-color: white;
  color: darkmagenta;
  width: 52vh;
  padding: 0;
  margin: 0;
}
  .edit-account-form div{
    display: flex;
  }
  .submit{
    background-color: pink;
    font-family: 'Poppins', sans-serif;
    height:40px;
    color: darkmagenta;
  }
  .submit:hover{
    background-color: lightpink;
  }
  .edit-img{
    object-fit: contain;
    width: 50px;
    height: 50px;
  }
  img{
    
  }
</style>
<body>
  <h3 class="edit-title">Edit Account</h3>
  <div class="edit-account-form">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="username">
        <label for="username" >Username</label>
        <input type="text" name="username" class="edit-username" value="<?php echo $username;?>" placeholder="Enter your name">
      </div>
      <div class="username">
        <label for="username" >Email</label>
        <input type="email" name="user_email" value="<?php echo $user_email;?>" class="edit-username" placeholder="Enter your name">
      </div>
      <div class="username">
        <label for="userimage" >User Image</label>
        <input type="file" name="user_image" class="edit-username" placeholder="Enter your name">
        <img src="./user_images/<?php echo $user_image; ?>" class="edit-img" alt="">
      </div>
      <div class="username">
        <label for="username" >Address</label>
        <input type="text" name="user_address" value="<?php echo $user_address;?>" class="edit-username" placeholder="Enter your name">
      </div>
      <div class="username">
        <label for="username" >Mobile Number</label>
        <input type="text" name="user_mobile"  value="<?php echo $user_mobile;?>" class="edit-username" placeholder="Enter your name">
      </div>
      <div class="sub-button">
      <input type="submit" value="Update" name="user_update" class="submit" placeholder="Enter your name">
      </div>
    </form>
  </div>
</body>
</html>