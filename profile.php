<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<?php 
$email = $_SESSION['email'];
    if(!empty($email)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}'");
        if(mysqli_num_rows($sql) > 0){ 
            $row = mysqli_fetch_assoc($sql);
        }
    }
?>
    <div class="profile-area" style="margin-top: 110px;margin-bottom:11px;"><p>Profile</p></div>
    <div class="profile-detail"  style="margin-top: -460px;margin-bottom:11px;">
        <div class="box-detail"><p>User name : </p><span><?php echo $row['username'];?></span></div>
        <div class="box-detail"><p>Email : </p><span><?php echo $row['email'];?></span></div>
        <div class="box-detail"><p>phone : </p><span><?php echo $row['phone'];?></span></div>
        <div class="box-detail"><p>Password :</p> <span class="dot">...........</span></div>
        <div class="box-detail out"><a href="php/logout.php"><i class="fas fa-sign-out-alt"></i><p>Sign out</p></a></div>
    </div>
<!-- <?php include_once "footer.php"; ?> -->
</body>
</html>