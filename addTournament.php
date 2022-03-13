<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="./css/main.css" rel="stylesheet" />
    <title>WeStream</title>
</head>

<body>
<header>
    <div class="container">
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
    </div>
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
              <div class="streamer-wrapper-info">
                <div class="streamer-wrapper-image">
                   <a href ="#"><img src="images/v263_31.png" /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="#"> <p class="streamer-wrapper-name">Overwatch </p></a>
                </div>
              </div>
              <div class="streamer-wrapper-info">
                <div class="streamer-wrapper-image">
                   <a href ="#"><img src="images/v263_31.png" /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="#"> <p class="streamer-wrapper-name">Overwatch </p></a>
                </div>
              </div>
              <div class="streamer-wrapper-info">
                <div class="streamer-wrapper-image">
                   <a href ="#"><img src="images/v263_31.png" /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="#"> <p class="streamer-wrapper-name">Overwatch </p></a>
                </div>
              </div>
              <div class="streamer-wrapper-info">
                <div class="streamer-wrapper-image">
                   <a href ="#"><img src="images/v263_31.png" /></a>
                </div>
                <div class="streamer-wrapper-text">
                    <a href ="#"> <p class="streamer-wrapper-name">Overwatch </p></a>
                </div>
              </div>
              <div class="see">
               <a href ="#"><span class="see-all" style="font-size: 11px;float:right;margin-top:10%;">See more</span></a>
              </div>
            
        </ul>
    </div>
</div>
<div class="create-tournament">
    <div class="formular-title">
        <span> Create new tournament</span>
    </div>
    <div class="formular">
        <div class="tournament-name">
            <p>Tournament name</p>
            <input type="text" class="tourn-name-input">
        </div>
        <div class="discipline">
            <p>Discipline</p>
            <div class="game-img">
                <a href="#"><img src="images/v263_31.png"></a>
                <a href="#"><img src="images/v263_31.png"></a>
                <a href="#"><img src="images/v263_31.png"></a>
                <a href="#"><img src="images/v263_31.png"></a>
                <a href="#"><img src="images/v263_31.png"></a>
            </div>
            <div class="search">
                <table class="elementcontainer">
                    <tr>
                        <td>
                        <a href="#"><i class="fa">&#xf002;</i></a>                     
                        </td>
                        <td>
                        <input type="text" class="search-input">
                        </td>
                    </tr>
                </table>            
            </div>
        </div>
        <div class="platform">
            <p>Platform (s)</p>
            <button type="submit">Pc</button>
            <button type="submit">Playstation4</button>
            <button type="submit">Playstation5</button>
            <button type="submit">Xbox One</button>
            <button type="submit">Xbox Series</button>
            <button type="submit">Mobile</button>
            <button type="submit">Switch</button>
        </div>
        <div class="size">
            <p>Size</p>
            <input type="text" class="size-text">
            <label class="size-container">
                <input type="radio" checked="checked" name="radio">
                <span class="checkmark"></span>Players
            </label>
            <label class="size-container">
                <input type="radio" checked="checked" name="radio">
                <span class="checkmark"></span>Teams
            </label>
        </div>
        <div class="elimination">
            <p>Elimination type</p>
        <table class="elimination-tbl">
            <tr>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1">
                        <span class="checkmark-elm"></span>Single elimination
                        <i class="fas fa-question-circle"></i>
                    </label>
                </td>
                <td> 
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1">
                        <span class="checkmark-elm"></span>Double elimination
                        <i class="fas fa-question-circle"></i>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1">
                        <span class="checkmark-elm"></span>Round Robin
                        <i class="fas fa-question-circle"></i>
                    </label>
                </td>
                <td>
                    <label class="elm-container">
                        <input type="radio" checked="checked" name="radio1">
                         <span class="checkmark-elm"></span>Swiss system
                         <i class="fas fa-question-circle"></i>
                    </label>
                </td>
            </tr>
        </table>    
        </div>
        <div class="create">
            <button><i class="fas fa-plus" style="margin-right:2%;"></i> Create</button>
        </div>
    </div>
</div>

</body>

</html>