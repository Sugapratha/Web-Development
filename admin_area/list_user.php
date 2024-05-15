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
    .trash{
      color: rgb(150, 30, 98);
    }
    .user-img{
      width: 80px;
    }
  </style>
</head>
<body>
  <h3 class="all-orders">Those who are here to buy Gifts!</h3>
  <table>
    <thead>
      <?php 
      $get_users="Select * from  `user_table`";
      $result=mysqli_query($con,$get_users);
      $row_count=mysqli_num_rows($result);
      if($row_count==0){
        echo "<h2 class='no-orders'>No Users Registered!</h2>";
      }else{
      echo "<tr>
              <th>Sl. No.</th>
              <th>User Name</th>
              <th>User Email</th>
              <th>User Image</th>
              <th>User Address</th>
              <th>User Mobile</th>
              <th>Delete</th>
            </tr>
      </thead>
      <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
          $user_id=$row_data['user_id'];
          $user_name=$row_data['user_name'];
          $user_email=$row_data['user_email'];
          $user_image=$row_data['user_image'];
          $user_address=$row_data['user_address'];
          $user_mobile=$row_data['user_mobile'];
          $number++;
          echo " <tr>
                  <td>$number</td>
                  <td>$user_name</td>
                  <td>$user_email</td>
                  <td><img src='../users_area/user_images/$user_image' class='user-img'></td>
                  <td>$user_address</td>
                  <td>$user_mobile</td>
                  <td><a href=''><i class='fa-solid fa-trash trash'></i></a></td>
                </tr>";
        }
      }
      
      ?>
      
   
     
    </tbody>
  </table>
</body>
</html>