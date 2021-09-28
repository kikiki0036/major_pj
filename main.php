<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "header2.php"; ?>
<body>
<header >
        <nav class="menu_area">
            <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a href="#">หน้าหลัก</a></li>
                    <li><a href="#">ภาพยนตร์</a></li>
                    <li><a href="#">โรงภาพยนตร์</a></li>
                    <li><a href="#">ข่าว</a></li>
                    <li><a href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li>
                </ul> 
            </div>
            
            <div class="user">
              <p><?php echo $_SESSION['email']; ?></p>
              <a href="php/logout.php"><i class="fas fa-user-circle" style="color: #ffffff;"></i></a> 
            </div>
        </nav>
</header>
sdfSDFsdf
<div  class="container">
  <div class="users-list">    
  sdfasefwsfr
  </div>
</div>
<script src="javascript/users.js"></script>
</body>
</html>
