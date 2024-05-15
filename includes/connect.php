<?php 
$con=mysqli_connect('localhost','root','','artstore');
if(!$con){
  die(mysqli_error($con));
}
