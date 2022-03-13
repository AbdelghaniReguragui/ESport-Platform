<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="action">
    <div class="profile" onclick="menuToggle();">
	  <img src="Android-Studio.png" width="100%" class="img">
	</div>
	<div class="menu">
	  <h3 class="h3">Someone Famous<br><span class="span">Website Designer</span></h3>
	  <ul class="ul">
	        <li class="li"><img src="profile.png" class="img" ><a href="#" class="a">Profile</a></li>
			<li class="li"><img src="edit.png" class="img" ><a href="#" class="a">edit</a></li>
	        <li class="li"><img src="inbox.png" class="img" ><a href="#" class="a">inbox</a></li>
	        <li class="li"><img src="setting.png" class="img" ><a href="#" class="a">setting</a></li>
	        <li class="li"><img src="logout.png"  class="img"><a href="#" class="a">logout</a></li>			
	  </ul>
	</div>
  </div>
<script>
function menuToggle(){
	const toggleMenu = document.querySelector('.menu');
	toggleMenu.classList.toggle('active')
}
</script>

</body>

</html>