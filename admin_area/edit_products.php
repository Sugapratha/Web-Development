

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Products</title>
  <style>
    .edit-product{
      text-align: center;
      color: rgb(130, 30, 87);
    }
    .details{
      padding-top: 20px;
      margin-bottom: 15px;}
    form{
      background-color: white;
      text-align: left;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 70%;
      margin: auto;
      margin-bottom: auto
    }
    .edit-details{
     margin-bottom: 15px;
    }
    label{
      font-weight: 600;
    }
    input{
      width: 500px;
      height: 25px;
      border: 1px solid rgb(110, 115, 111);
      border-radius: 5px;
      color: rgb(130, 30, 87);
      font-family: 'Poppins', sans-serif;
    }
    select{
      color: rgb(130, 30, 87);
      width: 510px;
      height: 30px;
      font-family: 'Poppins', sans-serif;
      border: 1px solid rgb(110, 115, 111);
      border-radius: 5px;

    }
    input::-webkit-file-upload-button{
      border:none;
      font-family: 'Poppins', sans-serif;
      height: 30px;
      background-color: rgb(255, 204, 235);
      color: rgb(130, 30, 87);
    }
    input[type='file'] {
      font-family: 'Poppins', sans-serif;
      width:457px;
      height: 30px;
      padding: 0;
      margin: 0;
      border: 1px solid rgb(110, 115, 111);
      border-radius: 5px;
    }
    .edit-pro-img{
      width: 50px;
    }
    .edit-details-image{
      display: flex;
      align-items: center;
    }
    .edit-title{
      font-size: 25px;
    }
    .edit-submit{
      width: 150px;
      margin-top: 15px;
      height: 40px;
      font-family: 'Poppins', sans-serif;
      background-color: rgb(217, 145, 186);
      border: none;
      transition: 0.5s;
      cursor: pointer;
      font-size: 15px;
    }
    .edit-submit:hover{
      background-color: rgb(135, 55, 104);
      color: rgb(250, 202, 232);
    }
  </style>
</head>
<body>

<?php 
if(isset($_GET['edit_products'])){
  $edit_id=$_GET['edit_products'];
  //echo  $edit_id;
  $get_data="Select * from `products` where product_id='$edit_id'";
  $result=mysqli_query($con,$get_data);
  $row=mysqli_fetch_assoc($result);
  $product_id=$row['product_id'];
  $product_name=$row['product_name'];
  $product_category=$row['product_category'];
  $product_size=$row['product_size'];
  $product_image=$row['product_image'];
  $product_price=$row['product_price'];

}
?>

  <div class="edit-product">
    <h3 class="edit-title">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="edit-details">
        <label for="product_name">Product Name</label><br>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product_name ?>" required>
      </div>
      <div class="edit-details">
        <label for="product_category">Product Category</label><br>
        <input type="text" id="product_category" name="product_category" value="<?php echo $product_category?>" required>
      </div>
      <div class="edit-details">
        <label for="product_size">Product Size</label><br>
        <input type="text" id="product_size" name="product_size" value="<?php echo $product_size ?>" required>
      </div>
      
      <div class="edit-details">
        <label for="product_image" >User Image</label>
        <div class="edit-details-image">
          <input type="file" name="product_image">
          <img src="./product_images/<?php echo $product_image?>" class="edit-pro-img" alt="">
        </div>
      </div>
      <div class="edit-details">
        <label for="product_price">Product Price</label><br>
        <input type="text" id="product_price" name="product_price" value="<?php echo $product_price ?>" required>
      </div>

      <!-- submit -->
      <div class="edit-details">
        <input type="submit" id="product_price" name="edit_product" value="Update Product" class="edit-submit" required>
      </div>

    </form>
    
  </div>

  <!-- editing products -->
  <?php 
  if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_name'];
    $product_size=$_POST['product_size'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_image=$_FILES['product_image']['name'];
    $temp_image=$_FILES['product_image']['tmp_name'];

    if($product_name=='' or $product_category=='' or $product_image=='' or $product_size=='' or $product_price==''){
      echo "<script>alert('Please fill all the fields')</script>";
    }else{
      move_uploaded_file($temp_image,"./product_images/$product_image");

      //update product
      $update_product="update `products` set product_name='$product_name', product_category='$product_category',product_size='$product_size',product_image='$product_image', product_price='$product_price', date=NOW() where   product_id='$edit_id' ";
      $result_update=mysqli_query($con,$update_product );
      if($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./products.php','_self')</script>";
      }
    }
  }
  ?>
</body>
</html>