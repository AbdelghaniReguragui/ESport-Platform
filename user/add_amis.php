<?php 
		      
		   session_start();
  include_once "../chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
			$id_amis=$_GET['id_amis'];
			 $unique_id = $_SESSION['unique_id'];
			 
			 $query3 = mysqli_query($conn,"insert into invite_amis values ('$unique_id','$id_amis')");
			 
			 if($query3)
			 {
				 header("Location:gestion_amis.php");
			 }
			
			
		
		?>