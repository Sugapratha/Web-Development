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
  <h3 class="all-orders">The Payment for your Gifts!</h3>
  <table>
    <thead>
      <?php 
      $get_payment="Select * from  `user_payment`";
      $result=mysqli_query($con,$get_payment);
      $row_count=mysqli_num_rows($result);
      if($row_count==0){
        echo "<h2 class='no-orders'>No Payments done!</h2>";
      }else{
      echo "<tr>
              <th>Sl. No.</th>
              <th>Invoice Number</th>
              <th>Amount</th>
              <th>Payment Mode</th>
              <th>Order date</th>
              <th>Delete</th>
            </tr>
      </thead>
      <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
          $order_id=$row_data['order_id'];
          $payment_id=$row_data['payment_id'];
          $amount=$row_data['amount'];
          $invoice_number=$row_data['invoice_number'];
          $payment_mode=$row_data['payment_mode'];
          $date=$row_data['date'];
          $number++;
          echo " <tr>
                  <td>$number</td>
                  <td>$invoice_number</td>
                  <td>$amount</td>
                  <td>$payment_mode</td>
                  <td>$date</td>
                  <td><a href=''><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
        }
      }
      
      ?>
      
   
     
    </tbody>
  </table>
</body>
</html>