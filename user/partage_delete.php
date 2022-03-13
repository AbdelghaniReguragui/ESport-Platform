<?php 
		      
		   session_start();
  include_once "../chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
			$id_jeu=$_GET['id_jeu'];
			 $unique_id = $_SESSION['unique_id'];
			 
			 $query6 = mysqli_query($conn,"delete from partage where id_pub = '$id_jeu'");
			 
			 if($query6)
			 {
				 header("Location:profile.php");
			 }
			
			
		
		?>