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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="./css/main.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
<header>
    <div class="container">
    <a href="index.php" class="logo"><img src="images\E1.png" width="150px"></a>
      <nav>
        <ul>
          
        <li class="box">
        
                <input  placeholder="Search Here..." id="searchBox" name="searchBox" type="text" class="search-box">
                <button type="submit"><i class="fa">&#xf002;</i></button>
                <div id="result"></div>
        
          
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
$val=$_GET['id_jeu'];

$requete="SELECT * FROM tournoi,jeu WHERE tournoi.ID_JEU=$val AND jeu.ID_JEU=$val";
$res = mysqli_query($conn, $requete);
$row = mysqli_fetch_assoc($res);
?>

<div class="allTourn">
  <div class="allTourn-game">
    <img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE1"])); ?>" >
    <span class="titlegame"><?php echo($row['NOM_JEU']);?></span>
  </div>
  <span class="title" style=" margin-left:4%; font-weight:normal;">Tournament <?php echo($row['NOM_JEU']);?></span>
  <div class="listTourn">
  <?php
          $query="SELECT * FROM tournoi,jeu WHERE tournoi.ID_JEU=$val AND jeu.ID_JEU=$val";
          $res = mysqli_query($conn, $query);

          if(mysqli_num_rows($res)>0){
        
          while($row = mysqli_fetch_assoc($res)){
              ?>
        <table class="tour-tbl">
          <tr>
            <td class="img-cropper-tour">
                   <a href ="#"><img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["LOGO"])); ?>" /></a>
            </td>
            <td class="tour-info">
                <div class="tour-text">
                    <a href ="#"> <p class="tour-title"><?php echo($row['NOM_TOURNOI']);?></p></a>
                    <a href ="#">  <p class="game-tle"><?php echo($row['NOM_JEU']);?> (<?php
$v=$row['ID_PLATFORME'];
$requet="SELECT * FROM platforme WHERE ID_PLATFORME=$v";
$res1 = mysqli_query($conn, $requet);
$row1 = mysqli_fetch_assoc($res1);?><?php echo($row1['NOM_PLATFORME']);?>)</p></a>
                </div>
            </td>            
            <td class="tour-date">
                    <a href ="#"> <p><?php echo($row['DATE']);?></p></a>
            </td>
            <td class="tour-date">
                    <a href ="#"> <p><?php echo($row['SIZE']);?> Player </p></a>
            </td>
            <td class="tour-registration">
                    <a href ="#"> <p>Registrations open</p></a>
            </td>
          </tr>
        </table>
        <div class="special">
              <div class="line"></div>
        </div>   
        <?php }
          }
          ?>
  </div>

</div> 
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