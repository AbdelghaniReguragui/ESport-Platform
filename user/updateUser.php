<?php 
   session_start();
  include_once "../chat/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "../chat/header.php"; ?>
<body>
    <?php 
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
    ?>
  <div class="wrapper">
    <section class="form signup">
      <header>E-sport <?php echo $row['email'];?></header>
      <form action="../chat/php/updateUser.php" method="POST"  autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="<?php echo $row['fname'] ?>">
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="<?php echo $row['lname']?>">
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" value="<?php echo $row['email']?>" placeholder="<?php echo $row['email']?>" >
        </div>
        <div class="field input">
          <label>New password</label>
          <input type="password" name="password" placeholder="New password">
          <i class="fas fa-eye"></i>
        </div>
        <input type="hidden" value="<?php echo $row['password']?>" name="oldPassword">
        <input type="hidden" value="<?php echo $row['email']; ?>" name="oldEmail">
        <input type="hidden" value="<?php echo $row['fname']?>" name="oldFname">
        <input type="hidden" value="<?php echo $row['lname']; ?>" name="oldLname">
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Modifier">
        </div>
      </form>
    </section>
  </div>

  <script src="../chat/javascript/pass-show-hide.js"></script>
  <!script src="javascript/updateUser.js"></script>

</body>
</html>