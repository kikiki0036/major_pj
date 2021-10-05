<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "headadmin.php"; ?>
<div class="area_main" style="margin-top: 170px;" >
    <p style="margin-top: -50px;">DATA MOVIE<a href="addmovie.php" class="list-btn-p" ><i class="fas fa-plus-circle"></i></a></p>
    <ul class="ul">
      <li style="padding:0 125px;">Movie</li>
      <li style="padding:0 22px;">Get in date</li>
      <li style="padding:0 20px;">Rate</li>
      <li style="padding:0 100px;">Genre</li>
      <li style="padding:0 62px;">Runtime</li>
    </ul>
    <div class="table">
      <div class="table-list">    

      </div>
    </div>   
</div>
<?php include_once "footer.php"; ?>
<script src="JAVASCRIPT/datalist.js"></script>
</body>
</html>