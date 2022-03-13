<?php
include_once('config.php');
    session_start();

    if(isset($_POST['submit']))
    {
        $tour=trim($_POST['tourName']);
		echo "<script>alert(\"$tour\")</script>";
        echo "<script>alert(\"$value\")</script>";
        
       
        }
    

?>