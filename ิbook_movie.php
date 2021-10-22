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
    document.getElementById("m1").style.color = "#ffcc00";
</script>
<div class="area_main">
    <p>กำลังฉาย</p><p style="text-transform: uppercase;color: #eb2fe4;margin-bottom: -20px; font-size: 20px; text-shadow: 0 1px 3px rgba(255, 255, 255, 0.8);"><?php echo $M.' '.$Y;  ?></p>
    <div class="container">
      <div class="ml-box mlb-cover mov-list">    

      </div>
    </div>   
    <div  class="container"style="margin-top: -25px;"  >
      <div class="ml-box mlb-cover mov1-list">    

      </div>
    </div>     
    <p style="margin-top: 5px;">โปรแกรมหน้า</p>
    <div  class="container">
      <div class="ml-box mlb-cover mov2-list">    

      </div>
    </div>
</div>
<?php include_once "footer.php"; ?>
</body>
</html>
