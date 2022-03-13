<?php
// Build up DB connection including cofiguration file
require ("config.php");
if(isset($_POST['submit2'])){
    $value=$_POST['submit2'];
    setcookie('jeu_id', $value);
}
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
<form method="POST" >
<div class="create-tournament">
    <div class="formular-title">
        <span> Create new tournament</span>
    </div>
    <div class="formular">
    
        
    
        

        <div class="discipline">
            <p>Discipline</p>
            <form method="post">
            <div class="game-img">
                    <?php 
                        if(empty($_GET['q']) && !isset($_POST['submit1'])) {
                        $query="SELECT * FROM jeu  LIMIT 5";
                        $res = mysqli_query($conn, $query);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <button  name="submit2" value="<?php echo($row['ID_JEU']);?>"> 
                   
                <img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?>" >
                        </button>
                <?php
                        }
                    }
                }
                ?>
                <?php 
                        if(isset($_GET['q']) AND !empty($_GET['q']) AND !isset($_POST['submit1'])) {
                        $q = htmlspecialchars($_GET['q']);
                        $query = "SELECT * FROM jeu WHERE NOM_JEU LIKE '%".$q."%' ";
                        $res = mysqli_query($conn, $query);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                   
                    
                    <input type="button" name="submit2" value="<?php echo($row['ID_JEU']);?>" >
                    <img src="<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?>" >
                        
                <?php
                        }
                    }
                }
                ?>
                </div>
            </form>

            <form method="GET">
            <div class="search">
                <table class="elementcontainer">
                    <tr>
                        <td>
                        <button type="submit1" style=" border:none; "><i class="fas fa-search">&#xf002;</i></button>                     
                        </td>
                        <td>
                            <?php 
                             if(isset($_POST['submit2'])){
                                $value=$_POST['submit2'];
                                
                        $req="SELECT * FROM jeu WHERE ID_JEU=$value";
                        $res = mysqli_query($conn, $req);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row1 = mysqli_fetch_assoc($res)){
                            ?>
                            <form method="POST">
                        <input type="text" name="jeu" value="<?php echo($row1['NOM_JEU']);?>" class="search-input" >
                        </form>
                            <?php
                            
                            }
                        }

                       
                        
                    }
                        ?>
                    <?php 
                             if(!isset($_POST['submit2'])){
                            ?>
                        <input type="text" name="q" placeholder="Search Here ..." class="search-input">
                            <?php
                            }
                        ?>

                        </td>
                    </tr>
                </table>            
            </div>
                </form>

        </div>
        <div class="platform">
            <p>Platform (s)</p>
            <?php
            
            if(!isset($_POST['submit2'])){
            $req="SELECT * FROM platforme";
            $res = mysqli_query($conn, $req);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row1 = mysqli_fetch_assoc($res)){
                            ?>
                            <div class="plt-lbl">
                            <label class="plt-container">
                        <input type="radio" checked="checked" name="select" value="<?php echo($row1['ID_PLATFORME']); ?>">
                        <span class="checkmark-plt"><?php echo($row1['NOM_PLATFORME']);?></span>
                        </label>
                        </div>

            <?php
                        }
                    }
                }
                if(isset($_POST['submit2'])){
                    
                    $value=$_POST['submit2'];
                    

                    $req="SELECT * FROM platforme INNER JOIN platforme_jeu ON platforme.ID_PLATFORME = platforme_jeu.ID_PLATFORME WHERE platforme_jeu.ID_JEU=$value;";
                    $res = mysqli_query($conn, $req);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row = mysqli_fetch_assoc($res)){
                
                    ?>
                   <div class="plt-lbl">
                            <label class="plt-container">
                        <input type="radio" checked="checked" name="select" value="<?php echo($row['ID_PLATFORME']); ?>">
                        <span class="checkmark-plt"><?php echo($row['NOM_PLATFORME']);?></span>
                        </label>
                        </div>
                    <?php
                        }
                    }
                }
                ?>

            </div>

            <div class="tournament-name">
            <p>Tournament name</p>
            <input type="text" name="tourName" id="tourName" class="tourn-name-input">
        </div>
           
        <div class="size">
            <p>Size</p>
            <input type="number" name="size" class="size-text">
            
            <?php 
            $rep="SELECT * FROM tournoi_type";
            $res = mysqli_query($conn, $rep);

                        if(mysqli_num_rows($res)>0){
                    
                        while($row = mysqli_fetch_assoc($res)){
            ?>
            <label class="size-container">
                <input type="radio" checked="checked" name="radio" value="<?php echo($row['ID_TYPE']);?>">
                <span class="checkmark"></span><?php echo($row['NOM_TYPE']);?>
            </label>
           <?php
                        }
                    }
                ?>
        </div>
                
        <div class="elimination">
            <p>Elimination type</p>
            <table class="elimination-tbl">
            <tr>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1" value="1">
                        <span class="checkmark-elm"></span>Single elimination
                        <div class="dropdown"><i class="fas fa-question-circle"></i>
                        <div class="dropdown-content">
                            <p style="font-size : 13px;">Bracket in which participants are eliminated after one loss.</p>
                        </div>
                        </div>
                    </label>
                </td>
                <td> 
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1"  value="2">
                        <span class="checkmark-elm"></span>Double elimination
                        <div class="dropdown"><i class="fas fa-question-circle"></i>
                        <div class="dropdown-content">
                            <p style="font-size : 13px;">Bracket in which participants must lose twice to get eliminated.</p>
                        </div>
                        </div>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1"  value="3">
                        <span class="checkmark-elm"></span>Round Robin
                        <div class="dropdown"><i class="fas fa-question-circle"></i>
                        <div class="dropdown-content">
                            <p style="font-size : 13px;">Small groups in which participants play against every other player from their group.</p>
                        </div>
                        </div>
                    </label>
                </td>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1"  value="4">
                         <span class="checkmark-elm"></span>Swiss system
                         <div class="dropdown"><i class="fas fa-question-circle"></i>
                         <div class="dropdown-content">
                            <p style="font-size : 13px;">Stage in which participants will play against opponents closest to their skill level.</p>
                        </div>
                        </div>
                    </label>
                </td>
            </tr>
        </table>    
        </div>
                    
        <div class="date">
        <p>Date de l'évenement</p>
            <input type="datetime-local"  name="date" id="date">
        </div>
       
        <div class="create">
        
            <button type="submit" name="submit"><i class="fas fa-plus" style="margin-right:2%;"></i> Create</button>
            
        </div>
                
                
    </div>
</div>
                </form>

<?php 
if(isset($_POST['submit']) )
{

    $tour=trim($_POST['tourName']);
    $size=trim($_POST['size']);
    $radio=trim($_POST['radio']);
    $radio1=trim($_POST['radio1']);
    $select=trim($_POST['select']);
    $jeu=$_COOKIE['jeu_id'];
    $date=trim($_POST['date']);
    

    if(empty($_POST['tourName']) || empty($_POST['size']) || empty($_POST['radio1']) || empty($_POST['select'])  || 
            empty($_POST['radio']) )
            {
                echo "<script>alert(\"Tous les champs sont obligatoire\")</script>";
                
            }
            else{

                $requete = mysqli_query($conn,"INSERT INTO `tournoi` (`ID_TOURNOI`, `ID_TOURNOI_CAT`, `ID_USER`, `NOM_TOURNOI`, `DATE_CREATION`, `DATE`, `SIZE`, `ID_TYPE`, `ID_JEU`,`ID_PLATFORME`) VALUES ('', '$radio1', '1', '$tour', current_timestamp(),  '$date', '$size', '$radio', '$jeu','$select')");
                
                if($requete == true)
                    {
                        echo "<script>alert(\"Tournoi ajouté avec succés\")</script>";
                    }

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