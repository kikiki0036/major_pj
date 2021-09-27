<?php
  $conn = mysqli_connect("localhost", "root", "", "data_major");
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
