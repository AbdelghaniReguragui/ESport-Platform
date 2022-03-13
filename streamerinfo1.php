
<?php 
   session_start();
  include_once "chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php 
if(isset($_POST['follow']))
		{
$id_gamer=$_GET['id_user'];
$id_user = $_SESSION['unique_id'];

$query07 = mysqli_query($conn,"insert into follow values('$id_user','$id_gamer')");

if($query07)
{
	echo '<script>alert("You followed well ")</script>';
}
		}

?>
<?php 


	
		if(isset($_POST['env']))
		{
			$id_gamer=$_GET['id_user'];
			 $id_evaluation=uniqid();
			 $note = $_POST['note'];
			 $comment = $_POST['comment'];
			 $id_user = $_SESSION['unique_id'];
			 
			$query1=mysqli_query($conn,"INSERT INTO evaluation_diffuseurs VALUES ('$id_user','$id_gamer','$id_evaluation','$note','$comment') ");
             if($query1)
			  {
                   echo '<script>alert("You have successfully evaluated ")</script>';
			  }
			   else
              {
                    echo 'not good ';
              }
			
			  
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
			<link rel="stylesheet" href="style.css">
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
		
		 .label{
            position: absolute;
            width: 45px;
            height: 22px;
            right: 73px;
            top: 10px;
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
    <a href="index.php" class="logo"><img src="images\E1.png" width="150px"></a>
      <nav>
        <ul>
          
          <li class="box1">
                <input type="text" class="search-box" placeholder="Search Here...">
                <button type="submit"><i class="fa">&#xf002;</i></button>
          </li>
          <li> <div class="action">
    <div class="profile" onclick="menuToggle();">
	<?php echo' <img src="./images/'.$image.'" width="105%" class="img">'; ?> 
	</div>
	<div class="menu">
	  <h3 class="h3"><span class="span"> <?php  
					echo $fname.' '. $lname; ?></span></h3>
	  <ul class="ul">
	        <li class="li"><img src="images/profile.png" class="img" ><a href="user/profile.php" class="a">Profil</a></li>
			<li class="li"><img src="images/edit.png" class="img" ><a href="user/updateUser.php" class="a">Edit</a></li>
	        <li class="li"><img src="images/inbox.png" class="img" ><a href="chat/index.php" class="a">Inbox</a></li>
		    <li class="li"><img src="images/add_user1.png" class="img" ><a href="user/gestion_amis.php" class="a">Add Friend</a></li>
            <li class="li"><img src="images/dark.png"  class="img"><a href="#"><label class="label" id="dark-change"></label></a></li>
	        <li class="li"><img src="images/logout.png"  class="img"><a href="logout.php?logout_id=<?php echo $unique_id; ?>" class="a">Logout</a></li>	
			
	  </ul>
	</div>
  </div>
<script>
function menuToggle(){
	const toggleMenu = document.querySelector('.menu');
	toggleMenu.classList.toggle('active')
}
</script>
</li>
        </ul>
      </nav>
    </div>
</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
        <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="jeux1.php"><i class="fas fa-gamepad"></i> Games</a></li>
            <li><a href="streamers1.php"><i class="fas fa-user-friends"></i> Streamers</a></li>
            <li><a href="tournoibygame1.php"><i class="fas fa-trophy"></i> Tournaments</a></li>
            <li><a href="about1.php"><i class="fas fa-question-circle"></i> About us</a></li>
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
                   <a href ="streamerinfo1.php?id_user=<?php echo($row['ID_USER']);?>"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?> /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="streamerinfo1.php?id_user=<?php echo($row['ID_USER']);?>"> <p class="streamer-wrapper-name"><?php echo($row['NOM_USER']); ?> </p></a>
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
                <a href ="#"><p class="streamer-viewers"><?php echo $nbrff; ?> followers</p></a>
				
				<?php 
				$id_gamer=$_GET['id_user'];
					 $query02 = mysqli_query($conn,"select count(id_gamer) as nombre from evaluation_diffuseurs where id_gamer = '$id_gamer'");
				     $nbr = mysqli_fetch_assoc($query02);
				     $nbrp = $nbr['nombre'];
					?>
			    <a href ="#"><p class="streamer-viewers"><?php echo   $nbrp; ?> Evaluate</p></a>

                </div> 
              </div> 
    <div class="follow-button">
	<form role="form" action="" method="POST">
      <button type="submit" name="follow" ><i class="far fa-heart"></i>Follow</button><br><br>
	  </form>
	  </div>
	

	
    </div> 
    <div class="about">
       <span class="about-streamer"> About <?php echo($row1['NOM_USER']); ?> </span>
       <p class="streamer-viewers"><?php echo $nbrff; ?> followers</p>
       <p class="about-text"><?php echo($row1['DESCRIPTION']); ?>  </p>
       <div class="social-media">
          <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-instagram" style="font-size: 1.5rem;"></i> Instagram</p></a>
          <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-facebook-square" style="font-size: 1.5rem;"></i> FaceBook</p></a>
		  <a href="<?php echo($row1['FB_LINK']); ?>" style="color:#adadb8"><p><i class="fab fa-twitter" style="font-size: 1.5rem;"></i> Twitter</p></a>   
       </div>
	   
	   
<!-- evaluer input-->
<div style="padding-left:10px;" >

 <form  role="form" action="" method="POST">
 <b style="font-size:20px; font-family:italic; color:#996FEE;"> Note :</b> <div class="rating rating2">
     <span href="#5" title="Give 5 stars" class="et">★</span>	
       <select name="note">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      	 </div><br>
   

    <label for="psw"><b style="font-size:20px; font-family:italic; color:#996FEE;">Comment</b></label><br>
    <textarea type="text"  placeholder="Entrer votre commentaire" name="comment" required style="border-radius:10px; width:250px; height:50px; font-size:16px;"></textarea>
	<br><br> <div class="env">
        <input type="submit" style="background-color:#BFB6EC; width:100px; border-radius:15px; font-size:18px;" name="env" value="Send">
		</div>
		</form>
</div>   <br>   
		<!-- end evaluer input-->
		
		
	   <!--  message all-->
	   <?php 
	   
	   $id_gamer=$_GET['id_user'];
	   
	   $query05 = mysqli_query($conn,"select * from evaluation_diffuseurs where id_gamer = '$id_gamer'");
	   while($row=mysqli_fetch_array($query05))
	   {
		   
	    $note = $row['note'];
        $comment = $row['commentaire'];	
        $id_user = $row['id_user'];	

        $query06 = mysqli_query($conn,"select * from user where unique_id = '$id_user'");

        while($row=mysqli_fetch_array($query06))
		{		
            $fname = $row['fname'];	
			$lname = $row['lname'];
	   ?>

		<br><fieldset style="border-radius:20px;"><legend><b style="font-size:20px; color:white; font-family:italic;">All review</b></legend><div><br>
		&nbsp;&nbsp;&nbsp;<span style="font-size:16px; color:yellow;">Message By :</span> <span style="font-size:18px; color:#DCD4EE;"><?php echo  $fname.' '.$lname; ?></span><br>
		&nbsp;&nbsp;&nbsp;<i class="fas fa-comment" style="color:white; font-size:15px;"></i>&nbsp;&nbsp;<span style="color:#BFEADE;"><?php echo $comment; ?></span><br>
		&nbsp;&nbsp;&nbsp;<i class="far fa-star" style="color:white; font-size:15px;"></i>&nbsp;&nbsp;<span style="color:#BFEADE;"><?php  echo $note;?></span>
        <br><br>		
		</div>
		</fieldset>
		<?php 
	   }}
		?>

       <!-- End  message all-->
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


	  
<script>
        var content = document.getElementsByTagName('body')[0];
        var darkMode = document.getElementById('dark-change');
        darkMode.addEventListener('click', function(){
            darkMode.classList.toggle('active');
            content.classList.toggle('night');
        })
    </script>	
	
</body>

</html>

