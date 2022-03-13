<?php 
  session_start();
  include_once "chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  
$unique_id = $_SESSION['unique_id'];

$id_j= $_GET['id_jeu'];

$query01 = mysqli_query($conn,"insert into partage values ('$unique_id','$id_j')");

 if($query01)
			 {
				 header("Location:tournoibygame1.php");
			 }




?>