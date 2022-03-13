<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "esport";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error ",$dbname.mysqli_connect_error();
  }
?>
