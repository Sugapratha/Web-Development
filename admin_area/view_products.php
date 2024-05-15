<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>View Products</title>
  <style>
     .details{
      padding-top: 20px;
      margin-bottom: 15px;}
    .pro-title{
      color: rgb(128, 29, 85);
      text-align: center;
    }
    table{
      margin: auto;
      border-collapse: collapse;
      
    }
    th{
      width: 150px;
      border: 1px solid;
      color: rgb(135, 26, 95);
      padding:5px;
    }
    td{
      padding:5px;
      text-align: center;
    }
    i{
      color: rgb(150, 30, 98);
    }
    .prod-img{
      width: 130px;
    }
  </style>
</head>
<body>
  <h2 class="pro-title">View Products</h2>
  <table>
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $get_products="Select  * from `products` ";
      $result=mysqli_query($con, $get_products);
      while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $status=$row['status'];
        echo " <tr>
        <td>$product_id</td>
        <td>$product_name</td>
        <td><img src='./product_images/$product_image'alt='' class='prod-img'></td>
        <td>$product_price</td>
        <td>$status</td>
        <td><a href='index.php?edit_products=$product_id'><i class='fas fa-edit'></i></a></td>
        <td><a href='index.php?delete_products=$product_id''><i class='fa-solid fa-trash'></i></a></td>
      </tr>";
      }
      
      ?>
     
    </tbody>
  </table>
  

</body>
</html>