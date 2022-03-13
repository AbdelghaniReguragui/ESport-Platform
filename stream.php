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
    <title>Document</title>
</head>

<body>
<header>
    <a href="index.html" class="logo"><img src="images\E1.png" width="150px"></a>
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
</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fas fa-gamepad"></i> Games</a></li>
            <li><a href="#"><i class="fas fa-user-friends"></i> Streams</a></li>
            <li><a href="#"><i class="fas fa-trophy"></i> Tournaments</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i> About us</a></li>
        </ul>
        <ul>
            <li style="color:rgba(101, 100, 131, 1); font-size: 11px;"> Recommended channels</li>

        </ul>
    </div>
</div>

<?php 

$query1 = "SELECT utilisateur.NOM_USER,utilisateur.IMAGE FROM utilisateur INNER JOIN organisateur on utilisateur.ID_USER = organisateur.ID_USER WHERE organisateur.ID_JEU=1 ";


?>




    
<?php 


$res1 = mysqli_query($conn, $query1);


    if(mysqli_num_rows($res1)>0){
      
        while($row1 = mysqli_fetch_assoc($res1)){
?>
<div class="streamers">
  <div class="streamers-info">
    
  <div class="streamer">
              <div class="streamer-image">
                <img src=<?php echo("data:image/jpeg;base64,".base64_encode($row1["IMAGE"])); ?>/>
              </div>
              <div class="streamer-info">
                <div class="streamer-text">
                <a href ="#"><p class="streamer-name"><?php echo($row1['NOM_USER']); ?></p></a>
                <a href ="#"><p class="streamer-viewers">250 followers</p></a>
                </div> 
              </div>             
    </div>  
<?php 
        }
      }
      ?>
    

    <div class="special-divider">
          <div class="line"></div>
          <div class="special-text">
          <a href="#">Show all League of legends streamers <i class="fas fa-chevron-down"></i></a>
          </div>
    </div>   
  </div>

</div> 


</body>

</html>