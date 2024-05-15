<?php 
include('../includes/connect.php');
if(isset($_POST['insert_products'])){
  $product_id=$_POST['product_id'];
  $product_name=$_POST['product_name'];
  $product_category=$_POST['product_category'];
  $product_size=$_POST['product_size'];
  $product_price=$_POST['product_price'];
  $product_status='true';

  //accessing images
  $product_image=$_FILES['product_image']['name'];

  //accessing tmp name
  $temp_image=$_FILES['product_image']['tmp_name'];
  
  //check condition
  if($product_size=='' or $product_name=='' or $product_category=='' or $product_price=='' or $product_image=='' or $product_id==''){
    echo "<script> alert('Please fill the fields')</script>";
    exit();
  }else{
    move_uploaded_file($temp_image,"./product_images/$product_image");
  }

  //insert query
  $insert_product="insert into `products`(product_id, product_name, product_category, product_size, product_image, product_price, date, status) values ('$product_id','$product_name','$product_category','$product_size','$product_image','$product_price',NOW(),'$product_status') ";
  $result_query=mysqli_query($con,$insert_product);
  if($result_query){
    echo "<script> alert('Successfully inserted the products') </script>";
  }
}
?>
<html>
  <head> 
  <link rel="stylesheet" href="style.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"></head>
  
  <style>
    body{
      top: -5%;
    }
    .details{
      padding-top: 6%;
      margin-bottom: 15px;
      font-weight: 600;
      font-size: 25px;
    }
    h3{
      font-weight: 600;
    }
    a{
      font-size: 13px;
    }
    .cat-buttons{
      border-radius: 10px;
    }
  </style>
  <body>
  <div class="container-fluid" 
      style="font-family: 'Poppins';
     background-color: rgb(226, 203, 217)">
    <h3 class="text-center mt-2 pt-4" style="color: #B44694">Insert details for Products</h3>

    <!--form-->
    <form action="" method="post" enctype="multipart/form-data">
      <!--size-->
      <div class="m-auto w-50 p-2">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="text" class="form-control" name="product_id" id="product_id" placeholder="Enter Product ID" autocomplete="off" required>
      </div>

      <div class="m-auto w-50 p-2">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product name" autocomplete="off" required>
      </div>

      <div class="m-auto w-50 p-2">
        <label for="product_category" class="form-label">Product Category</label>
        <input type="text" class="form-control" name="product_category" id="product_category" placeholder="Enter Product name" autocomplete="on" required>
      </div>
      
      <!--name-->
      <div class="m-auto w-50 p-2">
        <label for="product_size" class="form-label">Product Size</label>
        <input type="text" class="form-control" name="product_size" id="product_size" placeholder="Enter Product Size" autocomplete="off" required>
      </div>
        <!--price-->
      <div class="m-auto w-50 p-2">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" class="form-control"  name="product_price" id="product_price" placeholder="Enter Product price" autocomplete="off" required>
      </div>
      <!--image-->
      <div class=" m-auto w-50 p-2">
       <label for="product_image" class="form-label">Product Image</label>
        <input type="file" name="product_image" id="product_image"class="form-control" id="inputGroupFile02" required>
      </div>
      
      <div class="m-auto w-50 p-2" >
        <input type="Submit" name="insert_products"    class="submit-button p-2" value="Insert Products" 
        style="
        background-color: #B44694; 
        border: none; 
        border-radius:5px; 
        color:white;
        width: 25%;">
      </div>

     
    </form>
  </div>
  </body>
  </html>