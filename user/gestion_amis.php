
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
    <link href="../css/main2.css" rel="stylesheet" />
	<link rel="stylesheet" href="../style.css">
	<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
	
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>

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
		  
		  
		  *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}



a {
  text-decoration: none;
  color: #1ab188;
  transition: .5s ease;
}


.form {
  padding: 50px;
  max-width: 800px;
  height:400px;
  margin: 70px auto;
  border-radius: 20px;
  margin-right:200px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: white;
  color: black;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: .5s ease;
}

.tab-group .active a {
  background: #695188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

.btn{
	background:black;
	border-radius:20px;
	color:white;
	margin-top:8px;
}


</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

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
      <nav>
     
      </nav>
    </div>
	
</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="../home.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="../jeux1.php"><i class="fas fa-gamepad"></i> Games</a></li>
            <li><a href="../streamers1.php"><i class="fas fa-user-friends"></i> Streams</a></li>
            <li><a href="../tournoibygame1"><i class="fas fa-trophy"></i> Tournaments</a></li>
            <li><a href="../about.php"><i class="fas fa-question-circle"></i> About us</a></li>

        </ul>
        <ul>
            <li style="color:rgba(101, 100, 131, 1); font-size: 11px;"> Recommended channels</li>

	 <div id="google_translate_element"></div> 
	 <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
  </script>

        </ul>
    </div>
</div><br></br>
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Add Friends</a></li>
        <li class="tab"><a href="#login">Your Friends</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">  
              <div class="container2" style="">
                <nav> 
                  <ul>		    
		            <li class="box">
					  <form action="gestion_amis.php" method="POST">
                          <input type="text" class="search-box" name="nom_user" placeholder="Search Friend Here...">
                          <button type="submit" name="cherche"><i class="fa">&#xf002;</i></button>
						  
					  </form>
					  
                    </li>
		          </ul>
		        </nav>
		      </div><br><br><br><br><br><br><br><br>
<?php 
        if(isset($_POST['cherche']))
		{
		   	$nom_user = $_POST['nom_user'];
			$query = mysqli_query($conn,"SELECT * FROM `user` WHERE `lname` = '$nom_user'");
			
				 
			 while($row = mysqli_fetch_array($query))
		   {
			   $unique_id = $row['unique_id'];
			   $fname = $row['fname'];
			   $lname = $row['lname'];
			   $img = $row['img'];
			   
		   ?>
		   
		  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container3" style="width:50%; margin-left:160px;">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<tbody>
						<tr>
							<td>
								<?php echo' <img src="../images/'.$img	.'" width="105%" >'; ?> 
								<a class="user-link"><?php echo $fname.' '.$lname; ?></a>
							</td>					
							<td style="width:50%;">
							<form action="gestion_amis.php" method="POST" >
								<a href="#" class="table-link">
									<span class="fa-stack">
                                     <?php  echo '<a href="add_amis.php?id_amis='.$unique_id.'" class="btn" > Add Friend </a>'; ?>										
									</span>
								</a>
							</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</div>
</div>
</div>
		   
		   
		  <?php }}?> 			  
        </div>
        
        <div id="login">   
          <?php 
       
		   
			$query4 = mysqli_query($conn,"SELECT * FROM `invite_amis` WHERE `id_user` = '$unique_id'");
			
				 
			 while($row = mysqli_fetch_array($query4))
		   {
			   $unique_id = $row['id_user'];
			   $id_amis=$row['id_amis'];
		   
		   	$query5 = mysqli_query($conn,"SELECT * FROM `user` WHERE `unique_id` = '$id_amis'");

			    while($row = mysqli_fetch_array($query5))
		   {
			   $fname = $row['fname'];
			   $lname = $row['lname'];
			   $img = $row['img'];
		   ?>
		   
		  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container3" style="width:50%; margin-left:160px;">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<tbody>
						<tr>
							<td>
								<?php echo' <img src="../images/'.$img	.'" width="105%" >'; ?> 
								<a class="user-link"><?php echo $fname.' '.$lname; ?></a>
							</td>					
							<td style="width:50%;">
							<form action="gestion_amis.php" method="POST" >
								<a href="#" class="table-link">
									<span class="fa-stack">
                                     <?php  echo '<a href="delete_amis.php?id_amis='.$id_amis.'" class="btn" > Delete Friend </a>'; ?>										
									</span>
								</a>
							</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</div>
</div>
</div>
		   
		   
		  <?php }}?>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script id="rendered-js" >
$('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = $(this),
  label = $this.prev('label');

  if (e.type === 'keyup') {
    if ($this.val() === '') {
      label.removeClass('active highlight');
    } else {
      label.addClass('active highlight');
    }
  } else if (e.type === 'blur') {
    if ($this.val() === '') {
      label.removeClass('active highlight');
    } else {
      label.removeClass('highlight');
    }
  } else if (e.type === 'focus') {

    if ($this.val() === '') {
      label.removeClass('highlight');
    } else
    if ($this.val() !== '') {
      label.addClass('highlight');
    }
  }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
//# sourceURL=pen.js
    </script>


<div id="signup">




</div>	
</body>
</html>


