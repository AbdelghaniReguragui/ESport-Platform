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
$id=$_GET['id_jeu'];
$query = "SELECT * FROM jeu WHERE ID_JEU=$id";
$res = mysqli_query($conn, $query);


if(mysqli_num_rows($res)>0){
  while($row = mysqli_fetch_assoc($res)){
?>



<div class="streamers">
  <div class="streamers-info">
    <div class="streamers-game">
      <div class="info-game">
      <div class="img-game">
        <a href ="#"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?> /></a>
      </div>
      <div class="game-text">
        <a href ="#"><span class="stream-game-title"><?php echo($row['NOM_JEU']); ?></span></a>
        <a href ="#"><p class="numb-viewers"><?php echo($row['VIEWERS']); ?> viewers</p></a>
      </div>
      </div>
    </div>
<?php 
$query1 = "SELECT utilisateur.NOM_USER,utilisateur.IMAGE,utilisateur.Followers FROM utilisateur INNER JOIN organisateur on utilisateur.ID_USER = organisateur.ID_USER WHERE organisateur.ID_JEU =$id";


$res1 = mysqli_query($conn, $query1);


    if(mysqli_num_rows($res1)>0){
      
        while($row1 = mysqli_fetch_assoc($res1)){
?>

    <div class="streamer">
              <div class="streamer-image">
                <a href ="#"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row1["IMAGE"])); ?> /></a>
              </div>
              <div class="streamer-info">
                <div class="streamer-text">
                <a href ="#"><p class="streamer-name"><?php echo($row1['NOM_USER']); ?></p></a>
				<?php 
				$id_gamer=$row['ID_USER'];
				$query02 = mysqli_query($conn,"select count(id_gamer) as nombre from follow where id_gamer = '$id_gamer'");
				$nbr = mysqli_fetch_assoc($query02);
				$nbrp = $nbr['nombre'];
					?>
                <a href ="#"><p class="streamer-viewers"><?php echo $nbrp; ?> Followers</p></a>
                </div> 
              </div>             
    </div>  
<?php 
        }
      }
      ?>
    

  
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