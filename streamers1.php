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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="./css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
				<link rel="stylesheet" href="style.css">

    <title>Document</title>
	
	<style>
	
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
<header>
    <div class="container">
    <a href="index.php" class="logo"><img src="images\E1.png" width="150px"></a>
      <nav>
        <ul>
          
        <li class="box1">
        
        <input  placeholder="Search Here..." id="searchBox" name="searchBox" type="text" class="search-box">
        <button type="submit"><i class="fa">&#xf002;</i></button>
        <div id="result"></div>

  
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
			 <div id="google_translate_element"></div> 
	
	 <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
	</script>	
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
$query = "SELECT * FROM jeu";
$res = mysqli_query($conn, $query);


if(mysqli_num_rows($res)>0){
  while($row = mysqli_fetch_assoc($res)){
?>



<div class="streamers">
  <div class="streamers-info">
    <div class="streamers-game">
      <div class="info-game">
      <div class="img-game">
        <a href ="streamgame.php?id_jeu=<?php echo($row['ID_JEU']);?>"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row["IMAGE"])); ?> /></a>
      </div>
      <div class="game-text">
        <a href ="streamgame.php?id_jeu=<?php echo($row['ID_JEU']);?>"><span class="stream-game-title"><?php echo($row['NOM_JEU']); ?></span></a>
        <p class="numb-viewers"><?php echo($row['VIEWERS']); ?> viewers</p>
      </div>
      </div>
    </div>
<?php 
$id= $row["ID_JEU"];
$query1 = "SELECT utilisateur.ID_USER,utilisateur.NOM_USER,utilisateur.IMAGE,utilisateur.Followers FROM utilisateur INNER JOIN organisateur on utilisateur.ID_USER = organisateur.ID_USER WHERE organisateur.ID_JEU =$id LIMIT 6";


$res1 = mysqli_query($conn, $query1);


    if(mysqli_num_rows($res1)>0){
      
        while($row1 = mysqli_fetch_assoc($res1)){
?>

    <div class="streamer">
              <div class="streamer-image">
                <a href ="streamerinfo1.php?id_user=<?php echo($row1['ID_USER']);?>"><img src=<?php echo( "data:image/jpeg;base64,".base64_encode($row1["IMAGE"])); ?> /></a>
              </div>
              <div class="streamer-info">
                <div class="streamer-text">
                <p class="streamer-name"><?php echo($row1['NOM_USER']); ?></p>
				<?php 
				$id_gamer=$row1['ID_USER'];
				$query02 = mysqli_query($conn,"select count(id_gamer) as nombre from follow where id_gamer = '$id_gamer'");
				$nbr = mysqli_fetch_assoc($query02);
				$nbrp = $nbr['nombre'];
					?>
                <p class="streamer-viewers"><?php echo $nbrp; ?> Followers</p>
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
          <a href="streamgame.php?id_jeu=<?php echo($row['ID_JEU']);?>">Show all <?php echo($row['NOM_JEU']); ?> streamers <i class="fas fa-chevron-down"></i></a>
          </div>
    </div>   
  </div>

</div> 
<?php 
  }
}
?>


<script>
        var content = document.getElementsByTagName('body')[0];
        var darkMode = document.getElementById('dark-change');
        darkMode.addEventListener('click', function(){
            darkMode.classList.toggle('active');
            content.classList.toggle('night');
        })
    </script>	
	
	
	<script type="text/javascript"> 
	
	(function (){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var c="Translate",g=this||self;function h(a,b){a=a.split(".");var d=g;a[0]in d||"undefined"==typeof d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===b?d[e]&&d[e]!==Object.prototype[e]?d=d[e]:d=d[e]={}:d[e]=b}
function k(a,b){function d(){}d.prototype=b.prototype;a.ka=b.prototype;a.prototype=new d;a.prototype.constructor=a;a.ja=function(e,f,v){for(var w=Array(arguments.length-2),n=2;n<arguments.length;n++)w[n-2]=arguments[n];return b.prototype[f].apply(e,w)}}function l(a){return a};function m(){return"[msg_undefined]"}var p={};
(function(){if(void 0==window.CLOSURE_DEFINES||window.CLOSURE_DEFINES["te.msg.EMBED_MESSAGES"]){p={Y:function(){return MSG_TRANSLATE},m:function(){return MSG_CANCEL},s:function(){return MSG_CLOSE},K:function(){return MSGFUNC_PAGE_TRANSLATED_TO},Z:function(){return MSGFUNC_TRANSLATED_TO},B:function(){return MSG_GENERAL_ERROR},D:function(){return MSG_LANGUAGE_UNSUPPORTED},F:function(){return MSG_LEARN_MORE},L:function(){return MSGFUNC_POWERED_BY},ba:function(){return MSG_TRANSLATE_PRODUCT_NAME},da:function(){return MSG_TRANSLATION_IN_PROGRESS},
aa:function(){return MSGFUNC_TRANSLATE_PAGE_TO},ia:function(){return MSGFUNC_VIEW_PAGE_IN},M:function(){return MSG_RESTORE},U:function(){return MSG_SSL_INFO_LOCAL_FILE},V:function(){return MSG_SSL_INFO_SECURE_PAGE},T:function(){return MSG_SSL_INFO_INTRANET_PAGE},N:function(){return MSG_SELECT_LANGUAGE},fa:function(){return MSGFUNC_TURN_OFF_TRANSLATION},ea:function(){return MSGFUNC_TURN_OFF_FOR},l:function(){return MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER},I:function(){return MSG_ORIGINAL_TEXT},J:function(){return MSG_ORIGINAL_TEXT_NO_COLON},
A:function(){return MSG_FILL_SUGGESTION},W:function(){return MSG_SUBMIT_SUGGESTION},S:function(){return MSG_SHOW_TRANSLATE_ALL},R:function(){return MSG_SHOW_RESTORE_ALL},O:function(){return MSG_SHOW_CANCEL_ALL},ca:function(){return MSG_TRANSLATE_TO_MY_LANGUAGE},$:function(){return MSGFUNC_TRANSLATE_EVERYTHING_TO},P:function(){return MSG_SHOW_ORIGINAL_LANGUAGES},H:function(){return MSG_OPTIONS},ga:function(){return MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE},G:function(){return MSG_MANAGE_TRANSLATION_FOR_THIS_SITE},
j:function(){return MSG_ALT_SUGGESTION},h:function(){return MSG_ALT_ACTIVITY_HELPER_TEXT},i:function(){return MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT},ha:function(){return MSG_USE_ALTERNATIVES},v:function(){return MSG_DRAG_TIP},o:function(){return MSG_CLICK_FOR_ALT},u:function(){return MSG_DRAG_INSTUCTIONS},X:function(){return MSG_SUGGESTION_SUBMITTED},C:function(){return MSG_LANGUAGE_TRANSLATE_WIDGET}};for(var a in p)if(p[a]!==Object.prototype[p[a]])try{p[a]=p[a].call(null)}catch(b){p[a]=m}}else a=
function(b){return function(){return b}},p={Y:a(0),m:a(1),s:a(2),K:a(3),Z:a(4),B:a(5),D:a(45),F:a(6),L:a(7),ba:a(8),da:a(9),aa:a(10),ia:a(11),M:a(12),U:a(13),V:a(14),T:a(15),N:a(16),fa:a(17),ea:a(18),l:a(19),I:a(20),A:a(21),W:a(22),S:a(23),R:a(24),O:a(25),ca:a(26),$:a(27),P:a(28),H:a(29),ga:a(30),j:a(32),h:a(33),ha:a(34),v:a(35),o:a(36),u:a(37),X:a(38),G:a(39),i:a(40),J:a(41),C:a(46)}})();var q={},MSG_TRANSLATE=c;q[0]=MSG_TRANSLATE;var MSG_CANCEL="Cancel";q[1]=MSG_CANCEL;var MSG_CLOSE="Close";q[2]=MSG_CLOSE;function MSGFUNC_PAGE_TRANSLATED_TO(a){return"Google has automatically translated this page to: "+a}q[3]=MSGFUNC_PAGE_TRANSLATED_TO;function MSGFUNC_TRANSLATED_TO(a){return"Translated to: "+a}q[4]=MSGFUNC_TRANSLATED_TO;var MSG_GENERAL_ERROR="Error: The server could not complete your request. Try again later.";q[5]=MSG_GENERAL_ERROR;var MSG_LEARN_MORE="Learn more";q[6]=MSG_LEARN_MORE;
function MSGFUNC_POWERED_BY(a){return"Powered by "+a}q[7]=MSGFUNC_POWERED_BY;var MSG_TRANSLATE_PRODUCT_NAME=c;q[8]=MSG_TRANSLATE_PRODUCT_NAME;var MSG_TRANSLATION_IN_PROGRESS="Translation in progress";q[9]=MSG_TRANSLATION_IN_PROGRESS;function MSGFUNC_TRANSLATE_PAGE_TO(a){return"Translate this page to: "+a+" using Google Translate?"}q[10]=MSGFUNC_TRANSLATE_PAGE_TO;function MSGFUNC_VIEW_PAGE_IN(a){return"View this page in: "+a}q[11]=MSGFUNC_VIEW_PAGE_IN;var MSG_RESTORE="Show original";q[12]=MSG_RESTORE;
var MSG_SSL_INFO_LOCAL_FILE="The content of this local file will be sent to Google for translation using a secure connection.";q[13]=MSG_SSL_INFO_LOCAL_FILE;var MSG_SSL_INFO_SECURE_PAGE="The content of this secure page will be sent to Google for translation using a secure connection.";q[14]=MSG_SSL_INFO_SECURE_PAGE;var MSG_SSL_INFO_INTRANET_PAGE="The content of this intranet page will be sent to Google for translation using a secure connection.";q[15]=MSG_SSL_INFO_INTRANET_PAGE;
var MSG_SELECT_LANGUAGE="Select Language";q[16]=MSG_SELECT_LANGUAGE;function MSGFUNC_TURN_OFF_TRANSLATION(a){return"Turn off "+a+" translation"}q[17]=MSGFUNC_TURN_OFF_TRANSLATION;function MSGFUNC_TURN_OFF_FOR(a){return"Turn off for: "+a}q[18]=MSGFUNC_TURN_OFF_FOR;var MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER="Always hide";q[19]=MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER;var MSG_ORIGINAL_TEXT="Original text:";q[20]=MSG_ORIGINAL_TEXT;var MSG_FILL_SUGGESTION="Contribute a better translation";q[21]=MSG_FILL_SUGGESTION;
var MSG_SUBMIT_SUGGESTION="Contribute";q[22]=MSG_SUBMIT_SUGGESTION;var MSG_SHOW_TRANSLATE_ALL="Translate all";q[23]=MSG_SHOW_TRANSLATE_ALL;var MSG_SHOW_RESTORE_ALL="Restore all";q[24]=MSG_SHOW_RESTORE_ALL;var MSG_SHOW_CANCEL_ALL="Cancel all";q[25]=MSG_SHOW_CANCEL_ALL;var MSG_TRANSLATE_TO_MY_LANGUAGE="Translate sections to my language";q[26]=MSG_TRANSLATE_TO_MY_LANGUAGE;function MSGFUNC_TRANSLATE_EVERYTHING_TO(a){return"Translate everything to "+a}q[27]=MSGFUNC_TRANSLATE_EVERYTHING_TO;
var MSG_SHOW_ORIGINAL_LANGUAGES="Show original languages";q[28]=MSG_SHOW_ORIGINAL_LANGUAGES;var MSG_OPTIONS="Options";q[29]=MSG_OPTIONS;var MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE="Turn off translation for this site";q[30]=MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE;q[31]=null;var MSG_ALT_SUGGESTION="Show alternative translations";q[32]=MSG_ALT_SUGGESTION;var MSG_ALT_ACTIVITY_HELPER_TEXT="Click on words above to get alternative translations";q[33]=MSG_ALT_ACTIVITY_HELPER_TEXT;var MSG_USE_ALTERNATIVES="Use";
q[34]=MSG_USE_ALTERNATIVES;var MSG_DRAG_TIP="Drag with shift key to reorder";q[35]=MSG_DRAG_TIP;var MSG_CLICK_FOR_ALT="Click for alternative translations";q[36]=MSG_CLICK_FOR_ALT;var MSG_DRAG_INSTUCTIONS="Hold down the shift key, click, and drag the words above to reorder.";q[37]=MSG_DRAG_INSTUCTIONS;var MSG_SUGGESTION_SUBMITTED="Thank you for contributing your translation suggestion to Google Translate.";q[38]=MSG_SUGGESTION_SUBMITTED;var MSG_MANAGE_TRANSLATION_FOR_THIS_SITE="Manage translation for this site";
q[39]=MSG_MANAGE_TRANSLATION_FOR_THIS_SITE;var MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT="Click a word for alternative translations, or double-click to edit directly";q[40]=MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT;var MSG_ORIGINAL_TEXT_NO_COLON="Original text";q[41]=MSG_ORIGINAL_TEXT_NO_COLON;q[42]=c;q[43]=c;q[44]="Your correction has been submitted.";var MSG_LANGUAGE_UNSUPPORTED="Error: The language of the webpage is not supported.";q[45]=MSG_LANGUAGE_UNSUPPORTED;
var MSG_LANGUAGE_TRANSLATE_WIDGET="Language Translate Widget";q[46]=MSG_LANGUAGE_TRANSLATE_WIDGET;function r(a){if(Error.captureStackTrace)Error.captureStackTrace(this,r);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}k(r,Error);r.prototype.name="CustomError";function t(a,b){a=a.split("%s");for(var d="",e=a.length-1,f=0;f<e;f++)d+=a[f]+(f<b.length?b[f]:"%s");r.call(this,d+a[e])}k(t,r);t.prototype.name="AssertionError";function u(a,b){throw new t("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var x;function y(a,b){this.g=b===z?a:""}y.prototype.toString=function(){return this.g+""};var z={};function _exportVersion(a){h("google.translate.v",a)}function _getCallbackFunction(a){a:{a=a.split(".");for(var b=g,d=0;d<a.length;d++)if(b=b[a[d]],null==b){a=null;break a}a=b}return a}function _exportMessages(){h("google.translate.m",q)}function A(a){var b=document.getElementsByTagName("head")[0];b||(b=document.body.parentNode.appendChild(document.createElement("head")));b.appendChild(a)}
function _loadJs(a){var b=document;var d="SCRIPT";"application/xhtml+xml"===b.contentType&&(d=d.toLowerCase());d=b.createElement(d);d.type="text/javascript";d.charset="UTF-8";if(void 0===x){b=null;var e=g.trustedTypes;if(e&&e.createPolicy){try{b=e.createPolicy("goog#html",{createHTML:l,createScript:l,createScriptURL:l})}catch(v){g.console&&g.console.error(v.message)}x=b}else x=b}a=(b=x)?b.createScriptURL(a):a;a=new y(a,z);a instanceof y&&a.constructor===y?a=a.g:(b=typeof a,u("expected object of type TrustedResourceUrl, got '"+
a+"' of type "+("object"!=b?b:a?Array.isArray(a)?"array":b:"null")),a="type_error:TrustedResourceUrl");d.src=a;var f;a=(d.ownerDocument&&d.ownerDocument.defaultView||window).document;(f=(a=null===(f=a.querySelector)||void 0===f?void 0:f.call(a,"script[nonce]"))?a.nonce||a.getAttribute("nonce")||"":"")&&d.setAttribute("nonce",f);A(d)}function _loadCss(a){var b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.charset="UTF-8";b.href=a;A(b)}
function _isNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)if(!(b=b[a[d]]))return!1;return!0}function _setupNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)b.hasOwnProperty?b.hasOwnProperty(a[d])?b=b[a[d]]:b=b[a[d]]={}:b=b[a[d]]||(b[a[d]]={});return b}h("_exportVersion",_exportVersion);h("_getCallbackFunction",_getCallbackFunction);h("_exportMessages",_exportMessages);h("_loadJs",_loadJs);h("_loadCss",_loadCss);h("_isNS",_isNS);h("_setupNS",_setupNS);
window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='fr';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='452324.1793090323';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main_fr.js');})();})();
	</script>
	
	
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
         $('#result').css({'display':'block'});
         $('#result').html("");

     });
 });

</script>
</body>

</html>
</html>