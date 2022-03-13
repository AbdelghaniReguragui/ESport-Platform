
<?php 
   session_start();
  include_once "chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php
// Build up DB connection including cofiguration file
require ("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="./css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
	

    <title>Document</title>
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
	</style>
</head>

<body>
<header>
    <div class="container">
    <a href="index.php" class="logo"><img src="images\E1.png" width="150px"></a>
      <nav>
        <ul>
          
          <li class="box">
                <input type="text" class="search-box" placeholder="Search Here...">
                <button type="submit"><i class="fa">&#xf002;</i></button>
          </li>
          <li><a href ="#"><i class='fas'>&#xf0ac;</i></a></li>
          <li ><a href="#" >Sign in</a></li>
          <li><a href="#">Sign up</a></li>
        </ul>
      </nav>
    </div>
</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="jeux.php"><i class="fas fa-gamepad"></i> Games</a></li>
            <li><a href="streamers.php"><i class="fas fa-user-friends"></i> Streamers</a></li>
            <li><a href="tournoibygame.php"><i class="fas fa-trophy"></i> Tournaments</a></li>
            <li><a href="about.php"><i class="fas fa-question-circle"></i> About us</a></li>
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
                   <a href ="streamerinfo.php?id_user=<?php echo($row['ID_USER']);?>"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?> /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="streamerinfo.php?id_user=<?php echo($row['ID_USER']);?>"> <p class="streamer-wrapper-name"><?php echo($row['NOM_USER']); ?> </p></a>
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
<?php
$id=$_GET['id_user'];
$requete="SELECT * FROM utilisateur WHERE ID_USER=$id";
$resa = mysqli_query($conn, $requete);

          if(mysqli_num_rows($resa)>0){
        
          while($row1 = mysqli_fetch_assoc($resa)){
              ?>
<div class="streamer-infos">
    <div class="streamer">
              <div class="streamer-image">
                <img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row1["IMAGE"])); ?> />
              </div>
              <div >
                <div class="streamer-text">
                <a href ="#"><p class="streamer-name"><?php echo($row1['NOM_USER']); ?> </p></a>
				<?php 
				$id_gamer=$_GET['id_user'];
					 $query08 = mysqli_query($conn,"select count(id_gamer) as nombre_f from follow where id_gamer = '$id_gamer'");
				     $nbrf = mysqli_fetch_assoc($query08);
				     $nbrff = $nbrf['nombre_f'];
				
				?>
                <a href ="#"><p class="streamer-viewers"><?php echo $nbrff; ?> Followers</p></a>
				<?php 
				$id_gamer=$_GET['id_user'];
					 $query02 = mysqli_query($conn,"select count(id_gamer) as nombre from evaluation_diffuseurs where id_gamer = '$id_gamer'");
				     $nbr = mysqli_fetch_assoc($query02);
				     $nbrp = $nbr['nombre'];
					?>
				<a href ="#"><p class="streamer-viewers"><?php echo $nbrp; ?> Evaluate</p></a>

                </div> 
              </div> 
  
	 
	

	
    </div> 
    <div class="about" style="height:200px;">
       <span class="about-streamer"> About <?php echo($row1['NOM_USER']); ?> </span>
       <p class="streamer-viewers"><?php echo $nbrff; ?> followers</p>
       <p class="about-text"><?php echo($row1['DESCRIPTION']); ?>  </p>
       <div class="social-media">
          <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-instagram" style="font-size: 1.5rem;"></i> Instagram</p></a>
          <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-facebook-square" style="font-size: 1.5rem;"></i> FaceBook</p></a>
		  <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-twitter" style="font-size: 1.5rem;"></i> Twitter</p></a>   
       </div>
	   
	    <!-- start evaluer-->
	  

    </div>
</div>

<?php
          }
        }
        ?>
<script>
        $(document).ready(function(){
            $('#searchBox').keyup(function(){
                var query = $('#searchBox').val();

                if(query.length>0){
                    $.ajax({
                        url: "parcourir.php",
                        method: "POST",
                        data: {
                           search : 1,
                           q: query 
                        },
                        success:function(data){
                            $('#result').html(data);
                        },
                        dataType: "text"
                    });
                }
            });

            $(document).on('click', 'li', function(){

                var res = $(this).text();
                $('#searchBox').val(res);
                $('#result').html("");

            });
        });

    </script>


	  

</body>

</html>

<?php 
       
		
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