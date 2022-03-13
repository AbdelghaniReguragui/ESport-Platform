<?php 
   session_start();
  include_once "../chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<html>
<head>
 <link href="./css/css_user_profile.css" rel="stylesheet"/>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>
    <link href="../css/main.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="../style.css">
	<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />


<style>
.rating {
            width: 70px; 
            font-size: 18px;
            overflow:hidden;
			
        }
        .rating .et {
            float:right;
            color:yellow;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }    
        .rating2 .et {
            float:none
        }
.profile-head {
    transform: translateY(5rem)
}

.cover {
    background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
    background-size: cover;
    background-repeat: no-repeat
}

body {
    background: rgba(32,33,54,1);
	min-height: 100vh;
    overflow-x: hidden;
}
.label{
            position: absolute;
            width: 45px;
            height: 22px;
            right: 20px;
            top: 20px;
            border: 2px solid;
            border-radius: 20px;
        }
        .label:before{
            position: absolute;
            content: '';
            width:20px;
            height: 20px;
            left: 1px;
            top: 0px;
            border-radius: 50%;
            background: #000;
            cursor: pointer;
            transition: 0.4s;
        }
		.label.active:before{
            left: 24px;
            background: #fff;
        }
	    body.night{
            background: #000;
            color: #fff;
        }
		header.night1{
            background: #000;
            color: #fff;
        }
		
		 @media screen and (min-width:900px) {
          .respon{
            display: flex;
          }


</style>
</head>
<body>

<?php  
                        $unique_id = $_SESSION['unique_id'];
	                	$query1=mysqli_query($conn,"select * from user where unique_id='$unique_id'");
	                 	while($row=mysqli_fetch_array($query1))
	                    	{
		                    	$fname=$row['fname'];
			                    $lname=$row['lname'];
                    			$image=$row['img'];
								$unique_id=$row['unique_id'];
	                    	}

							
?>
<header>
    <div class="container">
    <a href="../home.php" class="logo"><img src="../images\E1.png" width="150px"></a>
     
    </div>
	
</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="../home.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="../jeux1.php"><i class="fas fa-gamepad"></i> Games</a></li>
            <li><a href="../streamers1.php"><i class="fas fa-user-friends"></i> Streams</a></li>
            <li><a href="../tournoibygame1.php"><i class="fas fa-trophy"></i> Tournaments</a></li>
            <li><a href="../about.php"><i class="fas fa-question-circle"></i> About us</a></li>

        </ul>
        <ul>
			        <li style="color:rgba(101, 100, 131, 1); font-size: 11px;"> Recommended channels</li>
          <?php
          $query="SELECT utilisateur.ID_USER,utilisateur.NOM_USER,utilisateur.IMAGE,utilisateur.Followers FROM utilisateur  INNER JOIN organisateur on utilisateur.ID_USER = organisateur.ID_USER ORDER BY RAND() LIMIT 4";
          $res = mysqli_query($conn, $query);

          if(mysqli_num_rows($res)>0){
        
          while($row = mysqli_fetch_assoc($res)){
          ?>
            
            <div class="streamer-wrapper-info">
                <div class="streamer-wrapper-image">
                   <a href ="../streamerinfo.php?id_user=<?php echo($row['ID_USER']);?>"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?> /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="../streamerinfo.php?id_user=<?php echo($row['ID_USER']);?>"> <p class="streamer-wrapper-name"><?php echo($row['NOM_USER']); ?> </p></a>
                </div>
              </div>
              <?php
          }
        }
        ?>
              <div class="see">
               <a href ="#"><span class="see-all" style="font-size: 11px;float:right;margin-top:10%;">See more</span></a>
              </div>
        </ul>
    </div>
</div>
<div class="carousel">
      <div class="carousel__item carousel__item--visible">
        <img src="images/v214_0.png" />
      </div>
      <div class="carousel__item">
        <img src="images/v214_20.png" />
      </div>
      <div class="carousel__item">
        <img src="images/v214_15.png" />
      </div>

      <div class="carousel__actions">
        <button id="carousel__button--prev" aria-label="Previous slide"><</button>
        <button id="carousel__button--next" aria-label="Next slide">></button>
      </div>
</div>
<script src="script.js"></script>

	 <div id="google_translate_element"></div> 
	 <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
  </script>

        </ul>
    </div>
</div>

<?php  
                        $unique_id = $_SESSION['unique_id'];
	                	$query1=mysqli_query($conn,"select * from user where unique_id='$unique_id'");
	                 	while($row=mysqli_fetch_array($query1))
	                    	{
		                    	$fname=$row['fname'];
			                    $lname=$row['lname'];
	                    		$description=$row['description'];
                    			$image=$row['img'];
	                    	}

							?>
							<div style="background-color:white;">
<div class="row py-5 px-4">
    <div class="col-md-8 mx-auto" style="height:1000px;">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                   <div class="profile mr-3"><?php  echo '<img src="../images/'.$image.'" alt="..." width="130" class="rounded mb-2 img-thumbnail">'; ?></div>
                    <div class="media-body mb-5 text-white">
                     <?php  
					echo' <h4 class="mt-0 mb-0">'.$fname.' '. $lname.'</h4>'; ?>
                        <p class="small mb-3" style="text-align:right;"><a  class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Evaluer </a>  
 </p>
                    </div>
                </div>
            </div>
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
					<?php 
					 $id_user = $_SESSION['unique_id'];
					 $query02 = mysqli_query($conn,"select count(id_user) as nombre from partage where id_user = '$id_user'");
				     $nbr = mysqli_fetch_assoc($query02);
				     $nbrp = $nbr['nombre'];
					?>
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $nbrp;?></h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">0</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">0</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                   <?php 
				   
				echo '  <p class="font-italic mb-0">'.$description.'</p>';
				  ?> 
                   
                </div>
            </div>
			<hr>
			  <span class="mb-0" style=" margin-left:20px;">Your Sharing</span>
   
           
<div class="tour-all-games-card" style="margin-top:-200px; margin-left:-200px;">
  
  <?php
  $unique_id = $_SESSION['unique_id'];
    $query = "select * from partage where id_user = '$unique_id'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
			$id_jeu = $row['id_pub'];
			$query01 = mysqli_query($conn,"select * from jeu where ID_JEU='$id_jeu'");
			
			while($row=mysqli_fetch_array($query01))
			{
			
  ?>
  <div class="tour">
    <a href="../affichagetournois.php?id_jeu=<?php echo($row['ID_JEU']);?>">
    <div class="tour-game-card">
        <img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE1"])); ?>" style="width:100%">
        <div class="tour-game-container">
            <div class="tour-games">
                <div class="img-cropper">
                    <a href ="#"><img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["LOGO"])); ?>" /></a>
                </div>
                <a href ="#"><p class="tour-game-title"><?php echo($row['NOM_JEU']); ?></p></a>
				
            </div><br>
			<a style="width:400px; height:40px; background:white; border-radius:20px; color:black;" href="partage_delete.php?id_jeu=<?php echo($row['ID_JEU']);?>"><i class="fas fa-share"></i>&nbsp;&nbsp;Delete</a>
        </div>
    </div>
        </a>
  </div>
  <?php
			}
			}
    }
 
  ?>


</div> 
        </div>
    </div>
</div>
</div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	  
	  
	  
	  
 <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header" style="background-color:rgba(32,33,54,1);"><span style="color:white; padding-left:175px; font-size:19px;">Note et Avis</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       



<!-- Text input-->
<div style="padding-left:80px;" >
 <form  role="form" action="profile.php" method="POST">
 <b> Note :</b> <div class="rating rating2">
     <span href="#5" title="Give 5 stars" class="et">★</span>	
       <select name="note">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      	 </div>
   

    <label for="psw"><b>Commentaire</b></label><br>
    <textarea type="text"  placeholder="Entrer votre commentaire" name="comment" required></textarea><br>
	
</div>    
     <br>
	   <div class="env">
        <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
		</div>
		</form>
		<!-- end Text input-->


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			
</body>
</html>
<?php 
        include_once 'db.php';
		
		if(isset($_POST['send']))
		{
			 $id_evaluation=uniqid();
			 $note = $_POST['note'];
			 $comment = $_POST['comment'];
			 $id_user = $_SESSION['unique_id'];
			 
			$query1=mysqli_query($conn,"INSERT INTO evaluation_diffuseurs VALUES ('$id_user','$id_evaluation','$note',' $comment') ");
             if($query1)
			  {
                  echo '<script>alert("votre avis bien enregistré");</script>';
			  }
			   else
              {
                    echo '<script>alert("votre avis nest pas bien enregistré");</script>';
              }
			
			  
		}

 

?>

