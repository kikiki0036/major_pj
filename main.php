<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<?php $Y=date('Y'); $M=date('M');?>
<!-- "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"; -->
<?php include_once "video.php"; ?>
<div class="area_main">
    <p>กำลังฉาย</p><p style="text-transform: uppercase;color: #eb2fe4;margin-bottom: -20px; font-size: 20px; text-shadow: 0 1px 3px rgba(255, 255, 255, 0.8);"><?php echo $M.' '.$Y;  ?></p>
    <div  class="container">
      <div class="mov-list">    

      </div>
    </div>   
    <div  class="container"  style="margin-top: -25px;">
      <div class="mov1-list">    

      </div>
    </div>     
    <p style="margin-top: 5px;">โปรแกรมหน้า</p>
    <div  class="container">
      <div class="mov2-list">    

      </div>
    </div>
</div>
<div class="foot">
    <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
    <p>MINER CINEPLEX</p>
</div>

<script src="javascript/mov1.js"></script>
<script src="javascript/mov1-2.js"></script>
<script src="javascript/mov2.js"></script>

</body>
</html>
