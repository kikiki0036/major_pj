<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<script>
    document.getElementById("m3").style.color = "#ffcc00";
</script>
<div class="page3" style="margin-top:140px;"> 
    <p id="title-page3">โรงภาพยนตร์</p>
    <div class="menu-branch">
       <ul>
          <li><a href="page3-1.php" class="" role="button" target="iframe_page3" id="a1" onclick="myFunction('a1')">กรุงเทพฯ</a></li>
          <li><a href="page3-2.php" class="" role="button" target="iframe_page3" id="a2"  onclick="myFunction('a2')">ภาคกลาง</a></li>
          <li><a href="page3-3.php" class="" role="button" target="iframe_page3" id="a3"  onclick="myFunction('a3')">ภาคเหนือ</a></li>
          <li><a href="page3-4.php" class="" role="button" target="iframe_page3" id="a4"  onclick="myFunction('a4')">ภาคตะวันตก</a></li>
          <li><a href="page3-5.php" class="" role="button" target="iframe_page3" id="a5"  onclick="myFunction('a5')">ภาคตะวันออกเฉียงเหนือ</a></li>
          <li><a href="page3-6.php" class="" role="button" target="iframe_page3" id="a6"  onclick="myFunction('a6')">ภาคใต้</a></li>
          <li><a href="page3-7.php" class="" role="button" target="iframe_page3" id="a7"  onclick="myFunction('a7')">ภาคตะวันออก</a></li>
       </ul>
    </div>
   
    <iframe id="iframe_page3" name="iframe_page3" src="page3-1.php"></iframe>
     <!-- <div  class="containerpage3"  style="">
      <div class="area-branch" ">    
          <div class="area-branch-box">
              <img src="php/image/icon_m.png" alt="">
              <a href="">เมเจอร์ ซีนีเพล็กซ์ โรบินสัน ลาดกระบัง</a>
          </div>
      </div>
    </div> -->
</div>
<script>
    document.getElementById('a1').style.color = "#ffcc00";
    const a =['a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7']; 
    function myFunction(name) {
      for (let i = 0; i < a.length; i++) {
        if(a[i] == name){
          document.getElementById(name).style.color = "#ffcc00";
        }else{
          document.getElementById(a[i]).style.color = "#ffffff";
        }
        
      }
    }
  </script>
<?php include_once "footer.php"; ?>
<!-- <script src="javascript/page3.js"></script> -->
</body>
</html>
