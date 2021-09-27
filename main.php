<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "header2.php"; ?>
<body>
<?php include_once "head.php"; ?>
 <p>afaSfASfds</p>


</body>
</html>
