<style> 
.details{
      padding-top: 20px;
      margin-bottom: 15px;
      }
</style>
<?php 
if(isset($_GET['delete_products'])){
  $delete_id=$_GET['delete_products'];
  // echo $delete_id;

  $delete_query="Delete from `products` where product_id='$delete_id' ";
  $result_product=mysqli_query($con,$delete_query);
  if($result_product){
    echo "<script>alert('Product Deleted successfully')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
  }
}
?>