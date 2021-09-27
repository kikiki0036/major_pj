<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['member_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div>WELCOME</div>
  <div class="field button">
  <a href="php/logout.php">Logout</a>
  </div>
</body>
</html>
