<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All orders</title>
  <style>
    .all-orders,.no-orders{
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
  </style>
</head>
<body>
  <h3 class="all-orders">Gifts you have chosen till now!</h3>
  <table>
    <thead>
      <?php 
      $get_orders="Select * from  `user_orders`";
      $result=mysqli_query($con,$get_orders);
      $row_count=mysqli_num_rows($result);
      if($row_count==0){
        echo "<h2 class='no-orders'>No Orders yet</h2>";
      }else{
      echo "<tr>
              <th>Sl. No.</th>
              <th>Due Amount</th>
              <th>Invoice Number</th>
              <th>Total Products</th>
              <th>Order Date</th>
              <th>Status</th>
              <th>Delete</th>
            </tr>
      </thead>
      <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
          $order_id=$row_data['order_id'];
          $user_id=$row_data['user_id'];
          $amount_due=$row_data['amount_due'];
          $invoice_number=$row_data['invoice_number'];
          $total_products=$row_data['total_products'];
          $order_date=$row_data['order_date'];
          $order_status=$row_data['order_status'];
          $number++;
          echo " <tr>
                  <td>$number</td>
                  <td>$amount_due</td>
                  <td>$invoice_number</td>
                  <td>$total_products</td>
                  <td>$order_date</td>
                  <td>$order_status</td>
                  <td><a href=''><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
        }
      }
      
      ?>
      
   
     
    </tbody>
  </table>
</body>
</html>