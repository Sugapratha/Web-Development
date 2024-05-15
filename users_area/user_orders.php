<style>
.order-title{
  color:rgb(135, 23, 92);
  font-size: 25px;
}
table{
  margin-left: -40%;
  margin-right: 40px;
  border-collapse: collapse;
}
thead th{
 width:150px;
 font-size: 13px;
 background-color: rgb(135, 23, 92);
 color: white;
}
td{
  color: rgb(135, 23, 92) ;
  font-size: 13px;
  font-weight: 600;
  text-align: center;
  background-color: rgb(250, 207, 234);
}
a{
  color: rgb(135, 23, 92) ;
  text-decoration: none;
}
</style>
<?php

$username=$_SESSION['username'];
$get_user="Select * from `user_table` where user_name='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
//echo $user_id;
?>
<h3 class="order-title">The gifts you have chosen!!</h3>
<table>
  <thead >
    <tr>
      <th >Sl. No.</th>
      <th>Amount Due</th>
      <th>Total Products</th>
      <th>Invoice Number</th>
      <th>Date</th>
      <th>Complete/Incomplete</th>
      <th>Status</th>
    </tr>
  </thead>
  <?php 
  $get_order_details="Select * from `user_orders` where user_id=$user_id";
  $result_orders=mysqli_query($con,$get_order_details);
  $number=1;
  while($row_orders=mysqli_fetch_assoc($result_orders)){
    $order_id=$row_orders['order_id'];
    $amount_due=$row_orders['amount_due'];
    $invoice_number=$row_orders['invoice_number'];
    $total_products=$row_orders['total_products'];
    $order_status=$row_orders['order_status'];
    if( $order_status=='pending'){
      $order_status='Incomplete';
    }else{
      $order_status='Complete';
    }
    $order_date=$row_orders['order_date'];

    echo "<tbody>
            <tr>
              <td>$number</td>
              <td>$amount_due</td>
              <td>$total_products</td>
              <td>$invoice_number</td>
              <td>$order_date</td>
              <td>$order_status</td>"
              ?>
<?php
if($order_status=='Complete'){
  echo "<td>Paid</td>";
}else{
  echo "<td> <a href='confirm_payment.php?order_id=$order_id' class='confirm'> Confirm</td>
  </tr>
</tbody> ";
  }
  $number++;
}
  ?>
  
</table>