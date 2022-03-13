<?php 
		      
		   session_start();
  include_once "../chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
			$id_amis=$_GET['id_amis'];
			 $unique_id = $_SESSION['unique_id'];
			 
			 $query6 = mysqli_query($conn,"delete from invite_amis where id_amis = '$id_amis'");
			 
			 if($query6)
			 {
				 header("Location:gestion_amis.php");
			 }
			
			
		
		?>