<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<div class="area_main">
    <p>กำลังฉาย</p>
    <div  class="container">
      <div class="mov-list">    

      </div>
      
    </div>      
    <p>โปรแกรมหน้า</p>
    <div  class="container">
      <div class="mov2-list">    

      </div>
    </div>
</div>
<div class="foot">
    <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
    <p>MINER CINEPLEX</p>
<!-- </div><script src="javascript/mov2.js"></script> -->
<script src="javascript/mov1.js"></script>
<script src="javascript/mov2.js"></script>

</body>
</html>
