<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<!-- <?php include_once "video.php"; ?> -->
<script>
    document.getElementById("m2").style.color = "#ffcc00";
</script>
<div class="area_main page2" style="margin-top:180px;"> 
    <p>ภาพยนตร์</p>
    <div  class="container"  style="margin-left: 60px;">
      <div class="ml-box mlb-cover mov-list" style="flex-wrap:wrap;">    

      </div>
    </div>
</div>
<?php include_once "footer.php"; ?>
<script src="javascript/page2.js"></script>
</body>
</html>
