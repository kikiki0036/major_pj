<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<div class="area_main"> 
    <p>ภาพยนตร์</p>
    <div  class="container"  style="margin-left: 120px;">
      <div class="mov-list" style="flex-wrap:wrap ;">    

      </div>
    </div>
</div>
<div class="foot">
    <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
    <p>MINER CINEPLEX</p>
</div>
<script src="javascript/page2.js"></script>
</body>
</html>
